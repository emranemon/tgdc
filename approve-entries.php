<html>
    <head>
        <title>Approve Entries</title>
    </head>
    <body>
<?php
require "header.php";
if(isset($_SESSION['userRole']))
{
    if($_SESSION['userRole']!='admin')
{ /*
  header("Location: index.php");
  exit(); */
  echo "<script>window.location = 'index.php'</script>";

}
}


require "DBconnect.php";
$con = new DBconnect();
$link = $con->connect_db("id3753684_db");
$sql  = 'SELECT * FROM `vehicle` WHERE Active=0';


$result = mysqli_query($link, $sql);

echo '<form method="post" target="">';
echo '<table align="center" style="text-align: center;">
<tr><th>Mark</th>
<th>Vehicle Name</th>
<th>Vehicle Type</th>
<th>Location</th>
<th>Destination</th>
<th>Fare</th></tr>
';

while ($row=mysqli_fetch_array($result)) {
  echo
  '<tr><td>
  <input type="checkbox" name="'.$row['ID'].'" value="'.$row['ID'].'">';
  echo
  '</td><td>'.$row['name'].'</td><td>'.$row['type'].'</td><td>'.$row['place1'].'</td><td>'.
  $row['place2'].'</td><td>'.$row['fare'].'</td></tr>';

}
echo '<tr style="text-align: right;" ><td colspan="3">
<input type="submit" value="Delete" name="delete" ></td><td colspan="1">'.
  '<input type="submit" value="Approve" name="approve" > </td><td >
  <input type="submit" value="Delete All" name="deleteall" ></td><td >'.
    '<input type="submit" value="Approve All" name="approveall" > </td> </tr>';
echo '</table>
</form>';

echo '</body>
</html>';


if($_POST)
{
  if(isset($_POST['delete']))
  {
    foreach ($_POST as $value) {
      $query =  "DELETE FROM `vehicle`
      WHERE ID = '$value'";
      mysqli_query($link, $query);
    }
    //header("Location: approve-entries.php");
    echo "<script>window.location = 'approve-entries.php'</script>";
  }
  if(isset($_POST['approve']))
  {
    foreach ($_POST as $value) {
      $query =  "UPDATE `vehicle`
      SET Active = 1
      WHERE ID = '$value'";
      mysqli_query($link, $query);
    }
    //header("Location: approve-entries.php");
    echo "<script>window.location = 'approve-entries.php'</script>";
  }
  if(isset($_POST['deleteall']))
  {
    $query="DELETE FROM `vehicle`
    WHERE Active=0";
    mysqli_query($link, $query);
    //header("Location: approve-entries.php");
    echo "<script>window.location = 'approve-entries.php'</script>";
  }
  if(isset($_POST['approveall']))
  {
      $query =  "UPDATE `vehicle`
      SET Active = 1
      WHERE Active = 0";
      mysqli_query($link, $query);
      //header("Location: approve-entries.php");
      echo "<script>window.location = 'approve-entries.php'</script>";
  }
}



require "footer.php";
 ?>
