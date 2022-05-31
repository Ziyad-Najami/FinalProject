<?php
session_start();
if(!isset( $_SESSION['Email'])){
  header("location:login.php");}
 
  
  
  if(!isset($_SESSION['UserName'])){
    header("location:login.php");}
  
   
    if (isset($_POST['add_to_cart'])){
      
      if(isset($_SESSION['cart'])){
          
  
          $session_array_id = array_column($_SESSION['cart'], "id");
  
          if(!in_array($_GET['id'],$session_array_id)){
              $session_array = array(
                  'id' => $_GET['id'],
                  "name" => $_POST['hidden_name'],
                  "price" => $_POST['hidden_price'],
                  "quantity" => $_POST['quantity']
              );
    
                $_SESSION['cart'][] = $session_array;
      }
      
  }else{
      
  
            $session_array = array(
                'id' => $_GET['id'],
                "name" => $_POST['hidden_name'],
                "price" => $_POST['hidden_price'],
                "quantity" => $_POST['quantity']
            );
  
              $_SESSION['cart'][] = $session_array;
          }
  
      
          header("Location:Index.php"); 
  }
  
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
  <style> table {
        border-collapse: separate;
        border-spacing: 0 15px;
      }
      th {
        background-color:  rgb(245, 181, 63);
        color: white;
      }
      th,
      td {
        width: 150px;
        text-align: center;
        border: 1px solid black;
        padding: 5px;
      }
      </style> 
      
</head>

<body>

    <div class="page-head">
    <a class="user_sign" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</i></a>
        <a class="user_sign" href="Profile.php"><i class="fa fa-user-circle"> Profile</i></a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fas fa-bars"></i> </label>
        <label><a id="logo" href="index.php">E-shop</a></label>
       


        <div class="sidebar">
            <header style="font-size: 30px;"> Welcome
                <label for="check"><i id="cancel" class="fas fa-times"></i></label>
            </header>
            <ul class="nav-bar">
                <li><a href="Index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="Profile.php"><i class="fa fa-user-circle"></i>Profile</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>

    </div>
    <center>
       
    <h3 >Shopping Cart Details</h3>
        <div >
            <table >
            <tr>
                <th > ID</th>
                <th >Product Name</th>
                <th >Quantity</th>
                <th>Price Details</th>
                <th >Total Price</th>
                <th >Remove Item</th>
            </tr>

            <?php 
            $total= 0;
            if(!empty($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $value){
                    echo "<tr>
                                <td >".$value['id']."</td>
                                <td >".$value['name']."</td>
                                <td >".$value['quantity']."</td>
                                <td >".$value['price']."</td>
                                <td >".number_format($value['price'] * $value['quantity'])."</td>
                                <td ><a href='Cart.php?action=remove&id=".$value['id']."'>
                                <button class='buttonD'>Remove </button>
                                </a></td>
                        </tr>";
               
               $total  = $total +($value['price'] * $value['quantity']);  }
            
            echo"<tr>
                    <td colspan='4'><b>Total Price</b>  </td>
                    
                    <td>".number_format($total,2)."</td>
                    <td ><a href='Cart.php?action=clearall'>
                                <button class='buttonD'>Clear </button></a></td>
            </tr>
            <tr>
                    <td colspan='6'><a href='Payment.php'><button class='buttonD'>Buy</button></a></td>
                    
            </tr> </center>";
            }
    ?>
                
            </table>
        </div>

    </div>

    <?php
    if(isset($_GET['action'])){
        if($_GET['action'] == "remove"){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
        if($_GET['action'] == "clearall"){
            unset($_SESSION['cart']);
        }
    }
    ?>
    



</body>

</html>