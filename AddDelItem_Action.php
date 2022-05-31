<?php
session_start();

include "inc/Connection.php";
if(!isset($_SESSION['AEmail'])){
  header("location:LogInAdmin.php");
}
if(isset($_POST['Add'])){
    $CategName=$_POST['txtCategoryname'];
    $ProdName=$_POST['txtProductname'];
    $ProdId=$_POST['txtProductId'];
    $price=$_POST['txtPrice'];
    $Desc=$_POST['txtdesc'];
    $imageName=$_FILES['imageFile']['name'];
    $file_tmp=$_FILES['imageFile']['tmp_name'];
	
	$query="INSERT INTO Item (ID,Name,Price,Descr, CategName,Image) VALUES ('$ProdId', '$ProdName', '$price', '$Desc', '$CategName','$imageName')";
	$res = mysqli_query($con,$query) or die (mysqli_error($con));
  move_uploaded_file($file_tmp,"gallery/".$imageName);
	
	header("Location:IndexAdmin.php");

}

if(isset($_POST['Drop'])){
    

    $ID=$_POST['txtProduct-ID'];
    $CT=$_POST['txtCategory-name'];
    $query="DELETE FROM item WHERE ID = '$ID' AND CategName='$CT'";
    $res=mysqli_query($con,$query) or die (mysqli_error($con));
    
	header("Location:IndexAdmin.php");
}



