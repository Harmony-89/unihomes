<?php
include("dbconnection.php");
$firstName = $_POST["firstName"];
$password = $_POST["password"];
$user = $_POST["user_type"];

if ($user == "student") {
    $query = "SELECT * FROM users where firstName = '$firstName' and password = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["firstName"] = $row["firstName"];
        header("Location:userpage.php");
        exit();
    } else {
        header("Location:loginpage.php");
        exit();
    }
} elseif ($user == "landlord") {

    $query = "SELECT * FROM landlords where firstName = '$firstName' and password = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["firstName"] = $row["firstName"];
        header("Location:landlordpage.php");
        exit();
    } else {
        header("Location:loginpage.php");
        exit();
    }
}
