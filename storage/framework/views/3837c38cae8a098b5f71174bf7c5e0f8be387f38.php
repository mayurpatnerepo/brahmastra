<?php $__env->startSection('content'); ?>
<?php 
use App\Product;
use App\Category;
use App\ProductsAttribute;
use App\ProductsImage;



 ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">

		<form action="<?php echo e(url('/products-filter')); ?>" method="post">
					<?php echo e(csrf_field()); ?>

	<?php if(!empty($url)): ?>
	<input name="url" value="<?php echo e($url); ?>" type="hidden">
	<?php endif; ?>
                 
                 <div class="left-sidebar">

                 <h2>Category</h2>
		<div class="panel-group category-products" id="accordian">
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo e($cat->id); ?>">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								<?php echo e($cat->name); ?>

							</a>
						</h4>
					</div>
					<div id="<?php echo e($cat->id); ?>" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<?php $__currentLoopData = $cat->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php $productCount = Product::productCount($subcat->id); ?>
									<?php if($subcat->status==1): ?>
									<li><a href="<?php echo e(asset('products/'.$subcat->url)); ?>"><?php echo e($subcat->name); ?> </a> (<?php echo e($productCount); ?>)</li>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>         	
                    
                        	

        <?php if(!empty($url)): ?>	
								
<?php $var="1";
   $permArray= (array) null
 ?>


<?php $__currentLoopData = $productsAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(empty($pro->sleeve)): ?>
        <?php else: ?>

                      
          	                 <?php if($var==1): ?>
                                       <h2>
							          <?php echo e($categoryDetails->name); ?> sizes
							          </h2>
							          <?php  $var = "2" ?>

							         <?php else: ?>
							        <?php  $var = "2" ?>

                               <?php endif; ?>
						
          
					
							
               
                         <?php if(in_array($pro->sleeve,$permArray)): ?>
                         <?php else: ?> 

								
                        <?php array_push($permArray, $pro->sleeve); ?>
                         <div class="panel-group" style="margin-bottom: 5px;">
                            
                         	<?php if(!empty($_GET['sleeve'])): ?>
						<?php $sleeveArr = explode('-',$_GET['sleeve']) ?>
						<?php if(in_array($pro->sleeve,$sleeveArr)): ?>
							<?php $sleevecheck="checked"; ?>	
						<?php else: ?>
							<?php $sleevecheck=""; ?>
						<?php endif; ?>		
					<?php else: ?>
						<?php $sleevecheck=""; ?>
					<?php endif; ?>
                    <div class="panel panel-default">
						<div class="panel-heading">
                            <h4 class="panel-title">
                               <input name="colorFilter[]" onchange="javascript:this.form.submit();" id="<?php echo e($pro->sleeve); ?>" value="<?php echo e($pro->sleeve); ?>" type="checkbox" <?php echo e($sleevecheck); ?>>&nbsp;&nbsp;<span class="products-colors"><?php echo e($pro->sleeve); ?></span>

                              </h4>
                         </div>
					</div>
                 </div>				
						<?php endif; ?>
						<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                    
		            

    <?php $var="1"; 
          $permArray= (array) null

           //$colorArray = Product::select('product_color')->groupBy('product_color')->get();
     ?>    
<?php $__currentLoopData = $productsAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


             <?php if(empty($pro->product_color)): ?>
			 <?php else: ?>
                          
          	                 <?php if($var==1): ?>
                                 <h2>
							          <?php echo e($categoryDetails->name); ?> colors
							     </h2>     
							          <?php  $var = "2" ?>

							         <?php else: ?>
							        <?php  $var = "2" ?>

                               <?php endif; ?>
						 


              <div class="panel-group" style="margin-bottom: 5px;">
              
                    <?php if(!empty($_GET['color'])): ?>
						<?php $colorArr = explode('-',$_GET['color']) ?>
						<?php if(in_array($pro->product_color,$colorArr)): ?>
							<?php $colorcheck="checked"; ?>	
						<?php else: ?>
							<?php $colorcheck=""; ?>
						<?php endif; ?>		
					<?php else: ?>
						<?php $colorcheck=""; ?>
					<?php endif; ?>

                          <?php if(in_array($pro->product_color ,$permArray)): ?>
                          <?php else: ?> 
     <?php array_push($permArray, $pro->product_color ); ?>


                    
					<div class="panel panel-default">
							
						<div class="panel-heading">
						
							<h4 class="panel-title">

                     
                      
				<input name="colorFilter[]" onchange="javascript:this.form.submit();" id="<?php echo e($pro->product_color); ?>" value="<?php echo e($pro->product_color); ?>" type="checkbox" <?php echo e($colorcheck); ?>>&nbsp;&nbsp;<span class="products-colors"><?php echo e($pro->product_color); ?></span>

                              
							</h4>

							
						</div>
						
					</div>
					
					<?php endif; ?>
				
				
		</div>

		
          <?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
        <?php endif; ?>	
</div>
	</form>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">
						<?php if(!empty($search_product)): ?>
							<?php echo e($search_product); ?> Item
						<?php else: ?>
							<?php echo e($categoryDetails->name); ?> Items
						<?php endif; ?>
						    (<?php echo e(count($productsAll)); ?>)
					</h2>
					<div align="left"><?php echo $breadcrumb; ?></div>
					<div>&nbsp;</div>
					<?php $__currentLoopData = $productsAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo e(asset('/images/backend_images/product/small/'.$pro->image)); ?>" alt="" />
										<h2>INR <?php echo e($pro->price); ?></h2>
										<p><?php echo e($pro->product_name); ?></p>
										<a href="<?php echo e(url('/product/'.$pro->id)); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>INR <?php echo e($pro->price); ?></h2>
											<p><?php echo e($pro->product_name); ?></p>
											<a href="<?php echo e(url('/product/'.$pro->id)); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php if(empty($search_product)): ?>
						<div align="center"><?php echo e($productsAll->links()); ?></div>
					<?php endif; ?>
				</div>
				
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/products/listing.blade.php ENDPATH**/ ?>