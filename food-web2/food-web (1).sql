-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 01:45 AM
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
  `DiaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MSKH` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
('DC-6188ae5a102b4', 'huy???n Ch??u Ph??, t???nh An Giang', 'MSKHTest-123456'),
('DC-61890512611e6', 'KTX B, ?????i h???c C???n Th??', 'MSKHTest-123456');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Id_feedback` varchar(50) NOT NULL,
  `MSKH` varchar(50) DEFAULT NULL,
  `MSHH` varchar(50) DEFAULT NULL,
  `NgayFB` date NOT NULL DEFAULT curdate(),
  `Noidung` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Id_feedback`, `MSKH`, `MSHH`, `NgayFB`, `Noidung`) VALUES
('Feedback-618e7dde86b38', 'MSKHTest-123456', 'SP-618d0a117461a', '0000-00-00', 'S???n ph???m ?????p, gi??y t???t, s??? c??n ???ng h??? shop ti???p t???c trong th???i gian t???i ^^'),
('Feedback-618e84b7517f9', 'MSKHTest-123457', 'SP-618d0a117461a', '0000-00-00', 'Gi??y n??y r???t ?????p, c??c b???n n??n mua ???'),
('Feedback-6190ceba47e8f', 'MSKHTest-123456', 'SP-618d0a117461a', '0000-00-00', '123');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(50) NOT NULL,
  `TenHH` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `QuyCach` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `SoLuongHang` int(11) NOT NULL CHECK (`SoLuongHang` >= 0),
  `MaLoaiHang` varchar(10) NOT NULL,
  `DateCreated` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `DateCreated`) VALUES
