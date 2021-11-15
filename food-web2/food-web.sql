-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 04:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountkh`
--

CREATE TABLE `accountkh` (
  `TK` varchar(30) NOT NULL,
  `MK` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountkh`
--

INSERT INTO `accountkh` (`TK`, `MK`) VALUES
('hoaitan0', '10102000'),
('hoaitan1', '10102000'),
('hoaitan2', '10102000'),
('hoaitan3', '10102000'),
('hoaitan4', '10102000'),
('nhoaitan', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `accountnv`
--

CREATE TABLE `accountnv` (
  `TKhoan` varchar(16) NOT NULL,
  `Mkhau` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountnv`
--

INSERT INTO `accountnv` (`TKhoan`, `Mkhau`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` varchar(50) NOT NULL,
  `MSHH` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` decimal(10,0) NOT NULL,
  `GiamGia` int(11) DEFAULT NULL,
  `SoDienThoai` int(11) NOT NULL,
  `MaDC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` varchar(50) NOT NULL,
  `MSKH` varchar(50) NOT NULL,
  `MSNV` varchar(50) DEFAULT NULL,
  `NgayDH` date NOT NULL DEFAULT curdate(),
  `NgayGH` date NOT NULL DEFAULT curdate() CHECK (`NgayGH` > `NgayDH`),
  `TrangThaiDH` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` varchar(30) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `MSKH` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
('DC-6188ae5a102b4', 'huyện Châu Phú, tỉnh An Giang', 'MSKHTest-123456'),
('DC-61890512611e6', 'KTX B, Đại học Cần Thơ', 'MSKHTest-123456');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Id_feedback` varchar(50) NOT NULL,
  `MSKH` varchar(50) DEFAULT NULL,
  `MSHH` varchar(50) DEFAULT NULL,
  `NgayFB` date NOT NULL DEFAULT curdate(),
  `Noidung` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Id_feedback`, `MSKH`, `MSHH`, `NgayFB`, `Noidung`) VALUES
('Feedback-618e7dde86b38', 'MSKHTest-123456', 'SP-618d0a117461a', '0000-00-00', 'Sản phẩm đẹp, giày tốt, sẽ còn ủng hộ shop tiếp tục trong thời gian tới ^^'),
('Feedback-618e84b7517f9', 'MSKHTest-123457', 'SP-618d0a117461a', '0000-00-00', 'Giày này rất đẹp, các bạn nên mua ạ'),
('Feedback-6190ceba47e8f', 'MSKHTest-123456', 'SP-618d0a117461a', '0000-00-00', '123');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(50) NOT NULL,
  `TenHH` varchar(255) NOT NULL,
  `QuyCach` text NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `SoLuongHang` int(11) NOT NULL CHECK (`SoLuongHang` >= 0),
  `MaLoaiHang` varchar(10) NOT NULL,
  `DateCreated` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `DateCreated`) VALUES
