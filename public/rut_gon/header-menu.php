<!-- <div class="wrap">
    <div class="h_menu">
        <a id="touch-menu" class="mobile-menu" href="#">Menu</a>
        <nav>
            <ul class="menu list-unstyled">
                <li><a href="index.php">Trang chủ</a></li>
                <li class="activate"><a href="all_sp.php">Sản phẩm</a></li>
                <li><a href="#">Nổi bật</a></li>
                <li><a href="tin_tuc.php">Tin tức</a></li>
                <li><a href="#">Liên hệ</a></li>
                <div class="clear"> </div>
            </ul>
        </nav>
    </div>
</div> -->
<!-- navbar -->
<nav class="bg-gray-800">
    <div class="container flex">
        <!-- all catagory -->
        <div class="px-8 py-4 bg-red-400 flex items-center cursor-pointer relative group">
            <span class="text-white">
                <i class="fas fa-bars"></i>
            </span>
            <span class="capitalize ml-2 text-white ">Danh mục</span>

            <div
                class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="images\smart-phone.png" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">
                        Điện thoại
                    </span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="images\apple-phone.jpg" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Phụ kiện</span>
                </a>
            </div>
        </div>
        <!-- all catagory end -->

        <!-- navbar link -->
        <div class="flex items-center justify-between flex-grow pl-12">
            <div class="flex items-center space-x-6 capitalize">
                <a href="index.php" class="text-gray-200 hover:text-white transition">Trang chủ</a>
                <a href="all_sp.php" class="text-gray-200 hover:text-white transition">Sản phẩm</a>
                <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="#" class="text-gray-200 hover:text-white transition">Liên hệ</a>
            </div>
            <!-- <a href="#" class="text-gray-200 hover:text-white transition">Đăng ký</a> -->
        </div>
    </div>
</nav>
<!-- navbar end -->