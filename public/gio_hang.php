<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Giỏ hàng</title>
    <style type="text/css">
    .wrap {
        width: 78%;
        margin: 0 auto;
        padding: 0 1%;
        background: white;
    }

    .header {
        background: #FFF;
    }

    .header_top {
        padding: 20px 0;
    }

    .logo {
        float: left;
        width: 33%;
    }

    .header_top_right {
        float: left;
        width: 67%;
        margin-top: 35px;
    }

    .search_box {
        float: left;
        border: 1px solid #DBDBDB;
        position: relative;
        width: 47%;
    }

    .search_box input[type="text"] {
        width: 74%;
        padding: 10px 8px;
        outline: none;
        border: none;
        background: none;
        font-size: 14px;
        color: #a5a5a5;
        font-family: Arial;
        outline: none;
        margin: 0;
    }

    .search_box input[type="submit"] {
        border: none;
        cursor: pointer;
        color: #FFF;
        font-size: 12px;
        padding: 10px 15px;
        height: 36px;
        margin: 0;
        background: -webkit-gradient(linear, left top, left bottom, from(#70389C), to(#602D8D));
        background: -moz-linear-gradient(top, #70389C, #602D8D);
        background: -o-linear-gradient(top, #70389C, #602D8D);
        background: -ms-linear-gradient(top, #70389C, #602D8D);
        -webkit-transition: all .9s;
        -moz-transition: all .9s;
        -o-transition: all .9s;
        -ms-transition: all .9s;
        transition: all .9s;
        position: absolute;
        right: 0;
        top: 0;
    }

    .search_box input[type="submit"]:hover {
        background: #444;
    }

    .shopping_cart {
        float: left;
        width: 202px;
        position: relative;
        margin-left: 15px;
        padding: 0 0 0 46px;
        background: url(../images/header_cart.png) 0 0 no-repeat;
        z-index: 99;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        cursor: pointer;
    }

    .cart {
        height: 38px;
        padding: 0 0 0 10px;
        background: #EDEDED;
        border: 1px solid #CECECE;
        border-left: none;
        line-height: 36px;
        -webkit-border-radius: 0 2px 2px 0;
        border-radius: 0 2px 2px 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .shopping_cart .cart .opencart {
        width: 7px;
        height: 5px;
        display: block;
        background: url(../images/header_arrow.png) 0 0 no-repeat;
        position: absolute;
        right: 11px;
        top: 16px;
    }

    .shopping_cart span.cart_title {
        font-size: 13px;
        font-weight: bold;
        color: #4F4F4F;
    }

    .shopping_cart span.no_product {
        font-size: 13px;
        font-weight: bold;
        color: #DD0F0E;
    }

    .wrapper-dropdown.active .dropdown {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        max-height: 400px;
        width: 95px;
        z-index: 1;
        background: #70389C;
    }

    .login {
        float: left;
        margin-left: 10px;
        width: 60px;
        height: 38px;
        display: block;
        border: 1px solid #CECECE;
        text-align: center;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background: url(../images/gradient_light-1.png) 0 0 repeat-x;
    }

    .login span a img {
        padding-top: 8px;
    }

    .wrapper {
        width: 78%;
        margin: 0 auto;
        padding: 0 1%;
    }

    .footer {
        position: relative;
        background: #414045;
        background: -moz-linear-gradient(top, #414045 55%, #2f2e33 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(55%, #414045), color-stop(100%, #2f2e33));
        background: -webkit-linear-gradient(top, #414045 55%, #2f2e33 100%);
        background: -o-linear-gradient(top, #414045 55%, #2f2e33 100%);
        background: -ms-linear-gradient(top, #414045 55%, #2f2e33 100%);
        background: linear-gradient(to bottom, #414045 55%, #2f2e33 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#414045', endColorstr='#2f2e33', GradientType=0);
        box-shadow: inset 0px 1px 8px #222;
    }

    .section {
        clear: both;
        padding: 0px;
        margin: 0px;
    }

    .group:before,
    .group:after {
        content: "";
        display: table;
    }

    .group:after {
        clear: both;
    }

    .group {
        zoom: 1;
    }

    .col_1_of_4 {
        display: block;
        float: left;
        margin: 0% 0 1% 1.6%;
        border-right: 2px groove #555;
    }

    .col_1_of_4:first-child {
        margin-left: 0;
    }

    .col_1_of_4:last-child {
        border: none;
    }

    .span_1_of_4 {
        width: 20.5%;
        padding: 1.5%;
    }

    .span_1_of_4 h4 {
        color: #ccc;
        margin-bottom: .5em;
        font-size: 1.2em;
        line-height: 1.2;
        font-family: 'Doppio One', sans-serif;
        font-weight: normal;
        margin-top: 0px;
        letter-spacing: -1px;
        text-transform: uppercase;
        border-bottom: 1px solid #474747;
        padding-bottom: 0.5em;
    }

    .span_1_of_4 li a {
        font-size: 0.8125em;
        padding: 0.4em 0;
        color: #979797;
        font-family: Arial, Helvetica, sans-serif;
        display: block;
    }

    .span_1_of_4 li a:hover,
    .span_1_of_4 li span:hover {
        color: #BBB7B7;
    }

    .span_1_of_4 li span {
        font-size: 1.2em;
        padding: 0.2em 0;
        color: #979797;
        display: block;
        cursor: pointer;
    }

    /* .copy_right{
			text-align:center;
			padding:15px 0;
		}
		.copy_right p{
			font-size:12px;
			color:#747474;
		}
		.copy_right p a{
		    color:#747474;
			font-size:12px;
			text-decoration:underline;
		}
		.copy_right p a:hover{
			color:#BBB7B7;
			text-decoration:none;
		} */
    .loi {
        color: red;
    }

    .so_luong {
        width: 30px;
        padding: 3px;
        margin: 5px 0 22px 0;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include 'rut_gon/header-top.php'?>
    <?php include 'rut_gon/header-menu.php' ?>

    <?php
	if (!empty($_SESSION['gio_hang'])){
	include 'connect.php';
	$tong = 0;
    // retrieve the current cart contents
    $cart_contents = $_SESSION['gio_hang'];
	?>
    <!-- <a style="text-align: left;" class="text-red-400" href="index.php">
        <h1>Về mua tiếp</h1>
    </a> -->
    <br>
    <!-- breadcrums -->
    <div class="container py-4 flex items-center gap-3">
        <a href="index.php" class="text-red-400 text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Giỏ hàng</p>
    </div>
    <!-- breadcrums end -->

    <!-- checkout wrapper -->
    <div class="container gap-6 grid grid-cols-12 items-start pb-16 pt-4">
        <?php 
		$ma = $_SESSION['ma'];
		$sql = "select * from khach_hang where ma = '$ma' ";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);
	    ?>
        <!-- checkout form -->
        <form action="gio_hang/process_dat_hang.php" method="post" id="checkout-form"
            class="col-span-4 border border-gray-400 p-4 rounded">
            <h3 class="text-lg font-medium capitalize mb-4">Thanh toán</h3>
            <div class="space-y-4">
                <!-- <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-gray-600 mb-2 block">First name <span class="text-red-400">*</span></label>
                        <input type="text" class="input-box">
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block">Last name <span class="text-red-400">*</span></label>
                        <input type="text" class="input-box">
                    </div>
                </div> -->
                <div>
                    <label class="text-gray-600 mb-2 block">Họ tên<span class="text-red-400">*</span></label>
                    <input type="text" id="name" class="input-box" name="ten_nguoi_nhan"
                        value="<?php echo $each['ten']?>">
                </div>
                <div>
                    <label class="text-gray-600 mb-2 block">Số điện thoại<span class="text-red-400">*</span></label>
                    <input type="text" id="sdt" class="input-box" name="sdt_nguoi_nhan"
                        value="<?php echo $each['sdt']?>">
                </div>
                <div>
                    <label class="text-gray-600 mb-2 block">Địa chỉ<span class="text-red-400">*</span></label>
                    <input type="text" id="diachi" class="input-box" name="dia_chi_nguoi_nhan"
                        value="<?php echo $each['dia_chi']?>">
                </div>
            </div>
        </form>
        <!-- checkout form end -->
        <!-- sidebar -->
        <div class="col-span-8 border border-gray-400 p-4 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Giỏ hàng</h4>
            <div class="space-y-2">

                <?php foreach ($cart_contents as $ma => $so_luong): ?>
                <?php
                $thu_muc_anh = 'images/img_sp/';
                $sql = "select * from san_pham where ma = '$ma'";
                $result = mysqli_query($connect,$sql);
                $each = mysqli_fetch_array($result);
                ?>
                <table class="table-auto w-full text-left text-gray-600 text-sm mt-6">
                    <tr>
                        <th class="py-2 px-4 w-60 font-medium">
                            <?php echo $each['ten']?>
                            <p class="text-xs text-gray-600">128GB</p>
                        </th>
                        <td class="py-2 px-4 text-right">
                            <button type="button" id="minus"
                                class="float-left h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"
                                onclick="window.location = 'gio_hang/giam_sl.php?ma=<?php echo $ma ?>'">-</button>
                            <input type="text" class="float-left h-9 w-9 text-base flex items-center justify-center"
                                size="1" class="so_luong" readonly value="<?php echo $so_luong ?>">
                            <button type="button" id="plus"
                                class="float-left h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"
                                onclick="window.location = 'gio_hang/tang_sl.php?ma=<?php echo $ma ?>'">+</button>
                        </td>
                        <td class="py-2 px-4">
                            <p class="text-gray-800 font-medium"><?php
                                $num = $each['gia'];
                                $formattedNum = number_format($num);
                                echo $formattedNum;
                            ?>
                                VNĐ
                            </p>
                        </td>
                        <td>
                            <a style="color: red; text-decoration: none;"
                                href="gio_hang/dl_sp.php?ma=<?php echo $ma ?>">Xóa</a>
                        </td>
                    </tr>
                </table>
                <!-- <div class="flex justify-between"> -->
                <!-- <div>
                        <h5 class="text-gray-800 font-medium w-full"><?php echo $each['ten']?></h5>
                        <p class="text-xs text-gray-600">128GB</p>
                    </div>
                    <div class="flex border bordder-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                        <div class="text-gray-600 flex">

                        </div>
                    </div> -->
                <!-- </div> -->
                <?php
				$num = $each['gia'] *$so_luong;
				$formattedNum = number_format($num);
			    ?>

                <?php 
                $tong += $each['gia'] * $so_luong;?>
                <?php endforeach; ?>
            </div>
            <div class="flex justify-between border-b border-gray-200 font-medium py-3 uppercase">
                <p>Tổng giá</p>
                <p>
                    <?php
                    $num = $tong;
                    $formattedNum = number_format($num);
                    echo $formattedNum;
                ?> VNĐ
            </div>
            <div class="flex justify-between border-b border-gray-200 font-medium py-3 uppercase">
                <p>Ship</p>
                <p>FREE</p>
            </div>
            <div class="flex justify-between border-b border-gray-200 font-medium py-3 uppercase">
                <p class="font-semibold">Tổng hóa đơn</p>
                <p>
                    <?php
                    $num = $tong;
                    $formattedNum = number_format($num);
                    echo $formattedNum;
                ?> VNĐ
                </p>
            </div>
            <div class="flex items-center mb-4 mt-2">
                <input type="checkbox" id="agreement"
                    class="text-red-400 focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="agreement" class="text-gray-600 ml-3 cursor-pointer text-sm">Agree to our <a href="#"
                        class="text-red-400">terms &
                        conditions</a></label>
            </div>
            <button type="submit" form="checkout-form" onclick="return ok()"
                class="w-full block text-center bg-red-400 border border-red-400 text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-red-400">
                Đặt hàng
            </button>
        </div>
        <!-- sidebar end-->
    </div>
    <!-- checkout wrapper end -->
    <!-- <img class="text-white text-lg w-12 h-8 rounded-full bg-red-400 flex items-center justify-center"
                    src="<?php echo $thu_muc_anh . $each['anh']?>"> -->
    <!-- <th>
                <button type="button" id="minus" onclick="updateQuantity(<?php echo $ma ?>, -1)">-</button>
                <input type="text" class="w-6" size="3" class="so_luong" value="<?php echo $so_luong ?>"
                    id="quantity_<?php echo $ma ?>">
                <button type="button" id="plus" onclick="updateQuantity(<?php echo $ma ?>, 1)">+</button>
            </th> -->
    <?php 
                // echo "Adding $each[gia] x $so_luong = ". ($each['gia'] * $so_luong). " to total<br>";
                // echo "Grand total: $tong<br>"; 
                // $_SESSION['grand_total'] = $tong;
                // echo "Updated grand total in session: ".$_SESSION['grand_total']."<br>";
                ?>

    <!-- // display the total price -->
    <!-- <div id="total_price"></div> -->
    <div align="right">
        <p>
        <h1>
            </p>
            <p><a class="text-red-400" href="gio_hang/dl_gh.php">Xóa toàn bộ giỏ hàng</a></p>
            <a style="text-align: center; font-size: xx-large;" class="text-red-400" href="hoa_don.php">
                <h1>Xem hóa đơn</h1>
            </a>
    </div>

    <br>
    <hr width="50%">
    <?php include 'rut_gon/footer.php' ?>
    <?php }else{ ?>
    <div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <h1 style="text-align: center; font-size: xx-large;">Giỏ hàng của bạn đang trống</h1>
        <h1 style="text-align: center; font-size: xx-large;" class="text-red-400"><a href="index.php">Về mua hàng</a>
        </h1>
        <?php if (isset($_SESSION['ma'])){ ?>
        <a style="text-align: center; font-size: xx-large;" class="text-red-400" href="hoa_don.php">
            <h1>Xem hóa đơn</h1>
        </a>
        <?php } ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include 'rut_gon/footer.php' ?>
    </div>
    <?php } ?>
</body>
<script type="text/javascript">
function ok() {
    var kiemtraloi = false;

    var ten = document.getElementById('name').value;
    if (ten == "") {
        document.getElementById('errname').innerHTML = 'Lỗi';
        kiemtraloi = true;
    } else {
        document.getElementById('errname').innerHTML = '';
    }

    var phone = document.getElementById('sdt').value;
    if (phone == "") {
        document.getElementById('errphone').innerHTML = 'Lỗi';
        kiemtraloi = true;
    } else {
        document.getElementById('errphone').innerHTML = '';
    }

    var address = document.getElementById('diachi').value;
    if (address == "") {
        document.getElementById('errdiachi').innerHTML = 'Lỗi';
        kiemtraloi = true;
    } else {
        document.getElementById('errdiachi').innerHTML = ''
    }
    if (kiemtraloi == true) {
        return false;
    }
}

function updateQuantity(ma, delta) {
    // Get the current quantity value
    var currentQuantity = parseInt($("#quantity_" + ma).val());

    // Update the quantity value immediately
    if (delta == 1) {
        $("#quantity_" + ma).val(currentQuantity + 1);
    } else if (delta == -1) {
        if (currentQuantity > 1) {
            $("#quantity_" + ma).val(currentQuantity - 1);
        }
    }

    // Send the AJAX request to update the server-side quantity
    $.ajax({
        type: "POST",
        url: "update_quantity.php",
        data: {
            ma: ma,
            delta: delta
        },
        success: function(data) {
            // Update the total price element
            $("#total_" + ma).html(data.total + " VNĐ");
        }
    });

    // Send AJAX request to update grand total price
    $.ajax({
        type: "POST",
        url: "update_grand_total.php",
        data: {
            ma: ma,
            delta: delta
        },
        success: function(data) {
            // Update the grand total price element
            $("#total_price").html(data.total + " VNĐ");
        }
    });
}

// AJAX call to remove item
function removeItem(ma) {
    $.ajax({
        type: "POST",
        url: "remove_item.php",
        data: {
            ma: ma
        },
        success: function(data) {
            // remove the item from the cart
            $("#cart_contents").html(data);
        }
    });
}
// var plus = document.getElementById('plus');
// btn.addEventListener('click', function() {
// 	document.location.href = 'gio_hang/tang_sl.php?ma=';
// });

// var minus = document.getElementById('minus');
// btn.addEventListener('click', function() {
// 	document.location.href = 'gio_hang/giam_sl.php?ma=';
// });
</script>

</html>