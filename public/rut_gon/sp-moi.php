<!-- <style type="text/css">
.content1 {
    width: 33%;
    float: left;
    background-color: white;
}

.a1 {
    display: block;
    float: left;
    margin: 0% 0 0% 0%;
    box-shadow: 0px 0px 0px rgb(150, 150, 150);
    width: 33%
}

.a2 {
    width: 100%;
    padding: 0px;
    text-align: center;
    position: relative;
}

.a2 img {
    max-width: 90%;
}

.discount {
    background: url(../images/discount-img.png) no-repeat 0 0;
    position: absolute;
    top: 30px;
    width: 40px;
    height: 40px;
}

.discount span.percentage {
    color: #FFF;
    font-size: 1em;
    font-weight: bold;
    line-height: 40px;
}

.a2 h2 {
    color: #CC3636;
    font-family: 'Monda', sans-serif;
    font-size: 0.9em;
    font-weight: normal;
}

.a2 p {
    font-size: 0.8125em;
    padding: 0.4em 0;
    color: #333;
}

.a2 p span.strike {
    font-size: 18px;
    font-family: 'Monda', sans-serif;
    color: #444;
    text-decoration: line-through;
}

.a2 p span.price {
    font-size: 18px;
    font-family: 'Monda', sans-serif;
    color: #CC3636;
    margin-left: 15px;
}

.a2 .button {
    margin-top: .3em;
    line-height: 1.9em;
}

.a2 .button a {
    padding: 7px 20px;
    font-size: 0.8em;
}

