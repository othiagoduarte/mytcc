angular.module('mytcc')
.controller('mAgendarController', function ($scope, $log, items, $uibModalInstance, orientacaoFactory, loginFactory) 
{
    $scope.form_aluno = false;
    $scope.form_professor = false;
    $scope.form_validacao = false;
    $scope.editar = false;
    
    $log.log(items);


    loginFactory.getCookies()
    .then(function(response)
    {
         $scope.form_aluno = response.data.session_type == "a";
         $scope.form_professor = response.data.session_type == "p";
         $scope.editar = items.status == "1";
    });
    
    $scope.form = 
    { 
        orientacao: 
        {
            idProjeto: items.id,
            datahora: items.data,
            local: items.local,
            assunto: items.anotacoesAgendamento,
            feedback : '',
            status : ''
        }
    };   
    
    $scope.salvar = function()
    {
        $log.log("botao salvar clicado.");
        if(validaForm($scope.form.orientacao))
        {
            orientacaoFactory.registrar($scope.form.orientacao)
            .then(function(response)
            {
                $log.log("orientacao salva no banco com sucesso");
                $uibModalInstance.close($scope.form);
            }),
            function(error)
            {
                $log.warn("houve erro na requisicao");
                $scope.form_validacao = true;
                $scope.message = "Desculpe. Erro de validação";
            };
        }
        else
        {
            $scope.form_validacao = true;
            $scope.message = "Desculpe. Erro de validação";
        }
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

    var validaForm = function(orientacao)
    {
        if(orientacao.idProjeto == 0)
            return false;
        if(orientacao.assunto.length == 0)
            return false;

        return true;
    }
});