
@extends('layouts.master')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <title>Userprofile</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <div class="row">
  		<div class="col-sm-8"><h2>User Profile</h2></div>
      @if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

</div>

@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="/storage/avatars/{{ $owner->avatar }}" class="avatar img-circle img-thumbnail" alt="avatar">
   
      </div></hr><br>

      
    
        </div><!--/col-3-->
    	<div class="col-sm-9">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset disabled="disabled">
                <!-- <div class="form-group col-md-6">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp" >
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div> -->
                <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">User Name</label>
      <input type="text" class="form-control" name="username"value="{{$owner->name}}"id="username" placeholder="username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Gender</label>
      <input  type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="{{$owner->gender}}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email_Address</label>
      <input  type="email" class="form-control" name="email"id="email" placeholder="you@email.com" value="{{$owner->email}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone_Number</label>
      <input type="text" class="form-control" id="phone" placeholder="Phone" value="{{$owner->phone}}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Dzongkhag</label>
      <input type="text" class="form-control" name="dzongkhag" id="dzongkhag" placeholder="dzongkhag" value="{{$owner->dzongkhag}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Gewog</label>
      <input type="text" class="form-control" name="gewog" id="gewog" placeholder="gewog" value="{{$owner->gewog}}">
    </div>
  </div>
    
                      <!-- <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                      </div> -->
                      </filedset>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
            
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

@endsection
