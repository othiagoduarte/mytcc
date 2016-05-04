angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('alunoController', function($scope, $http, $log) 
{		
	$log.info("acessando controlador de alunos...");
	
	$scope.estados = ['RS', 'SC', 'PR', 'SP', 'RJ', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF'];
								    
    /* criando o método listaAluno
	   usa o metodo get do protocolo http para chamar o metodo 'listaAlunos' do controlador 'aluno_controller'
	   e atribui o resultado disso a uma variavel aluno que será chamada la na view */
	$scope.listaAlunos = function()
	{
		$http.get("alunos/listar")
		.success(function (data, status, header, config) 
		{
			$log.log("metodo GET acessado com sucesso. Status -> "+status);
		
			// atribuindo todos os alunos a uma lista chamada alunos
			$scope.alunos = data;
		})
		.error(function (data, status, header, config) 
		{
			$log.error("método GET com erro. Status -> " +status);
		})
	}		
	
	// criando o método adicionaAluno
	$scope.adicionaAluno = function () 
	{		
		$log.log("acessando o metodo adicionaAluno...");
				
		var data = { usuario: user, aluno:student };
		
		$http.post("alunos/insereAluno", data)
		.success(function (data, status, header, config)
		{
			$log.info("metodo POST acessado com sucesso. Status -> " +status);
			$log.info("dados inseridos no banco.");
			
			limpaCampos();
		})
		.error(function (data, status, header, config)
		{
			$log.error("metodo POST com erro. Status -> " +status);
		})		
	};
	
	// criando o método removeAluno
	$scope.removeAluno = function (idAluno)
	{
		if(confirm("Você quer mesmo excluir?"))
		{
			$log.log("acessando o metodo removeAluno...");
	
			$http.post('alunos/deletaAluno', idAluno)
			.success(function (data, status, header, config)
			{
				$log.info("metodo DELETE acessado com sucesso. Status -> " +status);
				$log.info("dado removido do banco.");			
			})
			.error(function (data, status, header, config)
			{
				$log.error("metodo DELETE com erro. Status -> " +status);
			})	
		}					
	}
	
	// criando o método editaAluno
	$scope.editaAluno = function ()
	{
		$log.log("acessando o metodo adicionaAluno...");
	}	
});