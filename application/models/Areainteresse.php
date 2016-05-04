<?php
/*
CREATE TABLE AreaInteresse (
 idAreaInteresse INT NOT NULL,
 nomeArea VARCHAR(50) NOT NULL
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class AreaInteresse extends CI_Model 
{    
    
    function __construct() { parent::__construct(); }
    
    public $nomeArea = "";
    
    public $professores;
        
    public function listar()
    {
        $this->db->select('*');
        $this->db->from('areainteresse');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function listarProfessores()
    {
        $this->db->select('*');
        $this->db->from('professor');
        $this->db->join('professorareainteresse', 'professor.id = professorareainteresse.idProfessor', 'join');
        
        $query = $this->db->get();
        return $query->result();
    }
    
}
