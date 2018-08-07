<div class="page">
    <div class="page-header">
        <h1 class="page-title">Transaction History</h1>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <table id="transaction_history_table" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Payment Date</th>                            
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>From Account</th>
                            <th>To Account</th>
                            <th>From User</th>
                            <th>To User</th>
                            <th>Type</th>
                            <th>Status</th>
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
        $('#idAdminBankData').addClass('active');
        $('#idAdminTransactionHistory').addClass('active');


        var table = $('#transaction_history_table').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [9],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_TransactionHistory_Controller/get_items') ?>",
                type: 'GET'
            }
        });
        new $.fn.dataTable.FixedHeader(table);


    };
</script>