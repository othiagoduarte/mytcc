angular.module('mytcc')

.controller('solicitacaoController', function($scope)
{
	$scope.professoresDisponiveis;
	
	$scope.professorEscolhido;
	$scope.titulo;
	$scope.proposta;
	
	$scope.erroValidacao;
	
	var projeto
	{
		aluno = 1,
		professor = $scope.professorEscolhido,
		titulo = $scope.tituo,
		resumo = $scope.resumo		
	};
	
	$scope.enviaProposta = new function()
	{
		if(validaCampos())
		{
			$http.post('/application/index.php/orientacao/solicitacao', orientacao)
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
	};

	var validaCampos = new function()
	{
		if(professorEscolhido == NaN)
			$scope.erroValidacao = 'E preciso selecionar um professor.';
		else if(titulo = '')
			$scope.erroValidacao = 'O campo titulo esta vazio.';
		else if(proposta == '')
			$scope.erroValidacao = 'O campo proposta esta vazio.';
		else
			return true;
	}
});