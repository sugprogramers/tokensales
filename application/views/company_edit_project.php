<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/blueimp-file-upload/jquery.fileupload.min599c.css?v4.0.2">
<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/dropify/dropify.min599c.css?v4.0.2">
<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min599c.css?v4.0.2">

<div class="page">
    <div class="page-header">
        <h1 class="page-title"><?php if ($action == 'edit') echo 'Edit';if ($action == 'new') echo 'New'; ?> Project </h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-cubes" href="<?php echo base_url(); ?>company_project">My Projects</a></li>
                <li class="breadcrumb-item"><?php if ($action == 'edit') echo 'Edit';if ($action == 'new') echo 'New'; ?> Project </li>

            </ol>
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
                <form id="project_form" >
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="col-sm-12">
                                <h4 class="example-title">Basic Information</h4>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="nameproject">Name Project *</label>
                                    <input type="text" required class="form-control" id="nameproject" name="nameproject" placeholder="Name Project" style="font-size: 14px; border-radius:0;">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="companyname">Company Name *</label>
                                    <input type="text" required class="form-control" id="companyname" name="companyname" placeholder="Company Name" style="font-size: 14px; border-radius:0;">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="propertytype">Property Type *</label>
                                    <select  required class="form-control"  id="propertytype" name="propertytype" style="font-size: 14px; border-radius:0;">
                                        <option value="AP" >Apartment</option>
                                        <option value="SUI" >Suite</option>
                                        <option value="BUI">Building</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                             <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="qtyproperty">Quantity property *</label>
                                    <input type="text" class="form-control" id="qtyproperty" name="qtyproperty" data-plugin="TouchSpin" value="1" required />
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <h4 class="example-title">Project location</h4>
                            </div>


                            <div class="col-sm-12"  >
                                <label class="control-label" for="latitude">Latitude / Longitude *</label>
                            </div>
                            <div class="row col-md-12" style="padding-right: 0;">
                                <div class="col-sm-5" style="padding-right: 0;">
                                    <div class="form-group ">

                                        <input type="text" required class="form-control" disabled id="latitude" name="latitude" placeholder="Latitude" style="font-size: 14px; border-radius:0;">

                                    </div>
                                </div>

                                <div class="col-sm-5" style="padding-right: 0;">
                                    <div class="form-group ">

                                        <input type="text" required class="form-control" disabled id="longitude" name="longitude" placeholder="Longitude" style="font-size: 14px; border-radius:0;">

                                    </div>
                                </div>

                                <div class="col-sm-2" style="padding-right: 0;">
                                    <div class="form-group "> 
                                        <button class="btn  btn-primary" data-target="#exampleNifty3dRotateInLeft" data-toggle="modal" type="button"><i class="icon wb-map" aria-hidden="true"></i></button>
                                    </div>
                                </div>


                            </div>

                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="address">Address *</label>
                                    <input type="text" required class="form-control" id="address" name="address" placeholder="Address" style="font-size: 14px; border-radius:0;">
                                </div>
                            </div>



                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="country">Country *</label>
                                    <select  required class="form-control" id="country"  name="country" required="" placeholder="Country" style="font-size: 14px; border-radius:0;"></select>

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="region">Region *</label>
                                    <select  required class="form-control" id="region" name="region" required="" placeholder="Region" style="font-size: 14px; border-radius:0;"></select>

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="country">City *</label>
                                    <input type="text" required class="form-control" id="city" name="city" placeholder="City" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>


                            <div class="col-sm-12">
                                <h4 class="example-title">additional project information</h4>
                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="cprojecttype">Project Type *</label>
                                    <select   required class="form-control" id="cprojecttype" name="cprojecttype" required="" placeholder="Project Type" style="font-size: 14px; border-radius:0;"></select>

                                </div>

                            </div>
                            
                             <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="cprojectmanager">Project Manager *</label>
                                    <select   required class="form-control" id="cprojectmanager" name="cprojectmanager" required="" placeholder="Project Manager" style="font-size: 14px; border-radius:0;"></select>

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="description">Description *</label>
                                    <textarea class="form-control" required  id="description" name="description" placeholder="Description" style="font-size: 14px; border-radius:0; height: 100px;"></textarea>


                                </div>

                            </div>


                        </div>

                        <div class="col-sm-6">

                            <div class="col-sm-12">
                                <h4 class="example-title">Project Image</h4>
                            </div>

                            <div class="col-sm-12">
                                <!--  data-default-file="../../global/photos/view-8-960x640.jpg" -->
                                <input class="dropify" type="file" id="input-file-now-custom-1" data-plugin="dropify" data-height="220" data-allowed-file-extensions="*"/>
                                <br>
                            </div>



                            <div class="col-sm-12">
                                <h4 class="example-title">loan information</h4>
                            </div>
                            
                            
                             <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="currency">Currency *</label>
                                    <select   required class="form-control" id="currency" name="currency" required="" placeholder="Currency" style="font-size: 14px; border-radius:0;"></select>

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="months">Term in months *</label>
                                    <input type="text" class="form-control" id="months" name="months" data-plugin="TouchSpin" value="0" required />
                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="yield">Total yield *</label>
                                    <input type="text" class="form-control" id="yield" name="yield" data-plugin="TouchSpin"
                                           data-min="0" data-max="100" data-step="0.1" data-decimals="1"
                                           data-boostat="5" data-maxboostedstep="10" data-postfix="%" value="50" required />

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="financial">Financial goal *</label>
                                    <input type="text" class="form-control" id="financial" name="financial" data-plugin="TouchSpin"
                                           data-min="0" data-max="1000000000" data-stepinterval="50"  
                                           data-maxboostedstep="10000000" data-prefix="$" value="0"  required />

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="limit">Date limit *</label>
                                    <div class="input-group">

                                        <input type="text" id="limit" name="limit" class="form-control" data-plugin="datepicker" required>
                                        <span class="input-group-addon">
                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group ">
                                    <label class="control-label" for="start">Start Date *</label>
                                    <div class="input-group">                                       
                                        <input type="text" id="start" name="start" class="form-control" data-plugin="datepicker" required>
                                        <span class="input-group-addon">
                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="col-sm-12">
                            <div class="col-sm-12">

                                <button  type="submit" class="btn btn-primary">Save Project </button>
                            </div>
                        </div>


                    </div>
                </form>

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
                    function initMap() {
                        var myLatLng = {lat: 34.0520467298, lng: -117.7413709};

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 10,
                            center: myLatLng
                        });
                        //new google.maps.LatLng(35.137879, -82.836914),
                        var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: 'Location of my project',
                            draggable: true,
                            animation: google.maps.Animation.DROP
                        });
                        google.maps.event.addListener(marker, 'dragend', function (evt)
                        {
                            document.getElementById("latitude").value = evt.latLng.lat();
                            document.getElementById("longitude").value = evt.latLng.lng();
                            //evt.latLng.lat()
                            //evt.latLng.lng().toFixed(3)
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
    window.onload = function () {
        //load list data to controls
        $.ajax({
            url: "<?php echo base_url('Company_Edit_Project_Controller/get_country_list') ?>",
            type: "POST",
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#country").empty();
                $("#country").append(resp.html);
                $('#country').trigger('change');
            }
        });

        $.ajax({
            url: "<?php echo base_url('Company_Edit_Project_Controller/get_cprojecttype_list') ?>",
            type: "POST",
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#cprojecttype").empty();
                $("#cprojecttype").append(resp.html);
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Company_Edit_Project_Controller/get_cprojectmanager_list') ?>",
            type: "POST",
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#cprojectmanager").empty();
                $("#cprojectmanager").append(resp.html);
            }
        });
        
        
        
         $.ajax({
            url: "<?php echo base_url('Company_Edit_Project_Controller/get_currency_list') ?>",
            type: "POST",
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#currency").empty();
                $("#currency").append(resp.html);
            }
        });
               

        $("#country").change(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Company_Edit_Project_Controller/get_region_list') ?>",
                type: "POST",
                data: {"countryId": $('#country').val()},
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    $("#region").empty();
                    $("#region").append(resp.html);
                }
            });
        });

       //save 
        $("#project_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Company_Edit_Project_Controller/save');if ($action == 'edit') echo "/" . $c_project_id; ?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        showError(resp.msg);
                    }
                    if (resp.status === "success") {
                        showSuccess("SUCCESS");
                         window.location.href = resp.redirect;
                    }

                }
            });
            
        });

        //select menu 
        $('#idCompanyProjects').addClass('active');
        $('#idCompanyListProject').addClass('active');
    };</script>







