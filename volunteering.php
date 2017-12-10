<?php require "header.php";

require "DBconnect.php";
$con = new DBconnect();
$link = $con->connect_db("id3753684_db");

if(!isset($_SESSION['userRole']))
{
/*  header("Location: volunteer-login.php");
  exit();*/
  echo "<script>window.location = 'volunteer-login.php'</script>";
}


if($_POST)
{
  if($_POST['location']!=$_POST['destination'])
  {
    $name = $_POST['name'];
    $type = $_POST['types'];
    $fare = $_POST['fare'];
    $location = $_POST['location'];
    $destination = $_POST['destination'];
    $sql = "INSERT INTO `vehicle` (`type`, `name`, `fare`, `place1`, `place2`)
    VALUES ('$type', '$name', '$fare', '$location', '$destination')";
    if(mysqli_query($link, $sql))
    {
      echo '<script>
      alert("Your Submission is waiting for admins\' approval!");
      </script>';
    }

  }
  else {
    echo '<script>
    alert("Location and Destination cannot be same.");
    </script>';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>TGDC -volunteering</title>
  <style>

  .graybox {
    background-color: #f2f1e3;
    border: 1px solid #d3ceb4;
    padding: 10px;
  }
  input[type=text], input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  .type{
    width: 100%;
    padding: 12px 20px;
    background-color: white;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }


  input[type=submit] {
    width: 100%;
    background-color: #61802b;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color:  #86c020;
  }
  </style>
</head>
<body>
  <div class="graybox" align="center">
    <form method="post" target="">
      <table>
        <tr>
          <td ><h1 style="color: #454545">Transport Details</h1></td>
        </tr>
        <tr>
          <td><input type="text" name="name" placeholder="Vehicle Name" required></td>
        </tr>
        <tr> <td>
          <select class="type" name="types" required>
          <option value="">Select One</option>
          <option value="Bus">Bus</option>
          <option value="Train">Train</option>
          <option value="Boat">Boat</option>
          <option value="Others">Others</option>
          </select>
        </td>
        </tr>
      <tr>
        <td><input type="number" name="fare" placeholder="Fare (minimum 5 Taka)" min="5" required></td>
      </tr>
        <tr>
          <td><input type="text" name="location" placeholder="Location" required></td>
        </tr>
        <tr>
          <td><input type="text" name="destination" placeholder="Destination" required></td>
        </tr>
        <tr>
          <td><input type="submit" value="Update"></td>
        </tr>
      </table>
    </form>


  </div>
</body>

<?php require "footer.php"; ?>
