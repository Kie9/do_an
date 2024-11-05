<?php


$ma_hoa_don = $_GET['ma_hoa_don'];
$tinh_trang = $_GET['tinh_trang'];	

include '../connect.php';

$sql = "update hoa_don
set
tinh_trang = '$tinh_trang'
where
ma = '$ma_hoa_don'";

mysqli_query($connect,$sql);

$sql = "select * from hoa_don_chi_tiet 
join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
where ma_hoa_don = '$ma_hoa_don'";

$result = mysqli_query($connect,$sql);
// $result = $connect->prepare($sql);
// $result->execute();

// $tong_tat_ca = 0;

// while($each = $result->fetchAll(PDO::FETCH_BOTH))
$tong_tat_ca = 0;
$so_luong = 0;
$ma_san_pham = 0;
while($each = mysqli_fetch_array($result))
{ ?>
    <?php $tong_tat_ca += $each['gia'] * $each['so_luong']?>
    <?php $so_luong = $each['so_luong']?>
    <?php $ma_san_pham = $each['ma_san_pham']?>
<?php }?>

<?php 
    
    if($tinh_trang == 5){
        $sql = "
        update hoa_don,san_pham
        set
        hoa_don.thong_ke_tong = '$tong_tat_ca',
        san_pham.da_ban = '$tong_tat_ca'
        where
        san_pham.ma = hoa_don.ma_san_pham
        and hoa_don.ma = '$ma_hoa_don'";
        mysqli_query($connect,$sql);
    }


    if($tinh_trang == 5){
        $sql ="
        update san_pham
        set
        san_pham.kho = san_pham.kho - '$so_luong'
        where san_pham.ma = '$ma_san_pham'
        ";
        mysqli_query($connect,$sql);
    }
?>
<?php
// $result = $connect->prepare($sql);
// $result->execute();
// $connect = null;
mysqli_close($connect);
header('location:hoa_don.php');
?>