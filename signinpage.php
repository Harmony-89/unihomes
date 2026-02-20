<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/signIn.css?v=<?php echo time(); ?>">
    <title>Sign in</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <a href="homepage.php">Home</a>
        </section>
    </header>

    <form action="signinquery.php" method="post">
        <div class="landwrapper">
            <div class="head">Sign In</div>
            <div class="btnSwitch">
                <input type="submit" name="user_type" value="student" id="switch3" class="student">
                <input type="submit" name="user_type" value="landlord" id="switch4" class="landlord">
            </div>
            <div class="enterM lable"> Enter firstname</div>
            <input type="text" name="firstName" id="username" class="accept" required>
            <div class="enterM lable"> Enter Lastname</div>
            <input type="text" name="lastName" id="username" class="accept" required>
            <div class="enterE lable">Enter your email</div>
            <input type="email" name="email" id="email" class="accept" required>
            <div class="enterP lable">Enter your password</div>
            <input type="password" name="password" id="password" class="accept" required>
            </br>
            <div class="signin">
                <span>Already have an account?
                    <a href="loginpage.php">Log in</a>
            </div>
        </div>
    </form>
</body>

</html>