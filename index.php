<?php require "header.php";
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Transport Guide Dhaka City</title>
  <style>
  .graybox {
    background-color: #f2f1e3;
    border: 1px solid #d3ceb4;
    padding: 10px;
  }
  .dbox {
    background-color:   #f7f9f9;
    padding: 10px;
  }

    .tab-border {
    text-align: center;
    border: 1px solid black;
  }
  input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type=submit] {
    width: 100%;
    background-color: #855146;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #54413c;
  }

  </style>


</head>
<body>
  <div class="graybox" align="center">
    <form method="post" target="">
      <table>
        <tr>

          <td><input type="text" name="location" placeholder="location" required></td>
        </tr>
        <tr>

          <td><input type="text" name="destination" placeholder="destination" required></td>
        </tr>
        <tr>
          <td><input type="submit" name="indxsbmt" value="Search"></td>
        </tr>
      </table>
    </form>
  </div>

<?php 

if($_POST)
{
  $_SESSION['location'] = $_POST['location'].",Dhaka,Bangladesh";
  $_SESSION['destination'] = $_POST['destination'].",Bangladesh";
  require "geocode.php";
} 
 ?>


<?php
require "DBconnect.php";
$con = new DBconnect();
$link = $con->connect_db("id3753684_db");

if(isset($_POST['indxsbmt']))
{
  echo '<div class="dbox" align="center">
    <table class="tab-border">';

  $location = $_POST['location'];
  $destination = $_POST['destination'];
//session_start();

  if($location!=$destination)
  {
    $sql = "SELECT DISTINCT type, name, fare FROM `vehicle`
    WHERE (place1 LIKE '%$location%'
    OR place2 LIKE '%$location%')
    AND (place1 LIKE '%$destination%' OR
    place2 LIKE '%$destination%')
    AND Active = 1";


    $msg="Location didn't match in database.<br>";

    echo "Search Result: From <b>".$location."</b> To <b>".$destination."</b><br><br>";

    if($result=mysqli_query($link, $sql))
    {
      if(mysqli_num_rows($result)>0)
      {
        echo '<tr>
        <th>Name</th>
        <th>Type</th>
        <th>Fare</th>
        </tr>';
      }else {
        echo $msg;
      }
      while ($row=mysqli_fetch_array($result)) {
        echo "<tr>
        <td>".$row['name']."</td>
        <td>".$row['type']."</td>
        <td>".$row['fare']."</td>
        </tr>";
      }
    }
  }

  echo '</table> <br>
  Do you know better?
  <a href="volunteering.php">Improve the search</a>
  </div>';
  //volunteer page


}
?>
</body>
</html>

<?php require "footer.php"; ?>
