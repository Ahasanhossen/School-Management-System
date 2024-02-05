<?php

	include("conection.php");
    error_reporting(0);
	$id=$_GET['rn'];
	$query="DELETE FROM teacher_course WHERE T_ID='$id'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo "<script>alert('Record Updated')
        window.location.href = 'manage_tcourses.php'</script>";
		header('Location:manage_tcourses.php');
	}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>