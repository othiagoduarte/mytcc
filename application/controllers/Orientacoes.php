<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Orientacoes extends CI_Controller 
{	
	function __construct()
	{		
		parent::__construct();
		
		if (!$this->session->userdata('logado')){
            redirect('login');
        } 
		
		$this->load->model('projeto', 'projetoDB', TRUE);
		$this->load->model('orientacao', 'orientacaoDB', true);
	}
	
	function minhasorientacoes()
	{
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/minhasorientacoes');
	    $this->load->view('includes/prototipo_footer');
	}
	
	public function index()
	{		
		$this->listar();
	}
				
	function listarOrientacoes()
	{
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/listarOrientacoesAluno');
	    $this->load->view('includes/prototipo_footer');
	}
	
	function agendar()
	{
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/agendar');
	    $this->load->view('includes/prototipo_footer');
	}
	
	// traz a modal agendar orientacao
	function agendarOrientacao()
	{
	    $this->load->view('orientacao/modalAgendarOrientacao');
	}
	
	function dashboard()
	{
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/dashboard');
	    $this->load->view('includes/prototipo_footer');
	}
		
	function registrar()
	{
		$postData = file_get_contents("php://input");
		$request = json_decode($postData, true);
		
		// insere os dados que vieram do angular nas proriedades da model
		$this->orientacaoDB->arrayBuilder($request, '3'); // 3 eh o status agendado
        
        $this->orientacaoDB->insert();
	}

	function responder()
	{
		$postData = file_get_contents("php://input");
		$request = json_decode($postData, true);

		// insere os dados que vieram do angular nas proriedades da model
		$this->orientacaoDB->arrayBuilder($request, $request['status']);

		$this->orientacaoDB->update();
	}
	
	function orientacaoAluno()
	{
		$idAluno = $this->session->userdata('id');
		echo json_encode($this->orientacaoDB->orientacaoPorAluno($idAluno));
	}
			
	// dashboard do professor
	function listando()
	{
		$idProfessor = $this->session->userdata('id');
		echo json_encode($this->orientacaoDB->orientacaoPorProfessor($idProfessor));
	}
	
	// carrega a view timeline do aluno visao professor
	function timeline()
	{
		$this->load->view('orientacao/timeline');
	}
	
	// dashboard timeline por aluno visao professor
	function orientacaoProjeto()
	{
		$idProjeto = intval($_GET["idProjeto"]);
		
		if($idProjeto == 0)
			throw new Exception("Identificador do projeto não informado.");
			
		$orientacoes = $this->orientacaoDB->orientacaoProjeto($idProjeto);
		echo json_encode($orientacoes);
	}
}