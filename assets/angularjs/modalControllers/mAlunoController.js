angular.module('mytcc')
.controller('mAlunoController', function ($http, $log, $scope, $uibModalInstance, items, urlService) 
{
    var url = urlService.getUrl;
    
    $scope.data = items;
    
    $scope.error = '';
    $scope.formInvalido = false;
        
    $scope.registrar = function () 
    {
        $log.log('botao registrar pressionado.');
        if(validaFormAluno($scope.data.aluno.nome, $scope.data.aluno.email, $scope.data.aluno.matricula))
        {
            $log.log('passou no teste de validacao');
            $http.post(url+'alunos/registrar', $scope.data)
            .success(function (data, status, header, config)
		    {
                $log.info("metodo POST acessado com sucesso. Status -> " +status);
                $log.info("dados inseridos no banco.");                
                $scope.data.sucesso = true;
                $scope.data.mensagem = "Parabéns! O seu cadastro foi realizado com sucesso.";
                $uibModalInstance.close($scope.data);
                $scope.formInvalido = false;
                $scope.data.aluno = '';
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
            $log.log($scope.data.nome);
        }	         
    };

    $scope.back = function () 
    {
        $log.log('botao back pressionado.');
        $uibModalInstance.dismiss();
    };
      
    var validaFormAluno = function(nome, email, matricula)
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
        return true;
    }						
});