<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct() 
	{
		parent::__construct();	
        
		// define a view a ser direcionada após o login conforme o perfil de usuario
		if ($this->session->userdata('tipo') == 'a')
			redirect('orientacao/solicitar');
		if($this->session->userdata('tipo') == 'p')
			redirect('orientacao/listar');
		if($this->session->userdata('tipo') == 'c')
			redirect('areainteresses/dashboard');
	}
    
    function index()
    {
        $this->load->view('includes/header');
        $this->load->view('home/main');
	    $this->load->view('includes/footer');
    }
    
    function testarSession(){

        var_dump($this->session);
    }
    
	// funcao criada para trazer a modal de registrar aluno
	function registrarAluno()
	{
		$this->load->view('registros/modalRegistrarAluno');
	}
	
	// funcao criada para trazer a modal de registrar usuario
	function registrarUsuario()
	{
		$this->load->view('registros/modalRegistrarUsuario');
	}	
    
	// funcao criada para trazer a modal de registrar professor
	function registrarProfessor()
	{
		$this->load->view('registros/modalRegistrarProfessor');
	}
}