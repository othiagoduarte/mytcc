<?php
/*
CREATE TABLE Aluno (
 idAluno INT NOT NULL,
 nome VARCHAR(50) NOT NULL,
 matricula INT NOT NULL,
 email VARCHAR(70) NOT NULL,
 endereco VARCHAR(70) NOT NULL,
 telefone INT NOT NULL,
 cidade VARCHAR(50) NOT NULL,
 estado VARCHAR(2) NOT NULL,
 bairro VARCHAR(50) NOT NULL
);
*/
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
