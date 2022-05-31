<?php
session_start();
include "inc/Connection.php";
if(!isset($_SESSION['Email'])){
  header("location:LogIn.php");
}
$Category = $_GET['category'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="design.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <title>Document</title>
</head>
<body>
    
<div class="page-head">
        <a class="user_sign" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</i></a>
        <a class="cart_sign" href="Cart.php"><i class="fa fa-shopping-cart"> Cart</i></a>
        <a class="user_sign" href="Profile.php"><i class="fa fa-user-circle"> Profile </i></a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fas fa-bars"></i></label>
        <label><a id="logo" href="index.php">E-shop</a></label>
        <form action="Search.php" method="post" id="search-form">
            <input id="search-bar" type="search" placeholder="Search" name="search">
            <button id="search-icon"><i class="fa fa-search"></i></button>
        </form>
  

        <div class="sidebar">
            <header style="font-size: 30px;"> Welcome
                <label for="check"><i id="cancel" class="fas fa-times"></i> </label>
            </header>
            <ul class="nav-bar">
                <li><a href="Cart.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
                <li><a href="Profile.php"><i class="fa fa-user-circle"></i>Profile</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>
    
    </div>
   <?php
    echo "<div>";
   echo "<h2 class='category-title'>".$Category."</h2>";
   $sql1="SELECT * FROM Item where CategName='$Category '";
   $result1=mysqli_query($con,$sql1);
   $queryResults1=mysqli_num_rows($result1);
   if($queryResults1>0){
       while($row=mysqli_fetch_assoc($result1)){
   ?>
    <div class='item'>

    <form method="post" action="Cart.php?action=add&id=<?php echo $row['ID']; ?>">
    
    <img src="<?php echo"gallery/".$row['Image'];?>"/> <center>
    <label><b><?php echo $row['Name']?></b></label>
    <br>
    
    <label><b>$<?php echo $row['Price']?></b></label>
    <br>
    
     <input type="number" name="quantity" value="1" />
    <input type="hidden" name="hidden_name" value="<?php echo $row['Name']; ?>"/>
    <input type="hidden" name="hidden_price" value="<?php echo $row['Price']; ?>"/>
    <br>
    <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="admin-choice" value="Add to Cart"></center>
       
       </form></div>
    
    <?php }}
   echo "</div>";
   "}}" ?>
</body>
</html>