-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 07:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted, high-level and general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', '2021-02-09 13:17:59'),
(2, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing', '2021-02-09 13:19:42'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2021-02-10 23:33:45'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party', '2021-02-10 23:34:22'),
(5, 'React', 'React is an open-source, front end, JavaScript library for building user interfaces or UI components. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mob', '2021-02-10 23:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'This is a comment', 1, 6, '2021-02-12 14:48:28'),
(2, 'This is not the comment that you were expecting about right.', 1, 5, '2021-02-12 18:12:59'),
(3, 'This is the best comment you can ever had in your life span remember this always', 1, 4, '2021-02-12 18:42:14'),
(4, 'This is a comment from the textarea box', 1, 10, '2021-02-12 18:47:14'),
(5, 'This is a comment from the textarea box', 1, 3, '2021-02-12 18:47:44'),
(6, '', 5, 8, '2021-02-12 19:03:57'),
(7, 'njcjncsd cndsjncdsc dscndskncdsjc dscncknsdncsdcs dcnsdjncsdnjk.cscsdc dsjncc', 1, 9, '2021-02-12 21:34:36'),
(8, 'njkscnsd nckdjcnsd ncdsjncjksd ncknsdcjksd cnsdnkcn', 1, 2, '2021-02-12 21:37:36'),
(9, 'njncddsc ndcjndcdc ncsdnc', 10, 1, '2021-02-12 21:38:13'),
(10, '', 1, 7, '2021-02-13 12:11:26'),
(11, 'mkmkn', 1, 9, '2021-02-13 21:16:47'),
(12, 'mkmkn', 1, 11, '2021-02-13 21:17:50'),
(13, 'this is a comment', 1, 5, '2021-02-13 21:22:05'),
(14, 'this is a comment', 1, 8, '2021-02-13 21:26:30'),
(15, 'this is a comment', 1, 3, '2021-02-13 21:32:59'),
(16, 'mm ', 9, 7, '2021-02-14 00:31:50'),
(17, 'hi hello', 1, 11, '2021-02-14 00:56:31'),
(18, 'hi hello', 1, 11, '2021-02-14 00:57:55'),
(19, 'hi hellp ji', 1, 12, '2021-02-14 01:05:45'),
(20, 'njndn fsd', 15, 11, '2021-02-14 01:16:22'),
(21, 'This is just a comment from chhhaku', 1, 11, '2021-02-14 10:32:17'),
(22, 'Ok boss this is my answer', 17, 11, '2021-02-14 11:14:33'),
(23, 'scriptalert(\"ok\");/script', 17, 11, '2021-02-14 11:36:17'),
(24, '&lt;script&gt;alert(\"hacked\");&lt;/script&gt;', 17, 11, '2021-02-14 11:39:56'),
(25, '&lt;script&gt;alert(\"hacked\");&lt;/script&gt;', 17, 11, '2021-02-14 11:42:20'),
(26, 'ded', 8, 13, '2021-02-26 23:58:10'),
(27, '&lt;script&gt;alert(\"ok\");&lt;/script&gt;', 8, 13, '2021-02-26 23:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install pyaudio in Windows', 'I have a Windows 10 PC and I want to install pyaudio to use it with my chatbot, powered by chatterbot.\r\n\r\nI tried 2 different ways to install pyaudio.\r\n', 1, 6, '2021-02-11 09:46:10'),
(2, 'Having problem with pylint', 'This problem with pylint is a a seripus problem that needs to be solved otherwise the system is crashing.', 1, 4, '2021-02-11 18:53:34'),
(3, 'Top 10', ' lovable best private banks in India: 2020dsdsd sd sd sd s ds  ssdsd', 1, 9, '2021-02-11 19:01:16'),
(4, 'Top 10 l', 'mkmlkmkl mlkmlk  ovable best private bank  s in India: 2020', 2, 10, '2021-02-11 19:30:14'),
(5, 'Top 10 l', 'mkmlkmkl mlkmlk  ovable best private bank  s in India: 2020', 2, 1, '2021-02-11 19:38:05'),
(6, 'Top 10 l', 'mkmlkmkl mlkmlk  ovable best private bank  s in India: 2020', 2, 7, '2021-02-11 19:39:03'),
(7, 'Top 10 l', 'mkmlkmkl mlkmlk  ovable best private bank  s in India: 2020', 2, 8, '2021-02-11 19:39:22'),
(8, 'Deals/Coupon Affiliate Website Development', 'dsasd', 2, 5, '2021-02-11 19:39:58'),
(9, 'Top 10 lovable best private banks in India: 2020', 'mkmk', 3, 3, '2021-02-12 08:40:33'),
(10, 'bchscbsdbhc bcbsdcbsd bdsdh', 'bcjhschsdb bcscbhsdhc cbjsdchs', 1, 2, '2021-02-12 16:07:05'),
(11, 'new question', 'want a answer', 1, 11, '2021-02-13 15:37:56'),
(12, 'Top 10 lovable best p', 'kmmk', 3, 8, '2021-02-13 19:00:31'),
(13, 'mkmkm', 'mmmllllllllllllllllllllllllllllllllllllllllllllllllllll', 1, 9, '2021-02-13 19:39:30'),
(14, 'mkmkm', 'mmmllllllllllllllllllllllllllllllllllllllllllllllllllll', 1, 7, '2021-02-13 19:45:42'),
(15, 'cdcsd', 'fsdfsdcs ddddddddddddddddddddddddddddddddd', 1, 11, '2021-02-13 19:46:07'),
(16, 'hello ', 'boyoid', 1, 11, '2021-02-14 05:06:04'),
(17, 'This is my question', 'how to tell you that', 4, 11, '2021-02-14 05:44:03'),
(18, '&lt;script&gt;alert(\"hacked\");&lt;/script&gt;', '&lt;script&gt;alert(\"hacked\");&lt;/script&gt;', 1, 11, '2021-02-14 06:12:36'),
(19, 'Top 10 lovable best private banks in India: 2020 The Power of Now  (English, Paperback, Tolle Eckhart)', 'hi there hello This is my question Asked by ok @ok at 2021-02-14 11:14:03 how to tell you that Browse Questions Asked:\r\n\r\nFlask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party\r\n\r\n', 4, 11, '2021-02-14 14:20:42'),
(20, 'Top 10 lovable best private banks in India: 2020', 'nothing just fun', 5, 14, '2021-03-05 18:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `username` varchar(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'ken', 'ncdn@ncnd.cd', 'cdc', '2021-02-12 23:25:02'),
(2, 'jango', 'heyaritra2016@gmail.com', '$2y$10$AaORw.VQW.Xl3ESu01HTEuMFsSbcU3vAhsharyXuKj7EjuR5/BbYu', '2021-02-12 23:45:26'),
(3, 'ken', 'ncdn@ncnd.cd', 'mklnjnknkjjk', '2021-02-13 21:37:19'),
(4, 'jango', 'heyaritra2@gmail.com', '$2y$10$i6AFR5s/wSw8AEuJwb0Kyuq9lyNY81KH1Kr3bM937kNFmZTY4O0di', '2021-02-12 23:56:24'),
(5, 'mk', 'anwitodas2000@gmail.com', '$2y$10$hfe.39Zvp2wmb9BX58fL/u5Po8YYS7dJa4aLVbZ1xPHZDccB.s9gu', '2021-02-13 00:03:10'),
(6, 'm3', 'chdbc@ndej.com', '$2y$10$Pc3xU0DlcMh9JB/uX3QQ4.ieI2Fn5lLbNOel8SmzPjfivUJ23OS5S', '2021-02-13 00:04:04'),
(7, 'dr', 'jnnd@kmcd.vom', '$2y$10$UbSwb08twLY3.fBPpUSDh.VmqIPll8bIhqEUUlpnO0BBdjfH2e3LW', '2021-02-13 00:06:53'),
(8, 'mm', 'heyarit6@gmail.com', '$2y$10$iihhdckFjRzHsVW63t.SQulgwv98JY/CMYEbwZ7SHBpj4J0668iRK', '2021-02-13 00:14:30'),
(9, 'mkk', 'jio0@pmail.com', '$2y$10$KFrRUDqf3dMqw7mudLp3meVK9gvXEb98j.ocZRNg4cWMGssNZgNDe', '2021-02-13 00:16:02'),
(10, 'esop', 'xsxs@ff.vv', '$2y$10$zRb9R/4Mv8WFE29bubwXpOH2RXJdM2y3czW0kDOVsZEkm6M8A7H0O', '2021-02-13 00:25:13'),
(11, 'ok', 'ok@ok.com', '$2y$10$J53/w3dNaWw99xuSxsbeHu8g3HmY0goOteKArrRKM/.UbsQEEz6w6', '2021-02-13 00:57:09'),
(12, 'new aritra', 'newaritra@gmail.com', '$2y$10$lW5OCGi1Lki21tAc23m3zejg21j7MmA1v07p51rdgngLkfWVa4Xje', '2021-02-14 01:02:37'),
(13, 'jio123', 'jio123@gmail.com', '$2y$10$/GNhxipdWpGxW73u4wCyYeNScDwKWGXti0OtzxYwISz6E83ikQvO.', '2021-02-26 23:57:02'),
(14, 'jiop', 'jio0@yopmail.com', '$2y$10$A8h2zN9d0xrD4wk3i2ZJfOppa/caWF1WwpphT0IFGKxeKkidbnlB6', '2021-03-06 00:16:25'),
(15, 'a', 'a@a.com', '$2y$10$7v0CCb2R7zxR6wKtgXvjmeLj.0wMyvY43uwrWECpdG9MSMgaoRiwy', '2022-02-05 23:41:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
