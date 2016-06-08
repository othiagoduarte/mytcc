<div ng-controller="areaController as areaCtrl">
    <div class="container">
        <div class="row">
            <div class="form-group">
                <div class="col-xs-6">
                    <h3 class=text-info>Minhas áreas de interesse</h3>
                </div>
                <div class="col-xs-6">
                    <br>
                    <input type="button" value="Salvar" class="btn btn-success btn-md" ng-click="salvar()"/>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <div ng-show="areaCtrl.areasProfessor.length > 0">
        <h4 class="text-info">Atual</h4>
        <div class="table-responsive">
            <table id="tabelaIndex" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                        <tr ng-repeat="ar in areaCtrl.areasProfessor">
                            <td>{{ ar.id }}</td>
                            <td>{{ ar.descricao }}</td>
                            <td><input class="btn-warning" type="button" value="Remover" ng-click="areaCtrl.remover(ar)"/></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div ng-show="areaCtrl.areasNotProfessor.length > 0">
        <h4 class="text-info">Disponível</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                        <tr ng-repeat="ar in areaCtrl.areasNotProfessor">
                            <td>{{ ar.id }}</td>
                            <td>{{ ar.descricao }}</td>
                            <td><input class="btn-info" type="button" value="Incluir" ng-click="areaCtrl.adicionar(ar)"/></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>