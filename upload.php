<?php
include("dbconnection.php");
session_start();

if (isset($_POST["submitUpload"])) {
    $place = $_POST["place"];
    $type = $_POST["type"];
    $rent = $_POST["rent"];
    $fileName = $_FILES["image"]["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tmpName = $_FILES["image"]["tmp_name"];
    $targetPath = "images/" . $fileName;

    $query = "SELECT id FROM landlords WHERE firstName = '{$_SESSION['firstName']}'";
    $select = $conn->query($query);
    $landlord = $select->fetch_assoc();
    $landlordId = $landlord['id'];

    if (in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tmpName, $targetPath)) {
            $query = "INSERT INTO images (type, rent, place, filename, owner) VALUES('$type', '$rent', '$place', '$fileName','$landlordId')";
            $result = $conn->query($query);
            if ($result) {
                header("Location:upload.php?status=success");
                exit();
            } else {
                header("Location:upload.php?status=could not insert");
                exit();
            }
        } else {
            header("Location:upload.php?status=could not change filepath");
            exit();
        }
    } else {
        header("Location:upload.php?status=unsupported");
        exit();
    }
}
