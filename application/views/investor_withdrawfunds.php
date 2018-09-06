<div class="page">
    <div class="page-header">
        <h1 class="page-title">Withdraw Funds</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="#">My Wallet</a></li>
                <li class="breadcrumb-item">Withdraw Funds</li>
            </ol> 
        </div>  
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <div class="col-xl-12">
                    <!-- Example Tabs Line Top -->
                    <div class="example-wrap">
                        <div class="nav-tabs-horizontal" data-plugin="tabs">
                            <ul class="nav nav-tabs nav-tabs-line tabs-line-top" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsLineTopOne"
                                                                            aria-controls="exampleTabsLineTopOne" role="tab">Withdraw</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopTwo"
                                                                            aria-controls="exampleTabsLineTopTwo" role="tab">History</a></li>
                            </ul>
                            <div class="tab-content pt-20">
                                <div class="tab-pane active" id="exampleTabsLineTopOne" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">                              
                                            <form id="withdrawFunds-form" method="post" style="padding-left: 10px;">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Your current withdrawal balance: <span style="color: #17b3a3" id="frmTotalWithdrawBalance"></span></p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <p><span style="color: #17b3a3" id="frmWithdrawStatus"></span></p> 
                                                    </div>  
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="amount">Enter withdrawal amount*</label>
                                                        <!--<input type="number" required class="form-control" id="withdrawalAmount" name="amount" placeholder="Enter Withdraw Amount" step=".01" min="0.01" style="font-size: 14px; border-radius:0;" onblur="format_number()">-->
                                                        <input type="text" required class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" id="withdrawalAmount" name="amount" placeholder="Enter Withdraw Amount" style="font-size: 14px; border-radius:0;" onblur="format_number()">
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>   

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-3">   
                                                        Withdraw To:                                                                                                    
                                                    </div>
                                                    <div class="col-sm-3 text-right"> 
                                                        <span class="font-size-15" id="frmWithdrawEmail"></span>  
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-3">   
                                                        Payment Order ID:                                                                                                  
                                                    </div>
                                                    <div class="col-sm-3 text-right"> 
                                                        <span class="font-size-15" id="frmWithdrawPaymentOrderId"></span>
                                                    </div>                                                    
                                                    <div class="col-sm-6"></div>  
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-3">   
                                                        Created Time:                                                                                                   
                                                    </div>
                                                    <div class="col-sm-3 text-right"> 
                                                        <span class="font-size-15" id="frmWithdrawCreated"></span>
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>                    

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary" id="frmSubmitWithdraw">Withdraw</button>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-6"></div>  
                                                </div>  

                                            </form>
                                            
                                            <p style="padding-left: 10px;"><small><strong>Fields in (*) are required.</strong></small></p>
                                            
                                            <small><strong id="idMyMsg"></strong></small>
                                            
                                        </div></div>
                                </div>

                                <div class="tab-pane" id="exampleTabsLineTopTwo" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">      
                                            <table id="withdraw_history_table" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                                                <thead>
                                                    <tr>
                                                        <th>Transaction Date</th>                            
                                                        <th>Currency</th>
                                                        <th>Amount</th>
                                                        <th>From</th>
                                                        <th>To</th>                            
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Transaction ID</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>                                             
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Example Tabs Line Top -->
                </div>


            </div> 
        </div> 
    </div> 
</div> 

<script type="text/javascript">
    function format_number(){
       var x = Number($("#withdrawalAmount").val());
       if(!x) {
         return;
       } 
       $("#withdrawalAmount").val(x.toLocaleString());
    }
    
    function enablePaymentOrderLogic($enable) {
        if ($enable === true) {
            $("#withdrawalAmount").prop('readOnly', false);
            $("#withdrawalAmount").prop('disabled', false);

            $("#frmSubmitWithdraw").prop('disabled', false);
            
            $("#idMyMsg").text('');

        } else {
            $("#withdrawalAmount").prop('readOnly', true);
            $("#withdrawalAmount").prop('disabled', true);

            $("#frmSubmitWithdraw").prop('disabled', true);
            
            $("#idMyMsg").text('Your withdrawal payment order is in pending status and will be processed in a few minutes.');
        }
    }

    window.onload = function () {
        $('#idInvestorBankData').addClass('active');
        $('#idInvestorWithdrawFunds').addClass('active');

        // tab panel #1
        var totalPayoutBalance = "<?php echo $frmTotalWithdrawAmount; ?>";
        $("#frmTotalWithdrawBalance").text("<?php echo $frmCurrSymbol; ?>" + totalPayoutBalance);
        $("#frmWithdrawEmail").text("<?php echo $frmPayinPaypal; ?>");

        // no previous payment order
        if ("<?php echo $frmPaymentOrderId; ?>" === "") {
            $("#frmWithdrawPaymentOrderId").text('<None>');
            $("#frmWithdrawCreated").text("<None>");
            $("#frmWithdrawStatus").text("New Withdrawal");

            enablePaymentOrderLogic(true);
            $("#withdrawalAmount").val('');            

        } else {
            $("#frmWithdrawPaymentOrderId").text("<?php echo $frmPaymentOrderId; ?>");
            $("#frmWithdrawCreated").text("<?php echo $frmScheduledTime; ?>");
            $("#frmWithdrawStatus").text("<?php echo $frmWithdrawStatus; ?>");

            enablePaymentOrderLogic(false);
            $("#withdrawalAmount").val("<?php echo $frmWithdrawAmount; ?>");                        
        }


        $("#withdrawFunds-form").submit(function (event) {
            event.preventDefault();

            if ("<?php echo $frmPaymentOrderId; ?>" !== "") {
                showError('Existent Withdrawal payment orders cannot be edited.');
                return;
            }

            var payoutWithdrawAmt = $("#withdrawalAmount").val();
            if (!payoutWithdrawAmt) {
                showError('Please enter a amount to withdraw.');
                return;
            }
            if (payoutWithdrawAmt <= 0 || (parseFloat(payoutWithdrawAmt) > parseFloat(totalPayoutBalance))) {
                showError('Please enter a valid amount.');
                return;
            }

            $.ajax({
                url: "<?php echo base_url('Investor_WithdrawFunds_Controller/update_payment_order') ?>",
                type: "POST",
                data: {
                    'paymentOrderId': "<?php echo $frmPaymentOrderId; ?>",
                    'withdrawalAmount': $('#withdrawalAmount').val()
                },
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {
                        showError(resp.msg);

                    } else if (resp.status === "success") {
                        $("#frmWithdrawPaymentOrderId").text(resp.frmPaymentOrderId);
                        $("#frmWithdrawCreated").text(resp.frmScheduledTime);
                        $("#frmWithdrawStatus").text(resp.frmWithdrawStatus);

                        enablePaymentOrderLogic(false);

                        showSuccess('Your withdrawal payment order is in pending status and will be processed in a few minutes.');
                    }

                }
            });
        });

        // tab panel #2
        var table = $('#withdraw_history_table').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Investor_WithdrawFunds_Controller/get_transaction_history_items') ?>",
                type: 'GET'
            }
        });
        new $.fn.dataTable.FixedHeader(table);

    };
</script>