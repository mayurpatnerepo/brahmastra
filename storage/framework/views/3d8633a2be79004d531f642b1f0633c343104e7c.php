<?php $__env->startSection('content'); ?>

<?php 

use App\Category;
use App\Order; 
use App\User;
use App\Product;
use App\Enquiry;
use Carbon\Carbon;


 ?>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo e(url('admin/dashboard')); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
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
<!--End-breadcrumbs-->

<!--Action boxes-->
<?php  
  $levels = Category::where(['parent_id'=>0])->get();
  $wordCount = count($levels); 
  
  $order = Order::where(['order_status'=>'New'])->get();
  $ord = count($order);

  $user = User::where(['status'=>1])->get();
  $use = count($user);

$Product = Product::where(['status'=>1])->get();
 $pro = count($Product);

 $enquiries = Enquiry::orderBy('id','Desc')->get();
 $enq = count($enquiries);

?>
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="<?php echo e(url('admin/dashboard')); ?>"> <i class="icon-dashboard"></i> <span class="label label-important"></span> My Dashboard </a> </li>
        <!-- <li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li> -->
        <?php if(Session::get('adminDetails')['categories_view_access']==1): ?>
        <li class="bg_ly"> <a href="<?php echo e(url('admin/view-categories')); ?>"> <i class="icon-inbox"></i><span class="label label-success"><?php echo e($wordCount); ?></span> Categories </a> </li>
        <?php endif; ?>
        <?php if(Session::get('adminDetails')['products_access']==1): ?>
        <li class="bg_lo"> <a href="<?php echo e(url('admin/view-products')); ?>"> <i class="icon-inbox"></i><span class="label label-success"><?php echo e($pro); ?></span> Products </a> </li>
        <?php endif; ?>
        <?php if(Session::get('adminDetails')['orders_access']==1): ?>
        <li class="bg_lb"> <a href="<?php echo e(url('admin/view-orders')); ?>"> <i class="icon-inbox"></i><span class="label label-success"><?php echo e($ord); ?></span> Orders </a> </li>
        <?php endif; ?>
        <?php if(Session::get('adminDetails')['users_access']==1): ?>
        <li class="bg_lr"> <a href="<?php echo e(url('admin/view-users')); ?>"> <i class="icon-inbox"></i><span class="label label-success"><?php echo e($use); ?></span> Users </a> </li>
        <?php endif; ?>

        <?php if(Session::get('adminDetails')['users_access']==1): ?>
        <li class="bg_lr"> <a href="<?php echo e(url('admin/view-enquiries')); ?>"> <i class="icon-inbox"></i><span class="label label-success"><?php echo e($enq); ?></span>Enquiries</a> </li>
        <?php endif; ?>
        <!-- <li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>
        <li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>
        <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li> -->

      </ul>
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
       <div class="widget-content" >
          <div class="row-fluid">
            <div class="span12">
              <div class="chart">
                
            <?php
             //$dueToday = Carbon::today();

              
           //  echo "<pre>"; print_r($dueToday);
             $days_current_month_orders = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDate('created_at',Carbon::today())->orderBy('id', 'DESC')->count();
             //echo "<pre>"; print_r($days_current_month_orders);

            $current_month_orders = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();

            //echo "<pre>"; print_r($current_month_orders);

        $last_month_orders = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->count();

        $last_to_last_month_orders = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->count();


$days=date('D');
//$day1=date('D',strtotime("1 day"));

$current_month = date('M');
$last_month = date('M',strtotime("-1 month"));
$last_to_last_month = date('M',strtotime("-2 month"));
 
?>



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
     { y: <?php echo $days_current_month_orders; ?>, label: "<?php echo $days; ?>" },  
      
      { y: <?php echo $current_month_orders; ?>, label: "<?php echo $current_month; ?>" },
      { y: <?php echo $last_month_orders; ?>,  label: "<?php echo $last_month; ?>" },
      { y: <?php echo $last_to_last_month_orders; ?>,  label: "<?php echo $last_to_last_month; ?>" }
    ]
  }]
});
chart.render();

}
</script>

    
        <div class="widget-box">
          <div class="widget-content nopadding">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
      
    
  



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
            </div>
          </div>
        </div>
      </div>
 </div>

</hr>



    
<!--End-Chart-box--> 
    
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Latest Product</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo e(asset('images/backend_images/demo/av1.jpg')); ?>"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo e(asset('images/backend_images/demo/av2.jpg')); ?>"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo e(asset('images/backend_images/demo/av4.jpg')); ?>"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                </div>
              <li>
                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div>
        </div>
        
      </div>



    </div>



  </div>
</div>

<!--end-main-container-part-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>