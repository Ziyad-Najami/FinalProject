<?php
include "inc/Connection.php";
session_start();

if(!isset($_SESSION['AEmail']))
  header("location:LogInAdmin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="design.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <div class="page-head">
        <a class="user_sign" href="Adminlogout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</i></a>
        <a class="user_sign" href="ViewItems.php"> View items</a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fas fa-bars"></i></label>
        
        <label><p id="logo">E-shop</p></label>

        <div class="sidebar">
            <header style="font-size: 30px;"> Welcome
                <label for="check"><i id="cancel" class="fas fa-times"></i> </label>
            </header>
            <ul class="nav-bar">
                <li><a href="ViewItems.php"> View items</a></li>
                <li><a href="Adminlogout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>  

        </div>

<?php
$AdminName=$_SESSION['AEmail'];
echo"<p id='AdminName'>".$AdminName."</p>";

if(!empty($_GET['message'])){
    $message = $_GET['message'];
    echo"<p class='alert'>".$message."</p>";}
?>
     

    <div id="admin-form">
        <h1 style="text-align: Center;">Add New product</h1>
        <form action="AddDelItem_Action.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>Category name</tr>
                <tr><?php 
                         $sql="SELECT * FROM Category";
                     $result=mysqli_query($con,$sql);
                    $queryResults=mysqli_num_rows($result);
                    if($queryResults>0){      
                        echo"  <select name="."txtCategoryname"." required>
                        <option disabled selected value> -- select an option -- </option>";
                        while($row=mysqli_fetch_assoc($result)){
                    
                            echo"<option value=".$row['CatName']." name='txtCategory-name'>".$row['CatName']."</option>";
                         }
                         echo"</select>";
                        }
              ?>  </tr>
                <tr>Product name</tr>
                <tr><input type="text" name="txtProductname" class="input-box" required></tr>
                <tr>Product ID</tr>
                <tr><input type="text" name="txtProductId" class="input-box" required></tr>
                <tr>Price</tr>
                <tr><input type="number" name="txtPrice" class="input-box" required></tr>
                <tr>Discription</tr>
                <tr><textarea name="txtdesc" cols="50" rows="1" required></textarea></tr>
                <tr>Item picture</tr>
                <tr><input type="file" name="imageFile"></tr>
            </table>

            <button type="submit" class="admin-choice" name="Add">Add</button>
        </form>
    </div>

    <div id="admin-form">
        <h1 style="text-align: Center;">Drop a product</h1>
        <form action="AddDelItem_Action.php" method="post">
            <table>
                <tr>Category name</tr>
                <tr>      <?php               $sql="SELECT * FROM Category";
                     $result=mysqli_query($con,$sql);
                    $queryResults=mysqli_num_rows($result);
                    if($queryResults>0){      
                        echo"  <select name="."txtCategory-name"." required>
                        <option disabled selected value> -- select an option -- </option>";
                        while($row=mysqli_fetch_assoc($result)){
                    
                            echo"<option value=".$row['CatName']." name='txtCategory-name'>".$row['CatName']."</option>
                       
                        ";
                         }
                         echo"</select>";
                        }
              ?>  </tr>
                <tr>Product ID</tr>
                <tr><input type="text" name="txtProduct-ID" class="input-box" required></tr>
            </table>

            <button type="submit" class="admin-choice" name="Drop">Drop</button>
        </form>
                    </div>

    <div id="admin-form">
        <h1 style="text-align: Center;">Add/Drop Category</h1>
        <form action="AddDropCat_Action.php" method="post">
            <table>
                <tr>Category name</tr>
                <tr><input type="text" name="txtCategory" class="input-box" required></tr>
            </table>
            <center>
                <button type="submit" class="admin-choice" name="Add/Drop" value="Add">Add</button>
                <button type="submit" class="admin-choice" name="Add/Drop" value="Drop">Drop</button>
            </center>
        </form>
    </div>
 
</body>
</html>

