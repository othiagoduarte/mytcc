<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends CI_Controller 
{
	public $sessionId = 0;
    
    public function __construct()
    {		
		parent::__construct();
		
        if ( ! $this->session->userdata('logado')){
            redirect('login');
        }          	

		$this->load->model('projeto','projetoDB');
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
        
        // insere os dados que vieram do angular nas proriedades da model
        $this->projetoDB->idAluno = $this->session->userdata('id');
        $this->projetoDB->idProfessor = $request['idProfessor'];
        $this->projetoDB->titulo = $request['titulo'];        
        $this->projetoDB->status = 'wait';
        $this->projetoDB->resumo = $request['resumo'];
        $this->projetoDB->idAreaInteresse = $request['idArea'];
        $this->projetoDB->turno = 'Noite';
        $this->projetoDB->idAluno = $this->session->userdata('id');
        
        $this->projetoDB->insert();
    }
        
    public function listarProjetosPorProfessor()
    {        
        $idProfessor = $this->session->userdata('id');
        
        echo json_encode($this->projetoDB->get_projeto_by_professor($idProfessor));        
    }
    
    function insereRespostaProfessor()
    {
        // le o arquivo e converte para string
		$postData = file_get_contents("php://input");
		// retira o objeto do formado json
		$request = json_decode($postData, true);
        
        $project = $this->projetoDB->get_by_id($request['id']);       
        
        $this->projetoDB->id = $project->id;      
        $this->projetoDB->idAluno = $project->idAluno;
        $this->projetoDB->idProfessor = $project->idProfessor;
        $this->projetoDB->titulo = $project->titulo;
        $this->projetoDB->resumo = $project->resumo;
        $this->projetoDB->idAreaInteresse = $project->idAreaInteresse;
        $this->projetoDB->turno = 'Noite';
        $this->projetoDB->dataSolicitacao = $project->dataSolicitacao;      
        $this->projetoDB->mensagem = $request['mensagem'];
        $this->projetoDB->statusProjeto = 2; //respondido        
        $this->projetoDB->dataResposta = date('Y-m-d H:i:s');             
        
        $this->projetoDB->update();
    }
}