<?php $__env->startSection('content'); ?>

<?php
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\CategoryController;
$mainCategories =  Controller::mainCategories();  



?>
	
<section>
	<div class="container">
		<div class="row">
		<!--	<div class="col-sm-3">
				<?php echo $__env->make('layouts.frontLayout.front_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>-->


           

     <div class="col-sm-12">	
			     <?php $__currentLoopData = $categoryDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			       <div class="col-sm-3"><br>
					   <div class="product1">
					   	<?php if($categ->status==1): ?>
							<a href="<?php echo e(url('/products/'.$categ->url)); ?>"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image )); ?>" alt="" /></a>
							<h4><?php echo e($categ->name); ?></h4>
                        <?php endif; ?>
					   </div>
				  </div>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
	       </div>

			
			<!--<div class="col-sm-9 padding-right">
				<div class="features_items">
					<h2 class="title text-center">Contact Us</h2>
					<?php if(Session::has('flash_message_success')): ?>
			            <div class="alert alert-success alert-block">
			                <button type="button" class="close" data-dismiss="alert">×</button> 
			                    <strong><?php echo session('flash_message_success'); ?></strong>
			            </div>
			        <?php endif; ?>
			        <?php if($errors->any()): ?>
					    <div class="alert alert-danger">
					        <ul>
					            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                <li><?php echo e($error); ?></li>
					            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </ul>
					    </div>
					<?php endif; ?>
					<div class="contact-form">
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="<?php echo e(url('/page/contact')); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post"><?php echo e(csrf_field()); ?>

				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="email" class="form-control" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
				</div>
			</div>-->
		</div>
	</div>
</section><br><br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/pages/categoryl2.blade.php ENDPATH**/ ?>