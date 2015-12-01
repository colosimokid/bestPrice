<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Upload_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();

        
    }
    
    public function guardar_archivo($archivo,$proveedor)
    {
        $this->db->insert('archivo',array('nombre'=>$archivo['file_name'],'fecha'=>date('Y-m-d H:i:s'),'id_proveedor'=>$proveedor['id_proveedor']));
        
        return $this->db->insert_id();
    }
    
    
    
    public function read_file($dt) {
        require_once './Excel/reader.php';
        $this->db->where('id_archivo', $dt['id_archivo']);
        $select = $this->db->get('archivo');
        $archivo = $select->row();


        $data = new Spreadsheet_Excel_Reader();

        $data->setOutputEncoding('CP1251');
        $data->read('upload/' . $archivo->nombre);

        for ($i = $dt['row']; $i <= $data->sheets[0]['numRows']; $i++) {


            if ($data->sheets[0]['cells'][$i][$dt['precio']] != NULL) {
                
                $this->db->insert('producto',array('id_proveedor'=>$archivo->id_proveedor,
                                                   'codigo'=>$data->sheets[0]['cells'][$i][$dt['id_producto']],
                                                   'marca'=>$data->sheets[0]['cells'][$i][$dt['marca']],
                                                   'descripcion'=>$data->sheets[0]['cells'][$i][$dt['descripcion']],
                                                    'tamano'=>$data->sheets[0]['cells'][$i][$dt['tamano']]
                                                   ));
                
                $this->db->where('codigo',$data->sheets[0]['cells'][$i][$dt['id_producto']]);
                $this->db->where('id_proveedor',$archivo->id_proveedor);
                $row_producto=$this->db->get('producto');
                
                if($row_producto->num_rows()>0)
                {
                   $producto=$row_producto->row();
                   $this->db->insert('detalle',array('id_archivo'=>$dt['id_archivo'],
                                                      'id_producto'=>$producto->id_producto,
                                                      'precio'=>$data->sheets[0]['cells'][$i][$dt['precio']] 
                                                      ));
                }
                
                
            }
        }
    }
    


    private function get_item_categoria($id_item)
    {
        $row=$this->db->query('select i.id_item id_item,i.id_categoria id_categoria from item i join categoria c on i.id_categoria=c.id_categoria where i.id_item='.$id_item);
        
        if($row->num_rows()>0)
        {
            return $row->row();
        }

    }

    
    public function get_producto_archivo($id_archivo,$link,$limit,$start)
    {
                     $filtro="";
               switch($link)
               {
                    case 2:{$filtro=" and p.id_item is null";}break;
                    case 1:{$filtro=" and p.id_item>0";}break;

               }

              

        $row=$this->db->query('select p.id_producto id_producto,p.codigo codigo,p.marca marca, p.descripcion descripcion, p.tamano tamano, d.precio precio, p.id_item id_item from detalle d join producto p on p.id_producto=d.id_producto where d.id_archivo=\''.$id_archivo.'\' '.$filtro.' limit '. $start.','.$limit);
    
                   $i = 0;
                   $aux="";
                   $this->load->model('item_model');

                 foreach ($row->result() as $dat) {

                     $aux[$i]['id_producto']=$dat->id_producto;
                     $aux[$i]['codigo']=$dat->codigo;
                     $aux[$i]['marca']=$dat->marca;
                     $aux[$i]['descripcion']=$dat->descripcion;
                     $aux[$i]['tamano']=$dat->tamano;
                     $aux[$i]['precio']=$dat->precio;
                     $aux[$i]['id_categoria']=0;
                     $aux[$i]['id_item']=0;

                     if($dat->id_item>0)
                     {
                         
                            $ite=$this->db->query('select id_item,id_categoria  from item where id_item='.$dat->id_item);
                                
                                if($ite->num_rows()>0)
                                {
                                    $rit=$ite->row();
                               
                                    $aux[$i]['id_categoria']=$rit->id_categoria;
                                    $aux[$i]['id_item']=$rit->id_item;
                                    //$aux[$i]['items']=$this->item_model->getProduct($rit->id_categoria);
                                      }
                     }
                     $aux[$i]['items']=$this->item_model->getProductSelect($dat->id_producto,$aux[$i]['id_categoria'],$aux[$i]['id_item']);
                                
                     $i++;

                 }

                 return $aux;
    }  
               
    
    public function getFiles()
    {
        $this->db->where('status','1');
        $result=$this->db->get('archivo');
        
        if($result->num_rows()>0)
        {
            return $result;
            
        }
    }

    


    public function getFilesLimit($limit,$start)
    {

        $result=$this->db->query('select a.id_archivo id_archivo, a.nombre nombre, date_format(a.fecha,\'%m-%d-%Y  %I:%i %p\') fecha, p.nombre proveedor from archivo a join proveedor p on a.id_proveedor=p.id_proveedor where a.status=1 order by a.fecha desc limit '. $start.','.$limit);
        
        if($result->num_rows()>0)
        {
            return $result;
            
        }
    }


        

    public function getTotalRowFile($id_archivo)
    {

        $result=$this->db->query('select * from detalle where id_archivo='.$id_archivo);
        
                    return $result->num_rows();
            
        
    }

public function getTotalRowUnlinked($id_archivo)
    {

$result=$this->db->query('select * from detalle d join producto p on p.id_producto=d.id_producto where d.id_archivo='.$id_archivo.' and p.id_item>0');
        
                    return $result->num_rows();
            
        
    } 


      public function get_total_detalle($id_archivo,$link)
   {  
               $filtro="";
               switch($link)
               {
                    case 2:{$filtro=" and p.id_item is null";}break;
                    case 1:{$filtro=" and p.id_item>0";}break;

               }

               $row=$this->db->query('select * from producto p  join detalle d on p.id_producto=d.id_producto WHERE d.id_archivo='.$id_archivo.$filtro);

               return $row->num_rows();
   }


   public function getNameSupplierFecha($id_archivo)
   {
   // echo 'select p.nombre nombre , date_format(a.fecha,\'%m-%d-%Y  %I:%i %p\') fecha from archivo a join proveedor p on p.id_proveedor=a.id_proveedor where a.id_archivo='.$id_archivo;
    $rowe = $this->db->query('select p.nombre nombre , date_format(a.fecha,\'%m-%d-%Y  %I:%i %p\') fecha from archivo a join proveedor p on p.id_proveedor=a.id_proveedor where a.id_archivo='.$id_archivo);
   

     return  $rowe->row();
   }  
    
} 
    ?>