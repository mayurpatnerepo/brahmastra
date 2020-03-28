<?php $__env->startSection('content'); ?>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Shipping</a> <a href="#" class="current">Edit Shipping</a> </div>
    <h1>Shipping Charges</h1>
    <?php if(Session::has('flash_message_error')): ?>
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong><?php echo session('flash_message_error'); ?></strong>
        </div>
    <?php endif; ?>   
     <script>
            <?php if(session('success')): ?>
              swal("Good job!", "Shipping Charges updated Successfully!", "success")
            <?php endif; ?>
      </script>   
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Shipping Charges</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="<?php echo e(url('admin/edit-shipping/'.$shippingDetails->id)); ?>" name="edit_shipping" id="edit_shipping" novalidate="novalidate"><?php echo e(csrf_field()); ?>

              <input type="hidden" name="id" value="<?php echo e($shippingDetails->id); ?>">
              <div class="control-group">
                <label class="control-label">Country</label>
                <div class="controls">
                  <input readonly="" type="text" value="<?php echo e($shippingDetails->country); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" style="font-size: 13px; width: 200px;">Shipping Charges (0-500g)&nbsp;</label>
                <div class="controls">
                  <input type="text" name="shipping_charges0_500g" id="shipping_charges0_500g"  value="<?php echo e($shippingDetails->shipping_charges0_500g); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" style="font-size: 13px; width: 200px;">Shipping Charges (501g-1000g)&nbsp;</label>
                <div class="controls">
                  <input type="text" name="shipping_charges501_1000g" id="shipping_charges501_1000g"  value="<?php echo e($shippingDetails->shipping_charges501_1000g); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" style="font-size: 13px; width: 200px;">Shipping Charges (1001g-2000g)&nbsp;</label>
                <div class="controls">
                  <input type="text" name="shipping_charges1001_2000g" id="shipping_charges1001_2000g"  value="<?php echo e($shippingDetails->shipping_charges1001_2000g); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" style="font-size: 13px; width: 200px;">Shipping Charges (2001g-5000g)&nbsp;</label>
                <div class="controls">
                  <input type="text" name="shipping_charges2001_5000g" id="shipping_charges2001_5000g"  value="<?php echo e($shippingDetails->shipping_charges2001_5000g); ?>">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Shipping" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/shipping/edit_shipping.blade.php ENDPATH**/ ?>