<div ng-app="mytcc" ng-controller="alunoController">
    <h3>Inserir um novo aluno</h3> <hr>
    <form name="form_aluno" role="form">
        <fieldset class="form-group">
            <label for="inputNome">Insira o nome:</label>
            <input type="text" ng-model="aluno.nome" id="inputNome" name="nome" class="form-control" placeholder="Jane Doe" required ng-minlength="6">
            <div ng-messages="form_aluno.nome.$error" ng-if='form_aluno.nome.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o nome</div>
                <div ng-message="minlength">O nome ainda está muito pequeno</div>
            </div>	
        </fieldset>
        <fieldset class="form-group">
            <label for="inputEmail">Insira o email:</label>
            <input type="email" ng-model="aluno.email" id="inputEmail" name="email" class="form-control" placeholder="jane.barros@example.com">
            <div ng-messages="form_aluno.email.$error" ng-if='form_aluno.email.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar o email</div>
                <div ng-message="email">Email com formato inválido</div>
            </div>	                
        </fieldset>
        <fieldset class="form-group">
            <label for="inputMatricula">Insira a matricula:</label>
            <input type="number" ng-model="aluno.matricula" id="inputMatricula" name="matricula" class="form-control" placeholder="Matricula: ">
            <div ng-messages="form_aluno.matricula.$error" ng-if='form_aluno.matricula.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar a matrícula</div>
            </div>	  
        </fieldset>
        <fieldset class="form-group">
            <label for="inputCidade">Insira a cidade:</label>
            <input type="text" ng-model="aluno.cidade" id="inputCidade" class="form-control" placeholder="Cidade: ">
        </fieldset>
        <fieldset class="form-group">
            <label for="inputBairro">Insira o bairro:</label>
            <input type="text" ng-model="aluno.bairro" id="inputBairro" class="form-control" placeholder="Bairro: ">
        </fieldset>
        <fieldset class="form-group">
            <label for="inputTelefone">Insira o telefone:</label>
            <input type="number" ng-model="aluno.telefone" id="inputTelefone" class="form-control" placeholder="Telefone: ">
        </fieldset>
        
        <label for="inputEstado">Selecione o estado::</label>
        <select ng-options="x for x in estados" ng-model="aluno.estado" id="inputEstado "class="form-control"></select> </br>
        
        <input type="button" class="btn btn-success" ng-click="adicionaAluno()" value="Adicionar aluno"/>
    </form>        
</div>