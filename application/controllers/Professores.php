<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professores extends CI_Controller {

	function __construct()
	{		
		parent::__construct();

		if ( ! $this->session->userdata('logado')){
            redirect('login');
        }
		 
		$this->load->model('professor','model');			
		$this->load->model('usuario', 'usuarioDB', TRUE);
		$this->load->model('professor','professorDB', TRUE);				

	}
	
	public function index(){
		echo "Interface de cadastro de professor";
	}
	// funcao criada para trazer a modal de registrar professor
	function registrarProfessor()
	{
		$this->load->view('registros/modalRegistrarProfessor');
	}
	
	public function listar()
	{		
		echo json_encode($this->professorDB->get_all());
	}
	// metodo que a model mProfessorModel usa para efetuar o registro de um professor
	function registrar()
	{
		// le o arquivo e converte para string
		$postData = file_get_contents("php://input");
		// retira o objeto do formado json
		$request = json_decode($postData, true);
		
		try
		{
			$this->usuarioDB->beginTrans();
			$this->professorDB->beginTrans();
			
			// atribui as propriedades do usuario a sua model
			$this->usuarioDB->user = $request['usuario']['cpf'];
			$this->usuarioDB->senha = $request['usuario']['senha'];
			$this->usuarioDB->tipo = $request['usuario']['tipo'];
			
			$this->usuarioDB->insert();
			
			$userID = $this->usuarioDB->getLastId();
			
			// atribui as propriedades do aluno a sua model
			$this->professorDB->nome = $request['professor']['nome'];
			$this->professorDB->matricula = $request['professor']['matricula'];
			$this->professorDB->email = $request['professor']['email'];
			$this->professorDB->endereco = $request['professor']['endereco'];
			$this->professorDB->telefone = $request['professor']['telefone'];
			$this->professorDB->cidade = $request['professor']['cidade'];
			$this->professorDB->estado = $request['professor']['estado'];
			$this->professorDB->bairro = $request['professor']['bairro'];
			$this->professorDB->cpf = $request['usuario']['cpf'];
			$this->professorDB->numVagas = $request['professor']['vagas'];
			$this->professorDB->turnoDia = $request['professor']['turnoDia'];
			$this->professorDB->turnoNoite = $request['professor']['turnoNoite'];
			$this->professorDB->idUsuario = $userID;
			
			$this->professorDB->insert();
			$professorID = $this->professorDB->getLastId();
			
			$this->usuarioDB->commit();
			$this->professorDB->commit();	
			
			// registra o login nos cookies
			$data = array();
			$data['id'] = $professorID;
		    $data['nome'] = $this->professorDB->nome;
			$data['logado'] = 'true';
		    $this->session->set_userdata($data);
		} 
		// nao esta funcionando, configuracoes do codeigniter
		catch(Exception $e)
		{
			$this->usuarioDB->rollback();
			$this->professorDB->rollback();
			echo '{"data": "Exception occurred: '.$e->getMessage().'"}';
			var_dump($e);
		}	
	}
}