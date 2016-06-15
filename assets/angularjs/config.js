var app = angular.module('mytcc')

app.config(function($routeProvider, $locationProvider)
{ 
   $routeProvider
   // configura a rota pra exibir o historico de orientacoes de um aluno
   .when('/timeline/:projetoId',
   {
       templateUrl: '/mytcc/orientacoes/timeline',
       controller: 'orientacaoController',
   })
});