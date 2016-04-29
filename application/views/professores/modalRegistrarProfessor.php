<div class="modal-header">
    <h3 class="modal-title">Ótimo! Professor!</h3>
</div>

<!--<uib-progressbar class="progress-striped active" max="200" value="166" type="info"><i>166 / 200</i></uib-progressbar>-->

<div class="modal-body">
    <form name="form_professor" role="form">
        <fieldset class="form-group">
            <label for="inputNome">Qual é o seu nome?</label>
            <input type="text" ng-model="professor.nome" id="inputNome" name="nome" class="form-control" placeholder="Jane Doe" required ng-minlength="6">
            <div ng-messages="form_professor.nome.$error" ng-if='form_professor.nome.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o nome</div>
                <div ng-message="minlength">O nome ainda está muito pequeno</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputEmail">Qual é o seu email?</label>
            <input type="email" ng-model="professor.email" id="inputEmail" name="email" class="form-control" placeholder="jane.barros@example.com">
            <div ng-messages="form_professor.email.$error" ng-if='form_professor.email.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o email</div>
                <div ng-message="email">Email com formato inválido</div>
            </div>	                
        </fieldset>
        <fieldset class="form-group">
            <label for="inputMatricula">Qual é a sua matricula?</label>
            <input type="number" ng-model="professor.matricula" id="inputMatricula" name="matricula" class="form-control" placeholder="Matricula: ">
            <div ng-messages="form_professor.matricula.$error" ng-if='form_professor.matricula.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar a matrícula</div>
            </div>	  
        </fieldset>
        <fieldset class="form-group">
            <label for="inputCidade">Qual é a sua cidade?</label>
            <input type="text" ng-model="professor.cidade" id="inputCidade" class="form-control" placeholder="Cidade: ">
        </fieldset>
        <fieldset class="form-group">
            <label for="inputBairro">Qual é o seu bairro?</label>
            <input type="text" ng-model="professor.bairro" id="inputBairro" class="form-control" placeholder="Bairro: ">
        </fieldset>
        <fieldset class="form-group">
            <label for="inputTelefone">Qual é seu telefone?</label>
            <input type="number" ng-model="professor.telefone" id="inputTelefone" class="form-control" placeholder="Telefone: ">
        </fieldset>
        
        <label for="inputEstado">Selecione o estado:</label>
        <select ng-options="x for x in estados" ng-model="professor.estado" id="inputEstado "class="form-control"></select>
    </form>
</div>        
<div class="modal-footer">
        <input type="button" class="btn btn-danger" ng-click="back()" value="Voltar"/>     
    <input type="button" class="btn btn-success" ng-click="adicionaProfessor()" value="Registrar-se"/>
</div>