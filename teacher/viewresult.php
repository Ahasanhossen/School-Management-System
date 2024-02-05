<?php
   session_start();
   if($_SESSION['teacher_login_status']!="loged in" and ! isset($_SESSION['teacher_id']) )
    header("Location:tealogin.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
  $_SESSION['teacher_login_status']="loged out";
  unset($_SESSION['teacher_id']);
   header("Location:index.php");    
   }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Result</title>
        <link rel="stylesheet" href="../css/manage_class.css">
		<link rel="stylesheet" href="../css/addresult.css">
        <link rel="stylesheet" href="../css/save.css">
        <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    </head>
<body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="name"> Premier School </div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <ul>
                        <li><a href="#"><i class="fas fa-search"></i></a></li>
                        <li><a href="#"><i class="fas fa-bell"></i></a></li>
                        <li><a href="?sign=out"><i class="fas fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <li class="item">
                        <a href="teacherpanel.php" class="menu-btn">
                            <i class="fas fa-home"></i><span>Home</span>
                        </a>
                    </li>
					
					<li class="item" id="subjects">
                        <a href="#subjects" class="menu-btn">
                            <i class="fas fa-book"></i><span>Subjects<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="courses.php"><i class="fas fa-eye"></i><span>View Subjects</span></a>
                            
                        </div>
                    </li>
					
					<li class="item" id="exam">
                        <a href="#exam" class="menu-btn">
                            <i class="fab fa-readme"></i><span>Exam<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="viewexam.php"><i class="fas fa-eye"></i><span>View Exam</span></a>
                            
                        </div>
                    </li>

                    <li class="item" id="results">
                        <a href="#results" class="menu-btn">
                            <i class="fas fa-poll-h"></i><span> Results <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="addresult.php"><i class="fa fa-plus-square"></i><span>Add Results</span></a>
                            <a href="viewresult0.php"><i class="fas fa-sort-numeric-up-alt"></i><span>View Results</span></a>
                            
                        </div>
                    </li>
					
					<li class="item" id="settings">
                        <a href="#settings" class="menu-btn">
                            <i class="fas fa-cog"></i><span>Settings <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="updateteapass.php"><i class="fas fa-lock"></i><span>Update Password</span></a>
                        </div>
                    </li>

                    
                    
                    
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">
                <div class="card">

                <?php 
include("conection.php");
if(isset($_POST['gog']))
  {
    echo "<form class='save' action='viewresult_test.php?action=add' id='in' method='POST'>";
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $ename=$_POST['ename'];
    //$_SESSION['class']=$class;
    $_SESSION['subject_name']=$subject;
     $_SESSION['ename']=$ename;
$sql="select * from result where class='$class' and subject_name='$subject' and exam='$ename'  ";
$r=mysqli_query($con,$sql);
  echo "<table id='customers'>";
 echo "<tr>
 <th>ID</th>
 <th>Subject</th>
 <th>Exam</th>
 <th>Marks</th>
 <th>GPA</th>
 <th>Grade</th>

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

    
  echo $html= "<form action='viewresult_test.php' method='POST'>";  
    echo "<tr>
    <td>$id</td><td>$subject</td><td>$exam</td><td>$total</td><td>$Gread_point</td><td>$Greade</td>
  
  </tr>";
 
    }
    
    //echo "<from action='viewresult_test.php' method='POST' ";
     
    // echo "</form>";
     echo "<input type='text' name='class' class='contact-form-text' value='$class' readonly hidden >";
     echo "<input type='text' name='subject' class='contact-form-text' value='$subject' readonly hidden >";
     echo "<input type='text' name='ename' class='contact-form-text' value='$ename' readonly hidden >";
    
  
    //echo "inserted";echo "</table>";
}
  
 ?> 
  </form>  
  <input type='submit' name='submit' class='contact-form-btn' value='Save'> 
                </div>
            </div>
            <!--main container end-->
        </div>
        <!--wrapper end-->



<script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>
</body>
</html>