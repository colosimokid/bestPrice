<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorie extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categorie_model');
    }

    public function index() {
        $dat['accion'] = 'add';
        $dat['supplier'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_categorie', $dat);

        $this->load->view('pie');
    }

    public function guardar() {
        $dato = array('nombre' => $this->input->post('nombre')
        );
        $dat['accion'] = 'add';
        $this->categorie_model->guardarCategorie($dato);

        $dat['supplier'] = $this->categorie_model->getCategorie();

        $this->load->view('cabecera');

        $this->load->view('formulario_categorie', $dat);

        $this->load->view('pie');
    }

    public function editar($id) {
        $parametro = array('id_categoria' => $id);

        $aux = $this->categorie_model->get_a_categorie($parametro);
        $temp = $aux->row();
        $dat['accion'] = 'edit';
        $dat['id_categoria'] = $temp->id_categoria;
        $dat['nombre'] = $temp->nombre;


        $dat['supplier'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_categorie', $dat);

        $this->load->view('pie');
    }

    public function update() {
        $dato = array('nombre' => $this->input->post('nombre'),
            'id' => $this->input->post('id_categoria')
        );

        $dat['accion'] = 'add';
        $this->categorie_model->updateCategorie($dato);
        $dat['supplier'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_categorie', $dat);

        $this->load->view('pie');
    }

    public function eliminar($id) {
        $parametro = array('id_categoria' => $id);

        $aux = $this->categorie_model->deleteCategorie($parametro);
        $dat['accion'] = 'add';


        $dat['supplier'] = $this->categorie_model->getCategorie();
        $this->load->view('cabecera');

        $this->load->view('formulario_categorie', $dat);

        $this->load->view('pie');
    }

    public function setCategorie($val) {
        
        $aux=  explode("-", $val);
        $dat=array('id_categoria'=>$aux[0],'id_producto'=>$aux[1],'obj'=>$aux[2]);
       
        $this->categorie_model->setCategoria($dat);
        echo "load";
        
        
        
    }

}
