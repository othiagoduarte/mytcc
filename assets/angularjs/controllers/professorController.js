angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('professorController', function($scope, $http, $log) 
{	
	$log.info("acessando controlador de professores...");
	
	$scope.estados = ['RS', 'SC', 'PR', 'SP', 'RJ', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF'];			    
});