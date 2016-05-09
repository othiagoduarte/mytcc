angular.module('mytcc')

.controller('projetoController', function($scope, $http, $log)
{    
    $scope.projetos;
    $scope.status = { aguardando: '1', aceito: '2', negado: '3' };
    
    $scope.listaProjetos = function ()
    {
        $http.get('/mytcc/projetos/listarProjetosPorProfessor')
		.success(function (data, status, header, config)
		{
			$log.info(data);
            $log.info("metodo POST acessado com sucesso. Status -> " +status);
			$scope.projetos = data;
		})
		.error(function (data, status, header, config)
		{
			$log.error("metodo POST com erro. Status -> " +status);
		})	
    }    
});