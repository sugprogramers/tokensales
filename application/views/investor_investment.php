  <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 300px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
    
<div class="page">
   
    <!-- 
    <div class="page-header">
        <h1 class="page-title">My Investments</h1>
        <div class="page-header-actions">
          
        </div>
    </div>
    -->

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
               
              
                <div class="col-xl-12">
                    <!-- Example Tabs Line Top -->
                    <div class="example-wrap">
                      <div class="nav-tabs-horizontal" data-plugin="tabs">
                        <ul class="nav nav-tabs nav-tabs-line tabs-line-top" role="tablist">
                          <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsLineTopOne"
                              aria-controls="exampleTabsLineTopOne" role="tab">Investments</a></li>
                          <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopTwo"
                              aria-controls="exampleTabsLineTopTwo" role="tab">Summary</a></li>
                        </ul>
                        <div class="tab-content pt-20">
                          <div class="tab-pane active" id="exampleTabsLineTopOne" role="tabpanel">
                              <div class="row">
                                   <div class="col-md-4">
                                          <table id="exampleAddRow" class="table table-hover table-striped" data-paging="true" data-sorting="true"
                                            data-filtering="true" style="width:100%">
                                            <thead>
                                              <tr>
                                                <th class="all">Project</th>
                                                <th class="all">Invested Capital</th>
                                                <th class="none" >Company</th>
                                                <th class="none" >Project Status</th>
                                                <th class="none" >Investment Date</th>
                                                <th class="none" >Investment Status</th>
                                                <th class="none" >Earnings</th>
                                              </tr>
                                              
                                            </thead>
                                            <tbody>
                                            </tbody>
                                          </table>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                                   <div class="col-md-7">
                                       <!-- Example Simple -->
                                        
                                        <div id="map"></div>
                                        <!-- End Example Simple -->
                                   </div>
                              
                              </div>
                          </div>
                          <div class="tab-pane" id="exampleTabsLineTopTwo" role="tabpanel">
                              <div class="row">
                                  
                              </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Example Tabs Line Top -->
                </div>
          
                 
                
                

            </div> 
        </div> 
    </div> 
</div> 


<script type="text/javascript">
var table;

window.onload = function () {
    
    $('#exampleAddRow').addClass('active');
    table = $('#exampleAddRow').DataTable({
            responsive: true,
            "order": [[ 0, "desc" ]],
            "columnDefs": [{
                    "targets": [3],
                    "orderable": false
                }],
            "processing": true,  //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            
            "ajax": {
                url : "<?php echo base_url('Investor_Investment_Controller/get_investment_list/?id='.$userid)?>",
                type : 'GET'
            },
            
	    columnDefs: [ {
	      className: 'control',
	      orderable: false,
	      targets: -1
		    }]
     });
};
</script>


<script>
        
</script>

<script>
     function initMap() {
         
         // Create a new StyledMapType object, passing it an array of styles,
        // and the name to be displayed on the map type control.
        var styledMapType = new google.maps.StyledMapType(
            [
              {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
              {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
              {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
              {
                featureType: 'administrative',
                elementType: 'geometry.stroke',
                stylers: [{color: '#c9b2a6'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'geometry.stroke',
                stylers: [{color: '#dcd2be'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'labels.text.fill',
                stylers: [{color: '#ae9e90'}]
              },
              {
                featureType: 'landscape.natural',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#93817c'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'geometry.fill',
                stylers: [{color: '#a5b076'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#447530'}]
              },
              {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#f5f1e6'}]
              },
              {
                featureType: 'road.arterial',
                elementType: 'geometry',
                stylers: [{color: '#fdfcf8'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#f8c967'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#e9bc62'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry',
                stylers: [{color: '#e98d58'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry.stroke',
                stylers: [{color: '#db8555'}]
              },
              {
                featureType: 'road.local',
                elementType: 'labels.text.fill',
                stylers: [{color: '#806b63'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.fill',
                stylers: [{color: '#8f7d77'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#ebe3cd'}]
              },
              {
                featureType: 'transit.station',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'water',
                elementType: 'geometry.fill',
                stylers: [{color: '#b9d3c2'}]
              },
              {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#92998d'}]
              }
            ],
            {name: 'Styled Map'});
         
        // The location of USA
        var usa = {lat: 36.2076441, lng: -113.7413709}
        var map = new google.maps.Map(
            //document.getElementById('map'), {zoom: 3, center: usa,  mapTypeId: google.maps.MapTypeId.ROADMAP});
            document.getElementById('map'), {zoom: 3, 
                                            center: usa,
                                            mapTypeControlOptions: {
                                                mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                                                        'styled_map']
                                              }
             });
             
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
        
        $.ajax({
            url: "<?php echo base_url('Investor_Investment_Controller/get_locator')?>",
            type: "POST",
            data: {'id': "<?php  $userId; ?>"},
            success: function(data) {
                 
                   // console.log(data);
                    var resp = $.parseJSON(data);//convertir data de json
                    
                    if (resp.status === "success") {  
                         var markerBounds = new google.maps.LatLngBounds();
                         $.each( resp.data, function( key, value ) {
                            //console.log('---' + value.longitud);
                            /*marker = new google.maps.Marker({
                                position: new google.maps.LatLng(value.longitud, value.latitud),
                                map: map,
                                title: value.title
                            });*/
        
                            randomPoint = new google.maps.LatLng( value.longitud, value.latitud);
                            
                            
                            // Draw a marker for each random point
                            new google.maps.Marker({
                              position: randomPoint, 
                              map: map,
                              title: value.title
                            });
                            
                         });
                         
                        
                         markerBounds.extend(randomPoint);
                         //console.log("data : " + resp.data[0].longitud);
                    } 
                    
                   //map.fitBounds(markerBounds,0);
                   map.panToBounds(markerBounds);
                
                    /*marker = new google.maps.Marker({
                    position: new google.maps.LatLng(data.lat, data.long),
                    map: map,
                    title: 'test'
                });*/
                
            }
        });
      
      
      }
</script>





<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI49kT8nqt6CKwnstK2S2kJuabIPcbvOE
&callback=initMap">
</script>

