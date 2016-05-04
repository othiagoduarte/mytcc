<?php
/*CREATE TABLE Professor (
 idProfessor INT NOT NULL,
 nome VARCHAR(50) NOT NULL,
 matricula INT NOT NULL,
 email VARCHAR(70) NOT NULL,
 endereco VARCHAR(50) NOT NULL,
 telefone INT NOT NULL,
 cidade VARCHAR(50) NOT NULL,
 estado VARCHAR(2) NOT NULL,
 bairro VARCHAR(50) NOT NULL,
 numVagas INT NOT NULL,
 turnoDia BIT(1) NOT NULL,
 turnoNoite BIT(1) NOT NULL
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends My_Model {

    public $matricula = "";
    public $endereco ="";
    public $telefone = 0;
    public $cidade = "";
    public $estado = "";
    public $bairro = "";
    public $numVagas = 0;
    public $turnoDia = false;
    public $turnoNoite = false;
    
    public $usuario = 0;   
    
    public function __construct(){
	   	parent::__construct();
           $this->set_tabela(get_class($this));        
    }
    
    public function get_by_id_user($idUsuario){
    
      $this->conectarDB();
		
		  $result = $this->db->get_where( $this->get_table() , array('idUsuario' => $idUsuario) )->result();
		
  		if (count($result) > 0 ) {
  			
  			return $result[0];
  		
  		  
  		}else {
  			
  			return null();
  		
  		  
  		}				
	  }
}