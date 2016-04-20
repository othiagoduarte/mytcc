angular.module('mytcc')

.controller('solicitacaoController', function($scope, $http, $log)
{
	var url = "http://localhost:8080/mytcc/index.php/";
	var url2 = "http://localhost:8080/mytcc/index.php/areainteresses/";   
	var areaInteresse = "areainteresses/";
	var professores = "professores/";
		
	$scope.areaSelecionada;
	$scope.professoresDisponiveis;
	
	$scope.professorEscolhido;
	$scope.titulo;
	$scope.proposta;
	
	$scope.erroValidacao;
	
	var projeto
	{
		aluno = 1,
		professor = $scope.professorEscolhido,
		titulo = $scope.titulo,
		resumo = $scope.resumo		
	};	
    
    $scope.listarAreas = function()
    {
        $http.get(url2+"listaareas")
		.success(function (data, status, header, config) 
		{		
			$scope.areas = data;
			$log.info(data);
		})
		.error(function (data, status, header, config) 
		{
			$log.error("método GET com erro. Status -> " +status);
		})
    };   
	
	$scope.listarProfessores = function()
	{		
		$http.get(url2+"listaprofessorporarea")
		.success(function (data, status, header, config) 
		{
			$log.info("metodo GET listaProfessores acessado com sucesso. Status -> "+status);
			$log.info(data);
			$scope.valores = data;
		})
		.error(function (data, status, header, config) 
		{
			$log.error("método GET listaProfessores com erro. Status -> " +status);
		})
	};
		
	$scope.enviaProposta = function()
	{
		// $http.post(url+'/solicitacao', projeto)
		// .success(function (data, status, header, config) 
		// {
		// 	$log.log("metodo POST enviaProposta acessado com sucesso. Status -> "+status);			
		// })
		// .error(function (data, status, header, config) 
		// {
		// 	$log.error("método POST enviaProposta com erro. Status -> " +status);
		// })		
	};
});