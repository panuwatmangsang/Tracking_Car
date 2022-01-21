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
    function myMap() {
      var position = {
        lat: 18.8945854,
        lng: 99.0098195
      }
      var maps;

      url = `car_gps_data`;

      var locations = [
        ['Toyota', 18.8945854, 99.0098195],
        ['Isuzu', 18.8842692, 99.0047842],
        ['Honda', 18.8937735, 99.0034448],
        ['Nissan', 18.8987441, 99.0133599]
      ];

      // var jsonObj = [
      //   {"location":"Toyota", "lat":"18.8945854", 'lng':"99.0098195"},
      //   {"location":"Isuzu", "lat":"18.8842692", 'lng':"99.0047842"},
      //   {"location":"Honda", "lat":"18.8937735", 'lng':"99.0034448"},
      //   {"location":"Nissan", "lat":"18.8987441", 'lng':"99.0133599"},
      // ]

      var mapProp = {
        // center: new google.maps.LatLng(18.9306783, 99.1841769),
        center: position,
        zoom: 5,
      };

      // แสดงแผนที่
      var maps = new google.maps.Map(document.getElementById("googleMap"), mapProp);

      // แสดง/สรา้ง marker
      // var marker = new google.maps.Marker({
      //   icon: "images/car-icon.png",
      //   // position: position,
      //   map: maps
      // });

      // วนแสดง marker หลายตัว
      // var marker, i, info;
      // for (i = 0; i < locations.length; i++) {
      //   // สร้าง marker
      //   marker = new google.maps.Marker({
      //     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      //     map: maps,
      //     icon: "images/car-icon.png"
      //     // title: locations[i][0]
      //   });

      //   // สร้าง popup
      //   info = new google.maps.InfoWindow();
      //   google.maps.event.addListener(marker, 'click', (function(marker, i) {
      //       return function() {
      //         info.setContent(locations[i][0]);
      //         info.open(maps, marker);
      //       }
      //     })
      //     (marker, i)
      //   );
      // }

      // ดึงข้อมูลจาก Database
      var markers, info;
      $.getJSON(url, function(jsonObj) {
        console.log(url);
        for (let i = 0; i < markers.length; i++) {

          const marker_position = new google.maps.LatLng(markers[i][5], markers[i][6])
          // const checkDistance = google.maps.geometry.spherical.computeDistanceBetween(marker_position, ceter_position)



          let marker = new google.maps.Marker({
            position: new google.maps.LatLng(markers[i][5], markers[i][6]),
            // icon: (markers[i][6] == 'fulltime') ? '../image/bluepoint03.png' : '../image/greenpoint02.png',
            map: map,
            optimized: false,
            title: markers[i][1],
          });
          marker._infowindow = new google.maps.InfoWindow({
            content: markers[i][1]
          });
        }
      });
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6dOf5hnd662VGA_QlkXtuODatOq5Ick&callback=myMap"></script>

</body>

</html>