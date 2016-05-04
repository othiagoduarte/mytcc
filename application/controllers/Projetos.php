<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends CI_Controller 
{
	public $sessionId = 0;
    
    function __construct()
    {		
		parent::__construct();
		$this->load->model('projeto','projetoDB');
        $this->load->library('session');
        $sessionId = $this->session->userdata('id');
        
        $this->load->helper('date');		
	}
	
	public function listar()
    {		
		echo json_encode($this->projetoDB->get_all());
	}
    
    public function insereSolicitacao()
    {        
        // le o arquivo e converte para string
		$postData = file_get_contents("php://input");
		// retira o objeto do formado json
		$request = json_decode($postData, true);
        
        // insere os dados que vieram do angular nas proriedades da moel
        $this->projetoDB->idAluno = $this->session->userdata('id');
        $this->projetoDB->idProfessor = $request['idProfessor'];
        $this->projetoDB->titulo = $request['titulo'];
        $this->projetoDB->resumo = $request['resumo'];
        $this->projetoDB->idAreaInteresse = $request['idArea'];
        $this->projetoDB->turno = 'Noite';
        $this->projetoDB->statusProjeto = 1; //aguardando        
        $this->projetoDB->dataSolicitacao = date('Y-m-d H:i:s');        
        
        $this->projetoDB->insert();
    }
    
    public function listaPorStatus()
    {        
        return $this->projetoDB->join_AreaInteresse();
        echo json_encode($this->projetoDB->get_all());
    }
    
    public function join_AreaInteresse()
	{
		$this->projetoDB->select('*');
        $this->projetoDB->from('projeto');
        $this->projetoDB->join('statusProjeto');
        $this->projetoDB->where('projeto.idAreaInteresse == statusProjeto.id');        
		$query = $this->projetoDB->get(); 
		return $query->result();
	}
}