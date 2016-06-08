<div class="col-md-12" ng-controller="projetoController" ng-init="projetos = listaProjetos()">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-left text-primary">
				Solicitações de Orientação
			</h3>
		</div>
	</div>
	
	<div ng-show="data.sucesso" class="alert alert-success">{{ data.mensagem }}</div>
	
	<!--Painel com as solicitacoes ja aceitas-->
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class=" glyphicon glyphicon-user" aria-hidden="true"></span>
			<a class="panel-title" data-toggle="collapse" data-parent="#panel-95759" href="#panel-element-549991">Alunos Orientando</a>
		</div>
		<div id="panel-element-549991" class="panel-collapse collapse">
			<div class="panel-body">
				<table class="table table-condensed table-striped" >
					<thead>
						<th>Aluno</th>
						<th>Área de interesse</th>
						<th>Data da solicitação	</th>
					</thead>
					<tbody>
						<tr ng-repeat="projeto in projetos | filter: { statusProjeto: status.aceito }">
							<td >{{ projeto.NomeAluno }}</td>	
							<td >{{ projeto.NomeAreaInteresse }}</td>
							<td >{{ projeto.dataSolicitacao }}</td>
						</tr>								
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
	
	<!--Painel com as novas solicitacoes-->
	<div class="panel-group" id="panel-95759">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				<a class="panel-title" data-toggle="collapse" data-parent="#panel-95759" href="#panel-element-452027">Novas Solicitações</a>
			</div>
			<div id="panel-element-452027" class="panel-collapse collapse ">
			<div class="panel-body">
					<table class="table table-condensed table-striped" >
						<thead>
							<th>Aluno</th>
							<th>Área de interesse</th>
							<th>Data da solicitação	</th>
						</thead>
						<tbody>
							<tr ng-repeat="projeto in projetos | filter: { statusProjeto: status.aguardando }">
								<td><a ng-click="open(projeto)">{{ projeto.NomeAluno }}</a></td>	
								<td>{{ projeto.NomeAreaInteresse }}</td>
								<td>{{ projeto.dataSolicitacao }}</td>
							</tr>								
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	
	<!--Painel com as solicitacoes negadas-->
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
				<a class="panel-title" data-toggle="collapse" data-parent="#panel-95759" href="#panel-element-549992">Orientações Negadas</a>
		</div>
		<div id="panel-element-549992" class="panel-collapse collapse">
			<div class="panel-body">
				<table class="table table-condensed table-striped" >
					<thead>
						<th>Aluno</th>
						<th>Área de interesse</th>
						<th>Data da solicitação	</th>
					</thead>
					<tbody>
						<tr ng-repeat="projeto in projetos | filter: { statusProjeto: status.negado }">
							<td >{{ projeto.NomeAluno }}</td>	
							<td >{{ projeto.NomeAreaInteresse }}</td>
							<td >{{ projeto.dataSolicitacao }}</td>
						</tr>								
					</tbody>
				</table>				
			</div>
		</div>
</div>