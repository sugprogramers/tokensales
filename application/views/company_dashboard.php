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

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
                <div class="row" >
                  <div class="col-lg-3 align-items-center">
                           <div class="card p-15 flex-row justify-content-between bg-orange-600">
                               <div class="white">
                                 <i class="icon icon-circle icon-3x wb-users bg-orange-400" aria-hidden="true"></i>
                               </div>
                               <div class="counter counter-md counter counter-inverse  text-right">
                                 <div class="counter-number-group">
                                   <span class="counter-number"><?php echo $totalprojects; ?></span>
                                   <span class="counter-sm -number-related text-capitalize">Projects</span>
                                 </div>
                                 <div class="counter-label text-capitalize font-size-16">Created</div>
                               </div>
                             </div>
                    </div>          


                     <div class="col-lg-3 center-block">
                       <div class="card p-15 flex-row justify-content-between bg-blue-600">
                           <div class="white">
                             <i class="icon icon-circle icon-3x wb-pluse bg-blue-400" aria-hidden="true"></i>
                           </div>
                           <div class="counter counter-md counter counter-inverse  text-right">
                             <div class="counter-number-group">
                               <span class="counter-number"><?php echo $numactive; ?></span>
                               <span class="counter-number-related text-capitalize">Projects</span>
                             </div>
                             <div class="counter-label text-capitalize font-size-16">Active</div>
                           </div>
                         </div>
                    </div> 
                    
                    <div class="col-lg-3 center-block">
                       <div class="card p-15 flex-row justify-content-between bg-green-700">
                           <div class="white">
                             <i class="icon icon-circle icon-3x wb-pluse bg-green-500" aria-hidden="true"></i>
                           </div>
                           <div class="counter counter-md counter counter-inverse  text-right">
                             <div class="counter-number-group">
                               <span class="counter-number"><?php echo $numfunding; ?></span>
                               <span class="counter-number-related text-capitalize">Projects</span>
                             </div>
                             <div class="counter-label text-capitalize font-size-16">Funding</div>
                           </div>
                         </div>
                    </div> 
                    
                    <div class="col-lg-3 center-block">
                       <div class="card p-15 flex-row justify-content-between bg-grey-500">
                           <div class="white">
                             <i class="icon icon-circle icon-3x wb-pluse bg-grey-400" aria-hidden="true"></i>
                           </div>
                           <div class="counter counter-md counter counter-inverse  text-right">
                             <div class="counter-number-group">
                               <span class="counter-number"><?php echo $numdraft; ?></span>
                               <span class="counter-number-related text-capitalize">Projects</span>
                             </div>
                             <div class="counter-label text-capitalize font-size-16">Draft</div>
                           </div>
                         </div>
                    </div> 
                    
                    
                    
                </div>
                <div class="row" >
                    
                    <div class="col-lg-6 align-items-center">
                       <div class="row row-lg">		
                           <div class="col-lg-12">
                             <div class="example-wrap">
                                   <h4 class="example-title">Projects Funding State</h4>
                                   <div class="example" style="margin: 0;">

                                         <div id="barchart_material" style=" height: 300px;"></div>

                                   </div>
                             </div>
                           </div>
                       </div>
                   </div>
                    
                    <div class="col-lg-6 align-items-center">
                        <div class="row">
                            
                            <div class="col-lg-12 align-items-center">
                            <div class="row row-lg">		
                                <div class="col-lg-12">
                                  <div class="example-wrap">
                                        <h4 class="example-title" style="text-align: center">Investments in the last 30 days</h4>
                                        <div class="example" style="margin: 0;">

                                              <div id="chart_div4" style=" height: 150px;"></div>

                                        </div>
                                  </div>
                                </div>
                            </div>
                            </div>
                            
                            
                            
                        </div>
                        <div class="row" >
                            
                            
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <!-- Example Default -->
                                <div class="example-wrap m-lg-0">
                                  <div class="example">
                                    <div class="carousel slide" id="exampleCarouselDefault" data-ride="carousel">

                                        <div class="carousel-inner" role="listbox" id="project_list">

                                           <!--MY information-->

                                      </div>

                                    </div>
                                  </div>
                                </div>
                                <!-- End Example Default -->
                            </div>
                            <div class="col-lg-2 align-items-center"></div>
                            
                            
                        </div>
                        
                   </div>
                    
                   
                </div> 
               
            </div> 
        </div> 
    </div> 
</div> 




<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic3);

//console.log("<?php echo $line2; ?>");

function drawBasic3() {

     
      var data = google.visualization.arrayToDataTable([
         // ['Day', 'Invesments'],
        <?php echo $line2; ?>
         // ['Day','Rrenovation of buildings',],['2018-08-05',0,],['2018-08-06',0,],['2018-08-07',0,],['2018-08-08',0,],['2018-08-09',0,],['2018-08-10',0,],['2018-08-11',0,],['2018-08-12',0,],['2018-08-13',0,],['2018-08-14',0,],['2018-08-15',0,],['2018-08-16',0,],['2018-08-17',0,],['2018-08-18',0,],['2018-08-19',0,],['2018-08-20',0,],['2018-08-21',0,],['2018-08-22',0,],['2018-08-23',0,],['2018-08-24',0,],['2018-08-25',0,],['2018-08-26',0,],['2018-08-27',0,],['2018-08-28',0,],['2018-08-29',0,],['2018-08-30',0,],['2018-08-31',0,],['2018-09-01',0,],['2018-09-02',0,],['2018-09-03',0,],['2018-09-04',0,],
        ]);

      /*var options = {
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
      };*/
      
       var options = {
          title: 'Investment Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

   
      var chart4 = new google.visualization.LineChart(document.getElementById('chart_div4'));
      chart4.draw(data, options);
      
    }
</script>


 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

  //console.log("<?php echo $bargraph; ?>");

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
          bars: 'vertical', // Required for Material Bar Charts.
          colors: ['#0083A6','#0099C2'],
         // colors: ['#6B1365','#3442A7','#A20094','#0099C2'],
         // backgroundColor: '#F2F2F2',
        // bar: {groupWidth: "95%"},
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


<script type="text/javascript">
    window.onload = function () {
       $('#idDashboardCompany').addClass('active');     
       Listar();
       
       $('#exampleCarouselDefault').slick({
        infinite: true
       });
       
       
       
    };
    
    function Listar() {
        $.ajax({
            url: "<?php echo base_url('Company_Dashboard_Controller/get_carousel_data'); ?>",
            type: "POST",
            async:false,
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#project_list").empty();
                $("#project_list").append(resp.html);
                
            }
        });

    }
</script>