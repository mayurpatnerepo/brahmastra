<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Registered Users Countries Count"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		//yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php echo $getUserCountries[0]['count']; ?>, label: "<?php echo $getUserCountries[0]['country']; ?>"},
			{y: <?php echo $getUserCountries[1]['count']; ?>, label: "<?php echo $getUserCountries[1]['country']; ?>"},
			{y: <?php echo $getUserCountries[2]['count']; ?>, label: "<?php echo $getUserCountries[2]['country']; ?>"}
		]
	}]
});
chart.render();

}
</script>


<?php $__env->startSection('content'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users</a> <a href="#" class="current">View Users</a> </div>
    <h1>Users</h1>
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
            <h5>Users Countries Reporting</h5>
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
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/users/view_users_countries_charts.blade.php ENDPATH**/ ?>