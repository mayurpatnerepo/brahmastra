<?php 
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\CategoryController;
$mainCategories =  Controller::mainCategories();
$cartCount = Product::cartCount();
$subCategories =  Controller::subCategories();
$subCategories1 =  Controller::subCategories1();


?>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo" >
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>9004465145</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@brahmastraproducts.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>  
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="<?php echo e(url('./')); ?>"><img src="<?php echo e(asset('images/backend_images/image/logo.png')); ?>" alt="" /></a>
						</div>
                     </div>



					<div class="col-sm-5">
						<div class="search_box pull-right" style="margin:auto; width: 100%;">
							<form action="<?php echo e(url('/search-products')); ?>" method="post"><?php echo e(csrf_field()); ?> 
								<input type="text" placeholder="Search Product" name="product" style="width: 80%; background-color: white;" required />
								<button type="submit" style="border:0px; height:33px; width: 10%; color: white ; background-color:#172337 "><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>


					<div class="col-sm-4">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="<?php echo e(url('/wish-list')); ?>"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="<?php echo e(url('/orders')); ?>"><i class="fa fa-crosshairs"></i> Orders</a></li>
								<li><a href="<?php echo e(url('/cart')); ?>"><i class="fa fa-shopping-cart"></i> Cart (<?php echo e($cartCount); ?>)</a></li>
								<?php if(empty(Auth::check())): ?>
									<li><a href="<?php echo e(url('/login-register')); ?>"><i class="fa fa-lock"></i> Login</a></li>
								<?php else: ?>
									<li><a href="<?php echo e(url('/account')); ?>"><i class="fa fa-user"></i> Account</a></li>
									<li><a href="<?php echo e(url('/user-logout')); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">

					<!--<div class="col-sm-12">
						<div class="search_box pull-right" style="margin:auto; width: 100%;">
							<form action="<?php echo e(url('/search-products')); ?>" method="post"><?php echo e(csrf_field()); ?> 
								<input type="text" placeholder="Search Product" name="product" style=" border-radius: 25px; width: 80%; background-color: white;" required />
								<button type="submit" style="border:0px; height:33px; margin-left:3px;  border-radius: 15px; width: 15%; color: white ; background-color:#172337 ">Search</button>
							</form>
						</div>
					</div>-->

					<div class="col-sm-12">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse" style="max-height: 800px;">
								<li><a href="<?php echo e(url('/')); ?>" class="active">Home</a></li>
								<?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="dropdown"><a href="#"><?php echo e($cat->name); ?><i class="fa fa-angle-down rotate"></i></a>
                                    <ul role="menu" class="sub-menu">
                                           <?php    $subCategories1 = Category::where(['parent_id' => $cat->id])->get(); ?>
                                    	<?php $__currentLoopData = $subCategories1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        	<li><a href="<?php echo e(asset('products/'.$subcat->url)); ?>"><?php echo e($subcat->name); ?></a></li>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </ul>
                                </li> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</header><br><br><?php /**PATH C:\wamp\www\Brahmastra live work\trunk\resources\views/layouts/frontLayout/front_header.blade.php ENDPATH**/ ?>