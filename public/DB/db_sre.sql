-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 10:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sre`
--

-- --------------------------------------------------------

--
-- Table structure for table `4_years_plan`
--

CREATE TABLE IF NOT EXISTS `4_years_plan` (
  `sum_Amount` decimal(30,2) NOT NULL,
  `discount` decimal(30,2) NOT NULL,
  `Total_Amount_with_discount` decimal(30,2) NOT NULL,
  `due_date` date NOT NULL,
  `payment_starting_date` date NOT NULL,
  `Deposite` decimal(30,2) NOT NULL,
  `Total_Amount_with_depo` decimal(30,2) NOT NULL,
  `total_payment` decimal(30,2) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Total_price` decimal(30,2) NOT NULL,
  `No_Installments` int(30) NOT NULL,
  `Installments_free` decimal(30,2) NOT NULL,
  `Re_status` int(11) NOT NULL DEFAULT '1',
  `but_id` int(11) NOT NULL DEFAULT '1',
  `c_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `Block` int(11) NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '1',
  `amount_reserved` decimal(30,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `4_years_plan`
--

INSERT INTO `4_years_plan` (`sum_Amount`, `discount`, `Total_Amount_with_discount`, `due_date`, `payment_starting_date`, `Deposite`, `Total_Amount_with_depo`, `total_payment`, `id`, `Total_price`, `No_Installments`, `Installments_free`, `Re_status`, `but_id`, `c_id`, `project_id`, `Block`, `complete`, `amount_reserved`) VALUES
('590902.00', '5000.00', '585902.00', '2020-12-01', '2016-12-01', '56565.00', '529337.00', '435184.50', 1, '0.00', 17, '25599.09', 1, 2, 3, 1, 1, 1, '0.00'),
('3660059370.00', '5000.00', '361630.00', '2020-12-22', '2016-12-22', '253000.00', '108630.00', '252247.50', 2, '0.00', 17, '14838.09', 1, 2, 2, 1, 4, 1, '6078931.60'),
('366630.00', '5000.00', '361630.00', '2020-12-22', '2016-12-22', '253000.00', '108630.00', '252247.50', 3, '0.00', 17, '14838.09', 1, 1, 2, 1, 4, 1, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `4_year_plan_progress`
--

CREATE TABLE IF NOT EXISTS `4_year_plan_progress` (
  `c_id` int(11) NOT NULL,
  `pj_id` int(11) NOT NULL,
  `ins_no` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `monthly_interest` decimal(30,2) DEFAULT NULL,
  `late_pay_interest` decimal(30,2) DEFAULT NULL,
  `ins_fee` decimal(30,2) DEFAULT NULL,
  `payment` decimal(30,2) DEFAULT NULL,
  `already_recovered` decimal(30,2) DEFAULT NULL,
  `to_recover` decimal(30,2) DEFAULT NULL,
  `resale_date` date DEFAULT NULL,
  `comtot` decimal(30,2) NOT NULL,
  PRIMARY KEY (`c_id`,`pj_id`,`ins_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `4_year_plan_progress`
--

INSERT INTO `4_year_plan_progress` (`c_id`, `pj_id`, `ins_no`, `due_date`, `pay_date`, `monthly_interest`, `late_pay_interest`, `ins_fee`, `payment`, `already_recovered`, `to_recover`, `resale_date`, `comtot`) VALUES
(2, 1, 1, '2021-01-23', '2016-12-15', '10437.74', '0.00', '1043774.04', '45545.00', '0.00', '18787932.75', '2021-04-23', '18798370.49'),
(2, 1, 2, '2021-02-23', '2016-12-16', '2111568.37', '0.00', '211156836.92', '5620.00', '45545.00', '2744993335.00', '2021-05-23', '2747150448.37'),
(2, 1, 3, '2021-03-23', '2016-12-24', '2111568.37', '0.00', '211156836.92', '5455545.00', '51165.00', '2744987715.00', '2021-06-23', '2747150448.37'),
(2, 1, 4, '2021-04-23', '2016-12-15', '2111568.37', '0.00', '211156836.92', '566565.00', '5506710.00', '2739532170.00', '2021-07-23', '2747150448.37'),
(2, 1, 5, '2021-05-23', '2016-12-01', '2111568.37', '0.00', '211156836.92', '5656.60', '6073275.00', '2738965605.00', '2021-08-23', '2747150448.37'),
(2, 1, 6, '2021-06-23', '2016-12-08', '2111568.37', '0.00', '211156836.92', '656565.50', '6078931.60', '2738959948.40', '2021-09-23', '2747150448.37');

-- --------------------------------------------------------

--
-- Table structure for table `full_cash_progress`
--

CREATE TABLE IF NOT EXISTS `full_cash_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `total_payment` decimal(10,0) NOT NULL,
  `total_payment_re` decimal(10,0) NOT NULL,
  `starting_date` date NOT NULL,
  `due_date` date NOT NULL,
  `Block` int(11) NOT NULL,
  `total_payment_be_re` decimal(10,0) NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `full_cash_progress`
--

INSERT INTO `full_cash_progress` (`id`, `c_id`, `project_id`, `total_payment`, `total_payment_re`, `starting_date`, `due_date`, `Block`, `total_payment_be_re`, `complete`) VALUES
(1, 1, 1, '45723539', '0', '2016-12-09', '2017-01-28', 1, '0', 1),
(2, 1, 1, '0', '54544545', '2016-12-07', '2017-01-28', 1, '-54544545', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `permissions` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Administrator', '{"admin":1}'),
(2, 'Managing Director ', '{"managing_director":1}'),
(3, 'Manager', '{"manager":1}'),
(4, 'Executive', '{"executive":1}');

-- --------------------------------------------------------

--
-- Table structure for table `login_sec`
--

CREATE TABLE IF NOT EXISTS `login_sec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Log_id` int(11) NOT NULL,
  `Page` varchar(200) NOT NULL,
  `Activity` varchar(200) NOT NULL,
  `Login_time` datetime NOT NULL,
  `COP_Pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `login_sec`
--

