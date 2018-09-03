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
                            <div class="card p-15 flex-row justify-content-between bg-green-700">
                                <div class="white">
                                    <i class="icon icon-circle icon-3x wb-graph-up bg-green-500" aria-hidden="true"></i>
                                </div>
                                <div class="counter counter-md counter counter-inverse  text-right">                                    
                                    <div class="counter-number-group">
                                        <span class="counter-number"><?php echo $curr_symbol . ' ' . $earnings_balance; ?></span>
                                        <span class="counter-sm -number-related text-capitalize"></span>
                                    </div>
                                    <div class="counter-label text-capitalize font-size-16">Total Earnings</div>
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
                                    <div class="counter-label text-capitalize font-size-16">Filling the Tank</div>
                                </div>
                            </div>            
                            <!-- End Card -->
                        </div>           
                    </div>      

                    <div class="col-md-3" >
                        <div style="cursor: pointer;" onclick="window.location = 'investor_depositfunds/2';">            
                            <!-- Card -->
                            <div class="card p-15 flex-row justify-content-between bg-red-600">
                                <div class="white">
                                    <i class="icon icon-circle icon-3x wb-graph-up bg-red-400" aria-hidden="true"></i>
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

                    <div class="col-md-3" >
                        <div style="cursor: pointer;" onclick="window.location = 'investor_depositfunds/2';">            
                            <!-- Card -->
                            <div class="card p-15 flex-row justify-content-between bg-grey-500">
                                <div class="white">
                                    <i class="icon icon-circle icon-3x wb-graph-up bg-grey-400" aria-hidden="true"></i>
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

                </div>


                <div class="row row-md"> 
                    <div class="col-md-6 align-items-center border-default">
                        <!-- Card -->
                        <div class="card p-30 flex-row justify-content-between border">
                            <div class="white">
                                <i class="icon icon-circle icon-2x wb-clipboard bg-blue-grey-300" aria-hidden="true"></i>
                            </div>
                            <div class="counter counter-md counter text-right">
                                <div class="counter-number-group">
                                    <span class="counter-number"><?php echo $driving_projects; ?></span>
                                    <span class="counter-number-related text-capitalize">Projects</span>
                                </div>
                                <div class="counter-label text-capitalize font-size-16">Driving</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>         

                    <div class="col-md-6 align-items-center border-default">
                        <!-- Card -->
                        <div class="card p-30 flex-row justify-content-between border">
                            <div class="white">
                                <i class="icon icon-circle icon-2x wb-clipboard bg-blue-grey-300" aria-hidden="true"></i>
                            </div>
                            <div class="counter counter-md counter text-right">
                                <div class="counter-number-group">
                                    <span class="counter-number"><?php echo $parked_projects; ?></span>
                                    <span class="counter-number-related text-capitalize">projects</span>
                                </div>
                                <div class="counter-label text-capitalize font-size-16">Parked</div>
                            </div>
                        </div>            
                        <!-- End Card --> 
                    </div>    
                </div>                

                
                <br>
                <br>                                   
                <div class="row row-lg">
                    <div class="col-lg-12">

                        <div class="example-wrap m-md-0">
                            <h4 class="example-title">My Investments in the last 30 days</h4>
                            <!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
                            <div class="example" style="margin: 0;">

                                <div id="chart_div2" style="width: 100%; height: 500px;"></div>

                            </div>
                        </div>              
                    </div>
                </div>                          




            </div> 
        </div> 
    </div> 
</div> 




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
            legend: {position: 'bottom'},
            hAxis: {
                title: 'Day',
                //gridlines: { count: 5 },

            },
            vAxis: {
                title: 'Invest',
                gridlines: {count: 10},
            }
        };


        var chart4 = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart4.draw(data, options);
    }
</script>


<script type="text/javascript">
    window.onload = function () {
        $('#idDashboardInvestor').addClass('active');
    };

</script>