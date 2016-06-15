angular.module('mytcc')

.factory('loginFactory', ['$http', '$log', 'urlService', function($http, $log, urlService)
{
    var url = urlService.getUrl;
    var controller = "login/";
    
    var loginFactory = {};

    loginFactory.logar = function(form)
    {
        return $http.post(url+controller+"logar" ,form);
    };

    loginFactory.logout = function()
    {
        return $http.get(url+controller+"sair");
    };

    loginFactory.getCookies = function()
    {
        return $http.get(url+controller+"getSessionData");
    };

    return loginFactory;
}]);