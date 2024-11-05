<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Chi tiết</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'rut_gon/head.php' ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <style type="text/css">
	.single-product-area {
		padding: 80px 0 130px;
	}
	.product-main-img {
		margin-bottom: 20px;
	}
	.product-inner-price {
		margin-bottom: 25px;
	}
	.product-inner-price > ins {
		color: #5a88ca;
		font-weight: 700;
		margin-right: 10px;
		text-decoration: none;
	}
	.add_to_cart_button {
		background: none repeat scroll 0 0 #5a88ca;
		border: medium none;
		color: #fff;
		padding: 6px 25px;display: inline-block
	}
	.add_to_cart_button:hover {background-color: #222;color: #fff;text-decoration: none}
	form.cart {
		margin-bottom: 25px;
	}
	.tab-content {
		margin-bottom: 30px;
	}
</style> -->
</head>

<body>
    <?php include 'rut_gon/header-top.php'?>
    <?php include 'rut_gon/header-menu.php'?>

    <?php 
	$thu_muc_anh = 'images/img_sp/';
	$tim_kiem = '';
	include 'connect.php';
	if(! empty($tim_kiem)) {
		$ma = $_GET['ma'];
	}
	$ma = $_GET['ma'];
	$sql = "select san_pham.*, hang.ten as ten_hang, the_loai.ten_the_loai as ten_the_loai
	from san_pham
	JOIN hang on hang.ma = san_pham.ma_hang
	join the_loai on the_loai.ma_the_loai = san_pham.ma_the_loai
    where san_pham.ma = '$ma';";
	$result = mysqli_query($connect,$sql);
	?>
    <?php foreach ($result as $each): ?>
    <!-- breadcrums -->
    <div class="container py-4 flex items-center gap-3">
        <a href="index.php" class="text-red-400 text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <a href="all_sp.php" class="text-gray-600 font-medium">Shop</a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium"><?php echo $each['ten']?></p>
    </div>
    <!-- breadcrums end -->
    <!-- product view -->
    <div class="container grid grid-cols-2 gap-6">
        <!-- product image -->
        <div>
            <img src="<?php echo $thu_muc_anh . $each['anh']?>" class="w-full">
            <div class="grid grid-cols-5 gap-4 mt-4">
                <!-- <img src="<?php echo $thu_muc_anh . $each['anh']?>" class="w-full cursor-pointer border border-red-400">
                <img src="<?php echo $thu_muc_anh . $each['anh']?>" class="w-full cursor-pointer border">
                <img src="<?php echo $thu_muc_anh . $each['anh']?>" class="w-full cursor-pointer border">
                <img src="<?php echo $thu_muc_anh . $each['anh']?>" class="w-full cursor-pointer border">
                <img src="<?php echo $thu_muc_anh . $each['anh']?>" class="w-full cursor-pointer border"> -->
            </div>
        </div>
        <!-- product image end -->
        <!-- product content -->
        <div>
            <h2 class="text-3xl font-medium uppercase mb-2"><?php echo $each['ten']?></h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
                <div class="text-xs text-gray-500 ml-3">
                    (150 reviews)
                </div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Tình trạng hàng:</span>
                    <?php if($each['kho'] != 0){?>
                    <span class="text-green-600">Có sẵn <?php echo $each['kho']?></span>
                    <?php }else{?>
                    <span class="text-red-700">Hết hàng <?php echo $each['kho']?></span>
                    <?php }?>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Brand:</span>
                    <span class="text-gray-600">
                        <?php echo $each['ten_hang'] ?>
                    </span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Thể loại:</span>
                    <span class="text-gray-600"><?php echo $each['ten_the_loai'] ?></span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-2xl text-red-400 font-semibold">
                    <?php
						$num = $each['gia'];
						$formattedNum = number_format($num);
						echo $formattedNum;
                    ?>
                    VNĐ
                </p>
            </div>
            <p class="mt-4 text-gray-600">
                <?php echo $each['mo_ta']?>
            </p>
            <!-- size filter -->
            <div class="pt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Loại</h3>
                <div class="flex items-center gap-2">
                    <!-- single size -->
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="256">
                        <label for="256"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-10 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            256GB
                        </label>
                    </div>
                    <!-- single size end -->

                    <!-- single size -->
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="128">
                        <label for="128"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-10 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            128GB
                        </label>
                    </div>
                    <!-- single size end -->

                    <!-- single size -->
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="512">
                        <label for="512"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-10 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            512GB
                        </label>
                    </div>
                    <!-- single size end -->
                </div>
            </div>
            <!-- size filter end -->
            <!-- color filter -->
            <div class="pt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Màu</h3>
                <div class="flex items-center gap-2">
                    <!-- single color -->
                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color-red">
                        <label for="color-red"
                            class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block"
                            style="background-color: #fc3d57;"></label>
                    </div>
                    <!-- single color end -->
                    <!-- single color -->
                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color-black">
                        <label for="color-black"
                            class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block"
                            style="background-color: #fff;"></label>
                    </div>
                    <!-- single color end -->
                    <!-- single color -->
                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color-white">
                        <label for="color-white"
                            class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block"
                            style="background-color: #000;"></label>
                    </div>
                    <!-- single color end -->
                </div>
            </div>
            <!-- color filter end -->
            <!-- Quantity -->
            <!-- <div class="mt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Số lượng</h3>
                <?php if($each['kho'] != 0){?>
                <div class="flex border bordder-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-8 text-base flex items-center justify-center">4</div>
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
                <?php }else{?>
                <div class="flex border bordder-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-8 text-base flex items-center justify-center">0</div>
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
                <?php }?>
            </div> -->
            <!-- Quantity end -->

            <!-- cart button -->
            <div class="flex gap-3 border-b border-gray-200 pb-5 mt-6">
                <a href="gio_hang/add_sp.php?ma=<?php echo $each['ma'] ?>"
                    class="bg-red-400 border border-red-400 text-gray-800 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-red-400 transition"
                    onclick="alert('Đã thêm vào giỏ hàng.')">
                    <i class="fas fa-shopping-bag"></i>
                    <button type="submit">Thêm vào giỏ hàng</button>
                </a>
            </div>
            <!-- cart button end -->
        </div>
        <!-- product content end -->
    </div>
    <!-- product view end -->
    <!-- product content -->
    <div class="container pb-16 mt-4">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Chi tiết sản phẩm</h3>
        <div class="w-3/5 pt-6">
            <!-- <div class="text-gray-600 space-y-3">
                <p>

                </p>
            </div> -->
            <!-- table -->
            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                <tr>
                    <th class="py-2 px-4 border w-40 font-medium">Màu</th>
                    <td class="py-2 px-4 border">Đỏ, trắng, đen</td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border w-40 font-medium">Loại</th>
                    <td class="py-2 px-4 border">128GB, 256GB, 512GB</td>
                </tr>
            </table>
            <!-- table end -->
        </div>
    </div>
    <!-- product content end -->
    <?php endforeach ?>

    <?php include 'rut_gon/footer.php' ?>
    <?php include 'js/js-slide.php' ?>
</body>

</html>