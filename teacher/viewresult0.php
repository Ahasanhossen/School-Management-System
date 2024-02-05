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
        <title>View Results</title>
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
                <form action='viewresult.php?action=gog' id='in' method='POST'>
                    <h1>View Results</h1>
					<div class="border"></div>
					<select class="contact-form-text" placeholder="Enter class and section" name="class">
   <?php
 include("conection.php");

{
  //echo "<form action='viewresult.php?action=gog' id='in' method='POST'>";
     //echo "<label>Class</label>
     //<select name='class'>";
     $id=$_SESSION['teacher_id'];
     $sql="select distinct class from teacher_course where T_ID='$id'";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['class'];
        echo "<option value='$type'>$type</option>";
    }
    //echo "</select>";
}
?>
</select>

<select class="contact-form-text" placeholder="Enter Subject" name="subject">

<?php
 include("conection.php");
{
//echo "<label>Subject</lable>
//<select name='subject'>";
 $id=$_SESSION['teacher_id'];
 $sql="select subject_name from teacher_course where T_ID='$id'";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['subject_name'];
        echo "<option value='$type'>$type</option>";
    }
  
     //echo "</select>";
}
?>
</select>

<select class="contact-form-text" placeholder="Enter Subject" name="ename">

<?php
 include("conection.php");
{
     //echo "<label>Exam</lable>
     //<select name='ename'>";
 $id=$_SESSION['teacher_id'];
 $sql="select ename from createexam  ";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['ename'];
        echo "<option value='$type'>$type</option>";
    }
  
     //echo "</select>";
}
?>
</select>


   <input type='submit' name='gog' value='Submit'>
   </form>

   <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
</script>