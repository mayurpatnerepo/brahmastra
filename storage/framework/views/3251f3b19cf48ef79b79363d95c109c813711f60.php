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
								<!--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>-->
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
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo e(url('./')); ?>"><img src="<?php echo e(asset('images/frontend_images/home/logo.png')); ?>" alt="" /></a>
						</div>
                        <!-- comment country and doller -->
						<!--<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>-->
					</div>
					<div class="col-sm-8">
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

					<div class="col-sm-12">
						<div class="search_box pull-right" style="margin:auto; width: 100%;">
							<form action="<?php echo e(url('/search-products')); ?>" method="post"><?php echo e(csrf_field()); ?> 
								<input type="text" placeholder="Search Product" name="product" style=" border-radius: 25px; width: 80%; background-color: white;" required />
								<button type="submit" style="border:0px; height:33px; margin-left:3px;  border-radius: 15px; width: 15%; color: white ; background-color:#172337 ">Search</button>
							</form>
						</div>
					</div><br><br><br>

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
                               <!-- <li class="dropdown"><a href="#">Fitness Band<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	<?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        	<li><a href="<?php echo e(asset('products/'.$cat->url)); ?>"><?php echo e($cat->name); ?></a></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li> 

                                <li class="dropdown"><a href="#">OFFERS<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	<?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        	<li><a href="<?php echo e(asset('products/'.$cat->url)); ?>"><?php echo e($cat->name); ?></a></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li> -->
                               <!-- <li class="dropdown"><a href="#">Pendrive<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">USB</a></li>
										<li><a href="blog-single.html">USB</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Hdd<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">HDD1</a></li>
										<li><a href="blog-single.html">HDD2</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Camera<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Camera1</a></li>
										<li><a href="blog-single.html">Camera2</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Watch<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Watch1</a></li>
										<li><a href="blog-single.html">Watch2</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Offer<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Offer1</a></li>
										<li><a href="blog-single.html">Offer2</a></li>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">BestSeller<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">BestSeller</a></li>
										<li><a href="blog-single.html">BestSeller</a></li>
                                    </ul>
                                </li> 

                                <li class="dropdown"><a href="#">Limited offer<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Limited offer</a></li>
										<li><a href="blog-single.html">Limited offer</a></li>
                                    </ul>
                                </li> 





								<li><a href="<?php echo e(url('page/post')); ?>">Contact</a></li>-->
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</header><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/layouts/frontLayout/front_header.blade.php ENDPATH**/ ?>