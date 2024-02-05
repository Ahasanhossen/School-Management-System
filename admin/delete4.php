<?php

	include("conection.php");
    error_reporting(0);
	$T_ID=$_GET['rn'];
	$query="DELETE FROM teacher WHERE T_ID='$T_ID'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo "<script>alert('Record Updated')
        window.location.href = 'manage_teacher.php'</script>";
		header('Location:manage_teacher.php');
	}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>