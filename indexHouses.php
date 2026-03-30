<?php
include("dbconnection.php");
// 1. Get the variables from the URL (GET)
// If they don't exist, they stay as empty strings
$searchType = $_GET["name"] ?? "";
$searchPrice = $_GET["price"] ?? "";
$searcharea = $_GET["area"] ?? "";

// 2. Start the base query
$sql = "SELECT * FROM images WHERE 1=1";

// 3. Add filters only if they are not empty
if (!empty($searchType)) {
    $sql .= " AND type LIKE '%$searchType%'";
}
if (!empty($searcharea)) {
    // Check if your DB column is 'location' or 'place'
    $sql .= " AND (location LIKE '%$searcharea%' OR place LIKE '%$searcharea%')";
}
if (!empty($searchPrice)) {
    $sql .= " AND rent <= " . (int)$searchPrice;
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["place"];
        $type = $row["type"];
        $rent = $row["rent"];
        $location = $row["location"];
        $imageName = $row["filename"]; // Ensure this path is correct

        echo "
        <div class='example'>
            <a href='details.php?id=" . $row['id'] . "'>
                <div class='propImg'><img src='$imageName'></div>
            </a>
            <div class='overlay'>
                <div class='lowerdesc'>
                    <span class='ppName'><a href='details.php?id=" . $row['id'] . "'>$name</a></span>
                    <span class='location'>$location</span>
                    <span class='lowerdt'>
                        <span class='size'>$type</span>
                        <span class='price'>$rent/mo</span>
                    </span>
                </div>
            </div>
        </div>";
    }
} else {
    echo "<p style='color:white; padding:20px;'>No houses found.</p>";
}
