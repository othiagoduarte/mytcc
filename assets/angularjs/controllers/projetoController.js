angular.module('mytcc')

.controller('projetoController', function($scope, $http, $log)
{
	var url = "http://localhost:8080/mytcc/index.php/projetos/";
    
    $scope.projetosAbertos;
    $scope.projetosAceitos;
    $scope.projetosRecusados;
    
    $scope.listaProjetos = function ()
    {
        $http.get(url+'listaProjetos')
        .then(response)
        {
            $scope.projetosAbertos = response.data;
        }
    }    
});