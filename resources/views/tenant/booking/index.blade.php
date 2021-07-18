@extends('tenant.tenantdashboard')
@section('title')
booking
@endsection
@section('content')
    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div> 
    @endif
    <div id="content-wrapper">
   <div class="container-fluid">
    
      <!-- Breadcrumbs-->
      
                
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
            BOOKING APARTMENT
         </div>
         <div class="card-body">
          <div class="table-responsive">
     
            @foreach($apartments as $apartment)
            
	          <div class="row">       
              <div class="col-md-4">
                <div class="card text-black bg-info mb-3" style="max-width: 20rem; height:28rem; margin:20px;">
                  <div class="card-header">
                  
                    <h6><p class="card-text"> Name: {{ $apartment->NameofApartment }}</p></h6>
                  </div>
         
                  <div class="card-body">
                    <p class="card-text"><?php foreach (json_decode($apartment->filenames)as $picture) { ?>
                      <img src="{{ asset('/files/'.$picture) }}" style="width:90px;max-width:100px" id="x" class="x"/>
                      <?php } ?></p>
                        <p class="card-text">Apartment Type: {{ $apartment->ApartmentType }}</p>
                        <p class="card-text">Name of Apartment: {{ $apartment->NameofApartment }}</p>            
                        <p class="card-text">Rant Range: {{ $apartment->RentRange }}</p>            
                        <p class="card-text">Parking Lot: {{ $apartment->parkinglot }}</p>            
                        <p class="card-text">Dzongkhag: {{ $apartment->dzongkhag->name }}</p>            
                        <p class="card-text">Gewog: {{ $apartment->gewog->name }}</p>
                  
                  

                  <form action="done" method="post"    enctype="multipart/form-data">
                  @csrf   
                    <ul class="info-list clearfix">
               
                      <input type="hidden" name="apartment_id" value="{{$apartment->id}}"  >     
                    </ul>
                    
                    <div class="col-md-9">
                      
                      <button type="submit" class="btn btn-secondary btn-lg btn-block"style="border:1px solid #C0C0C0; padding:3px;" onclick="return confirm('Are you sure?')">Book</button>
                    </div>
                   

                  </form>
                  </div>

                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>


 @endsection
