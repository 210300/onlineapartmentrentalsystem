 <div class="card mb-9">
         <div class="card-header">
            <i class="fas fa-table"></i>
             View Appartment
         </div><br>
    <div class="container">
	    <div class="row">
	            
	            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />
              
            @if($apartment->isEmpty())
                <div class="text-gray-500 text-sm">
                    No matching result was found.
                </div>
            @else
                @foreach($apartment as $row)   
       
        <div class="col-md-4">
      <div class="card text-white bg-info mb-3" style="max-width: 20rem; height:37rem; margin:20px;">
          <div class="card-header">
          <p class="card-text">{{ $row->NameofApartment }}</p>
          </div>
         
          <div class="card-body">
          <p class="card-text"><?php foreach (json_decode($row->filenames)as $picture) { ?>
              <img src="{{ asset('/files/'.$picture) }}" style="width:90px;max-width:100px" id="x" class="x"/>
              <?php } ?></p>
              <p class="card-text">ApartmentType:{{ $row->ApartmentType }}</p>

              <p class="card-text"> Name:{{ $row->NameofApartment }}</p>
              
              <p class="card-text">Rent-Range: {{ $row->RentRange }}</p>
              
              <p class="card-text">Location: {{ $row->Location }}</p>
             
              <p class="card-text">ParkingLot: {{ $row->parkinglot }}</p>
             
              <p class="card-text">Dzongkhag: {{ $row->dzongkhag->name }}</p>
              
              <p class="card-text">Gewog: {{ $row->gewog->name }}</p>
             
          </div>
          <div class="card-footer text-muted">
            <!-- <a href="{{url('apartment/'.$row->id)}}"> <button type="button" class="btn btn-primary">Edit</button></a>-->
            <a href="adminadelete/{{$row->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a> 
            <!-- <a href="/login" onclick="return confirm('You need to register/login before you rent a apartment')"class="btn btn-info">Rent</a> -->
          </div>   
      </div>
  </div>
  
  @endforeach
  @endif

  {{ $apartment->links('livewire.livewire-pagination') }}
  </div>
  </div>
  </div>
            
               

