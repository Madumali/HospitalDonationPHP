-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 08:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hospital2`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'Administrative Department'),
(2, 'Finance Division'),
(3, 'Ward No 01'),
(4, 'Ward No 02'),
(5, 'Ward No 03'),
(6, 'Ward No 04'),
(7, 'Ward No 05'),
(8, 'Ward No 07'),
(9, 'Ward No 09'),
(10, 'Ward No 10'),
(11, 'Ward No 11'),
(12, 'Ward No 12'),
(13, 'Ward No 13'),
(14, 'Ward No 14'),
(15, 'Ward No 15A'),
(16, 'Ward No 15B'),
(17, 'Ward No 15C'),
(18, 'Ward No 17'),
(19, 'Ward No 18'),
(20, 'Ward No 19'),
(21, 'Ward No 20'),
(22, 'Ward No 21'),
(23, 'Ward No 22'),
(24, 'Ward No 23'),
(25, 'Ward No 24'),
(26, 'Ward No 25'),
(27, 'Ward No 26'),
(28, 'Ward No 27'),
(29, 'Ward No 28'),
(30, 'Ward No 29'),
(31, 'Ward No 30'),
(32, 'SICU'),
(33, 'MICU'),
(34, 'Theater'),
(35, 'Pharmacy'),
(36, 'Dental'),
(37, 'Biochemistry Lab'),
(38, 'Blood Bank'),
(39, 'Hematology Lab'),
(40, 'Drugs Store'),
(41, 'Histopathology Lab'),
(42, 'MRO Room'),
(43, 'Clinic'),
(44, 'CRU'),
(45, 'CT Unit'),
(46, 'Counselling Unit'),
(47, 'BTU'),
(48, 'ETU'),
(49, 'ECG Room'),
(50, 'Relaxation Unit'),
(51, 'Physiotherapy'),
(52, 'Radiology Department'),
(53, 'Surgical Stores'),
(54, 'General Stores'),
(55, 'Health Education Unit'),
(56, 'Kitchen'),
(57, 'Linac'),
(59, 'Ward No 16'),
(61, 'Bleeding Room'),
(62, 'DTU'),
(63, 'CT Reporting Unit');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `donorName` int(11) NOT NULL,
  `donationDate` date NOT NULL,
  `donation_delet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `user`, `donorName`, `donationDate`, `donation_delet`) VALUES
(2, 'DAMITH HASHAN', 125, '2022-01-11', 0),
(3, 'DAMITH HASHAN', 126, '2022-01-11', 0),
(8, 'DAMITH HASHAN', 125, '2022-01-11', 0),
(9, 'DAMITH HASHAN', 126, '2022-01-11', 0),
(10, 'DAMITH HASHAN', 127, '2022-01-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `donor_type` varchar(20) NOT NULL,
  `don_team_name` varchar(100) NOT NULL,
  `member_name` varchar(50) DEFAULT NULL,
  `national_id` varchar(13) DEFAULT NULL,
  `address_line1` varchar(40) NOT NULL,
  `address_line2` varchar(40) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `contact_no2` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `donor_type`, `don_team_name`, `member_name`, `national_id`, `address_line1`, `address_line2`, `contact_no`, `contact_no2`, `email`, `reg_date`, `status`) VALUES
