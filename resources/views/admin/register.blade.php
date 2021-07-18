
@extends('layouts.master')
@section('title')
RegisterUsers
@endsection

@section('content')
  



<!-- delete modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="delete_modal_Form" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                       
      <div class="modal-body">
        <input type="hidden" id="delete_id">
        <h5>Are you sure?you want to delete this data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">yes delete it</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal -->
              <div class="row">
          <div class="col-md-12">
            <div class="card">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
              @livewire('filter')
                <!-- <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Dzongkhag</th>
                      <th>Gewog</th>
                      <th>Usertype</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
            </tr>
        </thead>
        <tbody>

                    @foreach($users as $row)
                      <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->gender}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->dzongkhag}}</td>
                        <td>{{$row->gewog}}</td>
                        <td>{{$row->usertype}}</td>                       
                        <td><a href="/role-edit/{{$row->id}}" class="btn btn-success">EDIT</a></td>
                      
                         <td><a href="javascript:void(0);" class="btn btn-danger deletebtn" >Delete</a></td>
                          
                      
                      </tr>

                      @endforeach
                    </tbody>
                  </table>  
                             
	               
                </div> -->
               
              <!-- </div>
            </div>
          </div>
    </div> -->



@endsection

@section('scripts')
<script>
$(document).ready( function(){
  $('#datatable').on('click','.deletebtn',function(){
    $tr=$(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data); 
    $('#delete_id').val(data[0]);
    $('#delete_modal_Form').attr('action','/role-delete/'+data[0]);
    $('#deletemodalpop').modal('show');
  });
});
$(document).ready(function() {
    $('#example').DataTable();
} );
   

</script>
@endsection
