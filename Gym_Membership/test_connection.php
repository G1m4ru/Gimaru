<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym_membership";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!";
}

$conn->close();
?>