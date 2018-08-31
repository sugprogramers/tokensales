<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Dashboard Admin</h1>
        <div class="page-header-actions">
          <!-- <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-clipboard" href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                <li class="breadcrumb-item active">Headers</li>
            </ol> -->
        </div>
    </div>
    
    
    
   

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
                
                
                <div class="row" >
                       <div class="col-lg-6 align-items-center">
                           
                           
                           
                                <div class="card p-15 flex-row justify-content-between bg-blue-600">
                                    <div class="white">
                                      <i class="icon icon-circle icon-3x wb-users bg-blue-300" aria-hidden="true"></i>
                                    </div>
                                    <div class="counter counter-md counter counter-inverse  text-right">
                                      <div class="counter-number-group">
                                        <span class="counter-number">
                                              <label id="lblDashboardNumUsers" class="control-label" ></label>
                                        </span>
                                        <span class="counter-sm -number-related text-capitalize">Users</span>
                                      </div>
                                      <div class="counter-label text-capitalize font-size-16">Investor</div>
                                    </div>
                                  </div>
                         </div>          


                          <div class="col-lg-6 center-block">
                                <div class="card p-15 flex-row justify-content-between bg-green-600">
                                    <div class="white">
                                      <i class="icon icon-circle icon-3x wb-pluse bg-green-300" aria-hidden="true"></i>
                                    </div>
                                    <div class="counter counter-md counter counter-inverse  text-right">
                                      <div class="counter-number-group">
                                          <span class="counter-number">
                                              <label id="lblDashboardNumProjects" class="control-label" ></label>
                                          </span>
                                        <span class="counter-number-related text-capitalize">Projects</span>
                                      </div>
                                      <div class="counter-label text-capitalize font-size-16">Fundings</div>
                                    </div>
                                  </div>
                         </div> 
               </div>
                
                <div class="row" >
                    <div class="col-lg-6 align-items-center">
                        <div class="row row-lg">
                            <div class="col-lg-12">

                                <div class="example-wrap m-md-0" >
                                    <h4 class="example-title">Investments in the last 30 days</h4>
                                    <!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
                                    <div class="example" style="margin: 0;">

                                       <div id="chart_div2" style="width: 100%; height: 250px;"></div>

                                    </div>
                              </div>              
                            </div>
                        </div> 
                    </div>
                    
                    
                    <div class="col-lg-6 align-items-center">
                        <div class="row row-lg">		
                            <div class="col-lg-12">
                              <div class="example-wrap">
                                    <h4 class="example-title">Status Projects</h4>
                                    <!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
                                    <div class="example" style="margin: 0;">

                                        <div id="piechart1" style="width: 100%; height: 250px;"></div>

                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
                
                <div class="row" >
                    
                    
                    
                    <div class="col-lg-6 align-items-center">
                        <div class="row row-lg">
                            <div class="col-lg-12">
                               
                                <div class="example-wrap m-md-0">
                                    <h4 class="example-title">Active Investments</h4>
                                    <!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
                                    <div class="example" style="margin: 0;">

                                       <div id="chart_div1" style="width: 100%; height: 250px;"></div>

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


<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status', 'Number of projects'],
         <?php echo $pie; ?>
        ]);

        var options = {
          title: '',
          is3D: true,
          backgroundColor: '#F2F2F2',
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data, options);
        
      }
</script>


<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

     
      var data = google.visualization.arrayToDataTable([
          ['Days', 'Investors', 'Companys'],
          <?php echo $line2; ?>
        ]);

      var options = {
           //colors: ['#a52714', '#097138'],
           pointSize: 4,
          // backgroundColor: '#FBFCFC',
           legend: { position: 'bottom' },
        hAxis: {
          title: 'Day',
          //gridlines: { count: 5 },
          
        },
        vAxis: {
          title: 'Register',
          gridlines: { count: 10 },
        }, backgroundColor: '#F2F2F2',
      };

      var chart3 = new google.visualization.LineChart(document.getElementById('chart_div1'));
      chart3.draw(data, options);
    
    }
</script>




<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic1);

function drawBasic1() {

     
      var data = google.visualization.arrayToDataTable([
          ['Day', 'Invesments'],
           <?php echo $line1; ?>
        ]);

      var options = {
           //colors: ['#a52714', '#097138'],
           pointSize: 4,
           legend: { position: 'bottom' },
        hAxis: {
          title: 'Day',
          //gridlines: { count: 5 },
          
        },
        vAxis: {
          title: 'Invest',
          gridlines: { count: 10 },
        }, backgroundColor: '#F2F2F2',
      };

    
      var chart4 = new google.visualization.LineChart(document.getElementById('chart_div2'));
      chart4.draw(data, options);
    }
</script>



<script type="text/javascript">
    window.onload = function () {
       $('#idDashboardAdmin').addClass('active');  
       
        $('#lblDashboardNumUsers').text("<?php echo $totalusersinvestor; ?>");
        $('#lblDashboardNumProjects').text("<?php echo $totalprojects; ?>");
       
    };
</script>