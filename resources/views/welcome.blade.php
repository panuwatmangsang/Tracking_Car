<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vue gps</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Tracking Car</h2>
        <div class="map" id="app">
            <gmap-map :center="{lat:10,lng:10}" :zoom="7" style="width:100%; height:320px;">
                <gmap-marker :position="{lat:10,lng:10}" :clickable="true" :draggable="false">

                </gmap-marker>
            </gmap-map>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>