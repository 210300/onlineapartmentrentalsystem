@extends('layouts.master')
@section('title')
View Gewog
@endsection()
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    
  
</head>
<body>
   
    @if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif

<div id="content-wrapper">
   <div class="container-fluid">
      <!-- DataTables Example -->
      <div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-table"></i>
             GEWOG
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Gewog</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($gewog as $key=>$row )
                     <tr>
                        <td> {{$key+1}}</td>
                        <td>{{$row->name}}</td>
                        
                        
                       <td>

                          <a href="{{url('gewogedit/'.$row->id)}}" class="btn btn-info waves-effect">
                           Edit
                           </a>
                        <td>
                           <a  href="delete/{{$row->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>

                        </td>
                           
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




