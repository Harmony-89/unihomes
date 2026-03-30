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
    <link rel="stylesheet" href="styles/landlordpage.css?v=<?php echo time(); ?>">
    <title>UniHome</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="Logout" class="btn">
            </form>
            <a href="uploadpage.php" class="btn">upload</a>
        </section>
    </header>
    <div class="backImage">
        <img src="images/back1.jpg" alt="">
        <div class="overlay"></div>
    </div>
    <section class="all">

        <h1 class="list">Your listings <?php echo $_SESSION["firstName"]; ?></h1>

        <section class="houses">
            <div class="holder">
                <?php

                $landlordId = $_SESSION["id"];
                $query = "SELECT * FROM images WHERE owner = '$landlordId'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($landlordId == $row["owner"]) {
                            $name = $row["place"];
                            $type = $row["type"];
                            $rent = $row["rent"];
                            $imagedir = $row["filename"];
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
                    }
                } else {
                    echo ("You have not posted any houses");
                }
                ?>
            </div>
        </section>
        <footer>
            <span class="miniName">UniHousing</span>
            <span class="copyright">&copy; 2026 UniHomes. All rights reserved</span>
        </footer>
    </section>
</body>

</html>