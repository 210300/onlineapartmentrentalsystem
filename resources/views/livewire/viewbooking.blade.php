
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
      <div class="card text-white bg-info mb-6" style="max-width: 15rem; height:37rem; margin:20px;">
          <div class="card-header">
          <p class="card-text"> {{ $row->id }}</p>
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
             
              <p class="card-text">Dzongkhag: {{ $row->Dzongkhag }}</p>
              
              <p class="card-text">Gewog: {{ $row->Gewog }}</p>
             
          </div>
          <div class="card-footer text-muted">
            <!-- <a href="{{url('apartment/'.$row->id)}}"> <button type="button" class="btn btn-primary">Edit</button></a>
            <a href="delete/{{$row->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a> -->
            <!-- <a href="/login" onclick="return confirm('You need to register/login before you rent a apartment')"class="btn btn-info">Rent</a> -->
            <a href="{{url('confim')}}" class="btn btn-success">Book</a>
          </div>   
      </div>
  </div>
  <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
          </div>
          <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
            modal.style.display = "none";
            }
            </script>

  @endforeach
  @endif

  {{ $apartment->links('livewire.livewire-pagination') }}
  </div>
  </div>
  </div>
            
               

