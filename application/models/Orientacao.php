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
	
	// metodo com bug ainda, a query 'where' esta se atrapalhando no OU
	public function orientacaoPorProfessor($idProfessor)
	{
		$date = new DateTime();
		$today = $date->format('Y-m-d');
		$date->add(new DateInterval('P7D'));
		$sevenDaysLater = $date->format('Y-m-d H:i:s');
		
		$this->conectarDB();
				
		$this->db->select('orientacao.*');
		$this->db->select('orientacao.dataHora as data');
		$this->db->select('orientacao.local as local');
		$this->db->select('aluno.nome as nomeAluno');
		$this->db->select('statusorientacao.status as statusOrientacao');
		
		$this->db->from('orientacao');
		$this->db->join('projeto', 'orientacao.idProjeto = projeto.id');
		$this->db->join('aluno', 'projeto.idAluno = aluno.id');
		$this->db->join('statusorientacao', 'orientacao.status = statusorientacao.id');
		
		$this->db->where('projeto.idProfessor', $idProfessor);	
		$where2 = "orientacao.datahora <= '".$sevenDaysLater."' and orientacao.datahora >= '".$today."'";
		$this->db->where($where2);
		$where = "orientacao.status = 1 or orientacao.status = 2";
		$this->db->where($where);
		
		$this->db->order_by('orientacao.datahora', 'asc');
		
		return $this->db->get()->result();
	}
	
	public function orientacaoPorAluno($idAluno)
	{
		$projetoAceito = '3';
		
		$this->db->select('orientacao.*');
		$this->db->select('orientacao.id as id');
		$this->db->select('orientacao.dataHora as data');
		$this->db->select('statusorientacao.status as statusOrientacao');
		$this->db->select('professor.nome as nome');
		
		$this->db->from('orientacao');
		$this->db->join('projeto', 'orientacao.idProjeto = projeto.id');
		$this->db->join('professor', 'projeto.idProfessor = professor.id');
		$this->db->join('statusorientacao', 'orientacao.status = statusorientacao.id');
		
		$this->db->where('projeto.idAluno', $idAluno);
		$this->db->where('projeto.status', $projetoAceito);
		
		$this->db->order_by('orientacao.datahora', 'asc');
		
		return $this->db->get()->result();
	}
	
	public function orientacaoProjeto($idProjeto)
	{
		$this->conectarDB();
						
		$this->db->select('orientacao.*');
		$this->db->select('orientacao.id as id');
		$this->db->select('orientacao.dataHora as data');
		$this->db->select('statusorientacao.status as statusOrientacao');
		$this->db->select('aluno.nome as nome');
		
		$this->db->from('orientacao');
		$this->db->join('projeto', 'orientacao.idProjeto = projeto.id');
		$this->db->join('aluno', 'projeto.idAluno = aluno.id');
		$this->db->join('statusorientacao', 'orientacao.status = statusorientacao.id');
		
		$this->db->where('orientacao.idProjeto', $idProjeto);
		$this->db->order_by('orientacao.datahora', 'desc');	
		
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