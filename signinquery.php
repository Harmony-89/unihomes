<?php
include("dbconnection.php");

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$user = $_POST["user_type"];




if ($user == "student") {

    $query = "SELECT * FROM users WHERE email = '$email'";
    $res = $conn->query($query);

    if ($res->num_rows == 1) {
        echo "<script>
            alert('Account already exists. Go back to log in');
            window.history.back();
          </script>";
        exit;
    } else {
        $query = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
        $result = $conn->query($query);

        $query = "SELECT * FROM users WHERE firstName = '$firstName' AND password = '$password'";
        $res = $conn->query($query);
        if ($res->num_rows == 1) {
            $row = $res->fetch_assoc();
            session_start();
            $_SESSION["username"] = $row["username"];
            header("location: userpage.php");
        }
    }
} elseif ($user == "landlord") {

    $query = "SELECT * FROM landlords WHERE firstName = '$firstName' and  password = '$password'";
    $res = $conn->query($query);

    if ($res->num_rows == 1) {
        echo "<script>
            alert('Account already exists. Go back to log in');
            window.history.back();
          </script>";
        exit;
    } else {
        $query = "INSERT INTO landlords (email, firstName, lastName, password) VALUES ('$email','$firstName', '$lastName', '$password')";
        $result = $conn->query($query);

        $query = "SELECT * FROM landlords WHERE firstName = '$firstName' AND password = '$password'";
        $res = $conn->query($query);
        if ($res->num_rows == 1) {
            $row = $res->fetch_assoc();
            session_start();
            $_SESSION["firstName"] = $row["firstName"];
            $_SESSION["id"] = $row["id"];
            header("location: landlordpage.php");
        }
    }
}
