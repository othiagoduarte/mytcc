angular.module('mytcc')

.controller('homeController', function($scope, $uibModal, $log, $timeout)
{    
    $log.log('acessando o home controller..');
    
    // inicializa os dados que serao enviados pelos formularios no final do processo
    $scope.data = 
    { 
        usuario: 
        { 
            cpf: '',
            senha: '',
            conf: '',
            tipo: ''
        },
        aluno:
        {
            nome: '',
            email: '',
            matricula: '',
            cidade: '',
            endereco: 'endereco qualquer',
            bairro: '',
            estado: '',
            telefone: ''
        },
        professor:
        {
            nome: '',
            email: '',
            matricula: '',
            endereco: 'endereco qualquer',
            cidade: '',
            bairro: '',
            estado: '',
            telefone: '',
            turnoDia: false,
            turnoNoite: false,
            vagas: 1
        }
    }
    
    $scope.feedback = false;
    $scope.data.sucesso = false;
    $scope.data.mensagem = '';

    // abre a modal de 'registre-se'
    $scope.open = function () 
    {
        $log.log('abrindo modal de cadastro');
        var modalInstance = $uibModal.open
        ({
            animation: true,
            templateUrl: 'registrarUsuario',
            controller: 'mUsuarioController',
            resolve: 
            {
                items: function () 
                {
                    return $scope.data;
                }
            }
        });

        modalInstance.result
        .then(function (selectedItem) 
        {
            $log.log('result chamado');
            if($scope.data.sucesso == true)
            {
                 setTimeout(function(){location.href="/mytcc/home"} , 3000); 
            }
        }, 
        function () 
        {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };
    
    $scope.login = function()
    {
        setTimeout(function(){location.href="/mytcc/login"} , 0); 
    }
});