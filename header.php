<?php session_start() ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <link rel="icon" href="img/favicon.png">
  </head>
  <body>
    <style>
    body {
      background-color:   #f7f9f9;
      margin: 0;}

    h1{
        text-align: center;
        font-size: 150%;
    }
    h2{
        text-align: center;
        font-size: 100%;
    }

    .div-header {
        background-color: #855146;
        color: white;
        width: 100%;
        background-image: url("img/header.jpg");
        background-size: auto auto;
        background-repeat: no-repeat;
    }

    ul.topnav {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    ul.topnav li {float: left;}

    ul.topnav li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    ul.topnav li a:hover:not(.active) {background-color: #111;}

    ul.topnav li a.active {background: red;}

    ul.topnav li.right {float: right;}

    @media screen and (max-width: 600px){
        ul.topnav li.right,
        ul.topnav li {float: none;}
    }
    </style>

    <header>
      <div class="div-header">
      <h1>Transport Guide Dhaka City</h1>
      <h2>Find vehicle for your Destination</h2>
        <ul class="topnav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="volunteer-login.php">Volunteering</a></li>
        <?php 
         if(isset($_SESSION['userRole'])){
           echo '
                <li class="right"><a href="logout.php">Log Out</a></li>';
              }
          
          if(isset($_SESSION['user'])){
              if($_SESSION['userRole']=='admin'){
            echo '
                <li class="right"><a href="approve-entries.php">Admin Panel</a></li>';
              }
            echo '
                <li class="right"><a>Hi, '.$_SESSION['user'].'</a></li>';
              }
        ?>

      </ul>
    </div>
    </header>
    <br>
  </body>
</html>
