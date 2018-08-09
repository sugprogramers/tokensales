<div class="page">
    <div class="page-header">
        <h1 class="page-title">Paypal Account</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="#">Bank Data</a></li>
                <li class="breadcrumb-item">Paypal Account</li>
            </ol> 
        </div>           
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">                               

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

<script type="text/javascript">
    window.onload = function () {
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
