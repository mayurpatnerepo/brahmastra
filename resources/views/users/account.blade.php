@extends('layouts.frontLayout.front_design')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="row">
			 <script>
             @if (session('success'))
           swal("{{ session('success') }}");
         @endif
     </script>
         <script>
           @if (session('error'))
           swal("{{ session('error') }}");
         @endif

     </script>
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<h2>Update Account</h2>
					<form id="accountForm" name="accountForm" action="{{ url('/account') }}" method="POST">{{ csrf_field() }}
						<input value="{{ $userDetails->email }}" readonly="" />
						<input value="{{ $userDetails->name }}" id="name" name="name" type="text" placeholder="Name"/>
						<input value="{{ $userDetails->address }}" id="address" name="address" type="text" placeholder="Address"/>
						<input value="{{ $userDetails->city }}" id="city" name="city" type="text" placeholder="City"/>
						<input value="{{ $userDetails->state }}" id="state" name="state" type="text" placeholder="State"/>
						<select id="country" name="country">
							<option value="">Select Country</option>
							@foreach($countries as $country)
								<option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
							@endforeach
						</select>
						<input value="{{ $userDetails->pincode }}" style="margin-top: 10px;" id="pincode" name="pincode" type="text" placeholder="Pincode"/>
						<input value="{{ $userDetails->mobile }}" id="mobile" name="mobile" type="text" placeholder="Mobile"/>
						<button type="submit" class="btn btn-default">Update</button>
					</form>
				</div>
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<h2>Update Password</h2>
					<form id="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="POST">{{ @csrf_field() }}
						<input type="password" name="current_pwd" id="current_pwd" placeholder="Current Password">
						<span id="chkPwd"></span>
						<input type="password" name="new_pwd" id="new_pwd" placeholder="New Password">
						<input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">
						<button type="submit" class="btn btn-default">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection