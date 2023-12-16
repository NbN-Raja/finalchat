-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 01:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

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
(29, 63, 'King of this site', 'Yo its nabin', 'Coder', 'PHD In BCA', 'Nepal', '2023-04-22 09:52:38', '2023-07-02 05:47:45'),
(30, 64, 'yo', 'Hello Myself Nabin Chhetri ', '', '', '', '2023-04-25 03:40:25', '2023-04-25 03:40:25'),
(31, 64, 'yo', 'Hello Myself Nabin Chhetri ', '', '', '', '2023-04-25 03:40:28', '2023-04-25 03:40:28'),
(32, 66, 'Single ', 'Its Yo Boy! nabin ', 'Not Working Studying ', 'BCA In Birendra Multiple Campus ', 'Ra Na Pa-1 Bakulahar,Chitwan ', '2023-04-28 11:07:46', '2023-04-28 11:07:46'),
(33, 66, 'Single ', 'Its Yo Boy! nabin ', 'Not Working Studying ', 'BCA In Birendra Multiple Campus ', 'Ra Na Pa-1 Bakulahar,Chitwan ', '2023-04-28 11:07:50', '2023-04-28 11:07:50'),
(34, 67, 'Single', 'I am New Here Welcome Me', 'Working on Gas Station', 'Php in Mechanics', 'Kathmandu', '2023-05-02 12:07:07', '2023-05-02 12:07:07'),
(35, 67, 'Single', 'I am New Here Welcome Me', 'Working on Gas Station', 'Php in Mechanics', 'Kathmandu', '2023-05-02 12:07:10', '2023-05-02 12:07:10'),
(36, 68, 'cfgcfg', 'gcfgcf', 'cfgcfg', 'cfgcfg', 'cgfcg', '2023-05-28 08:41:59', '2023-05-28 08:41:59'),
(37, 68, 'cfgcfg', 'gcfgcf', 'cfgcfg', 'cfgcfg', 'cgfcg', '2023-05-28 08:42:02', '2023-05-28 08:42:02'),
(38, 69, 'Married', 'Myself Balen Shah ', 'Major of kathmandu ', 'Civil Engineering ', 'Kathmandu-1 ', '2023-07-01 06:19:53', '2023-07-01 06:19:53'),
(39, 69, 'Married', 'Myself Balen Shah ', 'Major of kathmandu ', 'Civil Engineering ', 'Kathmandu-1 ', '2023-07-01 06:19:56', '2023-07-01 06:19:56');

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
(127, 63, 66, 'SGVsbG8=', '', 1, '0', '2023-04-28 16:48:58'),
(128, 63, 66, 'ZHNhZHNh', '', 1, '0', '2023-06-08 12:11:08'),
(129, 66, 63, 'WWVz', '', 1, '0', '2023-06-08 16:31:24'),
(130, 66, 63, 'Zmc=', '', 1, '0', '2023-06-08 16:31:46'),
(131, 66, 63, 'aGVsbG8=', '', 1, '0', '2023-06-27 22:59:47');

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
(19, 'Nabin', 'nbn'),
(20, 'admin', 'Bnc'),
(21, 'admin', 'Bca 6 Sem Group Chats'),
(22, 'admin', 'as'),
(23, 'nabin', 'ty'),
(24, 'nabin', 'sdf'),
(25, 'admin', 'yu'),
(26, 'admin', 'yu'),
(27, 'admin', ''),
(28, 'admin', 'nbn'),
(29, 'admin', 'as'),
(30, 'admin', 'werdscscxz'),
(31, 'admin', '');

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
(148, 'admin', '', 78, 'nbn.jpg', '2023-05-02 21:24:03'),
(149, 'nabin', 'fsdf', 112, 'nabin.jpg', '2023-06-08 12:53:59'),
(150, 'admin', 'sdf', 112, 'nbn.jpg', '2023-06-08 12:54:04'),
(151, 'admin', 'dasds', 112, 'nbn.jpg', '2023-06-08 13:29:52'),
(152, 'admin', 'dasdsa', 112, 'nbn.jpg', '2023-06-08 13:29:56'),
(153, 'admin', 'yo', 112, 'nbn.jpg', '2023-06-08 13:30:00'),
(154, 'admin', 'ty', 110, 'nbn.jpg', '2023-06-08 13:43:34'),
(155, 'admin', 'fsdfsd', 111, 'nbn.jpg', '2023-06-28 23:00:40'),
(156, 'admin', 'Awesome content!', 111, 'nbn.jpg', '2023-06-28 23:00:45'),
(157, 'nabin', 'sfdsdf', 124, 'nabin.jpg', '2023-06-29 11:28:48'),
(158, 'nabin', 'sdfsdfdsf', 124, 'nabin.jpg', '2023-06-29 11:28:54'),
(159, 'nabin', 'sdfs dsfdsf', 124, 'nabin.jpg', '2023-06-29 11:28:59'),
(160, 'nabin', 'fsdfsfsds sfdsd sfsdfsd', 124, 'nabin.jpg', '2023-06-29 11:29:09'),
(161, 'nabin', 'Wow, great post!', 126, 'nabin.jpg', '2023-07-01 12:07:19'),
(162, 'admin', '', 127, 'nbn.jpg', '2023-07-01 12:09:27'),
(163, 'admin', 'Awesome content!', 130, 'nbn.jpg', '2023-07-02 11:36:24'),
(164, 'nabin', 'hello i am user', 130, 'nabin.jpg', '2023-07-02 11:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `contents` varchar(500) NOT NULL,
  `images` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `p_p` varchar(100) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `title`, `contents`, `images`, `username`, `p_p`, `tags`, `timestamp`) VALUES
