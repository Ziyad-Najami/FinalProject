<?php

include "inc/Connection.php";
session_start();

if(!isset($_SESSION['Email']))
  header("location:LogInAdmin.php");

$UserName=$_POST['new-name'];
$Email=$_SESSION['Email'];


$query="UPDATE user SET UserName = '$UserName' WHERE Email='$Email'";
$result=mysqli_query($con,$query);



 
        header("Location:ManageInfo.php?message=The Username Changed successfully");/*Display alert*/

?>