-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 10, 2022 at 06:55 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicwebb`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Artist` varchar(255) DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `UserId` int(255) DEFAULT NULL,
  `About` varchar(3000) DEFAULT NULL,
  `GenresId` int(11) NOT NULL,
  `CreateDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`Id`, `Title`, `Artist`, `Avatar`, `UserId`, `About`, `GenresId`, `CreateDate`, `UpdatedDate`) VALUES
(6, 'xc', 'ChouChou', 'covers6.jpg', 1, NULL, 1, '2022-08-08 12:44:07', '2022-08-08 12:44:07'),
(10, 'SSW', 'EE', 'covers10.jpg', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived&nbsp;</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 74px; left: 781.688px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', 2, '2022-08-27 15:32:56', '2022-08-27 15:32:56'),
(11, 'xxxx', 'wwweê', 'covers11.jpg', 1, NULL, 2, '2022-08-27 15:35:53', '2022-08-27 15:35:53'),
(12, 'Top 10 bài hát của qtran', 'ChouChou', 'covers12.jpg', 1, NULL, 4, '2022-08-27 15:47:10', '2022-08-27 15:47:10'),
(13, 'we', 'xxc', 'covers13.jpg', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived&nbsp;</p>', 3, '2022-10-19 15:10:49', '2022-10-19 15:10:49'),
(14, 'eeeHello Junneeww', 'KCPw', 'covers14.jpg', 1, '<p>kCƯEQDSẤDFDSẤDFDSAfdqư&ecirc;qưeqưeqdsss</p>\r\n', 5, '2022-11-17 15:30:55', '2022-11-17 15:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `Id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`Id`, `Name`, `CreatedDate`, `UpdateDate`) VALUES
(1, 'Jazz', '2022-11-08 14:45:10', '2022-11-08 14:45:10'),
(2, 'Rap', '2022-11-08 14:45:10', '2022-11-08 14:45:10'),
(3, 'R&B', '2022-11-08 14:45:10', '2022-11-08 14:45:10'),
(4, 'EDM', '2022-11-08 14:45:10', '2022-11-08 14:45:10'),
(5, 'Popular', '2022-11-08 14:45:10', '2022-11-08 14:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Id` int(6) NOT NULL,
  `Passcode` varchar(6) NOT NULL,
  `UserId` int(6) NOT NULL,
  `Type` int(1) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Id`, `Passcode`, `UserId`, `Type`, `CreatedDate`, `UpdatedDate`) VALUES
(1, '137231', 55, 1, '2022-11-27 15:39:24', '2022-11-27 15:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `AlbumId` int(11) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `Link` varchar(20) DEFAULT NULL,
  `Listen` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `DateCreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`Id`, `Name`, `artist`, `avatar`, `AlbumId`, `UserId`, `Link`, `Listen`, `status`, `DateCreate`, `DateUpdated`) VALUES
