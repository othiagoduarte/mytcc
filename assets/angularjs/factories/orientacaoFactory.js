angular.module('mytcc')

.factory('orientacaoFactory', ['$http', '$log', 'urlService', function($http, $log, urlService)
{
    var url = urlService.getUrl;
    var controller = "orientacoes/";
    
    var orientacaoFactory = {};
    
    orientacaoFactory.getDashboard = function()
    {
        return $http.get(url+controller+"listando");
    }
    
    return orientacaoFactory;
}]);