<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo e(url('admin/dashboard')); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Attributes</a> </div>
    <h1>Products</h1>
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
            <h5>Add Images</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo e(url('admin/add-images/'.$productDetails->id)); ?>" name="add_product" id="add_product" novalidate="novalidate"><?php echo e(csrf_field()); ?>

              <input type="hidden" name="product_id" value="<?php echo e($productDetails->id); ?>">
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <label class="control-label"><?php echo e($category_name); ?></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label"><?php echo e($productDetails->product_name); ?></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"><?php echo e($productDetails->product_code); ?></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Alt Image(s)</label>
                <div class="controls">
                  <div class="uploader" id="uniform-undefined"><input name="image[]" id="image" type="file" multiple="multiple"></div>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Images" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Images</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image ID</th>
                  <th>Product ID</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($image->id); ?></td>
                  <td class="center"><?php echo e($image->product_id); ?></td>
                  <td class="center"><img width=130px src="<?php echo e(asset('images/backend_images/product/small/'.$image->image)); ?>"></td>
                  <td class="center"><a id="delImage" rel="<?php echo e($image->id); ?>" rel1="delete-alt-image" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>

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


<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/products/add_images.blade.php ENDPATH**/ ?>