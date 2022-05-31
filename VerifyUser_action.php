<?php
include "inc/connection.php";
session_start();
if(!isset( $_SESSION['Email']))
{
  header("location:login.php");
}


$confirmation=$_POST['txtConfirm'];
$Email=$_SESSION['Email'];

$sql="SELECT Password FROM user where Email='$Email'";

$result=mysqli_query($con,$sql) or die(mysqli_error($con));

$row=mysqli_fetch_assoc($result);

if($row['Password']==$confirmation){
    header("location:ManageInfo.php");
}
else{
    header("location:VerifyUser.php?Invalid=Incorrect Password");
}




?>