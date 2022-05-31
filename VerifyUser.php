<?php
include "inc/connection.php";
session_start();
if(!isset( $_SESSION['Email']))
    header("location:login.php");
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
    <div class="verify">
        <p class="box-logo">E-shop</p>
        <?php
        echo"<pre>Hi ".$_SESSION['Email']."</pre>";

        if(!empty($_GET['Invalid'])){
            $message = $_GET['Invalid'];
            echo"<p class='warning'>".$message."</p>";}
        ?>
        <p id="msg">To continue, please verify it's you</p>

        <form action="VerifyUser_action.php" method="post"> 
            <input id="show" type="password" name="txtConfirm" placeholder="Enter your password">
            <p><input id="show-pass" type="checkbox" onclick="myFunction()"> Show Password</p>
            <input id="sbmt" type="submit"  value="next">
         </form>
    </div>

    <script>
        function myFunction() {
            var show = document.getElementById("show");
            if (show.type == 'password') {
                show.type = 'text';
            }
            else {
                show.type = 'password';
            }
        }
    </script>
</body>
</html>