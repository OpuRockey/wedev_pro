
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>
<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">Dashboard</h1>
		<div><h1>
			<?php
				if($core->is_loggedIn()){
					echo 'Hello ' . $_SESSION['name'] ;
				}
			?></h1>
		</div>
		<div>
			<!-- HTML -->
		<div id="chartdiv"></div>
			<!-- Styles -->
		<style>
		#chartdiv {
		  width: 100%;
		  height: 500px;
		}
		</style>
		<?php

		$totalUserCount = $core->userCount();
		$employee = $totalUserCount['totalEmpl'] ;
		$userno = $totalUserCount['totalUser'] ;
		?>
		<!-- Resources -->
		<script src="https://www.amcharts.com/lib/4/core.js"></script>
		<script src="https://www.amcharts.com/lib/4/charts.js"></script>
		<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

		<!-- Chart code -->
		<script>
		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		// Create chart instance
		var chart = am4core.create("chartdiv", am4charts.PieChart);

		// Add data
		chart.data = [ {
		  "country": "Employee",
		  "litres": <?= $employee ;?>
		}, {
		  "country": "User",
		  "litres": <?= $userno ;?>
		}];

		// Add and configure Series
		var pieSeries = chart.series.push(new am4charts.PieSeries());
		pieSeries.dataFields.value = "litres";
		pieSeries.dataFields.category = "country";
		pieSeries.slices.template.stroke = am4core.color("#fff");
		pieSeries.slices.template.strokeWidth = 2;
		pieSeries.slices.template.strokeOpacity = 1;

		// This creates initial animation
		pieSeries.hiddenState.properties.opacity = 1;
		pieSeries.hiddenState.properties.endAngle = -90;
		pieSeries.hiddenState.properties.startAngle = -90;
		</script>


		</div>



		</div>
	</div>
</div>
<?php include('footer.php'); ?>




