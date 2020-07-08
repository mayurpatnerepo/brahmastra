<?php $__env->startSection('content'); ?>



<?php 

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\CategoryController;
$categories =  Controller::mainCategories();  

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
          <div class="col-md-6" >
             <h2>New Arrivals</h2>
          </div>
      
			<div class="col-sm-12">
			 <?php $categories = Category::where(['parent_id' => 0])->take(4)->get(); ?>
			   <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			       <div class="col-sm-6" ><br>
					   <div class="product1">
					   <a href="<?php echo e(asset('pages/category/'.$cat->id)); ?>"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="" /></a>
					    <h4><?php echo e($cat->name); ?></h4>
                        </div>
				  </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  
			</div>
				
			
      
		</div>
		 <center>
		<a href="<?php echo e(url('pages/category/')); ?>"><button type="submit" style="border:0px; height:33px; margin-top: 30px;  width: 10%; color: white ; background-color:#29166f ">More</button></a></center>
	</div>
</section><br><br>

<section>
	<div class="container">
    <div class="row">

    	  <div class="col-md-6" >
             <h2>Deal of the day</h2>
          </div>
		<div class="col-md-12">
                <div id="Carousel" class="carousel slide">
                 
               <!-- <ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                </ol>-->
                 
                <!-- Carousel items -->
                <div class="carousel-inner">
                    
                <div class="item active">
                	<div class="row">
                	  <div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;">
                	  	<a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                	  </div>
                	  <div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;"><a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                	  </div>
                	  <div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;">
                	  	<a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                	  </div>
                	  <div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;">
                	  	<a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                	  </div>
                	</div><!--.row-->
                </div><!--.item-->
                 
                <div class="item">
                	<div class="row">
                		<div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;">
                			<a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                		</div>
                		<div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;">
                			<a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                		</div>
                		<div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;">
                			<a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                		</div>
                		<div class="col-md-3"><img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="Image" style="max-width:100%;">
                			<a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                		</div>
                	</div><!--.row-->
                </div><!--.item-->
                 
                
                </div><!--.carousel-inner-->
                  

                  <a href="#Carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#Carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
                </div><!--.Carousel-->
                 
		</div>
	</div>
</div>
</section><br><br>



<section>
   <!-- Item slider-->
	<div class="container">
     <div class="col-md-6" >
      <h2>New Collection</h2>
    </div>
  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    	<div class="col-sm-12">
			 <?php $categories = Category::where(['parent_id' => 0])->take(4)->get(); ?>
			   <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			       <div class="col-sm-4" ><br>
					   <div class="product1">
					   <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" alt="" />
					   <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					    
                        </div>
				  </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  
			</div>
		</div>
</div>
</div>
</section><br><br>


<section>

	<div class="container">
  
    <div class="col-md-6" >
      <h2>Top Rated Prodyct for you</h2>
    </div>

     
   

<div class="row">
   <div class="col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="carousel-tilenav" data-interval="false">
         <div class="carousel-inner">
            <div class="item active">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
            <div class="item">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
            <div class="item">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
            <div class="item">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
            <div class="item">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
            <div class="item">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
            <div class="item">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
            <div class="item">
               <div class="col-xs-12 col-sm-6 col-md-2">
                  <img src="<?php echo e(asset('images/backend_images/product/large/'.$cat->image)); ?>" class="img-responsive">
                  <a href="" class="btn btn-default add-to-cart" style="margin-left: 25%"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
         </div>
         <a class="left carousel-control" href="#carousel-tilenav" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
         <a class="right carousel-control" href="#carousel-tilenav" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
   </div>
</div>

   
</div>
	
</section><br><br>

<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			
                <div class="col-md-6" >
                 <h2>Top Brands</h2>
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
		 
          <div class="col-md-6" >
             <h2>Top Offers</h2>
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

</section>


<section>
	<div class="container">
		 
          <div class="col-md-6" >
             <h2>Our Video</h2>
          </div>
     
  <div class="row">
    <div class="col-md-12">
      
    </div>
  </div>

</div>

</section>



<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			
                <div class="col-md-6" >
                 <h2>Top Feature Products</h2>
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
</section><br><br>
      
		
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontLayout.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/index.blade.php ENDPATH**/ ?>