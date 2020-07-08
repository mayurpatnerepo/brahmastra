<?php $__env->startSection('content'); ?>

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
              <li><a href="<?php echo e(url('orders')); ?>">Orders</a></li>
			  <li class="active"><?php echo e($orderDetails->id); ?></li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Size</th>
                        <th>Product Color</th>
                        <th>Product Price</th>
                        <th>Product Qty</th>
                         
                    </tr>
                </thead>
                <tbody>
                	<?php $__currentLoopData = $orderDetails->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pro->product_code); ?></td>
                        <td><?php echo e($pro->product_name); ?></td>
                        <td><?php echo e($pro->product_size); ?></td>
                        <td><?php echo e($pro->product_color); ?></td>
                        <td><?php echo e($pro->product_price); ?></td>
                        <td><?php echo e($pro->product_qty); ?></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/orders/user_order_details.blade.php ENDPATH**/ ?>