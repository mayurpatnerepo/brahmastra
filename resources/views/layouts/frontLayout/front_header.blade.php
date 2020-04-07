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
							<a href="{{ url('./')}}"><img src="{{ asset('images/backend_images/image/logo.png') }}" alt="" /></a>
						</div>
                     </div>



					<div class="col-sm-5">
						<div class="search_box pull-right" style="margin:auto; width: 100%;">
							<form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }} 
								<input type="text" placeholder="Search Product" name="product" style="width: 80%; background-color: white;" required />
								<button type="submit" style="border:0px; height:33px; width: 10%; color: white ; background-color:#172337 "><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>


					<div class="col-sm-4">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="{{ url('/wish-list') }}"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{ url('/orders') }}"><i class="fa fa-crosshairs"></i> Orders</a></li>
								<li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart ({{ $cartCount }})</a></li>
								@if(empty(Auth::check()))
									<li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Login</a></li>
								@else
									<li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Account</a></li>
									<li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
								@endif
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
							<form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }} 
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
								<li><a href="{{ url('/') }}" class="active">Home</a></li>
								@foreach($mainCategories as $cat)
								<li class="dropdown"><a href="#">{{ $cat->name }}<i class="fa fa-angle-down rotate"></i></a>
                                    <ul role="menu" class="sub-menu">
                                           <?php    $subCategories1 = Category::where(['parent_id' => $cat->id])->get(); ?>
                                    	@foreach($subCategories1 as $subcat) 
                                        	<li><a href="{{ asset('products/'.$subcat->url) }}">{{ $subcat->name }}</a></li>
                                         @endforeach
                                   </ul>
                                </li> 
                                @endforeach
                               <!-- <li class="dropdown"><a href="#">Fitness Band<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	@foreach($mainCategories as $cat)
                                        	<li><a href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a></li>
										@endforeach
                                    </ul>
                                </li> 

                                <li class="dropdown"><a href="#">OFFERS<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	@foreach($mainCategories as $cat)
                                        	<li><a href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a></li>
										@endforeach
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





								<li><a href="{{ url('page/post') }}">Contact</a></li>-->
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</header><br><br>