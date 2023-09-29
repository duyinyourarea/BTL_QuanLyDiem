-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 09:44 AM
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
-- Table structure for table `diemcuamonhoc`
--

CREATE TABLE `diemcuamonhoc` (
  `dcmh_id` varchar(30) NOT NULL,
  `dcsv_id` varchar(30) NOT NULL,
  `diemchuyencan` float NOT NULL,
  `diemthuchanh` float NOT NULL,
  `diemgiuaki` float NOT NULL,
  `diemcuoiki` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diemcuasinhvien`
--

CREATE TABLE `diemcuasinhvien` (
  `dcsv_id` varchar(30) NOT NULL,
  `masinhvien` varchar(30) NOT NULL,
  `mamon` varchar(30) NOT NULL,
  `diemtrungbinh` varchar(10) NOT NULL,
  `lanthi` int(11) NOT NULL,
  `trangthai` varchar(30) NOT NULL
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
('CNTT', 'Công nghệ thông tin'),
('KT', 'Kinh tế');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `malop` varchar(30) NOT NULL,
  `tenlop` varchar(30) NOT NULL,
  `siso` int(11) NOT NULL,
  `makhoa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`malop`, `tenlop`, `siso`, `makhoa`) VALUES
('[value-1]', '[value-2]', 0, 'CNTT');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `mamon` varchar(30) NOT NULL,
  `tenmon` varchar(50) NOT NULL,
  `sotinchi` int(11) NOT NULL,
  `makhoa` varchar(30) NOT NULL,
  `ki` int(11) NOT NULL,
  `giangvien` varchar(30) NOT NULL,
  `phuongthuctinhdiem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`mamon`, `tenmon`, `sotinchi`, `makhoa`, `ki`, `giangvien`, `phuongthuctinhdiem`) VALUES
('MH01', 'Java', 3, 'CNTT', 5, 'Bui Thi Nhu', '10/0/20/70'),
('MH02', 'C++', 3, 'CNTT', 4, 'SaThuan', '10/0/20/70');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `diemcuamonhoc`
--
ALTER TABLE `diemcuamonhoc`
  ADD PRIMARY KEY (`dcmh_id`),
  ADD KEY `dcsv_id` (`dcsv_id`);

--
-- Indexes for table `diemcuasinhvien`
--
ALTER TABLE `diemcuasinhvien`
  ADD PRIMARY KEY (`dcsv_id`),
  ADD KEY `masinhvien` (`masinhvien`),
  ADD KEY `mamon` (`mamon`);

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
  ADD KEY `makhoa` (`makhoa`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamon`),
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
-- Constraints for table `diemcuamonhoc`
--
ALTER TABLE `diemcuamonhoc`
  ADD CONSTRAINT `diemcuamonhoc_ibfk_1` FOREIGN KEY (`dcsv_id`) REFERENCES `diemcuasinhvien` (`dcsv_id`);

--
-- Constraints for table `diemcuasinhvien`
--
ALTER TABLE `diemcuasinhvien`
  ADD CONSTRAINT `diemcuasinhvien_ibfk_1` FOREIGN KEY (`masinhvien`) REFERENCES `sinhvien` (`masinhvien`),
  ADD CONSTRAINT `diemcuasinhvien_ibfk_2` FOREIGN KEY (`mamon`) REFERENCES `monhoc` (`mamon`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`);

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
