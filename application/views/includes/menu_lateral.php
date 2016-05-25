    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Orientação<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">                                
                                <li ng-show="login.menu_aluno">
                                    <a ng-href="<?php echo base_url('') ?>"><i class="fa fa-dashboard fa-fw"></i> Minhas Orientacoes</a>
                                </li>
                                <li ng-show="login.menu_professor">
                                    <a ng-href="<?php echo base_url('orientacao/listar') ?>"><i class="fa fa-dashboard fa-fw"></i> Listar</a>
                                </li>
                                <li ng-show="login.menu_aluno">
                                    <a ng-href="<?php echo base_url('orientacao/solicitar') ?>"><i class="fa fa-dashboard fa-fw"></i> Solicitar</a>
                                </li>
                                <li ng-show="login.menu_professor">
                                    <a ng-href="<?php echo base_url('orientacao/responder') ?>"><i class="fa fa-dashboard fa-fw"></i> Responder</a>
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
