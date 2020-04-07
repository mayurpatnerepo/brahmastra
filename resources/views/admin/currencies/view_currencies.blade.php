@extends('layouts.adminLayout.admin_design')
@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Currencies</a> <a href="#" class="current">View Currencies</a> </div>
    <h1>Currencies</h1>
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
            <h5>Currencies</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="text-align: left;">ID</th>
                  <th style="text-align: left;">Currency Code</th>
                  <th style="text-align: left;">Exchange Rate</th>
                   <th style="text-align: left;">Status</th>
                  <th style="text-align: left;">Updated at</th>
                  <th style="text-align: left;">Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($currencies as $currency)
                <tr class="gradeX">
                  <td class="center">{{ $currency->id }}</td>
                  <td class="center">{{ $currency->currency_code }}</td>
                  <td class="center">{{ $currency->exchange_rate }}</td>
                   <td class="center">
                    @if($currency->status==1)
                      <span style="color:green">Active</span>
                    @else
                      <span style="color:red">Inactive</span>
                    @endif
                  </td>
                  <td class="center">{{ $currency->updated_at }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-currency/'.$currency->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a href="{{ url('/admin/delete-currency/'.$currency->id) }}" class="btn btn-primary btn-mini">Delete</a></td>
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