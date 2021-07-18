@extends('Owner.ownerdashboard')
@section('title')
view Complain
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
      

      <!-- DataTables Example -->
      <div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-table"></i>
             Complains
         </div>
         
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                 
                  <tbody>

                     <tr>
                     <td>@if($complain->count() == 0)
                        <h2> Have Not Made Any Complains </h2>
                     @endif</td>
                     </tr>
                     <tr>
                     @foreach($complain as $key=> $row )
                        <td> {{$key + 1}}</td>
                        <td> {{$row->title}}</td>
                        <td>{{\Carbon\Carbon::parse($row->created_at) ->diffForhumans()  }}</td>
                        
                                                
                       <td>
                          <a href="{{url('/showcomplain/'.$row->id)}}" class="btn btn-primary waves-light">
                        <i class="fa fa-view"></i>
                        View Details
                        </a>
                         
                        
                           <a href="{{url('/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>

                           
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