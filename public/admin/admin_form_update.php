<!DOCTYPE html>
<html>

<head>
    <title>Sửa thông tin Admin</title>
    <style type="text/css">
    body {
        margin: 0;
        width: 100%;
        min-height: 100vh;
        background-color: #f2f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 0;
    }

    .signup {
        padding: 10px 75px;
        background-color: #fff;
        width: 100%;
        max-width: 600px;
        border-radius: 30px;
    }

    .signup-input {
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

    .mauchu {
        color: red;
    }
    </style>
</head>

<body>
    <?php
$ma = $_GET['ma'];
include '../connect.php';
$sql = "select * from admin where ma ='$ma' ";
// $result = $connect->prepare($sql);
// $result->execute();
// $each = $result->fetchAll(PDO::FETCH_BOTH);
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
    <form method="post" action="admin_process_update.php ">
        <div class="signup">
            <form class="signup-form" autocomplete="off" name="admin">
                <input type="hidden" name="ma" value="<?Php echo $ma?>">
                <h1 align="center">
                    Sửa Thông Tin Admin
                </h1>
                <br><br>
                <label class="signup-label">
                    Họ Tên
                </label>
                <input type="text" class="signup-input" name="ho_ten" id="ho_ten" value="<?php echo $each['ho_ten']?>">
                <label class="signup-label">
                    Ngày Sinh
                </label>
                <input type="date" name="ngay_sinh" class="signup-input" value="<?php echo $each['ngay_sinh']?>">
                <label class="signup-label">
                    Giới Tính
                </label>
                <input type="radio" name="gioi_tinh" value="0" style="width: 15%"
                    <?php if($each['gioi_tinh']==0) echo'checked';?>> Nam
                <input type="radio" name="gioi_tinh" value="1" style="width: 15%"
                    <?php if($each['gioi_tinh']==1) echo'checked';?>> Nữ
                <br><br>
                <label class="signup-label">
                    Số Điện Thoại
                </label>
                <input type="text" class="signup-input" name="sdt" id="sdt" value="<?php echo $each['sdt']?>">
                <label class="signup-label">
                    Email
                </label>
                <input type="Email" class="signup-input" name="email" id="Email" value="<?php echo $each['email']?>">
                <label class="signup-label">
                    Mật khẩu
                </label>
                <input type="password" class="signup-input" name="mat_khau" id="mat_khau"
                    value=" <?php echo $each['mat_khau']?>">
                <label class="signup-label">
                    CMND
                </label>
                <input type="text" class="signup-input" name="cmnn" id="cmnn" value="<?php echo $each['cmnn']?>"
                    minlength="12" maxlength="12" required>
                <label class="signup-label">
                    Cấp Độ
                </label>
                <input type="radio" name="cap_do" value="1" style="width: 15%"
                    <?php if($each['cap_do']==1) echo'checked';?>> Admin
                <input type="radio" name="cap_do" value="0" style="width: 15%"
                    <?php if($each['cap_do']==0) echo'checked';?>> Nhân Viên
                <button class="signup-submit">
                    Sửa
                </button>
                <button class="signup-submit">
                    <a href="admin.php">Quay lại</a>
                </button>
                <br><br>
            </form>
        </div>
    </form>
    <script type="text/javascript">
    function ok() {
        // var usernameRegex =
        //     /^[a-zA-Z0-9_ÀÁÂÃÈÉÊẾÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêếìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\ ]+$/;
        var kiemtraloi = false;
        // var numRegex = /^[0-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;
        // var ten = document.getElementById('name').value;
        // var validName = ten.match(usernameRegex);
        // if (ten == "" || validName == null) {
        //     document.getElementById('errname').innerHTML = 'Tên không được để trống và không nên có ký tự đặc biệt';
        //     kiemtraloi = true;
        // } else {
        //     document.getElementById('errname').innerHTML = '';
        // }

        // var price = document.getElementById('price').value;
        // // var validPrice = price.match(numRegex);
        // var validPrice = price.match(numRegex);
        // if (price == "" || validPrice == null) {
        //     document.getElementById('errprice').innerHTML = 'Giá tiền phải là số và không được âm';
        //     kiemtraloi = true;
        // } else {
        //     document.getElementById('errprice').innerHTML = '';
        // }

        // if (kiemtraloi == true) {
        //     return false;
        // }
        var cmnn = document.getElementById('cmnn').value;
        if (cmnn == "" || cmnn.length != 12) {

        }
    }
    </script>
</body>
</body>

</html>