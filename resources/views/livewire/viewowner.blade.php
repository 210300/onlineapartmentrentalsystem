
<div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-table"></i>
             VIEW OWNERS
         </div><br> 
<div>
    <div class="container">
	    <div class="row">
	        <div class="col-md-12">	            
	            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />
	            <table id="datatable"class="table table-bordered" style="margin: 10px 0 10px 0;">
	                <tr>
                    <th>id</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Dzongkhag</th>
                      <th>Gewog</th>
                      <th>Usertype</th>
                      <th>view</th>
                      <th>DELETE</th>
	                </tr>
	                @foreach($owner as $key=> $row)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->gender}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->dzongkhag}}</td>
                        <td>{{$row->gewog}}</td>
                        <td>{{$row->usertype}}</td>                       
                        <td><a href="/admin.owneredit/{{$row->id}}" class="btn btn-success">VIEW</a></td>
                      
                          <td><a href="javascript:void(0);" class="btn btn-danger deletebtn" >Delete</a></td> 
                         <!-- <td><a href="/role-delete/{{$row->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td> -->
                          
                      
                      </tr>

                      @endforeach
	            </table>
                {{ $owner->links('livewire.livewire-pagination') }}
	        </div>
	    </div>
	</div>
</div>
<script>
$(document).ready( function(){
  $('#datatable').on('click','.deletebtn',function(){
    $tr=$(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data); 
    $('#delete_id').val(data[0]);
    $('#delete_modal_Form').attr('action','/owner-delete/'+data[0]);
    $('#deletemodalpop').modal('show');
  });
});
$(document).ready(function() {
    $('#example').DataTable();
} );
   

</script>

