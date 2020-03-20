@extends('layouts.frontLayout.front_design')

@section('content')


<?php

use App\Category;


?>
	
<section>
	<div class="container">
		<div class="row">
		<!--	<div class="col-sm-3">
				@include('layouts.frontLayout.front_sidebar')
			</div>-->



   
				
	 <div class="col-sm-12">
				
					<?php  $categories = Category::where(['parent_id' => 3])->get(); ?>
			   @foreach($categories as  $categ)
			       <div class="col-sm-3"><br>
					   <div class="product1">
							<a href="{{ url('./')}}"><img src="{{ asset('images/backend_images/product/small/'.$categ->image ) }}" alt="" /></a>
							
					   </div>
				  </div>
				    
				    @endforeach    
	       </div> 
	       

			
			<!--<div class="col-sm-9 padding-right">
				<div class="features_items">
					<h2 class="title text-center">Contact Us</h2>
					@if(Session::has('flash_message_success'))
			            <div class="alert alert-success alert-block">
			                <button type="button" class="close" data-dismiss="alert">×</button> 
			                    <strong>{!! session('flash_message_success') !!}</strong>
			            </div>
			        @endif
			        @if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<div class="contact-form">
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="{{ url('/page/contact') }}" id="main-contact-form" class="contact-form row" name="contact-form" method="post">{{ csrf_field() }}
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

@endsection