<?php

     $con = mysqli_connect('localhost','root','','school_management_system(1)');
     
// Check connection delivery

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>