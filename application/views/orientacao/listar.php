<div class="col-md-12" ng-controller="projetoController" ng-init="projetos = listaProjetos()">
	<div class="row">
		<div>
			<h3 class="text-left text-primary">Gerência de Solicitações de Orientação</h3>
			<hr>
		</div>
	</div>
	
	<div ng-show="data.sucesso" class="alert alert-success">{{ data.mensagem }}</div>
	<div ng-show="aceito.length == '0'">
		<div class="bg bg-warning">Você <strong>não está</strong> orientando alunos no momento.</div>
		</br>
	</div>
	
	<!--Painel com as solicitacoes ja aceitas-->
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class=" glyphicon glyphicon-user" aria-hidden="true"></span>
			<a class="panel-title" data-toggle="collapse" data-parent="#panel-95759" href="#panel-element-549991">Alunos Orientando ({{aceito.length}})</a>
		</div>
		<div id="panel-element-549991" class="panel-collapse collapse">
			<div class="panel-body" ng-show="aceito.length > 0">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<th>Aluno</th>
						<th>Área de interesse</th>
						<th>Data da solicitação	</th>
					</thead>
					<tbody>
						<tr ng-repeat="projeto in aceito">
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
				<a class="panel-title" data-toggle="collapse" data-parent="#panel-95759" href="#panel-element-452027">Novas Solicitações ({{aguardando.length}})</a>
			</div>
			<div id="panel-element-452027" class="panel-collapse collapse ">
			<div class="panel-body" ng-show="aguardando.length > 0">
					<table class="table table-condensed table-striped table-bordered">
						<thead>
							<th>Aluno</th>
							<th>Área de interesse</th>
							<th>Data da solicitação	</th>
						</thead>
						<tbody>
							<tr ng-repeat="projeto in aguardando">
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
				<a class="panel-title" data-toggle="collapse" data-parent="#panel-95759" href="#panel-element-549992">Orientações Negadas ({{negado.length}})</a>
		</div>
		<div id="panel-element-549992" class="panel-collapse collapse">
			<div class="panel-body" ng-show="negado.length > 0">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<th>Aluno</th>
						<th>Área de interesse</th>
						<th>Data da solicitação	</th>
					</thead>
					<tbody>
						<tr ng-repeat="projeto in negado">
							<td >{{ projeto.NomeAluno }}</td>	
							<td >{{ projeto.NomeAreaInteresse }}</td>
							<td >{{ projeto.dataSolicitacao }}</td>
						</tr>								
					</tbody>
				</table>				
			</div>
		</div>
</div>