<style type="text/css">
    .main {
        max-width: 500px;
        margin: 20px auto;
    }
</style>
<div class="main">
    <br>
    <br>
    <br>
<h3>MyTCC - Integrando orientandos e orientadores.</h3>
<hr>
<p>Bem-vindo ao <strong>MyTCC</strong>. Aplicação criada por estudantes do SENACRS em 2016/1.</p> </br>

<div ng-controller="homeController">
    
    <div ng-show="data.sucesso" class="alert alert-success">{{ data.mensagem }}</div>

    <input class="btn btn-primary btn-lg" type="button" value="Registre-se agora!" ng-click="open()"/> </br> <br>
    <input class="btn btn-info btn-sm" type="button" value="Feedback" ng-click="setFeedBack()"/> </br>
    	
    </div>

</div>
</div>


