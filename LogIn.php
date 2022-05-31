<!DOCTYPE html>
<html lang="en">

<head>
    <link href="design.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/all.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p class="login-logo">E-shop</p>
    <div class="sign-in-form">
        <h1>Log In</h1>

        <?php
        if(!empty($_GET['Invalid'])){
        $message = $_GET['Invalid'];
        echo"<p class='alert'>".$message."</p>";}
        ?>

        <form action="LogIn_action.php" method="post">
            <input type="email" name="txtEmail" class="input-box" placeholder="Your Email" required>
            <input type="password" name="txtPassword" id="show" class="input-box" placeholder="Your Password" required>
            <p class="check-box"><span><input type="checkbox" onclick="myFunction()"></span> Show Password</p>
            <button type="submit" class="sign-in-btn">Log In</button>
            <hr>
            <p class="or">New Member</p>
            <p id="CreatAccount">Don't have an account ? <a href="SignUp.php">Creat Account Here</a></p>
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
        }</script>


</body>

</html>