<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends My_Model 
{
    public $idAluno = 0;
	public $idProfessor = 0;
    public $titulo = "";
    public $resumo ="";
    public $idAreaInteresse = 0;
    public $turno = "";
    public $motivoRecusa = "";
    public $status = "";
	public $mensagem = "";
	public $numOrientacoes = 0;
	public $dataSolicitacao = "";
	public $dataResposta = "";
	
    public function __construct()
	{
		parent::__construct();
		$this->set_tabela(get_class($this));        
    }	
	
	public function meuProjeto($idAluno)
	{
      	$this->conectarDB();
		
		$this->db->select('projeto.*');
		$this->db->select('aluno.nome as NomeAluno');
		$this->db->select('professor.nome as NomeProfessor');
		$this->db->select('areainteresse.nomeArea as NomeAreaInteresse');
		$this->db->from('projeto');
		$this->db->join('aluno', 'projeto.idaluno = aluno.id');
		$this->db->join('professor', 'projeto.idprofessor = professor.id');
		$this->db->join('areainteresse', 'projeto.idAreaInteresse = areainteresse.id');
		$this->db->where('projeto.idAluno' , $idAluno);
		$this->db->where('projeto.status', '3');
		
		return $this->db->get()->result();
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
		$this->db->where('projeto.idProfessor' , $idProfessor);
		
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
		$this->db->where('projeto.idAluno' , $idAluno);
		
		return $this->db->get()->result();
	}

	public function get_by_aluno($idAluno, $status)
	{
		$this->conectarDB();
		$query = "SELECT * FROM 'projeto' WHERE 'status' = ".$status;
		$this->db->query($query);
		
		return $this->db->get()->result(); 
	}
}