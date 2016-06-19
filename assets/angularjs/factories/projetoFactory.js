angular.module('mytcc')

.factory('projetoFactory', ['$http', '$log', 'urlService', function($http, $log, urlService)
{
    var url = urlService.getUrl;
    var controller = "projetos/";

    var projetoFactory = {};

    projetoFactory.enviaSolicitacao = function(solicitacao)
    {
        return $http.post(url+controller+"insereSolicitacao", solicitacao);
    };

    return projetoFactory;
}]);