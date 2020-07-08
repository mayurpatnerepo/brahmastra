<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


<?php use App\Product; ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Wish List</li>
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
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						<?php $total_amount = 0; ?>
						<?php $__currentLoopData = $userWishList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							 <td class="cart_product">
									<a href=""><img style="width:100px;" src="<?php echo e(asset('/images/backend_images/product/small/'.$wishlist->image)); ?>" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo e($wishlist->product_name); ?></a></h4>
									<p>Product Code: <?php echo e($wishlist->product_code); ?></p>
								</td>
								<td class="cart_price">
									<?php $product_price = Product::getProductPrice($wishlist->product_id,$wishlist->size); ?>
									<p>INR <?php echo e($product_price); ?></p>
								</td>
								
								<td class="cart_quantity">
									<p><?php echo e($wishlist->quantity); ?></p>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">INR <?php echo e($product_price*$wishlist->quantity); ?></p>
								</td>
								<form name="addtoCartForm" id="addtoCartForm" action="<?php echo e(url('add-cart')); ?>" method="post"><?php echo e(csrf_field()); ?>

		                        <input type="hidden" name="product_id" value="<?php echo e($wishlist->product_id); ?>">
		                        <input type="hidden" name="product_name" value="<?php echo e($wishlist->product_name); ?>">
		                        <input type="hidden" name="product_code" value="<?php echo e($wishlist->product_code); ?>">
		                        <input type="hidden" name="product_color" value="<?php echo e($wishlist->product_color); ?>">
		                        <input type="hidden" name="size" value="<?php echo e($wishlist->id); ?>-<?php echo e($wishlist->size); ?>">
		                        <input type="hidden" name="price" id="price" value="<?php echo e($wishlist->price); ?>">
								<td class="cart_delete">
									<button type="submit" class="btn btn-fefault cart" id="cartButton" name="cartButton" value="Add to Cart">
										<i class="fa fa-shopping-cart"></i>
										Add to Cart
									</button>
									<a class="cart_quantity_delete" href="<?php echo e(url('/wish-list/delete-product/'.$wishlist->id)); ?>">Delete<i class="fa fa-times"></i></a>
								</td>
								</form>
						</tr>
						<?php $total_amount = $total_amount + ($product_price*$wishlist->quantity); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</tbody>
				</table>
			</div>
		</div>
</section> <!--/#wishlist_items-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/products/wish_list.blade.php ENDPATH**/ ?>