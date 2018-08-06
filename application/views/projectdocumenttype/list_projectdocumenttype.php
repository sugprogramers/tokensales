    
          <!-- Panel Custom filter UI -->
   <div class="panel">
        <header class="panel-heading">
           <h3 class="panel-title">Project Documents</h3>
            <div class="pl-30">
                <form class="form-inline">
                </form>
              </div>
         </header>
      
         <div class="panel-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-15">
                  <button id="addToTable" data-target="#examplePositionCenter" class="btn btn-outline btn-primary" data-toggle="modal" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add Document
                  </button>
                </div>
              </div>
            </div>

              <div class="panel-body">
                <table id="exampleAddRow" class="table table-hover" data-paging="true" data-sorting="true"
                  data-filtering="true">
                  <thead>
                    <tr>
                      <th data-name="id" data-type="number" data-breakpoints="xs">Document Name</th>
                      <th data-name="firstName">Document Description</th>
                      <th data-name="status">Mandatory</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
         </div>
            <!-- End Custom filter UI -->
    </div>


      
          <!-- START DIALOG -->
               <!-- Modal -->
                   <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
                        role="dialog" tabindex="-1">
                     <div class="modal-dialog modal-simple modal-center">
                       <div class="modal-content">
                             <form id="register_form" class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title">Document</h4>
                               </div>
                               <div class="modal-body">
                                 <div class="row">
                                    
                                    <input id="dlgId" type="hidden" name="objid">
                                    <div class="col-xl-8 form-group">
                                       <input id="dlgName" type="text" class="form-control" name="name" placeholder="Document Name">
                                    </div>
                                    <div id="dlgIsMandatory" class="checkbox-custom checkbox-default">
                                      <input type="checkbox" id="inputBasicRemember" name="isMandatory" checked autocomplete="on"/>
                                      <label for="inputBasicRemember">Mandatory</label>
                                    </div>
                                    <div class="col-xl-12 form-group">
                                      <textarea id="dlgDescription" class="form-control" rows="5" name="description" placeholder="Description"></textarea>
                                    </div>
                                 </div>
                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <button type="submit"  class="btn btn-primary">Save changes</button>
                               </div>  
                           </form>
                      </div>
                 
                    </div>
                   </div>
                   <!-- End Modal -->
          <!-- END DIALOG-->
          
          
      


        

<script type="text/javascript">
var table;
var frm;
window.onload = function () {
    
    frm = $("#register_form");
    
    $( "#addToTable").click(function() {
         $("#register_form")[0].reset();
    });
    
    table = $('#exampleAddRow').DataTable({
            "processing": true,  //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url : "<?php echo base_url('Admin_List_DocumentType_Controller/get_items')?>",
                type : 'GET'
            },
     });
 
  
       $("editdoc").on("click", function(){
                var id = $(this).attr('title');
                 alert( "EDIT Handler for .click() called." + id );
        });
 
 
     $("#register_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Admin_List_DocumentType_Controller/register_document')?>",
                type: "POST",
                data: $('#register_form').serialize(),
                success: function (data) {
                    console.log(data);
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {                       
                         showError('Error Insert Data - Please Try Again');
                    } 
                    if (resp.status === "success") {  
                        table.ajax.reload();
                        $('#examplePositionCenter').modal('hide')
                    }                     
                }
            });
        });

   

};


   
    function delete_document(id){
       $.ajax({
                url: "<?php echo base_url('Admin_List_DocumentType_Controller/delete_document')?>",
                type: "POST",
                data: {'id': id},
                success: function (data) {
                    
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {                       
                         showError('Error Get Data - Please Try Again');
                    } 
                    if (resp.status === "success") {  
                         table.ajax.reload();
                        $('#examplePositionCenter').modal('hide');
                    }                     
              }
       });
    }
    
    
    function edit_document(id){
    
      
       $.ajax({
                url: "<?php echo base_url('Admin_List_DocumentType_Controller/get_itemById')?>",
                type: "POST",
                data: {'id': id},
                                    
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {                       
                         showError('Error Insert Data - Please Try Again');
                    } 
                    if (resp.status === "success") { 
                       $('#dlgName').val(resp.data[0]['name']);
                       $('#dlgDescription').val(resp.data[0]['description']);
                       $('#dlgId').val(resp.data[0]['cprojectdocumenttypeid']);
                       $('#examplePositionCenter').modal('show');
                    }                     
              }
       }); 
    }
  
  
             
</script>


