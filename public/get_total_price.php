<?php
// assume you have a database connection established
include '../connect.php';
// retrieve the total price
$sql = "select sum(gia * so_luong) as total from san_pham where ma in (select ma from gio_hang)";
$result = mysqli_query($conn, $sql);
$each = mysqli_fetch_array($result);
$total = $each['total'];

// return the total price
echo json_encode(array('total' => number_format($total). 'VNĐ'));
?>