angular.module('mytcc')

.controller('solicitacaoController', function($scope, $http, $log)
{
	var url = "/index.php/";   
			
	$scope.projeto;
	$scope.aguardando = true;
					    
    $scope.listarAreas = function()
    {
        $log.info("buscando a lista de areas p/ carregar o select...")
		$http.get(url+"areainteresses/listaareas") 
		.success(function (data, status, header, config) 
		{		
			$scope.areas = data;
			$log.info("sucesso. Status ->"+status);
			$log.info(data);
		})
		.error(function (data, status, header, config) 
		{
			$log.error("método GET com erro. Status -> " +status);
		})
    };   
	
	$scope.listarProfessores = function()
	{		
		$log.info("buscando a lista de professores com as suas respectivas áreas...")
		$http.get(url+"areainteresses/listaprofessorporarea")
		.success(function (data, status, header, config) 
		{
			$log.info("sucesso. Status -> "+status);
			$log.info(data);
			$scope.valores = data;
		})
		.error(function (data, status, header, config) 
		{
			$log.error("erro. Status -> " +status);
		})
	};
		
	$scope.enviaProposta = function()
	{		
		$log.info("enviando proposta...");
		$log.info($scope.projeto);
		
		$scope.projeto.idArea = $scope.projeto.areaInteresse.id;
		$scope.projeto.idProfessor = $scope.projeto.professor.id;
		
		$http.post(url+'projetos/insereSolicitacao', $scope.projeto)
		.success(function (data, status, header, config) 
		{
			$log.log("metodo POST enviaProposta acessado com sucesso. Status -> "+status);
			setTimeout(function(){location.href="listar"} , 3000);
			$scope.aguardando = false;		
		})
		.error(function (data, status, header, config) 
		{
			$log.error("método POST enviaProposta com erro. Status -> " +status);
		})		
	};
	
	$scope.limpaCampos = function()
	{
		$scope.projeto.titulo = "";
		$scope.projeto.resumo = "";
	}
});
