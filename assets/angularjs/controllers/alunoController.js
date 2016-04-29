angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('alunoController', function($scope, $http, $log, $uibModal) 
{	
	$log.info("acessando controlador de alunos...");
	
	$scope.estados = ['RS', 'SC', 'PR', 'SP', 'RJ', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF'];
	
	$scope.tipo = "";
	var tipagem = "";
		
	// uma variavel para usar que indica o caminho padrão da aplicação	
	var url = "http://localhost:8080/mytcc/alunos/";
	
	$scope.open = function () 
    {
		var modalInstance = $uibModal.open
        ({
            animation: true,
            templateUrl: 'alunos/registrarUsuario',
            controller: function($scope, $uibModalInstance) 
			{
					$scope.error = "";
					$scope.usuario = { cpf: "", senha: "", conf: "", tipo: ""};
					
					var validaFormUsuario = function(cpf, senha, conf, papel, error)
					{
						if(cpf == "")
						{
							$scope.error =  'É preciso digitar o CPF para prosseguir';
							return false;
						}
						// if(cpf.length < 9)
						// {
						// 	$scope.error =  'O campo CPF precisa possuir mais de 8 digitos';
						// 	return false;
						// }			
						if(senha == '')
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
				
				$scope.cancel = function () 
				{
            		$uibModalInstance.dismiss('cancel');
        		}
				$scope.openSecond = function () 
				{
					if(validaFormUsuario($scope.usuario.cpf, $scope.usuario.senha, $scope.usuario.conf, $scope.usuario.tipo, $scope.validar))
					{
						tipagem = $scope.usuario.conf;
						secondModal();	
					}
					else
					{
						$scope.validar = true;
					}					
        		}
			}
        });

        modalInstance.result
        .then(function (selectedItem) 
        {
            $scope.selected = selectedItem;
        }, 
        function () 
        {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };
	
	var secondModal = function () 
    {
        var template = function()
		{
			if(tipagem == "p")
			{
				$log.log("abrindo modal professor");
				return 'professores/registrarProfessor';
			}				
			else
			{
				$log.log("abrindo modal aluno");
				return 'alunos/registrarAluno';
			}				
		}
		
		var modalInstance = $uibModal.open
        ({
            animation: true,
            templateUrl: template,
            controller: function($scope, $uibModalInstance) 
			{
        		$scope.back = function () 
				{
            		$uibModalInstance.dismiss('cancel');
        		}
			}
        });

        modalInstance.result
        .then(function (selectedItem) 
        {
            $scope.selected = selectedItem;
        }, 
        function () 
        {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };	
			    
    /* criando o método listaAluno
	   usa o metodo get do protocolo http para chamar o metodo 'listaAlunos' do controlador 'aluno_controller'
	   e atribui o resultado disso a uma variavel aluno que será chamada la na view */
	$scope.listaAlunos = function()
	{
		$http.get(url+"listar")
		.success(function (data, status, header, config) 
		{
			$log.log("metodo GET acessado com sucesso. Status -> "+status);
		
			// atribuindo todos os alunos a uma lista chamada alunos
			$scope.alunos = data;
		})
		.error(function (data, status, header, config) 
		{
			$log.error("método GET com erro. Status -> " +status);
		})
	}		
	
	// criando o método adicionaAluno
	$scope.adicionaAluno = function () 
	{		
		$log.log("acessando o metodo adicionaAluno...");
		var data = $scope.aluno;
		
		$log.log(data);
		
		$http.post(url+"insereAluno", data)
		.success(function (data, status, header, config)
		{
			$log.info("metodo POST acessado com sucesso. Status -> " +status);
			$log.info("dados inseridos no banco.");
			
			limpaCampos();
		})
		.error(function (data, status, header, config)
		{
			$log.error("metodo POST com erro. Status -> " +status);
		})		
	};
	
	// criando o método removeAluno
	$scope.removeAluno = function (idAluno)
	{
		if(confirm("Você quer mesmo excluir?"))
		{
			$log.log("acessando o metodo removeAluno...");
	
			$http.post(url+'deletaAluno', idAluno)
			.success(function (data, status, header, config)
			{
				$log.info("metodo DELETE acessado com sucesso. Status -> " +status);
				$log.info("dado removido do banco.");			
			})
			.error(function (data, status, header, config)
			{
				$log.error("metodo DELETE com erro. Status -> " +status);
			})	
		}					
	}
	
	// criando o método editaAluno
	$scope.editaAluno = function ()
	{
		$log.log("acessando o metodo adicionaAluno...");
	}	
});