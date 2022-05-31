<?php
include "inc/Connection.php";

$UserName=$_POST['txtName'];
$Email=$_POST['txtEmail'];
$Password=$_POST['txtPassword'];
$TelePhone=$_POST['txtPhone'];
$Age=$_POST['txtAge'];

$query="SELECT * FROM user WHERE UserName='$UserName' OR  Email='$Email' ";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0){
 
        header("Location:SignUp.php?Error=The Username or Email are Used choose another one");/*Display alert*/
}
else
{
    $query="INSERT INTO user(UserName,Email,Password,Telephone,Age) VALUES('$UserName','$Email','$Password','$TelePhone','$Age')";
mysqli_query($con,$query);
    header("Location:LogIn.php");

}
?>

