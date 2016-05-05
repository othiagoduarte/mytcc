<?php
/*
CREATE TABLE Projeto (
 id INT NOT NULL AUTO_INCREMENT,
 idAluno INT NOT NULL,
 idProfessor INT NOT NULL,
 titulo VARCHAR(100) NOT NULL,
 resumo VARCHAR(500) NOT NULL,
 idAreaInteresse INT NOT NULL,
 turno VARCHAR(10) NOT NULL,
 motivoRecusa VARCHAR(500),
 status VARCHAR(10),
 PRIMARY KEY (id)
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends My_Model {

    public $idAluno = 0;
	public $idProfessor = 0;
    public $titulo = "";
    public $resumo ="";
    public $idAreaInteresse = 0;
    public $turno = "";
    public $motivoRecusa = "";
    public $status = "";
	
    public function __construct(){
	   	parent::__construct();
           $this->set_tabela(get_class($this));        
    }
	
	public function get_aluno(){
		
		try {
 			
			$this->load->model('aluno','model');
			
			return $model->get_by_id($this->$idAluno);
		
		}catch (Exception $e) {
    		return NULL;
		}		
	}
	
	public function get_professor(){
		
		try {
 			
			$this->load->model('professor','model');
			
			return $model->get_by_id($this->$idprofessor);
		
		}catch (Exception $e) {
    		return NULL;
		}		
	}
	
	public function get_AreaInteresse(){
	
		try {
 			
			$this->load->model('AreaInteresse','model');
			
			return $model->get_by_id($this->$idAreaInteresse);
		
		}catch (Exception $e) {
    		return NULL;
		}	
	}

	public function get_projeto_by_professor($idProfessor){
	
      	$this->conectarDB();
		
		$this->db->select('projeto.*');
		$this->db->select('aluno.nome as NomeAluno');
		$this->db->select('professor.nome as NomeProfessor');
		$this->db->select('areainteresse.nomeArea as NomeAreaInteresse');
		$this->db->from('projeto');
		$this->db->join('aluno', 'projeto.idaluno = aluno.id');
		$this->db->join('professor', 'projeto.idprofessor = professor.id');
		$this->db->join('areainteresse', 'projeto.idAreaInteresse = areainteresse.id');
		$this->db->where( array('projeto.idProfessor' , $idProfessor) );
		
		return $this->db->get()->result();
		
	}
	
	public function get_projeto_by_aluno($idAluno){
	
      	$this->conectarDB();
		
		$this->db->select('projeto.*');
		$this->db->select('aluno.nome as NomeAluno');
		$this->db->select('professor.nome as NomeProfessor');
		$this->db->select('areaInteresse.nomeArea as NomeAreaInteresse');
		$this->db->from('projeto');
		$this->db->join('aluno', 'projeto.idaluno = aluno.id');
		$this->db->join('professor', 'projeto.idprofessor = professor.id');
		$this->db->join('areainteresse', 'projeto.idAreaInteresse = areaInteresse.id');
				$this->db->where( array('projeto.idAluno' , $idAluno) );
		
		return $this->db->get()->result();
	}
}