-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 01:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hks_manpower`
--

-- --------------------------------------------------------

--
-- Table structure for table `tree_entry`
--

CREATE TABLE `tree_entry` (
  `entry_id` int(11) NOT NULL,
  `parent_entry_id` int(11) NOT NULL DEFAULT 0 COMMENT '0 if its on the root level otherwise refering to another entry in this table',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table holding all the tree nodes';

--
-- Dumping data for table `tree_entry`
--

INSERT INTO `tree_entry` (`entry_id`, `parent_entry_id`, `created_at`, `updated_at`) VALUES
(1, 0, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(2, 0, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(3, 0, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(4, 9, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(5, 9, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(6, 9, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(7, 5, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(8, 5, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(9, 1, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(10, 1, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(11, 10, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(12, 11, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(13, 3, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(14, 2, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(15, 13, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(32, 0, '2022-12-07 04:43:34', '2022-12-07 04:43:34'),
(17, 13, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(18, 5, '2022-12-07 09:02:16', '2022-12-07 09:02:16'),
(34, 0, '2022-12-07 06:35:09', '2022-12-07 06:35:09'),
(33, 1, '2022-12-07 04:44:04', '2022-12-07 04:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `tree_entry_lang`
--

CREATE TABLE `tree_entry_lang` (
  `entry_id` int(11) NOT NULL,
  `lang` varchar(3) NOT NULL COMMENT 'language for the translation (eng/ger)',
  `name` varchar(255) NOT NULL COMMENT 'translated name for the given entry',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='translation table for tree_entry';

--
-- Dumping data for table `tree_entry_lang`
--

INSERT INTO `tree_entry_lang` (`entry_id`, `lang`, `name`, `created_at`, `updated_at`) VALUES
(1, 'eng', 'Prio 1 Tasks', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(2, 'eng', 'Prio 2 Tasks', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(3, 'eng', 'Prio 3 Tasks', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(4, 'eng', 'Point ABC123', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(5, 'eng', 'Point BCD123', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(6, 'eng', 'Point UARGH123', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(7, 'eng', 'Task 22222', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(8, 'eng', 'Task 566', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(9, 'eng', 'Supplier', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(10, 'eng', 'Customer', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(11, 'eng', '204. Task', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(12, 'eng', '209. Task', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(13, 'eng', '123. Task', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(14, 'eng', 'asdasd. Task', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(15, 'eng', 'nomnom. Task', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(17, 'eng', 'Gedöns Task', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(18, 'eng', 'ZOMG Task', '2022-12-07 09:00:57', '2022-12-07 09:00:57'),
(34, 'eng', 'Test', '2022-12-07 06:35:09', '2022-12-07 06:35:09'),
(33, 'eng', 'ts=est22', '2022-12-07 04:44:04', '2022-12-07 04:44:04'),
(32, 'eng', 'test11', '2022-12-07 04:43:34', '2022-12-07 04:43:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tree_entry`
--
ALTER TABLE `tree_entry`
  ADD PRIMARY KEY (`entry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tree_entry`
--
ALTER TABLE `tree_entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
