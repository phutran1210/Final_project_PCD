-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2020 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_oplung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreate` timestamp NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `dateCreate`, `dateUpdate`) VALUES
(1, 'admin', '$2y$10$ie2a7ZwyVKrp0PgwZYIZT.JQUWUi1jjurD0VVYr6rtu5BwWP8pJY2', '2020-06-10 10:40:51', '2020-06-10 10:40:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `payments` tinyint(4) NOT NULL,
  `totalPrice` float NOT NULL,
  `content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `name`, `phone`, `email`, `address`, `payments`, `totalPrice`, `content`, `status`, `dateCreated`, `dateUpdate`) VALUES
(2, 1, '', '', '', '', 0, 230000, 'Giao tận nhà', 2, '2020-07-10 11:32:28', '2020-07-10 11:39:33'),
(3, 1, '', '', '', '', 1, 530000, '', 2, '2020-07-10 11:40:11', '2020-07-11 12:26:08'),
(4, 1, '', '', '', '', 1, 480000, '', 2, '2020-07-10 12:40:13', '2020-07-20 13:22:36'),
(5, 1, '', '', '', '', 1, 120000, '', 2, '2020-07-20 13:20:22', '2020-07-24 05:14:47'),
(6, 2, '', '', '', '', 0, 140000, '', 2, '2020-07-22 06:14:38', '2020-07-24 05:14:51'),
(7, 2, '', '', '', '', 1, 320000, 'Giao hàng tận nhà', 3, '2020-07-22 06:17:29', '2020-07-24 05:14:55'),
(9, 1, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '7 Xã Đàn, Phương Liên, Đống Đa, Hà Nội', 0, 260000, '', 2, '2020-07-24 05:13:30', '2020-07-29 07:06:28'),
(10, 2, 'Ngọc Diệu', '0929344311', 'tsunadehoa01@gmail.com', '137/58 Thoại Ngọc Hầu, Phú Thạnh, Tân Phú, Hồ Chí Minh', 1, 120000, '', 2, '2020-07-29 07:05:17', '2020-08-07 02:12:15'),
(11, 1, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 1, 660000, '', 2, '2020-07-29 13:15:21', '2020-08-07 02:12:09'),
(12, 1, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 0, 750000, '', 2, '2020-07-30 07:24:29', '2020-08-07 02:12:01'),
(13, 3, 'Nguyễn An Hòa', '0929344310', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 0, 210000, '', 2, '2020-08-06 10:25:42', '2020-08-06 10:27:55'),
(14, 1, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 1, 300000, '', 2, '2020-08-07 01:46:34', '2020-08-07 02:06:12'),
(15, 4, 'Nam', '0339406440', 'xyz@gmail.com', 'Hà Nội', 1, 390000, '', 2, '2020-08-07 03:00:05', '2020-08-07 03:01:01'),
(16, 4, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 1, 120000, '', 2, '2020-08-07 03:19:33', '2020-08-24 06:46:01'),
(17, 1, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 1, 210000, '', 2, '2020-08-07 03:54:04', '2020-08-13 15:04:49'),
(18, 1, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 1, 120000, '', 3, '2020-08-24 08:13:09', '2020-08-24 08:14:17'),
(19, 1, 'Nguyễn An Hòa', '0339406440', 'hoanguyenan2808@gmail.com', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', 0, 390000, '', 0, '2020-08-24 08:20:45', '2020-08-24 08:20:45'),
(21, 5, 'Nam', '0339406440', 'hoanguyenan2808@gmail.com', 'Hà Nội', 0, 320000, '', 2, '2020-08-24 09:19:34', '2020-10-02 03:45:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amout` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `id_cart`, `id_product`, `amout`, `total`) VALUES
(1, 2, 1, 2, 200000),
(2, 3, 1, 5, 500000),
(3, 4, 4, 2, 180000),
(4, 4, 5, 3, 270000),
(5, 5, 11, 1, 90000),
(6, 6, 11, 1, 90000),
(7, 7, 11, 3, 270000),
(9, 9, 9, 3, 210000),
(10, 10, 14, 1, 90000),
(11, 11, 18, 1, 90000),
(12, 11, 20, 2, 180000),
(13, 11, 11, 1, 90000),
(14, 11, 14, 3, 270000),
(15, 12, 18, 3, 270000),
(16, 12, 21, 5, 450000),
(17, 13, 15, 2, 180000),
(18, 14, 23, 3, 270000),
(19, 15, 22, 1, 90000),
(20, 15, 23, 1, 90000),
(21, 15, 21, 1, 90000),
(22, 15, 10, 1, 70000),
(23, 16, 16, 1, 90000),
(24, 17, 22, 2, 180000),
(25, 18, 20, 1, 90000),
(26, 19, 23, 4, 360000),
(28, 21, 22, 3, 270000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `gallery_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` timestamp NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `id_product`, `gallery_name`, `dateCreated`, `dateUpdate`) VALUES
(1, 1, 'z864184907996_a7b8e3f00a2df892cbc5c5d5c753250b.jpg', '2020-07-10 12:16:23', '2020-07-10 12:16:23'),
(2, 1, 'z864184908546_ad33d95682b2654ef76d0a9f0320ae1e.jpg', '2020-07-10 12:16:23', '2020-07-10 12:16:23'),
(3, 1, 'z864184925849_8079cb7fef2c9b05f3d73063131171cc.jpg', '2020-07-10 12:16:23', '2020-07-10 12:16:23'),
(4, 2, 'z864184920718_67d50c01ab0bd60db3b1a9b1fac46f1f-1.jpg', '2020-07-10 12:21:03', '2020-07-10 12:21:03'),
(5, 2, 'z864184921393_4e0a362c8a620453fc0350db37dd04e2.jpg', '2020-07-10 12:21:03', '2020-07-10 12:21:03'),
(6, 3, 'z864184907996_a7b8e3f00a2df892cbc5c5d5c753250b.jpg', '2020-07-10 12:28:52', '2020-07-10 12:28:52'),
(7, 3, 'z864184926755_2b92cb3b87acee217799b2c388681a79.jpg', '2020-07-10 12:28:52', '2020-07-10 12:28:52'),
(8, 3, 'z864184928695_951ce86cee392befcc83d25bf1a126e6.jpg', '2020-07-10 12:28:52', '2020-07-10 12:28:52'),
(9, 4, 'z864184910601_771230653b8553e30fad79225653a9d3.jpg', '2020-07-10 12:33:44', '2020-07-10 12:33:44'),
(10, 4, 'z864184929306_a6b68cd387b1c913fcb1c045ff1170f3.jpg', '2020-07-10 12:33:44', '2020-07-10 12:33:44'),
(11, 4, 'z864184930822_2b52c6d9ed44be4b730e1f158a169237.jpg', '2020-07-10 12:33:44', '2020-07-10 12:33:44'),
(12, 4, 'z864184931560_e43c402e0f03daf8afef469031b5d132.jpg', '2020-07-10 12:33:44', '2020-07-10 12:33:44'),
(13, 4, 'z864184931684_c26a28a82709e177fc54a3cb67afd023.jpg', '2020-07-10 12:33:44', '2020-07-10 12:33:44'),
(14, 4, 'z864184932156_a108d5f3a48a54c2700568821c222e90.jpg', '2020-07-10 12:33:44', '2020-07-10 12:33:44'),
(15, 4, 'z864184933621_57ff56edd87c6a8ae5cceca912f519a5.jpg', '2020-07-10 12:33:44', '2020-07-10 12:33:44'),
(16, 5, 'z864184907928_c59ee5869b68c4d7c283972a5bd95842.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(17, 5, 'z864184913928_2770e0424cc8ccb141ebbdd3f214beb1.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(18, 5, 'z864184914752_07584f85aa1c024b93c69dd370f50611-680x680.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(19, 5, 'z864184914806_514c1a719fbbbeccb2bd9491fa109b69-300x300.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(20, 5, 'z864184915948_fc58f75724f1688168d07d6077debaed-300x300.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(21, 5, 'z864184917996_cdb60ca539030fcebe8245e2ea4fb1a7-680x680.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(22, 5, 'z864184918743_13e790f418e82a9f2c56a0737a08fc01-300x300.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(23, 5, 'z864184921533_72e62ed55a0c79cd96006bd15f38713a-300x300.jpg', '2020-07-10 12:39:51', '2020-07-10 12:39:51'),
(24, 7, 'z862943793763_3627b83553744711fbfc586788f62f7d.jpg', '2020-07-10 13:29:45', '2020-07-10 13:29:45'),
(25, 7, 'z862943793763_3627b83553744711fbfc586788f62f7d-330x587.jpg', '2020-07-10 13:29:45', '2020-07-10 13:29:45'),
(26, 7, 'z862943843360_6b2b70d2710e653277e930d53b5a504c-300x300.jpg', '2020-07-10 13:29:45', '2020-07-10 13:29:45'),
(27, 7, 'z862944811506_9cc52c6212dcd70df1092fe28b39a4bb-300x300.jpg', '2020-07-10 13:29:45', '2020-07-10 13:29:45'),
(28, 7, 'z862944829514_99007ae652baebb0022bc495152841ef-300x300.jpg', '2020-07-10 13:29:45', '2020-07-10 13:29:45'),
(29, 7, 'z862954780510_2dcedbb1989f9cdf1ddf7b24fd5889cb.jpg', '2020-07-10 13:29:45', '2020-07-10 13:29:45'),
(30, 8, 'z860809575732_3a9782ee0802fa20d2e5ac7819a16506-330x587.jpg', '2020-07-10 13:37:08', '2020-07-10 13:37:08'),
(31, 8, 'z860809586025_91dc0bc62174815c2936ff9dbfbb220e.jpg', '2020-07-10 13:37:08', '2020-07-10 13:37:08'),
(32, 8, 'z860809602846_48b5c8ff8bb0770cedc7ce928eec46c5.jpg', '2020-07-10 13:37:08', '2020-07-10 13:37:08'),
(33, 9, 'z860816674856_a32b6a280d90f4192c9980d424bcf603.jpg', '2020-07-11 08:47:32', '2020-07-11 08:47:32'),
(34, 9, 'z860816709063_15398223d57fdb810d237e8958d59715.jpg', '2020-07-11 08:47:32', '2020-07-11 08:47:32'),
(35, 9, 'z860816717542_aa8511347dea9b59cf0551ca3baee441-680x797.jpg', '2020-07-11 08:47:32', '2020-07-11 08:47:32'),
(36, 9, 'z860816724731_b8e3154f6b4a10a50025bb0bc3a9e433-680x808.jpg', '2020-07-11 08:47:32', '2020-07-11 08:47:32'),
(37, 10, 'z860567061362_c0b64c7a0ca95b50f1e3eac6e6b7c1cb-680x510.jpg', '2020-07-11 08:56:25', '2020-07-11 08:56:25'),
(38, 10, 'z860567065240_0942946070d2e9b470c95f4d3edd40fb.jpg', '2020-07-11 08:56:25', '2020-07-11 08:56:25'),
(39, 10, 'z860567068876_40c2b016e3feeb421fc2f9fa124c90b8-680x510.jpg', '2020-07-11 08:56:25', '2020-07-11 08:56:25'),
(40, 10, 'z860567073878_f7246ab0acab6e6bfe7ba866d5351986-680x510.jpg', '2020-07-11 08:56:25', '2020-07-11 08:56:25'),
(41, 11, 'z857574384013_7fe7f3594f13de72eea0dec3a46b0b8b.jpg', '2020-07-11 09:01:12', '2020-07-11 09:01:12'),
(42, 11, 'z857574384705_c20a07023e75747091ce688445d8f2ba-680x680.jpg', '2020-07-11 09:01:12', '2020-07-11 09:01:12'),
(43, 11, 'z857574392334_f8a1f879ffc48681fae566528fc6442e-680x680.jpg', '2020-07-11 09:01:12', '2020-07-11 09:01:12'),
(44, 11, 'z857574395122_f25e06203c8fee357f1eba6979b6721b-680x680.jpg', '2020-07-11 09:01:12', '2020-07-11 09:01:12'),
(45, 11, 'z857574401039_668a9a3fe1ad7abe51dcadc6e99939c4.jpg', '2020-07-11 09:01:12', '2020-07-11 09:01:12'),
(46, 12, 'z857576768587_e978cb6743e5e6484345a6349f0c94d2-680x680.jpg', '2020-07-24 11:52:24', '2020-07-24 11:52:24'),
(47, 12, 'z857576773383_bcb471ef4e524b96f4a2733741dd611b-680x656.jpg', '2020-07-24 11:52:24', '2020-07-24 11:52:24'),
(48, 12, 'z857576775105_d5c5fb51411ab7b8d0867e624806befe.jpg', '2020-07-24 11:52:24', '2020-07-24 11:52:24'),
(49, 13, 'z857575375229_19ef9bdd4a703dc5abb778594f3569f7.jpg', '2020-07-24 12:05:00', '2020-07-24 12:05:00'),
(50, 13, 'z857575379358_157b469a400a9afc449294fe8fdc31eb.jpg', '2020-07-24 12:05:00', '2020-07-24 12:05:00'),
(51, 13, 'z857575382270_08d40461df9fbd55933723cfff090dd7.jpg', '2020-07-24 12:05:00', '2020-07-24 12:05:00'),
(52, 13, 'z857575390468_76147c7cddb78f06a46a403670d2bcd5-768x768.jpg', '2020-07-24 12:05:00', '2020-07-24 12:05:00'),
(53, 14, 'z856020490818_7c10f1d1eaca3fbcefa6f795fa2b59ac.jpg', '2020-07-29 05:54:08', '2020-07-29 05:54:08'),
(54, 14, 'z856020490873_04232a3f0b156eadd26211dd88921100.jpg', '2020-07-29 05:54:08', '2020-07-29 05:54:08'),
(55, 14, 'z856020490943_dfdd481ba3dce78b909e168769fd68de.jpg', '2020-07-29 05:54:08', '2020-07-29 05:54:08'),
(56, 14, 'z856020491170_ca37077bffa9945247e24371e5e8b817.jpg', '2020-07-29 05:54:08', '2020-07-29 05:54:08'),
(57, 14, 'z856020491206_92a99a32347cb8f7c833bda8f4335e55.jpg', '2020-07-29 05:54:08', '2020-07-29 05:54:08'),
(58, 15, 'z854698394129_34932281ec380f8ceaeeb034889a5fe2 (1).jpg', '2020-07-29 07:43:01', '2020-07-29 07:43:01'),
(59, 15, 'z854698402730_62e8b86e2f0dcb170e73cc85a578aad8.jpg', '2020-07-29 07:43:01', '2020-07-29 07:43:01'),
(60, 15, 'z854698420027_044b56c9163f3056d267c28e901c9470.jpg', '2020-07-29 07:43:01', '2020-07-29 07:43:01'),
(61, 15, 'z854698426140_4765d92a800584fff1ef34f8de29f386.jpg', '2020-07-29 07:43:01', '2020-07-29 07:43:01'),
(62, 15, 'z854698433689_a4c34079bf6b33b1322bc68caed999c7.jpg', '2020-07-29 07:43:01', '2020-07-29 07:43:01'),
(63, 16, 'z854698441625_b9b0b8c880150952b41204cc07c61fe6.jpg', '2020-07-29 07:49:03', '2020-07-29 07:49:03'),
(64, 16, 'z854698442732_bd73238da0134f5873b4f4c291eca2a3.jpg', '2020-07-29 07:49:03', '2020-07-29 07:49:03'),
(65, 16, 'z854698448221_0f19643882a787e666b834361a843cf9.jpg', '2020-07-29 07:49:03', '2020-07-29 07:49:03'),
(66, 17, 'z853992489782_a0ee31b9d6fb6e31d378138d0b5a54c2.jpg', '2020-07-29 07:51:56', '2020-07-29 07:51:56'),
(67, 17, 'z853992491730_79e28fb7533dff6e724fe121df3522e2.jpg', '2020-07-29 07:51:56', '2020-07-29 07:51:56'),
(68, 17, 'z853992720850_9f0842fd9d3fc87eed78ff9ba9300b39.jpg', '2020-07-29 07:51:56', '2020-07-29 07:51:56'),
(69, 17, 'z853992722412_3cb5cd9457ec207b380546a3555a99b8.jpg', '2020-07-29 07:51:56', '2020-07-29 07:51:56'),
(70, 18, 'z853992591207_fe4d3dad3d166476e3aceaa0880d6d01.jpg', '2020-07-29 08:01:24', '2020-07-29 08:01:24'),
(71, 18, 'z853992649607_024e02e24e19fa3a479cf6adf7e5fe4e.jpg', '2020-07-29 08:01:24', '2020-07-29 08:01:24'),
(72, 18, 'z853992689521_b5005a48e10f5b08f69898d217c81790.jpg', '2020-07-29 08:01:24', '2020-07-29 08:01:24'),
(73, 19, 'z853992530235_46fea5497cb8919d68581b3fc6dbc173.jpg', '2020-07-29 11:54:34', '2020-07-29 11:54:34'),
(74, 19, 'z853992625743_7bd70eebd22a7284feae29eed825b21a.jpg', '2020-07-29 11:54:34', '2020-07-29 11:54:34'),
(75, 19, 'z853992686676_e22decaa99a56f49817d07403fe870cb.jpg', '2020-07-29 11:54:34', '2020-07-29 11:54:34'),
(76, 19, 'z853992688501_17e054073234a65952a85aa86f72e5a1.jpg', '2020-07-29 11:54:34', '2020-07-29 11:54:34'),
(77, 19, 'z853992823856_c9f357a53a08b8524a1b57f32390c673.jpg', '2020-07-29 11:54:34', '2020-07-29 11:54:34'),
(78, 20, 'z853992458220_92ddd542715b5ff6ef1ee4dd501fe2e1-1.jpg', '2020-07-29 12:04:09', '2020-07-29 12:04:09'),
(79, 20, 'z853992489183_cdd1972e577c0d9ced60f88e562c40a8.jpg', '2020-07-29 12:04:09', '2020-07-29 12:04:09'),
(80, 20, 'z853992749408_881d5f5a71397fcc981c19f4583f81ce-1.jpg', '2020-07-29 12:04:09', '2020-07-29 12:04:09'),
(81, 20, 'z853992853670_38bae9df80e2480da691cee62da322b7.jpg', '2020-07-29 12:04:09', '2020-07-29 12:04:09'),
(82, 21, 'z854190444786_51f45517554c54e34a83cc70ef12d28f.jpg', '2020-07-30 06:32:06', '2020-07-30 06:32:06'),
(83, 21, 'z854216261978_30859bae9f001a302cdd6921c673f578.jpg', '2020-07-30 06:32:06', '2020-07-30 06:32:06'),
(84, 21, 'z854216263235_d5490dbffbf096092de58fcc1542104d.jpg', '2020-07-30 06:32:06', '2020-07-30 06:32:06'),
(85, 21, 'z854216263311_9cd9a2c36977d265e64682609ffdd11d.jpg', '2020-07-30 06:32:06', '2020-07-30 06:32:06'),
(86, 22, 'z853992453981_7fc2282c3f37609eadf7de03a1754c1c.jpg', '2020-07-30 07:17:15', '2020-07-30 07:17:15'),
(87, 22, 'z853992529951_a48d7cbc2f02b9f1fbacddc6f3f0c948.jpg', '2020-07-30 07:17:15', '2020-07-30 07:17:15'),
(88, 22, 'z853992655149_cf9da8da491ad182ea950d6ac87a882b.jpg', '2020-07-30 07:17:15', '2020-07-30 07:17:15'),
(89, 22, 'z853992822298_d88ad71c1d6b723491129fd1b897b90c.jpg', '2020-07-30 07:17:15', '2020-07-30 07:17:15'),
(90, 22, 'z853992883305_1d13acc747cf4adc54774e84b78d64cb.jpg', '2020-07-30 07:17:15', '2020-07-30 07:17:15'),
(91, 23, 'z853992378693_553294d1ceefec5e993e9ca03dd874b8 (1).jpg', '2020-08-06 10:44:26', '2020-08-06 10:44:26'),
(92, 23, 'z853992378693_553294d1ceefec5e993e9ca03dd874b8.jpg', '2020-08-06 10:44:26', '2020-08-06 10:44:26'),
(93, 23, 'z853992379215_fbf0821aa51b236e5c3ab70ae78ddd85-330x587.jpg', '2020-08-06 10:44:26', '2020-08-06 10:44:26'),
(94, 23, 'z853992381029_155bc7905c96a7df4ee394dedf434281.jpg', '2020-08-06 10:44:26', '2020-08-06 10:44:26'),
(95, 23, 'z853992381223_9de04c28f8db045a1458e5f53c08c108.jpg', '2020-08-06 10:44:26', '2020-08-06 10:44:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_new` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dateCreate` timestamp NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_new`, `title`, `img`, `content`, `status`, `dateCreate`, `dateUpdate`) VALUES
(1, 'Bắt trend dịch Covid-19, ốp smartphone in hình khẩu trang được thể trỗi dậy như được mùa', 'photo-1-1583744410152574211654.jpg', '<p style=\"text-align:justify\"><strong><span style=\"font-size:18px\">Mốt giờ phải gọi t&ecirc;n khẩu trang l&agrave; tr&ecirc;n hết, đi đ&acirc;u cũng cần mang theo người l&agrave;m dấu ấn phong c&aacute;ch bản th&acirc;n.</span></strong></p>\r\n\r\n<p style=\"text-align:justify\">T&igrave;nh h&igrave;nh dịch bệnh Covid-19 vẫn đang diễn biến phức tạp nhưng kh&ocirc;ng v&igrave; thế m&agrave; ch&uacute;ng ta lại dễ d&agrave;ng bỏ cuộc trong cuộc chiến nỗ lực chung tay g&oacute;p sức đối ph&oacute;. B&ecirc;n cạnh c&aacute;c biện ph&aacute;p tự bảo vệ bản th&acirc;n ph&ograve;ng tr&aacute;nh bệnh, những h&agrave;nh động nho nhỏ gi&uacute;p vực dậy tinh thần v&agrave; lan tỏa sự lạc quan, t&iacute;ch cực trong x&atilde; hội cũng l&agrave; điều v&ocirc; c&ugrave;ng đ&aacute;ng qu&yacute; v&agrave; n&ecirc;n được cổ vũ hơn bao giờ hết.</p>\r\n\r\n<p style=\"text-align:justify\">C&oacute; lẽ v&igrave; thế m&agrave; giới t&iacute;n đồ c&ocirc;ng nghệ mới đ&acirc;y lại đang rỉ tai nhau về một tr&agrave;o lưu bất ngờ:&nbsp;<strong>Trang tr&iacute; những chiếc smartphone th&acirc;n thuộc bằng ốp lưng in h&igrave;nh khẩu trang y tế c&oacute; một-kh&ocirc;ng-hai.</strong>&nbsp;Mỗi m&ugrave;a trong năm đều c&oacute; những bộ sưu tập thời trang nổi tiếng ra l&ograve; bởi nhiều t&ecirc;n tuổi lừng danh thế giới, vậy th&igrave; tại sao &quot;m&ugrave;a dịch corona&quot; kh&ocirc;ng c&oacute; một hot trend tương tự nhỉ?</p>\r\n\r\n<p style=\"text-align:justify\">Tuy chưa thực sự nổi đ&igrave;nh đ&aacute;m v&agrave; được chia sẻ tr&ecirc;n mạng x&atilde; hội như Facebook, nhưng chỉ cần l&ecirc;n t&igrave;m kiếm theo từ kh&oacute;a &quot;ốp khẩu trang&quot; hoặc tương tự tr&ecirc;n c&aacute;c nền tảng thương mại điện tử phổ biến, kh&aacute; nhiều kết quả sẽ được trả v&egrave; ngay lập tức. Mức gi&aacute; cao nhất cho một chiếc ốp in h&igrave;nh khẩu trang chỉ ở mức 90.000-100.000 đồng, ngang bằng hầu hết c&aacute;c loại ốp th&ocirc;ng dụng kh&aacute;c. Thậm ch&iacute;, nhiều shop b&aacute;n h&agrave;ng trực tuyến c&ograve;n c&oacute; nguồn h&agrave;ng gi&aacute; hời hơn, hạ xuống tận 20.000-30.000 đồng phục vụ c&aacute;c &quot;thượng đế&quot; bắt trend thoải m&aacute;i m&agrave; kh&ocirc;ng lo ch&aacute;y v&iacute;.</p>\r\n\r\n<p style=\"text-align:justify\">Được biết, t&ugrave;y shop m&agrave; người mua c&oacute; thể đặt trước nhu cầu l&agrave;m ốp cho nhiều loại smartphone kh&aacute;c nhau của nhiều thương hiệu. Chất liệu của những kiểu ốp khẩu trang n&agrave;y cũng kh&aacute; đa dạng, từ nhựa, silicon dẻo cho tới dạng &eacute;p k&iacute;nh, hoặc kim loại cứng c&aacute;p hơn. Trong khi đ&oacute;, mức gi&aacute; kh&ocirc;ng dao động qu&aacute; nhiều giữa những lựa chọn về vật liệu thiết kế khiến ch&uacute;ng c&agrave;ng trở n&ecirc;n dễ mua, dễ kiếm hơn bao giờ hết.</p>\r\n\r\n<p style=\"text-align:right\">Theo <strong>Tri Thức Trẻ</strong></p>\r\n', 0, '2020-07-11 13:45:29', '2020-07-12 07:11:35'),
(2, 'Người dùng sắp tới có thể tắt chế độ giảm hiệu năng vì chai pin trong bản ios sắp tới ', 'Iphone-Low-Battery-C.jpg', '<p style=\"text-align:justify\">Lại tiếp tục l&agrave; một th&ocirc;ng tin về những l&ugrave;m x&ugrave;m xung quanh việc Apple hạn chế hiệu năng của iPhone v&igrave; pin chai, lần n&agrave;y th&igrave; l&agrave; một th&ocirc;ng tin c&oacute; &yacute; nghĩa t&iacute;ch cực cho người d&ugrave;ng. Sau khi đ&atilde; giảm gi&aacute; thay pin cho những m&aacute;y iPhone cũ th&igrave; trong tương lai, Apple sẽ bổ sung t&iacute;nh năng theo d&otilde;i t&igrave;nh trạng pin v&agrave; c&oacute; thể cả t&iacute;nh năng cho ph&eacute;p tắt chế độ giảm hiệu năng m&aacute;y m&agrave; người d&ugrave;ng đang cảm thấy kh&oacute; chịu.</p>\r\n\r\n<p style=\"text-align:justify\">Th&ocirc;ng tin n&agrave;y được Tim Cook chia sẻ khi phỏng vấn với ABC News. Theo đ&oacute;, trong bản cập nhật iOS trong th&aacute;ng tới, Apple sẽ bổ sung khả năng theo d&otilde;i t&igrave;nh trạng pin trong mục Pin (truy cập từ C&agrave;i đặt), người d&ugrave;ng sẽ c&oacute; thể biết khi n&agrave;o cần thay pin, pin đ&atilde; chai v&agrave; c&oacute; ảnh hưởng tới hiệu năng m&aacute;y hay kh&ocirc;ng ngay từ đ&acirc;y.</p>\r\n\r\n<p style=\"text-align:justify\">Ngo&agrave;i ra, một th&ocirc;ng tin rất hấp dẫn kh&aacute;c m&agrave; Tim Cook tiết lộ l&agrave; cho ph&eacute;p người d&ugrave;ng tắt chế độ giảm hiệu năng để tr&aacute;nh việc m&aacute;y tắt đột ngột, thay v&agrave;o đ&oacute; l&agrave; duy tr&igrave; hiệu năng gốc của GPU v&agrave; CPU mặc cho pin đ&atilde; chai. Nếu đ&acirc;y l&agrave; th&ocirc;ng tin thực sự th&igrave; r&otilde; r&agrave;ng Apple đ&atilde; lắng nghe người d&ugrave;ng v&agrave; đưa quyền tự quyết cho họ (kh&ocirc;ng &eacute;p thay pin hay &eacute;p giảm hiệu năng nữa). Chắc hẳn nhiều người d&ugrave;ng sẽ cảm thấy hạnh ph&uacute;c về điều n&agrave;y.</p>\r\n\r\n<p style=\"text-align:justify\">Trước đ&oacute;, ch&iacute;nh Apple thừa nhận h&agrave;nh động giảm hiệu năng m&aacute;y iPhone cũ để tr&aacute;nh m&aacute;y tắt đột ngột v&igrave; pin kh&ocirc;ng cung cấp đủ nguồn. Apple sau đ&oacute; phải l&ecirc;n tiếng đ&iacute;nh ch&iacute;nh v&agrave; giảm gi&aacute; thay pin cho to&agrave;n bộ người d&ugrave;ng. Thậm ch&iacute;, họ c&ograve;n đối mặt với nhiều đơn kiện từ ph&iacute;a người d&ugrave;ng.</p>\r\n\r\n<p style=\"text-align:right\"><em>Nguồn: Engadget, 9to5 Mac, ABC News​</em></p>\r\n', 0, '2020-07-12 04:12:55', '2020-07-12 07:09:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `product_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `img_1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img_2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `id_type`, `product_name`, `amount`, `img_1`, `img_2`, `price`, `content`, `dateCreated`, `dateUpdate`) VALUES
(1, 1, 'Ốp lưng mèo có dây đeo', 93, 'z864184925849_8079cb7fef2c9b05f3d73063131171cc.jpg', 'z864184907996_a7b8e3f00a2df892cbc5c5d5c753250b.jpg', 100000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; m&oacute;c treo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; X</li>\r\n</ul>\r\n', '2020-07-10 10:44:20', '2020-07-10 12:30:04'),
(2, 2, 'Ốp lưng mèo có chuông mèo con', 100, 'z864184921393_4e0a362c8a620453fc0350db37dd04e2.jpg', 'z864184920718_67d50c01ab0bd60db3b1a9b1fac46f1f-1.jpg', 100000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; m&oacute;c đeo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; X</li>\r\n</ul>\r\n', '2020-07-10 10:49:27', '2020-07-10 12:18:36'),
(3, 3, 'Ốp lưng mèo đón tết có móc treo', 100, 'z864184928695_951ce86cee392befcc83d25bf1a126e6.jpg', 'z864184926755_2b92cb3b87acee217799b2c388681a79.jpg', 100000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; m&oacute;c đeo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; X</li>\r\n</ul>\r\n', '2020-07-10 12:25:38', '2020-07-10 12:25:38'),
(4, 4, 'Ốp lưng hạt có móc đeo', 3, 'z864184931684_c26a28a82709e177fc54a3cb67afd023.jpg', 'z864184910601_771230653b8553e30fad79225653a9d3.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; m&oacute;c treo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; X</li>\r\n</ul>\r\n', '2020-07-10 12:32:42', '2020-07-10 12:32:42'),
(5, 5, 'Ốp lưng keizo có dây đeo', 52, 'z864184907928_c59ee5869b68c4d7c283972a5bd95842.jpg', 'z864184913928_2770e0424cc8ccb141ebbdd3f214beb1.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; m&oacute;c treo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; X</li>\r\n</ul>\r\n', '2020-07-10 12:35:36', '2020-07-10 12:35:36'),
(6, 6, 'Ốp lưng dẻo PDF có dây đeo', 11, 'z864479635418_6a3ac6744cefd85fae56ee422e225673-copy.jpg', 'z864479638013_44332258ce2989df69787e784cd9c6dd-copy.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iphone 6 -&gt; X</li>\r\n	<li>C&oacute; d&acirc;y đeo</li>\r\n</ul>\r\n', '2020-07-10 12:42:38', '2020-07-10 12:42:38'),
(7, 7, 'Ốp mèo may mắn có móc khóa', 46, 'z862954780510_2dcedbb1989f9cdf1ddf7b24fd5889cb.jpg', 'z862943793763_3627b83553744711fbfc586788f62f7d.jpg', 120000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>K&egrave;m m&oacute;c kho&aacute; xinh xắn</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-10 13:27:14', '2020-07-10 13:30:45'),
(8, 8, 'Ốp mèo may mắn đón tết', 0, 'z860809586025_91dc0bc62174815c2936ff9dbfbb220e.jpg', 'z860809575732_3a9782ee0802fa20d2e5ac7819a16506-330x587.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6-&gt;x</li>\r\n</ul>\r\n', '2020-07-10 13:36:48', '2020-07-10 13:36:48'),
(9, 9, 'Ốp lưng thỏ', 60, 'z860816674856_a32b6a280d90f4192c9980d424bcf603.jpg', 'z860816709063_15398223d57fdb810d237e8958d59715.jpg', 70000, '<ul>\r\n	<li>Chất liệu nhựa dẻo</li>\r\n	<li>Đủ d&ograve;ng iPhone 6-&gt;x</li>\r\n</ul>\r\n', '2020-07-11 08:44:42', '2020-07-24 05:12:49'),
(10, 10, 'Ốp lưng chữ WHAT', 12, 'z860567065240_0942946070d2e9b470c95f4d3edd40fb.jpg', 'z860567061362_c0b64c7a0ca95b50f1e3eac6e6b7c1cb.jpg', 70000, '<ul>\r\n	<li>Chất liệu nhựa cứng</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6-&gt;x</li>\r\n</ul>\r\n', '2020-07-11 08:50:44', '2020-07-11 08:53:56'),
(11, 11, 'Ốp lưng trái cây cực xinh', 23, 'z857574401039_668a9a3fe1ad7abe51dcadc6e99939c4.jpg', 'z857574384013_7fe7f3594f13de72eea0dec3a46b0b8b.jpg', 90000, '<ul>\r\n	<li>Chất liệu nhựa dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-11 08:58:50', '2020-07-11 08:58:50'),
(12, 13, 'Ốp lưng I am peace love world', 25, 'z857576768587_e978cb6743e5e6484345a6349f0c94d2.jpg', 'z857576773383_bcb471ef4e524b96f4a2733741dd611b.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng từ iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-24 11:49:53', '2020-07-24 11:55:44'),
(13, 5, 'Ốp lưng hoa đào', 25, 'z857575382270_08d40461df9fbd55933723cfff090dd7.jpg', 'z857575375229_19ef9bdd4a703dc5abb778594f3569f7.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng từ iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-24 12:00:13', '2020-07-24 12:06:30'),
(14, 7, 'Ốp lưng gấu Panda', 37, 'z856020490818_7c10f1d1eaca3fbcefa6f795fa2b59ac.jpg', 'z856020490873_04232a3f0b156eadd26211dd88921100.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-29 05:45:50', '2020-07-29 05:45:50'),
(15, 4, 'Ốp SMILE tim màu đen', 23, 'z854698394129_34932281ec380f8ceaeeb034889a5fe2.jpg', 'z854698402730_62e8b86e2f0dcb170e73cc85a578aad8.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-29 07:40:13', '2020-07-29 08:03:40'),
(16, 13, 'Ốp lưng cặp You and Me', 99, 'z854698442732_bd73238da0134f5873b4f4c291eca2a3.jpg', 'z854698441625_b9b0b8c880150952b41204cc07c61fe6.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-29 07:45:22', '2020-07-29 07:46:01'),
(17, 5, 'Ốp tim Milano', 15, 'z853992720850_9f0842fd9d3fc87eed78ff9ba9300b39.jpg', 'z853992489782_a0ee31b9d6fb6e31d378138d0b5a54c2.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-29 07:50:52', '2020-07-29 07:50:52'),
(18, 5, 'Ốp lưng siêu anh hùng', 39, 'z853992591207_fe4d3dad3d166476e3aceaa0880d6d01.jpg', 'z853992649607_024e02e24e19fa3a479cf6adf7e5fe4e.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>Đủ c&aacute;c d&ograve;ng iPhone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-29 07:53:27', '2020-07-29 07:53:27'),
(19, 12, 'Ốp lưng Snoopy', 14, 'z853992686676_e22decaa99a56f49817d07403fe870cb.jpg', 'z853992530235_46fea5497cb8919d68581b3fc6dbc173.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; đủ c&aacute;c d&ograve;ng từ iphone 6 -&gt; x</li>\r\n	<li>C&oacute; 2 m&agrave;u: Xanh, đỏ</li>\r\n</ul>\r\n', '2020-07-29 11:52:45', '2020-07-29 11:52:45'),
(20, 3, 'Ốp sọc caro vàng', 60, 'z853992853670_38bae9df80e2480da691cee62da322b7.jpg', 'z853992489183_cdd1972e577c0d9ced60f88e562c40a8.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; đủ c&aacute;c d&ograve;ng từ iphone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-29 12:03:41', '2020-07-29 12:03:41'),
(21, 6, 'Ốp lưng Be Happy Alway', 31, 'z854216261978_30859bae9f001a302cdd6921c673f578.jpg', 'z854190444786_51f45517554c54e34a83cc70ef12d28f.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; đủ c&aacute;c d&ograve;ng từ iphone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-30 06:27:56', '2020-07-30 07:02:46'),
(22, 2, 'Ốp nai hồng', 13, 'z853992822298_d88ad71c1d6b723491129fd1b897b90c-330x587.jpg', 'z854190444786_51f45517554c54e34a83cc70ef12d28f-330x587.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo</li>\r\n	<li>C&oacute; đủ c&aacute;c d&ograve;ng từ iphone 6 -&gt; x</li>\r\n</ul>\r\n', '2020-07-30 07:16:16', '2020-07-30 07:31:58'),
(23, 6, 'Ốp in hình hoa cực sang trọng', 4, 'z853992297565_bd1fb93a6fad2a20c84d29d33141111e-330x587.jpg', 'z853992379215_fbf0821aa51b236e5c3ab70ae78ddd85-330x587.jpg', 90000, '<ul>\r\n	<li>Chất liệu silicon dẻo, gắn v&agrave;o m&aacute;y cực sang trọng nh&eacute;</li>\r\n	<li>C&oacute; 3 mẫu: Hoa t&iacute;m, hoa trắng 4 b&ocirc;ng v&agrave; hoa trắng 3 c&agrave;nh</li>\r\n</ul>\r\n\r\n<p>Khi đặt h&agrave;ng c&aacute;c bạn nhớ commen', '2020-08-06 10:31:06', '2020-08-06 10:47:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id_rate` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`id_rate`, `id_product`, `name_user`, `email`, `comment`, `dateCreate`, `dateUpdate`) VALUES
(1, 10, 'Ngọc Diệu', 'tsunadehoa01@gmail.com', 'Mẫu mã đẹp', '2020-07-11 10:11:42', '2020-07-11 10:11:42'),
(2, 1, 'Nguyễn An Hòa', 'hoanguyenan2808@gmail.com', 'Đã đặt, 2 màu đều đẹp, có dây đeo chắc chắn', '2020-07-22 07:04:14', '2020-07-22 07:04:14'),
(3, 21, 'Nguyễn An Hòa', 'hoanguyenan2808@gmail.com', 'Sản phẩm tốt', '2020-10-02 00:15:18', '2020-10-02 00:15:18'),
(4, 5, 'Nguyễn An Hòa', 'hoanguyenan2808@gmail.com', 'Tốt', '2020-10-02 03:43:44', '2020-10-02 03:43:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id_type` int(11) NOT NULL,
  `type_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id_type`, `type_name`, `status`, `dateCreated`, `dateUpdate`) VALUES
(1, 'Iphone 5/5S', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(2, 'Iphone 6/6S', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(3, 'Iphone 6 plus/6S plus', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(4, 'Iphone 7', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(5, 'Iphone 7 plus', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(6, 'Iphone 8', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(7, 'Iphone 8 plus', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(8, 'Iphone x/xs', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(9, 'Iphone xs max', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(10, 'Iphone 11', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(11, 'Iphone 11 pro', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(12, 'Iphone 11 pro max', 1, '2020-06-05 10:30:39', '2020-06-05 10:30:39'),
(13, 'Ốp lưng couple', 1, '2020-06-05 10:37:46', '2020-06-05 10:37:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` timestamp NULL DEFAULT current_timestamp(),
  `dateUpdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `dateCreated`, `dateUpdate`) VALUES
(1, 'Nguyễn An Hòa', 'hoanguyenan2808@gmail.com', '$2y$10$ie2a7ZwyVKrp0PgwZYIZT.JQUWUi1jjurD0VVYr6rtu5BwWP8pJY2', '0339406440', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', '2020-07-10 10:40:35', '2020-07-20 13:19:36'),
(2, 'Ngọc Diệu', 'tsunadehoa01@gmail.com', '$2y$10$Zv.6TNROlSSC1MnqYqD3T.IqGymtCnKZW3Z/iCxyPnRfaR9M5CEVi', '0929344311', '7 Xã Đàn, Phương Liên, Đống Đa, Hà Nội', '2020-07-22 06:13:35', '2020-07-22 06:13:35'),
(3, 'Huỳnh Trọng Trường', 'abc@gmail.com', '$2y$10$BQg6bSBm.ys4Gdx1ctLp.O35v7T3hW4OTkcnCc2FdXdbdOpoRomJ6', '0339406440', 'Hà Nội', '2020-08-06 10:23:49', '2020-08-06 10:23:49'),
(4, 'Nam', 'xyz@gmail.com', '$2y$10$DYpc72XNj8xRnL9m1H3dhOGbv0R55.T4Zt1yq17aHyANuhL42oks.', '0339406440', '137/58 Thoại Ngọc Hầu, P. Phú Thạnh, Q. Tân Phú, TP. Hồ Chí Minh', '2020-08-07 02:58:39', '2020-08-07 02:58:39'),
(5, '', '', '', '', '', '2020-08-24 09:14:08', '2020-08-24 09:14:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `FK_CART_USER` (`id_user`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DETAIL_PRO` (`id_product`),
  ADD KEY `FK_DETAIL_CART` (`id_cart`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PRO_IMG` (`id_product`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_new`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_PRO_TYPE` (`id_type`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id_rate`),
  ADD KEY `FK_RATE_PRO` (`id_product`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id_type`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_CART_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `FK_DETAIL_CART` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DETAIL_PRO` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `FK_PRO_IMG` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PRO_TYPE` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `FK_RATE_PRO` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
