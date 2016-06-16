angular.module('mytcc')

.controller('orientacaoController', function($log, $scope, $routeParams,$uibModal, orientacaoFactory,urlService)
{
    var projetoId = $routeParams.projetoId;
    var url = urlService.getUrl;
    
    var vm = this;
    
    vm.error;
	vm.dashboard = [];
    vm.alunoline = [];
    $scope.timeline = [];
    $scope.nome;
    
    vm.status = "";
    
    loadDashboard();
    
    vm.loadAlunoLine = function()
    {
        $log.log("carregando as orientacoes do aluno logado");
        orientacaoFactory.getAlunoline()
        .then(function(response)
        {
            // transforma todos as jsonDates em javascript date
            for(i=0;i<response.data.length;i++)
            {
                response.data[i].data = converteData(response.data[i].data);
            }
            
            vm.alunoline = response.data;
        },
        function(error)
        {
            $log.war(error);
        });
    }
    
    function loadDashboard()
    {
        $log.log("acessando funcao loadDashboard");
        orientacaoFactory.getDashboard()
        .then(function(response)
        {            
            // transforma todos as jsonDates em javascript date
            for(i=0;i<response.data.length;i++)
            {
                response.data[i].data = converteData(response.data[i].data);
            }
            
            vm.dashboard = response.data;
        },
        function(error)
        {
            console.log(error.data.message);
            switch(error.status)
            {
                case 500:
                    vm.error = error.data.message;
                    break;   
            }            
        });        
    };
    
    $scope.loadTimeline = function()
    {
        $log.log("carregando a timeline de orientacoes do aluno");
        $log.info(projetoId);
        orientacaoFactory.getTimeline(projetoId)
        .then(function(response)
        {
            $log.log(response.data);
            
            // transforma todos as jsonDates em javascript date
            for(i=0;i<response.data.length;i++)
            {
                response.data[i].data = converteData(response.data[i].data);
            }
            
            
            $scope.nome = response.data[0].nome;
            $scope.timeline = response.data;
        },
        function(error)
        {
            $log.warn(error);
        });
    };

    var converteData = function(jsonData)
    {
        jsonData.replace('-', '');
        jsonData.replace(':', '');
        jsonData.replace(' ', '');
        return new Date(jsonData);
    };
    
    vm.filter = function(item)
    {
        $log.log("filtro ativado");
        if(vm.status == undefined || vm.status == false) 
        {
            return false;
        }
        return true;
    };
    
     // abre a modal de 'agendar'
    vm.modalAgendamento = function (projeto) 
    {
        $log.log('abrindo modal agendar orientação');
        $log.log(projeto);
        
        var modalInstance = $uibModal.open
        ({
            animation: true,
            templateUrl: url+'orientacoes/agendarOrientacao',
            controller: 'mAgendarController',
            resolve: 
            {
                items: function () 
                {
                    return projeto;
                }
            }
        });

        modalInstance.result
        .then(function (selectedItem) 
        {

        }, 
        function () 
        {

        });
     };
   
});
