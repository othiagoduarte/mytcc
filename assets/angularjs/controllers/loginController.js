angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('loginController', function($scope, $http, $log, urlService) 
{       
    var vm = this;
    
    $log.info("acessando o controlador do login...");
    var url = urlService.getUrl;
    
    $scope.formInvalido = false;
    vm.menu_professor = false;
    vm.menu_aluno = false;
    vm.menu_coordenador = false;
            
    $http.get(url+"login/getSessionData")
    .then(function (response) 
    {
        $log.log(response);
        $log.log('verificando se o usuario esta logado');
        if(response.data == 'f')
        {
            $log.log('nenhum usuario esta logado');
            vm.nome = 'Seja bem vindo, faça o login';
        }
        else
        {
            $log.log('esta logado, '+response.data.session_name);
            vm.nome = response.data.session_name;
            
            if(response.data.session_type == 'p')
            {
                vm.menu_professor = true;             
            }
            else if(response.data.session_type == 'a')
            {
                vm.menu_aluno = true;
            }
            else if(response.data.session_type == 'c')
            {
                vm.menu_coordenador = true;
            }
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
                if(loginResult.data == "t")
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
    
    vm.logout = function()
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