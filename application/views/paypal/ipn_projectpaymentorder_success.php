<div class="page">
    <div class="page-header">
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-clipboard" href="<?php echo base_url('admin_list_project_ppayout/') ?>">Projects Pending for Loan Payout</a></li>
                <li class="breadcrumb-item"><a href="#">Process Project Loan Payout</a></li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">    
        <!-- Panel Table Add Row -->
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-12">
                        <div id="alertMessage">
                            <blockquote class="blockquote custom-blockquote blockquote-success">
                                <p class="mb-0">SUCCESS</p>
                                <footer class="blockquote-footer">Loan payout for project: <?php if(isset($projectName )) echo $projectName  ?>
                                    executed successfully. Project status will be updated in a few minutes.
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row" style="height: 200px"></div>
            </div>
        </div>
        <!-- End Panel -->
    </div>
</div> 

<script type="text/javascript">
    window.onload = function () {
        var status = "<?php echo $status ?>";
        var msg = "<?php echo $msg ?>";
        
        if (status === "error") {                       
            var pnl = document.getElementById('alertMessage');
            pnl.style.visibility = "hidden";
            pnl.style.display = "none";
            showError(msg);
        } 
    };

</script>