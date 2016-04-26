<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
class Usuario extends My_Model {

	public $nome = "";
	public $senha = "";
	public $email = "";	
	public $tipo = "";	
	
	public function __construct(){
	   	parent::__construct();
		$this->set_tabela(get_class($this));  
	}
	
	public function logar(){
		
		$this->conectarDB();
	
		if ($this->db->count_all_results($this->get_table()) > 0) {
			
			$usuario = $this->get_by_usuario($this->usuario);
		    $this->id = $usuario->id;
		    $this->nome = $usuario->nome;
		    
			return $usuario->usuario == $this->usuario && $usuario->senha == $this->senha;
		}
		else{
		    
			return $this->usuario === 'admin' && $this->senha === 'admin' ;		
		}	
	}
	
	public function get_by_usuario($nomeUsuario)	{
		
		$usuarios =  $this->get_all();
	
		foreach ($usuarios as $usuario) 
		{
			if ($usuario->usuario == $nomeUsuario ) 
			{				
				return $usuario;
			}
		}
		
		return new Usuario(); 
	}
		
}