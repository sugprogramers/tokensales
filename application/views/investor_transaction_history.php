<div class="page">
    <div class="page-header">
        <h1 class="page-title">Transaction History</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="#">My Wallet</a></li>
                <li class="breadcrumb-item">History</li>
            </ol> 
        </div>          
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <table id="invtransaction_history_table" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Payment Date</th>                            
                            <th>Currency</th>
                            <th>Payment Amount</th>
                            <th>From Account</th>
                            <th>To Account</th>                            
                            <th>Description</th>
                            <th>Type</th>                            
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>                

            </div> 
        </div> 
    </div> 
</div> 


<!-- START DIALOG -->
<!-- Modal -->
<div class="modal fade" id="dialogInvestorTransactionHistory" aria-hidden="true" aria-labelledby="dialogInvestorTransactionHistory"
     role="dialog" tabindex="-1">

    <div class="modal-dialog modal-simple modal-center" style="overflow-y: initial !important">
        <div class="modal-content" style="overflow-y: auto;">
            <form id="comptransactionhistory_form">
                <input type="hidden" id="dlgFinPaymentHistoryId" value=""/>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div>
                        <h4>Transaction Detail</h4>
                        <abbr title="paymentdate">Date:</abbr> 
                        <span class="font-size-15" id="dlgPaymentDate"></span>
                    </div>                                  
                </div>  
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <br> From: 
                            <br>
                            <span class="font-size-15" id="dlgFromAccount"></span>

                            <br>

                            <br> <span id="dlgToTitle"></span>
                            <br>
                            <span class="font-size-15" id="dlgToAccount"></span>
                        </div>                              
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                <br> Description:
                                <br>
                                <span class="font-size-15" id="dlgDescription"></span>
                            </p>                                    
                        </div>
                    </div>

                    <div class="page-invoice-table table-responsive">
                        <table class="table table-hover text-right">
                            <thead>
                                <tr>
                                    <th id="dlgPayoutItemTitleDetail" style="text-align: center"></th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody id="dlgPayoutItems">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </form>
            <!-- End Panel -->
        </div>

    </div>

</div>
<!-- End Modal -->
<!-- END DIALOG-->


<script type="text/javascript">
    window.onload = function () {
        $('#idInvestorBankData').addClass('active');
        $('#idInvestorTransactionHistory').addClass('active');


        var table = $('#invtransaction_history_table').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [8],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Investor_TransactionHistory_Controller/get_items') ?>",
                type: 'GET'
            }
        });
        new $.fn.dataTable.FixedHeader(table);

    };


    function open_viewdetail1(id) {
        $.ajax({
            url: "<?php echo base_url('Investor_TransactionHistory_Controller/get_paymentHistoryDetailById') ?>",
            type: "POST",
            data: {'id': id},
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                if (resp.status === "error") {
                    showError(resp.msg);
                } else if (resp.status === "success") {
                    $('#dlgFinPaymentHistoryId').val(resp.dlgFinPaymentHistoryId);
                    $('#dlgPaymentDate').text(resp.dlgPaymentDate);
                    $('#dlgFromAccount').text(resp.dlgFromAccount);
                    $('#dlgToAccount').text(resp.dlgToAccount);
                    $('#dlgDescription').text(resp.dlgDescription);
                    
                    $('#dlgToTitle').text(resp.dlgToTitle);
                    $('#dlgPayoutItemTitleDetail').text(resp.dlgPayoutItemTitleDetail);

                    $('#dlgPayoutItems').empty();
                    $('#dlgPayoutItems').append(resp.dlgPayoutItems);

                    $('#dialogInvestorTransactionHistory').modal('show');
                }
            }
        });
    }
</script>