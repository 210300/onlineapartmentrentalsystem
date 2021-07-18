@extends('tenant.tenantdashboard')
@section('title')
complain
@endsection
@section('content')
<div id="content-wrapper">
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      
    <div class="card-header">
      <i class="fas fa-table"></i>
        MAkE COMPLAINS
    </div>
      <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-body">
        <div class="table-responsive">

             
        <form method="post" action="{{ route('store.complain') }}">
	       @csrf
	  
        <div class="dropdown">
	        <label for="exampleFormControlInput1" class="form-label">Type</label>
          <select class="form-select"  name = "title"aria-label="Default select example">
            <option value="Electricity">Electricity</option>
            <option value="Water Shortage">Shortage</option>
            <option value="Other">Others</option>
          </select>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="description"></textarea>
          </div>
          <div class="mb-3">
  	        @foreach($apartment as $apartment)
            <input type="hidden" class="form-control" name="apartment_id" value="{{$apartment->id}}"  style="border:1px solid #C0C0C0; padding:3px;">    
            @endforeach 
                 
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">SUBMIT</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection


