<div class="page">
    <div class="page-header">
        <h1 class="page-title">Investors</h1>
        <div class="page-header-actions">
            <!--<ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-clipboard" href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                <li class="breadcrumb-item active">Headers</li>
            </ol> -->
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <table id="idTableListInvestor" class="table table-hover dataTable table-striped w-full dtr-inline" data-paging="true" data-sorting="true" data-filtering="true">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>


            </div> 
        </div> 
    </div> 
</div>    

<script type="text/javascript">
    window.onload = function () {
        $('#idListInvestorAdmin').addClass('active');
        $('#idTableListInvestor').DataTable({
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_List_Investor_Controller/get_items') ?>",
                type: 'GET'
            },
        });

    };
</script>



<!--
TEMPLATE
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Page Headers</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-clipboard" href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                <li class="breadcrumb-item active">Headers</li>
            </ol>
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

            </div> 
        </div> 
    </div> 
</div>  
-->