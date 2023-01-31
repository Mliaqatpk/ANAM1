-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2022 at 10:28 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diet`
--

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan`
--

DROP TABLE IF EXISTS `diet_plan`;
CREATE TABLE IF NOT EXISTS `diet_plan` (
  `DID` int(11) NOT NULL AUTO_INCREMENT,
  `HID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Diet_name` varchar(500) NOT NULL,
  `diet_food` varchar(5000) NOT NULL,
  `diet_limit` varchar(5000) NOT NULL,
  `health_benefits` varchar(5000) NOT NULL,
  `downside` varchar(5000) NOT NULL,
  `daily_calories` int(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `price` int(11) NOT NULL,
  `average_rating` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`DID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_plan`
--

INSERT INTO `diet_plan` (`DID`, `HID`, `UID`, `Diet_name`, `diet_food`, `diet_limit`, `health_benefits`, `downside`, `daily_calories`, `description`, `price`, `average_rating`, `image`) VALUES
(4, 4, 20, 'keto Diet', 'fruits', 'protien', 'fhj', 'fdf', 1246, 'fsf', 56, NULL, 'keto.jpg'),
(5, 4, 20, 'western diet', 'chicken and eggs', 'all vegan', 'Protein developed', 'danger for health', 4500, 'dmngfdkjsgnsjdnsdgndskgnskjdg', 50000, NULL, 'protein.jpg'),
(6, 4, 24, 'Protein Diet', 'beans, meat, nuts, grains, eggs, seafood', 'all vegan', 'You can lose weight on a high-protein diet', 'danger for health', 1246, 'dmngfdkjsgnsjdnsdgndskgnskjdg', 3500, NULL, 'istock_photo_of_pork_tenderloin.jpg'),
(7, 6, 20, 'Dash Diet', ' fruits, vegetables, whole grains, fish, poultry, nuts, legumes, and low-fat dairy.', 'Limit sodium, sweets, sugary drinks, and red meats', 'maintians Bp level', 'BNHBSCA', 35000, 'Drink low-fat or skim dairy products any time you would normally use full-fat or cream.', 400000, NULL, 'image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `DID` int(11) NOT NULL,
  `Message` varchar(500) NOT NULL,
  `reply` varchar(500) DEFAULT NULL,
  `date_message` date NOT NULL,
  `date_reply` datetime DEFAULT NULL,
  `NID` int(11) NOT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FID`, `UID`, `DID`, `Message`, `reply`, `date_message`, `date_reply`, `NID`) VALUES
(1, 21, 4, 'SF', 'ZXCXZCZCZXC', '2022-11-21', '2022-12-05 19:08:40', 20),
(2, 21, 4, 'mn', 'DFDVSDVSDFDS', '2022-11-21', '2022-12-06 18:01:24', 20),
(3, 19, 7, 'DF', NULL, '2022-12-06', NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `health_condition`
--

DROP TABLE IF EXISTS `health_condition`;
CREATE TABLE IF NOT EXISTS `health_condition` (
  `HID` int(11) NOT NULL AUTO_INCREMENT,
  `h_condition` varchar(100) NOT NULL,
  PRIMARY KEY (`HID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_condition`
--

INSERT INTO `health_condition` (`HID`, `h_condition`) VALUES
(4, 'Weight Loss'),
(6, 'High BP'),
(7, 'Low sugar');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
CREATE TABLE IF NOT EXISTS `meal` (
  `MDAY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Week` int(11) NOT NULL,
  `Day` int(11) NOT NULL,
  `DID` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `fee_Type` varchar(20) NOT NULL,
  `NID` int(11) NOT NULL,
  PRIMARY KEY (`MDAY_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`MDAY_ID`, `Week`, `Day`, `DID`, `Description`, `Price`, `fee_Type`, `NID`) VALUES
(3, 1, 1, 4, 'dmngfdkjsgnsjdnsdgndskgnskjdg', 123, 'free', 24),
(4, 1, 1, 5, 'fsf', 23, 'paid', 24),
(10, 1, 2, 7, 'for break fast : eggs lunch :boil rice dinner : chicken', 200, 'paid', 20),
(9, 1, 1, 7, 'dmngfdkjsgnsjdnsdgndskgnskjdg', 0, 'free', 20);

-- --------------------------------------------------------

--
-- Table structure for table `meal_order`
--

DROP TABLE IF EXISTS `meal_order`;
CREATE TABLE IF NOT EXISTS `meal_order` (
  `MOID` int(11) NOT NULL AUTO_INCREMENT,
  `OID` int(11) NOT NULL,
  `NID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `MDAY_ID` int(11) NOT NULL,
  `fee_status` text NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`MOID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `sender_ID` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `reply` varchar(500) DEFAULT NULL,
  `date_message` datetime NOT NULL,
  `date_reply` datetime DEFAULT NULL,
  `reciever_ID` int(11) NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`SID`, `sender_ID`, `message`, `reply`, `date_message`, `date_reply`, `reciever_ID`) VALUES
(1, 19, '1', 'sdsd', '2022-11-22 00:00:00', '2022-11-26 11:11:12', 21),
(2, 21, 'nm', 'nm', '2022-11-17 00:00:00', '2022-11-18 18:14:36', 11),
(3, 21, 'nm', NULL, '2022-11-17 00:00:00', NULL, 11),
(4, 21, 'nm', NULL, '2022-11-17 00:00:00', NULL, 11),
(5, 21, 'nm', NULL, '2022-11-17 00:00:00', NULL, 21),
(6, 21, 'nm', NULL, '2022-11-17 00:00:00', NULL, 7),
(7, 21, 'bj', 'nm', '2022-11-17 17:57:28', '2022-12-05 15:18:22', 20),
(8, 21, 'bj', ' MNKLNL', '2022-11-17 18:08:17', '2022-12-06 18:00:23', 20),
(9, 21, 'rfbd', ',m ', '2022-11-18 11:50:13', '2022-12-05 21:08:28', 3),
(20, 21, 'nm', 'HOW CAN I HELP YOU', '2022-11-18 18:28:04', '2022-12-06 17:45:06', 3),
(21, 21, 'bn', NULL, '2022-11-20 11:18:33', NULL, 21),
(22, 21, 'nm', NULL, '2022-11-20 11:19:29', NULL, 21),
(23, 23, 'rfbd', NULL, '2022-12-05 21:20:25', NULL, 12),
(24, 23, 'rfbd', NULL, '2022-12-06 12:11:46', NULL, 3),
(25, 21, 'nmjk', 'cvscvs', '2022-12-06 18:08:46', '2022-12-07 17:45:01', 3),
(26, 21, 'rfbd', NULL, '2022-12-06 18:09:17', NULL, 24),
(27, 21, 'jnbjh', NULL, '2022-12-08 12:28:20', NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OID` int(11) NOT NULL AUTO_INCREMENT,
  `DID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `date` date NOT NULL,
  `accountno` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `status` text NOT NULL,
  `NID` int(11) NOT NULL,
  PRIMARY KEY (`OID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `DID`, `UID`, `Price`, `date`, `accountno`, `pin`, `status`, `NID`) VALUES
(1, 4, 21, 124, '2022-11-20', 12, 12, 'pending', 20),
(2, 4, 0, 56, '2022-11-21', 123, 23, 'rejected', 20),
(3, 4, 0, 56, '2022-11-21', 78, 12, 'pending', 20),
(4, 4, 0, 56, '2022-11-21', 78, 12, 'accepted', 20),
(5, 5, 23, 50000, '2022-12-05', 767566, 4345345, 'accepted', 24),
(6, 4, 21, 56, '2022-12-06', 32, 342, 'pending', 20),
(7, 7, 19, 400000, '2022-12-06', 123, 123, 'pending', 20);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `DID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `NID` int(11) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RID`, `UID`, `DID`, `rating`, `NID`) VALUES
(10, 19, 7, 5, 20),
(9, 23, 5, 5, 24),
(8, 23, 4, 5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `pic` varchar(500) DEFAULT NULL,
  `intro` varchar(1000) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `experience` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `name`, `username`, `phone`, `email`, `password`, `type`, `status`, `pic`, `intro`, `qualification`, `experience`) VALUES
(3, 'Tehreema Farooq', 'admin', '03315645446', 'Robo@gmail.com', '#&DLAHu', 'admin', 'accepted', NULL, '', NULL, NULL),
(5, 'Tehreema Farooq', 'Robo', '03315645446', 'tehreemafarooq.tf@gmail.com', '#&DLAHugYcvnjs0$Ao', '', '', NULL, '', NULL, NULL),
(6, 'Tehreema Farooq', 'Robo', '03315645446', 'tehreemafarooq.tf@gmail.com', '#&DLAHugYcvnjs0$Ao', '', '', NULL, '', NULL, NULL),
(7, 'Tehreema Farooq', 'Robo', '03315645446', 'tehreemafarooq.tf@gmail.com', '#&DLAHugYcvnjs0$Ao', '', '', NULL, '', NULL, NULL),
(8, '1', '1', '03315645446', 'tehreemafarooq.tf@gmail.com', '#$Ao', '', '', NULL, '', NULL, NULL),
(9, '1', '1', '1', '1@gmail.com', '1', '', '', NULL, '', NULL, NULL),
(10, 'Tehreema Farooq', 'Robo', '03348377432', 'tehreemafarooq.tf@gmail.com', '#&DLAHugYcvnjs0$Ao', '', '', NULL, '', NULL, NULL),
(11, 'Tehreema Farooq', 'sajila', '03315645446', 'tehreemafarooq.tf@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', 'c.png', 'i have 6 year of experience', 'bs', '1'),
(12, 'Tehreema Farooq', 'sajila', '03315645446', 'tehreemafarooq.tf@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', 'bg.jpg', 'n', 'bs', '2'),
(13, 'Tehreema Farooq', 'sajila', '03315645446', 'tehreemafarooq.tf@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', NULL, '', NULL, '3'),
(14, 'Tehreema Farooqn', 'sajila', '03348377432', 'j23@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', NULL, '', NULL, '4'),
(15, 'Tehreema Farooqn', 'sajila', '03348377432', 'j23@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', NULL, '', NULL, '5'),
(19, 'mahnoor', 'Mahnoorfatima', '0456789', 'mahnoorfatima@GMAIL.COM', '#&DLAHu', 'user', 'accepted', NULL, NULL, NULL, NULL),
(20, 'SDE', 'sde', '03315647446', 'SDE@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', 'thumbbig-559116.jpg', 'hvhkvk', 'MBBA', '6'),
(21, 'userchecking', 'USER-1234', '044534678', 'thh@gmail.com', '#&DLAHu', 'user', 'accepted', NULL, NULL, NULL, NULL),
(22, 'table', 'bhmjmgugkuk', '044534678', 'thh@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', 'uLT16.jpg', '2jbkl', 'bc', '12'),
(24, 'albasit', 'nutritionist', '23245464', 'albasit@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', '1000_F_288170782_0xt0GHeQkOcthJGtDjObyv5RNWoCJMrA.jpg', 'dgryryryry', 'wrw', '12'),
(25, 'SAMAN', 'SMANFATIMA', '034567', 'SAMAN@GMAIL.COM', '#&DLAHu', 'user', 'accepted', NULL, NULL, NULL, NULL),
(26, 'Tehreema Farooq', 'Mahnoorfatima', '03315645446', 'tehreemafarooq.tf@gmail.com', '#&DLAHu', 'nutritionist', 'accepted', '1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', 'NMBMNBM', 'wrw', '8'),
(27, 'mujadid', 'Mahnoorfatima', '03315645446', 'mujadid@gmail.com', '#&DLAHu', 'user', 'accepted', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
