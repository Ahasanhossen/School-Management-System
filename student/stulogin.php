<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel = "stylesheet"  href = "../css/stulogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>
<body>

    <span>Premier School</span>
	
	<form id="Login" action="stulogin.php" method="POST">

    <div class="form">
	

        <h3>Student Login</h3>

            <div class="email">
            <label>Student ID</label>
            <input type="input" name="id" class="input" id="" placeholder="Enter ID">
            </div>

            <div class="password">
            <label>Password</label>
            <input type="password" name="pass" class="input" id="" placeholder="Enter Password">
            </div>

            <input type="submit"  name = "submit" value="sign In" id="button">

            <div class="footer">
                <label>Haven't an account ? Please signup first</label>
                <a href="stusignup.php">Signup</a>
            </div>

    </div> 

<?php
include("conection.php");
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$pass=$_POST['pass'];

	$sql1="select S_ID,Password from registration where S_ID='$id' and Password='$pass'";
            $r1=mysqli_query($con,$sql1);
            
            if(mysqli_num_rows($r1)>0)
            {
				 $_SESSION['user_id']=$id;
                 $_SESSION['customer_login_status']="loged in";
                 header("Location:studentpanel.php");
            }
            
         
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
	
}
?>

    
</body>
