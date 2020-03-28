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


			
			<div class="col-sm-12">
			  
			        <?php  $categories = Category::where(['parent_id' => 0])->get();  ?>
                     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			       <div class="col-sm-6"><br>
					   <div class="product1 ">
						<a href="<?php echo e(asset('pages/category/'.$cat->id)); ?>"><img src="<?php echo e(asset('images/backend_images/product/large/' .$cat->image)); ?>" alt="" /></a>
						<h4><?php echo e($cat->name); ?></h4>
					   </div>
				  </div>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
             </div>



		</div>
	</div>
</section><br><br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/pages/category.blade.php ENDPATH**/ ?>