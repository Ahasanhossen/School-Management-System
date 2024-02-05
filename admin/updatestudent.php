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
<?php
include("conection.php");
error_reporting(0);
$rn = $_GET['rn'];
$fn = $_GET['fn'];
$gn = $_GET['gn'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Update Student</title>
        <link rel="stylesheet" href="../css/updatesub.css">

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
                            <a href="addteacher.php"><i class="fas fa-image"></i><span>Add Teacher</span></a>
                            <a href="manage_teacher.php"><i class="fas fa-image"></i><span>Manage Teacher</span></a>
                            <a href="teachercourse.php"><i class="fas fa-address-card"></i><span>Teacher course assign</span></a>
                            <a href="manage_tcourses.php"><i class="fas fa-address-card"></i><span>Manage Teacher courses</span></a>
                        </div>
                    </li>
                    <li class="item" id="results">
                        <a href="#results" class="menu-btn">
                            <i class="fas fa-poll-h"></i><span> Results <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="addresult.php"><i class="fa fa-plus-square"></i><span>Add Results</span></a>
                            <a href="mange_result.php"><i class="fas fa-tasks"></i><span>Manage Results</span></a>
                            <a href="#"><i class="fas fa-dice-one"></i><span>Individual Result</span></a>
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
                <form class="contact-form" action="updatestudent.php" method="post">
                    <h1>Update Student</h1>
                    <div class="border"></div>
                     <input type="text" value="<?php echo "$rn" ?>" name="class" class="contact-form-text" placeholder="Enter class and section" readonly>
                      <input type="text" value="<?php echo "$fn" ?>" name="sid" class="contact-form-text" placeholder="Enter Student ID">
                       <input type="text" value="<?php echo "$gn" ?>" name="session" class="contact-form-text" placeholder="Enter Session">                     
                      <input type="submit" name="submit" class="contact-form-btn" value="Save">
                    </form>
                  </div>
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

<?php
include("conection.php");
if($_POST['submit'])
{
	$class = $_POST['class'];
    $sid = $_POST['sid'];
	$session = $_POST['session'];
    
	
	$query = "update student set class='$class',sid='$sid',session='$session' where sid='$sid'";
	$data = mysqli_query($con,$query);
	
	if($data)
	{
        echo "<script>alert('Record Updated')
        window.location.href = 'managestudent.php'</script>";
		header('Location:managestudent.php');
	}
	else
	{
		echo "Failed to update record";
	}

}
?>
                           