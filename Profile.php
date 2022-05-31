<?php 
include "inc/connection.php";
session_start();
if(!isset( $_SESSION['Email']))
{
  header("location:login.php");
}

  $Email=$_SESSION['Email'];

  $sql="SELECT UserName,Email,Telephone,Age FROM user where Email='$Email'";

  $result=mysqli_query($con,$sql) or die(mysqli_query($con));

  $row=mysqli_fetch_assoc($result);
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="design.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIUProject</title>
</head>

<body>

    <div class="page-head">
    <a class="user_sign" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</i></a>
    <a class="cart_sign" href="Cart.php"><i class="fa fa-shopping-cart"> Cart</i></a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fas fa-bars"></i> </label>
        <label><a id="logo" href="index.php">E-shop</a></label>

        
        <form action="" meghod="post" id="search-form">
            <input id="search-bar" type="search" placeholder="Search">
            <button id="search-icon"><i class="fa fa-search"></i></button>
        </form>


        <div class="sidebar">
            <header style="font-size: 30px;"> Welcome
                <label for="check"><i id="cancel" class="fas fa-times"></i></label>
            </header>
            <ul class="nav-bar">
                <li><a href="Index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="Cart.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>

    </div>

    <?php
        echo "<p id=profile_name>Welcom, ".$_SESSION['UserName']."</p>"
       ?>

    <div class="manage-box">   
    <p>Manage your profile info</p>

        <div class="info">
            <p>Update personal info</p>

            <span><a href="VerifyUser.php">Manage your info</a></span>
            
        </div>

    </div>

    <div class="profile-box">
      <p>View your personal info</p>
      <div class="info">
        <p>Basic info</p>

        <ul>
            <li>Name <?php echo"<p id='content'>".$row['UserName']."</p>"?></li>
            <li>Age <?php echo"<p id='content'>".$row['Age']."</p>"?></li>
        </ul>

      </div>

      <div class="info">
        <p>Contact info</p>

        <ul>
            <li>Email <?php echo"<p id='content'>".$row['Email']."</p>"?></li>
            <li>Phone <?php echo"<p id='content'>".$row['Telephone']."</p>"?></li>
        </ul>

      </div>

    </div>

    <footer>
        <center><p>© Done by Alaa Merhi & Ziad Najami - 2022</p></center>
    </footer>

</body>

</html>