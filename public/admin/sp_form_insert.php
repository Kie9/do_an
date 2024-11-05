<?php 
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin-Thêm sản phẩm</title>
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

    .loi {
        color: red;
    }
    </style>
</head>

<body>

    <?php 
include '../connect.php';
$sql = "select * from hang ";
// $result = $connect->prepare($sql);
// $result->execute();
$result = mysqli_query($connect,$sql);
$sql1 = "select * from the_loai";
$result1 = mysqli_query($connect,$sql1);
?>
    <form enctype='multipart/form-data' method="post" action="sp_process_insert.php ">
        <table colspan='2' align="center">
            <div class="signup">
                <form class="signup-form" autocomplete="off" name="admin">
                    <?php 
			            $errorsArray = [];

                        if(isset($_SESSION['errors'])){
                            $errorsArray = explode(',', $_SESSION['errors']);
                        }
                    ?>
                    <h1 align="center">
                        Thêm Sản Phẩm
                    </h1><br><br>
                    <label class="signup-label">
                        Tên Sản Phẩm
                    </label>
                    <input type="text" id="name" class="signup-input" name="ten">
                    <span id="errname" class="loi"></span>
                    <?php
                        if(in_array('ten', $errorsArray)){
                            echo '<div style="margin-top:10px; color:red;">Sản phẩm đã tồn tại hoặc lỗi đã xảy ra</div>';
                        }
                    ?>
                    <br><br>
                    <label class="signup-label">
                        Giá Sản Phẩm
                    </label>
                    <input type="text" id="price" class="signup-input" name="gia">
                    <span id="errprice" class="loi"></span>
                    <br><br>
                    <label class="signup-label">
                        Mô Tả Sản Phẩm
                    </label>
                    <input type="text" class="signup-input" name="mo_ta" required>
                    <label class="signup-label">
                        Số Lượng
                    </label>
                    <input type="number" class="signup-input" name="so_luong" required>
                    <label class="signup-label">
                        Hãng
                        <label class="signup-label">
                            <select name="ma_hang">
                                <option value="" disabled selected>Hãng</option>
                                <?php foreach ($result as $each): ?>
                                <option value="<?php echo $each['ma'] ?>">
                                    <?php echo $each['ten'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <br><br>
                        </label>
                        <label class="signup-label">
                            Danh mục
                        </label>
                        <select name="ma_the_loai">
                            <option value="" disabled selected>Danh mục</option>
                            <?php foreach ($result1 as $each1): ?>
                            <option value="<?php echo $each1['ma_the_loai'] ?>">
                                <?php echo $each1['ten_the_loai'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <label class="signup-label">
                            Ảnh Sản Phẩm
                        </label>
                        <input type="file" name="anh" required>
                        <button class="signup-submit" onclick="return ok()">
                            Thêm
                        </button>
                        <button class="signup-submit">
                            <a href="index1.php">Quay lại</a>
                        </button>
                </form>
            </div>
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
<?php 
	unset($_SESSION['errors']);
?>