<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <?php include 'check.php' ?>
    <?php 
	if (!isset($_SESSION)){
		session_start();
	}	
?>
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: sans-serif;
        color: #333;
    }

    #menu ul {
        background: #303125;
        list-style-type: none;
        text-align: center;
    }

    #menu li {
        color: #f1f1f1;
        display: inline-block;
        width: 140px;
        height: 40px;
        line-height: 40px;
        margin-left: -5px;
    }

    #menu a {
        text-decoration: none;
        color: #fff;
        display: block;
    }

    #menu a:hover {
        background: #F1F1F1;
        color: #333;
    }

    .sub-menu li {
        display: none;
    }

    #menu li {
        position: relative;
    }

    .sub-menu {
        display: none;
        position: absolute;
    }

    #menu li:hover .sub-menu {
        display: block;
    }

    .sub-menu {
        margin-left: 0 !important;
    }

    .logo {
        width: 20px;
        height: 40px;
    }

    .login {
        width: 5%;
        height: 40px;
        align-items: right;
        float: right;
    }

    .mau_chu {
        color: #ffef00;
    }
    </style>
    <title>Trang quản lí của Admin</title>

    <nav class="bg-gray-800">
        <div class="container flex">
            <!-- all catagory -->
            <div class="px-8 py-4 bg-gray-800 flex items-center cursor-pointer relative group">
                <?php if ($_SESSION['cap_do']==1){ ?>
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <a href="admin.php" class="capitalize ml-2 text-white ">Admin</a>
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <a href="admin_form_insert.php" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <!-- <img src="#" class="w-5 h-5 object-contain"> -->
                        <span class="ml-6 text-gray-600 text-sm">Thêm admin</span>
                    </a>
                    <?php } ?>
                    <!-- <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="#" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Apple</span>
                </a> -->
                </div>
            </div>

            <div class="px-8 py-4 bg-gray-800 flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <a href="khachhang.php" class="capitalize ml-2 text-white ">Khách hàng</a>
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <a href="kh_form_insert.php" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <!-- <img src="#" class="w-5 h-5 object-contain"> -->
                        <span class="ml-6 text-gray-600 text-sm">Thêm Khách hàng</span>
                    </a>
                    <!-- <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="#" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Apple</span>
                </a> -->
                </div>
            </div>

            <div class="px-8 py-4 bg-gray-800 flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <a href="sanpham.php" class="capitalize ml-2 text-white ">Sản phẩm</a>
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <a href="sp_form_insert.php" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <!-- <img src="#" class="w-5 h-5 object-contain"> -->
                        <span class="ml-6 text-gray-600 text-sm">Thêm Sản phẩm</span>
                    </a>
                    <!-- <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="#" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Apple</span>
                </a> -->
                </div>
            </div>
            <div class="px-8 py-4 bg-gray-800 flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <a href="hoa_don.php" class="capitalize ml-2 text-white ">Hóa đơn</a>
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <!-- <img src="#" class="w-5 h-5 object-contain"> -->
                        <span class="ml-6 text-gray-600 text-sm">Thêm Hóa đơn</span>
                    </a>
                    <!-- <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="#" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Apple</span>
                </a> -->
                </div>
            </div>

            <!-- <div class="px-8 py-4 bg-gray-800 flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <a href="tin_tuc.php" class="capitalize ml-2 text-white ">Tin Tức</a>
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <a href="tt_form_insert.php" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="#" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">Thêm Tin Tức</span>
                    </a>
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="#" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Apple</span>
                </a>
                </div>
            </div> -->

            <div class="px-8 py-4 bg-gray-800 flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <a href="thong_ke.php" class="capitalize ml-2 text-white ">Thống kê</a>
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <!-- <img src="#" class="w-5 h-5 object-contain"> -->
                        <span class="ml-6 text-gray-600 text-sm">Thêm</span>
                    </a>
                    <!-- <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="#" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Apple</span>
                </a> -->
                </div>
            </div>
            <!-- all catagory end -->

            <!-- navbar link -->
            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 capitalize">
                    <!-- <a href="index.php" class="text-gray-200 hover:text-white transition">Trang chủ</a> -->
                    <!-- <a href="index.php" class="text-gray-200 hover:text-white transition">Sản phẩm</a>
                <a href="index.php" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="index.php" class="text-gray-200 hover:text-white transition">Liên hệ</a> -->
                </div>
                <?php if (!isset($_SESSION['ma'])){ ?>
                <?php }else{ ?>
                <span>
                    <a href="logoutad.php" class="text-gray-200 hover:text-white transition">Đăng xuất</a>
                </span>
                <?php } ?>

            </div>
        </div>
    </nav>

</body>

</html>