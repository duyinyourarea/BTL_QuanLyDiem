-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 05:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl_quanlydiem`
--

-- --------------------------------------------------------

--
-- Table structure for table `diemmonhoc`
--

CREATE TABLE `diemmonhoc` (
  `dmh_id` varchar(30) NOT NULL,
  `diemchuyencan` float DEFAULT NULL,
  `diemthuchanh` float DEFAULT NULL,
  `diemgiuaki` float DEFAULT NULL,
  `diemcuoiki_l1` float DEFAULT NULL,
  `diemcuoiki_l2` float DEFAULT NULL,
  `diemtb_he10` varchar(10) DEFAULT NULL,
  `diemtb_he4` varchar(10) DEFAULT NULL,
  `diemtb_word` varchar(10) DEFAULT NULL,
  `lanthi` int(11) NOT NULL,
  `trangthai` varchar(30) NOT NULL,
  `masinhvien` varchar(30) NOT NULL,
  `mamon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diemmonhoc`
--

INSERT INTO `diemmonhoc` (`dmh_id`, `diemchuyencan`, `diemthuchanh`, `diemgiuaki`, `diemcuoiki_l1`, `diemcuoiki_l2`, `diemtb_he10`, `diemtb_he4`, `diemtb_word`, `lanthi`, `trangthai`, `masinhvien`, `mamon`) VALUES
('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20076', 'MH02'),
('10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20088', 'MH02'),
('11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20088', 'MH03'),
('12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20088', 'MH04'),
('13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20073', 'MH02'),
('14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20073', 'MH03'),
('15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20073', 'MH04'),
('2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20076', 'MH03'),
('3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20076', 'MH04'),
('4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20083', 'MH02'),
('5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20083', 'MH03'),
('6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20083', 'MH04'),
('7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20105', 'MH02'),
('8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20105', 'MH03'),
('9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Đang học', '72DCTM20105', 'MH04');

-- --------------------------------------------------------

--
-- Table structure for table `diemsinhvien`
--

CREATE TABLE `diemsinhvien` (
  `dsv_id` varchar(30) NOT NULL,
  `masinhvien` varchar(30) NOT NULL,
  `diemtb_he10` varchar(10) DEFAULT NULL,
  `diemtb_he4` varchar(10) DEFAULT NULL,
  `ki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diemsinhvien`
--

INSERT INTO `diemsinhvien` (`dsv_id`, `masinhvien`, `diemtb_he10`, `diemtb_he4`, `ki`) VALUES
('1', '72DCTM20076', NULL, NULL, 1),
('10', '72DCTM20105', NULL, NULL, 1),
('11', '72DCTM20105', NULL, NULL, 2),
('12', '72DCTM20105', NULL, NULL, 3),
('13', '72DCTM20088', NULL, NULL, 1),
('14', '72DCTM20088', NULL, NULL, 2),
('15', '72DCTM20088', NULL, NULL, 3),
('16', '72DCTM20073', NULL, NULL, 1),
('17', '72DCTM20073', NULL, NULL, 2),
('18', '72DCTM20073', NULL, NULL, 3),
('2', '72DCTM20076', NULL, NULL, 2),
('3', '72DCTM20076', NULL, NULL, 3),
('4', '72DCTM20083', NULL, NULL, 1),
('5', '72DCTM20083', NULL, NULL, 2),
('6', '72DCTM20083', NULL, NULL, 3),
('7', '72DCTM20083', NULL, NULL, 1),
('8', '72DCTM20083', NULL, NULL, 2),
('9', '72DCTM20083', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` varchar(30) NOT NULL,
  `tenkhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`) VALUES
