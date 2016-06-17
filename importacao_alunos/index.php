<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyTCC: É agora!</title>

    <?php
    session_start();
    session_name('mytcc');
    
    $config['base_url'] = 'http://localhost:8080/mytcc';
    $config['base_directory'] = 'C:\\xampp\\htdocs\\mytcc\\importacao_alunos\\files_tmp\\';
    $_SESSION['config'] = $config;

    function base_url($concat) {
        return $_SESSION['config']['base_url'] . $concat;
    }
    ?>

    <script src="<?php echo base_url("assets/js/ui-bootstrap-tpls-1.3.2.min.js") ?>"></script>            

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("/assets/css/bootstrap.min.css") ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url("/assets/bower_components/metisMenu/dist/metisMenu.min.css") ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("/assets/dist/css/sb-admin-2.css") ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url("/assets/bower_components/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css">    
</head>
<body >
    <div>
        <form enctype="multipart/form-data" action="<?php echo base_url('/importacao_alunos/import_file.php'); ?>" method="POST">
            <!-- MAX_FILE_SIZE deve preceder o campo input -->
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <!-- O Nome do elemento input determina o nome da array $_FILES -->
            Enviar esse arquivo: <input name="userfile" type="file" />
            <input type="submit" value="Enviar arquivo" />
        </form>
    </div>
</body>
<footer>	
    <!-- jQuery -->
    <script src="<?php echo base_url("/assets/bower_components/jquery/dist/jquery.min.js") ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("/assets/bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url("/assets/bower_components/metisMenu/dist/metisMenu.min.js") ?>"></script>
    <script src="<?php echo base_url("/assets/dist/js/sb-admin-2.js") ?>"></script>
</footer>