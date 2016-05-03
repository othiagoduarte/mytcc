<?php
/*
CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cpf` varchar(9) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
    public $cpf = "";
    
    public $usuario = 0;
        
    public function __construct(){
	   	parent::__construct();
           $this->set_tabela(get_class($this));        
    }
    
    
}
