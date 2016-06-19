angular.module('mytcc')

.factory('orientacaoFactory', ['$http', '$log', 'urlService', function($http, $log, urlService)
{    
    var url = urlService.getUrl;
    var controller = "orientacoes/";
    
    var orientacaoFactory = {};
    
    orientacaoFactory.getDashboard = function()
    {
        return $http.get(url+controller+"listando");
    };
    
    orientacaoFactory.getTimeline = function(id)
    {
        var config = { params: { idProjeto: id }};
        
        return $http.get(url+controller+"orientacaoProjeto", config);
    };
    
    orientacaoFactory.getAlunoline = function()
    {
        return $http.get(url+controller+"orientacaoAluno");
    };

    orientacaoFactory.registrar = function(orientacao)
    {
        return $http.post(url+controller+"registrar", orientacao);
    };

    orientacaoFactory.responder = function(orientacao)
    {
        return $http.post(url+controller+"responder", orientacao);
    };
    
    return orientacaoFactory;
}]);