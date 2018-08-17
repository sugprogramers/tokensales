<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/examples/css/apps/media.min599c.css?v4.0.2">
<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/asrange/asRange.min599c.css?v4.0.2">
<style> 
    .site-navbar-small .slidePanel-left, .site-navbar-small .slidePanel-right {
        top: 0;
        /*z-index:2000;*/
            z-index: 1699;
    }
    
    
    
    .h-minificha__data__row {
    margin: 0;
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    position: relative;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.h-minificha__data__values__separator--line {
    display: inline-block;
    width: 1px;
    height: 35px;
    background-color: #ccc;
}
.h-minificha__data__value {
    font-weight: 400;
    font-size: 10px;
    text-align: center;
    margin: 14px 0;
}
.h-minificha__data__value--description {
    font-size: 1.2em;
}
.h-minificha--color-secondary {
    color: #666;
}
.h-minificha__data__value--number {
    font-size: 2em;
}

.h-minificha--color-primary {
    color: #333;
}
.col-xs-6 {
    width: 49%;
}
.col-xs-12 {
    width: 100%;
}
.h-minificha__tir__value {
    font-size: 1em;
    font-weight: 600;
}
.h-minificha__tir {
    padding: 15px 0;
}
.flip-container__wrapper {
    border: 1px solid #b8b8b8;
}
.number-wrapper {
    color: #463d3e;
    font-size: 1.5em;
}
.ahorro-box-text {
    font-weight: 400;
    font-size: 12px;
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





<div class="modal fade modal-rotate-from-left" id="exampleNifty3dRotateInLeft"
     aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog"
     tabindex="-1">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Select Location</h4>
            </div>
            <div class="modal-body">

                <style>

                    #map {
                        min-height: 400px;
                        height: 400px;
                        width: 100%;
                    }
                </style>
                <div id="map"></div>

                <script>
                    var marker;
                    var map;
                    function initMap() {
                        var myLatLng = {lat: 25.769054, lng: -80.216266};
                        map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 10,
                            center: myLatLng
                        });
                        //new google.maps.LatLng(35.137879, -82.836914),
                        marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: 'Location of my project',
                            draggable: false,
                            animation: google.maps.Animation.DROP
                        });

                       
                    }
                </script>

                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI49kT8nqt6CKwnstK2S2kJuabIPcbvOE&callback=initMap">
                </script>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>







<script type="text/javascript">

    var c_project_id = '0';
    var g_latitude = '0';
    var g_longitude = '0';

    window.onload = function () {
        Listar();

        $(document).on('slidePanel::afterLoad', function (e) {

            $.ajax({
                url: "<?php echo base_url('Investor_List_Project_Controller/get_project/'); ?>" + c_project_id,
                type: "POST",
                async: false,
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {
                        showError('Error no show item');
                    }
                    if (resp.status === "success") {
                        $("#panelgeneral").resize();$("#panelgeneral").resize();
                        
                        //general
                        g_latitude = resp.latitude;
                        g_longitude = resp.longitude;
                        
                        $('#tituloNew').html(resp.name);
                        $('#imageNew').css('background-image', 'url(' + '<?php echo base_url() . "upload/imgs/"; ?>' + resp.namefile + ')');
                        $('#descriptionNew').html(resp.description);
                        $('#docsNew').html(resp.docs);
                        $('#addressNow').html(resp.address1);
                        $('#totalreturnNow').html(resp.totalyieldperc);
                        $('#monthsNow').html(resp.loanterm);
                        $('#daysNow').html(resp.daysremaining);
                        $('#targetamtNow').html(resp.cursymbol + resp.targetamt);
                        $('#sumamountNow').html(resp.cursymbol + resp.sumamount);
                        $('#percentNow').html(resp.percent);
                        $('#investorsNow').html(resp.countinvesment);
                          
                         
                         $('#rangeNew').asRange({scale: false,namespace: 'asRange',tip: false,value: resp.percent,}); 
                         $('#rangeNew').asRange('disable');
                         

                    }
                }
            });


        });





        $('#idCompanyProjects').addClass('active');
        $('#idCompanyListProject').addClass('active');

    };

    function Listar() {
        $.ajax({
            url: "<?php echo base_url('Investor_List_Project_Controller/get_project_list'); ?>",
            type: "POST",
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#project_list").empty();
                $("#project_list").append(resp.html);
                
                 $('.asRange').asRange({scale: false,namespace: 'asRange',tip: false,}); 
                 $('.asRange').asRange('disable');

            }
        });

    }

    function Ubicacion(latitude, longitude) {        
        $("#exampleNifty3dRotateInLeft").modal('show');
        map.setZoom(14);
        map.setCenter(new google.maps.LatLng(latitude,longitude));
        marker.setPosition(new google.maps.LatLng(latitude,longitude));   
             
    }
    
    function UbicacionGeneral() {        
        $("#exampleNifty3dRotateInLeft").modal('show');
        map.setZoom(14);
        map.setCenter(new google.maps.LatLng(g_latitude,g_longitude));
        marker.setPosition(new google.maps.LatLng(g_latitude,g_longitude));   
             
    }
    
    function Mostrar(id) {
        c_project_id = id;
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
                        url: "<?php echo base_url('Investor_List_Project_Controller/delete_project'); ?>/" + id,
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