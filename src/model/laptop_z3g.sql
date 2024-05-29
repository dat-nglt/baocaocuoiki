-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2024 lúc 06:19 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laptop_z3g`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logistics`
--

CREATE TABLE `logistics` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantityLogistics` int(11) NOT NULL,
  `timeLogistics` datetime NOT NULL DEFAULT current_timestamp(),
  `addessLogistics` varchar(500) NOT NULL,
  `noteLogistics` varchar(500) NOT NULL,
  `statusLogistics` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logistics`
--

INSERT INTO `logistics` (`id`, `idProduct`, `quantityLogistics`, `timeLogistics`, `addessLogistics`, `noteLogistics`, `statusLogistics`) VALUES
(1, 43, 20, '2024-05-29 00:46:33', 'a', 'a', 1),
(2, 43, 30, '2024-05-29 11:09:35', 'AAA', 'aaaa', 1),
(3, 12, 1, '2024-05-29 11:13:30', 'AAA', 'aaaa', 1),
(4, 12, 1, '2024-05-29 11:18:26', 'AAA', 'aaaa', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `logistics`
--
ALTER TABLE `logistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logistics_product` (`idProduct`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `logistics`
--
ALTER TABLE `logistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `logistics`
--
ALTER TABLE `logistics`
  ADD CONSTRAINT `fk_logistics_product` FOREIGN KEY (`idProduct`) REFERENCES `sanpham` (`maSanPham`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
