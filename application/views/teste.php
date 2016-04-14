<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php  echo base_url("/assets/css/bootstrap.min.css")?> ">
	<!-- Optional theme -->
	<link rel="stylesheet" href="<?php  echo base_url("/assets/css/bootstrap-theme.min.css") ?> ">
	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo   base_url("/assets/js/jquery-2.2.3.min.js") ?>"></script>
	<script src="<?php echo   base_url("/assets/js/bootstrap.min.js") ?>"></script>
	<title>Teste</title>

</head>
<body>
    
     <h1> <?php echo $teste ?> </h1>
    <h1> <?php echo $msg ?> </h1>
   <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="/mytcc/teste/login" method="GET" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="<?php echo $email ?>   ">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-lg btn-success btn-block" type="submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            
            
</body>
</html>
                