-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 05:55 PM
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
(27, 62, '', 'bcvbcvb', '', '', '', '2023-04-16 11:39:15', '2023-04-16 11:39:15'),
(28, 59, '', 'bn', '', '', '', '2023-04-16 11:40:00', '2023-04-16 11:40:00'),
(29, 63, 'King of this site', 'Yo its Admin', 'Coder', 'PHD In BCA', 'Nepal', '2023-04-22 09:52:38', '2023-04-22 10:29:30'),
(30, 64, 'yo', 'Hello Myself Nabin Chhetri ', '', '', '', '2023-04-25 03:40:25', '2023-04-25 03:40:25'),
(31, 64, 'yo', 'Hello Myself Nabin Chhetri ', '', '', '', '2023-04-25 03:40:28', '2023-04-25 03:40:28'),
(32, 66, 'Single ', 'Its Yo Boy! nabin ', 'Not Working Studying ', 'BCA In Birendra Multiple Campus ', 'Ra Na Pa-1 Bakulahar,Chitwan ', '2023-04-28 11:07:46', '2023-04-28 11:07:46'),
(33, 66, 'Single ', 'Its Yo Boy! nabin ', 'Not Working Studying ', 'BCA In Birendra Multiple Campus ', 'Ra Na Pa-1 Bakulahar,Chitwan ', '2023-04-28 11:07:50', '2023-04-28 11:07:50'),
(34, 67, 'Single', 'I am New Here Welcome Me', 'Working on Gas Station', 'Php in Mechanics', 'Kathmandu', '2023-05-02 12:07:07', '2023-05-02 12:07:07'),
(35, 67, 'Single', 'I am New Here Welcome Me', 'Working on Gas Station', 'Php in Mechanics', 'Kathmandu', '2023-05-02 12:07:10', '2023-05-02 12:07:10');

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
(127, 63, 66, 'SGVsbG8=', '', 1, '0', '2023-04-28 16:48:58');

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
(16, 'Testadmin', 'Hello '),
(17, 'Admin', 'nbn'),
(18, 'Nabin', 'nbn'),
(19, 'Nabin', 'nbn');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(155) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `photo_id` int(10) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`, `photo_id`, `profile_pic`, `time`) VALUES
(131, 'Admin', 'sdfdsfdsf', 78, 'nbn.jpg', '2023-04-23 21:40:26'),
(132, 'Admin', 'sdfdsfdsf', 77, 'nbn.jpg', '2023-04-23 21:40:26'),
(133, 'Admin', 'fsdfdsf', 76, 'nbn.jpg', '2023-04-23 21:40:26'),
(134, 'Admin', 'wewewewe', 78, 'nbn.jpg', '2023-04-23 21:40:26'),
(135, 'Nabin ', 'yuy', 78, 'user-default.png', '2023-04-23 21:40:26'),
(136, 'Nabin ', 'yuy', 77, 'user-default.png', '2023-04-23 21:40:26'),
(137, 'Nabin ', 'yuy', 77, 'user-default.png', '2023-04-23 21:40:26'),
(138, 'Nabin ', 'Hello', 79, 'user-default.png', '2023-04-23 21:40:26'),
(139, 'Admin', 'This is awesome!', 80, 'nbn.jpg', '2023-04-24 23:15:00'),
(140, 'Admin', 'Wow, great post!', 80, 'nbn.jpg', '2023-04-24 23:20:38'),
(141, 'Nabin Raj', 'Wow, great post!', 101, 'user-default.png', '2023-04-28 16:31:14'),
(142, 'Nabin', 'gh', 99, 'nabin.jpg', '2023-04-30 22:01:04'),
(143, 'admin', 'Awesome content!', 102, 'nbn.jpg', '2023-05-01 21:07:24'),
(144, 'Nabin', 'Wow, great post!', 108, 'nabin.jpg', '2023-05-02 19:39:59'),
(145, 'Nabin', 'Awesome content!', 108, 'nabin.jpg', '2023-05-02 19:40:03'),
(146, 'Nabin', 'Love it!', 108, 'nabin.jpg', '2023-05-02 19:40:07'),
(147, 'admin', '', 109, 'nbn.jpg', '2023-05-02 20:55:59'),
(148, 'admin', '', 78, 'nbn.jpg', '2023-05-02 21:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `contents` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL,
  `p_p` varchar(100) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `title`, `contents`, `username`, `p_p`, `tags`, `timestamp`) VALUES
(44, 'Second Posts', '<p>&lt;!doctype html&gt;</p><p>&lt;html&gt;</p><p>&lt;head&gt;</p><p>&nbsp; &lt;meta charset=\"UTF-8\"&gt;</p><p>&nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p><p>&nbsp; &lt;script src=\"https://cdn.tailwindcss.com\"&gt;&lt;/script&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p>&nbsp; &lt;h1 class=\"text-3xl font-bold underline\"&gt;</p><p>&nbsp; &nbsp; Hello world!</p><p>&nbsp; &lt;/h1&gt;</p><p>&lt;/body&gt;</p><p>&lt;/html&gt;</p>', 'admin', 'nbn.jpg', 'coding', '2023-04-23 06:13:11'),
(45, 'Node Js Is Best ', '<p>yes</p>', 'admin', 'nbn.jpg', 'coding', '2023-04-30 09:12:14');

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
(18, 63, 66, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groupchat`
--

