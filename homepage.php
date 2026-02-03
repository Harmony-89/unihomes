<?php
include("dbconnection.php");

session_start();
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
    <section class="wrapper">
        <header>
            <h1>Unihomes</h1>
            <section>
                <a href="">Home</a>
                <a href="">Listings</a>
                <a href="loginpage.php" class="btn">Log in</a>
                <a href="signinpage.php" class="btn">Sign in</a>
            </section>
        </header>
        <section class="First_section">
            <div class="welcomeTitle">Welcome to UniNest: Your Gateway to Campus Living</div>
            <?php
            if (isset($_SESSION["username"])) {
                echo "<div class='usernote'>";
                echo "Ready to settle in ";
                echo "<span>";
                echo $_SESSION["username"];
                echo "</span>";
                echo "</div>";
            }
            ?>
            <div class="miniTitle">The smartest way to discover, save, and secure your university accommodation before you arrive.</div>
            <form action="">
                <input type="text" name="name" class="houseValue" placeholder="Enter house type">
                <input type="submit" name="submitSearch" class="searchbtn" value="Search">
            </form>
        </section>

        <section class="houses">
            <div class="holder">
                <?php
                if (isset($_POST["submitSearch"]) and !empty($_POST["name"])) {
                    $searchType = $_POST["name"];
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
                                    <div class='status'>
                                        <p class='available'>available</p>
                                        <p class='details'>$type</p>
                                    </div>
                                    <img src='$imagedir'>
                                    <div class='lowerdesc'>
                                        <p class='ppName'>$name</p>
                                        <p class='distance'>4km from the University of Embu</p>
                                        <div class='lowerdt'>
                                            <p>
                                            <h3>$rent</h3>/mo</p>
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
                                        <div class='status'>
                                            <p class='available'>available</p>
                                            <p class='details'>$type</p>
                                        </div>
                                        <img src='$imagedir'>
                                        <div class='lowerdesc'>
                                            <p class='ppName'>$name</p>
                                            <p class='distance'>4km from the University of Embu</p>
                                            <div class='lowerdt'>
                                                <p>
                                                <h3>$rent</h3>/mo</p>
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