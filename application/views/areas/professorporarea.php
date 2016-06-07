<div ng-controller="areaController as areaCtrl">
    <h3>Minhas áreas de interesse</h3>
    <br/>
    <div class="alert-info">
        <a href={{areaCtrl.VincularAreaLink}}>Vincular uma <strong>nova área</strong></a>
    </div>
    <br>
    <div class="table-responsive">
        <table id="tabelaIndex" class="table table-bordered">
            <h4>{{ areaCtrl.status }}</h4>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th class="col-md-2">Ação</th>
                </tr>
            </thead>
            <tbody>
                    <tr ng-repeat="ar in areaCtrl.areasProfessor">
                        <td>{{ ar.id }}</td>
                        <td>{{ ar.descricao }}</td>
                        <td>Editar</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>