<?php
/*
CREATE TABLE Orientacao (
 id INT NOT NULL AUTO_INCREMENT,
 idProjeto INT NOT NULL,
 datahora TIMESTAMP NOT NULL,
 okAluno BIT(1) NOT NULL,
 okProfessor BIT(1) NOT NULL,
 anotacoesAluno VARCHAR(500),
 anotacoesProfessor VARCHAR(500),
 PRIMARY KEY (id)
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends My_Model {

    public $idProjeto = 0;
    public $datahora = "";
    public $okAluno = false;
    public $okProfessor =false;
    public $anotacoesAluno = "";
    public $anotacoesProfessor = "";
    
    public function __construct(){
	   	parent::__construct();
           $this->set_tabela(get_class($this));        
    }
	
	public function get_aluno(){
				
		try{
			
			$this->load->model('aluno','model');
			return $model->get_by_id($this->$idAluno);
			
		}catch(Exception $e){
			
			return null;
				
		}				
	}
	
	public function get_professor(){
		
		try{
			
			$this->load->model('professor','model');
			return $model->get_by_id($this->$idprofessor);
			
		}catch(Exception $e){
			
			return null;
				
		}				
	}
	
	public function get_AreaInteresse(){
				
		$this->load->model('AreaInteresse','model');
		return $model->get_by_id($this->$idAreaInteresse);
				
	}    
}