-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `tea`
--

-- --------------------------------------------------------

--
-- 資料表結構 `list`
--

CREATE TABLE `list` (
  `date` date NOT NULL,
  `ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `list`
--

INSERT INTO `list` (`date`, `ID`) VALUES
('2019-08-15', 1),
('2019-08-16', 2),
('2019-08-19', 5),
('2019-08-20', 2),
('2019-08-21', 8),
('2019-09-12', 1),
('2019-09-13', 3),
('2019-09-14', 8),
('2019-09-16', 25),
('2019-09-17', 2),
('2019-09-18', 7),
('2019-09-22', 6),
('2019-09-23', 2),
('2019-09-25', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `cID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cName` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cAccount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cPassword` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cPhone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`cID`, `cName`, `cAccount`, `cPassword`, `cPhone`) VALUES
('A02', '客戶2', 'jc001', 'jc002', '0939123321'),
('A01', '客戶1', 'lica001', 'lica002', '0939123456'),
('M01', '管理者', 'manager001', 'manager002', '0939987654');

-- --------------------------------------------------------

--
-- 資料表結構 `order_detail`
--

CREATE TABLE `order_detail` (
  `ordID` int(20) NOT NULL,
  `ordNumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordDrink` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordPrice` int(10) NOT NULL,
  `ordCount` int(10) NOT NULL,
  `ordSugar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordIce` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order_master`
--

CREATE TABLE `order_master` (
  `orderID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderTime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderPhone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderTotPrice` int(10) NOT NULL,
  `orderDes` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `foodStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderStatus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `shopcar`
--

CREATE TABLE `shopcar` (
  `shopNumber` int(10) NOT NULL,
  `shopID` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopTea` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopPrice` int(4) NOT NULL,
  `shopCount` int(4) NOT NULL,
  `shopSugar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopIce` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `tealist`
--

CREATE TABLE `tealist` (
  `teaID` int(4) NOT NULL,
  `teaClass` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaName` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaPrice` int(10) NOT NULL,
  `teaHot` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `tealist`
--

INSERT INTO `tealist` (`teaID`, `teaClass`, `teaName`, `teaPrice`, `teaHot`) VALUES
(1, '排行榜', '觀音拿鐵', 59, 1),
(2, '排行榜', '珍珠紅豆拿鐵', 69, 1),
(3, '排行榜', '翡翠檸檬', 55, 0),
(4, '原味茶', '蔗香紅茶', 25, 1),
(5, '原味茶', '茉香綠茶', 30, 0),
(6, '原味茶', '包種清茶', 35, 0),
(7, '排行榜', '珍珠奶茶', 49, 1),
(8, '排行榜', '新鮮水果茶', 59, 1),
(9, '原味茶', '特級翡翠綠', 35, 1),
(10, '原味茶', '炭燒鐵觀音', 35, 1),
(11, '原味茶', '珍珠紅茶', 35, 1),
(12, '原味茶', '珍珠綠茶', 39, 1),
(13, '調味茶', '豆漿紅茶', 39, 1),
(14, '調味茶', '青梅凍飲', 40, 1),
(15, '調味茶', '冬瓜鐵觀音', 45, 1),
(16, '調味茶', '蜜香清茶', 45, 0),
(17, '調味茶', '蜜香清茶', 45, 0),
(18, '調味茶', '百香綠茶', 50, 0),
(19, '調味茶', '蜂蜜綠茶', 50, 0),
(20, '調味茶', '梅好冬瓜', 55, 0),
(21, '調味茶', '水蜜桃纖果綠', 69, 0),
(22, '奶香茶', '豆漿奶茶', 45, 1),
(23, '奶香茶', '蔗香奶茶', 45, 1),
(24, '奶香茶', '茉香奶茶', 45, 1),
(25, '奶香茶', '鐵觀音奶茶', 45, 1),
(26, '奶香茶', '珍珠奶綠', 49, 1),
(27, '鮮調茶', '檸檬紅茶', 50, 1),
(28, '鮮調茶', '冬瓜檸檬', 55, 0),
(29, '鮮調茶', '檸檬蜜茶', 55, 0),
(30, '拿鐵茶', '冬瓜拿鐵', 49, 1),
(31, '拿鐵茶', '紅茶拿鐵', 59, 1),
(32, '拿鐵茶', '翡翠拿鐵', 59, 1),
(33, '拿鐵茶', '紅豆拿鐵', 60, 1),
(34, '拿鐵茶', '紅茶珍珠拿鐵', 65, 1),
(35, '拿鐵茶', '翡翠珍珠拿鐵', 65, 1),
(36, '拿鐵茶', '觀音珍珠拿鐵', 65, 1),
(37, '季節限定', '黃金輕焙烏龍', 30, 0),
(38, '季節限定', '蜜香烏龍', 45, 0),
(39, '季節限定', '布丁奶茶', 49, 0),
(40, '季節限定', '養樂多綠茶', 50, 0),
(41, '季節限定', '檸檬蘆薈蜜', 60, 0),
(42, '季節限定', '蔓越莓冰醋', 60, 0),
(43, '季節限定', '桑葚凍飲茶', 60, 0),
(44, '季節限定', '愛文芒果綠', 65, 0),
(45, '季節限定', '愛文芒果拿鐵', 75, 0),
(46, '功夫系列', '功夫紅茶', 35, 1),
(47, '功夫系列', '珍珠冬瓜觀音', 49, 1),
(48, '功夫系列', '鮮桔檸檬', 55, 1),
(49, '功夫系列', '功夫茶拿鐵', 60, 1),
(50, '功夫系列', '東方美人', 60, 0),
(51, '功夫系列', '蘋果百香多多', 65, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`date`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`cAccount`);

--
-- 資料表索引 `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ordID`);

--
-- 資料表索引 `shopcar`
--
ALTER TABLE `shopcar`
  ADD PRIMARY KEY (`shopNumber`);

--
-- 資料表索引 `tealist`
--
ALTER TABLE `tealist`
  ADD PRIMARY KEY (`teaID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ordID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shopcar`
--
ALTER TABLE `shopcar`
  MODIFY `shopNumber` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tealist`
--
ALTER TABLE `tealist`
  MODIFY `teaID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
