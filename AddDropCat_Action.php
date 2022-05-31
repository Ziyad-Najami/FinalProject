<?php
session_start();
include "inc/Connection.php";
if(!isset($_SESSION['AEmail'])){
  header("location:LogInAdmin.php");
}
$_POST['txtCategory'];
$_POST['Add/Drop'];


if(!empty($_POST['txtCategory'] ))
{ $query="Select * From category where CatName='".$_POST['txtCategory']."'";
    $res=mysqli_query($con,$query);
    $counter=$res->num_rows;
    echo $counter;
    echo $_POST['txtCategory'];
    echo $_POST['Add/Drop'];
    if($_POST['Add/Drop'] == 'Add'){
        if($counter == 0){
        $query="INSERT INTO category (CatName) Values ('".$_POST['txtCategory']."')";
        mysqli_query($con,$query);
        header("Location:IndexAdmin.php");
        }}
        else {
            if($_POST['Add/Drop'] == 'Add'){
                if($counter > 0){
                    header("Location:IndexAdmin.php?message=The Category Is inserted");
            
        }
        }
        }


        if($_POST['Add/Drop'] == 'Drop'){
            if($counter > 0){
                $del = $_POST['txtCategory'];
                $query="DELETE FROM category WHERE CatName = '$del'";
                mysqli_query($con,$query);
                header("Location:IndexAdmin.php");
            }
            else{
                if($_POST['Add/Drop'] == 'Drop'){
                if($counter == 0){
                    header("Location:IndexAdmin.php?message=There is no category with that Name");
              
                }}
            }
        }
}


?>