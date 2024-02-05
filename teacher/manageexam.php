<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Manage Exam</title>
        <link rel="stylesheet" href="CSS/manageexam.css">

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
                        <li><a href="#"><i class="fas fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <li class="item">
                        <a href="#" class="menu-btn">
                            <i class="fas fa-home"></i><span>Home</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Profile <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#"><i class="fas fa-image"></i><span>Update Pass</span></a>
                        </div>
                    </li>
                    <li class="item" id="message">
                        <a href="#message" class="menu-btn">
                            <i class="far fa-clock"></i><span> Classes <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            
                            <a href="manageclass.php"><i class="fas fa-address-card"></i><span>View Classes</span></a>
                        </div>
                    </li>
                    <li class="item" id="exam">
                        <a href="#exam" class="menu-btn">
                            <i class="fab fa-readme"></i><span>Classes Exam <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            
                            <a href="manageexam.php"><i class="fas fa-address-card"></i><span> Exam</span></a>
                        </div>
                    </li>
                    <li class="item" id="subjects">
                        <a href="#subjects" class="menu-btn">
                            <i class="fas fa-book"></i><span>Subjects <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#"><i class="fas fa-image"></i><span>View Subject</span></a>
                            
                        </div>
                    </li>
                    
                    <li class="item" id="students">
                        <a href="#students" class="menu-btn">
                            <i class="fas fa-user-graduate"></i><span> Students <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#"><i class="fas fa-image"></i><span>View Students</span></a>
                            
                        </div>
                    </li>
                    <li class="item" id="results">
                        <a href="#results" class="menu-btn">
                            <i class="fas fa-poll-h"></i><span> Results <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#"><i class="fas fa-image"></i><span>Add Results</span></a>
                            <a href="#"><i class="fas fa-address-card"></i><span>Manage Results</span></a>
                            <a href="#"><i class="fas fa-address-card"></i><span>Individual Result</span></a>
                        </div>
                    </li>
                    
                    
                    <li class="item">
                        <a href="#" class="menu-btn">
                            <i class="fas fa-info-circle"></i><span>About</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#" class="menu-btn">
                            <i class="fas fa-phone"></i><span>Contact</span>
                        </a>
                    </li>

                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">
                <div class="card">
                    
                </div>
            </div>
            <!--main container end-->
        </div>
        <!--wrapper end-->

        
        <table id='customers'>";
            echo "<tr>
               <th>Class and section</th>
               <th>Exam</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
        </table>
        
        <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>
<?php
 include("conection.php");
 
 $sql="select * from createexam";
 $r=mysqli_query($con,$sql);
 echo "<table id='customers'>";
 echo "<tr>
    <th>Class and section</th>
    <th>Exam Name</th>
	
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $cs=$row['cs'];
	    $ename=$row['ename'];
	 
		
	    
    echo "<tr>
    <td><center>$cs</center></td><td><center>$ename</center></td>

    </tr>";
    }
	echo "</table>";
?>


    </body>
</html>
                           