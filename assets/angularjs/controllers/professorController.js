angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('professorController', function($scope, $http, $log, $uibModal) 
{	
	$log.info("acessando controlador de professores...");
	
	$scope.estados = ['RS', 'SC', 'PR', 'SP', 'RJ', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF'];
	
	// uma variavel para usar que indica o caminho padrão da aplicação	
	var url = "http://localhost:8080/mytcc/index.php/professores/";
	
	$scope.open = function () 
    {
        var modalInstance = $uibModal.open
        ({
            animation: true,
            templateUrl: 'professores/registrar',
            controller: function($scope, $uibModalInstance) 
			{
        		$scope.cancel = function () 
				{
            		$uibModalInstance.dismiss('cancel');
        		}
			},
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