angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('loginController', function($scope, $http, $log, urlService) 
{       
    $log.info("acessando o controlador do login...");
    $scope.formInvalido = false;
    var url = urlService.getUrl;
        
    $http.get(url+"login/pegaEmail")
    .then(function (response) 
    {
        $log.log('verificando se o usuario esta logado');
        if(response.data == 'FALSE')
        {
            $log.log('não esta logado');
            $scope.nome = 'Seja bem vindo, faça o login';
        }
        else
        {
            $log.log('esta logado, '+response.data);
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
            url: url+'login/logar',
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
                    redirect('home', '');
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
        $http.get(url+'login/sair')
        .then(function()
        {
            redirect('home', "");      
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
    var redirect = function(controller, method)
    {
        window.location.assign(url+controller+'/'+method)
    };
});