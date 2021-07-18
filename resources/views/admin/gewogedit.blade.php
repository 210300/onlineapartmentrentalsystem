@extends('layouts.master')
@section('title')
RegisterUsers
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit</div>

                <div class="card-body">
                    <form action="{{ url('gewogupdate/'.$gewog->id)}}" method ="post">
                    <!-- use the update route here -->
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    
                    
                    <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Gewog:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" value="{{$gewog->name}}">
         
         
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/admin.viewgewog" class="btn btn-danger">Cancel</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection