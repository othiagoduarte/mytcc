<?php

//session_start();
//session_name('ci_session');
//
//$config['base_url'] = 'http://localhost:8080/mytcc';
//$config['base_directory'] = 'C:\\xampp\\htdocs\\mytcc\\importacao_alunos\\files_tmp\\';
//$_SESSION['config'] = $config;
//print_r(session_name());
//print_r($_SESSION['config']);


function _base_url($concat) {
    return $_SESSION['config']['base_url'] . $concat;
}
?>
<div>
    <fieldset>
        <legend>Importação de Alunos</legend>
        <form enctype="multipart/form-data" action="<?php echo base_url('alunos/importar_alunos'); ?>" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <input class="btn btn-default" name="userfile" type="file" />
            <p></p>
            <input class="btn btn-default" type="submit" value="Importar" />
        </form>
    </fieldset>
    <br />
    <fieldset>
        <legend>Arquivo exemplo</legend>
        Colunas:
        <pre>Nome;Matricula;E-mail;CPF</pre>
        Conteudo:
<pre>
Carolina Serafim Lauffer;631320075;carolina.serafim.lauffer@gmail.com;133374409
Gabriel Serafim Lauffer;631320072;gabriel.serafim.lauffer@gmail.com;467890000
Angela Serafim Lauffer;631020001;angela.serafim.lauffer@gmail.com;467870000
</pre>
    </fieldset>
    <a class="btn btn-default" href="<?php echo $_SESSION['config']['base_url'].'\\importacao_alunos\\files_tmp\\alunos_teste.csv'; ?>">Download Exemplo</a>
</div>