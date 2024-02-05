<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel = "stylesheet"  href = "../css/stusignup.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>
<body>
	<form class="contact-form" action="stusignup.php" method="post">
    
    <span>Premier School</span>

    <div class="form">

        <h3>Student Signup</h3>
            
            <div class="email">
            <label>Student ID</label>
            <input type="text" name="id" class="input"  placeholder=" Enter Student ID">
            </div>
			
			<div class="email">
            <label>Student First Name</label>
            <input type="text" name="name1" class="input"  placeholder="Enter Student First Name">
            </div>
			
			<div class="email">
            <label>Student Last Name</label>
            <input type="text" name="name2" class="input"  placeholder="Enter Student Last Name">
            </div>

            <div class="email">
            <label>Present Address</label>
            <input type="text" name="present_address" class="input" placeholder="Enter Present Location">
            </div>
			
			<div class="email">
            <label>Permanent Address</label>
            <input type="text" name="permanent_address" class="input" placeholder="Enter Permanent Location">
            </div>

            <div class="email">
            <label>DOB</label>
            <input type="date" name="dob" class="input"  placeholder="Date of birth">
            </div>

            <div class="gender">
            <label>Gender</label>
            <input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
            </div>
			
			<div class="email">
            <label>Phone Number</label>
            <input type="text" name="number" class="input"  placeholder=" Enter phone number">
            </div>
			
			

            <div class="email">
            <label>Email</label>
            <input type="email" name="email" class="input"  placeholder="Email">
            </div>


            <div class="password">
            <label>Password</label>
            <input type="password" name="password" class="input"  placeholder="Password">
            </div>


            <div class="password">
            <label>Retype Password</label>
            <input type="password" name="password" class="input"  placeholder="Confirm Password">
            </div>

            

            <input type="submit" class="btn" value="Register" name="signup">

    </div> 
<?php

session_start();


$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'school');

if (isset($_POST['signup'])){


$id = $_POST['id'];
$password = $_POST['password'];
$fname = $_POST['name1'];
$lname = $_POST['name2'];
$number = $_POST['number'];
$email = $_POST['email'];
$permanentaddrss = $_POST["permanent_address"];
$presentaddress = $_POST["present_address"];
$dob = $_POST['dob'];
//$Department = $_POST['Department'];
$Gender = $_POST['gender'];




    $qy = "insert into registration(S_ID, Password, Fname,Lname, Phone, Email, permanent_address, Present_address, DOB, Gender ) values ('$id', '$password', '$fname','$lname', '$number', '$email', '$permanentaddrss', '$presentaddress', '$dob', '$Gender')" ;
    mysqli_query($con,$qy);
    header('location:stulogin.php');
	
	if($con){
    echo "signup sucsessfull";
}else  {
    echo "no connection"; 
}

}
?>
</body>
</html>
