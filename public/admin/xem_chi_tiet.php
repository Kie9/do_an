<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
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

    <script>
    // $('.row').each(function() {
    //   var thisId = $(this).find('.id').text();
    // //   var sumVal = parseFloat($(this).find('.val').text());

    //   var $rowsToGroup = $(this).nextAll('tr').filter(function() {
    //     return $(this).find('.id').text() === thisId;
    //   });

    // //   $rowsToGroup.each(function() {
    // //     sumVal += parseFloat($(this).find('.val').text());
    // //     $(this).remove();
    // //   });

    // //   $(this).find('.val').text(sumVal);
    // });
    </script>
</head>

<body>
    <?php
	$ma_hoa_don = $_GET['ma_hoa_don'];
	include 'index1.php';
	include '../connect.php';
	$thu_muc_anh = '../images/img_sp/';
    $sql = "select *,
	khach_hang.ten as ten_nguoi_dat,
	san_pham.ten as ten_san_pham
    from hoa_don_chi_tiet 
    join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
    join hoa_don on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
    join khach_hang on khach_hang.ma = hoa_don.ma_khach_hang
    where ma_hoa_don = '$ma_hoa_don'";
	// $result = $connect->prepare($sql);
	// $result->execute();
	// $each = $result->fetchAll(PDO::FETCH_BOTH);
	
	$result = mysqli_query($connect,$sql);
	$tong_tat_ca = 0;
?>
    <table border="1" width="100%" class="border">
        <tr class="row border">
            <th>Thông tin người đặt</th>
            <th>Tên sản phảm</th>
            <th>Ảnh sản phẩm</th>
            <th>Số lượng</th>
            <th>Thời gian đặt hàng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
        </tr>
        <?php foreach ($result as $each): ?>
        <tr class="row border">
            <td class="id border">
                <?php echo $each['ten_nguoi_dat'] ?><br>
                <?php echo $each['sdt'] ?><br>
                <?php echo $each['dia_chi'] ?>
            </td>
            <td class="border">
                <?php echo $each['ten_san_pham']?>
            </td>
            <td class="border">
                <img class="h-16 w-16" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
            </td>
            <td class="border">
                <?php echo $each['so_luong']?>
            </td>
            <td class="border">
                <?php echo date_format(date_create($each['thoi_gian_dat_hang']),'d-m-Y H:i:s') ?>
            </td>
            <td class="border">
                <?php echo $each['gia']?>
            </td>
            <td class="border">
                <?php echo $each['gia'] * $each['so_luong']?>
                <?php $tong_tat_ca += $each['gia'] * $each['so_luong']?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <h1>
        Tổng Tát Cả :<?php echo $tong_tat_ca?>
    </h1>
</body>

</html>