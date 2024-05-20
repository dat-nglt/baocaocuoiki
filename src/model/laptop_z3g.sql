-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2023 lúc 06:52 AM
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
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `maCTDH` int(11) NOT NULL,
  `maDonHang` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` double(10,2) NOT NULL,
  `tongTien` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maCTDH`, `maDonHang`, `maSanPham`, `soLuong`, `donGia`, `tongTien`) VALUES
(20, 22, 65, 6, 53.10, 318.60);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDonHang` int(11) NOT NULL,
  `maNguoiDung` int(11) NOT NULL,
  `thoiGian` date NOT NULL,
  `trangThai` tinyint(1) NOT NULL DEFAULT 0,
  `thanhTien` double(20,2) NOT NULL DEFAULT 0.00,
  `diaChi` varchar(255) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `soDienThoai` int(11) NOT NULL,
  `ghiChu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDonHang`, `maNguoiDung`, `thoiGian`, `trangThai`, `thanhTien`, `diaChi`, `hoTen`, `soDienThoai`, `ghiChu`) VALUES
(22, 168, '2023-11-30', 0, 318.60, '22', '22', 22, '22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `maNguoiDung` int(11) NOT NULL,
  `tenTaiKhoan` varchar(500) NOT NULL,
  `matKhau` varchar(500) NOT NULL,
  `tenNguoiDung` varchar(255) DEFAULT NULL,
  `diaChi` varchar(500) DEFAULT NULL,
  `soDienThoai` varchar(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gioiTinh` int(1) NOT NULL DEFAULT 1,
  `ngaySinh` date NOT NULL,
  `ngayThamGia` date NOT NULL,
  `quyenTruyCap` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`maNguoiDung`, `tenTaiKhoan`, `matKhau`, `tenNguoiDung`, `diaChi`, `soDienThoai`, `email`, `gioiTinh`, `ngaySinh`, `ngayThamGia`, `quyenTruyCap`) VALUES
(167, 'admin', '$2y$10$JuTPrzaGIb.hofLP0MkYb.PrL/Qfex/Kdjv/tRL02jgNJvRqqC3tC', NULL, NULL, NULL, NULL, 1, '0000-00-00', '2023-11-30', 1),
(168, 'user', '$2y$10$KHu5vhfazYb1/.kK2zObyuD8kLqVNDqrRd4D9yOZjde4QZhnMHFIq', NULL, NULL, NULL, NULL, 1, '0000-00-00', '2023-11-30', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(50) NOT NULL,
  `anhLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`maLoai`, `tenLoai`, `anhLoai`) VALUES
(1, 'ASUS', 'asus.png\r\n'),
(2, 'MSI', 'msi.jpg\r\n'),
(3, 'ACER', 'acer.png'),
(4, 'LENOVO', 'lenovo.jpg'),
(5, 'DELL', 'dell.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `hinhAnh` varchar(300) NOT NULL,
  `giaTien` double(10,2) NOT NULL DEFAULT 0.00,
  `soLuong` int(11) NOT NULL DEFAULT 1,
  `moTa` varchar(5000) DEFAULT NULL,
  `giaGiam` int(2) NOT NULL DEFAULT 0,
  `ngayHetHanGiam` date DEFAULT NULL,
  `maLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `tenSanPham`, `hinhAnh`, `giaTien`, `soLuong`, `moTa`, `giaGiam`, `ngayHetHanGiam`, `maLoai`) VALUES
