<?php
include "inc/Connection.php";
session_start();


if(!isset( $_SESSION['Email'])){
  header("location:login.php");}

 


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
        <a class="user_sign" href="Profile.php"><i class="fa fa-user-circle"> Profile </i></a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fas fa-bars"></i></label>
        <label><p id="logo">E-shop</p></label>
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
        if(!empty($_GET['message'])){
        $message = $_GET['message'];
        echo"<p class='alert'>".$message."</p>";}
            ?>
    
<?php

        $sql="SELECT * FROM Category";
        $result=mysqli_query($con,$sql);
        $queryResults=mysqli_num_rows($result);

        if($queryResults>0){      
                     while($row=mysqli_fetch_assoc($result)){
                        echo "<div class='category'>
                        <a href='CategList.php?category=".$row['CatName']."' ><header class='category-title'>".$row['CatName']."</header></a>";
                        $CatName=$row['CatName'];
                        $sql1="SELECT * FROM Item where CategName='$CatName'  limit 4";
                        $result1=mysqli_query($con,$sql1);
                        $queryResults1=mysqli_num_rows($result1);
                        if($queryResults1>0){
                            while($row=mysqli_fetch_assoc($result1)){
                        ?>
                         <div class='item'>

                         <form method="post" action="Cart.php?action=add&id=<?php echo $row['ID']; ?>">
                         
                         <img src="<?php echo"gallery/".$row['Image'];?>"/>
                          <center>
                         <label><b><?php echo $row['Name']?></b></label>
                         <br>
                         
                         <label><b>$<?php echo $row['Price']?></b></label>
                         <br>
                         
                          <input type="number" name="quantity" value="1" />
                         <input type="hidden" name="hidden_name" value="<?php echo $row['Name']; ?>"/>
                         <input type="hidden" name="hidden_price" value="<?php echo $row['Price']; ?>"/>
                         <br>
                         <input type="submit" name="add_to_cart" class="add-cart" value="Add to Cart">
                        </center>
                            
                            </form></div>

                         <?php }}
                        echo "</div>";
                        }} ?>
 

   
    <footer>
        <center><p>© Done by Alaa Merhi & Ziad Najami - 2022</p></center>
    </footer>

</body> 

</html>
