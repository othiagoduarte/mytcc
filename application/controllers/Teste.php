<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	public function index()
	{
		$data = array();
		$arrayName = array('TEste1','TEste3','TEste2');
		$data['aluno'] = 'Thiago';
		$data['arrayName'] =$arrayName;  
		$this->load->view('view_teste',$data);
	}
	public function Home()
	{
		echo "View Home";
	}
	public function Sobre()
	{
		echo "View Sobre";
	}
	
	public function Contato()
	{
		echo "View Contato";
	}
	
	public function Contato()
	{
		echo "View Contato";
	}

}