<?php
// fetch_cart_count.php
session_start();
require('admin/config/config.php');

$cart_count_query = "SELECT SUM(quantity) AS total_items FROM cart";
$cart_count_result = mysqli_query($con, $cart_count_query);

if ($cart_count_result) {
    $row = mysqli_fetch_assoc($cart_count_result);
    $total_items = $row['total_items'] ? $row['total_items'] : 0; // Default to 0 if no items
    echo $total_items;
} else {
    echo "0"; // Default to 0 on error
}

mysqli_close($con);
?>
