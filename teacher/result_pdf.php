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
<?php 
include("conection.php");
include("../vendor/autoload.php");
if(isset($_POST['submit']))
{


$class=$_POST['class'];
    $subject=$_POST['subject'];
    $ename=$_POST['ename'];
    //$_SESSION['class']=$class;
    $_SESSION['subject_name']=$subject;
     $_SESSION['ename']=$ename;
$sql="select * from result where class='$class' and subject_name='$subject' and exam='$ename'  ";
$r=mysqli_query($con,$sql);


$html=" ";
$html.='<style  type="text/css">body{
  background-color: white;
} #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;

}#customers td, #customers th {
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
</style>';
 
  $html.='<table id="customers">';
 $html.= '<tr>
 <th>ID</th>
 <th>subject</th>
 <th>Exam</th>
 <th>Marks</th>
 <th>Greade</th>
 <th>Greade_point</th>

  </tr>';
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
    <td>$id</td><td>$subject</td><td>$exam</td><td>$total</td><td>$Gread_point</td><td>$Greade</td>
  
  </tr>";
    /* $html.='<tr>
 <td>'.$row['sid'].'</td>
 <td>'.$row['subject_name'].'</td>
  <td>'.$row['exam'].'</td>
   <td>'.$row['mark'].'</td>
   
       </tr>';*/

    }
   
  
   $html.= '</table>';
   $html.= "</from>";
 }
  
    $mpdf = new \Mpdf\Mpdf();
  $mpdf -> WriteHTML($html);
  $file = time().'.pdf';
  $mpdf ->output($file, "I"); 

 ?>