(44, 'Second Posts', '<p>&lt;!doctype html&gt;</p><p>&lt;html&gt;</p><p>&lt;head&gt;</p><p>&nbsp; &lt;meta charset=\"UTF-8\"&gt;</p><p>&nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p><p>&nbsp; &lt;script src=\"https://cdn.tailwindcss.com\"&gt;&lt;/script&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p>&nbsp; &lt;h1 class=\"text-3xl font-bold underline\"&gt;</p><p>&nbsp; &nbsp; Hello world!</p><p>&nbsp; &lt;/h1&gt;</p><p>&lt;/body&gt;</p><p>&lt;/html&gt;</p>', '', 'admin', 'nbn.jpg', 'coding', '2023-04-23 06:13:11'),
(45, 'Node Js Is Best ', '<p>yes</p>', '', 'admin', 'nbn.jpg', 'coding', '2023-04-30 09:12:14'),
(46, 'Fix My code Hone Bottom is not working', '<p><b>Here in this code fix my Bottom Not Working&nbsp;</b></p><p><b><br></b></p><p><font color=\"#94a3b8\" face=\"Fira Code VF, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace\"><span style=\"font-variant-ligatures: none; white-space: pre; background-color: rgb(231, 156, 156);\">&lt;!-- Pin to top left corner --&gt;\r\n&lt;div class=\"relative h-32 w-32 ...\"&gt;\r\n  &lt;div class=\"absolute left-0 top-0 h-16 w-16 ...\"&gt;01&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;!-', '', 'nabin', 'nabin.jpg', 'coding', '2023-05-03 15:05:14'),
(47, 'What is Life!!', '<p class=\"contents\" style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\">This world is trapped in the well of suffering. What is this suffering due to?&nbsp; This suffering stems from ignorance of the Self. All suffering in this world is because of ignorance. This ignorance leads to attachment and abhorrence and suffering is experienced as a consequence. Only True Knowledge &amp;&nbsp;Enlightenment Science', '', 'testadmin', 'yo.jpg', 'life', '2023-05-03 15:07:33'),
(48, 'Life is not simple as They Says', '<p>assssssssssssssssssssssssssssadsd&nbsp; &nbsp; &nbsp; saddddddddddddddddddd</p>', '', 'testadmin', 'yo.jpg', 'life', '2023-05-03 15:09:57'),
(55, 'helo music ', '<p>asda&nbsp; &nbsp; &nbsp; asdasd asdasda sdasdasds a</p>', '', 'nabin', 'nabin.jpg', 'music', '2023-07-01 06:39:05'),
(56, 'Music', '<p>Music&nbsp;</p>', '', 'nabin', 'nabin.jpg', 'music', '2023-07-01 06:43:33'),
(57, 'Record Breaking albums', '<p>The Wekned: I feel it coming&nbsp;</p><p>My name is khan 1</p>', '', 'nabin', 'nabin.jpg', 'music', '2023-07-01 06:44:26'),
(58, '\"नेपाल राजनीति सम्बन्धी ताजा समाचारहरू!\"', '<p>नमस्ते, राजनीति प्रेमीहरू! यहाँ तपाईंलाई नेपालका राजनीतिक विश्वमा भएका हालका घटनाहरूमा जानकारी दिने छ। ताजा अपडेटहरू र घटनाहरू जसमा नयाँ नीति, घटनावशेष, र राजनीतिक दलहरूको कार्यकलापहरू छन्।</p><p><br></p><p>\"नयाँ राजनीतिक नीति घोषणा!\"</p><p>नेपालका राजनीतिक मान्यताहरूले नयाँ नीतिहरूको घोषणा गर्दै आएका छन्। [नीति शीर्षक] नामको नयाँ नीति लागू भएको छ, जसले विभिन्न समस्याहरू गतिपूर्वक हल गर्ने प्रतिबद्धता देखाएको छ। यस नीतिमा संघीयता, समावेशीकरण, न्यायप्रणाली, राष्ट्रिय सुरक्षा, र संघीय संरचना जस', '', 'balen', 'user-default.png', 'politics', '2023-07-01 06:46:22'),
(59, '\"राजनीतिक दलहरूको विपक्षमा सञ्चालित व्या', '<p>नेपालका राजनीतिक दलहरूको विपक्षमा आएका राजनीतिक व्यापार व्यवस्थापनले विपद्ले दिएको छ। धन, व्यापारिक नीति, आर्थिक मामिला, निवेश, र सम्बन्धित क्षेत्रहरूमा नयाँ नीति र सुधारहरूलाई लेखा-जोखा गर्दै यसले व्यापारिक समुदायमा असुविधा र समस्याहरू प्रश्नबाट पेश गरेको छ।</p><p>\"नेपालमा राजनीतिक व्यवस्थापनका लागि विदेशी निवेशमा वृद्धि!\"</p><p>नेपालका राजनीतिक व्यवस्थापनका लागि विदेशी निवेशले अभियान बढ्यो। विभिन्न देशबाट विदेशी निवेशकहरूले नेपालमा व्यवसाय, उद्योग, निर्माण, पर्यटन, र अन्य क्षेत्रहरूमा निवेश', '', 'balen', 'user-default.png', 'politics', '2023-07-01 07:27:02');

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

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(4, 'nbn', 'nabinxettri15@gmail.com', 'nbvnvbn');

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
(178, 'Nabin', 'yo', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:58:56'),
(179, 'Nabin', 'f', 17, ' nbn', 'nabin.jpg', '2023-04-28 23:59:00'),
(180, 'Admin', 'h', 17, ' nbn', 'nbn.jpg', '2023-04-28 23:59:06'),
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
(204, 'Nabin', 'yo', 18, ' nbn', 'nabin.jpg', '2023-04-30 20:42:49'),
(205, 'admin', 'hy', 17, ' nbn', 'nbn.jpg', '2023-06-28 14:54:38'),
(206, 'admin', 'yuyu', 17, ' nbn', 'nbn.jpg', '2023-06-28 14:54:43'),
(207, '', ' admin Joined Chat!!', 12, '', 'nbn.jpg', '2023-06-28 15:10:31'),
(208, 'admin', 'kjhkj', 12, '', 'nbn.jpg', '2023-06-28 15:10:41'),
(209, 'admin', 'khjkjhk', 12, '', 'nbn.jpg', '2023-06-28 15:10:44'),
(210, 'admin', 'hello', 12, '', 'nbn.jpg', '2023-06-28 15:10:47'),
(211, 'admin', 'y0', 21, ' Bca 6 Sem Group Cha', 'nbn.jpg', '2023-06-28 15:54:47'),
(212, 'admin', 'hello ', 20, ' Bnc', 'nbn.jpg', '2023-06-28 16:31:53'),
(213, 'admin', 'gh', 21, ' Bca 6 Sem Group Cha', 'nbn.jpg', '2023-06-28 21:11:18'),
(214, 'nabin', 'ghfg hgfh ', 21, ' Bca 6 Sem Group Cha', 'nbn.jpg', '2023-06-28 21:11:31'),
(215, 'nabin', 'ghfg hgfh ', 21, ' Bca 6 Sem Group Cha', 'nbn.jpg', '2023-06-28 21:11:37'),
(216, 'nabin', 'fghfgh fgh ', 21, ' Bca 6 Sem Group Cha', 'nbn.jpg', '2023-06-28 21:11:54'),
(217, 'nabin', 'fghfgh fgh ', 21, ' Bca 6 Sem Group Cha', 'nbn.jpg', '2023-06-28 21:11:57'),
(218, 'admin', 'sdfdsf', 29, ' as', 'nbn.jpg', '2023-06-28 22:09:03'),
(219, 'admin', 'sdfdsf', 29, ' as', 'nbn.jpg', '2023-06-28 22:09:05'),
(220, 'admin', 'shs dsh', 21, ' Bca 6 Sem Group Cha', 'nbn.jpg', '2023-07-02 11:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `group_photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `admin_id`, `adminname`, `photo`, `group_photo`, `created_at`) VALUES
(64, 'Social Connectors', 'Focuses on fostering connections ', 63, 'admin', NULL, 'download.jpg', '2023-07-14 10:59:47'),
(65, 'Tech Enthusiasts', 'Discussing and exploring the latest advancements', 63, 'admin', NULL, 'two.jpg', '2023-07-14 10:59:51'),
(66, 'eSports Elite', ' Professional gamers and eSports enthusiasts', 63, 'admin', NULL, 'three.jpg', '2023-07-14 10:59:55'),
(68, 'Youth in Politics', 'Encourages young individuals', 63, 'admin', NULL, 'four.jpg', '2023-07-14 10:59:58'),
(69, 'Nabin Group', 'I am nabin creating a group', 66, 'nabin', NULL, 'default.png', '2023-07-14 11:00:06'),
(70, 'admin', 'sdasd', 63, 'admin', NULL, 'default.png', '2023-07-14 11:00:10'),
(71, 'new', 'asdasd', 63, 'admin', NULL, 'default.png', '2023-07-14 10:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `group_posts`
--

CREATE TABLE `group_posts` (
  `id` int(10) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `name` varchar(155) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `p_p` varchar(500) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `group_posts` varchar(255) NOT NULL,
  `report_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_posts`
--

INSERT INTO `group_posts` (`id`, `admin_id`, `name`, `uname`, `p_p`, `topic`, `description`, `date`, `group_posts`, `report_details`) VALUES
(33, 63, 'Social Connectors', 'admin', 'nbn.jpg', 'Building Bridges: Join Our Social Connectors Commu', 'Are you looking to expand your social network, for', '2023-07-01 18:37:06', 'slide_1.jpg', ''),
(34, 63, 'Social Connectors', 'admin', 'nbn.jpg', 'hello', 'hello', '2023-07-01 18:46:02', '356916049_6279489438795772_1663940204216909054_n.png', ''),
(36, 63, 'Social Connectors', 'admin', 'nbn.jpg', 'Nepal is best ', 'best', '2023-07-01 18:48:43', 'download.jpg', ''),
(37, 63, 'Tech Enthusiasts', 'admin', 'nbn.jpg', 'New AI Era ', 'AI is the future ', '2023-07-01 19:24:23', 'yo.jpg', ''),
(38, 63, 'Social Connectors', 'admin', 'nbn.jpg', 'Hi ', 'kjbsaj dasbdj', '2023-07-02 05:53:42', 'download.jpg', ''),
(39, 66, 'Social Connectors', 'admin', 'nbn.jpg', 'new', 'sadsad', '2023-07-14 07:48:32', 'Balen_Shah3-cropped.png', ''),
(40, 66, 'Social Connectors', 'nabin', 'nabin.jpg', 'dasdas', 'dasdas', '2023-07-14 07:49:51', 'travelling.jpg', ''),
(41, 63, 'Social Connectors', 'admin', 'nbn.jpg', 'newsss', 'newssss', '2023-07-14 07:53:59', 'yo.jpg', ''),
(42, 66, 'Social Connectors', 'nabin', 'nabin.jpg', 'new3', 'news', '2023-07-14 07:54:26', 'heart.jpg', ''),
(43, 66, 'Social Connectors', 'nabin', 'nabin.jpg', 'new3', 'new3', '2023-07-14 07:54:46', 'heart.jpg', '');

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
(76, 'Admin', 'Nbn', '', 'nbn.jpg', '2023-06-29 17:20:00', '1'),
(79, 'Admin', 'A B C D E F G H', '', 'nabin.jpg', '2023-04-24 18:52:22', '1'),
(80, 'Admin', 'Hello ', '', 'thumb.png', '2023-04-24 18:52:17', '1'),
(90, 'Admin', 'Nbn', '', '', '2023-04-26 17:35:21', '1'),
(95, 'Admin', 'Nbn', '', '', '2023-04-26 20:52:23', '1'),
(97, 'Admin', 'Image ', '', 'couple-love-sunset-proposal-marriage-preview.jpg', '2023-04-26 20:52:58', '1'),
(98, 'Admin', 'Asdasd dsad', '', '', '2023-04-26 20:56:37', '1'),
(99, 'Admin', 'As', '', 'couple-love-sunset-proposal-marriage-preview.jpg', '2023-04-26 20:56:50', '1'),
(102, 'Nabin', 'Hello', '', 'nabin.jpg', '2023-04-28 16:53:27', '1'),
(103, 'Testadmin', 'Hello EveryOne', '', 'chart.png', '2023-05-02 17:52:42', '1'),
(105, 'Nabin', '#Hello People ', '', '', '2023-06-29 17:31:48', '0'),
(106, 'Admin', ' vbvcbcv', '', '', '2023-05-02 18:28:34', '1'),
(107, 'Admin', '?ghf ', '', '', '2023-05-02 18:30:42', '1'),
(108, 'Admin', 'Bcvbv🤪', '', '', '2023-05-02 18:33:14', '1'),
(110, 'Testadmin', 'Sad Life 😆', '', 'cover.jpg', '2023-05-02 21:40:37', '1'),
(111, 'Admin', '🤣😂😅😅😅😆😆😄😄😀😊🙂🙃🤪🤬😡🤬😡🤬😡🤬😳🤯☹☹☹☹🧖♂🧖♀🧖♀🧖♀🧖♀🧖♀🙃😡😳😡🤬☹🧖♀😳🙃🤯🧖♂😡☹😳🤯 ', '', '', '2023-05-10 21:18:52', '1'),
(116, 'Admin', '☹😳🤯 ', '', '', '2023-06-29 17:20:00', '1'),
(117, 'Admin', 'Ccxzcxzcxc', '', '', '2023-06-29 17:20:00', '1'),
(118, 'Admin', 'Xdxdvvcxv', '', 'nbn.jpg', '2023-06-29 17:20:00', '1'),
(121, 'Admin', ' ', '', '', '2023-06-28 23:23:00', '1'),
(122, 'Admin', ' ', '', '', '2023-06-28 23:25:46', '1'),
(123, 'Admin', ' ', '', '', '2023-06-28 23:26:32', '1'),
(124, 'Admin', 'Fgh', '', '', '2023-06-28 23:26:52', '1'),
(125, 'Admin', 'Hi 😳', '', 'WIN_20220721_17_53_01_Pro.jpg', '2023-06-28 23:27:17', '1'),
(126, 'Balen', 'Hello People😐 ', '', 'Balen_Shah3-cropped.png', '2023-07-01 12:05:59', '1'),
(127, 'Balen', 'धेरै असल मानिसहरु छन् मेरा साथी ! वहाँहरु मध्ये एक हुनुहुन्छ वेल्फेयर अफिसर पुर्ण लिम्बु सर ! धन्यवाद सरलाई !', '', '', '2023-07-01 12:08:37', '1'),
(128, 'Nabin', '#marvel superheros 🤩🤩', '', '355444504_171244175924560_7061122278216903487_n.jpg', '2023-07-01 12:09:08', '1'),
(129, 'Admin', 'Pizza', '', 'pexels-rene-strgar-16423978 (360p).mp4', '2023-07-01 12:11:00', '1'),
(130, 'Admin', 'Hi Morning😀', '', 'pexels-benjamin-hastings-17209196 (360p).mp4', '2023-07-02 11:42:59', '0');

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
(59, 0, 63, 76, 4, ''),
(60, 0, 63, 78, 6, ''),
(61, 0, 63, 80, 4, 'admin'),
(62, 0, 63, 79, 3, 'admin'),
(64, 0, 63, 93, 2, 'admin'),
(65, 0, 63, 99, 2, 'admin'),
(66, 0, 63, 98, 2, 'admin'),
(67, 0, 0, 102, 1, 'nabin'),
(68, 0, 66, 102, 6, 'admin'),
(69, 0, 63, 108, 5, 'testadmin'),
(70, 0, 63, 107, 1, 'testadmin'),
(71, 0, 66, 105, 2, 'testadmin'),
(72, 0, 67, 103, 1, 'testadmin'),
(73, 0, 63, 106, 2, 'testadmin'),
(74, 0, 63, 91, 1, 'testadmin'),
(75, 0, 63, 96, 1, 'admin'),
(76, 0, 67, 104, 1, 'testadmin'),
(77, 0, 63, 97, 1, 'testadmin'),
(78, 0, 67, 109, 5, 'admin'),
(79, 0, 66, 109, 3, 'nabin'),
(81, 0, 66, 110, 7, 'nabin'),
(82, 0, 63, 110, 7, 'admin'),
(83, 0, 66, 111, 11, 'nabin'),
(84, 0, 63, 111, 5, 'admin'),
(85, 0, 66, 107, 1, 'nabin'),
(86, 0, 63, 112, 10, 'admin'),
(87, 0, 66, 112, 4, 'nabin'),
(88, 0, 63, 0, 1, ''),
(89, 0, 67, 125, 1, 'testadmin'),
(90, 0, 63, 126, 1, 'admin'),
(91, 0, 66, 126, 1, 'nabin'),
(92, 0, 66, 129, 1, 'nabin');

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
(27, 'admin', 'Hello', '2023-04-30 08:59:42.111743'),
(28, 'admin', 'uio', '2023-06-08 11:01:44.650822'),
(29, 'admin', 'Abj asdasd', '2023-06-10 11:38:28.210378'),
(30, 'admin', 'dsamdn as das', '2023-06-10 11:38:34.319281'),
(31, 'admin', 'askd as', '2023-06-10 11:38:35.990114'),
(32, 'testadmin', 'hello i m test admin', '2023-07-01 06:15:47.761573'),
(33, 'nabin', 'hello mysewlf nbn', '2023-07-01 06:15:59.117003');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(100) NOT NULL,
  `post_noti` varchar(255) NOT NULL,
  `message_noti` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(101) NOT NULL,
  `image_id` int(50) NOT NULL,
  `report` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `post_noti`, `message_noti`, `created_at`, `user_id`, `image_id`, `report`) VALUES
(37, 'Your post has been deleted by an admin.', 'Your post got deletyed', '2023-06-29 11:46:48', 66, 105, 1),
(38, 'Your post has been deleted by an admin.', '', '2023-07-02 05:57:59', 63, 130, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_posts`
--

CREATE TABLE `report_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `warning` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_posts`
--

INSERT INTO `report_posts` (`id`, `user_id`, `post_id`, `reason`, `warning`) VALUES
(36, 66, 105, 'asaSA', ''),
(37, 63, 129, 'Fake video', ''),
(38, 63, 130, 'harassed', '');

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
(63, 'admin', 'admin', 'Admin', '', 'admin@gmail.com                  ', 2147483647, '$2y$10$E1leQpL9pQ2PgnA5oih1IuVdqQd6pnPjDiktaMv.HNoYKcScqWyAq', 'nbn.jpg', 'nbn.jpg', '2023-07-02 01:09:57', 0, 0, '', 0, 'coding'),
(66, 'nabin', 'nabin', 'Chhetri', '', 'Nbn@gmail.com          ', 0, '$2y$10$XfguqoT2skjhdtSQQoMYf.1.BXoxGhIeLJi.W5g65Dtgmnx0rQcuy', 'nabin.jpg', 'thumb.png', '2023-06-28 11:40:32', 0, 0, '', 0, 'music'),
(67, 'testadmin', 'testadmin', 'Testadmin', '', 'Testadmin@gmail.com ', 0, '$2y$10$PosMAZNiBsH/ZrQxl6aUaO05R/DQ7IVlGmBTZSc0dl6hrkJ9FT2W6', 'yo.jpg', 'cover.jpg', '2023-05-02 17:23:23', 0, 0, '', 0, 'life'),
(68, 'Pawan', 'pawanregmi', 'Regmi', 'Male', 'Pawanregmi@gmail.com', 0, '$2y$10$r5s8L.AerMDYzzKblf38l.gIEGE5UdCSMbIG0k/tvKcILJYlvXfhu', 'user-default.png', '', '2023-05-28 14:26:02', 0, 0, '', 0, ''),
(69, 'balen', 'balen', 'Shah ', '', 'Balendra123@gmail.com  ', 0, '$2y$10$yVAgvt1K9zvfYw2hrucWWO1Y.BOJQJHt0aex..gFAj1zNPDv6dgkW', 'download.jpg', 'maxresdefault.jpg', '2023-07-01 12:03:30', 0, 0, '', 0, 'politics');

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bios`
--
ALTER TABLE `bios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `group_posts`
--
ALTER TABLE `group_posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `live_chat`
--
ALTER TABLE `live_chat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `report_posts`
--
ALTER TABLE `report_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
