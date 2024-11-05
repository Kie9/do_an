<?php
session_start();
	$ho_ten = $_POST['ho_ten'];
	$ngay_sinh = $_POST['ngay_sinh'];
	$gioi_tinh = $_POST['gioi_tinh'];
	$sdt = $_POST['sdt'];
	$email = $_POST['email'];
	$mat_khau = $_POST['mat_khau'];
	$cmnn = $_POST['cmnn'];
	$cap_do = $_POST['cap_do'];
	
include '../connect.php';

$errorsArray = [];
// $result = $connect->prepare($sql);
// $result->execute();
// $result = $connect->prepare("SELECT FOUND_ROWS()");
// $result->execute();
// $row_count =$result->fetchColumn();
$sql = mysqli_query($connect, "SELECT * FROM `admin` WHERE email = '$email'");
while($each = mysqli_fetch_array($sql))
{ ?>
<?php }?>
<?php
      if (mysqli_num_rows($sql) > 0 || empty($email)) {
		array_push($errorsArray, 'email');
		$_SESSION['error'] = 'true';
		$_SESSION['errors'] = join(',', $errorsArray);
		header("Location:admin_form_insert.php");
		die();
      }else{
		$sql = "insert into admin(ho_ten,ngay_sinh,gioi_tinh,sdt,email,mat_khau,cmnn,cap_do)
		values('$ho_ten','$ngay_sinh','$gioi_tinh','$sdt','$email','$mat_khau','$cmnn','$cap_do')";
		// $_SESSION['error'] = '';
		mysqli_query($connect,$sql);
		mysqli_close($connect);
		header('location:admin.php');
	  }
?>
$sql = "insert into admin(ho_ten,ngay_sinh,gioi_tinh,sdt,email,mat_khau,cmnn,cap_do)
values('$ho_ten','$ngay_sinh','$gioi_tinh','$sdt','$email','$mat_khau','$cmnn','$cap_do')";
// $result = $connect->prepare($sql);
// $result->execute();
// $connect = null;
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:admin.php');