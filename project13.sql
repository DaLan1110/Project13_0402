-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 04 月 03 日 08:31
-- 伺服器版本： 8.0.36-0ubuntu0.22.04.1
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project13`
--
CREATE DATABASE IF NOT EXISTS `project13` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `project13`;

-- --------------------------------------------------------

--
-- 資料表結構 `member_account`
--

CREATE TABLE `member_account` (
  `ID` int NOT NULL,
  `Account` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員帳號',
  `Pwd` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員密碼',
  `UID01` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '登入UID01',
  `Level` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '等級',
  `Permissions` int NOT NULL COMMENT '會員權限',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '會員資料建立時間',
  `Update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '會員資料更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member_account`
--

INSERT INTO `member_account` (`ID`, `Account`, `Pwd`, `UID01`, `Level`, `Permissions`, `Created_at`, `Update_at`) VALUES
(51, 'admin', '$2y$10$a4XkWdtN9ETGkP4c0PUeuO3lZn6R.gP7d/Yk37xhoNGdGsI1LdrSS', '8d3eed8a', '1', 1, '2024-03-15 00:58:31', '2024-04-02 02:30:44'),
(83, 'owner01', '$2y$10$64EOYBqUVeFfdZortlCu1O33KaDzomV/R/29uryAl6K0AdZNtK4eC', '36b1047d', '100', 1, '2024-03-18 02:23:11', '2024-03-26 03:43:38'),
(84, 'owner02', '$2y$10$Fcoew3xzi1rbzh9Re4eDSusQaYHFis7CesDF3IO/4zjaG/2HooQVO', '477b8934', '100', 0, '2024-03-19 05:23:35', '2024-03-26 01:38:18'),
(85, 'owner03', '$2y$10$0HUBF6avOg0la0V6C1eVNe5wwsIruWC23KVnRTZv8XvpyB8uL7oN.', 'aa22a02b', '90', 1, '2024-03-26 00:45:39', '2024-03-26 03:43:44'),
(86, 'owner04', '$2y$10$UXSmoWxjCZWggcjILJL4duFtVjr9G./qZy/PuiaOqm/RqFHiPL09W', 'c852ae98', '100', 1, '2024-03-26 00:46:03', '2024-03-26 01:38:28'),
(87, 'owner05', '$2y$10$Mf8CrQHIXFmivOHYLX8eW.jhJouv4Pxrru2bMxbwmMmb9Z/OFSVH6', 'b3aaff50', '90', 1, '2024-03-26 00:46:45', '2024-03-26 01:38:26'),
(88, 'owner07', '$2y$10$tYhKAoVh2LjdLUYNvBLwZ.4sR0BUTirfnBj2wFh9IPDIKMZjoa3li', 'f40e835f', '90', 1, '2024-03-26 01:33:04', '2024-03-26 01:38:31'),
(89, 'zxcvbnm', '$2y$10$yCA9rNJctME7SKRQiAI2P.W./EQFOVst/er.83Koq41WRpoh2Nqju', '68519648', '1', 1, '2024-03-26 03:41:41', '2024-03-26 03:41:51'),
(90, 'hank', '$2y$10$vAeu5RQqAQTJJQooUYNEDuSeeRzLYOhPOJXY14mTJHs6ckDz414S6', '4b896673', '1', 1, '2024-03-26 03:41:50', '2024-03-26 03:42:01'),
(91, 'jackif', '$2y$10$qgyUKTsG3RwM27ZLbHZIaeQ2gkCn1Vo28vVjF5qdI4j7sy7aw90sW', 'a427b52c', '1', 1, '2024-03-26 03:41:51', '2024-03-26 03:42:05'),
(92, 'richie99', '$2y$10$wcw2p.n/56WjvWyZPvnR/e/B07hTVUIAS9UQsA6JS9SPg5EKlJfIW', '91bd8838', '1', 1, '2024-03-26 03:41:53', '2024-03-26 03:46:46'),
(93, '040310', '$2y$10$HJYjnYJY/qAbOHhg/DNraOVqMQ7WP4ryDX8MQq52yjr.quCQI4R/W', '80c8d559', '1', 1, '2024-03-26 03:41:53', '2024-03-26 03:42:03'),
(94, 'user01', '$2y$10$w0JEekQVSUNE0xEUhiMIZuvcw.Jr0SrtY6DaSffBFVtv6.Btone0G', 'bd47d994', '1', 1, '2024-03-26 03:41:58', '2024-03-26 03:42:13'),
(95, '11111', '$2y$10$rCtuiXfEgNxuM9eMM.iXb./G.Z3h3sAPGxmAY6B5oojoSZiccbTUq', 'eb653588', '1', 1, '2024-03-26 03:41:58', '2024-03-26 03:46:16'),
(96, 'parker', '$2y$10$MEHSGN82bFDeBC9IzDzCg.HTaVkmaAVMnCyIj9wKx2BnvrFnmKfRe', '821c60b8', '1', 1, '2024-03-26 03:42:02', '2024-03-26 03:42:13'),
(97, 'Winny', '$2y$10$hFBIu/ZS1O5jF1VoQGHQrO8.lELyff5unR3CX9aZJAhNsqBbXW1/O', '375e72b9', '1', 1, '2024-03-26 03:42:08', '2024-03-26 03:42:21'),
(98, 'test26', '$2y$10$TgRgK5vKL18wyJe3RDW8Ku9Z.izqwgQYHicVKU6elAS3nsdEEd29i', '1c2bfcf2', '1', 1, '2024-03-26 03:42:13', '2024-03-26 03:42:32'),
(99, 'soley', '$2y$10$flfTHp3l3VSQmynDhpAczep.8MAnGdjwLDE2J6rSBdqb0OtEkVY3i', 'a80e08c6', '1', 1, '2024-03-26 03:42:16', '2024-03-26 03:43:34'),
(100, '真不愧是暗影大人', '$2y$10$o6lAYHiEofnKlYVNyFT9I.S9jqrjPk/w9HLi5UHXVRqHBZnVXYR7u', '43a6624b', '1', 1, '2024-03-26 03:42:17', '2024-03-26 03:42:33'),
(101, 'cigua', '$2y$10$3gsvLqzQIJOZBuQP4Co0OOU6YgSof5GtmWVnxOWpl0OUDa868oHr.', '431c7d02', '1', 1, '2024-03-26 03:42:48', '2024-03-26 03:43:04'),
(102, 'owner999', '$2y$10$CClWo12fcP9lFFpkMiSfhukqcJcnIYL.qJXB9VcjtxjPg7s7Gc5oW', '80134d2e', '1', 1, '2024-03-26 03:42:49', '2024-03-26 03:46:13'),
(103, 'cheng', '$2y$10$DzZE/v.7RcVQPfrD1TWXNOY7KHrFnE/ArmQb7Tui/UqJaa2FCgoym', 'c0a07f87', '1', 1, '2024-03-26 03:43:24', '2024-03-26 03:43:38'),
(104, 'soley01', '$2y$10$h9XNRKN30BXxfl7Whx7aCuAN/CeTks58Sf5t0/KOkZA2qSUco2F/S', '1ba098c1', '100', 1, '2024-03-26 03:43:27', '2024-03-26 03:43:27'),
(105, 'owner998', '$2y$10$.dclcm9.KeW80jxjYAgZauEl2NCSeXvCUydrLyC/QiaZrF81Fnree', 'f0fb8ed5', '100', 1, '2024-03-26 03:43:36', '2024-03-26 03:47:57'),
(106, 'test123', '$2y$10$2zWtikzjT/4bUKhvB0JErey0wOkFEAufsnKeJJVwP0ielZWJ2JY7.', 'd41ff1f8', '100', 1, '2024-03-26 03:44:03', '2024-03-26 03:44:15'),
(107, 'test0019', '$2y$10$OI2h/aOENQWkXxe6/GKBZuEpZkH7RT3VKherkjyz0Wt9rXOgbHZlq', '5b75622a', '100', 1, '2024-03-26 03:44:36', '2024-03-26 03:44:46'),
(108, 'test12', '$2y$10$bi1/wQCNT8HnXq.VT.Gfy.j5AmBXUHW0sO9XQchENu0D6R27pRLPm', '4c83d079', '1', 1, '2024-03-26 03:46:34', '2024-03-26 03:46:53'),
(109, 'test019', '$2y$10$YZnbnlGAAqpZaOCQKc2G3ukCve2Rem8PdBuWQBHfG6pdjV21SGVk.', '63f12675', '1', 1, '2024-03-26 03:48:27', '2024-03-26 03:48:40');

