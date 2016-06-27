<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coordenador extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logado')) {
            redirect('login');
        }
    }

    function index() {
        $this->load->view('includes/prototipo_header');
        $this->load->view('includes/prototipo_footer');
    }

    function orientacoes_acompanhamento() {
        $this->load->view('includes/prototipo_header');
        $this->load->view('coordenador_temp/orientacoes_acompanhamento');
        $this->load->view('includes/prototipo_footer');
    }

    function orientacoes_controle_vagas() {
        $this->load->view('includes/prototipo_header');
        $this->load->view('coordenador_temp/orientacoes_controle_vagas');
        $this->load->view('includes/prototipo_footer');
    }
    
    function importar_alunos() {
        $this->load->view('includes/prototipo_header');
        $this->load->view('coordenador_temp/importar_alunos');
        $this->load->view('includes/prototipo_footer');
    }

    public function listar() {
        echo json_encode($this->model->get_all());
    }

}
