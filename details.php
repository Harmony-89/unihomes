<?php
include("dbconnection.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="styles/details.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <a class="btn" id="backBtn">Back</a>
        </section>
    </header>
    <div class="backImage">
        <img src="images/back1.jpg" alt="">
        <div class="overlay"></div>
    </div>
    <section class="wrapper">
        <section class="displayArea">
            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM images WHERE id = '$id'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $imagedir = $row["filename"];
                $place = $row["place"];
                $location = $row["location"];
                echo " 
            <div class='mainImage'>
                <img src='$imagedir' alt='Main image' id='main-display'>
                <div class='overlay'>
                    <p>$place</p>
                    <div class='pin'>
                        <i class='fa-solid fa-location-dot'></i>
                        <p>$location</p>
                    </div>
                </div>
            </div>";
            } else {
                echo ("No houses available");
            }
            ?>
            <div class="radius">
                <div class="imageGrid">
                    <?php
                    $id = $_GET['id'];
                    if (isset($imagedir)) {
                        echo "<div onclick='changeImage(\"$imagedir\")'><img src='$imagedir' alt='Initial Image'></div>";
                    }
                    $query = "SELECT * FROM propertyimages WHERE houseID = '$id'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $thumbdir = $row["name"];
                            echo "<div onclick='changeImage(\"$thumbdir\")'><img src='$thumbdir'></div>";
                        }
                    } else {
                        echo ("No images available");
                    }
                    ?>
                </div>
            </div>
        </section>
    </section>

    <section class="details">
        <div class="overlay2">
            <div class="houseDetails">
                <div>
                    <?php
                    $id = $_GET['id'];
                    $query = "SELECT * FROM images WHERE id = '$id'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent = $row["rent"];
                        echo "<div class='Rent'>$rent/month</div>";
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
                        $location = $row["location"];
                        echo "<span><i class='fa-regular fa-house'></i>
                        <p>$type</p>
                    </span>
                    <span><i class='fa-regular fa-map'></i></i>
                        <p>$location</p>
                    </span>";
                    }
                    ?></div>
            </div>

            <div class="ownerDetails">
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
                $number = $landlordId["contact"];
                $email = $landlordId["email"];
                if (isset($_SESSION["firstName"])) {
                    echo "
                <span class='listed'>Listed by:</span>
                <div class='ownerName'>$firstName $lastName</div>
                <div class='reach'>
                    <span><i class='fa-solid fa-phone'></i>
                        <p class='namer'>phone number:</p>
                        <p>$number</p>
                    </span>
                    <span><i class='fa-regular fa-envelope'></i>
                        <p class='namer'>email:</p>
                        <p>$email</p>
                    </span>
                </div>";
                } else {
                    echo "<div class='errorname'>Please log in to view owner details</div>";
                }
                ?>
            </div>
    </section>
    <footer>
        <span class="miniName">UniHousing</span>
        <span class="copyright">&copy; 2026 UniHomes. All rights reserved</span>
    </footer>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let back = document.querySelector("#backBtn");
            if (back) {
                back.addEventListener("click", function() {
                    if (window.history.length > 1) {
                        window.history.back();
                    } else {
                        window.location.href = "index.php";
                    }
                });
            }
        });
    </script>
    <script>
        function changeImage(newSrc) {
            const mainImg = document.getElementById('main-display');
            mainImg.src = newSrc;
            mainImg.style.opacity = 0;
            setTimeout(() => {
                mainImg.style.opacity = 1;
            }, 50);
        }
    </script>

</body>

</html>