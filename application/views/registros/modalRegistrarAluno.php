<div class="modal-header">
    <h3 class="modal-title">Ótimo! Aluno!</h3>
</div>

<!--<uib-progressbar class="progress-striped active" max="200" value="166" type="info"><i>166 / 200</i></uib-progressbar>-->

<div class="modal-body">
    <form name="form_aluno" role="form">
        <fieldset class="form-group">
            <label for="inputNome">Qual é o seu nome?</label>
            <input type="text" ng-model="data.aluno.nome" id="inputNome" name="nome" class="form-control" placeholder="Jane Doe" required ng-minlength="6">
            <div ng-messages="form_aluno.nome.$error" ng-if='form_aluno.nome.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o nome</div>
                <div ng-message="minlength">O nome ainda está muito pequeno</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputEmail">Qual é o seu email?</label>
            <input type="email" ng-model="data.aluno.email" id="inputEmail" name="email" class="form-control" placeholder="jane.barros@example.com">
            <div ng-messages="form_aluno.email.$error" ng-if='form_aluno.email.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o email</div>
                <div ng-message="email">Email com formato inválido</div>
            </div>	                
        </fieldset>
        <fieldset class="form-group">
            <label for="inputMatricula">Qual é a sua matricula?</label>
            <input type="number" ng-model="data.aluno.matricula" id="inputMatricula" name="matricula" class="form-control" placeholder="Matricula: " required ng-minlength="6">
            <div ng-messages="form_aluno.matricula.$error" ng-if='form_aluno.matricula.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar a matrícula</div>
                <div ng-message="minlength">A matrícula precisa ter pelo menos 6 digitos</div>
            </div>	  
        </fieldset>
        <fieldset class="form-group">
            <label for="inputCidade">Qual é a sua cidade?</label>
            <input type="text" ng-model="data.aluno.cidade" id="inputCidade" name="cidade" class="form-control" placeholder="Cidade: " required>
            <div ng-messages="form_aluno.cidade.$error" ng-if='form_aluno.cidade.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar a cidade</div>
                <div ng-message="minlength">A matrícula precisa ter pelo menos 6 digitos</div>
            </div>	 
        </fieldset>
        <fieldset class="form-group">
            <label for="inputBairro">Qual é o seu bairro?</label>
            <input type="text" ng-model="data.aluno.bairro" id="inputBairro" name="bairro" class="form-control" placeholder="Bairro: " required>
            <div ng-messages="form_aluno.bairro.$error" ng-if='form_aluno.bairro.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o bairro</div>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label for="inputTelefone">Qual é seu telefone?</label>
            <input type="number" ng-model="data.aluno.telefone" id="inputTelefone" name="telefone" class="form-control" placeholder="Telefone: " required required ng-minlength="10" required ng-maxlength="12">
            <div ng-messages="form_aluno.telefone.$error" ng-if='form_aluno.telefone.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o telefone</div>
                <div ng-message="minlength">O telefone precisa ter pelo menos 10 digitos</div>
                <div ng-message="maxlength">A matrícula precisa ter no máximo 12 digitos</div>
            </div>
        </fieldset>
         <fieldset class="form-group">
            <label for="inputEstado">Selecione o estado:</label>
            <select ng-options="x for x in estados" ng-model="data.aluno.estado" id="inputEstado "class="form-control"></select>
        </fieldset>
        <div ng-show="formInvalido" class="alert alert-warning" > {{ error }}</div>
    </form>
</div>        
<div class="modal-footer">
    <input type="button" class="btn btn-danger" ng-click="back()" value="Voltar"/>     
    <input type="button" class="btn btn-success" ng-click="registrar()" value="Registrar-se"/>
</div>