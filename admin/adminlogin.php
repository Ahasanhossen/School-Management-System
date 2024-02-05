<?php
session_start();
?>
<?php
include("conection.php");
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$sql="select ID,Password from admin where ID='$email' and Password='$pass'";
            $r=mysqli_query($con,$sql);
            
            if(mysqli_num_rows($r)>0)
            {
                $_SESSION['user_id']=$email;
                $_SESSION['admin_login_status']="loged in";
                header("Location:adminpanel.php");
            }
            
         
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel = "stylesheet"  href = "../css/adminlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>
<body>

    <span>Premier School</span>

    <div class="form">
	<form action="adminlogin.php" method="POST">

        <h3>Admin Login</h3>

            <div class="email">
            <label>Email</label>
            <input type="email" name="email" class="input" id="" placeholder="Email">
            </div>

            <div class="space"></div>

            <div class="password">
            <label>Password</label>
            <input type="password" name="pass" class="input" id="" placeholder="Password">
            </div>

           <input type="submit" name = "submit" value="Signin" id="button">
	</form>

    </div> 
    
</body>
</html>


