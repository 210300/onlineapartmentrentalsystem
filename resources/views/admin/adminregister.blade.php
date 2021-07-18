@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="flash-message">
            </div>
            <div class="card">
                <div class="card-header"> <img src="{{ asset('homepageassets/img/logo.jpeg') }}" /><br><p class="mx-auto" style="width: 200px;font-family:initial;font-size:25px;">Admin Registration</p></div>

                <div class="card-body">
           
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class=" col-form-label ">{{ __('Name:') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name"  title="Please enter only Alphabet and not numbers">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                            </div>
                        </div>
                          <div class="form-group">
                            <label for="phone" class=" col-form-label">{{ __('Phone:') }}</label>

                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Enter your phone no (Eg. 17222222/77121212)"autofocus maxlength='8'  pattern="(17|77)\d{6}" title="Please begin Your number from 17/77">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="gender" class=" col-form-label">{{ __('Gender:') }}</label>

                            <div class="col-md-7">
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
                        </div>
                        <div class="form-group">
                <label for="dzongkhag" class=" col-form-label"> Dzongkhag:</label>
                <div class="col-md-12">
                <select name="dzongkhag" class="form-control" >
                    <option selected>--- Select Dzongkhag ---</option>
                    <option>Mongar</option>
                </select>
</div>
                
            </div>
            <div class="form-group">
                <label for="gewog" class=" col-form-label"> Gewog:</label>
                <div class="col-md-12">
               
                <select name="gewog" class="form-control">
                <option >--Gewog--</option>
                <option >Mongar</option>
                </select>
            </div>
</div>


   
                        <div class="form-group">
                            <label for="email" class=" col-form-label ">{{ __('E-Mail Address:') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your E-mail address"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Can work only gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class=" col-form-label">{{ __('Password:') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"title="You need one uppercase and some number and need more than 8 characters">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    <div class="form-group">
                            <label for="password-confirm" class=" col-form-label">{{ __('Confirm Password:') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your entered password">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  for="usertype" class=" col-form-label text-md-right">{{ __('Usertype') }}</label>                           
                                 <select class="form-select" name="usertype">
                                 <option selected="selected">Admin</option>                                                               
                                </select>
                              
                          
                        </div>
            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<br>
 <br>  
 <br>
<br>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="dzongkhag"]').on('change',function(){
             var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getgewog/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        // console.log(data);
                        jQuery('select[name="gewog"]').empty();
                        jQuery.each(data, function(key,value){
                           console.log(key, value)
                           $('select[name="gewog"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="gewog"]').empty();
               }
            });
    });
    </script>
    @endsection