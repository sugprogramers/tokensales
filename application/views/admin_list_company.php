<div class="page">
    <div class="page-header">
        <h1 class="page-title">Company</h1>
        <div class="page-header-actions">
            <!--<ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-clipboard" href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                <li class="breadcrumb-item active">Headers</li>
            </ol> -->
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <table id="idTableListInvestor" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Log-In</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Company</th>
                            
                            <th>More Info</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>


            </div> 
        </div> 
    </div> 
</div>    
<input type="submit" value="" />



<!-- Modal -->
<div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
        role="dialog" tabindex="-1">
     <div class="modal-dialog modal-simple modal-center">
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            <h4 class="modal-title">
                 Aditional Info:  <label id="lblCompanyName" class="control-label" ></label>
            </h4>
       </div>
       <div class="modal-body">
         <div class="tab-content">
             
            <div class="row">
                <div class="col-sm-3">
                   <p><b>Country</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblCompanyCountry" class="control-label" ></label>
                </div>
                
                
                <div class="col-sm-3">
                   <p><b>Region</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblCompanyRegion" class="control-label" ></label>
                </div>
                
                
            </div>
             
             <div class="row">
                 
                <div class="col-sm-3">
                   <p><b>Phone</b></p>
                </div>
                <div class="col-sm-8">
                    <label id="lblCompanyPhone" class="control-label" ></label>
                </div>
                 
                 
                 
                <div class="col-sm-3">
                   <p><b>Postal Code</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblCompanyPostalCode" class="control-label" ></label>
                </div>
            </div>
             
             <div class="row">
                 <div class="col-sm-3">
                   <p><b>Address</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblCompanyAddress" class="control-label" ></label>
                </div>
            </div>
             
             <div class="row">
                <div class="col-sm-3">
                   <p><b>Paypal</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblCompanyPaypal" class="control-label" ></label>
                </div>
            </div>
             
             
          </div>
        </div> 
       </div>   
           
      </div>
    </div>

<!-- End Modal -->  













<script type="text/javascript">
    window.onload = function () {
        $('#idListCompanyAdmin').addClass('active');
        
        var table = $('#idTableListInvestor').DataTable({
            responsive: true,
            fixedHeader:{header:!0},
            "order": [[ 1, "desc" ]],
            "columnDefs": [{
                    "targets": [0,4],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_List_Company_Controller/get_items') ?>",
                type: 'GET'
            },
        });
      new $.fn.dataTable.FixedHeader( table );

    };
    
    
    function loginCompany(userId) {
         $.ajax({
            url: "<?php echo base_url('Login_Controller/login_user_from_admin') ?>",
            type: "POST",
            data: {'userId': userId},
            success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {                       
                         showError('Error user or password invalid');
                    } 
                    if (resp.status === "success") {                       
                        window.location.href = resp.redirect;
                    }                     
                    
                }
        });
    }    
    
    
    function view_document(userId){
  
    
    $('#examplePositionCenter').modal('show');
     //$('#theprogressbar').asPieProgress('reset');
      $.ajax({
                url: "<?php echo base_url('Admin_List_Company_Controller/get_company_detail')?>",
                type: "POST",
                data: {'id': userId},
                async: false,
                                    
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    console.log(resp);
                    if (resp.status === "error") {                       
                         showError('Error Get Data - Please Try Again');
                    } 
                    if (resp.status === "success") {
                        
                        
                        $('#lblCompanyCountry').text(resp.data[0]['cmpcountry']);
                        $('#lblCompanyRegion').text(resp.data[0]['cmpregion']);
                        $('#lblCompanyAddress').text(resp.data[0]['cmpaddress']);
                        $('#lblCompanyPostalCode').text(resp.data[0]['cmppostalcode']);
                        $('#lblCompanyPhone').text(resp.data[0]['cmpphone']);
                        $('#lblCompanyName').text(resp.data[0]['cmpname']);
                        $('#lblCompanyPaypal').text(resp.data[0]['cmppaypal']);
                        
                        

                    }                     
              }
          }); 
  
}
    
    
    
    
</script>
