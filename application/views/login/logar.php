<!--<h3>Digite as suas credênciais</h3>
<hr>
<div ng-app="mytcc" ng-controller="loginController">    
    <form role="form">
    <div class="form-group">
        <label for="email">Endereço de email:</label>
        <input type="email" ng-model="dados.email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Senha:</label>
        <input type="password" ng-model="dados.senha" class="form-control" id="pwd">
    </div>
    <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div>
    <input type="button" ng-click="logar()" class="btn btn-default" value="Entrar"/>
    </form>
    {{ error }}
</div>-->
<style type="text/css">
    .form-login {
        max-width: 500px;
        margin: 20px auto;
    }
</style>
<div id="content" class="container" ng-app="mytcc" ng-controller="loginController">
    <form class="form-login form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-default">Login</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="cpf" class="control-label col-sm-3">CPF:</label>
                    <div class="col-sm-7">
                        <input id="cpf" name="cpf" class="form-control" required="" type="text" ng-model="dados.email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="control-label col-sm-3">Senha:</label>
                    <div class="col-sm-7">
                        <input id="senha" name="senha" value="" class="form-control" required="" type="password" ng-model="dados.senha">
                    </div>
                </div>
                <div class="form-group">
                    <label for="perfil" class="control-label col-sm-3">Perfil:</label>
                    <div class="col-sm-7" >
                        <select class="form-control" id="perfil">
                            <option></option>
                            <option>Professor</option>
                            <option selected="selected">Aluno</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-7 col-sm-offset-3">
                        <input id="btnLogin" name="btnLogin" value="Log In" class="btn btn-lg btn-default" type="button" ng-click="logar()">
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{ error }}
</div> 