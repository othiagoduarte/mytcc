angular.module('mytcc')

.controller('homeController', function($scope, $uibModal, $log)
{    
    

    $scope.open = function () 
    {
        var modalInstance = $uibModal.open
        ({
            animation: true,
            templateUrl: 'alunos/registrar',
            controller: 'alunoController',
            resolve: 
            {
                items: function () 
                {
                    return $scope.items;
                }
            }
        });

        modalInstance.result
        .then(function (selectedItem) 
        {
            $scope.selected = selectedItem;
        }, 
        function () 
        {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };
});