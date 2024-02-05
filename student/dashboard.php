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
	<title>Home page</title>
	<link rel="stylesheet" href="css/hstyle.css" type="text/css">
        <div class="header">
    
        
    <div class="inner_header">
        
        <div class="logo_container">
    
        
            
            <h1><center>Result Management System </center></h1>
        
        <ul class="navigation">
            
                <a href=""><li>Home</li></a>
                <a href=""><li>Contact</li></a>
                <a href=""><li>About</li></a>
                <a href="?sign=out"><li>Logout</li></a>
                <a href="changepassword.php"><li>Changepassword</li></a>
            </ul>

        </div>

        
</div>
    
</div>
 <style type="text/css">
body{
  background-color: #00011111;
}
    #but{
      
    }
    #form{
      text-align: center;
    }
    input[type=submit]:hover{
background-color:aqua;
    color:black;

}
input[type=submit]{
padding: 8px 50px;
background-color:red;
 border-radius: 10px;
}
#but1:hover{
background-color:aqua;
    color:black;}
    #but2:hover{
background-color:aqua;
    color:black;
  }

#but1{
  padding: 30px 100px;
background-color:#17d68bb3;
 border-radius: 60px;
 border: none;

}
#but2{
  padding: 30px 100px;
background-color:#1ae84c;
 border-radius: 60px;
 border-style: none;

}
    #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;

}

#customers td, #customers th {
  border: 1px solid #69a07c;
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #1e7d6a;
  color: white;
  text-align: center;
  
}
#div1{
  background-color: blue;
  margin-right: 0%;
  padding-right: 100px;
  padding-left: 400px;
}
#in{
  text-align: center;
  float: right;
  margin-top: 10px;
  margin-right: 250px;
  }
  </style>

</head>
 <div>
<body>

<form action="dashboard.php" id="fom" method="POST">

  <div id="div1">
   
   
    <input type="submit" value="Check Result" id='but1' name="scourse">
 

    <input type="submit" value="View Course" id="but2" name="tcourse">

 
 </div>
</form>
<?php
include("conection.php");
echo "<from method='POST' action='dashboard.php?action=pict'>";
echo "<div>";
$id=$_SESSION['user_id'];
$qy="select  name,Preaddress,Email,Mobile,Department  from signin  where id='$id'";
$r=mysqli_query($con,$qy);
 $row=mysqli_fetch_assoc($r);
 $name=$row['name'];
 //$image=$row['image'];
 //$adds=$row['Preaddress'];
 $mbl=$row['Mobile'];
 $email=$row['Email'];
 $Department=$row['Department'];
 echo "<h3> Name:$name.</h3>";
 
 echo "  <div class='row'>
      <p><b>Department:</b> $Department</br><b>Mobile No:</b> $mbl</br><b>Email:</b> $email</br></p>";
 echo "</div>";
 echo "</from>";
 ?>
 <?php
/*include("conection.php");
echo "<from method='POST' action='dashboard.php'>";
echo "  <div class='row'>
    <div class='col-25'>
      <label for='image'>Picture</label>
    </div>
    <div class='col-75'>
      <input type='file' id='image' name='pic'>
      <input type='submit' value='submit' name='pict'>
    </div>
  </div>";
  echo "<from>";
if(isset($_POST['pict']))
{
  $ext= explode(".",$_FILES['pic']['name']); 
    $c=count($ext);
    $ext=$ext[$c-1]; 
    $date=date("D:M:Y");
    $time=date("h:i:s");
    $image_name=md5($date.$time.$cus_id); 
    $image=$image_name.".".$ext;
   $qy="insert into signin (image) values ('$image') where id='$id'";
    mysqli_query($con,$qy);
}*/
?>
<?php
include("conection.php");
if(isset($_POST['scourse']))
{
  echo "<form action='dashboard.php' method='POST' id='in'>";
     echo "<label>Department</label>
     <select name='dep'>";
     $sql="select distinct Department from signin";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['Department'];
        echo "<option value='$type'>$type</option>";
    }
    
