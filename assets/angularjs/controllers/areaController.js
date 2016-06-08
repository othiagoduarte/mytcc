angular.module("mytcc")

.controller("areaController", function(areaFactory, $log, $scope)
{
    $log.log("acessando controlador de areas");
    
    var vm = this;
    vm.area; // area a ser incluida
    vm.areas; // todas as areas
    vm.areasProfessor; // areas referentes a um professor
    vm.areasNotProfessor = []; // areas que um professor pode adicionar
    // vm.adiciona = adicionar(vm.area, vm.areasNotProfessor, vm.areasProfessor);
    // vm.remove = adicionar(vm.area, vm.areasProfessor, vm.areasNotProfessor);
    
    vm.criarLink = areaFactory.CriarAreaLink();
    
    listaAreas();
    listaAreasProfessor();
                   
    vm.insereArea = function()
    {
        $log.log('botao apertado');
        var area = vm.area;

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
    
    // refatorar depois
    function listaAreasProfessor()
    {
        areaFactory.getAreasProfessor()
        .then(function(response)
        {            
            vm.areasProfessor = response.data;
            
            var areas;
            
            areaFactory.getAreas()
            .then(function(response)
            {
                areas = response.data;
                
                // inclui no array areasNotProfessor somente as areas que o professor nao tem
                for(i=0;i<areas.length;i++)
                {
                    if(!contains(vm.areasProfessor, areas[i]))
                    {
                        vm.areasNotProfessor.push(areas[i]);
                    }
                }                                
            });
                                                         
        }, function(error)
        {
            vm.status = "Não foi possível carregar as áreas: " + error.statusText;
        });
    }
    
    // retorna verdadeiro se um objeto estiver numa lista
    var contains = function(a, obj)
    {
        for(var i = 0; i < a.length ; i++)
        {
            if(a[i].descricao == obj.descricao)
            {
                return true;
            }
        }
        return false;
    }
    
    vm.adicionar = function(area)
    {
        var position = -1;
        
        for(i=0;i<vm.areasNotProfessor.length;i++)
        {
            if(vm.areasNotProfessor[i].id == area.id)
                position = i;
        }
                       
        $log.log(position);
        vm.areasNotProfessor.splice(position, 1);
        vm.areasProfessor.push(area);
    };
    
    vm.remover = function(area)
    {
        var position = -1;
        
        for(i=0;i<vm.areasProfessor.length;i++)
        {
            if(vm.areasProfessor[i].id == area.id)
                position = i;
        }

        $log.log(position);
        
        vm.areasProfessor.splice(position, 1);
        vm.areasNotProfessor.push(area);
    };
});