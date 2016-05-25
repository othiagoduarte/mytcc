<div class="modal-header">
    <h3 class="modal-title">Ótimo! Professor!</h3>
</div>

<div class="modal-body">
    <form name="form_professor" role="form">
        <fieldset class="form-group">
            <label for="inputCPF">Disponibilidade:</label>
            <label class="checkbox-inline"><input ng-model="data.professor.turnoDia" type="checkbox" name="disponibilidade">Dia</label>
            <label class="checkbox-inline"><input ng-model="data.professor.turnoNoite" type="checkbox" name="disponibilidade">Noite</label>
        </fieldset>    
        <fieldset class="form-group">
            <label for="inputVagas">Quantas vagas disponíveis neste semestre?</label>
            <input type="number" ng-model="data.professor.vagas" id="inputVagas" name="vagas" class="form-control" placeholder="1">
        </fieldset>    
        <fieldset class="form-group">
            <label for="inputNome">Qual é o seu nome?</label>
            <input type="text" ng-model="data.professor.nome" id="inputNome" name="nome" class="form-control" placeholder="Jane Doe" required ng-minlength="6">
            <div ng-messages="form_professor.nome.$error" ng-if='form_professor.nome.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o nome</div>
                <div ng-message="minlength">O nome ainda está muito pequeno</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputEmail">Qual é o seu email?</label>
            <input type="email" ng-model="data.professor.email" id="inputEmail" name="email" class="form-control" placeholder="jane.barros@example.com">
            <div ng-messages="form_professor.email.$error" ng-if='form_professor.email.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o email</div>
                <div ng-message="email">Email com formato inválido</div>
            </div>	                
        </fieldset>
        <fieldset class="form-group">
            <label for="inputMatricula">Qual é a sua matricula?</label>
            <input type="number" ng-model="data.professor.matricula" id="inputMatricula" name="matricula" class="form-control" placeholder="Matricula: ">
            <div ng-messages="form_professor.matricula.$error" ng-if='form_professor.matricula.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar a matrícula</div>
            </div>	  
        </fieldset>
        <div ng-show="formInvalido" class="alert alert-warning" > {{ error }}</div>
    </form>
</div>        
<div class="modal-footer">
        <input type="button" class="btn btn-danger" ng-click="back()" value="Voltar"/>     
    <input type="button" class="btn btn-success" ng-click="registrar()" value="Registrar-se"/>
</div>