<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coordenador extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();

        if (!$this->session->userdata('logado'))
        {
            redirect('login');
        }

        $this->load->model("projeto", "projetoDB",true);
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

    function orientacoes_por_area()
    {
        $this->load->view('includes/prototipo_header');
        $this->load->view('coordenador_temp/orientacoes_por_area');
        $this->load->view('includes/prototipo_footer');
    }

    function relatorio_por_area()
    {
        echo json_encode($this->projetoDB->projetoPorArea(), JSON_NUMERIC_CHECK);
    }
}
