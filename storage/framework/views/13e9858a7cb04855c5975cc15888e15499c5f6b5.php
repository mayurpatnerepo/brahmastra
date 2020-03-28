<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Banners</a> <a href="#" class="current">View Banners</a> </div>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Banners</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Banner ID</th>
                  <th>Title</th>
                  <th>Link</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($banner->id); ?></td>
                  <td class="center"><?php echo e($banner->title); ?></td>
                  <td class="center"><?php echo e($banner->link); ?></td>
                  <td class="center">
                    <?php if(!empty($banner->image)): ?>
                    <img src="<?php echo e(asset('/images/frontend_images/banners/'.$banner->image)); ?>" style="width:250px;">
                    <?php endif; ?>
                  </td>
                  <td class="center">
                    <?php if($banner->status==1): ?>
                      <span style="color:green">Active</span>
                    <?php else: ?>
                      <span style="color:red">Inactive</span>
                    <?php endif; ?>
                  </td>
                  <td class="center">
                    <a href="<?php echo e(url('/admin/edit-banner/'.$banner->id)); ?>" class="btn btn-primary btn-mini">Edit</a> 
                    <a id="delBanner" rel="<?php echo e($banner->id); ?>" rel1="delete-banner" href="javascript:" <?php /* href="{{ url('/admin/delete-banner/'.$banner->id) }}" */ ?> class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/banners/view_banners.blade.php ENDPATH**/ ?>