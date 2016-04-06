<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	function __construct(){		
		parent::__construct();
	}
	
	public function index()
	{
		#Passar um array de objetos para a view
		$data = array();
		$arrayName = array('TEste 1','TEste 3','TEste 2');
		$data['aluno'] = 'Thiago';
		$data['arrayName'] = $arrayName;  
		$this->load->view('view_teste',$data);
	}
	public function home()
	{
		echo "View Home";
	}
	public function sobre()
	{
		echo "View Sobre";
	}
	
	public function contato()
	{
		echo "View Contato";
	}
	
	public function aluno (){
	
		#carregar uma model do tipo Aluno
		$this->load->model('aluno');
		
		#carregar um objeto do tipo Aluno
		$model = new Aluno();
		var_dump($model);
		$model->teste();
	}
	
	public function inserirAluno (){
	
		#carregar uma model do tipo Aluno
		$this->load->model('aluno');
		
		#carregar um objeto do tipo Aluno
		$model = new Aluno();
		
		$model->id = 1;
		$model->nome = "Thiago";
		$model->email = "thiago.duarte@outlook.com";
		$model->insert();
		
		$model = new Aluno();
		$model->id = 2;
		$model->nome = "João";
		$model->email = "joao@outlook.com";
		$model->insert();
		
		$model = new Aluno();
		$model->id = 3;
		$model->nome = "Jose";
		$model->email = "jose@outlook.com";
		$model->insert();
		
	}
	
	public function buscarAluno ($id = 0){
	
		#carregar uma model do tipo Aluno
		$this->load->model('aluno');
		
		#carregar um objeto do tipo Aluno
		$model = new Aluno();
		$model = (object) $model->get_by_id($id); 
		var_dump(json_encode($model));
		
	}
	
	public function Alunos ($qtd = 100){
	
		#carregar uma model do tipo Aluno
		$this->load->model('aluno');
		
		#carregar um objeto do tipo Aluno
		$model = new Aluno();
		$model = (object) $model->get_all($qtd); 
		var_dump(json_encode($model));
		
	}
		
	public function professor (){
	
		#Importar uma model do tipo Professor
		$this->load->model('professor');
		
		#criar um objeto do tipo Professor
		$model = new Professor();
		var_dump($model);
		$model->teste();
		echo json_encode($model->get_all());
		
	}
	
	public function areainteresse (){
	
		#Importar uma model do tipo Professor
		$this->load->model('areainteresse');
		
		#criar um objeto do tipo Professor
		$model = new AreaInteresse();
		$model->teste();
		echo json_encode($model->get_all());
		
	}
	
	public function rest(){
		#carregar uma model do tipo Aluno
		$this->load->model('aluno');
		
		#carregar um objeto do tipo Aluno
		$model = new Aluno();
		echo json_encode($model->get_all());
	}
	
	public function Projeto(){
		
		#carregar uma model do tipo Aluno
		$this->load->model('projeto');
		
		#carregar um objeto do tipo Aluno
		$model = new Projeto();
		echo json_encode($model->get_all());
		
	}
}