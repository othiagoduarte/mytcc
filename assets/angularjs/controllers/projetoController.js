angular.module('mytcc')

.controller('projetoController', function($scope, $http, $log, $uibModal, urlService)
{    
    var url = urlService.getUrl;
	
    $scope.aguardando = [];
    $scope.aceito = [];
    $scope.negado = [];
    $scope.status = { aguardando: "1", aceito: "2", negado: "3" };
    
    $scope.listaProjetos = function ()
    {
        $http.get(url+'projetos/listarProjetosPorProfessor')
        .then(function(response)
        {
            teste($scope.status.aguardando, response.data, $scope.aguardando);
            teste($scope.status.aceito, response.data, $scope.aceito);
            teste($scope.status.negado, response.data, $scope.negado);
            $scope.error = "Projetos do professor carregados com sucesso.";          
        }, function(error)
        {
            $scope.error = "Não foi possível listar os projetos: " + error.statusText;
        });
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
    
    var teste = function(status, from, to)
    {
        for(i=0; i<from.length; i++)
        {
            $log.log('status da requisicao '+from[i].statusProjeto);
            $log.log('status '+status);
            if(from[i].statusProjeto == status)
                to.push(from[i]);
        }
    };
});