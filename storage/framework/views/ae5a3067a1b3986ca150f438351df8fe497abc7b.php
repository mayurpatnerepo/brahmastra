<?php $__env->startSection('content'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


<?php use App\Product; ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order Review</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="shopper-informations">
				<div class="row">					
				</div>
			</div>

			<div class="row">
				<script>
                    <?php if(session('error')): ?>
                    swal("<?php echo e(session('error')); ?>");
                    <?php endif; ?>

               </script>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Billing Details</h2>
							<div class="form-group">
								<?php echo e($userDetails->name); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->address); ?>

							</div>
							<div class="form-group">	
								<?php echo e($userDetails->city); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->state); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->country); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->pincode); ?>

							</div>
							<div class="form-group">
								<?php echo e($userDetails->mobile); ?>

							</div>
					</div>
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>Shipping Details</h2>
							<div class="form-group">
								<?php echo e($shippingDetails->name); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->address); ?>

							</div>
							<div class="form-group">	
								<?php echo e($shippingDetails->city); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->state); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->country); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->pincode); ?>

							</div>
							<div class="form-group">
								<?php echo e($shippingDetails->mobile); ?>

							</div>
					</div>
				</div>
			</div>

			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						<?php $__currentLoopData = $userCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:130px;" src="<?php echo e(asset('/images/backend_images/product/small/'.$cart->image)); ?>" alt=""></a>
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
									<?php echo e($cart->quantity); ?>

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">INR <?php echo e($cart->price*$cart->quantity); ?></p>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>INR <?php echo e($total_amount); ?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost (+)</td>
										<td>INR <?php echo e($shippingCharges); ?></td>										
									</tr>
									<tr class="shipping-cost">
										<td>Discount Amount (-)</td>
										<td>
											<?php if(!empty(Session::get('CouponAmount'))): ?>
												INR <?php echo e(Session::get('CouponAmount')); ?>

											<?php else: ?>
												INR 0
											<?php endif; ?>
										</td>	
									</tr>
									<tr>
										<td>Grand Total</td>
										<?php 
										$grand_total = $total_amount + $shippingCharges - Session::get('CouponAmount');
										$getCurrencyRates = Product::getCurrencyRates($total_amount); ?>
										<td><span class="btn-secondary" data-toggle="tooltip" data-html="true" title="
								USD <?php echo e($getCurrencyRates['USD_Rate']); ?><br>
								GBP <?php echo e($getCurrencyRates['GBP_Rate']); ?><br>
								EUR <?php echo e($getCurrencyRates['EUR_Rate']); ?>

								">INR <?php echo e($grand_total); ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<form name="paymentForm" id="paymentForm" action="<?php echo e(url('/place-order')); ?>" method="post"><?php echo e(csrf_field()); ?>

				<input type="hidden" name="grand_total" value="<?php echo e($grand_total); ?>">
				<div class="payment-options">
					<span>
						<label><strong>Select Payment Method:</strong></label>
					</span>
					<?php if($codpincodeCount>0): ?>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD"> <strong>COD</strong></label>
					</span>
					<?php endif; ?>
					<?php if($prepaidpincodeCount>0): ?>
					<span>
						<label><input type="radio" name="payment_method" id="Paypal" value="Paypal"> <strong>Paypal</strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="Payumoney" value="Payumoney"> <strong>Payumoney</strong></label>
					</span>
					<?php endif; ?>
					<span style="float:right;">
						<button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();">Place Order</button>
					</span>
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/products/order_review.blade.php ENDPATH**/ ?>