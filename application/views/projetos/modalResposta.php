<div class="modal-header">
    <h3 class="modal-title">Dê o seu feedback à proposta</h3>
</div>
<div class="modal-body">
    <div class="row">
	    <div class="col-md-12">
		    <div class="list-group">
			     <a href="#" class="list-group-item active">{{ projeto.NomeAluno}}</a>
			<div class="list-group-item">
				<div class="form-group">
		<label for="inputdefault">Você aceita a proposta?</label>
		<fieldset class="form-group">
            <label class="radio-inline"><input ng-model="r" type="radio" name="optradio" value="a">Aceito</label>
            <label class="radio-inline"><input ng-model="r" type="radio" name="optradio" value="r">Recuso</label>
        </fieldset>
				</div>
			</div>
			<div class="list-group-item">
			 <span class="label label-info">Insira uma mensagem justificando a sua decisão</span>
				<h4 class="list-group-item-heading">				
					<textarea ng-model="projeto.mensagem"class="form-control" rows="10" ></textarea>
				</h4>
            </div>			
	<div class="modal-footer">
		<input ng-show="r != 'i'" ng-class="r == 'a' ? 'btn btn-success center-block' : 'btn btn-warning center-block'" type="button" ng-click="response()" value="Enviar resposta"/> 
	</div>
</div>

    
    
