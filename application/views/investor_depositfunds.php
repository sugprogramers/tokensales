<div class="page">
    <div class="page-header">
        <h1 class="page-title">Fund your Wallet</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="#">My Wallet</a></li>
                <li class="breadcrumb-item">Add Funds</li>
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
                                                                            aria-controls="exampleTabsLineTopOne" role="tab">Fund your Wallet</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopTwo"
                                                                            aria-controls="exampleTabsLineTopTwo" role="tab" id="linkTab2">History</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopThree"
                                                                            aria-controls="exampleTabsLineTopThree" role="tab" id="linkTab3">Paypal Account</a></li>                                                                            
                            </ul>
                            <div class="tab-content pt-20">
                                <div class="tab-pane active" id="exampleTabsLineTopOne" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">                              

                                            <form id="depositFunds-form">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>This is your current balance.</p>
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Available funds: <span style="color: #17b3a3" id="idCurrentPayinBalance"></span></p>                            
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>     

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>To increment this balance you can deposit us, please enter the amount you want to deposit to.</p>
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>                    

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="amount">Amount*</label>
                                                        <!--<input type="number" required class="form-control" id="inputAmount" name="amount" placeholder="USD Amount" step=".01" style="font-size: 14px; border-radius:0;">-->                            
                                                        <input type="text" required class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" id="inputAmount" name="amount" placeholder="USD Amount" style="font-size: 14px; border-radius:0;" onblur="format_number()">                                                        
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary">Deposit</button>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-6"></div>  
                                                </div>                   
                                            </form>           
                                            
                                            <p style="padding-left: 10px;"><small><strong>Fields in (*) are required.</strong></small></p>                                                                                    
                                            
                                        </div></div>
                                </div>

                                <div class="tab-pane" id="exampleTabsLineTopTwo" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">      
                                            <table id="deposit_history_table" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                                                <thead>
                                                    <tr>
                                                        <th>Transaction Date</th>                            
                                                        <th>Currency</th>
                                                        <th>Amount</th>
                                                        <th>From</th>
                                                        <th>To</th>                            
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>                                             
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="exampleTabsLineTopThree" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">      
                                            <form method="post" id="paypalacct_form">
                                                <p>In order to receive return investments of projects, enter your paypal email address</p>
                                                <div></div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group ">
                                                            <label class="control-label" for="paypalaccount">Paypal Account</label>
                                                            <input type="email" required class="form-control" id="inputPaypalAcct" name="paypalacct" placeholder="Paypal Account" style="font-size: 14px; border-radius:0;">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6"></div>                        
                                                </div>                    

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-6"></div>  
                                                </div> 
                                            </form>                                          
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
       var x = Number($("#inputAmount").val());
       if(!x) {
         return;
       } 
       $("#inputAmount").val(x.toLocaleString());
    }
        
    window.onload = function () {
        $('#idInvestorBankData').addClass('active');
        $('#idInvestorDepositFunds').addClass('active');
        
        var tabpanel = "<?php echo $default_tab; ?>";
        if (tabpanel === '2') {
            $("#linkTab2").trigger("click");
        }

        // tab panel #1
        $("#idCurrentPayinBalance").text("<?php echo $curr_symbol; ?>" + "<?php echo $payinbalance; ?>");

        $("#depositFunds-form").submit(function (event) {
            event.preventDefault();
            var payinBalanceAmt = $("#inputAmount").val();
            if (!payinBalanceAmt) {
                showError('Please enter a amount to deposit.');
                return;
            }
            var investorId = "<?php echo $investorId; ?>";
            if (investorId === '') {
                showError('Error loading payment information.');
                return;
            }

            payinBalanceAmt = payinBalanceAmt.replace(",","");
            window.location.href = "<?php echo base_url('investor_processdepositfunds/') ?>" + investorId + "/" + payinBalanceAmt;
        });
        
        
        // tab panel #2
        var table = $('#deposit_history_table').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Investor_DepositFunds_Controller/get_transaction_history_items') ?>",
                type: 'GET'
            }
        });
        new $.fn.dataTable.FixedHeader(table);        
        
        
        // tab panel #3
        $('#idInvestorBankData').addClass('active');
        $('#idInvestorPaypalAcct').addClass('active');

        $("#inputPaypalAcct").val("<?php echo $paypalacct ?>");

        $("#paypalacct_form").submit(function (event) {
            event.preventDefault();

            var paypalacct = $('#inputPaypalAcct').val();
            if (!paypalacct) {
                showError('Missing all required fields');
                return;
            }

            $.ajax({
                url: "<?php echo base_url('Investor_PaypalAccount_Controller/update_paypal_acct') ?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        if (resp.msg === "missingFields") {
                            showError('Missing all required fields');
                        } else {
                            showError(resp.msg);
                        }

                    } else if (resp.status === "success") {
                        showSuccess('Your information has been updated.');
                    }

                }
            });
        });        

    };

</script>
