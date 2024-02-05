
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <link rel = "stylesheet"  href = "../css/adminlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>
<body>

    <span>Premier School</span>
	
	<form id="Login" action="tealogin.php" method="POST">

    <div class="form">
	

        <h3>Teacher Login</h3>

            <div class="email">
            <label>Teacher ID</label>
            <input type="input" name="userid" class="input" id="" placeholder="Enter ID">
            </div>

            <div class="password">
            <label>Password</label>
            <input type="password" name="userpassword" class="input" id="" placeholder="Enter Password">
            </div>

            <input type="submit"  name = "submit" value="sign In" id="button">

           

    </div> 
<?php
session_start();
?>
<?php
if(isset($_POST['submit']))
{

$con = mysqli_connect('localhost','root');

if($con){
    echo "signup sucsessfull";
}else  {
    echo "no connection"; 
}
mysqli_select_db($con,'school');


$id = $_POST['userid'];
$pass = $_POST['userpassword'];

$q1= "SELECT * FROM teacher where T_ID = '$id' AND BINARY password = '$pass'";
$result1 = mysqli_query($con,$q1);
$num1 = mysqli_num_rows($result1);

               if($num1==1){ $_SESSION['teacher_id']=$id;
                $_SESSION['teacher_login_status']="loged in";
                 header('location:teacherpanel.php');
              }
             

           
               else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
        }
?>             


    

