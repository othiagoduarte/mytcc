angular.module('mytcc')

.controller('projetoController', function($scope, $http, $log)
{    
    $scope.projetos;
    
    $scope.listaProjetos = function ()
    {
        $http.get('/mytcc/projetos/join_AreaInteresse')
        .then(response)
        {
            $log.log(response.data);
            $scope.projetosAbertos = response.data;
        }
    }    
});