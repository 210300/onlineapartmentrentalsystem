
@extends('layouts.master')
@section('title')
Add Owner
@endsection

@section('content')

@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
      <form action="/owneradd" method="POST" encrypt="multipart/form-data" onsubmit="function()">
      {{csrf_field()}}      
      <div class="modal-body">       
      <div class="mb-3">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name" pattern="[a-zA-Z]+" title="Please enter only Alphabet and not numbers">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                        </div>
                          <div class="mb-3">
                            <label for="phone" class=" col-form-label text-md-right">{{ __('Phone') }}</label>

                        
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Enter your phone no (Eg. 17222222/77121212)"autofocus maxlength='8' pattern="(17|77)\d{6}" title="Please begin Your number from 17/77">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                        </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Gender:</label>
                                <div class="form-check">
                                     <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                     Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                    </label>
                                </div>
                            </div>                             
                        <div class="mb-3">
                            <label for="recipient-email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Like Example@gmail.com" title="Please begin Your number from 17/77">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>
                        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Dzongkhag:</label>
            <input type="text" name="dzongkhag" class="form-control" id="recipient-name">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Gewog:</label>
            <input type="text" name="gewog" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="recipient-name" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"title="You need one uppercase and some number and need more than 8 characters">
          </div> 
          <div class="invisible">
                            <label  for="usertype" class=" col-form-label text-md-right">{{ __('Usertype') }}</label>                           
                                 <select class="form-select" name="usertype">
                                 <option  selected="selected">owner</option>                                                               
                                </select>
                              
                          
                        </div>
                       
                        <div class="text-center">
        <button type="submit" class="btn btn-primary">Add Owner</button>
        </div>
        <script>
function myFunction() {
  alert("The verification link have been send");
}
</script>

    
      @endsection
      @section('scripts')
      @endsection
