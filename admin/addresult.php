 <?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:stulogin.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
  $_SESSION['admin_login_status']="loged out";
  unset($_SESSION['user_id']);
   header("Location:index.php");    
   }

?>
 <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
        <title>Add Result</title>
        <link rel="stylesheet" href="../css/updateexam.css">
        <link rel="stylesheet" href="../css/addresult.css">

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
                    <div class="name">Premier School</div>
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
                        <a href="adminpanel.php" class="menu-btn">
                            <i class="fas fa-home"></i><span>Home</span>
                        </a>
                    </li>

                    <li class="item" id="message">
                        <a href="#message" class="menu-btn">
                            <i class="far fa-clock"></i><span>Student Classes<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="createclass.php"><i class="fa fa-plus-square"></i></i><span>Create Class</span></a>
                            <a href="manage_class.php"><i class="fas fa-tasks"></i><span>Manage Classes</span></a>
                        </div>
                    </li>
                    <li class="item" id="exam">
                        <a href="#exam" class="menu-btn">
                            <i class="fab fa-readme"></i><span>Classes Exam<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="createexam.php"><i class="fa fa-plus-square"></i><span>Create Exam</span></a>
                            <a href="manage_exam.php"><i class="fas fa-tasks"></i><span>Manage Exam</span></a>
                        </div>
                    </li>
                    <li class="item" id="subjects">
                        <a href="#subjects" class="menu-btn">
                            <i class="fas fa-book"></i><span>Subjects<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="createsub.php"><i class="fa fa-plus-square"></i></i><span>Create Subject</span></a>
                            <a href="managesub.php"><i class="fas fa-tasks"></i><span>Manage Subjects</span></a>
                            <a href="addsubcom.php"><i class="fa fa-plus-square"></i><span>Add Sbj-Combination</span></a>
                            <a href="managesubcom.php"><i class="fas fa-tasks"></i></i><span>Manage Sbj-Combination</span></a>
                        </div>
                    </li>
                    
                    <li class="item" id="students">
                        <a href="#students" class="menu-btn">
                            <i class="fas fa-user-graduate"></i><span>Students<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="addstudent.php"><i class="fa fa-plus-square"></i><span>Add Students</span></a>
                            <a href="#"><i class="fas fa-tasks"></i><span>Manage Students</span></a>
                        </div>
                    </li>

                    <li class="item" id="teacher">
                        <a href="#teacher" class="menu-btn">
                        <i class="fas fa-chalkboard-teacher"></i><span> Teacher<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="addteacher.php"><i class="fa fa-plus-square"></i><span>Add Teacher</span></a>
                            <a href="mangage_teacher.php"><i class="fas fa-tasks"></i><span>Manage Teacher</span></a>
                            <a href="teachercourse.php"><i class="fas fa-book-open"></i><span>Teacher Course Assign</span></a>
                            <a href="manage_tcourses.php"><i class="fas fa-tasks"></i><span>Manage Teacher Courses</span></a>
                        </div>
                    </li>
                    <li class="item" id="results">
                        <a href="#results" class="menu-btn">
                            <i class="fas fa-poll-h"></i><span> Results <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="addresult.php"><i class="fa fa-plus-square"></i><span>Add Results</span></a>
                            <a href="mange_result.php"><i class="fas fa-tasks"></i><span>Manage Results</span></a>
                            <a href="#"><i class="fas fa-sort-numeric-up-alt"></i><span>Individual Result</span></a>
                        </div>
                    </li>
                    
                    <li class="item" id="settings">
                        <a href="#settings" class="menu-btn">
                            <i class="fas fa-cog"></i><span>Settings <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="adminupdatepass.php"><i class="fas fa-lock"></i><span>Update Password</span></a>
                        </div>
                    </li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
			<div class="main-container">
            <div class="card">
                <div class="contact-section">
                <form class="contact-form" action="addresult.php" method="post">
                    <h1>Add Result</h1>
					<div class="border"></div>  
					<select class="contact-form-text" placeholder="Enter class" name="class">
   <?php
 include("conection.php");

{
  //echo "<form action='addresult.php?action=gog' id='in' method='POST'>";
     //echo "<label>Class</label>
     //<select name='class'>";
     $sql="select distinct class from teacher_course ";
     $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['class'];
        echo "<option value='$type'>$type</option>";
    }
?>
</select>
	<select class="contact-form-text" placeholder="Enter class" name="subject">
 <?php
//echo "<label>Subject</lable>
//<select name='subject'>";
//$id=$_SESSION['teacher_id'];
 $sql="select subject_name from teacher_course ";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['subject_name'];
        echo "<option value='$type'>$type</option>";
    }
  
     //echo "</select>";


   //echo "<input type='submit' name='gog' value='submit' ";
  // echo("</from>");
}
 ?>
 </select>
	<input type="submit" name="gog" class="contact-form-btn" value="Submit">
    </form> <br> <br> <br>
