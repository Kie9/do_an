<?php
$ma = $_GET['ma'];
include '../connect.php';
$sql = "delete from khach_hang
where
ma = '$ma'
";
// $result = $connect->prepare($sql);
// $result->execute();
// $connect = null;
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:khachhang.php');