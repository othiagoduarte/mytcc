angular.module('mytcc')

// define um controlador dentro do modulo 'myApp' que será chamado la na view
.controller('relatorioController', function($log, relatorioFactory) 
{	
	$log.info("acessando controlador de relatorios...");

    var bars;
    var dados = [];
    
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() 
    {
        relatorioFactory.getData()
        .then(function(response)
        {
            bars = response.data.length;
            dados = response.data;
            
            var data = new google.visualization.DataTable();
            
            data.addColumn("string", "oi");
            
            var array = [];
            array.push("Areas");
            for(i=0;i<dados.length;i++)
            {
                data.addColumn("number", dados[i].descricao);
                array.push(dados[i].total);
            }

            data.addRow(array);

            var options = 
            {
                title : 'Quantidade de projetos por area de interesse',
                vAxis: {title: 'Quantidade de Projetos'},
                hAxis: {title: 'Areas de Interesse'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        })
    };
});
