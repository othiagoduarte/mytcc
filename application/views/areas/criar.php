<div  ng-controller="areaController as areaCtrl">
    <h3>Inserir uma nova área</h3> <hr>
    <form name="form_area" role="form">
        <fieldset class="form-group">
            <label for="inputArea">Insira o nome:</label>
            <input type="text" ng-model="areaCtrl.area.descricao" id="inputArea" name="descricao" class="form-control" placeholder="Engenharia de Software" required ng-minlength="5">
            <div ng-messages="form_area.descricao.$error" ng-if='form_area.descricao.$dirty' class="error">
                <div ng-message="required">É obrigatório digitar a descrição</div>
                <div ng-message="minlength">A descrição ainda está muito pequena</div>
            </div>	
        </fieldset>              
        <input type="button" class="btn btn-info" ng-click="areaCtrl.insereArea()" value="Adicionar área de interesse"/>
    </form>        
</div>