angular.module('mytcc')
.controller('mProfessorController', function ($http, $log, $scope, $uibModalInstance, items, urlService) 
{
    var url = urlService.getUrl;
    
    $scope.data = items;
    
    $scope.error = '';
    $scope.formInvalido = false;
        
    $scope.registrar = function () 
    {
        $log.log('botao registrar pressionado.');
        if(validaFormProfessor($scope.data.professor.nome, $scope.data.professor.email, $scope.data.professor.matricula, 
         $scope.data.professor.vagas, $scope.data.professor.turnoDia, $scope.data.professor.turnoNoite))
        {
            $log.log('passou no teste de validacao');
            $http.post(url+'professores/registrar', $scope.data)
            .success(function (data, status, header, config)
		    {
                $log.info("metodo POST acessado com sucesso. Status -> " +status);
                $log.info("dados inseridos no banco.");                
                $scope.data.sucesso = true;
                $scope.data.mensagem = "Parabéns! O seu cadastro foi realizado com sucesso.";
                $uibModalInstance.close($scope.data);
                $scope.formInvalido = false;
                $scope.data.professor = '';
                $scope.data.usuario = '';
            })
            .error(function (error)
            {
                $log.error("metodo POST com erro. Status -> " +status);
                $log.error('Error message: '+error.data);
                $scope.formInvalido = true;
            })	
        }
        else
        {
            $scope.formInvalido = true;
        }	         
    };

    $scope.back = function () 
    {
        $log.log('botao back pressionado.');
        $uibModalInstance.dismiss();
    };
      
    var validaFormProfessor = function(nome, email, matricula, vagas, dia, noite)
    {
        if(nome == undefined || nome == '')
        {
            $scope.error =  'É preciso digitar o nome para prosseguir';
            return false;
        }
        if(email == undefined || email == '')
        {
            $scope.error =  'É preciso digitar o email para prosseguir';
            return false;
        }
        if(matricula == undefined || matricula == '')
        {
            $scope.error =  'É preciso digitar a matricula para prosseguir';
            return false;
        }
        if(vagas < 1)
        {
            $scope.error =  'Não é possível se cadastrar sem ter vagas disponíveis';
            return false;	
        }
        if(dia == false & noite == false)
        {
            $scope.error = 'É preciso selecionar pelo menos um turno';
            return false;
        }
        return true;
    }						
});