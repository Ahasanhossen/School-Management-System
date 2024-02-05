<?php
session_start();
?>
<?php
$con = mysqli_connect('localhost','root');

if($con){
    echo "signup sucsessfull";
}else  {
    echo "no connection"; 
}
mysqli_select_db($con,'school');


$id = $_POST['userid'];
$pass = $_POST['userpassword'];
$q = "SELECT * FROM registration where S_ID = '$id' AND BINARY Password = '$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
$q1= "SELECT * FROM teacher where ID = '$id' AND BINARY Password = '$pass'";
$result1 = mysqli_query($con,$q1);
$num1 = mysqli_num_rows($result1);

if($num==1){ $_SESSION['user_id']=$id;
                $_SESSION['student_login_status']="loged in";
                 header('location:dashboard.php');
              }
              else if($num1==1){ $_SESSION['teacher_id']=$id;
                $_SESSION['teacher_login_status']="loged in";
                 header('location:ThHome.php');
              }
             

              $query="SELECT * FROM admin where ID = '$id' AND BINARY Password = '$pass'";
                  $r=mysqli_query($con,$query);

             if(mysqli_num_rows($r)>0){ $_SESSION['admin_id']=$id;
                $_SESSION['admin_login_status']="loged in";
                 header('location:adminpanel.php');
              }
               else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
?>             
