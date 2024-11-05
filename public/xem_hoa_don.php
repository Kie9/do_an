<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hóa đơn</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'rut_gon/head.php' ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
	if(isset($_SESSION['ma'])){
		$ma_khach_hang = $_SESSION['ma'];
	}else{
		echo '<a href="login/form_login.php">Bạn chưa đăng nhập</a>';
	}
	include 'connect.php';
	$thu_muc_anh = 'images/img_sp/';
	$sql = "select hoa_don.ma as ma_hoa_don, hoa_don.*, san_pham.ma as san_pham_ma, san_pham.* from hoa_don
	join san_pham on san_pham.ma = hoa_don.ma_san_pham
	where ma_khach_hang = '$ma_khach_hang' order by tinh_trang;";
	$result = mysqli_query($connect,$sql);
	?>

    <?php foreach ($result as $each): ?>
    <?php 
	$ma_the_loai = $each['ma_the_loai'];
	$sql1 = "SELECT * FROM `the_loai` where ma_the_loai = '$ma_the_loai'";
	$result1 = mysqli_query($connect,$sql1);
	$each1 = mysqli_fetch_assoc( $result1 );
	$ma_hoa_don = $each['ma_hoa_don'];
	$sql2 = "select * from hoa_don_chi_tiet 
	join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
	join hoa_don on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
	where ma_hoa_don = '$ma_hoa_don'";
	$result2 = mysqli_query($connect,$sql2);
	$each2 = mysqli_fetch_assoc( $result2 );
	$tong = 0;
	?>
    <!-- hoa_don wrapper -->
    <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">
        <div class="col-span-1 bg-white px-4 pb-6 overflow-hidden">
        </div>
        <div class="col-span-3">
            <div class="grid grid-cols-1">
                <div class="bg-white shadow-md rounded-md p-4 mt-4">
                    <div class="flex mt-4">
                        <div class="w-1/4">
                            <img src="<?php echo $thu_muc_anh . $each['anh'] ?>" class="rounded-md">
                        </div>
                        <div class="w-3/4 ml-4">
                            <h3 class="text-xl font-medium"><a href="chi_tiet.php?ma=<?php echo $each['ma']?>">
                                    <?php echo $each['ten']?>
                                </a>
                            </h3>
                            <p class="text-gray-600 mt-2"><?php echo $each1['ten_the_loai']?></p>
                            <p class="text-gray-600 mt-2">
                                Số lượng:
                                <?php if(isset($each2['so_luong'])){?>
                                <?php echo $each2['so_luong']?>
                                <?php }else{?>0<?php }?>
                            </p>
                            <button
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-full mt-2">Trả
                                hàng miễn phí 15 ngày</button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            <p class="text-gray-600 ml-2">
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
                            </p>

                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-600 ml-2">ĐÁNH GIÁ</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <p class="text-gray-600"></p>
                        <p class="text-red-500 font-medium">
                            <?php
						$num = $each['gia'];
						$formattedNum = number_format($num);
						echo $formattedNum;
						?>
                            VNĐ
                            <?php
						// $num = $each['gia'] *$each2['so_luong'];
						// $formattedNum = number_format($num);
						// echo $formattedNum;
						?>
                            <?php if(!isset($each2['so_luong'])){?>
                            <?php $so_luong = 0; $tong += $each['gia'] * $so_luong ?>
                            <?php }else{?>
                            <?php $tong += $each['gia'] * $each2['so_luong']?>
                            <?php }?>
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3S13.657 8 12 8zM2 9h10a2 2 0 002 2v8a2 2 0 002 2h8a2 2 0 002-2v-8a2 2 0 00-2-2h-10z" />
                    </svg> -->
                            <div class="text-red-400">

                            </div>
                        </div>
                        <div class="text-red-500 font-medium">
                            <p class="text-gray-600 ml-2">Thành tiền:</p>
                            <?php
							$num = $tong;
							$formattedNum = number_format($num);
							echo $formattedNum;
							?> VNĐ
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <?php if($each['tinh_trang']==1){
             			?>
                        <a href="huy_don.php?ma_hoa_don=<?php echo $each['ma']?>&tinh_trang=4"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full w-1/3 text-center">Hủy
                            Đơn</a>
                        <?php } ?>
                        <?php if($each['tinh_trang']==2){
            			?>
                        <?php } ?>
                        <a href="#"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full w-1/3">Mua
                            Lại</a>
                        <button
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-full w-1/3">Liên
                            Hệ Người Bán</button>
                        <button
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-full w-1/3">Xem
                            Đánh Giá Shop</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hoa_don wrapper end -->
    <?php endforeach ?>, initial-scale=1.0">
    <title>Document</title>

</body>

</html>