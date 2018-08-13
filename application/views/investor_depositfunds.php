<div class="page">
    <div class="page-header">
        <h1 class="page-title">Deposit Funds</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="#">Bank Data</a></li>
                <li class="breadcrumb-item">Deposit Funds</li>
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
                                                                            aria-controls="exampleTabsLineTopOne" role="tab">Deposit</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopTwo"
                                                                            aria-controls="exampleTabsLineTopTwo" role="tab">History</a></li>
                            </ul>
                            <div class="tab-content pt-20">
                                <div class="tab-pane active" id="exampleTabsLineTopOne" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">                              

                                            <form id="depositFunds-form">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>This is your current available balance.</p>
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Pay-In Balance: <span style="color: #17b3a3" id="idCurrentPayinBalance"></span></p>                            
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
                                                        <input type="number" required class="form-control" id="inputAmount" name="amount" placeholder="USD Amount" step=".01" style="font-size: 14px; border-radius:0;">                            
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

                                            <small><strong id="idMyMsg"></strong></small>
                                        </div></div>
                                </div>

                                <div class="tab-pane" id="exampleTabsLineTopTwo" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">      
                                            <table id="deposit_history_table" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                                                <thead>
                                                    <tr>
                                                        <th>Payment Date</th>                            
                                                        <th>Currency</th>
                                                        <th>Payment Amount</th>
                                                        <th>From Account</th>
                                                        <th>To Account</th>                            
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
    window.onload = function () {
        $('#idInvestorBankData').addClass('active');
        $('#idInvestorDepositFunds').addClass('active');


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

    };

</script>
