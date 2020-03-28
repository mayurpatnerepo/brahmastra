<?php $__env->startSection('content'); ?>

<?php 

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\CategoryController;
$mainCategories =  Controller::mainCategories();  

?>


<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li data-target="#slider-carousel" data-slide-to="0" <?php if($key==0): ?> class="active" <?php endif; ?>></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ol>
					
					<div class="carousel-inner">
						<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="item <?php if($key==0): ?> active <?php endif; ?>">
							<a href="<?php echo e($banner->link); ?>" title="Banner 1"><img src="images/frontend_images/banners/<?php echo e($banner->image); ?>"></a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->
	
<section>
	<div class="container">

		<div class="row">


	  <div class="row" id="slider-text">
          <div class="col-md-6" >
             <h2>New Arrivals</h2>
          </div>
      </div>
			<div class="col-sm-12">
			 <?php $mainCategories = Category::where(['parent_id' => 0])->take(4)->get(); ?>
			   <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			       <div class="col-sm-6" ><br>
					   <div class="product1   <?php if($key==0): ?> active <?php endif; ?>">
					   
						<a href="<?php echo e(asset('pages/category/'.$cat->id)); ?>"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="" /></a>
						
						<h4><?php echo e($cat->name); ?></h4>

					</div>
				  </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  
			</div>
				
			<!--<div class="col-sm-9 padding-right">
				<div class="features_items">
					<h2 class="title text-center">Features Items</h2>
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
					<div align="center"><?php echo e($productsAll->links()); ?></div>
				</div>
			</div>-->
       <center>
		<a href="<?php echo e(url('pages/category/')); ?>"><button type="submit" style="border:0px; height:33px; margin-top: 30px;  width: 10%; color: white ; background-color:#29166f ">More</button></a></center>
		</div>
	</div>
</section><br><br>

<section>
	<div class="container">
		<div class="row">
        <div class="row" id="slider-text">
          <div class="col-md-6" >
           <h2>Deals of the Day</h2>
        </div>
        </div>
     </div>
		 <div class="col-xs-12 col-sm-12 col-md-12">
                  <?php     $categories = Category::where(['parent_id' => 1])->paginate(4);?>

         <!-- <div class="item">
		 <div class="col-xs-12 col-sm-6 col-md-2">
			<div class="product1 ">
					<a href="<?php echo e(url('./')); ?>"><img src="<?php echo e(asset('images/backend_images/product/small/' )); ?>" alt="" /></a>
				</div>
			</div>
		</div>-->
	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="item active">
		<div class="col-xs-12 col-sm-6 col-md-4">
		  <a href="#"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image)); ?>" class="img-responsive center-block"></a>
		  <h4 class="text-center"><?php echo e($categ->name); ?></h4>
		  <h5 class="text-center"><?php echo e($categ->price); ?></h5>
		</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
		
		       </div>
		   </div>
	</div>
</section><br><br>



<section>
   <!-- Item slider-->
	<div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>NEW COLLECTION</h2>
    </div>
  </div>
</div>


<div class="container-fluid">

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    	<div class="carousel carousel-showmanymoveone slide" id="itemslider">
      	    <div class="carousel-inner">

        <div class="item active">
            <div class="col-xs-12 col-sm-6 col-md-2">
                   <a href="#"><img src="<?php echo e(asset('images/backend_images/product/large/pendrive.jpg')); ?>" class="img-responsive center-block"></a>
                  <h4 class="text-center"><?php echo e($categ->name); ?></h4>
                  
             </div>
        </div>
           

        
        <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/large/pendrive.jpg')); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
             
            </div>
          </div>
          
         

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/large/pendrive.jpg')); ?>" class="img-responsive center-block"></a>
             <!--<span class="badg1">10%</span>-->
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
             
              
            </div>
          </div>
          

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/large/pendrive.jpg')); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
             
            </div>
          </div>
          

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/large/pendrive.jpg')); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
            
            </div>
          </div>
        

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/large/pendrive.jpg')); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
              
            </div>
          </div>
         

        </div>

       <!--<div id="slider-control">
        <a class="left carousel-control" href="#itemslider" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a></a>
        <a class="right carousel-control" href="#itemslider" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a></a>
      </div>-->
      </div>
      
    </div>
 
  </div>
</div>
</section><br><br>


<section>

	<div class="container">

		<div class="row">
			<!--<div class="col-sm-3">SS
				<?php echo $__env->make('layouts.frontLayout.front_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>-->
     <div class="row" id="slider-text">
          <div class="col-md-6" >
             <h2>Top Rated Products For You</h2>
          </div>
      </div>
 <div class="col-xs-12 col-sm-12 col-md-12">

	 <div class="item active">
           <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image)); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
              
            </div>
          </div>

          <div class="item active">
           <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image)); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
              
            </div>
          </div>



          <div class="item active">
           <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image)); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
              
            </div>
          </div>


            <div class="item active">
           <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image)); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
              
            </div>
          </div>


            <div class="item active">
           <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image)); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
              
            </div>
          </div>


            <div class="item active">
           <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="<?php echo e(asset('images/backend_images/product/small/'.$categ->image)); ?>" class="img-responsive center-block"></a>
              <h4 class="text-center"><?php echo e($categ->name); ?></h4>
              
            </div>
          </div>

	<!--<div class="col-sm-4" ><br>
		<div class="product1 ">
			<a href="<?php echo e(asset('pages/category/'.$cat->id)); ?>"><img src="<?php echo e(asset('images/backend_images/product/large/smart.jpg')); ?>" alt="" /></a>
						
		</div>
     </div>

     <div class="col-sm-4" ><br>
		<div class="product1 ">
			<a href="<?php echo e(asset('pages/category/'.$cat->id)); ?>"><img src="<?php echo e(asset('images/backend_images/product/large/smart.jpg')); ?>" alt="" /></a>
						
		</div>
     </div>


     <div class="col-sm-4" ><br>
		<div class="product1 ">
			<a href="<?php echo e(asset('pages/category/'.$cat->id)); ?>"><img src="<?php echo e(asset('images/backend_images/product/large/smart.jpg')); ?>" alt="" /></a>
						
		</div>
     </div>-->
</div>
 </div>
</div>
	
</section><br><br>

<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="row" id="slider-text">
                <div class="col-sm-3" >
                 <h2>Top Brands</h2>
            </div>
      </div> 
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<!--<ol class="carousel-indicators">
						<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li data-target="#slider-carousel" data-slide-to="0" <?php if($key==0): ?> class="active" <?php endif; ?>></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ol>-->
					
					<div class="carousel-inner">
						<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="item <?php if($key==2): ?> active <?php endif; ?>">
							<a href="<?php echo e($banner->link); ?>" title="Banner 1"><img src="images/frontend_images/banners/<?php echo e($banner->image); ?>"></a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					
					<!--<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>-->
				</div>
				
			</div>
		</div>
	</div>
</section>


<section>
	<div class="container">
		 <div class="row" id="slider-text">
          <div class="col-sm-3" >
             <h2>Top Offers</h2>
          </div>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide multi-item-carousel" id="theCarousel">
        <div class="carousel-inner">
          <div class="item active">
            <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?perth,australia" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?west-australia" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?perth" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?quokka,perth" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?margaretriver,australia" class="img-responsive"></a></div>
          </div>
          <!-- add  more items here -->
          <!-- Example item start:  -->
          
          <div class="item">
            <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?perth,australia&r=7" class="img-responsive"></a></div>
          </div>
          
          <!--  Example item end -->
        </div>
        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
    </div>
  </div>
</div>

</section><br><br>
      
		
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/index.blade.php ENDPATH**/ ?>