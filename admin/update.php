<?php

	include("connection.php");
    error_reporting(0);
	$Email=$_GET['rn'];
	$query="update addcourier set Status='Canceled' where Email='$Email'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo"The Order is Canceled";
	}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>