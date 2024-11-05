<!DOCTYPE html>
<html>

<head>
    <title>Admin-Sửa thông tin sản phẩm</title>
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
$sql = "select * from san_pham where ma ='$ma'";
// $result = $connect->prepare($sql);
// $result->execute();
// $each = $result->fetchAll(PDO::FETCH_BOTH);
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$thu_muc_anh = '../images/img_sp/';

$sql_hang = "select * from hang ";
$result_hang = mysqli_query($connect,$sql_hang);
?>
    <form enctype='multipart/form-data' method="post" action="sp_process_update.php ">
        <table colspan='2' align="center">
            <div class="signup">
                <form class="signup-form" autocomplete="off" name="admin">
                    <input type="hidden" name="ma" value="<?php echo $ma ?>">
                    <h1 align="center">
                        Sửa Sản Phẩm
                    </h1><br><br>
                    <label class="signup-label">
                        Tên Sản Phẩm
                    </label>
                    <input type="text" id="name" class="signup-input" name="ten" value="<?php echo $each['ten']?>">
                    <span id="errname" class="loi"></span>
                    <br><br>
                    <label class="signup-label">
                        Giá Sản Phẩm
                    </label>
                    <input type="text" id="price" class="signup-input" name="gia" value="<?php echo $each['gia']?>">
                    <span id="errprice" class="loi"></span>
                    <br><br>
                    <label class="signup-label">
                        Mô Tả Sản Phẩm
                    </label>
                    <input type="text" class="signup-input" name="mo_ta" value="<?php echo $each['mo_ta']?>">
                    <label class="signup-label">
                        Số Lượng Nhập Thêm
                    </label>
                    <input type="number" class="signup-input" name="so_luong" required>
                    <label class="signup-label">
                        Thể loại của sản phẩm
                    </label>
                    <select name="ma_hang">
                        <?php foreach ($result_hang as $hang): ?>
                        <option value="<?php echo $hang['ma'] ?>"
                            <?php if ($hang['ma'] == $each['ma_hang']) echo "selected"; ?>>
                            <?php echo $hang['ten'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <br><br><br>
                    <label class="signup-label">
                        Ảnh cũ
                    </label>
                    <img height="150" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
                    <input type="hidden" name="anh1" value="<?php echo $each['anh'] ?>">
                    <br><br><br>
                    <label class="signup-label">
                        Ảnh mới
                    </label>
                    <input type="file" name="anh2">
                    <button class="signup-submit" onclick="return ok()">
                        Sửa
                    </button>
                    <button class="signup-submit">
                        <a href="sanpham.php">Quay lại</a>
                    </button>
        </table>
    </form>
    <script type="text/javascript">
    function ok() {
        var usernameRegex =
            /^[a-zA-Z0-9_ÀÁÂÃÈÉÊẾÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêếìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\ ]+$/;
        var kiemtraloi = false;
        var numRegex = /^[0-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;
        var ten = document.getElementById('name').value;
        var validName = ten.match(usernameRegex);
        if (ten == "" || validName == null) {
            document.getElementById('errname').innerHTML = 'Tên không được để trống và không nên có ký tự đặc biệt';
            kiemtraloi = true;
        } else {
            document.getElementById('errname').innerHTML = '';
        }

        var price = document.getElementById('price').value;
        // var validPrice = price.match(numRegex);
        var validPrice = price.match(numRegex);
        if (price == "" || validPrice == null) {
            document.getElementById('errprice').innerHTML = 'Giá tiền phải là số và không được âm';
            kiemtraloi = true;
        } else {
            document.getElementById('errprice').innerHTML = '';
        }

        if (kiemtraloi == true) {
            return false;
        }
    }
    </script>
</body>

</html>