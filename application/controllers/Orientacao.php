<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orientacao extends CI_Controller {

	$usuario = $this->session->userdata('id');
	
	function __construct()
	{		
		parent::__construct();
		$this->load->model('projeto', 'projeto', TRUE);
		$this->load->library('session');
	}
	
	public function index()
	{		
		echo "não definido";
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
		$solicitacoes = $this->projeto->get_professor($usuario);
		echo json_encode(solicitacoes);
	}	
}