<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Supplier_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    
    
    function guardarSupplier($dato){
        
        
     $this->db->insert('proveedor',array('nombre'=>$dato['nombre'],'telefono'=>$dato['telefono']));
    }
    
    function getSupplier(){
        
    $this->db->where('status','1');   
     $query=$this->db->get('proveedor');
     
     if($query->num_rows()>0)
         return $query;
     else 
         return false;
         
     }
     
     
    function get_a_supplier($parametro){
        
        
     $query=$this->db->get_where('proveedor',array('id_proveedor'=>$parametro['id_proveedor']));
     
     if($query->num_rows()>0)
         return $query;
     else 
         return false;
         
     }
         
     
    function updateSupplier($dato){
        
     $this->db->where('id_proveedor',$dato['id']);   
     $this->db->update('proveedor',array('nombre'=>$dato['nombre'],'telefono'=>$dato['telefono']));
    }
    
    function deleteSupplier($dato){
        
     $this->db->where('id_proveedor',$dato['id_proveedor']);   
     $this->db->update('proveedor',array('status'=>'0'));
    }    
    

}

?>