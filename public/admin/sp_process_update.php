<?php
	$ma = $_POST['ma'];
	$ten = $_POST['ten'];
	$gia = $_POST['gia'];
	$mo_ta = $_POST['mo_ta'];
	$so_luong = $_POST['so_luong'];
	$ma_hang = $_POST['ma_hang'];
	$anh = $_FILES['anh2'];

if ($anh['size']>0) {
	$thu_muc_anh = '../images/img_sp/';
	move_uploaded_file($anh['tmp_name'], $thu_muc_anh . $anh['name']);
	$ten_anh = $anh['name'];
}else{
	$ten_anh = $_POST['anh1'];
}

include '../connect.php';
$sql = "select * from san_pham where ma = '$ma'";

$result = mysqli_query($connect,$sql);
$tong_kho = 0;
$kho = 0;
while($each = mysqli_fetch_array($result))
{ ?>
<?php $kho = $each['kho'] + $so_luong;?>
<?php $tong_kho = $each['tong_kho'] + $so_luong;?>
<?php }?>
<?php
$sql = "update san_pham
set
ten = '$ten',
gia= '$gia',
mo_ta = '$mo_ta',
ma_hang = '$ma_hang',
kho = '$kho',
tong_kho = '$tong_kho',
anh = '$ten_anh'
where
ma = '$ma'
";

// $result = $connect->prepare($sql);
// $result->execute();
// $connect = null;
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:sanpham.php');