<div>
    <div class="container">
	    <div class="row">
	        <div class="col-md-12">	            
	            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />
	            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                <tr>
                    <th>Id</th>
                    <th>Apartment type</th>
                    <th>Name of Apartment</th>
                    <th>Rent Range</th>
                    <th>Location</th>
                    <th>Parking Lot</th>
                    <th>Dzongkhag</th>
                    <th>Gewog</th>
                    <th>Images</th>
                    <th>Edit</th>
                    <th>Delete</th>
  
            
                </tr>
                </thead>
                <tbody>
        
                @foreach ($apartment as $row)
                    <tr style="background:white;">
                    <td>{{$row->id}}</td>
                    <td>{{$row->ApartmentType}}</td>
                    <td>{{$row->NameofApartment}}</td>
                    <td>{{$row->RentRange}}</td>
                    <td>{{$row->Location}}</td>
                    <td>{{$row->parkinglot}}</td>
                   <!--  <td>{{$row->dzongkhag_id}}</td>
                    <td>{{$row->gewog_id}}</td> -->
                    <td><?php foreach (json_decode($row->filenames)as $picture) { ?>
                    <img src="{{ asset('/files/'.$picture) }}" style="width:50px;max-width:50px" id="x" class="x"/>
                    <?php } ?>
                    </td>  
                    
                   
                    <td><a href="{{url('apartment/'.$row->id)}}" class="btn btn-success">Edit</a></td>
                    <td><a href="delete/{{$row->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
                         

                    </tr>

                @endforeach
            </tbody>
            </table>
                {{ $apartment->links('livewire.livewire-pagination') }}
	        </div>
	    </div>
	</div>
</div>

