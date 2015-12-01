<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
    
        function __construct() {
            parent::__construct();        
            $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
             $this->load->model('upload_model');
             $this->load->model('supplier_model');
             $this->load->model('categorie_model');
        }
    
        
        public function index(){
           
            $dat['supplier']=  $this->supplier_model->getSupplier();
            $this->load->view('cabecera');
            $this->load->view('formulario_upload',$dat);
            $this->load->view('pie');
            
            
        }
        
        public function do_upload() 
    {    
            
         $supp=  $this->supplier_model->getSupplier();    
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = '*';
        $config['remove_spaces']=TRUE;
        $config['max_size']    = '2048';
        // $config['file_name']    = time();

        $this->load->library('upload', $config);
        

    if ( ! $this->upload->do_upload())
        {
            $dat = array('error' => $this->upload->display_errors(),
                          
                             'supplier'=>$supp,'pat'=>$config['upload_path']);
            $this->load->view('cabecera');
            $this->load->view('formulario_upload',$dat);
            $this->load->view('pie');
        }
        else
        {
            
            $archivo=$this->upload->data();
            $proveedor=array('id_proveedor'=> $this->input->post('id_proveedor')
                 );
           
           $id_archivo=$this->upload_model->guardar_archivo($archivo,$proveedor);
            $dat = array('upload_data' => $archivo,'id_archivo'=>$id_archivo,
                         'supplier'=>$supp ,
                             'error'=>"" 
                
                        );
            
            $this->load->view('cabecera');
            $this->load->view('formulario_select_row',$dat);
            $this->load->view('pie');

        }

   } 
   
   
   public function select_row()
   {

        $dato = array('row' => $this->input->post('row'),
            'id_producto' => $this->input->post('id_producto'),
            'marca' => $this->input->post('marca'),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'tamano' => $this->input->post('tamano'),
            'id_archivo' => $this->input->post('id_archivo'),
        );

        $this->upload_model->read_file($dato);
        
        $this->editar_file($this->input->post('id_archivo'));

       /* $row = $this->upload_model->get_producto_archivo($this->input->post('id_archivo'));
        $cat = $this->categorie_model->getCategorie();
        
        $dat = array('producto' => $row,'categoria'=>$cat);
        $this->load->view('cabecera');
        $this->load->view('formulario_producto', $dat);
        $this->load->view('pie');*/
    }

          
    
    public function file(){

     $this->load->library('pagination');
     $result=$this->upload_model->getFiles();

     $config['base_url'] = base_url().'index.php/upload/file';
     $config['total_rows'] = $result->num_rows();
     $config['per_page'] = 10; 
     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     $this->pagination->initialize($config); 

     $dat['links']=  $this->pagination->create_links();

     $result=  $this->upload_model->getFilesLimit($config['per_page'],$page);
       
         $aux="";
         $i=0;

       foreach ($result->result() as $val) {

           $aux[$i]['id_archivo']=$val->id_archivo;
           $aux[$i]['nombre']=$val->nombre;
           $aux[$i]['fecha']=$val->fecha;
           $aux[$i]['proveedor']=$val->proveedor;
           $aux[$i]['row']=$this->upload_model->getTotalRowFile($val->id_archivo);
           $aux[$i]['unlink']=$aux[$i]['row']-$this->upload_model->getTotalRowUnlinked($val->id_archivo);


           $i++;
       }
        

       $dat['files']=$aux;

     $this->load->view('cabecera');
     $this->load->view('formulario_files',$dat);
     $this->load->view('pie');


 } 


 

    public function editar_file($id) {
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/upload/editar_file/'.$id.'/'.$this->uri->segment(4);
         $config['uri_segment'] = 4;
         $config['total_rows'] = $this->upload_model->get_total_detalle($id, $this->uri->segment(5));
         $config['per_page'] = 10; 
         $config['num_links']    =   30;
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
         $this->pagination->initialize($config); 
         $info=$this->upload_model->getNameSupplierFecha($id);

        $row = $this->upload_model->get_producto_archivo($id, $this->uri->segment(5),$config['per_page'],$page);
        $cat = $this->categorie_model->getCategorie();
      
        $dat = array('producto' => $row, 
                     'categoria' => $cat , 
                    'links' => $this->pagination->create_links(),
                    'supplier'=>$info->nombre,
                    'fecha'=>$info->fecha,
                    'pos_table'=>$this->uri->segment(4)
                    );
        
        $this->load->view('cabecera');
        $this->load->view('formulario_producto', $dat);
        $this->load->view('pie');
    } 



        public function editar_search($id) {
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/upload/editar_file/'.$id;
         $config['uri_segment'] = 5;
         $config['total_rows'] = $this->upload_model->get_total_detalle($id, $this->uri->segment(5));
         $config['per_page'] = 10; 
         $config['num_links']    =   30;
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
         $this->pagination->initialize($config); 
         $info=$this->upload_model->getNameSupplierFecha($id);

        $row = $this->upload_model->get_producto_archivo($id, $this->uri->segment(5),$config['per_page'],$page);
        $cat = $this->categorie_model->getCategorie();
      
        $dat = array('producto' => $row, 
                     'categoria' => $cat , 
                    'links' => $this->pagination->create_links(),
                    'supplier'=>$info->nombre,
                    'fecha'=>$info->fecha,
                    'pos_table'=>$this->uri->segment(4)
                    );
       
        
        $this->load->view('formulario_producto_table', $dat);
        
    } 
    
    
}