(10, 'xxccqqweer', 'xxccwweee', 'songs10.png', 0, 2, 'Audio10.mp3', 13, 1, '2022-03-16 15:20:33', '2022-12-09 15:17:56'),
(19, 'YeuLaiTuDau', 'KhacViet', NULL, 6, 1, 'Audio19.mp3', 20137, 1, '2022-08-08 12:44:07', '2022-12-10 10:04:16'),
(21, '2am', 'JustaTeeBigDaddy', NULL, 10, 1, 'Audio21.mp3', 0, 1, '2022-08-27 15:32:56', '2022-08-27 15:32:56'),
(22, 'CryingOverYou', 'JustaTeeBinz', NULL, 11, 1, 'Audio22.mp3', 0, 1, '2022-08-27 15:35:53', '2022-08-27 15:35:53'),
(23, 'Crying Over You', 'JustaTeeBinz', NULL, 12, 1, 'Audio23.mp3', 0, 1, '2022-08-27 15:47:10', '2022-08-27 15:47:10'),
(25, '2 gio sáng ', 'JustaTeeBigDaddy', NULL, 12, 1, 'Audio25.mp3', 0, 1, '2022-08-27 15:47:10', '2022-08-27 15:47:10'),
(29, 'YeuLaiTuDau2341', 'QuangTrần', 'songs29.jpg', 0, 1, 'Audio29.mp3', 1, 1, '2022-08-28 13:20:39', '2022-12-08 15:50:59'),
(30, '2am', 'JustaTeeBigDaddy', NULL, 13, 1, 'Audio30.mp3', 0, 1, '2022-10-19 15:10:49', '2022-10-19 15:10:49'),
(31, 'YeuLaiTuDau', 'KhacViet', NULL, 14, 1, 'Audio31.mp3', 1, 1, '2022-11-17 15:30:55', '2022-12-10 09:57:10'),
(32, 'CryingOverYou', 'JustaTeeBinz', NULL, 14, 1, 'Audio32.mp3', 0, 1, '2022-11-17 15:30:55', '2022-11-17 15:30:55'),
(35, 'YeuLaiTuDau', 'KhacViet', 'songs35.jpg', 0, 1, 'Audio35.mp3', 0, 1, '2022-12-09 17:17:12', '2022-12-09 17:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT 'default.jpg',
  `status` int(11) DEFAULT '0',
  `ArtName` varchar(50) NOT NULL,
  `Description` varchar(3000) DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Email`, `FirstName`, `LastName`, `password`, `avatar`, `status`, `ArtName`, `Description`, `CreatedDate`, `UpdatedDate`) VALUES
(1, 'admin@gmail.com', 'Kanye', 'West', '456', 'artists1.jpg', 1, 'Kanye', '<p>&nbsp;</p>\r\n\r\n<p>Reference site about&nbsp;<em>Lorem</em>&nbsp;Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>\r\n', '2022-11-20 10:07:40', '2022-11-20 10:07:40'),
(2, 'bin@gmail.com', 'wwerr', 'qqqqqsss', '123', 'artists2.jpg', 1, 'PAA', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-11-20 10:07:40'),
(3, 'genz@gmail.com', 'kent', 'clark', '123', 'default.jpg', 1, 'Irene', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-12-09 16:57:01'),
(4, 'gta5@gmail.com', 'Kyl', 'zsw', '123', 'artist5.jpg', 1, 'PNHIIII', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-11-20 10:07:40'),
(5, 'kent@gmail.com', '23', 'zsw41', '123', 'artist6.jpg', 1, 'NHI.TR', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-11-20 10:07:40'),
(6, 'james@gmail.com', 'zxxccccc', 'wweee', '123', 'artist2.jpg', 1, 'KT', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-11-20 10:07:40'),
(7, 'juzixss@gmail.com', 'wwwee', 'qqqwwee', '123', 'artists9.jpg', 1, 'YPPW', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-11-20 10:07:40'),
(9, 'wez12xdss@gmail.com', 'wwwee23123', 'qqqwwee23122', '123', 'default.jpg', 1, 'YPPWưeww', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-12-09 16:57:47'),
(10, 'wez122122xdss@gmail.com', 'wwwee23123', 'qqqwwee23122', '123', 'artist5.jpg', 1, 'YPPWưeww23512', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>Theme Forest</li>\r\n	<li>Graphic River</li>\r\n	<li>Audio Jungle</li>\r\n	<li>3D Ocean</li>\r\n	<li>Code Canayon</li>\r\n</ul>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;<a href=\"http://localhost/Volna%20music%20stream/artist.html#\">Link</a>&nbsp;the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 100px; left: 30.125px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-20 10:07:40', '2022-11-20 10:07:40'),
(13, 'bin13199@gmail.com', 'quangw', 'trầnxcz', '789', 'artists13.jpg', 1, 'quanxxx', '<p>xcjoiswwww</p>\r\n', '2022-11-20 10:07:40', '2022-12-09 17:11:41'),
(14, 'siwwncx@china.com', 'wweee', 'quangggg', '123', 'default.jpg', 0, 'quwwn xxx', NULL, '2022-11-20 10:07:40', '2022-12-09 16:57:10'),
(15, 'quangtran123@gmail.com', 'weee', '23312', '123', 'default.jpg', 0, 'ssszxxxcccc', NULL, '2022-11-20 10:07:40', '2022-12-09 16:57:15'),
(40, 'phamtrizx@gmail.com', 'xxcccccc', '112233', '123', 'default.jpg', 0, 'qwweerrrr', NULL, '2022-11-20 10:07:40', '2022-12-09 16:57:18'),
(41, 'phamtri@gmail.com', 'ssưss', 'xxx', '123', 'default.jpg', 0, 'cccccxzc', NULL, '2022-11-20 10:07:40', '2022-12-09 16:57:21'),
(42, 'tranngocquang13199@gmail.com', 'qunzxxx', 'djssszzxxc', '789', 'default.jpg', 1, 'BINZ DA POET', NULL, '2022-12-10 10:41:33', '2022-12-10 10:44:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
