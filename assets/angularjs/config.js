angular.module('mytcc')

.config(['$routeProvider', function($routeProvider) 
{
    $routeProvider.
      when('/alunos', 
      {
        templateUrl: 'views/alunos/listar.php',
        controller: 'alunoController'
      }).
      otherwise
      ({
        redirectTo: '/home'
      });
  }]);