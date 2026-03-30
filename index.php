<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="styles/index.css?v=<?php echo time(); ?>">
    <title>UniHome</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <a class="btn" id="loginbtn">Log in</a>
            <a class="btn" id="signbtn">Sign up</a>
        </section>
    </header>
    <div class="backImage">
        <img src="images/back1.jpg" alt="">
    </div>
    <section class="wrapper">
        <section class="First_section">
            <div class="usernote">
                <div class="welcomeTitle">Welcome to UniNest: Your Gateway to Campus Living</div>
                <div class="miniTitle">The smartest way to discover, save, and secure your university accommodation before you arrive.</div>
            </div>
        </section>

        <section class="houses">
            <div class="miniHeader">Listings</div>
            <div class="search">
                <form action="indexHouses.php" method="get" id="searchForm">
                    <input type="text" name="name" class="houseValue" placeholder="Enter house type e.g bedsitter">
                    <input type="text" name="price" class="houseValue" placeholder="Enter the rent of the house">
                    <input type="text" name="area" class="houseValue" placeholder="Enter the location of the house">
                    <input type="submit" name="submitSearch" class="searchbtn" value="Search">
                </form>
            </div>
            <div class="holder" id="holder">

        </section>
        <footer>
            <span class="miniName">UniHousing</span>
            <span class="copyright">&copy; 2026 UniHomes. All rights reserved</span>
        </footer>
    </section>

    <section class="logSect">
        <section class="login-container">
            <form action="loginquery.php" method="post">
                <div class="container">
                    <div class="icon" id="exit">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="head">Log In</div>
                    <div class="btnSwitch">
                        <input type="submit" name="user_type" value="student" id="switch3" class="student">
                        <input type="submit" name="user_type" value="landlord" id="switch4" class="landlord">
                    </div>
                    <div class="Input">
                        <input type="text" name="firstName" id="username" class="accept" required>
                        <p class="enterM lable">Firstname</p>
                    </div>
                    <div class="Input">
                        <input type="password" name="password" id="password" class="accept" required>
                        <div class="enterP lable">Enter your password</div>
                    </div>
                    </br>
                    <div class="signin">
                        <span>Don't have an account?
                            <a class="anchor" id="signbtn2">Sign in</a>
                    </div>
                </div>
            </form>
        </section>
    </section>

    <section class="signSect">
        <section class="sign-container">
            <form action="signinquery.php" method="post">
                <div class="landwrapper">
                    <div class="icon" id="exit2">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="head">Sign In</div>
                    <div class="btnSwitch">
                        <input type="submit" name="user_type" value="student" id="switch3" class="student">
                        <input type="submit" name="user_type" value="landlord" id="switch4" class="landlord">
                    </div>
                    <div class="Input">
                        <input type="text" name="firstName" id="username" class="accept" required>
                        <div class="enterM lable"> Enter firstname</div>
                    </div>
                    <div class="Input">
                        <input type="text" name="lastName" id="username" class="accept" required>
                        <div class="enterM lable"> Enter Lastname</div>
                    </div>
                    <div class="Input">
                        <input type="email" name="email" id="email" class="accept" required>
                        <div class="enterE lable">Enter your email</div>
                    </div>
                    <div class="Input">
                        <input type="password" name="password" id="password" class="accept" required>
                        <div class="enterP lable">Enter your password</div>
                    </div>
                    </br>
                    <div class="signin">
                        <span>Already have an account?
                            <p class="anchor" id="loginbtn2"> Log in</p>
                    </div>
                </div>
            </form>
        </section>
    </section>

    <script src="index.js"></script>
    <script>
        const searchForm = document.getElementById('searchForm');
        const houseHolder = document.getElementById('holder'); // Ensure your div ID is 'holder'

        function getHouses(query = '') {
            fetch('indexHouses.php?' + query)
                .then(response => response.text())
                .then(data => {
                    houseHolder.innerHTML = data;
                });
        }

        // Load initial houses
        window.onload = () => getHouses();

        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(searchForm);
            // FIX: Corrected spelling here
            const queryString = new URLSearchParams(formData).toString();

            console.log("Sending to PHP: ", queryString);
            getHouses(queryString);
        });
    </script>


</body>

</html>