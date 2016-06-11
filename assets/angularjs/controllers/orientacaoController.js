angular.module('mytcc')

.controller('orientacaoController', function($log, orientacaoFactory)
{
    var vm = this;
	vm.error;
	vm.dashboard = [];
    
    loadDashboard();
    
    function loadDashboard()
    {
        $log.log("acessando funcao loadDashboard");
        orientacaoFactory.getDashboard()
        .then(function(response)
        {
            $log.log(response.data);

            // transforma todos as jsonDates em javascript date
            for(i=0;i<response.data.length;i++)
            {
                response.data[i].data = converteData(response.data[i].data);
            }
            
            vm.dashboard = response.data;
        },
        function(error)
        {
            $log.log(error);
            vm.error = error.message;
        });        
    }

    var converteData = function(jsonData)
    {
        jsonData.replace('-', '');
        jsonData.replace(':', '');
        jsonData.replace(' ', '');
        return new Date(jsonData);
    }    
});
