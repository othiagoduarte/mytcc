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
	
	public function solicitar()
	{
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/solicitar');
	    $this->load->view('includes/prototipo_footer');	 
	} 
	
	public function responder()
	{    
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/responder');
	    $this->load->view('includes/prototipo_footer');	 
	}
	
	public function listar()
	{	    
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/listar');
	    $this->load->view('includes/prototipo_footer');	 
	}
	
	public function listarSolicitacoes()
	{
		$solicitacoes = $this->projetoDB->get_professor($sessionId);
		echo json_encode(solicitacoes);
	}
	
	function detalhes()
	{
		$this->load->view('orientacao/modalDetalhes');
	}
	
	function resposta()
	{
		$this->load->view('orientacao/modalResposta');
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