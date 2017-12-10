<?php require "header.php"
?>
<html>
<head>
    <title>TGDC -Google Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 20;
        padding: 0;
      }
    </style>
  </head>

    <!-- This stylesheet contains specific styles for displaying the map
         on this page. Replace it with your own styles as described in the
         documentation:
         https://developers.google.com/maps/documentation/javascript/tutorial -->
   <!-- <link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css"> -->

  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var x1= <?php  echo $_SESSION['lat1']; ?>;
        var y1= <?php  echo $_SESSION['lon1']; ?>;
        var x2= <?php  echo $_SESSION['lat2']; ?>;
        var y2= <?php  echo $_SESSION['lon2']; ?>;
        var place1 = {lat: x1, lng: y1};
        var place2 = {lat: x2, lng: y2};

        //New map
        var map = new google.maps.Map(document.getElementById('map'), {
          center: place1,
          zoom: 7
        });

        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });

        // Set destination, origin and travel mode.
        var request = {
          destination: place2,
          origin: place1,
          travelMode: 'DRIVING'
        };

        // Pass the directions request to the directions service.
        var directionsService = new google.maps.DirectionsService();
        directionsService.route(request, function(response, status) {
          if (status == 'OK') {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
          }
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAs1oxPs0-d-hn1hvqul_Vq858NklM3d14&callback=initMap"
        async defer></script>
  </body>
</html>

<?php require "footer.php"; ?>
