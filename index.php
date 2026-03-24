<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/homepage.css?v=<?php echo time(); ?>">
    <title>UniHome</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <a href="loginpage.php" class="btn">Log in</a>
            <a href="signinpage.php" class="btn" id="sign">Sign in</a>
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
                <!-- <form action="homepage.php" method="post">
                    <input type="text" name="name" class="houseValue" placeholder="Enter house type e.g bedsitter">
                    <input type="submit" name="submitSearch" class="searchbtn" value="Search">
                </form> -->
            </div>
        </section>

        <section class="houses">
            <div class="miniHeader">Listings</div>
            <div class="search">
                <form action="index.php" method="post">
                    <input type="text" name="name" class="houseValue" placeholder="Enter house type e.g bedsitter">
                    <input type="text" name="price" class="houseValue" placeholder="Enter the rent of the house">
                    <input type="text" name="area" class="houseValue" placeholder="Enter the location of the house">
                    <input type="submit" name="submitSearch" class="searchbtn" value="Search">
                </form>
            </div>
            <div class="holder">
                <?php
                if (isset($_POST["submitSearch"]) and !empty($_POST["name"])) {
                    $searchType = $_POST["name"];
                    // $searchPrice = $_POST["name"];
                    // $searcharea = $_POST["name"];
                    $query = "SELECT * FROM images WHERE type LIKE '%$searchType%'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["place"];
                            $type = $row["type"];
                            $rent = $row["rent"];
                            $imageName = $row["filename"];
                            $imagedir = "images/" . $imageName;
                            echo "
                                    <div class='example'>
                                        <a href='details.php?id=" . $row['id'] . "'>
                                            <div class='propImg'>
                                                <img src='$imagedir'>
                                            </div>
                                            </a>
                                            <div class='overlay'>
                                                <div class='lowerdesc'>
                                                    <span class='ppName'>
                                        <a href='details.php?id=" . $row['id'] . "'>$name</a></span>
                                                    <span class='location'>Embu-kangaru</span>
                                                    <span class='lowerdt'>
                                                        <span class='size'>$type</span>
                                                        <span class='price'>$rent/month</span>
                                                    </span>
                                                </div>
                                            </div>
                                    </div>";
                        }
                    } else {
                        echo ("No like that available houses available");
                    }
                } else {
                    $query = "SELECT * FROM images";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["place"];
                            $type = $row["type"];
                            $rent = $row["rent"];
                            $imageName = $row["filename"];
                            $imagedir = "images/" . $imageName;
                            echo "
                                    <div class='example'>
                                        <a href='details.php?id=" . $row['id'] . "'>
                                            <div class='propImg'>
                                                <img src='$imagedir'>
                                            </div>
                                            </a>
                                            <div class='overlay'>
                                                <div class='lowerdesc'>
                                                    <span class='ppName'>
                                        <a href='details.php?id=" . $row['id'] . "'>$name</a></span>
                                                    <span class='location'>Embu-kangaru</span>
                                                    <span class='lowerdt'>
                                                        <span class='size'>$type</span>
                                                        <span class='price'>$rent/mo</span>
                                                    </span>
                                                </div>
                                            </div>
                                    </div>";
                        }
                    } else {
                        echo ("No houses available");
                    }
                }
                ?>
        </section>
        <footer>
            <span class="miniName">UniHousing</span>
            <span class="copyright">&copy; 2026 UniHomes. All rights reserved</span>
        </footer>
    </section>

</body>

</html>