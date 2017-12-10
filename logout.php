<?php

session_start();

if(isset($_SESSION['userRole']))
{
    session_unset($_SESSION['userRole']);
}
if(isset($_SESSION['user']))
{
    session_unset($_SESSION['user']);
}

echo "<script>window.location = 'volunteer-login.php'</script>";

/*
header("Location: volunteer-login.php");
exit(); */
 ?>
