-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 04:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `chat_img` varchar(50) NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `chat_img`, `opened`, `created_at`) VALUES
(4, 2, 1, 'nbn', '', 1, '2022-03-05 22:53:43'),
(5, 1, 2, 'yo', '', 1, '2022-03-05 22:53:53'),
(6, 2, 1, 'Hello', '', 1, '2022-03-06 20:40:49'),
(8, 2, 1, '', 'logo.png', 1, '2022-03-07 21:20:43'),
(9, 1, 2, 'sdjfs dfbdsbfds', '', 1, '2022-03-07 21:22:04'),
(10, 1, 2, 'sdfsdf sdf', '', 1, '2022-03-07 21:22:17'),
(11, 1, 2, 'Jk Don ', '', 0, '2022-03-08 22:33:39'),
(12, 1, 2, 'asd', '', 0, '2022-03-08 22:40:03'),
(13, 1, 2, 'ghvg hv hvhm', '', 0, '2022-03-09 08:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `room_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`id`, `name`, `room_name`) VALUES
(1, 'Nbn', 'nbn'),
(2, 'Nbn', 'yo'),
(5, 'Nbn', 'fg'),
(8, 'Nbn', 'fgh fghfg'),
(9, 'Nbn', 'nn'),
(10, 'Nbn', 'kjljkl'),
(12, 'Nbn', 'nbn new group'),
(13, 'Jkk', 'yo');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(155) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `photo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`, `photo_id`) VALUES
(1, 'Nbn', 'h', 1),
(2, 'Nbn', 'gdfg', 1),
(3, 'Nbn', 'fgh', 1),
(4, 'Nbn', 'g', 1),
(5, 'Nbn', 'hfgh', 2),
(6, 'Nbn', 'ds', 6),
(7, 'Jk', 'dsadsa', 6),
(8, 'Jk', 'dsb dsbf', 7),
(9, 'Jk', 'asdas', 8),
(10, 'Nbn', 'zxc', 8),
(11, 'Nbn', 'zxc', 8);

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `global_notify`
--

