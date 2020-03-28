<?php $__env->startSection('content'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Enquiries</a> <a href="#" class="current">View Enquiries</a> </div>
    <h1>Enquiries</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Enquiries</h5>
          </div>
          <div class="widget-content nopadding">
            <div id="app">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr v-for="enquiry in filteredEnquiries">
                    <td><?php echo e($enquiry->name); ?></td>
                    <td><?php echo e($enquiry->email); ?></td>
                    <td><?php echo e($enquiry->subject); ?></td>
                    <td><?php echo e($enquiry->message); ?></td>
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
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/admin/enquiries/view_enquiries.blade.php ENDPATH**/ ?>