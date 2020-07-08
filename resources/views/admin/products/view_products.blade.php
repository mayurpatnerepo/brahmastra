@extends('layouts.adminLayout.admin_design')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>Products</h1>
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
  <div style="margin-left:20px;">
    <a href="{{ url('/admin/export-products') }}" class="btn btn-primary btn-mini">Export</a>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Color</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Feature Item</th>
                   <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($products as $product)
                <tr class="gradeX">
                  <td class="center">{{ $product->id }}</td>
                  <td class="center">{{ $product->category_id }}</td>
                  <td class="center">{{ $product->category_name }}</td>
                  <td class="center">{{ $product->product_name }}</td>
                  <td class="center">{{ $product->product_code }}</td>
                  <td class="center">{{ $product->product_color }}</td>
                  <td class="center">INR {{ $product->price }}</td>
                  <td class="center">
                    @if(!empty($product->image))
                    <img src="{{ asset('/images/backend_images/product/small/'.$product->image) }}" style="width:50px;">
                    @endif
                  </td>
                  <td class="center">@if($product->feature_item == 1) Yes @else No @endif</td>
                  <td class="center">
                    @if($product->status==1)
                      <span style="color:green">Active</span>
                    @else
                      <span style="color:red">Inactive</span>
                    @endif
                  </td>
                  <td class="center">
                    <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini" style="border-radius: 10px;">View</a> 
                    <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-mini"style="border-radius: 10px;">Edit</a> 
                    <a href="{{ url('/admin/add-attributes/'.$product->id) }}" class="btn btn-success btn-mini" style="border-radius: 10px;">Size</a>
                    <a href="{{ url('/admin/add-images/'.$product->id) }}" class="btn btn-info btn-mini" style="border-radius: 10px;">Image</a>
                   <a id="delProduct" rel="{{ $product->id }}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord" style="border-radius: 10px;">Delete</a>
                        <div id="myModal{{ $product->id }}" class="modal hide">
                          <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3>{{ $product->product_name }} Full Details</h3>
                          </div>
                          <div class="modal-body">
                            <p>Product ID: {{ $product->id }}</p>
                            <p>Category ID: {{ $product->category_id }}</p>
                            <p>Product Code: {{ $product->product_code }}</p>
                            <p>Product Color: {{ $product->product_color }}</p>
                            <p>Price: INR {{ $product->price }}</p>
                            <p>Fabric: </p>
                            <p>Pattern: </p>
                            <p>Description: {{ $product->description }}</p>
                          </div>
                        </div>

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