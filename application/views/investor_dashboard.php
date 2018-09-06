<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div class="page-header-actions">
            <!-- <ol class="breadcrumb breadcrumb-arrow">
                 <li class="breadcrumb-item"><a class="icon fa-clipboard" href="#">Home</a></li>
                 <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                 <li class="breadcrumb-item active">Headers</li>
             </ol> -->
        </div>
    </div>

    <div class="page-content container-fluid"  style="padding-top: 0px;">
        <div class="panel">
            <div class="panel-body">

                <div class="row row-md"> 
                    <div class="col-md-3" >
                        <div style="cursor: pointer;" onclick="window.location = 'investor_depositfunds/2';">            
                            <!-- Card -->
                            <div class="card p-15 flex-row justify-content-between bg-orange-600">
                                <div class="white">
                                    <i class="icon icon-circle icon-3x wb-graph-up bg-orange-400" aria-hidden="true"></i>
                                </div>
                                <div class="counter counter-md counter counter-inverse  text-right">                                    
                                    <div class="counter-number-group">
                                        <span class="counter-number"><?php echo $curr_symbol . ' ' . $earnings_balance; ?></span>
                                        <span class="counter-sm -number-related text-capitalize"></span>
                                    </div>
                                    <div class="counter-label font-size-16">Estimated Earnings to Date</div>
                                </div>
                            </div>            
                            <!-- End Card -->
                        </div>           
                    </div>

                    <div class="col-md-3" >
                        <div style="cursor: pointer;" onclick="window.location = 'investor_depositfunds/2';">            
                            <!-- Card -->
                            <div class="card p-15 flex-row justify-content-between bg-blue-600">
                                <div class="white">
                                    <i class="icon icon-circle icon-3x wb-graph-up bg-blue-400" aria-hidden="true"></i>
                                </div>
                                <div class="counter counter-md counter counter-inverse  text-right">
                                    <div class="counter-number-group">
                                        <span class="counter-number"><?php echo $curr_symbol . ' ' . $fillingTheTank_balance; ?></span>
                                        <span class="counter-sm -number-related text-capitalize"></span>
                                    </div>
                                    <div class="counter-label font-size-16">Filling the Tank</div>
                                </div>
                            </div>            
                            <!-- End Card -->
                        </div>           
                    </div>      
                    
                    <div class="col-md-3" >
                        <div style="cursor: pointer;" onclick="window.location = 'investor_depositfunds/2';">            
                            <!-- Card -->
                            <div class="card p-15 flex-row justify-content-between  bg-green-700">
                                <div class="white">
                                    <i class="icon icon-circle icon-3x wb-graph-up bg-green-500" aria-hidden="true"></i>
                                </div>
                                <div class="counter counter-md counter counter-inverse  text-right">
                                    <div class="counter-number-group">
                                        <span class="counter-number"><?php echo $curr_symbol . ' ' . $parked_balance; ?></span>
                                        <span class="counter-sm -number-related text-capitalize"></span>
                                    </div>
                                    <div class="counter-label text-capitalize font-size-16">Parked</div>
                                </div>
                            </div>            
                            <!-- End Card -->
                        </div>           
                    </div> 

                    <div class="col-md-3" >
                        <div style="cursor: pointer;" onclick="window.location = 'investor_depositfunds/2';">            
                            <!-- Card -->
                            <div class="card p-15 flex-row justify-content-between bg-grey-500">
                                <div class="white">
                                    <i class="icon icon-circle icon-3x wb-graph-up bg-grey-400" aria-hidden="true"></i>
                                </div>
                                <div class="counter counter-md counter counter-inverse  text-right">
                                    <div class="counter-number-group">
                                        <span class="counter-number"><?php echo $curr_symbol . ' ' . $driving_balance; ?></span>
                                        <span class="counter-sm -number-related text-capitalize"></span>
                                    </div>
                                    <div class="counter-label text-capitalize font-size-16">Driving</div>
                                </div>
                            </div>            
                            <!-- End Card -->
                        </div>           
                    </div>

                     

                </div>


                   
                
                <div id="notInvestmentMessage" class="row row-lg">
                    
                    <div class="col-lg-12">
                       <div class="counter counter-md counter text-center">
                                <div class="counter-number-group">
                                    <span class="counter-number">You currently don't have any investments</span>
                                </div>
                            </div>
                    </div> 
                </div>
              
                
              <div id="graphBody">  
                  
               
                  
                  
                 <div class="row row-lg">
                            <div class="col-lg-4">
                                <!-- Example Default -->
                                <div class="example-wrap m-lg-0">
                                  <div class="example">
                                    <div class="carousel slide" id="exampleCarouselDefault" data-ride="carousel">

                                        <div class="carousel-inner" role="listbox" id="infoDataCarousel">

                                           <!--MY information-->

                                      </div>

                                    </div>
                                  </div>
                                </div>
                                <!-- End Example Default -->
                            </div>
                        </div>
                  
                  
                <div class="row row-lg">
                    <div class="col-lg-7">
                        <h4 class="example-title">Invested Projects</h4>
                        <table id="exampleAddRow" class="table table-hover table-striped" data-paging="false" data-sorting="false"
                        data-filtering="true" style="width:100%">
                        <thead>
                          <tr>
                            <th class="all">Project</th>
                            <th class="all">Invested Capital</th>
                            <th class="all" >Investment Status</th>
                            <th class="none" >Company</th>
                            <th class="none" >Project Status</th>
                            <th class="none" >Investment Date</th>

                            <th class="none" >investment of Project %</th>
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
                    <div class="col-lg-5">
                        
                        
                        
                        
                        <div class="row row-lg">
                            <div class="example-wrap m-md-0">
                                <!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
                                <div class="example" style="margin: 0;">
                                   <div id="piechart1" style="width: 100%; height: 250px;"></div>
                                </div>
                            </div>   
                            
                        </div>

                                   
                    </div>
                    
                </div>   
              <!--     
                <div class="row row-lg">
                    <div class="col-lg-6">
                        <div class="example-wrap">
                            <h4 class="example-title">My Investments in the last 30 days</h4>
                 
                            <div class="example" style="margin: 0;">

                                
                                 <div id="chart_div2" style="width: 100%; height: 500px;"></div>

                            </div>
                        </div>           
                    </div>                    
                    <div class="col-lg-6"></div>                    
                </div>    
              -->    
                  
                  
                  
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
                   <p><b>Earnings</b></p>
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




