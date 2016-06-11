<div ng-controller="orientacaoController as ctrl">
    <h3>Agenda - próximos 7 dias</h3>
    <hr>    
    
    <table class="table table-bordered table-hover">
        <thead>
            <th>Data</th>
            <th>Hora</th>
            <th>Local</th>
            <th>Aluno</th>
            <th>Status</th>
        <tbody>
            <tr ng-repeat="orien in ctrl.dashboard">
                <td> {{ orien.data | date:"dd/MM/yyyy" }}</td>
                <td> {{ orien.data | date:"HH:mm" }}</td>
                <td> {{ orien.local }}</td>
                <td> {{ orien.nomeAluno }}</td>
                <td> {{ orien.statusOrientacao }}</td>
            </tr>
    </table>
</div>