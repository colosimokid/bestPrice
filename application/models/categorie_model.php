<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categorie_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    
    
    function guardarCategorie($dato){
        
        
     $this->db->insert('categoria',array('nombre'=>$dato['nombre']));
    }
    
    function getCategorie(){
        
    $this->db->where('status','1'); 
    $this->db->order_by('nombre','asc'); 
     $query=$this->db->get('categoria');
     
     if($query->num_rows()>0)
         return $query;
     else 
         return false;
         
     }
     
     
    function get_a_categorie($parametro){
        
        
     $query=$this->db->get_where('categoria',array('id_categoria'=>$parametro['id_categoria']));
     
     if($query->num_rows()>0)
         return $query;
     else 
         return false;
         
     }
         
     
    function updateCategorie($dato){
        
     $this->db->where('id_categoria',$dato['id']);   
     $this->db->update('categoria',array('nombre'=>$dato['nombre']));
    }
    
    function deleteCategorie($dato){
        
     $this->db->where('id_categoria',$dato['id_categoria']);   
     $this->db->update('categoria',array('status'=>'0'));
    }   
    
    function setCategoria($dat)
    {
        
        $this->db->where('id_producto',$dat['id_producto']);
        $this->db->update('producto',  array('id_categoria'=>$dat['id_categoria']));
    }
    

}

?>