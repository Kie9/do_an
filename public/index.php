<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php include 'rut_gon/head.php' ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include 'rut_gon/header-top.php'?>
    <?php include 'rut_gon/header-menu.php'?>
    <?php include 'rut_gon/slider.php' ?>
    <?php include 'rut_gon/sanpham.php' ?>
    <br><br>

    <div align="center" class="button">
        <a href="all_sp.php">Hiển thị thêm</a>
    </div>

    <?php include 'rut_gon/footer.php' ?>

    <?php include 'js/js-slide.php' ?>
</body>

</html>