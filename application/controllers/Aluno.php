<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aluno extends CI_Controller {
	
	function __construct() 
	{
		parent::__construct();
		
		$this->load->model('Alunos_model', 'model', TRUE);
	}
	
	function index()
	{

	}
	
	public function listaAlunos ()
	{		
		$data = $this->model->listar();
		
		$out = array_values($data);
		
		$out = json_encode($out);
		echo ($out);
	}
	
	public function insereAluno()
	{
		// le o arquivo e converte para string
		$postData = file_get_contents("php://input");
		// retira o objeto do formado json
		$request  =json_decode($postData);
		// chama o metodo inserir da model aluno p/ inserir os dados no banco
		$this->model->inserir($request);	
	}
	
	public function deletaAluno()
	{
		//$id = $_SERVER['QUERY_STRING'];
		$postData = file_get_contents("php://input");
		$request  =json_decode($postData);
		
		$this->model->remover($request);
	}
}
