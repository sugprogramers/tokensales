    
     <!-- Panel Table Add Row -->
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
          <table class="table table-bordered table-hover table-striped" cellspacing="0" id="item-list">
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
      <!-- End Panel Table Add Row -->
      


<script type="text/javascript">
    
window.onload = function () {
    $('#item-list').DataTable({
            "processing": true,  //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url : "<?php echo base_url('AdminProjectDocumentTypeController/get_items')?>",
                type : 'GET'
            },
     });
};
</script>
