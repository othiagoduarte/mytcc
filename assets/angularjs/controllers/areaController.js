angular.module("mytcc")

.controller("areaController", function(areaFactory, $log, $scope)
{
    $log.log("acessando controlador de areas");
    
    var vm = this;
    vm.area;
    vm.areas;
    vm.areasProfessor;
    
    vm.criarLink = areaFactory.CriarAreaLink();
    
    listaAreas();
    listaAreasProfessor();
    
    function listaAreas()
    {
        areaFactory.getAreas()
        .then(function(response)
        {
            vm.areas = response.data;
        }, function(error)
        {
            vm.status = "Não foi possível carregar as áreas: " + error.statusText;
        });
    }  
    
    function listaAreasProfessor()
    {
        areaFactory.getAreasProfessor()
        .then(function(response)
        {
            vm.areasProfessor = response.data;
            $log.log(vm.areasProfessor);
        }, function(error)
        {
            vm.status = "Não foi possível carregar as áreas: " + error.statusText;
        });
    }   
        
    vm.insereArea = function()
    {
        $log.log('botao apertado');
        var area = vm.area;
        $log.log(vm.area);
        areaFactory.insertArea(area)
        .then(function(response)
        {
            vm.status = "Nova área inserida com sucesso.";
            // vm.areas.push(area);
        }, function(error)
        {
            vm.status = "Não foi possível inserir a área: " + error.statusText;
        });
    }
});