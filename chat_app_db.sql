-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 02:47 PM
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
(31, 64, 'yo', 'Hello Myself Nabin Chhetri ', '', '', '', '2023-04-25 03:40:28', '2023-04-25 03:40:28');

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
(65, 63, 64, 'aGVsbw==', '', 1, '0', '2023-04-16 18:51:51'),
(66, 63, 64, 'aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS8=', '', 1, '0', '2023-04-22 22:19:44'),
(68, 63, 64, '8J+kkWFzYXM=', '', 1, '0', '2023-04-22 23:00:16'),
(69, 63, 64, 'YXNhcw==', '', 1, '0', '2023-04-22 23:00:19'),
(70, 63, 64, 'YXNkc2Rhc2Rhc2RzYWQ=', '', 1, '0', '2023-04-22 23:00:22'),
(71, 63, 64, 'YXNkYXNkIGFzZGEgc2RhcyBkYXNkYXM=', '', 1, '0', '2023-04-22 23:00:26'),
(72, 63, 64, 'YXNkYXMgZGFzIGRhc2RhZGFzZGFzZA==', '', 1, '0', '2023-04-22 23:00:29'),
(73, 63, 64, 'YXNkYXNkYXNkYXNkYXNkYXNkYWRhc2Rhc2Rhc2QgZHMgZGFz', '', 1, '0', '2023-04-22 23:00:34'),
(74, 63, 64, 'YXNkIGFzZCBhc2Rhc2Qg', '', 1, '0', '2023-04-22 23:00:38'),
(75, 63, 64, 'YXNkIGFzZGEgc2Rhc2QgYXNk', '', 1, '0', '2023-04-22 23:00:41'),
(76, 63, 64, 'YXNkIGFzZCBhZHMgcw==', '', 1, '0', '2023-04-22 23:00:44'),
(77, 64, 63, 'PHVsIGlkPSJjaGF0TGlzdCIgY2xhc3M9ImNoYXRMaXN0Ij4gICAgPHAgIGlkPSJjb250YWN0Ij5Db250YWN0czwvcD4gICAgPD9waHAgaWYgKCFlbXB0eSgkY29udmVyc2F0aW9ucykpIHsgPz4gICAgICAgIDw/cGhwIGZvcmVhY2ggKCRjb252ZXJzYXRpb25zIGFzICRjb252ZXJzYXRpb24pIHsgICAgICAgICAgICAgLy8gQ2hlY2sgaWYgdGhlIHVzZXIgaXMgYWN0aXZlIGJhc2VkIG9uIHRoZWlyIGxhc3Rfc2VlbiB0aW1lc3RhbXAgICAgICAgICAgICAkaXNfYWN0aXZlID0gKHN0cnRvdGltZSgkY29udmVyc2F0aW9uWydsYXN0X3NlZW4nXSkgPiAodGltZSgpIC0gNjApKTsgICAgICAgICAgICAvLyBTZXQgdGhlIGxhYmVsIHRleHQgYW5kIGNvbG9yIGJhc2VkIG9uIHdoZXRoZXIgdGhlIHVzZXIgaXMgYWN0aXZlIG9yIG5vdCAgICAgICAgICAgICRsYWJlbF90ZXh0ID0gJGlzX2FjdGl2ZSA/ICJBY3RpdmUiIDogIkluYWN0aXZlIjsgICAgICAgICAgICAkbGFiZWxfY29sb3IgPSAkaXNfYWN0aXZlID8gImdyZWVuIiA6ICJyZWQiOyAgICAgICAgPz4gICAgICAgICAgICA8bGk+ICAgICAgICAgICAgICAgIDxhIGhyZWY9ImNsaWVudC9maW5hbC5waHA/dXNlcj08Pz0gJGNvbnZlcnNhdGlvblsndXNlcm5hbWUnXSA/PiI+ICAgICAgICAgICAgICAgICAgICA8ZGl2IHN0eWxlPSJkaXNwbGF5OiBmbGV4OyI+ICAgICAgICAgICAgICAgICAgICAgICAgPGltZyBzcmM9ImNsaWVudC9hc3NldHMvdXBsb2Fkcy88Pz0gJGNvbnZlcnNhdGlvblsncF9wJ10gPz4iIGNsYXNzPSJ3LTEwIHJvdW5kZWQtY2lyY2xlIiBzdHlsZT0id2lkdGg6IDM2cHg7IGhlaWdodDogMzZweDsiPiAgICAgICAgICAgICAgICAgICAgICAgIDxwPjw/PSAkY29udmVyc2F0aW9uWyduYW1lJ10gPz48YnI+ICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuIHN0eWxlPSJjb2xvcjo8Pz0gJGxhYmVsX2NvbG9yID8+Ij48Pz0gJGxhYmVsX3RleHQgPz48L3NwYW4+ICAgICAgICAgICAgICAgICAgICAgICAgPC9wPiAgICAgICAgICAgICAgICAgICAgICAgIDxwPjw/PSAkY29udmVyc2F0aW9uWydsYXN0bmFtZSddID8+PGJyPjwvcD4gICAgICAgICAgICAgICAgICAgIDwvZGl2PiAgICAgICAgICAgICAgICA8L2E+ICAgICAgICAgICAgPC9saT4gICAgICAgIDw/cGhwIH0gPz4gICAgPD9waHAgfSA/PjwvdWw+', '', 1, '0', '2023-04-22 23:19:00'),
(78, 63, 64, 'aGg=', '', 1, '0', '2023-04-22 23:19:25'),
(79, 64, 63, 'aGg=', '', 1, '0', '2023-04-22 23:24:18'),
(80, 63, 64, 'dXU=', '', 1, '0', '2023-04-22 23:24:26'),
(81, 63, 64, '', '', 1, '0', '2023-04-23 00:02:04'),
(82, 63, 64, 'aGVsbG8=', '', 1, '0', '2023-04-23 00:02:20'),
(83, 63, 64, '', '', 1, '0', '2023-04-23 00:03:30'),
(84, 63, 64, '', '', 1, '0', '2023-04-23 00:06:01'),
(85, 63, 64, 'aGVsbG8=', '', 1, '0', '2023-04-23 00:12:51'),
(86, 63, 64, '', '', 1, '0', '2023-04-23 09:15:03'),
(87, 63, 64, '', '', 1, '0', '2023-04-23 09:16:43'),
(88, 63, 64, 'PHNjcmlwdD4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ21lc3NhZ2UnKS5hZGRFdmVudExpc3RlbmVyKCdwYXN0ZScsIGZ1bmN0aW9uKGV2ZW50KSB7ICAvLyBQcmV2ZW50IHRoZSBkZWZhdWx0IHBhc3RlIGFjdGlvbiAgZXZlbnQucHJldmVudERlZmF1bHQoKTsgIC8vIEdldCB0aGUgY2xpcGJvYXJkIGRhdGEgIHZhciBjbGlwYm9hcmREYXRhID0gZXZlbnQuY2xpcGJvYXJkRGF0YSB8fCB3aW5kb3cuY2xpcGJvYXJkRGF0YTsgIHZhciBpdGVtcyA9IGNsaXBib2FyZERhdGEuaXRlbXM7ICAvLyBMb29wIHRocm91Z2ggdGhlIGl0ZW1zIGluIHRoZSBjbGlwYm9hcmQgIGZvciAodmFyIGkgPSAwOyBpIDwgaXRlbXMubGVuZ3RoOyBpKyspIHsgICAgdmFyIGl0ZW0gPSBpdGVtc1tpXTsgICAgLy8gQ2hlY2sgaWYgdGhlIGl0ZW0gaXMgYW4gaW1hZ2UgICAgaWYgKGl0ZW0udHlwZS5pbmRleE9mKCdpbWFnZScpICE9PSAtMSkgeyAgICAgIC8vIEdldCB0aGUgaW1hZ2UgZGF0YSBhcyBhIGRhdGEgVVJMICAgICAgdmFyIGJsb2IgPSBpdGVtLmdldEFzRmlsZSgpOyAgICAgIHZhciByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpOyAgICAgIHJlYWRlci5vbmxvYWQgPSBmdW5jdGlvbihldmVudCkgeyAgICAgICAgdmFyIGltYWdlRGF0YVVybCA9IGV2ZW50LnRhcmdldC5yZXN1bHQ7ICAgICAgICAvLyBTZW5kIHRoZSBpbWFnZSBkYXRhIHRvIHRoZSBzZXJ2ZXIgICAgICAgIHNlbmRJbWFnZShpbWFnZURhdGFVcmwpOyAgICAgIH07ICAgICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoYmxvYik7ICAgIH0gIH19KTsgICAgPC9zY3JpcHQ+', '', 1, '0', '2023-04-23 09:18:33'),
(89, 63, 64, 'aGVsbw==', '', 1, '0', '2023-04-23 09:18:37'),
(90, 63, 64, 'Y2dmZw==', '', 1, '0', '2023-04-23 09:19:53'),
(91, 63, 64, 'aGVsbG8=', '', 1, '0', '2023-04-23 09:22:08'),
(92, 63, 64, 'aGVsbG9oZWxsbyBteSBuYW1lIGlzIE5hdmVlbg==', '', 1, '0', '2023-04-23 09:22:24'),
(93, 63, 64, 'aGVsbG8gd2hhdCdzIHVw', '', 1, '0', '2023-04-23 09:24:01'),
(94, 63, 64, 'c2RzZGogIGRrc2RramRzZHMgIA==', '', 1, '0', '2023-04-23 09:39:41'),
(95, 63, 64, 'c2RmZHM=', '', 1, '0', '2023-04-23 10:05:22'),
(96, 63, 64, 'c2RmZHM=', '', 1, '0', '2023-04-23 10:05:22'),
(97, 63, 64, 'c3Nzc3Nzcw==', '', 1, '0', '2023-04-23 10:05:31'),
(98, 63, 64, 'c3Nzc3Nzcw==', '', 1, '0', '2023-04-23 10:05:31'),
(99, 63, 64, 'c3Nzc3Nzcw==', '', 1, '0', '2023-04-23 10:05:31'),
(100, 63, 64, 'c3Nzc3Nzcw==', '', 1, '0', '2023-04-23 10:05:31'),
(101, 63, 64, 'c3Nz', '', 1, '0', '2023-04-23 10:07:14'),
(102, 63, 64, '8J+Ym/CfmJ0=', '', 1, '0', '2023-04-23 10:07:19'),
(103, 63, 64, 'aGVsbG8=', '', 1, '0', '2023-04-23 10:09:25'),
(104, 63, 64, '', '', 1, '0', '2023-04-23 10:12:04'),
(105, 63, 64, '', '', 1, '0', '2023-04-23 10:12:09'),
(106, 63, 64, '', '', 1, '0', '2023-04-23 10:13:24'),
(107, 63, 64, '', '', 1, '0', '2023-04-23 10:14:00'),
(108, 63, 64, '', '', 1, '0', '2023-04-23 10:14:49'),
(109, 63, 64, '', 'nbn.jpg', 1, '0', '2023-04-23 10:15:01'),
(110, 63, 64, '', 'Capture.JPG', 1, '0', '2023-04-23 10:15:20'),
(111, 63, 64, '', 'or (1).pptx', 1, '0', '2023-04-23 10:15:41'),
(112, 63, 64, '', 'Capture.JPG', 1, '0', '2023-04-23 10:15:55'),
(113, 63, 64, 'd2U=', '', 1, '0', '2023-04-23 10:16:00'),
(114, 63, 64, '', 'Capture.JPG', 1, '0', '2023-04-23 10:16:04'),
(115, 63, 64, '', 'nepal.jpg', 1, '0', '2023-04-23 10:16:35'),
(116, 63, 64, '', 'nepal.jpg', 1, '0', '2023-04-23 10:16:41'),
(119, 63, 64, 'aGVsbG8gd2hhdCdzIHVw', '', 1, '0', '2023-04-23 10:30:57'),
(120, 63, 64, 'WU8=', '', 1, '0', '2023-04-23 10:31:05'),
(121, 63, 64, '8J+YhvCfmIbwn5iG8J+Yhw==', '', 1, '0', '2023-04-23 10:31:15'),
(122, 63, 64, 'YWFh', '', 1, '0', '2023-04-23 10:44:15'),
(123, 63, 64, '', 'nepal.jpg', 1, '0', '2023-04-23 22:16:57'),
(124, 63, 64, '', 'nepal.jpg', 1, '0', '2023-04-23 22:17:00'),
(125, 63, 64, 'bmJu', '', 1, '0', '2023-04-23 22:17:09'),
(126, 63, 64, 'b28=', '', 1, '0', '2023-04-24 23:07:42');

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
(140, 'Admin', 'Wow, great post!', 80, 'nbn.jpg', '2023-04-24 23:20:38');

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
(43, 'My First text Post As User ', '<p><span class=\"token block\" style=\"border: 0px solid rgb(229, 231, 235); display: block; color: rgb(248, 250, 252); font-family: &quot;Fira Code VF&quot;, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-variant-ligatures: none; white-space: pre; background-color: rgb(30, 41, 59);\"><span class=\"token doctype punctuation\" style=\"border: 0px solid rgb(229, 231, 235); --tw-text-opacity:1; color: rgb(100 116 139/var(--tw-te', 'admin', 'nbn.jpg', 'coding', '2023-04-23 06:12:16'),
(44, 'Second Posts', '<p>&lt;!doctype html&gt;</p><p>&lt;html&gt;</p><p>&lt;head&gt;</p><p>&nbsp; &lt;meta charset=\"UTF-8\"&gt;</p><p>&nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p><p>&nbsp; &lt;script src=\"https://cdn.tailwindcss.com\"&gt;&lt;/script&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p>&nbsp; &lt;h1 class=\"text-3xl font-bold underline\"&gt;</p><p>&nbsp; &nbsp; Hello world!</p><p>&nbsp; &lt;/h1&gt;</p><p>&lt;/body&gt;</p><p>&lt;/html&gt;</p>', 'admin', 'nbn.jpg', 'coding', '2023-04-23 06:13:11');

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
(16, 61, 57, 0, 0),
(17, 63, 64, 0, 0);

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
(67, 'ty', 'ty', 63, NULL, 'default.png', '2023-04-26 05:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `group_posts`
--

CREATE TABLE `group_posts` (
  `id` int(10) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `name` varchar(155) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `group_posts` varchar(255) NOT NULL,
  `report_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_posts`
--

INSERT INTO `group_posts` (`id`, `admin_id`, `name`, `topic`, `description`, `date`, `group_posts`, `report_details`) VALUES
(24, 63, 'we', 'sdfds', 'sdfsdf', '2023-04-26 05:20:53', 'nabin.jpg', ''),
(27, 63, 'ty', 'fgfd', 'gdfg', '2023-04-26 05:32:39', 'nepal.jpg', '');

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
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `something`, `comment`, `file_name`, `uploaded_on`, `status`) VALUES
(76, 'Admin', 'Nbn', '', 'nbn.jpg', '2023-04-16 18:49:33', '1'),
(77, 'Nabin', 'Rt', '', 'couple-love-sunset-proposal-marriage-preview.jpg', '2023-04-16 18:50:35', '1'),
(78, 'Admin', 'Sdfds', '', 'nbn.jpg', '2023-04-22 16:12:09', '1'),
(79, 'Admin', 'A B C D E F G H', '', 'nabin.jpg', '2023-04-24 18:52:22', '1'),
(80, 'Admin', 'Hello ', '', 'thumb.png', '2023-04-24 18:52:17', '1'),
(81, 'Nabin', 'Adasd', '', 'couple-love-sunset-proposal-marriage-preview.jpg', '2023-04-25 09:07:46', '1'),
(82, 'Admin', 'Asasd', '', 'nabin.jpg', '2023-04-26 14:50:30', '1'),
(90, 'Admin', 'Nbn', '', '', '2023-04-26 17:35:21', '1'),
(91, 'Admin', 'Hh', '', 'THIS IS 4K ANIME (Zenitsu) - YouTube - Google Chrome 2022-01-31 23-24-20.mp4', '2023-04-26 17:38:09', '1'),
(93, 'Admin', 'Nbn', '', 'ZENITSU EDIT _ HERE - YouTube - Google Chrome 2022-01-31 23-32-20.mp4', '2023-04-26 17:44:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `Photo_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `Photo_id`, `likes`, `username`) VALUES
(53, 57, 68, 16, ''),
(54, 57, 67, 4, ''),
(55, 57, 66, 1, ''),
(56, 57, 65, 1, ''),
(57, 56, 70, 1, ''),
(58, 64, 77, 1, ''),
(59, 63, 76, 3, ''),
(60, 63, 78, 6, ''),
(61, 63, 80, 4, 'admin'),
(62, 63, 79, 2, 'admin'),
(63, 0, 84, 1, 'admin'),
(64, 63, 93, 2, 'admin');

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
(22, 'test', 'Hello', '2023-04-12 10:18:53.899412');

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
(16, 63, 78, 'Harrsaments');

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
(63, 'Admin', 'admin', 'Admin', 'Male', '', 0, '$2y$10$HVXLWqKhReOuDEdRJ5i2iusm05n9kr8Q8h3QGyDx5zLACy5XZ0X9y', 'nbn.jpg', 'nbn.jpg', '2023-04-26 18:24:45', 0, 0, '', 0, ''),
(64, 'Nabin ', 'nbn', 'Raj Chhetri', 'Male', 'Nbn@gmail.com', 0, '$2y$10$Rtx/wh8U8jUy40KjRGLSuu7PYxPgfsYch1KTMcZoxMNXtRw4dCFTe', 'user-default.png', '', '2023-04-22 23:31:26', 0, 0, '', 0, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `group_posts`
--
ALTER TABLE `group_posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `live_chat`
--
ALTER TABLE `live_chat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `report_posts`
--
ALTER TABLE `report_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
