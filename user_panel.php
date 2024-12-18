<?php
include('db_connect.php');

echo "<h2>User Panel</h2>";

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

echo "<h3>Items</h3>";
echo "<table><tr><th>Item Name</th><th>Price</th><th>Actions</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["item_name"] . "</td><td>" . $row["price"] . "</td><td><a href='add_to_cart.php?id=" . $row["id"] . "'>Add to Cart</a></td></tr>";
}

echo "</table>";
$conn->close();
?>
