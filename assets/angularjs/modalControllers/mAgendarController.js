angular.module('mytcc')
.controller('mAgendarController', function ($scope, $log, items, $uibModalInstance, orientacaoFactory, loginFactory) 
{    
    $scope.status;
    
    $scope.ehAluno = false;
    
    $scope.desativaCampos = true;
    $scope.feedbackInvisivel = false;
    $scope.feedbackDisponivel = false;
    $scope.feedbackDesativado = true;
    $scope.ehRespondivel = false;
    $scope.ehFeedback = false;
    $scope.ehEnviavel = false;
        
    gerenciaComponentes(items.status);

    function gerenciaComponentes(status)
    {
        loginFactory.getCookies()
        .then(function(response)
        {
            console.log(response.data.session_type);
            response.data.session_type= "p";
            if(response.data.session_type == "a")
            {
                $scope.ehAluno = true;
                console.log("opa, eh aluno? cookies"+$scope.ehAluno);
            }
            switch (status)
            {
                case "0":
                {
                    $scope.status = "em progresso";
                    $scope.desativaCampos = false;
                    $scope.feedbackInvisivel = true;
                    $scope.ehEnviavel = true;

                    break;
                }
                case "1":
                {
                    console.log("opa, eh aluno?"+$scope.ehAluno);
                    if($scope.ehAluno)
                    {
                        $scope.ehRespondivel = true;
                        $scope.ehEnviavel = true;
                    }

                    $scope.status = "enviada";
                    $scope.feedbackDisponivel = true;
                    $scope.feedbackDesativado = false;
                    break;
                }
                case "2":
                {
                    if(!$scope.ehAluno)
                    {
                        $scope.ehFeedback = true;
                        $scope.ehEnviavel = true;
                        $scope.feedbackDesativado = false;
                        $scope.feedbackDisponivel = true;
                    }
                    else
                    {
                        $scope.feedbackInvisivel = true;
                    }

                    $scope.status = "agendada";

                    break;
                }
                case "3":
                    $scope.status = "recusada";
                    break;
                case "4":
                    $scope.status = "completada";
                    break;
                case "5":
                    $scope.status = "ausente";
                    break;
            }        
        })
    };
    
            
    $scope.form = 
    { 
        orientacao: 
        {
            idProjeto: items.id,
            datahora: items.data,
            local: items.local,
            assunto: items.anotacoesAgendamento,
            feedback : items.feedback,
            status : items.status
        }
    };   
    
    $scope.salvar = function()
    {
        console.log($scope.form.orientacao);
        if($scope.ehRespondivel)
        {
            console.log("eh respondivel");
            enviarAgendamento();
        }
        else if($scope.ehFeedback)
        {
            console.log("eh feedback");
            enviarResposta();
        }
    };
    
    var enviarAgendamento = function()
    {
        $log.log("botao salvar clicado");
        orientacaoFactory.registrar($scope.form.orientacao)
        .then(function(response)
        {
            $log.log("orientacao agendada com sucesso");
            $uibModalInstance.close($scope.form);
        },
        function(error)
        {
            $log.warn("houve erro na requisicao");
            $scope.message = error.data.message;           
        });
    };

    var enviarResposta = function()
    {
        $log.log("botao enviar resposta clicado");
        orientacaoFactory.atualizar($scope.form.orientacao)
        .then(function(response)
        {
            $log.log("resposta enviada com sucesso");
            $uibModalInstance.close($scope.form);
        },
        function(error)
        {
            $log.warn("houve erro na requisicao");
        });
    };
        
    $scope.open1 = function() 
    {
        $scope.popup1.opened = true;
    };
    
    $scope.popup1 = 
    {
        opened: false
    };

    // desativa domingo
    function disabled(data) 
    {
        var date = data.date,
        mode = data.mode;
        return mode === 'day' && (date.getDay() === 0 || date.getDay() === 7);
     }

    
    // arrumar a data máxima pra 60 dias 
    $scope.dateOptions = 
    {
        dateDisabled: disabled,
        formatYear: 'yy',
        maxDate: new Date(2020, 5, 22),
        minDate: new Date(),
        startingDay: 1
    };

    $scope.toggleMin = function() 
    {
        $scope.inlineOptions.minDate = $scope.inlineOptions.minDate ? null : new Date();
        $scope.dateOptions.minDate = $scope.inlineOptions.minDate;
    };
    
    $scope.hstep = 1;
    $scope.mstep = 10;
});