<?php
session_start();

// Connect to the database
include 'connect.php';

// Get the product ID and delta (increment or decrement) from the request
$ma = $_POST['ma'];
$delta = $_POST['delta'];

// Retrieve the current quantity from the session
$cart_contents = $_SESSION['gio_hang'];
$so_luong = $cart_contents[$ma];

// Update the quantity
if ($delta == 1) {
    $so_luong++;
} elseif ($delta == -1) {
    if ($so_luong > 1) {
        $so_luong--;
    }
}

// Update the session
$cart_contents[$ma] = $so_luong;
$_SESSION['gio_hang'] = $cart_contents;

// Retrieve the product price from the database
$sql = "SELECT gia FROM san_pham WHERE ma = '$ma'";
$result = mysqli_query($connect, $sql);
$product = mysqli_fetch_array($result);
$itemPrice = $product['gia'];

// Calculate the new total price for the item
$newTotal = $so_luong * $itemPrice;

// Calculate the new grand total price
$grandTotal = 0;
foreach ($cart_contents as $ma => $so_luong) {
    $sql = "SELECT gia FROM san_pham WHERE ma = '$ma'";
    $result = mysqli_query($connect, $sql);
    $product = mysqli_fetch_array($result);
    $itemPrice = $product['gia'];
    $grandTotal += $so_luong * $itemPrice;
}

// Return the new quantity, total price, and grand total price
echo json_encode(array('quantity' => $so_luong, 'total' => $newTotal, 'grandTotal' => $grandTotal));
?>