<h3>Digite as suas credênciais</h3>
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
</div>