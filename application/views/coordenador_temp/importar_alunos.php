<?php
//session_start();
session_name('ci_session');

$config['base_url'] = 'http://localhost:8080/mytcc';
$config['base_directory'] = 'C:\\xampp\\htdocs\\mytcc\\importacao_alunos\\files_tmp\\';
$_SESSION['config'] = $config;

//print_r(session_name());
//print_r($_SESSION['config']);


function _base_url($concat) {
    return $_SESSION['config']['base_url'] . $concat;
}
?>
<div>
    <fieldset>
        <legend>Importação de Alunos</legend>
        <form enctype="multipart/form-data" action="<?php echo base_url('coordenador/importar_alunos'); ?>" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <input class="btn btn-default" name="userfile" type="file" />
            <p></p>
            <input class="btn btn-default" type="submit" value="Importar" />
        </form>
    </fieldset>
</div>