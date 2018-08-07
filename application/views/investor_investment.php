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
                                   <div class="col-md-6">
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
                                   <div class="col-md-6">
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
     function initMap() {
        // The location of Uluru
       // var uluru = {lat: -25.344, lng: 131.036};
        var uluru = {lat: 41.850033, lng: -87.6500523}
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru,  mapTypeId: google.maps.MapTypeId.ROADMAP});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
        
      
      }
</script>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV9sWkjQb7BDzfK_NwlnF4wDY66j1iRtg&callback=initMap">
    </script>