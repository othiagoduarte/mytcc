<div ng-controller="orientacaoController as ctrl" ng-init="ctrl.loadAlunoLine()">
    <h3>Minhas orientações</h3>
    <hr>
    
    <p><label class="checkbox-inline"><input type="checkbox" ng-false-value="''" ng-true-value="'4'" ng-model="ctrl.status">Confirmada</label></p>    
    <table class="table table-bordered table-hover" ng-show="ctrl.alunoline > '0'">
        <thead>
            <th>Data</th>
            <th>Hora</th>
            <th>Local</th>
            <th>Professor</th>
            <th>Status</th>
        <tbody>
            <tr ng-repeat="orien in ctrl.alunoline | filter: { status: ctrl.status }" >
                <td>{{ orien.data | date:"dd/MM/yyyy" }}</td>
                <td>{{ orien.data | date:"HH:mm" }}</td>
                <td>{{ orien.local }}</td>
                <td>{{ orien.nome }}</td>
                <td>{{ orien.statusOrientacao }}</td>
            </tr>
    </table>
</div>