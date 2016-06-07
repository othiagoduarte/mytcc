<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class AreaInteresses extends CI_Controller 
{	
	function __construct() 
	{
		parent::__construct();
		
		if (!$this->session->userdata('logado'))
		{
            redirect('login');
        }		
		
		$this->load->model('areainteresse', 'areaDB', TRUE);
	}
	
    function index()
	{
		$this->load->view('includes/prototipo_header');
	    $this->load->view('areas/index');
	    $this->load->view('includes/prototipo_footer');	
	}
	
	function professor()
	{
		$this->load->view('includes/prototipo_header');
	    $this->load->view('areas/professorporarea');
	    $this->load->view('includes/prototipo_footer');	
	}
	
	function criar()
	{
		$this->load->view('includes/prototipo_header');
	    $this->load->view('areas/criar');
	    $this->load->view('includes/prototipo_footer');
	}
	
	function editar($IdArea)
	{
		$this->load->view('includes/prototipo_header');
	    $this->load->view('areas/criar');
	    $this->load->view('includes/prototipo_footer');
	}
	
	function registrar()
	{
		$postData = file_get_contents("php://input");
		$areaArray = json_decode($postData, true);
		
		try
		{
			$this->areaDB->beginTrans();						
			
			$this->areaDB->arrayBuilder($areaArray);
			
			var_dump($this->areaDB);
			
			$this->areaDB->insert();
			$this->areaDB->commit();	
		}
		catch(Exception $e)
		{
			$this->areaDB->rollback();		
		}		
	}
	
	function listar()
	{
		echo json_encode($this->areaDB->listar());
	}
	
	function listaProfessorPorArea()
    {
        echo json_encode($this->areaDB->listarProfessores());
    }
	
	// lista todas as áreas de interesse do professor que está logado
	function listarPorProfessor()
	{
		$idProfessor = $this->session->userdata('id');
		echo json_encode($this->areaDB->listarPorProfessor($idProfessor));        
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
