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
                        <input id="cpf" name="cpf" class="form-control" type="text" ng-model="dados.cpf">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="control-label col-sm-3">Senha:</label>
                    <div class="col-sm-7">
                        <input id="senha" name="senha" value="" class="form-control" type="password" ng-model="dados.senha">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-7 col-sm-offset-3">
                        <input id="btnLogin" name="btnLogin" value="Log In" class="btn btn-lg btn-default" type="button" ng-click="logar()">
                    </div>
                </div>
            </div>
        </div>
            <div ng-show="formInvalido" class="alert alert-warning" > {{ error }}</div>
    </form>
</div> 