<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Lịch sử</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'rut_gon/head.php' ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'rut_gon/header-top.php'?>
    <?php include 'rut_gon/header-menu.php'?>
    <table class="border w-full" align="center" style="border-radius: ;">
        <tr class="border">
            <th class="border">Thông tin người nhận</th>
            <th class="border">Tình Trạng Đơn</th>
            <th class="border">Mã Đơn Hàng</th>
            <th class="border">Thời gian đặt hàng</th>
            <th class="border">Xem chi tiết</th>
            <th class="border"></th>
        </tr>
        <?php
		if(isset($_SESSION['ma'])){
			$ma_khach_hang = $_SESSION['ma'];
		}else{
			echo '<a href="login/form_login.php">Bạn chưa đăng nhập</a>';
		}
		include 'connect.php';
		$sql = "select * from hoa_don
		where ma_khach_hang = '$ma_khach_hang' order by tinh_trang";
		$result = mysqli_query($connect,$sql);
	?>
        <?php foreach ($result as $each): ?>
        <tr class="border">

            <th class="border">
                <?php echo $each['ten_nguoi_nhan'] ?><br>
                <?php echo $each['sdt_nguoi_nhan'] ?><br>
                <?php echo $each['dia_chi_nguoi_nhan'] ?>
            </th>

            <th class="border">
                <?php 
				if($each['tinh_trang']==1){
					echo"Đang Chờ Duyệt";
				}else if($each['tinh_trang']==2){
					echo "Đã Duyệt";
				}else if($each['tinh_trang']==3){
					echo "Đang giao";
				}
				else if($each['tinh_trang']==4){
					echo "Đã Hủy"; 
				}else if($each['tinh_trang']==5){
					echo "Đã Giao Thành Công";
				}
			?>
            </th>
            <th class="border">
                <?php echo $each['ma_don_hang']?>
            </th>
            <th class="border">
                <?php echo date_format(date_create($each['thoi_gian_dat_hang']),'d-m-Y H:i:s') ?>
            </th>
            <th class="border">
                <a href="xem_chi_tiet.php?ma_hoa_don=<?php echo $each['ma']?>">
                    Xem
                </a>
            </th>
            <th class="border">
                <?php if($each['tinh_trang']==1){
             ?>
                <a href="huy_don.php?ma_hoa_don=<?php echo $each['ma']?>&tinh_trang=4">Hủy Đơn</a>
                <?php } ?>
                <?php if($each['tinh_trang']==2){
             ?>
                <?php } ?>
            </th>
        </tr>
        <?php endforeach ?>
    </table>
    <?php include 'rut_gon/footer.php' ?>
</body>

</html>