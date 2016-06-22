<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="active" ng-if="login.menu_coordenador">
                <a href="#"><i class="glyphicon glyphicon-th-list"></i> Coordenador<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">                                
                    <li>
                        <a ng-href="<?php echo base_url('areainteresses/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a ng-href="<?php echo base_url('areainteresses') ?>"><i class="fa fa-dashboard fa-fw"></i> Areas de Interesse</a>
                    </li>
                    <li>
                        <a ng-href="<?php echo base_url('coordenador/orientacoes_acompanhamento') ?>"><i class="fa fa-dashboard fa-fw"></i> Acompanhamento de Orientações</a>
                    </li>
                    <li>
                        <a ng-href="<?php echo base_url('coordenador/orientacoes_controle_vagas') ?>"><i class="fa fa-dashboard fa-fw"></i> Controle de vagas de Orientação</a>
                    </li>
                    <li>
                        <a ng-href="<?php echo base_url('coordenador/importar_alunos') ?>"><i class="fa fa-dashboard fa-fw"></i> Importar alunos</a>
                    </li>
                </ul>
            <li class="active" ng-show="login.menu_aluno">
                <a href="#"><i class="glyphicon glyphicon-th-list"></i> Aluno<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">                                
                    <li>
                        <a ng-href="<?php echo base_url('orientacoes/minhasorientacoes') ?>"><i class="fa fa-dashboard fa-fw"></i> Minhas Orientacoes</a>
                    </li>
                    <li>
                        <a ng-href="<?php echo base_url('projetos/solicitar') ?>"><i class="fa fa-dashboard fa-fw"></i> Solicitar orientador</a>
                    </li>                         
                </ul>
            <li class="active" ng-show="login.menu_professor">
                <a href="#"><i class="glyphicon glyphicon-th-list"></i> Professor<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">                                
                    <li>
                        <a ng-href="<?php echo base_url('orientacoes/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a ng-href="<?php echo base_url('orientacoes/agendar') ?>"><i class="glyphicon glyphicon-calendar"></i> Agendar Orientação</a>
                    </li>
                    <li>
                        <a ng-href="<?php echo base_url('projetos/listar') ?>"><i class="glyphicon glyphicon-pencil"></i> Gerência de solicitações</a>
                    </li>                            
                    <li>
                        <a ng-href="<?php echo base_url('areainteresses/professor') ?>"><i class="fa fa-dashboard fa-fw"></i> �?reas de Interesse</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
</div> <!-- fechando a div loginController do angular-->
