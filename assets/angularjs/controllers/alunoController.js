angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('alunoController', function($scope, $http) 
{	
	console.log("acessando controlador de alunos...");
	
	// uma variavel para usar que indica o caminho padrão da aplicação	
	var url = "http://localhost:8080/mytcc/index.php/alunos/";
			    
    /* criando o método listaAluno
	   usa o metodo get do protocolo http para chamar o metodo 'listaAlunos' do controlador 'aluno_controller'
	   e atribui o resultado disso a uma variavel aluno que será chamada la na view */
	$scope.listaAlunos = function()
	{
		$http.get(url+"listaAlunos")
		.success(function (data, status, header, config) 
		{
			console.log("metodo GET acessado com sucesso. Status -> "+status);
		
			// atribuindo todos os alunos a uma lista chamada alunos
			$scope.alunos = data;
		})
		.error(function (data, status, header, config) 
		{
			console.log("método GET com erro. Status -> " +status);
		})
	}		
	
	// criando o método adicionaAluno
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
	
	// criando o método removeAluno
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
	
	// criando o método editaAluno
	$scope.editaAluno = function ()
	{
		console.log("acessando o metodo adicionaAluno...");
	}
		
	// criando uma função que será chamada quando quiseremos limpar o formulário p/ inserir um novo aluno
	var limpaCampos = function ()
	{
		$scope.fAluno = "";
		console.log("limpando campos do formulario.");
	}
});