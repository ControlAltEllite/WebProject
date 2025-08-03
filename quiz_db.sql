-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 10:51 AM
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
-- Table structure for table `ai_generated_questions`
--

CREATE TABLE `ai_generated_questions` (
  `question_id` varchar(255) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options`)),
  `correct_answer` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('687f9e114a6cf', '687f9e114adc7'),
('688dedf19010b', '688dedf19231f'),
('688dedf194f8f', '688dedf19708a'),
('688dedf198d16', '688dedf19ae07'),
('688dedf19eb6f', '688dedf1a0a82'),
('688dedf1a346d', '688dedf1afbcb'),
('688df6dad0fe4', '688df6dad1fd7'),
('688df6dad2d5f', '688df6dad3b83'),
('688df6dad5298', '688df6dad636d'),
('688df6dad7527', '688df6dad7a89'),
('688df6dad9581', '688df6dada68f'),
('688efec6a4f17', '688efec6a7dce'),
('688efec6a8bfc', '688efec6a98c9'),
('688efec6ab0a5', '688efec6ac719'),
('688efec6afb62', '688efec6b0c90'),
('688efec6b38b1', '688efec6b4e82');

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
(6, 4, 'rish@gmail.com', 'fkngik kxdnigohd kdngihs8d ndghiuod', '2025-08-02 11:37:50'),
(7, 1, 'rish@gmail.com', ' jbjkbjnbbkjjjh', '2025-08-03 14:07:05'),
(8, 1, 'ramrish@gmail.com', 'm,sdn cvkljfevnj', '2025-08-03 14:15:28');

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
('rish@gmail.com', '687f9c1353805', 1, 5, 2, 3, '2025-08-02 06:08:38'),
('rish@gmail.com', '688dedf18e3f3', -1, 1, 0, 1, '2025-08-02 10:54:18'),
('rish@gmail.com', '688df6dad0977', -3, 3, 0, 3, '2025-08-02 11:31:02'),
('rish@gmail.com', '688efec6a11bb', -1, 1, 0, 1, '2025-08-03 08:37:19'),
('ramrish@gmail.com', '688efec6a11bb', -1, 5, 1, 4, '2025-08-03 08:45:59');

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
('687f9e114a6cf', '', '687f9e114add2'),
('688dedf19010b', 'To catch exceptions that were not caught by the \'except\' block.', '688dedf1913a4'),
('688dedf19010b', 'To define code that will always be executed, regardless of whether an exception was raised or not.', '688dedf19231f'),
('688dedf19010b', 'To define code that will only be executed if an exception was raised.', '688dedf192fff'),
('688dedf19010b', 'To define code that will only be executed if no exception was raised.', '688dedf193a98'),
('688dedf194f8f', 'Queue', '688dedf1958ec'),
('688dedf194f8f', 'Linked List', '688dedf19665d'),
('688dedf194f8f', 'Stack', '688dedf19708a'),
('688dedf194f8f', 'Tree', '688dedf197a74'),
('688dedf198d16', 'O(n)', '688dedf199645'),
('688dedf198d16', 'O(n log n)', '688dedf19a323'),
('688dedf198d16', 'O(log n)', '688dedf19ae07'),
('688dedf198d16', 'O(1)', '688dedf19b80c'),
('688dedf19eb6f', 'A way to create objects dynamically at runtime.', '688dedf19f601'),
('688dedf19eb6f', 'A mechanism where a class inherits properties and methods from another class.', '688dedf1a0a82'),
('688dedf19eb6f', 'A technique for hiding data within a class.', '688dedf1a133e'),
('688dedf19eb6f', 'A process of converting one data type to another.', '688dedf1a1bac'),
('688dedf1a346d', 'To create a new branch in a Git repository.', '688dedf1ae9ce'),
('688dedf1a346d', 'To merge changes from one branch into another.', '688dedf1af332'),
('688dedf1a346d', 'To copy a Git repository from a remote source to a local machine.', '688dedf1afbcb'),
('688dedf1a346d', 'To commit changes to a Git repository.', '688dedf1b0434'),
('688df6dad0fe4', 'Ensuring reliable data transfer between two adjacent nodes over a physical link.', '688df6dad159b'),
('688df6dad0fe4', 'Defining the mechanical, electrical, and functional interface to the physical medium.', '688df6dad1ad9'),
('688df6dad0fe4', 'Routing data packets from source to destination across multiple networks.', '688df6dad1fd7'),
('688df6dad0fe4', 'Providing end-to-end communication between applications.', '688df6dad2432'),
('688df6dad2d5f', 'To encrypt data transmitted over the network.', '688df6dad346c'),
('688df6dad2d5f', 'To divide a network into smaller, more manageable subnetworks.', '688df6dad3b83'),
('688df6dad2d5f', 'To assign IP addresses to devices on the network.', '688df6dad4136'),
('688df6dad2d5f', 'To prevent unauthorized access to the network.', '688df6dad4824'),
('688df6dad5298', 'HTTP', '688df6dad57f2'),
('688df6dad5298', 'FTP', '688df6dad5d51'),
('688df6dad5298', 'DNS', '688df6dad636d'),
('688df6dad5298', 'SMTP', '688df6dad6980'),
('688df6dad7527', 'TCP is connection-oriented, providing reliable data transfer, while UDP is connectionless and unreliable.', '688df6dad7a89'),
('688df6dad7527', 'TCP is faster than UDP.', '688df6dad800c'),
('688df6dad7527', 'TCP is used for streaming video, while UDP is used for email.', '688df6dad866b'),
('688df6dad7527', 'TCP is a transport layer protocol, while UDP is an application layer protocol.', '688df6dad8b99'),
('688df6dad9581', 'To provide wireless connectivity.', '688df6dada27d'),
('688df6dad9581', 'To prevent unauthorized access to or from a private network.', '688df6dada68f'),
('688df6dad9581', 'To speed up network performance.', '688df6dadaad6'),
('688df6dad9581', 'To manage network IP addresses.', '688df6dadaf38'),
('688efec6a4f17', 'HTTP', '688efec6a5eec'),
('688efec6a4f17', 'FTP', '688efec6a6a30'),
('688efec6a4f17', 'SMTP', '688efec6a7584'),
('688efec6a4f17', 'HTTPS', '688efec6a7dce'),
('688efec6a8bfc', 'To encrypt data', '688efec6a9293'),
('688efec6a8bfc', 'To identify the network portion of an IP address', '688efec6a98c9'),
('688efec6a8bfc', 'To assign IP addresses dynamically', '688efec6a9e8b'),
('688efec6a8bfc', 'To prevent network congestion', '688efec6aa3f4'),
('688efec6ab0a5', 'Router', '688efec6ab6df'),
('688efec6ab0a5', 'Hub', '688efec6abfe3'),
('688efec6ab0a5', 'Switch', '688efec6ac719'),
('688efec6ab0a5', 'Firewall', '688efec6aea6c'),
('688efec6afb62', 'To translate domain names to IP addresses', '688efec6b038d'),
('688efec6afb62', 'To automatically assign IP addresses to devices', '688efec6b0c90'),
('688efec6afb62', 'To encrypt network traffic', '688efec6b12fc'),
('688efec6afb62', 'To prevent unauthorized access to the network', '688efec6b1a19'),
('688efec6b38b1', 'Connectionless and unreliable', '688efec6b3ef6'),
('688efec6b38b1', 'Connection-oriented and reliable', '688efec6b4e82'),
('688efec6b38b1', 'Used for streaming video', '688efec6b576f'),
('688efec6b38b1', 'Broadcast-based', '688efec6b5d32');

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
('687f9c1353805', '687f9e114a6cf', '', 4, 5),
('688dedf18e3f3', '688dedf19010b', 'What is the purpose of the \'finally\' block in a try-except-finally statement in Python?', 4, 1),
('688dedf18e3f3', '688dedf194f8f', 'Which of the following data structures follows the Last-In, First-Out (LIFO) principle?', 4, 2),
('688dedf18e3f3', '688dedf198d16', 'What is the time complexity of searching for an element in a balanced binary search tree?', 4, 3),
('688dedf18e3f3', '688dedf19eb6f', 'In object-oriented programming, what is inheritance?', 4, 4),
('688dedf18e3f3', '688dedf1a346d', 'What is the purpose of the \'git clone\' command?', 4, 5),
('688df6dad0977', '688df6dad0fe4', 'Which of the following is the main function of the Network Layer in the OSI model?', 4, 1),
('688df6dad0977', '688df6dad2d5f', 'What is the purpose of a subnet mask?', 4, 2),
('688df6dad0977', '688df6dad5298', 'Which protocol is used for translating domain names to IP addresses?', 4, 3),
('688df6dad0977', '688df6dad7527', 'What is the difference between TCP and UDP?', 4, 4),
('688df6dad0977', '688df6dad9581', 'What is the role of a firewall in network security?', 4, 5),
('688efec6a11bb', '688efec6a4f17', 'Which protocol is used for secure communication over the internet, ensuring data encryption and authentication?', 4, 1),
('688efec6a11bb', '688efec6a8bfc', 'What is the purpose of a subnet mask in IP addressing?', 4, 2),
('688efec6a11bb', '688efec6ab0a5', 'Which networking device operates at the Data Link Layer (Layer 2) of the OSI model and forwards data based on MAC addresses?', 4, 3),
('688efec6a11bb', '688efec6afb62', 'What is the function of DHCP (Dynamic Host Configuration Protocol) on a network?', 4, 4),
('688efec6a11bb', '688efec6b38b1', 'Which of the following is a characteristic of TCP (Transmission Control Protocol)?', 4, 5);

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
('687f9c1353805', 'Advanced Oop', 2, 1, 5, '2025-07-22 14:11:31'),
('688dedf18e3f3', 'programming', 3, 1, 5, '2025-08-02 10:52:33'),
('688df6dad0977', 'networking', 3, 1, 5, '2025-08-02 11:30:34'),
('688efec6a11bb', 'networking', 3, 1, 5, '2025-08-03 06:16:38');

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
('rish@gmail.com', 1, '2025-08-02 06:08:38'),
('ramrish@gmail.com', -1, '2025-08-03 08:45:59');

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
-- Indexes for table `ai_generated_questions`
--
ALTER TABLE `ai_generated_questions`
  ADD PRIMARY KEY (`question_id`);

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
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `essay_questions`
--
ALTER TABLE `essay_questions`
  MODIFY `essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
