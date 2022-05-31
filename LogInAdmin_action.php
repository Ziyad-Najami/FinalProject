<?php
include "inc/Connection.php";



$Email=$_POST['txtEmail'];
$Password=$_POST['txtPassword'];

$query="SELECT * FROM admin WHERE Email='$Email' AND Password='$Password'";

$result=mysqli_query($con,$query) or die(mysqli_error($con));

$resNum=$result->num_rows;

if($resNum == 1){
    session_start();
    $row=$result->fetch_assoc();
    $username =$row['Email'];
    $_SESSION['AEmail']=$username;
   
    header("Location:IndexAdmin.php");
    

}
else{
    
    header("Location:LogInAdmin.php?Invalid=Incorrect Email or Password.");
}




?>