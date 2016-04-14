<?php

class Alunos_model extends CI_Model 
{	
	function __construct() { parent::__construct(); }
	
	function listar() 
	{
		$query = $this->db->get('aluno');
		return $query->result();
	}
	
	function inserir($data)
	{
		return $this->db->insert('aluno', $data);
	}
	
	function remover($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('aluno');
	}
}