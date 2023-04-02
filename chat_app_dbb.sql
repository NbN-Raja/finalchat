-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 09:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(11) NOT NULL,
  `admin_passowrd` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bios`
--

CREATE TABLE `bios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `relationship_status` varchar(255) DEFAULT NULL,
  `bio` varchar(100) NOT NULL,
  `work_history` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bios`
--

INSERT INTO `bios` (`id`, `user_id`, `relationship_status`, `bio`, `work_history`, `education`, `location`, `created_at`, `updated_at`) VALUES
(1, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 17:42:55', '2023-04-02 18:53:47'),
(2, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 17:43:21', '2023-04-02 18:53:47'),
(3, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 18:35:32', '2023-04-02 18:53:47'),
(4, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 18:35:44', '2023-04-02 18:53:47'),
(5, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 18:35:57', '2023-04-02 18:53:47'),
(6, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 18:36:01', '2023-04-02 18:53:47'),
(7, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 18:53:28', '2023-04-02 18:53:28'),
(8, 57, 'nbn', 'Hello Myname is Nabin Raj Chhetri.. Nice To Meet You ', 'ty', 'er', 'Ratnangar-1 Bakulahar', '2023-04-02 18:53:34', '2023-04-02 18:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `chat_img` varchar(255) NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `is_blocked` varchar(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `chat_img`, `opened`, `is_blocked`, `created_at`) VALUES
(1, 57, 56, 'SGVsbG8g', '', 0, '0', '2023-03-28 18:37:32'),
(2, 59, 57, 'ZA==', '', 1, '0', '2023-03-28 18:40:02'),
(3, 59, 57, 'ZA==', '', 1, '0', '2023-03-28 18:40:32'),
(4, 59, 57, 'bm4=', '', 1, '0', '2023-03-28 18:41:34'),
(5, 59, 57, 'ZmdmZw==', '', 1, '0', '2023-03-28 18:41:43'),
(6, 57, 59, 'dnhjdmN4IA==', '', 1, '0', '2023-03-28 18:42:16'),
(7, 57, 56, 'dnhjdiA=', '', 0, '0', '2023-03-28 18:42:20'),
(8, 59, 57, 'dnhjdiB4Y3Z4YyA=', '', 1, '0', '2023-03-28 18:42:25'),
(9, 57, 59, 'dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2', '', 1, '0', '2023-03-28 18:42:33'),
(10, 59, 57, 'dmZmZmZmZmZmZmZmZmZmZg==', '', 1, '0', '2023-03-28 18:42:38'),
(11, 59, 57, 'aGVsbG8gbXkgbmFtZSBpcyBOYXZlZW4=', '', 1, '0', '2023-03-28 18:42:48'),
(12, 59, 57, '', 'Virat-Kohli-Biography.jpg', 1, '0', '2023-03-28 18:42:58'),
(13, 57, 59, 'ZmdmaCA=', '', 1, '0', '2023-03-28 20:24:26'),
(14, 57, 59, 'ZnNkZiBzZGY=', '', 1, '0', '2023-03-28 21:11:06'),
(15, 57, 56, 'ZHNmZHMgZg==', '', 0, '0', '2023-03-28 21:11:20'),
(16, 57, 59, 'SGVsbG8=', '', 1, '0', '2023-03-29 13:44:46'),
(17, 57, 59, '', '333130844_1405111696960317_5466576439609075447_n.jpg', 1, '0', '2023-03-30 00:01:44'),
(18, 57, 59, 'aGVsbG8gaGVsbG8=', '', 1, '0', '2023-03-30 00:02:07'),
(19, 57, 59, '8J+Yhg==', '', 1, '0', '2023-03-30 00:02:12'),
(20, 57, 59, '', '', 1, '0', '2023-03-30 00:21:31'),
(21, 57, 59, '', '', 1, '0', '2023-03-30 00:22:51'),
(22, 0, 0, '', '333130844_1405111696960317_5466576439609075447_n.jpg', 0, '0', '2023-03-30 00:23:00'),
(23, 57, 59, '', '333130844_1405111696960317_5466576439609075447_n.jpg', 1, '0', '2023-03-30 00:23:52'),
(24, 57, 59, 'SGVsbGxvIFdoYXRzIFlvIERvaW5n', '', 1, '0', '2023-03-30 00:34:25'),
(25, 57, 59, 'dXV1dXV1dXU=', '', 1, '0', '2023-03-30 00:35:16'),
(27, 57, 59, 'aGVsbG8gbXkgbmFtZSBpcyBOYXZlZW4=', '', 1, '0', '2023-03-30 00:41:33'),
(28, 57, 59, 'aGVsbG8=', '', 1, '0', '2023-03-30 16:30:20'),
(29, 58, 59, 'SGVsbG8gTmFiaW4gc2lyIA==', '', 1, '0', '2023-03-31 22:51:16'),
(30, 58, 59, 'SG93IEFyZSBZb3U=', '', 1, '0', '2023-03-31 22:51:40'),
(31, 58, 57, 'SGVsbG8gVGVzdGFkbWlu', '', 1, '0', '2023-03-31 22:52:23'),
(32, 57, 58, 'SGVsbG8=', '', 1, '0', '2023-03-31 22:52:58'),
(33, 58, 57, 'bm8gV2hhdHNBcHA=', '', 1, '0', '2023-03-31 22:53:08'),
(34, 58, 57, '', '333130844_1405111696960317_5466576439609075447_n.jpg', 1, '0', '2023-03-31 22:53:21'),
(35, 57, 58, 'TmljZSBQaWN0dXJl', '', 1, '0', '2023-03-31 22:53:30'),
(36, 58, 57, 'VGhhbmsgWW91', '', 1, '0', '2023-03-31 22:53:39'),
(37, 58, 57, '', '333130844_1405111696960317_5466576439609075447_n.jpg', 1, '0', '2023-03-31 22:53:43'),
(38, 58, 57, 'YQ==', '', 1, '0', '2023-03-31 22:57:53'),
(39, 61, 57, 'aGVsbG8gc2ly', '', 1, '0', '2023-04-01 21:59:19'),
(40, 61, 57, 'YWE=', '', 1, '0', '2023-04-01 22:01:26'),
(41, 61, 57, 'SGVsbG8gTWFuIFdoYXRzIHVw', '', 1, '0', '2023-04-01 22:01:41'),
(42, 61, 57, 'aGho', '', 1, '0', '2023-04-01 22:06:38'),
(43, 61, 57, 'aGc=', '', 1, '0', '2023-04-01 22:06:50'),
(44, 61, 57, 'YXM=', '', 1, '0', '2023-04-01 22:08:01'),
(45, 61, 57, 'YWFh', '', 1, '0', '2023-04-01 22:08:06'),
(46, 61, 57, 'YXM=', '', 1, '0', '2023-04-01 22:08:21'),
(47, 61, 57, 'YXdh', '', 1, '0', '2023-04-01 22:08:26'),
(48, 61, 57, 'YXNk', '', 1, '0', '2023-04-01 22:09:35'),
(49, 61, 57, 'YXM=', '', 1, '0', '2023-04-01 22:09:54'),
(50, 61, 57, 'ZGY=', '', 1, '0', '2023-04-01 22:12:49'),
(51, 61, 57, 'eW91', '', 1, '0', '2023-04-01 22:12:58'),
(52, 57, 61, 'ZGY=', '', 1, '0', '2023-04-01 22:33:07'),
(53, 61, 57, 'ZnNkZg==', '', 1, '0', '2023-04-01 22:33:25'),
(55, 57, 61, 'aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS9zZWFyY2g/cT1pK2hhdmUrY3JlYXRlK2ErY2hhdGl0bmcrc3lzdGVtK3VzaW5nK3BocCtpK2hhdmUrdG8rYWRkK3ZpZGVvK2NhbGwraG93K2NhbitpK3ZpZGVvK2NoYXQrd2l0aCt1c2VyK2krYW0rY2hhdHRpbmcraW4rcGhwK3Byb3ZpZGUrbWErY29kZSZvcT1pK2hhdmUrY3JlYXRlK2ErY2hhdGl0bmcrc3lzdGVtK3VzaW5nK3BocCtpK2hhdmUrdG8rYWRkK3ZpZGVvK2NhbGwraG93K2NhbitpK3ZpZGVvK2NoYXQrd2l0aCt1c2VyK2krYW0rY2hhdHRpbmcraW4rcGhwK3Byb3ZpZGUrbWErY29kZSZhcXM9Y2hyb21lLi42OWk1Ny44MDVqMGo0JnNvdXJjZWlkPWNocm9tZSZpZT1VVEYtOA==', '', 0, '0', '2023-04-02 00:35:22'),
(56, 59, 57, 'bmJu', '', 1, '0', '2023-04-02 20:50:44'),
(57, 59, 57, 'ZXI=', '', 1, '0', '2023-04-02 20:52:31'),
(58, 59, 57, 'Z2g=', '', 1, '0', '2023-04-02 20:58:44'),
(59, 57, 58, 'dHk=', '', 0, '0', '2023-04-02 21:11:35'),
(60, 57, 58, 'ZXI=', '', 0, '0', '2023-04-02 21:13:16'),
(61, 57, 61, 'cnQ=', '', 0, '0', '2023-04-02 21:13:34'),
(62, 59, 57, 'd2Vy', '', 1, '0', '2023-04-02 21:17:58'),
(63, 59, 57, 'c2FkYXNkIGFkcw==', '', 1, '0', '2023-04-02 21:18:46'),
(64, 57, 58, 'dmN2', '', 0, '0', '2023-04-02 21:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `room_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`id`, `name`, `room_name`) VALUES
(16, 'Testadmin', 'Hello ');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(155) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `photo_id` int(10) NOT NULL,
  `profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`, `photo_id`, `profile_pic`) VALUES
