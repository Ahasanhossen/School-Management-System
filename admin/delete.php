<?php

	include("conection.php");
    error_reporting(0);
	$cnumeric=$_GET['rn'];
	$query="DELETE FROM createclass WHERE cnumeric='$cnumeric'";
	$data=mysqli_query($con,$query);
	if ($data)
	{
		echo "<script>alert('Record Deleted')
        window.location.href = 'manage_class.php'</script>";
		}
	else
	{
		echo"<font size='bold'>Failed to delete record";
	}
?>