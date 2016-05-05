angular.module('mytcc')

.controller('projetoController', function($scope, $http, $log)
{
	//var url = "http://localhost:8080/mytcc/index.php/projetos/";
    
    $scope.projetos;
    
    $scope.listaProjetos = function ()
    {
        $http.get('/projetos/listarProjetosPorProfessor')
        .success(function (data, status, header, config) 
		{
			$log.log("metodo GET acessado com sucesso. Status -> "+status);
			$scope.projetos = data;
			$log.log($scope.projetos);
		})
		.error(function (data, status, header, config) 
		{
			$log.error("método GET com erro. Status -> " +status);
		})
    }    
});