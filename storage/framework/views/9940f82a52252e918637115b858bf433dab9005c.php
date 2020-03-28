<?php $__env->startSection('content'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS Pages</a> <a href="#" class="current">View CMS Pages</a> </div>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>CMS Pages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Page ID</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>Status</th>
                  <th>Created on</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php $__currentLoopData = $cmsPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="gradeX">
                  <td class="center"><?php echo e($page->id); ?></td>
                  <td class="center"><?php echo e($page->title); ?></td>
                  <td class="center"><?php echo e($page->url); ?></td>
                  <td class="center"><?php if($page->status==1): ?> Active <?php else: ?> Inactive <?php endif; ?></td>
                  <td class="center"><?php echo e($page->created_at); ?></td>
                  <td class="center">
                    <a href="#myModal<?php echo e($page->id); ?>" data-toggle="modal" class="btn btn-success btn-mini">View</a> 
                    <a href="<?php echo e(url('/admin/edit-cms-page/'.$page->id)); ?>" class="btn btn-primary btn-mini">Edit</a> 
                    <a href="<?php echo e(url('/admin/delete-cms-page/'.$page->id)); ?>" class="btn btn-danger btn-mini">Delete</a>
                        <div id="myModal<?php echo e($page->id); ?>" class="modal hide">
                          <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3><?php echo e($page->title); ?> Page Details</h3>
                          </div>
                          <div class="modal-body">
                            <p><strong>Title:</strong> <?php echo e($page->title); ?></p>
                            <p><strong>URL:</strong> <?php echo e($page->url); ?></p>
                            <p><strong>Status:</strong> <?php if($page->status==1): ?> Active <?php else: ?> Inactive <?php endif; ?></p>
                            <p><strong>Created on:</strong> <?php echo e($page->created_at); ?></p>
                            <p><strong>Description:</strong> <?php echo e($page->description); ?></p>
                          </div>
                        </div>

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
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/pages/view_cms_pages.blade.php ENDPATH**/ ?>