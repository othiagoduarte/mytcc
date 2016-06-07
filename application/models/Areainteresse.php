<?php
/*
CREATE TABLE AreaInteresse (
 idAreaInteresse INT NOT NULL,
 nomeArea VARCHAR(50) NOT NULL
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class AreaInteresse extends My_Model 
{    
    public $nomeArea = "";
    
    function __construct()
    {
        parent::__construct();
        $this->set_tabela(get_class($this));        
    }
    
    function arrayBuilder(array $row) 
    { 
        $this->nomeArea = $row['descricao'];
    }
            
    public function listar()
    {
        $this->conectarDB();
        
        $this->db->select('*');
        $this->db->from('areainteresse');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function listarProfessores()
    {
        $this->conectarDB();
        
        $this->db->select('*');
        $this->db->from('professor');
        $this->db->join('professorareainteresse', 'professor.id = professorareainteresse.idProfessor', 'join');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function listarPorProfessor($idProfessor)
    {
        $this->conectarDB();     

        $this->db->select('areainteresse.id');
        $this->db->select('areainteresse.nomeArea as descricao');
        $this->db->from('professor');
        $this->db->join('professorareainteresse', 'professor.id = professorareainteresse.idProfessor', 'join');
        $this->db->join('areainteresse', 'areainteresse.id = professorareainteresse.idAreaInteresse', 'join');
        $this->db->where('professor.id', $idProfessor);
        
        $query = $this->db->get();
        return $query->result();
    }
    
}
