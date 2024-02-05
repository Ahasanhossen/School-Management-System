<?php
   session_start();
   if($_SESSION['student_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:Login.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
  $_SESSION['student_login_status']="loged out";
  unset($_SESSION['user_id']);
   header("Location:Login.php");    
   }

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
 
</body>
</html>
 <?php

 if(isset($_POST['go']))
  
 
 {
 
  $_SESSION['user_id']=$id;
 $ename=$_POST['exname'];
  include("conection.php");
  $sql="select  * from result where sid='$id' and exam='$ename' ";
$r=mysqli_query($con,$sql);
  echo "<table id='customers'>";
 echo "<tr>
 <th>ID</th>
 <th>subject</th>
 <th>Exam</th>
 <th>Marks</th>
 <th>Greade</th>
 <th>Greade_point</th>

  </tr>";
    while($row=mysqli_fetch_array($r))
    {
    $id=$row['sid'];
       // $Name=$row['name'];
    $subject=$row['subject_name'];
    $exam=$row['exam'];
    $total=$row['mark'];

if ($total<40) {
      $Greade='F';
      $Gread_point='0.00';
      # code...
    }
    elseif ($total<=49) {
       $Greade='C';
       $Gread_point='1';
      # code...
    }
    elseif ($total<=59) {
       $Greade='B';
       $Gread_point='2';
      # code...
    }
    elseif ($total<=69) {
       $Greade='A-';
       $Gread_point='3';
      # code...
    }
    elseif ($total<=79) {
       $Greade='A';
       $Gread_point='4';
      # code...
    }
    
    elseif ($total>=80) {
       $Greade='A+';
       $Gread_point='5';
      # code...
    }

    echo "<tr>
    <td>$id</td><td>$subject</td><td>$exam</td><td>$total</td><td>$Gread_point</td><td>$Greade</td>
  
  </tr>";

  }
}
   ?>