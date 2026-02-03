<?php
    include("dbconnection.php");
    if(isset($_POST["signin"]) and !empty($_POST["username"])){
        $name = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE email = '$email'";
        $res = $conn->query($query);

        if($res->num_rows == 1){
            header("location:loginpage.php?status=account already exists");
            exit();
        }
        else{
            $query = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
            $result = $conn->query($query);

            $query = "SELECT * FROM users WHERE username = '$name' AND password = '$password'";
            $res = $conn->query($query);
            if($res->num_rows == 1){
                $row = $res->fetch_assoc();
                session_start();
                $_SESSION["username"] = $row["username"];
                header("location: userpage.php");
            }
        }
    }
?>