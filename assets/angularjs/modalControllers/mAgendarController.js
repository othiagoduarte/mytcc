angular.module('mytcc')
.controller('mAgendarController', function ($scope, $log, items, orientacaoFactory, loginFactory) 
{
    $scope.form_aluno = false;
    $scope.form_professor = false;
    $scope.form_validacao = false;
    
    loginFactory.getCookies()
    .then(function(response)
    {
        if(response.data.session_id == "p")
            $scope.form_aluno == true;
        else if(response.data.session_id == "a")
            $scope.form_professor = true;
    });
    
    $scope.form = 
    { 
        orientacao: 
        {
            idProjeto: items.id,
            datahora: new Date(),
            local: "",
            assunto: ""
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
                
            }),
            function(error)
            {

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