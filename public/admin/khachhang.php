<!DOCTYPE HTML>
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Khách hàng</title>
</head>

<body>
    <?php
include 'index1.php';
include '../connect.php';
$sql = "select * from khach_hang ";
$result = mysqli_query($connect,$sql);
?>
    <h1 class="text-2xl font-medium text-grey-800 uppercase mb-6 font-poppins">Admin - Khách hàng</h1><br><br>
    <table class="border w-full">
        <tr class="border">
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới Tính</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Địa chỉ</th>
            <th>Sửa Thông Tin</th>
            <th>Xóa Thông Tin</th>
        </tr>
        <?php foreach ($result as $each): ?>
        <tr class="border">
            <td class="border">
                <?php echo $each['ten'] ?>
            </td>
            <td class="border">
                <?php echo $each['ngay_sinh'] ?>
            </td>
            <td class="border">
                <?php 
			if ($each ['gioi_tinh'] == 0){
				echo "Nam";
			}else{
				echo "Nữ";
			}
			?>
            </td>
            <td class="border">
                <?php echo $each['sdt'] ?>
            </td>
            <td class="border">
                <?php echo $each['email'] ?>
            </td>

            <td class="border">
                <?php echo $each['mat_khau'] ?>
            </td>
            <td class="border">
                <?php echo $each['dia_chi'] ?>
            </td>
            <td class="border">
                <a href="kh_form_update.php?ma=<?php echo $each['ma']?>"
                    class="block w-full py-1 text-center text-white bg-gray-800 border border-gray-800 rounded-b hover:bg-transparent hover:text-red-400 transition">
                    Sửa
                </a>
            </td>
            <td class="border">
                <a href="kh_delete.php?ma=<?php echo $each['ma']?>"
                    class="block w-full py-1 text-center text-white bg-red-400 border border-red-400 rounded-b hover:bg-transparent hover:text-red-400 transition"
                    onclick="return confirm('Bạn chắc chứ.')">
                    Xóa
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>

</html>