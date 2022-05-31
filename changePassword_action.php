<?php

include "inc/Connection.php";
session_start();

if(!isset($_SESSION['Email']))
  header("location:LogInAdmin.php");

$NewPass=$_POST['newPassword'];
$Email=$_SESSION['Email'];


$query="UPDATE user SET Password = '$NewPass' WHERE Email='$Email'";
$result=mysqli_query($con,$query);



 
        header("Location:ManageInfo.php?message=The Password Changed successfully");/*Display alert*/

?>