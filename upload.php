<?php
include("dbconnection.php");
session_start();

if (isset($_POST["submitUpload"])) {
    $place = $_POST["place"];
    $type = $_POST["type"];
    $rent = $_POST["rent"];
    $location = $_POST["area"];
    $number = $_POST["number"];
    $landlordId = $_SESSION["id"];


    $mainFileName = $_FILES["image"]["name"];
    $mainTmpName = $_FILES["image"]["tmp_name"];
    $mainExt = strtolower(pathinfo($mainFileName, PATHINFO_EXTENSION));
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $mainTargetPath = "images/" . time() . "_" . $mainFileName;

    if (in_array($mainExt, $allowedTypes)) {
        if (move_uploaded_file($mainTmpName, $mainTargetPath)) {


            $query = "INSERT INTO images (type, rent, place, filename, owner,location) 
                      VALUES ('$type', '$rent', '$place', '$mainTargetPath', '$landlordId', '$location')";

            if ($conn->query($query)) {
                $house_id = $conn->insert_id;

                $query = "UPDATE landlords SET contact = '$number' WHERE id = '$landlordId'";
                $conn->query($query);

                if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0]) && !empty($number) || $number == 0) {
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_multi) {
                        $multiName = $_FILES['images']['name'][$key];
                        $multiExt = strtolower(pathinfo($multiName, PATHINFO_EXTENSION));

                        if (in_array($multiExt, $allowedTypes)) {
                            $multiSaveName = time() . "_" . $multiName;
                            $multiTargetPath = "images/" . $multiSaveName;

                            if (move_uploaded_file($tmp_multi, $multiTargetPath)) {
                                $sqlMulti = "INSERT INTO propertyimages (houseID, name) 
                                             VALUES ('$house_id', '$multiTargetPath')";
                                $conn->query($sqlMulti);
                            }
                        }
                    }
                }

                echo "<script>
                        alert('Property and images uploaded successfully!');
                        window.location.href='landlordpage.php';
                      </script>";
                exit();
            } else {
                echo "Database Error: " . $conn->error;
            }
        } else {
            echo "<script>alert('Failed to upload main thumbnail.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid file type for main image.'); window.history.back();</script>";
    }
}
