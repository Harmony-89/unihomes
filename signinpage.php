<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/all.css?v=<?php echo time(); ?>">
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
        <div class="container">
            <div class="head">Sign In</div>
            <input type="button" value="landlord" id="switch">
            <div class="enterM lable"> Enter firstname</div>
            <input type="text" name="username" id="username" class="accept" required>
            <div class="enterE lable">Enter your email</div>
            <input type="email" name="email" id="email" class="accept" required>
            <div class="enterP lable">Enter your password</div>
            <input type="password" name="password" id="password" class="accept" required>
            </br>
            <div class="Enclosure">
                <input type="submit" class="button" name="signin" value="Sign in"></button>
                </span>
            </div>
            <div class="signin">
                <span>Already have an account?
                    <a href="loginpage.php">Log in</a>
            </div>
        </div>
    </form>

    <!-- <button id="switch">landlord</button> -->

    <form action="signinquery.php" method="post">
        <div class="landwrapper">
            <div class="head">Sign In</div>
            <button id="switch2">landlord</button>
            <div class="enterM lable"> Enter firstname</div>
            <input type="text" name="username" id="username" class="accept" required>
            <div class="enterE lable">Enter your email</div>
            <input type="email" name="email" id="email" class="accept" required>
            <div class="enterE lable">Enter your mobile number</div>
            <input type="text" name="number" id="number" class="accept" required>
            <div class="enterP lable">Enter your password</div>
            <input type="password" name="password" id="password" class="accept" required>
            </br>
            <div class="Enclosure">
                <input type="submit" class="button" name="signin" value="Sign in"></button>
                </span>
            </div>
            <div class="signin">
                <span>Already have an account?
                    <a href="loginpage.php">Log in</a>
            </div>
        </div>
    </form>

    <!-- <script src="js/signin.js"></script> -->
    <script>
        var user1 = document.querySelector('.container');
        var user2 = document.querySelector('.landwrapper');
        var button1 = document.getElementById('switch');
        var button2 = document.getElementById('switch2');
        button1.addEventListener('click', function() {
            user1.classList.toggle('active');
            if (user1.classList.contains('active')) {
                user2.classList.add('active');
            }
        })
        button2.addEventListener('click', function() {
            user2.classList.remove('active');
            if (!user2.classList.contains('active')) {
                user1.classList.remove('active');
            }
        })
    </script>
</body>

</html>