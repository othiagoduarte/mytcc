angular.module('mytcc')

.controller('orientacaoController', function($log, orientacaoFactory)
{
    var vm = this;
	
	vm.dashboard = [];
    
    loadDashboard();
    
    function loadDashboard()
    {
        $log.log("acessando funcao loadDashboard");
        orientacaoFactory.getDashboard()
        .then(function(response)
        {
            vm.dashboard = response.data;
        }),
        function(error)
        {
            
        };        
    }    
});
