<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/logIn.css?v=<?php echo time(); ?>">
    <title>log in</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <a href="index.php">Home</a>
        </section>
    </header>
    <form action="loginquery.php" method="post">
        <div class="container">
            <div class="head">Log In</div>
            <div class="btnSwitch">
                <input type="submit" name="user_type" value="student" id="switch3" class="student">
                <input type="submit" name="user_type" value="landlord" id="switch4" class="landlord">
            </div>
            <div class="enterM lable">Firstname</div>
            <input type="text" name="firstName" id="username" class="accept" required>
            <div class="enterP lable">Enter your password</div>
            <input type="password" name="password" id="password" class="accept" required>
            </br>
            <div class="signin">
                <span>Don't have an account?
                    <a href="signinpage.php">Sign in</a>
            </div>
        </div>
    </form>
</body>

</html>