angular.module('mytcc')
.controller('mUsuarioController', function ($log, $scope, $uibModalInstance, $uibModal, items) 
{    
    $scope.data = items;
    
    $scope.error = '';
    $scope.formInvalido = false;
    

    $scope.next = function () 
    {
        if(validaFormUsuario($scope.data.usuario.cpf, $scope.data.usuario.senha, $scope.data.usuario.conf, $scope.data.usuario.tipo))
        {
            abreSegundaModal();
        }
        else
        {
            $scope.formInvalido = true;
        }	         
    };

    $scope.cancel = function () 
    {
        $uibModalInstance.dismiss('cancel');
    };
  
    // funcao que abre a segunda modal, a modal do aluno
    var abreSegundaModal = function () 
    {		
		var modalInstance = $uibModal.open
        ({
            animation: true,
            templateUrl: defineTemplate(),
            controller: defineController(),
            resolve:
            {
				items: function()
				{
					return $scope.data;
				}
			} 
        });
        
        modalInstance.result.then(function (selectedItem) 
        {
            $scope.aluno = selectedItem;
            $uibModalInstance.close($scope.usuario);
        }, function () 
        {
            $log.info('Modal dismissed at: ' + new Date());
        });
  };

    
    // funcao que valida se os campos sao validos pra prosseguir
    var validaFormUsuario = function(cpf, senha, conf, papel, error)
    {
        if(cpf == undefined || cpf == '')
        {
            $scope.error =  'É preciso digitar o CPF para prosseguir';
            return false;
        }		
        if(senha == undefined || senha == '')
        {
            $scope.error =  'É preciso digitar a senha para prosseguir';
            return false;
        }			
        if(senha != conf)
        {
            $scope.error =  'A senha digitada não é igual a confirmada';
            return false;
        }			
        if(papel == '')
        {
            $scope.error =  'É obrigatório escolhar um papel';
            return false;	
        }
        return true;
    }
    
    // direciona p/ pagina do formulario do professor ou do aluno, conforme o tipo escolhido
    var defineTemplate = function()
    {
        if($scope.data.usuario.tipo == "p")
        {
            $log.log("abrindo modal professor");
            return 'registrarProfessor';
        }				
        else
        {
            $log.log("abrindo modal aluno");
            return 'registrarAluno';
        }				
    }
    
    // direciona p/ o controllador do professor ou do aluno, conforme o tipo escolhido
    var defineController = function()
    {
        if($scope.data.usuario.tipo == "p")
        {
            return 'mProfessorController';
        }
        else
        {
            return 'mAlunoController';
        }
    }								
});