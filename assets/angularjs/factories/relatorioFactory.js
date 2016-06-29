angular.module('mytcc')

.factory('relatorioFactory', ['$http', '$log', 'urlService', function($http, $log, urlService)
{
    var url = urlService.getUrl;
    var controller = "coordenador/";

    var factory = {};

    factory.getData = function()
    {
        return $http.get(url+controller+"relatorio_por_area");
    };

    return factory;
}]);