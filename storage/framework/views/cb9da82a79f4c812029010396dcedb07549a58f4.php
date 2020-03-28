<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
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
    <script>
           <?php if(session('success')): ?>
            swal("<?php echo e(session('success')); ?>");
           <?php endif; ?>
       </script>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Orders</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <th>Order Status</th>
                  <th>Payment Method</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($order->id); ?></td>
                  <td class="center"><?php echo e($order->created_at); ?></td>
                  <td class="center"><?php echo e($order->name); ?></td>
                  <td class="center"><?php echo e($order->user_email); ?></td>
                  <td class="center">
                    <?php $__currentLoopData = $order->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($pro->product_code); ?>

                    (<?php echo e($pro->product_qty); ?>)
                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td class="center"><?php echo e($order->grand_total); ?></td>
                  <td class="center"><?php echo e($order->order_status); ?></td>
                  <td class="center"><?php echo e($order->payment_method); ?></td>
                  <td class="center">
                    <a target="_blank" href="<?php echo e(url('admin/view-order/'.$order->id)); ?>" class="btn btn-success btn-mini">View Order Details</a><br><br> 
                    <?php if($order->order_status == "Shipped" || $order->order_status == "Delivered" || $order->order_status == "Paid"): ?> 
                      <a target="_blank" href="<?php echo e(url('admin/view-order-invoice/'.$order->id)); ?>" class="btn btn-warning btn-mini">View Order Invoice</a><br><br> 
                      <a target="_blank" href="<?php echo e(url('admin/view-pdf-invoice/'.$order->id)); ?>" class="btn btn-primary btn-mini">View PDF Invoice</a>
                    <?php endif; ?> 
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/orders/view_orders.blade.php ENDPATH**/ ?>