<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
class Usuario extends My_Model {

	public $id = 0;
	public $senha = "";
	public $email = "";	
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
	
		$usuario = $this->get_by_email();
		
		if($usuario == NULL)
		{
			return false;	
		}
		else if($usuario->senha != $this->senha)
		{
			return false;	
		}
		else
		{
			$this->tipo = $usuario->tipo;
			$this->id = $usuario->id;
			return true;
		}
	}
	
	// returna um usuario se o email for encontrado na tabela usuario, senão retorna nulo
	public function get_by_email()	
	{		
		$usuarios =  $this->get_all();
	
		foreach ($usuarios as $usuario) 
		{
			if ($usuario->email == $this->email)
			{				
				return $usuario;
			}
		}		
		return null; 
	}
	
	public function buscaProfessor()
	{
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('professor', 'professor.idUsuario = usuario.id', 'join');
		$this->db->where('idUsuario', $this->id);
        
        $query = $this->db->get();
        return $query->result();
	}
	
	public function buscaAluno()
	{
		$this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('aluno', 'aluno.idUsuario = usuario.id', 'join');
		$this->db->where('idUsuario', $this->id);
        
        $query = $this->db->get();
        return $query->result();
	}
		
}