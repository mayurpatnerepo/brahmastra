<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">



<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS Pages</a> <a href="#" class="current">Edit CMS Page</a> </div>
    <h1>CMS Pages</h1>
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
            <h5>Edit CMS Page</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo e(url('admin/edit-cms-page/'.$cmsPage->id)); ?>" name="add_cms_page" id="add_cms_page" novalidate="novalidate"><?php echo e(csrf_field()); ?>

              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" name="title" id="title" value="<?php echo e($cmsPage->title); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">CMS Page URL</label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="<?php echo e($cmsPage->url); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description"><?php echo e($cmsPage->description); ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Meta Title</label>
                <div class="controls">
                  <input type="text" name="meta_title" id="meta_title" value="<?php echo e($cmsPage->meta_title); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Meta Description</label>
                <div class="controls">
                  <input type="text" name="meta_description" id="meta_description" value="<?php echo e($cmsPage->meta_description); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Meta Keywords</label>
                <div class="controls">
                  <input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo e($cmsPage->meta_keywords); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" <?php if($cmsPage->status=="1"): ?> checked <?php endif; ?> value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit CMS Page" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/pages/edit_cms_page.blade.php ENDPATH**/ ?>