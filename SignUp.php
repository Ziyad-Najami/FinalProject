
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="design.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p class="login-logo">E-shop</p>
    <div class="sign-in-form">
        <h1>Creat Account</h1>
        <?php
        if(!empty($_GET['Error'])){
        $message = $_GET['Error'];
        echo"<p class='alert'>".$message."</p>";}
            ?>
        <form action="SignUp_action.php" method="post">
            <input type="text" name="txtName" class="input-box" placeholder="UserName" required>
            <input type="email" name="txtEmail" class="input-box" placeholder="Email" required>
            <input type="password" name="txtPassword" id="show" class="input-box" placeholder="Password" required>
            <input type="tel" name="txtPhone" class="input-box" placeholder="Mobile number" required>
            <input type="number" name="txtAge" class="input-box" placeholder="Age" required>
            <p class="check-box"><span><input type="checkbox" onclick="myFunction()"></span> Show Password</p>
            <button type="submit" class="sign-in-btn">Continue</button>
            <hr>
            <p id="CreatAccount">Already have an acount ? <a href="LogIn.php">Sign in</a></p>
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