<style type="text/css">
.content1 {
    width: 33%;
    float: left;
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
    padding: 7px 5px 7px 5px;
}
</style>

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

	$sp_1_trang = 5;

	$so_trang = ceil( $all_sp / $sp_1_trang );

	$trang = 1;
	if (isset($_GET['trang'])) {
	$trang = $_GET['trang'];}

	$skip_sp = ($trang - 1) * $sp_1_trang;

	$sql = "$sql limit $sp_1_trang offset $skip_sp";
	$result = mysqli_query($connect,$sql);
?>
<br><br>
<hr width="70%">
<br>


<!-- product wrapper -->
<div class="container pb-16">
    <h2 class="text-2xl font-medium text-grey-800 uppercase mb-6 font-poppins">top new arrival</h2>

    <!-- product grid -->
    <div class="grid grid-cols-4 gap-6">
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
            <div
                class="block w-full py-1 text-center text-white bg-red-400 border border-red-400 rounded-b hover:bg-transparent hover:text-red-400 transition">
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
<br><br><br><br><br><br><br><br>
<!-- product wrapper end -->
<hr width="70%">
<script type="text/javascript">

</script>