<!------------------------------------------------------------------------------------------------->

<?php
 include("conection.php");
 if(isset($_POST['gog']))
  {
    echo "<form class='pp' action='addresult.php?action=add' id='in' method='POST'>";
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $_SESSION['class']=$class;
    $_SESSION['subject_name']=$subject;
    $sql="select * from student   ";
     $r=mysqli_query($con,$sql);

    echo "<table id='customers'>";
 echo "<tr>
 <th>ID</th>

 <th>Exam</th>
 <th>Subject</th>
 <th>Class</th>
 <th>Mark</th>
 </tr>
 ";
   
     while($row=mysqli_fetch_array($r))
    {
        $id=$row['sid'];
        echo "<tr>
    <td><input type='text' name='id[]' class='contact-form-text' value='$id'></td><td>
 ";
   echo "<select name='ename[]' >";
    include("conection.php");
    $sq="select ename from createexam";
$t=mysqli_query($con,$sq);
 while($row=mysqli_fetch_array($t))
    {
        $type=$row['ename'];
         
          echo "<option value='$type' >$type</option>";
      
       
        }  echo "</select>";
         echo "</td>";
       
   echo" <td><input type='text' name='subject[]' value='$subject' class='contact-form-text' placeholder='Enter Marks'></td><td><input type='text' name='class[]' value='$class' class='contact-form-text' placeholder='Enter exam name'></td><td><input type='text' name='mark[]' class='contact-form-text' placeholder='Enter Marks'></td>
    </tr>";
        
    }
    
    

   /*echo "<label>Classtest</label>
   <input type='text' value='00' name='Classtest'>
<label >Attendance</label>
<input type='text' value='00' name='Attendance'>
<label >Assignment</label>
<input type='text' value='00' name='Assignment'>
<label >Midterm</label>
<input type='text' value='00' name='Midterm'>
<label >Final</label>
<input type='text' value='00' name='Final'>*/

echo "</table>";
echo "<br><input type='submit' value='Add' name='add'</center> ";
    echo "</from>";
}
   ?>
   <?php
     include("conection.php");
   if(isset($_POST['add']))
{
  /*$Department=$_SESSION['Department'];
   $Course=$_SESSION['Course'];
    $ID=$_POST['id'];
    $Attendancenum=$_POST['Attendance'];
    $ct1num=$_POST['Classtest'];
    $Assignmentnum=$_POST['Assignment'];
    $midnum=$_POST['Midterm'];
    $finalnum=$_POST['Final'];
    $total=$Attendancenum+$ct1num+$Assignmentnum+$midnum+$finalnum;
    if ($total<40) {
      $Greade='F';
      $Gread_point='0.00';
      # code...
    }
    elseif ($total<=44) {
       $Greade='D';
       $Gread_point='2';
      # code...
    }
    elseif ($total<=49) {
       $Greade='C';
       $Gread_point='2.25';
      # code...
    }
    elseif ($total<=54) {
       $Greade='C+';
       $Gread_point='2.50';
      # code...
    }
    elseif ($total<=59) {
       $Greade='B-';
       $Gread_point='2.75';
      # code...
    }
    elseif ($total<=64) {
       $Greade='B';
       $Gread_point='3';
      # code...
    }
    elseif ($total<=69) {
       $Greade='B+';
       $Gread_point='3.25';
      # code...
    }
    elseif ($total<=74) {
       $Greade='A-';
       $Gread_point='3.50';
      # code...
    }
    elseif ($total<=79) {
       $Greade='A';
       $Gread_point='3.75';
      # code...
    }
    elseif ($total>=80) {
       $Greade='A+';
       $Gread_point='4';
      # code...
    }
    $query="insert into result values('$ID', '$Department','$Course','$Attendancenum','$ct1num ','$Assignmentnum','$midnum','$finalnum','$total','$Gread_point','$Greade')";
    if(mysqli_query($con,$query))
    {
        echo "Successfully inserted!";
        
    }
    else
    {
        echo "error!".mysqli_error($con) ;
    }
}*/
$data=$_POST;
$count= count($_POST['id']);
for ($i=0; $i <$count ; $i++) { 
   # code... {
$s="insert into result values ('{$_POST['id'][$i]}','{$_POST['class'][$i]}','{$_POST['subject'][$i]}','{$_POST['ename'][$i]}','{$_POST['mark'][$i]}')";
if (mysqli_query($con,$s)
) {echo "Successfully inserted";
    # code...
  }
  else{
   echo "error!".mysqli_error($con) ;
  }  # code...
}
}
?>

<!------------------------------------------------------------------------------------------------->
</div>
            </div>
            </div>

<script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
</script>
  
</body>
</html>
 