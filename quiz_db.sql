-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2025 at 08:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5b13ed3a6e006', '5b13ed3a9436a'),
('5b13ed72489d8', '5b13ed7263d70'),
('5b141d712647f', '5b141d71485b9'),
('5b141d718f873', '5b141d71978be'),
('5b141d71ddb46', '5b141d71e5f43'),
('5b141d721a738', '5b141d7222884'),
('5b141d7260b7d', '5b141d7268b9a'),
('5b141d72a6fa1', '5b141d72aefcb'),
('5b141d72d7a1c', '5b141d72dfa7b'),
('5b141d731429b', '5b141d731c234'),
('5b141d7345176', '5b141d734cd1b'),
('5b141d737ddfc', '5b141d73858df'),
('687c8a3418c36', '687c8a341961b'),
('687c8a341e90f', '687c8a341f49b'),
('687c8a3423dad', '687c8a3424535'),
('687f9e113f166', '687f9e113f884'),
('687f9e1142279', '687f9e1142a69'),
('687f9e1144e43', '687f9e1145417'),
('687f9e1147c7c', '687f9e1148afe'),
('687f9e114a6cf', '687f9e114adc7');

-- --------------------------------------------------------

--
-- Table structure for table `essay_answers`
--

CREATE TABLE `essay_answers` (
  `answer_id` int(11) NOT NULL,
  `essay_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essay_answers`
--

INSERT INTO `essay_answers` (`answer_id`, `essay_id`, `email`, `answer`, `date`) VALUES
(1, 1, 'rish@gmail.com', 'LVXDLM MVCM', '2025-08-02 11:34:30'),
(2, 2, 'rish@gmail.com', 'KCBMMKMLCX', '2025-08-02 11:34:37'),
(3, 1, 'rish@gmail.com', 'x,dnvlkansz v', '2025-08-02 11:37:20'),
(4, 2, 'rish@gmail.com', 'x.lkfjgon bkdcvoiughd jxdnviughsd', '2025-08-02 11:37:30'),
(5, 3, 'rish@gmail.com', 'x,fknlkidj  xjdnbjhd xndvhbihf', '2025-08-02 11:37:40'),
(6, 4, 'rish@gmail.com', 'fkngik kxdnigohd kdngihs8d ndghiuod', '2025-08-02 11:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `essay_questions`
--

CREATE TABLE `essay_questions` (
  `essay_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essay_questions`
--

INSERT INTO `essay_questions` (`essay_id`, `title`, `question`, `date`) VALUES
(1, 'OOP', 'what is the purpose of using constractor in oop? ', '2025-08-02'),
(2, 'OOP', 'gvgvhvkbjli hbkjuuhi bkjujhh', '2025-08-02'),
(3, 'DBMS', 'HGHGFYFHJVJN HJVHNBHJJJ', '2025-08-02'),
(4, 'SCIENCE', ',MJNDVN  SKJDNG JXNDVN', '2025-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('suryaprasadtripathy8@gmail.com', '5b141b8009cf0', 22, 10, 8, 2, '2018-06-03 16:56:00'),
('sas@gmail.com', '687c89841cea6', -18, 3, 0, 3, '2025-07-20 06:27:29'),
('zain@gmail.com', '687c89841cea6', -18, 3, 0, 3, '2025-07-22 14:04:09'),
('ra@gmail.com', '687f9c1353805', -2, 5, 1, 4, '2025-07-31 12:59:53'),
('rish@gmail.com', '687f9c1353805', 1, 5, 2, 3, '2025-08-02 06:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5b13ed3a6e006', 'sdb', '5b13ed3a9436a'),
('5b13ed3a6e006', 'jsdb', '5b13ed3a94374'),
('5b13ed3a6e006', 'dsbv', '5b13ed3a94377'),
('5b13ed3a6e006', 'jbdv', '5b13ed3a94379'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d70'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d7a'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d7d'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d80'),
('5b141d712647f', 'Personal Home Page', '5b141d71485b9'),
('5b141d712647f', 'Private Home Page', '5b141d71485dc'),
('5b141d712647f', 'Pretext Hypertext Processor', '5b141d71485e0'),
('5b141d712647f', 'Preprocessor Home Page', '5b141d71485e4'),
('5b141d718f873', 'Rasmus Lerdorf', '5b141d71978be'),
('5b141d718f873', 'Willam Makepiece', '5b141d71978cc'),
('5b141d718f873', 'Drek Kolkevi', '5b141d71978d1'),
('5b141d718f873', 'List Barely', '5b141d71978d4'),
('5b141d71ddb46', '.html', '5b141d71e5f2b'),
('5b141d71ddb46', '.ph', '5b141d71e5f3c'),
('5b141d71ddb46', '.php', '5b141d71e5f43'),
('5b141d71ddb46', '.xml', '5b141d71e5f48'),
('5b141d721a738', 'for loop', '5b141d7222820'),
('5b141d721a738', 'do-while loop', '5b141d722282f'),
('5b141d721a738', 'foreach loop', '5b141d7222880'),
('5b141d721a738', 'All of the above', '5b141d7222884'),
('5b141d7260b7d', 'echo (â€œHello Worldâ€);', '5b141d7268b8a'),
('5b141d7260b7d', 'print (â€œHello Worldâ€);', '5b141d7268b95'),
('5b141d7260b7d', 'printf (â€œHello Worldâ€);', '5b141d7268b98'),
('5b141d7260b7d', 'All of the above', '5b141d7268b9a'),
('5b141d72a6fa1', 'file()', '5b141d72aefcb'),
('5b141d72a6fa1', 'arr_file()', '5b141d72aefd8'),
('5b141d72a6fa1', 'arrfile()', '5b141d72aefdc'),
('5b141d72a6fa1', 'file_arr()', '5b141d72aefe0'),
('5b141d72d7a1c', 'Magic Function', '5b141d72dfa7b'),
('5b141d72d7a1c', 'Inbuilt Function', '5b141d72dfa85'),
('5b141d72d7a1c', 'Default Function', '5b141d72dfa88'),
('5b141d72d7a1c', 'User Defined Function', '5b141d72dfa8b'),
('5b141d731429b', 'CREATE TABLE table_name (column_name column_type);', '5b141d731c234'),
('5b141d731429b', 'CREATE table_name (column_type column_name);', '5b141d731c242'),
('5b141d731429b', 'CREATE table_name (column_name column_type);', '5b141d731c248'),
('5b141d731429b', 'CREATE TABLE table_name (column_type column_name);', '5b141d731c24b'),
('5b141d7345176', 'get_array() and get_row()', '5b141d734cd10'),
('5b141d7345176', 'fetch_array() and fetch_row()', '5b141d734cd1b'),
('5b141d7345176', 'get_array() and get_column()', '5b141d734cd1d'),
('5b141d7345176', 'fetch_array() and fetch_column()', '5b141d734cd20'),
('5b141d737ddfc', 'explode()', '5b141d73858d0'),
('5b141d737ddfc', 'implode()', '5b141d73858df'),
('5b141d737ddfc', 'concat()', '5b141d73858e3'),
('5b141d737ddfc', 'concatenate()', '5b141d73858e8'),
('687c8a3418c36', 'smdnckj', '687c8a3419614'),
('687c8a3418c36', 'm vnjwnre', '687c8a341961b'),
('687c8a3418c36', 'm  vem v', '687c8a341961d'),
('687c8a3418c36', 'kdfmnvnfi', '687c8a341961e'),
('687c8a341e90f', 'm,adn vjkanev', '687c8a341f491'),
('687c8a341e90f', 'n dfvkjnejr', '687c8a341f499'),
('687c8a341e90f', 'md nvjanfj', '687c8a341f49b'),
('687c8a341e90f', 'm dcvjequivhioerj', '687c8a341f49c'),
('687c8a3423dad', 'mc nvjnfjv', '687c8a342452b'),
('687c8a3423dad', 'mndcvjfuivnu', '687c8a3424532'),
('687c8a3423dad', 'mjcnvu ihiefuhv', '687c8a3424534'),
('687c8a3423dad', 'ncbjhfhvken', '687c8a3424535'),
('687f9e113f166', 'Encapsulation', '687f9e113f880'),
('687f9e113f166', 'Abstraction', '687f9e113f883'),
('687f9e113f166', 'compilation', '687f9e113f884'),
('687f9e113f166', 'Inheritance', '687f9e113f885'),
('687f9e1142279', 'To destroy an object', '687f9e1142a64'),
('687f9e1142279', 'To create an object', '687f9e1142a68'),
('687f9e1142279', 'To initialize an option', '687f9e1142a69'),
('687f9e1142279', 'To call a function', '687f9e1142a6a'),
('687f9e1144e43', 'Accessing private data of a class', '687f9e1145412'),
('687f9e1144e43', 'creating new classes from existing classes', '687f9e1145416'),
('687f9e1144e43', 'Hiding unnecessary data ', '687f9e1145417'),
('687f9e1144e43', 'Making data private', '687f9e1145418'),
('687f9e1147c7c', '', '687f9e1148afe'),
('687f9e1147c7c', '', '687f9e1148b02'),
('687f9e1147c7c', '', '687f9e1148b03'),
('687f9e1147c7c', '', '687f9e1148b04'),
('687f9e114a6cf', '', '687f9e114adc7'),
('687f9e114a6cf', '', '687f9e114add0'),
('687f9e114a6cf', '', '687f9e114add1'),
('687f9e114a6cf', '', '687f9e114add2');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5b13ed30cd71f', '5b13ed3a6e006', 'dbjb', 4, 1),
('5b13ed6bb8bcd', '5b13ed72489d8', 'dvsd', 4, 1),
('5b141b8009cf0', '5b141d712647f', 'What does PHP stand for?', 4, 1),
('5b141b8009cf0', '5b141d718f873', 'Who is the father of PHP?', 4, 2),
('5b141b8009cf0', '5b141d71ddb46', 'PHP files have a default file extension of.', 4, 3),
('5b141b8009cf0', '5b141d721a738', 'Which of the looping statements is/are supported by PHP?', 4, 4),
('5b141b8009cf0', '5b141d7260b7d', 'Which of the following PHP statements will output Hello World on the screen?', 4, 5),
('5b141b8009cf0', '5b141d72a6fa1', 'Which one of the following function is capable of reading a file into an array?', 4, 6),
('5b141b8009cf0', '5b141d72d7a1c', 'A function in PHP which starts with __ (double underscore) is know as..', 4, 7),
('5b141b8009cf0', '5b141d731429b', 'Which one of the following statements is used to create a table?', 4, 8),
('5b141b8009cf0', '5b141d7345176', 'Which of the methods are used to manage result sets using both associative and indexed arrays?', 4, 9),
('5b141b8009cf0', '5b141d737ddfc', 'Which one of the following functions can be used to concatenate array elements to form a single delimited string?', 4, 10),
('687c89841cea6', '687c8a3418c36', 'kjpoijopeemv', 4, 1),
('687c89841cea6', '687c8a341e90f', 'sdmvcpojdvi djn jdv', 4, 2),
('687c89841cea6', '687c8a3423dad', 'dskmoicajer vjefhv hef v f jrfnv', 4, 3),
('687f9c1353805', '687f9e113f166', 'which of the following is not a principle of OOP?', 4, 1),
('687f9c1353805', '687f9e1142279', 'What is the purpose of  constructor in a class?', 4, 2),
('687f9c1353805', '687f9e1144e43', 'What is mean by \"Inheritance\" in OOP?', 4, 3),
('687f9c1353805', '687f9e1147c7c', '', 4, 4),
('687f9c1353805', '687f9e114a6cf', '', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `date`) VALUES
('5b141b8009cf0', 'Php & Mysqli', 3, 1, 10, '2018-06-03 16:46:56'),
('687c89841cea6', 'Oop', 8, 6, 3, '2025-07-20 06:15:32'),
('687f9c1353805', 'Advanced Oop', 2, 1, 5, '2025-07-22 14:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('sas@gmail.com', -18, '2025-07-20 06:27:29'),
('zain@gmail.com', -18, '2025-07-22 14:04:09'),
('ra@gmail.com', -2, '2025-07-31 12:59:53'),
('rish@gmail.com', 1, '2025-08-02 06:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `college`, `email`, `password`) VALUES
('ramla', 'sltc', 'ra@gmail.com', '123'),
('ramla', 'sltc', 'ramrish@gmail.com', '123'),
('Rishad', 'slit', 'rish@gmail.com', '1234098'),
('shazna', 'icst', 'sas@gmail.com', '1234'),
('sasna', 'icst', 'sasnamuzammil@gmail.com', '1234'),
('admin@admin.com', 'icst', 'shazna.sonfortech@gmail.com', 'admin'),
('shazna', 'icst', 'shazna@gmail.com', '123'),
('zainab', 'icst', 'zain@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `essay_answers`
--
ALTER TABLE `essay_answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `essay_id` (`essay_id`);

--
-- Indexes for table `essay_questions`
--
ALTER TABLE `essay_questions`
  ADD PRIMARY KEY (`essay_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `essay_answers`
--
ALTER TABLE `essay_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `essay_questions`
--
ALTER TABLE `essay_questions`
  MODIFY `essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `essay_answers`
--
ALTER TABLE `essay_answers`
  ADD CONSTRAINT `essay_answers_ibfk_1` FOREIGN KEY (`essay_id`) REFERENCES `essay_questions` (`essay_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
