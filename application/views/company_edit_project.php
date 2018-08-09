<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/blueimp-file-upload/jquery.fileupload.min599c.css?v4.0.2">
<link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/dropify/dropify.min599c.css?v4.0.2">

<div class="page">
    <div class="page-header">
        <h1 class="page-title">Edit Project <?php echo $idproject; ?></h1>
        <div class="page-header-actions">
            <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-cubes" href="#">Projects</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>company_project">My Projects</a></li>
                <li class="breadcrumb-item">Edit Project </li>

            </ol> 
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <div class="row">

                    <div class="col-sm-6">
                        <div class="col-sm-12">
                            <!--  data-default-file="../../global/photos/view-8-960x640.jpg" -->
                            <input class="dropify" type="file" id="input-file-now-custom-1" data-plugin="dropify" data-height="300" data-allowed-file-extensions="*"/>
                            <br>
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
                                <select  required class="form-control"  id="propertytipe" name="propertytipe" style="font-size: 14px; border-radius:0;">
                                    <option value="AP" >Apartment</option>
                                    <option value="SUI" >Suite</option>
                                    <option value="BUI">Building</option>
                                </select>    
                            </div>
                        </div>


                    </div>

                    <div class="col-sm-6">
                        <style>

                            #map {
                                min-height: 300px;
                                height: 310px; 
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
                                    alert(evt.latLng.lat());
                                    //evt.latLng.lng().toFixed(3) 
                                });
                            }
                        </script>

                        <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI49kT8nqt6CKwnstK2S2kJuabIPcbvOE&callback=initMap">
                        </script>
                    </div>

                </div>


            </div> 
        </div> 
    </div> 
</div> 

<script type="text/javascript">
    window.onload = function () {
        $('#idCompanyProjects').addClass('active');
        $('#idCompanyListProject').addClass('active');
    };</script>







