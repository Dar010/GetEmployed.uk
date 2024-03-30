-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 08:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `getemployed`
--
CREATE DATABASE IF NOT EXISTS `getemployed` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `getemployed`;

-- --------------------------------------------------------

--
-- Table structure for table `applyjobs`
--

DROP TABLE IF EXISTS `applyjobs`;
CREATE TABLE IF NOT EXISTS `applyjobs` (
  `JobSeeker_ID` int(11) NOT NULL,
  `Apply_ID` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(100) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `pay` int(8) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY (`Apply_ID`),
  KEY `JobSeeker_ID` (`JobSeeker_ID`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `applyjobs`
--

INSERT INTO `applyjobs` (`JobSeeker_ID`, `Apply_ID`, `job_title`, `job_description`, `pay`, `job_id`) VALUES
(26, 2, 'HR Manager', 'A HR manager needed to manage a team handle the resources', 100000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `Company_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Company_Name` varchar(35) NOT NULL,
  `Company_Email` varchar(50) NOT NULL,
  `Company_Password` varchar(30) NOT NULL,
  `Company_EST` date NOT NULL,
  `Company_Registration` date NOT NULL,
  `Company_Type` varchar(35) NOT NULL,
  `Company_Address` varchar(100) NOT NULL,
  `code` varchar(6) NOT NULL,
  `Company_Contact` int(13) NOT NULL,
  `Company_About` varchar(255) NOT NULL,
  PRIMARY KEY (`Company_ID`),
  UNIQUE KEY `Company_Name` (`Company_Name`),
  UNIQUE KEY `Company_Email` (`Company_Email`),
  UNIQUE KEY `Company_Contact` (`Company_Contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Company_ID`, `Company_Name`, `Company_Email`, `Company_Password`, `Company_EST`, `Company_Registration`, `Company_Type`, `Company_Address`, `code`, `Company_Contact`, `Company_About`) VALUES
(14, 'Orient', 'orient@gmail.com', 'orient1234', '1998-03-10', '2017-03-10', 'Electronics', 'Near Township, Lahore', '+92321', 2147483, 'Company with different electrical and electronic appliances');

-- --------------------------------------------------------

--
-- Table structure for table `companynjob`
--

DROP TABLE IF EXISTS `companynjob`;
CREATE TABLE IF NOT EXISTS `companynjob` (
  `cmpny_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Company_ID` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `Status` varchar(3) NOT NULL,
  `pay` int(8) NOT NULL,
  `experience` varchar(4) NOT NULL,
  `education` varchar(50) NOT NULL,
  `Company_Type` varchar(35) NOT NULL,
  PRIMARY KEY (`cmpny_ID`),
  KEY `Company_ID` (`Company_ID`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `companynjob`
--

INSERT INTO `companynjob` (`cmpny_ID`, `Company_ID`, `job_id`, `job_title`, `job_description`, `skills`, `Status`, `pay`, `experience`, `education`, `Company_Type`) VALUES
(7, 14, 11, 'HR Manager', 'A HR manager needed to manage a team handle the resources', 'Team Management, Excel', 'Yes', 100000, '1 Ye', 'Masters in HR', 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(100) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `experience` varchar(4) NOT NULL,
  `pay` int(8) NOT NULL,
  `Status` varchar(3) NOT NULL,
  `education` varchar(50) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`, `job_description`, `skills`, `experience`, `pay`, `Status`, `education`) VALUES
(11, 'HR Manager', 'A HR manager needed to manage a team handle the resources', 'Team Management, Excel', '1 Ye', 100000, 'Yes', 'Masters in HR');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

DROP TABLE IF EXISTS `jobseeker`;
CREATE TABLE IF NOT EXISTS `jobseeker` (
  `JobSeeker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JobSeeker_Name` varchar(35) NOT NULL,
  `JobSeeker_Email` varchar(50) NOT NULL,
  `JobSeeker_Password` varchar(32) NOT NULL,
  `JobSeeker_Gender` varchar(8) NOT NULL,
  `JobSeeker_Address` varchar(100) NOT NULL,
  `JobSeeker_Education` varchar(100) NOT NULL,
  `code` varchar(6) NOT NULL,
  `JobSeeker_Contact` int(13) NOT NULL,
  `JobSeeker_Specialization` varchar(100) NOT NULL,
  `CV` varchar(255) NOT NULL,
  PRIMARY KEY (`JobSeeker_ID`),
  UNIQUE KEY `JobSeeker_Contact` (`JobSeeker_Contact`),
  UNIQUE KEY `JobSeeker_Email` (`JobSeeker_Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`JobSeeker_ID`, `JobSeeker_Name`, `JobSeeker_Email`, `JobSeeker_Password`, `JobSeeker_Gender`, `JobSeeker_Address`, `JobSeeker_Education`, `code`, `JobSeeker_Contact`, `JobSeeker_Specialization`, `CV`) VALUES
(26, 'Asad', 'asad@live.com', 'logan1234', 'Male', 'Gulberg', 'BCS Hons.', '+92331', 4340451, 'PHP', 'F:semester 3Data Structure - AB1.docx'),
(29, 'Fahad', 'fahad34@gmail.com', '12345678', 'Male', 'Pak Arab Lahore', 'BCS', '', 2147483647, 'Web Developing', '891-Fahad DAD2.docx');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applyjobs`
--
ALTER TABLE `applyjobs`
  ADD CONSTRAINT `fk_jid` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jobid` FOREIGN KEY (`JobSeeker_ID`) REFERENCES `jobseeker` (`JobSeeker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companynjob`
--
ALTER TABLE `companynjob`
  ADD CONSTRAINT `fk_company` FOREIGN KEY (`Company_ID`) REFERENCES `company` (`Company_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_job` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
