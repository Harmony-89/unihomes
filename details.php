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
            <a href="index.php">Home</a>
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
            <div class="ownerDetails">
                <span class="listed">Listed by</span>
                <div class="ownerName">
                    <div class="NAME">
                        <?php
                        $id = $_GET['id'];
                        $query = "SELECT * FROM images WHERE id = '$id'";
                        $result = $conn->query($query);
                        $land = $result->fetch_assoc();
                        $landId = $land["owner"];

                        $query = "SELECT * FROM landlords WHERE id = '$landId'";
                        $landlord = $conn->query($query);
                        $landlordId = $landlord->fetch_assoc();
                        $firstName = $landlordId["firstName"];
                        $lastName = $landlordId["lastName"];
                        echo $firstName . " " . $lastName;
                        ?></div>
                    <div class="reach">
                        <p>Call</p>
                        <p>Whatsapp</p>
                        <p>Directions</p>
                    </div>
                </div>
            </div>
            <div class="houseDetails">
                <div>
                    <?php
                    $id = $_GET['id'];
                    $query = "SELECT * FROM images WHERE id = '$id'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent = $row["rent"];
                        echo "Rent:<div class='Rent'>$rent/month</>";
                    }
                    ?></div>
                <div class="moreDet">
                    <?php
                    $id = $_GET['id'];
                    $query = "SELECT * FROM images WHERE id = '$id'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $type = $row["type"];
                        echo "<p>$type</p>";
                        echo "<p>Kangaru</p>";
                    }
                    ?></div>
            </div>
        </div>
    </section>
</body>

</html>