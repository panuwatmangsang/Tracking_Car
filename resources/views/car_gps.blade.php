<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tracking Car</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <div id="googleMap" style="width:100%;height:600px;"></div>

  <script>
    var map,
      // user_input = 'all',
      marker,
      // circle,
      i = 0,
      pos,
      // pos1,
      directionsService,
      directionsRenderer,
      // routeLine = null,
      info_name = true,
      // hideMarkers = [],
      // myRange = 100


    // jobs_id = null
    url = `car_gps_data`;

    function initMap() {
      // clicked = null;
      // hideMarkers = []

      const directionsService = new google.maps.DirectionsService;
      const directionsRenderer = new google.maps.DirectionsRenderer({
        map: map,
        suppressMarkers: true,
        suppressPolylines: false,
        suppressBicyclingLayer: true,
        polylineOptions: {
          strokeColor: '#0000FF',
          strokeWeight: 3
        }
      });


      map = new google.maps.Map(document.getElementById("googleMap"), {
        zoom: 15,
      });
      directionsRenderer.setMap(map);


      //-----------------------location พิกัดที่เราอยู่---------------------------------//
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            // console.log("0")
            // console.log(pos)
            map.setCenter(pos);

            //-----------------------marker กับ circle ---------------------------------//
            marker = new google.maps.Marker({
              // icon: '../images/car_icon.png',
              map: map,
              animation: google.maps.Animation.DROP,
              position: pos
            });


            // console.log('00')
            // console.log(marker.position.lat())
            // console.log(marker.position.lng())
          },
          function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });

      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }


      // =================================================================
      const infoWindow = new google.maps.InfoWindow();
      $.getJSON(url, function(markers) {

        const ceter_position = new google.maps.LatLng(pos)

        for (let i = 0; i < markers.length; i++) {

          const marker_position = new google.maps.LatLng(markers[i][5], markers[i][6])
          const checkDistance = google.maps.geometry.spherical.computeDistanceBetween(marker_position, ceter_position)



          let marker = new google.maps.Marker({
            position: new google.maps.LatLng(markers[i][5], markers[i][6]),
            icon: "images/car-icon.png",
            map: map,
            optimized: false,
            // title: markers[i][1],
          });
          marker._infowindow = new google.maps.InfoWindow({
            content: markers[i][1]
          });


          if (info_name) {
            marker._infowindow.open(map, marker);
          }


        }
      });
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6dOf5hnd662VGA_QlkXtuODatOq5Ick&callback=initMap"></script>

</body>

</html>