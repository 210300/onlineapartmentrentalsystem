 @extends('Owner.ownerdashboard')
@section('title')
Upload Apartment
@endsection()
@section('content')


    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div> 
    @endif
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="../js/map.js"></script> 
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
  </head>
  <body>
  
<div class="card-header">
  <i class="fas fa-table"></i>
    Upload Apartments
</div><br><br>
<div class="content">    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-5">
          <div class="form h-100">
            
          <form method="post" action="save" enctype="multipart/form-data" >
          {{csrf_field()}}
          <div class="form-wrapper form-price">
              <input type="file" name="filenames[]" id="myImg" class="form-wrapper"  multiple>
          </div><br><br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Apartment Type</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01"name = "ApartmentType">
              <option selected>Choose...</option>
              <option value="2BHK">2BHK</option>
              <option value="3BHK">3BHK</option>
              <option value="BHK">BHK</option>
            </select>
          </div>
          <div class="form-group-row">
            <label for="nameofapartment">Name of Apartment</label>
            <input type="text" class="form-control" name="NameofApartment" placeholder="Name">
          </div>

          <div class="form-group">
              <label for="RentRange">Rent Range</label>
              <input type="bigIncrements" class="form-control" name="RentRange" placeholder="rent">
          </div>
          <div class="form-group">
            <label for="RentRange">Location</label>
            <input type="text" class="form-control" name="Location" placeholder="enter location">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Parking Lot</label>
            </div>
              <select class="custom-select" id="inputGroupSelect01"name = "parkinglot">
                  <option selected>Choose...</option>
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
                        
              </select>
          </div>

          <div class="form-group">
            <label for="dzongkhag">Select Dzongkhag:</label>
            <select name="dzongkhag_id" class="form-control" >
              @foreach($dzongkhag as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="gewog">Select Gewog:</label>
                <select name="gewog_id" class="form-control">
                  @foreach($gewog as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach
                </select>
            </div>


    <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="Dzongkhag"]').on('change',function(){
             var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'apartment/getgewog/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     
                     {
                         console.log(data);
                        jQuery('select[name="Gewog"]').empty();
                        jQuery.each(data, function(key,value){
                           console.log(key, value)
                           $('select[name="Gewog"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="Gewog"]').empty();
               }
            });
    });
    </script>
     <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="Latitude" readonly class="form-control" id="lat" aria-describedby="emailHelp"  placeholder="Lattitude">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="Longitude" readonly class="form-control" id="lon" placeholder="Longitude">
                </div>
    <div class="text-center">
    <button type="submit" class="btn btn-primary" style='margin:30px'>upload</button>
     </div>         

          </div>
        </div>
        <div class="col-md-3">
         <body onload="initialize()">
<div class="container">

    <div class="row">
        <div class="col-md-3">
            <!--DIV tag for google map-->
            <div class="main">
              <div style="width:50%;  margin:100px auto; margin-left:20px">

                <div id="googlemap" style="width:700px; height:350px;"></div>

                <div class="eventtext">
                  <div><b>Latitude Longtitude:</b>&nbsp; <span id="latlong"></span></div>
                </div>
                
              </div>
            </div>
            <!--END tag for google map-->
        </div>
</div>
        </div>
      </div>
    </div>

  </div>


</body>
    
@endsection()