CREATE TABLE `global_notify` (
  `id` int(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `global_notify`
--

INSERT INTO `global_notify` (`id`, `topic`, `description`, `date`) VALUES
(2, 'asd', 'asd', '2022-03-08 17:19:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupchat`
--

INSERT INTO `groupchat` (`id`, `name`, `chats`, `chat_room`, `room_name`, `p_p`, `time`) VALUES
(2, 'Nbn', 'hfg', 1, '', '', '2022-03-08 04:13:24'),
(3, 'Nbn', 'dsad', 5, '', '', '2022-03-08 04:16:17'),
(4, 'Nbn', 'gfdg', 1, ' nbn', '', '2022-03-08 04:36:47'),
(5, 'Nbn', 'fsf', 5, ' fg', '', '2022-03-08 04:45:25'),
(6, 'Nbn', 'sdf', 5, ' fg', '', '2022-03-08 04:45:34'),
(8, '', 'dfg', 5, '', 'jk.png', '2022-03-08 04:46:12'),
(9, 'Jkk', 'df', 5, '', 'jk.png', '2022-03-08 04:46:14'),
(10, 'Jkk', 'gfdg', 5, '', 'jk.png', '2022-03-08 04:46:16'),
(11, 'Nbn', 'fsf', 5, ' fg', '', '2022-03-08 04:46:25'),
(12, '', 'fdfdf', 5, '', 'nbn.jpg', '2022-03-08 04:46:50'),
(13, 'Nbn', 'fdsf', 5, '', 'nbn.jpg', '2022-03-08 04:46:53'),
(14, 'Nbn', 'fsdfdsf', 5, '', 'nbn.jpg', '2022-03-08 04:46:55'),
(15, 'Jkk', 'fsdfsdf', 5, '', 'jk.png', '2022-03-08 04:47:02'),
(16, 'Nbn', 'as', 2, ' yo', '', '2022-03-08 04:47:37'),
(17, 'Nbn', 'fsd', 2, ' yo', '', '2022-03-08 04:54:41'),
(18, '', 'bvc', 0, '', 'nbn.jpg', '2022-03-08 05:45:54'),
(19, 'Nbn', 'bcvb', 5, '', 'nbn.jpg', '2022-03-08 05:45:57'),
(20, 'Nbn', 'nbn whats Up Man I a', 2, ' yo', '', '2022-03-08 05:47:04'),
(21, 'Nbn', 'fgh', 2, ' yo', '', '2022-03-08 06:03:23'),
(22, 'Nbn', 'hfgh', 2, ' yo', '', '2022-03-08 06:03:25'),
(23, 'Nbn', 'new Msg here ', 2, ' yo', '', '2022-03-08 06:03:32'),
(24, 'Nbn', 'gh', 12, ' nbn new group', '', '2022-03-08 06:04:17'),
(25, 'Nbn', 'Yes Man Here ', 12, ' nbn new group', '', '2022-03-08 06:04:26'),
(26, 'Jkkytu', 'utyu', 13, ' yo', '', '2022-03-08 06:07:10'),
(27, '', 'qew', 13, 'yo', 'nbn.jpg', '2022-03-08 06:07:21'),
(28, 'Jkk', 'gh', 0, ' <br /><b>Notice</b>', '', '2022-03-08 06:08:23'),
(29, '', '123', 13, '', 'nbn.jpg', '2022-03-08 06:09:41'),
(30, 'Nbn', '123', 13, '', 'nbn.jpg', '2022-03-08 06:09:55'),
(31, 'Nbn', 'fdghfd ghdfg', 13, '', 'nbn.jpg', '2022-03-08 06:10:09'),
(32, '', 'p', 13, '', 'jk.png', '2022-03-08 06:10:46'),
(33, 'Jkk', 'fdgvfd', 13, '', 'jk.png', '2022-03-08 06:10:49'),
(34, 'Nbn', 'qw', 13, '', 'nbn.jpg', '2022-03-08 06:11:06'),
(35, 'Nbn', 'O Na Na Whats My Nam', 13, '', 'nbn.jpg', '2022-03-08 06:11:20'),
(36, 'Jkk', 'Your Name is Mr Nbn', 13, '', 'jk.png', '2022-03-08 06:11:39'),
(37, '', '', 13, '', 'nbn.jpg', '2022-03-08 06:14:06'),
(38, 'Nbn', 'hgfh', 13, '', 'nbn.jpg', '2022-03-08 06:14:10'),
(39, '', 'dsa', 13, '', 'nbn.jpg', '2022-03-08 06:20:24'),
(40, '', 'gfdg', 5, '', 'nbn.jpg', '2022-03-08 06:25:45'),
(41, 'Nbn', 'gfdg', 5, '', 'nbn.jpg', '2022-03-08 06:25:58'),
(42, '', 'dsfsdf', 5, '', 'jk.png', '2022-03-08 06:26:13'),
(43, 'Jkk', 'Yo Nbn', 5, '', 'jk.png', '2022-03-08 06:26:18'),
(44, '', 'qwqw', 13, '', 'jk.png', '2022-03-08 06:49:20'),
(45, 'You Joined Chat!!', '', 13, '', 'jk.png', '2022-03-08 06:58:50'),
(46, '', 'You Joined Chat!!', 13, '', 'jk.png', '2022-03-08 06:59:31'),
(47, '', ' NbnYou Joined Chat!', 13, '', 'nbn.jpg', '2022-03-08 07:00:52'),
(48, '', ' Jkk Joined Chat!!', 5, '', 'jk.png', '2022-03-08 20:51:59'),
(49, 'Jkk', 'yo ', 5, '', 'jk.png', '2022-03-08 20:52:03'),
(50, '', ' Nbn Joined Chat!!', 5, '', 'nbn.jpg', '2022-03-08 20:52:25'),
(51, 'Nbn', 'Yo Nbn ', 5, '', 'nbn.jpg', '2022-03-08 20:52:30'),
(52, '', ' Jkk Joined Chat!!', 0, '', 'jk.png', '2022-03-08 21:02:14'),
(53, '', ' Jkk Joined Chat!!', 0, '', 'jk.png', '2022-03-08 21:04:42'),
(54, 'Jkk', 'Yo', 5, '', 'jk.png', '2022-03-08 21:04:48'),
(55, '', ' Jkk Joined Chat!!', 0, '', 'jk.png', '2022-03-08 21:06:28'),
(56, '', ' Jkk Joined Chat!!', 0, '', 'jk.png', '2022-03-08 21:07:32'),
(57, '', ' Jkk Joined Chat!!', 5, '', 'jk.png', '2022-03-08 21:08:07'),
(58, '', ' Jkk Joined Chat!!', 13, '', 'jk.png', '2022-03-08 21:16:29'),
(59, 'Jkk', 'Yo Welcom Here ', 13, '', 'jk.png', '2022-03-08 21:16:40'),
(60, '', ' Jkk Joined Chat!!', 5, '', 'jk.png', '2022-03-08 21:44:37'),
(61, '', ' Jkk Joined Chat!!', 5, '', 'jk.png', '2022-03-08 21:46:51'),
(62, 'Jkk', 'Hello Whats You ', 5, '', 'jk.png', '2022-03-08 21:47:00'),
(63, 'Nbn', 'Im Good What About Y', 5, ' fg', '', '2022-03-08 21:47:34'),
(64, '', ' Jkk Joined Chat!!', 5, '', 'jk.png', '2022-03-08 21:47:56'),
(65, 'Jkk', 'Me Too Whats Yo Doin', 5, '', 'jk.png', '2022-03-08 21:48:07'),
(66, 'Nbn', 'Nbnnn', 5, ' fg', '', '2022-03-08 22:02:15'),
(67, 'Jkk', 'Yo Jk Don Im here ', 5, '', 'jk.png', '2022-03-08 22:02:30'),
(68, 'Jkk', 'Timro Jawani Ma Aaja', 5, '', 'jk.png', '2022-03-08 22:03:08'),
(69, 'Jkk', 'yo joban tmlai diula', 5, '', 'jk.png', '2022-03-08 22:03:17'),
(70, 'Jkk', 'jhasi ki rani yo jow', 5, '', 'jk.png', '2022-03-08 22:03:33'),
(71, 'Nbn', 'Nice Song Man Wow Im', 5, ' fg', '', '2022-03-08 22:03:59'),
(72, '', ' Jkk Joined Chat!!', 13, '', 'jk.png', '2022-03-08 22:05:09'),
(73, 'Jkk', 'dcxz', 13, '', 'jk.png', '2022-03-08 22:05:12'),
(74, 'Jkk', 'zxc', 13, ' yo', '', '2022-03-08 22:05:29'),
(75, 'Nbn', 'Whats Up Nig', 2, ' yo', '', '2022-03-09 08:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `something` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `something`, `comment`, `file_name`, `uploaded_on`, `likes`, `status`) VALUES
(6, 'Nbn', 'We', '', 'login.png', '2022-03-06 12:58:26', 0, '1'),
(7, 'Jk', 'Sdjfnds dsf', '', 'naruto.jpg', '2022-03-07 21:18:44', 0, '1'),
(8, 'Jk', 'Hhabshbd ahsj', '', 'naruto.jpg', '2022-03-08 22:38:51', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `password` varchar(1000) NOT NULL,
  `p_p` varchar(255) DEFAULT 'user-default.png',
  `c_p` varchar(30) NOT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp(),
  `is_blocked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `lastname`, `gender`, `email`, `password`, `p_p`, `c_p`, `last_seen`, `is_blocked`) VALUES
(1, 'Nbn', 'nbn', 'Xettri', 'Male', 'Nabinxettri15@gmail.com', '$2y$10$/EEqs.YHEJSXmPL2sQW7luOy8fxU3ftt1EA4ElaF7xg/NGFVIVsMq', 'nbn.jpg', 'chatimg.jpg', '2022-03-09 08:40:51', 0),
(2, 'Jkk', 'jk', 'Don', 'Male', 'Jk@gmail.com ', '$2y$10$Uw0FslpBzQTIr57hwZXxbOzOP3EJc.xsf4LA8bEDUgt.TBGP3BKti', 'jk.png', 'group.png', '2022-03-07 21:45:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `location`) VALUES
(4, 'ZENITSU EDIT _ HERE - YouTube - Google Chrome 2022-01-31 23-32-20.mp4', 'client/assets/videos/ZENITSU EDIT _ HERE - YouTube - Google Chrome 2022-01-31 23-32-20.mp4'),
(5, 'THIS IS 4K ANIME (Zenitsu) - YouTube - Google Chrome 2022-01-31 23-24-20.mp4', 'client/assets/videos/THIS IS 4K ANIME (Zenitsu) - YouTube - Google Chrome 2022-01-31 23-24-20.mp4');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `images`
--
ALTER TABLE `images`
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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `global_notify`
--
ALTER TABLE `global_notify`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
