<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";  // your db username
$password = "";      // your db password
$dbname = "gym_membership";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number'];
    $cvv = $_POST['cvv'];
    $address = $_POST['address'];
    $ic_number = $_POST['ic_number'];
    $membership = $_POST['membership'];
    $expiry_month = $_POST['expiry_month'];
    $expiry_year = $_POST['expiry_year'];

    $stmt = $conn->prepare("INSERT INTO payment (name, phone, email, card_number, cvv, address, ic_number, membership, expiry_month, expiry_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $phone, $email, $card_number, $cvv, $address, $ic_number, $membership, $expiry_month, $expiry_year);

    if ($stmt->execute()) {
        echo "Payment data inserted successfully.";
        // optionally redirect to a thank you page
        // header("Location: thankyou.html");
        // exit();
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No POST data received.";
}

$conn->close();
?>
