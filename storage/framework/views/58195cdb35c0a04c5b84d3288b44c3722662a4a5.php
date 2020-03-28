<?php $__env->startSection('content'); ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
       
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Settings</a> </div>
    <h1>Admin Settings</h1>
   <script>
            <?php if(session('error')): ?>
              swal('Oh no…', 'Current Password entered is incorrect!', 'error')
            <?php endif; ?>
      </script>

          <script>
            <?php if(session('success')): ?>
              swal("Good job!", "Password updated successfully!", "success")
            <?php endif; ?>
         </script>   
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Update Password</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="<?php echo e(url('/admin/update-pwd')); ?>" name="password_validate" id="password_validate" novalidate="novalidate"><?php echo e(csrf_field()); ?>

                <div class="control-group">
                  <label class="control-label">Username</label>
                  <div class="controls">
                    <input type="text" value="<?php echo e($adminDetails->username); ?>" readonly="" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Current Password</label>
                  <div class="controls">
                    <input type="password" name="current_pwd" id="current_pwd" />
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">New Password</label>
                  <div class="controls">
                    <input type="password" name="new_pwd" id="new_pwd" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Confirm Password</label>
                  <div class="controls">
                    <input type="password" name="confirm_pwd" id="confirm_pwd" />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Update Password" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/settings.blade.php ENDPATH**/ ?>