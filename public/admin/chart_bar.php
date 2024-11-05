<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="../node_modules/flowbite/dist/flowbite.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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

    <div class="container m-12 pb-16 w-96 pt-6"
        style="width:600px; margin:50px; margin-left: 420px; margin-right: auto; margin-bottom: auto;">
        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-700 p-4 md:p-6 ml-5">
            <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Doanh thu</dt>
                    <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">50,405,000 VNĐ</dd>
                </dl>
                <div>
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13V1m0 0L1 5m4-4 4 4" />
                        </svg>
                        Tỉ lệ doanh thu 23.5%
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-2 py-3">
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Thu nhập</dt>
                    <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">100,000,000 VNĐ</dd>
                </dl>
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Chi phí</dt>
                    <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">-49,595,000 VNĐ</dd>
                </dl>
            </div>

            <div id="bar-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                        data-dropdown-placement="bottom"
                        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                        type="button">
                        6 tháng vừa qua
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastDaysdropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hôm
                                    qua</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hôm
                                    nay</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Trong
                                    vòng 7 ngày</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Trong
                                    vòng 30 ngày</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Trong
                                    vòng 90 ngày</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Trong
                                    vòng 6 tháng</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Trong
                                    vòng 1 năm</a>
                            </li>
                        </ul>
                    </div>
                    <a href="#"
                        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Báo cáo doanh thu
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </div>
            </div>
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
    // import ApexCharts from 'apexcharts'
    const options = {
        series: [{
                name: "Thu nhập",
                color: "#31C48D",
                data: ["1420", "1620", "1820", "1420", "1650", "2120"],
            },
            {
                name: "Chi phí",
                data: ["788", "810", "866", "788", "1100", "1200"],
                color: "#F05252",
            }
        ],
        chart: {
            sparkline: {
                enabled: false,
            },
            type: "bar",
            width: "100%",
            height: 400,
            toolbar: {
                show: false,
            }
        },
        fill: {
            opacity: 1,
        },
        plotOptions: {
            bar: {
                horizontal: true,
                columnWidth: "100%",
                borderRadiusApplication: "end",
                borderRadius: 6,
                dataLabels: {
                    position: "top",
                },
            },
        },
        legend: {
            show: true,
            position: "bottom",
        },
        dataLabels: {
            enabled: false,
        },
        tooltip: {
            shared: true,
            intersect: false,
            formatter: function(value) {
                return value + "VNĐ"
            }
        },
        xaxis: {
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                },
                formatter: function(value) {
                    return value
                }
            },
            categories: ["Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            }
        },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -20
            },
        },
        fill: {
            opacity: 1,
        }
    }

    if (document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("bar-chart"), options);
        chart.render();
    }
    </script>
</body>

</html>