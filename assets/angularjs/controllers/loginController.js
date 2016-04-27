angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('loginController', function($scope, $http, $log) 
{   
    $log.info("acessando o controlador do login...");
    var url = "http://localhost:8080/mytcc/index.php/login/";
        
    $scope.dados;
    $scope.error;
        
    // metodo que retorna um promisse http
    var loginService = function(email, senha)
    {
        return $http
        ({            
            url: url+'logar',
            method: 'POST',
            data: { 'email': email, 'senha' : senha }
        });
    }
    
    $scope.logar = function()
    {        
        $log.log("acessando o metodo logar.");
        if(validaCampos)
        {
            loginService($scope.dados.email, $scope.dados.senha)
            .then(function(loginResult)
            {
                $log.info(loginResult);
                if(loginResult.data == "TRUE")
                {
                    redirect('orientacao', 'listar');
                }
                else
                {
                    $scope.error = 'Email ou senha incorretos.';                   
                }
            });
        }        
    }
    
    $scope.logout = function()
    {
        $http.get(url+'sair')
        .then(function()
        {
            redirect('login');      
        })
    };
    
    var validaCampos = function(email, senha)
    {
        if(email == '')
        {
            $scope.error = "Insira seu email.";
            return false;
        }
            
        if(senha == '')
        {
            $scope.error = "Insira sua email.";
            return false;   
        }
            
        return true;
    }
    
    var reloadPage = function(){window.location.reload();}
    var redirect = function(controller, method = '')
    {
        window.location.assign("http://localhost:8080/mytcc/"+controller+'/'+method)
    };
});