<h3>{{ orientacao.aluno.nome }}</h3>

<input type="button" ng-click="abrirModalAgendar()" value="Agendar Orientação">

<ul ng-repeat="orien in orientacoes">
    <li> {{ orien.hora }}</li>
    <li> {{ orien.hora }}</li>
    <li> {{ orien.status }}</li>
</ul>