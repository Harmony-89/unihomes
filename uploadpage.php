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
    <link rel="stylesheet" href="styles/upload.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Unihomes</h1>
        <section>
            <a href="landlordpage.php" class="btn">back</a>
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="Logout" class="btn">
            </form>
        </section>
    </header>
    <div class="backImage">
        <img src="images/back1.jpg" alt="">
        <div class="overlay"></div>
    </div>

    <section class="all">
        <section class="First_section">
            <?php
            if (isset($_SESSION["firstName"])) {
                echo "<div class='uppertag'>";
                echo "Ready to post your property ";
                echo "<span>";
                echo $_SESSION["firstName"];
                echo "</span> ";
                echo "</div>";
            }
            ?>
        </section>
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="post-form">

            <div class="form-section">
                <h3>Select the main and cover image</h3>
                <input type="file" name="image" id="main_input" accept="image/*" required>
                <div id="main_preview" class="preview-box">
                </div>
            </div>


            <div class="form-section">
                <h3>Select other images of the property</h3>
                <input type="file" name="images[]" id="multi_input" accept="image/*" multiple>
                <div id="multi_preview" class="preview-grid">
                </div>
            </div>

            <div class="form-section">
                <h3>House Details</h3>
                <span class="det">
                    <input type="text" name="type" placeholder="e.g. Bedsitter" required>
                    <p>Enter the type of the house</p>
                </span>
                <span class="det">
                    <input type="text" name="place" placeholder="Property name" required>
                    <p>Enter the name of the property</p>
                </span>
                <span class="det">
                    <input type="number" name="rent" placeholder="Rent per month" required>
                    <p>Enter the rent of the house</p>
                </span>
                <span class="det">
                    <input type="text" name="area" placeholder="e.g. nairobi" required>
                    <p>Enter the location of the house</p>
                </span><?php
                        $query = "SELECT * FROM landlords WHERE id = '{$_SESSION['id']}'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $number = $row["contact"];

                            if (empty($number) || $number == 0) {
                                echo "<span class='det'>
                    <input type='number' name='number' class='Contact houseDetails' maxlength='9' placeholder='format 0762...' required>
                    <p>Enter your mobile number</p>
                </span>";
                            } else {
                                echo "<input type='hidden' name='number' value='$number'>";
                            }
                        }

                        ?>

                <button type="submit" name="submitUpload" class="upload-btn">Post Property</button>
            </div>

        </form>

        <footer>
            <span class="miniName">UniHousing</span>
            <span class="copyright">&copy; 2026 UniHomes. All rights reserved</span>
        </footer>
    </section>


    <script>
        document.getElementById('main_input').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('main_preview');
            previewContainer.innerHTML = '';

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100%';
                    img.style.borderRadius = '10px';
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });


        document.getElementById('multi_input').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('multi_preview');
            previewContainer.innerHTML = '';

            const files = event.target.files;
            if (files) {
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'thumb-container';
                        div.innerHTML = `<img src="${e.target.result}" style="width:100px; height:100px; object-fit:cover; border-radius:5px;">`;
                        previewContainer.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>

</body>

</html>