(12, 'LAPTOP ASUS ZENBOOK UX3402VA-KM085W (I5 1340P/16GB RAM/512GB SSD/14 OLED/WIN11/CÁP/TÚI/XANH)', 'asus04.png', 23299000.00, 15, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i5-1340P<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 14-inch OLED<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Phụ kiện:</strong> Cáp, Túi<br>\r\n  <strong>Màu sắc:</strong> Xanh\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ASUS ZENBOOK UX3402VA-KM085W</strong> là chiếc laptop tinh tế với cấu hình mạnh mẽ, màn hình OLED sắc nét và thiết kế gọn nhẹ.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình OLED 14-inch</strong><br>\r\n  Laptop này được trang bị màn hình OLED 14-inch, mang lại trải nghiệm xem hình ảnh sống động và chi tiết. Công nghệ OLED cung cấp độ tương phản cao và màu sắc chính xác.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất ổn định</strong><br>\r\n  Với bộ vi xử lý Intel Core i5-1340P và bộ nhớ RAM 16GB, laptop đảm bảo khả năng xử lý nhanh chóng cho công việc và giải trí đa nhiệm.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp tăng tốc độ truy xuất dữ liệu, đồng thời cung cấp không gian lưu trữ đủ cho dữ liệu và ứng dụng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Phụ kiện đi kèm</strong><br>\r\n  LAPTOP ASUS ZENBOOK UX3402VA-KM085W đi kèm với cáp và túi, tạo thuận lợi cho việc di chuyển và sử dụng trong mọi tình huống.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế sang trọng</strong><br>\r\n  Với màu sắc xanh tinh tế, thiết kế nhẹ nhàng và góc cạnh, ASUS ZENBOOK UX3402VA-KM085W thể hiện sự sang trọng và chuyên nghiệp.\r\n</p>\r\n', 0, NULL, 1),
(13, 'LAPTOP ASUS ZENBOOK UX3402VA-KM203W (I5 1340P/16GB RAM/512GB SSD/14 OLED/WIN11/CÁP/TÚI/BẠC)', 'asus05.png', 23000000.00, 15, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i5-1340P<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 14-inch OLED<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Phụ kiện:</strong> Cáp, Túi<br>\r\n  <strong>Màu sắc:</strong> Bạc\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ASUS ZENBOOK UX3402VA-KM203W</strong> là chiếc laptop đẳng cấp với cấu hình mạnh mẽ, màn hình OLED sắc nét và thiết kế sang trọng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình OLED 14-inch</strong><br>\r\n  Laptop này được trang bị màn hình OLED 14-inch, mang lại trải nghiệm xem hình ảnh sống động và chi tiết. Công nghệ OLED cung cấp độ tương phản cao và màu sắc chính xác.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất ổn định</strong><br>\r\n  Với bộ vi xử lý Intel Core i5-1340P và bộ nhớ RAM 16GB, laptop đảm bảo khả năng xử lý nhanh chóng cho công việc và giải trí đa nhiệm.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp tăng tốc độ truy xuất dữ liệu, đồng thời cung cấp không gian lưu trữ đủ cho dữ liệu và ứng dụng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Phụ kiện đi kèm</strong><br>\r\n  LAPTOP ASUS ZENBOOK UX3402VA-KM203W đi kèm với cáp và túi, tạo thuận lợi cho việc di chuyển và sử dụng trong mọi tình huống.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế sang\r\n', 0, NULL, 1),
(30, 'LAPTOP ASUS GAMING TUF FX506HE-HN377W (I7 11800H/8GB RAM/512GB SSD/15.6 FHD 144HZ/RTX 3050TI 4GB/WIN11/ĐEN)', 'asus01.jpg', 19849000.00, 16, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i7-11800H<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD 144Hz<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA® GeForce RTX™ 3050Ti 4GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Đen\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ASUS GAMING TUF FX506HE-HN377W</strong> là chiếc laptop gaming mạnh mẽ với cấu hình ấn tượng, màn hình chất lượng cao và thiết kế đẳng cấp.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 15.6 inch FHD 144Hz</strong><br>\r\n  Laptop này sở hữu màn hình 15.6 inch FHD với tần số làm mới 144Hz, tạo ra trải nghiệm chơi game mượt mà và hình ảnh sắc nét. Điều này giúp bạn thưởng thức mọi chi tiết của trò chơi.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất đỉnh cao</strong><br>\r\n  Với bộ vi xử lý Intel Core i7-11800H và bộ nhớ RAM 8GB, laptop đảm bảo khả năng xử lý mạnh mẽ cho các ứng dụng đòi hỏi nhiều tài nguyên và game hiện đại.\r\n</p>\r\n\r\n<p>\r\n  <strong>Card đồ họa NVIDIA® GeForce RTX™ 3050Ti 4GB</strong><br>\r\n  Được trang bị card đồ họa NVIDIA® GeForce RTX™ 3050Ti 4GB, FX506HE-HN377W cung cấp hiệu suất đồ họa vượt trội và hỗ trợ công nghệ ray tracing.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp tăng tốc độ truy xuất dữ liệu và cung cấp không gian lưu trữ đủ cho game và dữ liệu cá nhân.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẳng cấp</strong><br>\r\n  Với màu sắc đen mạnh mẽ và thiết kế gaming, TUF FX506HE-HN377W thể hiện sự đẳng cấp và sẵn sàng đối mặt với mọi thách thức game.\r\n</p>\r\n', 10, '2023-11-30', 1),
(42, 'LAPTOP ASUS GAMING ROG STRIX G614JU-N3135W (I5 13450HX/8GB RAM/512GB SSD/16\"WUXGA 165HZ/RTX 4050 6GB/WIN11/XÁM)', 'asus02.png', 34299000.00, 20, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i5-13450HX<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 16-inch WUXGA 165Hz<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA® GeForce RTX™ 4050 6GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Xám\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ASUS GAMING ROG STRIX G614JU-N3135W</strong> là chiếc laptop gaming mạnh mẽ với cấu hình ấn tượng, màn hình lớn và card đồ họa hiệu suất cao.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 16-inch WUXGA 165Hz</strong><br>\r\n  Laptop này sở hữu màn hình 16-inch WUXGA với tần số làm mới 165Hz, tạo ra trải nghiệm chơi game mượt mà và hình ảnh sắc nét. Điều này giúp bạn thưởng thức mọi chi tiết của trò chơi.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất đỉnh cao</strong><br>\r\n  Với bộ vi xử lý Intel Core i5-13450HX và bộ nhớ RAM 8GB, laptop đảm bảo khả năng xử lý mạnh mẽ cho các ứng dụng đòi hỏi nhiều tài nguyên và game hiện đại.\r\n</p>\r\n\r\n<p>\r\n  <strong>Card đồ họa NVIDIA® GeForce RTX™ 4050 6GB</strong><br>\r\n  Được trang bị card đồ họa NVIDIA® GeForce RTX™ 4050 6GB, G614JU-N3135W cung cấp hiệu suất đồ họa vượt trội và hỗ trợ công nghệ ray tracing.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp tăng tốc độ truy xuất dữ liệu và cung cấp không gian lưu trữ đủ cho game và dữ liệu cá nhân.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế mạnh mẽ</strong><br>\r\n  Với màu sắc xám độc đáo, thiết kế gaming và logo ROG, G614JU-N3135W thể hiện sự mạnh mẽ và sẵn sàng cho mọi trận đấu.\r\n</p>\r\n', 0, NULL, 1),
(43, 'ASUS VIVOBOOK 14 OLED A1405VA-KM095W (I5 13500H/16GB RAM/512GB SSD/14 2.8K OLED/WIN11/BẠC)', 'asus03.png', 17999000.00, 50, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i5-13500H Processor<br>\r\n  <strong>RAM:</strong> 16GB DDR5 SO-DIMM<br>\r\n  <strong>Ổ cứng:</strong> 512GB PCIe® NVMe™ M.2 SSD<br>\r\n  <strong>Màn hình:</strong> 14-inch 2.8K OLED<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Bạc\r\n</p>\r\n\r\n<p>\r\n  <strong>ASUS VivoBook 14 OLED A1405VA-KM095W</strong> là một chiếc laptop mỏng nhẹ và hiệu suất cao, đặc biệt nổi bật với màn hình OLED chất lượng cao và cấu hình mạnh mẽ.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình OLED 2.8K</strong><br>\r\n  Laptop này sở hữu màn hình 14-inch 2.8K OLED, mang đến trải nghiệm xem hình ảnh và video vô cùng sống động và sắc nét. Công nghệ OLED cung cấp độ tương phản cao và màu sắc chính xác, tạo ra hình ảnh tinh tế và chân thực.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất ấn tượng</strong><br>\r\n  Được trang bị bộ vi xử lý Intel Core i5-13500H và bộ nhớ RAM 16GB, laptop này đảm bảo khả năng xử lý mượt mà cho mọi tác vụ từ công việc văn phòng đến giải trí đa phương tiện. Ổ cứng SSD dung lượng 512GB giúp tăng tốc độ truy xuất dữ liệu và lưu trữ nhanh chóng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế mỏng nhẹ và sang trọng</strong><br>\r\n  Với màu sắc bạc elegante, ASUS VivoBook 14 OLED A1405VA-KM095W có thiết kế mỏng nhẹ, dễ dàng mang theo bên mình. Bàn phím và touchpad được thiết kế tiện ích để tối ưu hóa trải nghiệm người dùng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Laptop đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Phù hợp cho công việc và giải trí</strong><br>\r\n  ASUS VivoBook 14 OLED A1405VA-KM095W là một sự lựa chọn hoàn hảo cho những người đang tìm kiếm sự kết hợp giữa di động, hiệu suất và chất lượng hình ảnh cao cấp.\r\n</p>\r\n', 0, NULL, 1),
(48, 'LAPTOP ASUS ZENBOOK UP3404VA-KN039W (I7 1360P/16GB RAM/512GB SSD/14 OLED CẢM ỨNG/WIN11/BÚT/CÁP/TÚI/XANH)', 'asus06.png', 29999000.00, 10, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i7-1360P<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 14-inch OLED cảm ứng<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Phụ kiện:</strong> Bút cảm ứng, Cáp, Túi<br>\r\n  <strong>Màu sắc:</strong> Xanh\r\n</p>\r\n\r\n<p>\r\n  LAPTOP ASUS ZENBOOK UP3404VA-KN039W là một chiếc laptop cao cấp với cấu hình mạnh mẽ, màn hình OLED cảm ứng và nhiều tính năng tiện ích.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình OLED 14-inch cảm ứng</strong><br>\r\n  Laptop này được trang bị màn hình OLED 14-inch cảm ứng, mang đến trải nghiệm sử dụng độc đáo và linh hoạt. Độ phân giải cao và công nghệ cảm ứng cho phép bạn tận hưởng hình ảnh sắc nét và tương tác mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất đỉnh cao</strong><br>\r\n  Với bộ vi xử lý Intel Core i7-1360P và bộ nhớ RAM 16GB, laptop đảm bảo xử lý nhanh chóng mọi tác vụ, từ công việc đến giải trí đa phương tiện. Ổ cứng SSD dung lượng 512GB cung cấp không gian lưu trữ lớn và tốc độ truy xuất dữ liệu nhanh chóng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Tính năng tiện ích</strong><br>\r\n  LAPTOP ASUS ZENBOOK UP3404VA-KN039W đi kèm với bút cảm ứng, cáp, và túi, tạo điều kiện thuận lợi cho việc sáng tạo và di chuyển. Bàn phím được thiết kế tinh tế, kết hợp với màu sắc xanh sang trọng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẳng cấp</strong><br>\r\n  Thiết kế mảnh mai và đẳng cấp của LAPTOP ASUS ZENBOOK UP3404VA-KN039W làm nổi bật sự lịch lãm và chuyên nghiệp, phản ánh sự sang trọng trong công việc và giải trí hàng ngày.\r\n</p>\r\n', 0, NULL, 1),
(49, 'LAPTOP MSI GAMING BRAVO 15 (B7ED-010VN) (R5-7535HS/16GB RAM/512GB SSD/RX6550M 4GB/15.6 INCH FHD 144HZ/WIN 11/ĐEN) (2023)', 'msi01.jpg', 17299000.00, 35, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> AMD Ryzen 5-7535HS<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Card đồ họa:</strong> AMD Radeon RX6550M 4GB<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD 144Hz<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Đen<br>\r\n  <strong>Năm sản xuất:</strong> 2023\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP MSI GAMING BRAVO 15 (B7ED-010VN)</strong> là chiếc laptop gaming mạnh mẽ, được thiết kế đặc biệt để đáp ứng nhu cầu của các game thủ và người dùng đòi hỏi hiệu suất cao.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất đỉnh cao</strong><br>\r\n  Với bộ vi xử lý AMD Ryzen 5-7535HS và bộ nhớ RAM 16GB, laptop này cung cấp hiệu suất mạnh mẽ để chơi các tựa game đòi hỏi nhiều tài nguyên và thực hiện các công việc đa nhiệm mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình chất lượng</strong><br>\r\n  Màn hình 15.6 inch FHD với tần số làm mới 144Hz mang lại trải nghiệm chơi game mượt mà và hình ảnh sắc nét. Điều này làm cho mọi chi tiết trên màn hình trở nên sống động và đầy ấn tượng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Card đồ họa mạnh mẽ</strong><br>\r\n  Được trang bị card đồ họa AMD Radeon RX6550M 4GB, BRAVO 15 đảm bảo đồ họa chất lượng cao và hiệu suất ổn định trong các trò chơi đồ họa nặng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD tốc độ cao</strong><br>\r\n  Với ổ cứng SSD dung lượng 512GB, laptop giúp giảm thời gian tải và khởi động ứng dụng, mang lại trải nghiệm sử dụng mượt mà và nhanh chóng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẹp và sang trọng</strong><br>\r\n  Thiết kế màu đen độc đáo, hiện đại và mạnh mẽ làm nổi bật sự đẳng cấp và phong cách của LAPTOP MSI GAMING BRAVO 15 (B7ED-010VN).\r\n</p>\r\n', 0, NULL, 2),
(50, 'LAPTOP MSI GAMING GF63 THIN (12UCX-841VN) (I5-12450H/8GB RAM/512GB SSD/RTX2050 4GB/15.6 INCH FHD 144HZ IPS/WIN11/ĐEN)', 'msi02.jpg', 16299000.00, 0, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i5-12450H<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD 144Hz IPS<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA® GeForce RTX™ 2050 4GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Đen\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP MSI GAMING GF63 THIN (12UCX-841VN)</strong> là chiếc laptop gaming mỏng nhẹ nhưng vẫn đảm bảo hiệu suất ổn định và trải nghiệm chơi game mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 15.6 inch FHD 144Hz IPS</strong><br>\r\n  Laptop này được trang bị màn hình 15.6 inch FHD với tần số làm mới 144Hz và công nghệ IPS, mang lại hình ảnh sắc nét và góc nhìn rộng. Điều này tạo ra trải nghiệm chơi game mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất ổn định</strong><br>\r\n  Với bộ vi xử lý Intel Core i5-12450H và bộ nhớ RAM 8GB, laptop đảm bảo khả năng xử lý đủ mạnh mẽ cho các tác vụ đa nhiệm và chơi game.\r\n</p>\r\n\r\n<p>\r\n  <strong>Card đồ họa NVIDIA® GeForce RTX™ 2050 4GB</strong><br>\r\n  Được trang bị card đồ họa NVIDIA® GeForce RTX™ 2050 4GB, GF63 THIN cung cấp hiệu suất đồ họa tốt và hỗ trợ các công nghệ tiên tiến như ray tracing.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải và khởi động ứng dụng, mang lại trải nghiệm sử dụng nhanh chóng và mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẹp và tiện ích</strong><br>\r\n  Thiết kế đen mạnh mẽ, mỏng nhẹ và cổng kết nối đa dạng làm cho MSI GF63 THIN trở thành sự lựa chọn hoàn hảo cho người chơi di động.\r\n</p>\r\n', 20, '2023-11-30', 2),
(51, 'LAPTOP LENOVO LEGION 5 15IAH7 (82RC008RVN) (I5 12500H/16GB RAM/512GB SSD/15.6 FHD 165HZ/RTX 3050 4GB/WIN11/XÁM)', 'lenovo01.jpg', 27999000.00, 30, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel® Core™ i5-12500H<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD 165Hz<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA® GeForce RTX™ 3050 4GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Xám\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP LENOVO LEGION 5 15IAH7 (82RC008RVN)</strong> là chiếc laptop gaming với hiệu suất mạnh mẽ, màn hình tần số làm mới cao và thiết kế đẹp mắt.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 15.6 inch FHD 165Hz:</strong><br>\r\n  Laptop này được trang bị màn hình 15.6 inch FHD với tần số làm mới 165Hz, mang lại trải nghiệm chơi game mượt mà và hình ảnh sắc nét.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất đỉnh cao:</strong><br>\r\n  Với bộ vi xử lý Intel Core i5-12500H và bộ nhớ RAM 16GB, laptop đảm bảo khả năng xử lý mạnh mẽ cho các ứng dụng đòi hỏi nhiều tài nguyên và game hiện đại.\r\n</p>\r\n\r\n<p>\r\n  <strong>Card đồ họa NVIDIA® GeForce RTX™ 3050 4GB:</strong><br>\r\n  Được trang bị card đồ họa NVIDIA® GeForce RTX™ 3050 4GB, LEGION 5 15IAH7 cung cấp hiệu suất đồ họa tốt và hỗ trợ các công nghệ tiên tiến như ray tracing.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải và khởi động ứng dụng, mang lại trải nghiệm sử dụng nhanh chóng và mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẹp và tiện ích:</strong><br>\r\n  Thiết kế màu xám sang trọng và logo Legion nổi bật, LEGION 5 15IAH7 không chỉ mạnh mẽ mà còn ấn tượng với người dùng bởi tính thẩm mỹ và tiện ích.\r\n</p>\r\n', 0, NULL, 4),
(53, 'LAPTOP LENOVO IDEAPAD SLIM 5 LIGHT 14ABR8 (82XS0006VN) (R5 7530U/8GB RAM/512GB SSD/14 FHD/WIN11/XÁM)', 'lenovo02.jpg', 14799000.00, 60, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> AMD Ryzen 5 7530U<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 14 inch FHD<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Xám\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP LENOVO IDEAPAD SLIM 5 LIGHT 14ABR8 (82XS0006VN)</strong> là chiếc laptop siêu nhẹ, siêu mỏng với hiệu suất ổn định và thiết kế đẹp mắt.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 14 inch FHD:</strong><br>\r\n  Laptop này được trang bị màn hình 14 inch FHD, mang lại trải nghiệm xem hình ảnh và làm việc mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất ổn định:</strong><br>\r\n  Với CPU AMD Ryzen 5 7530U và bộ nhớ RAM 8GB, laptop đáp ứng tốt cho các nhiệm vụ hàng ngày và đồng thời tiết kiệm năng lượng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian khởi động và tải ứng dụng, cung cấp không gian lưu trữ đủ cho dữ liệu cá nhân và công việc.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế siêu mỏng và siêu nhẹ:</strong><br>\r\n  Với thiết kế thanh lịch, màu xám sang trọng, IDEAPAD SLIM 5 LIGHT là sự lựa chọn hoàn hảo cho những người di chuyển nhiều và đặc biệt chú trọng đến trải nghiệm di động.\r\n</p>\r\n', 0, NULL, 4),
(54, 'LAPTOP ACER GAMING NITRO 16 PHOENIX AN16-41-R50Z (NH.QLKSV.001) (R5 7640HS/8GB RAM/512GB SSD/RTX4050 6G/16 INCH FHD 165HZ/WIN 11/ĐEN) (2023)\r\n', 'acer01.jpg', 27999000.00, 25, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> AMD Ryzen 5 7640HS<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA® GeForce RTX™ 4050 6GB<br>\r\n  <strong>Màn hình:</strong> 16 inch FHD 165Hz<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Đen\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ACER GAMING NITRO 16 PHOENIX AN16-41-R50Z (NH.QLKSV.001)</strong> là một chiếc laptop gaming mạnh mẽ với hiệu suất cao và màn hình lớn độ phân giải cao.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 16 inch FHD 165Hz:</strong><br>\r\n  Laptop này được trang bị màn hình 16 inch FHD với tần số làm mới 165Hz, mang lại trải nghiệm chơi game mượt mà và hình ảnh sắc nét.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất mạnh mẽ:</strong><br>\r\n  Với CPU AMD Ryzen 5 7640HS và bộ nhớ RAM 8GB, laptop đáp ứng mạnh mẽ cho các ứng dụng đòi hỏi nhiều tài nguyên và game hiện đại.\r\n</p>\r\n\r\n<p>\r\n  <strong>Card đồ họa NVIDIA® GeForce RTX™ 4050 6GB:</strong><br>\r\n  Được trang bị card đồ họa NVIDIA® GeForce RTX™ 4050 6GB, NITRO 16 PHOENIX cung cấp hiệu suất đồ họa tốt và hỗ trợ các công nghệ tiên tiến như ray tracing.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải và khởi động ứng dụng, mang lại trải nghiệm sử dụng nhanh chóng và mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang đến trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới, tối ưu hóa hiệu suất và bảo mật.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẹp và chất lượng:</strong><br>\r\n  Thiết kế màu đen lịch lãm và logo Nitro nổi bật, NITRO 16 PHOENIX không chỉ mạnh mẽ mà còn thu hút với người dùng bởi thiết kế chất lượng.\r\n</p>\r\n', 0, NULL, 3),
(56, 'LAPTOP ACER GAMING ASPIRE 7 A715-76G-59MW (NH.QMYSV.001) (I5 12450H/8GB RAM/512GB SSD/RTX2050 4G/15.6 INCH FHD//WIN11/ĐEN/VỎ NHÔM) (2023)\r\n', 'acer02.jpg', 18299000.00, 129, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel Core i5-12450H<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA® GeForce RTX™ 2050 4GB<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Đen\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ACER GAMING ASPIRE 7 A715-76G-59MW (NH.QMYSV.001)</strong> là chiếc laptop gaming với hiệu suất ổn định và thiết kế chất lượng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 15.6 inch FHD:</strong><br>\r\n  Laptop này được trang bị màn hình 15.6 inch FHD, mang lại trải nghiệm xem hình ảnh và chơi game sắc nét.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất ổn định:</strong><br>\r\n  Với CPU Intel Core i5-12450H và bộ nhớ RAM 8GB, laptop đảm bảo hiệu suất mạnh mẽ cho các ứng dụng đa nhiệm và game hiện đại.\r\n</p>\r\n\r\n<p>\r\n  <strong>Card đồ họa NVIDIA® GeForce RTX™ 2050 4GB:</strong><br>\r\n  Được trang bị card đồ họa NVIDIA® GeForce RTX™ 2050 4GB, ASPIRE 7 A715-76G-59MW cung cấp hiệu suất đồ họa tốt và hỗ trợ các công nghệ tiên tiến như ray tracing.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải và khởi động ứng dụng, cung cấp không gian lưu trữ đủ cho dữ liệu cá nhân và công việc.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẹp và chất lượng:</strong><br>\r\n  Với vỏ nhôm chắc chắn và màu đen lịch lãm, ASPIRE 7 A715-76G-59MW không chỉ đẹp mắt mà còn đảm bảo sự bền bỉ và chất lượng cao.\r\n</p>\r\n', 0, NULL, 3),
(57, 'LAPTOP DELL VOSTRO 16 5630 (V5630-I5U165W11GRU) (I5 1335U 16GB RAM/512GB SSD/16.0 INCH FHD+/ WIN11/OFFICE HS21/XÁM/VỎ NHÔM)\r\n', 'dell01.jpg', 23699000.00, 20, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel Core i5-1335U<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 16.0 inch FHD+<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Phần mềm:</strong> Microsoft Office Home & Student 2021<br>\r\n  <strong>Màu sắc:</strong> Xám<br>\r\n  <strong>Vỏ máy:</strong> Nhôm\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP DELL VOSTRO 16 5630 (V5630-I5U165W11GRU)</strong> là chiếc laptop đa nhiệm mạnh mẽ với cấu hình cao và thiết kế chất lượng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 16.0 inch FHD+:</strong><br>\r\n  Laptop này được trang bị màn hình 16.0 inch FHD+, mang lại trải nghiệm xem hình ảnh và làm việc mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất đa nhiệm mạnh mẽ:</strong><br>\r\n  Với CPU Intel Core i5-1335U và bộ nhớ RAM 16GB, laptop đảm bảo hiệu suất cao cho các công việc đa nhiệm và ứng dụng đòi hỏi tài nguyên cao.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải ứng dụng và khởi động máy, cung cấp không gian lưu trữ đủ cho dữ liệu cá nhân và công việc.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Microsoft Office Home & Student 2021:</strong><br>\r\n  Bản quyền phần mềm Office Home & Student 2021 giúp bạn thực hiện công việc văn phòng một cách hiệu quả.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế chất lượng với vỏ nhôm:</strong><br>\r\n  Với vỏ máy làm từ nhôm, VOSTRO 16 5630 không chỉ đẹp mắt mà còn đảm bảo độ bền và chất lượng trong sử dụng hàng ngày.\r\n</p>\r\n', 0, NULL, 5),
(58, 'LAPTOP DELL INSPIRON 14 7430 2 IN 1 (N7430I58W1) (I5 1335U/8GB RAM/512GB SSD/14.0 INCH FHD+ /CẢM ỨNG/BÚT/WIN11/OFFICE HS21/BẠC)\r\n', 'dell02.jpg', 21999000.00, 35, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel Core i5-1335U<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 14.0 inch FHD+ Cảm ứng<br>\r\n  <strong>Chức năng đặc biệt:</strong> 2 in 1, Bút cảm ứng<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Phần mềm:</strong> Microsoft Office Home & Student 2021<br>\r\n  <strong>Màu sắc:</strong> Bạc\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP DELL INSPIRON 14 7430 2 IN 1 (N7430I58W1)</strong> là chiếc laptop đa năng với thiết kế 2 trong 1, màn hình cảm ứng và bút cảm ứng, phù hợp cho công việc sáng tạo và giải trí.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 14.0 inch FHD+ Cảm ứng:</strong><br>\r\n  Laptop này được trang bị màn hình 14.0 inch FHD+ cảm ứng, giúp bạn tận hưởng trải nghiệm sử dụng linh hoạt và tiện lợi.\r\n</p>\r\n\r\n<p>\r\n  <strong>Chức năng đặc biệt 2 in 1:</strong><br>\r\n  Thiết kế 2 trong 1 giúp bạn sử dụng máy như một chiếc laptop truyền thống hoặc biến nó thành một máy tính bảng linh hoạt theo nhu cầu của bạn.\r\n</p>\r\n\r\n<p>\r\n  <strong>Bút cảm ứng:</strong><br>\r\n  Bút cảm ứng đi kèm giúp bạn tận dụng tối đa tính năng cảm ứng và thực hiện công việc sáng tạo một cách tự nhiên.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất ổn định:</strong><br>\r\n  Với CPU Intel Core i5-1335U và bộ nhớ RAM 8GB, laptop đáp ứng tốt cho các tác vụ đa nhiệm và ứng dụng đòi hỏi tài nguyên.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải ứng dụng và khởi động máy, cung cấp không gian lưu trữ đủ cho dữ liệu và tài liệu cá nhân.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Microsoft Office Home & Student 2021:</strong><br>\r\n  Bản quyền phần mềm Office Home & Student 2021 giúp bạn thực hiện công việc văn phòng một cách hiệu quả.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế màu bạc sang trọng:</strong><br>\r\n  Với màu sắc bạc lịch lãm, INSPIRON 14 7430 2 IN 1 không chỉ mạnh mẽ mà còn mang đến sự sang trọng khi sử dụng.\r\n</p>\r\n', 0, NULL, 5),
(59, 'LAPTOP MSI MODERN 15 (B13M-297VN) (I7 1355U/16GB RAM/512GB SSD/15.6 INCH FHD/WIN11/ĐEN)\r\n', 'msi03.png', 19999000.00, 40, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel Core i7-1355U<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Đen\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP MSI MODERN 15 (B13M-297VN)</strong> là chiếc laptop đa nhiệm với cấu hình mạnh mẽ, màn hình lớn và thiết kế đẹp mắt.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 15.6 inch FHD:</strong><br>\r\n  Laptop này được trang bị màn hình 15.6 inch FHD, mang lại trải nghiệm xem hình ảnh và làm việc mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất mạnh mẽ:</strong><br>\r\n  Với CPU Intel Core i7-1355U và bộ nhớ RAM 16GB, laptop đáp ứng mạnh mẽ cho các tác vụ đa nhiệm và ứng dụng đòi hỏi tài nguyên cao.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải ứng dụng và khởi động máy, cung cấp không gian lưu trữ đủ cho dữ liệu và tài liệu cá nhân.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế đẹp mắt:</strong><br>\r\n  Với thiết kế màu đen tinh tế, MSI MODERN 15 (B13M-297VN) không chỉ là một công cụ làm việc mạnh mẽ mà còn là biểu tượng của phong cách và thẩm mỹ.\r\n</p>\r\n', 0, NULL, 2),
(60, 'LAPTOP MSI GAMING KATANA GF66 (12UCK-804VN) (I7 12650H 8GB RAM/512GB SSD/RTX3050 4G/15.6 INCH FHD 144HZ/WIN11/ĐEN)\r\n', 'msi04.png', 22999000.00, 0, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel Core i7-12650H<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA GeForce RTX 3050 4GB<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD 144Hz<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Đen\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP MSI GAMING KATANA GF66 (12UCK-804VN)</strong> là chiếc laptop gaming mạnh mẽ với cấu hình hiệu suất cao và màn hình tần số làm mới cao.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 15.6 inch FHD 144Hz:</strong><br>\r\n  Laptop này được trang bị màn hình 15.6 inch FHD với tần số làm mới 144Hz, mang lại trải nghiệm chơi game mượt mà và hình ảnh sắc nét.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất gaming đỉnh cao:</strong><br>\r\n  Với CPU Intel Core i7-12650H và bộ nhớ RAM 8GB, cùng với card đồ họa NVIDIA GeForce RTX 3050 4GB, laptop này đảm bảo hiệu suất gaming đỉnh cao và hỗ trợ các công nghệ tiên tiến như ray tracing.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải game và khởi động máy, mang lại trải nghiệm gaming mượt mà và nhanh chóng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màu sắc đen nổi bật:</strong><br>\r\n  Với thiết kế màu đen tinh tế, MSI GAMING KATANA GF66 không chỉ là một công cụ chơi game mạnh mẽ mà còn là biểu tượng của phong cách và sự sang trọng.\r\n</p>\r\n', 0, NULL, 2),
(61, 'LAPTOP LENOVO LEGION 5 PRO 16IAH7H (82RF0043VN) (I7 12700H/16GB RAM/512GB SSD/16 WQXGA 165HZ/RTX 3060 6G/WIN11/XÁM)\r\n', 'lenovo03.jpg', 34999000.00, 25, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel Core i7-12700H<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 16 inch WQXGA 165Hz<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA GeForce RTX 3060 6GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Xám\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP LENOVO LEGION 5 PRO 16IAH7H (82RF0043VN)</strong> là chiếc laptop gaming cao cấp với cấu hình mạnh mẽ, màn hình lớn và card đồ họa NVIDIA GeForce RTX 3060.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 16 inch WQXGA 165Hz:</strong><br>\r\n  Laptop này được trang bị màn hình lớn 16 inch với độ phân giải WQXGA và tần số làm mới 165Hz, mang lại trải nghiệm chơi game và làm việc vô cùng mượt mà và chất lượng hình ảnh sắc nét.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất gaming đỉnh cao:</strong><br>\r\n  Với CPU Intel Core i7-12700H và bộ nhớ RAM 16GB, cùng với card đồ họa NVIDIA GeForce RTX 3060 6GB, laptop này đáp ứng mạnh mẽ cho các tựa game hiện đại và ứng dụng đồ họa đ demanding.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải game và khởi động máy, mang lại trải nghiệm gaming mượt mà và nhanh chóng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế màu sắc Xám sang trọng:</strong><br>\r\n  Với thiết kế màu sắc Xám, LEGION 5 PRO 16IAH7H không chỉ là một chiếc laptop gaming mạnh mẽ mà còn là biểu tượng của phong cách và đẳng cấp.\r\n</p>\r\n', 5, '2023-11-29', 4),
(62, 'LAPTOP LENOVO IDEAPAD GAMING 3 15ARH7 (82SB00BBVN) (R5 6600H/16GB RAM/512GB SSD/15.6 FHD 120HZ/RTX 3050 4GB/WIN11/XÁM)\r\n', 'lenovo04.jpg', 17999000.00, 30, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> AMD Ryzen 5 6600H<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 15.6 inch FHD 120Hz<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA GeForce RTX 3050 4GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Xám\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP LENOVO IDEAPAD GAMING 3 15ARH7 (82SB00BBVN)</strong> là chiếc laptop gaming với cấu hình mạnh mẽ, màn hình tần số làm mới cao và card đồ họa NVIDIA GeForce RTX 3050.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 15.6 inch FHD 120Hz:</strong><br>\r\n  Laptop này được trang bị màn hình 15.6 inch FHD với tần số làm mới 120Hz, mang lại trải nghiệm chơi game mượt mà và hình ảnh sắc nét.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất gaming ổn định:</strong><br>\r\n  Với CPU AMD Ryzen 5 6600H và bộ nhớ RAM 16GB, cùng với card đồ họa NVIDIA GeForce RTX 3050 4GB, laptop này đáp ứng tốt cho nhu cầu gaming và đồ họa cơ bản.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải game và khởi động máy, mang lại trải nghiệm sử dụng nhanh chóng và mượt mà.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế màu sắc Xám thời trang:</strong><br>\r\n  Với màu sắc Xám, IDEAPAD GAMING 3 15ARH7 không chỉ là một chiếc laptop gaming mạnh mẽ mà còn là biểu tượng của phong cách và thời trang.\r\n</p>\r\n', 0, NULL, 4),
(63, 'LAPTOP ASUS GAMING ROG ZEPHYRUS GA401QC-K2199W (R7 5800HS/8GB RAM/512GB SSD/14 WQHD/RTX 3050 4GB/WIN11/TÚI/XÁM)\r\n', 'asus07.jpg', 24999000.00, 37, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> AMD Ryzen 7 5800HS<br>\r\n  <strong>RAM:</strong> 8GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 14 inch WQHD<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA GeForce RTX 3050 4GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Xám\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ASUS GAMING ROG ZEPHYRUS GA401QC-K2199W</strong> là chiếc laptop gaming mỏng nhẹ với cấu hình mạnh mẽ, màn hình chất lượng cao và card đồ họa NVIDIA GeForce RTX 3050.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 14 inch WQHD:</strong><br>\r\n  Laptop này được trang bị màn hình 14 inch WQHD, mang lại trải nghiệm xem hình ảnh sắc nét và chi tiết.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất gaming mạnh mẽ:</strong><br>\r\n  Với CPU AMD Ryzen 7 5800HS và bộ nhớ RAM 8GB, cùng với card đồ họa NVIDIA GeForce RTX 3050 4GB, laptop này đáp ứng tốt cho các tựa game hiện đại và công việc đòi hỏi đồ họa.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải game và khởi động máy, cung cấp không gian lưu trữ đủ cho dữ liệu và ứng dụng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế màu sắc Xám sang trọng:</strong><br>\r\n  Với màu sắc Xám và thiết kế mỏng nhẹ, ROG ZEPHYRUS GA401QC-K2199W không chỉ là một chiếc laptop gaming mạnh mẽ mà còn là biểu tượng của sự tiện ích và sang trọng.\r\n</p>\r\n', 0, NULL, 1),
(64, 'LAPTOP LENOVO IDEAPAD SLIM 5 PRO 16ARH7 (82SN003GVN) (R7 6800HS/16GB RAM/512GB SSD/16\" WQXGA/RTX 3050TI 4GB/WIN11/XÁM)\r\n', 'lenovo05.jpg', 24999000.00, 5, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> AMD Ryzen 7 6800HS<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 512GB SSD<br>\r\n  <strong>Màn hình:</strong> 16 inch WQXGA<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA GeForce RTX 3050Ti 4GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Màu sắc:</strong> Xám\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP LENOVO IDEAPAD SLIM 5 PRO 16ARH7 (82SN003GVN)</strong> là chiếc laptop mỏng nhẹ với cấu hình mạnh mẽ, màn hình lớn và card đồ họa NVIDIA GeForce RTX 3050Ti.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 16 inch WQXGA:</strong><br>\r\n  Laptop này được trang bị màn hình lớn 16 inch với độ phân giải WQXGA, mang lại trải nghiệm xem hình ảnh và làm việc đa nhiệm đỉnh cao.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất gaming và đa nhiệm mạnh mẽ:</strong><br>\r\n  Với CPU AMD Ryzen 7 6800HS và bộ nhớ RAM 16GB, cùng với card đồ họa NVIDIA GeForce RTX 3050Ti 4GB, laptop này đáp ứng tốt cho nhu cầu gaming và đa nhiệm nặng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 512GB giúp giảm thời gian tải ứng dụng và khởi động máy, cung cấp không gian lưu trữ đủ cho dữ liệu và tệp tin cá nhân.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Thiết kế màu sắc Xám sang trọng:</strong><br>\r\n  Với màu sắc Xám và thiết kế mỏng nhẹ, IDEAPAD SLIM 5 PRO 16ARH7 không chỉ là một chiếc laptop mạnh mẽ mà còn là biểu tượng của sự tiện ích và sang trọng.\r\n</p>\r\n', 5, '2023-11-29', 4),
(65, 'LAPTOP ASUS GAMING ROG FLOW X16 GV601VV-NL016W (I9 13900H/16GB RAM/1TB SSD/16 WQXGA 240HZ/RTX 4060 8GB/WIN11/BALO/ĐEN)', 'asus08.jpg', 59.00, 24, '', 10, '2023-12-02', 1),
(66, 'LAPTOP ASUS GAMING ROG FLOW X16 GV601VV-NL016W (I9 13900H/16GB RAM/1TB SSD/16 WQXGA 240HZ/RTX 4060 8GB/WIN11/BALO/ĐEN)', 'asus08.jpg', 59.00, 24, '<p>\r\n  <strong>Thông số sản phẩm:</strong><br>\r\n  <strong>CPU:</strong> Intel Core i9-13900H<br>\r\n  <strong>RAM:</strong> 16GB RAM<br>\r\n  <strong>Ổ cứng:</strong> 1TB SSD<br>\r\n  <strong>Màn hình:</strong> 16 inch WQXGA 240Hz<br>\r\n  <strong>Card đồ họa:</strong> NVIDIA GeForce RTX 4060 8GB<br>\r\n  <strong>Hệ điều hành:</strong> Windows 11<br>\r\n  <strong>Phụ kiện kèm theo:</strong> Balo đen\r\n</p>\r\n\r\n<p>\r\n  <strong>LAPTOP ASUS GAMING ROG FLOW X16 GV601VV-NL016W</strong> là chiếc laptop gaming cao cấp với cấu hình mạnh mẽ, màn hình chất lượng cao và card đồ họa NVIDIA GeForce RTX 4060.\r\n</p>\r\n\r\n<p>\r\n  <strong>Màn hình 16 inch WQXGA 240Hz:</strong><br>\r\n  Laptop này được trang bị màn hình 16 inch WQXGA với tần số làm mới 240Hz, mang lại trải nghiệm chơi game mượt mà và hình ảnh sắc nét.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hiệu suất gaming và đa nhiệm đỉnh cao:</strong><br>\r\n  Với CPU Intel Core i9-13900H và bộ nhớ RAM 16GB, cùng với card đồ họa NVIDIA GeForce RTX 4060 8GB, laptop này đáp ứng tốt cho nhu cầu gaming và đa nhiệm nặng.\r\n</p>\r\n\r\n<p>\r\n  <strong>Ổ cứng SSD dung lượng lớn:</strong><br>\r\n  Ổ cứng SSD dung lượng 1TB giúp giảm thời gian tải ứng dụng và khởi động máy, cung cấp không gian lưu trữ đủ cho dữ liệu và tệp tin cá nhân.\r\n</p>\r\n\r\n<p>\r\n  <strong>Hệ điều hành Windows 11:</strong><br>\r\n  Máy đã được cài đặt sẵn hệ điều hành Windows 11, mang lại trải nghiệm người dùng hiện đại và tích hợp nhiều tính năng mới.\r\n</p>\r\n\r\n<p>\r\n  <strong>Phụ kiện kèm theo Balo đen:</strong><br>\r\n  Laptop được kèm theo balo đen tiện lợi, giúp bảo vệ và di chuyển máy một cách thuận tiện.\r\n</p>\r\n', 10, '2023-12-02', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`maCTDH`),
  ADD KEY `maSanPham` (`maSanPham`),
  ADD KEY `chitietdonhang_ibfk_1` (`maDonHang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `thanhTienNguoiDung` (`maNguoiDung`) USING BTREE;

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`maNguoiDung`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `sanpham_phanloai` (`maLoai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `maCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `maNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`maDonHang`) REFERENCES `donhang` (`maDonHang`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`maNguoiDung`) REFERENCES `nguoidung` (`maNguoiDung`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_phanloai` FOREIGN KEY (`maLoai`) REFERENCES `phanloai` (`maLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
