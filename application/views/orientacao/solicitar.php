<body ng-app="mytcc" ng-controller="solicitacaoController">

	<div class="row">
		<div class="col-md-12">
			<h3 class="text-primary text-left"> Solicitar Orientação</h3>
		</div>
	</div>

	<form name="form">				
	
	<!--Combobox com as opções de áreas para escolher os professores-->
	<div ng-init="areas = listarAreas()" class="form-group">
		<select ng-options="option.nomeArea for option in areas track by option.id" ng-model="projeto.areaInteresse" class="form-control"></select>
	</div>
	
	<!--Painél com os professores filtrados pela área de interesse-->
	<div ng-init="valores = listarProfessores()" class="row" >
		<div class="col-md-12"> <br>							  				 
					<span class="label label-info">Selecione o professor de sua área de interesse desejada</span>
			<div class="panel-group" id="panel-655984">
				<div class="panel panel-default">
					<div class="panel-heading">
							<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-655984" href="#panel-element-943935">{{ projeto.areaInteresse.nomeArea }}</a>
					</div>
					<div id="panel-element-943935" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="radio" ng-repeat="prof in valores | filter: { idAreaInteresse: projeto.areaInteresse.id }" >
								<label><input ng-model="$parent.projeto.professor" ng-value="prof" type="radio" name="professor">{{ prof.nome }}</label>
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
						<input name="titulo" required ng-minlength="15" ng-maxlength="100" ng-model="projeto.titulo" class="form-control" id="inputdefault" type="text">
							<div ng-messages="form.titulo.$error" role="alert">
								<div ng-message="required">Você precisa informar o título da proposta do TCC para enviar a solicitação</div>
								<div ng-message="minlength">O título da solicitação é muito curto</div>
								<div ng-message="maxlength">O título da solicitação é muito longo</div>
							</div>	
					</div>					
				</div>
				<div class="list-group-item">
					<span class="label label-info">Descreva qual o problema que o sistema proposto irá solucionar</span>
					<h4 class="list-group-item-heading">
						<textarea name="resumo" required ng-minlength="200" ng-model="projeto.resumo" class="form-control" rows="10"></textarea>
					</h4>
						<div ng-messages="form.resumo.$error" role="alert">
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
			<input ng-click="enviaProposta()" type="button" class="btn btn-success" value="Solicitar Orientação"></input>
		</div>
	</div>
	
</form>

</body>
</html>