('CK', 'Cơ khí'),
('CNTT', 'Công nghệ thông tin'),
('CT', 'Công trình'),
('KT', 'Kinh tế');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `malop` varchar(30) NOT NULL,
  `tenlop` varchar(30) NOT NULL,
  `siso` varchar(10) NOT NULL,
  `manganh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`malop`, `tenlop`, `siso`, `manganh`) VALUES
('L01', '72DCTM21', '0', 'CNTT02'),
('L02', '72DCTM22', '5', 'CNTT02'),
('L03', '72DCKT21', '0', 'KT02'),
('L04', '72DCOT21', '0', 'CK01');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `mamon` varchar(30) NOT NULL,
  `tenmon` varchar(50) NOT NULL,
  `sotinchi` varchar(10) NOT NULL,
  `ki` varchar(10) NOT NULL,
  `giangvien` varchar(50) NOT NULL,
  `phuongthuctinhdiem` varchar(100) NOT NULL,
  `manganh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`mamon`, `tenmon`, `sotinchi`, `ki`, `giangvien`, `phuongthuctinhdiem`, `manganh`) VALUES
('MH01', 'Java', '3', '1', 'Bùi Thị Như', '10/0/20/70', 'CNTT01'),
('MH02', 'An toàn thông tin', '3', '1', 'Thanh Tấn', '10/0/20/70', 'CNTT02'),
('MH03', 'Lập trình Web', '3', '2', 'Tran Thi Xuan Huong', '10/10/20/60', 'CNTT02'),
('MH04', 'Trí tuệ nhân tạo', '3', '3', 'Sathuan', '10/10/20/60', 'CNTT02');

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `manganh` varchar(30) NOT NULL,
  `tennganh` varchar(50) NOT NULL,
  `makhoa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`manganh`, `tennganh`, `makhoa`) VALUES
('CK01', 'Công nghệ kỹ thuật Ô tô', 'CK'),
('CK02', 'Cơ khí chế tạo', 'CK'),
('CNTT01', 'Công nghệ thông tin', 'CNTT'),
('CNTT02', 'Mạng máy tính và truyền thông dữ liệu', 'CNTT'),
('CT01', 'Quy hoạch và kỹ thuật giao thông', 'CT'),
('CT02', 'Xây dựng Cầu đường bộ', 'CT'),
('KT01', 'Logistics và quản lý chuỗi cung ứng', 'KT'),
('KT02', 'Thương mại điện tử', 'KT');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masinhvien` varchar(30) NOT NULL,
  `tensinhvien` varchar(30) NOT NULL,
  `gioitinh` varchar(10) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `malop` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`masinhvien`, `tensinhvien`, `gioitinh`, `sodienthoai`, `email`, `malop`) VALUES
('72DCTM20073', 'Vũ Minh Hiếu', 'Nam', '048xxx', 'ancb@aks.com', 'L02'),
('72DCTM20076', 'Vũ Đức Duy', 'Nam', '035xxx', 'duy@gmail.com', 'L02'),
('72DCTM20083', 'Cao Thế Hiệp', 'Nam', '0343xx', 'abcd@abcd.com', 'L02'),
('72DCTM20088', 'Nguyễn Đỗ Minh Hiếu', 'Nam', '036xxx', 'abcd@anc.com', 'L02'),
('72DCTM20105', 'Lương Bá Hiệp', 'Nam', '0234xxx', 'abcd@abc.com', 'L02');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `vaitro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan`, `matkhau`, `vaitro`) VALUES
('72DCTM20073', '048xxx', 'Sinh viên'),
('72DCTM20076', '035xxx', 'Sinh viên'),
('72DCTM20083', '0343xx', 'Sinh viên'),
('72DCTM20088', '036xxx', 'Sinh viên'),
('72DCTM20105', '0234xxx', 'Sinh viên'),
('ADMIN01', '1', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diemmonhoc`
--
ALTER TABLE `diemmonhoc`
  ADD PRIMARY KEY (`dmh_id`);

--
-- Indexes for table `diemsinhvien`
--
ALTER TABLE `diemsinhvien`
  ADD PRIMARY KEY (`dsv_id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`malop`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamon`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`manganh`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masinhvien`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
