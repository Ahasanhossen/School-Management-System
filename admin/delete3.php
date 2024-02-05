<?php

	include("conection.php");
    error_reporting(0);
	$ssub=$_GET['rn'];
	$query="DELETE FROM addcomsub WHERE ssub='$ssub'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo "<script>alert('Record Updated')
        window.location.href = 'managesub.php'</script>";
		header('Location:managesubcom.php');
	}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>