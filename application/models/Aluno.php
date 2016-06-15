<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends My_Model 
{
    public $nome = "";
    public $matricula = "";
    public $email = "";
    public $endereco ="";
    public $telefone = 0;
    public $cidade = "";
    public $estado = "";
    public $bairro = "";
    public $cpf = "";
    public $idUsuario = 0;
        
    public function __construct()
    {
      parent::__construct();
           $this->set_tabela(get_class($this));        
    }
    
    public function get_by_id_user($id_user){
    
      $this->conectarDB();
		
		  $result = $this->db->get_where( $this->get_table() , array('idUsuario' => $id_user) )->result();
		
  		if (count($result) > 0) 
      {	
  			return $result[0]; 
  		}
      else 
      {	
  			return null();          
      }				
	  }
}
