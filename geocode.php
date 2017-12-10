<?php

if(isset($_POST['latlon']))
{
  $_SESSION['lat1'] = $_POST['lat1'];
  $_SESSION['lon1'] = $_POST['lon1'];
  $_SESSION['lat2'] = $_POST['lat2'];
  $_SESSION['lon2'] = $_POST['lon2'];

/*  header ("Location: map.php");
  exit(); */
  echo "<script>window.location = 'map.php'</script>";


}
 ?>

<!DOCTYPE html>
<head>  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <title>My Geocode App</title>
  <style>
  .dbox {
    background-color:   #f7f9f9;
    padding: 10px;
  }
  </style>
</head>
<body>
  <form class="dbox" method="post" target="">
      <div  id="geometry1"></div>
      <div  id="geometry2"></div>
      <div align="center"  id="geometry3">
        <table>
        <tr><td colspan="2">
        <input type="submit" value="See in Google Map" name="latlon">
        <td><tr>
        </table>
      </div>
    </form>

  <script>
  // Call Geocode
  var fromWhere = "<?php echo $_SESSION['location']; ?> ";
  var toWhere = "<?php echo $_SESSION['destination']; ?> ";

  geocode(fromWhere);
  geocode(toWhere);

  function geocode(location){
    axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
      params:{
        address:location,
        key:'AIzaSyCAUw6hI-oxoDEa1_e_kPJbFj2zDZt3bNs'
      }
    })
    .then(function(response){
      // Log full response
      console.log(response);


      // Geometry
      var lat = response.data.results[0].geometry.location.lat;
      var lng = response.data.results[0].geometry.location.lng;

      // Output to app
      if(location==fromWhere)
      {
        var geometryOutput1 = `
        <input type="hidden" name="lat1" value="${lat}">
        <input type="hidden" name="lon1" value="${lng}">
        `;
        document.getElementById('geometry1').innerHTML = geometryOutput1;
      }else{
        var geometryOutput2 = `
        <input type="hidden" name="lat2" value="${lat}">
        <input type="hidden" name="lon2" value="${lng}">
        `;
        document.getElementById('geometry2').innerHTML = geometryOutput2;
      }

    })
    .catch(function(error){
      console.log(error);
    });
  }


  </script>
</body>
</html>
