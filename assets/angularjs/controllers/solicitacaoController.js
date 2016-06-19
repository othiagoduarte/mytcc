angular.module('mytcc')

.controller('solicitacaoController', function($log, areaFactory, projetoFactory)
{			
	var vm = this;
	
	vm.projeto = { titulo: '', resumo: '', areaInteresse: {}, professor: {}};
	vm.sucesso = false;
						    
	buscaProfessorArea(); //busca todas as areas de todos os professores
	buscaAreas(); // busca todas as areas
	
	function buscaProfessorArea()
    {		
		areaFactory.buscaTodasAreasProfessor()
		.then(function(response)
		{
			vm.professor_area = response.data;
		},
		function(error)
		{
			$log.warn(error);
		}); 
    };

	function buscaAreas()
	{
		areaFactory.getAreas()
		.then(function(response)
		{
			vm.areas = response.data;
		},
		function(error)
		{
			$log.warn(error);
		});
	};   	
		
	vm.enviaProposta = function()
	{						
		projetoFactory.enviaSolicitacao(vm.projeto)
		.then(function(response)
		{
			setTimeout(function(){location.href="solicitar"} , 3000);
			vm.sucesso = true;
		}, function(error)
		{

		});	
	};
		
	vm.limpaCampos = function()
	{
		vm.projeto.titulo = "";
		vm.projeto.resumo = "";
	};
});