-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2017 at 10:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `sid` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `term` enum('Sept-Dec','Jan-April','May-August','') NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `sid` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `fees_arrears` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `sid` int(11) NOT NULL,
  `contact_name` int(11) NOT NULL,
  `contact_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `health_conditions`
--

CREATE TABLE `health_conditions` (
  `sid` int(11) NOT NULL DEFAULT '0',
  `condition` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_name` int(11) NOT NULL,
  `num_in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_withdrawals`
--

CREATE TABLE `inventory_withdrawals` (
  `item_name` int(11) NOT NULL,
  `withdrawn_by` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `num_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `studentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`name`, `username`, `password`, `studentid`) VALUES
('Kofi Bentil', 'kbentil', 'kofi', 152),
('Kofi Bentil', 'kofi', 'kofi', 8898);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `sid` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffProfile`
--

CREATE TABLE `staffProfile` (
  `staffid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(20) NOT NULL,
  `subjects` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffSubjects`
--

CREATE TABLE `staffSubjects` (
  `staffid` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `class` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `postaladdress` varchar(100) NOT NULL,
  `parent1name` varchar(200) NOT NULL,
  `parent1number` varchar(20) NOT NULL,
  `parent2name` varchar(200) NOT NULL,
  `parent2number` varchar(20) NOT NULL,
  `contactemail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middlename`, `lastname`, `dateofbirth`, `age`, `gender`, `postaladdress`, `parent1name`, `parent1number`, `parent2name`, `parent2number`, `contactemail`) VALUES
(35, 'Abdul-Razak', '', 'Adam', '2017-12-09', 9, 'on', 'PMB CT 1', 'Boy Adam', '0234567898', 'Girl Eve', '0273648193', 'girleve@hotmail.com'),
(152, 'Efua ', 'Bentsiwa', 'Bentil', '1999-11-05', 18, 'on', 'GP 18512, Accra', 'Kofi Bentil', '0204383431', 'Cecilia Bentil', '0208165204', 'cecibentill@hotmail.com'),
(4221, '', '', '', '0000-00-00', 0, '', '', '', '', '', '', ''),
(7501, 'John', 'Steven ', 'McQueen', '1998-12-09', 17, 'on', 'DS 991, Accra', 'Kevin McQueen', '0283716232', 'Jessica McQueen', '0287346631', 'kevJess@yahoo.com'),
(8898, 'Nana Adjoa', 'Sika', 'Bentil', '1997-10-20', 20, 'Female', 'GP 18512, Accra', 'Kofi Bentil', '0233333333', 'Cecilia Bentil', '0233333333', 'kb@yahoo.com'),
(9301, 'Arya', '', 'Stark', '1997-12-15', 20, 'on', '12, Northumberland Street, Oxfordshire', 'Eddard Stark', '0245637812', 'Catelyn Stark', '0543672817', 'nedCat@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`username`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`sid`,`subject`),
  ADD KEY `sid` (`sid`),
  ADD KEY `sid_2` (`sid`);

--
-- Indexes for table `staffProfile`
--
ALTER TABLE `staffProfile`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `staffSubjects`
--
ALTER TABLE `staffSubjects`
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9302;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`id`);

--
-- Constraints for table `staffSubjects`
--
ALTER TABLE `staffSubjects`
  ADD CONSTRAINT `staffsubjects_ibfk_1` FOREIGN KEY (`staffid`) REFERENCES `staffProfile` (`staffid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
