<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = 1;  // Dynamically fetch the user ID based on login session

    $sql = "DELETE FROM cart WHERE user_id = $user_id AND item_id = $item_id";

    if ($conn->query($sql) === TRUE) {
        echo "Item removed from cart.";
    } else {
        echo "Error removing item: " . $conn->error;
    }

    $conn->close();
}
?>
