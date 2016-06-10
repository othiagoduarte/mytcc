<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orientacao extends My_Model 
{
    public $idProjeto = 0;
    public $datahora = "";
	public $feedback = "";
	public $anotacoesAgendamento = "";
	public $status = "1";
	    
    public function __construct()
	{
	   	parent::__construct();
           $this->set_tabela(get_class($this));        
    }
	
	public function orientacaoPorProfessor($idProfessor, $today)
	{
		$this->conectarDB();
				
		$this->db->select('*');
		$this->db->from('orientacao');
		$this->db->join('projeto', 'orientacao.idProjeto = projeto.id');
		$this->db->where('projeto.idProfessor', $idProfessor);		
		$where = "orientacao.status = 1 or orientacao.status = 2";
		$this->db->where($where);
		$this->db->where('orientacao.datahora >', $today);
		
		return $this->db->get()->result();
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