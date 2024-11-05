<div class="py-4 shadow-sm bg-white">
    <div>
        <div class="container flex items-center justify-between">
            <!-- <div class="logo"> -->
            <!-- logo -->
            <a href="index.php">
                <img src="images/technology-logo-with-shopping-cart-fast-delivery-design-idea_612398-411.avif"
                    class="w-32">
            </a>
            <!-- </div> -->
            <!-- searchbar -->
            <div class="w-full max-w-xl relative flex">
                <!-- <div class="search_box "> -->
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fas fa-search"></i>
                </span>
                <form id="search">
                    <input type="text" name="tim_kiem"
                        class="w-full border border-red-400 border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                        placeholder="Tìm kiếm">
                </form>

                <button type="submit" form="search"
                    class="bg-red-400 border-red-400 text-black px-8 rounded-r-md hover:bg-transparent hover:text-red-400 transition">Tìm
                    kiếm
                </button>
            </div>

            <!-- icon -->
            <div class="flex items-center space-x-4">
                <?php if (!isset($_SESSION['ma'])){ ?>

                <a href="login/form_login.php" class="text-center text-gray-700 hover:text-red-400 transition relative">
                    <div class="text-2xl">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Đăng nhập</div>
                </a>
                <!-- <span
                    class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-red-400 text-white text-xs"></span> -->
                <?php }else{ ?>

                <a href="gio_hang.php" class="text-center text-gray-700 hover:text-red-400 transition relative">
                    <div class="text-2xl">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="text-xs leading-3">Giỏ hàng</div>
                    <!-- <span
                    class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-red-400 text-white text-xs"></span> -->
                </a>
                <?php
                    require'connect.php';
                    $sql =  "SELECT * FROM `khach_hang` WHERE `ma`='$_SESSION[ma]'";
    
                    $query = mysqli_query($connect, $sql);
                    $fetch = mysqli_fetch_array($query);
                ?>

                <a href="kh_form_update.php" class="text-center text-gray-700 hover:text-red-400 transition relative">
                    <div class="text-2xl">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">
                        <?php 
                            echo "<h2 class='text-success'>".$fetch['ten']."</h2>";
                        ?>
                    </div>

                </a>
                <a href="login/logout.php" class="text-center text-gray-700 hover:text-red-400 transition relative">
                    <div class="text-2xl">
                        <i class="fa fa-sign-out"></i>
                    </div>
                    <div class="text-xs leading-3">Đăng xuất</div>
                </a>
                <?php } ?>
                <div class="clear"></div>
                <br>
            </div>
            <!-- <div>
                <a href="rut_gon/advanced-search.php">Tìm Kiếm Nâng Cao</a>
            </div> -->
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>