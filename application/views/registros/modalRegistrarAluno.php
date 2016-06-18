<div class="modal-header">
    <h3 class="modal-title">Ótimo! Aluno!</h3>
</div>
<div class="modal-body">
    <form name="form_aluno" role="form">
        <fieldset class="form-group">
            <label for="inputNome">Qual é o seu nome?</label>
            <input type="text" ng-model="data.aluno.nome" id="inputNome" name="nome" class="form-control" placeholder="Jane Doe" required ng-minlength="6">
            <div ng-messages="form_aluno.nome.$error" ng-if='form_aluno.nome.$dirty'>
                <div ng-message="required">É obrigatório digitar o nome</div>
                <div ng-message="minlength">O nome ainda está muito pequeno</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputEmail">Qual é o seu email?</label>
            <input type="email" ng-model="data.aluno.email" id="inputEmail" name="email" class="form-control" placeholder="jane.barros@example.com">
            <div ng-messages="form_aluno.email.$error" ng-if='form_aluno.email.$dirty'>
                <div ng-message="required">É obrigatório digitar o email</div>
                <div ng-message="email">Email com formato inválido</div>
            </div>	                
        </fieldset>
        <fieldset class="form-group">
            <label for="inputMatricula">Qual é a sua matricula?</label>
            <input type="number" ng-model="data.aluno.matricula" id="inputMatricula" name="matricula" class="form-control" placeholder="Matricula: " required ng-minlength="6">
            <div ng-messages="form_aluno.matricula.$error" ng-if='form_aluno.matricula.$dirty'>
                <div ng-message="required">É obrigatório digitar a matrícula</div>
                <div ng-message="minlength">A matrícula precisa ter pelo menos 6 digitos</div>
            </div>	  
        </fieldset>
        <div ng-show="formInvalido" class="alert alert-warning" > {{ error }}</div>
    </form>
</div>        
<div class="modal-footer">
    <input type="button" class="btn btn-danger" ng-click="back()" value="Voltar"/>     
    <input type="button" class="btn btn-success" ng-click="registrar()" value="Registrar-se"/>
</div>