<!DOCTYPE html>
<html>

<head>
    <title>Thống kê bán sản phẩm</title>
    <script src="../../node_modules/chart.js/dist/chart.umd.js"></script>

<body>
    <?php 
        include 'conn.php';
        include 'index1.php';
        $stmt = $conn->prepare("SELECT * FROM `san_pham`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // $sql = mysqli_query($connect, "SELECT * FROM `san_pham`");
        // $result = mysqli_fetch_assoc($sql);
        $productData = [];
        
        // Loop through the fetched results and store them in an array
        foreach($result as $row){
            $productData[] = $row;
            //echo $row['name'];
        }
        
        // Convert the product data array to JSON format
        $productJson = json_encode($productData);
    ?>
    <div class="grid grid-cols-2">
        <div style="width:600px; margin:50px auto; border:1px solid #ddd;" class="col-span-1">
            <h5 class="uppercase">Thống kê doanh thu theo sản phẩm</h5>
            <canvas id="productChart"></canvas>
        </div>

        <div style="width:600px; margin:50px auto; border:1px solid #ddd;">
            <h5 class="uppercase">Thống kê kho trên tổng kho ban đầu</h5>
            <canvas id="storageChart"></canvas>
        </div>

        <div style="width:600px; margin:50px auto; border:1px solid #ddd;">
            <h5 class="uppercase">Thống kê sản phẩm bán chạy</h5>
            <canvas id="hotChart"></canvas>
        </div>
    </div>


    <script>
    // Retrieve the product data from PHP and assign it to a JavaScript variable
    var productData = <?php echo $productJson; ?>;

    // Initialize arrays to store labels, revenue data, and sales data
    var labels = [];
    var revenueData = [];
    var salesData = [];
    var warehouseData = [];
    var hotData = [];

    // Extract the necessary data from the productData array
    for (var i = 0; i < productData.length; i++) {
        var product = productData[i];
        var revenue = product.da_ban;
        var sales = product.kho;
        var productName = product.ten;
        var warehouse = product.tong_kho;
        var hot = warehouse - sales;

        // Add the product name to the labels array
        labels.push(productName);

        // Add the revenue and sales data to their respective arrays
        revenueData.push(revenue);
        salesData.push(sales);
        warehouseData.push(warehouse);
        hotData.push(hot);
    }

    // Create a bar chart using Chart.js
    var ctx = document.getElementById('productChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu',
                data: revenueData,
                backgroundColor: 'rgba(0,123,255,0.2)',
                borderColor: 'rgba(0,123,255,1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
        }

    });

    var ctd = document.getElementById('storageChart').getContext('2d');
    var chartx = new Chart(ctd, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Kho',
                    data: salesData,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                },
                {
                    label: 'Tổng kho',
                    data: warehouseData,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
        }

    });
    var cth = document.getElementById('hotChart').getContext('2d');
    var charth = new Chart(cth, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Bán chạy',
                data: hotData,
                backgroundColor: 'rgba(255,99,132,0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }, ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
        }

    });
    </script>

</body>
</head>

</html>