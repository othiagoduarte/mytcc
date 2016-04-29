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
	}
	
	public function listar()
    {		
		echo json_encode($this->model->get_all());
	}
    
    public function insereSolicitacao()
    {
		var_dump($this->sessionId);
        
        // le o arquivo e converte para string
		$postData = file_get_contents("php://input");
		// retira o objeto do formado json
		$request = json_decode($postData, true);
        
        // insere os dados que vieram do angular nas proriedades da moel
        $this->projetoDB->status = 'wait';
        $this->projetoDB->resumo = $request['resumo'];
        $this->projetoDB->titulo = $request['titulo'];
        $this->projetoDB->idProfessor = $request['idProfessor'];
        $this->projetoDB->idAreaInteresse = $request['idArea'];
        $this->projetoDB->turno = 'Noite';
        $this->projetoDB->idAluno = $this->session->userdata('id');
        
        $this->projetoDB->insert();
    }
    
    public function listaPorStatus($status)
    {
        $this->projetoDB->select('*');
        $this->projetoDB->from('projeto');
        $this->projetoDB->where('status',$status);
        $this->projetoDB->get();
        
        return $this->projetoDB->result();
    }
}