CREATE TABLE `groupchat` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `chats` varchar(200) NOT NULL,
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
(88, 'Draw', 'hello', 15, ' new gp', 'user-default.png', '2023-03-07 18:44:52'),
(89, 'Admin', 'Hello  ', 17, ' nbn', 'nbn.jpg', '2023-04-28 22:26:57'),
(90, 'Nabin', 'hello', 17, ' nbn', 'nabin.jpg', '2023-04-28 22:27:14'),
(91, '', ' Nabin Joined Chat!!', 17, '', 'nabin.jpg', '2023-04-28 22:27:43'),
(92, 'Nabin', 'I am Nabin', 17, '', 'nabin.jpg', '2023-04-28 22:27:49'),
(93, 'Admin', 'I am Admin', 17, ' nbn', 'nbn.jpg', '2023-04-28 22:27:57'),
(94, 'Nabin', '', 17, '', 'nabin.jpg', '2023-04-28 22:29:07'),
(95, 'Nabin', '', 17, '', 'nabin.jpg', '2023-04-28 22:29:09'),
(96, 'Admin', '', 17, ' nbn', 'nbn.jpg', '2023-04-28 22:29:11'),
(97, 'Admin', '', 17, ' nbn', 'nbn.jpg', '2023-04-28 22:29:14'),
(98, 'Admin', '', 17, ' nbn', 'nbn.jpg', '2023-04-28 22:29:16'),
(99, 'Admin', 'hgj', 17, ' nbn', 'nbn.jpg', '2023-04-28 22:29:20'),
(100, 'Nabin', 'gh', 17, '', 'nabin.jpg', '2023-04-28 22:29:23'),
(101, '', ' Admin Joined Chat!!', 17, '', 'nbn.jpg', '2023-04-28 22:32:37'),
(102, 'Admin', 'hello ', 17, '', 'nbn.jpg', '2023-04-28 22:32:47'),
(103, 'Admin', 'hyy', 17, '', 'nbn.jpg', '2023-04-28 22:32:52'),
(104, 'Admin', 'helo', 17, ' bhg', 'nbn.jpg', '2023-04-28 22:57:15'),
(105, 'Admin', 'helo', 17, ' bhg', 'nbn.jpg', '2023-04-28 22:57:19'),
(106, 'Admin', 'helo', 17, ' bhg', 'nbn.jpg', '2023-04-28 22:57:24'),
(107, 'Admin', 'helo', 17, ' bhg', 'nbn.jpg', '2023-04-28 22:57:49'),
(108, 'Admin', 'helo', 17, ' bhg', 'nbn.jpg', '2023-04-28 22:58:51'),
(109, 'Admin', 'helo', 17, ' bhg', 'nbn.jpg', '2023-04-28 22:59:43'),
(110, 'Nabin', 'Hello ', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:00:35'),
(111, 'Admin', 'dfsdf', 17, '', 'nbn.jpg', '2023-04-28 23:02:51'),
(112, 'Nabin', 'Hello ', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:03:49'),
(113, 'Nabin', 'as', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:03:53'),
(114, 'Admin', 'we', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:14:11'),
(115, 'Admin', 'we', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:14:21'),
(116, 'Admin', 'er', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:14:31'),
(117, 'Admin', 'er', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:14:48'),
(118, 'Admin', 'er', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:14:57'),
(119, 'Admin', 'ty', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:15:13'),
(120, 'Admin', 'ty', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:15:17'),
(121, 'Admin', 'ty', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:16:50'),
(122, 'Admin', 'u', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:16:55'),
(123, 'Admin', 'op', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:17:04'),
(124, 'Admin', 'op', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:17:09'),
(125, 'Admin', 'op', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:18:40'),
(126, 'Admin', 'op', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:18:53'),
(127, 'Admin', 'op', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:18:56'),
(128, 'Admin', 'hy', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:19:01'),
(129, 'Nabin', 'helo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:19:09'),
(130, 'Admin', 'hy', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:25:03'),
(131, 'Admin', 'hy', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:25:24'),
(132, 'Admin', 'ok', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:25:29'),
(133, 'Admin', 'ok', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:25:33'),
(134, 'Admin', 'ok', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:27:56'),
(135, 'Nabin', 'helo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:28:14'),
(136, 'Nabin', 'hello', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:28:24'),
(137, 'Admin', 'hello', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:28:36'),
(138, 'Admin', 'hello', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:28:44'),
(139, 'Admin', 'yes', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:28:49'),
(140, 'Nabin', 'hello', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:28:57'),
(141, 'Nabin', 'Ok Done', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:29:06'),
(142, 'Admin', 'What to Do Next Plea', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:29:23'),
(143, 'Admin', 'What to Do Next Please Tell Me?', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:29:55'),
(144, 'Nabin', 'Why I have to tell you ', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:30:29'),
(145, 'Admin', 'What to Do Next Please Tell Me?', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:34:38'),
(146, 'Admin', 'What to Do Next Please Tell Me?', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:35:03'),
(147, 'Admin', 'No Sorry', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:35:12'),
(148, 'Nabin', 'Why I have to tell you ', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:35:19'),
(149, 'Nabin', 'Its Finew', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:35:24'),
(150, 'Admin', 'Thanks ', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:35:35'),
(151, 'Admin', 'Thanks ', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:35:49'),
(152, 'Admin', 'Hy', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:35:52'),
(153, 'Nabin', 'Its Finew', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:35:58'),
(154, 'Nabin', 'Its Finew', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:36:09'),
(155, 'Admin', 'Hy', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:36:14'),
(156, 'Nabin', 'Its Finew', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:36:51'),
(157, 'Admin', 'Hy', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:36:55'),
(158, 'Admin', 'Hy', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:38:14'),
(159, 'Admin', 'asd', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:39:30'),
(160, 'Admin', 'asd', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:40:59'),
(161, 'Admin', 'asd', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:41:28'),
(162, 'Admin', 'ok', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:41:32'),
(163, 'Nabin', 'Its Finew', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:41:36'),
(164, 'Nabin', 'yo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:41:40'),
(165, 'Admin', 'ok', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:41:45'),
(166, 'Admin', 'Whats up', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:41:56'),
(167, 'Admin', 'ok', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:43:48'),
(168, 'Nabin', 'yo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:47:04'),
(169, 'Admin', 'g', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:53:47'),
(170, 'Nabin', 'yo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:53:49'),
(171, 'Nabin', 'yo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:53:56'),
(172, 'Admin', 'g', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:54:11'),
(173, 'Admin', 'g', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:54:44'),
(174, 'Admin', 'g', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:55:05'),
(175, 'Admin', 'g', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:55:51'),
(176, 'Admin', 'g', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:58:39'),
(177, 'Admin', 'e', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:58:50'),
(178, 'Nabin', 'yo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:58:56'),
(179, 'Nabin', 'f', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:59:00'),
(180, 'Admin', 'h', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:59:06'),
(181, 'Nabin', 'qw', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:59:11'),
(182, 'Nabin', 'qw', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:59:15'),
(183, 'Admin', 'erty', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:59:23'),
(184, 'Nabin', 'qw', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:59:27'),
(185, 'Admin', 'erty', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:07:09'),
(186, 'Admin', 's', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:07:13'),
(187, 'Admin', 't', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:07:41'),
(188, 'Nabin', 'qw', 17, ' nbn', 'nabin.jpg', '2023-04-29 00:07:49'),
(189, 'Nabin', 'u', 17, ' nbn', 'nabin.jpg', '2023-04-29 00:07:53'),
(190, 'Admin', 't', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:13:23'),
(191, 'Admin', 'i', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:13:29'),
(192, 'Nabin', 'u', 17, ' nbn', 'nabin.jpg', '2023-04-29 00:13:36'),
(193, 'Nabin', 'Why I have to tell you ', 17, ' nbn', 'nabin.jpg', '2023-04-29 00:13:43'),
(194, 'Nabin', 'ol', 18, ' nbn', 'nabin.jpg', '2023-04-29 00:13:54'),
(195, 'Nabin', 'omk', 17, ' nabin', 'nabin.jpg', '2023-04-29 00:14:27'),
(196, 'Admin', 'uu', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:14:35'),
(197, 'Nabin', 'u', 17, ' nabin', 'nabin.jpg', '2023-04-29 00:14:41'),
(198, 'Nabin', 'u', 17, ' nabin', 'nabin.jpg', '2023-04-29 00:14:43'),
(199, 'Admin', 'uu', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:14:50'),
(200, 'Admin', 'uu', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:15:49'),
(201, 'Admin', 'ty', 17, ' nbn', 'nbn.jpg', '2023-04-29 00:15:55'),
(202, 'Admin', 'Hello', 17, ' nbn', 'nbn.jpg', '2023-04-30 14:44:11'),
(203, 'Admin', '', 17, ' nbn', 'nbn.jpg', '2023-04-30 14:44:15'),
(204, 'Nabin', 'yo', 18, ' nbn', 'nabin.jpg', '2023-04-30 20:42:49');

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
  `group_photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `admin_id`, `photo`, `group_photo`, `created_at`) VALUES
(64, 'we', 'we', 63, NULL, 'default.png', '2023-04-26 05:16:15'),
(65, 'ty', 'ty', 63, NULL, 'default.png', '2023-04-26 05:23:48'),
(66, 'ty', 'ty', 63, NULL, 'default.png', '2023-04-26 05:23:58'),
(67, 'ty', 'ty', 63, NULL, 'default.png', '2023-04-26 05:24:06'),
(68, 'New Group', 'Here', 63, NULL, 'default.png', '2023-04-26 15:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `group_posts`
--

CREATE TABLE `group_posts` (
  `id` int(10) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `name` varchar(155) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `group_posts` varchar(255) NOT NULL,
  `report_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_posts`
--

INSERT INTO `group_posts` (`id`, `admin_id`, `name`, `uname`, `topic`, `description`, `date`, `group_posts`, `report_details`) VALUES
(24, 63, 'we', 'Nabin', 'sdfds', 'sdfsdf', '2023-04-26 05:20:53', 'nabin.jpg', ''),
(27, 63, 'ty', 'Nabin', 'fgfd', 'gdfg', '2023-04-26 05:32:39', 'nepal.jpg', ''),
(28, 63, 'New Group', 'Nabin', 'Nabin', 'yo', '2023-04-26 15:14:29', 'couple-love-sunset-proposal-marriage-preview.jpg', ''),
(29, 63, 'we', '', 'vgxcv', 'xcvxcv', '2023-04-30 13:24:57', 'nbn.jpg', ''),
(30, 63, 'we', '', 'sdfdsf', 'fsfsdf', '2023-04-30 13:27:09', 'nbn.jpg', ''),
(31, 63, 'we', 'Admin', 'sdf', 'sdf', '2023-04-30 13:27:29', 'nbn.jpg', ''),
(32, 63, 'we', 'Admin', 'fsdf', 'sdf', '2023-04-30 13:28:27', 'nbn.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `something` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci NOT NULL,
  `comment` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `something`, `comment`, `file_name`, `uploaded_on`, `status`) VALUES
(76, 'Admin', 'Nbn', '', 'nbn.jpg', '2023-04-16 18:49:33', '1'),
(78, 'Admin', 'Sdfds', '', 'nbn.jpg', '2023-04-22 16:12:09', '1'),
(79, 'Admin', 'A B C D E F G H', '', 'nabin.jpg', '2023-04-24 18:52:22', '1'),
(80, 'Admin', 'Hello ', '', 'thumb.png', '2023-04-24 18:52:17', '1'),
(90, 'Admin', 'Nbn', '', '', '2023-04-26 17:35:21', '1'),
(91, 'Admin', 'Hh', '', 'THIS IS 4K ANIME (Zenitsu) - YouTube - Google Chrome 2022-01-31 23-24-20.mp4', '2023-04-26 17:38:09', '1'),
(93, 'Admin', 'Nbn', '', 'ZENITSU EDIT _ HERE - YouTube - Google Chrome 2022-01-31 23-32-20.mp4', '2023-04-26 17:44:52', '1'),
(95, 'Admin', 'Nbn', '', '', '2023-04-26 20:52:23', '1'),
(96, 'Admin', 'Zenstu Live', '', 'ZENITSU EDIT _ HERE - YouTube - Google Chrome 2022-01-31 23-32-20.mp4', '2023-04-26 20:52:45', '1'),
(97, 'Admin', 'Image ', '', 'couple-love-sunset-proposal-marriage-preview.jpg', '2023-04-26 20:52:58', '1'),
(98, 'Admin', 'Asdasd dsad', '', '', '2023-04-26 20:56:37', '1'),
(99, 'Admin', 'As', '', 'couple-love-sunset-proposal-marriage-preview.jpg', '2023-04-26 20:56:50', '1'),
(102, 'Nabin', 'Hello', '', 'nabin.jpg', '2023-04-28 16:53:27', '1'),
(103, 'Testadmin', 'Hello EveryOne', '', 'chart.png', '2023-05-02 17:52:42', '1'),
(105, 'Nabin', '#Hello People ', '', '', '2023-05-02 18:06:46', '1'),
(106, 'Admin', ' vbvcbcv', '', '', '2023-05-02 18:28:34', '1'),
(107, 'Admin', '?ghf ', '', '', '2023-05-02 18:30:42', '1'),
(108, 'Admin', 'Bcvbv🤪', '', '', '2023-05-02 18:33:14', '1'),
(110, 'Testadmin', 'Sad Life 😆', '', 'cover.jpg', '2023-05-02 21:40:37', '1');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `from_user` int(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `Photo_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `from_user`, `user_id`, `Photo_id`, `likes`, `username`) VALUES
(53, 67, 57, 68, 16, ''),
(54, 0, 57, 67, 4, ''),
(55, 0, 57, 66, 1, ''),
(56, 0, 57, 65, 1, ''),
(57, 0, 56, 70, 1, ''),
(58, 0, 64, 77, 1, ''),
(59, 0, 63, 76, 3, ''),
(60, 0, 63, 78, 6, ''),
(61, 0, 63, 80, 4, 'admin'),
(62, 0, 63, 79, 2, 'admin'),
(64, 0, 63, 93, 2, 'admin'),
(65, 0, 63, 99, 2, 'admin'),
(66, 0, 63, 98, 2, 'admin'),
(67, 0, 0, 102, 1, 'nabin'),
(68, 0, 66, 102, 6, 'admin'),
(69, 0, 63, 108, 3, 'testadmin'),
(70, 0, 63, 107, 1, 'testadmin'),
(71, 0, 66, 105, 1, 'testadmin'),
(72, 0, 67, 103, 1, 'testadmin'),
(73, 0, 63, 106, 1, 'testadmin'),
(74, 0, 63, 91, 1, 'testadmin'),
(75, 0, 63, 96, 1, 'admin'),
(76, 0, 67, 104, 1, 'testadmin'),
(77, 0, 63, 97, 1, 'testadmin'),
(78, 0, 67, 109, 5, 'admin'),
(79, 0, 66, 109, 3, 'nabin');

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
(17, 'test', 'gh', '2023-04-01 16:11:17.897534'),
(18, 'test', 'sadasd', '2023-04-03 12:51:06.340757'),
(19, 'test', 'asdasd', '2023-04-03 12:51:08.197479'),
(20, 'test', 'gfh', '2023-04-03 12:52:59.109937'),
(21, 'test', 'sdfdsf', '2023-04-03 16:22:35.743530'),
(22, 'test', 'Hello', '2023-04-12 10:18:53.899412'),
(23, 'admin', 'Hy', '2023-04-28 17:46:00.303697'),
(24, 'admin', 'How are you', '2023-04-28 17:46:05.666923'),
(25, 'nabin', 'Im fine about You', '2023-04-28 17:46:20.716937'),
(26, 'admin', 'Im also fine', '2023-04-28 17:52:13.271468'),
(27, 'admin', 'Hello', '2023-04-30 08:59:42.111743');

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
(15, 57, 68, 'dd'),
(16, 63, 78, 'Harrsaments'),
(17, 66, 109, 'vulgar '),
(18, 66, 104, 'Too Much Beautiful');

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
  `interests` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `lastname`, `gender`, `email`, `phone`, `password`, `p_p`, `c_p`, `last_seen`, `is_blocked`, `report`, `verification_code`, `verified`, `interests`) VALUES
(63, 'admin', 'admin', 'Admin', '', 'admin@gmail.com         ', 2147483647, '$2y$10$HVXLWqKhReOuDEdRJ5i2iusm05n9kr8Q8h3QGyDx5zLACy5XZ0X9y', 'nbn.jpg', 'nbn.jpg', '2023-05-02 20:55:50', 0, 0, '', 0, 'coding'),
(66, 'Nabin', 'nabin', 'Chhetri', 'Male', 'Nbn@gmail.com  ', 0, '$2y$10$XfguqoT2skjhdtSQQoMYf.1.BXoxGhIeLJi.W5g65Dtgmnx0rQcuy', 'nabin.jpg', 'thumb.png', '2023-05-02 18:15:54', 0, 0, '', 0, ''),
(67, 'testadmin', 'testadmin', 'Testadmin', '', 'Testadmin@gmail.com ', 0, '$2y$10$PosMAZNiBsH/ZrQxl6aUaO05R/DQ7IVlGmBTZSc0dl6hrkJ9FT2W6', 'yo.jpg', 'cover.jpg', '2023-05-02 17:23:23', 0, 0, '', 0, 'life');

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
-- Indexes for table `group_posts`
--
ALTER TABLE `group_posts`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `group_posts`
--
ALTER TABLE `group_posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `live_chat`
--
ALTER TABLE `live_chat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `report_posts`
--
ALTER TABLE `report_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
