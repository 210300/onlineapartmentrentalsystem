@extends('Owner.ownerdashboard')
@section('title')
Edit Apartment
@endsection()
@section('content')
<html lang="en">
<head>
  <title>upload apartment</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="../js/map.js"></script> 
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  
 
</style>
</head>
<br>

    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div> 
    @endif
    <div class="container">
    
    <h1 style="text-align:center; font-family:Rockwell Extra Bold">Edit Your Apartment Details</h1>
        <div class="row">
        
            <div class="col-md-6">
 
<form method="post" action="{{ url('update/'.$apartment->id)}}" enctype="multipart/form-data">
  {{csrf_field()}}
  @method('PUT')
        <div class="input-group control-group increment" >
          <input type="file" name="filenames[]" id="uploadFile" class="form-control"  multiple>
        </div><br><br>
       <div id = "imgPreview"></div>
        <script type="text/javascript">
            $("#uploadFile").change(function(){
                $('#imgPreview').html("");
                var total_file=document.getElementById("uploadFile").files.length;
                for(var i=0;i<total_file;i++)
                {
                $('#imgPreview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                }
            });
            $('form').ajaxForm(function() 
            {
            alert("Uploaded SuccessFully");
            }); 
        </script>
                
        

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Apartment Type</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01"name = "ApartmentType">
                        <option selected value="{{ $apartment->ApartmentType}}">Choose...</option>
                        <option value="2BHK">2BHK</option>
                        <option value="3BHK">3BHK</option>
                        <option value="BHK">BHK</option>
                    </select>
                </div>
                
                

                <div class="form-group-row">
                    <label for="nameofapartment">Name of Apartment</label>
                    <input type="text" class="form-control" name="NameofApartment" placeholder="Name" value="{{ $apartment->NameofApartment}}">
                </div>

                <div class="form-group">
                    <label for="RentRange">Rent Range</label>
                    <input type="bigIncrements" class="form-control" name="RentRange" placeholder="Rent" value="{{ $apartment->RentRange}}">
                </div>

                
                <div class="form-group-row">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="Location" placeholder="Enter location" value="{{ $apartment->Location}}">
                    
                </div>

                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parking Lot</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name = "parkinglot" value="{{ $apartment->parkinglot}}">
                        <option selected >Choose...</option>
                        <option value="Yes">YES</option>
                        <option value="No">NO</option>
                        
                    </select>
                </div>

          
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Dzongkhag</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01"name = "Dzongkhag" value="{{ $apartment->Dzongkhag}}">
                        <option selected >Choose...</option>
                        <option value="mongar">Mongar</option>
                        <option value="Tashigang">Tashigang</option>
                        <option value="Thimphu">Thimphu</option>
                    </select>
                </div>
              
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Gewog</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01"name = "Gewog" value="{{ $apartment->Gewog}}">
                        <option selected >Choose...</option>
                        <option value="Yadi">Yadi</option>
                        <option value="Gyelposhing">Gyelposhing</option> 
                        <option value="Drametsi">Drametsi</option>
                        <option value="Kilikhar">Kilikhar</option>
                        <option value="Lingmithang">Lingmithang</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="Latitude" readonly class="form-control" id="lat" aria-describedby="emailHelp"  placeholder="Click on Map" value="{{ $apartment->Latitude}}">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="Longtitude" readonly class="form-control" value="{{ $apartment->Longitude}}">
                </div>
                <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Update</button>
                <a href="/Owner.viewapartment" class="btn btn-info" style ="margin-top:12px"  value = 'cancel'>Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>


<body onload="initialize()">
<div class="container">

    <div class="row">
        <div class="col-md-9">
            <!--DIV tag for google map-->
            <div class="main">
              <div style="width:100%;  margin:10px auto; margin-left:10px">

                <div id="googlemap" style="width:750px; height:400px;"></div>

                <div class="eventtext">
                  <div><b>Latitude Longtitude:</b>&nbsp; <span id="latlong"></span></div>
                </div>
                
              </div>
            </div>
            <!--END tag for google map-->
        </div>
</body>
</html>
@endsection