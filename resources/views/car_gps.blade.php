<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tracking Car</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
        mapTypeId: google.maps.MapTypeId.ROADMAP
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
              // icon: '../images/container5.png',
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

        // const ceter_position = new google.maps.LatLng(pos)

        for (let i = 0; i < markers.length; i++) {

          const marker_position = new google.maps.LatLng(markers[i][5], markers[i][6])
          // const checkDistance = google.maps.geometry.spherical.computeDistanceBetween(marker_position, ceter_position)

          // resize image
          var icon = {
            url: "images/container5.png", // url
            scaledSize: new google.maps.Size(55, 55), // scaled size
            origin: new google.maps.Point(0, 0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };

          let marker = new google.maps.Marker({
            position: new google.maps.LatLng(markers[i][2], markers[i][3]),
            icon: icon,
            map: map,
            // optimized: false,
            // title: markers[i][1],
          });
          marker._infowindow = new google.maps.InfoWindow({
            content: markers[i][3]
          });

          if (info_name) {
            marker._infowindow.open(map, marker);
            map.setCenter(marker.getPosition());
          }
        }
      });
      changeMarkerPosition(marker);
    }

    function changeMarkerPosition(marker) {
      var latlng = new google.maps.LatLng(40.748774, -73.985763);
      marker.setPosition(latlng);
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6dOf5hnd662VGA_QlkXtuODatOq5Ick&callback=initMap"></script>

</body>

</html>