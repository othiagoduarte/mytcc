<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct() 
	{
		parent::__construct();	
        
	}
    
    function index()
    {
        $this->load->view('includes/header');
        $this->load->view('home/main');
	    $this->load->view('includes/footer');
    }
    public function testarSession(){

        var_dump($this->session);
    }
}