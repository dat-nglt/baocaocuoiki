-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2024 lúc 07:28 PM
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
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDonHang` int(11) NOT NULL,
  `maNguoiDung` int(11) NOT NULL,
  `thoiGian` date NOT NULL,
  `trangThai` tinyint(1) NOT NULL DEFAULT 0,
  `thanhTien` int(15) NOT NULL DEFAULT 0,
  `diaChi` varchar(255) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `soDienThoai` varchar(15) NOT NULL,
  `ghiChu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDonHang`, `maNguoiDung`, `thoiGian`, `trangThai`, `thanhTien`, `diaChi`, `hoTen`, `soDienThoai`, `ghiChu`) VALUES
(26, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(27, 169, '2024-05-27', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(28, 169, '2024-05-26', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(29, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(30, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(31, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(32, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(33, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(34, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(35, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(36, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(37, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(38, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng'),
(39, 169, '2024-05-28', 0, 244594000, 'Mỹ Tho', 'Người già', '0836752977', 'Bom hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `thanhTienNguoiDung` (`maNguoiDung`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`maNguoiDung`) REFERENCES `nguoidung` (`maNguoiDung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
