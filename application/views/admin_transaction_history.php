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
<div class="modal fade" id="dialogExecutePayment" aria-hidden="true" aria-labelledby="dialogExecutePayment"
     role="dialog" tabindex="-1">

    <div class="modal-dialog modal-simple modal-center" style="overflow-y: initial !important">
        <div class="modal-content" style="overflow-y: auto;">
            <form id="executepayment_form">
                <input type="hidden" id="dlgFinPaymentOrderId" value=""/>
                <div class="page-content">
                    <!-- Panel -->
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="row">
                                <div class="col-lg-3">
                                    <a class="navbar-brand navbar-brand-center" href="#">
                                        <img class="navbar-brand-logo navbar-brand-logo-normal" style="height: 32px;" src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/logo2.png"
                                             title="Remark">
                                        <span class="navbar-brand-text hidden-xs-down" style="color:#6cd9d0"> 
                                            SMART 
                                        </span> 
                                        <span class="navbar-brand-text hidden-xs-down" style="color:rgba(26, 46, 73, 1);font-size: 10px;"> DEVELOPER </span>
                                    </a>
                                </div>
                                <div class="col-lg-6 offset-lg-3 text-right">
                                    <h4>Transaction Detail</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-9">
                                    <p>
                                        <br> To:
                                        <br>
                                        <span class="font-size-15" id="dlgCompanyName"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>
                                        <br> Project:
                                        <br>
                                        <span class="font-size-15" id="dlgProjectName"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>
                                    <address id="dlgAddress">
                                    </address>
                                    </p>
                                </div>
                            </div>-

                            <div class="page-invoice-table table-responsive">
                                <table class="table table-hover text-right">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Description</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Cost</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dlgPayoutItems">
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-right clearfix">
                                <div class="float-right">
                                    <p>Sub - Total amount:
                                        <span id="dlgSubTotalAmount"></span>
                                    </p>
                                    <p class="page-invoice-amount">Grand Total:
                                        <span id="dlgGrandTotalAmount"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-primary">Process Payment</button>
                            </div>
                        </div>
                    </div>
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
        $('#idAdminBankData').addClass('active');
        $('#idAdminTransactionHistory').addClass('active');


        var table = $('#transaction_history_table').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [8],
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


    function open_viewdetail(id) {
        $.ajax({
            url: "<?php echo base_url('Admin_TransactionHistory_Controller/get_paymentHistoryDetailById') ?>",
            type: "POST",
            data: {'id': id},
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                if (resp.status === "error") {
                    showError(resp.msg);
                } else if (resp.status === "success") {
                    $('#dlgFinPaymentOrderId').val(resp.dlgFinPaymentOrderId);
                    $('#dlgCompanyName').text(resp.dlgCompanyName);
                    $('#dlgProjectName').text(resp.dlgProjectName);
                    $('#dlgAddress').text(resp.dlgAddress);

                    $('#dlgPayoutItems').empty();
                    $('#dlgPayoutItems').append(resp.dlgPayoutItems);

                    $('#dlgSubTotalAmount').text(resp.dlgSubTotalAmount);
                    $('#dlgGrandTotalAmount').text(resp.dlgGrandTotalAmount);

                    $('#dialogExecutePayment').modal('show');
                }
            }
        });
    }
</script>