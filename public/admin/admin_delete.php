<?php
$ma = $_GET['ma'];
include '../connect.php';
$sql = "delete from admin
where
ma = '$ma'
";

mysqli_query($connect,$sql);
mysqli_close($connect);
// $result = $connect->prepare($sql);
// $result->execute();
// $connect = null;
header('location:admin.php');