<?php
include("dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/details.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <a href="">Home</a>
            <a href="">Listings</a>
            <a href="loginpage.php" class="btn">Log in</a>
            <a href="signinpage.php" class="btn" id="sign">Sign in</a>
        </section>
    </header>
    <section class="wrapper">
        <div class="imageName">
            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM images WHERE id = '$id'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $place = $row["place"];
                echo "    <span>
                $place</span>";
            } else {
                echo ("No houses available");
            }
            ?>
        </div>
        <div class="imageGrid">
            <div class="image mainImg">
                <?php
                $id = $_GET['id'];
                $query = "SELECT * FROM images WHERE id = '$id'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $imageName = $row["filename"];
                    $imagedir = "images/" . $imageName;
                    echo "<img src='$imagedir'>";
                } else {
                    echo ("No houses available");
                }
                ?>
            </div>
            <div>
                <img src="images/test1.jpg" alt="">
            </div>
            <div>
                <img src="images/test2.jpg" alt="">
            </div>
            <div>
                <img src="images/test5.jpg" alt="">
            </div>
            <div>
                <img src="images/test0.jpg" alt="">
            </div>
        </div>

        <div class="details">
            <div class="houseDetails">
                listed by
            </div>
            <div class="ownerDetails">
                listed by
            </div>
        </div>
    </section>
</body>

</html>