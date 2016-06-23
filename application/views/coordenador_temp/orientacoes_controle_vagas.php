<p></p>
<fieldset>
    <legend>Controle de Alunos</legend>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">TCC 1
                <select style="float: right">
                    <a href="importar_alunos.php"></a>
                    <option>2015/1</option>
                    <option>2015/2</option>
                    <option>2016/1</option>
                    <option>2016/2</option>
                </select>
            </div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="controle_alunos_tcc1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">TCC 2
                <select style="float: right">
                    <option>2015/1</option>
                    <option>2015/2</option>
                    <option>2016/1</option>
                    <option>2016/2</option>
                </select>
            </div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="controle_alunos_tcc2"></div>
                </div>
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>Controle de Professores</legend>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">TCC 1
                <select style="float: right">
                    <option>2015/1</option>
                    <option>2015/2</option>
                    <option>2016/1</option>
                    <option>2016/2</option>
                </select>
            </div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="controle_professores_tcc1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">TCC 2
                <select style="float: right">
                    <option>2015/1</option>
                    <option>2015/2</option>
                    <option>2016/1</option>
                    <option>2016/2</option>
                </select>
            </div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="controle_professores_tcc2"></div>
                </div>
            </div>
        </div>
    </div>
</fieldset>

<!-- Flot Charts JavaScript -->
<script src="<?php echo base_url("/assets/bower_components/flot/excanvas.min.js"); ?>"></script>
<script src="<?php echo base_url("/assets/bower_components/flot/jquery.flot.js"); ?>"></script>
<script src="<?php echo base_url("/assets/bower_components/flot/jquery.flot.pie.js"); ?>"></script>
<script src="<?php echo base_url("/assets/bower_components/flot/jquery.flot.resize.js"); ?>"></script>
<script src="<?php echo base_url("/assets/bower_components/flot/jquery.flot.time.js"); ?>"></script>
<script src="<?php echo base_url("/assets/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"); ?>"></script>
<script type="text/javascript">
    //Flot Pie Chart
    $(function () {

        var data_tcc1 = [{
                label: "Alunos sem orientador",
                data: 20
            }, {
                label: "Alunos com orientador",
                data: 80
            }];

        var data_tcc2 = [{
                label: "Alunos sem orientador",
                data: 35
            }, {
                label: "Alunos com orientador",
                data: 65
            }];

        $.plot($("#controle_alunos_tcc1"), data_tcc1, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });

        $.plot($("#controle_alunos_tcc2"), data_tcc2, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });
        
        var data_professores_tcc1 = [{
                label: "Professores sem vaga",
                data: 45
            }, {
                label: "Professores com vaga",
                data: 55
            }];

        var data_professores_tcc2 = [{
                label: "Professores sem vaga",
                data: 85
            }, {
                label: "Professores com vaga",
                data: 15
            }];

        $.plot($("#controle_professores_tcc1"), data_professores_tcc1, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });

        $.plot($("#controle_professores_tcc2"), data_professores_tcc2, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });

    });
</script>
<!--<script src="../js/flot-data.js"></script>-->