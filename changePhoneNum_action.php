<?php

include "inc/Connection.php";
session_start();

if(!isset($_SESSION['Email']))
  header("location:LogInAdmin.php");

$NewPhone=$_POST['PhoneNum'];
$Email=$_SESSION['Email'];


$query="UPDATE user SET Telephone = '$NewPhone' WHERE Email='$Email'";
$result=mysqli_query($con,$query);



 
        header("Location:ManageInfo.php?message=The Phone Number Changed successfully");/*Display alert*/

?>