@extends('Owner.ownerdashboard')

@section('content')
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif
<div id="content-wrapper">
<div class="container-fluid">
   <!-- Breadcrumbs-->
   <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Edit Booking</li>
   </ol> 
   <div class="col-lg-6">
      <div class="card">
         <div class="card-header">
            <strong>Edit Booking</strong>
         </div>
         <div class="create-product">
            <form class="form-horizontal" action="{{ url('viewBooking/'.$booking->id) }}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="card-body card-block">
               </div>
                  <div class="form-group">
                       
                   <input type="checkbox" name="is_active" value="1" {{$booking->is_active == true ? 'checked' : '' }}>
                            <label class="form-control-label">Active</label>       
                  </div>
               </div>
           <div class="form-group">
                  
                     <input type="hidden" value="{{$booking->user_id}}" name="user_id" placeholder="Enter adderss" class="form-control">
                  </div>
    <div class="form-group">
                  
                     <input type="hidden" value="{{$booking->apartment_id}}" name="apartment_id" placeholder="Enter adderss" class="form-control">
                  </div>
               <button type="submit" type="button" class="btn btn-primary">Save Booking</button>
         </div>
         </form>
      </div>
   </div>
</div>
</body>
@endsection