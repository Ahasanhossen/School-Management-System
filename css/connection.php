<?php

     $con = mysqli_connect("localhost","root","","delivery");
     
// Check connection delivery

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>