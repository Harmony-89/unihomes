<?php
include("dbconnection.php");

session_start();
if (!isset($_SESSION["firstName"])) {
    header("Location: homepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/userpage.css?v=<?php echo time(); ?>">
    <title>UniHome</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="Logout" class="btn">
            </form>
        </section>
    </header>
    <div class="backImage">
        <img src="images/back1.jpg" alt="">
    </div>
    <section class="wrapper">
        <section class="First_section">
            <?php
            if (isset($_SESSION["firstName"])) {
                echo "<div class='usernote'>";
                echo "Ready to settle in ";
                echo "<span>";
                echo $_SESSION["firstName"];
                echo "</span>";
                echo "</div>";
            }
            ?>
            <form action="userHouses.php" method="get" id="searchForm">
                <input type="text" name="name" class="houseValue" placeholder="Enter house type e.g bedsitter">
                <input type="text" name="price" class="houseValue" placeholder="Enter the rent of the house">
                <input type="text" name="area" class="houseValue" placeholder="Enter the location of the house">
                <input type="submit" name="submitSearch" class="searchbtn" value="Search">
            </form>
        </section>

        <section class="houses">
            <div class="holder" id="holder">

        </section>
        <footer>
            <span class="miniName">UniHousing</span>
            <span class="copyright">&copy; 2026 UniHomes. All rights reserved</span>
        </footer>
    </section>
    <script>
        const searchForm = document.getElementById('searchForm');
        const houseHolder = document.getElementById('holder'); // Ensure your div ID is 'holder'

        function getHouses(query = '') {
            fetch('userHouses.php?' + query)
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