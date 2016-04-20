<!--Carregar o Header-->
<?php $this->load->view('includes/header')?>
 <div id="wrapper">
    <?php $this->load->view('includes/menu_principal')?>  
    <?php $this->load->view('includes/menu_lateral')?>          
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blank</h1>
                    <?php $this->load->view('view_solicitacao')?>
                <div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- Carregar o footer -->
<?php $this->load->view('includes/footer')?>