<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 300px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
    
    
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
               
   
                        <div class="tab-content pt-20">
                            
                            <div class="row">
                                <div class="col-lg-3 align-items-center border-primary ">
                                        <div class="card p-30 flex-row justify-content-between ">
                                            <div class="white">
                                              <i class="icon icon-circle icon-2x wb-clipboard bg-blue-grey-300" aria-hidden="true"></i>
                                            </div>
                                            <div class="counter counter-md counter text-right">
                                              <div class="counter-number-group">
                                                <span class="counter-number">
                                                      <label id="lblSummaryNumProject" class="control-label" ></label>
                                                </span>
                                                <span class="counter-number-related text-capitalize">Projects</span>
                                              </div>
                                              <div class="counter-label text-capitalize font-size-16">Invested</div>
                                            </div>
                                          </div>
                                    
                                    
                                 </div>         
                                   
                                 <div class="col-lg-3 center-block">
                                        
                                        <div class="card p-30 flex-row justify-content-between">
                                            
                                            <div class="white">
                                              <i class="icon icon-circle icon-2x wb-graph-up bg-blue-grey-300" aria-hidden="true"></i>
                                            </div>
                                            <div class="counter counter-md counter text-right">
                                              <div class="counter-number-group">
                                                  <span class="counter-number">
                                                      <label id="lblSummaryAmtInvested" class="control-label" ></label>
                                                  </span>
                                                <span class="counter-number-related text-capitalize">Total</span>
                                              </div>
                                              <div class="counter-label text-capitalize font-size-16">Invested</div>
                                            </div>
                                          </div>
                                 </div> 
                                
                             
                                 
                                 <div class="col-lg-3 center-block">
                                        <div class="card p-30 flex-row justify-content-between">
                                            <div class="white">
                                              <i class="icon icon-circle icon-2x wb-graph-up bg-blue-grey-300" aria-hidden="true"></i>
                                            </div>
                                            <div class="counter counter-md counter text-right">
                                              <div class="counter-number-group">
                                                  <span class="counter-number">
                                                      <label id="lblSummaryBalToInv" class="control-label" ></label>
                                                  </span>
                                                <span class="counter-number-related text-capitalize">Total</span>
                                              </div>
                                              <div class="counter-label font-size-16">Available for Invest</div>
                                            </div>
                                          </div>
                                 </div>   
                                 
                                
                                 
                                 <div class="col-lg-3 center-block">
                                        <div class="card p-30 flex-row justify-content-between">
                                            <div class="white">
                                              <i class="icon icon-circle icon-2x wb-graph-up bg-blue-grey-300" aria-hidden="true"></i>
                                            </div>
                                            <div class="counter counter-md counter text-right">
                                              <div class="counter-number-group">
                                                <span class="counter-number">
                                                    <label id="lblSummaryBalEar" class="control-label" ></label>
                                                </span>
                                                <span class="counter-number-related text-capitalize">Total</span>
                                              </div>
                                              <div class="counter-label text-capitalize font-size-16">earning</div>
                                            </div>
                                          </div>
                                 </div> 
                                </div> 
                            
                            
                                
                                
                            </div>
                          
                              <div class="row">
                                   <div class="col-md-6">
                                          <table id="exampleAddRow" class="table table-hover table-striped" data-paging="false" data-sorting="false"
                                            data-filtering="true" style="width:100%">
                                            <thead>
                                              <tr>
                                                <th class="all">Project</th>
                                                <th class="all">Invested Capital</th>
                                                <th class="none" >Company</th>
                                                <th class="none" >Project Status</th>
                                                <th class="none" >Investment Date</th>
                                                <th class="none" >Investment Status</th>
                                                <th class="none" >Investment %</th>
                                                <th class="none" >Earnings</th>
                                                
                                                <th class="none" >Latitude</th>
                                                <th class="none" >Longitude</th>
                                                <th class="none" >index</th>
                                              </tr>
                                              
                                            </thead>
                                            <tbody>
                                            </tbody>
                                          </table>
                                   </div>
                                   
                                   <div class="col-md-6">
                                           
                                       <!--
                                        <div id="map"></div>
                                       -->
                                       
                                       <div class="row" align="center">
                                  
                                           
                                                  <div class="example-wrap">
                                                        <div class="example" style="margin: 0;">
                                                            <div id="piechart1" style="width: 100%; height: 600px;"></div>
                                                        </div>
                                                  </div>
                                            
                                       </div>
                                    </div>
                               </div>
                        </div>
            </div> 
        </div> 
    </div> 
</div> 
    
    
    
    
    
    
    
    
<!-- Modal -->
   <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
        role="dialog" tabindex="-1">
     <div class="modal-dialog modal-simple modal-center">
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            <h4 class="modal-title">
                  <label id="lblProjectName" class="control-label" ></label>
            </h4>
       </div>
       <div class="modal-body">
         <div class="tab-content">
             
             <div class="row">
              
                                                 
                                        
                    <div class="col-lg-12">

                      <div class="card card-shadow card-completed-options">
                      <div class="card-block p-30">
                        <div class="row">
                          <div class="col-6">
                            <div class="counter text-center blue-grey-700">
                              <div class="counter-label mt-10"> <p><b>Your Invest</b></p>
                              </div>
                              <div class="counter-number font-size-40 mt-10">
                                <label id="lblInvestmentAmount" class="control-label" ></label>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                              
                              
                             <div  id="theprogressbar" class="pie-progress pie-progress-sm"  data-valuemax="100"
                              data-barcolor="#57c7d4" data-size="100" data-barsize="10"
                              data-goal="10" aria-valuenow="0" role="progressbar" data-plugin="pieProgress">
                              <span class="pie-progress-number blue-grey-700 font-size-20">
                                 <label id="lblInvestmentPercent" class="control-label" ></label>
                              </span>
                            </div>
                           
                          </div>
                        </div>
                      
                      </div>
                    </div>

                  </div>
                                        
                           
             </div>                
                             
            <div class="row">
                <div class="col-sm-3">
                   <p><b>Target</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblProjectTarget" class="control-label" ></label>
                </div>
                
                
                <div class="col-sm-3">
                   <p><b>Investment Date</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblInvestmentDate" class="control-label" ></label>
                </div>
                
                
            </div>
             
             <div class="row">
                <div class="col-sm-3">
                   <p><b>Start Date</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblProjectstartDate" class="control-label" ></label>
                </div>
                 
                <div class="col-sm-3">
                   <p><b>Earns</b></p>
                </div>
                <div class="col-sm-3">
                    <label id="lblInvestmentEarns" class="control-label" ></label>
                </div>
            </div>
             
             <div class="row">
                <div class="col-sm-3">
                   <p><b>Yield %</b></p>
                </div>
                <div class="col-sm-8">
                    <label id="lblProjectYiel" class="control-label" ></label>
                </div>
                 
                
            </div>
             
                   
                   
         
          </div>
           
           
        </div> 
       </div>   
           
      </div>
    </div>

