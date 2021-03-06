<div ng-controller="solicitacaoController as ctrl">

<div ng-if="ctrl.orientado">
</br>
	<div class="alert alert-info" ng-click="open()">
	Parabéns, <strong>{{ctrl.projeto.NomeAluno}}</strong>! A sua proposta foi aceita pelo professor <strong>{{ctrl.projeto.NomeProfessor}}</strong>.</br>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<div class="list-group">
			    	 <a href="#" class="list-group-item active">{{ ctrl.projeto.NomeAluno}}</a>
				<div class="list-group-item">
				<div class="form-group">
					<label for="inputdefault">Título do projeto</label>
					<input class="form-control" id="inputdefault" type="text" ng-model="ctrl.projeto.titulo" disabled>
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
					<textarea class="form-control" rows="10" disabled>{{ ctrl.projeto.resumo}}</textarea>
				</h4>
			</div>
		</div>
		</div>
		</div>
		</div>
</div>

<div ng-if="!ctrl.orientado">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-primary text-left"> Solicitar Orientação</h3>
		</div>
	</div>
	<form name="form">				
	<!--Combobox com as opções de áreas para escolher os professores-->
	<div class="form-group">
		<span class="label label-info">Selecione a área de interesse</span>
		<select ng-model="ctrl.projeto.areaInteresse" ng-options="option.descricao for option in ctrl.areas track by option.id" class="form-control">
			<option value="">Selecione</option>
		</select>
	</div>
	
	<!--Painél com os professores filtrados pela área de interesse-->
	<div class="row" >
		<div class="col-md-12"> <br>							  				 
					<span class="label label-info">Selecione o professor de sua área de interesse desejada</span>
			<div class="panel-group" id="panel-655984">
				<div class="panel panel-default">
					<div class="panel-heading">
							<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-655984" href="#panel-element-943935">{{ ctrl.projeto.areaInteresse.descricao }}</a>
					</div>
					<div id="panel-element-943935" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="radio" ng-repeat="prof in ctrl.professor_area | filter: { idAreaInteresse: ctrl.projeto.areaInteresse.id }">
								<label><input ng-model="$parent.ctrl.projeto.professor" ng-value="prof" type="radio" name="professor">{{ prof.nome }}</label>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!--Formulário com o espaço para o usuário digitar o titulo e a proposta de tcc.-->
	<div class="row">
		<div class="col-md-12">
			<div class="list-group">
					<a href="#" class="list-group-item active">Projeto TCC</a>
				<div class="list-group-item">
					<div class="form-group">
						<label for="inputdefault">Título do projeto</label>
						<input name="titulo" required ng-minlength="15" ng-maxlength="100" ng-model="ctrl.projeto.titulo" class="form-control" id="inputdefault" type="text">
							<div ng-messages="form.titulo.$error" ng-if='form.titulo.$dirty' class="text text-danger">
								<div ng-message="required">Você precisa informar o título da proposta do TCC para enviar a solicitação</div>
								<div ng-message="minlength">O título da solicitação é muito curto</div>
								<div ng-message="maxlength">O título da solicitação é muito longo</div>
							</div>	
					</div>					
				</div>
				<div class="list-group-item">
					<span class="label label-info">Descreva qual o problema que o sistema proposto irá solucionar</span>
					<h4 class="list-group-item-heading">
						<textarea name="resumo" required ng-minlength="200" ng-model="ctrl.projeto.resumo" class="form-control" rows="10"></textarea>
					</h4>
						<div ng-messages="form.resumo.$error" ng-if='form.resumo.$dirty' class="text text-danger">
							<div ng-message="required">Você precisa informar a proposta da proposta do TCC para enviar a solicitação</div>
							<div ng-message="minlength">A proposta está muito sucinta. Escreva mais.</div>
						</div>
	<!--Botão limpar do formulário-->
	<div class="row">
		<div class="col-md-11">
		</div>
		<div class="col-md-1">				
			<input ng-click="limpaCampos()" type="button" class="btn btn-info" value="Limpar"></input>					
		</div>
		</div>
	</div>
	
	<!--Botão enviar solicitação do formulário-->
	<div class="row">
		<div class="col-md-10">
		</div>
		<div class="col-md-2">				
			<input ng-disabled="form.resumo.$invalid"ng-click="ctrl.enviaProposta()" type="button" class="btn btn-success" value="Solicitar Orientação"></input>
		</div>
	</div>
</form>
	<div ng-show="ctrl.sucesso" class="alert alert-success">Solicitação enviada com sucesso. Aguarde o feedback do professor.</div>
</div>
</div>