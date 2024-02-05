<?php

	include("conection.php");
    error_reporting(0);
	$cs=$_GET['rn'];
	$query="DELETE FROM createexam WHERE cs='$cs'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo "<script>alert('Record Updated')
        window.location.href = 'manage_exam.php'</script>";
		header('Location:manage_exam.php');
	}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>