<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyTCC: É agora!</title>
</head>
<body >
    <?php
    session_start();
    session_name('mytcc');
    //echo "\$_SESSION <br />";
    //var_dump($_SESSION);
    //echo "\$_POST <br />";
    //var_dump($_POST);
    //echo "\$_FILES <br />";
    //var_dump($_FILES);

    $uploaddir = $_SESSION['config']['base_directory'];
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre>';
    try {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Arquivo valido e enviado com sucesso.\n";
        } else {
            echo "Possivel ataque de upload de arquivo!\n";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }

    //echo 'Aqui esta mais informacoes de debug:';
    //print_r($_FILES);

    $file = fopen($uploadfile, "r");
    //echo 'Conteudo do arquivo:<br />';
    //$conteudoArquivo = array();
    while ($linha = fgetcsv($file, 0, ';')) {
        //print_r($linha);
        $conteudoArquivo[] = '\'' . $linha[0] . '\',' . $linha[1] . ',\'' . $linha[2] . '\',\'' . $linha[3] . '\'';
    }
    fclose($file);

    //print_r($conteudoArquivo);

    $queryDelete = 'DELETE FROM stg_cadaluno; ';
    $query = '';
    $query .= 'INSERT INTO stg_cadaluno(';
    $query .= '	id_linha, nome, matricula, email, cpf';
    $query .= ') VALUES ';
    $numeroLinha = 1;
    foreach ($conteudoArquivo as $linhaArquivo) {
        $query .= '(' . $numeroLinha++ . ',' . $linhaArquivo . '),';
    }
    $query = substr($query, 0, strlen($query) - 1) . ';';
    //var_dump($query);
    //echo $query;
    print "</pre>";

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $baseDados = 'mytcc';


    try {
        if (!$conexao = mysql_connect($servidor, $usuario, $senha)) {
            echo 'Erro ao conectar.(101)';
            exit;
        } else {
            //echo 'Conectado.(101)';
        }
        if (!mysql_select_db($baseDados, $conexao)) {
            //echo 'Erro ao conectar.(102)';
            exit;
        } else {
            //echo 'Conectado.(102)';
        }
    } catch (Exception $ex) {
        //throw new Exception($ex->getMessage(), $ex->getCode());
        echo 'Erro: ' . $ex->getMessage() . ' - Cod.: ' . $ex->getCode();
    }

    try {
        //echo 'Consulta: '.$query;
        $resultadoConsulta = mysql_query($queryDelete, $conexao);
        $resultadoConsulta = mysql_query($query, $conexao);
        $resultadoConsulta = mysql_query('CALL sp_importa_alunos(@retorno);', $conexao);
        echo 'Consulta executada.<br />';
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    echo '<br /><br /><pre>';
    //print_r($resultadoConsulta);
    echo 'Sucesso</pre>';

    if (!mysql_close($conexao)) {
        echo 'Erro ao desconectar.(103)';
    } else {
        echo 'Desconectado.(103)';
    }
    ?>
</body>