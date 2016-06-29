<?php  $this->load->view('includes/header');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script>  
	$(document).ready(function(){
	    $('.parallax').parallax();
          $(".button-collapse").sideNav();
	});
</script>     
<style>   
.titulo {
	opacity:0.50;
	-moz-opacity: 0.50;
	filter: alpha(opacity=50);
        color: #1063af;
} 
</style>
<div>
    
  	<div class="parallax-container">
		<div class="parallax"><img src="http://fateffir.com.br/assets/images/bg_pic1.jpg"></div>
	    <div class="container center">
           <div>
               <br>
               <br>
               <br>
               <br>
               <br>
               <div class="titulo">
               <h1 >MyTCC 1.0</h1>
                </div>
           </div> 
        </div>        
    </div>    
	<div class="section white">
		<div class="row container">
			<h3 class="header">Assustado com o TCC?</h3>
			<p>Falar sobre TCC e as dificuldades</p>
		</div>
	</div>
</div>

<div class="parallax-container">
	<div class="parallax"><img src="http://www.supercampstaff.com/portals/6/Stanford%203.jpg"></div>
</div>
<div class="section white">
	<div class="row container">
		<h3 class="header">Ou você é professor e esta difícil gerenciar tantas orintações?</h3>
		<div class="row">
			<div class="col s12 m6">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">Card Title</span>
						<p>I am a very simple card. I am good at containing small bits of information.
							I am convenient because I require little markup to use effectively.
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Card Title</span>
							<p>I am a very simple card. I am good at containing small bits of information.
								I am convenient because I require little markup to use effectively.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="parallax-container">
	<div class="parallax"><img src="http://static.squarespace.com/static/54372714e4b02e62e3f5cb96/t/54ae32b8e4b07588aa08d126/1420702392679/Harvard.jpg"></div>
</div>
<div class="section white">
	<div class="row container">
		<h3 class="header">Nos temos uma ótima noticia pra você !!!</h3>
		<p>Basdasd</p>
		</br>
	</div>
</div>
<div class="parallax-container">
	<div class="parallax"><img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/University_of_Windsor_campus_on_August_2006.jpg"></div>
</div>
<div class="section white">
	<div class="row container">
		<h4 class="header">MyTcc</h4>
		<p>
			Mytcc é uma ótima ferramenta para auxiliar você a gerencia TCC's. Com ele é possivel . 
		</p>
		<br><br>
		<div ng-controller="homeController">
			<div ng-show="data.sucesso" class="alert alert-success">{{ data.mensagem }}</div>
			<input class="btn btn-primary btn-lg blue-grey darken-1" type="button" value="Registre-se agora!" ng-click="open()"/> </br> <br>
			<input class="btn btn-info btn-lg blue-grey darken-1" type="button" value="Faça seu login!" ng-click="login()"/> </br>
			<br>
			<div class="text-warning">Coordenador: CPF-> 000101010 Senha-> admin</div>
		</div>
	</div>
</div>
</div>