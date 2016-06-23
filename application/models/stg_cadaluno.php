<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class stg_cadaluno extends My_Model {

    public $id_linha = 0;
    public $nome = "";
    public $matricula = "";
    public $email = "";
    public $cpf = "";

    public function __construct() {
        parent::__construct();
        $this->set_tabela(get_class($this));
    }
    
    public function procedure()
    {
        $query = "CALL sp_importa_alunos(@retorno);";
        $this->conectarDB();
        $this->db->query($query);
    }
    
    public function deleteAll()
    {        
        $query = "delete from stg_cadaluno ";
        $this->conectarDB();
        $this->db->query($query);
    }
    
    public function custInsert()
    {        
        $query = 'INSERT INTO stg_cadaluno(';
        $query .= '	id_linha, nome, matricula, email, cpf';
        $query .= ') VALUES (';
        $query .= $this->id_linha.', \''.$this->nome.'\', \''.$this->matricula.'\', \''.$this->email.'\', \''.$this->cpf.'\'';
        $query .= ');';
        
        $this->conectarDB();
        $this->db->query($query);
    }
}
