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
  <h3 id="map-title"></h3>
  <div id="googleMap" style="width:100%;height:600px;"></div>

  <script>
    url = `car_gps_data`;
    var time_set = 1000;
    var currentTimeout = null;
    var icon_size = 35;

    function initMap() {

      var position = {
        lat: 13.809308,
        lng: 100.5329657
      }
      var mapProp = {
        // center: new google.maps.LatLng(18.8945854, 99.0098195),
        center: position,
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      // แสดงแผนที่
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

      $.getJSON(url, function(markers) {
        var time_start = 0;
        var count_markers = Object.keys(markers).length;
        var idx = 1;
        $.each(markers, function(time, cars) {
          const myTimeout = setTimeout(() => {
            const string_time = new Date(time);
            $('#map-title').html(string_time.toLocaleString('th-TH', {day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit'})); //แสดงเวลา
            for (var i = 0; i < cars.length; i++) {
              // console.log('cars', cars[i]);
              const marker_position = new google.maps.LatLng(cars[i].latitude, cars[i].longtitude);
              // resize image
              var icon = {
                url: cars[i].car_icon, // url
                scaledSize: new google.maps.Size(icon_size, icon_size), // scaled size
                origin: new google.maps.Point(0, 0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
              };
              let marker = new google.maps.Marker({
                position: new google.maps.LatLng(cars[i].latitude, cars[i].longtitude),
                icon: icon,
                map: map,
                // optimized: false,
                title: "CAR_ID::" + cars[i].car_id,
              });
              if (idx < count_markers) {
                setTimeout(() => {
                  marker.setMap(null);
                }, time_set);
              }
            }
            idx++;
          }, time_start += time_set);
        });
          // const ceter_position = new google.maps.LatLng(pos)

      //   for (let i = 0; i < markers.length; i++) {
      //     const myTimeout = setTimeout(() => {
      //       const marker_position = new google.maps.LatLng(markers[i][2], markers[i][3])
      //       // console.log(markers[i][2], markers[i][3]);

      //       // resize image
      //       var icon = {
      //         url: "images/container5.png", // url
      //         scaledSize: new google.maps.Size(55, 55), // scaled size
      //         origin: new google.maps.Point(0, 0), // origin
      //         anchor: new google.maps.Point(0, 0) // anchor
      //       };

      //       let marker = new google.maps.Marker({
      //         position: new google.maps.LatLng(markers[i][2], markers[i][3]),
      //         icon: icon,
      //         map: map,
      //         // optimized: false,
      //         // title: markers[i][1],
      //       });
            
      //       if (i < (markers.length - 1)) {
      //         setTimeout(() => {
      //         marker.setMap(null);
      //       }, time_loop);
      //       }
            
      //       console.log(markers[i][2], markers[i][3]);
      //     }, time += time_loop);

      //     routeLine = new google.maps.Polyline({
      //       strokeColor: '#FA8072',
      //       strokeOpacity: 1.0,
      //       strokeWeight: 5
      //     });
      //     // marker._infowindow = new google.maps.InfoWindow({
      //     //   content: markers[i][3]
      //     // });

        // }
      });

      google.maps.event.addListener(map, 'click', function(event) {
        var result = [event.latLng.lat(), event.latLng.lng()];
        transition(result);
      });
    }

    //Load google map
    // google.maps.event.addDomListener(window, 'load', initialize);
    function createMarker(attr){

    }


    var numDeltas = 100;
    var delay = 10; //milliseconds
    var i = 0;
    var deltaLat;
    var deltaLng;

    function transition(result) {
      i = 0;
      deltaLat = (result[0] - position[0]) / numDeltas;
      deltaLng = (result[1] - position[1]) / numDeltas;
      moveMarker();
    }
//move marker
    function moveMarker() {
      position[0] += deltaLat;
      position[1] += deltaLng;
      var latlng = new google.maps.LatLng(position[0], position[1]);
      marker.setTitle("Latitude:" + position[0] + " | Longitude:" + position[1]);
      marker.setPosition(latlng);
      if (i != numDeltas) {
        i++;
        setTimeout(moveMarker, delay);
      }
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6dOf5hnd662VGA_QlkXtuODatOq5Ick&callback=initMap"></script>

</body>

</html>