<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym_membership";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM payment WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: admin.php"); // Replace with your payments page filename
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect if accessed without POST data
    header("Location: your_payments_page.php"); // Replace with your payments page filename
    exit();
}