('SP-6190dbce21777', 'Burger 2 miếng bò khoai giòn tràn phô mai (bánh lớn)', '', '179000', 50, 'ML001', '2021-11-14'),
('SP-6190dd018b82f', 'Burger siêu nhân phô mai (cỡ vừa)', '<p>Burger siêu nhân cỡ vừa mang lại cảm giác thơm ngon và tròn vị cho người ăn, đây là một trong những best seller tháng 10 vừa qua</p>', '82000', 30, 'ML001', '2021-11-14'),
('SP-6190dd9723735', 'Burger bò khoai giòn tràn phô mai', '<p>nhập mô tả sản phẩm</p>', '82000', 50, 'ML001', '2021-11-14'),
('SP-6190ee0793fa0', 'Burger whopper bò siêu nhân phô mai (cỡ lớn)', '<p>Burger whopper bò siêu nhân phô mai (cỡ lớn) ngon tròn vị chất từng cơn</p>', '152000', 40, 'ML001', '2021-11-14'),
('SP-6190eec1bd4dc', 'Bò tắm phô mai (bánh vừa)', '<p>Bò tắm phô mai - món burger không còn xa lạ gì với giới sành ăn, là một trong những best seller tháng 8</p>', '54000', 60, 'ML001', '2021-11-14'),
('SP-6190ef1466d31', 'Bò tắm phô mai (bánh lớn)', '<p>Bò tắm phô mai ( lớn ) - món burger không còn xa lạ gì với giới sành ăn, là một trong những best seller tháng 8</p>', '105000', 50, 'ML001', '2021-11-14'),
('SP-6190ef6e3102d', 'Burger bò nướng whopper', '<p>Burger bò nướng whopper sản phẩm đang được người dùng đón nhận tích cực từ khoảng thời gian ra mắt</p>', '105000', 40, 'ML001', '2021-11-14'),
('SP-6190efae47613', 'Gà giòn không cay (1 miếng)', '<p>Gà giòn không cay - giành cho người dùng không thể ăn được cay, những vẫn không đánh mất hương vị tuyệt vời mà sản phẩm mang lại</p>', '36000', 80, 'ML002', '2021-11-14'),
('SP-6190f00b3c2be', 'Gà rán giòn cay (1 miếng)', '<p>Phiên bản cay cực trọn vị cực đặc biệt của gà rán</p>', '36000', 80, 'ML002', '2021-11-14'),
('SP-6190f04296972', 'Combo gà rán giòn cay (2 miếng)', '<p>Combo Gồm : 1 Nước (M) + 1 Khoai Tây (M) + 2 miếng gà rán giòn cay</p>', '90000', 70, 'ML002', '2021-11-14'),
('SP-6190f06fc221f', 'Combo gà giòn không cay (2 miếng)', '<p>MAIN COURSE : 1 Nước + 2 miếng Gà Giòn không cay + 1 Khoai Tây Chiên (M)</p>', '90000', 60, 'ML002', '2021-11-14'),
('SP-6190f0b0e5b19', 'Combo gà bbq (3 miếng)', '<p>Combo Gồm : 1 Nước (M) + 1 Khoai Tây Chiên (M) + 3 miếng gà BBQ</p>', '119000', 50, 'ML002', '2021-11-14'),
('SP-6190f153ed8d5', 'Khoai tây chiên size m', '<p>FRIES SIZE M</p>', '27000', 90, 'ML003', '2021-11-14'),
('SP-6190f18627a4b', 'Gà nuggets', '<p>Gà nuggets - món ăn thêm chất lượng</p>', '26000', 70, 'ML003', '2021-11-14'),
('SP-6190f1eb906cf', 'Khoai tây tắm phô mai thịt xông khói', '<p>Khoai tây tắm phô mai thịt xông khói - món ăn thêm được nhiều người dùng tin tưởng</p>', '36000', 90, 'ML003', '2021-11-14'),
('SP-6190f22d22838', 'Nước suối', '<p>Nước suối đóng chai</p>', '10000', 100, 'ML004', '2021-11-14'),
('SP-6190f25a53cfd', 'Nước cam', '<p>Nước cam đóng chai</p>', '19000', 100, 'ML004', '2021-11-14'),
('SP-6190f28d3503b', 'Coca Cola', '<p>Coca Cola đóng chai</p>', '19000', 100, 'ML004', '2021-11-14'),
('SP-6190f31abb135', 'Nước uống Milo', '<p>Nước uống Milo - năng lượng tràn đầy</p>', '19000', 100, 'ML004', '2021-11-14'),
('SP-6190f33f4bda3', 'Trà chanh', '<p>Trà chanh giải khát</p>', '19000', 100, 'ML004', '2021-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` varchar(30) NOT NULL,
  `TenHinh` varchar(100) NOT NULL,
  `MSHH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
('MImG-6190dc9fc3324', 'dbl_crunchy_whp-min_1.jpg', 'SP-6190dbce21777'),
('MImG-6190dd0007087', 'crunchy_bg-min_1.jpg', 'SP-6190dbce21777'),
('MImG-6190de3fd06f3', 'crunchy_bg-min_1-1636884031.jpg', 'SP-6190dd9723735'),
('MImG-6190eec068355', 'cheese_ring_whopper_1.jpg', 'SP-6190ee0793fa0'),
('MImG-6190ef1337cf0', 'exc_burger_2.jpg', 'SP-6190eec1bd4dc'),
('MImG-6190ef4463481', 'exc_whopper_2.jpg', 'SP-6190ef1466d31'),
('MImG-6190efacecb64', 'bo_nuong_whopper_alc__1.jpg', 'SP-6190ef6e3102d'),
('MImG-6190f009582e3', 'crispy_6.jpg', 'SP-6190efae47613'),
('MImG-6190f041aebf1', 'flame_3.jpg', 'SP-6190f00b3c2be'),
('MImG-6190f06e1ea68', 'combo-2mieng-flamin.jpg', 'SP-6190f04296972'),
('MImG-6190f09868326', 'combo-2mieng-crispy_1.jpg', 'SP-6190f06fc221f'),
('MImG-6190f0c34a820', 'combo-3mieng-bbqwings.jpg', 'SP-6190f0b0e5b19'),
('MImG-6190f184eccae', 'sn_shoestringfries_small-v1_1.png', 'SP-6190f153ed8d5'),
('MImG-6190f1ea87a28', 'g_nuggets_chicken_nuggets__2.jpg', 'SP-6190f18627a4b'),
('MImG-6190f229c7411', 'cheesy_fries.jpg', 'SP-6190f1eb906cf'),
('MImG-6190f25968d6e', 'n_c_su_i.jpg', 'SP-6190f22d22838'),
('MImG-6190f28bb42e2', 'minutemaid.jpg', 'SP-6190f25a53cfd'),
('MImG-6190f2ad64061', 'coke_bottle.jpg', 'SP-6190f28d3503b'),
('MImG-6190f33e4cab2', 'milo.jpg', 'SP-6190f31abb135'),
('MImG-6190f3586e437', 'nesttea.jpg', 'SP-6190f33f4bda3');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(50) NOT NULL,
  `TK` varchar(30) DEFAULT NULL,
  `HoTenKH` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `SoFax` varchar(30) DEFAULT NULL,
  `TenCongTy` varchar(100) DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `TK`, `HoTenKH`, `SoDienThoai`, `SoFax`, `TenCongTy`, `Avatar`) VALUES
('customer-6191b2d72775a', 'nhoaitan', 'Test register', '0379586235', NULL, NULL, NULL),
('guest-61854b1dcc036', NULL, 'test cart', '123', '', '', NULL),
('guest-61893cf2ddfb8', NULL, 'Nguyễn Hoài Tân', '0379586235', '', 'CTU', NULL),
('guest-6189433f93df7', NULL, 'Nguyễn Văn A', '0379586235', '', '', NULL),
('MSKHTest-123456', 'hoaitan0', 'Nguyễn Hoài Tân', '0379586235', '', 'CTU', 'PicsArt_07-11-07.59.27.jpg'),
('MSKHTest-123457', 'hoaitan1', 'Nguyễn Hoài Tân', '0379586235', NULL, NULL, 'IMG_20200608_232518_721.jpg'),
('MSKHTest-123458', 'hoaitan2', 'Trần Thị Cẩm Hương', '0379586235', NULL, NULL, NULL),
('MSKHTest-123459', 'hoaitan3', 'Nguyễn Văn Hiếu', '0379586235', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` varchar(10) NOT NULL,
  `TenLoaiHang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('ML001', 'Hamburger'),
('ML002', 'KFC'),
('ML003', 'Món ăn kèm'),
('ML004', 'Thức uống');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(50) NOT NULL,
  `HoTenNV` varchar(255) NOT NULL,
  `ChucVu` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `TKhoan` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `TKhoan`) VALUES
('NV001', 'Nguyễn Hoài Tân', 'Administrator', 'Can Tho', '0379586235', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountkh`
--
ALTER TABLE `accountkh`
  ADD PRIMARY KEY (`TK`);

--
-- Indexes for table `accountnv`
--
ALTER TABLE `accountnv`
  ADD PRIMARY KEY (`TKhoan`);

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Id_feedback`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Constraints for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
