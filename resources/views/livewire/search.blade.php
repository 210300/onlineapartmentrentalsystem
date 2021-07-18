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
                <div class="card text-black bg-info mb-3" style="max-width: 20rem; height:20rem; margin:20px;">
                    <div class="card-header">
                        <h6><p class="card-text"> {{ $row->NameofApartment }}</p></h6>
                    </div>
         
                    <div class="card-body">
                        <p class="card-text"><?php foreach (json_decode($row->filenames)as $picture) { ?>
                            <img src="{{ asset('/files/'.$picture) }}" style="width:90px;max-width:100px" id="x" class="x"/>
                            <?php } ?></p>
                            <p class="card-text">ApartmentType: {{ $row->ApartmentType }}</p>
                            <p class="card-text">Dzongkhag: {{ $row->dzongkhag->name }}</p>            
                            <p class="card-text">Gewog: {{ $row->gewog->name }}</p>
                            
                            <a href="{{url('viewdetails/'.$row->id)}}" class="btn btn-primary btn-block">More Info</a>
                    </div>
                </div>
            </div>
            
  
            @endforeach
            @endif
 
            {{ $apartment->links('livewire.livewire-pagination') }}
            </div>
        </div>
    </div>
               

