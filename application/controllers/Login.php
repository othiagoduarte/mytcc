<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{	
		parent::__construct();
		$this->load->library('session');
		//$this->load->model('usuario','usuario');
	
	}
	
	function index()
	{	
		echo var_dump($this->session); 
		//$data = array();
		//$data['teste']  = 'Usuario logado';
		//$this->session->set_userdata($data);
		//$this->load->view('login/logar');		
	}
    
	public function logar()
	{		
		$this->usuario->usuario = $this->input->post('usuario');
		$this->usuario->senha = $this->input->post('senha');

		if ($this->usuario->logar()) {
		    $data = array();
		    $data['logado'] = True;
		    $data['usuario_logado'] =  $this->usuario->get_by_id($this->usuario->id);
		    
		    $this->session->set_userdata($data);
			header("Location: ".base_url())	;
		}else {
			header("Location: ".base_url('login?err'))	;
		}

	}
	
	public function sair(){
	  $this->session->sess_destroy();
	  redirect('login');
	}
}