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

</head>

<body>
    <?php $con = mysqli_connect('localhost','root','','codingmantra'); ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="btn-primary">
                <th>S.No.</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
    		$sql = 'SELECT * FROM user'; 
    		$result = mysqli_query($con,$sql);
    		$i = 1;
    		while($row = mysqli_fetch_array($result)) 
    		{
    	?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>

                    // here i am creating a button to open a modal popup

                    <button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#myModal<?php echo $row['id'] ?>">View</button>



                </td>
            </tr>

            // here i am creating a modal popup code.........

            <div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="hoan_tat_don.php" class="form-container">
                                <label for="name"><b>Tên</b></label> <input type="text"
                                    value="<?php echo $row['name']; ?>">
                                <h3>Mobile Number : <?php echo $row['phone']; ?></h3>
                                <h3>Email : <?php echo $row['email']; ?></h3>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            // end modal popup code........

            <?php 
    		$i++;
    		}
    	?>
        </tbody>
    </table>
</body>

</html>

<div id="menu">
    <ul>
        <!-- <div class="logo">
			<li><img src="../images/logo2.jpg" height="80px"></li> -->
        <div class="logo">
            <a href="../index.php"><img
                    src="../images/technology-logo-with-shopping-cart-fast-delivery-design-idea_612398-411.avif"
                    height="80px"></a>
        </div>
        <?php if ($_SESSION['cap_do']==1){ ?>
        <li>
            <a href="admin.php">Admin</a>
            <ul class="sub-menu">
                <li>
                    <a href="admin_form_insert.php">Thêm admin</a>
                </li>
            </ul>
        </li>
        <?php } ?>
        <li>
            <a href="khachhang.php">Khách hàng</a>
            <ul class="sub-menu">
                <li>
                    <a href="kh_form_insert.php">Thêm khách hàng</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="sanpham.php">Sản phẩm</a>
            <ul class="sub-menu">
                <li>
                    <a href="sp_form_insert.php">Thêm sản phẩm</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="hoa_don.php">Hóa đơn</a>
        </li>
        <li>
            <a href="tin_tuc.php">Tin tức</a>
            <ul class="sub-menu">
                <li>
                    <a href="tt_form_insert.php">Thêm tin tức</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="thong_ke.php">Thống kê</a>
            <!-- <ul class="sub-menu">
				<li>
					<a href="">Sản phẩm</a>
				</li>
			</ul> -->
        </li>
        <div class="login">
            <?php if (!isset($_SESSION['ma'])){ ?>
            <?php }else{ ?>
            <span>
                <a href="logoutad.php">Đăng xuất</a>
            </span>
            <?php } ?>
        </div>
    </ul>
</div>