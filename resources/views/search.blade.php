@include('layouts.header')<br><br><br><br><br>
<!DOCTYPE html>
<html>
    <head>
        <title>Search Apartment by Location</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    </head>
     
<body>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <b>Search Apartment by Location</b>
            </div>
            <div class="card-body">
                @livewire('search')
            </div>
        </div>
    </div>
 
</body>


@livewireScripts

</html>

