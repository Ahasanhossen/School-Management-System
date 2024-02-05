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

<?php
include("conection.php");
include("../vendor/autoload.php");
$html=" ";
$html.="<from method='POST' action='studentpanel.php?action=pict'>";
$html.= "<div class='sinfo' >";
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
 $html.= "  <div class='row1'>
      <center><h3>Premier School</h3></center>";
 $html.= "</div>";
 //$html.="<center><h3>Premier School</h3></center>";
 $html.="<p><b>Name:</b>$name</br></p>";
 $html.="<p><b>ID:</b>$id</br></p>";
 
 $html.= "</from>";
 ?>
        </div>
        
            <?php
include("conection.php");
include("../vendor/autoload.php");
   //if(isset($_POST['go']))
 {
  include("conection.php");
//$_SESSION['user_id']=$id;
 $ename=$_POST['ename'];
 $class=$_POST['class'];
 $id=$_SESSION['user_id'];
 $html.= " <center><p><b></b>$class</br>&nbsp;&nbsp;&nbsp;<br><b>Exam:</b> $ename</br></p></center>";
 $sql="select  * from result where sid='$id' and exam='$ename' and class='$class' ";
$r=mysqli_query($con,$sql);

$html.='<style  type="text/css">body{
  background-color: white;
} #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;

}#customers td, #customers th {
  border: 1px solid #2F323A;
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2F323A;
  color: white;
  text-align: center;
  
}
.row1{
  text-align: center;
  font-family: sans-serif;
}
</style>';
  $html.= "<table id='customers'>";
 $html.= "<tr>

 <th>Subject</th>
 
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

   $html.= "<tr>
    <td>$subject</td><td>$total</td><td>$Gread_point</td><td>$Greade</td>
  
  </tr>";

  }
  $html.="</table>";
}
$mpdf = new \Mpdf\Mpdf();
  $mpdf -> WriteHTML($html);
  $file = time().'.pdf';
  $mpdf ->output($file, "I"); 

   ?>
            