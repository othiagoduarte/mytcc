<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	
	
	function __construct()
	{	
	
		parent::__construct();
		
     	
			
	}
	public function index()
	{
		$data = array();
		$arrayName = array('TEste 1','TEste 3','TEste 2');
		$data['aluno'] = 'Thiago';
		$data['arrayName'] =$arrayName;  
		$this->load->view('view_teste',$data);
	}
	public function home()
	{
		echo "View Home";
	}
	public function sobre()
	{
		echo "View Sobre";
	}
	
	public function contato()
	{
		echo "View Contato";
	}
	
	public function aluno (){
	
		$this->load->model('aluno','novo_aluno');
		
		$novo_aluno->nome = "Novo nome";
		$novo_aluno->endereco = "Rua de tal";
		$novo_aluno->nome->id = 90;
		$novo_aluno->insert();
		
	}
	

}