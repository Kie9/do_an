-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 01:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ma` int(11) NOT NULL,
  `ho_ten` varchar(25) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL,
  `sdt` char(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mat_khau` varchar(16) NOT NULL,
  `cmnn` char(16) NOT NULL,
  `cap_do` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ma`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `mat_khau`, `cmnn`, `cap_do`) VALUES
(1, ' admin2', '2001-03-31', 0, ' 312312312', 'admin@gmail.com', ' 123', '123467891111', 1),
(3, 'nu', '2001-02-04', 1, ' 0111111111', 'nu@gmail.com', ' 123', ' 001002004003', 0),
(6, ' admin3', '1111-03-13', 0, '0123123123', 'admin1@gmail.com', '      123', '', 0),
(7, 'do an', '2024-07-12', 0, '0123123123', 'akigolus@gmail.com', '123456', '001002004003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `ma` int(11) NOT NULL,
  `ten` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`ma`, `ten`) VALUES
(0, '--'),
(1, 'Samsung'),
(3, 'iPhone'),
(4, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma` int(11) NOT NULL,
  `ma_san_pham` int(11) NOT NULL,
  `ma_khach_hang` int(11) NOT NULL,
  `thoi_gian_dat_hang` datetime NOT NULL,
  `ten_nguoi_nhan` varchar(25) NOT NULL,
  `sdt_nguoi_nhan` varchar(25) NOT NULL,
  `dia_chi_nguoi_nhan` varchar(25) NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `ma_don_hang` char(11) NOT NULL,
  `ma_van_don` varchar(25) NOT NULL,
  `thong_ke_tong` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma`, `ma_san_pham`, `ma_khach_hang`, `thoi_gian_dat_hang`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `tinh_trang`, `ma_don_hang`, `ma_van_don`, `thong_ke_tong`) VALUES
(5, 5, 1, '2024-06-20 08:11:48', 'ten', '001', 'hcm', 5, 'B-0624-0005', 'SPX-666', 123),
(6, 1, 1, '2024-06-27 11:03:12', 'nam', '001009001002', 'ha noi', 5, 'B-0624-0006', 'SPX-123', 40000000),
(7, 5, 1, '2024-06-27 11:14:55', 'nam', '001009001002', 'd', 3, 'B-0624-0007', 'SPX-1233333333', 0),
(8, 1, 1, '2024-06-27 11:36:10', 'nam', '001009001002', 'ha noi', 5, 'B-0624-0008', 'SPX-11', 0),
(9, 5, 1, '2024-06-27 12:06:34', 'nam', '001009001002', 'ha noi', 5, 'B-0624-0009', '', 369),
(10, 7, 1, '2024-06-27 12:07:42', 'nam', '001009001002', 'dd', 5, 'B-0624-0010', 'SPX-111', 0),
(13, 1, 1, '2024-06-27 13:01:28', 'nam', '001009001002', 'ha', 5, 'B-270624-00', '', 0),
(14, 8, 1, '2024-06-27 13:13:49', '', '', '', 5, 'B-270624-09', 'SPX-12', 0),
(15, 5, 1, '2024-06-30 17:04:12', 'nam', '001009001002', 'ha noi', 5, '300624-01', '', 246),
(16, 5, 1, '2024-07-02 14:48:47', '', '', '', 5, '020724-01', 'SPX-1', 0),
(17, 9, 1, '2024-07-03 15:22:14', 'nu', '3333', 'ha noi', 5, '030724-01', 'SPX-666', 100000123),
(18, 5, 1, '2024-07-04 09:59:57', 'nam', '001009001002', 'ha noi', 4, '040724-01', '', 0),
(19, 7, 1, '2024-07-08 08:04:00', 'nim', '0988761234', 'hcm', 1, '080724-01', '', 0),
(23, 17, 1, '2024-07-09 15:46:06', 'nam', '001009001002', 'ha noi', 5, '090724-01', 'SPX-9999999999', 15000000),
(24, 13, 1, '2024-07-11 04:53:59', 'nam', '001009001002', 'ha noi', 4, '110724-01', '', 0),
(25, 17, 1, '2024-07-11 04:53:59', 'nam', '001009001002', 'ha noi', 1, '110724-02', '', 0),
(26, 18, 1, '2024-07-11 04:54:59', 'nam', '001009001002', 'ha noi', 1, '110724-03', '', 0),
(27, 17, 1, '2024-07-11 06:10:36', 'nam', '001009001002', 'ha noi', 1, '110724-04', '', 0),
(28, 1, 1, '2024-07-11 06:11:07', 'nam', '001009001002', 'ha noi', 5, '110724-05', 'SPX-1233333333', 40000001),
(29, 1, 1, '2024-07-11 06:12:05', 'nam', '001009001002', 'ha noi', 1, '110724-06', '', 0),
(30, 20, 1, '2024-07-11 06:12:05', 'nam', '001009001002', 'ha noi', 2, '110724-07', '', 0),
(31, 13, 1, '2024-07-11 06:12:48', 'nam', '001009001002', 'ha noi', 1, '110724-08', '', 0),
(32, 17, 1, '2024-07-11 06:12:48', 'nam', '001009001002', 'ha noi', 5, '110724-09', 'SPX-1233333333', 5000246),
(33, 1, 1, '2024-07-16 10:57:27', 'nam', '001009001002', 'ha noi', 1, '160724-01', '', 0),
(34, 17, 1, '2024-07-26 22:09:56', '', '001009001002', 'ha noi', 1, '260724-01', '', 0),
(35, 5, 1, '2024-07-26 22:09:56', '', '001009001002', 'ha noi', 1, '260724-02', '', 0),
(36, 6, 1, '2024-07-26 23:57:20', '', '001009001002', 'ha noi', 1, '260724-03', '', 0),
(37, 17, 1, '2024-07-27 06:03:00', 'nam', '001009001002', 'ha noi', 1, '270724-01', '', 0),
(38, 13, 1, '2024-07-27 06:03:00', 'nam', '001009001002', 'ha noi', 1, '270724-02', '', 0);

--
-- Triggers `hoa_don`
--
DELIMITER $$
CREATE TRIGGER `mytable_ins` BEFORE INSERT ON `hoa_don` FOR EACH ROW BEGIN

    DECLARE minId INT default 0;

    SET @myId := (SELECT AUTO_INCREMENT
        FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_NAME = 'hoa_don'
        AND TABLE_SCHEMA = DATABASE());

    SET @minId := (SELECT MIN(ma)
        FROM hoa_don
        WHERE YEAR(thoi_gian_dat_hang) = YEAR(NEW.thoi_gian_dat_hang)
        AND MONTH(thoi_gian_dat_hang) = MONTH(NEW.thoi_gian_dat_hang)
        AND DAY(thoi_gian_dat_hang) = DAY(NEW.thoi_gian_dat_hang));

    IF @minId IS NULL THEN
        SET @bilId = 1;
    ELSE
        SET @bilId = 1 + @myId - @minId;
    END IF;

    SET NEW.ma_don_hang = CONCAT(DATE_FORMAT(NEW.thoi_gian_dat_hang, "%d%m%y"),
        '-', LPAD(@bilId, 2, '0')
    );

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hoa_don` int(11) NOT NULL,
  `so_luong` varchar(25) NOT NULL,
  `ma_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hoa_don`, `so_luong`, `ma_san_pham`) VALUES
