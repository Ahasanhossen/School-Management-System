<?php
   session_start();
   if($_SESSION['student_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:stulogin.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
  $_SESSION['student_login_status']="loged out";
  unset($_SESSION['user_id']);
   header("Location:index.php");    
   }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Student Panel</title>
        <link rel="stylesheet" href="studentpanel.css">

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
                        <a href="studentpanel.php" class="menu-btn">
                            <i class="fas fa-home"></i><span>Home</span>
                        </a>
                    </li>

                    
                   
                    <li class="item" id="subjects">
                        <a href="#subjects" class="menu-btn">
                            <i class="fas fa-book"></i><span>Subjects <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="subject.php"><i class="fas fa-eye"></i><span>View Subjects</span></a>
                            
                        </div>
                    </li>
                    
                    <li class="item" id="students">
                        <a href="viewresult.php" class="menu-btn">
                        <i class="fas fa-poll"></i><span>View Results</span>
                        </a>
                    </li>
					
					<li class="item" id="settings">
                        <a href="#settings" class="menu-btn">
                            <i class="fas fa-cog"></i><span>Settings <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="updatestupass.php"><i class="fas fa-lock"></i><span>Update Password</span></a>
                        </div>
                    </li>
                             
                    
                    

                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">
                <div class="card">
                <div class="contact-section">
                <h1>Details</h1> 
                <form class="contact-form" action="createclass.php" method="post">
                                      
<div class="sinfo" >

<?php
include("conection.php");
echo "<from method='POST' action='studentpanel.php?action=pict'>";
echo "<div class='sinfo' >";
$id=$_SESSION['user_id'];
$qy="select  Fname,Email,Phone  from  registration where S_Id='$id' ";
$r=mysqli_query($con,$qy);
 $row=mysqli_fetch_assoc($r);
 $name=$row['Fname'];
 //$image=$row['image'];
 //$adds=$row['Preaddress'];
 $mbl=$row['Phone'];
 $email=$row['Email'];
 //$Department=$row['Department'];
 echo "<b> Name: </b>$name.";
 
 echo "  <div class='row'>
      <p><b>Mobile:</b> $mbl</br><b>Email:</b> $email</br></p>";
 echo "</div>";
 echo "</from>";
 ?>
        </div>
        
                
            </div>

</form>
</div>
            <!--main container end-->
     </div>
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
                           