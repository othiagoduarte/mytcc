<div class="modal-header">
    <h3 class="modal-title">Gostaria que o prof(a) me orientasse!</h3>
</div>
<div class="modal-body">
    <div class="row">
	    <div class="col-md-12">
		    <div class="list-group">
			     <a href="#" class="list-group-item active">{{ projeto.NomeAluno}}</a>
			<div class="list-group-item">
				<div class="form-group">
					<label for="inputdefault">Título do projeto</label>
					<input class="form-control" id="inputdefault" type="text" ng-model="projeto.titulo" disabled>
					 <div class="radio">
						  <label>
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
								Noturno
						  </label>
						</div>
				</div>
			</div>
			<div class="list-group-item">
			 <span class="label label-info">Resumo do projeto</span>
				<h4 class="list-group-item-heading">				
					<textarea class="form-control" rows="10" disabled>{{projeto.resumo}}</textarea>
				</h4>
            </div>

<div class="modal-footer">
    <input type="button" class="btn btn-info" ng-click="back()" value="Anterior" ng-show="!back"/>    
    <input type="button" class="btn btn-info" ng-click="next()" value="Próximo" ng-show="!next"/>
    <input type="button" class="btn btn-info" ng-click="response()" value="Responder"/> 
</div>
</div>

    
    
