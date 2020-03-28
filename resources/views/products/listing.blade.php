@extends('layouts.frontLayout.front_design')

@section('content')
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

		<form action="{{ url('/products-filter') }}" method="post">
					{{ csrf_field() }}
	@if(!empty($url))
	<input name="url" value="{{ $url }}" type="hidden">
	@endif
                 
                 <div class="left-sidebar">

                 <h2>Category</h2>
		<div class="panel-group category-products" id="accordian">
			@foreach($categories as $cat)
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								{{$cat->name}}
							</a>
						</h4>
					</div>
					<div id="{{$cat->id}}" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								@foreach($cat->categories as $subcat)
									<?php $productCount = Product::productCount($subcat->id); ?>
									@if($subcat->status==1)
									<li><a href="{{ asset('products/'.$subcat->url) }}">{{$subcat->name}} </a> ({{ $productCount }})</li>
									@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			@endforeach
		</div>         	
                    
                        	

        @if(!empty($url))	
								
<?php $var="1";
   $permArray= (array) null
 ?>


@foreach($productsAll  as $pro)

        @if(empty($pro->sleeve))
        @else

                      
          	                 @if($var==1)
                                       <h2>
							          {{ $categoryDetails->name }} sizes
							          </h2>
							          <?php  $var = "2" ?>

							         @else
							        <?php  $var = "2" ?>

                               @endif
						
          
					
							
               
                         @if(in_array($pro->sleeve,$permArray))
                         @else 

								
                        <?php array_push($permArray, $pro->sleeve); ?>
                         <div class="panel-group" style="margin-bottom: 5px;">
                            
                         	@if(!empty($_GET['sleeve']))
						<?php $sleeveArr = explode('-',$_GET['sleeve']) ?>
						@if(in_array($pro->sleeve,$sleeveArr))
							<?php $sleevecheck="checked"; ?>	
						@else
							<?php $sleevecheck=""; ?>
						@endif		
					@else
						<?php $sleevecheck=""; ?>
					@endif
                    <div class="panel panel-default">
						<div class="panel-heading">
                            <h4 class="panel-title">
                               <input name="colorFilter[]" onchange="javascript:this.form.submit();" id="{{$pro->sleeve  }}" value="{{ $pro->sleeve }}" type="checkbox" {{ $sleevecheck }}>&nbsp;&nbsp;<span class="products-colors">{{ $pro->sleeve }}</span>

                              </h4>
                         </div>
					</div>
                 </div>				
						@endif
						@endif
        @endforeach      
                    
		            

    <?php $var="1"; 
          $permArray= (array) null

           //$colorArray = Product::select('product_color')->groupBy('product_color')->get();
     ?>    
@foreach($productsAll as $pro)


             @if(empty($pro->product_color))
			 @else
                          
          	                 @if($var==1)
                                 <h2>
							          {{ $categoryDetails->name }} colors
							     </h2>     
							          <?php  $var = "2" ?>

							         @else
							        <?php  $var = "2" ?>

                               @endif
						 


              <div class="panel-group" style="margin-bottom: 5px;">
              
                    @if(!empty($_GET['color']))
						<?php $colorArr = explode('-',$_GET['color']) ?>
						@if(in_array($pro->product_color,$colorArr))
							<?php $colorcheck="checked"; ?>	
						@else
							<?php $colorcheck=""; ?>
						@endif		
					@else
						<?php $colorcheck=""; ?>
					@endif

                          @if(in_array($pro->product_color ,$permArray))
                          @else 
     <?php array_push($permArray, $pro->product_color ); ?>


                    
					<div class="panel panel-default">
							
						<div class="panel-heading">
						
							<h4 class="panel-title">

                     
                      
				<input name="colorFilter[]" onchange="javascript:this.form.submit();" id="{{$pro->product_color  }}" value="{{ $pro->product_color }}" type="checkbox" {{ $colorcheck }}>&nbsp;&nbsp;<span class="products-colors">{{ $pro->product_color }}</span>

                              
							</h4>

							
						</div>
						
					</div>
					
					@endif
				
				
		</div>

		
          @endif
		@endforeach       
        @endif	
</div>
	</form>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">
						@if(!empty($search_product))
							{{ $search_product }} Item
						@else
							{{ $categoryDetails->name }} Items
						@endif
						    ({{ count($productsAll) }})
					</h2>
					<div align="left"><?php echo $breadcrumb; ?></div>
					<div>&nbsp;</div>
					@foreach($productsAll as $pro)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="" />
										<h2>INR {{ $pro->price }}</h2>
										<p>{{ $pro->product_name }}</p>
										<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>INR {{ $pro->price }}</h2>
											<p>{{ $pro->product_name }}</p>
											<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
					@endforeach
					@if(empty($search_product))
						<div align="center">{{ $productsAll->links() }}</div>
					@endif
				</div>
				
			</div>
		</div>
	</div>
</section>

@endsection