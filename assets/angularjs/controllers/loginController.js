angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('loginController', function($scope, $http, $log) 
{       
    $log.info("acessando o controlador do login...");
    var url = "http://localhost:8080/mytcc/index.php/login/";
    
    $scope.formInvalido = false;
        
    $http.get(url+"pegaEmail")
    .then(function (response) 
    {
        if(response.data == 'FALSE')
        {
            $scope.nome = 'Seja bem vindo, faça o login';
            $log.log(response.data);
        }
        else
        {
            $scope.nome = response.data;
        }
    });
        
    $scope.dados = { cpf: '', senha: ''};
    $scope.error;
        
    // metodo que retorna um promisse http
    var loginService = function(cpf, senha)
    {
        return $http
        ({            
            url: url+'logar',
            method: 'POST',
            data: { 'email': cpf, 'senha' : senha }
        });
    }
    
    $scope.logar = function()
    {        
        $log.log("acessando o metodo logar.");
        if(validaCampos($scope.dados.cpf, $scope.dados.senha))
        {
            loginService($scope.dados.cpf, $scope.dados.senha)
            .then(function(loginResult)
            {
                if(loginResult.data == "TRUE")
                {
                    redirect('orientacao', 'listar');
                }
                else
                {
                    $scope.formInvalido = true;
                    $scope.error = 'Email ou senha incorretos';                   
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
    
    var validaCampos = function(cpf, senha)
    {
        $log.log("validando...");
        if(cpf == '')
        {
            $scope.error = "Insira seu CPF";
            $scope.formInvalido = true;
            return false;
        }
            
        if(senha == '')
        {
            $scope.error = "Insira sua senha";
            $scope.formInvalido = true;
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