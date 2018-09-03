<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Dashboard Company</h1>
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
                  <div class="col-lg-3 align-items-center">
                           <div class="card p-15 flex-row justify-content-between bg-blue-600">
                               <div class="white">
                                 <i class="icon icon-circle icon-3x wb-users bg-blue-300" aria-hidden="true"></i>
                               </div>
                               <div class="counter counter-md counter counter-inverse  text-right">
                                 <div class="counter-number-group">
                                   <span class="counter-number">
                                         <label id="lblDashboardNumUsers" class="control-label" ></label>
                                   </span>
                                   <span class="counter-sm -number-related text-capitalize">Projects</span>
                                 </div>
                                 <div class="counter-label text-capitalize font-size-16">Created</div>
                               </div>
                             </div>
                    </div>          


                     <div class="col-lg-3 center-block">
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
                             <div class="counter-label text-capitalize font-size-16">Active</div>
                           </div>
                         </div>
                    </div> 
                    
                    <div class="col-lg-3 center-block">
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
                             <div class="counter-label text-capitalize font-size-16">Funding</div>
                           </div>
                         </div>
                    </div> 
                    
                    
                    
                </div>
                <div class="row" >
                    
                    <div class="col-lg-8 align-items-center">
                       <div class="row row-lg">		
                           <div class="col-lg-12">
                             <div class="example-wrap">
                                   <h4 class="example-title">Your Projects</h4>
                                   <div class="example" style="margin: 0;">

                                         <div id="barchart_material" style=" height: 400px;"></div>

                                   </div>
                             </div>
                           </div>
                       </div>
                   </div>
                    
                    <div class="col-lg-4 align-items-center">
                        <div class="row" >
                            
                                <div class="col-lg-12">
                                  <div class="example-wrap">
                                        <h4 class="example-title">Investments in the last 30 days</h4>
                                        <div class="example" style="margin: 0;">
                                             <div id="chart_div2" style=" height: 100px;"></div>
                                        </div>
                                  </div>
                                </div>
                            
                            
                        </div>
                        <div class="row" >
                            <div class="col-lg-12 align-items-center">
                            <div class="row row-lg">		
                                <div class="col-lg-12">
                                  <div class="example-wrap">
                                        <h4 class="example-title" style="text-align: center">Total Investor</h4>
                                        <div class="example" style="margin: 0;">

                                              <div id="chart_div4" style=" height: 100px;"></div>

                                        </div>
                                  </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row" ></div>
                   </div>
                    
                   
                </div> 
                <div class="row" >
                                       
                </div>
            </div> 
        </div> 
    </div> 
</div> 







<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic2);

function drawBasic2() {

     
      var data = google.visualization.arrayToDataTable([
          ['Day', 'Invesments'],
           <?php echo $line1; ?>
        ]);

      var options = {
           //colors: ['#a52714', '#097138'],
           pointSize: 4,
           legend: { position: 'bottom' },
           backgroundColor: '#F2F2F2',
        hAxis: {
          title: 'Day',
          //gridlines: { count: 5 },
          
        },
        vAxis: {
          title: 'Invest',
          gridlines: { count: 10 },
        }
      };

    
      var chart4 = new google.visualization.LineChart(document.getElementById('chart_div2'));
      chart4.draw(data, options);
    }
</script>

<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic3);

function drawBasic3() {

     
      var data = google.visualization.arrayToDataTable([
          ['Day', 'Invesments'],
           <?php echo $line1; ?>
        ]);

      var options = {
           //colors: ['#a52714', '#097138'],
           pointSize: 4,
           legend: { position: 'bottom' },
            backgroundColor: '#F2F2F2',
        hAxis: {
          title: 'Day',
          //gridlines: { count: 5 },
          
        },
        vAxis: {
          title: 'Invest',
          gridlines: { count: 10 },
        }
      };

    
      var chart4 = new google.visualization.LineChart(document.getElementById('chart_div4'));
      chart4.draw(data, options);
    }
</script>


 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

console.log("<?php echo $bargraph; ?>");

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Project', 'Funding Goal', 'Parked'],
          <?php echo $bargraph; ?>
          /*['2020', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]*/
        ]);

        var options = {
          chart: {
          //  title: 'Company Performance',
          //  subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          colors: ['#0083A6','#0099C2'],
         // colors: ['#6B1365','#3442A7','#A20094','#0099C2'],
          backgroundColor: '#F2F2F2',
        // bar: {groupWidth: "95%"},
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


<script type="text/javascript">
    window.onload = function () {
       $('#idDashboardCompany').addClass('active');       
    };
</script>