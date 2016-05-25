// controle responsavel por lidar com os dados da modal que abre os detalhes de uma solicitacao pelo professor
angular.module('mytcc')
.controller('mDetalheController', function ($http, $log, $scope, $uibModalInstance, $uibModal, items, urlService) 
{
    var url = urlService.getUrl;
    
    $scope.projeto = items;
    $scope.back = true;
    $scope.next = true;
    
    $scope.response = function()
    {
        $log.log('abrindo modal de resposta para o aluno '+$scope.projeto.NomeAluno);
        var modalResposta = $uibModal.open
        ({
            animation: true,
            templateUrl: url+'orientacao/resposta',
            controller: 'mRespostaController',
            resolve: 
            {
                items: function () 
                {
                    return $scope.projeto;
                }
            }
        });

        modalResposta.result
        .then(function (selectedItem) 
        {
            $log.log('result chamado');
            if($scope.projeto.sucesso == true)
            {
                 $uibModalInstance.close($scope.usuario);
            }
        }, 
        function () 
        {
            $log.info('modalResposta fechada as: ' + new Date());
        });
    };          
});