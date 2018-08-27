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

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
                
<div class="row row-lg">
		<div class="col-lg-12">
		 
		  <div class="example-wrap m-md-0">
			<h4 class="example-title">Return on investment in the last 30 days.</h4>
			<!-- <p>Use function: <code>Morris.Line(options)</code> to generate chart.</p -->
			<div class="example" style="margin: 0;">
                          
                           <div id="chart_div1" style="width: 100%; height: 500px;"></div>
                           
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
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

     
      var data = google.visualization.arrayToDataTable([
          ['Days', 'Investors', 'Companys'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540],
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
          title: 'Return',
          gridlines: { count: 10 },
        }
      };

      var chart3 = new google.visualization.LineChart(document.getElementById('chart_div1'));
      chart3.draw(data, options);
    
    }
</script>






<script type="text/javascript">
    window.onload = function () {
       $('#idDashboardInvestor').addClass('active');       
    };
</script>