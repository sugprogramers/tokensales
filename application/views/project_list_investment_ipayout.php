<div class="page">
    <div class="page-header">
        <h1 class="page-title">Pending Return of Investment Payouts</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-bank" href="#">Payment Info</a></li>
                <li class="breadcrumb-item">Pending Payouts</li>
            </ol> 
        </div>   
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
            <form id="processProjectInvestmentPayout-form">
                <div class="row">
                  <div class="col-md-12">
                    <p>These are pending return of investment orders. Please select pending order and click on the "Process Payment" button to begin the return of investment payout process.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-15">
                        <button type="submit"  class="btn btn-primary">Process Payment</button>
                    </div>
                  </div>
                </div>
                <table id="idTableListProjectInvestmentIPayout" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th></th>
                            <th>Project Name</th>
                            <th>Company</th>
                            <th>Investor ID</th>
                            <!--<th>Investor Name</th>-->
                            <!--<th>Investor Email</th>-->
                            <th>Payment Amount</th>
                            <th>Currency</th>
                            <th>Scheduled Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
            </div> 
        </div> 
    </div> 
</div>

<script type="text/javascript">
    window.onload = function () {
        var table = $('#idTableListProjectInvestmentIPayout').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Project_List_Investment_IPayout_Controller/get_items') ?>",
                type: 'POST'
            },
        });
        new $.fn.dataTable.FixedHeader(table);
        
        $("#processProjectInvestmentPayout-form").submit(function (event) {
            event.preventDefault();
            var selectedPaymentOrderId = "";
            $(' table#idTableListProjectInvestmentIPayout tbody tr td input[type="checkbox"]:checked').each(function(){
                selectedPaymentOrderId = $(this).prop('value');
            });
            
            if(selectedPaymentOrderId === ""){
                showError("Please select a pending order to begin the payment process.");
            }
            else{
                window.location.href = "<?php echo base_url('project_investment_ipayout/') ?>" + selectedPaymentOrderId;
            }
        });
        
    };
    
    
    
    function toggle_payment_order_checkbox(element){
      $(' table#idTableListProjectInvestmentIPayout tbody tr td input[type="checkbox"]').each(function(){
          if(element.name !=  $(this).prop('name'))
              $(this).prop('checked', false);
      });
    }

</script>