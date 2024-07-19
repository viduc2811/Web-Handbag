-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 16, 2024 lúc 07:01 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoptuixach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`cart_id`, `customer_id`, `product_id`, `product_quantity`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, 700000, NULL, NULL),
(2, 2, 1, 5, 360000, NULL, NULL),
(3, 3, 4, 3, 400000, NULL, NULL),
(4, 4, 4, 1, 400000, NULL, NULL),
(5, 5, 4, 1, 400000, NULL, NULL),
(6, 5, 5, 1, 870000, NULL, NULL),
(7, 6, 4, 1, 400000, NULL, NULL),
(8, 7, 3, 1, 555000, NULL, NULL),
(9, 8, 4, 5, 400000, NULL, NULL),
(10, 8, 6, 2, 700000, NULL, NULL),
(11, 9, 1, 44, 360000, NULL, NULL),
(12, 10, 4, 1, 400000, NULL, NULL),
(13, 11, 5, 9, 870000, NULL, NULL),
(14, 12, 6, 1, 700000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc28@gmail.com', 'Đẹp', '2024-07-06 18:20:50', '2024-07-06 18:20:50'),
(2, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc28@gmail.com', 'A', '2024-07-06 18:40:27', '2024-07-06 18:40:27'),
(3, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc28112002@gmail.com', 'abc', '2024-07-08 06:35:58', '2024-07-08 06:35:58'),
(4, 'Dũng', '0369765488', 'Long Bien', 'viduc123@gmail.com', 'ABC', '2024-07-09 11:36:58', '2024-07-09 11:36:58'),
(5, 'Tú Anh', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'A', '2024-07-09 11:47:33', '2024-07-09 11:47:33'),
(6, 'Dũng', '0369765488', '19, HoangMai', 'viduc28112002@gmail.com', NULL, '2024-07-09 11:54:11', '2024-07-09 11:54:11'),
(7, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'AAA', '2024-07-09 13:30:18', '2024-07-09 13:30:18'),
(8, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'abc', '2024-07-09 13:33:01', '2024-07-09 13:33:01'),
(9, 'Vi Đức', '0369765488', '14, YenSo', 'viduc123@gmail.com', 'aaa', '2024-07-09 13:35:30', '2024-07-09 13:35:30'),
(10, 'Tú Anh', '0369765488', '19, HoangMai', 'viduc123@gmail.com', NULL, '2024-07-11 04:52:51', '2024-07-11 04:52:51'),
(11, 'Phạm Hân', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'Gửi cho tôi vào buổi sáng', '2024-07-16 03:46:06', '2024-07-16 03:46:06'),
(12, 'Túi xách em gái', '0369765488', 'Cau Giay', 'viduc123@gmail.com', NULL, '2024-07-16 03:51:41', '2024-07-16 03:51:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `menu_description` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `slug`, `menu_description`, `parent_id`, `created_at`, `updated_at`) VALUES
(29, 'Balo', 'balo', '', 0, '2024-07-06 16:37:27', '2024-07-06 16:37:27'),
(30, 'Túi xách', 'tui-xach', '', 0, '2024-07-06 16:37:50', '2024-07-06 16:37:50'),
(31, 'Túi đeo chéo', 'tui-deo-cheo', '', 0, '2024-07-06 16:38:12', '2024-07-06 16:38:12'),
(32, 'Túi da thật', 'tui-da-that', '', 0, '2024-07-06 16:38:28', '2024-07-06 16:38:28'),
(33, 'Túi đeo vai', 'tui-deo-vai', '', 0, '2024-07-06 16:38:39', '2024-07-06 16:38:39'),
(36, 'Túi xách lớn', 'tui-deo-lon', '', 0, '2024-07-06 16:42:12', '2024-07-08 19:10:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_27_161553_create_menus_table', 2),
(6, '2024_06_02_185533_create_menus_table', 3),
(7, '2024_06_14_113000_create_products_table', 4),
(8, '2024_06_14_120225_create_products_table', 5),
(9, '2024_06_15_010549_create_sliders_table', 6),
(10, '2024_06_20_002710_alter_table_products', 7),
(11, '2024_06_25_174550_create_customers_table', 8),
(12, '2024_06_25_174859_create_carts_table', 9),
(13, '2024_07_02_022300_create_clients_table', 10),
(14, '2024_07_04_172718_create_orders_table', 11),
(15, '2024_07_04_173639_create_orders_table', 12),
(16, '2024_07_16_110738_create_order_items_table', 13),
(17, '2024_07_16_111312_create_order_items_table', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `customer_name`, `phone`, `address`, `email`, `content`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc28@gmail.com', 'Đẹp', '700000.00', '2024-07-06 18:20:50', '2024-07-06 18:20:50'),
(2, 2, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc28@gmail.com', 'A', '1800000.00', '2024-07-06 18:40:27', '2024-07-06 18:40:27'),
(3, 3, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc28112002@gmail.com', 'abc', '1200000.00', '2024-07-08 06:35:58', '2024-07-08 06:35:58'),
(4, 4, 'Dũng', '0369765488', 'Long Bien', 'viduc123@gmail.com', 'ABC', '400000.00', '2024-07-09 11:36:58', '2024-07-09 11:36:58'),
(5, 5, 'Tú Anh', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'A', '1270000.00', '2024-07-09 11:47:33', '2024-07-09 11:47:33'),
(6, 6, 'Dũng', '0369765488', '19, HoangMai', 'viduc28112002@gmail.com', NULL, '400000.00', '2024-07-09 11:54:11', '2024-07-09 11:54:11'),
(7, 7, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'AAA', '555000.00', '2024-07-09 13:30:18', '2024-07-09 13:30:18'),
(8, 8, 'Vi Đức', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'abc', '3400000.00', '2024-07-09 13:33:01', '2024-07-09 13:33:01'),
(9, 9, 'Vi Đức', '0369765488', '14, YenSo', 'viduc123@gmail.com', 'aaa', '15840000.00', '2024-07-09 13:35:30', '2024-07-09 13:35:30'),
(10, 10, 'Tú Anh', '0369765488', '19, HoangMai', 'viduc123@gmail.com', NULL, '400000.00', '2024-07-11 04:52:51', '2024-07-11 04:52:51'),
(11, 11, 'Phạm Hân', '0369765488', '19, HoangMai', 'viduc123@gmail.com', 'Gửi cho tôi vào buổi sáng', '7830000.00', '2024-07-16 03:46:06', '2024-07-16 03:46:06'),
(12, 12, 'Túi xách em gái', '0369765488', 'Cau Giay', 'viduc123@gmail.com', NULL, '700000.00', '2024-07-16 03:51:41', '2024-07-16 03:51:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_content` longtext DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `product_price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_content`, `menu_id`, `thumb`, `product_price`, `price_sale`, `active`, `created_at`, `updated_at`, `product_quantity`) VALUES
(1, 'Balo phong cách minimalism - BAC 0208 - Màu đen', '<div class=\"item\">M&atilde; sản phẩm: 1011BAC0208</div>\r\n<div class=\"item\">Loại sản phẩm: Balo</div>\r\n<div class=\"item\">K&iacute;ch thước (d&agrave;i x rộng x cao): 29 x 15.5 x 39 cm</div>\r\n<div class=\"item\">Chất liệu: Vải d&ugrave; v&agrave; da nh&acirc;n tạo</div>\r\n<div class=\"item\">Kiểu kh&oacute;a: Kh&oacute;a k&eacute;o</div>\r\n<div class=\"item\">Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi học, đi chơi</div>\r\n<div class=\"item\">Số ngăn: 1 ngăn lớn, 7 ngăn nhỏ</div>\r\n<div class=\"item\">K&iacute;ch cỡ: Lớn</div>\r\n<div class=\"ddict_btn\" style=\"top: 43px; left: 136.75px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>', '<div class=\"title-info active\">Hướng dẫn bảo quản</div>\r\n<div class=\"description\">\r\n<div class=\"list scrollbar\">\r\n<div class=\"item\"><strong>C&aacute;ch 1:</strong>&nbsp;Sử dụng vải cotton trắng, chấm nhẹ một ch&uacute;t v&agrave;o nước tẩy nhẹ. Sau đ&oacute; lau qua vị tr&iacute; cần vệ sinh.</div>\r\n<div class=\"item\"><strong>C&aacute;ch 2:</strong>&nbsp;Sử dụng vải cotton trắng, nh&uacute;ng v&agrave;o nước sạch v&agrave; vắt kh&ocirc;. Sau đ&oacute; nhẹ nh&agrave;ng lau qua vị tr&iacute; cần vệ sinh tr&ecirc;n sản phẩm.</div>\r\n<strong>Đối với chất liệu microfiber</strong>\r\n<div>C&oacute; thể sử dụng b&agrave;n chải l&ocirc;ng mềm v&agrave; chải nhẹ l&ecirc;n bề mặt sản phẩm để vệ sinh.</div>\r\n<div><strong>Đối với chất liệu PC v&agrave; PVC</strong>\r\n<div>Trường hợp sản phẩm bị d&iacute;nh keo,c&oacute; thể d&ugrave;ng cao su sống để ch&ugrave;i sau khi đ&atilde; chấm nhẹ nước tẩy nhẹ l&ecirc;n vị tr&iacute; d&iacute;nh keo.</div>\r\n</div>\r\n<strong>Lưu &yacute;:</strong>\r\n<div>- Kh&ocirc;ng &aacute;p dụng cho chất liệu l&ocirc;ng (*).</div>\r\n<div>- Kh&ocirc;ng giặt t&uacute;i bằng bột giặt, c&aacute;c chất tẩy mạnh.</div>\r\n<div>- Chỉ sử dụng nước hoặc c&aacute;c h&oacute;a chất vệ sinh chuy&ecirc;n dụng.</div>\r\n<div>- Đối với sản phẩm được l&agrave;m từ chất liệu đặc biệt sẽ c&oacute; c&aacute;ch thức vệ sinh ri&ecirc;ng biệt, bạn vui l&ograve;ng li&ecirc;n hệ tổng đ&agrave;i CSKH 1900 6909</div>\r\n<div>- Nhấn ph&iacute;m 1 để được hướng dẫn cụ thể.</div>\r\n</div>\r\n</div>\r\n<div class=\"ddict_btn\" style=\"top: 29px; left: 76.375px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>', 29, '/storage/uploads/2024/07/06/balo-phong-cach-minimalism---bac-0208---mau-den__76841__1719388393-medium.jpg', 400000, 360000, 1, '2024-07-06 09:50:08', '2024-07-09 06:35:30', 1),
(2, 'Balo mini nhấn khóa kéo kim loại - BAC 0209 - Màu đen', '<p>{</p>\r\n<ul>\r\n<li class=\"item\">Loại sản phẩm: Balo</li>\r\n<li class=\"item\">K&iacute;ch thước (d&agrave;i x rộng x cao): 18 x 9.3 x 23 cm</li>\r\n<li class=\"item\">Chất liệu: Da nh&acirc;n tạo</li>\r\n<li class=\"item\">Kiểu kh&oacute;a: Kh&oacute;a k&eacute;o</li>\r\n<li class=\"item\">Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi học, đi chơi</li>\r\n<li class=\"item\">Số ngăn: 1 ngăn lớn, 2 ngăn nhỏ</li>\r\n<li class=\"item\">K&iacute;ch cỡ: Nhỏ</li>\r\n</ul>\r\n<div class=\"ddict_btn\" style=\"top: 13px; left: 1016px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>\r\n<p>}</p>', '<p>{</p>\r\n<div class=\"title-info active\">Hướng dẫn bảo quản</div>\r\n<div class=\"description\">\r\n<div class=\"list scrollbar\">\r\n<div class=\"item\"><strong>C&aacute;ch 1:</strong>&nbsp;Sử dụng vải cotton trắng, chấm nhẹ một ch&uacute;t v&agrave;o nước tẩy nhẹ. Sau đ&oacute; lau qua vị tr&iacute; cần vệ sinh.</div>\r\n<div class=\"item\"><strong>C&aacute;ch 2:</strong>&nbsp;Sử dụng vải cotton trắng, nh&uacute;ng v&agrave;o nước sạch v&agrave; vắt kh&ocirc;. Sau đ&oacute; nhẹ nh&agrave;ng lau qua vị tr&iacute; cần vệ sinh tr&ecirc;n sản phẩm.</div>\r\n<strong>Đối với chất liệu microfiber</strong>\r\n<div>C&oacute; thể sử dụng b&agrave;n chải l&ocirc;ng mềm v&agrave; chải nhẹ l&ecirc;n bề mặt sản phẩm để vệ sinh.</div>\r\n<div><strong>Đối với chất liệu PC v&agrave; PVC</strong>\r\n<div>Trường hợp sản phẩm bị d&iacute;nh keo,c&oacute; thể d&ugrave;ng cao su sống để ch&ugrave;i sau khi đ&atilde; chấm nhẹ nước tẩy nhẹ l&ecirc;n vị tr&iacute; d&iacute;nh keo.</div>\r\n</div>\r\n<strong>Lưu &yacute;:</strong>\r\n<div>- Kh&ocirc;ng &aacute;p dụng cho chất liệu l&ocirc;ng (*).</div>\r\n<div>- Kh&ocirc;ng giặt t&uacute;i bằng bột giặt, c&aacute;c chất tẩy mạnh.</div>\r\n<div>- Chỉ sử dụng nước hoặc c&aacute;c h&oacute;a chất vệ sinh chuy&ecirc;n dụng.</div>\r\n<div>- Đối với sản phẩm được l&agrave;m từ chất liệu đặc biệt sẽ c&oacute; c&aacute;ch thức vệ sinh ri&ecirc;ng biệt, bạn vui l&ograve;ng li&ecirc;n hệ tổng đ&agrave;i CSKH 1900 6909</div>\r\n<div>- Nhấn ph&iacute;m 1 để được hướng dẫn cụ thể.</div>\r\n</div>\r\n</div>\r\n<div class=\"ddict_btn\" style=\"top: 28px; left: 25.6562px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>\r\n<p>}</p>', 29, '/storage/uploads/2024/07/07/balo-phong-cach-minimalism---bac-0208---mau-den__76843__1719388423-medium.jpg', 500000, 450000, 1, '2024-07-06 10:12:45', '2024-07-06 10:12:45', 123),
(3, 'Balo phong cách minimalism - BAC 0208 - Màu be', '<ul>\r\n<li class=\"item\">Loại sản phẩm: Balo</li>\r\n<li class=\"item\">K&iacute;ch thước (d&agrave;i x rộng x cao): 29 x 15.5 x 39 cm</li>\r\n<li class=\"item\">Chất liệu: Vải d&ugrave; v&agrave; da nh&acirc;n tạo</li>\r\n<li class=\"item\">Kiểu kh&oacute;a: Kh&oacute;a k&eacute;o</li>\r\n<li class=\"item\">Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi học, đi chơi</li>\r\n<li class=\"item\">Số ngăn: 1 ngăn lớn, 7 ngăn nhỏ</li>\r\n<li class=\"item\">K&iacute;ch cỡ: Lớn</li>\r\n</ul>\r\n<div class=\"ddict_btn\" style=\"top: -3px; left: 1016px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>', '<div class=\"title-info active\">Hướng dẫn bảo quản</div>\r\n<div class=\"description\">\r\n<div class=\"list scrollbar\">\r\n<div class=\"item\"><strong>C&aacute;ch 1:</strong>&nbsp;Sử dụng vải cotton trắng, chấm nhẹ một ch&uacute;t v&agrave;o nước tẩy nhẹ. Sau đ&oacute; lau qua vị tr&iacute; cần vệ sinh.</div>\r\n<div class=\"item\"><strong>C&aacute;ch 2:</strong>&nbsp;Sử dụng vải cotton trắng, nh&uacute;ng v&agrave;o nước sạch v&agrave; vắt kh&ocirc;. Sau đ&oacute; nhẹ nh&agrave;ng lau qua vị tr&iacute; cần vệ sinh tr&ecirc;n sản phẩm.</div>\r\n<strong>Đối với chất liệu microfiber</strong>\r\n<div>C&oacute; thể sử dụng b&agrave;n chải l&ocirc;ng mềm v&agrave; chải nhẹ l&ecirc;n bề mặt sản phẩm để vệ sinh.</div>\r\n<div><strong>Đối với chất liệu PC v&agrave; PVC</strong>\r\n<div>Trường hợp sản phẩm bị d&iacute;nh keo,c&oacute; thể d&ugrave;ng cao su sống để ch&ugrave;i sau khi đ&atilde; chấm nhẹ nước tẩy nhẹ l&ecirc;n vị tr&iacute; d&iacute;nh keo.</div>\r\n</div>\r\n<strong>Lưu &yacute;:</strong>\r\n<div>- Kh&ocirc;ng &aacute;p dụng cho chất liệu l&ocirc;ng (*).</div>\r\n<div>- Kh&ocirc;ng giặt t&uacute;i bằng bột giặt, c&aacute;c chất tẩy mạnh.</div>\r\n<div>- Chỉ sử dụng nước hoặc c&aacute;c h&oacute;a chất vệ sinh chuy&ecirc;n dụng.</div>\r\n<div>- Đối với sản phẩm được l&agrave;m từ chất liệu đặc biệt sẽ c&oacute; c&aacute;ch thức vệ sinh ri&ecirc;ng biệt, bạn vui l&ograve;ng li&ecirc;n hệ tổng đ&agrave;i CSKH 1900 6909</div>\r\n<div>- Nhấn ph&iacute;m 1 để được hướng dẫn cụ thể.</div>\r\n</div>\r\n</div>', 29, '/storage/uploads/2024/07/07/balo-phong-cach-minimalism---bac-0208---mau-be__76848__1719388639-medium.jpg', 600000, 555000, 1, '2024-07-06 10:15:36', '2024-07-09 06:30:18', 399),
(4, 'Balo vải dù phối da - BAC 0207 - Màu kem', '<ul>\r\n<li class=\"item\">Loại sản phẩm: Balo</li>\r\n<li class=\"item\">K&iacute;ch thước (d&agrave;i x rộng x cao): 27 x 13.6 x 31 cm</li>\r\n<li class=\"item\">Chất liệu: Da nh&acirc;n tạo v&agrave; vải d&ugrave;</li>\r\n<li class=\"item\">Kiểu kh&oacute;a: Kh&oacute;a k&eacute;o</li>\r\n<li class=\"item\">Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi học, đi chơi</li>\r\n<li class=\"item\">Số ngăn: 1 ngăn lớn, 2 ngăn nhỏ</li>\r\n<li class=\"item\">K&iacute;ch cỡ: Trung b&igrave;nh</li>\r\n</ul>\r\n<div class=\"ddict_btn\" style=\"top: 16px; left: 1016px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>', '<div class=\"title-info active\">Hướng dẫn bảo quản</div>\r\n<div class=\"description\">\r\n<div class=\"list scrollbar\">\r\n<div class=\"item\"><strong>C&aacute;ch 1:</strong>&nbsp;Sử dụng vải cotton trắng, chấm nhẹ một ch&uacute;t v&agrave;o nước tẩy nhẹ. Sau đ&oacute; lau qua vị tr&iacute; cần vệ sinh.</div>\r\n<div class=\"item\"><strong>C&aacute;ch 2:</strong>&nbsp;Sử dụng vải cotton trắng, nh&uacute;ng v&agrave;o nước sạch v&agrave; vắt kh&ocirc;. Sau đ&oacute; nhẹ nh&agrave;ng lau qua vị tr&iacute; cần vệ sinh tr&ecirc;n sản phẩm.</div>\r\n<strong>Đối với chất liệu microfiber</strong>\r\n<div>C&oacute; thể sử dụng b&agrave;n chải l&ocirc;ng mềm v&agrave; chải nhẹ l&ecirc;n bề mặt sản phẩm để vệ sinh.</div>\r\n<div><strong>Đối với chất liệu PC v&agrave; PVC</strong>\r\n<div>Trường hợp sản phẩm bị d&iacute;nh keo,c&oacute; thể d&ugrave;ng cao su sống để ch&ugrave;i sau khi đ&atilde; chấm nhẹ nước tẩy nhẹ l&ecirc;n vị tr&iacute; d&iacute;nh keo.</div>\r\n</div>\r\n<strong>Lưu &yacute;:</strong>\r\n<div>- Kh&ocirc;ng &aacute;p dụng cho chất liệu l&ocirc;ng (*).</div>\r\n<div>- Kh&ocirc;ng giặt t&uacute;i bằng bột giặt, c&aacute;c chất tẩy mạnh.</div>\r\n<div>- Chỉ sử dụng nước hoặc c&aacute;c h&oacute;a chất vệ sinh chuy&ecirc;n dụng.</div>\r\n<div>- Đối với sản phẩm được l&agrave;m từ chất liệu đặc biệt sẽ c&oacute; c&aacute;ch thức vệ sinh ri&ecirc;ng biệt, bạn vui l&ograve;ng li&ecirc;n hệ tổng đ&agrave;i CSKH 1900 6909</div>\r\n<div>- Nhấn ph&iacute;m 1 để được hướng dẫn cụ thể.</div>\r\n</div>\r\n</div>', 29, '/storage/uploads/2024/07/07/balo-vai-du-phoi-da---bac-0207---mau-kem__76389__1714616804-medium.jpg', 400000, NULL, 1, '2024-07-06 10:17:02', '2024-07-10 21:52:51', 188),
(5, 'Balo wash màu đa năng - BAC 0206 - Màu xanh rêu', '<div class=\"item\">Loại sản phẩm: Balo</div>\r\n<div class=\"item\">K&iacute;ch thước (d&agrave;i x rộng x cao): 36 x 13.8 x 35.5 cm</div>\r\n<div class=\"item\">Chất liệu: Da nh&acirc;n tạo</div>\r\n<div class=\"item\">Kiểu kh&oacute;a: Kh&oacute;a k&eacute;o</div>\r\n<div class=\"item\">Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi học, đi chơi</div>\r\n<div class=\"item\">Số ngăn: 2 ngăn lớn, 5 ngăn nhỏ</div>\r\n<div class=\"item\">K&iacute;ch cỡ: Lớn</div>', '<div class=\"title-info active\">Hướng dẫn bảo quản</div>\r\n<div class=\"description\">\r\n<div class=\"list scrollbar\">\r\n<div class=\"item\"><strong>C&aacute;ch 1:</strong>&nbsp;Sử dụng vải cotton trắng, chấm nhẹ một ch&uacute;t v&agrave;o nước tẩy nhẹ. Sau đ&oacute; lau qua vị tr&iacute; cần vệ sinh.</div>\r\n<div class=\"item\"><strong>C&aacute;ch 2:</strong>&nbsp;Sử dụng vải cotton trắng, nh&uacute;ng v&agrave;o nước sạch v&agrave; vắt kh&ocirc;. Sau đ&oacute; nhẹ nh&agrave;ng lau qua vị tr&iacute; cần vệ sinh tr&ecirc;n sản phẩm.</div>\r\n<strong>Đối với chất liệu microfiber</strong>\r\n<div>C&oacute; thể sử dụng b&agrave;n chải l&ocirc;ng mềm v&agrave; chải nhẹ l&ecirc;n bề mặt sản phẩm để vệ sinh.</div>\r\n<div><strong>Đối với chất liệu PC v&agrave; PVC</strong>\r\n<div>Trường hợp sản phẩm bị d&iacute;nh keo,c&oacute; thể d&ugrave;ng cao su sống để ch&ugrave;i sau khi đ&atilde; chấm nhẹ nước tẩy nhẹ l&ecirc;n vị tr&iacute; d&iacute;nh keo.</div>\r\n</div>\r\n<strong>Lưu &yacute;:</strong>\r\n<div>- Kh&ocirc;ng &aacute;p dụng cho chất liệu l&ocirc;ng (*).</div>\r\n<div>- Kh&ocirc;ng giặt t&uacute;i bằng bột giặt, c&aacute;c chất tẩy mạnh.</div>\r\n<div>- Chỉ sử dụng nước hoặc c&aacute;c h&oacute;a chất vệ sinh chuy&ecirc;n dụng.</div>\r\n<div>- Đối với sản phẩm được l&agrave;m từ chất liệu đặc biệt sẽ c&oacute; c&aacute;ch thức vệ sinh ri&ecirc;ng biệt, bạn vui l&ograve;ng li&ecirc;n hệ tổng đ&agrave;i CSKH 1900 6909</div>\r\n<div>- Nhấn ph&iacute;m 1 để được hướng dẫn cụ thể.</div>\r\n</div>\r\n</div>', 29, '/storage/uploads/2024/07/07/balo-wash-mau-da-nang---bac-0206---mau-xanh-reu__74862__1709207558-medium.jpg', 900000, 870000, 1, '2024-07-06 10:21:31', '2024-07-16 03:46:06', 390),
(6, 'Túi đeo chéo nhấn khóa bán nguyệt - SHO 0244 - Màu kem', '<div class=\"item\">Loại sản phẩm: T&uacute;i X&aacute;ch Nhỏ</div>\r\n<div class=\"item\">K&iacute;ch thước (d&agrave;i x rộng x cao): 21.7 x 3.7 x 11 cm</div>\r\n<div class=\"item\">Chất liệu: Da nh&acirc;n tạo</div>\r\n<div class=\"item\">Chất liệu d&acirc;y đeo: Da nh&acirc;n tạo kết hợp kim loại</div>\r\n<div class=\"item\">Kiểu kh&oacute;a: Kh&oacute;a nam ch&acirc;m</div>\r\n<div class=\"item\">Số ngăn: 1 ngăn lớn, 2 ngăn nhỏ</div>\r\n<div class=\"item\">K&iacute;ch cỡ: Nhỏ</div>\r\n<div class=\"item\">Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi chơi</div>', '<div class=\"title-info active\">Hướng dẫn bảo quản</div>\r\n<div class=\"description\">\r\n<div class=\"list scrollbar\">\r\n<div class=\"item\"><strong>C&aacute;ch 1:</strong>&nbsp;Sử dụng vải cotton trắng, chấm nhẹ một ch&uacute;t v&agrave;o nước tẩy nhẹ. Sau đ&oacute; lau qua vị tr&iacute; cần vệ sinh.</div>\r\n<div class=\"item\"><strong>C&aacute;ch 2:</strong>&nbsp;Sử dụng vải cotton trắng, nh&uacute;ng v&agrave;o nước sạch v&agrave; vắt kh&ocirc;. Sau đ&oacute; nhẹ nh&agrave;ng lau qua vị tr&iacute; cần vệ sinh tr&ecirc;n sản phẩm.</div>\r\n<strong>Đối với chất liệu microfiber</strong>\r\n<div>C&oacute; thể sử dụng b&agrave;n chải l&ocirc;ng mềm v&agrave; chải nhẹ l&ecirc;n bề mặt sản phẩm để vệ sinh.</div>\r\n<div><strong>Đối với chất liệu PC v&agrave; PVC</strong>\r\n<div>Trường hợp sản phẩm bị d&iacute;nh keo,c&oacute; thể d&ugrave;ng cao su sống để ch&ugrave;i sau khi đ&atilde; chấm nhẹ nước tẩy nhẹ l&ecirc;n vị tr&iacute; d&iacute;nh keo.</div>\r\n</div>\r\n<strong>Lưu &yacute;:</strong>\r\n<div>- Kh&ocirc;ng &aacute;p dụng cho chất liệu l&ocirc;ng (*).</div>\r\n<div>- Kh&ocirc;ng giặt t&uacute;i bằng bột giặt, c&aacute;c chất tẩy mạnh.</div>\r\n<div>- Chỉ sử dụng nước hoặc c&aacute;c h&oacute;a chất vệ sinh chuy&ecirc;n dụng.</div>\r\n<div>- Đối với sản phẩm được l&agrave;m từ chất liệu đặc biệt sẽ c&oacute; c&aacute;ch thức vệ sinh ri&ecirc;ng biệt, bạn vui l&ograve;ng li&ecirc;n hệ tổng đ&agrave;i CSKH 1900 6909</div>\r\n<div>- Nhấn ph&iacute;m 1 để được hướng dẫn cụ thể.</div>\r\n</div>\r\n</div>', 29, '/storage/uploads/2024/07/07/tui-deo-cheo-nhan-khoa-ban-nguyet---sho-0244---mau-kem__75958__1712111585-medium.jpg', 700000, NULL, 1, '2024-07-06 10:24:39', '2024-07-16 03:51:41', 66),
(7, 'Túi đeo chéo hình khối chần bông - SHO 0249 - Màu đen', '<ul>\r\n<li class=\"item\">Loại sản phẩm: T&uacute;i X&aacute;ch Nhỏ</li>\r\n<li class=\"item\">K&iacute;ch thước (d&agrave;i x rộng x cao): 20 x 9 x 14.2 cm</li>\r\n<li class=\"item\">Chất liệu: Da nh&acirc;n tạo</li>\r\n<li class=\"item\">Chất liệu d&acirc;y đeo: Kim loại</li>\r\n<li class=\"item\">Số ngăn: 1 ngăn lớn, 1 ngăn nhỏ</li>\r\n<li class=\"item\">K&iacute;ch cỡ: Nhỏ</li>\r\n<li class=\"item\">Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi chơi</li>\r\n</ul>\r\n<div class=\"ddict_btn\" style=\"top: 14px; left: 1016px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\"></div>', '<div class=\"title-info active\">Hướng dẫn bảo quản</div>\r\n<div class=\"description\">\r\n<div class=\"list scrollbar\">\r\n<div class=\"item\"><strong>C&aacute;ch 1:</strong>&nbsp;Sử dụng vải cotton trắng, chấm nhẹ một ch&uacute;t v&agrave;o nước tẩy nhẹ. Sau đ&oacute; lau qua vị tr&iacute; cần vệ sinh.</div>\r\n<div class=\"item\"><strong>C&aacute;ch 2:</strong>&nbsp;Sử dụng vải cotton trắng, nh&uacute;ng v&agrave;o nước sạch v&agrave; vắt kh&ocirc;. Sau đ&oacute; nhẹ nh&agrave;ng lau qua vị tr&iacute; cần vệ sinh tr&ecirc;n sản phẩm.</div>\r\n<strong>Đối với chất liệu microfiber</strong>\r\n<div>C&oacute; thể sử dụng b&agrave;n chải l&ocirc;ng mềm v&agrave; chải nhẹ l&ecirc;n bề mặt sản phẩm để vệ sinh.</div>\r\n<div><strong>Đối với chất liệu PC v&agrave; PVC</strong>\r\n<div>Trường hợp sản phẩm bị d&iacute;nh keo,c&oacute; thể d&ugrave;ng cao su sống để ch&ugrave;i sau khi đ&atilde; chấm nhẹ nước tẩy nhẹ l&ecirc;n vị tr&iacute; d&iacute;nh keo.</div>\r\n</div>\r\n<strong>Lưu &yacute;:</strong>\r\n<div>- Kh&ocirc;ng &aacute;p dụng cho chất liệu l&ocirc;ng (*).</div>\r\n<div>- Kh&ocirc;ng giặt t&uacute;i bằng bột giặt, c&aacute;c chất tẩy mạnh.</div>\r\n<div>- Chỉ sử dụng nước hoặc c&aacute;c h&oacute;a chất vệ sinh chuy&ecirc;n dụng.</div>\r\n<div>- Đối với sản phẩm được l&agrave;m từ chất liệu đặc biệt sẽ c&oacute; c&aacute;ch thức vệ sinh ri&ecirc;ng biệt, bạn vui l&ograve;ng li&ecirc;n hệ tổng đ&agrave;i CSKH 1900 6909</div>\r\n<div>- Nhấn ph&iacute;m 1 để được hướng dẫn cụ thể.</div>\r\n</div>\r\n</div>', 29, '/storage/uploads/2024/07/07/tui-deo-cheo-hinh-khoi-chan-bong---sho-0249---mau-den__74907__1709208225-medium (1).jpeg', 980000, NULL, 1, '2024-07-06 10:37:26', '2024-07-06 10:37:26', 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`slider_id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Túi xách em bé', 'http://127.0.0.1:8000/admin/sliders/add', '/storage/uploads/2024/06/15/img_slider_2.jpg', 2, 1, '2024-06-14 19:01:40', '2024-06-15 04:49:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(6, 'tuanh', 'viduc2811@gmail.com', NULL, '$2y$12$8DZS5o3fl6LoLR2SDGiUM.4buMFzDgSBP9Qp9jxG4fLtcWw2kLYNu', NULL, '2024-07-06 08:57:02', '2024-07-06 08:57:02', 1),
(7, 'Vi Đức', 'viduc123@gmail.com', NULL, '$2y$12$oOAIAIgoWQqmLF0sGj7xreVZ3AMfjfK1s9DGbZOawy3XRr8J73D9m', NULL, '2024-07-06 09:15:03', '2024-07-06 09:15:03', 0),
(8, 'Dũng', 'viduc28112002@gmail.com', NULL, '$2y$12$L0C2.s3Xru5aTXi4AuV40eFX12VQN5LigswrnpV9aeUyYJvXtf8re', NULL, '2024-07-06 10:14:17', '2024-07-06 10:14:17', 0),
(9, 'Nguyên Ngọc', 'nguyen123@gmail.com', NULL, '$2y$12$6YfIvEO6.nhB0awEmwytEeH7IN4mG40P9b8PP1xNgLKKKbGlal8t.', NULL, '2024-07-16 04:47:03', '2024-07-16 04:47:03', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
