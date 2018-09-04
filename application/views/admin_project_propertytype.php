<!-- Panel Custom filter UI -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Property Type</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon wb-folder" href="#">Projects</a></li>
                <li class="breadcrumb-item">Project Property Type</li>
            </ol> 
        </div> 
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-15">
                            <button id="addToTable" data-target="#examplePositionCenter" class="btn btn-outline btn-primary" data-toggle="modal" type="button">
                                <i class="icon wb-plus" aria-hidden="true"></i> Add Type
                            </button>
                        </div>
                    </div>
                </div>

                <table id="tablePropertyType" class="table table-hover" data-paging="true" data-sorting="true"
                       data-filtering="true" style="width:100%">
                    <thead>
                        <tr>
                            <th data-name="id" data-type="number" data-breakpoints="xs">Property Name</th>
                            <th data-name="firstName">Property Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
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
            <form id="add_propertytype_form" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Property</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <input id="dlgId" type="hidden" name="objid">
                        <div class="col-xl-8 form-group">
                            <input id="dlgName" required type="text" class="form-control" name="name" placeholder="Property Name">
                        </div>
                        <div class="col-xl-12 form-group">
                            <textarea id="dlgDescription" class="form-control" rows="5" name="description" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">    Save changes</button>
                </div>  
            </form>
        </div>

    </div>
</div>
<!-- End Modal -->
<!-- END DIALOG-->


<script type="text/javascript">
    var table;
    window.onload = function () {
        $('#tablePropertyType').addClass('active');
        table = $('#tablePropertyType').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            "columnDefs": [{
                    "targets": [2],
                    "orderable": false
                }],
            "processing": true, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_Project_Property_Controller/get_items') ?>",
                type: 'GET'
            },
        });
    
        $("#addToTable").click(function () {
            $("#add_propertytype_form")[0].reset();
            $('#dlgId').val('');
        });
        
        $("#add_propertytype_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Admin_Project_Property_Controller/add_propertytype') ?>",
                type: "POST",
                data: $('#add_propertytype_form').serialize(),
                async: true,
                success: function (data) {
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

    function delete_property(id) {
        // delete action
        bootbox.confirm({
            title: "Confirm Delete", message: "Are you sure you want to delete this property type?",
            buttons: {
                cancel: {label: '<i class="fa fa-times"></i> Cancel', className: 'btn-danger'},
                confirm: {label: '<i class="fa fa-check"></i> Confirm', className: 'btn-primary'}
            },
            callback: function (result) {
                if (result) { // confirm
                    $.ajax({
                        url: "<?php echo base_url('Admin_Project_Property_Controller/delete_propertytype') ?>",
                        type: "POST",
                        data: {'id': id},
                        success: function (data) {
                            var resp = $.parseJSON(data);//convertir data de json
                            if (resp.status === "error") {
                                showError(resp.msg);
                                
                            } else if (resp.status === "success") {
                                table.ajax.reload();
                                $('#examplePositionCenter').modal('hide');
                            }
                        }
                    });
                }
            }
        });
    }

    function edit_property(id) {
        // edit action
        $.ajax({
            url: "<?php echo base_url('Admin_Project_Property_Controller/load_item') ?>",
            type: "POST",
            data: {'id': id},
            success: function (data) {
                var resp = $.parseJSON(data); //convertir data de json
                if (resp.status === "error") {
                    showError(resp.msg);
                    
                } else if (resp.status === "success") {
                    $('#dlgName').val(resp.data[0]['name']);
                    $('#dlgDescription').val(resp.data[0]['description']);
                    $('#dlgId').val(resp.data[0]['cpropertytypeid']);

                    $('#examplePositionCenter').modal('show');
                }
            }
        });        
    }
</script>
