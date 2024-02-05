<?php

	include("conection.php");
    error_reporting(0);
	$scode=$_GET['rn'];
	$query="DELETE FROM createsub WHERE scode='$scode'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo "<script>alert('Record Updated')
        window.location.href = 'managesub.php'</script>";
		header('Location:managesub.php');
	}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>