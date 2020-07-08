<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">



<?php use App\Product; ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				 <script>
             <?php if(session('success')): ?>
           swal("<?php echo e(session('success')); ?>");
         <?php endif; ?>
     </script>
         <script>
           <?php if(session('error')): ?>
           swal("<?php echo e(session('error')); ?>");
         <?php endif; ?>

     </script>  
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						<?php $__currentLoopData = $userCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="cart_product">
									<a href=""><img style="width:100px;" src="<?php echo e(asset('/images/backend_images/product/small/'.$cart->image)); ?>" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo e($cart->product_name); ?></a></h4>
									<p>Product Code: <?php echo e($cart->product_code); ?></p>
								</td>
								<td class="cart_price">
									<p>INR <?php echo e($cart->price); ?></p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href="<?php echo e(url('/cart/update-quantity/'.$cart->id.'/1')); ?>"> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo e($cart->quantity); ?>" autocomplete="off" size="2">
										<?php if($cart->quantity>1): ?>
											<a class="cart_quantity_down" href="<?php echo e(url('/cart/update-quantity/'.$cart->id.'/-1')); ?>"> - </a>
										<?php endif; ?>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">INR <?php echo e($cart->price*$cart->quantity); ?></p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="<?php echo e(url('/cart/delete-product/'.$cart->id)); ?>"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</tbody>
				</table>
			</div>
		</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a coupon code you want to use.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<form action="<?php echo e(url('cart/apply-coupon')); ?>" method="post"><?php echo e(csrf_field()); ?>

								<label>Coupon Code</label>
								<input type="text" name="coupon_code">
								<input type="submit" value="Apply" class="btn btn-default">
							</form>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<?php if(!empty(Session::get('CouponAmount'))): ?>
							<li>Sub Total <span>INR <?php echo $total_amount; ?></span></li>
							<li>Coupon Discount <span>INR <?php echo Session::get('CouponAmount'); ?></span></li>
							<?php 
							$total_amount = $total_amount - Session::get('CouponAmount');
							$getCurrencyRates = Product::getCurrencyRates($total_amount); ?>
							<li>Grand Total <span class="btn-secondary" data-toggle="tooltip" data-html="true" title="
								USD <?php echo e($getCurrencyRates['USD_Rate']); ?><br>
								GBP <?php echo e($getCurrencyRates['GBP_Rate']); ?><br>
								EUR <?php echo e($getCurrencyRates['EUR_Rate']); ?>

								">INR <?php echo $total_amount; ?></span></li>
						<?php else: ?>
							<?php $getCurrencyRates = Product::getCurrencyRates($total_amount); ?>
							<li>Grand Total <span class="btn-secondary" data-toggle="tooltip" data-html="true" title="
								USD <?php echo e($getCurrencyRates['USD_Rate']); ?><br>
								GBP <?php echo e($getCurrencyRates['GBP_Rate']); ?><br>
								EUR <?php echo e($getCurrencyRates['EUR_Rate']); ?>

								">INR <?php echo $total_amount; ?></span></li>
						<?php endif; ?>
					</ul>
						<a class="btn btn-default update" href="">Update</a>
						<a class="btn btn-default check_out" href="<?php echo e(url('/checkout')); ?>">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/products/cart.blade.php ENDPATH**/ ?>