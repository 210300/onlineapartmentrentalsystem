@extends('Owner.ownerdashboard')
@section('title')
view booking
@endsection()
@section('content')
@if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div> 
    @endif
<div id="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
         </li>
         <li class="breadcrumb-item active">Bookings</li>
      </ol>

      <!-- DataTables Example -->
      <div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-table"></i>
             Bookings
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>App date</th>
                        <th>Active</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
             
                    
                    
                     <tr>
                     <td>@if($bookings->count() == 0)
                     <h2>No Booking Made</h2>
                     @endif</td>
                     @foreach($bookings as $key => $booking )
                        <td> {{ $key +1 }}</td>
                        <td>{{$booking->app_date}}</td>
                        
                        <td>
                           @if($booking->is_active == true)
                           <span class="badge bg-success">active</span>
                           @else
                           <span class="badge bg-danger">Pending</span>
                           @endif
                        </td>
                       <td>
                        <a href="{{url('/viewshow/'.$booking->id)}}" class="btn btn-primary waves-light">
                        <i class="fa fa-view"></i>
                        Details Booking
                        </a>
                          <a href="{{url('/edit/'.$booking->id)}}" class="btn btn-info waves-effect">
                           <i class="fa fa-edit"></i>
                           </a>
                        <br>
                           <a href="viewBookings/{{$booking->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>

                           
                        </form>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
@endsection