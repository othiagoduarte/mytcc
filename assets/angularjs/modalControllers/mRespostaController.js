// controle responsavel por lidar com os dados da modal que envia a resposta da solicitacao ao aluno
angular.module('mytcc')
.controller('mRespostaController', function ($http, $log, $scope, $uibModalInstance, items, urlService) 
{
    var url = urlService.getUrl;
    
    $scope.projeto = items;
    $scope.r = 'i';
    
    $scope.response = function () 
    {        
        if($scope.r == "a")
        {
            $scope.projeto.statusProjeto = "3";
        }   
        else
        {
            $scope.projeto.statusProjeto = "2";
        }
                
        $http.post(url+'projetos/insereRespostaProfessor', $scope.projeto)
        .success(function (data, status, header, config)
        {  
            $scope.projeto.sucesso = true;
            $scope.projeto.mensagem = "Resposta enviada com sucesso";
            $uibModalInstance.close($scope.projeto);
            $scope.formInvalido = false;
        })
        .error(function (error)
        {
            $log.error("metodo POST com erro. Status -> " +status);
            $scope.formInvalido = true;
        })	        
    };
});