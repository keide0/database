<?php
include('db_connect.php');

$user_id = 1;  // Dynamically fetch the user ID based on login session

$sql = "SELECT * FROM cart WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $item_id = $row["item_id"];
        $sql_order = "INSERT INTO orders (user_id, item_id, order_date) VALUES ($user_id, $item_id, NOW())";
        
        if ($conn->query($sql_order) === TRUE) {
            echo "Order placed successfully!";
            $delete_cart = "DELETE FROM cart WHERE user_id = $user_id";
            $conn->query($delete_cart);
        } else {
            echo "Error placing order: " . $conn->error;
        }
    }
} else {
    echo "Your cart is empty!";
}

$conn->close();
?>
