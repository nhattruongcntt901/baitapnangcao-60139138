-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 08:00 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhanvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `loai_nv`
--

CREATE TABLE `loai_nv` (
  `id_loainv` int(11) NOT NULL,
  `tenloai_nv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai_nv`
--

INSERT INTO `loai_nv` (`id_loainv`, `tenloai_nv`) VALUES
(1, 'Giám Đốc'),
(2, 'Phó giám Đốc'),
(3, 'Chủ tịch'),
(4, 'Trưởng Phòng'),
(5, 'Nhân viên Marketing'),
(6, 'Nhân viên Editor'),
(7, 'Nhân viên content'),
(8, 'Phó Giám Đốc'),
(9, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nv` int(11) NOT NULL,
  `ho_nv` varchar(50) NOT NULL,
  `ten_nv` varchar(10) NOT NULL,
  `ns_nv` varchar(11) NOT NULL,
  `gioitinh_nv` int(11) NOT NULL,
  `diachi_nv` text NOT NULL,
  `anh_nv` text NOT NULL,
  `id_loainv` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id_nv`, `ho_nv`, `ten_nv`, `ns_nv`, `gioitinh_nv`, `diachi_nv`, `anh_nv`, `id_loainv`, `id_phong`) VALUES
(3, 'Lâm Minh', 'Thiện', '2000-03-12', 0, 'Ninh Hòa', '3.jpg', 2, 4),
(5, 'Trần Quốc', 'Thịnh', '2000-10-10', 0, 'Phú Yên', '5.jpg', 5, 1),
(6, 'Nguyễn Đình Duy', 'Luân', '2000-10-10', 0, 'Khánh Hòa', '6.jpg', 7, 4),
(22, 'Nguyễn Hữu Nhật', 'dsdas', '2000-10-10', 0, 'Suối Giêng, Công Hải, Thuận Bắc, Ninh Thuận', '22.png', 2, 1),
(23, 'Nguyễn Hữu Nhật', 'Trường 901', '2000-10-10', 0, 'Suối Giêng, Công Hải, Thuận Bắc, Ninh Thuận', '23.png', 1, 3),
(24, 'Nguyễn Hữu', 'Độ', '1969-06-01', 1, 'Suối Giêng, Công Hải, Thuận Bắc, Ninh Thuận', '24.png', 1, 1),
(25, 'Nguyễn Hữu Nhật', 'Trường1', '2000-10-10', 0, 'Ninh Hòa', '25.png', 2, 1),
(26, 'Nguyễn Hữu Nhật', 'Thiện123', '2000-10-10', 2, 'Ninh Hòa', '26.png', 1, 1),
(29, 'Nguyễn', 'Trường', '2000-10-10', 0, 'Suối Giếng Thuận Bắc', '29.jpg', 2, 1),
(30, 'Trường', '123', '2000-10-10', 2, 'Ninh Thuận 901', '30.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `id_phong` int(11) NOT NULL,
  `tenphong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`id_phong`, `tenphong`) VALUES
(1, 'Phòng Marketing'),
(2, 'Phòng Quay Phim/Edit'),
(3, 'Phòng Chụp Ảnh'),
(4, 'Phòng Content'),
(8, 'Phòng nhân sự'),
(9, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `pass_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `pass_user`) VALUES
(1, 'truong901', '123123'),
(2, 'thien901', '123123'),
(3, 'thinh901', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loai_nv`
--
ALTER TABLE `loai_nv`
  ADD PRIMARY KEY (`id_loainv`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nv`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_loainv` (`id_loainv`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id_phong`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loai_nv`
--
ALTER TABLE `loai_nv`
  MODIFY `id_loainv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `phongban`
--
ALTER TABLE `phongban`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phongban` (`id_phong`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`id_loainv`) REFERENCES `loai_nv` (`id_loainv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
