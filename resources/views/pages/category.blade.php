@extends('layouts.frontLayout.front_design')

@section('content')


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
                     @foreach($categories as  $cat)
			       <div class="col-sm-6"><br>
					   <div class="product1 ">
						<a href="{{ asset('pages/category/'.$cat->id)}}"><img src="{{ asset('images/backend_images/product/large/' .$cat->image) }}" alt="" /></a>
						<h4>{{$cat->name}}</h4>
					   </div>
				  </div>
				  @endforeach
             
             </div>



		</div>
	</div>
</section><br><br>

@endsection