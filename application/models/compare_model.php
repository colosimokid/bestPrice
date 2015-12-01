<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Compare_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();

       
    }
    


    public function getNewFile()
    {
        $row=$this->db->query('select max(a.id_archivo) id_archivo,p.id_proveedor id_proveedor,p.nombre nombre  from   archivo a join proveedor p  on a.id_proveedor=p.id_proveedor WHERE a.status=\'1\' group by a.id_proveedor' );
        
        if($row->num_rows()>0)
        {
            return $row;
        }else
        {
            return 0;
        }
    }






      function getItem($id_categorie,$limit,$start,$search){
         

         $con = "";
        if($id_categorie>0)
        {
            $con=" and id_categoria=".$id_categorie;
        }

        $con_search = "";
        if($search!="%")
        {
            $con_search=" and nombre like '%".$search."%' ";
         }
      $query=$this->db->query('select id_item, nombre from item  where status=\'1\' '.$con.$con_search.' order by nombre limit '. $start.','.$limit);   
    
     
     if($query->num_rows()>0)
         return $query;
     else 
         return false;
         
     }

     function getNumItem($id_categorie,$search){
    


         $con = "";
        if($id_categorie>0)
        {
            $con=" and id_categoria=".$id_categorie;
        }

     $con_search = "";
        if($search!="%")
        {
            $con_search=" and nombre like '%".$search."%' ";
         }
        
    $query=$this->db->query('select * from item  where status=\'1\' '.$con.$con_search);   
    
     
     
         return $query->num_rows();
   
         
     }




    public function getInfoItem($id_item,$id_archivo)
    {

        $info=$this->db->query('select p.tamano size,d.precio price, d.id_detalle id_detalle,p.descripcion descripcion,p.marca marca from detalle d join producto p on p.id_producto=d.id_producto
                                  where p.id_item='.$id_item.' and d.id_archivo='.$id_archivo);

     if($info->num_rows()>0)
     {
         $tup=$info->row();
         return array("size"=> $tup->size,"price"=>$tup->price,"id_detalle"=>$tup->id_detalle,"descripcion"=>$tup->descripcion,"marca"=>$tup->marca);
     }   
     else 
         return array("size"=>"-","price"=>"-","id_detalle"=>0,"descripcion"=>"","marca"=>"");
    }



    public function  getListCompare($id_categorie,$limit,$start,$search)
    {
         $aux=array();
         $row_archivo=$this->getNewFile();
         $row_item=$this->getItem($id_categorie,$limit,$start,$search);
         $sw=true;
        
           $i=0;
         foreach ($row_item->result() as $item) {


                 


               $j=0;
               $menor_precio=null;
               $pos_menor=0;
             foreach ($row_archivo->result() as  $arc) {
                

             $info=$this->getInfoItem($item->id_item,$arc->id_archivo);

                if((($menor_precio==null)&&($info['price']>0))||(($menor_precio>$info['price'])&&($info['price']>0)))
                {
                    $menor_precio=$info['price'];
                    $pos_menor=$j;
                }


                   
                
                      
                   $aux[$i][$j]=array( 
                                         
                                         

                                         "id_item"=>$item->id_item,
                                         "size"=>$info['size'],
                                         "price"=>$info['price'],
                                         "descripcion"=>$info['descripcion'],
                                         "marca"=>$info['marca'],
                                         "best_price"=>'0'

                                          );

                 $j++;
                 
             }
                if($menor_precio!=null)
               $aux[$i][$pos_menor]['best_price']=1;

             $i++;
          }

              $j=0;
            foreach ($row_archivo->result() as  $arc) 
             {        
                   
                     $proveedor[$j]=array("id_proveedor"=>$arc->id_proveedor,"nombre"=>$arc->nombre);
                     $j++;  
             } 

         $j=0;
            foreach ($row_item->result() as  $item) 
             {        
                   
                     $producto[$j]=array("id_item"=>$item->id_item,"nombre"=>$item->nombre) ;
                     $j++;  
             }
             


        return array("lista"=>$aux,"producto"=>$producto,"proveedor"=>$proveedor);
    }
    
    
  
} 
    ?>