INSERT INTO `login_sec` (`id`, `Log_id`, `Page`, `Activity`, `Login_time`, `COP_Pid`) VALUES
(1, 4, 'ADD PROJECT', '1,Kandy,Red,20,10', '2016-12-22 08:38:28', 0),
(2, 4, 'ADD PROJECT', '2,Mawa,Blue,30,30', '2016-12-22 08:38:59', 0),
(3, 4, 'ADD DISCUNT ', '25000,50000,50000,2500,A', '2016-12-22 08:39:32', 4),
(4, 4, 'ADD DISCUNT ', '60000,100000,100000,10000,B', '2016-12-22 08:39:53', 4),
(5, 4, 'ADD DISCUNT ', '50000,75000,75000,5000,A', '2016-12-22 08:40:16', 4),
(6, 4, 'ADD DISCUNT ', '100000,150000,150000,15000,B', '2016-12-22 08:40:37', 4),
(7, 4, 'Add Block Price', '1,13,152000,,', '2016-12-22 08:44:23', 4),
(8, 4, 'Add Block Price', '2,53,35200,,', '2016-12-22 08:44:36', 4),
(9, 4, 'Add Block Price', '1,66,5656,,', '2016-12-22 08:54:36', 4),
(10, 4, 'Add Block Price', '2,5,656656,,', '2016-12-22 08:54:46', 4),
(11, 4, 'Add Block Price', '13,55,55652,,', '2016-12-22 08:55:04', 4),
(12, 4, 'Customer Purchase(Full Cash)', '2500.00,,65655,300396856.00,16/12/22,17/01/22', '2016-12-22 08:56:09', 4),
(13, 4, 'Add Block Price', '3,556,456465,,', '2016-12-22 08:56:52', 4),
(14, 4, 'Add Block Price', '4,66,5665,,', '2016-12-22 08:57:01', 4),
(15, 4, 'Customer Purchase(Bank Loan)', '5000.00,2521464.00,65656,2455808.00,613952.00', '2016-12-22 08:57:58', 4),
(16, 4, 'Customer Purchase(Bank Loan)', '5000.00,29988964.00,556,29988408.00,889899,29098509.00,6,4849751.50', '2016-12-22 08:58:33', 4),
(17, 4, 'Add Block Price', '10,12,4555,,', '2016-12-22 09:06:49', 4),
(18, 4, 'Customer Purchase(Full Cash)', '5000.00,,5655,43885.00,16/12/22,17/01/22', '2016-12-22 09:07:38', 4),
(19, 4, 'Full Cash Progress', '43885,0.00', '2016-12-22 09:08:58', 2),
(20, 4, 'Bank Loan Progress', '1841526,330.00', '2016-12-22 09:09:50', 1),
(21, 4, '6 Months Plan Continue Payment', '29098509.00,1,2017-07-22,2016-12-01,4849751.50,56550,29098509.00', '2016-12-22 09:10:32', 0),
(22, 4, '6 Months Plan Continue Payment', '29098509.00,2,2017-08-22,2017-06-10,4849751.50,5455545,29041959.00', '2016-12-22 09:11:05', 0),
(23, 4, '4 Years Progress', '4,2,1,22772778.75,0,22772778.75,1,1518185.25,2016-12-01,0.00,15181.85,4554', '2016-12-22 09:11:35', 4),
(24, 4, '4 Years Progress', '4,2,1,22772778.75,4554.00,22768224.75,2,1518185.25,2016-12-31,0.00,15181.85,56565', '2016-12-22 09:11:54', 4),
(25, 4, '4 Years Progress', '4,2,1,22772778.75,61119.00,22711659.75,3,1518185.25,2038-04-15,45545.56,15181.85,5656', '2016-12-22 09:12:26', 4),
(26, 4, 'Bank Loan Progress', '1841856,0.00', '2016-12-22 09:12:48', 1),
(27, 4, 'Cost of Project  (startup) COST OF PURCHASE', '5445,5445,5445,5445,5445,5445', '2016-12-22 09:14:04', 1),
(28, 4, 'Cost of Project ''Update'' (startup) SURVEY COST', '5445,5445,5445,5445,5445', '2016-12-22 09:14:15', 1),
(29, 4, 'Cost of Project ''Update'' (startup) SURVEY COST', '5445,5445', '2016-12-22 09:14:22', 1),
(30, 4, 'Cost of Project  (startup) Update Pemporary Hut', '5445,5445,5445', '2016-12-22 09:15:41', 1),
(31, 4, 'Cost of Project  (startup) Update Watcher Wages ', '5445', '2016-12-22 09:15:49', 1),
(32, 4, 'Customer Purchase(Full Cash)', '5000.00,,5655,724573.00,16/12/23,17/01/23', '2016-12-23 10:21:30', 4),
(33, 4, 'Full Cash Progress', '56565,668008.00', '2016-12-23 10:21:48', 1),
(34, 4, '4 Years Progress', '2,1,2,18787932.75,0,18787932.75,1,1043774.04,2016-12-01,0.00,10437.74,5620', '2016-12-23 05:47:23', 4),
(35, 4, '4 Years Progress', '2,1,2,18787932.75,5620.00,18782312.75,2,1043774.04,2027-03-11,31313.22,10437.74,544554', '2016-12-23 05:48:01', 4),
(36, 4, 'Full Cash Progress', '111119,613454.00', '2016-12-23 05:48:33', 1),
(37, 4, 'Land Resell Six Months  ', '', '2016-12-23 05:49:06', 4),
(38, 22, 'Land Resell Bank Loan  ', '', '2016-12-23 05:49:30', 22),
(39, 4, 'ADD PROJECT', '19,Kandykkkkk,Red Sea,60,20', '2016-12-26 04:17:15', 0),
(40, 4, 'Cost of Project  (startup) COST OF PURCHASE', '45200,45200,45200,45200,45200,45200', '2016-12-26 09:13:48', 1),
(41, 4, 'Cost of Project ''Update'' (startup) SURVEY COST', '45200,45200,45200,45200,45200', '2016-12-26 09:13:59', 1),
(42, 4, 'Cost of Project ''Update'' (startup) SURVEY COST', '45200,45200', '2016-12-26 09:14:05', 1),
(43, 4, 'Cost of Project  (startup) Update Pemporary Hut', '45200,45200,45200', '2016-12-26 09:14:13', 1),
(44, 4, 'Cost of Project  (startup) Update Watcher Wages ', '45200', '2016-12-26 09:14:19', 1),
(45, 4, 'Cost of Project  (startup) Update Clearing ', '45200,45200', '2016-12-26 09:14:25', 1),
(46, 4, 'Cost of Project  (startup) Update Road Construction ', '45200,45200,45200,45200,45200', '2016-12-26 09:14:35', 1),
(47, 4, 'Cost of Project  (startup) Update Boundaries ', '45200,45200,45200,45200,45200', '2016-12-26 09:14:46', 1),
(48, 4, 'Cost of Project  (startup) Update Drainage ', '45200,45200,45200,45200', '2016-12-26 09:14:56', 1),
(49, 4, 'Cost of Project  (startup) Update Item ', '45200,45200,45200,45200,45200,45200,45200,45200,45200', '2016-12-26 09:15:12', 1),
(50, 4, 'Cost of Project  (startup) Update Rock Blasting  ', '45200', '2016-12-26 09:15:20', 1),
(51, 4, 'Cost of Project  (startup) Update Filling And Levling  ', '45200,45200', '2016-12-26 09:15:29', 1),
(52, 4, 'Cost of Project  (startup) Update Turfing  ', '45200', '2016-12-26 09:15:36', 1),
(53, 4, 'Cost of Project  (startup) Update  Water Supply   ', '45200,45200,45200', '2016-12-26 09:15:45', 1),
(54, 4, 'Cost of Project  (startup) Update Elecrtricity Supply    ', '45200,45200,45200', '2016-12-26 09:15:56', 1),
(55, 4, 'Cost of Project  (startup) Update Fuel Expenses   ', '45200,45200,45200,45200,45200', '2016-12-26 09:16:10', 1),
(56, 4, 'Cost of Project  (startup) Update Sales Day Expenses   ', '45200,45200,45200,45200', '2016-12-26 09:16:22', 1),
(57, 4, 'Cost of Project  (startup) Update Advertising   ', '45200,45200,45200,45200,45200,45200,45200,45200', '2016-12-26 09:17:06', 1),
(58, 4, 'Cost of Project  (startup) Update Local Authority Expenses   ', '45200,45200,45200', '2016-12-26 09:17:17', 1),
(59, 4, 'Cost of Project  (Start)  Summery', '271200.00,2666800,2938000', '2016-12-26 09:17:25', 1),
(60, 22, 'Cost of Project  (Actuval) SURVEY COST', '5630,5630,5630,5630,5630', '2016-12-26 09:30:59', 1),
(61, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '5630,5630', '2016-12-26 09:31:06', 1),
(62, 22, 'Cost of Project  (Actuval) Update Pemporary Hut', '5630,5630,5630', '2016-12-26 09:31:14', 1),
(63, 22, 'Cost of Project  (Actuval) Update Watcher Wages ', '5630', '2016-12-26 09:31:18', 1),
(64, 22, 'Cost of Project  (Actuval) Update Clearing ', '5630,5630', '2016-12-26 09:31:24', 1),
(65, 22, 'Cost of Project  (Start UP) Update Road Construction ', '5630,5630,5630,5630,5630', '2016-12-26 09:31:37', 1),
(66, 22, 'Cost of Project  (Actuval) Update Boundaries ', '5630,5630,5630,5630,5630', '2016-12-26 09:31:50', 1),
(67, 22, 'Cost of Project  (Actuval) Update Drainage ', '5630,5630,5630,5630', '2016-12-26 09:31:59', 1),
(68, 22, 'Cost of Project  (Actuval) Update Item ', '5630,5630,5630,5630,5630,5630,5630,5630,5630', '2016-12-26 09:32:18', 1),
(69, 22, 'Cost of Project  (Actuval) Update Rock Blasting  ', '5630', '2016-12-26 09:32:24', 1),
(70, 22, 'Cost of Project  (Actuval) Update Filling And Levling  ', '5630,5630', '2016-12-26 09:32:35', 1),
(71, 22, 'Cost of Project  (Actuval) Update Turfing  ', '5630', '2016-12-26 09:32:43', 1),
(72, 22, 'Cost of Project  (Actuval) Update  Water Supply   ', '5630,5630,5630', '2016-12-26 09:32:51', 1),
(73, 22, 'Cost of Project  (Start UP) Update Elecrtricity Supply    ', '5630,5630,5630', '2016-12-26 09:33:00', 1),
(74, 22, 'Cost of Project  (Actuval) Update Fuel Expenses   ', '5630,5630,5630,5630,5630', '2016-12-26 09:33:16', 1),
(75, 22, 'Cost of Project  (Actuval) Update Sales Day Expenses   ', '5630,5630,5630,5630', '2016-12-26 09:33:25', 1),
(76, 22, 'Cost of Project  (Actuval) Update Advertising   ', '5630,5630,5630,5630,5630,5630,5630,5630', '2016-12-26 09:33:41', 1),
(77, 22, 'Cost of Project  (Actuval) Update Local Authority Expenses   ', '5630,5630,5630', '2016-12-26 09:33:49', 1),
(78, 4, 'Full Cash Progress', '116775,607798.00', '2016-12-26 10:02:27', 1),
(79, 4, '4 Years Progress', '2,1,2,18787932.75,550174.00,18237758.75,3,1043774.04,2026-08-21,31313.22,10437.74,52000', '2016-12-26 10:14:55', 4),
(80, 4, '4 Years Progress', '2,1,2,18787932.75,602174.00,18185758.75,4,1043774.04,2016-12-01,0.00,10437.74,656556', '2016-12-26 10:16:40', 4),
(81, 4, '4 Years Progress', '2,1,2,18787932.75,1915295.00,16872637.75,6,1043774.04,2016-12-09,0.00,10437.74,56565', '2016-12-26 10:21:39', 4),
(82, 4, 'Customer Purchase(Bank Loan)', '2500.00,2937470.00,566566,2370904.00,55656,2315248.00,4,578812.00', '2016-12-26 10:26:57', 4),
(83, 4, '6 Months Plan Continue Payment', '2315248.00,1,2017-07-26,2016-12-09,578812.00,54445,2315248.00', '2016-12-26 10:27:28', 0),
(84, 4, '4 Years Progress', '2,1,2,18787932.75,1977516.00,16810416.75,8,1043774.04,2016-12-01,0.00,10437.74,50', '2016-12-26 10:30:16', 0),
(85, 4, '4 Years Progress', '2,1,2,18787932.75,1977566.00,16810366.75,9,1043774.04,2016-12-07,0.00,10437.74,566565', '2016-12-26 10:32:10', 0),
(86, 4, '4 Years Progress', '2,1,2,18787932.75,2544131.00,16243801.75,10,1043774.04,2016-12-10,0.00,10437.74,5656500', '2016-12-26 10:33:11', 0),
(87, 4, '6 Months Plan Continue Payment', '2315248.00,2,2017-08-26,2006-03-11,578812.00,1111111111111111,2260803.00', '2016-12-26 10:34:28', 0),
(88, 4, '4 Years Progress', '2,1,2,18787932.75,0,18787932.75,1,1043774.04,2016-12-15,0.00,10437.74,45545', '2016-12-26 10:35:07', 0),
(89, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '5630,5630,5630,562195,5630', '2016-12-27 06:54:20', 1),
(90, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '5630,5630,5630,562195,5630', '2016-12-27 06:57:30', 1),
(91, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '5630,5630', '2016-12-27 06:57:38', 1),
(92, 22, 'Cost of Project  (Actuval) Update Watcher Wages ', '5630', '2016-12-27 06:58:13', 1),
(93, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '0,0', '2016-12-27 06:58:39', 1),
(94, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '0,0', '2016-12-27 07:06:52', 1),
(95, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '0,0,0,0,0', '2016-12-27 07:09:00', 1),
(96, 22, 'Cost of Project ''Update'' (Actuval) SURVEY COST', '0,0,0,0,0', '2016-12-27 07:18:25', 1),
(97, 4, 'Customer Purchase(Full Cash)', '2500.00,,5656,28274624.00,16/12/27,17/01/27', '2016-12-27 08:30:20', 4),
(98, 4, 'Customer Purchase(Bank Loan)', '15000.00,16911690.00,266,16911424.00,4227856.00', '2016-12-27 09:36:42', 4),
(99, 4, 'Bank Loan Progress', '565566,12118002.00', '2016-12-27 09:37:10', 2),
(100, 4, 'Bank Loan Progress', '571222,12112346.00', '2016-12-27 09:48:47', 2),
(101, 4, 'Bank Loan Progress', '626878,12056690.00', '2016-12-27 09:50:48', 2),
(102, 4, 'Land Resell Bank Loan  ', '2,3,Red,chinada', '2016-12-27 10:03:47', 4),
(103, 4, 'Land Resell Bank Loan  ', '2,3,Red,chinada', '2016-12-27 10:03:53', 4),
(104, 4, 'Land Resell Bank Loan  ', '2,3,Red,chinada', '2016-12-27 10:04:31', 4),
(105, 4, 'Land Resell Bank Loan  ', '2,3,Red,chinada', '2016-12-27 10:04:31', 4),
(106, 4, 'Land Resell Bank Loan  ', '4,Red,pang', '2016-12-27 10:11:28', 4),
(107, 4, 'Land Resell Bank Loan  ', '2,3,Red,chinada', '2016-12-27 10:11:30', 4),
(108, 4, 'Land Resell Bank Loan  ', '2,3,Red,chinada', '2016-12-27 06:51:46', 4),
(109, 4, 'Land Resell Six Months  ', '', '2016-12-27 07:28:35', 4),
(110, 4, 'Land Resell Six Months  ', '', '2016-12-27 07:36:10', 4),
(111, 22, 'Land Resell Bank Loan  ', '', '2016-12-27 07:49:45', 22),
(112, 4, 'Customer Purchase(Full Cash)', '5000.00,,5655,61560.00,,17/01/28', '2016-12-28 07:47:31', 4),
(113, 4, 'Customer Purchase(Full Cash)', '5000.00,,5555,61660.00,,17/01/14', '2016-12-28 07:48:28', 4),
(114, 4, 'Customer Purchase(Full Cash)', '5000.00,,5655,61560.00,2016-12-06,17/01/06', '2016-12-28 07:50:21', 4),
(115, 4, 'Customer Purchase(Full Cash)', '15000.00,,55555,1660.00,2016-12-13,17/01/13', '2016-12-28 07:50:55', 4),
(116, 4, 'Customer Purchase(Full Cash)', '5000.00,,60000,8515.00,2016-12-14,17/01/14', '2016-12-28 07:52:00', 4),
(117, 4, 'Customer Purchase(Bank Loan)', '5000.00,8437568.00,566565,7871003.00', '2016-12-28 07:59:32', 4),
(118, 4, 'Customer Purchase(Bank Loan)', '5000.00,59085902.00,56556,59029346.00,25000,59004346.00,4,14751086.50', '2016-12-28 08:07:57', 4),
(119, 4, 'Customer Purchase(Bank Loan)', '0,59090902.00,5565,59085337.00,0.00,59085337.00,3,19695112.33', '2016-12-28 08:10:00', 4),
(120, 4, 'Customer Purchase(Bank Loan)', '0,72345.00,5666,66679.00,25000,41679.00,5,8335.80', '2016-12-28 08:10:41', 4),
(121, 4, 'ADD DISCUNT ', '5000,60000,60000,100,A', '2016-12-28 05:50:56', 4),
(122, 4, 'Customer Purchase(Full Cash)', '5000.00,,7024300,20000000.00,2016-12-03,17/01/03', '2016-12-28 06:00:44', 4),
(123, 4, 'Customer Purchase(Bank Loan)', '0,3733290.00,2563,3730727.00,932681.75,2016-12-17', '2016-12-28 06:09:19', 4),
(124, 4, 'Full Cash Progress', '20000000,0.00', '2016-12-28 06:12:49', 6),
(125, 4, 'Full Cash Progress', '20054565,-54565.00', '2016-12-28 06:25:40', 6),
(126, 4, 'Bank Loan Progress', '35200,2762845.25', '2016-12-28 06:35:17', 1),
(127, 4, 'Bank Loan Progress', '2798046,-0.75', '2016-12-28 06:37:36', 1),
(128, 4, 'Full Cash Progress', '20056787.5,-56787.50', '2016-12-28 06:42:02', 6),
(129, 4, 'Full Cash Progress', '20056788,0.00', '2016-12-28 06:42:38', 6),
(130, 4, 'Customer Purchase(Bank Loan)', '5000.00,24797936750.00,4545,24797932205.00,25300,24797906905.00,6,4132984484.17', '2016-12-28 06:44:00', 4),
(131, 4, '6 Months Plan Continue Payment', '24797906905.00,1,2017-07-03,2016-12-03,4132984484.17,2545454,24797906905.00', '2016-12-28 06:45:33', 0),
(132, 4, '6 Months Plan Continue Payment', '24797906905.00,2,2017-08-03,2016-12-10,4132984484.17,24795361451.00,24795361451.00', '2016-12-28 06:46:56', 0),
(133, 4, '4 Years Progress', '2,1,4,2745038880.00,45545.00,2744993335.00,2,211156836.92,2016-12-16,0.00,2111568.37,5620', '2016-12-28 06:49:40', 0),
(134, 4, '4 Years Progress', '2,1,4,2745038880.00,51165.00,2744987715.00,3,211156836.92,2016-12-24,0.00,2111568.37,5455545', '2016-12-28 06:50:01', 0),
(135, 4, '4 Years Progress', '2,1,4,2745038880.00,5506710.00,2739532170.00,4,211156836.92,2016-12-15,0.00,2111568.37,566565', '2016-12-28 06:55:22', 0),
(136, 4, 'Land Resell Bank Loan  ', '4,Red,Asa', '2016-12-28 06:56:36', 4),
(137, 4, 'Land Resell Six Months  ', '', '2016-12-28 06:56:55', 4),
(138, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:29', 22),
(139, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:31', 22),
(140, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:32', 22),
(141, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:34', 22),
(142, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:40', 22),
(143, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:43', 22),
(144, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:45', 22),
(145, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:45', 22),
(146, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:46', 22),
(147, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 06:57:48', 22),
(148, 4, 'Cost of Project ''Update'' (startup) COST OF PURCHASE', '45222.2,45200,45200,45200,45200,45200', '2016-12-28 07:20:49', 1),
(149, 4, '4 Years Progress', '2,1,4,2745038880.00,6073275.00,2738965605.00,5,211156836.92,2016-12-01,0.00,2111568.37,5656.6', '2016-12-28 07:58:27', 0),
(150, 4, '4 Years Progress', '2,1,4,2745038880.00,6078931.60,2738959948.40,6,211156836.92,2016-12-08,0.00,2111568.37,656565.5', '2016-12-28 08:13:51', 0),
(151, 4, '6 Months Plan Continue Payment', '24797906905.00,3,2017-09-03,2016-12-08,4132984484.17,544545,0.00', '2016-12-28 08:19:49', 0),
(152, 4, 'Customer Purchase(Full Cash)', '0,,5200,44096283.00,2016-12-13,17/01/13', '2016-12-28 08:29:33', 4),
(153, 4, 'Customer Purchase(Full Cash)', '5000.00,,6544,45723539.00,2016-12-21,17/01/21', '2016-12-28 08:32:25', 0),
(154, 4, 'Customer Purchase(Bank Loan)', '5000.00,3106018940.00,25300,3105993640.00,776498410.00,2016-12-10', '2016-12-28 08:34:52', 0),
(155, 4, 'Customer Purchase(Bank Loan)', '5000.00,3106018940.00,5656,3106013284.00', '2016-12-28 08:36:34', 0),
(156, 4, 'Customer Purchase(Bank Loan)', '5000.00,1192955430.00,45454,1192909976.00', '2016-12-28 08:37:41', 0),
(157, 4, 'Customer Purchase(Bank Loan)', '15000.00,3150984553.00,455421,3150529132.00,787632283.00,2016-12-17', '2016-12-28 08:39:10', 0),
(158, 4, 'Customer Purchase(6 months)', '5000.00,25343092968.00,565556,25342527412.00,0.00,25342527412.00,5,5068505482.40', '2016-12-28 08:48:31', 0),
(159, 4, 'Customer Purchase(4 years)', '2016-12-22,5000.00,361630.00,253000,108630.00,252247.50,20/12/22,14838.09', '2016-12-28 08:49:35', 0),
(160, 4, 'Full Cash Progress', '54544545,-54544545.00', '2016-12-28 09:15:51', 2),
(161, 4, 'Land Resell Six Months  ', '', '2016-12-28 10:08:59', 4),
(162, 4, 'Land Resell Six Months  ', '', '2016-12-28 10:13:53', 4),
(163, 4, 'Land Resell Six Months  ', '', '2016-12-28 10:14:06', 4),
(164, 4, 'Land Resell Six Months  ', '', '2016-12-28 10:18:20', 4),
(165, 4, 'Land Resell Bank Loan  ', '1,2,3,Red,Peter', '2016-12-28 10:18:28', 4),
(166, 4, 'Customer Purchase(Bank Loan)', '5000.00,1171038030.00,56565,1170981465.00,292745366.25,2016-12-02', '2016-12-28 10:29:04', 0),
(167, 4, 'Bank Loan Progress', '878236098.75,0.00', '2016-12-28 10:29:27', 1),
(168, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:22', 22),
(169, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:24', 22),
(170, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:25', 22),
(171, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:26', 22),
(172, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:28', 22),
(173, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:29', 22),
(174, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:29', 22),
(175, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:30', 22),
(176, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:31', 22),
(177, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:32', 22),
(178, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:33', 22),
(179, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:34', 22),
(180, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:33:39', 22),
(181, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:34:19', 22),
(182, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:34:21', 22),
(183, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:34:22', 22),
(184, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:34:24', 22),
(185, 22, 'Land Resell Bank Loan  ', '', '2016-12-28 10:34:25', 22);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Day` datetime NOT NULL,
  `ConNo` int(11) NOT NULL,
  `Rs_word` varchar(50) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `Of` varchar(50) NOT NULL,
  `Cash_Cheque_No` varchar(50) NOT NULL,
  `Drawn` varchar(50) NOT NULL,
  `being` varchar(50) NOT NULL,
  `Rs` decimal(30,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report_summery`
--

CREATE TABLE IF NOT EXISTS `report_summery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `p_id_1` int(11) NOT NULL,
  `D_Summery_COPU_1` decimal(30,2) NOT NULL,
  `D_Summery_COD_1` decimal(30,2) NOT NULL,
  `D_Summery_COP_1` decimal(30,2) NOT NULL,
  `D_Summery_COPU_2` decimal(30,2) NOT NULL,
  `D_Summery_COD_2` decimal(30,2) NOT NULL,
  `D_Summery_COP_2` decimal(30,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `report_summery`
--

INSERT INTO `report_summery` (`id`, `p_id`, `p_id_1`, `D_Summery_COPU_1`, `D_Summery_COD_1`, `D_Summery_COP_1`, `D_Summery_COPU_2`, `D_Summery_COD_2`, `D_Summery_COP_2`) VALUES
(1, 1, 1, '271200.00', '2666800.00', '2938000.00', '0.00', '332170.00', '332170.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_6_month_prograss`
--

CREATE TABLE IF NOT EXISTS `tbl_6_month_prograss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `total_payment` decimal(30,2) NOT NULL,
  `pragress` int(11) NOT NULL,
  `amount_reserved` decimal(30,2) NOT NULL,
  `amount_to_be_reserved` decimal(30,2) NOT NULL,
  `starting_date` date NOT NULL,
  `due_date` date NOT NULL,
  `payDate` date NOT NULL,
  `Block` varchar(11) NOT NULL,
  `inc_num` int(11) NOT NULL,
  `inc_fee` decimal(30,2) NOT NULL,
  `interest` decimal(30,0) NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_6_month_progress`
--

CREATE TABLE IF NOT EXISTS `tbl_6_month_progress` (
  `c_id` int(11) NOT NULL,
  `pj_id` int(11) NOT NULL,
  `ins_no` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `interest` decimal(30,2) DEFAULT NULL,
  `ins_fee` decimal(30,2) DEFAULT NULL,
  `payment` decimal(30,2) DEFAULT NULL,
  `already_recovered` decimal(30,2) DEFAULT NULL,
  `to_recover` decimal(30,2) DEFAULT NULL,
  PRIMARY KEY (`c_id`,`pj_id`,`ins_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_6_month_progress`
--

INSERT INTO `tbl_6_month_progress` (`c_id`, `pj_id`, `ins_no`, `due_date`, `pay_date`, `interest`, `ins_fee`, `payment`, `already_recovered`, `to_recover`) VALUES
(1, 1, 1, '2017-07-03', '2016-12-03', '0.00', '4132984484.17', '2545454.00', '0.00', '24797906905.00'),
(1, 1, 2, '2017-08-03', '2016-12-10', '0.00', '4132984484.17', '24795361451.00', '2545454.00', '24795361451.00'),
(1, 1, 3, '2017-09-03', '2016-12-08', '0.00', '4132984484.17', '544545.00', '24797906905.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_loan`
--

CREATE TABLE IF NOT EXISTS `tbl_bank_loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `Block` varchar(11) NOT NULL,
  `sum_Amount` decimal(30,2) NOT NULL,
  `discount` decimal(30,2) NOT NULL,
  `Total_Amount_with_discount` decimal(30,2) NOT NULL,
  `due_date` date NOT NULL,
  `payment_starting_date` date NOT NULL,
  `Deposite` decimal(30,2) NOT NULL,
  `Total_Amount_with_depo` decimal(10,0) NOT NULL,
  `down_payment` decimal(30,2) NOT NULL,
  `total_payment` decimal(30,2) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `Re_status` int(11) NOT NULL DEFAULT '1',
  `but_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_bank_loan`
--

INSERT INTO `tbl_bank_loan` (`id`, `project_id`, `Block`, `sum_Amount`, `discount`, `Total_Amount_with_discount`, `due_date`, `payment_starting_date`, `Deposite`, `Total_Amount_with_depo`, `down_payment`, `total_payment`, `cus_id`, `Re_status`, `but_id`) VALUES
(1, 1, '1,2,3', '1171043030.00', '5000.00', '1171038030.00', '2017-01-02', '2016-12-02', '56565.00', '1170981465', '292745366.25', '878236098.75', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_loan_prograss`
--

CREATE TABLE IF NOT EXISTS `tbl_bank_loan_prograss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `total_payment` decimal(30,2) NOT NULL,
  `progress` decimal(30,2) NOT NULL,
  `amount_reserved` decimal(30,2) NOT NULL,
  `amount_to_be_reserved` decimal(30,2) NOT NULL,
  `starting_date` date NOT NULL,
  `due_date` date NOT NULL,
  `Block` int(11) NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_bank_loan_prograss`
--

INSERT INTO `tbl_bank_loan_prograss` (`id`, `c_id`, `project_id`, `total_payment`, `progress`, `amount_reserved`, `amount_to_be_reserved`, `starting_date`, `due_date`, `Block`, `complete`) VALUES
(1, 1, 1, '878236098.75', '0.00', '878236098.75', '0.00', '2016-12-10', '2017-03-28', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cost_of_project`
--

CREATE TABLE IF NOT EXISTS `tbl_cost_of_project` (
  `p_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Purchase_P` decimal(30,2) NOT NULL,
  `C_Title_Insurance` decimal(30,2) NOT NULL,
  `C_Stamps` decimal(30,2) NOT NULL,
  `C_Valuation_Report` decimal(30,2) NOT NULL,
  `C_Tital_Report` decimal(30,2) NOT NULL,
  `C_Introducrs_Commission` decimal(30,2) NOT NULL,
  `COPsum` decimal(30,2) NOT NULL,
  `D_SC_Perimeter` decimal(30,2) NOT NULL,
  `D_SC_Blocking_out_of_plan` decimal(30,2) NOT NULL,
  `D_SC_Demarcation_boundaries` decimal(30,2) NOT NULL,
  `D_SC_Labour_chargers` decimal(30,2) NOT NULL,
  `D_SC_Traveling` decimal(30,2) NOT NULL,
  `D_SC_Sub_Toatal` decimal(30,2) NOT NULL,
  `D_FE_parapet_walls` decimal(30,2) NOT NULL,
  `D_FE_Fencing` decimal(30,2) NOT NULL,
  `D_FE_Sub_Total` decimal(30,2) NOT NULL,
  `D_PH_Shed` decimal(30,2) NOT NULL,
  `D_PH_Structure_Building` decimal(30,2) NOT NULL,
  `D_PH_Reno_Of_Existing_Building` decimal(30,2) NOT NULL,
  `D_PH_Sub_Total` decimal(30,2) NOT NULL,
  `D_WW_Sub_Toatal` decimal(30,2) NOT NULL,
  `D_CL_Clearing_Of_Trees_Roots` decimal(30,2) NOT NULL,
  `D_CL_Clearing_Of_Shrubs` decimal(30,2) NOT NULL,
  `D_CL_Sub_Total` decimal(30,2) NOT NULL,
  `D_RC_Earth_cutting` decimal(30,2) NOT NULL,
  `D_RC_Tarring` decimal(30,2) NOT NULL,
  `D_RC_Filling_ABC` decimal(30,2) NOT NULL,
  `D_RC_Grading` decimal(30,2) NOT NULL,
  `D_RC_Retaining_Walls` decimal(30,2) NOT NULL,
  `D_RC_Sub_Total` decimal(30,2) NOT NULL,
  `D_BAN_Purchasing_B_Stones` decimal(30,2) NOT NULL,
  `D_BAN_Purchasing_Pegs` decimal(30,2) NOT NULL,
  `D_BAN_Purchasing_installing` decimal(30,2) NOT NULL,
  `D_BAN_Fixing_Of_No_Boards` decimal(30,2) NOT NULL,
  `D_BAN_Zone_Doards` decimal(30,2) NOT NULL,
  `D_BAN_Sub_Toatal` decimal(30,2) NOT NULL,
  `D_DRA_Earth` decimal(30,2) NOT NULL,
  `D_DRA_Cement_Brickworks` decimal(30,2) NOT NULL,
  `D_DRA_Cement_Concreate` decimal(30,2) NOT NULL,
  `D_DRA_Rubble` decimal(30,2) NOT NULL,
  `D_DRA_Sub_Total` decimal(30,2) NOT NULL,
  `D_IT_Balance_Brought_Down` decimal(30,2) NOT NULL,
  `D_IT_Culverts` decimal(30,2) NOT NULL,
  `D_IT_Hume_1` decimal(30,2) NOT NULL,
  `D_IT_Hume_2` decimal(30,2) NOT NULL,
  `D_IT_Hume_3` decimal(30,2) NOT NULL,
  `D_IT_Hume_4` decimal(30,2) NOT NULL,
  `D_IT_Hume_5` decimal(30,2) NOT NULL,
  `D_IT_Hume_6` decimal(30,2) NOT NULL,
  `D_IT_Boc` decimal(30,2) NOT NULL,
  `D_IT_Sub_Total` decimal(30,2) NOT NULL,
  `D_IT_ROB` decimal(30,2) NOT NULL,
  `D_IT_FAL_Earth_Cutting` decimal(30,2) NOT NULL,
  `D_IT_FAL_Earth_Transport` decimal(30,2) NOT NULL,
  `D_IT_FAL_Sub_Total` decimal(30,2) NOT NULL,
  `D_IT_TUR` decimal(30,2) NOT NULL,
  `D_WAS_Well_Water` decimal(30,2) NOT NULL,
  `D_WAS_Pipe_Born` decimal(30,2) NOT NULL,
  `D_WAS_Special_Water` decimal(30,2) NOT NULL,
  `D_WAS_Sub_Total` decimal(30,2) NOT NULL,
  `D_SE_Pro_lines` decimal(30,2) NOT NULL,
  `D_SE_Pro_Trans` decimal(30,2) NOT NULL,
  `D_SE_New_Trans` decimal(30,2) NOT NULL,
  `D_SE_SUB_Total` decimal(30,2) NOT NULL,
  `D_FUEL_SM_AM` decimal(30,2) NOT NULL,
  `D_FUEL_ise` decimal(30,2) NOT NULL,
  `D_FUEL_LSE` decimal(30,2) NOT NULL,
  `D_FUEL_ATM` decimal(30,2) NOT NULL,
  `D_FUEL_PO` decimal(30,2) NOT NULL,
  `D_FUEL_Sub_Total` decimal(30,2) NOT NULL,
  `D_SaAD_Day` decimal(30,2) NOT NULL,
  `D_SaAD_Meals` decimal(30,2) NOT NULL,
  `D_SaAD_Transport` decimal(30,2) NOT NULL,
  `D_SaAD_Accommodation` decimal(30,2) NOT NULL,
  `D_SaAD_Sub_Total` decimal(30,2) NOT NULL,
  `D_AD_Bammers` decimal(30,2) NOT NULL,
  `D_AD_Hordings` decimal(30,2) NOT NULL,
  `D_AD_Hand_Bills` decimal(30,2) NOT NULL,
  `D_AD_Redio` decimal(30,2) NOT NULL,
  `D_AD_TV` decimal(30,2) NOT NULL,
  `D_AD_Press` decimal(30,2) NOT NULL,
  `D_AD_Presents` decimal(30,2) NOT NULL,
  `D_AD_Propaganda_Van` decimal(30,2) NOT NULL,
  `D_AD_Sub_Total` decimal(30,2) NOT NULL,
  `D_LAE_Tax` decimal(30,2) NOT NULL,
  `D_LAE_PA` decimal(30,2) NOT NULL,
  `D_LAE_Transport` decimal(30,2) NOT NULL,
  `D_LAE_Sub_Total` decimal(30,2) NOT NULL,
  `D_Summery_COPU` decimal(30,2) NOT NULL,
  `D_Summery_COD` decimal(30,2) NOT NULL,
  `D_Summery_COP` decimal(30,2) NOT NULL,
  `approved_by_manager` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_cost_of_project`
--

INSERT INTO `tbl_cost_of_project` (`p_id`, `id`, `Purchase_P`, `C_Title_Insurance`, `C_Stamps`, `C_Valuation_Report`, `C_Tital_Report`, `C_Introducrs_Commission`, `COPsum`, `D_SC_Perimeter`, `D_SC_Blocking_out_of_plan`, `D_SC_Demarcation_boundaries`, `D_SC_Labour_chargers`, `D_SC_Traveling`, `D_SC_Sub_Toatal`, `D_FE_parapet_walls`, `D_FE_Fencing`, `D_FE_Sub_Total`, `D_PH_Shed`, `D_PH_Structure_Building`, `D_PH_Reno_Of_Existing_Building`, `D_PH_Sub_Total`, `D_WW_Sub_Toatal`, `D_CL_Clearing_Of_Trees_Roots`, `D_CL_Clearing_Of_Shrubs`, `D_CL_Sub_Total`, `D_RC_Earth_cutting`, `D_RC_Tarring`, `D_RC_Filling_ABC`, `D_RC_Grading`, `D_RC_Retaining_Walls`, `D_RC_Sub_Total`, `D_BAN_Purchasing_B_Stones`, `D_BAN_Purchasing_Pegs`, `D_BAN_Purchasing_installing`, `D_BAN_Fixing_Of_No_Boards`, `D_BAN_Zone_Doards`, `D_BAN_Sub_Toatal`, `D_DRA_Earth`, `D_DRA_Cement_Brickworks`, `D_DRA_Cement_Concreate`, `D_DRA_Rubble`, `D_DRA_Sub_Total`, `D_IT_Balance_Brought_Down`, `D_IT_Culverts`, `D_IT_Hume_1`, `D_IT_Hume_2`, `D_IT_Hume_3`, `D_IT_Hume_4`, `D_IT_Hume_5`, `D_IT_Hume_6`, `D_IT_Boc`, `D_IT_Sub_Total`, `D_IT_ROB`, `D_IT_FAL_Earth_Cutting`, `D_IT_FAL_Earth_Transport`, `D_IT_FAL_Sub_Total`, `D_IT_TUR`, `D_WAS_Well_Water`, `D_WAS_Pipe_Born`, `D_WAS_Special_Water`, `D_WAS_Sub_Total`, `D_SE_Pro_lines`, `D_SE_Pro_Trans`, `D_SE_New_Trans`, `D_SE_SUB_Total`, `D_FUEL_SM_AM`, `D_FUEL_ise`, `D_FUEL_LSE`, `D_FUEL_ATM`, `D_FUEL_PO`, `D_FUEL_Sub_Total`, `D_SaAD_Day`, `D_SaAD_Meals`, `D_SaAD_Transport`, `D_SaAD_Accommodation`, `D_SaAD_Sub_Total`, `D_AD_Bammers`, `D_AD_Hordings`, `D_AD_Hand_Bills`, `D_AD_Redio`, `D_AD_TV`, `D_AD_Press`, `D_AD_Presents`, `D_AD_Propaganda_Van`, `D_AD_Sub_Total`, `D_LAE_Tax`, `D_LAE_PA`, `D_LAE_Transport`, `D_LAE_Sub_Total`, `D_Summery_COPU`, `D_Summery_COD`, `D_Summery_COP`, `approved_by_manager`) VALUES
(1, 1, '45222.20', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '271222.20', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '226000.00', '45200.00', '45200.00', '90400.00', '45200.00', '45200.00', '45200.00', '135600.00', '45200.00', '45200.00', '45200.00', '90400.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '226000.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '226000.00', '45200.00', '45200.00', '45200.00', '45200.00', '180800.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '361600.00', '45200.00', '45200.00', '45200.00', '90400.00', '45200.00', '45200.00', '45200.00', '45200.00', '135600.00', '45200.00', '45200.00', '45200.00', '135600.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '226000.00', '45200.00', '45200.00', '45200.00', '45200.00', '180800.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '45200.00', '361600.00', '45200.00', '45200.00', '45200.00', '135600.00', '0.00', '0.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cost_of_project_2`
--

CREATE TABLE IF NOT EXISTS `tbl_cost_of_project_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `Purchase_P` decimal(30,2) NOT NULL,
  `C_Title_Insurance` decimal(30,2) NOT NULL,
  `C_Stamps` decimal(30,2) NOT NULL,
  `C_Valuation_Report` decimal(30,2) NOT NULL,
  `C_Tital_Report` decimal(30,2) NOT NULL,
  `C_Introducrs_Commission` decimal(30,2) NOT NULL,
  `Cp_date` datetime NOT NULL,
  `sub_total` decimal(11,0) NOT NULL,
  `D_SC_Perimeter` decimal(30,2) NOT NULL,
  `D_SC_Blocking_out_of_plan` decimal(30,2) NOT NULL,
  `D_SC_Demarcation_boundaries` decimal(30,2) NOT NULL,
  `D_SC_Labour_chargers` decimal(30,2) NOT NULL,
  `D_SC_Traveling` decimal(30,2) NOT NULL,
  `D_SC_Sub_Toatal` decimal(30,2) NOT NULL,
  `D_SC_date` datetime NOT NULL,
  `D_FE_parapet_walls` decimal(30,2) NOT NULL,
  `D_FE_Fencing` decimal(30,2) NOT NULL,
  `D_FE_Sub_Total` decimal(30,2) NOT NULL,
  `D_FE_date` datetime NOT NULL,
  `D_PH_Shed` decimal(30,2) NOT NULL,
  `D_PH_Structure_Building` decimal(30,2) NOT NULL,
  `D_PH_Reno_Of_Existing_Building` decimal(30,2) NOT NULL,
  `D_PH_Sub_Total` decimal(30,2) NOT NULL,
  `D_PH_date` datetime NOT NULL,
  `D_WW_Sub_Toatal` decimal(30,2) NOT NULL,
  `D_WW_date` datetime NOT NULL,
  `D_CL_Clearing_Of_Trees_Roots` decimal(30,2) NOT NULL,
  `D_CL_Clearing_Of_Shrubs` decimal(30,2) NOT NULL,
  `D_CL_Sub_Total` decimal(30,2) NOT NULL,
  `D_CL_date` datetime NOT NULL,
  `D_RC_Earth_cutting` decimal(30,2) NOT NULL,
  `D_RC_Tarring` decimal(30,2) NOT NULL,
  `D_RC_Filling_ABC` decimal(30,2) NOT NULL,
  `D_RC_Grading` decimal(30,2) NOT NULL,
  `D_RC_Retaining_Walls` decimal(30,2) NOT NULL,
  `D_RC_Sub_Total` decimal(30,2) NOT NULL,
  `D_RC_date` datetime NOT NULL,
  `D_BAN_Purchasing_B_Stones` decimal(30,2) NOT NULL,
  `D_BAN_Purchasing_Pegs` decimal(30,2) NOT NULL,
  `D_BAN_Purchasing_installing` decimal(30,2) NOT NULL,
  `D_BAN_Fixing_Of_No_Boards` decimal(30,2) NOT NULL,
  `D_BAN_Zone_Doards` decimal(30,2) NOT NULL,
  `D_BAN_Sub_Toatal` decimal(30,2) NOT NULL,
  `D_BAN_date` datetime NOT NULL,
  `D_DRA_Earth` decimal(30,2) NOT NULL,
  `D_DRA_Cement_Brickworks` decimal(30,2) NOT NULL,
  `D_DRA_Cement_Concreate` decimal(30,2) NOT NULL,
  `D_DRA_Rubble` decimal(30,2) NOT NULL,
  `D_DRA_Sub_Total` decimal(30,2) NOT NULL,
  `D_DRA_date` datetime NOT NULL,
  `D_IT_Balance_Brought_Down` decimal(30,2) NOT NULL,
  `D_IT_Culverts` decimal(30,2) NOT NULL,
  `D_IT_Hume_1` decimal(30,2) NOT NULL,
  `D_IT_Hume_2` decimal(30,2) NOT NULL,
  `D_IT_Hume_3` decimal(30,2) NOT NULL,
  `D_IT_Hume_4` decimal(30,2) NOT NULL,
  `D_IT_Hume_5` decimal(30,2) NOT NULL,
  `D_IT_Hume_6` decimal(30,2) NOT NULL,
  `D_IT_date` datetime NOT NULL,
  `D_IT_Boc` decimal(30,2) NOT NULL,
  `D_IT_Sub_Total` decimal(30,2) NOT NULL,
  `D_IT_ROB` decimal(30,2) NOT NULL,
  `D_IT_ROB_date` datetime NOT NULL,
  `D_IT_FAL_Earth_Cutting` decimal(30,2) NOT NULL,
  `D_IT_FAL_Earth_Transport` decimal(30,2) NOT NULL,
  `D_IT_FAL_Sub_Total` decimal(30,2) NOT NULL,
  `D_IT_FAL_date` date NOT NULL,
  `D_IT_TUR` decimal(30,2) NOT NULL,
  `D_IT_TUR_date` datetime NOT NULL,
  `D_WAS_Well_Water` decimal(30,2) NOT NULL,
  `D_WAS_Pipe_Born` decimal(30,2) NOT NULL,
  `D_WAS_Special_Water` decimal(30,2) NOT NULL,
  `D_WAS_Sub_Total` decimal(30,2) NOT NULL,
  `D_WAS_date` datetime NOT NULL,
  `D_SE_Pro_lines` decimal(30,2) NOT NULL,
  `D_SE_Pro_Trans` decimal(30,2) NOT NULL,
  `D_SE_New_Trans` decimal(30,2) NOT NULL,
  `D_SE_SUB_Total` decimal(30,2) NOT NULL,
  `D_SE_date` datetime NOT NULL,
  `D_FUEL_SM_AM` decimal(30,2) NOT NULL,
  `D_FUEL_ise` decimal(30,2) NOT NULL,
  `D_FUEL_LSE` decimal(30,2) NOT NULL,
  `D_FUEL_ATM` decimal(30,2) NOT NULL,
  `D_FUEL_PO` decimal(30,2) NOT NULL,
  `D_FUEL_Sub_Total` decimal(30,2) NOT NULL,
  `D_FUEL_date` datetime NOT NULL,
  `D_SaAD_Day` decimal(30,2) NOT NULL,
  `D_SaAD_Meals` decimal(30,2) NOT NULL,
  `D_SaAD_Transport` decimal(30,2) NOT NULL,
  `D_SaAD_Accommodation` decimal(30,2) NOT NULL,
  `D_SaAD_Sub_Total` decimal(30,2) NOT NULL,
  `D_SaAD_date` datetime NOT NULL,
  `D_AD_Bammers` decimal(30,2) NOT NULL,
  `D_AD_Hordings` decimal(30,2) NOT NULL,
  `D_AD_Hand_Bills` decimal(30,2) NOT NULL,
  `D_AD_Redio` decimal(30,2) NOT NULL,
  `D_AD_TV` decimal(30,2) NOT NULL,
  `D_AD_Press` decimal(30,2) NOT NULL,
  `D_AD_Presents` decimal(30,2) NOT NULL,
  `D_AD_Propaganda_Van` decimal(30,2) NOT NULL,
  `D_AD_Sub_Total` decimal(30,2) NOT NULL,
  `D_AD_date` datetime NOT NULL,
  `D_LAE_Tax` decimal(30,2) NOT NULL,
  `D_LAE_PA` decimal(30,2) NOT NULL,
  `D_LAE_Transport` decimal(30,2) NOT NULL,
  `D_LAE_Sub_Total` decimal(30,2) NOT NULL,
  `D_LAE_date` datetime NOT NULL,
  `D_Summery_COPU` decimal(30,2) NOT NULL,
  `D_Summery_COD` decimal(30,2) NOT NULL,
  `D_Summery_COP` decimal(30,2) NOT NULL,
  `D_Summery_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `c_id` int(11) NOT NULL,
  `full_name` char(255) NOT NULL,
  `name` char(100) NOT NULL,
  `nic` char(10) NOT NULL,
  `p_addr` char(255) NOT NULL,
  `p_tele` int(10) NOT NULL,
  `job` char(100) NOT NULL,
  `employer` char(255) NOT NULL,
  `o_addr` char(255) NOT NULL,
  `o_tele` int(10) NOT NULL,
  `recidence_mode` varchar(1) NOT NULL,
  `citizenship` varchar(1) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `credit_ref` char(255) NOT NULL,
  `income` decimal(20,2) NOT NULL,
  `income_tax` decimal(20,2) NOT NULL,
  `marital_status` tinyint(1) NOT NULL,
  `dependents` tinyint(2) NOT NULL,
  `j_Date` datetime NOT NULL,
  `Mnthly_incme` decimal(30,2) NOT NULL,
  `road_image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`c_id`, `full_name`, `name`, `nic`, `p_addr`, `p_tele`, `job`, `employer`, `o_addr`, `o_tele`, `recidence_mode`, `citizenship`, `age`, `credit_ref`, `income`, `income_tax`, `marital_status`, `dependents`, `j_Date`, `Mnthly_incme`, `road_image`, `image2`, `type`) VALUES
(1, 'Peter', 'Yohan', '987654321v', 'dkjhkjashdaskjd', 712956840, 'IBBBBB', 'MKIYSSS', 'dkhasjkhdajskdh', 710622865, 'O', 'D', 30, 'djaslkjdkasld', '65656565.00', '1.00', 0, 20, '2016-12-28 17:58:13', '445454.00', 'uploads/cc9055837f919fb84ea7f7fec1a6bcfe.jpg', 'uploads/312.jpg', 'Mr'),
(2, 'Asa', 'hei', '987654321v', 'lkjfkdsjfjkdsf', 712956840, 'aldkjaksdj', 'dkjfjkdsfhdsjkf', 'shadkahsdjaskkd', 710622865, 'O', 'D', 63, '', '0.00', '0.00', 0, 0, '2016-12-28 18:05:22', '54545.00', 'uploads/7db90e8c604ab3f2e82f757090e5cba0.jpg', 'uploads/860.jpg', 'Mr');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_bank`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_name` char(255) NOT NULL,
  `b_addr` char(255) NOT NULL,
  `b_acc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_customer_bank`
--

INSERT INTO `tbl_customer_bank` (`id`, `c_id`, `b_name`, `b_addr`, `b_acc`) VALUES
(1, 2, 'HSBC', 'Kandy', 2147483647),
(2, 2, 'HSBC', 'Kandy', 2147483647),
(3, 1, 'HSBC', 'Kandy', 2147483647),
(4, 1, 'HSBC', 'Kandy', 2147483647),
(5, 1, 'HSBC', 'lfkljglkfdj', 565665),
(6, 1, 'HSBC', 'Kandy', 2147483647),
(7, 2, 'FUs', 'Kandy', 545454),
(8, 1, 'HSBC', 'Kandy', 56565665);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_purchase`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_purchase` (
  `id` int(11) NOT NULL,
  `c_name` varchar(40) NOT NULL,
  `pr_name` varchar(20) NOT NULL,
  `deposite` decimal(10,2) NOT NULL,
  `j_Date` datetime NOT NULL,
  `due_Date` datetime NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `Block_No` varchar(20) NOT NULL,
  `Customer_table_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_purchase`
--

INSERT INTO `tbl_customer_purchase` (`id`, `c_name`, `pr_name`, `deposite`, `j_Date`, `due_Date`, `payment_type`, `Block_No`, `Customer_table_id`) VALUES
(1, 'Peter', '1', '6544.00', '2016-12-28 17:58:13', '0000-00-00 00:00:00', 'Bank_loan', '1,2,3', 0),
(2, 'Asa', '1', '0.00', '2016-12-28 18:05:22', '0000-00-00 00:00:00', '', '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_spouse`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_spouse` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` char(200) NOT NULL,
  `s_job` char(250) NOT NULL,
  `s_o_addr` char(250) NOT NULL,
  `s_tele` int(11) NOT NULL,
  `s_income` decimal(30,2) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_customer_spouse`
--

INSERT INTO `tbl_customer_spouse` (`c_id`, `s_name`, `s_job`, `s_o_addr`, `s_tele`, `s_income`) VALUES
(1, 'vas', 'cnnnn', 'jhdskjahdaskj', 710622395, '65656565.00'),
(2, '', '', '', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `dis_id` int(11) NOT NULL,
  `district` char(100) NOT NULL,
  PRIMARY KEY (`dis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dis_id`, `district`) VALUES
(1, 'KANDY'),
(2, 'KURUNEGALA'),
(3, 'MATALE'),
(4, 'NUWARAELIYA'),
(5, 'PUTTALAM'),
(6, 'ANURADHAPURA'),
(7, 'POLONNARUWA'),
(8, 'BADULLA'),
(9, 'MONERAGALA'),
(10, 'RATNAPURA'),
(11, 'KEGALLE'),
(12, 'COLOMBO'),
(13, 'GAMPAHA'),
(14, 'KALUTHARA'),
(15, 'GALLE'),
(16, 'MATARA'),
(17, 'HAMBANTOTA'),
(18, 'BATTICALOA'),
(19, 'AMPARA'),
(20, 'TRINCOMALEE'),
(21, 'JAFFNA'),
(22, 'KILINOCHCHI'),
(23, 'MANNAR'),
(24, 'VAVUNIYA'),
(25, 'MULLAITIVU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_full_cash`
--

CREATE TABLE IF NOT EXISTS `tbl_full_cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `block_no` varchar(11) NOT NULL,
  `Total_price_A` decimal(30,2) NOT NULL,
  `Discount` decimal(30,2) NOT NULL,
  `deposit` decimal(30,2) NOT NULL,
  `Total_selling_price` decimal(30,2) NOT NULL,
  `start_time` date NOT NULL,
  `due_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_full_cash`
--

INSERT INTO `tbl_full_cash` (`id`, `customer_id`, `project_id`, `block_no`, `Total_price_A`, `Discount`, `deposit`, `Total_selling_price`, `start_time`, `due_date`) VALUES
(1, 1, 1, '1,2,3', '45735083.00', '5000.00', '6544.00', '45723539.00', '2016-12-21', '2017-01-21'),
(2, 1, 1, '1,2,3', '371284690.00', '0.00', '0.00', '0.00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_land_resell`
--

CREATE TABLE IF NOT EXISTS `tbl_land_resell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `block_no` int(11) NOT NULL,
  `payment_tpe` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `pj_id` int(11) NOT NULL,
  `what_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_land_resell`
--

INSERT INTO `tbl_land_resell` (`id`, `customer_name`, `project_name`, `block_no`, `payment_tpe`, `due_date`, `status`, `pj_id`, `what_id`) VALUES
(1, 'chinada', 'Red', 2, 'Six Months', '2020-12-23', 2, 1, 1),
(2, 'chinada', 'Red', 2, 'Bank Loan', '0000-00-00', 2, 1, 1),
(3, 'chinada', 'Red', 2, 'Bank Loan', '0000-00-00', 2, 1, 1),
(4, 'chinada', 'Red', 2, 'Bank Loan', '0000-00-00', 2, 1, 1),
(5, 'chinada', 'Red', 2, 'Bank Loan', '0000-00-00', 2, 1, 1),
(6, 'pang', 'Red', 4, 'Bank Loan', '2017-03-27', 2, 1, 1),
(7, 'chinada', 'Red', 2, 'Bank Loan', '0000-00-00', 2, 1, 1),
(8, 'chinada', 'Red', 2, 'Bank Loan', '0000-00-00', 2, 1, 3),
(9, 'Peter', 'Blue', 1, 'Six Months', '2016-05-25', 2, 2, 2),
(10, 'PeterNo', 'Red', 1, 'Six Months', '2015-06-08', 2, 1, 3),
(11, 'Asa', 'Red', 4, 'Bank Loan', '2016-06-14', 2, 1, 1),
(12, 'Asa', 'Red', 4, 'Six Months', '2020-12-09', 2, 1, 1),
(13, 'Asa', 'Red', 4, 'Six Months', '2020-12-22', 4, 1, 1),
(14, 'Asa', 'Red', 4, 'Six Months', '2020-12-22', 4, 1, 2),
(15, 'Peter', 'Red', 1, 'Six Months', '2017-06-09', 4, 1, 1),
(16, 'Peter', 'Red', 1, 'Six Months', '2017-06-09', 4, 1, 2),
(17, 'Peter', 'Red', 1, 'Bank Loan', '2017-01-17', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_prorass`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_prorass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `4_year_id` int(11) NOT NULL,
  `due_date` tinyint(1) NOT NULL,
  `settle_date` datetime NOT NULL,
  `over_due_amount` decimal(30,2) NOT NULL,
  `paid_amount` decimal(30,2) NOT NULL,
  `over_due` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE IF NOT EXISTS `tbl_project` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `district_id` int(2) NOT NULL,
  `location` char(255) NOT NULL,
  `tot_area` char(50) NOT NULL,
  `M_unit` tinyint(4) NOT NULL,
  `pj_name` char(255) NOT NULL,
  `no_of_blocks` int(3) NOT NULL,
  `approved_by_manager` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `district_id`, `location`, `tot_area`, `M_unit`, `pj_name`, `no_of_blocks`, `approved_by_manager`) VALUES
(1, 1, 'Kandy', '20', 1, 'Red', 10, 1),
(2, 2, 'Mawa', '30', 1, 'Blue', 30, 1),
(3, 19, 'Kandykkkkk', '60', 1, 'Red Sea', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_cost`
--

CREATE TABLE IF NOT EXISTS `tbl_project_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pj_id` int(11) NOT NULL,
  ` C_Introducrs` decimal(10,0) NOT NULL,
  `C_Purchase` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_discount`
--

CREATE TABLE IF NOT EXISTS `tbl_project_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pj_id` int(11) NOT NULL,
  `perch_S_amount` decimal(30,2) NOT NULL,
  `perch_E_amount` decimal(30,2) NOT NULL,
  `discount_amount` decimal(30,2) NOT NULL,
  `Plan_name` varchar(10) NOT NULL,
  `approved_by_manager` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_project_discount`
--

INSERT INTO `tbl_project_discount` (`id`, `pj_id`, `perch_S_amount`, `perch_E_amount`, `discount_amount`, `Plan_name`, `approved_by_manager`) VALUES
(1, 2, '25000.00', '50000.00', '2500.00', 'A', 0),
(2, 2, '60000.00', '100000.00', '10000.00', 'B', 0),
(3, 1, '50000.00', '75000.00', '5000.00', 'A', 0),
(4, 1, '100000.00', '150000.00', '15000.00', 'B', 0),
(5, 3, '5000.00', '60000.00', '100.00', 'A', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE IF NOT EXISTS `tbl_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block_no` int(11) NOT NULL,
  `b_area` char(50) NOT NULL,
  `M_unit` tinyint(4) NOT NULL,
  `est_perch_price` decimal(10,2) NOT NULL,
  `project_id` int(11) NOT NULL,
  `P_name` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1',
  `Selling_perch_price` decimal(30,2) DEFAULT NULL,
  `approved_by_manager` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`id`, `block_no`, `b_area`, `M_unit`, `est_perch_price`, `project_id`, `P_name`, `status`, `Selling_perch_price`, `approved_by_manager`) VALUES
(1, 1, '13', 1, '152000.00', 1, '', '1', NULL, 1),
(2, 2, '53', 1, '35200.00', 1, '', '3', NULL, 1),
(3, 1, '66', 1, '5656.00', 2, '', '4', NULL, 1),
(4, 2, '5', 1, '656656.00', 2, '', '1', NULL, 1),
(5, 13, '55', 1, '55652.00', 2, '', '1', NULL, 1),
(6, 3, '556', 1, '456465.00', 1, '', '3', NULL, 1),
(7, 4, '66', 1, '5665.00', 1, '', '1', NULL, 1),
(8, 10, '12', 1, '4555.00', 1, '', '2', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_re_sell`
--

CREATE TABLE IF NOT EXISTS `tbl_re_sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_six_month`
--

CREATE TABLE IF NOT EXISTS `tbl_six_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `Block` varchar(11) NOT NULL,
  `sum_Amount` decimal(30,2) NOT NULL,
  `discount` decimal(30,2) NOT NULL,
  `Total_Amount_with_discount` decimal(30,2) NOT NULL,
  `due_date` date NOT NULL,
  `payment_starting_date` date NOT NULL,
  `Deposite` decimal(30,2) NOT NULL,
  `Total_Amount_with_depo` decimal(30,2) NOT NULL,
  `down_payment` decimal(30,2) NOT NULL,
  `total_payment` decimal(30,2) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `No_inc` int(11) NOT NULL,
  `Inc_fee` decimal(30,2) NOT NULL,
  `Re_status` int(10) NOT NULL DEFAULT '1',
  `but_id` int(11) NOT NULL DEFAULT '1',
  `complete` int(11) NOT NULL DEFAULT '1',
  `re_due_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_six_month`
--

INSERT INTO `tbl_six_month` (`id`, `project_id`, `Block`, `sum_Amount`, `discount`, `Total_Amount_with_discount`, `due_date`, `payment_starting_date`, `Deposite`, `Total_Amount_with_depo`, `down_payment`, `total_payment`, `cus_id`, `No_inc`, `Inc_fee`, `Re_status`, `but_id`, `complete`, `re_due_date`) VALUES
(1, 1, '1,2,3', '24797941750.00', '5000.00', '25343092968.00', '2017-06-09', '2016-12-09', '565556.00', '25342527412.00', '0.00', '25342527412.00', 1, 5, '5068505482.40', 2, 2, 1, '2017-12-03'),
(2, 1, '1,2,3', '25343097968.00', '5000.00', '25343092968.00', '2017-06-09', '2016-12-09', '565556.00', '25342527412.00', '0.00', '25342527412.00', 1, 5, '5068505482.40', 2, 2, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `Salt` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `EmpNo` char(6) NOT NULL,
  `Emp_name` varchar(255) NOT NULL,
  `Con_No` int(10) NOT NULL,
  `empGroup` tinyint(1) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Full_Emp_name` varchar(28) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Salt`, `status`, `EmpNo`, `Emp_name`, `Con_No`, `empGroup`, `Image`, `Full_Emp_name`) VALUES
(4, 'Exe', 'f012e7b4e29b3270bdc16c1afedb455881751166b49d09822dbf523cd21feacd', '¯ôÂg½-Ó¤.@ú"u¥sÒ¥`"œ3ÛB°*Ášÿ', 1, 'E004', 'Darshana Ariyathilaka', 710633295, 4, 'uploads/5b0bad5bf57aa09ce9c6c9a767066a1f.jpg', 'China Dare'),
(5, 'Admin', '754057683a6449f79f838213f33246b8ce22d23979c1f0ae88b3726c8d8e254c', '^`–m/äÛ²¶[àð§±#žW²A¸‹Ž“ú`&2', 1, 'Emp001', 'Asanka De Silva', 778590204, 1, '', ''),
(6, 'MMDD', '21aab0e9fc33385ddee9b7c83b80aab120aec871528f180278a7b4d8c6dc3cde', '†#1ÿýO<† –¾Î××1ApÇ%ê§z–žÈðD', 1, '102', 'Madushan silva', 710522685, 3, 'uploads/2d57280d91572174579c82fc23a33293.jpg', 'Kishan Silvaaaa'),
(14, 'MMDD', '8f00bd7d8af023392da473ec12ac26594e5ff42c6943df02dbd71c890b26db81', 'ýð¨ÁŽgÌ§¼_±¡²•yio´Žµôé,«äx\r¡=', 1, '455', 'Jhone Doe', 710522459, 4, '', ''),
(17, 'Exed', '000e4dae0a6ecc0532430659c20abfd601c26028b29fcc095ddfff7d5d24781a', '~Nöt= ÊNUíÜ“{ž.±—3Ã9ßC|¿ò/C–ô9S', 1, '455', 'Michile', 710522459, 4, 'uploads/8638ca0996eb1a436a53693a89c821ff.jpg', ''),
(18, 'Exe1', '0ad36ca757fb6b8e8274641e6832369f0fbcd96dcc944cc8a78b2f3b922788a7', 'jðTŒ-4¾™_‹@;!F}¥LX’ùnÝ1Yq$·þ.$', 1, '105', 'Authr', 2147483647, 4, 'uploads/fdc9dc778e00f9615274421dddaae3b1.jpg', ''),
(19, 'Exe1', '2e8db07c78502c7a7b2b0dd22e68cb0eb71fe24bbb207295cfcee379366e009b', '»¶ë¢ÙU*z`ëTEtX1íÞ*søžö˜*d‡›9}Ù', 1, '455', 'Gayan', 710522459, 4, 'uploads/88ee47a1cf3f4c9e36148eaf9b7dde1c.jpg', ''),
(20, 'Exesam', '02c5e2ad9960680c5d426a973fa9d3a97151547a3fabd02a48609d05c287941d', '¯Þ³vÆºÆæ×m¥ yËñ¾wq´+DLÅ×ÜpXj1 Æ', 1, 'E009', 'Sam', 810522459, 4, 'uploads/a9bda29ed765383947ceca14fdbea897.jpg', 'Sam'),
(21, 'srec', '57a295131bf51e2c9127045ba99d2059c3e7623deef29bad38542f1a2a5c4163', '+\n‡ñ¿ž6uˆ[fp¯ÜïFP¾Ø¯‰Já3', 1, 'sr019', 'sandamali', 710522459, 4, 'images/d_prof.png', 'sandamali'),
(22, 'test', 'a9922e14d2e6df5e4039115a50925939315d747a8a21aedf8f4df7727c75f8b2', 'NÖƒ›Sº<Ún·¥ÚÑ¤ó®Ë‘qÅëŠ^\n¬^ƒ', 1, 'test', 'test', 710633295, 2, 'images/d_prof.png', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
