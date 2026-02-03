<?php
    include("dbconnection.php");

    if(isset($_POST["login"]) and !empty($_POST["username"])){
        $name = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users where username = '$name' and password = '$password'";
        $result = $conn->query($query);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION["username"] = $row["username"];
            header("Location:userpage.php");
            exit();
        }
        else{
            header("Location:loginpage.php");
            exit();
        }
    }

?>