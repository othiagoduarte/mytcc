<div class="modal-header">
    <h3 class="modal-title">Agendar Orientação</h3>
    <h4>{{ orientacao.aluno.nome }}</h4>
</div>
<div class="modal-body ">
    <div class="form-group row" >
        <div class="col-md-6">    
            <label for="usr">Name:</label>
            <input type="date" ng-model="form.orientacao.data"/>
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Name:</label>
            <input type="time" ng-model="form.orientacao.hora"/>
        </div>
        </div>
        <div class="row">
            <div class=" form-group col-md-12">
                <label for="comment">Descrição:</label>
                <textarea ng-model="form.orientacao.assunto" class="form-control" rows="3" id="comment"></textarea>
            </div>
        </div>
        <div class="row">
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
</div>
<div class="modal-footer">
    <input type="button" class="btn btn-success" ng-click="enviar()" value="Enviar"/> 
</div>