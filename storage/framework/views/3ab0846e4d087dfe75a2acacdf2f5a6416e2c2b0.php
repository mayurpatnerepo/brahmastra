<?php

$current_month = date('M');
$last_month = date('M',strtotime("-1 month"));
$last_to_last_month = date('M',strtotime("-2 month"));
 
?>


<?php $__env->startSection('content'); ?>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Orders Reporting"
	},
	axisY: {
		title: "Number of Orders"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Last 3 Months",
		dataPoints: [      
			{ y: <?php echo $current_month_orders; ?>, label: "<?php echo $current_month; ?>" },
			{ y: <?php echo $last_month_orders; ?>,  label: "<?php echo $last_month; ?>" },
			{ y: <?php echo $last_to_last_month_orders; ?>,  label: "<?php echo $last_to_last_month; ?>" }
		]
	}]
});
chart.render();

}
</script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
    <h1>Orders</h1>
    <?php if(Session::has('flash_message_error')): ?>
      <div class="alert alert-error alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><?php echo session('flash_message_error'); ?></strong>
      </div>
    <?php endif; ?>   
    <?php if(Session::has('flash_message_success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong><?php echo session('flash_message_success'); ?></strong>
        </div>
    <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/products/view_orders_charts.blade.php ENDPATH**/ ?>