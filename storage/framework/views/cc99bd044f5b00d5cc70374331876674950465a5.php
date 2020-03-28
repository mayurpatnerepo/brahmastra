<?php $__env->startSection('content'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Currencies</a> <a href="#" class="current">View Currencies</a> </div>
    <h1>Currencies</h1>
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
            <h5>Currencies</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="text-align: left;">ID</th>
                  <th style="text-align: left;">Currency Code</th>
                  <th style="text-align: left;">Exchange Rate</th>
                   <th style="text-align: left;">Status</th>
                  <th style="text-align: left;">Updated at</th>
                  <th style="text-align: left;">Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($currency->id); ?></td>
                  <td class="center"><?php echo e($currency->currency_code); ?></td>
                  <td class="center"><?php echo e($currency->exchange_rate); ?></td>
                   <td class="center">
                    <?php if($currency->status==1): ?>
                      <span style="color:green">Active</span>
                    <?php else: ?>
                      <span style="color:red">Inactive</span>
                    <?php endif; ?>
                  </td>
                  <td class="center"><?php echo e($currency->updated_at); ?></td>
                  <td class="center">
                    <a href="<?php echo e(url('/admin/edit-currency/'.$currency->id)); ?>" class="btn btn-primary btn-mini">Edit</a> 
                    <a href="<?php echo e(url('/admin/delete-currency/'.$currency->id)); ?>" class="btn btn-primary btn-mini">Delete</a></td>
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
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/currencies/view_currencies.blade.php ENDPATH**/ ?>