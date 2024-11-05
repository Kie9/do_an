<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>

<body>
    <?php
include 'index1.php';
include '../connect.php';
$sql = "select * from admin";
$result = mysqli_query($connect, $sql);
?>
    <h1 class="text-2xl font-medium text-grey-800 uppercase mb-6 font-poppins">Admin - Tài khoản</h1><br><br>
    <table class="border w-full">
        <tr class="border">
            <th>Họ Tên</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>CMND</th>
            <th>Cấp Độ</th>
            <th>Sửa Thông Tin</th>
            <th>Xóa Thông Tin</th>
        </tr>
        <?php foreach ($result as $each): ?>
        <tr class="border">
            <td class="border">
                <?php echo $each['ho_ten'] ?>
            </td>
            <td class="border">
                <?php echo $each['sdt'] ?>
            </td>
            <td class="border">
                <?php echo $each['email'] ?>
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
                <?php echo $each['ngay_sinh'] ?>
            </td>
            <td class="border">
                <?php echo $each['cmnn'] ?>
            </td>
            <td class="border">
                <?php 
			if ($each ['cap_do'] == 0){
				echo "Nhân Viên";
			}else{
				echo "Admin";
			}
			?>
            </td>
            <td class="border">
                <a href="admin_form_update.php?ma=<?php echo $each['ma']?>"
                    class="block w-full py-1 text-center text-white bg-gray-800 border border-gray-800 rounded-b hover:bg-transparent hover:text-red-400 transition">
                    Sửa
                </a>
            </td>
            <td class="border">
                <a href="sp_delete.php?ma=<?php echo $each['ma']?>"
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