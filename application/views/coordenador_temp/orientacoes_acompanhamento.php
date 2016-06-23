<p></p>
<fieldset>
    <legend>Acompanhamento de Orientações</legend>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">TCC 1
                <select style="float: right" id="cbxTcc1" class="combobox">
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
        <div class="panel panel-default">
            <div class="panel-heading">TCC 2
                <select style="float: right" id="cbxTcc2" class="combobox">
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
        function getJSonData(valorCombo, multi) {
            var intAlunoSemOri = (parseInt(valorCombo.substring(3, 4), 10) * multi) * parseInt(valorCombo.substring(4, 5), 10) * 2;
            var intAlunoComOri = 100 - intAlunoSemOri;
            return [{label: "Alunos sem orientacao", data: intAlunoSemOri}, {label: "Alunos com orientacao", data: intAlunoComOri}];
        }
        
        function bind_chart_data(id, data) {
            $.plot($(id), data, {
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
        }

        $('<option value="20151">2015/1</option>').appendTo(".combobox");
        $('<option value="20152">2015/2</option>').appendTo(".combobox");
        $('<option value="20161">2016/1</option>').appendTo(".combobox");
        $('<option value="20162">2016/2</option>').appendTo(".combobox");

        $("#cbxTcc1").change(function () {
            bind_chart_data('#orientacoes_tcc1', getJSonData($(this).val() + '', 2));
        });
        
        $("#cbxTcc2").change(function () {
            bind_chart_data('#orientacoes_tcc2', getJSonData($(this).val() + '', 3));
        });
        
        $(".combobox").val('20161');
        bind_chart_data('#orientacoes_tcc1', getJSonData($("#cbxTcc1").val() + '', 2));
        bind_chart_data('#orientacoes_tcc2', getJSonData($("#cbxTcc2").val() + '', 3));

    });
</script>
<!--<script src="../js/flot-data.js"></script>-->