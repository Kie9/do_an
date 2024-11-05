<?php 


    $ma_hoa_don = $_POST['ma'];
    $ten = $_POST['name'];
    $sdt = $_POST['phone'];
    $dia_chi = $_POST['addr'];
    $shipper = $_POST['shipper'];
    $bl = $_POST['bl'];

    include '../connect.php';
	
    $sql = "update hoa_don
    set
    ma_van_don = '$shipper' '-' '$bl',
    tinh_trang = '3'
    where
    ma = '$ma_hoa_don'";
    // $result = $connect->prepare($sql);
    // $result->execute();
    // $connect = null;
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:hoa_don.php');
?>