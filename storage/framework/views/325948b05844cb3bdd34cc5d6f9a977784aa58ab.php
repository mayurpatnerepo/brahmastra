<?php $__env->startSection('content'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo e(url('admin/dashboard')); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">View Categories</a> </div>
    <h1>Categories</h1>
    <?php if(Session::has('flash_message_error')): ?>
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong><?php echo session('flash_message_error'); ?></strong>
            </div>
        <?php endif; ?>   
        <?php if(Session::has('flash_message_success')): ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong><?php echo session('flash_message_success'); ?></strong>
            </div>
        <?php endif; ?>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Level</th>
                  <th>Category URL</th>
                  <th>Image</th>
                  <th>Image1</th>
                   <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($category->id); ?></td>
                  <td class="center"><?php echo e($category->name); ?></td>
                  <td class="center"><?php echo e($category->parent_id); ?></td>
                  <td class="center"><?php echo e($category->url); ?></td>
                   <td class="center">
                    <?php if(!empty($category->image)): ?>
                    <img src="<?php echo e(asset('/images/backend_images/product/small/'.$category->image)); ?>" style="width:50px;">
                    <?php endif; ?>
                  </td>
                   <td class="center">
                    <?php if(!empty($category->image1)): ?>
                    <img src="<?php echo e(asset('/images/backend_images/product/small/'.$category->image1)); ?>" style="width:50px;">
                    <?php endif; ?>
                  </td>
                    <td class="center">
                    <?php if($category->status==1): ?>
                      <span style="color:green">Active</span>
                    <?php else: ?>
                      <span style="color:red">Inactive</span>
                    <?php endif; ?>
                  </td>
                   <td class="center">
                    <?php if(Session::get('adminDetails')['categories_edit_access']==1): ?>
                    <a href="<?php echo e(url('/admin/edit-category/'.$category->id)); ?>" class="btn btn-primary btn-mini" style="border-radius: 10px;">Edit</a> 
                    <?php endif; ?>
                    <?php if(Session::get('adminDetails')['categories_full_access']==1): ?>
                    <a <?php /* id="delCat" href="{{ url('/admin/delete-category/'.$category->id) }}" */ ?> rel="<?php echo e($category->id); ?>" rel1="delete-category" href="javascript:" class="btn btn-danger btn-mini deleteRecord" style="border-radius: 10px;">Delete</a></td>
                    <?php endif; ?>
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
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/categories/view_categories.blade.php ENDPATH**/ ?>