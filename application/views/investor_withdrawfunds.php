<div class="page">
    <div class="page-header">
        <h1 class="page-title">Withdraw Funds</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="#">Bank Data</a></li>
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
                                            <form id="withdrawFunds-form" style="padding-left: 10px;">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Your current withdrawal balance: <span style="color: #17b3a3" id="idCurrentWithdrawBalance"></span></p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <p><span style="color: #17b3a3" id="idWithdrawStatus"></span></p> 
                                                    </div>  
                                                </div>
                                                
                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="amount">Enter withdrawal amount*</label>
                                                        <input type="number" required class="form-control" id="inputAmount" name="amount" placeholder="Enter Withdraw Amount" step=".01" style="font-size: 14px; border-radius:0;">
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>     

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-3">   
                                                        Withdraw To:                                                                                                    
                                                    </div>
                                                    <div class="col-sm-3 text-right"> 
                                                        <span class="font-size-15" id="idWithdrawEmail"></span>  
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>
                                                
                                                <br>
                                                
                                                <div class="row">
                                                    <div class="col-sm-3">   
                                                        Payment Order ID:                                                                                                  
                                                    </div>
                                                    <div class="col-sm-3 text-right"> 
                                                        <span class="font-size-15" id="idWithdrawPaymentOrderId"></span>
                                                    </div>                                                    
                                                    <div class="col-sm-6"></div>  
                                                </div>

                                                <br>
                                                
                                                <div class="row">
                                                    <div class="col-sm-3">   
                                                        Create Time:                                                                                                   
                                                    </div>
                                                    <div class="col-sm-3 text-right"> 
                                                        <span class="font-size-15" id="idWithdrawCreationTime"></span>
                                                    </div>
                                                    <div class="col-sm-6"></div>  
                                                </div>                    

                                                <br>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary" id="idBtnWithdraw">Withdraw</button>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-6"></div>  
                                                </div>  

                                            </form>
                                        </div></div>
                                </div>
                                <div class="tab-pane" id="exampleTabsLineTopTwo" role="tabpanel">
                                    <div class="row">

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
        $('#idInvestorWithdrawFunds').addClass('active');

        $("#idWithdrawStatus").text("<?php echo $status; ?>");
        $("#idCurrentWithdrawBalance").text("<?php echo $curr_symbol; ?>" + "<?php echo $payoutbalance; ?>");
        $("#idWithdrawEmail").text("<?php echo $payin_paypalusername; ?>");
        $("#idWithdrawPaymentOrderId").text("<?php echo $finPaymentOrderId; ?>");        
        $("#idWithdrawCreationTime").text("<?php echo $creationtime; ?>");
        
        var isNewPaymentOrder = "<?php echo $newPaymentOrder;?>";
        console.log("isNewPaymentOrder:"+isNewPaymentOrder);
        if(isNewPaymentOrder === 'Y') {
            console.log("Y");
            $("#inputAmount").val('');
            $("#inputAmount").prop('readOnly', false);
            $("#inputAmount").prop('disabled', false);
            
            $("#idBtnWithdraw").prop('disabled', false);
            
        } else {
            console.log("N");
            $("#inputAmount").val("<?php echo $paymentOrderAmount; ?>");
            $("#inputAmount").prop('readOnly', true);
            $("#inputAmount").prop('disabled', true);
            
            $("#idBtnWithdraw").prop('disabled', true);
        }
        

    };
</script>