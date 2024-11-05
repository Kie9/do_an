<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<body>
    <?php 
            function search() {
                $tim_kiem = '';
                if (isset($_GET['tim_kiem'])){
                    $tim_kiem = $_GET['tim_kiem'];
                }
                $tag = '';
                if (isset($_GET['tag'])){
                    $tag = $_GET['tag'];
                }
                include 'connect.php';
                //Do real escaping here
                
                $query = "select san_pham.*,
	            hang.ten as 'ten_hang' from san_pham
	            join hang on hang.ma = san_pham.ma_hang";
                $conditions = array();
            
                if(! empty($tim_kiem)) {
                  $conditions[] = "ten='$tim_kiem'";
                }
                if(! empty($tag)) {
                  $conditions[] = "ten_hang='$tag'";
                }
            
                $sql = $query;
                if (count($conditions) > 0) {
                  $sql .= " WHERE " . implode(' AND ', $conditions);
                }
            
                $result = mysqli_query($connect, $sql);
            
                return $result;
                $all_sp = mysqli_num_rows($result);

                $sp_1_trang = 9;

                $so_trang = ceil( $all_sp / $sp_1_trang );

                $trang = 1;
                if (isset($_GET['trang'])) {
                $trang = $_GET['trang'];}

                $skip_sp = ($trang - 1) * $sp_1_trang;

                $sql = "$sql limit $sp_1_trang offset $skip_sp";
                $result = mysqli_query($connect,$sql);    
            }
        ?>

    <div id="main">
        <div id="container">
            <div class="main-left">
                <div class="main-box">
                    <div class="box-title">
                        <a href="../index.php">Trang Chủ</a>
                        " / Tìm Kiếm Nâng Cao "
                    </div>
                    <div class="box-box textbox">
                        <!-- Begin -->
                        <form action method="GET" enctype="multipart/form-data" style="padding:20px;">
                            <b>Tên sản phẩm cần tìm</b>
                            <br>
                            <input type="text" name="tim_kiem" value maxlength="255" placeholder="Tên sản phẩm"
                                style="widtH: calc (100% - 10xp); padding: 5px; margin-bottom: 10px;">
                            <br>
                            <b>Danh mục sản phẩm cần tìm</b>
                            <ul class="ul-search">
                                <li title="Samsung">
                                    <input type="checkbox" name="tag" value="1">
                                    "Samsung"
                                </li>
                            </ul>
                            <button id="myButton" class="float-left submit-button" type="submit" name="search"
                                style="padding: 5px;">Tìm ngay</button>
                            <button type="reset" style="padding: 5px;">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p align="center">
        Trang:
        <?php for ($i=1; $i <= $so_trang ; $i++){ ?>
        <a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem?>&tag=<?php echo $tag?>">
            <?php echo $i ?>
        </a>
        <?php } ?>
    </p>
</body>
<script type="text/javascript">
document.getElementById("myButton").onclick = function() {
    location.href = "sp-moi.php?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>";
};
</script>

</html>