@include('layouts.header')<br><br><br>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>view Apartment</title>
       
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script type="text/javascript" src="../js/map.js"></script> 
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  


</head>

  <body onload="initialize()">

  <div class="jumbotron jumbotron-fluid">
   
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-5">
          
           
           <h3><p class="fas fa-table"> View  Your Apartment Details</p></h3><br><br>
            <div class="form h-100">
           <form method="post" action="viewdetails" enctype="multipart/form-data" >
            {{csrf_field()}}
           <div class="form-wrapper form-price">
             
            </div>
            <div class="input-group- mb-3">
                    <label for="inputGroupSelect01">Apartment Type</label>
                    <input type="text" readonly class="form-control" name='ApartmentType' value="{{$apartment->ApartmentType}}">
                </div>                     
                <div class="input-group- mb-3">
                    <label for="nameofapartment">Name of Apartment</label>
                    <input type="text" readonly class="form-control" value="{{$apartment->NameofApartment}}" placeholder="Name">
                </div>
                <div class="input-group- mb-3">
                    <label for="RentRange">Rent Range</label>
                    <input type="bigIncrements" readonly class="form-control" value="{{$apartment->RentRange}}" placeholder="rent">
                </div>  
                <div class="input-group- mb-3">
                    <label for="Location">Location</label>
                    <input type="text" readonly class="form-control" value="{{$apartment->Location}}" >
                </div>

                <div class="input-group- mb-3">
                   
                  <label  for="inputGroupSelect01">Parking Lot</label>
                  <input type="text" readonly class="form-control" value="{{$apartment->parkinglot}}" >
                </div>
                <div class="input-group- mb-3">
                  <label  for="inputGroupSelect01">Dzongkhag</label>
                  <input type="text" readonly class="form-control" value="{{$apartment->dzongkhag->name}}" >
                </div>
                <div class="input-group- mb-3">
                  <label  for="inputGroupSelect01">Gewog</label>
                  <input type="text" readonly class="form-control" value="{{$apartment->gewog->name}}">
                </div>
                <div class="form-group- md-3">
                    <label for="latitude">Latitude</label>
                    <input type="text" value="{{$apartment->Latitude}}" readonly class="form-control" id="lat" aria-describedby="emailHelp"  placeholder="Lattitude">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" value="{{$apartment->Longitude}}" readonly class="form-control" id="lon" placeholder="Longitude">
                </div>
                <div class="form-group">
                <a href ="/login"><button type="button" class="btn btn-primary">Booking</button></a>
                <a href ="/search"><button type="button" class="btn btn-danger">Cancel</button></a>
                
                </div>
                
          </div>
        </div>


        <div class="col-md-6">
   
<div class="container">
<!-- JavaScript code to plot location on the map -->

<script type="text/javascript">
  function initialize(){
    var myLatLng = new google.maps.LatLng({{$apartment->Latitude}}, {{$apartment->Longitude}});

    // var myLatLng = new google.maps.LatLng(27.2410783676783327, 91.1948383892898075);


    var mapOptions = {
      zoom: 17,
      center: myLatLng,
      mapTypeId: google.maps.MapTypeId.HYBRID,
    };
    
    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    var infowindow = new google.maps.InfoWindow({content: "{{$apartment->NameofApartment}}"});

    // Add customize marker
    var image = "/img/marker.png";

    var marker = new google.maps.Marker({
      position:myLatLng,
	    map:map,
      icon : image,
      title:"{{$apartment->NameofApartment}}"
    });

    google.maps.event.addListener(marker, "click", function() {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
    <div class="row">
        <div class="col-md-6">
            <!--DIV tag for google map-->
            <h4 class="fas fa-location-arrow" style='font-size:32px;color:red'> Location Map</h4>
            <div style="width:50%;  margin:100px auto; margin-left:20px">

                <div id="map_canvas" style="width:700px; height:350px;"></div>
<!-- 
                <div class="eventtext">
                  <div><b>Latitude Longtitude:</b>&nbsp; <span id="latlong"></span></div>
                </div> -->
                
              </div>
            <!--END tag for google map-->
        </div>
        </div>
        </div>
      </div>
    </div>
</div>

</div>
</body>
</html>

