angular.module('mytcc')

.controller('solicitacaoController', function($scope, $http, $log, urlService)
{
	var url = urlService.getUrl;   
			
	$scope.projeto = { titulo: '', resumo: '' };
	$scope.aguardando = true;
					    
    $scope.listarAreas = function()
    {
        $log.info("buscando a lista de areas p/ carregar o select...")
		$http.get(url+"areainteresses/listaareas") 
		.success(function (data, status, header, config) 
		{		
			$scope.areas = data;
			$log.info("areas carregadas com sucesso. Status ->"+status);
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
			$log.info("professores carregados com sucesso. Status -> "+status);
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
		
		$scope.projeto.idArea = $scope.projeto.areaInteresse.id;
		$scope.projeto.idProfessor = $scope.projeto.professor.id;
		
		$http.post(url+'projetos/insereSolicitacao', $scope.projeto)
		.success(function (data, status, header, config) 
		{
			$log.log("proposta enviada o com sucesso. Status -> "+status);
			setTimeout(function(){location.href="solicitar"} , 3000);
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
