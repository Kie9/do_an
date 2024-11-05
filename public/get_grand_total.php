<?php
session_start();

// Retrieve the grand total price from the session
if (isset($_SESSION['grand_total'])) {
    $grandTotal = $_SESSION['grand_total'];
} else {
    // Calculate the grand total price if it's not set in the session
    $grandTotal = 0;
    foreach ($_SESSION['gio_hang'] as $ma => $so_luong) {
        $sql = "SELECT gia FROM san_pham WHERE ma = '$ma'";
        $result = mysqli_query($connect, $sql);
        $product = mysqli_fetch_array($result);
        $itemPrice = $product['gia'];
        $grandTotal += $so_luong * $itemPrice;
    }
    $_SESSION['grand_total'] = $grandTotal;
}

echo $grandTotal;
?>