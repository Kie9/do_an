<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include 'rut_gon/head.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include 'rut_gon/header-top.php'?>
    <?php include 'rut_gon/header-menu.php'?>
    <div align="center">
        <p style="font-size: xx-large;">
            <br><br><br><br><br><br><br><br>
            ĐÃ ĐẶT HÀNG THÀNH CÔNG <br>
            <a href="hoa_don.php">Xem hóa đơn</a>
            <br>
            <a href="index.php">Về trang chủ</a>
            <br><br><br><br><br><br><br><br>
        </p>
    </div>
    <?php include 'rut_gon/footer.php' ?>

    <?php include 'js/js-slide.php' ?>
</body>

</html>