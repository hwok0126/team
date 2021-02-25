<?php
// Create connection

  $host_name = "localhost";
  $db_user_id = "plato";
  $db_pw = "tjsryWkd123!";
  $db_name = "db";

  $con = mysqli_connect($host_name, $db_user_id, $db_pw, $db_name);
  mysqli_set_charset($con, "utf8");
// Check connection
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
