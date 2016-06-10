<div ng-controller="orientacaoController as ctrl">
    <h3>Dashboard professor</h3>
    
    <ul ng-repeat="orien in ctrl.dashboard">
        <li> {{ orien.hora }}</li>
        <li> {{ orien.hora }}</li>
        <li> {{ orien.status }}</li>
    </ul>
</div>