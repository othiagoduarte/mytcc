<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professores extends CI_Controller {

	function __construct()
	{		
		parent::__construct();
		$this->load->model('professor','model');			
	}
	
	public function index(){
		echo "Interface de cadastro de professor";
	}
	// funcao criada para trazer a modal de registrar professor
	function registrarProfessor()
	{
		$this->load->view('professores/modalRegistrarProfessor');
	}
	
	public function listar()
	{		
		echo json_encode($this->model->get_all());
	}
}