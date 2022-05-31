<?php
include "inc/Connection.php";
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
<label><div><a id="CentLogo" href="index.php">E-shop</a></div></label>

<br>
<br>
<br>
<?php
        if(!empty($_GET)){
        echo "<p class='success'>".$_GET['message']; 
        }
        ?>

        <br>

    <div class="container">
        <form action="changeName_action.php" method="post">
            <p>Name</p>
            <input type="text" name="new-name" placeholder="UserName" required>
            <input id="save" type="submit" value="Save">
            <a href="profile.php">Cancel</a>
        </form>
    </div>

    <div class="container">
        <form action="changePassword_action.php" method="post">
            <p>Password</p>
            <input type="password" name="newPassword" placeholder="New Password" required>
            <input id="save" type="submit" value="Save">
            <a href="profile.php">Cancel</a>
        </form>
    </div>

    <div class="container">
        <form action="changePhoneNum_action.php" method="post">
            <p>Phone number</p>
            <input type="text" name="PhoneNum" placeholder="New phone Number" required>
            <input id="save" type="submit" value="Save">
            <a href="profile.php">Cancel</a>
        </form>
    </div>

</body>

</html>