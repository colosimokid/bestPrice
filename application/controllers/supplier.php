<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {
    
        function __construct() {
            parent::__construct();        
            $this->load->model('supplier_model');
        }
    
    
    
    
    	public function index()
	{
                $dat['accion']='add';
                $dat['supplier']=  $this->supplier_model->getSupplier();
		$this->load->view('cabecera');
                
                $this->load->view('formulario_supplier',$dat);
                
                $this->load->view('pie');
	}
        
        
        public function guardar()
	{
            $dato=array('nombre'=> $this->input->post('nombre'),
                         'telefono'=> $this->input->post('telefono')
                
                 );
                $dat['accion']='add';
                $this->supplier_model->guardarSupplier($dato);
                
                $dat['supplier']=  $this->supplier_model->getSupplier();
            
		$this->load->view('cabecera');
                
                $this->load->view('formulario_supplier',$dat);
                
                $this->load->view('pie');
	}
        
          public function editar($id)
	{
                $parametro=array('id_proveedor'=>$id);       
                
                $aux=  $this->supplier_model->get_a_supplier($parametro);
                $temp=$aux->row();
                $dat['accion']='edit';
                $dat['id_proveedor']=$temp->id_proveedor;
                $dat['nombre']=$temp->nombre;
                $dat['telefono']=$temp->telefono;
                        
                $dat['supplier']=  $this->supplier_model->getSupplier();
		$this->load->view('cabecera');
                
                $this->load->view('formulario_supplier',$dat);
                
                $this->load->view('pie');
	}
        
        
        public function update()
	{
                $dato=array('nombre'=> $this->input->post('nombre'),
                            'telefono'=> $this->input->post('telefono'),
                            'id'=> $this->input->post('id_proveedor')
                
                 );
               
                $dat['accion']='add';       
                $this->supplier_model->updateSupplier($dato);
                $dat['supplier']=  $this->supplier_model->getSupplier();
		$this->load->view('cabecera');
                
                $this->load->view('formulario_supplier',$dat);
                
                $this->load->view('pie');
	} 
        
        
                public function eliminar($id)
	{
                $parametro=array('id_proveedor'=>$id);       
                
                $aux=  $this->supplier_model->deleteSupplier($parametro);
                $dat['accion']='add';       
               
                $dat['supplier']=  $this->supplier_model->getSupplier();
		$this->load->view('cabecera');
                
                $this->load->view('formulario_supplier',$dat);
                
                $this->load->view('pie');
	} 
}

