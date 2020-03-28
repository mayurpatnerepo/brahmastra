<html>
<body>
	<table width='700px'>
		<tr><td>&nbsp;</td></tr>
		<tr><td><img src="<?php echo e(asset('images/frontend_images/home/logo.png')); ?>"></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Hello <?php echo e($name); ?>,</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thank you for shopping with us. Your order details are as below :-</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Order No: <?php echo e($order_id); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>
			<table width='95%' cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
				<tr bgcolor="#cccccc">
					<td>Product Name</td>
					<td>Product Code</td>
					<td>Size</td>
					<td>Color</td>
					<td>Quantity</td>
					<td>Unit Price</td>
				</tr>
				<?php $__currentLoopData = $productDetails['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($product['product_name']); ?></td>
						<td><?php echo e($product['product_code']); ?></td>
						<td><?php echo e($product['product_size']); ?></td>
						<td><?php echo e($product['product_color']); ?></td>
						<td><?php echo e($product['product_qty']); ?></td>
						<td>INR <?php echo e($product['product_price']); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td colspan="5" align="right">Shipping Charges</td><td>INR <?php echo e($productDetails['shipping_charges']); ?></td>
				</tr>
				<tr>
					<td colspan="5" align="right">Coupon Discount</td><td>INR <?php echo e($productDetails['coupon_amount']); ?></td>
				</tr>
				<tr>
					<td colspan="5" align="right">Grand Total</td><td>INR <?php echo e($productDetails['grand_total']); ?></td>
				</tr>
			</table>
		</td></tr>
		<tr><td>
			<table width="100%">
				<tr>
					<td width="50%">
						<table>
							<tr>
								<td><strong>Bill To :-</strong></td>
							</tr>
							<tr>
								<td><?php echo e($userDetails['name']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($userDetails['address']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($userDetails['city']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($userDetails['state']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($userDetails['country']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($userDetails['pincode']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($userDetails['mobile']); ?></td>
							</tr>
						</table>
					</td>
					<td width="50%">
						<table>
							<tr>
								<td><strong>Ship To :-</strong></td>
							</tr>
							<tr>
								<td><?php echo e($productDetails['name']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($productDetails['address']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($productDetails['city']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($productDetails['state']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($productDetails['country']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($productDetails['pincode']); ?></td>
							</tr>
							<tr>
								<td><?php echo e($productDetails['mobile']); ?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>For any enquiries, you can contact us at <a href="mailto:info@brahmastraproducts.com">info@brahmastraproducts.com</a></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Regards,<br> Team Brahmastra</td></tr>
		<tr><td>&nbsp;</td></tr>
	</table>
</body>
</html><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/emails/order.blade.php ENDPATH**/ ?>