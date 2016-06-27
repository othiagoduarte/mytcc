<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Projetos extends CI_Controller 
{
	public $sessionId = 0;
    
    public function __construct()
    {		
		parent::__construct();
		
        if (!$this->session->userdata('logado'))
        {
            redirect('login');
        }          	

		$this->load->model('projeto','projetoDB');        		
	}

	// carrega views
    
    public function solicitar()
	{
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('projetos/solicitar');
	    $this->load->view('includes/prototipo_footer');	 
	} 
	
	public function responder()
	{    
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('projetos/responder');
	    $this->load->view('includes/prototipo_footer');	 
	}
	
	public function listar()
	{	    
	    $this->load->view('includes/prototipo_header');
	    $this->load->view('projetos/listar');
	    $this->load->view('includes/prototipo_footer');	 
	}

	function detalhes()
	{
		$this->load->view('projetos/modalDetalhes');
	}
	
	function resposta()
	{
		$this->load->view('projetos/modalResposta');
	}
	
	// metodos chamados pelo front end pra trazer dados
    
    function meuProjeto()
    {
        $idAluno = $this->session->userdata('id');

        echo json_encode($this->projetoDB->meuProjeto($idAluno));
    }
    
    public function listarSolicitacoes()
	{
		$solicitacoes = $this->projetoDB->get_professor($sessionId);
		echo json_encode(solicitacoes);
	}
    
    public function insereSolicitacao()
    {        
        // le o arquivo e converte para string
		$postData = file_get_contents("php://input");
		// retira o objeto do formado json
		$request = json_decode($postData, true);

        // insere os dados que vieram do angular nas proriedades da model
        $this->projetoDB->idAluno = $this->session->userdata('id');
        $this->projetoDB->idAreaInteresse = $request['areaInteresse']['id'];
        $this->projetoDB->idProfessor = $request['professor']['idProfessor'];
        $this->projetoDB->titulo = $request['titulo'];        
        $this->projetoDB->status = 1;
        $this->projetoDB->resumo = $request['resumo'];
        $this->projetoDB->turno = 'Noite';
        $this->projetoDB->idAluno = $this->session->userdata('id');
        $date = new DateTime();
        $this->projetoDB->dataSolicitacao = $date->format('Y-m-d');
        
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
        $date = new DateTime();
        
        $where = array('id'=>$request['id']);
        $data = array('status'=>$request['statusProjeto'], 'mensagem'=>$request['mensagem'], 'dataResposta'=>$date->format('Y-m-d'));       
                                       
        // insere a resposta do professor, sendo positiva ou negativa
        $this->projetoDB->updateRowWhere($where,$data);

        // procura pelas outras solicitacoes enviadas pelo mesmo aluno e  atualiza elas pra invalidas: status 6
        $projeto = $this->get_by_id($request['id']);
        $idAluno = $projeto->idAluno;
        $projetos = $this->projetoDB->get_by_aluno($idAluno, "1"); // 1 eh enviado

    }
}