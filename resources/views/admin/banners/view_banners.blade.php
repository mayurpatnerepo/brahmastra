@extends('layouts.adminLayout.admin_design')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Banners</a> <a href="#" class="current">View Banners</a> </div>
    <h1>Banners</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
       <script>
           @if (session('success'))
            swal("{{ session('success') }}");
           @endif
       </script>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Banners</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Banner ID</th>
                  <th>Title</th>
                  <th>Link</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($banners as $banner)
                <tr class="gradeX">
                  <td class="center">{{ $banner->id }}</td>
                  <td class="center">{{ $banner->title }}</td>
                  <td class="center">{{ $banner->link }}</td>
                  <td class="center">
                    @if(!empty($banner->image))
                    <img src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}" style="width:250px;">
                    @endif
                  </td>
                  <td class="center">
                    @if($banner->status==1)
                      <span style="color:green">Active</span>
                    @else
                      <span style="color:red">Inactive</span>
                    @endif
                  </td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-banner/'.$banner->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a id="delBanner" rel="{{ $banner->id }}" rel1="delete-banner" href="javascript:" <?php /* href="{{ url('/admin/delete-banner/'.$banner->id) }}" */ ?> class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection