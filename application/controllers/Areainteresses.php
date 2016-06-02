<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class AreaInteresses extends CI_Controller 
{	
	function __construct() 
	{
		parent::__construct();
		
		if ( ! $this->session->userdata('logado')){
            redirect('login');
        }		
		
		$this->load->model('areainteresse', 'model', TRUE);
	}
	
    public function listaAreas()
	{
		echo json_encode($this->model->listar());
	}
	
	public function listaProfessorPorArea()
    {
        echo json_encode($this->model->listarProfessores());
    }
	
	function areas()
	{
		$this->load->view('includes/prototipo_header');
	    $this->load->view('coordenador_temp/manipular_areas');
	    $this->load->view('includes/prototipo_footer');	 
	} 
	
	function dashboard()
	{
		$this->load->view('includes/prototipo_header');
	    $this->load->view('coordenador_temp/relatorios');
	    $this->load->view('includes/prototipo_footer');	 
	} 
}
