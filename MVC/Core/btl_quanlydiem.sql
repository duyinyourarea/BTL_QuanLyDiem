-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 07:24 PM
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
  `diemchuyencan` float NOT NULL,
  `diemthuchanh` float NOT NULL,
  `diemgiuaki` float NOT NULL,
  `diemcuoiki_l1` float NOT NULL,
  `diemcuoiki_l2` float DEFAULT NULL,
  `diemtb_he10` varchar(10) DEFAULT NULL,
  `diemtb_he4` varchar(10) DEFAULT NULL,
  `diemtb_word` varchar(10) DEFAULT NULL,
  `lanthi` int(11) NOT NULL,
  `trangthai` varchar(30) NOT NULL,
  `masinhvien` varchar(30) NOT NULL,
  `mamon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('L01', '72DCTM22', '0', 'CNTT02');

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
('MH02', 'An toàn thông tin', '3', '1', 'Thanh Tấn', '10/0/20/70', 'CNTT02');

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
('ADMIN01', '1', 'Admin'),
('SV02', '234', 'Sinh viên');

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
  ADD PRIMARY KEY (`dsv_id`),
  ADD KEY `masinhvien` (`masinhvien`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`malop`),
  ADD KEY `manganh` (`manganh`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamon`),
  ADD KEY `manganh` (`manganh`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`manganh`),
  ADD KEY `makhoa` (`makhoa`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masinhvien`),
  ADD KEY `malop` (`malop`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diemsinhvien`
--
ALTER TABLE `diemsinhvien`
  ADD CONSTRAINT `diemsinhvien_ibfk_1` FOREIGN KEY (`masinhvien`) REFERENCES `sinhvien` (`masinhvien`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`manganh`) REFERENCES `nganh` (`manganh`);

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`manganh`) REFERENCES `nganh` (`manganh`);

--
-- Constraints for table `nganh`
--
ALTER TABLE `nganh`
  ADD CONSTRAINT `nganh_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
