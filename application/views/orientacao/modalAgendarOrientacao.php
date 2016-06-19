<div class="modal-header">
    <h3 class="modal-title">Agendar orientação para <strong>{{ projeto.NomeAluno }}</strong></h3>
</div>
<div class="modal-body ">
    <form name="form_agendar" role="form">
        <div class="row" >
            <div class="col-md-8">    
                <label for="dia">Dia:</label>
                <div class="input-group">
                    <input type="text" name="dia" id="dia" ng-disabled="form_aluno" class="form-control" uib-datepicker-popup="{{format}}" ng-model="form.orientacao.datahora" is-open="popup1.opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats"/>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
                    </span>
                </div>
                <div class="text text-danger "ng-messages="form_agendar.dia.$error" ng-show="form_agendar.dia.$dirty">
                    <div ng-message="required">É obrigatório escolher uma data</div>
                </div>
            </div>
            <div class="form-group col-md-4">
                <uib-timepicker ng-disabled="form_aluno" ng-model="form.orientacao.datahora" ng-change="changed()" hour-step="hstep" minute-step="mstep" show-meridian="false"></uib-timepicker>
            </div>
        </div>    
        
        <div class="row">
            <div class="form-group col-md-6">
                    <label for="local">Local:</label>
                    <input type="text" id="local" ng-disabled="form_aluno" name="local" ng-model="form.orientacao.local" class="form-control" ng-required="true">
                <div class="text text-danger" ng-messages="form_agendar.local.$error" ng-show="form_agendar.local.$dirty">
                    <div ng-message="required">É obrigatório escolher uma data</div>
                </div>
            </div>        
        </div>
        <div class="row">
            <div class=" form-group col-md-12">
                <label for="assunto">Assunto:</label>
                <textarea name="assunto" ng-disabled="form_aluno" ng-model="form.orientacao.assunto" class="form-control" rows="3" id="comment" ng-required="true"></textarea>
                <div class="text text-danger" ng-messages="form_agendar.assunto.$error" ng-show="form_agendar.assunto.$dirty">
                    <div ng-message="required">É obrigatório escolher uma data</div>
                </div>
        </div>
        <div class="row" ng-if="ehRespondivel">
            <div class="form-group">
                <div class="col-md-offset-8 col-md-2">
                    <label><input type="radio" name="opcao" ng-model="form.orientacao.status" value="3">Recusar</label>
                </div>
                <div class="col-md-2">
                    <label><input type="radio" name="opcao" ng-model="form.orientacao.status" value="2">Aceitar</label>
                </div>
            </div>
        </div>
        <div class="row" ng-if="form.orientacao.status == '3'">
            <div class="form-group col-md-12">
                <textarea placeholder="Motivo: Não posso ir porque..." name="motivo" ng-model="form.orientacao.feedback" class="form-control" rows="3" id="motivo" ng-required="true"></textarea>
                <div class="text text-danger" ng-messages="form_agendar.motivo.$error" ng-show="form_agendar.motivo.$dirty">
                    <div ng-message="required">É obrigatório explicar o motivo</div>
                </div>
        </div>
    </form>
    <div ng-show="form_validacao" class="text text-danger" > {{ message }}</div>
</div>
<div class="modal-footer" ng-if="ehRespondivel">
    <input type="button" ng-class="form.orientacao.status == '3' ? 'btn btn-warning center-block' : 'btn btn-success center-block'" ng-click="salvar()" value="Enviar"/> 
</div>