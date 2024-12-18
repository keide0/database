<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = 1;  // You can dynamically fetch the user ID based on login session

    $sql = "INSERT INTO cart (user_id, item_id) VALUES ($user_id, $item_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Item added to cart.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
