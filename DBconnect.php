<?php

class DBconnect
{
  private $host="localhost";
  private $user="id3753684_root";
  private $password="Em*n007";

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
