<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/blueimp-file-upload/jquery.fileupload.min599c.css?v4.0.2">
<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/dropify/dropify.min599c.css?v4.0.2">
<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min599c.css?v4.0.2">

<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/summernote/summernote.min599c.css?v4.0.2">
<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/summernote/summernote/css/summernote-libreicon-theme.css">
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

                                        <input type="text" required class="form-control" id="latitude" name="latitude" placeholder="Latitude" style="font-size: 14px; border-radius:0;">

                                    </div>
                                </div>

                                <div class="col-sm-5" style="padding-right: 0;">
                                    <div class="form-group ">

                                        <input type="text" required class="form-control"  id="longitude" name="longitude" placeholder="Longitude" style="font-size: 14px; border-radius:0;">

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
                                    
                                    <!--<div id="summernote" data-plugin="summernote">   
                                    </div>   -->
                                    
                                    <textarea data-plugin="summernote" class="form-control" required id="description" name="description" placeholder="Description" style="font-size: 14px; border-radius:0; height: 100px;"></textarea>
                                    

                                </div>

                            </div>


                        </div>

                        <div class="col-sm-6">

                            <div class="col-sm-12">
                                <h4 class="example-title">Project Image</h4>
                            </div>

                            <div class="row col-sm-12">
                                
                                <div class="col-sm-6 ">
                                    <label class="control-label" for="imagenback" >New Image</label>
                                    <input class="dropify" type="file" id="photo" required name="photo" data-plugin="dropify" data-allowed-file-extensions="jpg png jpeg"   /> <!-- data-height="100" -->

                                </div>
                                
                                <div class="col-sm-6">
                                    <label class="control-label" for="imagenback" >Old Image</label> 


                                    <div class="col-sm-12" style="width: 100%;padding: 5px 10px;border: 1px solid #e4eaec;position: relative;display: block;;">
                                        <img class="img-bordered-primary vcenter"  id="oldimage" name="oldimage" src="<?php echo base_url() . "themes/default/remark"; ?>/topbar/assets/images/nophoto2.jpg" style="width: 100%;" />
                                    </div>
                                    <input type="hidden" id="idcfilephoto" class="form-control" value="0" name="idcfilephoto"  >
                                    <!-- <input type="text" id="isactive" class="form-control" value="Y" name="isactive" >
                                    <input type="text" id="projectstatus" class="form-control" value="PEND" name="projectstatus" > -->
                                </div>

                            </div>    


                            <br>
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
                            
                            
                             <div class="col-sm-12">
                                <h4 class="example-title">Documents for Project</h4>
                            </div>

                           
                                
                                <?php 
                                
                                if ($action == 'new' || $action == 'edit'){
                                    foreach ($docs as $entry) {                                         
                                      
                                 ?>
                                 <div class="col-sm-12">
                                  <div class="form-group">
                                     
                                      
                                    <label class="control-label" ><?php echo  ucfirst($entry['name']); if($entry['ismandatory']=="Y") echo "*";?></label><br>
                                     <?php 
                                      if(isset($entry['namefile'])){
                                          echo  '<label class="control-label" ><a target="_blank" href="'. base_url().'upload/docs/'.$entry['namefile'].'">Preview Doc <i class="icon wb-link" aria-hidden="true"></i></a></label>';
                                      }
                                      ?>
                                    <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                      <input type="text" class="form-control" readonly="">
                                      <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                          <i class="icon wb-upload" aria-hidden="true"></i>
                                          <input type="file" <?php  if($entry['ismandatory']=="Y" && $action == 'new') echo "required";?> name="<?php echo  $entry['c_projectdocumenttype_id'];?>" id="<?php echo  $entry['c_projectdocumenttype_id'];?>" accept="application/pdf">
                                        </span>
                                      </span>
                                    </div>
                                  </div>
                                 </div>     
                                <?php                                         
                                     }
                                } 
                                ?>
                                
                           
                           


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
                            draggable: true,
                            animation: google.maps.Animation.DROP
                        });
                        
                        google.maps.event.addListener(marker, 'dragend', function (evt)
                        {   document.getElementById("latitude").value = evt.latLng.lat();
                            document.getElementById("longitude").value = evt.latLng.lng();
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
    function toDate(dateStr) {
        var parts = dateStr.split("-")
        return new Date(parts[0], parts[1] - 1, parts[2]);
    }  
  
    window.onload = function () {

        var action = "<?php echo $action; ?>";
        var c_project_id = "<?php if (isset($c_project_id)) echo $c_project_id; ?>";
        console.log(action);
        $("#country").change(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Company_Edit_Project_Controller/get_region_list') ?>",
                type: "POST",
                async: false,
                data: {"countryId": $('#country').val()},
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    $("#region").empty();
                    $("#region").append(resp.html);
                }
            });
        });



        //load list data to controls
        $.ajax({
            url: "<?php echo base_url('Company_Edit_Project_Controller/get_country_list') ?>",
            type: "POST",
            async: false,
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
            async: false,
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#cprojecttype").empty();
                $("#cprojecttype").append(resp.html);
            }
        });

        $.ajax({
            url: "<?php echo base_url('Company_Edit_Project_Controller/get_cprojectmanager_list') ?>",
            type: "POST",
            async: false,
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#cprojectmanager").empty();
                $("#cprojectmanager").append(resp.html);
            }
        });



        $.ajax({
            url: "<?php echo base_url('Company_Edit_Project_Controller/get_currency_list') ?>",
            type: "POST",
            async: false,
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#currency").empty();
                $("#currency").append(resp.html);
            }
        });



        //edit default
        if (action === "edit") {

            $('#nameproject').val("<?php if (isset($name)) echo $name; ?>");
            $('#companyname').val("<?php if (isset($companyname)) echo $companyname; ?>");
            $('#propertytype').val("<?php if (isset($propertytype)) echo $propertytype; ?>");
            $('#latitude').val("<?php if (isset($latitude)) echo $latitude; ?>");
            $('#longitude').val("<?php if (isset($longitude)) echo $longitude; ?>");
            map.setZoom(14);
            map.setCenter(new google.maps.LatLng("<?php if (isset($latitude)) {echo $latitude;} else {echo "25.769054";} ?>", "<?php if (isset($longitude)) { echo $longitude;} else {echo "-80.216266";} ?>"));
            marker.setPosition(new google.maps.LatLng("<?php if (isset($latitude)) {echo $latitude;} else {echo "25.769054";} ?>", "<?php if (isset($longitude)) { echo $longitude;} else {echo "-80.216266";} ?>"));
            google.maps.event.trigger(map, 'resize'); 
            $('#qtyproperty').val("<?php if (isset($qtyproperty)) echo $qtyproperty; ?>");
            $('#address').val("<?php if (isset($address1)) echo $address1; ?>");
            $('#country').val("<?php if (isset($c_country_id)) echo $c_country_id; ?>");
            $('#region').val("<?php if (isset($c_region_id)) echo $c_region_id; ?>");
            $('#city').val("<?php if (isset($city)) echo $city; ?>");
            $('#cprojecttype').val("<?php if (isset($c_projecttype_id)) echo $c_projecttype_id; ?>");
            $('#cprojectmanager').val("<?php if (isset($c_projectmanager_id)) echo $c_projectmanager_id; ?>");            
            //$('#description').val("<?php if (isset($description)) echo $description; ?>");
            $('#description').summernote('code', '<?php if (isset($description)) echo $description; ?>');

            $('#idcfilephoto').val("<?php if (isset($homeimage_id)) echo $homeimage_id; ?>");
            $('#oldimage').attr('src', "<?php if (isset($namefile) && trim($namefile) != '' && file_exists("upload/imgs/$namefile")) {    echo base_url() . 'upload/imgs/' . $namefile;} else {    echo base_url() . 'themes/default/remark/topbar/assets/images/nophoto2.jpg';} ?>");
            $('#photo').removeAttr('required');

            $('#currency').val("<?php if (isset($c_currency_id)) echo $c_currency_id; ?>");
            $('#months').val("<?php if (isset($loanterm)) echo $loanterm; ?>");
            $('#yield').val("<?php if (isset($totalyieldperc)) echo $totalyieldperc; ?>");
            $('#financial').val("<?php if (isset($targetamt)) echo $targetamt; ?>");

            $('#limit').datepicker("setDate", toDate("<?php if (isset($datelimit)) echo $datelimit; ?>"));
            $('#start').datepicker("setDate", toDate("<?php if (isset($startdate)) echo $startdate; ?>"));


        }


        var url_base = "<?php echo base_url('Company_Edit_Project_Controller/save'); ?>/" + c_project_id;
        //save 
        $("#project_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: url_base,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        showError(resp.msg);
                    }
                    if (resp.status === "success") {
                        url_base = "<?php echo base_url('Company_Edit_Project_Controller/save'); ?>/" + resp.c_project_id;
                        showSuccess("Success Save");
                        //window.location.href = resp.redirect;
                    }

                }
            });

        });

        //select menu 
        $('#idCompanyProjects').addClass('active');
        $('#idCompanyListProject').addClass('active');
    };</script>







