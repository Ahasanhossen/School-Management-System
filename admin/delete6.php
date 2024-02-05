<?php

	include("conection.php");
    error_reporting(0);
	$sid=$_GET['rn'];
	$query="DELETE FROM student WHERE sid='$sid'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo "<script>alert('Record Updated')
        window.location.href = 'managestudent.php'</script>";
		header('Location:managestudent.php');
	}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>