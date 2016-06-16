<div class="modal-header">
    <h3 class="modal-title">Agendar orientação para <strong>{{ projeto.NomeAluno }}</strong></h3>
</div>
<div class="modal-body ">
    <div class="row" >
        <div class="col-md-8">    
            <label for="usr">Dia:</label>
            <div class="input-group">
                <input type="text" ng-disabled="form_aluno" class="form-control" uib-datepicker-popup="{{format}}" ng-model="form.orientacao.datahora" is-open="popup1.opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
                </span>
            </div>
        </div>
        <div class="form-group col-md-4">
            <uib-timepicker ng-disabled="form_aluno" ng-model="form.orientacao.datahora" ng-change="changed()" hour-step="hstep" minute-step="mstep" show-meridian="false"></uib-timepicker>
        </div>
    </div>    
    
    <div class="row">
        <div class="form-group col-md-6">
                <label for="comment">Local:</label>
                <input type="text" ng-disabled="form_aluno" ng-model="form.orientacao.local" class="form-control">
        </div>        
    </div>
    <div class="row">
        <div class=" form-group col-md-12">
            <label for="comment">Assunto:</label>
            <textarea ng-disabled="form_aluno" ng-model="form.orientacao.assunto" class="form-control" rows="3" id="comment"></textarea>
        </div>
    </div>
        <div class="row" ng-hide="! editar" ng-show="form_aluno">
            <div class=" form-group ">
                <div class="col-md-offset-8 col-md-2">
                    <label><input  valided type="radio" name="optradio">Recusar</label>
                </div>
                <div class="col-md-2">
                    <label><input valided  type="radio" name="optradio">Aceitar</label>
                </div>
            </div>
        </div>
    </div>
    <div ng-show="form_validacao" class="text text-danger" > {{ message }}</div>
</div>
<div class="modal-footer">
    <input type="button" class="btn btn-success" ng-click="salvar()" value="Enviar"/> 
</div>