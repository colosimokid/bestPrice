<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compare extends CI_Controller {
    
        function __construct()
         {
            parent::__construct();        
            $this->load->helper(array('form'));
             $this->load->model('compare_model');
             $this->load->model('supplier_model');
             $this->load->model('categorie_model');
        }
    
        
        public function index()
        {  

            $id=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $search=($this->uri->segment(4)) ? $this->uri->segment(4) : "_";
            $this->load->library('pagination');
            $config['base_url'] = base_url().'index.php/compare/index/'.$id.'/'.$search.'/';
            $config['uri_segment'] = 5;
            $config['total_rows'] = $this->compare_model->getNumItem($id,$search);
            $config['per_page'] = 10; 
            $config['num_links']    =   30;
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $this->pagination->initialize($config); 

             
             $resultado=$this->compare_model->getListCompare($id,$config['per_page'],$page,$search);
             $dat['proveedor']=  $resultado['proveedor'];
            $dat['lista']=  $resultado['lista'];
            $dat['producto']=  $resultado['producto'];
            $dat['categorie'] = $this->categorie_model->getCategorie();
            $dat['links'] = $this->pagination->create_links();
            $dat['id_categorie']=$id;
            $dat['pagina']=$page;
            $dat['search']=($search=="_")?"":$search;

            $this->load->view('cabecera');
            $this->load->view('formulario_compare',$dat);
            $this->load->view('pie');          
        
        }


          public function search()
        {  

          $id=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $search=($this->uri->segment(4)) ? $this->uri->segment(4) : "_";
            $this->load->library('pagination');
            $config['base_url'] = base_url().'index.php/compare/index/'.$id.'/'.$search.'/';
            $config['uri_segment'] = 5;
            $config['total_rows'] = $this->compare_model->getNumItem($id,$search);
            $config['per_page'] = 10; 
            $config['num_links']    =   30;
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $this->pagination->initialize($config); 

             
             $resultado=$this->compare_model->getListCompare($id,$config['per_page'],$page,$search);
             $dat['proveedor']=  $resultado['proveedor'];
            $dat['lista']=  $resultado['lista'];
            $dat['producto']=  $resultado['producto'];
            $dat['categorie'] = $this->categorie_model->getCategorie();
            $dat['links'] = $this->pagination->create_links();
            $dat['id_categorie']=$id;
            $dat['pagina']=$page;
            $dat['search']=$search;

           
            $this->load->view('formulario_compare_table',$dat);
                
        
        }    
        
//SELECT distinct(a.id_proveedor), p.nombre,a.id_archivo FROM  archivo a join proveedor p on p.id_proveedor = a.id_proveedor WHERE 1 order by a.fecha
//select *  from    (select p.id_producto idp, p.id_item, i.nombre ,p.id_proveedor, p.codigo, p.marca, p.descripcion,p.tamano from producto p join item i on p.id_item=i.id_item where 1)det   join (SELECT distinct(a.id_proveedor) idp , p.nombre nom , a.id_archivo ida FROM  archivo a join proveedor p on p.id_proveedor = a.id_proveedor WHERE 1 order by a.fecha)arc on det.id_proveedor=arc.idp where 1 order by det.id_item,det.id_proveedor
}