<!-- Modal -->
   <div class="modal fade" id="exampleDialog" aria-hidden="true" aria-labelledby="exampleDialog"
        role="dialog" tabindex="-1">
     <div class="modal-dialog modal-simple modal-center">
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            <h4 class="modal-title">
                  Earnings
            </h4>
       </div>
       <div class="modal-body">
         <div class="tab-content">
            
             <table id="exampleEarning" class="table table-hover" data-paging="true" data-sorting="true"
                    data-filtering="true" style="width:100%">
                    <thead>
                      <tr>
                         <!-- <th data-name="status">status</th> -->
                        <th data-name="projectName">Project</th>
                        <th data-name="paymentDate">Payment Date</th>
                        <th data-name="Amount">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
         
          </div>
        </div> 
       </div>   
           
      </div>
    </div>

<!-- End Modal -->


<script>
 /*   google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawBasic1);

    function drawBasic1() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Driving Projects', 'Parked Projects'],
            <?php echo $line1; ?>
        ]);

        var options = {
            colors: ['#00D181', '#63B2F8'],
            pointSize: 4,
            legend: {position: 'bottom'},
            hAxis: {
                title: 'Date'
                //gridlines: { count: 5 },
            },
            vAxis: {
                title: 'Investment ($)',
                gridlines: {count: 10},
            },
            backgroundColor: '#F2F2F2'
        };


        var chart4 = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart4.draw(data, options);
    }*/
</script>


<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Amount', 'Projects'],
            <?php echo $pie; ?>
        ]);

       var options = {
          title: '',
          
          width:600,
          height:300,
          pieHole: 0.4,
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data, options);        
      }
</script>

<script type="text/javascript">
    

    window.onload = function () {
        $('#idDashboardInvestor').addClass('active');
        
        
        $("#notInvestmentMessage").show();
        $("#graphBody").hide();
        
        if(("<?php echo $driving_projects ?>" != 0)
           ||  ("<?php echo $parked_projects ?>" != 0)){
         
           $("#notInvestmentMessage").hide();
           $("#graphBody").show();
         
        }
        
        
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
                url : "<?php echo base_url('Investor_Investment_Controller/get_investment_list')?>",
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
        
        //$parked_projects
        
        Listar();
        
    };

</script>

<script>
    
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

                        
                        $('#theprogressbar').asPieProgress("go",resp.data[0]['invpercent']);
                      
                       
                    }                     
              }
          }); 
  
}

function moreinfo_earning(investmentId){
  
    $('#exampleDialog').modal('show');
     
     
     table = $('#exampleEarning').DataTable({
            responsive: true,
            "order": [[ 0, "desc" ]],
            "columnDefs": [{
                    "targets": [2],
                    "orderable": false
                }],
            "processing": true,  //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url : "<?php echo base_url('Investor_Investment_Controller/get_investment_earnings/?id=')?>"+investmentId,
                type : 'GET'
            },
     });
 
    table.destroy();
}

function Listar() {
        $.ajax({
            url: "<?php echo base_url('Investor_Dashboard_Controller/get_carousel_data'); ?>",
            type: "POST",
            async:false,
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#infoDataCarousel").empty();
                $("#infoDataCarousel").append(resp.html);
                
            }
        });

    }


</script>