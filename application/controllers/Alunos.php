<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alunos extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logado')) {
            redirect('login');
        }

        $this->load->model('stg_cadaluno', 'stdDB', TRUE);
        $this->load->model('aluno', 'model', TRUE);
        $this->load->model('usuario', 'usuarioDB', TRUE);
        $this->load->model('aluno', 'alunoDB', TRUE);
    }

    function index() {
        $this->load->view('includes/prototipo_header');
        $this->load->view('alunos/listar');
        $this->load->view('includes/prototipo_footer');
    }

    function pagina1() {
        $this->load->view('pagina1');
    }

    function pagina2() {
        $this->load->view('pagina2');
    }

    function pagina3() {
        $this->load->view('pagina3');
    }

    function criar() {
        $this->load->view('includes/prototipo_header');
        $this->load->view('coordenador_temp/adicionar_alunos');
        $this->load->view('includes/prototipo_footer');
    }

    public function listar() {
        echo json_encode($this->model->get_all());
    }

    public function insereAluno() {
        // le o arquivo e converte para string
        $postData = file_get_contents("php://input");
        // retira o objeto do formado json
        $request = json_decode($postData);
        // chama o metodo inserir da model aluno p/ inserir os dados no banco
        $this->alunoDB->inserir($request);
    }

    public function deletaAluno() {
        //$id = $_SERVER['QUERY_STRING'];
        $postData = file_get_contents("php://input");
        $request = json_decode($postData);

        $this->alunoDB->remover($request);
    }

    // metodo que a model mAlunoModel usa para efetuar o registro de um aluno
    function registrar() {
        // le o arquivo e converte para string
        $postData = file_get_contents("php://input");
        // retira o objeto do formado json
        $request = json_decode($postData, true);

        try {
            $this->usuarioDB->beginTrans();
            $this->alunoDB->beginTrans();

            // atribui as propriedades do usuario a sua model
            $this->usuarioDB->user = $request['usuario']['cpf'];
            $this->usuarioDB->senha = $request['usuario']['senha'];
            $this->usuarioDB->tipo = $request['usuario']['tipo'];

            $this->usuarioDB->insert();

            $userID = $this->usuarioDB->getLastId();

            // // atribui as propriedades do aluno a sua model
            $this->alunoDB->nome = $request['aluno']['nome'];
            $this->alunoDB->matricula = $request['aluno']['matricula'];
            $this->alunoDB->email = $request['aluno']['email'];
            $this->alunoDB->endereco = $request['aluno']['endereco'];
            $this->alunoDB->telefone = $request['aluno']['telefone'];
            $this->alunoDB->cidade = $request['aluno']['cidade'];
            $this->alunoDB->estado = $request['aluno']['estado'];
            $this->alunoDB->bairro = $request['aluno']['bairro'];
            $this->alunoDB->cpf = $request['usuario']['cpf'];
            $this->alunoDB->idUsuario = $userID;

            $this->alunoDB->insert();
            $alunoID = $this->alunoDB->getLastId();

            $this->usuarioDB->commit();
            $this->alunoDB->commit();

            // registra o login nos cookies
            $data = array();
            $data['id'] = $alunoID;
            $data['nome'] = $this->alunoDB->nome;
            $data['tipo'] = 'a';
            $data['logado'] = 'true';
            $this->session->set_userdata($data);
        }
        // nao esta funcionando, configuracoes do codeigniter
        catch (Exception $e) {
            $this->usuarioDB->rollback();
            $this->alunoDB->rollback();
            echo '{"data": "Exception occurred: ' . $e->getMessage() . '"}';
            var_dump($e);
        }
    }

    function importar_alunos() {
        //echo 'teste';
        //echo '<pre>';
        //print_r($_SESSION);
        //echo '</pre>';

        $uploaddir = $_SESSION['config']['base_directory'];
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

        echo '<pre>';
        try {
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                echo "Arquivo valido e enviado com sucesso.\n";
            } else {
                echo "Nao foi possivel enviar o arquivo!\n";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $file = fopen($uploadfile, "r");
        
        $this->stdDB->deleteAll();
        
        $intLinha = 0;
        while ($linha = fgetcsv($file, 0, ';')) {
            //$conteudoArquivo[] = '\'' . $linha[0] . '\',' . $linha[1] . ',\'' . $linha[2] . '\',\'' . $linha[3] . '\'';
            $this->stdDB->id_linha = $intLinha++;
            $this->stdDB->nome = $linha[0];
            $this->stdDB->matricula = $linha[1];
            $this->stdDB->email = $linha[2];
            $this->stdDB->cpf = $linha[3];
            
            $this->stdDB->custInsert();
        }
        fclose($file);

        

        $this->stdDB->procedure();
    }

}
