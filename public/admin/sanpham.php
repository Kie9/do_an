<!DOCTYPE html>
<html>

<head>
    <title>Admin-Sản phẩm</title>
</head>

<body>
    <?php 
$thu_muc_anh = '../images/img_sp/';
include 'index1.php';
include '../connect.php';
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

$sp_1_trang = 4;

$so_trang = ceil( $all_sp / $sp_1_trang );

$trang = 1;
if (isset($_GET['trang'])) {
$trang = $_GET['trang'];}

$skip_sp = ($trang - 1) * $sp_1_trang;

$sql = "$sql limit $sp_1_trang offset $skip_sp";
$result = mysqli_query($connect,$sql);
?>
    <h1 class="text-2xl font-medium text-grey-800 uppercase mb-6 font-poppins">Admin - Sản phẩm</h1>
    <br>
    <h1>Hiện tại đang có: <?php echo $all_sp ?> sản phẩm.</h1><br>
    <div class="w-full max-w-xl relative flex">
        <form id="search">
            <input class="border" type="search" name="tim_kiem"><br>
        </form>
        <button type="submit" form="search"
            class="bg-red-400 border-red-400 text-black px-8 rounded-r-md hover:bg-transparent hover:text-red-400 transition">Tìm
            kiếm
        </button>
    </div>
    <table class="border w-full">
        <tr class="border">
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Mô tả</th>
            <th>Ảnh sản phẩm</th>
            <th>Hãng/Thương hiệu</th>
            <th>Kho</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($result as $each): ?>
        <?php
            $ma_san_pham = $each['ma'];
            $sqlx = "SELECT * FROM `san_pham` 
            JOIN hoa_don_chi_tiet on hoa_don_chi_tiet.ma_san_pham = san_pham.ma
            WHERE ma = '$ma_san_pham'";
            $resultx = mysqli_query($connect, $sqlx);
            $eachx = mysqli_num_rows($resultx)
            ?>
        <tr class="border">
            <td class="border">
                <?php echo $each['ten'] ?>
            </td>
            <td class="border">
                <?php $num = $each['gia'];
			$formattedNum = number_format($num);
			echo $formattedNum;
			?> VNĐ
            </td>
            <td class="border">
                <?php echo $each['mo_ta'] ?>
            </td>
            <td class="border">
                <img class="shadow rounded overflow-hidden h-16 w-16 items-center justify-center"
                    src="<?php echo $thu_muc_anh . $each['anh'] ?>">
            </td>
            <td class="border">
                <?php echo $each['ten_hang'] ?>
            </td>
            <td class="border">
                <?php echo $each['kho']?>
            </td>
            <td class="border">
                <a href="sp_form_update.php?ma=<?php echo $each['ma']?>"
                    class="block w-full py-1 text-center text-white bg-gray-800 border border-gray-800 rounded-b hover:bg-transparent hover:text-red-400 transition">
                    Sửa
                </a>
            </td>
            <td class="border">
                <?php if($eachx == 0){?>
                <a href="sp_delete.php?ma=<?php echo $each['ma']?>"
                    class="block w-full py-1 text-center text-white bg-red-400 border border-red-400 rounded-b hover:bg-transparent hover:text-red-400 transition">
                    Xóa
                </a>
                <?php }else{?>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-gray-600 border border-gray-600 rounded-b hover:bg-transparent hover:text-red-400 transition"
                    readonly>
                    Không thể xóa
                </a>
                <?php }?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <p class="text-center">
        Trang:
        <?php for ($i=1; $i <= $so_trang ; $i++){ ?>
        <a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
            <?php echo $i ?>
        </a>
        <?php } ?>
    </p>
</body>

</html>