(5, '1', 5),
(6, '1', 1),
(7, '1', 5),
(8, '3', 1),
(9, '3', 5),
(10, '1', 7),
(13, '1', 1),
(13, '1', 5),
(14, '1', 8),
(14, '1', 5),
(15, '2', 5),
(16, '1', 5),
(17, '1', 5),
(17, '2', 9),
(18, '1', 5),
(19, '1', 5),
(19, '1', 7),
(23, '3', 17),
(25, '3', 13),
(25, '1', 17),
(26, '3', 18),
(27, '1', 17),
(28, '1', 1),
(30, '2', 1),
(30, '2', 20),
(32, '2', 13),
(32, '1', 17),
(33, '1', 1),
(35, '7', 17),
(35, '6', 5),
(36, '3', 6),
(38, '3', 17),
(38, '3', 13);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma` int(11) NOT NULL,
  `ten` varchar(25) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL,
  `sdt` char(16) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mat_khau` varchar(25) NOT NULL,
  `dia_chi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma`, `ten`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `mat_khau`, `dia_chi`) VALUES
(1, 'nam', '2001-09-23', 0, '001009001002', 'nam@gmail.com', '123', 'ha noi'),
(2, 'nu', '2024-07-03', 1, '123', 'nu@gmail.com', '123', 'ha noi');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `gia` varchar(25) NOT NULL,
  `mo_ta` varchar(100) NOT NULL,
  `anh` varchar(100) NOT NULL,
  `ma_hang` int(11) DEFAULT NULL,
  `ma_the_loai` int(25) NOT NULL,
  `kho` int(25) NOT NULL,
  `tong_kho` int(25) NOT NULL,
  `da_ban` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma`, `ten`, `gia`, `mo_ta`, `anh`, `ma_hang`, `ma_the_loai`, `kho`, `tong_kho`, `da_ban`) VALUES
(1, 'Samsung Galaxy S24', '40000001', 'Samsung Galaxy S24 5G 8GB/512GB ', '1610718093.jpg', 1, 1, 123, 125, '40000001'),
(5, 'iPhone 11', '12312312', 'iPhone 11 128GB Black', '1610716751.jpg', 3, 1, 47, 50, '12312312'),
(6, 'iPhone 12', '30000000', 'iPhone 12 128GB', '1610764426.jpg', 3, 1, 0, 0, '30000000'),
(7, 'Xiaomi Mi 11 Pro Plus', '50000000', 'Xiaomi Mi 11 Pro Plus 256GB', '1610717572.jpg', 4, 1, 0, 0, '50000000'),
(8, 'iPhone 11 ', '13123124', 'iPhone 11 64GB White', '1610717071.jpg', 3, 1, 50, 100, '13123124'),
(9, 'iPhone X', '50000000', 'iPhone X 64GB', '1673575827.jpg', 3, 1, 1, 1, '60000123'),
(13, 'Samsung Galaxy S23 Ultra 5G', '23000000', 'Samsung Galaxy S23 Ultra 5G 8GB - 256GB', 'bluetooth-airpods-pro-magsafe-charge-apple-mlwk3-thumb-600x600.jpeg', 1, 1, 12, 12, '23000000'),
(17, 'Samsung Galaxy A23', '5000000', 'Samsung Galaxy A23 6GB', '1610721559.png', 1, 1, 231, 235, '5000246'),
(18, 'Samsung Galaxy A24', '18000000', 'Samsung Galaxy A24 8GB/128GB', '1610764426.jpg', 1, 1, 123, 123, '18000000'),
(19, 'Samsung Galaxy A25 5G', '10000000', 'Samsung Galaxy A25 5G 8GB/128GB', '1673576147.jpg', 1, 1, 112, 112, '10000000'),
(20, 'Samsung Galaxy A21s', '5000000', 'Samsung Galaxy A21s (6GB/64GB)', '1673576017.jpg', 1, 1, 223, 223, '5000000'),
(21, 'Samsung Galaxy S25 Plus', '20000000', 'Samsung Galaxy S25 Plus 256GB', '1673575827.jpg', 1, 1, 334, 334, ''),
(22, 'Samsung Galaxy S25 Plus', '21000000', 'Samsung Galaxy S25 Plus 256GB', '1673575827.jpg', 1, 1, 334, 334, '21000000'),
(26, 'iPhone 16 Đồ án', '10000000', 'Apple', '1722059128.jpg', 3, 1, 100, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `the_loai`
--

CREATE TABLE `the_loai` (
  `ma_the_loai` int(11) NOT NULL,
  `ten_the_loai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `the_loai`
