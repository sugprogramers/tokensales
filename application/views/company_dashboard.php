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
                
                
                          
    
       
<div class="row row-lg">
		<div class="col-lg-12">
		 
		  <div class="example-wrap m-md-0">
			<h4 class="example-title">Investments in the last 30 days</h4>
			<!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
			<div class="example" style="margin: 0;">
                          
                           <div id="chart_div2" style="width: 100%; height: 500px;"></div>
                           
			</div>
		  </div>              
		</div>
</div>                          
                
             
          
                
            
<div class="row row-lg">
		<div class="col-lg-12">
		 
		  <div class="example-wrap m-md-0">
			<h4 class="example-title">Status Projects</h4>
			<!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
			<div class="example" style="margin: 0;">
                            
			  <div id="piechart1" style="width: 100%; height: 400px;"></div>
                          
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
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data, options);
        
     
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
        }
      };

    
      var chart4 = new google.visualization.LineChart(document.getElementById('chart_div2'));
      chart4.draw(data, options);
    }
</script>


<script type="text/javascript">
    window.onload = function () {
       $('#idDashboardCompany').addClass('active');       
    };
</script>