<div ng-controller="projetoController" ng-init="projetos = listaProjetos()">
    <h3>Agendar Orientação</h3>
    
    <div ng-show="showMessage" >
        <div class="bg bg-warning">Você <strong>não está</strong> orientando alunos no momento.</div>
    </div>
    
    </br>
        
    <!--Painel com as solicitacoes ja aceitas-->
    <div class="panel panel-default"  ng-show="aceito.length > 0">
        <div class="panel-heading">
            <span class=" glyphicon glyphicon-user" aria-hidden="true"></span>
            <a class="panel-title" data-toggle="collapse" data-parent="#panel-95759" href="#panel-element-549991">Alunos Orientando ({{aceito.length}})</a>
        </div>
        <div id="panel-element-549991" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                        <th>Aluno</th>
                        <th>Compareceu</th>
                        <th>Área de interesse</th>
                        <th>Data da Solicitação</th>
                    </thead>
                    <tbody>
                        <tr ng-repeat="projeto in aceito">               
                            <td><button type="button" class="btn btn-success btn-xs" ng-click="modalAgendar(projeto)">
                                <span class="glyphicon glyphicon-plus"></span></button>
                            <a ng-href="#/timeline/{{projeto.id}}" class="btn btn-primary btn-xs">{{ projeto.NomeAluno }}</a></td>	
                            <td>{{ projeto.numOrientacoes }}</td>
                            <td>{{ projeto.NomeAreaInteresse }}</td>
                            <td>{{ projeto.dataSolicitacao }}</td>
                        </tr>								
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>