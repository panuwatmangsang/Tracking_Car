<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tracking Car</title>
</head>

<body>
  <div id="googleMap" style="width:100%;height:400px;"></div>

  <script>
    function myMap() {
      var position = {
        lat: 18.9306783,
        lng: 99.1841769
      }
      var maps;

      var locations = [
        ['Toyota', 18.8945854, 99.0098195],
        ['Isuzu', 18.8935056, 98.9871569],
        ['Honda', 18.8902647, 98.9852353]
      ];

      var mapProp = {
        center: new google.maps.LatLng(18.9306783, 99.1841769),
        // center: position,
        zoom: 10,
      };

      // แสดงแผนที่
      var maps = new google.maps.Map(document.getElementById("googleMap"), mapProp);

      // แสดง/สรา้ง marker
      var marker = new google.maps.Marker({
        position: position,
        map: maps
      });

      // แสดง info
      var info = new google.maps.InfoWindow({
        content: '<div style="font-size:15px;">Toyota</div>'
      });
      google.maps.event.addListener(marker, 'click', function() {
        info.open(map, marker);
      });

      // วนแสดง marker หลายตัว
      // var marker, i, info;
      // for (i = 0; i < locations.length; i++) {
      //   // สร้าง marker
      //   marker = new google.maps.Marker({
      //     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      //     map: maps,
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
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6dOf5hnd662VGA_QlkXtuODatOq5Ick&callback=myMap"></script>

</body>

</html>