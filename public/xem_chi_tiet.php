<!DOCTYPE html>
<html>

<head>
    <title>Giỏ hàng chi tiết</title>
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

    .copy_right {
        text-align: center;
        padding: 15px 0;
    }

    .copy_right p {
        font-size: 12px;
        color: #747474;
    }

    .copy_right p a {
        color: #747474;
        font-size: 12px;
        text-decoration: underline;
    }

    .copy_right p a:hover {
        color: #BBB7B7;
        text-decoration: none;
    }

    .loi {
        color: red;
    }
    </style>
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
	$ma_hoa_don = $_GET['ma_hoa_don'];
	include 'connect.php';
	$thu_muc_anh = 'images/img_sp/';
	$sql = "select * from hoa_don_chi_tiet 
	join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
    join hoa_don on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
	where ma_hoa_don = '$ma_hoa_don'";
	$result = mysqli_query($connect,$sql);
	$tong = 0;
?>
    <?php include 'rut_gon/header-top.php'?>
    <?php include 'rut_gon/header-menu.php'?>
    <table border="1" width="70%" align="center">
        <tr>

            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            <th>Mã Vận Đơn</th>
        </tr>

        <?php foreach ($result as $each): ?>
        <tr>
            <th>
                <a href="chi_tiet.php?ma=<?php echo $each['ma']?>">
                    <?php echo $each['ten']?>

                </a>
            </th>
            <th>
                <img height="150" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
            </th>
            <th>
                <?php echo $each['so_luong']?>
            </th>
            <th>
                <?php
					$num = $each['gia'];
					$formattedNum = number_format($num);
					echo $formattedNum;
				?>
                VNĐ
            </th>
            <th>
                <?php
					$num = $each['gia'] *$each['so_luong'];
					$formattedNum = number_format($num);
					echo $formattedNum;
				?> VNĐ

                <?php $tong += $each['gia'] * $each['so_luong']?>
            </th>
            <th>
                <?php echo $each['ma_don_hang']?>
            </th>
        </tr>
        <?php endforeach ?>

    </table>

    <h1 align="center">
        Tổng Tất Cả :
        <?php
		$num = $tong;
		$formattedNum = number_format($num);
		echo $formattedNum;
	?> VNĐ
    </h1>
    <br><br><br><br><br><br><br>
    <?php include 'rut_gon/footer.php' ?>
</body>

</html>