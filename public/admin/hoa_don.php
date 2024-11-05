<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin-Hóa đơn</title>
</head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    /* opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px; */
}

/* The popup form - hidden by default */
.form-popup {
    display: none;
    position: fixed;
    top: 0px;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
}

.modal-title {
    text-align: left;
}

/* Add styles to the form container */
.modal-body {
    max-width: 300px;
    padding: 10px;
    background-color: white;
}

/* Full-width input fields */
.modal-body input[type=text],
.modal-body input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}

/* When the inputs get focus, do something */
.modal-body input[type=text]:focus,
.modal-body input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for the submit/login button */
.modal-body .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom: 10px;
    opacity: 0.8;
}

/* Add a red background color to the cancel button */
.modal-body .cancel {
    background-color: red;
}

/* Add some hover effects to buttons */
.modal-body .btn:hover,
.open-button:hover {
    opacity: 1;
}

.bl {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}
</style>

<body>
    <table class="border w-full">
        <thead>
            <tr class="border">

                <th class="border">Thông tin người nhận</th>
                <th class="border">Thông tin người đặt</th>
                <th class="border">Tình Trạng Đơn</th>
                <th class="border">Thay tình trạng đơn</th>
                <th class="border">Mã Đơn Hàng</th>
                <th class="border">Mã Vận Đơn</th>
                <th class="border">Thời gian đặt</th>
                <th class="border">Xem chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
	include 'index1.php';
	include '../connect.php';
	$tim_kiem = '';
	if (isset($_GET['tim_kiem'])){
		$tim_kiem = $_GET['tim_kiem'];
	}
	$sql = "select hoa_don.*, khach_hang.ten, khach_hang.sdt, khach_hang.dia_chi
	from hoa_don 
    join khach_hang on khach_hang.ma = hoa_don.ma_khach_hang 
    where hoa_don.ma_don_hang like '%$tim_kiem%'
    order by tinh_trang";
	// $result = $connect->prepare($sql);
	// $result->execute();
	
	// while($each = $result->fetchAll(PDO::FETCH_BOTH))
	$result = mysqli_query($connect,$sql);
	while($each = mysqli_fetch_array($result))
    {
	?>
            <h1 class="text-2xl font-medium text-grey-800 uppercase mb-6 font-poppins">Admin - Hóa đơn</h1>

            <div class="search_box">
                <form>
                    <input type="text" name="tim_kiem" value="<?php echo $tim_kiem?>" class="border">
                    <input type="submit" value="Tìm kiếm theo hóa đơn">
                </form>
            </div><br>
            <tr class="border">

                <th class="border">
                    <?php echo $each['ten_nguoi_nhan'] ?><br>
                    <?php echo $each['sdt_nguoi_nhan'] ?><br>
                    <?php echo $each['dia_chi_nguoi_nhan'] ?>
                </th>
                <th class="border">
                    <?php echo $each['ten'] ?><br>
                    <?php echo $each['sdt'] ?><br>
                    <?php echo $each['dia_chi'] ?>
                </th>
                <th class="border">
                    <?php if($each['tinh_trang']==1){
							echo"Đang Chờ Duyệt";
						}else if($each['tinh_trang']==2){
							echo "Đã Duyệt";
						}else if($each['tinh_trang']==3){
							echo "Đang giao";
						}
						else if($each['tinh_trang']==4){
							echo"Đã Hủy";
						}else if($each['tinh_trang']==5){
							echo"Đã hoàn thành";
						}
					?>
                </th>
                <th class="border">
                    <?php if($each['tinh_trang']==1){?>
                    <a href="duyet_hoa_don.php?ma_hoa_don=<?php echo $each['ma']?>&tinh_trang=2"
                        class="block w-full py-1 text-center text-green-500 bg-gray-800 border border-gray-800 rounded-b hover:bg-transparent hover:text-red-400 transition">Duyệt
                        Đơn</a>
                    <?php } ?>
                    <?php if($each['tinh_trang']==2){?>
                    <button type="button" class="open-button text-primary flex w-full text-center items-center"
                        data-toggle="modal" data-target="#myModal<?php echo $each['ma'] ?>">Giao Hàng</button>
                    <?php } ?>
                    <?php if($each['tinh_trang']==3){?>
                    <a href="hoa_don_thong_ke.php?ma_hoa_don=<?php echo $each['ma']?>&tinh_trang=5"
                        class="block w-full py-1 text-center text-red-400 bg-gray-800 border border-gray-800 rounded-b hover:bg-transparent hover:text-red-400 transition">Hoàn
                        Thành</a>
                    <?php }?>
                    <?php if($each['tinh_trang']==5){?>
                    <?php echo $each['thong_ke_tong']?>
                    <?php }?>
                </th>
                <th class="border"><?php echo $each['ma_don_hang']?></th>
                <th class="border">
                    <?php if($each['tinh_trang']!=2){ ?>
                    <?php echo $each['ma_van_don']?>
                    <?php } ?>
                </th>
                <th class="border">
                    <?php echo date_format(date_create($each['thoi_gian_dat_hang']),'d-m-Y H:i:s') ?>
                </th>
                <th class="border">
                    <a href="xem_chi_tiet.php?ma_hoa_don=<?php echo $each['ma']?>"
                        class="block w-full py-1 text-center text-white bg-gray-800 border border-gray-800 rounded-b hover:bg-transparent hover:text-red-400 transition">
                        Xem
                    </a>
                </th>
            </tr>
            <div id="myModal<?php echo $each['ma'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="hoan_tat_don.php" class="modal-body">
                                <input type="hidden" name="ma" value="<?Php echo $each['ma']?>">
                                <label for="name"><b>Tên</b></label>
                                <input type="text" name="name" value="<?php echo $each['ten_nguoi_nhan']?>" disabled>

                                <label for="phone"><b>Sđt</b></label>
                                <input type="text" name="phone" value="<?php echo $each['sdt_nguoi_nhan']?>" disabled>

                                <label for="addr"><b>Địa chỉ</b></label>
                                <input type="text" name="addr" value="<?php echo $each['dia_chi_nguoi_nhan']?>"
                                    disabled>

                                <label for="shipper">Đơn vị vận chuyển</label>
                                <input type="text" name="shipper" value="SPX" required>

                                <label for="bl">Mã vận đơn</label>
                                <input type="text" name="bl" class="bl" placeholder="Mã vận đơn/ Bill of Lading"
                                    minlength="10" maxlength="25" required>

                                <button type="submit" class="btn">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php 
    	}
    ?>
        </tbody>
    </table>

    <!-- <script>
// function openForm() {
//   document.getElementById("myForm").style.display = "block";
// }

// function closeForm() {
// 	window.opener.location.reload();window.close();
// }
// function confirm(){
// 	var answer = confirm("Bạn có chắc muốn xác nhận");
// 	if(answer==false){
// 		return false;
// 	}
// }
</script> -->
</body>

</html>