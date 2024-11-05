<?php
session_start();
if(isset($_POST['ten'])&&($_POST['gia'])&&($mo_ta = $_POST['mo_ta'])&&($anh = $_FILES['anh'])){
	$ten = $_POST['ten'];
	$gia = $_POST['gia'];
	$mo_ta = $_POST['mo_ta'];
	$so_luong = $_POST['so_luong'];
	$anh = $_FILES['anh'];
	$ma_hang = $_POST['ma_hang'];
	$ma_the_loai = $_POST['ma_the_loai'];
	
}else die ("ERROR");

include '../connect.php';

$path_file = explode('.', $anh['name'])[1];
$name_file = time() . '.' . $path_file;

$thu_muc_anh = '../images/img_sp/';
move_uploaded_file($anh['tmp_name'], $thu_muc_anh . $name_file);
$tong_kho = 0;

$tong_kho = $tong_kho + $so_luong;

$errorsArray = [];
// $result = $connect->prepare($sql);
// $result->execute();
// $result = $connect->prepare("SELECT FOUND_ROWS()");
// $result->execute();
// $row_count =$result->fetchColumn();
$sql = mysqli_query($connect, "SELECT * from san_pham WHERE ten = '$ten'");
?>
<?php
      if (mysqli_num_rows($sql) > 0 || empty($ten)) {
		array_push($errorsArray, 'ten');
		$_SESSION['error'] = 'true';
		$_SESSION['errors'] = join(',', $errorsArray);
		header("Location:sp_form_insert.php");
		die();
      }else{
		$sql = "insert into san_pham(ten,mo_ta,gia,anh,ma_hang,ma_the_loai,kho,tong_kho)
		values('$ten','$mo_ta','$gia','$name_file','$ma_hang','$ma_the_loai','$so_luong','$tong_kho')";
		// $_SESSION['error'] = '';
		mysqli_query($connect,$sql);
		mysqli_close($connect);
		header('location:sanpham.php');
	  }
?>