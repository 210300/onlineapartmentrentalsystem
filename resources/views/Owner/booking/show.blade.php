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
      <li class="breadcrumb-item active">Tables</li>
   </ol>

   <!-- DataTables Example -->
   <div class="card mb-3">
      <div class="card-header">
         <i class="fas fa-table"></i>
         Booking
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
               <thead>
                  <h3>Date Booking</h3>
                  <tr>
                     <th>ID</th>
                     <th>Date</th>
                     
                  </tr>
               </thead>
               <tbody>
               
                  <tr>
                     <td>{{ $booking->id }}</td>
                     <td>{{$booking->app_date}}</td>
         
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
               <thead>
                  <h3>Apartment Details</h3>
               <thead>
                  <tr>
                     <th>ApartmentType</th>
                     <th>NameofApartment</th>
                     <th>RentRange</th>
                     <th>parkinglot</th>
                     <th>Dzongkhag</th>
                     <th>Gewog</th>
                    
                  </tr>
                  <tr>
                     <td>{{$booking->apartment->ApartmentType}}</td>
                     <td>{{$booking->apartment->NameofApartment}}</td>
                     <td>{{$booking->apartment->RentRange}}</td>
                     <td>{{$booking->apartment->parkinglot}}</td>
                     <td>{{$booking->apartment->dzongkhag->name}}</td>
                     <td>{{$booking->apartment->gewog->name}}</td>
                     
                     
                  </tr>
                    
               </thead>
               <tbody>
                  <tr>
                  
                     
                    </tr>
               </tbody>
            </table>
         </div>
         <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
               <h3> users Details</h3>
               <thead>
                  <tr>
                     <th>name </th>
                     <th>email </th>
                     <th>phone</th>
                  </tr>
               </thead>
               <tbody>
                  
                  <tr>
                     <td>{{$booking->user->name}}</td>
                     <td>{{$booking->user->email}}</td>
                     <td>{{$booking->user->phone}}</td>
                  </tr>
                   

               </tbody>
            </table>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
@endsection