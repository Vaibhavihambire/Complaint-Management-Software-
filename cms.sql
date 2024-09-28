-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 04:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL),
('create-complaint', '7', NULL),
('create-complaint', '8', NULL),
('create-user', '1', NULL),
('create-user', '2', NULL),
('is-eng', '5', NULL),
('is-eng', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'allows admin for all', NULL, NULL, NULL, NULL),
('create-complaint', 1, 'allow user to make complaint', NULL, NULL, NULL, NULL),
('create-user', 1, 'admin can create user', NULL, NULL, NULL, NULL),
('is-eng', 1, 'inspect and do to complaint as complete/pending', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create-complaint'),
('admin', 'create-user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engdetails`
--

CREATE TABLE `engdetails` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `work` varchar(50) NOT NULL,
  `phoneNo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `engdetails`
--

INSERT INTO `engdetails` (`id`, `name`, `work`, `phoneNo`) VALUES
(1, 'Vaibhavi Hambire', 'IT', 123),
(2, 'Viraj Hambire', 'Electronic', 234);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(20) NOT NULL,
  `byUserId` int(20) NOT NULL,
  `byUserName` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `byUserId`, `byUserName`, `description`, `time`) VALUES
(1, 1, 'Admin', 'create all', 0),
(2, 2, 'vaibhavi', '', 0),
(3, 2, 'vaibhavi', 'Change password user: \'vaibhav', 1696015570),
(4, 2, 'vaibhavi', 'Viewed password details of use', 1696015570),
(5, 1, 'Admin', 'Created new user: \'Admin\'', 1696053547),
(6, 1, 'Admin', 'Viewed password details of use', 1696053547),
(7, 1, 'Admin', 'Created new user: \'vaibhavi\'', 1696251973),
(8, 1, 'Admin', 'Viewed password details of use', 1696251973),
(9, 1, 'Admin', 'Created new user: \'viraj\'', 1696252037),
(10, 1, 'Admin', 'Viewed password details of use', 1696252037),
(11, 1, 'Admin', 'Updated permissions of user: \'', 1696252156),
(12, 1, 'Admin', 'Viewed password details of use', 1696252156),
(13, 1, 'Admin', 'Viewed password details of use', 1696252165),
(14, 1, 'Admin', 'Viewed password details of use', 1696252173),
(15, 1, 'Admin', 'Created new user: \'ishika\'', 1697891954),
(16, 1, 'Admin', 'Viewed password details of use', 1697891954),
(17, 5, 'viraj', 'Com Id: 2Complete by Engineer', 1697904145),
(18, 1, 'Admin', 'Created new user: \'nupur\'', 1697986460),
(19, 1, 'Admin', 'Viewed password details of use', 1697986460),
(20, 6, 'ishika', 'Comp Id: \'2\' Pending by engine', 1697988358),
(21, 6, 'ishika', 'Com Id: 2Complete by Engineer', 1697988361),
(22, 6, 'ishika', 'Comp Id: \'2\' Pending by engine', 1697989724),
(23, 6, 'ishika', 'Com Id: 2Complete by Engineer', 1697989726),
(24, 6, 'ishika', 'Com Id: 2Complete by Engineer', 1697990056),
(25, 6, 'ishika', 'Comp Id: \'2\' Pending by engine', 1698037181),
(26, 6, 'ishika', 'Com Id: 2Complete by Engineer', 1698037183),
(27, 6, 'ishika', 'Comp Id: \'2\' Pending by engine', 1698045334),
(28, 6, 'ishika', 'Com Id: 2Complete by Engineer', 1698045339),
(29, 7, 'nupur', 'Created new Complaints', 1698048639),
(30, 7, 'nupur', 'Deleted complaint with id= 7', 1698048650),
(31, 1, 'Admin', 'Created new user: \'vai\'', 1699250997),
(32, 1, 'Admin', 'Viewed password details of use', 1699250997),
(33, 8, 'vai', 'Created new Complaints', 1699251169),
(34, 6, 'ishika', 'Com Id: 8Complete by Engineer', 1699251213);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1696004735);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `auth_key` varchar(50) NOT NULL,
  `password_hash` varchar(50) NOT NULL,
  `status` smallint(10) NOT NULL DEFAULT 10,
  `created_at` int(20) NOT NULL,
  `updated_at` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `auth_key`, `password_hash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'ouEQWYy9X66mupeCCBnS-MsqhZtPA-Ea', 'Admin', 10, 1688981990, 1689760807),
(2, 'vaibhavi', '', 'vai', 10, 0, 1696015570),
(5, 'viraj', 'yAPApiFJXkCAoe71isLhA2sbn1HEHBeo', 'viraj', 10, 1696252037, 1696252037),
(6, 'ishika', 'fHPdghkWvyS55mUIiujr17_jTlmrG_lS', 'ishika', 10, 1697891954, 1697891954),
(7, 'nupur', 'N-S5WVz4CtjnVVisbiZ-g_IKZmG3txgw', 'nupur', 10, 1697986460, 1697986460),
(8, 'vai', 'iyo6b5GMTN2_s8nWWdE7gKiBsR3WT52u', 'vaibhavi', 10, 1699250997, 1699250997);

-- --------------------------------------------------------

--
-- Table structure for table `user_complaint`
--

CREATE TABLE `user_complaint` (
  `id` int(20) NOT NULL,
  `comid` int(20) NOT NULL,
  `NameOfEmployee` varchar(50) NOT NULL,
  `EmailOfEmployee` varchar(50) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `BlockNo` int(20) NOT NULL,
  `ComplaintCategory` varchar(50) NOT NULL,
  `EngineerAssigned` varchar(50) NOT NULL,
  `DateOfIncident` date NOT NULL,
  `SubjectForComplaint` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `sent2eng` tinyint(20) NOT NULL,
  `created_by` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_complaint`
--

INSERT INTO `user_complaint` (`id`, `comid`, `NameOfEmployee`, `EmailOfEmployee`, `Department`, `BlockNo`, `ComplaintCategory`, `EngineerAssigned`, `DateOfIncident`, `SubjectForComplaint`, `Description`, `status`, `sent2eng`, `created_by`) VALUES
(2, 0, 'vabhavi', 'vaibhavi@gmail.com', '232', 12, 'IT', 'Viraj Hambire', '0000-00-00', '12', '1212', '✔', 1, 1),
(8, 0, 'vai', 'vai@gmail.com', '121', 1, 'Electronic', 'Vaibhavi Hambire', '0000-00-00', 'need', 'i want ', '✔', 1, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `engdetails`
--
ALTER TABLE `engdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_complaint`
--
ALTER TABLE `user_complaint`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmailOfEmployee` (`EmailOfEmployee`),
  ADD KEY `comid` (`comid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engdetails`
--
ALTER TABLE `engdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_complaint`
--
ALTER TABLE `user_complaint`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
