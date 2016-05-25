angular.module('mytcc')

.controller('projetoController', function($scope, $http, $log, $uibModal, urlService)
{    
    var url = urlService.getUrl;
	
	$scope.projetos;
    $scope.status = { aguardando: '1', aceito: '2', negado: '3' };
    
    $scope.listaProjetos = function ()
    {
        $http.get(url+'projetos/listarProjetosPorProfessor')
		.success(function (data, status, header, config)
		{
            $log.info("lista de projetos carregada com sucesso. Status -> " +status);
			$scope.projetos = data;
		})
		.error(function (data, status, header, config)
		{
			$log.error("metodo POST com erro. Status -> " +status);
		})	
    }
	
	// funcao para abrir a modal que exibe os detalhes de uma solicitacao
	$scope.open = function (projeto) 
    {
        $log.log('abrindo modal de detalhes da solicitacao');
        var modalDetalhes = $uibModal.open
        ({
            animation: true,
            templateUrl: url+'orientacao/detalhes',
            controller: 'mDetalheController',
            resolve: 
            {
                items: function () 
                {
                    return projeto;
                }
            }
        });

        modalDetalhes.result
        .then(function (selectedItem) 
        {
            $log.log('result chamado');
            if($scope.data.sucesso == true)
            {
                 //setTimeout(function(){location.href="orientacao/solicitar"} , 3000); 
            }
        }, 
        function () 
        {
            $log.info('modalDetalhes fechada as: ' + new Date());
        });
    };
});