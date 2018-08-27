<div class="page">
    <div class="page-header">
        <h1 class="page-title">Company</h1>
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
                            
                            <th>Email</th>
                            <th>Password</th>
                            <th>Company</th>
                            
                            <th>More Info</th>
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
        $('#idListCompanyAdmin').addClass('active');
        
        var table = $('#idTableListInvestor').DataTable({
            responsive: true,
            fixedHeader:{header:!0},
            "order": [[ 0, "desc" ]],
            "columnDefs": [{
                    "targets": [3],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_List_Company_Controller/get_items') ?>",
                type: 'GET'
            },
        });
      new $.fn.dataTable.FixedHeader( table );

    };
</script>
