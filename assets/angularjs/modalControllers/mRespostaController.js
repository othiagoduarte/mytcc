// controle responsavel por lidar com os dados da modal que envia a resposta da solicitacao ao aluno
angular.module('mytcc')
.controller('mRespostaController', function ($http, $log, $scope, $uibModalInstance, items, urlService) 
{
    var url = urlService.getUrl;
    
    $scope.projeto = items;
    $log.log('projeto a responder -> '+$scope.projeto.titulo);
    $scope.r = 'i';
    
    $scope.response = function () 
    {
        $log.log('botao enviar solicitação pressionado.');
        
        $log.log($scope.projeto);
        $log.log('passou no teste de validacao');
        $http.post(url+'projetos/insereRespostaProfessor', $scope.projeto)
        .success(function (data, status, header, config)
        {
            $log.info("metodo POST acessado com sucesso. Status -> " +status);
            $log.info("projeto atualizado no banco.");
            $scope.projeto.statusProjeto = '2';               
            $scope.projeto.sucesso = true;
            $scope.projeto.mensagem = "Parabéns! O seu cadastro foi realizado com sucesso.";
            $uibModalInstance.close($scope.projeto);
            // $scope.formInvalido = false;
        })
        .error(function (error)
        {
            $log.error("metodo POST com erro. Status -> " +status);
            // $scope.formInvalido = true;
        })	        
    };
});