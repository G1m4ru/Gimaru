<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Payments</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email address</th>
            <th>Card Number</th>
            <th>CVV</th>
            <th>Address</th>
            <th>IC Number</th>
            <th>Select Membership</th>
            <th>Expiry Month</th>
            <th>Expiry Year</th>

        </tr>
        <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $dbname = "gym_membership"; // Change to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query payments table
    $sql = "SELECT id,name, phone, email, card_number, cvv, address, ic_number, membership, expiry_month, expiry_year FROM payment";
    $result = $conn->query($sql);

    // Check for errors
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    // Counter for serial numbers
    $serialNumber = 1;

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$serialNumber."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["phone"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["card_number"]."</td>";
            echo "<td>".$row["cvv"]."</td>";
            echo "<td>".$row["address"]."</td>";
            echo "<td>".$row["ic_number"]."</td>";
            echo "<td>".$row["membership"]."</td>";
            echo "<td>".$row["expiry_month"]."</td>";
            echo "<td>".$row["expiry_year"]."</td>";
            echo "<td>
                     <form method='POST' action='delete_payment.php' onsubmit=\"return confirm('Are you sure you want to delete this record?');\">
                         <input type='hidden' name='delete_id' value='" . $row["id"] . "' />
                         <input type='submit' value='Delete' />
                     </form>
                     </td>";

             echo "</tr>";
            $serialNumber++; // Increment serial number for next row
        }
    } else {
        echo "<tr><td colspan='8'>No payments found</td></tr>";
    }
    $conn->close();
?>

    </table>
</body>
</html>