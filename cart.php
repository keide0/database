<?php
include('db_connect.php');

$user_id = 1;  // Dynamically fetch the user ID based on login session

$sql = "SELECT items.item_name, items.price FROM cart INNER JOIN items ON cart.item_id = items.id WHERE cart.user_id = $user_id";
$result = $conn->query($sql);

echo "<h2>Your Cart</h2>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>Item Name</th><th>Price</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["item_name"] . "</td><td>" . $row["price"] . "</td><td><a href='remove_from_cart.php?id=" . $row["item_id"] . "'>Remove</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Your cart is empty.";
}

$conn->close();
?>
