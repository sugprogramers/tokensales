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

                <table id="idTableListInvestor" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Actions</th>
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
        var table = $('#idTableListInvestor').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [5],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_List_Investor_Controller/get_items') ?>",
                type: 'GET'
            },
        });
        new $.fn.dataTable.FixedHeader(table);


    };
    
    function delete_document(id) {
            bootbox.confirm({
                title: "Confirm Delete", message: "Delete Item "+id+"?",
                buttons: {
                    cancel: {label: '<i class="fa fa-times"></i> Cancel', className: 'btn-danger'},
                    confirm: {label: '<i class="fa fa-check"></i> Confirm', className: 'btn-success'}
                },
                callback: function (result) {
                    if (result) {
                          showSuccess('fsffs');
                    }
                }
            });
        }


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