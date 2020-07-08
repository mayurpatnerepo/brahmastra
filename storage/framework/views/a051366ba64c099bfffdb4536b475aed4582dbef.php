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
            <h5>Add Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo e(url('admin/add-attributes/'.$productDetails->id)); ?>" name="add_product" id="add_product" novalidate="novalidate"><?php echo e(csrf_field()); ?>

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
                <label class="control-label">Product Color</label>
                <label class="control-label"><?php echo e($productDetails->product_color); ?></label>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls field_wrapper">
                  <input required title="Required" type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;">
                  <input required title="Required" type="text" name="size[]" id="size" placeholder="Size" style="width:120px;">
                  <input required title="Required" type="text" name="price[]" id="price" placeholder="Price" style="width:120px;"> 
                  <input required title="Required" type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;">
                  <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
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
            <h5>Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo e(url('admin/edit-attributes/'.$productDetails->id)); ?>" method="post"><?php echo e(csrf_field()); ?>

              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Attribute ID</th>
                    <th>SKU</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php /*echo "<pre>"; print_r($productDetails->attributes); die;*/ ?>
                  <?php $__currentLoopData = $productDetails->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="gradeX">
                    <td class="center"><input type="hidden" name="idAttr[]" value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->id); ?></td>
                    <td class="center"><?php echo e($attribute->sku); ?></td>
                    <td class="center"><?php echo e($attribute->size); ?></td>
                    <td class="center"><input name="price[]" type="text" value="<?php echo e($attribute->price); ?>" /></td>
                    <td class="center"><input name="stock[]" type="text" value="<?php echo e($attribute->stock); ?>" required /></td> 
                    <td class="center">
                      <input type="submit" value="Update" class="btn btn-primary btn-mini" />
                      <?php /* <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a> */ ?>
                      <a href="<?php echo e(url('admin/delete-attribute/'.$attribute->id)); ?>" class="btn btn-danger btn-mini">Delete</a>
                    </td>

                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/products/add_attributes.blade.php ENDPATH**/ ?>