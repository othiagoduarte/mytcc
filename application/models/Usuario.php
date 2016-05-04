<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
class Usuario extends My_Model {

	public $senha = "";
	public $user = "";	
	public $tipo = "";	
	
	public function __construct()
	{
	   	parent::__construct();
		$this->set_tabela(get_class($this));  
	}
	
	// retorna verdadeiro se email e senha forem correspondentes
	public function logar()
	{		
		$this->conectarDB();
	
		$usuario = $this->get_by_user();

		if( $usuario != NULL)
		{
			if($usuario->senha == $this->senha){
				
				$this->id = $usuario->id; 
				$this->senha = $usuario->senha;
				$this->user = $usuario->user;
				$this->tipo = $usuario->tipo;
				
				return true;
			};
		}
		
		return false;
	
	}
	
	public function get_by_user()	
	{		
		$usuarios =  $this->get_all();
	
		foreach ($usuarios as $usuario) 
		{
			if ($usuario->user == $this->user)
			{				
				return $usuario;
			}
		}		
		return null;
	}
	
	public function buscaProfessor()
	{
       	try {
 			
			$this->load->model('professor','model');
			
			return $this->model->get_by_id_user($this->id);
		
		}catch (Exception $e) {
    		return NULL;
		}	
	}
	
	public function buscaAluno()
	{
		try {
 			
			$this->load->model('aluno','model');
			
			return $this->model->get_by_id_user($this->id);
		
		}catch (Exception $e) {
    		return NULL;
		}	
	}
		
}