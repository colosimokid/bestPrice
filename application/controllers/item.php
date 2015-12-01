<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('categorie_model');
    }

    public function index() {
        $dat['accion'] = 'add';
        $dat['product'] = $this->item_model->getItem();
        $dat['categorie'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_item', $dat);

        $this->load->view('pie');
    }

    public function guardar() {
        $dato = array('nombre' => $this->input->post('nombre'),
                     'id_categorie' => $this->input->post('id_categorie')
                    );
        $dat['accion'] = 'add';
        $this->item_model->guardarItem($dato);

        $dat['product'] = $this->item_model->getItem();
        $dat['categorie'] = $this->categorie_model->getCategorie();

        $this->load->view('cabecera');

        $this->load->view('formulario_item', $dat);

        $this->load->view('pie');
    }

    public function editar($id) {
        $parametro = array('id_item' => $id);

        $aux = $this->item_model->get_a_item($parametro);
        $temp = $aux->row();
        $dat['accion'] = 'edit';
        $dat['id_categoria'] = $temp->id_categoria;
        $dat['nombre'] = $temp->producto;
        $dat['id_item'] = $temp->id_item;

        $dat['product'] = $this->item_model->getItem();
        $dat['categorie'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_item', $dat);

        $this->load->view('pie');
    }

    public function update() {
        $dato = array('nombre' => $this->input->post('nombre'),
            'id_categoria' => $this->input->post('id_categorie'),
            'id_item'=>$this->input->post('id_item')
        );

        $dat['accion'] = 'add';
        $this->item_model->updateItem($dato);
        $dat['product'] = $this->item_model->getItem();
        $dat['categorie'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_item', $dat);

        $this->load->view('pie');
    }

    public function eliminar($id) {
        $parametro = array('id_item' => $id);

        $aux = $this->item_model->deleteItem($parametro);
        $dat['accion'] = 'add';

        $dat['product'] = $this->item_model->getItem();
        $dat['categorie'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_item', $dat);

        $this->load->view('pie');
    }

    public function getProduct($val) {
        
        $aux=  explode("-", $val);
        $dat=array('id_categoria'=>$aux[0],'id_producto'=>$aux[1],'obj'=>$aux[2]);
       
        echo $this->item_model->getProduct($dat);
        
        
        
        
    }
    
    
       public function setProductItem($val) {
        
        $aux=  explode("-", $val);
        $dat=array('id_item'=>$aux[0],'id_producto'=>$aux[1]);
       
        echo $this->item_model->setProductItem($dat);
        
        
        
        
    }

}
