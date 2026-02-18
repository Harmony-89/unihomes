<?php
$servename = "localhost";
$username = "root";
$password = "";
$database_name = "unihouse";
$conn = new mysqli($servename, $username, $password, $database_name);
if ($conn->connect_error) {
    die("Could not connect" . $conn->connect_error);
}
