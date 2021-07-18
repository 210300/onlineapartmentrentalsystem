
@extends('layouts.master')
@section('title')
RegisterUsers
@endsection

@section('content')

         <div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-table"></i>
             FEEDBACK
         </div>
         
              <div class="row">
          <div class="col-md-12">
            <div class="card">
             
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table  id="datatable"class="table">
                    <thead class=" text-primary">
                    <th>id</th>
                      <th>Email</th>
                      <th>Feedback</th>
                      <th>Description</th>
                    </thead>
                    <tbody>
                    @foreach($Feedbacks as $key => $row)
                      <tr>
                        <td>{{$key + 1 }}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->feedback}}</td>
                        <td>{{$row->description}}</td>                                        
                      </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
