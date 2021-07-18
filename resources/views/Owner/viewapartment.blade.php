@extends('Owner.ownerdashboard')
@section('title')
View Apartment
@endsection()
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view apartment</title>
    
    
  
</head>
<body>
@if(Session::has('message'))
<div class="alert alert-info">
    {{ Session::get('message') }}
</div>
@endif
<div id="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      

      <!-- DataTables Example -->
      <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                View Apartments
            </div>
         <div class="card-body">
            <div class="table-responsive">
                <div class="container">
	                <div class="row">
                        @if($apartment->count() == 0)
                            No Records found 
                        @endif
                        @foreach($apartment as $row)
      
                        <div class="col-md-4">
                            <div class="card text-black bg-info mb-3" style="max-width: 20rem; height:33rem; margin:20px;">
                                <div class="card-header">
                                    <p class="card-text">{{ $row->NameofApartment }}</p>
                                </div>
               
                                <div class="card-body">
                                    <p class="card-text"><?php foreach (json_decode($row->filenames)as $picture) { ?>
                                    <img src="{{ asset('/files/'.$picture) }}" style="width:100px;max-width:100px;height: 100px;" id="x" class="x"/>
                                    <?php } ?></p>
                                    <p class="card-text">ApartmentType: {{ $row->ApartmentType }}</p>
  
                                    <p class="card-text"> Name:  {{ $row->NameofApartment }}</p>
                    
                                    <p class="card-text">Rent-Range: {{ $row->RentRange }}</p>
                    
                                    <p class="card-text">Location:  {{ $row->Location }}</p>
                   
                                    <p class="card-text">ParkingLot: {{ $row->parkinglot }}</p>
                   
                                    <p class="card-text">Dzongkhag: {{ $row->dzongkhag->name }}</p>
                    
                                    <p class="card-text">Gewog: {{ $row->gewog->name }}</p>
                                </div>
                                <div class="card-footer text-muted">
                                    <a href="{{url('apartment/'.$row->id)}}"> <button type="button" class="btn btn-primary">Edit</button></a>
                                    <a href="apartmentdelete/{{$row->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                </div>   
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
@endsection

