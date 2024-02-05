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
        <title>Add Result</title>
        <link rel="stylesheet" href="../css/addresult.css">
		<link rel="stylesheet" href="../css/createclass.css">

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
                <div class="contact-section">
                <form action='addresult.php?action=gog' id='in' method='POST'>
                    <h1>Add Result</h1>
					<div class="border"></div>
					<select class="contact-form-text" placeholder="Enter class" name="class">
  
   <?php
 include("conection.php");
{
     $id=$_SESSION['teacher_id'];
     $sql="select distinct class from teacher_course ";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['class'];
        echo "<option value='$type'>$type</option>";
    }
}
?>
</select>
	<select class="contact-form-text" placeholder="Enter class" name="subject">
  
<?php
 include("conection.php");
{
 $id=$_SESSION['teacher_id'];
 $sql="select subject_name from teacher_course";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['subject_name'];
        echo "<option value='$type'>$type</option>";
    }
}
?> 
</select>
 <select class="contact-form-text" placeholder="Enter class" name="ename">
 
 <?php
 include("conection.php");
{
 $id=$_SESSION['teacher_id'];
 $sql="select ename from createexam  ";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['ename'];
        echo "<option value='$type'>$type</option>";
    }
	
}
 ?>
</select>


   <input type='submit' name='gog' value='Submit'>
</form> <br> <br> <br>
 
 <?php
 include("conection.php");
 if(isset($_POST['gog']))
  {
    echo "<form class='pp' action='addresult.php?action=add' id='in' method='POST'>";
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $ename=$_POST['ename'];
    //$_SESSION['class']=$class;
    $_SESSION['subject_name']=$subject;
     $_SESSION['ename']=$ename;
    $sql="select * from student  where class='$class'";
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
    <td><input type='text' name='id[]' class='contact-form-text' value='$id' readonly></td>
 ";
/*echo "<select name='ename[]' >";
    include("conection.php");
    $sq="select ename from createexam";
$t=mysqli_query($con,$sq);
 while($row=mysqli_fetch_array($t))
    {
        $type=$row['ename'];
         
          echo "<option value='$type' >$type</option>";
      
       
        }  echo "</select>";
         echo "</td>";*/
       
   echo" <td><input type='text' name='ename[]' value='$ename' class='contact-form-text' placeholder='Enter exam name' readonly></td><td><input type='text' name='subject[]' value='$subject' class='contact-form-text' placeholder='Enter exam name' readonly></td><td><input type='text' name='class[]' value='$class' class='contact-form-text' placeholder='Enter exam name' readonly></td><td><input type='text' name='mark[]' class='contact-form-text' placeholder='Enter exam name'></td>
    </tr>";
        
    }
    
    

   /*echo "<label >Classtest</label>
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
  <body>
  </html>
 