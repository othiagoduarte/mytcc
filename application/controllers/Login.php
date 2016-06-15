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
		$this->load->view('includes/body');
	    $this->load->view('includes/footer');		
	}
    
	// retorna verdadeiro se a variavel de sessão 'logado' não estiver vazia
	private function isLogged()
	{
		$logado = $this->session->userdata('logado');
		return !empty($logado);
	}
	
	public function getSessionData()
	{
		if ($this->isLogged())
		{			
			$data = array();
			$data['session_name'] = $this->session->userdata('nome');
			$data['session_type'] = $this->session->userdata('tipo');
			$data['session_logged'] = $this->session->userdata('logado');
			
			echo json_encode($data);
		}
		else
		{
			echo "f";
		}
	}
	
	// envia 't' caso a validação dos dados do usuário estejam corretos
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
			echo "t";
		}
	}
	
	public function sair()
	{
	  $this->session->sess_destroy();
	}
	
	private function insereCookie($usuario)
	{		
		$data = array();

		$model = null;
		
		$model = $this->buscaUsuarioConformeTipo($usuario);
		
		if($model == null)
		{
			throw new Exception("usuario nulo");			
		}

		
		if ($model != null ) 
		{			
			$data['tipo'] = $this->usuarioDB->tipo;
			$data['id'] = $model->id;
			$data['nome'] = $model->nome;
			$data['logado'] = 'true';
		}
		
		$data['user'] = $usuario;

		$this->session->set_userdata($data);
	}
	
	private function buscaUsuarioConformeTipo($usuario)
	{				
		if($usuario->tipo == 'p')
			return $usuario->buscaProfessor();
		else if($usuario->tipo == 'a')
			return $usuario->buscaAluno();
		else if($usuario->tipo == 'c')
			return $usuario->buscaProfessor();
		else
			throw new Exception('Usuario cadastrado sem papel.');		
	}
}