(177, 'PERSON', 'MADUSHANI', '', '946205356222', 'MAKOLA', 'MAK', '0112355655', '', 'MADU@GMAIL.COM', '2021-11-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_all`
--

CREATE TABLE `donor_all` (
  `donor_id` int(11) NOT NULL,
  `donor_type` varchar(10) NOT NULL,
  `title` varchar(10) NOT NULL,
  `national_id` varchar(13) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `address_line1` varchar(40) NOT NULL,
  `address_line2` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `contact_no2` varchar(10) NOT NULL,
  `reg_date` date NOT NULL,
  `delete_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_all`
--

INSERT INTO `donor_all` (`donor_id`, `donor_type`, `title`, `national_id`, `donor_name`, `address_line1`, `address_line2`, `email`, `contact_no`, `contact_no2`, `reg_date`, `delete_status`) VALUES
(124, 'Person', 'MR', '444444444444', 'RA', 'G', 'G', 'R@GMAIL.COM', '6666666666', '', '2022-01-11', 0),
(125, 'Person', 'MR', '970440160V', 'DAMITH HASHAN RATHNAYAKA', '391,', 'HEIYANTHUDUWA', 'D@GMAIL.COM', '0714926357', '', '2022-01-11', 0),
(123, 'team', 'T/C', 'T00123', 'EE', 'AA', '', 'DD', '44', '', '2022-01-11', 0),
(126, 'team', 'T/C', 'T00126', 'DADA', 'DADAD', '', 'A@GMAIL.COM', '1111111111', '', '2022-01-11', 0),
(127, 'team', 'T/C', 'T00127', 'TEST', 'TESDF', '', 'RR', '444444', '', '2022-01-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_team`
--

CREATE TABLE `donor_team` (
  `teamid` int(11) NOT NULL,
  `donor_name` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `membername` varchar(50) NOT NULL,
  `national_idt` varchar(13) NOT NULL,
  `address_line1t` varchar(40) NOT NULL,
  `address_line2t` varchar(40) NOT NULL,
  `contact_not` varchar(10) NOT NULL,
  `emailt` varchar(50) NOT NULL,
  `reg_datet` date NOT NULL,
  `deletestatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_team`
--

INSERT INTO `donor_team` (`teamid`, `donor_name`, `title`, `membername`, `national_idt`, `address_line1t`, `address_line2t`, `contact_not`, `emailt`, `reg_datet`, `deletestatus`) VALUES
(53, 127, 'MR', 'MR.GF', '444444444444', 'GH', 'GH', '3232343412', 'F@G.NM', '2022-01-11', 0),
(51, 123, 'MR', 'H', '555555566666', 'MK', 'MJ', '0115233566', 'M@GMAIL.COM', '2022-01-11', 0),
(52, 126, 'DFGDg', 'DGDG', '775757575757', 'GDGDGD', '5757575', '5757575', '', '2022-01-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issuance`
--

CREATE TABLE `issuance` (
  `issuance_id` int(11) NOT NULL,
  `issued_by` varchar(100) NOT NULL,
  `issue_type` varchar(20) NOT NULL,
  `issue_item` varchar(50) NOT NULL,
  `issue_itemqty` int(11) NOT NULL,
  `issue_dep` int(11) NOT NULL,
  `to_whom` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `issue_delet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuance`
--

INSERT INTO `issuance` (`issuance_id`, `issued_by`, `issue_type`, `issue_item`, `issue_itemqty`, `issue_dep`, `to_whom`, `issue_date`, `issue_delet`) VALUES
(5, 'DAMITH HASHAN', 'SC', 'SC0004', 1, 3, 'RRR', '2021-12-20', 0),
(6, 'DAMITH HASHAN', 'DR', 'DR00016', 1, 4, 'ddd', '2021-12-20', 0),
(7, 'DAMITH HASHAN', 'DR', 'DR00016', 1, 5, 'WE', '2021-12-20', 0),
(9, 'DAMITH HASHAN', 'SC', 'SC0004', 1, 15, 'kkk', '2022-01-11', 0),
(10, 'DAMITH HASHAN', 'SC', 'SC0004', 1, 8, 'ss', '2022-01-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemtype`
--

CREATE TABLE `itemtype` (
  `type_id` int(11) NOT NULL,
  `type_code` varchar(20) NOT NULL,
  `type_name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemtype`
--

INSERT INTO `itemtype` (`type_id`, `type_code`, `type_name`, `status`) VALUES
(1, 'SC', 'Surgical Consumables', 0),
(2, 'SI', 'Surgical Items', 0),
(3, 'CI', 'Consumable Items', 0),
(4, 'DR', 'Drugs', 0),
(5, 'GI', 'General Items', 0),
(6, 'FD', 'Foods', 0),
(22, 'T', 'TES', 1),
(23, 'te', 'PPvv', 1),
(24, 'NEWD', 'TPss', 1),
(25, 'BN', 'gg', 1),
(26, 'tr', 'klty', 1),
(27, 'ds', 'dsds', 1),
(28, 'TEST', 'TEST123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_name`
--

CREATE TABLE `item_name` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type_cd` varchar(20) NOT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) DEFAULT NULL,
  `delete_name` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_name`
--

INSERT INTO `item_name` (`id`, `code`, `type_cd`, `itemname`, `stock_in`, `stock_out`, `delete_name`) VALUES
(1, 'SC0001', 'SC', 'mmmmm', 0, 0, 1),
(2, 'SI0001', 'SI', 'SIITEM1', 0, 0, 1),
(3, 'CI0001', 'CI', 'CIITEM1', 0, NULL, 0),
(4, 'SC0004', 'SC', 'SCITEM2', 0, NULL, 0),
(5, 'GI0005', 'GI', 'GIITEM1', 0, NULL, 0),
(6, 'FD0006', 'FD', 'FD1', 0, NULL, 0),
(7, 'CI0002', 'CI', 'CINEW2', 0, NULL, 1),
(8, 'DR00016', 'DR', 'DRNEW1', 0, NULL, 0),
(9, 'GI002', 'GI', 'NEWGI', 0, NULL, 1),
(10, 'SI0002', 'SI', 'SINEW2', 0, NULL, 0),
(11, 'FD0009', 'FD', 'FDN9', 0, NULL, 0),
(12, 'GI0009', 'GI', 'gitest2', 0, NULL, 1),
(13, 'DR0009', 'DR', 'DT4', 0, NULL, 1),
(14, 'SC00014', 'SC', 'SCMASK', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

CREATE TABLE `item_table` (
  `item_id` int(11) NOT NULL,
  `donationNum` int(11) NOT NULL,
  `type_code` varchar(20) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_qty` int(50) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `receive_date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_table`
--

INSERT INTO `item_table` (`item_id`, `donationNum`, `type_code`, `item_name`, `item_qty`, `item_description`, `receive_date`, `deleted`) VALUES
(843, 2, 'SC', 'SC0004', 1, '', '2022-01-11', 0),
(844, 3, 'CI', 'CI0001', 2, '', '2022-01-11', 0),
(848, 8, 'DR', 'DR00016', 2, '', '2022-01-11', 0),
(849, 9, 'SI', 'SI0002', 1, '', '2022-01-11', 0),
(850, 10, 'SC', 'SC0004', 2, '', '2022-01-11', 0),
(851, 10, 'SC', 'SC00014', 1, '', '2022-01-11', 0),
(852, 10, 'SI', 'SI0002', 1, '', '2022-01-11', 0),
(853, 10, 'CI', 'CI0001', 1, '', '2022-01-11', 0),
(854, 10, 'DR', 'DR00016', 3, '', '2022-01-11', 0),
(855, 10, 'GI', 'GI0005', 2, 'DD', '2022-01-11', 0),
(856, 10, 'FD', 'FD0006', 1, '', '2022-01-11', 0),
(857, 10, 'FD', 'FD0009', 2, '', '2022-01-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `enteredBy` varchar(50) NOT NULL,
  `codeid` varchar(20) NOT NULL,
  `codename` varchar(100) NOT NULL,
  `item_qty_in` int(11) NOT NULL,
  `item_qty_out` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_stk` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `enteredBy`, `codeid`, `codename`, `item_qty_in`, `item_qty_out`, `date`, `status`, `delete_stk`) VALUES
(18, 'DAMITH HASHAN', 'SC', 'SC0004', 1, 0, '2022-01-11 17:36:02', 0, 0),
(19, 'DAMITH HASHAN', 'CI', 'CI0001', 2, 0, '2022-01-11 17:38:15', 0, 0),
(20, 'DAMITH HASHAN', 'DR', 'DR00016', 2, 0, '2022-01-11 17:44:46', 0, 0),
(21, 'DAMITH HASHAN', 'SI', 'SI0002', 1, 0, '2022-01-11 17:46:32', 0, 0),
(22, 'DAMITH HASHAN', 'SC', 'SC0004', 0, 1, '2022-01-11 18:13:41', 0, 0),
(23, 'DAMITH HASHAN', 'SC', 'SC0004', 2, 0, '2022-01-11 20:01:09', 0, 0),
(24, 'DAMITH HASHAN', 'SC', 'SC00014', 1, 0, '2022-01-11 20:01:09', 0, 0),
(25, 'DAMITH HASHAN', 'SI', 'SI0002', 1, 0, '2022-01-11 20:01:09', 0, 0),
(26, 'DAMITH HASHAN', 'CI', 'CI0001', 1, 0, '2022-01-11 20:01:09', 0, 0),
(27, 'DAMITH HASHAN', 'DR', 'DR00016', 3, 0, '2022-01-11 20:01:09', 0, 0),
(28, 'DAMITH HASHAN', 'GI', 'GI0005', 2, 0, '2022-01-11 20:01:09', 0, 0),
(29, 'DAMITH HASHAN', 'FD', 'FD0006', 1, 0, '2022-01-11 20:01:09', 0, 0),
(30, 'DAMITH HASHAN', 'FD', 'FD0009', 2, 0, '2022-01-11 20:01:09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempdonor`
--

CREATE TABLE `tempdonor` (
  `donor_id` int(11) NOT NULL,
  `donor_type` varchar(20) NOT NULL,
  `don_team_name` varchar(50) NOT NULL,
  `member_name` varchar(50) DEFAULT NULL,
  `national_id` varchar(13) NOT NULL,
  `address_line1` varchar(40) NOT NULL,
  `address_line2` varchar(40) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `contact_no2` int(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_item_table`
--

CREATE TABLE `temp_item_table` (
  `temp_item_id` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `temp_donor_name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `item_qty` int(50) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `reserve_date` date NOT NULL,
  `action` tinyint(1) NOT NULL,
  `resrved_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `user_full_name` varchar(50) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `user_nic` varchar(13) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `user_department` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `deleted_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `user_full_name`, `user_role`, `user_nic`, `designation`, `user_department`, `username`, `user_password`, `user_email`, `deleted_user`) VALUES
(65, 'DAMITH HASHAN', 'admin', '946202088V', 'S', 'TECHNOLOGY', 'DAMITH', 'DAMITH123', 'DAMITH@GMAIL.COM', 0),
(66, 'NADEESHA HETTIARACHCHI', 'admin', '946202055V', 'SS', '', 'NADEE', 'NADEE123', 'NADEE@GMAIL.COM', 0),
(73, 'NEW', 'front user', '666666666664', 'DD', '1', 'NEW', 'NEW1', 'NEW@GMAIL.COM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'FRONT USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `donorName` (`donorName`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `don_team_name` (`don_team_name`),
  ADD KEY `national_id` (`national_id`);

--
-- Indexes for table `donor_all`
--
ALTER TABLE `donor_all`
  ADD PRIMARY KEY (`national_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `donor_name` (`donor_name`);

--
-- Indexes for table `donor_team`
--
ALTER TABLE `donor_team`
  ADD PRIMARY KEY (`national_idt`),
  ADD KEY `teamname` (`donor_name`),
  ADD KEY `teamid` (`teamid`);

--
-- Indexes for table `issuance`
--
ALTER TABLE `issuance`
  ADD PRIMARY KEY (`issuance_id`),
  ADD KEY `issued_by` (`issued_by`),
  ADD KEY `issue_item` (`issue_item`),
  ADD KEY `issue_type` (`issue_type`),
  ADD KEY `issue_dep` (`issue_dep`);

--
-- Indexes for table `itemtype`
--
ALTER TABLE `itemtype`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `type_code` (`type_code`);

--
-- Indexes for table `item_name`
--
ALTER TABLE `item_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_cd` (`type_cd`),
  ADD KEY `name` (`itemname`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `item_table`
--
ALTER TABLE `item_table`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `type_code` (`type_code`),
  ADD KEY `item_name` (`item_name`),
  ADD KEY `donationNum` (`donationNum`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`) USING BTREE,
  ADD KEY `code` (`codename`),
  ADD KEY `enteredBy` (`enteredBy`),
  ADD KEY `codeid` (`codeid`);

--
-- Indexes for table `tempdonor`
--
ALTER TABLE `tempdonor`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `don_team_name` (`don_team_name`);

--
-- Indexes for table `temp_item_table`
--
ALTER TABLE `temp_item_table`
  ADD PRIMARY KEY (`temp_item_id`),
  ADD KEY `temp_donor_name` (`temp_donor_name`),
  ADD KEY `type_code` (`code`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user_nic` (`user_nic`),
  ADD KEY `user_full_name` (`user_full_name`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_name` (`role_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `donor_all`
--
ALTER TABLE `donor_all`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `donor_team`
--
ALTER TABLE `donor_team`
  MODIFY `teamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `issuance`
--
ALTER TABLE `issuance`
  MODIFY `issuance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `itemtype`
--
ALTER TABLE `itemtype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item_name`
--
ALTER TABLE `item_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item_table`
--
ALTER TABLE `item_table`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=858;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tempdonor`
--
ALTER TABLE `tempdonor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `temp_item_table`
--
ALTER TABLE `temp_item_table`
  MODIFY `temp_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`donorName`) REFERENCES `donor_all` (`donor_id`),
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`user_full_name`);

--
-- Constraints for table `donor_team`
--
ALTER TABLE `donor_team`
  ADD CONSTRAINT `donor_team_ibfk_1` FOREIGN KEY (`donor_name`) REFERENCES `donor_all` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issuance`
--
ALTER TABLE `issuance`
  ADD CONSTRAINT `issuance_ibfk_1` FOREIGN KEY (`issued_by`) REFERENCES `user` (`user_full_name`),
  ADD CONSTRAINT `issuance_ibfk_2` FOREIGN KEY (`issue_item`) REFERENCES `item_name` (`code`),
  ADD CONSTRAINT `issuance_ibfk_3` FOREIGN KEY (`issue_type`) REFERENCES `itemtype` (`type_code`),
  ADD CONSTRAINT `issuance_ibfk_4` FOREIGN KEY (`issue_dep`) REFERENCES `department` (`dep_id`);

--
-- Constraints for table `item_table`
--
ALTER TABLE `item_table`
  ADD CONSTRAINT `item_table_ibfk_2` FOREIGN KEY (`item_name`) REFERENCES `item_name` (`code`),
  ADD CONSTRAINT `item_table_ibfk_4` FOREIGN KEY (`donationNum`) REFERENCES `donation` (`donation_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`enteredBy`) REFERENCES `user` (`user_full_name`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`codeid`) REFERENCES `itemtype` (`type_code`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`codename`) REFERENCES `item_name` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
