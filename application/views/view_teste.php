<div ng-app="mytcc" ng-controller="alunoController">
	<div class="row">
		<div class="col-md-8">
			<h3>Testando a comunicação entre AngularJS e PHP</h3> <hr>
			<h4>Lista de alunos cadastrados no banco MYSQL</h4>	
		</div>
		<div class="col-md-4">
			<div class="input-group custom-search-form ">
			
			<input type="text" class="form-control" placeholder="Search..." ng-model="filtro">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">
					<i class="fa fa-search"></i>
				</button>
			</span>
		</div>
		</div>
	</div>	
	<br>
			<table class="table table-striped table-bordered">						
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Matrícula</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Endereço</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Bairro</th>	
						<th></th>						
					</tr>
				</thead>
				
				<tbody ng-init="alunos = listaAlunos()">
					<tr ng-repeat="aluno in alunos | filter : filtro">
						<td>{{ aluno.id }}</td>
						<td>{{ aluno.nome }}</td>
						<td>{{ aluno.matricula }}</td>
						<td>{{ aluno.email }}</td>
						<td>{{ aluno.telefone }}</td>
						<td>{{ aluno.endereco }}</td>
						<td>{{ aluno.cidade }}</td>
						<td>{{ aluno.estado }}</td>
						<td>{{ aluno.bairro }}</td>
						<td> <input type="submit" class="btn btn-danger" value="[x]" ng-click="removeAluno(aluno.idAluno)"/> </td>
					</tr>
				</tbody>
			</table>
	
	<hr>
	<h4>Formulário para inserção de um aluno no banco</h4>
	    <form ng-submit="adicionaAluno()" role="form">
			<div class="form-group">
				<input type="text" ng-model="fAluno.nome" class="form-control" placeholder="Nome:">
			</div>
			<div class="form-group">
				<input type="text" ng-model="fAluno.matricula" class="form-control"  placeholder="Matrícula:">
			</div>
			<div class="form-group">
				<input type="text" ng-model="fAluno.email" class="form-control" placeholder="Email:">
			</div>
			<div class="form-group">
				<input type="text" ng-model="fAluno.telefone" class="form-control" placeholder="Telefone:">
			</div>
			<div class="form-group">		
				<input type="text" ng-model="fAluno.endereco" class="form-control" placeholder="Endereço:">
			</div>
			<div class="form-group">
				<input type="text" ng-model="fAluno.cidade" class="form-control" placeholder="Cidade:">
			</div>
			<div class="form-group">
				<input type="text" ng-model="fAluno.estado" class="form-control" placeholder="Estado:">
			</div>
			<div class="form-group">
				<input type="text" ng-model="fAluno.bairro" class="form-control" placeholder="Bairro:"> <br>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Inserir o Aluno"/> 
			</div>
	</form>
</div>