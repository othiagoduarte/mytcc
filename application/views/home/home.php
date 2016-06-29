<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script>  
    $(document).ready(function(){
        $('.parallax').parallax();
    });
</script>     
<style>   

</style>
<div>
    <div class="parallax-container">
    <div class="parallax"><img src="http://imguol.com/c/noticias/2013/09/02/imagem-para-estudante-colacao-de-grau-formando-formatura-universidade-universitario-1378149204453_1024x768.jpg"></div>
    </div>
    <div class="section white">
    <div class="row container">
        <h3 class="header">Assustado com o TCC?</h3>
            
        <p>Não consegue se organizar?</p> 
    </div>
    </div>
    </div>
    <div class="parallax-container">
    <div class="parallax"><img src="http://www.supercampstaff.com/portals/6/Stanford%203.jpg"></div>
    </div>
    <div class="section white">
    <div class="row container">
        <h3 class="header">Ou você é professor e esta difícil gerenciar tantas orintações?</h3>
        <p>Basdasd</p> </br>
    </div>
    </div>
    <div class="parallax-container">
    <div class="parallax"><img src="http://static.squarespace.com/static/54372714e4b02e62e3f5cb96/t/54ae32b8e4b07588aa08d126/1420702392679/Harvard.jpg"></div>
    </div>
    <div class="section white">
    <div class="row container">
        <h3 class="header">Nos temos uma ótima noticia pra você !!!</h3>
        <p>Basdasd</p> </br>
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
                <input class="btn btn-primary btn-lg" type="button" value="Registre-se agora!" ng-click="open()"/> </br> <br>
                <input class="btn btn-info btn-lg" type="button" value="Faça seu login!" ng-click="login()"/> </br>
                <br>
                <div class="text-warning">Coordenador: CPF-> 000101010 Senha-> admin</div>
            </div>
        </div>
    </div>
</div>    