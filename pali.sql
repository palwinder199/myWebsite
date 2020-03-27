-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 10:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pali`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me_overview`
--

CREATE TABLE `about_me_overview` (
  `cp_id_pk` int(11) NOT NULL,
  `cp_overview` varchar(15000) DEFAULT NULL,
  `cp_entrydatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_me_overview`
--

INSERT INTO `about_me_overview` (`cp_id_pk`, `cp_overview`, `cp_entrydatetime`) VALUES
(1, '<h2><strong>About Me</strong></h2>\r\n\r\n<p><strong><img alt=\"\" src=\"http://localhost/sv/pali/upload/gallery/200327134332-0-500.png\" style=\"float:left; height:500px; margin:10px; width:500px\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>I&#39;m Palwinder Singh from Sangrawan a small village in Kapurthala, Punjab. I am a Web Developer.</strong></p>\r\n', '2020-03-27 14:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `about_me_slider`
--

CREATE TABLE `about_me_slider` (
  `cpl_id_pk` int(11) NOT NULL,
  `cpl_image` varchar(200) NOT NULL,
  `cpl_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `cpl_entrydatetime` datetime NOT NULL,
  `cpl_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies_logo`
--

CREATE TABLE `companies_logo` (
  `cl_id_pk` int(11) NOT NULL,
  `cl_image` varchar(200) NOT NULL,
  `cl_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `cl_entrydatetime` datetime NOT NULL,
  `cl_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

CREATE TABLE `contact_data` (
  `cd_id_pk` int(11) NOT NULL,
  `cd_order` int(11) DEFAULT '1',
  `cd_type` varchar(100) NOT NULL,
  `cd_data` varchar(2000) NOT NULL,
  `cd_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `cd_entrydatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_data`
--

INSERT INTO `contact_data` (`cd_id_pk`, `cd_order`, `cd_type`, `cd_data`, `cd_status`, `cd_entrydatetime`) VALUES
(1, 1, 'Address', 'Palwinder199.com, Sangrawan, Kapurthala, Punjab 144804', 'active', '2019-11-15 12:16:14'),
(2, 1, 'Email', 'palwinder199@gmail.com', 'active', '2019-11-15 12:42:40'),
(3, 1, 'Facebook', 'https://www.facebook.com/palwinder199', 'active', '2019-11-15 12:47:34'),
(4, 1, 'Person Name', 'Palwinder Singh', 'active', '2019-11-15 12:48:01'),
(6, 1, 'Twitter', 'https://twitter.com/palwinder199/', 'active', '2019-11-15 12:49:08'),
(7, 1, 'Embedded Map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4045.2175542700707!2d75.36020913915414!3d31.50743118615725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a4b8bbe6f622d%3A0xff76794a3f6093ee!2spalwinder199.com!5e0!3m2!1sen!2sin!4v1585291865833!5m2!1sen!2sin\" width=\"300\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 'active', '2019-11-15 13:38:56'),
(8, 1, 'Phone', '+91 814 611 8255', 'active', '2019-11-29 15:23:45'),
(11, 2, 'Email', 'hi@palwinder199.com', 'active', '2020-03-27 12:23:30'),
(12, 1, 'Github', 'http://github.com/palwinder199', 'active', '2020-03-27 13:13:57'),
(13, 1, 'Instagram', 'http://instagram.com/palwinder199', 'active', '2020-03-27 13:14:21'),
(14, 1, 'Linkedin', 'https://www.linkedin.com/in/palwinder199/', 'active', '2020-03-27 13:14:38'),
(15, 1, 'Pinterest', 'https://in.pinterest.com/palwinder199/', 'active', '2020-03-27 13:21:00'),
(16, 1, 'Youtube', 'https://youtube.com/channel/UCZSvirSJ-i53O1tImCdYK0Q', 'active', '2020-03-27 13:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE `establishment` (
  `e_id_pk` int(11) NOT NULL,
  `e_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_query`
--

CREATE TABLE `form_query` (
  `fq_id_pk` int(11) NOT NULL,
  `fq_name` varchar(100) NOT NULL,
  `fq_phone` varchar(100) NOT NULL,
  `fq_email` varchar(100) NOT NULL,
  `fq_message` varchar(1500) NOT NULL,
  `fq_query_from_url` varchar(300) NOT NULL,
  `fq_status` enum('active','deactive') NOT NULL DEFAULT 'deactive',
  `fq_entrydatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id_pk` int(11) NOT NULL,
  `g_order` int(11) NOT NULL,
  `g_img` varchar(500) NOT NULL,
  `g_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `g_entrydatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id_pk`, `g_order`, `g_img`, `g_status`, `g_entrydatetime`) VALUES
(1, 1, '200327134332-0-500.png', 'active', '2020-03-27 13:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id_pk` int(11) NOT NULL,
  `login_fullname` varchar(200) NOT NULL,
  `login_uname` varchar(100) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_password` varchar(100) NOT NULL,
  `login_img` varchar(500) NOT NULL,
  `login_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `login_type` varchar(100) NOT NULL DEFAULT 'admin',
  `login_phone` varchar(100) NOT NULL,
  `login_entrydatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id_pk`, `login_fullname`, `login_uname`, `login_email`, `login_password`, `login_img`, `login_status`, `login_type`, `login_phone`, `login_entrydatetime`) VALUES
(1, 'Palwinder Singh', 'pali', 'palwinder199@gmail.com', 'Password', '', 'active', 'admin', '', '2019-08-19 10:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `products_overview`
--

CREATE TABLE `products_overview` (
  `po_id_pk` int(11) NOT NULL,
  `po_overview` varchar(15000) DEFAULT NULL,
  `po_entrydatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_overview`
--

INSERT INTO `products_overview` (`po_id_pk`, `po_overview`, `po_entrydatetime`) VALUES
(1, '', '2019-11-30 13:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `resume_id_pk` int(11) NOT NULL,
  `resume_file` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`resume_id_pk`, `resume_file`) VALUES
(1, '200327132602-0-Palwinder_Singh_resume_2020-03-24.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `s_id_pk` int(11) NOT NULL,
  `s_image` varchar(200) NOT NULL,
  `s_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `s_entrydatetime` datetime NOT NULL,
  `s_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`s_id_pk`, `s_image`, `s_status`, `s_entrydatetime`, `s_order`) VALUES
(1, '200327134057-0-palwinder199-slider1.png', 'active', '2020-03-27 13:40:57', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me_overview`
--
ALTER TABLE `about_me_overview`
  ADD PRIMARY KEY (`cp_id_pk`);

--
-- Indexes for table `about_me_slider`
--
ALTER TABLE `about_me_slider`
  ADD PRIMARY KEY (`cpl_id_pk`);

--
-- Indexes for table `companies_logo`
--
ALTER TABLE `companies_logo`
  ADD PRIMARY KEY (`cl_id_pk`);

--
-- Indexes for table `contact_data`
--
ALTER TABLE `contact_data`
  ADD PRIMARY KEY (`cd_id_pk`);

--
-- Indexes for table `establishment`
--
ALTER TABLE `establishment`
  ADD PRIMARY KEY (`e_id_pk`);

--
-- Indexes for table `form_query`
--
ALTER TABLE `form_query`
  ADD PRIMARY KEY (`fq_id_pk`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id_pk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id_pk`);

--
-- Indexes for table `products_overview`
--
ALTER TABLE `products_overview`
  ADD PRIMARY KEY (`po_id_pk`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`resume_id_pk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`s_id_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me_overview`
--
ALTER TABLE `about_me_overview`
  MODIFY `cp_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_me_slider`
--
ALTER TABLE `about_me_slider`
  MODIFY `cpl_id_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies_logo`
--
ALTER TABLE `companies_logo`
  MODIFY `cl_id_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_data`
--
ALTER TABLE `contact_data`
  MODIFY `cd_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `establishment`
--
ALTER TABLE `establishment`
  MODIFY `e_id_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_query`
--
ALTER TABLE `form_query`
  MODIFY `fq_id_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_overview`
--
ALTER TABLE `products_overview`
  MODIFY `po_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `resume_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `s_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
