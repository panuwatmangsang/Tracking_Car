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
        lat: 18.8945854,
        lng: 99.0098195
      }

      var mapProp = {
        // center: new google.maps.LatLng(18.8945854, 99.0098195),
        center: position,
        zoom: 10,
      };

      // แสดงแผนที่
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

      // แสดง/สรา้ง marker
      var marker = new google.maps.Marker({
        position: position,
        map:map
      });

      // แสดง info
      var info = new google.maps.InfoWindow({
        content: '<div style="font-size:15px;">Toyota</div>'
      });
      google.maps.event.addListener(marker,'click',function() {
        info.open(map,marker);
      });
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6dOf5hnd662VGA_QlkXtuODatOq5Ick&callback=myMap"></script>

</body>

</html>