<div class="page">
    <div class="page-header">
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="<?php echo base_url('investor_depositfunds/') ?>">Bank Data</a></li>
                <li class="breadcrumb-item">Process Deposit Funds</li>
            </ol> 
        </div>         
    </div>
    <div class="page-content container-fluid">    
        <!-- Panel Table Add Row -->
        <div class="panel">
            <div class="panel-body nav-tabs-animate">

                <div class="tab-content">

                    <div class="tab-pane active  animation-slide-left" role="tabpanel">
                        <div class="margin-top-5">
                            
                            <div class="example" id="wizarDiv">
                                <div class="pearls row">
                                    <div class="pearl current col-xs-6" style="width: 50%" id="step1" onclick="showDiv(1);">
                                        <div class="pearl-icon"><i class="icon wb-file" aria-hidden="true"></i></div>
                                        <span class="pearl-title">Payment Information</span>
                                    </div>

                                    <div class="pearl  col-xs-6" style="width: 50%" id="step2" >
                                        <div class="pearl-icon"><i class="icon wb-payment" aria-hidden="true"></i></div>
                                        <span class="pearl-title">Payment Options</span>
                                    </div>
                                </div>
                            </div>           


                            <div class="row" id="paymentInfoData">
                                <div class="panel-body">
                                    <form id="paymentInformation-form">
                                        <input type="hidden" id="dlgInvestorId" name="dlgInvestorId" value=""/>
                                        <div class="row">
                                            <div class="col-lg-9">                                                
                                                    <br> To:
                                                    <br>
                                                    <span class="font-size-15" id="dlgName"></span>                                                
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <address id="dlgAddress"></address>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                    <br> Payment Method:
                                                    <br>
                                                    <span class="font-size-15" id="dlgPaymentMethod"></span>                                                
                                            </div>
                                        </div>

                                        <div class="page-invoice-table table-responsive">
                                            <table class="table table-hover text-right">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Description</th>
                                                        <th class="text-right">Currency</th>
                                                        <th class="text-right">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="dlgPayoutItems">
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary"> Confirm &amp; Next <i class="icon wb-arrow-right" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                </div> 
                            </div>

                            <div class="row" id="optionPaypal" style="display:none">
                                <center> Once reviewed all payment information you can execute the payment using paypal. <br>
                                    Please login using the provided button</center>
                                <div class="example-wrap">

                                    <div class="example">
                                        <div class="row">
                                            <div class="col-sm-4">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="pricing-list text-left">
                                                    <div class="pricing-header bg-green-700">
                                                        <div class="pricing-title">Payment for return of investment <!--Standard--> </div>
                                                        <div class="pricing-price" style="padding: 0px 30px;">
                                                            <span class="pricing-currency" id="paypalCurrency"></span>
                                                            <span class="pricing-amount" id="paypalAmount"></span>
                                                            <span class="pricing-period"></span>
                                                        </div>
                                                        <!--<p class="padding-horizontal-30 padding-bottom-25">Vestibulum lacinia arcu eget nulla. Class aptent taciti</p> -->
                                                    </div>
                                                    <div class="pricing-footer text-center  bg-blue-grey-100">


                                                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                            <input type="hidden" name="cmd" value="_xclick">
                                                            <input id="changeAmount" type="hidden" name="amount" value="">
                                                            <input id="changeNotify" type='hidden' name='notify_url' value="" >
                                                            <input type="hidden" name="return" id="changeReturn" value="<?php echo base_url('paypal/success') ?>">
                                                            <input type="hidden" name="cancel_return" id="changeCancelReturn" value="<?php echo base_url('paypal/cancel') ?>">
                                                            <input type="hidden" name="business" value="" id="changeBusiness">
                                                            <input type="hidden" name="lc" value="US">
                                                            <input type="hidden" name="item_name1" value="Return of Investment Payment">
                                                            <input type="hidden" name="currency_code" id="paypalCurrencyCode" value="">
                                                            <input type="hidden" name="button_subtype" value="services">
                                                            <input type="hidden" name="tax_rate" value="0.000">
                                                            <input type="hidden" name="shipping" value="0.00">
                                                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                                                            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                        </form>



                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">

                                            </div>



                                        </div>
                                    </div>
                                </div>




                            </div>                   

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Panel -->
    </div>
</div> 

<script type="text/javascript">
    window.onload = function () {

        var status = "<?php echo $status ?>";
        var msg = "<?php echo $msg ?>";
        console.log(status);
        if (status === "error") {
            showError(msg);
        } else if (status === "success") {
            $('#dlgInvestorId').val("<?php echo $dlgInvestorId ?>");
            $('#dlgName').text("<?php echo $dlgName ?>");
            $('#dlgPaymentMethod').text("<?php echo $dlgPaymentMethod ?>");
            $('#dlgAddress').text("<?php echo $dlgAddress ?>");

            $('#dlgPayoutItems').empty();
            $('#dlgPayoutItems').append('<?php echo $dlgPayoutItems ?>');
            
        }
        showDiv('1');

        $("#paymentInformation-form").submit(function (event) {
            event.preventDefault();
            $('#paypalCurrency').text("<?php echo $dlgCurrencySymbol ?>");
            $('#paypalAmount').text("<?php echo $dlgPayinAmount ?>");

            $('#changeAmount').val("<?php echo $dlgPayinAmount ?>");
            $('#changeNotify').val("<?php echo base_url('paypal/ipn_investor_depositpaymenthistory/') ?>" + "<?php echo $dlgInvestorId ?>" + "/" + "<?php echo $dlgPayinAmount ?>");
            $('#changeReturn').val("<?php echo base_url('paypal/ipn_investor_depositpaymenthistory_success/') ?>" + "<?php echo $dlgInvestorId ?>" + "/" + "<?php echo $dlgPayinAmount ?>");
            $('#changeCancelReturn').val("<?php echo base_url('paypal/ipn_investor_depositpaymenthistory_cancel/') ?>" + "<?php echo $dlgInvestorId ?>" + "/" + "<?php echo $dlgPayinAmount ?>");

            $('#changeBusiness').val("<?php echo $dlgAdminPaypalUsername ?>");
            $('#paypalCurrencyCode').val("<?php echo $dlgCurrencyCode ?>");
            showDiv('2');
        });

    };

    function showDiv(type) {
        if (type == '1')
        {
            var pnl = document.getElementById('paymentInfoData');
            pnl.style.visibility = "visible";
            pnl.style.display = "block";


            var pnl = document.getElementById('optionPaypal');
            pnl.style.visibility = "hidden";
            pnl.style.display = "none";


            document.getElementById('step2').className = 'pearl col-xs-6';
            document.getElementById('step1').className = 'pearl current col-xs-6';

        }
        if (type == '2')
        {
            var pnl = document.getElementById('paymentInfoData');
            pnl.style.visibility = "hidden";
            pnl.style.display = "none";



            var pnl = document.getElementById('optionPaypal');
            pnl.style.visibility = "visible";
            pnl.style.display = "block";


            document.getElementById('step1').className = 'pearl col-xs-6';
            document.getElementById('step2').className = 'pearl current col-xs-6';

        }

    }

</script>