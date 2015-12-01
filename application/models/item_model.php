<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Item_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    
    
    function guardarItem($dato){
        
        
     $this->db->insert('item',array('nombre'=>$dato['nombre'],'id_categoria'=>$dato['id_categorie']));
    }
    
    function getItem(){
        
    $query=$this->db->query('select i.id_item id_item, i.nombre producto,c.nombre categoria from item i join categoria c on i.id_categoria=c.id_categoria where i.status=\'1\' order by c.nombre,i.nombre');   
    
     
     if($query->num_rows()>0)
         return $query;
     else 
         return false;
         
     }
     
     
    function get_a_item($parametro){
        
        
    $query=$this->db->query('select i.id_item id_item, i.nombre producto,c.nombre categoria,c.id_categoria id_categoria from item i join categoria c on i.id_categoria=c.id_categoria where i.id_item='.$parametro['id_item']);

    
     
     if($query->num_rows()>0)
         return $query;
     else 
         return false;
         
     }
         
     
    function updateItem($dato){
        
     $this->db->where('id_item',$dato['id_item']);   
     $this->db->update('item',array('nombre'=>$dato['nombre'],'id_categoria'=>$dato['id_categoria']));
    }
    
    function deleteItem($dato){
        
     $this->db->where('id_item',$dato['id_item']);   
     $this->db->update('item',array('status'=>'0'));
    }   
    
  
        function getProduct($dat)
        {

            $opt='<option value="">select</option>';
           if($dat>0)
             {
         $query=$this->db->query('select id_item,nombre from item where id_categoria='.$dat['id_categoria']);
           
          
           
              foreach($query->result() as $t)
              {
                 $opt.= '<option value="'.$t->id_item.'-'.$dat['id_producto'].'">'.$t->nombre.'</option>'; 
              }
               }
           return $opt;
            
        }




         function getProductSelect($id_producto,$id_categoria,$select)
        {
           
            $opt='<option value="">select</option>';
           if($id_categoria>0)
             {
              $query=$this->db->query('select id_item,nombre from item where id_categoria='.$id_categoria);
           
          
           
              foreach($query->result() as $t)
              {
                 $aux="";
                 if($t->id_item == $select)
                 {
                    $aux="selected";
                 }
                 $opt.= '<option value="'.$t->id_item.'-'.$id_producto.'"  '.$aux.'>'.$t->nombre.'</option>'; 
              }
               }
               
           return $opt;
            
        }      
    
    function setProductItem($dat)
    { 
        $query=$this->db->query('update producto set id_item='.$dat['id_item'].' where id_producto='.$dat['id_producto']);
        
        
    }
}

?>