echo "</select>";
echo "<label>Session</lable>
<select name='Session'>";
$id=$_SESSION['user_id'];
 $sql="select distinct Session from student_enroll where S_id='$id'";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['Session'];
        echo "<option value='$type'>$type</option>";
    }
    echo "</select>";
    echo "
    <input type='submit' name='go' value='submit' ";
   echo("</from>");
 }
 if(isset($_POST['go']))
 {
  //$Course=$_POST['Course'];
  //$id=$_POST['id'];
  $session=$_POST['Session'];
  $id=$_SESSION['user_id'];
 $query = "select * from  result where Student_id='$id' " ;
 $query1="SELECT sum(Total) AS Totalnumber, avg(Gread_Point) AS Gread_point FROM result where Student_id='$id'";
 $r1=mysqli_query($con,$query1);
while($row=mysqli_fetch_assoc($r1)){
  
  $output="Obtained Number:"." ".$row['Totalnumber'];
  $output1="Obtained Grade:"." ".$row['Gread_point'];
  $Gread2=$row['Gread_point'];
    
}


      
    if ($Gread2<=0.00) {
      # code...
       $Greade='F';
    }
    elseif ($Gread2<=2.00) {
      # code...
       $Greade='D';
    }
    elseif ($Gread2<=2.24) {
      # code...
       $Greade='C';
    }
    elseif ($Gread2<=2.74) {
       $Greade='C+';
      # code...
    }
    elseif ($Gread2<=2.99) {
       $Greade='B-';
      # code...
    }
    elseif ($Gread2<=3.24) {
       $Greade='B';
     
      # code...
    }
    elseif ($Gread2<=3.49) {
       $Greade='B+';
      
      # code...
    }
    elseif ($Gread2<=3.74) {
       $Greade='A-';
      # code...
    }
    elseif ($Gread2<=3.99) {
       $Greade='A';
       
      # code...
    }
    elseif ($Gread2=4) {
       $Greade='A+';
      # code...
    }
    $netgread="Obtained Grade Letter:"." ".$Greade;

     $r=mysqli_query($con,$query);
  echo "<table id='customers'>";
 echo "<tr>
 <th>ID</th>
 <th>Department</th>
 <th>Course</th>
 <th>Attendance</th>
 <th>Assignment</th>
 <th>Classtest</th>
 <th>Midterm</th>
 <th>Final</th>
 <th>Total Marks</th>
 <th>Grade Point</th>
 <th>Grade Letter</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
    $id=$row['Student_id'];
       // $Name=$row['name'];
    $Department=$row['Department'];
    $Course=$row['Course'];
    $Attendance=$row['Attendance'];

$Assignment=$row['Assignment'];

$Classtest=$row['CT1'];

$Midterm=$row['Midterm'];
$Final=$row['Final'];
$Total=$row['Total'];
$Gread_Point=$row['Gread_Point'];
$Gread=$row['Gread Leater'];

    
   
    echo "<tr>
    <td>$id</td><td>$Department</td><td>$Course</td><td>$Attendance</td><td>$Assignment</td><td>$Classtest</td><td>$Midterm</td><td>$Final</td><td>$Total</td><td>$Gread_Point</td><td>$Gread</td>
  
  </tr>";
  

     

}
echo "<tr  ><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td  ><b>$output</b></td><td><b>$output1</b></td><td><b>$netgread</b></tr>";
    
  echo "</table>";

  }

   ?>
   
   <?php
include("conection.php");
if(isset($_POST['tcourse']))
{
  echo "<form action='dashboard.php' method='POST' id='in'>";
     echo "<label>Session</label>
     <select name='Session'>";
     $id=$_SESSION['user_id'];
     $sql="select distinct Session from student_enroll where S_id='$id' ";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $type=$row['Session'];
        echo "<option value='$type'>$type</option>";
    }
echo "</select>";

  echo "<input type='submit' name='gog' value='submit' ";
   echo("</from>");
 }
 if(isset($_POST['gog']))
 {
  //$Course=$_POST['Course'];
  //$id=$_POST['id'];
  $session=$_POST['Session'];
   $id=$_SESSION['user_id'];
  //$section=$_POST['section'];
 $qy = "select Course,Session from student_enroll where Session='$session' and S_id='$id' " ;
    //mysqli_query($con,$qy);
    $r=mysqli_query($con,$qy);
  echo "<table id='customers'>";
 echo "<tr>
 <th>Course</th>
 <th>Session</th>

  </tr>";
    while($row=mysqli_fetch_array($r))
    {
  
    $Session=$row['Session'];
    $Course=$row['Course'];
    
    
    echo "<tr>
    <td>$Course</td><td>$Session</td>
  
  </tr>";

    }
  echo "</table>";
}
   ?>
   <?php
   if(isset($_POST['senroll']))
{
  //$c=$_POST['catg'];
  
  $query="select S_id,name,Department, Course from signin,student_enroll where signin.id=student_enroll.S_id";
  $r=mysqli_query($con,$query);
  echo "<table id='customers'>";
 echo "<tr>
 <th>ID</th>
 <th>Name</th>
 <th>Department</th>
 <th>Course</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
    $id=$row['S_id'];
        $Name=$row['name'];
    $Department=$row['Department'];
    $Course=$row['Course'];
      
    echo "<tr>
    <td>$id</td><td>$Name</td><td>$Department</td><td>$Course</td>
  
  </tr>";

    }
  echo "</table>";
}
?>
<?php
   if(isset($_POST['tenroll']))
{
  //$c=$_POST['catg'];
  
  $query="select * from teacher_enroll ";
  $r=mysqli_query($con,$query);
  echo "<table id='customers'>";
 echo "<tr>
 <th>ID</th>
 <th>Course</th>
 <th>Session</th>
 <th>Section</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
    $id=$row['T_ID'];
        $Name=$row['Course'];
    $Department=$row['Session'];
    $Course=$row['Section'];
    
  
    echo "<tr>
    <td>$id</td><td>$Name</td><td>$Department</td><td>$Course</td>
  
  </tr>";
  
    }
  echo "</table>";
}
?>



</body>
</html>