(103, 'Testadmin', 'nbn', 40, 'user-default.png'),
(104, 'Nabin ', 'gdfgfdg fdgdfgdfgdf gfd', 40, 'user-default.png'),
(105, 'Testadmin', 'df', 62, '333130844_1405111696'),
(106, 'Testadmin', 'dfdf', 62, '333130844_1405111696'),
(107, 'Testadmin', 'nabin', 62, '333130844_1405111696'),
(108, 'Testadmin', 'Hello', 62, '333130844_1405111696'),
(109, 'Testadmin', 'Nice ', 57, '333130844_1405111696'),
(110, 'Testadmin', 'as', 62, '333130844_1405111696'),
(111, 'Testadmin', 'hhhh', 62, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(112, 'Babin', '', 65, 'user-default.png'),
(113, 'Testadmin', 'nn', 62, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(114, 'Testadmin', 'Hello', 65, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(115, 'Testadmin', 'Hy', 65, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(116, 'Testadmin', 'rt', 62, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(117, 'Testadmin', 'you', 62, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(118, 'Testadmin', 'good', 63, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(119, 'Testadmin', 'wow', 57, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(120, 'Testadmin', 'd', 57, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(121, 'Testadmin', 'Nice Picture Here ', 66, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(122, 'Testadmin', 'Hello ', 68, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(123, 'Testadmin', 'vb', 68, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(124, 'Testadmin', 'vcb', 68, '333130844_1405111696960317_5466576439609075447_n.jpg'),
(125, 'Testadmin', 'hello ', 68, '333130844_1405111696960317_5466576439609075447_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `contents` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL,
  `p_p` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `title`, `contents`, `username`, `p_p`) VALUES
(20, '', 'Watch Me Watch Me&nbsp;', 'nbn', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(21, '', 'Watch Me Watch Me&nbsp;', 'bnc', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(22, '', 'Watch Me Watch Me&nbsp;', '', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(23, '', 'hello', 'test', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(24, '', '<p>watch me watch me</p>', 'test', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(25, '', '<p>gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg dddddddddddddddddddddddddddddddddddddddd</p><p>ddddddddddddddddddddddddddddddddddddddddddddddd hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh uuuuuuuuuuuuuuuuuuuuuu</p>', 'test', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(26, 'Why Php is Boring?', '<p>Since Php is Hard to learn&nbsp;</p>', 'test', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(27, 'O Hello Whats Up', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Sorry&nbsp;</td><td>Its Ok&nbsp;</td><td>Morale</td></tr><tr><td>What is sorry&nbsp;</td><td>oh its ok&nbsp;</td><td>Se You</td></tr></tbody></table><p><br></p>', 'test', '333130844_1405111696960317_5466576439609075447_n.jpg'),
(28, 'Hello Welcome to My Blogs', '<p>asd</p>', 'test', '333130844_1405111696960317_5466576439609075447_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `is_blocked` int(11) NOT NULL DEFAULT 0,
  `msg_request` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`, `is_blocked`, `msg_request`) VALUES
(12, 57, 56, 0, 0),
(13, 59, 57, 0, 0),
(14, 58, 59, 0, 0),
(15, 58, 57, 0, 0),
(16, 61, 57, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `global_notify`
--

CREATE TABLE `global_notify` (
  `id` int(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `report_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `global_notify`
--

INSERT INTO `global_notify` (`id`, `topic`, `description`, `date`, `report_details`) VALUES
(2, 'asd', 'asd', '2022-03-08 17:19:34', ''),
(3, 'hfdhdf', 'dfgdfg dfgdfg', '2022-03-10 04:40:30', ''),
(4, 'nbvb bjh', 'nbvj hvhjvjh', '2022-03-10 05:12:29', ''),
(5, 'dfgd fgdfg', 'dfgdfgdf', '2022-03-11 05:38:08', ''),
(6, 'gjh gfhjfg', 'hgf hfgh fg', '2022-03-22 15:43:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `groupchat`
--

CREATE TABLE `groupchat` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `chats` varchar(20) NOT NULL,
  `chat_room` int(20) NOT NULL,
  `room_name` varchar(20) NOT NULL,
  `p_p` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groupchat`
--

INSERT INTO `groupchat` (`id`, `name`, `chats`, `chat_room`, `room_name`, `p_p`, `time`) VALUES
(1, 'Nbn', 'fgfgf', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-10 11:26:33'),
(2, '', ' Jkk Joined Chat!!', 1, '', 'jk.png', '2022-03-10 11:47:48'),
(3, '', ' Jkk Joined Chat!!', 1, '', 'jk.png', '2022-03-10 11:55:24'),
(4, 'Nbn', 'fjdsfb dsf', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-10 12:05:09'),
(5, 'Nbn', 'n dsn dsf', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-10 12:05:13'),
(6, 'Nbn', 'nfjdsnfjk s', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-10 12:05:16'),
(7, 'Jkk', 'ggdf', 3, ' fghgg', 'jk.png', '2022-03-10 12:29:39'),
(8, '', ' Nbn Joined Chat!!', 3, '', 'nbn.jpg', '2022-03-10 12:30:05'),
(9, 'Nbn', 'vhvh', 3, '', 'nbn.jpg', '2022-03-10 12:30:12'),
(10, 'Jkk', 'hh', 3, ' fghgg', 'jk.png', '2022-03-10 12:30:17'),
(11, '', ' Nbn Joined Chat!!', 1, '', 'nbn.jpg', '2022-03-10 19:03:15'),
(12, 'Nbn', 'das', 1, '', 'nbn.jpg', '2022-03-10 21:52:37'),
(13, 'Nbn', 'asdasd', 1, '', 'nbn.jpg', '2022-03-10 21:52:39'),
(14, 'Nbn', 'asdasdasd asdas', 1, '', 'nbn.jpg', '2022-03-10 21:52:43'),
(15, 'Nbn', 'asd asdas', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-10 21:52:53'),
(16, 'Nbn', 'asdasd ioioi', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-10 21:52:57'),
(17, 'Nbn', 'Yo ', 2, ' bfhsdb fjds', 'nbn.jpg', '2022-03-10 21:53:10'),
(18, 'Nbn', 'AnyOne Here ', 2, ' bfhsdb fjds', 'nbn.jpg', '2022-03-11 08:59:02'),
(19, 'Nbn', 'gfgh', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-11 11:17:14'),
(20, 'Nbn', 'sadbnvas d', 2, ' bfhsdb fjds', 'nbn.jpg', '2022-03-11 11:19:56'),
(21, 'Jkkj', 'jk', 5, ' jk', 'jk.png', '2022-03-11 22:30:34'),
(22, 'Jkkj', 'yo', 5, ' jk', 'jk.png', '2022-03-12 23:44:44'),
(23, 'Jkkj', 'yo', 5, ' jk', 'jk.png', '2022-03-12 23:44:48'),
(24, 'Jkkj', 'Hello ', 6, ' Hello Nabin', 'jk.png', '2022-03-25 13:35:48'),
(25, 'Jkkj', 'Hello ', 6, ' Hello Nabin', 'jk.png', '2022-03-25 13:35:52'),
(26, '', ' Nbn Joined Chat!!', 6, '', 'nbn.jpg', '2022-03-25 13:37:08'),
(27, 'Nbn', 'Heello ', 6, '', 'nbn.jpg', '2022-03-25 13:37:15'),
(28, '', ' Jkkj Joined Chat!!', 2, '', 'jk.png', '2022-03-28 20:28:50'),
(29, 'Jkkj', 'Whats Up Guys ', 2, '', 'jk.png', '2022-03-28 20:29:02'),
(30, 'Jkkj', 'Im Good What About Y', 2, '', 'jk.png', '2022-03-28 20:29:14'),
(31, '', ' Nbn Joined Chat!!', 2, '', 'nbn.jpg', '2022-03-29 20:37:30'),
(32, 'Nbn', 'Whats Up ', 2, '', 'nbn.jpg', '2022-03-29 20:37:37'),
(33, 'Nbn', 'k cha', 2, '', 'nbn.jpg', '2022-03-29 20:38:45'),
(34, '', ' Nbn Joined Chat!!', 2, '', 'nbn.jpg', '2022-03-29 21:35:41'),
(35, 'Nbn', 'fsdf sf ', 2, '', 'nbn.jpg', '2022-03-29 21:36:17'),
(36, 'Nbn', 'gfdgfd gfd', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-30 21:32:47'),
(37, 'Nbn', 'gd fgd fgd fgdf gdf ', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-30 21:32:51'),
(38, 'Nbn', 'nbn', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-30 21:32:56'),
(39, 'Nbn', 'nbn', 1, ' Hello Group Chat He', 'nbn.jpg', '2022-03-30 21:32:59'),
(40, 'Nbn', 'ytryrt yrty try', 7, ' Nabin ko group', 'nbn.jpg', '2022-03-30 21:33:27'),
(41, 'Nbn', 'ytryrt yrty try', 7, ' Nabin ko group', 'nbn.jpg', '2022-03-30 21:33:30'),
(42, '', ' Ee Joined Chat!!', 7, '', 'user-default.png', '2022-03-30 21:34:09'),
(43, 'Ee', 'hello man ', 7, '', 'user-default.png', '2022-03-30 21:34:16'),
(44, 'Nbn', 'hello heloo ', 7, ' Nabin ko group', 'nbn.jpg', '2022-03-30 21:34:27'),
(45, '', ' Nbn Joined Chat!!', 2, '', 'user-default.png', '2022-04-02 21:28:40'),
(46, 'Nbn', 'dasdas sd sd', 2, '', 'user-default.png', '2022-04-02 21:28:44'),
(47, 'Nbn', 'dsd dd d', 2, '', 'user-default.png', '2022-04-02 21:28:47'),
(48, 'Nbn', 'Hello ', 8, ' Nabin group chats', 'user-default.png', '2022-04-03 13:59:42'),
(49, 'Nbn', 'Hello ', 8, ' Nabin group chats', 'user-default.png', '2022-04-03 13:59:46'),
(50, '', ' ee Joined Chat!!', 8, '', 'user-default.png', '2022-04-03 14:25:16'),
(51, 'Nbn', 'nbn', 8, ' Nabin group chats', 'user-default.png', '2022-05-05 19:44:02'),
(52, 'Nbn', 'nbn', 8, ' Nabin group chats', 'user-default.png', '2022-05-05 19:44:06'),
(53, 'Nbn', 'bbbb', 8, ' Nabin group chats', 'user-default.png', '2022-05-05 19:44:08'),
(54, 'Nbn', 'fdgfdgfdg', 8, ' Nabin group chats', 'user-default.png', '2022-05-05 19:44:11'),
(55, '', ' Nbn Joined Chat!!', 3, '', 'user-default.png', '2022-05-05 19:44:28'),
(56, 'Nbn', 'sddsdsd', 3, '', 'user-default.png', '2022-05-05 19:44:31'),
(57, 'Nbn', 'dsdsdsd', 3, '', 'user-default.png', '2022-05-05 19:44:35'),
(58, 'Nbn', 'ssssssssssssssssssss', 3, '', 'user-default.png', '2022-05-05 19:44:38'),
(59, 'Nbn', 'Hello Every One ', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 19:56:57'),
(60, 'Nbn', 'Hello Every One ', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 19:57:00'),
(61, 'Nbn', 'Hello Every One ', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 19:58:40'),
(62, 'Nbn', 'Hello Every One ', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 19:58:54'),
(63, '', ' Jkkj Joined Chat!!', 9, '', 'jk.png', '2022-05-05 20:02:59'),
(64, 'Jkkj', 'yo', 9, '', 'jk.png', '2022-05-05 20:04:15'),
(65, 'Nbn', 'hello', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 20:04:38'),
(66, 'Nbn', 'hello', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 20:04:41'),
(67, 'Nbn', 'hello', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 20:04:50'),
(68, 'Nbn', 'hey', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 20:04:54'),
(69, 'Nbn', 'hey', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 20:05:01'),
(70, 'Jkkj', '', 9, '', 'jk.png', '2022-05-05 20:05:05'),
(71, 'Nbn', '', 9, ' Nabin New Group Cha', 'user-default.png', '2022-05-05 20:05:09'),
(72, 'Swagat ', 'Hello Nabin join', 10, ' Swagat Group Chat', 'swaa.jpg', '2022-05-07 11:15:36'),
(73, 'Swagat ', 'Hello Nabin join', 10, ' Swagat Group Chat', 'swaa.jpg', '2022-05-07 11:15:39'),
(74, '', ' Nbn Joined Chat!!', 10, '', 'user-default.png', '2022-05-07 11:15:56'),
(75, 'Nbn', 'Whats up man ', 10, '', 'user-default.png', '2022-05-07 11:16:08'),
(76, 'Swagat ', 'Hello Nabin join', 10, ' Swagat Group Chat', 'swaa.jpg', '2022-05-07 11:16:12'),
(77, '', ' U Joined Chat!!', 2, '', 'user-default.png', '2022-08-08 12:51:56'),
(78, '', ' Sagar Joined Chat!!', 2, '', 'user-default.png', '2022-08-12 10:41:34'),
(79, 'Sagar', 'fsdf', 2, '', 'user-default.png', '2022-08-12 10:41:40'),
(80, '', ' Nabin Joined Chat!!', 1, '', 'user-default.png', '2022-08-26 06:01:02'),
(81, 'Nabin', 'mm', 11, ' 1', 'user-default.png', '2022-09-19 13:47:05'),
(82, 'Roopesh ', 'as', 12, ' 1', 'c.jpg', '2022-10-14 11:54:21'),
(83, '', ' Roopesh  Joined Cha', 1, '', 'one.jpeg', '2022-10-14 12:39:55'),
(84, 'Roopesh ', 'aaa', 1, '', 'one.jpeg', '2022-10-14 12:40:01'),
(85, 'Roopesh ', 'hello', 13, ' My group chat roope', 'one.jpeg', '2022-10-14 12:40:59'),
(86, 'Roopesh ', 'hello', 13, ' My group chat roope', 'one.jpeg', '2022-10-14 12:41:02'),
(87, 'Draw', 'hello', 15, ' new gp', 'user-default.png', '2023-03-07 18:44:49'),
(88, 'Draw', 'hello', 15, ' new gp', 'user-default.png', '2023-03-07 18:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `admin_id`, `photo`, `created_at`) VALUES
(5, 'Nabin Raj Chhetri', 'asdasd1', 21, '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-31 16:32:47'),
(6, 'Nabin Raj Chhetri', 'we', 21, '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-31 16:44:42'),
(7, 'Nabin Raj Chhetri', 'ad', 21, '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-31 16:44:35'),
(8, 'Nabin Raj Chhetri', 'as', 21, '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-31 16:44:30'),
(9, 'sdds', 'sdf32', 23, '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-31 16:37:18'),
(10, 'Meme Sansar', 'Share Your All Meme Here By Heart', 25, NULL, '2023-03-31 16:53:07'),
(11, 'Meme Sansar', 'Haha So Much Funny post ', 25, 'Capture.jpg', '2023-03-31 16:53:59'),
(12, 'Meme Sansar', 'Next One is funny ', 25, 'nbn.jpg', '2023-03-31 16:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `something` varchar(500) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `something`, `comment`, `file_name`, `uploaded_on`, `likes`, `status`) VALUES
(57, 'Nabin', 'Dfdsf', '', '', '2023-03-29 14:41:49', 0, '1'),
(60, 'Testadmin', 'Uu', '', '', '2023-03-29 14:51:17', 0, '1'),
(62, 'Testadmin', 'Sadasd', '', '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-29 14:57:53', 0, '1'),
(63, 'Testadmin', 'Whats Up', '', 'Capture.jpg', '2023-03-30 20:17:21', 0, '1'),
(64, 'Testadmin', 'Nn', '', '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-30 21:04:35', 0, '1'),
(65, 'Testadmin', 'Oo', '', '', '2023-03-30 21:08:14', 0, '1'),
(66, 'Testadmin', 'Www', '', 'Capture.jpg', '2023-03-31 16:02:59', 0, '1'),
(67, 'Testadmin', 'Hello ', '', '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-03-31 16:11:37', 0, '1'),
(68, 'Testadmin', 'Yo', '', 'nbn.jpg', '2023-04-01 18:56:49', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `Photo_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `Photo_id`, `likes`) VALUES
(53, 57, 68, 14),
(54, 57, 67, 4),
(55, 57, 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `live_chat`
--

CREATE TABLE `live_chat` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `live_chat`
--

INSERT INTO `live_chat` (`id`, `username`, `message`, `timestamp`) VALUES
(1, 'nbn', 'dfdsfds', '0000-00-00 00:00:00.000000'),
(2, 'test', 'Nabin', '2023-03-30 11:17:52.904308'),
(3, 'test', 'hllo', '2023-03-30 11:17:59.939386'),
(4, 'test', 'Nice Job', '2023-03-30 11:18:37.972756'),
(5, 'test', 'Ok', '2023-03-30 11:18:46.493766'),
(6, 'test', 'No', '2023-03-30 11:18:51.845423'),
(7, 'test', 'YES', '2023-03-30 11:19:59.389210'),
(8, 'test', 'Hah', '2023-03-30 11:20:39.647355'),
(9, 'test', 'UU', '2023-03-30 11:21:45.261734'),
(10, 'test', 'New', '2023-03-30 11:21:47.552839'),
(11, 'test', 'jj', '2023-03-30 15:24:44.481541'),
(12, 'test', 'uu', '2023-03-30 15:24:50.584485'),
(13, 'test', 'Hello', '2023-03-30 15:25:01.498428'),
(14, 'test', 'hdshsd', '2023-03-31 16:56:49.270955'),
(15, 'test', 'Hello Nabin', '2023-03-31 16:57:40.975502'),
(16, 'nbnn', 'Hello Test', '2023-03-31 16:59:32.254869'),
(17, 'test', 'gh', '2023-04-01 16:11:17.897534');

-- --------------------------------------------------------

--
-- Table structure for table `report_posts`
--

CREATE TABLE `report_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_posts`
--

INSERT INTO `report_posts` (`id`, `user_id`, `post_id`, `reason`) VALUES
(1, 0, 57, 'rt'),
(2, 0, 57, 'rttrt'),
(3, 57, 68, 'sdf'),
(4, 57, 68, 'dfgfdg'),
(5, 57, 68, 'sdfsdf sdf'),
(6, 57, 68, 'fsdf df'),
(7, 57, 68, 'fsdf df'),
(8, 57, 68, 'gdfgfdg'),
(9, 57, 68, 'fsdf fsd'),
(10, 57, 68, 'dsfsdf'),
(11, 57, 68, 'dasd asd'),
(12, 57, 68, 'dasd asd'),
(13, 57, 68, 'fake news'),
(14, 57, 68, 'fake news'),
(15, 57, 68, 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `p_p` varchar(255) DEFAULT 'user-default.png',
  `c_p` varchar(255) NOT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp(),
  `is_blocked` int(11) NOT NULL DEFAULT 0,
  `report` int(10) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `verified` int(50) NOT NULL DEFAULT 0,
  `bio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `lastname`, `gender`, `email`, `phone`, `password`, `p_p`, `c_p`, `last_seen`, `is_blocked`, `report`, `verification_code`, `verified`, `bio`) VALUES
(56, 'Nabin ', 'nbn', 'Raj Chhetri', 'Male', 'Nabin@gmail.com', 0, '$2y$10$52FRYClI.UKrYy4.cNcJF.vKftRWweytO0vOWJu5eoixhL3lY9igu', 'user-default.png', '', '2023-03-23 21:24:47', 0, 0, '', 0, ''),
(57, 'Testadmin', 'test', 'Testgdse', 'Male', 'Testadmin@gmail.com    ', 0, '$2y$10$kdonsmIHdy53uT.d7PUWYe6d3uZhXrQJ4SSSjcPwNCupQ7W6YidK6', '333130844_1405111696960317_5466576439609075447_n.jpg', '333130844_1405111696960317_5466576439609075447_n.jpg', '2023-04-02 23:08:56', 0, 0, '', 0, ''),
(58, 'Nabin Raj Chhetri', 'nbnn', 'Xettri ', 'Male', 'Nabin@gmail.com', 0, '$2y$10$z/SLV3J03jbbDK8H2XyN1.6QFVmOWAk1aAHt1EvZ4hhizHk6Od13m', 'user-default.png', '', '2023-03-31 23:05:58', 0, 0, '', 0, ''),
(59, 'Nabin Raj Chhetri', 'n', 'Dasdasd', 'Male', 'Nbn@gmail.com', 0, '$2y$10$0F4AmqTYM6DjRGWgVHiyDu0Hstw9TX6EpSlWNQ5CiJGA0almDjfwW', 'user-default.png', '', '2023-04-02 21:49:40', 0, 0, '', 0, ''),
(61, 'Babin', 'babin', 'Babin', 'Male', 'Babin@gmail.com', 0, '$2y$10$0R2c15/TP1cmAMR90Se3Guut/DnzFEVJZSdxG6YrHBXedE6.Lieta', 'user-default.png', '', '2023-04-02 00:23:43', 0, 0, '', 0, ''),
(62, '123', '123', '123', 'Male', 'Nabinxettri15@gmai.com', 0, '$2y$10$xHLJ/7A1GS81IuU9QJSE2uUpxadCsmVsUH5BHq9HjXrW8NhOkJPm.', 'user-default.png', '', '2023-04-02 22:53:40', 0, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bios`
--
ALTER TABLE `bios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `global_notify`
--
ALTER TABLE `global_notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupchat`
--
ALTER TABLE `groupchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_chat`
--
ALTER TABLE `live_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_posts`
--
ALTER TABLE `report_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bios`
--
ALTER TABLE `bios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `global_notify`
--
ALTER TABLE `global_notify`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `live_chat`
--
ALTER TABLE `live_chat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `report_posts`
--
ALTER TABLE `report_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD CONSTRAINT `chat_room_ibfk_1` FOREIGN KEY (`id`) REFERENCES `groupchat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
