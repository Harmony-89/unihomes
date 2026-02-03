<?php
include("dbconnection.php");

session_start();
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
            <a href="">Home</a>
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="Logout">
            </form>
        </section>
    </header>
    <section class="all">
        <section class="First_section">
            <?php
            if (isset($_SESSION["username"])) {
                echo "<div class='usernote'>";
                echo "Ready to post your property ";
                echo "<span>";
                echo $_SESSION["username"];
                echo "</span>";
                echo "</div>";
            }
            ?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" class="houseValue">
                <input type="text" name="type" class="houseType" placeholder="Enter the type of the room eg bedsitter">
                <input type="text" name="place" class="areaName" placeholder="Enter the name of the property">
                <input type="text" name="rent" class="houseRent" placeholder="Enter the rent of the house">
                <input type="submit" name="submitUpload" class="searchbtn" value="Upload">
            </form>
        </section>


        <section class="houses">
            <div class="holder">
                <?php
                $query = "SELECT * FROM images";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["place"];
                        $rent = $row["rent"];
                        $type = $row["type"];
                        $fileName = $row["filename"];
                        $imageUrl = "images/" . $fileName;
                        echo "<div class = 'scenes'>";
                        echo "<div class = 'status'>";
                        echo "<p class='available'>available</p>";
                        echo "<h3>$name</h3> </br>";
                        echo "<img src='$imageUrl'></br>";
                        echo "</div>";
                    }
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