--

INSERT INTO `the_loai` (`ma_the_loai`, `ten_the_loai`) VALUES
(1, 'Điện thoại'),
(2, 'Máy tính bảng');

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma` int(11) NOT NULL,
  `tieu_de` varchar(25) NOT NULL,
  `noi_dung` varchar(25) NOT NULL,
  `tom_tat` varchar(25) NOT NULL,
  `anh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_khach_hang` (`ma_khach_hang`),
  ADD KEY `ma_san_pham` (`ma_san_pham`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD KEY `hoa_don_chi_tiet` (`ma_san_pham`),
  ADD KEY `fk_ma_hoa_don` (`ma_hoa_don`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `san_pham` (`ma_hang`),
  ADD KEY `ma_the_loai` (`ma_the_loai`);

--
-- Indexes for table `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`ma_the_loai`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `ma_the_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma`);

--
-- Constraints for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `fk_ma_hoa_don` FOREIGN KEY (`ma_hoa_don`) REFERENCES `hoa_don` (`ma`) ON DELETE CASCADE,
  ADD CONSTRAINT `hoa_don_chi_tiet` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_the_loai` FOREIGN KEY (`ma_the_loai`) REFERENCES `the_loai` (`ma_the_loai`),
  ADD CONSTRAINT `san_pham` FOREIGN KEY (`ma_hang`) REFERENCES `hang` (`ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
