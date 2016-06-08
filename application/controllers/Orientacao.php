<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orientacao extends CI_Controller {

	public $sessionId = 0;
	
	function __construct()
	{		
		parent::__construct();
		
		if ( ! $this->session->userdata('logado')){
            redirect('login');
        } 
		
		$this->load->model('projeto', 'projeto', TRUE);
		$sessionId = $this->session->userdata('id');
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
		$solicitacoes = $this->projeto->get_professor($sessionId);
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
	
	function agendarOrientacao()
	{
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('orientacao/modalAgendarOrientacao');
	    $this->load->view('includes/prototipo_footer');
	}
}