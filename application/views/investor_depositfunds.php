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
                <form id="depositFunds-form">
                    <div class="row">
                        <div class="col-md-12">
                            <p>This is your current available balance.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p>Pay-In Balance: <span style="color: #17b3a3" id="idPayinBalance"></span></p>                            
                        </div>
                    </div>     

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <p>To increment this balance you can deposit from your paypal account, please enter the amount you want to deposit to your balance.</p>
                        </div>
                    </div>                    

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="control-label" for="amount">Amount*</label>
                            <input type="number" required class="form-control" id="inputAmount" name="amount" placeholder="USD Amount" step=".01" style="font-size: 14px; border-radius:0;">                            
                        </div>
                    </div>

                    <br>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-15">
                                <button type="submit"  class="btn btn-primary">Deposit</button>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>                    
                </form>
            </div> 
        </div> 
    </div> 
</div>

<script type="text/javascript">
    window.onload = function () {
        $('#idInvestorBankData').addClass('active');
        $('#idInvestorDepositFunds').addClass('active');

        $("#idPayinBalance").text(<?php echo $payinbalance ?>);

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

    };

</script>
