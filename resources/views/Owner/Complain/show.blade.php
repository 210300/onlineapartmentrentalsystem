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
         Complain
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
               <thead>
                  <h3>Date Complain</h3>
                  <tr>
                     <th>ID</th>
                     <th>Date</th>
                     <th>Description</th>
                     
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>{{$complain->id}}</td>
                    <td> {{$complain->created_at}}</td>
                     <td>{{$complain->description}}</td>

                     
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
                     <th>Parking Lot</th>
                     <th>Dzongkhag</th>
                     <th>Gewog</th>
                    
                  </tr>
                  <tr>
                     <td>{{$complain->apartment->ApartmentType}}</td>
                     <td>{{$complain->apartment->NameofApartment}}</td>
                     <td>{{$complain->apartment->RentRange}}</td>
                     <td>{{$complain->apartment->parkinglot}}</td>
                     <td>{{$complain->apartment->dzongkhag->name}}</td>
                     <td>{{$complain->apartment->gewog->name}}</td>
                     
                     
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
               <h3> Users Details</h3>
               <thead>
                  <tr>
                     <th>Name </th>
                     <th>Email </th>
                     <th>Phone</th>
                  </tr>
               </thead>
               <tbody>
                  
                  <tr>
                     <td>{{$complain->user->name}}</td>
                     <td>{{$complain->user->email}}</td>
                     <td>{{$complain->user->phone}}</td>
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