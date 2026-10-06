-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2026-10-06 15:48:39
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `websec`
--

-- --------------------------------------------------------

--
-- 表的结构 `sqliusers`
--

CREATE TABLE `sqliusers` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sqliusers`
--

INSERT INTO `sqliusers` (`id`, `username`, `password`, `role`) VALUES
(1, '小见', 666, 'user'),
(2, '老俊', 666666, 'user');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(12, '李四', '$2y$10$rWFtDSHCc.wytAHD8tVKkukldwyUYkI0bcbkiyyejuCP8eD444Rk2', 'user'),
(11, '王五', '$2y$10$HTBEkQ9kZsXfiPhpNL84suaD4LE1h0G54fjUuLQ2Jeiqn/JZoIYXi', 'user'),
(10, '泽里鹈', '$2y$10$sY/d/u3MDvRMa.VJ86oLvOBHyUtXlfHFtVvQihn0Nj8bkoWy2S/Tu', 'admin'),
(13, '\' or 1=1 #', '$2y$10$/orpdfaCG/FENtJWqUZJWu4BZ7qOAH0gXCf/0Qk5hT1Xvq2mXJHim', 'user');

-- --------------------------------------------------------

--
-- 表的结构 `xssmessage`
--

CREATE TABLE `xssmessage` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xssmessage`
--

INSERT INTO `xssmessage` (`id`, `username`, `message`) VALUES
(1, '老俊', '天气怎么样'),
(5, '王五', '<img src=\"x\" onerror=\"alert(document.cookie)\">'),
(3, '张三', 'test1'),
(4, '张三', 'test1'),
(6, '小见', '2026.7.27'),
(7, '老强', '卡了'),
(8, '牢蛋', 'test\r\n');

--
-- 转储表的索引
--

--
-- 表的索引 `sqliusers`
--
ALTER TABLE `sqliusers`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `xssmessage`
--
ALTER TABLE `xssmessage`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sqliusers`
--
ALTER TABLE `sqliusers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `xssmessage`
--
ALTER TABLE `xssmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
