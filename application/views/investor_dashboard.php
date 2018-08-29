<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Dashboard Investor</h1>
        <div class="page-header-actions">
           <!-- <ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-clipboard" href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                <li class="breadcrumb-item active">Headers</li>
            </ol> -->
        </div>
    </div>
    
    <div class="row row-lg" style="padding: 0px 30px;"> 
    <div class="col-lg-6" >
          <!-- Card -->
          <div class="card card-block p-30 bg-green-600">
            <div class="card-watermark darker font-size-80 m-15"><i class="icon fa-money" aria-hidden="true"></i></div>
            <div class="counter counter-md counter-inverse text-left">
              <div class="counter-number-group">
                <span class="counter-number">$25.000</span>
                <span class="counter-number-related text-capitalize"></span>
              </div>
              <div class="counter-label text-capitalize">this is your current balance.</div>
            </div>
          </div>
          <!-- End Card -->
     </div>
    
     <div class="col-lg-6" >
          <!-- Card -->
          <div class="card card-block p-30 bg-blue-600">
            <div class="card-watermark darker font-size-80 m-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
            <div class="counter counter-md counter-inverse text-left">
              <div class="counter-number-group">
                <span class="counter-number">25</span>
                <span class="counter-number-related text-capitalize">projects</span>
              </div>
              <div class="counter-label text-capitalize">they are active</div>
            </div>
          </div>
          <!-- End Card -->
        </div>
    </div>
        
        
    <div class="page-content container-fluid"  style="padding-top: 0px;">
        <div class="panel">
            <div class="panel-body">
                
       
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
           legend: { position: 'bottom' },
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







<script type="text/javascript">
    window.onload = function () {
       $('#idDashboardInvestor').addClass('active');       
    };
</script>