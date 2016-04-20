<body ng-app="mytcc"" ng-controller="solicitacaoController">
<div class="container-fluid">
<div class="row">
	<div class="col-md-12">
		<h3 class="text-primary text-left">
			Solicitar Orientação
		</h3>
	</div>
</div>

	<!--Combobox com as opções de áreas para escolher os professores-->
	<div ng-init="areas = listarAreas()" class="form-group">
		<select ng-options="option.nomeArea for option in areas track by option.id" ng-model="areaSelecionada" class="form-control"></select>
	</div>
	
	<!--Painél com os professores filtrados pela área de interesse-->
	<div ng-init="valores = listarProfessores()" class="row" >
		<div class="col-md-12"> <br>							  				 
					<span class="label label-info">Selecione o professor de sua área de interesse desejada</span>
			<div class="panel-group" id="panel-655984">
				<div class="panel panel-default">
					<div class="panel-heading">
							<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-655984" href="#panel-element-943935">{{ areaSelecionada.nomeArea }}</a>
					</div>
					<div id="panel-element-943935" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="radio" ng-repeat="prof in valores | filter: { idAreaInteresse: areaSelecionada.id }" >
								<label><input type="radio" name="optradio">{{ prof.nome }}</label>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="list-group">
				<a href="#" class="list-group-item active">Projeto TCC</a>
			<div class="list-group-item">
				<div class="form-group">
					<label for="inputdefault">Título do projeto</label>
					<input class="form-control" id="inputdefault" type="text">
				</div>
			</div>
			<div class="list-group-item">
				<span class="label label-info">Descreva qual o problema que o sistema proposto irá solucionar</span>
				<h4 class="list-group-item-heading">
					<textarea class="form-control" rows="10"></textarea>
				</h4>
				<div class="row">
	<div class="col-md-11">
	</div>
	<div class="col-md-1">
			
		<button type="button" class="btn btn-info">limpar</button>
	</div>
</div>
				
			</div>
		
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-10">
	</div>
	<div class="col-md-2">
			
		<button type="button" class="btn btn-success">
			Solicittar Orientação
		</button>
	</div>
</div>
</div>

</body>
</html>