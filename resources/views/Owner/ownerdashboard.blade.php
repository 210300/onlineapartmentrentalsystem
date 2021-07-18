
@extends('owner.ownermaster')
@section('title')
OwnerDashboard
@endsection

@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>
                    <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-home"></i>
          </div>
          <div class="mr-5">{{App\Models\apartment::count()}} apartments </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('Owner.viewapartment/')}}">
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
          <div class="mr-5">{{App\Models\complain::count()}} Complain</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="view/complain">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
            <a href="admin/category"></a>
          </span>
        </a>
      </div>
    </div>
  </div>
  
                    
@endsection


@section('scripts')
@endsection
