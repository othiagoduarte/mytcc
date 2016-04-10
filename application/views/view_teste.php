<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css") ?>">
	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url("assets/js/jquery-2.2.3.min.js") ?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
	<!-- Carrega o codigo do angular pra buscar os dados -->	
	<script src="<?php echo base_url("assets/js/angular.min.js") ?>"></script>
	<!-- Carrega o controlador do angularJS -->
	<script src="<?php echo base_url("assets/js/alunoCtrl.js") ?>"></script>
	
	<title>MyTCC first feature</title>
</head>
<body ng-app="myApp" ng-controller="alunosCtrl">

	<?php include('application/views/view_header.php'); ?>
	
	<h3>Testando a comunicação entre AngularJS e PHP</h3> <hr>
	<h4>Lista de alunos cadastrados no banco MYSQL</h4>		

			<table class="table table-striped table-bordered">						
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Matrícula</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Endereço</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Bairro</th>						
					</tr>
				</thead>
				
				<tbody ng-repeat="aluno in alunos">
					<td>{{ aluno.idAluno }}</td>
					<td>{{ aluno.nome }}</td>
					<td>{{ aluno.matricula }}</td>
					<td>{{ aluno.email }}</td>
					<td>{{ aluno.telefone }}</td>
					<td>{{ aluno.endereco }}</td>
					<td>{{ aluno.cidade }}</td>
					<td>{{ aluno.estado }}</td>
					<td>{{ aluno.bairro }}</td>
					<td> <input type="submit" class="btn btn-danger" value="[x]" ng-click="removeAluno(aluno.idAluno)"/> </td>
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
</body>
</html>