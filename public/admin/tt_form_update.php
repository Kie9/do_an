<!DOCTYPE html>
<html>
<head>
	<title>Admin-Sửa tin tức</title>
	<style type="text/css">
	body{
			margin: 0;
			width: 100%;
			min-height: 100vh;
			background-color: #f2f3f5;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 0 0;
		}
		.signup{
			padding: 10px 75px;
			background-color: #fff;
			width: 100%;
			max-width: 600px;
			border-radius: 30px;
		}
		.signup-input{
			display: block;
			width: 550px;
			padding: 25px;
			border-radius: 14px;
			background-color: #f2f3f5;
			outline: none;
			border: 0;
			font-family: "Poppins", sans-serif;
			font-size: 18px;
			margin-bottom: 30px;
		}
		.signup-submit {
			padding: 25px;
			color: white;
			font-size: 18px;
			text-align: center;
			border: 0;
			outline: none;
			display: inline-block;
			width: 100%;
			border-radius: 14px;
			background-color: #ffef00;
			font-family: "Poppins", sans-serif;
			cursor: pointer;
			font-weight: 600;
			box-shadow: 0 5px 10px 0 rgba(130, 201, 30, 0.5);
			margin-top: 25px;
			margin-bottom: 25px;
		}
		.mauchu{
			color: red;
		}
	</style>
</head>
<body>
<?php
$ma = $_GET['ma'];
include '../connect.php';
$sql = "select * from tin_tuc where ma ='$ma'";
// $stmt = $connect->prepare($sql);
// $stmt->execute();
// $each = $stmt->fetchAll(PDO::FETCH_BOTH);
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$thu_muc_anh = '../images/tin_tuc/';
?>
<form enctype='multipart/form-data' method="post" action="tt_process_update.php ">
	<table colspan='2' align="center" >
		<div class="signup">
	<form class="signup-form" autocomplete="off" name="admin">
		<input type="hidden" name="ma" value="<?php echo $ma ?>">
		<h1 align="center">Sửa tin tức</h1>
		<br><br>
			<label class="signup-label">
				Tiêu đề
			</label>
			<input type="text" class="signup-input" name="tieu_de" value="<?php echo $each['tieu_de']?>">

			<label class="signup-label">
	         	Nội dung
			</label>
			<input type="text" class="signup-input" name="noi_dung" value="<?php echo $each['noi_dung']?>">

			<label class="signup-label">
				Tóm tắt
			</label>
			<input type="text" class="signup-input" name="tom_tat" value="<?php echo $each['tom_tat']?>">
            
			<label class="signup-label">
				Ảnh cũ
			</label>
			<img height="150" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
			<input type="hidden" name="anh1" value="<?php echo $each['anh'] ?>">
			<br><br><br> 
			<label class="signup-label">
				Ảnh mới
			</label >
				<input type="file" name="anh2">
			<button class="signup-submit">
				Sửa
			</button>
	</table>
</form>
</body>
</html>