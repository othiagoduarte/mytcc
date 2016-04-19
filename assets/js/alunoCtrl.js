var app = angular.module('myApp', []);
app.controller('alunosCtrl', function($scope, $http) 
{	
	console.log("acessando controlador alunosCtrl...");
	
	var url = "http://localhost:8080/mytcc/index.php/alunos/";
			
	$http.get(url+"listaAlunos")
    .success(function (data, status, header, config) 
	{
		console.log("metodo GET acessado com sucesso. Status -> "+status);
		
		$scope.alunos = data;
	})
	.error(function (data, status, header, config) 
	{
		console.log("método GET com erro. Status -> " +status);
	})		
	
	$scope.adicionaAluno = function () 
	{		
		console.log("acessando o metodo adicionaAluno...");
		var data = $scope.fAluno;
		
		$http.post(url+"insereAluno", data)
		.success(function (data, status, header, config)
		{
			console.log("metodo POST acessado com sucesso. Status -> " +status);
			console.log("dados inseridos no banco.");
			
			limpaCampos();
		})
		.error(function (data, status, header, config)
		{
			console.log("metodo POST com erro. Status -> " +status);
		})		
	};
	
	$scope.removeAluno = function (idAluno)
	{
		if(confirm("Você quer mesmo excluir?"))
		{
			console.log("acessando o metodo removeAluno...");
	
			$http.post(url+'deletaAluno', idAluno)
			.success(function (data, status, header, config)
			{
				console.log("metodo DELETE acessado com sucesso. Status -> " +status);
				console.log("dado removido do banco.");			
			})
			.error(function (data, status, header, config)
			{
				console.log("metodo DELETE com erro. Status -> " +status);
			})	
		}					
	}
	
	$scope.editaAluno = function ()
	{
		console.log("acessando o metodo adicionaAluno...");
	}
	
	
	var limpaCampos = function ()
	{
		$scope.fAluno = "";
		console.log("limpando campos do formulario.");
	}
});