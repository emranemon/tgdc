<?php

class DBconnect
{
  private $host="localhost";
  private $user="root"; //your phpmyadmin user name
  private $password=""; //your phpmyadmin password

  public function connect_db($db)
  {
    if(strlen($db))
    {
      $con = mysqli_connect($this->host, $this->user, $this->password, $db);
    }
    else{
      $con = mysqli_connect($this->host, $this->user, $this->password);
    }

    return $con;
  }
}

?>