-- --------------------------------------------------------

--
-- 資料表結構 `member_personal`
--

CREATE TABLE `member_personal` (
  `ID` int NOT NULL,
  `UserId` int DEFAULT NULL COMMENT 'member_account_ID',
  `UserName` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '會員姓名',
  `NickName` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '會員暱稱',
  `Gender` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '會員性別',
  `Mobile` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '行動電話',
  `Email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電子郵件',
  `Birthday` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '會員生日',
  `Address` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '會員地址',
  `Photo` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '會員照片',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '會員資料建立時間',
  `Update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '會員資料更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member_personal`
--

INSERT INTO `member_personal` (`ID`, `UserId`, `UserName`, `NickName`, `Gender`, `Mobile`, `Email`, `Birthday`, `Address`, `Photo`, `Created_at`, `Update_at`) VALUES
(87, 51, 'Master', 'Mm', '男性', '0912345678', '1111111111', NULL, '1234567811', NULL, '2024-03-15 00:58:31', '2024-04-02 02:31:03'),
(115, 83, 'Userd9538', '女性', '女性', '0912345678', '11111', '19860604', 'qwe', NULL, '2024-03-18 02:23:11', '2024-03-26 03:43:38'),
(116, 84, '123456', '女性', '女性', '0912345678', '12348', '1980/07/20', '1111111', NULL, '2024-03-19 05:23:35', '2024-03-26 03:42:41'),
(117, 85, 'User51a50', NULL, NULL, '1234567890', '1234567', NULL, NULL, NULL, '2024-03-26 00:45:39', '2024-03-26 00:45:39'),
(118, 86, 'User925de', NULL, NULL, '1234567890', '12345678', NULL, NULL, NULL, '2024-03-26 00:46:03', '2024-03-26 00:46:03'),
(119, 87, 'Userc4941', NULL, NULL, '0912345678', '1234567', NULL, NULL, NULL, '2024-03-26 00:46:45', '2024-03-26 00:46:45'),
(120, 88, 'User189e2', NULL, NULL, '0912345678', '123456', NULL, NULL, NULL, '2024-03-26 01:33:04', '2024-03-26 01:33:04'),
(121, 89, 'Usere433c', 'zxcvbnm', '男性', '0123456789', 'zxcvbnm', NULL, 'zxcvbnm', NULL, '2024-03-26 03:41:41', '2024-03-26 03:42:43'),
(122, 90, 'User55e95', NULL, NULL, '0966666666', '@gmail', NULL, NULL, NULL, '2024-03-26 03:41:50', '2024-03-26 03:41:50'),
(123, 91, '以夫', 'jack', '男性', '0912878787', '123@tcnr.com', NULL, '1234567', NULL, '2024-03-26 03:41:51', '2024-03-26 03:47:42'),
(124, 92, 'User271e7', NULL, NULL, '0910563124', 'richie99@fff', NULL, NULL, NULL, '2024-03-26 03:41:53', '2024-03-26 03:41:53'),
(125, 93, 'User4301a', '040310', '男性', '0403100403', '040310', NULL, '040310', NULL, '2024-03-26 03:41:53', '2024-03-26 03:47:12'),
(126, 94, 'gluco', 'gluco', '男性', '0912345678', 'gluco0720@gmail.com', NULL, '1111111', NULL, '2024-03-26 03:41:58', '2024-03-26 03:47:42'),
(127, 95, '我是俊發', '嘿嘿', '男性', '3215588881', 'kev@hotma', NULL, 'dsDSdsasad', NULL, '2024-03-26 03:41:58', '2024-03-26 03:47:55'),
(128, 96, 'Parker', 'PK', '男性', '0987654321', 'test@test.com', NULL, '321654', NULL, '2024-03-26 03:42:02', '2024-03-26 03:43:06'),
(129, 97, 'Winny', '明明', '女性', '1234561234', '123456', NULL, 'zzzzzzzzzzzzzzzzzzzzzz', NULL, '2024-03-26 03:42:08', '2024-03-26 03:47:55'),
(130, 98, 'Userec708', NULL, NULL, '0985898589', 'test26', NULL, NULL, NULL, '2024-03-26 03:42:13', '2024-03-26 03:42:13'),
(131, 99, 'Usere54eb', NULL, NULL, '0000000000', '000000', NULL, NULL, NULL, '2024-03-26 03:42:16', '2024-03-26 03:42:16'),
(132, 100, 'User4ff05', NULL, NULL, '1234567890', '1111', NULL, NULL, NULL, '2024-03-26 03:42:17', '2024-03-26 03:42:17'),
(133, 101, 'User59342', NULL, NULL, '0000000000', 'test', NULL, NULL, NULL, '2024-03-26 03:42:48', '2024-03-26 03:42:48'),
(134, 102, 'kkk', 'kkk', '男性', '0900000000', 'teste', NULL, 'kkkkkkkkk', NULL, '2024-03-26 03:42:49', '2024-03-26 03:47:12'),
(135, 103, 'Userf277f', NULL, NULL, '0919220871', 'cheng@test.com', NULL, NULL, NULL, '2024-03-26 03:43:24', '2024-03-26 03:43:24'),
(136, 104, 'User32b6d', NULL, NULL, '0000000000', '000000', NULL, NULL, NULL, '2024-03-26 03:43:27', '2024-03-26 03:43:27'),
(137, 105, 'User2b9f7', NULL, NULL, '0900000000', 'teste', NULL, NULL, NULL, '2024-03-26 03:43:36', '2024-03-26 03:43:36'),
(138, 106, 'Usera855b', NULL, NULL, '9999999999', 'test@test.com', NULL, NULL, NULL, '2024-03-26 03:44:03', '2024-03-26 03:44:03'),
(139, 107, 'Usera7db2', NULL, NULL, '0968720683', 'tk303@gmail.com', NULL, NULL, NULL, '2024-03-26 03:44:36', '2024-03-26 03:44:36'),
(140, 108, 'User725a8', '111', '男性', '7777777777', '123456', NULL, '台中市工業路', NULL, '2024-03-26 03:46:34', '2024-03-26 03:48:10'),
(141, 109, 'User345fa', NULL, NULL, '0968720683', 'tk303@gmail.com', NULL, NULL, NULL, '2024-03-26 03:48:27', '2024-03-26 03:48:27');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ID` int NOT NULL,
  `LayerId` int DEFAULT NULL COMMENT '分類ID',
  `AddId` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '加料ID',
  `Product_Name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '產品名稱',
  `Product_Price` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '產品價格',
  `Product_Content` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '產品介紹',
  `Product_Photo` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '產品圖示',
  `Update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新時間',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`ID`, `LayerId`, `AddId`, `Product_Name`, `Product_Price`, `Product_Content`, `Product_Photo`, `Update_at`, `Created_at`) VALUES
(81, 32, '不加料', '紅茶', '35', '好喝!!111', '20240322151849_65fd30d9b51eb_冰紅茶特大杯.png', '2024-03-22 07:18:42', '2024-03-22 07:18:42'),
(82, 25, '18, 17', '原味吐司', '38', 'wqewe', '20240325083017_6600c5995239a_照燒里肌土司.png', '2024-03-25 00:30:17', '2024-03-25 00:30:17'),
(83, 24, '19', '原味漢堡', '45', '!!!!', '20240325135345_66011169e1ba8_卡拉雞腿堡.png', '2024-03-25 05:53:45', '2024-03-25 05:53:45'),
(84, 32, '不加料', '111', '27', '111', '20240326114022_660243a62f35c_cake05.jpg', '2024-03-26 03:40:22', '2024-03-26 03:40:22'),
(85, 24, '23, 19', '美味蟹堡', '80', '底哩穴爹斯', '20240326114320_6602445816d8e_發稿照4-mcplant-植物系漢堡-單點124元-地瓜套餐192元-1661134945.png', '2024-03-26 03:43:20', '2024-03-26 03:43:20'),
(86, 32, '19, 18', '蛋糕', '27', 'ffff', '20240326114357_6602447d65695_cake01.jpg', '2024-03-26 03:43:57', '2024-03-26 03:43:57'),
(87, 34, '19, 18, 17', '蛋糕', '45', '測試測試', '20240326114402_66024482a6c67_cake.jpg', '2024-03-26 03:44:02', '2024-03-26 03:44:02'),
(88, 29, '19', '生日蛋糕', '100', '很好吃', '20240326114417_66024491526d3_sweetcake03.jpg', '2024-03-26 03:44:17', '2024-03-26 03:44:17'),
(89, 29, '22, 17', '整顆南瓜', '20', '瓜瓜瓜', '20240326114431_6602449faeaf6_pumpkin.jpg', '2024-03-26 03:44:31', '2024-03-26 03:44:31'),
(90, 32, '19', '珍珠奶茶', '60', '糾喝拎', '20240326114436_660244a4e20b6_20230311000983.jpg', '2024-03-26 03:44:36', '2024-03-26 03:44:36'),
(91, 29, '22, 19, 18, 17', '天窗', '64', '天窗，好吃', '20240326114439_660244a77340b_skywindows.jpg', '2024-03-26 03:44:39', '2024-03-26 03:44:39'),
(92, 36, '18', '蘿蔔糕', '35', '111', '20240326114453_660244b58641f_009_dylan-hunter-vSiE9-jN2wo-unsplash.jpg', '2024-03-26 03:44:53', '2024-03-26 03:44:53'),
(93, 36, '19, 17', '炸雞排', '100', '很大片', '20240326114517_660244cd381fc_chicken2.jpg', '2024-03-26 03:45:17', '2024-03-26 03:45:17'),
(94, 35, '22', '四季養生粥', '20', '香氣撲鼻 暖胃暖心', '20240326114526_660244d6dbdb1_M-02-login-3.png', '2024-03-26 03:45:26', '2024-03-26 03:45:26');

-- --------------------------------------------------------

--
-- 資料表結構 `product_add`
--

CREATE TABLE `product_add` (
  `ID` int NOT NULL,
  `Add_Name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '加料名稱',
  `Update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_add`
--

INSERT INTO `product_add` (`ID`, `Add_Name`, `Update_at`, `Created_at`) VALUES
(17, '起司', '2024-03-21 05:31:47', '2024-03-21 05:31:47'),
(18, '醬油', '2024-03-21 05:31:54', '2024-03-21 05:31:54'),
(19, '番茄醬', '2024-03-21 05:32:00', '2024-03-21 05:32:00'),
(22, '薑香麻油', '2024-03-26 03:43:41', '2024-03-26 03:43:41'),
(23, '墨西哥辣醬', '2024-03-26 03:45:59', '2024-03-26 03:45:59');

-- --------------------------------------------------------

--
-- 資料表結構 `product_layer`
--

CREATE TABLE `product_layer` (
  `ID` int NOT NULL,
  `Layer_Name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品類別',
  `Update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '建檔時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_layer`
--

INSERT INTO `product_layer` (`ID`, `Layer_Name`, `Update_at`, `Created_at`) VALUES
(23, '蛋餅', '2024-03-18 06:25:35', '2024-03-18 06:25:35'),
(29, '輕鬆小點', '2024-03-19 07:18:43', '2024-03-19 07:18:43'),
(32, '飲品', '2024-03-22 07:18:12', '2024-03-22 07:18:12'),
(33, '全部', '2024-03-25 00:54:24', '2024-03-25 00:54:24'),
(34, 'demo', '2024-03-26 03:43:27', '2024-03-26 03:43:27'),
(35, '粥品', '2024-03-26 03:44:00', '2024-03-26 03:44:00'),
(36, '中式餐點', '2024-03-26 03:44:14', '2024-03-26 03:44:14'),
(37, '煎餃', '2024-03-26 03:44:29', '2024-03-26 03:44:29'),
(38, '吐司', '2024-04-01 04:56:44', '2024-04-01 04:56:44');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member_account`
--
ALTER TABLE `member_account`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `member_personal`
--
ALTER TABLE `member_personal`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `product_add`
--
ALTER TABLE `product_add`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `product_layer`
--
ALTER TABLE `product_layer`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_account`
--
ALTER TABLE `member_account`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_personal`
--
ALTER TABLE `member_personal`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_add`
--
ALTER TABLE `product_add`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_layer`
--
ALTER TABLE `product_layer`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
