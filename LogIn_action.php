<?php
include "inc/Connection.php";

$Email=$_POST['txtEmail'];
$Password=$_POST['txtPassword'];

$query="SELECT * FROM user WHERE Email='$Email' AND Password='$Password'";

$result=mysqli_query($con,$query) or die(mysqli_error($con));

$resNum=$result->num_rows;

if($resNum == 1){
    session_start();
    $row=$result->fetch_assoc();
    $username =$row['UserName'];
    $email=$row['Email'];
    $_SESSION['UserName']=$username;
    $_SESSION['Email']=$email;
   
    header("Location:Index.php");

}
else{
    
    header("Location:LogIn.php?Invalid=Incorrect Email  or Password");
}


?>