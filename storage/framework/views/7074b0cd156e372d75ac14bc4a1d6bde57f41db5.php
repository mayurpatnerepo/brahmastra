<?php $__env->startSection('content'); ?>


     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Admins / Sub-Admins</a> <a href="#" class="current">Add Admin / Sub-Admin</a> </div>
    <h1>Admins / Sub-Admins</h1>
    <script>
       <?php if(session('error')): ?>
            swal("<?php echo e(session('error')); ?>");
        <?php endif; ?>
    </script>

         <script>
            <?php if(session('success')): ?>
            swal("<?php echo e(session('success')); ?>");
            <?php endif; ?>
        </script>  
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Admin / Sub-Admin</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="<?php echo e(url('admin/add-admin')); ?>" name="add_admin" id="add_admin" novalidate="novalidate"><?php echo e(csrf_field()); ?>

              <div class="control-group">
                <label class="control-label">Type</label>
                <div class="controls">
                  <select name="type" id="type" style="width: 220px;">
                    <option value="Admin">Admin</option>
                    <option value="Sub Admin">Sub Admin</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input type="text" name="username" id="username" required="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="password" required="">
                </div>
              </div>   
              <div class="control-group" id="access">
                <label class="control-label">Access</label>
                <div class="controls">
                  <input type="checkbox" name="categories_view_access" id="categories_view_access" value="1" style="margin-top: -3px;">&nbsp;View Categories Only&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="categories_edit_access" id="categories_edit_access" value="1" style="margin-top: -3px;">&nbsp;View and Edit Categories&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="categories_full_access" id="categories_full_access" value="1" style="margin-top: -3px;">&nbsp;View, Edit and Delete Categories&nbsp;&nbsp;&nbsp;<br>
                  <input type="checkbox" name="products_access" id="products_access" value="1" style="margin-top: -3px;">&nbsp;Products&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="orders_access" id="orders_access" value="1" style="margin-top: -3px;">&nbsp;Orders&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="users_access" id="users_access" value="1" style="margin-top: -3px;">&nbsp;Users
                </div>
              </div>           
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Admin" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/admins/add_admin.blade.php ENDPATH**/ ?>