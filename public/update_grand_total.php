<?php
session_start();

// Include database connection file
include 'connect.php';

// Get the updated quantity and product ID from the AJAX request
$ma = $_POST['ma'];
$delta = $_POST['delta'];

// Update the quantity in the cart
$_SESSION['gio_hang'][$ma] += $delta;

// Calculate the new grand total price
$tong = 0;
foreach ($_SESSION['gio_hang'] as $ma => $so_luong) {
    $sql = "SELECT gia FROM san_pham WHERE ma = '$ma'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $tong += $each['gia'] * $so_luong;
}

// Update the grand total price in the session
$_SESSION['grand_total'] = $tong;

// Debug logging
error_log("Grand total updated: $tong");

// Debug: Check the contents of $_SESSION['gio_hang']
var_dump($_SESSION['gio_hang']);

// Return the new grand total price as JSON
echo json_encode(array('total' => number_format($tong)));
?>