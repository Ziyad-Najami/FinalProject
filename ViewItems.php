<?php
include "inc/Connection.php";
session_start();
if(!isset($_SESSION['AEmail']))
  header("location:loginAdmin.php");
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
<link href="design.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/all.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="page-head">
        <a class="user_sign" href="Adminlogout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</i></a>
        <label><a id="logo" href ="IndexAdmin.php">E-shop</a></label>       
        </div>

<?php

$sql="SELECT * FROM Category";
$result=mysqli_query($con,$sql);
$queryResults=mysqli_num_rows($result);

if($queryResults>0){      
             while($row=mysqli_fetch_assoc($result)){
                echo "<div class='category'>
                <header class='category-title'>".$row['CatName']."</header>";
                $CatName=$row['CatName'];
                $sql1="SELECT * FROM Item where CategName='$CatName' order by ID Desc";
                $result1=mysqli_query($con,$sql1);
                $queryResults1=mysqli_num_rows($result1);
                if($queryResults1>0){
                    while($row=mysqli_fetch_assoc($result1)){
                
                echo "<div class='item'>
                <img src= gallery/".$row['Image'].">
                <div class='desc'>
                    <p>".$row['Name']."</p>
                    <p>USD ".$row['Price']."</p>
                    <p>".$row['Descr']."</p>
                   
                </div>
                
            </div>";}
        }
       echo "</div>"; }
    }
        
?>
  
</body>
</html>