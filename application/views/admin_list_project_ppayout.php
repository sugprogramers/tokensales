<div class="page">
    <div class="page-header">
        <h1 class="page-title">Projects Pending for Loan Payout</h1>
        <div class="page-header-actions">
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
            <form id="processProjectPayout-form">
                <div class="row">
                  <div class="col-md-12">
                    <p>These are the projects that are ready to start the loan. Please select a project and click on the "Process Payment" button to begin the loan payout process.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-15">
                        <button type="submit"  class="btn btn-primary">Process Payment</button>
                    </div>
                  </div>
                </div>
                <table id="idTableListProjectsPPayout" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th></th>
                            <th>Project</th>
                            <th>Company Name</th>
                            <th>Target Amount</th>
                            <th>Currency</th>
                            <th>Date Limit</th>
                            <th>Payment Amount</th>
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
        var table = $('#idTableListProjectsPPayout').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_List_Project_PPayout_Controller/get_items') ?>",
                type: 'POST'
            },
        });
        new $.fn.dataTable.FixedHeader(table);
        
        $("#processProjectPayout-form").submit(function (event) {
            event.preventDefault();
            var selectedPaymentOrderId = "";
            $(' table#idTableListProjectsPPayout tbody tr td input[type="checkbox"]:checked').each(function(){
                selectedPaymentOrderId = $(this).prop('value');
            });
            
            if(selectedPaymentOrderId === ""){
                showError("Please select a project to begin the payment process.");
            }
            else{
                window.location.href = "<?php echo base_url('admin_project_ppayout/') ?>" + selectedPaymentOrderId;
            }
        });
        
    };
    
    
    
    function toggle_payment_order_checkbox(element){
      $(' table#idTableListProjectsPPayout tbody tr td input[type="checkbox"]').each(function(){
          if(element.name !=  $(this).prop('name'))
              $(this).prop('checked', false);
      });
    }

</script>