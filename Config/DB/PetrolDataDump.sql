-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2015 at 08:24 PM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `commutin_petrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_parks`
--

CREATE TABLE IF NOT EXISTS `car_parks` (
`id` int(11) unsigned NOT NULL,
  `cost` float NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `town` varchar(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `long` float DEFAULT NULL,
  `lat` float DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `town`, `created`, `user_id`, `long`, `lat`) VALUES
(1, 'Rugby Train Station, Car Park ', 'Rugby', '2014-08-04 07:13:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petrol_stations`
--

CREATE TABLE IF NOT EXISTS `petrol_stations` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `vicinity` varchar(255) NOT NULL,
  `google_id` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `petrol_stations`
--

INSERT INTO `petrol_stations` (`id`, `name`, `created`, `user_id`, `longitude`, `latitude`, `vicinity`, `google_id`) VALUES
(2, 'BP Corporation Street, Rugby', '2012-08-13 05:05:35', 1, 0, 0, '', ''),
(3, 'Sainsbury''s Castle Vale', '2012-08-13 05:05:35', 1, 0, 0, '', ''),
(4, 'Texaco Tile Cross', '2012-08-13 05:05:35', 1, 0, 0, '', ''),
(5, 'BP Paddocks, Hillmorton Road, ', '2012-08-13 05:05:35', 1, 0, 0, '', ''),
(6, 'BP Clock Service Station, Birm', '2012-08-13 05:05:35', 1, 0, 0, '', ''),
(7, 'Station Service Shell, France', '2012-08-13 05:05:35', 1, 0, 0, '', ''),
(8, 'Townwall Service Station, Dove', '2012-08-13 05:05:35', 1, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
`id` bigint(20) NOT NULL,
  `odometer` bigint(20) DEFAULT NULL,
  `indicator` float DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `litres` float DEFAULT NULL,
  `vehicle_id` bigint(20) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `discount` float DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=302 ;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `odometer`, `indicator`, `cost`, `litres`, `vehicle_id`, `location`, `created`, `user_id`, `discount`) VALUES
(2, 63446, 0, 61, 45.89, 1, '', '2012-01-15 11:27:57', 1, NULL),
(3, 1825, 0, 15.08, 11.61, 2, '', '2012-01-16 16:26:39', 1, NULL),
(4, 63835, 0, 60.7, 46.73, 1, '', '2012-01-19 17:09:37', 1, NULL),
(5, 64145, 0, 26.19, 19.56, 1, '', '2012-01-28 13:02:08', 1, NULL),
(6, 64312, 0, 64.12, 47.53, 1, '', '2012-01-28 13:31:14', 1, NULL),
(7, 64625, 0, 55.27, 40.37, 1, '', '2012-02-03 07:50:59', 1, NULL),
(8, 64941, 0, 54, 40.63, 1, '', '2012-02-08 17:55:00', 1, NULL),
(9, 2591, 0, 30.13, 22.5, 2, '', '2012-02-12 14:49:24', 1, NULL),
(10, 2868, 0, 20.01, 15.06, 2, '', '2012-02-16 16:29:46', 1, NULL),
(11, 65260, 0, 21.6, 16.09, 1, '', '2012-02-19 18:22:38', 1, NULL),
(12, 65386, 0, 57.5, 45.96, 1, '', '2012-02-20 18:43:38', 1, NULL),
(13, 65755, 0, 63.54, 46.08, 1, '', '2012-02-26 19:25:57', 1, NULL),
(14, 66131, 0, 15.08, 10.78, 1, '', '2012-03-01 18:01:57', 1, NULL),
(15, 66245, 0, 67.79, 49.52, 1, '', '2012-03-02 17:58:22', 1, NULL),
(16, 3210, 0, 25.04, 18.02, 2, '', '2012-03-05 07:39:35', 1, NULL),
(17, 66613, 0, 66.01, 47.52, 1, '', '2012-03-10 08:44:26', 1, NULL),
(18, 3528, 0, 15.03, 10.67, 2, '', '2012-03-14 19:05:08', 1, NULL),
(19, 66985, 0, 59.63, 43.88, 1, 'BP Corporation Street, Rugby', '2012-03-17 07:47:54', 1, NULL),
(21, 67315, 0, 56.06, 41.25, 1, 'Sainsbury''s Castle Vale', '2012-03-22 17:19:13', 1, NULL),
(22, 3840, 0, 20.09, 14.06, 2, 'Texaco Tile Cross', '2012-03-27 06:51:44', 1, NULL),
(23, 3990, 0, 37.1, 25.96, 2, 'Texaco Tile Cross', '2012-03-28 06:46:18', 1, NULL),
(24, 67582, 0, 47.46, 33.68, 1, 'BP Corporation Street, Rugby', '2012-03-31 08:35:31', 1, NULL),
(25, 67981, 0, 14.12, 10.02, 1, 'BP Corporation Street, Rugby', '2012-04-01 12:45:16', 1, NULL),
(26, 4228, 0.25, 34.6, 25.09, 2, 'Sainsbury''s Castle Vale', '2012-04-02 15:30:56', 1, NULL),
(27, 4514, 2, 35.05, 25.42, 2, 'Sainsbury''s Castle Vale', '2012-04-11 16:12:41', 1, NULL),
(28, 68247, 0, 60, 41.4, 1, 'BP Paddocks, Hillmorton Road, Rugby', '2012-04-16 17:43:02', 1, NULL),
(29, 4800, 0, 15.03, 10.74, 2, 'Sainsbury''s Castle Vale', '2012-04-18 09:08:00', 1, NULL),
(30, 4900, 2, 34.35, 23.7, 2, 'BP Paddocks, Hillmorton Road, Rugby', '2012-04-22 19:58:31', 1, NULL),
(31, 69000, 0, 20.04, 13.83, 1, 'BP Paddocks, Hillmorton Road, Rugby', '2012-04-21 16:08:00', 1, NULL),
(32, 5167, 1, 15.07, 10.4, 2, 'BP Paddocks, Hillmorton Road, Rugby', '2012-04-28 15:16:25', 1, NULL),
(33, 68761, 0, 70.52, 48.66, 1, 'BP Paddocks, Hillmorton Road, Rugby', '2012-04-29 14:05:10', 1, NULL),
(34, 69156, 0, 67.27, 48.08, 1, 'BP Clock Service Station, Birmingham', '2012-05-04 06:45:46', 1, NULL),
(45, 71022, 5, 35.83, 26.61, 1, 'Station Service Shell, France', '2012-06-02 13:46:43', 1, NULL),
(44, 70744, 4, 34.82, 26, 1, 'BP Clock Service Station, Birmingham ', '2012-06-01 06:45:20', 1, NULL),
(38, 69543, 0, 20.04, 13.83, 1, 'Texaco Tile Cross', '2012-05-13 11:10:37', 1, NULL),
(39, 69666, 0, 68.21, 47.73, 1, 'BP Paddocks, Hillmorton Road, Rugby', '2012-05-13 11:12:11', 1, NULL),
(40, 70076, 0, 66.88, 48.5, 1, 'BP Corporation Street, Rugby', '2012-05-18 16:27:09', 1, NULL),
(41, 70558, 0, 15, 10.4, 1, 'Texaco Tile Cross', '2012-05-27 21:14:49', 1, NULL),
(42, 70532, 0, 63.03, 46.36, 1, 'BP Corporation Street, Rugby', '2012-05-27 21:15:45', 1, NULL),
(43, 5746, 0, 20.6, 15.27, 2, 'Texaco Tile Cross', '2012-05-29 18:21:00', 1, NULL),
(46, 71378, 0, 56.13, 41.3, 1, 'Townwall Service Station, Dover', '2012-06-06 01:06:00', 1, NULL),
(47, 71727, 0, 62.95, 47.01, 1, 'BP Clock Service Station, Birmingham', '2012-06-12 06:50:00', 1, NULL),
(48, 6045, 0, 20.03, 15.66, 2, 'Sainsbury''s Castle Vale', '2012-06-13 13:48:00', 1, NULL),
(49, 72125, 0, 63.65, 49, 1, 'BP Clock Service Station, Birmingham', '2012-06-19 06:48:00', 1, NULL),
(50, 72522, 0, 30.33, 23.35, 1, 'BP Clock Service Station, Birmingham ', '2012-06-26 15:34:15', 1, NULL),
(51, 72724, 0, 10.06, 7.46, 1, 'BP Paddocks, Hillmorton Road, Rugby', '2012-06-30 13:51:20', 1, NULL),
(52, 72789, 0, 64.44, 49.6, 1, 'BP Clock Service Station, Birmingham', '2012-07-02 09:43:55', 1, NULL),
(53, 73190, 0, 60.32, 47.91, 1, 'Sainsbury''s Castle Vale', '2012-07-09 07:51:00', 1, NULL),
(54, 6458, 1, 15.13, 11.13, 2, 'BP Paddocks, Hillmorton Road, Rugby', '2012-07-08 14:27:00', 1, NULL),
(55, 73581, 0, 64.76, 49.85, 1, 'BP Clock Service Station, Birmingham', '2012-07-16 07:14:00', 1, NULL),
(56, 73811, 2, 50.41, 39.41, 1, 'Sainsbury''s Castle Vale', '2012-07-20 07:20:00', 1, NULL),
(57, 6981, 2, 20.22, 15.69, 2, 'Sainsbury''s Castle Vale', '2012-07-23 11:19:00', 1, NULL),
(58, 74272, 0, 61.55, 47.38, 1, 'Sainsbury''s Castle Vale', '2012-07-31 15:33:00', 1, NULL),
(59, 7191, 1, 15, 11.55, 2, 'Sainsbury''s Castle Vale', '2012-08-03 15:21:00', 1, NULL),
(60, 74608, 1, 54.04, 41.6, 1, 'Sainsbury''s Castle Vale', '2012-08-06 15:11:00', 1, NULL),
(61, 7335, 0, 20.22, 15.45, 2, 'Sainsbury''s Castle Vale', '2012-08-08 15:59:00', 1, NULL),
(62, 7449, 0, 15.14, 11.4, 2, 'Sainsbury''s Castle Vale', '2012-08-13 15:08:00', 1, NULL),
(63, 74989, 0, 15.02, 11.39, 1, 'Sainsbury''s Castle Vale', '2012-08-15 15:13:00', 1, NULL),
(64, 75058, 1, 57.73, 43.44, 1, 'Sainsbury''s Castle Vale', '2012-08-16 07:51:00', 1, NULL),
(65, 7570, 0.25, 20.05, 15.09, 2, 'Sainsbury''s Castle Vale', '2012-08-17 07:45:00', 1, NULL),
(66, 24253, 0, 20.03, 18.91, 1, '', '2010-01-02 18:07:00', 1, NULL),
(67, 24365, 0.5, 49.65, 44.77, 1, '', '2010-01-05 07:10:00', 1, NULL),
(68, 75362, 0.25, 51.66, 38.58, 1, 'Sainsbury''s Castle Vale', '2012-08-22 06:57:00', 1, NULL),
(69, 7712, 0.25, 10.12, 7.45, 2, 'Shell Great Barr', '2012-08-23 19:18:00', 1, NULL),
(70, 7829, 0.125, 30.01, 20.43, 2, 'BP Watford Gap South', '2012-08-28 09:07:00', 1, NULL),
(71, 75739, 0, 20.01, 14.51, 1, 'Sainsbury''s Rugby', '2012-09-06 14:16:00', 1, NULL),
(72, 75845, 0, 20.04, 13.55, 1, 'Watford Gap South', '2012-09-11 17:17:00', 1, NULL),
(73, 20340, 0.125, 15.04, 10.83, 5, 'Tesco Rugby', '2012-09-18 16:04:00', 1, NULL),
(74, 20462, 0.125, 15.03, 10.9, 5, 'Sainsbury''s Castle Vale', '2012-09-20 15:32:00', 1, NULL),
(75, 20530, 0.375, 30.09, 21.82, 5, 'Sainsbury''s Castle Vale', '2012-09-21 06:48:00', 1, NULL),
(76, 20581, 0.875, 5.34, 3.74, 5, 'Shell Junction Services, Daventry', '2012-09-21 16:14:00', 1, NULL),
(77, 8101, 0, 40.64, 29.47, 2, 'Sainsbury''s Castle Vale', '2012-09-24 10:42:00', 1, NULL),
(78, 8412, 0, 38.07, 28.01, 2, 'Sainsbury''s Castle Vale', '2012-09-28 15:56:00', 1, NULL),
(79, 8683, 0.125, 33.88, 24.22, 2, 'BP Ward End', '2012-10-03 15:29:00', 1, NULL),
(80, 8984, 0, 38.68, 28.46, 2, 'Sainsbury''s Castle Vale', '2012-10-10 15:24:00', 1, NULL),
(81, 9318, 0, 41.76, 30.73, 2, 'Sainsbury''s Castle Vale', '2012-10-16 08:07:00', 1, NULL),
(82, 9649, 0, 40, 29.43, 2, 'Sainsbury''s Castle Vale', '2012-10-22 16:15:00', 1, NULL),
(83, 77311, 0.125, 30.01, 22.41, 1, 'Sainsburys Castle Vale', '2012-10-26 15:33:00', 1, NULL),
(84, 9938, 0.25, 32, 23.9, 2, 'Sainsburys Castle Vale', '2012-10-29 16:36:00', 1, NULL),
(85, 10288, 0, 10.17, 6.92, 2, 'Shell Corley North', '2012-11-08 07:46:00', 1, NULL),
(86, 10377, 0, 40.9, 31.01, 2, 'Sainsburys Castle Vale', '2012-11-09 16:14:00', 1, NULL),
(87, 77781, 0, 20.02, 14.61, 1, 'BP Paddocks Rugby', '2012-11-10 18:31:00', 1, NULL),
(88, 77895, 0, 60.33, 45.74, 1, 'Sainsburys Castle Vale', '2012-11-13 16:14:00', 1, NULL),
(89, 78256, 0, 20.06, 15.21, 1, 'Sainsburys Castle Vale', '2012-11-21 16:32:00', 1, NULL),
(90, 78564, 0, 30.01, 22.41, 1, 'Shell Great Barr', '2012-11-24 17:18:00', 1, NULL),
(91, 10694, 0, 15, 10.28, 2, 'Shell Corley Services South', '2012-11-26 16:31:00', 1, NULL),
(96, 69210, 100, 70.05, 50.43, 0, 'Tesco, Hanley', '2012-11-29 18:30:00', 18, 25),
(93, 23456, 0, 20, 15, 0, 'ASda', '2012-11-28 14:43:00', 17, NULL),
(94, 78768, 0, 62.26, 46.5, 1, 'Tesco Rugby', '2012-11-29 17:32:00', 1, NULL),
(95, 78663, 0, 20.01, 15.17, 1, 'Sainsburys Castle Vale', '2012-11-28 08:20:00', 1, NULL),
(97, 10845, 0, 25.01, 19.25, 2, 'Sainsburys Castle Vale', '2012-12-03 16:19:00', 1, NULL),
(98, 10983, 0.25, 15, 11.55, 2, 'Sainsburys Castle Vale', '2012-12-05 13:57:00', 1, NULL),
(99, 79154, 0, 20.08, 14.99, 1, 'BP Paddocks', '2012-12-09 15:39:00', 1, NULL),
(100, 11186, 0, 10.03, 6.97, 2, 'Shell Corley N', '2012-12-11 07:39:00', 1, NULL),
(101, 11275, 0, 39.41, 30.34, 2, 'Sainsburys Castle Vale', '2012-12-12 12:05:00', 1, NULL),
(105, 11567, 0.125, 32.75, 25.41, 2, 'Sainsburys Castle Vale', '2012-12-20 16:52:00', 1, NULL),
(104, 79358, 0, 15.1, 10.64, 1, 'Shell Corley North', '2012-12-18 07:38:00', 1, NULL),
(106, 79430, 0, 62.01, 47.37, 1, 'Tesco Petrol Station', '2012-12-21 11:36:00', 1, NULL),
(107, 79726, 0.25, 51.57, 40.01, 1, 'Sainsbury''s Superstore', '2013-01-05 15:49:00', 1, NULL),
(108, 11894, 0, 37.9, 29.4, 2, 'Sainsburys Castle Vale', '2013-01-15 16:17:00', 1, NULL),
(109, 80111, 0, 62.65, 48.23, 1, 'Sainsbury''s Castle Vale', '2013-01-21 08:02:00', 1, NULL),
(110, 12183, 0.125, 15, 11.55, 2, 'Sainsburys Castle Vale', '2013-01-23 16:19:00', 1, NULL),
(111, 80487, 0, 62.09, 47.43, 1, 'Sainsburys Castle Vale', '2013-01-29 16:15:00', 1, NULL),
(112, 80892, 0, 20.03, 13.92, 1, 'Shell Corley Fct S', '2013-02-05 18:01:00', 1, NULL),
(113, 80949, 0.125, 54.22, 41.11, 1, 'Sainsburys Castle Vale', '2013-02-06 16:20:00', 1, NULL),
(114, 12499, 0, 37.48, 28.2, 2, 'Sainsburys Castle Vale', '2013-02-11 17:12:00', 1, NULL),
(115, 12780, 0.125, 13.75, 10.19, 2, 'Tesco Rugby', '2013-02-16 19:36:00', 1, NULL),
(116, 81341, 0, 65.05, 49.22, 1, 'Sainsburys Castle Vale', '2013-02-19 16:29:00', 1, NULL),
(117, 81706, 0, 60.09, 44.22, 1, 'Sainsburys Castle Vale', '2013-02-26 16:25:00', 1, NULL),
(118, 13137, 0, 36.01, 25.74, 2, 'Shell Daventry', '2013-02-28 17:49:00', 1, NULL),
(124, 82308, 0.25, 53.96, 39.13, 1, 'Sainsburys Castle Vale', '2013-03-08 13:14:00', 1, NULL),
(125, 82516, 0.25, 55.96, 39, 1, 'BP Roundswell ', '2013-03-12 10:42:00', 1, NULL),
(126, 13513, 0, 40.07, 29.06, 2, 'Sainsburys Castle Vale', '2013-03-12 16:19:00', 1, NULL),
(123, 82002, 0.25, 48, 34.81, 1, 'Tesco Cheltenham ', '2013-03-02 12:12:00', 1, NULL),
(127, 82972, 0, 20, 14.4, 1, 'Texaco Tile Cross', '2013-03-15 08:10:00', 1, NULL),
(128, 83085, 0, 62.06, 46.07, 1, 'Asda Rugby', '2013-03-16 15:50:00', 1, NULL),
(129, 83457, 0, 66.89, 48.5, 1, 'BP Clock Service', '2013-03-22 08:00:00', 1, NULL),
(130, 83765, 0.25, 52.99, 39.28, 1, 'Sainsbury''s Superstore', '2013-03-29 09:33:00', 1, NULL),
(131, 13922, 0, 37.04, 27.66, 2, 'Sainsburys Castle Vale', '2013-04-02 17:22:00', 1, NULL),
(132, 14217, 0, 31.56, 23.22, 2, 'BP Perry Barr', '2013-04-09 20:25:00', 1, NULL),
(133, 84359, 0, 61.06, 45.6, 1, 'Sainsburys Castle Vale', '2013-04-11 15:23:00', 1, NULL),
(134, 84753, 0, 59.02, 44.41, 1, 'Sainsburys Castle Vale', '2013-04-17 12:13:00', 1, NULL),
(139, 85480, 0, 62.05, 46, 1, 'Texaco Tile Cross', '2013-05-01 08:08:00', 1, NULL),
(136, 85123, 0, 61, 46.25, 1, 'Sainsburys Castle Vale', '2013-04-22 15:37:00', 1, NULL),
(138, 14824, 0, 25.02, 18, 2, 'BP Great Barr', '2013-04-26 06:36:00', 1, 1.329),
(140, 15044, 0, 35.05, 25.79, 2, 'BP Paddocks', '2013-05-01 18:49:00', 1, NULL),
(164, 85858, 0, 61.69, 46.07, 1, 'BP Paddocks', '2013-05-05 13:38:00', 1, NULL),
(165, 60580, 0.5, 20, 15.16, 0, 'Shell Isleworth', '2013-05-08 20:37:00', 21, NULL),
(166, 86236, 0, 62.07, 47.78, 1, 'Sainsburys Castle Vale', '2013-05-14 08:38:00', 1, NULL),
(167, 15319, 0, 36.29, 28.11, 2, 'Sainsburys Castle Vale', '2013-05-20 06:18:00', 1, NULL),
(168, 81083, 0.25, 20, 14.5, 13, 'Thornton Heath London Road Express', '2013-05-21 06:31:00', 20, NULL),
(169, 86609, 0, 60.96, 45.19, 1, '-', '2013-05-22 17:15:00', 1, NULL),
(218, 15819, 0, 36.02, 27.52, 2, '-', '2013-05-28 15:09:00', 1, NULL),
(219, 81180, 0.25, 20, 14.5, 13, 'Thornton Heath London Road Express', '2013-05-30 06:20:00', 20, NULL),
(220, 86085, 0, 63.75, 47.26, 1, 'Brampton Hut Connect', '2013-05-27 19:49:00', 1, NULL),
(221, 16131, 0, 20, 15.28, 2, 'Sainsbury''s Castle Vale', '2013-06-03 15:28:00', 1, NULL),
(222, 16291, 0, 40.21, 30.03, 2, 'B P Clock Filling Station', '2013-06-07 07:02:00', 1, NULL),
(223, 87479, 0, 20, 14.72, 1, 'Shell Towcester', '2013-06-08 17:18:00', 1, NULL),
(224, 81240, 0.25, 15, 10.57, 13, '', '2013-06-05 07:36:00', 20, NULL),
(225, 81333, 0.375, 20, 14.4, 13, 'Thornton Heath London Road Express', '2013-06-11 06:08:00', 20, NULL),
(226, 87590, 0, 23.46, 17.77, 1, 'Tile Cross SSTN', '2013-06-12 06:56:00', 1, NULL),
(227, 87800, 0, 62.35, 47.27, 1, 'Sainsbury''s Castle Vale', '2013-06-14 10:19:00', 1, NULL),
(228, 81445, 0.25, 22, 15.84, 13, 'West Norwood Service Station', '2013-06-19 06:47:00', 20, NULL),
(229, 88185, 0.125, 51.04, 38.12, 1, 'Shell Web Ellis, Rugby', '2013-06-23 16:43:00', 1, NULL),
(231, 16888, 0, 20.02, 14.95, 2, 'Shell Web Ellis, Rugby', '2013-06-24 18:06:00', 1, NULL),
(232, 81546, 0.125, 15, 11.04, 13, 'Thornton Heath London Road Express', '2013-06-26 16:14:00', 20, NULL),
(233, 17044, 0, 36.01, 27.51, 2, 'Sainsbury''s Castle Vale', '2013-06-28 17:44:00', 1, NULL),
(234, 87044, 0.125, 58.25, 43.18, 1, 'Roade Service Station', '2013-06-30 12:01:00', 1, NULL),
(235, 88888, 0, 62.22, 46.47, 1, 'Shell Webb Ellis', '2013-07-11 17:49:00', 1, NULL),
(236, 17556, 0, 15.06, 11, 2, 'Total UK Ltd', '2013-07-24 07:23:00', 1, NULL),
(237, 89200, 0, 30.04, 21.94, 1, 'Total UK Ltd', '2013-07-21 14:58:00', 1, NULL),
(238, 17631, 0, 37.01, 27.23, 2, 'BP Connect', '2013-07-26 07:25:00', 1, 1.36),
(239, 90338, 0, 63.86, 47.06, 1, 'Asda Rugby', '2013-08-10 10:09:00', 1, NULL),
(240, 18384, 0.125, 33.34, 24, 2, 'Texaco', '2013-08-21 16:36:00', 1, NULL),
(241, 18659, 0, 37.25, 27.21, 2, 'Tesco Rugby', '2013-09-06 07:16:00', 1, NULL),
(242, 92455, 0, 61.63, 45.02, 1, 'Tesco Rugby', '2013-09-15 11:47:00', 1, NULL),
(243, 18954, 0, 39.5, 28.85, 2, 'Tesco Stores Ltd', '2013-09-17 17:41:00', 1, NULL),
(244, 93136, 0, 15.06, 10, 1, 'Shell Station', '2013-09-27 07:15:00', 1, NULL),
(245, 93400, 0, 20.07, 15.45, 1, 'Sainsbury''s Weedon Road', '2013-09-28 13:08:00', 1, NULL),
(246, 19300, 0, 15.03, 10.23, 2, 'Shell Corley North ', '2013-09-27 08:13:00', 1, NULL),
(247, 19663, 0, 36.35, 28.2, 2, 'Sainsbury''s Castle Vale', '2013-10-11 13:51:00', 1, NULL),
(248, 95898, 0.125, 52.91, 40.73, 1, 'Sainsbury''s Weedon Road', '2013-10-13 16:06:00', 1, NULL),
(249, 19972, 0, 13.25, 10.12, 2, 'Texaco Service Station', '2013-10-15 17:36:00', 1, NULL),
(250, 94265, 0, 62.11, 47.81, 1, 'Tesco Stores Ltd', '2013-10-19 16:05:00', 1, NULL),
(251, 94625, 0, 63.27, 47.93, 1, 'Texaco', '2013-10-25 16:28:00', 1, NULL),
(252, 20385, 0, 37.07, 28.54, 2, 'Tesco Rugby', '2013-10-28 07:30:00', 1, NULL),
(253, 94985, 0, 62.68, 49.01, 1, 'Tesco Stores Ltd', '2013-11-05 19:03:00', 1, NULL),
(254, 20788, 0, 34.2, 25.03, 2, 'Shell Station', '2013-11-10 15:50:00', 1, NULL),
(255, 62250, 0, 20.08, 15.7, 16, 'Tesco Stores Ltd', '2013-11-19 18:08:00', 1, NULL),
(256, 96105, 0, 63.69, 49.03, 1, 'Shell Rugby', '2013-11-29 19:07:00', 1, NULL),
(257, 21783, 0, 35.02, 27.17, 2, 'Tesco Stores Ltd', '2013-12-04 18:33:00', 1, NULL),
(258, 96990, 0.25, 50.87, 39.77, 1, 'Sainsbury''s Superstore', '2013-12-15 14:09:00', 1, NULL),
(259, 97410, 0.25, 52.46, 41.34, 1, 'Sainsbury''s Superstore', '2013-12-22 16:02:00', 1, NULL),
(260, 97722, 0.125, 55.11, 43.09, 1, 'Tesco Stores Ltd', '2014-01-05 17:20:00', 1, NULL),
(261, 22156, 0, 37.09, 29, 2, 'Tesco Stores Ltd', '2014-01-09 18:04:00', 1, NULL),
(262, 91843, 0, 59.01, 45.78, 1, 'Tesco Stores Ltd', '2014-01-12 17:15:00', 1, 2.25),
(263, 99100, 0, 68.27, 48.8, 1, 'BP Rothershorpe North', '2014-01-26 16:19:00', 1, NULL),
(264, NULL, 0, 36.9, 28.41, 2, 'BP Paddocks', '2014-01-26 17:09:00', 1, NULL),
(265, 23211, 0, 36.23, 28.55, 2, 'Tesco Rugby', '2014-03-10 17:30:00', 1, NULL),
(266, 103000, 0, 60.65, 46.69, 1, 'BP Express Six Ways', '2014-03-14 18:13:00', 1, NULL),
(267, NULL, 0, 20, 15.04, 1, 'BP Leicester', '2014-03-29 15:48:00', 1, NULL),
(268, 102864, 0, 45.86, 36.14, 1, 'Tesco Rugby', '2014-04-05 15:37:00', 1, NULL),
(269, 23529, 0, 39.4, 30.57, 2, 'BP Express Waterlinks', '2014-04-09 17:52:00', 1, NULL),
(270, 107400, 0, 55, 43, 1, 'Tesco Rugby', '2014-06-23 18:33:00', 1, NULL),
(271, 24646, 0, 19.99, 15.51, 2, 'Shell Web Ellis', '2014-06-22 12:09:00', 1, NULL),
(272, 24868, 0, 36.81, 28.56, 2, 'Tesco Rugby', '2014-07-02 11:05:00', 1, NULL),
(273, 107861, 0, 57.82, 44.86, 1, 'Tesco Rugby', '2014-07-06 13:42:00', 1, NULL),
(274, 108120, 0, 60, 46.55, 1, 'Sainsbury''s Castle Vale', '2014-07-17 18:01:00', 1, NULL),
(275, 108254, 0, 63.36, 48.4, 1, 'Tesco Rugby', '2014-07-25 07:28:00', 1, NULL),
(276, 25552, 0, 33.76, 25.4, 2, 'Shell Stratford-Upon-Avon', '2014-07-26 17:44:00', 1, NULL),
(277, 107000, 0, 63.45, 49.61, 1, 'Tesco Rugby', '2014-06-16 18:16:00', 1, NULL),
(278, 26130, 0, 31.57, 24.3, 2, 'Texaco Ash Motor Services', '2014-08-20 18:15:00', 1, NULL),
(279, 109503, 0.25, 46.86, 36.93, 1, '', '2014-08-08 10:37:00', 1, NULL),
(280, 111118, 0, 64.05, 48.56, 1, 'BP HKS Mill Lane', '2014-09-14 12:42:00', 1, NULL),
(281, 26907, 0, 36.57, 28.37, 2, 'BP Paddocks Rugby', '2014-09-19 18:36:00', 1, NULL),
(282, 27687, 0.125, 35.1, 27.44, 2, 'BP Express Waterlinks', '2014-10-10 07:53:00', 1, NULL),
(283, 108000, 0, 58.81, 45.98, 1, 'BP Paddocks Rugby', '2014-10-12 16:16:00', 1, NULL),
(286, 28127, 0, 10.03, 7.97, 2, 'BP Paddocks, Rugby', '2014-10-24 16:51:00', 1, NULL),
(285, 113251, 0, 59, 46.86, 1, 'BP Paddocks, Rugby', '2014-10-27 09:02:00', 1, NULL),
(287, 28217, 0, 30.8, 25.06, 2, 'Tesco Rugby', '2014-11-03 07:00:00', 1, NULL),
(289, 114000, 0, 55.54, 45.19, 1, 'Tesco Rugby', '2014-11-05 18:00:00', 1, NULL),
(290, 28798, 0, 32.64, 27, 2, 'Tesco Rugby', '2014-11-12 18:36:00', 1, NULL),
(291, 118700, 0, 55.75, 46.11, 1, 'Tesco Rugby', '2014-11-15 15:20:00', 1, NULL),
(292, 28774, 0.125, 32.64, 27, 2, 'Wm Morrisons Small Heath', '2014-11-19 14:13:00', 1, NULL),
(293, 29009, 0.125, 27.47, 22.91, 2, 'Sainsbury''s Castle Vale', '2014-11-22 16:24:00', 1, NULL),
(294, 114993, 0, 54.9, 45.41, 1, 'Teach Rugby', '2014-11-21 18:26:00', 1, NULL),
(295, 93793, 0, 85, 64.98, 17, 'Sainsbury''s Castle Vale', '2014-11-26 18:44:00', 1, NULL),
(296, 94090, 0.25, 73.19, 56.78, 17, 'BP Paddocks, Rugby', '2014-11-30 16:46:00', 1, NULL),
(297, 115365, 0.125, 25.02, 21.04, 1, 'Tesco Rugby', '2014-12-03 19:24:00', 1, NULL),
(298, 115535, 0, 53.4, 47.38, 1, 'Asda Coventry', '2014-12-15 08:09:00', 1, NULL),
(299, 95359, 0.125, 82.38, 68.14, 17, 'BP Six Ways', '2014-12-27 17:43:00', 1, NULL),
(300, 95612, 0.25, 60.87, 50.35, 17, 'BP Paddocks, Rugby', '2015-01-04 17:38:00', 1, NULL),
(301, 116018, 0, 50.85, 47.57, 1, 'Tesco Rugby', '2015-01-06 18:37:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
`id` bigint(20) NOT NULL,
  `reg_plate` varchar(10) NOT NULL,
  `location` varchar(30) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `source` varchar(100) NOT NULL,
  `when` datetime NOT NULL,
  `vehicle_details` varchar(50) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `media_url` varchar(100) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `reg_plate`, `location`, `tags`, `source`, `when`, `vehicle_details`, `user_id`, `created`, `updated`, `media_url`) VALUES
(6, 'P16 EGO', 'Chester Road Birmingham', 'undercutting', '', '2009-04-09 03:08:03', '', 0, '2009-04-09 03:08:03', '0000-00-00 00:00:00', NULL),
(7, 'DU07 AXC', 'Newbold Road Rugby', 'roundabout', '', '2009-04-09 03:11:35', '', 0, '2009-04-09 03:11:35', '0000-00-00 00:00:00', NULL),
(8, 'BU54MXT', 'Corley services', 'No brakelight', '', '2009-04-17 09:34:00', '', 0, '2009-04-17 09:34:00', '0000-00-00 00:00:00', NULL),
(9, 'R959HPN', 'M6 J3', 'Undertaking', '', '2009-04-17 09:36:40', '', 0, '2009-04-17 09:36:40', '0000-00-00 00:00:00', NULL),
(10, 'W694EOL', 'M6 J3', 'Lane hog', '', '2009-04-17 08:38:00', '', 0, '2009-04-17 08:38:00', '0000-00-00 00:00:00', NULL),
(11, 'GN07CHY', 'M6 Castle Bromwich', 'Lane hopping', '', '2009-04-18 05:12:28', '', 0, '2009-04-18 05:12:00', '2009-05-14 00:15:31', NULL),
(12, 'WU52 GXC', 'Aston Lane', 'turning in the road, stopping traffic', '', '2009-05-06 16:46:00', 'K&J Logistics Ltd truck', 0, '2009-05-14 00:08:10', '2009-05-14 00:08:10', NULL),
(13, 'BJ09LCT', 'M1 Northampton', 'Undertaking, lanehopping', '', '2009-05-13 15:40:00', 'White Audi ', 0, '2009-05-14 00:09:00', '2009-05-14 00:12:47', NULL),
(14, 'FX52GZW', 'Watford Gap', 'lanehogging', '', '2009-05-13 16:05:00', 'White van', 0, '2009-05-14 00:10:15', '2009-05-14 00:10:15', NULL),
(15, 'AO02 ZCN', 'M6 J3', 'reckless driving, undercutting,', '', '2012-08-20 07:30:00', 'Blue Peugot', 0, '2012-08-20 00:48:26', '2012-08-20 00:48:26', NULL),
(16, 'VN08SKW', 'M6 J5 roundabout', 'tailgating, reckless driving', '', '2012-08-20 07:45:00', 'Audi', 0, '2012-08-20 00:49:55', '2012-08-20 00:49:55', NULL),
(18, 'Q485OOT', 'M6 J4 S', 'Lane hopping', '', '2012-08-22 15:47:00', 'Toyota Puckup', 0, '2012-08-22 15:47:55', '2012-08-22 15:47:55', NULL),
(19, 'MM61 CCJ', 'M1 J18 S', 'Lanehopping', '', '2012-08-24 16:24:00', 'Mercedes, gun metal', 0, '2012-08-24 16:25:30', '2012-08-24 16:25:30', NULL),
(20, 'Mf57xlx', 'Northampton General Hospital', 'Lane hopping, overtaking, undertaking, driving on the wrong side of the road', '', '2012-08-29 08:38:00', 'A4 Black', 0, '2012-08-29 08:41:34', '2012-08-29 08:41:34', NULL),
(21, 'Y196CDA', 'Bromford Lane Island', 'Lane Barging', '', '2013-06-06 08:06:00', 'Ford Focus', 0, '2013-06-06 08:17:25', '2013-06-06 08:17:25', NULL),
(22, 'T49LBA', 'NN67TS', 'Noise pollution', '', '2013-07-07 15:29:00', 'Honda Civic', 1, '2013-07-07 15:30:44', '2013-07-07 15:30:44', NULL),
(23, 'V424LDA', 'NN67TS', 'Noise', '', '2013-07-12 12:09:00', 'Red go-kart', 1, '2013-07-18 09:10:52', '2013-07-18 09:10:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE IF NOT EXISTS `trains` (
`id` int(11) unsigned NOT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `ticket_class` int(11) DEFAULT NULL,
  `ticket_type` int(11) DEFAULT NULL,
  `restrictions` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `origin_id`, `destination_id`, `ticket_class`, `ticket_type`, `restrictions`, `price`, `created`, `user_id`) VALUES
(1, 1, 2, 1, 3, 1, 41.4, '2014-07-28 07:02:00', 1),
(2, 1, 2, 1, 2, 1, 7.2, '2014-08-04 07:03:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `train_stations`
--

CREATE TABLE IF NOT EXISTS `train_stations` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `train_stations`
--

INSERT INTO `train_stations` (`id`, `name`, `code`) VALUES
(1, 'Rugby', 'RUG'),
(2, 'Birmingham New Street', 'BIR'),
(3, 'London Euston', 'EUS');

-- --------------------------------------------------------

--
-- Table structure for table `train_ticket_class`
--

CREATE TABLE IF NOT EXISTS `train_ticket_class` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `train_ticket_class`
--

INSERT INTO `train_ticket_class` (`id`, `name`) VALUES
(1, 'Standard'),
(2, 'First Class');

-- --------------------------------------------------------

--
-- Table structure for table `train_ticket_restrictions`
--

CREATE TABLE IF NOT EXISTS `train_ticket_restrictions` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `train_ticket_restrictions`
--

INSERT INTO `train_ticket_restrictions` (`id`, `name`) VALUES
(1, 'Virgin Only');

-- --------------------------------------------------------

--
-- Table structure for table `train_ticket_type`
--

CREATE TABLE IF NOT EXISTS `train_ticket_type` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `train_ticket_type`
--

INSERT INTO `train_ticket_type` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Day Return'),
(3, 'Week');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `home_postcode` varchar(10) DEFAULT '',
  `work_postcode` varchar(10) DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `updated`, `email`, `home_postcode`, `work_postcode`) VALUES
(1, 'Si', 'b8c20ab7c9a6372195946633d669bc9aa41753f9', 'admin', '2012-01-19 21:50:53', '2012-01-19 21:50:53', 'simon.jobling@gmail.com', '', ''),
(4, 'guest', '588688b6f8c15922fc51d8a930b63983d8b27476', 'admin', '2012-03-20 21:38:41', '2012-03-20 21:38:41', 'guest@unstyled.com', '', ''),
(5, 'si2', '588688b6f8c15922fc51d8a930b63983d8b27476', 'Member', '2012-10-13 08:35:21', '2012-10-13 08:35:21', 'simon.jobling+2@gmail.com', 'NN6 7TS', 'B24 9FD'),
(6, 'si3', '588688b6f8c15922fc51d8a930b63983d8b27476', 'Member', '2012-10-13 08:36:31', '2012-10-13 08:36:31', 'simon.jobling+3@gmail.com', '', ''),
(7, 'si4', '588688b6f8c15922fc51d8a930b63983d8b27476', 'Member', '2012-10-13 08:38:23', '2012-10-13 08:38:23', 'simon.jobling+4@gmail.com', '', ''),
(21, 'Brussells', 'd8867090355e6af43c9e060aada7d2c3215d2705', 'Member', '2013-05-07 07:27:24', '2013-05-07 07:27:24', 'brussells78@gmail.com', '', ''),
(20, 'mrqwest', 'da9a7fb84d9c7f6463defea8f09d5ecb47ac151c', 'Member', '2013-05-05 12:35:26', '2013-05-05 12:35:26', 'mrqwest@gmail.com', '', ''),
(10, 'si3', '3789c90db2a04d1089d3eeedb04aff7c9a89a210', 'Member', '2012-10-13 08:41:11', '2012-10-13 08:41:11', '', '', ''),
(11, 'si45', '3789c90db2a04d1089d3eeedb04aff7c9a89a210', 'Member', '2012-10-15 19:56:19', '2012-10-15 19:56:19', '', '', ''),
(12, 'si5', 'f1cfb8c90d2b222ad7c224166f7c36854cfba918', 'Member', '2012-10-15 19:57:55', '2012-10-15 19:57:55', 'simon.jobling@gmail.com', '', ''),
(13, 'si6', '2f2423aa84bdd55e2fd4b16485b6c115f88ec133', 'Member', '2012-10-15 20:00:24', '2012-10-15 20:00:24', 'simon.jobling+6@gmail.com', '', ''),
(14, 'si10', '16c396128b6894a35d7713bdbb384d4c51b32978', 'Member', '2012-10-15 20:15:57', '2012-10-15 20:15:57', 'simon.jobling+10@gmail.com', '', ''),
(15, 'amy', 'f14e224b727413524609c3240eeb60b1c86280c6', 'Member', '2012-11-13 10:27:21', '2012-11-13 10:27:21', 'amy@unstyled.com', '', ''),
(16, 'Berns', '588688b6f8c15922fc51d8a930b63983d8b27476', 'Member', '2012-11-13 12:40:04', '2012-11-13 12:40:04', 'bernard.luutu@premiumchoice.co.uk', '', ''),
(17, 'mike', '7064332ae21a8f484ee3baa895b2dbca201a7195', 'Member', '2012-11-28 14:42:15', '2012-11-28 14:42:15', 'mike@buzz50.com', '', ''),
(18, 'ste', '259eb07ca8f911a0464792f38731665c16288b55', 'Member', '2012-11-28 16:12:19', '2012-11-28 16:12:19', 'sminshull@hotmail.com', '', ''),
(19, 'sitest1', '588688b6f8c15922fc51d8a930b63983d8b27476', 'Member', '2013-05-05 12:04:55', '2013-05-05 12:04:55', 'test@unstyled.com', '', ''),
(22, 'Steve', 'eff5d359f7a74b2db2e8e04f24872a6e1b33496e', 'Member', '2013-06-06 08:13:02', '2013-06-06 08:13:02', 'steven.mills73@sky.com', '', ''),
(23, 'test10', 'test10', 'Member', '2014-01-31 18:02:16', '2014-01-31 18:02:16', 'test1@test.com', '', ''),
(24, 'test11', 'test11', 'Member', '2014-01-31 18:04:09', '2014-01-31 18:04:09', '11@test.com', '', ''),
(25, 'test12', 'test12', 'Member', '2014-01-31 18:04:34', '2014-01-31 18:04:34', '12@test.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
`id` bigint(20) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `registration` varchar(10) DEFAULT NULL,
  `fuel_type` varchar(1) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` varchar(1) NOT NULL,
  `tank_capacity` float DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `manufacturer`, `model`, `registration`, `fuel_type`, `user_id`, `created`, `updated`, `status`, `tank_capacity`) VALUES
(1, 'Honda', 'Civic', 'BF57DDL', '', 1, '2012-01-15 11:53:16', '2012-03-20 21:57:22', '', NULL),
(2, 'Smart', 'Cabriolet', 'BV61LUO', '', 1, '2012-01-19 15:02:43', '2012-03-20 22:00:55', '', NULL),
(3, 'Smart', 'Pulse', 'BJ58 VFF', '', 4, '2012-03-20 21:56:04', '2012-03-20 21:56:04', '', NULL),
(13, 'Ford', 'Focus', 'DK53 FBY', 'D', 20, '2013-05-05 14:42:25', '2013-05-05 14:42:25', '', 1.8),
(5, 'Peugeot', '107', 'YH11 JVM', 'U', 1, '2012-09-19 07:04:19', '2012-12-12 22:43:18', 'R', NULL),
(6, 'Mercedes', 'E200k', 'Lb02hnk', 'U', 16, '2012-11-13 12:41:01', '2012-11-13 12:41:01', '', NULL),
(14, 'Volkswagen', 'Passat', 'S323 TKK', 'U', 21, '2013-05-07 07:28:08', '2013-05-07 07:28:08', '', 1.8),
(15, 'Renault', 'Scenic', 'ET03 KDZ', 'D', 20, '2013-05-11 21:02:26', '2013-05-11 21:02:26', '', 1800),
(10, 'Ford', 'Fiesta', 'DE04DNF', 'U', 17, '2012-11-28 14:43:45', '2012-11-28 14:43:45', '', NULL),
(11, 'Renault', 'Megane 1.9 DCI', 'FD06 USN', 'D', 18, '2012-11-28 16:12:40', '2012-11-28 16:12:40', '', 69),
(16, 'Peugeot ', '106', 'Wc01', 'U', 1, '2013-11-19 18:08:25', '2013-11-19 18:08:25', '', NULL),
(17, 'Nissan', 'Pathfinder', 'NA57 OMZ', 'D', 1, '2014-11-27 15:12:49', '2014-11-27 15:12:49', '', 65);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_parks`
--
ALTER TABLE `car_parks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petrol_stations`
--
ALTER TABLE `petrol_stations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_stations`
--
ALTER TABLE `train_stations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_ticket_class`
--
ALTER TABLE `train_ticket_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_ticket_restrictions`
--
ALTER TABLE `train_ticket_restrictions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_ticket_type`
--
ALTER TABLE `train_ticket_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`,`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_parks`
--
ALTER TABLE `car_parks`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `petrol_stations`
--
ALTER TABLE `petrol_stations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=302;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `train_stations`
--
ALTER TABLE `train_stations`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `train_ticket_class`
--
ALTER TABLE `train_ticket_class`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `train_ticket_restrictions`
--
ALTER TABLE `train_ticket_restrictions`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `train_ticket_type`
--
ALTER TABLE `train_ticket_type`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