.a2 .button a {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: 14px;
    line-height: 15px;
    text-transform: none;
    color: #737370;
    text-decoration: none !important;
    background: url(../images/button-bg.png) repeat-x 0 0 #E8E8E8;
    display: inline-block;
    border-left: 1px solid #D4D4D4 !important;
    border-right: 1px solid #ADADAD !important;
    border-top: 1px solid #E0E0E0 !important;
    border-bottom: 1px solid #9C9C9C !important;
    cursor: pointer !important;
    margin: 0 2px;
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.a2 .button a:hover {
    color: #70389C;
    background: #E8E8E8;
}

.a2 .button span img {
    position: absolute;
}

.a2 .button a.cart-button {
    padding: 7px 5px 7px 38px;
}
</style> -->

<?php 
$thu_muc_anh = 'images/img_sp/';
include 'connect.php';
$tim_kiem = '';
if (isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
}
$sql = "select san_pham.*,
hang.ten as 'ten_hang' from san_pham
join hang on hang.ma = san_pham.ma_hang
where san_pham.ten like '%$tim_kiem%'";

$result = mysqli_query($connect,$sql);

$all_sp = mysqli_num_rows($result);

$sp_1_trang = 9;

$so_trang = ceil( $all_sp / $sp_1_trang );

$trang = 1;
if (isset($_GET['trang'])) {
$trang = $_GET['trang'];}

$skip_sp = ($trang - 1) * $sp_1_trang;

$sql = "$sql limit $sp_1_trang offset $skip_sp";
$result = mysqli_query($connect,$sql);
?><br><br>
<hr width="70%">

<br>
<!-- breadcrums -->
<div class="container py-4 flex items-center gap-3">
    <a href="index.php" class="text-red-400 text-base">
        <i class="fas fa-home"></i>
    </a>
    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Shop</p>
</div>
<!-- breadcrums end -->

<!-- shop wrapper -->
<div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">
    <!-- sidebar -->
    <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
        <div class="divide-y divide-gray-800 space-y-5">
            <!-- catagory filter -->
            <div>
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Thể loại</h3>
                <div class="space-y-2 ">
                    <!-- single catagory -->
                    <div class="flex items-center">
                        <input type='checkbox' id="cat-1" class="text-red-400 focus:ring-0 rounded-sm cursor-pointer">
                        <label for="cat-1" class="text-gray-600 ml-3 cursor-pointer">Điện thoại</label>
                        <div class="ml-auto text-gray-600 text-sm ">(15)</div>
                    </div>
                    <!-- single catagory end-->
                    <!-- single catagory -->
                    <div class="flex items-center">
                        <input type="checkbox" id="cat-2" class="text-red-400 focus:ring-0 rounded-sm cursor-pointer">
                        <label for="cat-2" class="text-gray-600 ml-3 cursor-pointer">Phụ kiện</label>
                        <div class="ml-auto text-gray-600 text-sm ">(22)</div>
                    </div>
                    <!-- single catagory end-->
                </div>
            </div>
            <!-- catagory filter end -->

            <!-- brand filter -->
            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Hãng</h3>
                <div class="space-y-2 ">
                    <!-- single catagory -->
                    <div class="flex items-center">
                        <input type="checkbox" id="Samsung" class="text-red-400 focus:ring-0 rounded-sm cursor-pointer">
                        <label for="Samsung" class="text-gray-600 ml-3 cursor-pointer">Samsung</label>
                        <div class="ml-auto text-gray-600 text-sm ">(15)</div>
                    </div>
                    <!-- single catagory end-->
                    <!-- single catagory -->
                    <div class="flex items-center">
                        <input type="checkbox" id="Apple" class="text-red-400 focus:ring-0 rounded-sm cursor-pointer">
                        <label for="Apple" class="text-gray-600 ml-3 cursor-pointer">Apple</label>
                        <div class="ml-auto text-gray-600 text-sm ">(22)</div>
                    </div>
                    <!-- single catagory end-->
                </div>
            </div>
            <!-- brand filter end -->

            <!-- price filter -->
            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Price</h3>
                <div class="mt-4 flex items-center">
                    <input type="text"
                        class="w-full border-gray-300 focus:border-red-400 focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded"
                        placeholder="min">
                    <span class="mx-3 text-gray-500">-</span>
                    <input type="text"
                        class="w-full border-gray-300 focus:border-red-400 focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded"
                        placeholder="max">
                </div>
            </div>
            <!-- price filter end -->

            <!-- size filter -->
            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Loại</h3>
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
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Màu</h3>
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
        </div>
    </div>
    <!-- sidebar end-->

    <!-- products -->
    <div class="col-span-3">
        <!-- sorting -->
        <div class="flex items-center mb-4">
            <select
                class="w-44 text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-red-400 focus:border-red-400">
                <option>Default Sorting</option>
                <option>Latest Product</option>
            </select>

            <div class="flex gap-2 ml-auto">
                <div
                    class="border border-red-400 w-10 h-9 flex items-center justify-center text-white bg-red-400 rounded cursor-pointer">
                    <i class="fas fa-th"></i>
                </div>
                <div
                    class="border border-gray-800 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                    <i class="fas fa-list"></i>
                </div>
            </div>
        </div>
        <!-- sorting end -->
        <!-- product grid -->
        <div class="grid grid-cols-3 gap-6">
            <?php foreach ($result as $each): ?>
            <!-- single product -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- product image -->
                <div class="relative">
                    <img src="<?php echo $thu_muc_anh . $each['anh'] ?>" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="chi_tiet.php?ma=<?php echo $each['ma'] ?>"
                            class="text-white text-lg w-9 h-8 rounded-full bg-red-400 flex items-center justify-center hover:bg-gray-800 transition">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                <!-- product image end -->
                <!-- product content -->
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-red-400 transition">
                            <?php echo $each['ten'] ?></h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                        <p class="text-xl text-red-400 font-semibold">
                            <?php
                            $num = $each['gia'];
                            $formattedNum = number_format($num);
                            echo $formattedNum;
                        ?>
                            VNĐ
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <?php if (isset($_SESSION['ma'])){ ?>
                <a href="gio_hang/add_sp.php?ma=<?php echo $each['ma'] ?>" onclick="alert('Đã thêm vào giỏ hàng.')"
                    class="block w-full py-1 text-center text-white bg-red-400 border border-red-400 rounded-b hover:bg-transparent hover:text-red-400 transition">
                    Thêm vào giỏ
                </a>
                <?php }else{ ?>
                <div class="button">
                    <a href="login/form_login.php">Mua ngay</a>
                </div>
                <?php } ?>
                <a href="chi_tiet.php?ma=<?php echo $each['ma'] ?>"
                    class="block w-full py-1 text-center text-white bg-red-400 border border-red-400 rounded-b hover:bg-transparent hover:text-red-400 transition">Chi
                    tiết</a>
                <!-- product content end -->
            </div>
            <?php endforeach ?>
            <!-- single product end -->
        </div>
        <!-- product grid end -->
    </div>
    <!-- products wrap-->
</div>
<!-- shop wrapper end -->
<p align="center">
    Trang:
    <?php for ($i=1; $i <= $so_trang ; $i++){ ?>
    <a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
        <?php echo $i ?>
    </a>
    <?php } ?>
</p>
<hr width="70%">