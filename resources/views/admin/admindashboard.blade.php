
@extends('layouts.master')
@section('title')
AdminDashboard
@endsection

@section('content')
<div id="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      

      <!-- DataTables Example -->
      <div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-table"></i>
             Dashboard
         </div><br><br>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   

                    <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-user-friends"></i>
          </div>
          <div class="mr-5">{{App\Models\User::count()}} Users </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('role-register/')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-location-arrow"></i>
          </div>
          <div class="mr-5">{{App\Models\Dzongkhag::count()}} Dzongkhag</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('admin.viewdzongkhag')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
            <a href="admin/category"></a>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-location-arrow"></i>
          </div>
          <div class="mr-5">{{App\Models\Gewog::count()}} Gewog</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('admin.viewgewog')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-comments"></i>
          </div>
          <div class="mr-5">{{App\Models\feedback::count()}} Feedback</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('feedback')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>

  
                    <div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>
                    
@endsection


@section('scripts')
@endsection