('SP-6190dbce21777', 'Burger 2 mi???ng b?? khoai gi??n tr??n ph?? mai (b??nh l???n)', '', '179000', 50, 'ML001', '2021-11-14'),
('SP-6190dd018b82f', 'Burger si??u nh??n ph?? mai (c??? v???a)', '<p>Burger si??u nh??n c??? v???a mang l???i c???m gi??c th??m ngon v?? tr??n v??? cho ng?????i ??n, ????y l?? m???t trong nh???ng best seller th??ng 10 v???a qua</p>', '82000', 30, 'ML001', '2021-11-14'),
('SP-6190dd9723735', 'Burger b?? khoai gi??n tr??n ph?? mai', '<p>nh???p m?? t??? s???n ph???m</p>', '82000', 50, 'ML001', '2021-11-14'),
('SP-6190ee0793fa0', 'Burger whopper b?? si??u nh??n ph?? mai (c??? l???n)', '<p>Burger whopper b?? si??u nh??n ph?? mai (c??? l???n) ngon tr??n v??? ch???t t???ng c??n</p>', '152000', 40, 'ML001', '2021-11-14'),
('SP-6190eec1bd4dc', 'B?? t???m ph?? mai (b??nh v???a)', '<p>B?? t???m ph?? mai - m??n burger kh??ng c??n xa l??? g?? v???i gi???i s??nh ??n, l?? m???t trong nh???ng best seller th??ng 8</p>', '54000', 60, 'ML001', '2021-11-14'),
('SP-6190ef1466d31', 'B?? t???m ph?? mai (b??nh l???n)', '<p>B?? t???m ph?? mai ( l???n ) - m??n burger kh??ng c??n xa l??? g?? v???i gi???i s??nh ??n, l?? m???t trong nh???ng best seller th??ng 8</p>', '105000', 50, 'ML001', '2021-11-14'),
('SP-6190ef6e3102d', 'Burger b?? n?????ng whopper', '<p>Burger b?? n?????ng whopper s???n ph???m ??ang ???????c ng?????i d??ng ????n nh???n t??ch c???c t??? kho???ng th???i gian ra m???t</p>', '105000', 40, 'ML001', '2021-11-14'),
('SP-6190efae47613', 'G?? gi??n kh??ng cay (1 mi???ng)', '<p>G?? gi??n kh??ng cay - gi??nh cho ng?????i d??ng kh??ng th??? ??n ???????c cay, nh???ng v???n kh??ng ????nh m???t h????ng v??? tuy???t v???i m?? s???n ph???m mang l???i</p>', '36000', 80, 'ML002', '2021-11-14'),
('SP-6190f00b3c2be', 'G?? r??n gi??n cay (1 mi???ng)', '<p>Phi??n b???n cay c???c tr???n v??? c???c ?????c bi???t c???a g?? r??n</p>', '36000', 80, 'ML002', '2021-11-14'),
('SP-6190f04296972', 'Combo g?? r??n gi??n cay (2 mi???ng)', '<p>Combo G???m : 1 N?????c (M) + 1 Khoai T??y (M) + 2 mi???ng g?? r??n gi??n cay</p>', '90000', 70, 'ML002', '2021-11-14'),
('SP-6190f06fc221f', 'Combo g?? gi??n kh??ng cay (2 mi???ng)', '<p>MAIN COURSE : 1 N?????c + 2 mi???ng G?? Gi??n kh??ng cay + 1 Khoai T??y Chi??n (M)</p>', '90000', 60, 'ML002', '2021-11-14'),
('SP-6190f0b0e5b19', 'Combo g?? bbq (3 mi???ng)', '<p>Combo G???m : 1 N?????c (M) + 1 Khoai T??y Chi??n (M) + 3 mi???ng g?? BBQ</p>', '119000', 50, 'ML002', '2021-11-14'),
('SP-6190f153ed8d5', 'Khoai t??y chi??n size m', '<p>FRIES SIZE M</p>', '27000', 90, 'ML003', '2021-11-14'),
('SP-6190f18627a4b', 'G?? nuggets', '<p>G?? nuggets - m??n ??n th??m ch???t l?????ng</p>', '26000', 70, 'ML003', '2021-11-14'),
('SP-6190f1eb906cf', 'Khoai t??y t???m ph?? mai th???t x??ng kh??i', '<p>Khoai t??y t???m ph?? mai th???t x??ng kh??i - m??n ??n th??m ???????c nhi???u ng?????i d??ng tin t?????ng</p>', '36000', 90, 'ML003', '2021-11-14'),
('SP-6190f22d22838', 'N?????c su???i', '<p>N?????c su???i ????ng chai</p>', '10000', 100, 'ML004', '2021-11-14'),
('SP-6190f25a53cfd', 'N?????c cam', '<p>N?????c cam ????ng chai</p>', '19000', 100, 'ML004', '2021-11-14'),
('SP-6190f28d3503b', 'Coca Cola', '<p>Coca Cola ????ng chai</p>', '19000', 100, 'ML004', '2021-11-14'),
('SP-6190f31abb135', 'N?????c u???ng Milo', '<p>N?????c u???ng Milo - n??ng l?????ng tr??n ?????y</p>', '19000', 100, 'ML004', '2021-11-14'),
('SP-6190f33f4bda3', 'Tr?? chanh', '<p>Tr?? chanh gi???i kh??t</p>', '19000', 100, 'ML004', '2021-11-14');

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
  `HoTenKH` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `SoFax` varchar(30) DEFAULT NULL,
  `TenCongTy` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `TK`, `HoTenKH`, `SoDienThoai`, `SoFax`, `TenCongTy`, `Avatar`) VALUES
('customer-6191b2d72775a', 'nhoaitan', 'Test register', '0379586235', NULL, NULL, NULL),
('guest-61854b1dcc036', NULL, 'test cart', '123', '', '', NULL),
('guest-61893cf2ddfb8', NULL, 'Nguy???n Ho??i T??n', '0379586235', '', 'CTU', NULL),
('guest-6189433f93df7', NULL, 'Nguy???n V??n A', '0379586235', '', '', NULL),
('MSKHTest-123456', 'hoaitan0', 'Nguy???n Ho??i T??n', '0379586235', '', 'CTU', 'PicsArt_07-11-07.59.27.jpg'),
('MSKHTest-123457', 'hoaitan1', 'Nguy???n Ho??i T??n', '0379586235', NULL, NULL, 'IMG_20200608_232518_721.jpg'),
('MSKHTest-123458', 'hoaitan2', 'Tr???n Th??? C???m H????ng', '0379586235', NULL, NULL, NULL),
('MSKHTest-123459', 'hoaitan3', 'Nguy???n V??n Hi???u', '0379586235', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` varchar(10) NOT NULL,
  `TenLoaiHang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('ML001', 'Hamburger'),
('ML002', 'KFC'),
('ML003', 'M??n ??n k??m'),
('ML004', 'Th???c u???ng');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(50) NOT NULL,
  `HoTenNV` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `TKhoan` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `TKhoan`) VALUES
('NV001', 'Nguy???n Ho??i T??n', 'Administrator', 'Can Tho', '0379586235', 'admin');

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
