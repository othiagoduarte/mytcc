<div ng-init="loadTimeline()"></div>
<div ng-show="timeline > '0'">
    <span class="label label-info">Histórico de orientações do orientando <strong>{{ nome }}</strong></span>
    <table class="table table-bordered table-hover">
        <thead>
            <th>Data</th>
            <th>Hora</th>
            <th>Status</th>
        <tbody>
            <tr ng-repeat="orien in timeline">
                <td> {{ orien.data | date:"dd/MM/yyyy" }}</td>
                <td> {{ orien.data | date:"HH:mm" }}</td>
                <td> <a ng-click= "modalAgendamento(orien)" class="">{{ orien.statusOrientacao }}</a></td>
            </tr>
    </table>
</div>