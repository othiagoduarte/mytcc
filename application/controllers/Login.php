<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{			
	function __construct()
	{	
		parent::__construct();
		$this->load->model('usuario','usuarioDB', true);
	}
	
	function index()
	{	
		$this->load->view('includes/header');
        $this->load->view('login/logar');
	    $this->load->view('includes/footer');		
	}
    
	public function isLogged()
	{
		if($this->session->userdata('logado') == 'true')
			echo 'TRUE';
	}
	
	public function pegaEmail()
	{
		$sessionName = $this->session->userdata('nome');
		if($sessionName == '')
		{
			echo 'FALSE';
		}
		else
		{
			echo json_encode($sessionName);
		}
	}
	
	public function logar()
	{		
		// le o arquivo e converte para string
		$postData = file_get_contents("php://input");
		// retira o objeto do formado json
		$request = json_decode($postData);
		// insere os dados do formulário html nas propriedades da model
		$this->usuarioDB->user = $request->email;
		$this->usuarioDB->senha = $request->senha;		

		if ($this->usuarioDB->logar()) 
		{		    
			$this->insereCookie($this->usuarioDB);
			echo "TRUE";
		}
	}
	
	private function insereCookie($usuario)
	{		
		$data = array();

		$model = null;
		
		if($usuario->tipo == 'p')
		{
			$model = $usuario->buscaProfessor();
		}
		else
		{
			$model = $usuario->buscaAluno();
		}
		if ($model != null ) {
			
			$data['id'] = $model->id;
			$data['nome'] = $model->nome;
			$data['logado'] = 'true';
		}
		
		$data['user'] = $usuario;

		$this->session->set_userdata($data);
	}
		
	public function sair()
	{
	  $this->session->sess_destroy();
	}
}