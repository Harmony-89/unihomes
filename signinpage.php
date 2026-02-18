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
            <div class="btnSwitch" required>
                <input type="button" value="student" id="switch1" class="student">
                <input type="button" value="landlord" id="switch2" class="landlord">
            </div>
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
            <div class="btnSwitch">
                <input type="button" value="student" id="switch3" class="student">
                <input type="button" value="landlord" id="switch4" class="landlord">
            </div>
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
                <input type="submit" class="button" name="sign" value="Sign in"></button>
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
        var button1 = document.getElementById('switch1');
        var button2 = document.getElementById('switch2');

        var button3 = document.getElementById('switch3');
        var button4 = document.getElementById('switch4');



        button3.addEventListener("click", function() {
            user1.classList.remove('active');
            user2.classList.remove('active');
            button1.classList.toggle('active');
            button4.classList.remove('active');
        })
        button2.addEventListener("click", function() {
            user1.classList.toggle('active');
            user2.classList.toggle('active');
            button1.classList.remove('active');
            button4.classList.add('active');
        })
        button1.addEventListener("click", function() {
            button1.classList.toggle('active');
            button2.classList.remove('active');
        })
        button4.addEventListener("click", function() {
            button1.classList.remove('active');
            button4.classList.toggle('active');
        })


        // button1.addEventListener('click', function() {
        //     if (!button1.classList.contains('active')) {
        //         button1.classList.add('active');
        //         button2.classList.remove('active');

        //     } else {
        //         button1.classList.remove('active');
        //     }
        //     user1.classList.remove('active');
        //     user2.classList.remove('active');
        // })
        // button2.addEventListener('click', function() {

        //     if (!button2.classList.contains('active')) {
        //         button2.classList.add('active');
        //         button1.classList.remove('active');

        //     } else {
        //         button2.classList.remove('active');
        //     }
        //     user1.classList.add('active');
        //     user2.classList.add('active');
        // })


        // if (user2.classList.contains('active') && user1.classList.contains('active')) {
        //     button3.classList.add('active');
        //     button2.classList.remove('active');
        // }
    </script>
</body>

</html>