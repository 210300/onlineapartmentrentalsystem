@extends('layouts.master')
@section('title')
View Dzongkhag
@endsection()
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Dzongkhag</title>
    
    
  
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
             Dzongkhag
         </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">

    
        <div class="table-responsive">
            <table id="datatable"class="table">
                <thead class=" text-primary">
                <tr>
                    <th>Id</th>
                    <th>Dzongkhag</th>
                    <th>Edit</th>
                    <th>Delete</th>
            
                </tr>
                </thead>
                <tbody>
        
                @foreach ($dzongkhag as $row)
                    <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>              
                    <td><a href="{{url('dzongkhagedit/'.$row->id)}}" class="btn btn-success">Edit</a></td>
                    <td><a href="deletedzongkhag/{{$row->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
                         

                    </tr>
                    @endforeach
            </tbody>
            </table>
          
               
               
        </div>
    </div>
</div>
</body>

</html>

@endsection
