angular.module('mytcc')

.controller('orientacaoController', function($log, orientacaoFactory,$scope)
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
    
    ///DADOS FAKE PARA POPULAR A MODAL DE AGENDAR E FEEDBACK
    $scope.form = { orientacao:{ descricao: "Orientação agendada na sala 701. Levar o documento do TCC"
                                 ,data:new Date(2016, 1, 13)
                                 ,hora:new Date(0, 0, 0, 14, 57, 0)
                                 ,resposta:"aceita"
                                 ,aluno:{nome: "Thiago Duarte"} 
                                 ,feedback:"Foi tratado no orientação que as alterações devem ser realizadas até o dia 01/01/2016"    
                                , presenca: "presente"  
                             }
                                
                  }
    ///
        
});