<!-- End Modal -->    
    
    
    


<script type="text/javascript">
var table;
var map;
var markers = [];

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
                async: false,
                url : "<?php echo base_url('Investor_Investment_Controller/get_investment_list/?id='.$userid)?>",
                type : 'GET'
            },
            

	    columnDefs: [ {
	      className: 'control',
	      orderable: false,
	      targets: -1
		    }, {"targets": [ 8 ], "visible": false},
                       {"targets": [ 9 ], "visible": false},
                       {"targets": [ 10 ], "visible": false}
                ]
     });
     
     
     
     /* // maps
     bounds  = new google.maps.LatLngBounds();
     
     for(i=0;  i< table.rows().data().length;i++){
       var latitude = table.rows().data()[i][9]; // Column 8 Latitude
       var longitude = table.rows().data()[i][8]; // Column 7 Longitude
       var projectName = table.rows().data()[i][0]; // Column 0 ProjectName
       var index = table.rows().data()[i][10]; // Column 9 Index Order RowData
       
       if(latitude == "" || longitude == "")
         continue;
     
        locator = new google.maps.LatLng( latitude, longitude);
       
        var marker = new google.maps.Marker({
                              position: locator, 
                              map: map,
                              title: projectName
                            });
       
       markers[index] = marker;
       bounds.extend(locator);
     }
     map.fitBounds(bounds); 
     */
     
     
     /*
     console.log('holis');
     $.each( table.rows().data(), function( key, value ) {
       console.log('value ' + value);
     });*/

     $('#lblSummaryAmtInvested').text("<?php echo $totalinvested; ?>");
     $('#lblSummaryNumProject').text("<?php echo $totalproject; ?>");
     $('#lblSummaryBalToInv').text("<?php echo $totalbaltoinv; ?>");
     $('#lblSummaryBalEar').text("<?php echo $totalearning; ?>");
     
      
     
};


function moreinfo_investment(investmentId){
  
    //Set progress to 0
    $('#theprogressbar').asPieProgress({
        min: 0,
        max: 400,
        goal: 400,

    namespace: 'pie_progress',
    barsize: '2',
    trackcolor: '#ececea',
    barcolor: '#e6675f'
});
    
    $('#examplePositionCenter').modal('show');
     //$('#theprogressbar').asPieProgress('reset');
     
 
     
      $.ajax({
                url: "<?php echo base_url('Investor_Investment_Controller/get_investmentdetail_list')?>",
                type: "POST",
                data: {'id': investmentId},
                async: false,
                                    
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    console.log(resp);
                    if (resp.status === "error") {                       
                         showError('Error Get Data - Please Try Again');
                    } 
                    if (resp.status === "success") {
                        
                        
                        $('#lblProjectTarget').text(resp.data[0]['prjtarget']);
                        $('#lblInvestmentDate').text(resp.data[0]['invdate']);
                        $('#lblProjectstartDate').text(resp.data[0]['prjstartdate']);
                        $('#lblInvestmentEarns').text(resp.data[0]['invearns']);
                        $('#lblProjectYiel').text(resp.data[0]['prjyield']);
                        $('#lblProjectName').text(resp.data[0]['prjname']);
                        
                        $('#lblInvestmentAmount').text(resp.data[0]['invamount']);
                        $('#lblInvestmentPercent').text(resp.data[0]['invpercent'] + ' %');

                        
            
                     // $('#theprogressbar').asPieProgress("go", "'"+ resp.data[0]['invpercentround'] + "%'");
                     $('#theprogressbar').asPieProgress("go",resp.data[0]['invpercent']);
                     
                     //  $('#theprogressbar').attr('aria-valuenow',);
                     //  $('#theprogressbar').asPieProgress('start');
                       
                       

              
                       
                        //$('#theprogressbar').attr('aria-valuenow', resp.data[0]['invpercent'].toString());
                        //$('#theprogressbar').attr('role', "progressbar");
                        
                      //  $('#theprogressbar').attr('disabled', false);
                        
                       
                    }                     
              }
          }); 
  
}

</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          
          console.log("<?php echo $pie; ?>");

       var data = google.visualization.arrayToDataTable([
           ['Language', 'Speakers (in millions)'],
          <?php echo $pie; ?>
        ]);


        var options = {
          title: '',
          
          width:600,
          height:400,
          pieHole: 0.4,
        
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data, options);
        
      }
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
        map = new google.maps.Map(
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
        
        
      }
</script>




<!-- 
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI49kT8nqt6CKwnstK2S2kJuabIPcbvOE
&callback=initMap">
</script>
-->

