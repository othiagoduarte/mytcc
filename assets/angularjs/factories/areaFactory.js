angular.module('mytcc')

.factory('areaFactory', ['$http', '$log', 'urlService', function($http, $log, urlService)
{
    var url = urlService.getUrl;
    var areaFactory = {};
    
    areaFactory.getAreas = function()
    {
        return $http.get(url+'areainteresses/listar');
    };
    
    areaFactory.insertArea = function(area)
    {
        return $http.post(url+'areainteresses/registrar', area);
    };
    
    areaFactory.getAreasProfessor = function()
    {
        return $http.get(url+'areainteresses/listarPorProfessor');
    }    
    
    areaFactory.CriarAreaLink = function()
    {
        return url+"areainteresses/criar";
    };
    
    areaFactory.VincularAreaLink = function()
    {
        return url+"areainteresses/listaProfessorPorArea";
    }
            
    return areaFactory;
}]);