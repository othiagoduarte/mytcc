<div class="modal-header">
    <h3 class="modal-title">Seja bem-vindo ao MyTCC </h3>
</div>
<div class="modal-body">
    <form name="form_usuario" role="form">
        <fieldset class="form-group">
            <label for="inputCPF">Qual é o seu CPF?</label>
            <input type="number" ng-model="data.usuario.cpf" id="inputCPF" name="cpf" class="form-control" placeholder="022315035422" required ng-minlength="10" required ng-maxlength="12">
            <div ng-messages="form_usuario.cpf.$error" ng-if='form_usuario.cpf.$dirty'>
                <div ng-message="required">É obrigatório digitar o CPF</div>
                <div ng-message="minlength">O mínimo exigido para o CPF são 9 digitos</div>
                <div ng-message="maxlength">O máximo exigido para o CPF são 12 digitos</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputSenha">Digite a sua senha:</label>
            <input type="password" ng-model="data.usuario.senha" id="inputSenha" name="senha" class="form-control" placeholder="SenaC*2016" required>
            <div ng-messages="form_usuario.senha.$error" ng-if='form_usuario.senha.$dirty'>
                <div ng-message="required">É obrigatório digitar a senha</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputConfirma">Digite a sua senha:</label>
            <input type="password" ng-model="data.usuario.conf" id="inputConfirma" name="confirma" class="form-control" required>
            <div ng-messages="form_usuario.confirma.$error" ng-if='form_usuario.confirma.$dirty'>
                <div ng-message="required">É obrigatório confirmar a senha</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputCPF">Qual o seu papel??</label>
            <label class="radio-inline"><input ng-model="data.usuario.tipo" value="p" type="radio" name="optradio" required>Professor</label>
            <label class="radio-inline"><input ng-model="data.usuario.tipo" value="a" type="radio" name="optradio" required>Aluno</label>
        </fieldset>
        <div ng-show="formInvalido" class="alert alert-warning" > {{ error }}</div>
    </form>
</div>        
<div class="modal-footer">
    <input type="button" class="btn btn-danger" ng-click="cancel()" value="Cancelar"/>
    <input type="button" class="btn btn-info" ng-click="next()" value="Adiante"/>  
</div>