<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Banners</a> <a href="#" class="current">Add Banner</a> </div>
    <h1>Banners</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Banner</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo e(url('admin/add-banner')); ?>" name="add_banner" id="add_banner" novalidate="novalidate"><?php echo e(csrf_field()); ?>

              <div class="control-group">
                <label class="control-label">Banner Image</label>
                <div class="controls">
                  <div class="uploader" id="uniform-undefined"><input name="image" id="image" type="file" size="19" style="opacity: 0;"><span class="filename">No file selected</span><span class="action">Choose File</span></div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" name="title" id="title">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Link</label>
                <div class="controls">
                  <input type="text" name="link" id="link">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Banner" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/banners/add_banner.blade.php ENDPATH**/ ?>