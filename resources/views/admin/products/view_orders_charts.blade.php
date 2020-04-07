<?php




//$current_month1 = date('j',strtotime("-1 day"));
//$current_month = date('j');
//$last_month = date('j',strtotime("1 day"));
//$last_to_last_month = date('j',strtotime("2 day"));
//$last = date('j',strtotime("3 day"));





//$last_to_last_month9 = date('j',strtotime("10 day"));
//$last_to_last_month10 = date('j',strtotime("11 day"));
//$last_to_last_month = date('j',strtotime("2 day"));
 
?>

@extends('layouts.adminLayout.admin_design')
@section('content')

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Orders Reporting"
	},


  axisX:{
   
    crosshair: {
      enabled: true,
      snapToDataPoint: true
    }
  },
	 axisY: {
    title: "Number of Orders",
    maximum: 500
  },
	data: [{        
		type: "line",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "dailys order ",

		dataPoints: [      


			{ y: <?php echo $days_current_month_orders; ?>, label: 1 },
			{ y: <?php echo $days_current_month_orders; ?>,  label: 2 },
			{ y: <?php echo $days_current_month_orders; ?>,label: 3 },
      { y: <?php echo $days_current_month_orders; ?>,  label: 4},
      { y: <?php echo $days_current_month_orders; ?>,  label: 5},
      { y: <?php echo $days_current_month_orders; ?>,  label: 6},
      { y: <?php echo $days_current_month_orders; ?>,  label: 7},
      { y: <?php echo $days_current_month_orders; ?>,  label: 8},
      { y: <?php echo $days_current_month_orders; ?>,  label: 9},
      { y: <?php echo $days_current_month_orders; ?>,  label: 10},
      { y: <?php echo $days_current_month_orders; ?>,  label: 11},
      { y: <?php echo $days_current_month_orders; ?>,  label: 12},
      { y: <?php echo $days_current_month_orders; ?>,  label: 13},
      { y: <?php echo $days_current_month_orders; ?>,  label: 14},
      { y: <?php echo $days_current_month_orders; ?>,  label: 15},
      { y: <?php echo $days_current_month_orders; ?>,  label: 16},
      { y: <?php echo $days_current_month_orders; ?>,  label: 17},
      { y: <?php echo $days_current_month_orders; ?>,  label: 18},
      { y: <?php echo $days_current_month_orders; ?>,  label: 19},
      { y: <?php echo $days_current_month_orders; ?>,  label: 20},
      { y: <?php echo $days_current_month_orders; ?>,  label: 21},
      { y: <?php echo $days_current_month_orders; ?>,  label: 22},
      { y: <?php echo $days_current_month_orders; ?>,  label: 23},
      { y: <?php echo $days_current_month_orders; ?>,  label: 24},
      { y: <?php echo $days_current_month_orders; ?>,  label: 25},
      { y: <?php echo $days_current_month_orders; ?>,  label: 26},
      { y: <?php echo $days_current_month_orders; ?>,  label: 27},
      { y: <?php echo $days_current_month_orders; ?>,  label: 28},
      { y: <?php echo $days_current_month_orders; ?>,  label: 29},
      { y: <?php echo $days_current_month_orders; ?>,  label: 30},
      { y: <?php echo $days_current_month_orders; ?>,  label: 31}
     

     
		]
	}]
});
chart.render();

}
</script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
    <h1>Orders</h1>
    @if(Session::has('flash_message_error'))
      <div class="alert alert-error alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_error') !!}</strong>
      </div>
    @endif   
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Orders Reporting</h5>
          </div>
          <div class="widget-content nopadding">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection