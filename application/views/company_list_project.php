<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/examples/css/apps/media.min599c.css?v4.0.2">
<style> 
    .site-navbar-small .slidePanel-left, .site-navbar-small .slidePanel-right {
        top: 0;
        z-index:2000;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">My Projects</h1>
        <div class="page-header-actions">
            <!-- <ol class="breadcrumb breadcrumb-arrow">
                 <li class="breadcrumb-item"><a class="icon fa-cubes" href="#">Projects</a></li>
                 <li class="breadcrumb-item">My Projects</li>
             </ol>  -->
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">




                <div class="app-media" > 

                    <div class="page-main">
                        <div  class="page-content page-content-table" >

                            <!-- Actions -->
                            <div class="page-content-actions" style="border-bottom: 1px solid #e4eaec;padding: 0 0 5px;">
                                <div class="float-right">
                                    <div class="btn-group media-arrangement" role="group">
                                        <button class="btn btn-outline btn-default active" id="arrangement-grid" type="button"><i class="icon wb-grid-4" aria-hidden="true"></i></button>
                                        <button class="btn btn-outline btn-default" id="arrangement-list" type="button"><i class="icon wb-list" aria-hidden="true"></i></button>
                                    </div>
                                </div>

                                <div class="float-left">
                                    <div class="form-group ">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="" placeholder="Search...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="icon wb-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="media-list is-grid pb-50" data-plugin="animateList" data-animate="fade"
                                 data-child="li">
                                <ul class="blocks blocks-100 blocks-xxl-4 blocks-xl-3 blocks-lg-3 blocks-md-2 blocks-sm-2"
                                    data-plugin="animateList" data-child=">li" id="project_list">
                                    <!--  <li>
                                          <div class="media-item" >
  
                                              <div class="image-wrap"  data-toggle="slidePanel" data-url="<?php echo base_url() . "themes/default/tpl"; ?>/panel.tpl"  onclick="nuevo('id1');">
                                                  <figure class="overlay overlay-hover">
                                                      <img class="overlay-figure" src="<?php echo base_url() . "themes/default/remark"; ?>/global/photos/focus-5-960x640.jpg" alt="...">
                                                      <figcaption class="overlay-panel overlay-background overlay-slide-left ">
  
                                                          <div class="img-text-hover">
                                                              <h3>Title</h3>
                                                              <p>Lorem <a href="javascript:void(0)">ipsum dolor</a> sit amet,consetetur sadipscing elitr.</p>
  
                                                          </div>
  
                                                      </figcaption>
                                                  </figure>
                                              </div>
                                              <div class="info-wrap">
                                                  <div class="dropdown">
                                                      <span class="icon wb-settings" data-toggle="dropdown" aria-expanded="false" role="button"
                                                            data-animations="fadeInDown fadeInLeft fadeInUp fadeInRight"  ></span>
                                                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                          <a class="dropdown-item" href="javascript:void(0)"><i class="icon wb-pencil" aria-hidden="true"></i>Edit</a>
                                                          <a class="dropdown-item" href="javascript:void(0)" ><i class="icon wb-trash" aria-hidden="true" ></i>Delete</a>
                                                      </div>
                                                  </div> 
                                                  <div class="title">Lorem ipsum</div>
                                                  <div class="time">1 minutes ago</div>
                                                  <div class="media-item-actions btn-group" >
                                                      <button class="btn btn-icon btn-pure btn-default" data-original-title="Edit" data-toggle="tooltip"
                                                              data-container="body" data-placement="top" data-trigger="hover"
                                                              type="button">
                                                          <i class="icon wb-pencil" aria-hidden="true"></i>
                                                      </button>
                                                      <button class="btn btn-icon btn-pure btn-default" data-original-title="Delete"
                                                              data-toggle="tooltip" data-container="body" data-placement="top"
                                                              data-trigger="hover" type="button">
                                                          <i class="icon wb-trash" aria-hidden="true"></i>
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
  
                                      <li onclick="window.location.href = '<?php echo base_url('company_edit_project') ?>';">
                                          <div class="media-item" >
                                              <div class="image-wrap" style="background: #e4eaec;" >
                                                  <img class="overlay-figure" src="<?php echo base_url() . "themes/default/remark/topbar/assets/images"; ?>/new-project.png" alt="...">
                                              </div>
                                              <div class="info-wrap">
                                                  <div class="title">Add New Project</div>
                                                  <div class="time">You must create a new project , click here</div>
                                              </div>
                                          </div>
                                      </li>    -->

                                </ul>
                            </div>
                        </div>



                    </div>                 

                </div>
            </div> 
        </div> 
    </div> 
</div> 

<script type="text/javascript">

    var general = '0';
    
    window.onload = function () {
        Listar(); 
       

        $(document).on('slidePanel::afterLoad', function (e) {
            document.getElementById("tituloNew").innerHTML = "nuevooo" + general;
            // alert(general);
        });

        $('#idCompanyProjects').addClass('active');
        $('#idCompanyListProject').addClass('active');

    };

    function Listar() {
        $.ajax({
            url: "<?php echo base_url('Company_List_Project_Controller/get_project_list'); ?>",
            type: "POST",
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#project_list").empty();
                $("#project_list").append(resp.html);
            }
        });

    }

    function Mostrar(id) {
        general = id;
    }
    function Eliminar(id) {
        bootbox.confirm({
            title: "Confirm Delete", message: "Are you sure you want to delete this item?",
            buttons: {
                cancel: {label: '<i class="fa fa-times"></i> Cancel', className: 'btn-danger'},
                confirm: {label: '<i class="fa fa-check"></i> Confirm', className: 'btn-primary'}
            },
            callback: function (result) {
                if (result) {

                    $.ajax({
                        url: "<?php echo base_url('Company_List_Project_Controller/delete_project'); ?>/" + id,
                        type: "POST",
                        success: function (data) {
                            var resp = $.parseJSON(data);//convertir data de json
                            if (resp.status === "error") {
                                showError('Error Delete Item');
                            }
                            if (resp.status === "success") {
                                Listar();
                                showSuccess('Success');
                            }
                        }
                    });

                }
            }
        });
    }
    function Editar(id) {
        window.location.href = "<?php echo base_url(); ?>company_edit_project/" + id;
    }

</script>