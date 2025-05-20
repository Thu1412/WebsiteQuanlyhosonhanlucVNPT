-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2025 lúc 04:07 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhansumaster1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `method` varchar(10) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `input` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `http_method` varchar(255) DEFAULT NULL,
  `http_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('quanlyhosonhanlucvnpt_cache_admin@example.com|127.0.0.1', 'i:1;', 1747749896),
('quanlyhosonhanlucvnpt_cache_admin@example.com|127.0.0.1:timer', 'i:1747749896;', 1747749896);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` tinyint(1) NOT NULL,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  `File` varchar(255) DEFAULT NULL,
  `DegreeCertificate` varchar(255) DEFAULT NULL,
  `TypeCertificate` varchar(255) DEFAULT NULL,
  `FieldCertificate` varchar(255) NOT NULL,
  `LevelCertificate` varchar(255) NOT NULL,
  `BasisTrain` varchar(255) NOT NULL,
  `LocationTrain` varchar(255) NOT NULL,
  `Classification` varchar(255) NOT NULL,
  `Score` decimal(8,2) NOT NULL,
  `SentStudy` tinyint(4) NOT NULL DEFAULT 0,
  `InternationalCertificate` tinyint(4) NOT NULL DEFAULT 0,
  `DateCertificate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nhansu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `certificates`
--

INSERT INTO `certificates` (`id`, `status_id`, `DateStart`, `DateEnd`, `File`, `DegreeCertificate`, `TypeCertificate`, `FieldCertificate`, `LevelCertificate`, `BasisTrain`, `LocationTrain`, `Classification`, `Score`, `SentStudy`, `InternationalCertificate`, `DateCertificate`, `created_at`, `updated_at`, `nhansu_id`) VALUES
(1, 1, '2025-03-15', '2025-03-15', 'uploads/certificates/mbappe.jpg', 'Cử nhân', 'Đại học', 'Lĩnh vực thể thao', 'Cấp cao', 'Đào tạo 1', 'Paris, France', 'Phân loại A', 85.00, 0, 0, '2021-02-28', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 1),
(2, 1, '2025-03-15', '2025-03-15', 'uploads/certificates/dangtuankiet.jpg', 'Thạc sĩ', 'Chuyên nghiệp', 'Lĩnh vực quản lý', 'Cấp trung', 'Đào tạo 2', 'Hà Nội, Việt Nam', 'Phân loại B', 88.00, 0, 0, '2022-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 2),
(3, 1, '2025-03-15', '2025-03-15', 'uploads/certificates/lekhanhlinh.jpg', 'Cử nhân', 'Đại học', 'Lĩnh vực công nghệ', 'Cấp cao', 'Đào tạo 3', 'TPHCM, Việt Nam', 'Phân loại C', 90.00, 0, 0, '2023-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 3),
(4, 1, '2025-03-15', '2025-03-15', 'uploads/nguyenthidiemhuong.jpg', 'Thạc sĩ', 'Sau đại học', 'Lĩnh vực y tế', 'Cấp trung', 'Đào tạo 4', 'Đà Nẵng, Việt Nam', 'Phân loại D', 87.00, 0, 0, '2024-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 4),
(5, 1, '2025-03-15', '2025-03-15', 'uploads/nguyentrungtruc.jpg', 'Cử nhân', 'Chuyên nghiệp', 'Lĩnh vực kinh tế', 'Cấp cao', 'Đào tạo 5', 'Cần Thơ, Việt Nam', 'Phân loại E', 80.00, 0, 0, '2021-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 5),
(6, 1, '2025-03-15', '2025-03-15', 'uploads/nguyenhoanganh.jpg', 'Thạc sĩ', 'Nâng cao', 'Lĩnh vực kỹ thuật', 'Cấp trung', 'Đào tạo 6', 'Hải Phòng, Việt Nam', 'Phân loại F', 95.00, 0, 0, '2023-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 6),
(7, 1, '2025-03-15', '2025-03-15', 'uploads/nguyenhotrung.jpg', 'Cử nhân', 'Đại học', 'Lĩnh vực kinh tế', 'Cấp trung', 'Đào tạo 7', 'Bình Dương, Việt Nam', 'Phân loại G', 85.00, 0, 0, '2020-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 7),
(8, 1, '2025-03-15', '2025-03-15', 'uploads/phamminhkhang.jpg', 'Thạc sĩ', 'Chuyên nghiệp', 'Lĩnh vực marketing', 'Cấp cao', 'Đào tạo 8', 'Đồng Nai, Việt Nam', 'Phân loại H', 90.00, 0, 0, '2025-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 8),
(9, 1, '2025-03-15', '2025-03-15', 'uploads/trangiabao.jpg', 'Cử nhân', 'Sau đại học', 'Lĩnh vực CNTT', 'Cấp trung', 'Đào tạo 9', 'Nha Trang, Việt Nam', 'Phân loại I', 92.00, 0, 0, '2024-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 9),
(10, 1, '2025-03-15', '2025-03-15', 'uploads/tranchidinh.jpg', 'Thạc sĩ', 'Nâng cao', 'Lĩnh vực quản lý', 'Cấp cao', 'Đào tạo 10', 'Huế, Việt Nam', 'Phân loại J', 78.00, 0, 0, '2019-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 10),
(11, 1, '2025-03-15', '2025-03-15', 'uploads/phananhthu.jpg', 'Cử nhân', 'Đại học', 'Lĩnh vực tài chính', 'Cấp trung', 'Đào tạo 11', 'Vũng Tàu, Việt Nam', 'Phân loại K', 84.00, 0, 0, '2022-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 11),
(12, 1, '2025-03-15', '2025-03-15', 'uploads/duongmyduyen.jpg', 'Thạc sĩ', 'Chuyên nghiệp', 'Lĩnh vực marketing', 'Cấp cao', 'Đào tạo 12', 'Đắk Lắk, Việt Nam', 'Phân loại L', 88.00, 0, 0, '2023-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 12),
(13, 1, '2025-03-15', '2025-03-15', 'uploads/hotuantrung.jpg', 'Cử nhân', 'Đại học', 'Lĩnh vực kỹ thuật', 'Cấp trung', 'Đào tạo 13', 'Bạc Liêu, Việt Nam', 'Phân loại M', 90.00, 0, 0, '2021-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 13),
(14, 1, '2025-03-15', '2025-03-15', 'uploads/phannhatnam.jpg', 'Thạc sĩ', 'Chuyên nghiệp', 'Lĩnh vực kinh tế', 'Cấp cao', 'Đào tạo 14', 'An Giang, Việt Nam', 'Phân loại N', 85.00, 0, 0, '2025-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 14),
(15, 1, '2025-03-15', '2025-03-15', 'uploads/trandangnguyenkhoi.jpg', 'Cử nhân', 'Sau đại học', 'Lĩnh vực tài chính', 'Cấp trung', 'Đào tạo 15', 'Quảng Ninh, Việt Nam', 'Phân loại O', 92.00, 0, 0, '2018-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 15),
(16, 1, '2025-03-15', '2025-03-15', 'uploads/certificates/1742050830_tranngocdungthu.jpg', 'Thạc sĩ', 'Nâng cao', 'Lĩnh vực marketing', 'Cấp cao', 'Đào tạo 16', 'Bình Định', 'Phân loại P', 91.00, 0, 0, '2022-08-30', '2025-03-15 17:26:49', '2025-03-15 17:26:49', 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` tinyint(1) NOT NULL DEFAULT 1,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  `File` varchar(255) NOT NULL DEFAULT '',
  `StandardTrain` varchar(255) NOT NULL DEFAULT '',
  `BasisTrain` varchar(255) NOT NULL DEFAULT '',
  `FormTrain` varchar(255) NOT NULL DEFAULT '',
  `TypeTrain` varchar(255) NOT NULL DEFAULT '',
  `DegreeClassific` varchar(255) NOT NULL DEFAULT '',
  `TitleTrain` varchar(255) NOT NULL DEFAULT '',
  `EducationLevel` varchar(255) NOT NULL DEFAULT '',
  `SentStudy` tinyint(1) NOT NULL DEFAULT 0,
  `nhansu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `educations`
--

INSERT INTO `educations` (`id`, `status_id`, `DateStart`, `DateEnd`, `File`, `StandardTrain`, `BasisTrain`, `FormTrain`, `TypeTrain`, `DegreeClassific`, `TitleTrain`, `EducationLevel`, `SentStudy`, `nhansu_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-01-01', '2020-12-31', 'uploads/educations/1742231211_mbappe.jpg', 'Cử nhân Kinh tế', 'ĐH Paris', 'Chính quy', 'Tài chính Ngân hàng', 'Giỏi', 'Tốt nghiệp', 'Đại học', 1, 1, '2025-03-15 15:26:34', '2025-03-17 10:06:51'),
(2, 1, '2017-05-01', '2021-04-30', 'uploads/educations/1742231220_dangtuankiet.jpg', 'Kỹ sư CNTT', 'ĐH Bách Khoa HN', 'Chính quy', 'Công nghệ thông tin', 'Khá', 'Tốt nghiệp', 'Đại học', 1, 2, '2025-03-15 15:26:34', '2025-03-17 10:07:00'),
(3, 1, '2018-03-01', '2022-02-28', 'uploads/educations/1742231233_lekhanhlinh.jpg', 'Cử nhân Kế toán', 'ĐH Kinh tế TP.HCM', 'Chính quy', 'Kế toán - Kiểm toán', 'Giỏi', 'Tốt nghiệp', 'Đại học', 1, 3, '2025-03-15 15:26:34', '2025-03-17 10:07:13'),
(4, 1, '2019-06-01', '2023-05-31', 'uploads/education/nguyenthidiemhuong.pdf', 'Cử nhân Quản trị', 'ĐH Đà Nẵng', 'Chính quy', 'Quản trị Kinh doanh', 'Giỏi', 'Tốt nghiệp', 'Đại học', 1, 4, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(5, 1, '2020-07-01', '2024-06-30', 'uploads/education/nguyentrungtruc.pdf', 'Cử nhân Luật', 'ĐH Cần Thơ', 'Chính quy', 'Luật Kinh tế', 'Khá', 'Tốt nghiệp', 'Đại học', 1, 5, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(6, 1, '2021-09-01', '2025-08-31', 'uploads/education/nguyenhoanganh.pdf', 'Kỹ sư Điện tử', 'ĐH Bách Khoa HP', 'Chính quy', 'Điện tử - Viễn thông', 'Khá', 'Tốt nghiệp', 'Cao đẳng', 1, 6, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(7, 1, '2015-09-01', '2019-08-31', 'uploads/education/nguyenhotrung.pdf', 'Cử nhân Marketing', 'ĐH Thương mại', 'Chính quy', 'Marketing', 'Giỏi', 'Tốt nghiệp', 'Cao đẳng', 1, 7, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(8, 1, '2016-11-01', '2020-10-31', 'uploads/education/phamminhkhang.pdf', 'Cử nhân Khoa học máy tính', 'ĐH CNTT', 'Chính quy', 'Khoa học máy tính', 'Xuất sắc', 'Chưa tốt nghiệp', 'Cao đẳng', 1, 8, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(9, 1, '2017-02-01', '2021-01-31', 'uploads/education/trangiabao.pdf', 'Cử nhân Ngôn ngữ Anh', 'ĐH KHXH&NV', 'Chính quy', 'Ngôn ngữ Anh', 'Khá', 'Tốt nghiệp', 'Cao đẳng', 1, 9, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(10, 1, '2018-04-01', '2022-03-31', 'uploads/educations/1742231282_tranchidinh.jpg', 'Cử nhân Du lịch', 'ĐH Huế', 'Chính quy', 'Quản trị Du lịch', 'Khá', 'Tốt nghiệp', 'Cao đẳng', 1, 10, '2025-03-15 15:26:34', '2025-03-17 10:08:02'),
(11, 1, '2019-01-01', '2023-12-31', 'uploads/educations/1742231301_new.jpg', 'Cử nhân Quản trị Kinh doanh', 'ĐH Bà Rịa - Vũng Tàu', 'Chính quy', 'Quản trị Kinh doanh', 'Giỏi', 'Tốt nghiệp', 'Thạc sĩ', 1, 11, '2025-03-15 15:26:34', '2025-03-17 10:08:21'),
(12, 1, '2020-08-01', '2024-07-31', 'uploads/education/duongmyduyen.pdf', 'Cử nhân Công tác xã hội', 'ĐH Tây Nguyên', 'Chính quy', 'Công tác xã hội', 'Khá', 'Tốt nghiệp', 'Thạc sĩ', 1, 12, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(13, 1, '2021-07-01', '2025-06-30', 'uploads/education/hotuantrung.pdf', 'Cử nhân Quản trị Nhân lực', 'ĐH Bạc Liêu', 'Chính quy', 'Quản trị Nhân sự', 'Khá', 'Tốt nghiệp', 'Thạc sĩ', 1, 13, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(14, 1, '2022-01-01', '2026-12-31', 'uploads/education/phannhatnam.pdf', 'Cử nhân Công nghệ phần mềm', 'ĐH An Giang', 'Chính quy', 'Công nghệ phần mềm', 'Xuất sắc', 'Chưa tốt nghiệp', 'Thạc sĩ', 1, 14, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(15, 1, '2023-04-01', '2027-03-31', 'uploads/education/trandangnguyenkhoi.pdf', 'Cử nhân Xây dựng', 'ĐH Xây Dựng Hà Nội', 'Chính quy', 'Kỹ thuật xây dựng', 'Khá', 'Tốt nghiệp', 'Thạc sĩ', 1, 15, '2025-03-15 15:26:34', '2025-03-15 15:26:34'),
(16, 1, '2024-02-01', '2028-01-31', 'uploads/education/tranngocdungthu.pdf', 'Cử nhân Luật', 'ĐH Quy Nhơn', 'Chính quy', 'Luật Kinh tế', 'Giỏi', 'Tốt nghiệp', 'Tiến sĩ', 1, 33, '2025-03-15 15:26:34', '2025-03-15 15:26:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `join_projects`
--

CREATE TABLE `join_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` tinyint(1) NOT NULL DEFAULT 0,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `nhansu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `join_projects`
--

INSERT INTO `join_projects` (`id`, `status_id`, `DateStart`, `DateEnd`, `ProductName`, `Description`, `nhansu_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2025-01-01', '2025-12-31', 'Hệ Thống Quản Lý Nhân Sự', 'Dự án xây dựng hệ thống quản lý nhân sự cho công ty D.', 1, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(32, 3, '2025-01-01', '2025-12-31', 'Hệ Thống Quản Lý Nhân Sự', 'Dự án xây dựng hệ thống quản lý nhân sự cho công ty A', 2, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(33, 3, '2025-01-01', '2025-12-31', 'Ứng Dụng Quản Lý Dự Án', 'Dự án phát triển ứng dụng quản lý dự án cho công ty B', 3, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(34, 2, '2025-01-01', '2025-12-31', 'Website Bán Hàng 1', 'Website giúp khách hàng mua sản phẩm online dễ dàng', 11, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(35, 1, '2025-01-01', '2025-12-31', 'App Bán Giày', 'Ứng dụng mua bán giày trực tuyến', 12, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(36, 4, '2025-01-01', '2025-12-31', 'Hệ Thống Quản Lý Bán Hàng ABCD', 'Phát triển hệ thống quản lý bán hàng cho công ty E', 2, '2025-03-15 15:43:12', '2025-04-15 18:26:08'),
(37, 4, '2025-01-01', '2025-12-31', 'Hệ Thống Quản Lý Dự Án Cá Nhân', 'Phát triển hệ thống quản lý dự án cá nhân', 9, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(38, 2, '2025-01-01', '2025-12-31', 'Ứng Dụng Quản Lý Công Việc Cá Nhân', 'Ứng dụng quản lý công việc cá nhân hiệu quả', 4, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(39, 4, '2025-01-01', '2025-12-31', 'Hệ Thống Theo Dõi Hoạt Động Cá Nhân', 'Theo dõi hoạt động cá nhân và báo cáo', 6, '2025-03-15 15:43:12', '2025-03-15 15:43:12'),
(40, 2, '2025-01-01', '2025-12-31', 'Hệ Thống Hỗ Trợ Nhóm 2', 'Công cụ hỗ trợ công việc nhóm 2', 5, '2025-03-15 15:43:25', '2025-03-15 15:43:25'),
(41, 1, '2025-01-01', '2025-12-31', 'Quản Lý Tiến Độ Công Việc Nhóm 2', 'Hệ thống theo dõi tiến độ công việc nhóm 2', 8, '2025-03-15 15:43:25', '2025-03-19 05:39:47'),
(42, 2, '2024-02-01', '2025-02-01', 'Website Bán Hàng 1', 'kạhdkhasd', 2, '2025-04-15 18:37:01', '2025-04-15 18:37:01');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2016_01_04_173148_create_admin_tables', 1),
(5, '2025_03_06_143843_create_nhansu_table', 1),
(6, '2025_03_06_151037_create_education_table', 1),
(7, '2025_03_06_152035_create_certificates_table', 1),
(8, '2025_03_06_152138_create_join_projects_table', 1),
(9, '2025_03_06_152243_create_trainings_table', 1),
(10, '2025_03_07_120252_add_role_to_users_table', 1),
(11, '2025_03_07_135336_add_user_id_to_nhansu_table', 1),
(12, '2025_03_15_160826_create_status_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhansu`
--

CREATE TABLE `nhansu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(255) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhansu`
--

INSERT INTO `nhansu` (`id`, `hoten`, `gioitinh`, `ngaysinh`, `sodienthoai`, `hinhanh`, `email`, `diachi`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Mbabbe', 'male', '1998-12-20', '0987654321', 'uploads/nhansu/1742222470_mbappe.jpg', 'mbappee@example.com', 'Paris, France', '2025-03-15 14:43:14', '2025-04-14 09:38:52', 2),
(2, 'Đặng Tuấn Kiệt', 'male', '2000-05-15', '0987111222', 'uploads/nhansu/1742221902_dangtuankiet.jpg', 'dangtuankiet@example.com', 'Hà Nội, Việt Nam', '2025-03-15 14:43:14', '2025-03-17 07:31:42', 3),
(3, 'Lê Khánh Linh', 'female', '2001-03-10', '0987333444', 'uploads/nhansu/1742919457_lekhanhlinh.jpg', 'lekhanhlinh@example.com', 'TPHCM, Việt Nam', '2025-03-15 14:43:14', '2025-03-25 09:17:37', 4),
(4, 'Nguyễn Thị Diễm Hương', 'female', '2002-07-25', '0987444555', 'uploads/nguyenthidiemhuong.jpg', 'nguyenthidiemhuong@example.com', 'Đà Nẵng, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 5),
(5, 'Nguyễn Trung Trực', 'male', '1999-08-30', '09875556676', 'uploads/nguyentrungtruc.jpg', 'nguyentrungtruc@example.com', 'Cần Thơ, Việt Nam', '2025-03-15 14:43:14', '2025-04-15 19:13:06', 6),
(6, 'Nguyễn Hoàng Anh', 'male', '2001-12-05', '0987666777', 'uploads/nguyenhoanganh.jpg', 'nguyenhoanganh@example.com', 'Hải Phòng, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 7),
(7, 'Nguyễn Hồ Trung', 'male', '1998-09-17', '0987777888', 'uploads/nhansu/1742957733_nguyenhotrung.jpg', 'nguyenhotrung@example.com', 'Bình Dương, Việt Nam', '2025-03-15 14:43:14', '2025-03-25 19:55:33', 8),
(8, 'Phạm Minh Khang', 'male', '2003-02-14', '0987888999', 'uploads/phamminhkhang.jpg', 'phamminhkhang@example.com', 'Đồng Nai, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 9),
(9, 'Trần Gia Bảo', 'female', '2002-06-21', '0987999000', 'uploads/trangiabao.jpg', 'trangiabao@example.com', 'Nha Trang, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 10),
(10, 'Trần Chí Định', 'male', '1997-11-11', '0987111333', 'uploads/tranchidinh.jpg', 'tranchidinh@example.com', 'Huế, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 11),
(11, 'Phan Anh Thư', 'female', '2000-04-09', '0987222444', 'uploads/phananhthu.jpg', 'phananhthu@example.com', 'Vũng Tàu, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 12),
(12, 'Dương Mỹ Duyên', 'female', '2001-01-30', '0987333555', 'uploads/duongmyduyen.jpg', 'duongmyduyen@example.com', 'Đắk Lắk, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 13),
(13, 'Hồ Tuấn Trung', 'male', '1999-07-07', '0987444666', 'uploads/hotuantrung.jpg', 'hotuantrung@example.com', 'Bạc Liêu, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 14),
(14, 'Phan Nhật Nam', 'male', '2003-10-15', '0987555777', 'uploads/phannhatnam.jpg', 'phannhatnam@example.com', 'An Giang, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 15),
(15, 'Trần Đăng Nguyên Khôi', 'male', '1996-09-29', '0987666888', 'uploads/trandangnguyenkhoi.jpg', 'trandangnguyenkhoi@example.com', 'Quảng Ninh, Việt Nam', '2025-03-15 14:43:14', '2025-03-15 14:43:14', 16),
(33, 'Trần Ngọc Dung Thư', 'female', '2003-12-01', '099258748', 'uploads/nhansu/1742373709_1742050830_tranngocdungthu.jpg', 'dungthu@gmail.com', 'TP Hồ Chí Minh', '2025-03-19 08:40:06', '2025-03-19 01:41:49', 17),
(34, 'Trần Ngọc Diễm Trinh', 'female', '1999-12-01', '0993848498', 'uploads/nhansu/1742373908_tranngocdiemtrinh.jpg', 'diemtrinh@gmail.com', 'Cà Mau', '2025-03-19 08:40:06', '2025-03-19 01:45:08', 19),
(35, 'Đỗ Xuân Mai', 'female', '2000-03-03', '097834756', 'uploads/nhansu/1742914612_doxuanmai.jpg', 'xuanmai@gmail.com', 'TP Hồ Chi Minh, Việt Nam', '2025-03-25 07:56:52', '2025-03-25 09:07:14', 20),
(37, 'Nguyễn Hào Lý Tuân', 'male', '2003-12-02', '0987874787', 'uploads/nhansu/1743650122_nguyenhaolytuan.jpg', 'nguyenhaolytuan@example.com', 'Đà Nẵng , Việt Nam', '2025-04-02 20:15:22', '2025-04-02 20:15:22', 22),
(38, 'nguyễn van a', 'male', '2003-12-02', '0982349344', 'uploads/nhansu/1744788900_1742221902_dangtuankiet.jpg', 'nguyenvana@gmail.com', 'cà mau', '2025-04-16 00:35:00', '2025-04-16 00:35:00', 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhansu_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_processed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `nhansu_id`, `sender_id`, `message`, `is_read`, `type`, `created_at`, `updated_at`, `is_processed`) VALUES
(1, 3, 4, 'tôi bị sai thông tin về chứng chỉ, chứng nhận ở phần tên', 1, 'certificate', '2025-04-05 08:13:46', '2025-04-14 09:27:00', 1),
(2, 3, 1, 'Yêu cầu của bạn về nội dung \"tôi bị sai thông tin về chứng chỉ, chứng nhận ở phần tên\" đã được admin xử lý, vui lòng kiểm tra lại thông tin.', 0, 'admin_response', '2025-04-05 08:23:36', '2025-04-05 08:23:36', 0),
(3, 3, 1, 'Yêu cầu của bạn về nội dung \"tôi bị sai thông tin về chứng chỉ, chứng nhận ở phần tên\" đã được admin xử lý, vui lòng kiểm tra lại thông tin.', 0, 'admin_response', '2025-04-05 08:27:23', '2025-04-05 08:27:23', 0),
(4, 3, 1, 'Yêu cầu của bạn đã được xử lý. Vui lòng kiểm tra lại thông tin.', 0, 'info', '2025-04-14 09:26:58', '2025-04-14 09:26:58', 0),
(5, 3, 1, 'Yêu cầu của bạn đã được xử lý. Vui lòng kiểm tra lại thông tin.', 0, 'info', '2025-04-14 09:27:00', '2025-04-14 09:27:00', 0),
(6, 3, 3, 'tôi muốn yêu cầu 1 khóa tham gia dự án', 1, 'join-projects', '2025-04-15 18:07:21', '2025-05-08 08:18:51', 0),
(7, 3, 3, 'yêu cầu chương trình đào tạo', 0, 'training', '2025-05-08 08:22:33', '2025-05-08 08:22:33', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('2124802010556@student.tdmu.edu.vn', '$2y$12$llupXN3/wSF8SLUMVJwk/eJ0tE9CA7lRtRoUJx.DeIEVCJ.k0NN7.', '2025-04-01 20:06:05'),
('admin@example.com', '$2y$12$a7K.WMFgjJB6ApEcXwY4KeYysbh.EF0AXuXPhq05rgHZx4tJd4hI6', '2025-05-20 07:04:11'),
('lekhanhlinh@example.com', '$2y$12$Odr1.49Nn8Wl89JiL0o9hOMWrr1n2hYbE3SlaOuBo8i5sslHzzB2G', '2025-05-08 08:18:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('d5egsj08DkKl6aoRnPqnRoUnbaHLqkYr1Ysqzmkd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 CCleaner/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicjdrMWZLVE9BSm44eGEzNWpONHA3Q3Y0YTFZSUtZVWprY1F3QnZoSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3QtcGFzc3dvcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YToxOntpOjA7czo2OiJzdGF0dXMiO31zOjM6Im5ldyI7YTowOnt9fXM6Njoic3RhdHVzIjtzOjQxOiJXZSBoYXZlIGVtYWlsZWQgeW91ciBwYXNzd29yZCByZXNldCBsaW5rLiI7fQ==', 1747749864),
('lDJmYYQFUJUPaaJM0BMDgEP10wtuaqfs6znuuNga', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 CCleaner/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibWcwYkFKM1czQzhVQTVONTJmTlNsZkptNWswOUltdW1JRXBZU2FhcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ub3RpZmljYXRpb25zL2FsbCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1746717788);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đang diễn ra', '2025-03-15 16:10:35', '2025-03-15 16:10:35'),
(2, 'Hoàn thành', '2025-03-15 16:10:35', '2025-03-15 16:10:35'),
(3, 'Tạm dừng', '2025-03-15 16:10:35', '2025-03-15 16:10:35'),
(4, 'Bị hủy', '2025-03-19 12:38:03', '2025-03-19 12:38:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_baos`
--

CREATE TABLE `thong_baos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Người nhận thông báo',
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trạng thái đã đọc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` tinyint(1) NOT NULL,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `JobTitle` varchar(255) NOT NULL,
  `CourseTrain` varchar(255) DEFAULT NULL,
  `OrganizeForm` varchar(255) DEFAULT NULL,
  `UnitTrain` varchar(255) DEFAULT NULL,
  `ContentCommit` text DEFAULT NULL,
  `ResultTrain` varchar(255) DEFAULT NULL,
  `ResultSubject` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `CostTrain` decimal(10,2) DEFAULT NULL,
  `TimeCommit` int(11) DEFAULT NULL,
  `TimeCommitRemain` int(11) DEFAULT NULL,
  `IssueCertificate` tinyint(1) DEFAULT NULL,
  `Contract` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nhansu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trainings`
--

INSERT INTO `trainings` (`id`, `status_id`, `DateStart`, `DateEnd`, `Unit`, `JobTitle`, `CourseTrain`, `OrganizeForm`, `UnitTrain`, `ContentCommit`, `ResultTrain`, `ResultSubject`, `Status`, `Score`, `CostTrain`, `TimeCommit`, `TimeCommitRemain`, `IssueCertificate`, `Contract`, `created_at`, `updated_at`, `nhansu_id`) VALUES
(1, 1, '2023-01-01', '2023-06-30', 'Công Ty A', '', 'Kỹ Năng Lập Trình', 'Trực Tuyến', 'Trường Đại Học B', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 72, 5058780.00, 20, 20, 0, 'HĐ-0001', '2025-03-16 05:06:52', '2025-03-16 05:06:52', 2),
(2, 1, '2022-05-01', '2022-11-01', 'Công Ty BBBB', '', 'Quản Lý Dự Án', 'Tại Chỗ', 'Viện CCCC', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 73, 6841061.00, 19, 15, 0, 'HĐ-0002', '2025-03-16 05:06:52', '2025-03-16 05:06:52', 15),
(3, 3, '2022-02-15', '2022-08-15', 'Công Ty C', '', 'An Ninh Mạng', 'Trực Tuyến', 'Trường Đại Học D', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 98, 5551019.00, 13, 11, 0, 'HĐ-0003', '2025-03-16 05:06:52', '2025-03-16 05:06:52', 5),
(4, 1, '2021-09-01', '2022-03-01', 'Công Ty D', '', 'Kỹ Năng Quản Lý', 'Tại Chỗ', 'Viện E', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 76, 5180780.00, 18, 17, 0, 'HĐ-0004', '2025-03-16 05:06:52', '2025-03-16 05:06:52', 7),
(5, 2, '2022-07-01', '2023-01-01', 'Công Ty E', '', 'Chiến Lược Kinh Doanh', 'Trực Tuyến', 'Trường Đại Học F', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 77, 7634891.00, 18, 14, 0, 'HĐ-0005', '2025-03-16 05:06:52', '2025-03-16 05:06:52', 5),
(6, 1, '2023-01-01', '2023-06-30', 'Công Ty A', 'Lập Trình Viên', 'Kỹ Năng Lập Trình', 'Trực Tuyến', 'Trường Đại Học B', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 91, 5081466.00, 12, 11, 0, 'HĐ-0006', '2025-03-16 05:08:25', '2025-03-16 05:08:25', 12),
(7, 2, '2022-05-01', '2022-11-01', 'Công Ty BBBB', 'Quản Lý Dự Án', 'Quản Lý Dự Án', 'Tại Chỗ', 'Viện CCCC', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 95, 7275814.00, 15, 14, 0, 'HĐ-0007', '2025-03-16 05:08:25', '2025-03-16 05:08:25', 6),
(8, 1, '2022-02-15', '2022-08-15', 'Công Ty C', 'Chuyên Gia An Ninh', 'An Ninh Mạng', 'Trực Tuyến', 'Trường Đại Học D', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 74, 5131594.00, 19, 14, 0, 'HĐ-0008', '2025-03-16 05:08:25', '2025-03-16 05:08:25', 8),
(9, 2, '2021-09-01', '2022-03-01', 'Công Ty D', 'Quản Lý Nhóm', 'Kỹ Năng Quản Lý', 'Tại Chỗ', 'Viện E', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 77, 5395785.00, 21, 20, 0, 'HĐ-0009', '2025-03-16 05:08:25', '2025-03-16 05:08:25', 14),
(10, 1, '2022-07-01', '2023-01-01', 'Công Ty E', 'Chiến Lược Gia', 'Chiến Lược Kinh Doanh', 'Trực Tuyến', 'Trường Đại Học F', 'Cam kết làm việc sau đào tạo', 'Hoàn thành', 'Đạt', 'Hoàn thành', 94, 6546006.00, 13, 12, 0, 'HĐ-0010', '2025-03-16 05:08:25', '2025-03-16 05:08:25', 7);

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
  `plain_password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `nhansu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `plain_password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`, `nhansu_id`) VALUES
(1, 'Admin User', 'admin@example.com', '2025-03-15 13:49:08', '$2y$12$AwPNOTAkzBO8IpZVlJqQFOY5leUyizlLGiQFbS9FjBVk4Gq.jNodS', NULL, NULL, '2025-03-15 13:49:08', '2025-04-14 06:17:56', 'admin', 'active', NULL),
(2, 'Mbappe', 'mbappe@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 1),
(3, 'Đặng Tuấn Kiệt', 'dangtuankiet@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 2),
(4, 'Lê Khánh Linh', 'lekhanhlinh@example.com', NULL, '$2y$12$a4CwpDTYNF1lChJweGYFfuMTR6mb9nQFrTHsuafOytp9T6Hd3/WRO', NULL, NULL, '2025-03-15 14:42:58', '2025-04-15 08:11:07', 'user', 'active', 3),
(5, 'Nguyễn Thị Diễm Hương', 'nguyenthidiemhuong@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 4),
(6, 'Nguyễn Trung Trực', 'nguyentrungtruc@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 5),
(7, 'Nguyễn Hoàng Anh', 'nguyenhoanganh@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 6),
(8, 'Nguyễn Hồ Trung', 'nguyenhotrung@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 7),
(9, 'Phạm Minh Khang', 'phamminhkhang@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 8),
(10, 'Trần Gia Bảo', 'trangiabao@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 9),
(11, 'Trần Chí Định', 'tranchidinh@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 10),
(12, 'Phan Anh Thư', 'phananhthu@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 11),
(13, 'Dương Mỹ Duyên', 'duongmyduyen@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 12),
(14, 'Hồ Tuấn Trung', 'hotuantrung@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 13),
(15, 'Phan Nhật Nam', 'phannhatnam@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 14),
(16, 'Trần Đăng Nguyên Khôi', 'trandangnguyenkhoi@example.com', NULL, '$2y$12$93fhpMSZ7KvybEi3vDjxJ.z5KqKTKT06BX/lqNyVP4PIo9Vhou8a.', NULL, NULL, '2025-03-15 14:42:58', '2025-03-15 14:42:58', 'user', 'active', 15),
(17, 'Trần Ngọc Dung Thư', 'dungthu@gmail.com', NULL, '$2y$12$D1do1sVmx6ktc7UrusW7MODVB9HY5qUlH61inUnRyAhDKqivpk0.W', NULL, NULL, '2025-03-15 08:00:30', '2025-03-15 08:00:30', 'user', 'active', 33),
(19, 'Trần Ngọc Diễm Trinh', 'diemtrinh@gmail.com', NULL, '$2y$12$Ph8V7MaIjIfZt/n69auhEurxPVGaIGjQEhCy59n..XcgAa1AQvWfC', NULL, NULL, '2025-03-17 07:42:55', '2025-03-17 07:42:55', 'user', 'active', 34),
(20, 'Đỗ Xuân Mai', 'xuanmai@gmail.com', NULL, '$2y$12$z1T2mkqXtqV.HorfYvcrMuupUgZ0KNx49IQolL2LaxmJ0fyTpBrI.', NULL, NULL, '2025-03-25 07:56:52', '2025-03-25 09:07:14', 'user', 'active', 35),
(22, 'Nguyễn Hào Lý Tuân', 'nguyenhaolytuan@example.com', NULL, '$2y$12$mfUdmZ.dH3JScpVahDjEBeIqP5w6nlwqTn0UOWOmmb7lqrkj1ovTO', NULL, NULL, '2025-04-02 20:15:22', '2025-04-02 20:15:22', 'user', 'active', 37),
(24, 'Anh Thư', 'admin1@example.com', NULL, '$2y$12$HCzIiwYf/pfWRSyb0CQkReNcIHxWDZq2jiYaHfiywYMxGR.WVPB2.', NULL, NULL, '2025-04-15 18:53:23', '2025-04-15 18:53:23', 'admin', 'active', NULL),
(25, 'nguyễn van a', 'nguyenvana@gmail.com', NULL, '$2y$12$4DmLQfo8HWFMtN/atb9OYOKyfm1XcA4bTdTyjd.UKF3t5hMcNhFwK', NULL, NULL, '2025-04-16 00:35:00', '2025-04-16 00:35:00', 'user', 'active', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Chỉ mục cho bảng `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Chỉ mục cho bảng `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Chỉ mục cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_nhansu_id_foreign` (`nhansu_id`);

--
-- Chỉ mục cho bảng `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_nhansu_id_foreign` (`nhansu_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `join_projects`
--
ALTER TABLE `join_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `join_projects_nhansu_id_foreign` (`nhansu_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhansu`
--
ALTER TABLE `nhansu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhansu_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_nhansu_id_foreign` (`nhansu_id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_baos`
--
ALTER TABLE `thong_baos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thong_baos_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_nhansu_id_foreign` (`nhansu_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_nhansu_id_foreign` (`nhansu_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `join_projects`
--
ALTER TABLE `join_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nhansu`
--
ALTER TABLE `nhansu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thong_baos`
--
ALTER TABLE `thong_baos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_nhansu_id_foreign` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_nhansu_id_foreign` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `join_projects`
--
ALTER TABLE `join_projects`
  ADD CONSTRAINT `join_projects_nhansu_id_foreign` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `nhansu`
--
ALTER TABLE `nhansu`
  ADD CONSTRAINT `nhansu_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_nhansu_id_foreign` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thong_baos`
--
ALTER TABLE `thong_baos`
  ADD CONSTRAINT `thong_baos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_nhansu_id_foreign` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_nhansu_id_foreign` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
