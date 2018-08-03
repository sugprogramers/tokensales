    
     <!-- Panel Table Add Row -->
     <!-- 
     <div class="panel">
        <header class="panel-heading">
          <h3 class="panel-title">Document List</h3>
        </header>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-15">
                <button id="addToTable" class="btn btn-outline btn-primary" type="button">
                  <i class="icon wb-plus" aria-hidden="true"></i> Add Document
                </button>
              </div>
            </div>
          </div>
          <table class="table table-bordered table-hover table-striped" cellspacing="0" id="exampleAddRow">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Mandatory</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
     -->
      <!-- End Panel Table Add Row -->
      
     
          <!-- Panel Custom filter UI -->
          <div class="panel">
            <header class="panel-heading">
              <h3 class="panel-title">Project Documents</h3>
              <div class="pl-30">
                <form class="form-inline">
                  
                    <!--
                  <div class="radio-custom radio-primary mr-15">
                    <input type="radio" name="status" id="status_none" class="filter-ui-status" value="none"
                      checked>
                    <label for="status_none">
                      None
                    </label>
                  </div>
                    -->
                    
                </form>
              </div>
            </header>
              
              <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-15">
                <button id="addToTable" class="btn btn-outline btn-primary" type="button">
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
            <!-- Example Center -->
          <div class="example-wrap">
              <div class="example">
                      

                  <button class="btn btn-primary" data-target="#examplePositionCenter" data-toggle="modal"
                   type="button">Generate</button>

                  <!-- Modal -->
                   <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
                        role="dialog" tabindex="-1">
                      <div class="modal-dialog modal-simple modal-center">
                        <div class="modal-content">
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                             </button>
                                <h4 class="modal-title">Modal Title</h4>
                              </div>
                              <div class="modal-body">
                                <p>One fine body…</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->
                      </div>
                    </div>
                    <!-- End Example Center -->
          <!-- END DIALOG-->
          
          
      


      

<script type="text/javascript">
window.onload = function () {
    $('#exampleAddRow').DataTable({
            "processing": true,  //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url : "<?php echo base_url('AdminProjectDocumentTypeController/get_items')?>",
                type : 'GET'
            },
     });


};
</script>


