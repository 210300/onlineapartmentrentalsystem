
@extends('layouts.master')
@section('title')
RegisterUsers
@endsection

@section('content')
  <div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-table"></i>
             ADD  DZONGKHAG
         </div>
      <form action="/save-dzongkhag" method="POST">
      {{csrf_field()}}      
      <div class="modal-body">  
      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif       
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Dzongkhag:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
        <button type="submit" class="btn btn-primary">Save</button>
      
      </form>
      </div>   

@endsection
