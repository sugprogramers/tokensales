<div class="page">
    <div class="page-header">
        <h1 class="page-title">Pending Investor Withdrawals</h1>
        <div class="page-header-actions">
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
            <form id="processInvestorPayout-form">
                <div class="row">
                  <div class="col-md-12">
                    <p>These are pending withdrawal orders from investors. Please select pending order and click on the "Process Payment" button to begin the withdrawal process.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-15">
                        <button type="submit"  class="btn btn-primary">Process Payment</button>
                    </div>
                  </div>
                </div>
                <table id="idTableListInvestorsPPayout" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th></th>
                            <th>Investor</th>
                            <th>Email</th>
                            <th>Payment Method</th>
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
        var table = $('#idTableListInvestorsPPayout').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_List_Investor_IPayout_Controller/get_items') ?>",
                type: 'POST'
            },
        });
        new $.fn.dataTable.FixedHeader(table);
        
        $("#processInvestorPayout-form").submit(function (event) {
            event.preventDefault();
            var selectedPaymentOrderId = "";
            $(' table#idTableListInvestorsPPayout tbody tr td input[type="checkbox"]:checked').each(function(){
                selectedPaymentOrderId = $(this).prop('value');
            });
            
            if(selectedPaymentOrderId === ""){
                showError("Please select a pending order to begin the payment process.");
            }
            else{
                window.location.href = "<?php echo base_url('admin_investor_ipayout/') ?>" + selectedPaymentOrderId;
            }
        });
        
    };
    
    
    
    function toggle_payment_order_checkbox(element){
      $(' table#idTableListInvestorsPPayout tbody tr td input[type="checkbox"]').each(function(){
          if(element.name !=  $(this).prop('name'))
              $(this).prop('checked', false);
      });
    }

</script>