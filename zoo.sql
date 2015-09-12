-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2015 at 09:30 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
`a_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_description` int(100) NOT NULL,
  `a_ac_id` int(11) NOT NULL,
  `a_dob` date NOT NULL,
  `a_dod` date NOT NULL,
  `a_delete_index` enum('0','1') NOT NULL COMMENT '0-not delete /1 -delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `animal_category`
--

CREATE TABLE IF NOT EXISTS `animal_category` (
`ac_id` int(11) NOT NULL,
  `ac_name` varchar(100) NOT NULL,
  `ac_description` varchar(200) DEFAULT NULL,
  `ac_latitude` double NOT NULL,
  `ac_longitude` double NOT NULL,
  `ac_delete_index` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-not delete '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `animal_treatment`
--

CREATE TABLE IF NOT EXISTS `animal_treatment` (
`at_id` int(11) NOT NULL,
  `at_name` varchar(100) NOT NULL,
  `at_description` varchar(100) NOT NULL,
  `at_date` date NOT NULL,
  `at_done_by` varchar(100) NOT NULL,
  `at_animal_id` int(11) NOT NULL,
  `at_treatment_id` int(11) NOT NULL,
  `at_delete_index` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
`t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_description` varchar(100) NOT NULL,
  `t_delete_index` enum('0','1') NOT NULL COMMENT '0-not delete 1-delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_type` enum('Admin','Manager','Surgeon','Op') NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `contact_no_1` varchar(15) DEFAULT NULL,
  `profile_pic` varchar(500) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `is_published` varchar(20) NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `added_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `animal_category`
--
ALTER TABLE `animal_category`
 ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `animal_treatment`
--
ALTER TABLE `animal_treatment`
 ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
 ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `animal_category`
--
ALTER TABLE `animal_category`
MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `animal_treatment`
--
ALTER TABLE `animal_treatment`
MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
