<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends My_Model {

    public $nome = "";
    public $matricula = "";
    public $email = "";
    public $endereco ="";
    public $telefone = 0;
    public $cidade = "";
    public $estado = "";
    public $bairro = "";
    
    public function __construct(){
	   	parent::__construct();	
	    $this->set_tabela(get_class($this));
        
    }
    
}
