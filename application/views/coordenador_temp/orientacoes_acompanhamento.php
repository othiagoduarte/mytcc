<p></p>
<fieldset>
    <legend>Acompanhamento de Orientações</legend>
    <div class="col-lg-6">
<!--    <p class="text-left text-primary">Acompanhamento de Orientações - TCC 1</p>-->
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
                    <div class="flot-chart-content" id="orientacoes_tcc1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
    <!--    <p class="text-left text-primary">Acompanhamento de Orientações - TCC 2</p>-->
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
                    <div class="flot-chart-content" id="orientacoes_tcc2"></div>
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
                label: "Alunos sem orientacao",
                data: 10
            }, {
                label: "Alunos com orientacao",
                data: 90
            }];

        var data_tcc2 = [{
                label: "Alunos sem orientacao",
                data: 30
            }, {
                label: "Alunos com orientacao",
                data: 70
            }];

        $.plot($("#orientacoes_tcc1"), data_tcc1, {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                show: false
            }
        });

        $.plot($("#orientacoes_tcc2"), data_tcc2, {
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