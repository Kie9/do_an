<div class="content1" border="1">
    <div class="a1 a2" border="1">
        <a href="chi_tiet.php?ma=<?php echo $each['ma'] ?>"><img height="150"
                src="<?php echo $thu_muc_anh . $each['anh'] ?>"></a>
        <h2 title="<?php echo $each['mo_ta'] ?>">
            <?php echo $each['ten'] ?>
        </h2>
        <p>
            <span class="price">
                <?php
						 $num = $each['gia'];
						$formattedNum = number_format($num);
						echo $formattedNum;
					?>
                VNĐ
            </span>
        </p>
        <?php if (isset($_SESSION['ma'])){ ?>
        <div class="button">
            <span>
                <!-- <img src="images/cart.jpg"> -->
                <a href="gio_hang/add_sp.php?ma=<?php echo $each['ma'] ?>" onclick="alert('Đã thêm vào giỏ hàng.')"
                    class="cart-button">
                    Thêm vào giỏ
                </a>
            </span>
        </div><br>
        <?php }else{ ?>
        <div class="button">
            <a href="login/form_login.php">Mua ngay</a>
        </div>
        <?php } ?>
        <div class="button">
            <span>
                <a href="chi_tiet.php?ma=<?php echo $each['ma'] ?>"
                    class="block w-full py-1 text-center text-white bg-red-400 border border-red-400 rounded-b hover:bg-transparent hover:text-red-400 transition">Chi
                    tiết</a>
            </span>
        </div>
    </div>
</div>