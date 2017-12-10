<?php require "header.php";

 require "DBconnect.php";
 $con = new DBconnect();
 $link = $con->connect_db("id3753684_db");

 if(isset($_SESSION['userRole']))
 {
/*   header("Location: volunteering.php");
   exit(); */
   echo "<script>window.location = 'volunteering.php'</script>";

 }

 if(isset($_POST['login']))
 {
   $username = $_POST['email'];
   $password = $_POST['password'];
   $sql="SELECT * FROM `userinfo` WHERE
   UPPER(email)=UPPER('$username')
   AND password='$password'";
   if($result=mysqli_query($link, $sql))
   {
     if(mysqli_num_rows($result)==1)
     {
       while($row=mysqli_fetch_array($result))
       {
         $_SESSION['user'] = $row['name'];
         $_SESSION['userRole'] = $row['role'];
       } /*
       header("Location: volunteering.php");
       exit(); */
       echo "<script>window.location = 'volunteering.php'</script>";

     }
   }
 }
 if(isset($_POST['signup']))
 {
   if($_POST['password'] == $_POST['confirmpassword'])
   {
     $name = $_POST['name'];
     $username = $_POST['email'];
     $password = $_POST['password'];
     $role = 'volunteer';
     $sql = "INSERT INTO `userinfo` (`name`, `email`, `password`, `role`)
     VALUES ('$name', '$username', '$password', '$role')";
     if(mysqli_query($link, $sql))
     {
       $_SESSION['user'] = $name;
       $_SESSION['userRole'] = $role;
  /*     header("Location: volunteering.php");
       exit();*/
       echo "<script>window.location = 'volunteering.php'</script>";

     }
   }
 }

 ?>


<html>
<head>
  <title>TGDC - Login</title>
  <style>
  .graybox {
    background-color: #f2f1e3;
    border: 1px solid #d3ceb4;
    padding: 10px;
  }
 .signup{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  .login {
    width: 70%;
    padding: 6px 10px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
  }

  .signup-btn {
    width: 100%;
    background-color: #855146;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  .login-btn {
    width: 100%;
    background-color: #855146;
    color: white;
    padding: 6px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 2px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #54413c;
  }
</style>

<body>
  <div class="graybox" align="center">
    <form method="post" target="">
      <table style="text-align: center;">
        <tr>
          <td colspan="3"><h1 style="color: #454545">Log in as volunteer</h1></td>
        </tr>
        <tr>
          <td>Em@il</td>
          <td>Password</td>
        </tr>
        <tr>
          <td><input class="login" type="email" name="email" required></td>
          <td><input class="login" type="password" name="password" required></td>
          <td><input class="login-btn" type="submit" name="login" value="Log In"></td>
        </tr>
          <td colspan="3"><h2 style="color: #454545">Don't have account? Register below.</h2></td>
        <tr>
        </tr>
      </table>
    </form>
  </div>

<br>

  <div class="graybox" align="center">
    <form method="post" target="">
      <table style="text-align: center;">
        <tr>
          <td><h1 style="color: #454545">Be a volunteer</h1></td>
        </tr>
        <tr>
          <td><input class="signup" type="text" name="name" placeholder="Your Name" required></td>
        </tr>
        <tr>
          <td><input class="signup" type="email" name="email" placeholder="Your Em@il" required></td>
        </tr>
        <tr>
          <td><input class="signup" type="password" name="password" placeholder="New Password" required></td>
        </tr>
        <tr>
          <td><input class="signup" type="password" name="confirmpassword" placeholder="Confirm Password" required></td>
        </tr>
        <tr>
          <td><input class="signup-btn" type="submit" name="signup" value="Sign Up"></td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>

<?php require "footer.php"; ?>
