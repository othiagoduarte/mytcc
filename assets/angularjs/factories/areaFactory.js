angular.module('mytcc')

.factory('areaFactory', ['$http', '$log', 'urlService', function($http, $log, urlService)
{
    var url = urlService.getUrl;
    var controller = "areainteresses/";

    var areaFactory = {};
    
    areaFactory.getAreas = function()
    {
        return $http.get(url+controller+'listar');
    };
    
    areaFactory.insertArea = function(area)
    {
        return $http.post(url+controller+'registrar', area);
    };
    
    areaFactory.buscaTodasAreasProfessor = function()
    {
        return $http.get(url+controller+"listaProfessorPorArea");
    };
    
    areaFactory.getAreasProfessor = function()
    {
        return $http.get(url+controller+'listarPorProfessor');
    }; 
    
    // atalhos pra links
    
    areaFactory.CriarAreaLink = function()
    {
        return url+controller+'criar';
    };
    
    areaFactory.VincularAreaLink = function()
    {
        return url+controller+'listaProfessorPorArea';
    };
            
    return areaFactory;
}]);