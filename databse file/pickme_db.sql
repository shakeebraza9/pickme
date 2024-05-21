-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 08:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickme_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_email` varchar(500) NOT NULL,
  `acc_pass` varchar(255) NOT NULL,
  `acc_type` int(11) NOT NULL,
  `acc_role` int(11) NOT NULL,
  `acc_grp` int(11) NOT NULL DEFAULT 1,
  `acc_created` datetime NOT NULL,
  `acc_id_str` varchar(255) NOT NULL,
  `acc_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `acc_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `acc_name`, `acc_email`, `acc_pass`, `acc_type`, `acc_role`, `acc_grp`, `acc_created`, `acc_id_str`, `acc_timestamp`, `acc_session`) VALUES
(1, 'Asad Raza', 'ibms@yahoo.com', 'q5nHoMRcNlRPZxN7_8cvasgWugX632rsYn4LjQUgrqM', 1, 6, 1, '2013-09-26 07:24:28', '', '2020-03-21 11:23:08', 'ppfb5hq85s469hbleashphdo1i'),
(2, 'Admin', 'admin', '74z254w2w2w274z3a4', 1, 0, 1, '2013-09-27 00:00:00', '', '2024-01-24 11:25:03', 'mpboonalfq9ailj1a44e6r6tdc'),
(5, 'asad raza 12', 'asad@yahoo.com', 'q5nHoMRcNlRPZxN7_8cvasgWugX632rsYn4LjQUgrqM', 0, 3, 1, '2014-12-27 09:11:00', '', '2016-08-10 13:09:24', 'mv6b7rc3ruargr3p77d80mb4l4'),
(10, 'Ghayoor', 'sonushaikh110@gmail.com', 'e7fqTg7jDtHbXEQxDFCGEadG6lochM_hS8yJ9CP-m6M', 1, 6, 1, '2015-05-27 14:30:54', '', '2016-06-03 13:48:48', '881e4a1f267c0bddd5e1ab78b1628d2e'),
(11, 'RM', 'reza@realmacways.com', 'B_ZP8g-CDvZRgsDPdypI0y2KViZ-3ErhsQUvp3m0UVU', 1, 6, 1, '2016-07-28 12:38:21', '', '2018-09-13 05:47:30', '42114479571226086d0c26746c169c9d'),
(14, 'test', 'test@test', '', 0, 0, 1, '0000-00-00 00:00:00', '0', '2016-12-19 18:22:05', ''),
(15, 'test', 'test@testtt', '', 0, 0, 1, '0000-00-00 00:00:00', '', '2016-12-19 18:42:15', ''),
(16, 'testtttt', 'testtttt@test@ADAD', '', 0, 0, 1, '0000-00-00 00:00:00', '', '2016-12-19 18:44:39', ''),
(17, 'testing123', 'testing123@email.com', '', 12, 10, 1, '2016-12-19 00:00:00', '', '2016-12-19 18:45:37', ''),
(18, 'erik', 'erik@inleed.se', 'm5v594f4', 1, 7, 1, '2019-03-18 12:54:01', '', '2019-03-18 06:56:29', '1fa79f5a49e18820f3c34883c03befac');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_detail`
--

CREATE TABLE `accounts_detail` (
  `id_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `setting_name` varchar(250) DEFAULT NULL,
  `setting_val` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_prm_grp`
--

CREATE TABLE `accounts_prm_grp` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `permission` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_user`
--

CREATE TABLE `accounts_user` (
  `acc_id` int(11) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_email` varchar(500) NOT NULL,
  `acc_pass` varchar(255) NOT NULL,
  `acc_type` int(11) NOT NULL,
  `acc_role` int(11) NOT NULL,
  `acc_profile` text NOT NULL,
  `user_typeee` varchar(255) NOT NULL,
  `acc_created` datetime NOT NULL,
  `acc_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `acc_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts_user`
--

INSERT INTO `accounts_user` (`acc_id`, `acc_name`, `acc_email`, `acc_pass`, `acc_type`, `acc_role`, `acc_profile`, `user_typeee`, `acc_created`, `acc_timestamp`, `acc_session`) VALUES
(42, 'Muhammad Shakeeb Raza', 'man411210@gmail.com', '44y264v2v2x2', 1, 0, 'uploads/profile/Realistic-Male-Profile-Picture (1).webp', 'Client', '2023-08-19 16:33:44', '2023-08-30 10:10:42', ''),
(43, 'aliz', 'editor@gmail.com', '44y264v2v2x2', 1, 0, 'uploads/profile/Realistic-Male-Profile-Picture.webp', 'Editor', '2023-08-19 16:36:06', '2023-08-22 08:32:27', ''),
(44, 'Shakeeb', 'user@gmail.com', '44y264v2v2x2', 1, 0, 'uploads/profile/ezgif.com-webp-to-jpg (1).jpg', 'Client', '2023-08-21 08:03:35', '2023-12-07 11:49:31', ''),
(45, 'jawwad Rafique', 'jawwad.rafique007@gmail.com', '44y264v2v2x2', 1, 0, '', 'Client', '2023-08-21 09:47:55', '2023-08-21 07:47:55', ''),
(46, 'hammad', 'hammad@im.com.pk', '44y264v2v2', 1, 0, 'uploads/profile/beautiful-woman-drinking-cup-coffee.webp', 'Client', '2023-08-21 13:20:19', '2023-09-23 06:51:57', ''),
(47, 'tafheem', 'tafeem@gmail.com', '44y264v2v2', 1, 0, '', 'Editor', '2023-08-21 13:48:23', '2023-08-21 11:48:23', ''),
(63, 'Muhammad Shakeeb Raza', 'supermanman@gmail.com', '9403k5u2v28424a474u234g524', 1, 0, '', 'Client', '2023-08-21 14:52:40', '2023-08-21 12:52:40', ''),
(64, 'Muhammad Shakeeb Raza', 'supermanman0300@gmail.com', '9403k5u2v284i5k554b434h584', 1, 0, '', 'Client', '2023-08-21 14:56:15', '2023-08-21 12:56:15', ''),
(67, 'Muhammad Shakeeb Raza', 'thisthis@gmail.com', '44y264v2v2x2', 1, 0, '', 'Client', '2023-08-21 15:11:25', '2023-08-21 13:11:25', ''),
(68, 'shakeeb', 'thisss@gmail.com', '44y264v2v2x2', 1, 0, '', 'Client', '2023-08-21 15:22:06', '2023-08-21 13:22:06', ''),
(69, 'jawwad Rafique', 'jawwad.rafique00@gmail.com', '44y264v2v2x2', 1, 0, '', 'Client', '2023-08-22 07:26:24', '2023-08-22 05:26:24', ''),
(70, 'shakeeb', 'shakesb@gmail.com', '44y264v2v2', 1, 0, '', 'Client', '2023-08-22 07:28:44', '2023-08-22 05:28:44', ''),
(71, 'Arish', 'arish@im.com.pk', '44y264v2v2', 1, 0, '', 'Client', '2023-08-22 10:26:21', '2023-08-22 08:26:21', ''),
(72, 'basit', 'basit@gmail.com', '44y264v2v2', 1, 0, '', 'Client', '2023-08-22 10:27:33', '2023-08-22 08:27:33', ''),
(73, 'basit1', 'basit@im.com.pk', '44y264v2v2x2', 1, 0, 'uploads/profile/image.png', 'Client', '2023-08-22 10:29:26', '2023-08-22 13:39:50', ''),
(74, 'demo', 'neyido3531@avidapro.com', '9403k5v2z203h574g503648424', 1, 0, '', 'Client', '2023-08-22 13:19:49', '2023-08-22 11:19:49', ''),
(75, 'Muhammad Shakeeb Raza', 'jabow67276@dusyum.com', '9403k5v2z264549484z2442444', 1, 0, '', 'Client', '2023-08-22 13:30:15', '2023-08-22 11:30:15', ''),
(76, 'saim', 'saim@gmail.com', '44y264v2v2', 1, 0, 'uploads/profile/instagram-icon.png', 'Client', '2023-08-23 08:20:36', '2023-08-23 07:04:58', ''),
(77, 'ahmed1', 'ahmed@gmail.com', '44y264v2v2', 1, 0, 'uploads/profile/Graphic_Design.png', 'Editor', '2023-08-23 08:22:51', '2023-08-23 06:43:02', ''),
(78, 'alizz', 'aliz@gmail.com', '44y264v2', 1, 0, '', 'Editor', '2023-08-23 13:17:05', '2023-09-24 15:55:24', ''),
(79, 'hammad', 'hammad9@im.com.pk', '44y264v2v2', 1, 0, 'uploads/profile/instagram-icon.png', 'Client', '2023-08-23 13:51:06', '2023-09-23 06:48:31', ''),
(80, 'Awais', 'usernew@gmail.com', '44y264v2v2x2', 1, 0, '', 'Client', '2023-08-24 08:01:15', '2023-08-24 06:01:15', ''),
(81, 'Arish Ali', 'arish@gmail.com', '44y264v2v2', 1, 0, 'uploads/profile/background.jpg', 'Client', '2023-08-24 10:52:42', '2023-08-24 11:03:13', ''),
(82, 'Muhammad Shakeeb Raza', 'nelew35339@horsgit.com', '9403l5y2r254g5i5j5t2o2i544', 1, 0, '', 'Client', '2023-09-05 14:15:09', '2023-09-05 12:15:09', ''),
(83, 'shakeeb', 'gaxiga8959@chambile.com', '9403l5y2r274a434c4x2t29444', 1, 0, '', 'Client', '2023-09-05 14:22:41', '2023-09-05 12:22:41', ''),
(84, 'Muhammad Shakeeb Raza', 'jiyit77092@nickolis.com', '9403l5y2s2t2h524i5w21434j5', 1, 0, '', 'Client', '2023-09-05 14:45:04', '2023-09-05 12:45:04', ''),
(85, 'hammad', 'khanhammad540@gmail.com', '9403l5y2s2u214k5h594645494', 1, 0, '', 'Client', '2023-09-05 14:46:07', '2023-09-05 12:46:07', ''),
(86, 'Muhammad Shakeeb Raza', 'yefod66225@picvw.com', '9403l5y2s2u234i5c494u23454', 1, 0, '', 'Client', '2023-09-05 14:46:37', '2023-09-05 12:46:37', ''),
(87, 'test', 'berohij476@gameszox.com', '9403l5y2s2v2747474u2o2h514', 1, 0, '', 'Client', '2023-09-05 14:51:49', '2023-09-05 12:51:49', ''),
(89, 'SA', 'subz_123@hotmail.com', '44y264v2', 1, 0, '', 'Client', '2023-09-24 17:44:03', '2023-09-24 15:44:58', ''),
(90, 'Man like shah', 'shah@gmail.com', '44y264v2', 1, 0, '', 'Editor', '2023-09-24 17:57:11', '2023-09-24 15:57:11', ''),
(91, 'burhan', 'basitabbas2001@gmail.com', '941344s2s2x224f5i584u2g554', 1, 0, '', 'Client', '2023-09-25 08:18:02', '2023-09-25 06:18:02', ''),
(93, 'shah mashuk', 'shahsharia@gmail.com', '941344s274w224h5747424a444', 1, 0, '', 'Client', '2023-09-25 21:53:00', '2023-09-25 19:53:00', ''),
(94, '2023-09-23', 'birthday', '941344u26464a4a4j564o23464', 1, 0, '', 'Client', '2023-09-27 09:41:12', '2023-09-27 07:41:12', ''),
(95, 'Birthday', 'burhan', '941344u2647484k56464x2i5g5', 1, 0, '', 'Client', '2023-09-27 09:45:03', '2023-09-27 07:45:03', ''),
(96, 'Birthday', 'mahad', '941344u274t254343413x29424', 1, 0, '', 'Client', '2023-09-27 10:05:21', '2023-09-27 08:05:21', ''),
(97, 'burhan', 'smartdentalcompliance@outlook.com', '94134484y2y294f56423v22424', 1, 0, '', 'Client', '2023-10-05 11:53:14', '2023-10-05 09:53:14', '');

--
-- Triggers `accounts_user`
--
DELIMITER $$
CREATE TRIGGER `insertion_for_temp_accounts_user` AFTER INSERT ON `accounts_user` FOR EACH ROW INSERT INTO temp_accounts_user
( acc_id, acc_id_str ) VALUES (  NEW.acc_id, NEW.acc_id )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_user_detail`
--

CREATE TABLE `accounts_user_detail` (
  `id_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `setting_name` varchar(250) DEFAULT NULL,
  `setting_val` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts_user_detail`
--

INSERT INTO `accounts_user_detail` (`id_detail`, `id_user`, `setting_name`, `setting_val`) VALUES
(479, 97, 'user_type', 'Client'),
(478, 97, 'account_type', 'Practice'),
(477, 97, 'country', 'UK'),
(476, 97, 'city', 'karachi'),
(475, 97, 'address', 'johar'),
(474, 97, 'phone', '03412012070'),
(473, 97, 'date_of_birth', ''),
(472, 97, 'type', ''),
(471, 97, 'gender', ''),
(470, 96, 'user_type', 'Client'),
(469, 96, 'account_type', 'Practice'),
(468, 96, 'country', 'UK'),
(467, 96, 'city', ''),
(466, 96, 'address', ''),
(465, 96, 'phone', '45456'),
(464, 96, 'date_of_birth', ''),
(463, 96, 'type', ''),
(462, 96, 'gender', ''),
(461, 95, 'user_type', 'Client'),
(460, 95, 'account_type', 'Practice'),
(459, 95, 'country', 'UK'),
(458, 95, 'city', ''),
(457, 95, 'address', ''),
(456, 95, 'phone', 'jawwad'),
(455, 95, 'date_of_birth', ''),
(454, 95, 'type', ''),
(453, 95, 'gender', ''),
(452, 94, 'user_type', 'Client'),
(451, 94, 'account_type', 'Practice'),
(450, 94, 'country', 'UK'),
(449, 94, 'city', ''),
(448, 94, 'address', ''),
(447, 94, 'phone', '45456'),
(446, 94, 'date_of_birth', ''),
(445, 94, 'type', ''),
(444, 94, 'gender', ''),
(443, 93, 'user_type', 'Client'),
(442, 93, 'account_type', 'Practice'),
(441, 93, 'country', 'UK'),
(440, 93, 'city', 'Barking'),
(439, 93, 'address', '124 Curzon Crescent'),
(438, 93, 'phone', '07852620807'),
(437, 93, 'date_of_birth', ''),
(436, 93, 'type', ''),
(435, 93, 'gender', ''),
(434, 92, 'country', ''),
(433, 92, 'city', ''),
(432, 92, 'post_code', ''),
(431, 92, 'address', ''),
(430, 92, 'phone', ''),
(429, 92, 'date_of_birth', ''),
(428, 91, 'user_type', 'Client'),
(427, 91, 'account_type', 'Practice'),
(426, 91, 'country', 'UK'),
(425, 91, 'city', 'fg'),
(424, 91, 'address', 'hno'),
(423, 91, 'phone', '45456'),
(422, 91, 'date_of_birth', ''),
(421, 91, 'type', ''),
(420, 91, 'gender', ''),
(419, 90, 'country', ''),
(418, 90, 'city', ''),
(417, 90, 'post_code', ''),
(416, 90, 'address', ''),
(415, 90, 'phone', ''),
(414, 90, 'date_of_birth', ''),
(413, 90, 'gender', 'male'),
(412, 78, 'country', ''),
(411, 78, 'city', ''),
(410, 78, 'post_code', ''),
(409, 78, 'address', ''),
(408, 78, 'phone', ''),
(407, 78, 'date_of_birth', ''),
(406, 89, 'country', 'UK'),
(405, 89, 'city', 'London'),
(404, 89, 'post_code', ''),
(403, 89, 'address', ''),
(402, 89, 'phone', '075217321421'),
(401, 89, 'date_of_birth', ''),
(391, 88, 'country', 'UK'),
(390, 88, 'city', 'London'),
(389, 88, 'post_code', ''),
(388, 88, 'address', '23 wood greem'),
(387, 88, 'phone', '07514243424'),
(386, 88, 'date_of_birth', ''),
(376, 79, 'country', ''),
(375, 79, 'city', ''),
(374, 79, 'post_code', ''),
(373, 79, 'address', ''),
(372, 79, 'phone', ''),
(371, 79, 'date_of_birth', ''),
(364, 77, 'country', 'Pakistan11'),
(363, 77, 'city', 'karachi1'),
(362, 77, 'post_code', ''),
(361, 77, 'address', 'gh g hjgjh1'),
(360, 77, 'phone', ''),
(359, 77, 'date_of_birth', ''),
(354, 87, 'user_type', 'Client'),
(353, 87, 'account_type', 'Practice'),
(352, 87, 'country', 'UK'),
(351, 87, 'city', 'karachi'),
(350, 87, 'address', 'asd'),
(349, 87, 'phone', '15165165121'),
(348, 87, 'date_of_birth', ''),
(347, 87, 'type', ''),
(346, 87, 'gender', ''),
(345, 86, 'user_type', 'Client'),
(344, 86, 'account_type', 'Practice'),
(343, 86, 'country', 'UK'),
(342, 86, 'city', 'fg'),
(341, 86, 'address', 'hno'),
(340, 86, 'phone', '45456'),
(339, 86, 'date_of_birth', ''),
(338, 86, 'type', ''),
(337, 86, 'gender', ''),
(336, 85, 'user_type', 'Client'),
(335, 85, 'account_type', 'Practice'),
(334, 85, 'country', 'UK'),
(333, 85, 'city', 'karachi'),
(332, 85, 'address', 'asd'),
(331, 85, 'phone', '6161616'),
(330, 85, 'date_of_birth', ''),
(329, 85, 'type', ''),
(328, 85, 'gender', ''),
(327, 84, 'user_type', 'Client'),
(326, 84, 'account_type', 'Practice'),
(325, 84, 'country', 'UK'),
(324, 84, 'city', 'fg'),
(323, 84, 'address', 'hno'),
(322, 84, 'phone', '45456'),
(321, 84, 'date_of_birth', ''),
(320, 84, 'type', ''),
(319, 84, 'gender', ''),
(318, 83, 'user_type', 'Client'),
(317, 83, 'account_type', 'Practice'),
(316, 83, 'country', 'UK'),
(315, 83, 'city', 'fg'),
(314, 83, 'address', 'hno'),
(313, 83, 'phone', '45456'),
(312, 83, 'date_of_birth', ''),
(311, 83, 'type', ''),
(310, 83, 'gender', ''),
(309, 82, 'user_type', 'Client'),
(308, 82, 'account_type', 'Practice'),
(307, 82, 'country', 'UK'),
(306, 82, 'city', 'fg'),
(305, 82, 'address', 'hno'),
(304, 82, 'phone', '45456'),
(303, 82, 'date_of_birth', ''),
(302, 82, 'type', ''),
(301, 82, 'gender', ''),
(300, 46, 'country', 'Pakistan11'),
(299, 46, 'city', 'karachi11'),
(298, 46, 'address', 'gh g hjgjh1'),
(297, 46, 'number', '1651111'),
(296, 44, 'country', 'Pakistan'),
(295, 44, 'city', 'fg'),
(294, 44, 'address', 'hnohh'),
(293, 44, 'number', '45456'),
(292, 42, 'country', 'Pakistann'),
(291, 42, 'city', 'Karachi'),
(290, 42, 'address', 'sheet 24 house 31/50'),
(289, 42, 'number', '03406095589');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `log_title` varchar(255) DEFAULT NULL,
  `ref_name` varchar(255) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `ref_user` varchar(255) DEFAULT NULL,
  `log_desc` text DEFAULT NULL,
  `log_ip` varchar(255) DEFAULT NULL,
  `log_browser` varchar(255) DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `log_title`, `ref_name`, `ref_id`, `ref_user`, `log_desc`, `log_ip`, `log_browser`, `log_time`) VALUES
(925, 'Added', 'Menu', 41, 'admin', 'Menu Add Successfully', '::1', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 <br />name : Google Chrome <br />version : 120.0.0.0 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|other)[/ ]', '2023-12-09 11:23:31'),
(926, 'Added', 'Captivategallery', 20, 'admin', 'captivategallery Add Successfully', '::1', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 <br />name : Google Chrome <br />version : 120.0.0.0 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|other)[/ ]', '2023-12-09 11:24:18'),
(927, 'Added', 'Menu', 42, 'admin', 'Menu Add Successfully', '::1', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 <br />name : Google Chrome <br />version : 120.0.0.0 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|other)[/ ]', '2023-12-11 18:14:46'),
(928, 'Added', 'Menu', 43, 'admin', 'Menu Add Successfully', '::1', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 <br />name : Google Chrome <br />version : 120.0.0.0 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|other)[/ ]', '2023-12-24 11:12:04'),
(929, 'Added', 'Menu', 44, 'admin', 'Menu Add Successfully', '::1', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 <br />name : Google Chrome <br />version : 121.0.0.0 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|other)[/ ]', '2024-01-24 11:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `aa_id` int(11) NOT NULL,
  `aa_name` varchar(255) DEFAULT NULL,
  `aa_email` varchar(255) DEFAULT NULL,
  `aa_user` varchar(255) DEFAULT NULL,
  `aa_pass` varchar(255) DEFAULT NULL,
  `aa_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_in_one_returns`
--

CREATE TABLE `all_in_one_returns` (
  `id` int(11) NOT NULL,
  `order_invoice_id` int(11) NOT NULL,
  `invoice_product_id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL COMMENT 'refund = 2,defect=3,change_product=4,change_size_color=5',
  `new_amount` int(11) NOT NULL,
  `old_order_product_price` float NOT NULL,
  `old_pId` int(11) NOT NULL,
  `old_size` varchar(255) DEFAULT NULL,
  `old_color` varchar(255) DEFAULT NULL,
  `old_order_product_discount` float NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `price_code` varchar(10) NOT NULL,
  `new_pId` int(11) NOT NULL,
  `new_color` int(11) NOT NULL,
  `new_size` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `datetime_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `all_in_one_returns`
--

INSERT INTO `all_in_one_returns` (`id`, `order_invoice_id`, `invoice_product_id`, `type`, `new_amount`, `old_order_product_price`, `old_pId`, `old_size`, `old_color`, `old_order_product_discount`, `sale_qty`, `price_code`, `new_pId`, `new_color`, `new_size`, `hash`, `date`, `datetime_added`) VALUES
(1, 4123, 6040, '3', 0, 4999, 1537, 'M', '', 1000, 1, 'NOK', 0, 0, 0, '852bac4d7888f3dbda631e6d47fcc55d', '2016-12-13', '2016-12-13 13:43:37'),
(2, 54, 63, '4', 4000, 500, 3, 'S', '0d000d', 0, 10, 'PK', 7, 0, 0, '08b8a836c9e42ac9207234a2614f2128', '2020-03-12', '2020-03-12 08:14:01'),
(3, 3, 3, '2', -4000, 400, 3, 'M', 'ff00ff', 0, 10, 'PK', 0, 0, 0, '6ca235458bab572a6123ff18a5321429', '2020-03-13', '2020-03-13 03:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_link` varchar(250) DEFAULT NULL,
  `banner_heading` varchar(255) DEFAULT NULL,
  `banner_shrtDesc` text DEFAULT NULL,
  `layer0` text DEFAULT NULL,
  `layer1` text DEFAULT NULL,
  `layer2` text DEFAULT NULL,
  `layer3` text DEFAULT NULL,
  `category` text NOT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) DEFAULT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_link`, `banner_heading`, `banner_shrtDesc`, `layer0`, `layer1`, `layer2`, `layer3`, `category`, `publish`, `sort`, `date_timestamp`) VALUES
(12, '', 'a:1:{s:7:\"English\";s:6:\"Banner\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:43:\"{{WEB_URL}}/uploads/flash/banner_video.webm\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, NULL, '2023-08-09 06:13:18'),
(14, '', 'a:1:{s:7:\"English\";s:6:\"test11\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 0, NULL, '2023-09-25 07:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `best_seller_products`
--

CREATE TABLE `best_seller_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `best_seller_products`
--

INSERT INTO `best_seller_products` (`id`, `product_id`, `publish`, `date_updated`, `sort`) VALUES
(129, 42, 1, '0000-00-00 00:00:00', 5),
(135, 45, 1, '0000-00-00 00:00:00', 4),
(146, 40, 1, '0000-00-00 00:00:00', 0),
(147, 14, 1, '0000-00-00 00:00:00', 2),
(148, 10, 1, '0000-00-00 00:00:00', 1),
(149, 48, 1, '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `shortDesc` text DEFAULT NULL,
  `dsc` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` smallint(6) NOT NULL DEFAULT 0,
  `publish` smallint(6) NOT NULL DEFAULT 0,
  `publish_date` varchar(50) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `date`, `heading`, `user`, `category`, `slug`, `shortDesc`, `dsc`, `image`, `comment`, `publish`, `publish_date`, `dateTime`) VALUES
(33, '0000-00-00', 'a:4:{s:7:\"Swedish\";s:31:\"HjÃ¤lmar - kick pÃ¥ funktionera\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 11, 'Sportswear', '', 'a:4:{s:7:\"Swedish\";s:183:\"Det Ã¤r inte bara en skyddskropp som tÃ¤cker huvudet frÃ¥n skador och skada men ocksÃ¥ Ã¤r en trendig slitage utrustad med fenomenala funktioner fÃ¶r att hjÃ¤lpa fÃ¶raren i synnerhet.\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'a:4:{s:7:\"Swedish\";s:3745:\"<img alt=\"\" src=\"https://sharkspeed.se/uploads/images/motorcycle-helmet-issues.jpg\" style=\"width: 100%;\" /><br />\r\n&nbsp;<br />\r\nDet &auml;r inte bara en skyddskropp som t&auml;cker huvudet fr&aring;n skador och skada men ocks&aring; &auml;r en trendig slitage utrustad med fenomenala funktioner f&ouml;r att hj&auml;lpa f&ouml;raren i synnerhet. Vem visste att en tid skulle komma n&auml;r detta skyddande organ skulle bli den mest fashionabla och avancerade slitage, som motorcyklister skulle &auml;lska att ha? Faktum &auml;r att de senaste tekniska omg&aring;ngar inom motorcykel plagg s&aring;som <a href=\"https://sharkspeed.se/pCategory-1200-MC-KLADER\">MC jacka</a> och motorcykelhj&auml;lmar &auml;r de fantastiska f&ouml;r&auml;ndringar som har motiverat tusentals f&ouml;rarna att k&ouml;pa det och f&aring; tillg&aring;ng till inte bara obegr&auml;nsat skydd utan ocks&aring; en professionell &ouml;verklagande.\r\n\r\n<h2>Mest k&auml;nda motorcykelhj&auml;lmar</h2>\r\nMotorcykelindustrin bara h&aring;ller p&aring; blommande och blommande 2016 som aldrig f&ouml;rr, f&auml;ngslande intresse ungdomar s&auml;rskilt uppmuntra dem att ta reda p&aring; den mest l&auml;mpliga hj&auml;lm som oerh&ouml;rt l&auml;gger i sin personality.The id&eacute; att installera Bluetooth-enhet, mikrofon, h&ouml;rlurar, bakre kameror och andra h&ouml;gteknologiska tillbeh&ouml;r g&ouml;r motorcykelhj&auml;lmar ett komplett skydd och njutning utrustning f&ouml;r ryttare. Det finns en lista med tre <a href=\"https://sharkspeed.se/pCategory-1203-MC-CROSS-HJALMAR\">MC hj&auml;lmar</a> som har varit h&ouml;jdpunkten p&aring; &aring;ret, p&aring; grund av n&auml;rvaron av &ouml;verv&auml;ldigande funktioner som en g&aring;ng var om&ouml;jligt att f&ouml;rest&auml;lla sig diskuteras enligt f&ouml;ljande f&ouml;r motorcykel fanatiker att leta efter:\r\n\r\n<ul>\r\n	<li>\r\n	<h3>Skully AR-1</h3>\r\n\r\n	<p>Den uppgraderade Skully AR-1 &auml;r det senaste tillskottet till den h&ouml;ga skiss hj&auml;lm p&aring; motorcykel redskap, &auml;r vida k&auml;nd f&ouml;r sina head-up-display och bakifr&aring;n kamera som g&ouml;r tittar p&aring; stora vinklar med l&auml;tthet. Bara tryckknappen g&ouml;r det m&ouml;jligt f&ouml;r f&ouml;raren att &auml;ndra Bluetooth-h&ouml;gtalare eller den inbyggda GPS f&ouml;r att navigera v&auml;gen utan anstr&auml;ngning. F&ouml;lj instruktionerna f&ouml;r att n&aring; &ouml;nskad destination med l&auml;tthet och i tid genom att f&ouml;lja de visade riktningarna som visas i displayen.</p>\r\n	</li>\r\n	<li>\r\n	<h3>Reevu - En HUD hj&auml;lm</h3>\r\n\r\n	<p>Denna hj&auml;lm inte bara l&auml;gga i stil med de motorcyklister men ocks&aring; l&ouml;ser fr&aring;gor som r&ouml;r de backspeglar som bildar det avg&ouml;rande problemet n&auml;r du k&ouml;r. Dessutom, s&auml;kerhet, komfort tillsammans med l&aring;gt brus p&aring; grund av vind st&aring;r f&ouml;r de viktigaste faktorerna f&ouml;r uppskattning och valet av Reevu. Med realtidsvisning av v&auml;gen bakom f&ouml;raren denna hj&auml;lm &auml;r att uppn&aring; helt uppm&auml;rksamhet.</p>\r\n	</li>\r\n	<li>\r\n	<h3>Bluetooth motorcykelhj&auml;lmar</h3>\r\n\r\n	<p>Den &ouml;kande trenden av motorcyklar hj&auml;lmen har gjort det m&ouml;jligt f&ouml;r musikaliska &aring;kattraktioner f&ouml;r ryttare d&auml;r de l&auml;tt kan bl&auml;ddra igenom den anpassade spellistor f&ouml;r att byta till sin favoritmusik njuter av l&aring;nga enheten. Bluetooth-enhet installerad i hj&auml;lmarna till&aring;ter f&ouml;raren att ansluta med andra motorcyklisten , kommunicera l&auml;tt n&auml;r beh&ouml;ver. Knapparna n&auml;rvarande &ouml;ver hj&auml;lmen medger enkelt byte av volymerna antingen &ouml;ka eller minska tillsammans med att koppla bort enheten vid behov.</p>\r\n	</li>\r\n</ul>\r\n\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', '', 0, 0, '', '2017-03-04 05:48:14'),
(34, '0000-00-00', 'a:4:{s:7:\"Swedish\";s:31:\"HjÃ¤lmar - kick pÃ¥ funktionera\";s:9:\"Norwegian\";s:30:\"Hjelmer - hÃ¸yt pÃ¥ funksjoner\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 11, 'Sportswear', 'hjelmer-hoyt-pa-funksjoner', 'a:4:{s:7:\"Swedish\";s:183:\"Det Ã¤r inte bara en skyddskropp som tÃ¤cker huvudet frÃ¥n skador och skada men ocksÃ¥ Ã¤r en trendig slitage utrustad med fenomenala funktioner fÃ¶r att hjÃ¤lpa fÃ¶raren i synnerhet.\";s:9:\"Norwegian\";s:174:\"Det er bare ikke en beskyttende kropp som dekker hodet fra skader og skade, men ogsÃ¥ er en trendy slitasje utstyrt med fenomenale funksjoner for Ã¥ hjelpe rytteren spesielt.\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'a:4:{s:7:\"Swedish\";s:3799:\"<img alt=\"\" src=\"https://sharkspeed.se/uploads/images/motorcycle-helmet-issues.jpg\" style=\"width: 100%;\" /><br />\r\n&nbsp;<br />\r\nDet &auml;r inte bara en skyddskropp som t&auml;cker huvudet fr&aring;n skador och skada men ocks&aring; &auml;r en trendig slitage utrustad med fenomenala funktioner f&ouml;r att hj&auml;lpa f&ouml;raren i synnerhet. Vem visste att en tid skulle komma n&auml;r detta skyddande organ skulle bli den mest fashionabla och avancerade slitage, som motorcyklister skulle &auml;lska att ha? Faktum &auml;r att de senaste tekniska omg&aring;ngar inom motorcykel plagg s&aring;som <a href=\"https://sharkspeed.se/pCategory-1200-MC-KLADER\">MC jacka</a> och motorcykelhj&auml;lmar &auml;r de fantastiska f&ouml;r&auml;ndringar som har motiverat tusentals f&ouml;rarna att k&ouml;pa det och f&aring; tillg&aring;ng till inte bara obegr&auml;nsat skydd utan ocks&aring; en professionell &ouml;verklagande.<br />\r\n&nbsp;\r\n<h2>Mest k&auml;nda motorcykelhj&auml;lmar</h2>\r\nMotorcykelindustrin bara h&aring;ller p&aring; blommande och blommande 2016 som aldrig f&ouml;rr, f&auml;ngslande intresse ungdomar s&auml;rskilt uppmuntra dem att ta reda p&aring; den mest l&auml;mpliga hj&auml;lm som oerh&ouml;rt l&auml;gger i sin personality.The id&eacute; att installera Bluetooth-enhet, mikrofon, h&ouml;rlurar, bakre kameror och andra h&ouml;gteknologiska tillbeh&ouml;r g&ouml;r motorcykelhj&auml;lmar ett komplett skydd och njutning utrustning f&ouml;r ryttare. Det finns en lista med tre <a href=\"https://sharkspeed.se/pCategory-1203-MC-CROSS-HJALMAR\">MC hj&auml;lmar</a> som har varit h&ouml;jdpunkten p&aring; &aring;ret, p&aring; grund av n&auml;rvaron av &ouml;verv&auml;ldigande funktioner som en g&aring;ng var om&ouml;jligt att f&ouml;rest&auml;lla sig diskuteras enligt f&ouml;ljande f&ouml;r motorcykel fanatiker att leta efter:<br />\r\n&nbsp;\r\n<ul>\r\n	<li>\r\n	<h3>Skully AR-1</h3>\r\n\r\n	<p>Den uppgraderade Skully AR-1 &auml;r det senaste tillskottet till den h&ouml;ga skiss hj&auml;lm p&aring; motorcykel redskap, &auml;r vida k&auml;nd f&ouml;r sina head-up-display och bakifr&aring;n kamera som g&ouml;r tittar p&aring; stora vinklar med l&auml;tthet. Bara tryckknappen g&ouml;r det m&ouml;jligt f&ouml;r f&ouml;raren att &auml;ndra Bluetooth-h&ouml;gtalare eller den inbyggda GPS f&ouml;r att navigera v&auml;gen utan anstr&auml;ngning. F&ouml;lj instruktionerna f&ouml;r att n&aring; &ouml;nskad destination med l&auml;tthet och i tid genom att f&ouml;lja de visade riktningarna som visas i displayen.<br />\r\n	&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<h3>Reevu - En HUD hj&auml;lm</h3>\r\n\r\n	<p>Denna hj&auml;lm inte bara l&auml;gga i stil med de motorcyklister men ocks&aring; l&ouml;ser fr&aring;gor som r&ouml;r de backspeglar som bildar det avg&ouml;rande problemet n&auml;r du k&ouml;r. Dessutom, s&auml;kerhet, komfort tillsammans med l&aring;gt brus p&aring; grund av vind st&aring;r f&ouml;r de viktigaste faktorerna f&ouml;r uppskattning och valet av Reevu. Med realtidsvisning av v&auml;gen bakom f&ouml;raren denna hj&auml;lm &auml;r att uppn&aring; helt uppm&auml;rksamhet.<br />\r\n	&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<h3>Bluetooth motorcykelhj&auml;lmar</h3>\r\n\r\n	<p>Den &ouml;kande trenden av motorcyklar hj&auml;lmen har gjort det m&ouml;jligt f&ouml;r musikaliska &aring;kattraktioner f&ouml;r ryttare d&auml;r de l&auml;tt kan bl&auml;ddra igenom den anpassade spellistor f&ouml;r att byta till sin favoritmusik njuter av l&aring;nga enheten. Bluetooth-enhet installerad i hj&auml;lmarna till&aring;ter f&ouml;raren att ansluta med andra motorcyklisten , kommunicera l&auml;tt n&auml;r beh&ouml;ver. Knapparna n&auml;rvarande &ouml;ver hj&auml;lmen medger enkelt byte av volymerna antingen &ouml;ka eller minska tillsammans med att koppla bort enheten vid behov.</p>\r\n	</li>\r\n</ul>\r\n\";s:9:\"Norwegian\";s:3387:\"<p><img alt=\"\" src=\"https://sharkspeed.se/uploads/images/motorcycle-helmet-issues%281%29.jpg\" style=\"width: 100%;\" /><br />\r\nDet er bare ikke en beskyttende kropp som dekker hodet fra skader og skade, men ogs&aring; er en trendy slitasje utstyrt med fenomenale funksjoner for &aring; hjelpe rytteren spesielt. Hvem visste at en tid ville komme der denne beskyttende kroppen skulle bli den mest moderne og avanserte slitasje, som motorsykkel ryttere ville elske &aring; eie? Faktisk, de nyeste teknologiske avdrag innen motorsykkel Apparels som <a href=\"http://sharkspeed.no/pCategory-1200-MC-KLADER\">MC jakke</a>&nbsp;og motorsykkel hjelmer er de fantastiske endringene som har motivert tusenvis av rytterne til &aring; kj&oslash;pe den og f&aring; tilgang til ikke bare ubegrenset beskyttelse, men ogs&aring; en profesjonell appell.<br />\r\n&nbsp;</p>\r\n\r\n<h2>Mest kjente motorsykkel hjelmer</h2>\r\n\r\n<p>MC-bransjen bare holder p&aring; blomstringen og blomstrende i 2016 som aldri f&oslash;r, fengslende interesse av ungdommene spesielt oppmuntre dem til &aring; finne ut den mest passende hjelm som enormt legger i sin personality.The ideen om &aring; installere Bluetooth-enhet, Mike, hodetelefoner, ryggekamera og andre h&oslash;yteknologiske tilbeh&oslash;r gj&oslash;r motorsykkel hjelmer en komplett beskyttelse og glede utstyr for rytterne. Det er en liste over tre <a href=\"http://sharkspeed.no/pCategory-1203-MC-CROSS-HJALMAR\">MC hjelmer</a> som har v&aelig;rt h&oslash;ydepunktet i &aring;ret, p&aring; grunn av tilstedev&aelig;relsen av overveldende funksjoner som en gang var umulig &aring; forestille seg diskutert som f&oslash;lger for motorsykkel fanatikere &aring; se etter:<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<h3>Skully AR-1</h3>\r\n&nbsp;\r\n\r\n<p>Den oppgraderte Skully AR-1 er det nyeste tilskuddet til den h&oslash;ye kjennetegnet hjelm i MC-utstyr, blir viden kjent for sine heads up display og ryggekamera som gj&oslash;r at ser p&aring; brede vinkler med letthet. Bare trykknappen gj&oslash;r at rytteren &aring; endre Bluetooth-h&oslash;yttalere eller den innebygde GPS for &aring; navigere veien uanstrengt. F&oslash;lg instruksjonene for &aring; n&aring; &oslash;nsket destinasjon med letthet og til rett tid ved &aring; f&oslash;lge vist retninger som vist i displayet.<br />\r\n&nbsp;</p>\r\n\r\n<h3>Reevu - En HUD motorsykkel hjelm</h3>\r\n&nbsp;\r\n\r\n<p>Denne hjelmen ikke bare legge i stil med motorsyklister, men ogs&aring; l&oslash;ser problemene knyttet til speil som danner den avgj&oslash;rende problem mens du kj&oslash;rer motorsykkel. I tillegg er sikkerhet, komfort sammen med lav st&oslash;y p&aring; grunn av vind regnskap for de viktigste faktorene for verdsettelse og valg av Reevu. Med real time visning av veien bak rytteren denne hjelmen er &aring; oppn&aring; ganske oppmerksomhet.<br />\r\n&nbsp;</p>\r\n\r\n<h3>Bluetooth Motorsykkel Hjelmer</h3>\r\n&nbsp;\r\n\r\n<p>Den &oslash;kende trenden av motorsykler hjelmen har aktivert den musikalske turer for ryttere der de enkelt kan bla gjennom tilpasset spilleliste for &aring; bytte til sin favorittmusikk nyter lang kj&oslash;retur. Bluetooth-enhet installert i hjelmene tillate rytteren &aring; f&aring; kontakt med den andre motorsyklisten , kommuniserer lett n&aring;r krever. Knappene til stede over hjelmen kan enkelt bytte av volumene enten &oslash;ker eller minker sammen med frakobling av enheten ved behov.</p>\r\n\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'blog/2017/03/110-motorcycle-helmet-issues.jpg', 0, 1, '', '2017-03-04 06:30:19'),
(36, '2021-12-22', 'a:1:{s:7:\"English\";s:13:\"My First Blog\";}', 2, 'Sportswear', '-4', 'a:1:{s:7:\"English\";s:20:\"It is my first blog.\";}', 'a:1:{s:7:\"English\";s:88:\"<u><em><span style=\"font-size:16px;\"><strong>A informative blog</strong></span></em></u>\";}', 'blog/2021/12/328-wallet.jpg', 0, 1, '', '2021-12-22 07:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `id` int(11) NOT NULL,
  `box` varchar(50) NOT NULL,
  `heading` text DEFAULT NULL,
  `sub_heading` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `linktext` text NOT NULL,
  `redirect` varchar(250) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `box`, `heading`, `sub_heading`, `short_desc`, `linktext`, `redirect`, `image`, `publish`) VALUES
(50, 'box1', 'a:1:{s:7:\"English\";s:4:\"logo\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:9:\"index.php\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'box/2023/08/188-579-logo.png', 1),
(51, 'box2', 'a:1:{s:7:\"English\";s:12:\"Image Edited\";}', 'a:1:{s:7:\"English\";s:6:\"20,265\";}', '', '', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1),
(52, 'box3', 'a:1:{s:7:\"English\";s:11:\"Total Users\";}', 'a:1:{s:7:\"English\";s:4:\"1047\";}', '', '', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1),
(53, 'box4', 'a:1:{s:7:\"English\";s:13:\"Total Editors\";}', 'a:1:{s:7:\"English\";s:2:\"80\";}', '', '', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1),
(54, 'box5', 'a:1:{s:7:\"English\";s:14:\"Total Sessions\";}', 'a:1:{s:7:\"English\";s:5:\"2,129\";}', '', '', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1),
(55, 'box6', 'a:1:{s:7:\"English\";s:28:\"Online Guest Picture Archive\";}', '', '', 'a:1:{s:7:\"English\";s:110:\" Save the unforgettable memories from your event, allowing them<br />             to bring joy for a lifetime.\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1),
(56, 'box7', 'a:1:{s:7:\"English\";s:35:\"A Captivating Gallery of Creativity\";}', 'a:1:{s:7:\"English\";s:115:\"Effortlessly capture and instantly preserve the most memorable               experiences without any complications.\";}', '', 'a:1:{s:7:\"English\";s:12:\"How It Works\";}', 'a:1:{s:7:\"English\";s:11:\"{{WEB_URL}}\";}', '', 1),
(57, 'box8', 'a:1:{s:7:\"English\";s:37:\"Unforgettable event gallery memories.\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:254:\"<p>Collect precious moments from your guests in a digital event gallery.</p>\r\n\r\n<p>Whether it&#39;s photos, videos, or guestbook messages, capture it all.</p>\r\n\r\n<p>Download a zip file with all the content in original resolution to cherish forever.</p>\r\n\";}', 'a:1:{s:7:\"English\";s:9:\"Read More\";}', 'a:1:{s:7:\"English\";s:11:\"{{WEB_URL}}\";}', 'box/2023/08/612-aboutus_img.png', 1),
(58, 'box9', 'a:1:{s:7:\"English\";s:6:\"Logo 2\";}', '', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:11:\"{{WEB_URL}}\";}', 'box/2023/08/628-logo2.png', 1),
(59, 'box10', 'a:1:{s:7:\"English\";s:3:\"FAQ\";}', 'a:1:{s:7:\"English\";s:92:\"Find quick answers to common queries and gain valuable<br> insights right at your fingertips\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1),
(60, 'box11', '', '', '', '', '', '', 1),
(61, 'box12', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `box_setting`
--

CREATE TABLE `box_setting` (
  `id` int(11) NOT NULL,
  `box` varchar(50) NOT NULL,
  `sub_heading` int(11) NOT NULL DEFAULT 0,
  `short_desc` int(11) NOT NULL DEFAULT 0,
  `editor` int(11) NOT NULL DEFAULT 0,
  `linktext` int(11) NOT NULL DEFAULT 0,
  `redirect` int(11) NOT NULL DEFAULT 0,
  `image` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `box_setting`
--

INSERT INTO `box_setting` (`id`, `box`, `sub_heading`, `short_desc`, `editor`, `linktext`, `redirect`, `image`) VALUES
(1, 'box1', 1, 1, 1, 1, 1, 1),
(3, 'box2', 1, 0, 0, 0, 0, 0),
(4, 'box3', 1, 0, 0, 0, 0, 0),
(5, 'box4', 1, 0, 0, 0, 0, 0),
(6, 'box5', 1, 0, 0, 0, 0, 0),
(7, 'box6', 0, 0, 0, 1, 0, 0),
(8, 'box7', 1, 0, 0, 1, 1, 0),
(9, 'box8', 1, 1, 1, 1, 1, 1),
(10, 'box9', 0, 0, 0, 0, 0, 1),
(11, 'box10', 1, 0, 0, 1, 0, 0),
(12, 'box11', 1, 1, 1, 1, 1, 1),
(13, 'box12', 1, 1, 0, 0, 0, 0),
(14, 'box13', 0, 1, 0, 0, 0, 0),
(15, 'box14', 0, 0, 0, 1, 1, 0),
(16, 'box15', 0, 0, 0, 1, 1, 1),
(17, 'box16', 0, 0, 0, 1, 1, 1),
(18, 'box17', 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_link` varchar(250) DEFAULT NULL,
  `brand_heading` text DEFAULT NULL,
  `brand_shrtDesc` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_link`, `brand_heading`, `brand_shrtDesc`, `image`, `publish`, `sort`) VALUES
(20, '', 'a:4:{s:7:\"Swedish\";s:12:\"Lorem Iipsum\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'a:4:{s:7:\"Swedish\";s:0:\"\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'brands/2015/07/392-mtsda1.jpg', 1, 4),
(21, '', 'a:4:{s:7:\"Swedish\";s:12:\"Lorem Iipsum\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'a:4:{s:7:\"Swedish\";s:0:\"\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'brands/2015/07/624-snblev1.jpg', 1, 2),
(22, '', 'a:4:{s:7:\"Swedish\";s:12:\"Lorem Iipsum\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'a:4:{s:7:\"Swedish\";s:0:\"\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'brands/2015/07/161-prsgrnt1.jpg', 1, 3),
(23, '', 'a:4:{s:7:\"Swedish\";s:12:\"Lorem Iipsum\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'a:4:{s:7:\"Swedish\";s:0:\"\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'brands/2015/07/838-byte1.jpg', 1, 0),
(24, '', 'a:4:{s:7:\"Swedish\";s:12:\"Lorem Iipsum\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'a:4:{s:7:\"Swedish\";s:0:\"\";s:9:\"Norwegian\";s:0:\"\";s:6:\"Danish\";s:0:\"\";s:7:\"Finnish\";s:0:\"\";}', 'brands/2015/07/422-oppet1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `captivategallery`
--

CREATE TABLE `captivategallery` (
  `id` int(11) NOT NULL,
  `captivategallery_link` varchar(250) NOT NULL,
  `captivategallery_heading` varchar(255) NOT NULL,
  `captivategallery_shrtDesc` text NOT NULL,
  `layer0` text NOT NULL,
  `layer1` text NOT NULL,
  `layer2` text NOT NULL,
  `layer3` text NOT NULL,
  `category` text NOT NULL,
  `publish` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `date_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `captivategallery`
--

INSERT INTO `captivategallery` (`id`, `captivategallery_link`, `captivategallery_heading`, `captivategallery_shrtDesc`, `layer0`, `layer1`, `layer2`, `layer3`, `category`, `publish`, `sort`, `date_timestamp`) VALUES
(1, '', 'a:1:{s:7:\"English\";s:10:\"Engagement\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:48:\"{{WEB_URL}}/uploads/images/Engagement--1--A.webp\";}', 'a:1:{s:7:\"English\";s:48:\"{{WEB_URL}}/uploads/images/Engagement--1--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 2, '2023-08-09 12:07:45'),
(2, '', 'a:1:{s:7:\"English\";s:10:\"Engagement\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:48:\"{{WEB_URL}}/uploads/images/Engagement--2--A.webp\";}', 'a:1:{s:7:\"English\";s:48:\"{{WEB_URL}}/uploads/images/Engagement--2--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 0, '2023-08-09 12:25:47'),
(3, '', 'a:1:{s:7:\"English\";s:10:\"Engagement\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:51:\"{{WEB_URL}}/uploads/images/Engagement--3--B(1).webp\";}', 'a:1:{s:7:\"English\";s:48:\"{{WEB_URL}}/uploads/images/Engagement--3--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 1, '2023-08-09 12:26:20'),
(4, '', 'a:1:{s:7:\"English\";s:7:\"Wedding\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:48:\"{{WEB_URL}}/uploads/images/Wedding--1--A(2).webp\";}', 'a:1:{s:7:\"English\";s:48:\"{{WEB_URL}}/uploads/images/Wedding--1--A(1).webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 3, '2023-08-09 12:27:35'),
(5, '', 'a:1:{s:7:\"English\";s:7:\"Wedding\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:45:\"{{WEB_URL}}/uploads/images/Wedding--2--A.webp\";}', 'a:1:{s:7:\"English\";s:45:\"{{WEB_URL}}/uploads/images/Wedding--2--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 4, '2023-08-09 12:29:31'),
(6, '', 'a:1:{s:7:\"English\";s:7:\"Wedding\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:45:\"{{WEB_URL}}/uploads/images/Wedding--3--A.webp\";}', 'a:1:{s:7:\"English\";s:45:\"{{WEB_URL}}/uploads/images/Wedding--3--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 5, '2023-08-09 12:35:48'),
(7, '', 'a:1:{s:7:\"English\";s:8:\"Birthday\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Birthday--1--A.webp\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Birthday--1--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 6, '2023-08-15 08:02:57'),
(8, '', 'a:1:{s:7:\"English\";s:8:\"Birthday\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Birthday--2--A.webp\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Birthday--2--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 7, '2023-08-15 08:03:52'),
(9, '', 'a:1:{s:7:\"English\";s:8:\"Birthday\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Birthday--3--A.webp\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Birthday--3--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 8, '2023-08-15 08:04:30'),
(10, '', 'a:1:{s:7:\"English\";s:11:\"Baby Shower\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:49:\"{{WEB_URL}}/uploads/images/Baby-Shower--1--A.webp\";}', 'a:1:{s:7:\"English\";s:49:\"{{WEB_URL}}/uploads/images/Baby-Shower--1--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 9, '2023-08-15 08:05:58'),
(11, '', 'a:1:{s:7:\"English\";s:11:\"Baby Shower\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:49:\"{{WEB_URL}}/uploads/images/Baby-Shower--2--A.webp\";}', 'a:1:{s:7:\"English\";s:49:\"{{WEB_URL}}/uploads/images/Baby-Shower--2--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 10, '2023-08-15 08:06:57'),
(12, '', 'a:1:{s:7:\"English\";s:11:\"Baby Shower\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:49:\"{{WEB_URL}}/uploads/images/Baby-Shower--3--A.webp\";}', 'a:1:{s:7:\"English\";s:49:\"{{WEB_URL}}/uploads/images/Baby-Shower--3--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 11, '2023-08-15 08:07:35'),
(13, '', 'a:1:{s:7:\"English\";s:8:\"Business\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:49:\"{{WEB_URL}}/uploads/images/Business--1--A(1).webp\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Business--1--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 12, '2023-08-15 08:08:15'),
(14, '', 'a:1:{s:7:\"English\";s:8:\"Business\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Business--2--A.webp\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Business--2--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 13, '2023-08-15 08:09:04'),
(15, '', 'a:1:{s:7:\"English\";s:8:\"Business\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Business--3--A.webp\";}', 'a:1:{s:7:\"English\";s:46:\"{{WEB_URL}}/uploads/images/Business--3--B.webp\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 14, '2023-08-15 08:09:37'),
(20, '', 'a:1:{s:7:\"English\";s:5:\"fffff\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '', 1, 0, '2023-12-09 12:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pId` int(11) NOT NULL,
  `scaleId` int(11) DEFAULT NULL,
  `colorId` int(11) DEFAULT NULL,
  `storeId` int(11) DEFAULT NULL,
  `customId` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `tempUser` varchar(250) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL,
  `deal` int(11) NOT NULL DEFAULT 0,
  `checkout` int(11) NOT NULL DEFAULT 0,
  `order_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'It means that order has been created for this cart',
  `info` text DEFAULT NULL,
  `salePrice` varchar(255) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pId`, `scaleId`, `colorId`, `storeId`, `customId`, `qty`, `userId`, `tempUser`, `hash`, `deal`, `checkout`, `order_status`, `info`, `salePrice`, `dateTime`) VALUES
(1, 15, 0, 0, 7, 0, 1, 0, '624697c53d114_624697c53d115', 'fd56d66654139a6cc6d346f5f5006deb', 0, 0, 0, NULL, NULL, '2022-04-01 06:17:35'),
(2, 40, 0, 0, 7, 0, 1, 0, '624697c53d114_624697c53d115', 'f9bf12dcf9555d9704419a75fa66faa9', 0, 0, 0, NULL, NULL, '2022-04-01 06:45:18'),
(3, 223, 0, 0, 7, 0, 1, 0, '624697c53d114_624697c53d115', '3a9912aa38cf2cbf62c91ada69e14315', 0, 0, 0, NULL, NULL, '2022-04-01 08:28:41'),
(4, 223, 0, 0, 7, 0, 3, 0, '6246c8a48a05f_6246c8a48a060', 'cedc1b1e62054232947941bdb7c94076', 0, 0, 0, NULL, NULL, '2022-04-01 09:40:59'),
(6, 14, 0, 0, 7, 0, 1, 0, '624a7be902b41_624a7be902b43', 'b42cb01af81bf7b169b6a900c479cd70', 0, 0, 1, NULL, NULL, '2022-04-04 05:03:29'),
(38, 14, 0, 0, 6, 0, 1, 0, '627e289ab9031_627e289ab9032', 'a7f0afe0c6753e31333833382e752789', 0, 0, 0, NULL, NULL, '2022-05-13 10:44:39'),
(39, 14, 0, 0, 6, 0, 1, 93, '', '91d930cb5f2a20b5ef4f2be430b6cfda', 0, 0, 0, NULL, NULL, '2023-10-04 18:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `cartwishlist`
--

CREATE TABLE `cartwishlist` (
  `id` int(11) NOT NULL,
  `pId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `tempUser` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cartwishlist`
--

INSERT INTO `cartwishlist` (`id`, `pId`, `userId`, `tempUser`) VALUES
(1, 42, 0, '62458a4fcd15c_62458a4fcd15e');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order_remaining`
--

CREATE TABLE `cart_order_remaining` (
  `_id` int(11) NOT NULL,
  `invId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `short_desc` varchar(500) DEFAULT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'main',
  `sort` int(11) DEFAULT NULL,
  `under` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `short_desc`, `icon`, `link`, `type`, `sort`, `under`) VALUES
(1, 'a:1:{s:7:\"English\";s:10:\"Categories\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', 0, 0),
(1281, 'a:1:{s:7:\"English\";s:7:\"Treding\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', NULL, 1),
(1282, 'a:1:{s:7:\"English\";s:7:\"Fashion\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', NULL, 1),
(1283, 'a:1:{s:7:\"English\";s:4:\"Food\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', NULL, 1),
(1284, 'a:1:{s:7:\"English\";s:9:\"Furniture\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', NULL, 1),
(1285, 'a:1:{s:7:\"English\";s:6:\"Sports\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', NULL, 1),
(1286, 'a:1:{s:7:\"English\";s:9:\"THE BRAND\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', NULL, 1),
(1287, 'a:1:{s:7:\"English\";s:7:\"ON SALE\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', '', '', 'main', NULL, 1),
(1289, 'a:1:{s:7:\"English\";s:11:\"Accessories\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjIytlLyTc1TUFMIz88F0o7JyanFxflFmanFSta1AHsrIXMzAAAA', '', '', 'main', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_under` int(11) NOT NULL,
  `cat_status` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_comment`
--

CREATE TABLE `chat_comment` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_from` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `current_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat_comment`
--

INSERT INTO `chat_comment` (`id`, `project_id`, `user_id`, `assigned_from`, `sender_id`, `message`, `time`, `current_time`) VALUES
(238, 226, 44, 43, 43, 'hello', '2023-09-05 08:02:51', '2023-09-05 11:02:51'),
(239, 226, 44, 43, 43, 'how are u', '2023-09-05 08:03:17', '2023-09-05 11:03:17'),
(240, 226, 44, 43, 43, 'hey', '2023-09-05 08:03:42', '2023-09-05 11:03:42'),
(241, 251, 85, 77, 85, '123', '2023-09-05 12:10:05', '2023-09-05 15:10:05'),
(242, 251, 85, 77, 77, '213', '2023-09-05 12:10:51', '2023-09-05 15:10:51'),
(243, 239, 44, 43, 43, 'hey', '2023-09-06 05:13:44', '2023-09-06 08:13:44'),
(244, 239, 44, 43, 44, 'how are u', '2023-09-06 05:19:07', '2023-09-06 08:19:07'),
(245, 258, 46, 77, 46, 'HI', '2023-09-23 06:07:19', '2023-09-23 09:07:19'),
(246, 258, 46, 77, 77, 'HELLO', '2023-09-23 06:07:31', '2023-09-23 09:07:31'),
(247, 265, 89, 90, 90, 'Hi PLease all you edited photos hope you like it\nbtw i havent been paid', '2023-09-24 15:05:24', '2023-09-24 18:05:24'),
(248, 265, 89, 0, 89, 'fdfdsfdsf', '2023-09-24 15:10:58', '2023-09-24 18:10:58'),
(249, 317, 46, 77, 77, '1234', '2023-10-09 09:50:22', '2023-10-09 12:50:22'),
(250, 317, 46, 77, 46, '456', '2023-10-09 09:51:32', '2023-10-09 12:51:32'),
(251, 322, 46, 77, 46, 'pl', '2023-10-13 10:02:10', '2023-10-13 13:02:10'),
(252, 322, 46, 77, 77, '121', '2023-10-13 10:02:55', '2023-10-13 13:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `check_statistics`
--

CREATE TABLE `check_statistics` (
  `date_id` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `shipping_country` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `check_statistics`
--

INSERT INTO `check_statistics` (`date_id`, `updated_date`, `type`, `shipping_country`) VALUES
(6, '2019-03-18', 'payment_method', 'NO'),
(7, '2019-03-18', 'top_daily_payment_method', 'SE'),
(8, '2019-03-18', 'total_orders_daily', 'SE'),
(9, '2019-03-18', 'top_user_daily', 'NO'),
(10, '2019-03-18', 'price_range_daily', 'SE'),
(11, '2019-03-18', 'lowest_product_sold_daily', 'SE'),
(12, '2019-03-16', 'payment_method', 'NO'),
(13, '2019-03-16', 'top_daily_payment_method', 'NO'),
(14, '2019-03-16', 'total_orders_daily', 'SE'),
(15, '2019-03-15', 'top_user_daily', 'NO'),
(16, '2019-03-16', 'price_range_daily', 'SE'),
(17, '2019-03-17', 'lowest_product_sold_daily', 'SE'),
(18, '2019-03-15', 'lowest_product_sold_daily', 'SE'),
(19, '2019-02-28', 'payment_method', 'DK'),
(20, '2019-02-28', 'top_daily_payment_method', 'SE'),
(21, '2019-02-28', 'total_orders_daily', 'SE'),
(22, '2019-02-28', 'top_user_daily', 'NO'),
(23, '2019-02-28', 'price_range_daily', 'SE'),
(24, '2019-02-28', 'lowest_product_sold_daily', 'SE'),
(25, '2019-01-31', 'payment_method', 'SE'),
(26, '2019-01-31', 'top_daily_payment_method', 'SE'),
(27, '2019-01-31', 'total_orders_daily', 'SE'),
(28, '2019-01-31', 'top_user_daily', 'SE'),
(29, '2019-01-31', 'price_range_daily', 'SE'),
(30, '2019-01-31', 'lowest_product_sold_daily', 'SE'),
(31, '2019-04-01', 'payment_method', 'FI'),
(32, '2019-04-01', 'top_daily_payment_method', 'SE'),
(33, '2019-04-01', 'total_orders_daily', 'SE'),
(34, '2019-04-01', 'top_user_daily', 'FI'),
(35, '2019-04-01', 'price_range_daily', 'SE'),
(36, '2019-04-01', 'lowest_product_sold_daily', 'SE'),
(37, '2019-05-18', 'payment_method', 'DK'),
(38, '2019-05-18', 'top_daily_payment_method', 'SE'),
(39, '2019-05-18', 'total_orders_daily', 'SE'),
(40, '2019-05-18', 'top_user_daily', 'FI'),
(41, '2019-05-18', 'price_range_daily', 'SE'),
(42, '2019-06-11', 'payment_method', 'DK'),
(43, '2019-06-11', 'top_daily_payment_method', 'SE'),
(44, '2019-06-11', 'total_orders_daily', 'SE'),
(45, '2019-06-11', 'top_user_daily', 'FI'),
(46, '2019-06-11', 'price_range_daily', 'SE'),
(47, '2019-06-11', 'lowest_product_sold_daily', 'SE');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color_name_id` int(11) NOT NULL,
  `color_name` text NOT NULL,
  `color_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name_id`, `color_name`, `color_timestamp`) VALUES
(5, 2, 'ff00ff', '2020-03-09 07:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `color_name`
--

CREATE TABLE `color_name` (
  `colorName_id` int(11) NOT NULL,
  `colorName_name` text NOT NULL,
  `colorName_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `color_name`
--

INSERT INTO `color_name` (`colorName_id`, `colorName_name`, `colorName_timestamp`) VALUES
(2, 'Pink', '2022-04-01 07:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_useage_record`
--

CREATE TABLE `coupon_useage_record` (
  `id_pk` int(11) NOT NULL,
  `user` varchar(225) NOT NULL,
  `order_id` varchar(225) NOT NULL,
  `coupon_id` varchar(20) NOT NULL,
  `coupon` varchar(225) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cronjob`
--

CREATE TABLE `cronjob` (
  `id` int(11) NOT NULL,
  `job` varchar(500) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cronjob`
--

INSERT INTO `cronjob` (`id`, `job`, `dateTime`) VALUES
(1, '1', '2014-12-20 16:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `cur_id` int(11) NOT NULL,
  `cur_country` varchar(255) NOT NULL,
  `cur_name` varchar(255) NOT NULL,
  `cur_symbol` varchar(255) NOT NULL,
  `cur_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`cur_id`, `cur_country`, `cur_name`, `cur_symbol`, `cur_timestamp`) VALUES
(26, 'UK', 'Euro', '£', '2023-08-15 07:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `defected`
--

CREATE TABLE `defected` (
  `id` int(11) NOT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `vendorName` varchar(255) DEFAULT NULL,
  `orderNo` varchar(255) DEFAULT NULL,
  `iComment` text DEFAULT NULL,
  `vComment` text DEFAULT NULL,
  `isVendor` varchar(50) DEFAULT NULL,
  `vCreateDate` varchar(255) DEFAULT NULL,
  `returnDate` varchar(255) DEFAULT NULL,
  `dateTime` timestamp NULL DEFAULT current_timestamp(),
  `updateD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `defected`
--

INSERT INTO `defected` (`id`, `customerName`, `store_id`, `vendorName`, `orderNo`, `iComment`, `vComment`, `isVendor`, `vCreateDate`, `returnDate`, `dateTime`, `updateD`) VALUES
(430, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-12 08:26:15', '0');

-- --------------------------------------------------------

--
-- Table structure for table `defectedorder`
--

CREATE TABLE `defectedorder` (
  `id` int(11) NOT NULL,
  `defectedId` int(11) DEFAULT NULL,
  `pName` varchar(255) DEFAULT NULL,
  `pQty` varchar(255) DEFAULT NULL,
  `img_` varchar(255) NOT NULL,
  `pDesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `defect_image`
--

CREATE TABLE `defect_image` (
  `img_id` int(11) NOT NULL,
  `defect_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `developer_setting`
--

CREATE TABLE `developer_setting` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(100) DEFAULT NULL,
  `setting_val` varchar(250) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `msgForDeveloper` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `developer_setting`
--

INSERT INTO `developer_setting` (`id`, `setting_name`, `setting_val`, `category`, `msgForDeveloper`) VALUES
(1, 'seo', '1', 'seo', NULL),
(2, 'pageBanner', '0', 'page', NULL),
(3, 'page_subHeading', '0', 'page', NULL),
(4, 'page_slug', '1', 'page', NULL),
(5, 'page_comment', '1', 'page', NULL),
(6, 'page_shortDesc', '0', 'page', NULL),
(7, 'news_image', '1', 'news', NULL),
(8, 'news_date', '1', 'news', NULL),
(10, 'news_comment', '1', 'news', NULL),
(11, 'banner_link', '1', 'banner', NULL),
(12, 'banner_heading', '1', 'banner', NULL),
(13, 'banner_shrtDesc', '0', 'banner', NULL),
(14, 'banner_size', '643x350', 'banner', NULL),
(15, 'blog_date', '1', 'blog', NULL),
(16, 'blog_shrtDesc', '1', 'blog', NULL),
(17, 'blog_comment', '0', 'blog', NULL),
(18, 'blog_publish_date', '1', 'blog', NULL),
(19, 'blog_image', '1', 'blog', NULL),
(20, 'stock_big_graph', '1', 'graph', 'if 1, stock report show in dashboard'),
(22, 'total_order_status', '1', 'graph', 'if 1, order pending, cancel,complete report show in dashboard'),
(23, 'product', '1', 'product', NULL),
(24, 'multi_language', '0', 'setting', 'First Set language that allow in product then make it 0'),
(25, 'cartSystem', '0', 'product', 'if 0 then must hide order page, then stock andd shipping page'),
(26, 'return_Product_from_client', '1', 'graph', 'also hide from menu, graph not work if product or defect any one in 0'),
(27, 'defect_Product_from_client', '1', 'graph', 'use on website form, if make it 0, then also hide user defect form admin menu, and defect and product developer setting must 1 to show graph\n'),
(28, 'product_Scale', '0', 'product', 'if 0 also remove scale from menu'),
(29, 'product_color', '0', 'product', 'if 0 also remove color from menu'),
(30, 'brand_link', '1', 'brand', NULL),
(31, 'brand_heading', '1', 'brand', NULL),
(33, 'brand_shrtDesc', '0', 'brand', NULL),
(34, 'brand_size', '178x85', 'brand', NULL),
(35, 'hasSocialLinks', '1', 'social', 'just check in admin setting is social links in project,, '),
(36, 'klarna', '0', 'payment', NULL),
(37, 'paypal', '0', 'payment', NULL),
(38, 'cashOnDelivery', '1', 'payment', NULL),
(39, 'featureProduct', '0', 'product', NULL),
(40, 'featureProduct2', '0', 'product', NULL),
(41, 'topSaleProductLimit', '1', 'product', NULL),
(42, 'latestProduct', '0', 'product', NULL),
(43, 'twitter', '1', 'social', 'is social link in website? setting check in admin setting'),
(44, 'Facebook', '1', 'social', 'is social link in website? setting check in admin setting'),
(45, 'Vimeo', '0', 'social', 'is social link in website? setting check in admin setting'),
(46, 'Google', '0', 'social', 'is social link in website? setting check in admin setting'),
(47, 'linkedIn', '1', 'social', 'is social link in website? setting check in admin setting'),
(48, 'pinterest', '0', 'social', 'is social link in website? setting check in admin setting'),
(49, 'youtube', '0', 'social', 'is social link in website? setting check in admin setting'),
(50, 'reviews', '0', 'reviews', 'also make false from menu,main setting for review, other setting in admin pages/blog etc'),
(51, 'review_link', '0', 'reviews', 'show on review form'),
(52, 'review_heading', '1', 'reviews', 'show on review form'),
(53, 'webOrder_with_Scale', '0', 'product', '1 for compulsory, 0 for not compulsory'),
(54, 'webOrder_with_color', '0', 'product', '1 for compulsory, 0 for not compulsory'),
(55, 'developerPassword', 'becfdb2c59ea5158cea10033e0c5d605', 'project', 'Enter correct password before edit files... file enrypction also required. on necessory files'),
(56, 'isProjectEnd', '0', 'project', 'make 1 when project complete... when make 0, you need to enter password...'),
(57, 'main_menu_icon', '1', 'menu', 'if menu has icon then use this field for icon'),
(59, 'emailImedia', 'ZmFoYWQuYWxpQGltZWRpYS5jb20ucGssYWJpZEBpbWVkaWEuY29tLnBrLGluZm9AaW1lZGlhLmNvbS5waw==', 'email', 'Admin Email'),
(60, 'banner_shrtDescEditor', '1', 'banner', 'ckeditor '),
(61, 'Instagram', '1', 'social', 'is social link in website? setting check in admin setting'),
(62, 'LocationMap', '1', 'social', 'want to use location map link,, so setting will appear in IBMS setting '),
(63, 'isFacebookComments', '0', 'social', 'setting show in setting if allow'),
(64, 'banner_layer0', '1', 'banner', 'main image'),
(65, 'banner_layer1', '0', 'banner', '0 for  off, 1 for text, 2 for image link'),
(66, 'banner_layer2', '0', 'banner', '0 for  off, 1 for text, 2 for image link'),
(67, 'banner_layer3', '0', 'banner', '0 for  off, 1 for text, 2 for image link'),
(68, 'f_Key', 'd7ae601139e1daac79aeb9ae69043252', 'security', 'footer key,for update make projectEnd to 0'),
(69, 'loginForOrder', '0', 'payment_', 'if just order with all info, no login required, no payment gateway'),
(70, 'couponSystem', '1', 'order', 'first use in web, to hide coupon from display.'),
(71, 'employeePage', '0', 'profile', 'employee page, if 1 show some option in admin > webuser form , and also show adding feature in pages {{employee}}'),
(72, 'file_link', '0', 'FileManager', 'make it 0 for laguage seprate files, different file on different language, and make layer 1 value = 3'),
(73, 'file_heading', '1', 'FileManager', NULL),
(74, 'file_layer0', '1', 'FileManager', 'imeage'),
(75, 'file_layer1', '3', 'FileManager', '0 for  off, 1 for text, 2 for image link,3 for file link'),
(76, 'file_layer3', '0', 'FileManager', '0 for  off, 1 for text, 2 for image link, 3for file link'),
(77, 'file_size', '32x32 / 64x64', 'FileManager', 'for file icon'),
(78, 'file_layer2', '0', 'FileManager', '0 for  off, 1 for text, 2 for image link,3 for file link'),
(79, 'file_shrtDesc', '0', 'FileManager', NULL),
(80, 'file_shrtDescEditor', '0', 'FileManager', 'ckeditor '),
(81, 'testimonialPage', '0', 'page', 'testimonial page, if 1 show adding feature in pages {{testimonial}}'),
(82, 'filesManagerPage', '0', 'page', 'files-Manager page, if 1 show adding feature in pages {{files-Manager}}'),
(83, 'testimonial_link', '0', 'testimonial', 'link use for website or any where you want'),
(84, 'testimonial_heading', '1', 'testimonial', NULL),
(85, 'testimonial_image', '1', 'testimonial', 'image'),
(86, 'testimonial_position', '1', 'testimonial', '0 for  off, 1 for text, 2 for image link,3 for file link'),
(87, 'testimonial_email', '1', 'testimonial', '0 for  off, 1 for text, 2 for image link,3 for file link'),
(88, 'testimonial_date', '1', 'testimonial', '0 for  off, 1 for text, 2 for image link,3 for file link'),
(89, 'testimonial_shrtDescEditor', '0', 'testimonial', 'ckeditor '),
(90, 'testimonial_shrtDesc', '1', 'testimonial', NULL),
(91, 'testimonial_size', '200x200', 'testimonial', 'for testimonial image size'),
(92, 'product_customSize', '1', 'product', '1 for show in product edit setting , and work on web'),
(93, 'bounceEmail', '1', 'setting', 'show bounce email in email letter page.. also update email address on cron.php'),
(94, 'hasGalleryPage', '0', 'page', 'show setting in admin pages in use widget: {{album}}'),
(95, 'salesTriggerMail', '1', 'product', 'if 1 then email cron work on when product on sale, if 0 nothing happen'),
(96, 'couponOfferMail', '1', 'product', 'if 1 show setting in IBMS-setting if setting 1 then email with coupon code send to visitor on first visit.'),
(97, 'dealProduct', '1', 'product', 'first use in web menu links... show or not'),
(98, 'check_out_offer', '0', 'product', 'if 1, setting show in admin for minimum order price, and setting show in product price'),
(99, 'invoice_print_after_Checkout', '0', 'product', 'if 1, after checkout invoice for print show.... else it will go to order View where all orders show'),
(102, 'top_order_user', '1', 'graph', 'if 1, setting will show in IBMS setting for on or off And graph will show where function has...'),
(103, 'top_payment_method', '1', 'graph', 'if 1, setting will show in IBMS setting for on or off And graph will show where function has...'),
(106, 'email_sending_status', '1', 'graph', 'if 1, setting will show in IBMS setting for on or off And graph will show where function has...'),
(107, 'subscribe_status', '1', 'graph', 'if 1, setting will show in IBMS setting for on or off And graph will show where function has...'),
(108, 'whole_sale_report', '1', 'graph', 'if 1, setting will show in IBMS setting for on or off And graph will show where function has...'),
(109, 'top_coupon_use', '1', 'graph', 'if 1, setting will show in IBMS setting for on or off And graph will show where function has...'),
(110, 'no_of_product_report', '1', 'graph', 'if 1, setting will show in IBMS setting for on or off And graph will show where function has...'),
(111, 'dashboard_graph_setting', '0', 'setting', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(112, 'product_sale_by_store_daily', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(113, 'order_daily_report', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(114, 'order_monthly_report', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(115, 'order_yearly_report', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(116, 'product_sale_by_store_monthly', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(117, 'main_menu_type', 'main_menu,0/top_menu,0', 'menu', 'MenuName,Icon Allow 0 or 1 or not \n/ (/type 2)\ne.g \"main,0/top,1\"\n\nMain must be main\n'),
(118, 'askQuestion', '0', 'reviews', 'use on product detial'),
(119, 'main_menu_icon_size', '85x65 <br>\r\n35x30', 'menu', 'enter msg or sizes to show on field Label'),
(120, 'product_return_form_login_required', '0', 'product', 'is login required to submit return/defect product form'),
(121, 'shipping_class', '0', 'product', 'if 1 then setting show in product add, or work in cart shipping,or setting show , if 0 then default in by weight'),
(122, 'payson', '1', 'payment', 'payment method,,,'),
(123, 'free_shipping_price', '0', 'product', 'if 1, setting show in admin for minimum cart price, and setting show in product price. if cart price reach at price , shipping will free.. this setting will show in setting and work in website..'),
(124, 'product_related_item', '1', 'product', 'product related items, show setting in Product add..'),
(125, 'product_check_stock', '0', 'product', 'if 0 then unlimit product can checkout,\r\nif 1 then its work with stock qty.'),
(126, 'addQty_custome', '1', 'cart', 'if 0 then + - option show on product in cart page,\r\nif 1 then input field show to put manually qty as client want..'),
(127, 'giftCard', '0', 'payment_', 'payment method,,,'),
(128, 'order_daily_value_report', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(129, 'order_monthly_value_report', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(130, 'order_yearly_value_report', '1', 'graph', 'if 1, dashboard graph setting show in IBMS setting, if 0 setting not show but all graphs work, if 2 all graphs will stop showing....'),
(131, 'buy_2_get_1_free', '1', 'product', 'Buy 2 get one free product setting show and work on website'),
(132, 'grid_view', '0', 'product', 'setting show in iBMS setting ->product tab\r\nand also use in website before work on grid system'),
(133, 'in_stock_email_subscription', '0', 'product', 'if 1 then if product out of stock, subscribe options show'),
(134, 'add_free_gift_in_cart', '0', 'product', 'Free gift sending : Cart price reach on special condition, a gift added in his cart automatically'),
(135, 'product_return_register_login', '1', 'product', 'Is login required to register return/defect/change size product'),
(136, 'bestSellerProductLimit', '1', 'product', NULL),
(137, 'cart_checkout_from_side_modal', '1', 'product', NULL),
(138, 'paypal_nvp', '0', 'payment', NULL),
(139, 'category_type', 'main,0', 'menu', 'MenuName,Icon Allow 0 or 1 or not \r\n/ (/type 2)'),
(140, 'smtp_change', '0', 'smtp', NULL),
(141, 'newsletter_smtp', '1', 'smtp', NULL),
(142, 'staple_product', '0', 'staple_product', '0 or 1'),
(143, 'salesFeature', '0', 'salesFeature', NULL),
(144, 'doNotForget_offer', '0', 'product', '0 or 1'),
(145, 'Reason', '1', 'setting', 'First Set language that allow in product then make it 0'),
(146, 'captivategallery_heading', '1', '', ''),
(147, 'captivategallery_layer0', '1', '', ''),
(148, 'captivategallery_layer1', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `editor_upload`
--

CREATE TABLE `editor_upload` (
  `id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `img_index` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `file_type` varchar(120) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `alt_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `editor_upload`
--

INSERT INTO `editor_upload` (`id`, `editor_id`, `user_id`, `product_id`, `image_path`, `img_index`, `status`, `file_type`, `datetime`, `alt_name`) VALUES
(196, 77, 46, 233, 'uploads/dropfile/EditorAlbum/img2.png', 683, 1, 'image', '2023-09-04 14:02:21', ''),
(197, 77, 46, 233, 'www.google.com', 694, 1, 'link', '2023-09-04 14:04:54', ''),
(198, 77, 46, 233, 'youtube.com', 691, 1, 'link', '2023-09-04 14:05:27', ''),
(199, 77, 85, 251, 'uploads/dropfile/EditorAlbum/wallpaperflare.com_wallpaper (1).jpg', 806, 1, 'image', '2023-09-05 15:07:32', ''),
(200, 77, 85, 251, 'uploads/dropfile/EditorAlbum/Finance Consultant.jpg', 806, 1, 'image', '2023-09-05 15:07:50', ''),
(201, 77, 85, 251, 'uploads/dropfile/EditorAlbum/personal assistent.jpg', 806, 1, 'image', '2023-09-05 15:08:05', ''),
(202, 77, 85, 251, 'uploads/dropfile/EditorAlbum/Supporting community and creating jobs.jpg', 806, 1, 'image', '2023-09-05 15:08:23', ''),
(203, 77, 85, 251, 'uploads/dropfile/EditorAlbum/full-equiped-medical-cabinet.jpg', 808, 1, 'image', '2023-09-05 15:11:09', ''),
(204, 77, 85, 251, 'uploads/dropfile/EditorAlbum/icons8-arrow-100.png', 809, 1, 'image', '2023-09-05 15:11:37', ''),
(205, 77, 85, 251, 'https://www.epicgames.com/site/en-US/home', 815, 1, 'link', '2023-09-05 15:11:48', ''),
(206, 43, 44, 239, 'uploads/dropfile/EditorAlbum/pexels-reynaldo-brigworkz-brigantty-734428.jpg', 866, 1, 'image', '2023-09-06 08:05:44', ''),
(207, 43, 44, 239, '', 867, 1, 'link', '2023-09-08 21:39:44', ''),
(208, 77, 46, 258, 'uploads/dropfile/EditorAlbum/e6f66cdf.jpg', 884, 1, 'image', '2023-09-23 09:05:19', ''),
(209, 77, 46, 258, 'uploads/dropfile/EditorAlbum/T1D1.6T-Pretty pictures(15).jpg', 885, 1, 'image', '2023-09-23 09:05:36', ''),
(210, 77, 46, 258, 'uploads/dropfile/EditorAlbum/T1D1.6T-Pretty pictures(7).jpg', 886, 1, 'image', '2023-09-23 09:05:53', ''),
(211, 77, 46, 258, 'uploads/dropfile/EditorAlbum/T1D1.6T-Pretty 3(6).jpg', 887, 1, 'image', '2023-09-23 09:06:14', ''),
(212, 77, 46, 258, 'uploads/dropfile/EditorAlbum/3.jpg', 888, 1, 'image', '2023-09-23 09:06:35', ''),
(213, 43, 46, 241, '', 802, 1, 'link', '2023-09-23 17:47:09', ''),
(214, 90, 89, 265, 'uploads/dropfile/EditorAlbum/IMG_3017.JPG', 895, 1, 'image', '2023-09-24 18:01:04', ''),
(215, 90, 89, 265, 'uploads/dropfile/EditorAlbum/IMG_3019.JPG', 896, 1, 'image', '2023-09-24 18:01:39', ''),
(216, 90, 89, 265, 'uploads/dropfile/EditorAlbum/IMG_3020.JPG', 897, 1, 'image', '2023-09-24 18:04:01', ''),
(217, 90, 89, 265, 'uploads/dropfile/EditorAlbum/IMG_3018.JPG', 898, 1, 'image', '2023-09-24 18:05:46', ''),
(218, 90, 93, 271, 'uploads/dropfile/EditorAlbum/Screenshot 2023-09-26 at 20.07.56.png', 899, 1, 'image', '2023-09-27 21:37:17', ''),
(219, 90, 93, 271, 'uploads/dropfile/EditorAlbum/Screenshot 2023-09-21 at 10.53.53.png', 900, 1, 'image', '2023-09-27 21:43:04', ''),
(220, 90, 93, 271, 'uploads/dropfile/EditorAlbum/Screenshot 2023-08-25 at 01.19.25.png', 901, 1, 'image', '2023-09-27 21:45:38', ''),
(221, 77, 46, 317, 'https://chery.pk/', 906, 1, 'link', '2023-10-09 12:47:11', ''),
(222, 77, 46, 317, 'uploads/dropfile/EditorAlbum/warranty_1920.jpg', 907, 1, 'image', '2023-10-09 12:48:10', ''),
(223, 77, 46, 317, 'uploads/dropfile/EditorAlbum/10 (1).jpg', 908, 1, 'image', '2023-10-09 12:48:51', ''),
(224, 77, 46, 317, 'uploads/dropfile/EditorAlbum/London, England UK ðŸ‡¬ðŸ‡§ _ A quick tour with aerial view (4K drone footage)_000.webp', 909, 1, 'image', '2023-10-09 12:49:21', ''),
(225, 77, 46, 322, 'uploads/dropfile/EditorAlbum/managed_1920.jpg', 972, 1, 'image', '2023-10-13 13:03:37', ''),
(226, 77, 46, 322, 'uploads/dropfile/EditorAlbum/10 (1).jpg', 972, 1, 'image', '2023-10-13 13:04:11', ''),
(227, 77, 46, 322, 'uploads/dropfile/EditorAlbum/8pro-purple_15316856412570810528_hue3b2f7f72d82c942481a91f739d70969_0_1058x0_resize_q80_lanczos_3.png', 973, 1, 'image', '2023-10-13 13:04:47', ''),
(228, 77, 46, 322, 'uploads/dropfile/EditorAlbum/digital__360.jpg', 974, 1, 'image', '2023-10-13 13:06:37', ''),
(229, 77, 46, 322, 'uploads/dropfile/EditorAlbum/10.jpg', 975, 1, 'image', '2023-10-13 13:07:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `email_bounce`
--

CREATE TABLE `email_bounce` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `letter_id` varchar(250) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_bounce`
--

INSERT INTO `email_bounce` (`id`, `email`, `letter_id`, `dateTime`) VALUES
(1, '', NULL, '2018-01-05 06:59:42'),
(2, '', NULL, '2019-05-09 19:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `email_letters`
--

CREATE TABLE `email_letters` (
  `id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_mail` varchar(255) NOT NULL,
  `reply_to` varchar(255) NOT NULL,
  `return_path` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email_type` varchar(100) NOT NULL DEFAULT 'letter',
  `visible` int(11) NOT NULL DEFAULT 1,
  `order_show` int(11) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_letters`
--

INSERT INTO `email_letters` (`id`, `event`, `from_name`, `from_mail`, `reply_to`, `return_path`, `subject`, `message`, `email_type`, `visible`, `order_show`, `time`) VALUES
(222, 'letter 3', 'test', 'test', 'test@IBMS.com', 'test@IBMS.com', 'test@IBMS.com', 'test@IBMS.com', 'letter', 1, 0, '2014-12-22 11:27:55'),
(223, 'Account register email', 'picmee.com', 'no-reply', '', '', 'Thanks For Registering !     LushLeather.com', '<span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px;\">{{name}} ,</span><br />\r\n<br />\r\n<br />\r\n<br />\r\nEmail:&nbsp;{{email}}<br />\r\n<br />\r\n<br />\r\nLushLeather.com', 'signUp', 1, 0, '2014-12-31 14:01:48'),
(224, 'After Contact Form Submit', 'picmee.com', 'no-reply', '', '', 'Thank you for your request', 'Hello&nbsp;<span font-size:=\"\" helvetica=\"\" style=\"font-family: \">{{name}} ,</span><br />\n<br />\nThank you for your request!<br />\nWe will contact you as soon as possible.', 'contactFormSubmit', 1, 0, '2014-12-31 15:48:53'),
(225, 'Account Verification', 'Account Verification', 'no-reply', 'no-reply@IBMS.com', 'no-reply@IBMS.com', 'Account Verification', 'Dear {{name}}!<br />\r\nThank you for your registration On {{webName}}<br />\r\nPlease verify your account from the link below<br />\r\n{{link}}<br />\r\nYour verification code is : {{code}};', 'verifyEmail', 1, 0, '2014-12-31 16:23:09'),
(226, 'Subscribe Email', 'picmee.com', 'no-reply', '', '', 'LushLeather.com {{name}}', 'LushLeather.com', 'subscribeEmail', 1, 0, '2014-12-31 16:36:19'),
(227, 'Order Status Update {{best_selling_products_last_30_days}}', 'picmee.com Orderstatus', 'no-reply', '', '', 'Order status for {{invoiceNumber}}', 'Hello {{name}},<br />\r\nUpdated status.<br />\r\nOrderstatus: &nbsp;&nbsp;{{invoiceStatus}}', 'orderUpdate', 1, 0, '2014-12-31 16:43:14'),
(264, 'Extra Free Gift Offer', 'stitchingcotton.com', 'no-reply', '', '', 'LushLeather', 'Customer Name: {{cusName}}<br />\r\nCustomer Order No: {{invoiceNumber}}<br />\r\nOrder Date : {{orDate}}<br />\r\n<br />\r\nSorry for the delay/problems with your order.<br />\r\n<br />\r\n{{freeGiftProductsDiv}}', 'freeGiftProductsDiv', 1, 0, '2018-06-04 07:01:32'),
(228, 'Account Create On Order', 'picmee.com', 'no-reply', '', '', 'Welcome to Lushleather {{name}}', 'Hi&nbsp;&nbsp;<span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px;\">{{name}} ,</span><br />\n<br />\nThanks for your order! We hope that the goods will be of benefit and pleasure.<br />\n<br />\nYou can find our terms of purchase <a href=\"https://lushleather.com\">here</a><a href=\"http://lushleather.com\">.</a><br />\n<br />\n<em>Picmee is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.<em style=\"font-size: 16px; line-height: 25px;\"><span style=\"font-size: 14px;\">&nbsp;</span></em></em><br style=\"font-size: 16px; line-height: 25px;\" />\n<br style=\"font-size: 16px; line-height: 25px;\" />\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at&nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"http://www.Picmee.com\">Picmee.com</a></strong>', 'accountCreateOnOrder', 1, 0, '2014-12-31 16:52:44'),
(229, 'Account Password Trouble Shooting {{name}}, {{email}}, {{password}},{{webName}}', 'picmee.com', 'no-reply', '', '', 'Password Recovery', 'Hi {{name}}<br />\n<br />\nYour username is as follows : {{email}}<br />\nThe password is as follows : {{password}}<br />\n<br />\n<a href=\"{{link}}\">LOGIN BY CLICKING HERE</a>&nbsp;<br />\n<br />\n<em>picmee is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.<em style=\"font-size: 16px; line-height: 25px;\"><span style=\"font-size: 14px;\">&nbsp;</span></em></em><br style=\"font-size: 16px; line-height: 25px;\" />\n<br style=\"font-size: 16px; line-height: 25px;\" />\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at&nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"{{link}}\">picmee</a></strong>', 'accountTrouble', 1, 0, '2014-12-31 17:02:05'),
(230, 'Refer To Friend {{name}}, {{email}}, {{link}},{{webName}}', 'picmee.com', 'no-reply', '', '', 'Tips for {{email}}', '<span style=\"font-size:16px;\">Hello,<br />\r\n<br />\r\n<strong>Your friend wants to tell you about a product he can find on lushleather.com.</strong><br />\r\n<br />\r\nClick on the link below to get to the product;<br />\r\n<span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; line-height: 22px;\">{{link}}<br />\r\n<br />\r\nYou can always go in <a href=\"http://www.sharkspeed.se\" target=\"_blank\">www.lushleather.com</a> to see our entire range.</span></span><br />\r\n<br />\r\n<em>Lushleather is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.</em><br />\r\n<br />\r\n<span style=\"font-size:16px;\">Welcome to us at <strong><a href=\"http://www.lushleather.com\">lushleather</a></strong></span><br />\r\n<br />\r\n<br />\r\n<strong><span style=\"font-size: 12px;\">Entered address from the user:&nbsp;</span></strong><span style=\"font-size:12px;\"><span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">{{email}}</span></span><br />\r\n<br />\r\n&nbsp;', 'ReferToFriend', 1, 0, '2014-12-31 17:02:05'),
(231, 'salesTriggerMail {{name}}, {{email}}, {{link}},{{webName}}, {{product}}, {{shrt_desc}}', 'picmee.com', 'no-reply', '', '', 'The product you were looking for has been lowered in price', 'Hello,<br />\r\n<br />\r\nWe would like to inform you about the product &nbsp;{{product}} has now been lowered in price.<br />\r\n<br />\r\nThank you for adding a price reduction watch to this product.<br />\r\nVisit us today and see the new price.<br />\r\n<br />\r\nProduct:<br />\r\n{{product}}<br />\r\n<br />\r\nLink to the product:<br />\r\n{{link}}<br />\r\n<br />\r\nShort description:<br />\r\n{{shrt_desc}}<br />\r\n<br />\r\nLushleather is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.<br style=\"font-size: 16px; line-height: 25px;\" />\r\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at&nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"http://www.lushleather.com\">lushleather.com</a></strong><br />\r\n<br />\r\n&nbsp;', 'salesTriggerMail', 1, 0, '2014-12-31 17:02:05'),
(232, 'orderThankYouMail {{name}}, {{email}}, {{link}},{{webName}}', 'picmee.com', 'no-reply', '', '', 'Thanks for your order! We hope that the goods will be of benefit and pleasure to Lushleather.', 'Hi&nbsp;<span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px;\">{{name}} ,</span><br />\r\n<br />\r\nThanks for your order! We hope that the goods will be of benefit and pleasure.<br />\r\n<br />\r\nYou can find our terms of purchase <a href=\"https://lushleather.com/products\">here</a><a href=\"http://lushleather.com/products\">.</a><br />\r\n<br />\r\n<em>LushLeather is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.</em><br style=\"font-size: 16px; line-height: 25px;\" />\r\n<br style=\"font-size: 16px; line-height: 25px;\" />\r\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at&nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"http://www.lushleather.com\">lushleather.com</a></strong><br />\r\n<br />\r\n<br />\r\n<br />\r\nBelow you can read more about the right of withdrawal<br />\r\n<br />\r\n<em>Right of withdrawal (Only for private persons)</em><br />\r\n<br />\r\n<em>If you are not satisfied with something you ordered, you have 14 days to cancel after you received the item, provided that you have not used the item and that it is returned in substantially unchanged condition. On return / exchange, you as a customer are responsible for the return to us for the goods you wish to return / exchange. Please use the same bag / carton in which you received the goods. The product should be returned in the same condition as when you bought it.</em><br />\r\n<br />\r\n<em><strong>Return / Byte</strong></em><br />\r\n<br />\r\n<em>When exchanging, returning or complaining, we follow the Consumer Agency&#39;s rules for e-commerce. If the item (s) are used, the return is not accepted (you can of course try the goods, but do not use them if you wish to return or exchange). If the item (s) lacks labels even if the garment is unused, Lushleather will have to deduct 30% on the item value. Then we will not be able to resell the product (s) to any new customer. Generally, it takes about 10 business days from the time we registered your return until you receive the refund. Please note that the right of withdrawal and the right of exchange apply to non-customized orders. Read more about this under &ldquo;Dimensional orders&rdquo;. We follow the recommendations of the General Complaints Board. You have the right as a customer to open the packaging at no cost to check that the product works. You have the right as a customer to open the packaging at no cost to check that the product works. If the product is over, then you as a customer have the right to cancel your purchase. Please note that a copy of the receipt must be enclosed with the package and the reason for the return.<br />\r\n<br />\r\nThe right of withdrawal applies to the entire Lushleather range. Right of withdrawal does not apply to goods that have been put into service. As a customer you are obliged to check your delivery. When we have received the goods back and made an assessment of the return based on the condition of the goods, we will, within 14 days of receipt of the return, pay back the amount you paid, and fees for the entire order will be returned. NOTE! It usually takes about 2 weeks from the time you send your return to us before you receive a refund. In exceptional cases, it can take up to 30 days for a refund, which is the maximum time according to law. Please contact us before returning the goods, we can then reduce the handling time so that you as a customer will be satisfied. Click on &quot;Contact Us&quot; and send your inquiry away.<br />\r\n<br />\r\nWhen replacing send with a copy of the receipt and write down which item (s) you wish to exchange. If the item is in stock it will be shipped immediately. The return shipping costs are the responsibility of the customer. In the case of a complaint / return / exchange there is the possibility to purchase contract discounted shipping notes directly from our website. We will then send a shipping note to you via email which you then print and put on the package and submit it to your nearest delivery office (Posten). When purchasing shipping notes from our website, the processing time is reduced considering that the package is sent as a Business package and will be delivered to us the next day. If you choose to send the parcel as usual Post parcels, the handling time will be longer as the parcel should be personally picked up from the nearest service point.<br />\r\n<br />\r\nThe package is sent to:<br />\r\nLush Leather<br />\r\nTel:&nbsp;</em>08-40307560<br />\r\n<br />\r\n<em><strong>Guarantees</strong><br />\r\n<br />\r\nWarranty is given by the manufacturer, distributor or seller and applies to all defects in the product that are not caused by the user through negligence or intentional use. All products in our range are covered by at least one (1) year warranty unless otherwise stated. In cases where a manufacturer / supplier provides a longer warranty period than one (1) year, the product is of course covered by this warranty period. When guaranteeing matters we contact our suppliers, therefore the handling can take a few working days.</em>', 'orderThankYouMail', 1, 0, '2014-12-31 17:02:05'),
(233, 'notReturningCustomer {{name}}, {{email}}, {{link}},{{webName}}', 'picmee.com', 'helpdesk', '', '', 'We miss you {{name}}', 'Hi&nbsp;<span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px;\">{{name}} ,</span><br />\r\n<br />\r\nYou haven&#39;t visited us in a while and we would love to have you visit.<br />\r\nAs a thank you, we want to give you a gift card that you can use on our website.<br />\r\nWe would appreciate if you could reply to this email with your contact details and we will send you a gift card.<br />\r\n<br />\r\nWelcome back to us :<span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px;\">&nbsp;{{name}}</span><br />\r\n<br />\r\nWe hope to be of benefit and pleasure.<br />\r\n<br />\r\n<em>LusLeather is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection<em style=\"font-size: 16px; line-height: 25px;\"><span style=\"font-size: 14px;\">.&nbsp;</span></em></em><br style=\"font-size: 16px; line-height: 25px;\" />\r\n<br style=\"font-size: 16px; line-height: 25px;\" />\r\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at&nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"http://www.lushleather.com\">lushleather.com</a></strong><br />\r\n<br />\r\n&nbsp;', 'notReturningCustomer', 1, 0, '2014-12-31 17:02:05'),
(234, 'couponOfferEmail', 'picmee.com', 'no-reply', '', '', 'Thank you', '<br />\r\nThank you for subscribing to our newsletter. We will send them the latest discount codes to you.<br />\r\nSo keep an eye out for them latest offers.<br />\r\n<br />\r\nSharkspeed is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.<br />\r\n<br />\r\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at&nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"http://www.lushleather.com\">lushleather.com</a></strong><br />\r\n<br />\r\nEntered address from the user<strong style=\"font-size: 16px; line-height: 25px;\"><span style=\"font-size:12px;\">:&nbsp;</span></strong><span style=\"font-size:12px;\"><span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">{{email}}</span></span><br />\r\n&nbsp;', 'couponOfferEmail', 1, 0, '2014-12-31 17:02:05'),
(235, 'AskQuestion {{subject}},{{question}},{{reply}}', 'picmee.com', 'no-reply', '', '', 'Your question has been answered {{name}}', 'Hi Thanks for your question.<br />\r\n<br />\r\nYour question was:<br />\r\n{{question}}<br />\r\n<br />\r\n<br />\r\nThe answer is as follows:<br />\r\n{{reply}}<br />\r\n<br />\r\n<br />\r\nLushLeathe is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.<br style=\"font-size: 16px; line-height: 25px;\" />\r\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at&nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"http://www.lushleather.com\">lushleather.se</a></strong>', 'AskQuestion ', 1, 0, '2014-12-31 17:02:05'),
(236, 'When measurement Submit {{invoiceNumber}},{{link}} pdfLink', 'picmee.com', 'no-reply', '', '', 'Order Confirmation - Size Form', 'Thank you for your custom order order.<br />\r\n<br />\r\nWe will start production of your order as soon as possible.<br />\r\nLog in to &quot;My Account&quot; to track your order status.<br />\r\n<br />\r\nConfirmation of your sizes {{link}}<br />\r\n<br />\r\nBest regards LushLeather.<br />\r\n&nbsp;', 'measurementSubmitClient', 1, 0, '2014-12-31 17:02:05'),
(237, 'Measure_email_on_invoice_create {{invoiceNumber}},{{link}} invoice link', 'picmee.com', 'no-reply', '', '', 'We are waiting for your measurements.', '<strong><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">To reply to this message&nbsp;</span><span style=\"font-size: 18px;\"><a href=\"mailto:helpdesk@lushleather.com\"><span style=\"color: rgb(0, 0, 255);\">Click here.</span></a></span><br style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard;\" />\r\n<span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">( If the link does not work, please copy and paste the email address into a new message window:&nbsp;</span><a __postbox-detected-content=\"__postbox-detected-email\" class=\"__postbox-detected-content __postbox-detected-email\" style=\"color: rgb(0, 0, 0); caret-color: rgb(0, 0, 0); font-family: -webkit-standard;\">helpdesk@lushleather.com</a><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">)</span><br />\r\n<span style=\"color: rgb(255, 0, 0);\"><span style=\"caret-color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">Note that you must respond to the e-mail address listed above!</span></span></strong><br />\r\n<br />\r\nFill in the size form here {{link}}<br />\r\n<br />\r\n<br />\r\n&nbsp;\r\n<div style=\"color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, Helvetica, Verdana, sans-serif; font-size: 12px; line-height: normal;\">We at LushLeather are the first to offer an online measure entry solution. We want to make it easier and safer for the customer. Away with lots of paper here and there. Everything has to be fixed online and it should feel like we are available to help you with the measurements whenever you want. In our online solution you can see exactly how you measure with our descriptive images and we have also included a video when we measure a person in different sizes. You then know exactly how you measure and no misunderstandings take place. When everything is ready, confirmation will be sent to you. Both we and you want the product to be perfect at delivery and that is why we have worked out this solution. Below you will see how it works when ordering a dimension.<br />\r\n<br />\r\nLushLeather is proud to offer customized orders at low prices. For a custom-made order, it is very important that you check your measurements very carefully and follow our recommendations and step by step help with measuring. The right of withdrawal and the right of exchange do not apply to custom-made orders.<br />\r\nFor faulty products, the dimensions you specified are checked with the dimensions of the product. Note that the factory adds 3-10 cm in dimensions depending on the location for optimum mobility of the product.<br />\r\n<br />\r\n<br />\r\n&nbsp;</div>\r\n', 'Measure_email_on_invoice_create', 1, 0, '2014-12-31 17:02:05'),
(238, 'LushLeather.com', 'picmee.com', 'noreply', 'VIP', 'VIP', 'TESTA FRÃ…GA', '<style type=\"text/css\">.allProductInfo {\r\n                        float: left;\r\n                        width: 225px;\r\n                        padding: 5px;\r\n                        background: #ddd;\r\n                        margin: 8px;\r\n                        height: 200px;\r\n                        position: relative;\r\n                    }\r\n                    .allProductInfo .pImg {\r\n                        height: 160px;\r\n                        text-align: center;\r\n                        width: 100%;\r\n                    }\r\n                    .allProductInfo .pName {\r\n                        position: absolute;\r\n                        bottom: 0;\r\n                        left: 0;\r\n                        background: #ccc;\r\n                        width: 100%;\r\n                        text-align: center;\r\n                    }\r\n                    .allProductInfo .pImg img {\r\n                        max-height: 100%;\r\n                        max-width: 100%;\r\n                    }\r\n                    .allProductInfo .oldPrice {\r\n                        font-size: 11px;\r\n                        text-decoration: line-through;\r\n                        color: red;\r\n                    }\r\n</style>\r\n<br />\r\n&nbsp;\r\n<div class=\"allProductInfo\">\r\n<div class=\"pImg\"><a href=\"http://sharkspeed.com/products?product=1304\"><img src=\"http://sharkspeed.com/src/image.php?resize=true&amp;width=auto&amp;height=160&amp;image=http://sharkspeed.com/images/ajax/product/2015/07/1304_790_reformndetmain.jpg\" /></a></div>\r\n\r\n<div class=\"pName\"><a href=\"http://sharkspeed.com/products?product=1304\">Alive Reform Leather Jacka<br />\r\n<span class=\"oldPrice\">4195 SEK</span> <span class=\"NewDiscountPrice\">2399 SEK</span> </a></div>\r\n</div>\r\n\r\n<div class=\"allProductInfo\">\r\n<div class=\"pImg\"><a href=\"http://sharkspeed.com/products?product=1336\"><img src=\"http://sharkspeed.com/src/image.php?resize=true&amp;width=auto&amp;height=160&amp;image=http://sharkspeed.com/images/ajax/product/2015/07/1336_259_blackpanthermndet.jpg\" /></a></div>\r\n\r\n<div class=\"pName\"><a href=\"http://sharkspeed.com/products?product=1336\">Mc Jacka Alive Black Panther<br />\r\n<span class=\"oldPrice\">2699 SEK</span> <span class=\"NewDiscountPrice\">1299 SEK</span> </a></div>\r\n</div>\r\n\r\n<div class=\"allProductInfo\">\r\n<div class=\"pImg\"><a href=\"http://sharkspeed.com/products?product=1368\"><img src=\"http://sharkspeed.com/src/image.php?resize=true&amp;width=auto&amp;height=160&amp;image=http://sharkspeed.com/images/ajax/product/2015/08/1368_231_20150812ret_220.jpg\" /></a></div>\r\n\r\n<div class=\"pName\"><a href=\"http://sharkspeed.com/products?product=1368\">Alive Lady Denim CE MC Jacka<br />\r\n<span class=\"oldPrice\">1999 SEK</span> <span class=\"NewDiscountPrice\">999 SEK</span> </a></div>\r\n</div>\r\n\r\n<div class=\"allProductInfo\">\r\n<div class=\"pImg\"><a href=\"http://sharkspeed.com/products?product=1382\"><img src=\"http://sharkspeed.com/src/image.php?resize=true&amp;width=auto&amp;height=160&amp;image=http://sharkspeed.com/images/ajax/product/2015/07/1382_412_retromndet.jpg\" /></a></div>\r\n\r\n<div class=\"pName\"><a href=\"http://sharkspeed.com/products?product=1382\">Alive Retro Leather mc skinnjacka<br />\r\n<span class=\"oldPrice\">3195 SEK</span> <span class=\"NewDiscountPrice\">1895 SEK</span> </a></div>\r\n</div>\r\n', 'letter', 1, 0, '2015-11-04 20:29:02'),
(240, 'return Product Update {{invoiceStatus}},{{invoiceNumber}}', 'picmee.comReturn Product Status', 'no-reply', '', '', 'return Product Update orderstatus {{invoiceNumber}}', 'Return product Status<br />\r\n<br />\r\nHi {{name}},<br />\r\nYour order has now received an updated status.<br />\r\nOrder status is now changed to: {{invoiceStatus}}<br />\r\nLog in to your account with us to see more details:', 'return_Product_Update', 1, 0, '2016-01-07 11:39:02'),
(241, 'todayOffer, send on invoice generate', 'picmee.com', 'helpdesk', '', '', 'Thank you for order ', '<strong><span style=\"font-size:26px;\">Enter here your Content </span></strong><br />\r\n<br />\r\n&nbsp;', 'todayOffer', 1, 0, '2016-01-07 11:39:02'),
(242, 'stockTriggerMail {{name}}, {{email}}, {{link}},{{webName}}, {{product}}, {{shrt_desc}}', 'picmee.com', 'no-reply', '', '', 'The product you were looking for has been lowered in price', '<br />\r\nHello,<br />\r\n<br />\r\nWe want to let you know that the product {{product}} has now been lowered in price.<br />\r\n<br />\r\nThank you for adding a price reduction watch to this product.<br />\r\nVisit us today and see the new price.<br />\r\n<br />\r\nproduct:<br />\r\n{{product}}<br />\r\n<br />\r\nLink to the product:<br />\r\n{{link}}<br />\r\n<br />\r\nShort description:<br />\r\n{{shrt_desc}}<br />\r\n<br />\r\nLushLeather is a leader in Motorsport clothing &amp; accessories. With us you will find everything you could possibly need when going out on the roads. We have trousers, jackets and racks in both textiles and leather. We also have a wide range of various helmets, shoes, gloves and protection.<br style=\"font-size: 16px; line-height: 25px;\" />\r\n<br style=\"font-size: 16px; line-height: 25px;\" />\r\n<span style=\"font-size: 16px; line-height: 25px;\">Welcome to us at &nbsp;</span><strong style=\"font-size: 16px; line-height: 25px;\"><a href=\"http://www.lushleather.com\">lushleather.com</a></strong><br />\r\n<br />\r\n&nbsp;', 'stockTriggerMail', 1, 0, '2016-01-07 11:39:02'),
(251, 'Made To Measure Email', 'picmee.com', 'helpdesk', '', '', 'Thank you for your customized order - Download the form', '<strong><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">To reply to this message&nbsp;</span><span style=\"font-size: 18px;\"><a href=\"mailto:helpdesk@lushleather.com\"><span style=\"color: rgb(0, 0, 255);\">Click here.</span></a></span><br style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard;\" />\r\n<span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">( If the link does not work, please copy and paste the email address into a new message window:&nbsp;</span><a __postbox-detected-content=\"__postbox-detected-email\" class=\"__postbox-detected-content __postbox-detected-email\" style=\"color: rgb(0, 0, 0); caret-color: rgb(0, 0, 0); font-family: -webkit-standard;\">helpdesk@lushleather.com</a><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">)</span><br />\r\n<span style=\"color: rgb(255, 0, 0);\"><span style=\"caret-color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">Note that you must reply to the Email address listed above!</span></span></strong><br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:22px;\"><strong>Thank you for your custom made order.&nbsp;</strong></span><br />\r\n<br />\r\nLushLeather is proud to offer customized orders at low prices. For a custom-made order, it is very important that you check your measurements very carefully and follow our recommendations and step by step help with measuring. The right of withdrawal and the right of exchange do not apply to custom-made orders. For faulty products, the dimensions you specified are checked with the dimensions of the product. Note that the factory adds 3-10 cm in dimensions depending on the location for optimum mobility of the product. After receiving your order, your size is checked. Note that this product&#39;s price is for body size up to 3XL. For larger body sizes, there is an additional cost of SEK 100 / textile, SEK 150 / leather per size exceeding. The additional cost is calculated by a LushLeather handler after receiving your body measurements. The delivery time is between 12 - 20 working days depending on the seasonal load. Dimensional solutions cannot be ordered as postal advances.<br />\r\nWhen measuring in store with employee, a fee of SEK 395 is charged.<br />\r\n<br />\r\nAll extra fees are charged in advance and before production begins.<br />\r\n<br />\r\n<strong>Please fill in the form manually:</strong><br />\r\nDownload the form and fill it in manually and then email us your measurements.<br />\r\n<br />\r\nLink to PDF file: &nbsp; &nbsp;<a href=\"http://www.lushleather.com/measure.pdf\" target=\"_blank\">Click here to download the PDF file</a><br />\r\n<br />\r\nLink to Excel file: &nbsp;&nbsp;<a href=\"http://www.lushleather.com/measure.xlsx\" target=\"_blank\">Click here to download the Excel file</a><br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;', 'madeToMeasurePdf', 1, 0, '2017-10-05 07:31:44'),
(252, '12 days delay', 'picmee.com', 'no-reply', '', '', 'Hops - Your order is delayed', '<strong><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">To reply to this message&nbsp;</span><span style=\"font-size: 18px;\"><a href=\"mailto:helpdesk@lushleather.com\"><span style=\"color: rgb(0, 0, 255);\">Click here.</span></a></span><br style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard;\" />\r\n<span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">( If the link does not work, please copy and paste the email address into a new message window:&nbsp;</span><a __postbox-detected-content=\"__postbox-detected-email\" class=\"__postbox-detected-content __postbox-detected-email\" style=\"color: rgb(0, 0, 0); caret-color: rgb(0, 0, 0); font-family: -webkit-standard;\">helpdesk@lushleather.com</a><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">)</span><br />\r\n<span style=\"color: rgb(255, 0, 0);\"><span style=\"caret-color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">Note that you must reply to the Email address listed above!</span></span></strong><br />\r\n<br />\r\n<br />\r\nHello,<br />\r\n<br />\r\nWe will contact you regarding your order you placed with us at LushLeather.<br />\r\nUnfortunately, we must announce that it has been delayed and the delivery time will be within 12 days.<br />\r\nWe apologize for this and hope that you have remorse regarding the delay.<br />\r\n<br />\r\nThank you for your patience.<br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;', 'orderTemplate1', 1, 1, '2017-10-05 07:31:44'),
(253, 'Your order will be delivered after New Year', 'picmee.com', 'no-reply', '', '', 'Your order will be delivered after New Year', '<strong><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">To reply to this message&nbsp;</span><span style=\"font-size: 18px;\"><a href=\"mailto:helpdesk@lushleather.com\"><span style=\"color: rgb(0, 0, 255);\">Click here.</span></a></span><br style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard;\" />\r\n<span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">( If the link does not work, please copy and paste the email address into a new message window:&nbsp;</span><a __postbox-detected-content=\"__postbox-detected-email\" class=\"__postbox-detected-content __postbox-detected-email\" style=\"color: rgb(0, 0, 0); caret-color: rgb(0, 0, 0); font-family: -webkit-standard;\">helpdesk@lushleather.com</a><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">)</span><br />\r\n<span style=\"color: rgb(255, 0, 0);\"><span style=\"caret-color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">Note that you must reply to the Email address listed above!</span></span></strong><br />\r\n<br />\r\n<br />\r\nHello,<br />\r\n<br />\r\nUnfortunately, we must announce that your order will be delivered after New Year.<br />\r\nWe work feverishly to be able to deliver this as soon as possible.<br />\r\n<br />\r\nWe hope you have patience for this. Contact the customer service if you want to change your order or possibly switch to another similar product.<br />\r\n<br />\r\n&nbsp;', 'orderTemplate1', 1, 1, '2017-10-05 07:31:44'),
(254, 'CLAIM INQUIRY', 'picmee.com', 'helpdesk', '', '', 'complaints Registration', '<strong><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">To reply to this message&nbsp;</span><span style=\"font-size: 18px;\"><a href=\"mailto:helpdesk@lushleather.com\"><span style=\"color: rgb(0, 0, 255);\">Click here.</span></a></span><br style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard;\" />\r\n<span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">( If the link does not work, please copy and paste the email address into a new message window:&nbsp;</span><a __postbox-detected-content=\"__postbox-detected-email\" class=\"__postbox-detected-content __postbox-detected-email\" style=\"color: rgb(0, 0, 0); caret-color: rgb(0, 0, 0); font-family: -webkit-standard;\">helpdesk@lushleather.com</a><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">)</span><br />\r\n<span style=\"color: rgb(255, 0, 0);\"><span style=\"caret-color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">Note that you must respond to the e-mail address listed above!</span></span></strong><br />\r\n<br />\r\n<br />\r\nHello,<br />\r\n<br />\r\nThank you for your e-mail and I apologize for what happened!<br />\r\n<br />\r\nTo check your complaint, we need the following from you in an email:<br />\r\n<br />\r\nPlease take a picture<br />\r\n- full view of the product from the front or back from where the problem occurred.<br />\r\n<br />\r\nIn addition, we would also like to ask you for a brief description of<br />\r\n- how the events happened when the defect occurred<br />\r\n- when the problem was detected<br />\r\n- how the garment is washed. Temperature / program / drying method<br />\r\n<br />\r\n<br />\r\nWith that information, I forward since the matter to our complaint department.<br />\r\nThen I will contact you and guide you through your complaint.<br />\r\n<br />\r\nIf you have more questions, you are welcome to contact us, I will be happy to help you.<br />\r\n<br />\r\n<br />\r\n<br />\r\nregards,\r\n<p>LushLeather Customer Support Team</p>\r\n\r\n<p>Phone number: 0840307560</p>\r\n', 'orderTemplate1', 1, 1, '2017-10-05 07:31:44'),
(255, 'Size out of stock', 'picmee.com', 'helpdesk', '', '', 'The size you ordered is out of stock', '<strong><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">To reply to this message&nbsp;</span><span style=\"font-size: 18px;\"><a href=\"mailto:helpdesk@lushleather.com\"><span style=\"color: rgb(0, 0, 255);\">Click here.</span></a></span><br style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard;\" />\r\n<span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">( If the link does not work, please copy and paste the email address into a new message window:&nbsp;</span><a __postbox-detected-content=\"__postbox-detected-email\" class=\"__postbox-detected-content __postbox-detected-email\" style=\"color: rgb(0, 0, 0); caret-color: rgb(0, 0, 0); font-family: -webkit-standard;\">helpdesk@lushleather.com</a><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">)</span><br />\r\n<span style=\"color: rgb(255, 0, 0);\"><span style=\"caret-color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">Note that you must respond to the e-mail address listed above!</span></span></strong><br />\r\n<br />\r\n<br />\r\nHello,<br />\r\n<br />\r\nUnfortunately, we have to announce that one / more product sizes you ordered are sold out.<br />\r\n<br />\r\nProduct / s this relates to the following:<br />\r\n<br />\r\n<br />\r\nPlease contact us for size change or product change. You can either email us or call us during our support times.<br />\r\nVisit our website to see what sizes can be ordered.<br />\r\n<br />\r\n&nbsp;', 'orderTemplate1', 1, 1, '2017-10-05 07:31:44'),
(256, 'Delayed order', 'picmee.com', 'helpdesk', '', '', 'Your order is delayed', '<br />\r\n<strong><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">To reply to this message&nbsp;</span><span style=\"font-size: 18px;\"><a href=\"mailto:helpdesk@sharkspeed.com\"><span style=\"color: rgb(0, 0, 255);\">click here.</span></a></span><br style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard;\" />\r\n<span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">( If the link does not work, please copy and paste the email address into a new message window:&nbsp;</span><a __postbox-detected-content=\"__postbox-detected-email\" class=\"__postbox-detected-content __postbox-detected-email\" style=\"color: rgb(0, 0, 0); caret-color: rgb(0, 0, 0); font-family: -webkit-standard;\">helpdesk@lushleather.com</a><span style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">)</span><br />\r\n<span style=\"color: rgb(255, 0, 0);\"><span style=\"caret-color: rgb(0, 0, 0); font-family: -webkit-standard; font-size: medium;\">Note that you must reply to the Email address listed above!</span></span></strong><br />\r\n<br />\r\nHello,<br />\r\n<br />\r\nUnfortunately, we must notify you that your order is delayed.<br />\r\nExpected delivery is about:<br />\r\n<br />\r\n&nbsp;', 'orderTemplate1', 1, 1, '2017-10-05 07:31:44'),
(257, 'Gift Card From Order', 'picmee.com', 'no-reply', '', '', 'You have received a gift from LushLeather', 'Hi,<br />\r\n<br />\r\nWe want to send you a gift card that you can use LushLeather.<br />\r\nThe gift card can be used in our online store. Use the value code at checkout to make a payment. We miss you and hope for a visit from you.<br />\r\n<br />\r\n<span style=\"font-size:18px;\"><strong>Presentkorts ID:</strong> {{giftCard}}</span><br />\r\n<br />\r\nregards/<br />\r\n<br />\r\nLushLeather', 'GiftCardFromOrder', 1, 1, '2018-06-04 07:01:32'),
(258, 'Order Extra Payment ', 'picmee.com', 'no-reply', '', '', 'LushLeather Additional payment for your order/ Order Extra Payment ', '<br />\r\nHi there,<br />\r\n<br />\r\nWe have now gone through your order and you need to pay additional money for your order to process.<br />\r\nBelow is the iinformation regarding your order:<br />\r\n<br />\r\nYour order number : {{invoiceNumber}}<br />\r\n<br />\r\nAmount regarding:&nbsp;{{ExtraPayDesc}}<br />\r\nAmount to pay:&nbsp;{{ExtraPayment}}<br />\r\n<br />\r\nPay safe with Klarna Checkout - Click the link:&nbsp;{{ExtraPayLink}}<br />\r\n<br />\r\nRegards/<br />\r\n<br />\r\nLushLeather<br />\r\n&nbsp;', 'orderExtraPayment', 1, 0, '2018-06-04 07:01:32'),
(259, 'Extra Sales Offer', 'picmee.com', 'no-reply', '', '', 'Super Offer', '<div style=\"text-align: center;\"><strong><span style=\"font-size:26px;\">SUPER OFFER</span></strong><br />\r\n<br />\r\n<span style=\"font-size:18px;\">Thank you for your order. As a thank you, we want to give you an AMAZING offer.<br />\r\nYou can now buy these products for unbeatable great prices.<br />\r\nBut hurry, the offer is only valid for 72 hours and only when you click through via email.<br />\r\n<br />\r\n<strong>Don&#39;t pull out the offer - make the most of the energy while you have it...</strong></span><br />\r\n<br />\r\n{{extraSalesOffer}}<br />\r\n<br />\r\n<strong style=\"font-size: 18px; text-align: center;\">Place your order today!<br />\r\n<br />\r\nlushleather.com</strong><br />\r\n&nbsp;</div>\r\n', 'extraSalesOffer', 1, 0, '2018-06-04 07:01:32'),
(260, 'userReviewMail {{name}}, {{email}}, {{link}},{{webName}}', 'picmee.com', 'no-reply', '', '', 'Write Your Reviews about Product', '{{product}}<br />\r\n<br />\r\n&nbsp; {{link}}', 'userReviewMail', 1, 0, '2018-06-04 11:01:32'),
(261, 'this is email contant', 'form name', '123', 'picmee.com', 'picmee.com', 'subject', 'email text here', 'letter', 1, 1, '2019-03-06 11:44:23'),
(262, 'checkoutMail {{name}}, {{email}}, {{link}},{{webName}}', 'picmee.com', 'no-reply', '', '', '2 hours remind the custumer to come back and proceed with the checkout', 'Please Proceed To Check Out :--<br />\r\n<br />\r\n{{link}}', 'checkoutMail1', 1, 0, '2018-06-04 11:01:32'),
(263, 'checkoutMail {{name}}, {{email}}, {{link}},{{webName}}', 'picmee.com', 'no-reply', '', '', '1 day remind the custumer to come back and proceed with the checkout', 'Please Proceed To Check Out :--<br />\r\n<br />\r\n{{link}}', 'checkoutMail2', 1, 0, '2018-06-04 11:01:32'),
(265, 'After Inquiry Form Submit', 'picmee.com', 'no-reply', '', '', 'Thank you for your Support', 'Hello&nbsp;<span font-size:=\"\" helvetica=\"\">{{name}} ,</span><br />\r\n<br />\r\nThank you for your Support!<br />\r\nWe will contact you soon.', 'inquiryFormSubmit', 1, 0, '2014-12-31 15:48:53'),
(266, 'After Feedback Form Submit', 'picmee.com', 'no-reply', '', '', 'Thank you for your inquiry', 'Hello&nbsp;<span font-size:=\"\" helvetica=\"\">{{name}} ,</span><br />\r\n<br />\r\nThank you for your Support!<br />\r\nWe will contact you soon.', 'feedbackFormSubmit', 1, 0, '2014-12-31 15:48:53'),
(268, 'After tailor Form Submit', 'tailorbazar.com', 'no-reply', '', '', 'Thank you for submit tailor form', 'Hello&nbsp;<span font-size:=\"\" helvetica=\"\">{{name}} ,</span><br />\r\n<br />\r\nThank you for your Support!<br />\r\nWe will contact you soon.', 'tailorform', 1, 0, '2014-12-31 15:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `email_letter_queue`
--

CREATE TABLE `email_letter_queue` (
  `id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `grp` varchar(250) DEFAULT NULL,
  `email_name` varchar(250) DEFAULT NULL,
  `email_to` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `p_id` int(11) NOT NULL DEFAULT 0,
  `scale_id` int(11) NOT NULL DEFAULT 0,
  `color_id` int(11) NOT NULL DEFAULT 0,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_letter_queue`
--

INSERT INTO `email_letter_queue` (`id`, `letter_id`, `grp`, `email_name`, `email_to`, `status`, `p_id`, `scale_id`, `color_id`, `store_id`, `dateTime`) VALUES
(33, 242, 'StockTrigger', '', 'gunnar.frydenlund@scania.no', 0, 2960, 0, 0, 6, '2019-05-07 02:09:04'),
(34, 242, 'StockTrigger', '', 'jimmy_lindskog@hotmail.com', 0, 3307, 0, 0, 6, '2019-05-07 02:09:04'),
(35, 242, 'StockTrigger', '', 'matte_eriksson@live.se', 0, 3335, 0, 0, 6, '2019-05-07 02:09:05'),
(36, 242, 'StockTrigger', '', 'eduardaszamascikovas@gmail.com', 0, 3405, 0, 0, 6, '2019-05-07 02:09:05'),
(37, 242, 'StockTrigger', '', 'den_rare@hotmail.com', 0, 3411, 0, 0, 6, '2019-05-07 02:09:05'),
(38, 242, 'StockTrigger', '', 'ferdy_@live.se', 0, 3411, 0, 0, 6, '2019-05-07 02:09:05'),
(40, 242, 'StockTrigger', '', 'latysild@online.no', 0, 3414, 0, 0, 6, '2019-05-07 02:09:05'),
(41, 242, 'StockTrigger', '', 'kalle2420@gmail.com', 0, 3434, 87335, 0, 6, '2019-05-07 02:09:05'),
(42, 242, 'StockTrigger', '', 's.rydell@yahoo.se', 0, 3466, 0, 0, 6, '2019-05-07 02:09:05'),
(43, 242, 'StockTrigger', '', 'angela.malmborg@outlook.com', 0, 3644, 0, 0, 6, '2019-05-07 02:09:05'),
(44, 242, 'StockTrigger', '', 'ritva74@gmail.com', 0, 3955, 98413, 0, 6, '2019-05-07 02:09:05'),
(45, 242, 'StockTrigger', '', 'simonmage77@gmail.com', 0, 4011, 0, 0, 6, '2019-05-07 02:09:05'),
(46, 242, 'StockTrigger', '', 'koloflores18@hotmail.com', 0, 4095, 0, 0, 6, '2019-05-07 02:09:05'),
(47, 242, 'StockTrigger', '', 'haltta@hotmail.com', 0, 4101, 105923, 0, 6, '2019-05-07 02:09:05'),
(48, 242, 'StockTrigger', '', 'abdirahmi99@gmail.com', 0, 4310, 0, 0, 6, '2019-05-07 02:09:06'),
(49, 242, 'StockTrigger', '', 'sundstrom76@gmail.com', 0, 4316, 0, 0, 6, '2019-05-07 02:09:06'),
(50, 242, 'StockTrigger', '', 'tanja.pihlavamaki@gmail.com', 0, 4419, 124115, 0, 6, '2019-05-07 02:09:06'),
(51, 242, 'StockTrigger', '', 'sundstrom76@gmail.com', 0, 4426, 0, 0, 6, '2019-05-07 02:09:06'),
(55, 242, 'StockTrigger', '', 'vegard.ofstaas@hebb.no', 0, 4462, 0, 0, 6, '2019-05-07 02:09:06'),
(56, 242, 'StockTrigger', '', 'hans.stenstrom@gmail.com', 0, 4462, 0, 0, 6, '2019-05-07 02:09:06'),
(58, 242, 'StockTrigger', '', 'drablo@yahoo.no', 0, 4467, 0, 0, 6, '2019-05-07 02:09:06'),
(59, 242, 'StockTrigger', '', 'cubarennie@gmail.com', 0, 4585, 0, 0, 6, '2019-05-07 02:09:06'),
(60, 242, 'StockTrigger', '', 'knutroald3@gmail.com', 0, 4598, 0, 0, 6, '2019-05-07 02:09:06'),
(61, 242, 'StockTrigger', '', 'linn.svela@gmail.com', 0, 4665, 137820, 0, 6, '2019-05-07 02:09:06'),
(62, 242, 'StockTrigger', '', 'permsvensson@hotmail.com', 0, 4724, 0, 0, 6, '2019-05-07 02:09:06'),
(63, 242, 'StockTrigger', '', 'janne_oja@hotmail.com', 0, 4764, 0, 0, 6, '2019-05-07 02:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `email_subscribe`
--

CREATE TABLE `email_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `grp` varchar(250) NOT NULL DEFAULT 'new',
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_subscribe`
--

INSERT INTO `email_subscribe` (`id`, `email`, `name`, `verify`, `grp`, `dateTime`) VALUES
(1, 'dureali@imedia.com.pk', NULL, 0, 'new', '2020-04-02 06:57:45'),
(4, 'ahmisolution@gmail.com', NULL, 0, 'new', '2020-04-02 09:25:57'),
(5, 'dureali@gmail.com', NULL, 0, 'new', '2020-05-02 10:25:30'),
(7, 'abc@gmail.com', NULL, 1, 'new', '2021-12-22 07:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `event_header` text NOT NULL,
  `event_message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `order_id`, `user_id`, `event_name`, `event_type`, `event_header`, `event_message`, `date`) VALUES
(216, 323, 46, 'demo12', 'Birthday', 'demo test1123', '21321', '2023-10-13'),
(214, 319, 46, 'world cup', 'Holy Day', 'Holy day', 'pakistan', '2023-10-12'),
(215, 322, 46, 'New Testing14', 'Birthday', 'demo test', 'sdfs fsd fsd', '2023-10-13'),
(213, 318, 46, 'New Testing41', 'Holy Day', 'demo test', 'testinff s', '2023-10-09'),
(212, 317, 46, 'New Testing', 'Birthday', 'demo test1 new', 'testing', '2023-10-09'),
(210, 311, 46, 'world cup', 'Holy Day', '1 day', 'hello ', '2023-10-06'),
(211, 312, 46, 'My Birthday', 'Birthday', 'this', '032', '2023-10-06'),
(209, 310, 97, 'My Birthday', 'Holy Day', 'this', '898989', '2023-10-05'),
(207, 305, 46, 'Holy day', 'Birthday', 'Holy day', 'hello', '2023-10-19'),
(208, 306, 46, 'shadi', 'Holy Day', 'd', 's', '2023-10-05'),
(205, 296, 94, 'hello', '', 'MY birthday', '', '0000-00-00'),
(206, 297, 95, 'Holy day', '', 'this', '', '0000-00-00'),
(203, 284, 46, 'My Birthday', '', 'd', '', '0000-00-00'),
(204, 295, 94, 'hello', '', 'Holy day', '', '0000-00-00'),
(201, 282, 46, 'My Birthday', '', 'Holy day', '', '0000-00-00'),
(202, 283, 46, 'My Birthday', '', 'Holy day', '', '0000-00-00'),
(199, 280, 46, 'hello', '', 'Holy day', '', '0000-00-00'),
(200, 281, 46, 'Holy day', '', 'Holy day', '', '0000-00-00'),
(197, 278, 46, 'My Birthday', '', 'MY birthday', '', '0000-00-00'),
(198, 279, 46, 'Holy day', '', 'Holy day', '', '0000-00-00'),
(195, 276, 96, 'Holy day', '', 'Birthday', '', '2023-10-07'),
(196, 277, 46, 'My Birthday', '', 'Holy day', '', '0000-00-00'),
(193, 274, 94, 'My Birthday', '', 'Holy day', '', '0000-00-00'),
(194, 275, 95, 'hello', '', 'Holy day', '', '2023-09-27'),
(192, 273, 42, 'My Birthday', 'Birthday', 'MY birthday', 'ytj', '2023-09-13'),
(191, 272, 93, '35th Bithday ', 'Birthday', '35th Birthday ', '', '2023-09-26'),
(189, 270, 46, 'My Birthday', 'Birthday', 'MY birthday', 'ghh', '2023-09-14'),
(190, 271, 93, '35th Bithday ', 'Birthday', '35th Birthday ', '', '2023-09-26'),
(188, 269, 91, 'My Birthday', 'Birthday', 'MY birthday', 'helllo', '2023-09-12'),
(187, 268, 42, 'My Birthday', 'Birthday', 'MY birthday', 'hello', '2023-09-09'),
(185, 266, 89, 'TEST 123', 'Birthday', 'TEST', 'WELCOME', '2023-09-23'),
(186, 267, 91, 'My Birthday', 'Birthday', 'MY birthday', 'hello', '2023-05-13'),
(184, 265, 89, 'TEST 123', 'Birthday', 'TEST', 'WELCOME', '2023-09-23'),
(182, 263, 88, 'TEST 123', 'Birthday', 'TEST', 'WELCOME', '2023-09-23'),
(183, 264, 88, 'TEST 123', 'Birthday', 'TEST', 'WELCOME', '2023-09-23'),
(180, 261, 88, 'test 1', 'Birthday', 'TEST', '', '2023-09-25'),
(181, 262, 88, 'TEST 123', 'Birthday', 'WELCOME', '', '2023-09-25'),
(179, 260, 88, 'test 1', 'Birthday', 'TEST', '', '2023-09-25'),
(177, 258, 46, 'TESTING', 'Birthday', 'demo test', 'TEST', '2023-09-23'),
(178, 259, 46, 'birthday', 'Birthday', 'MY birthday', 'hello', '2023-09-13'),
(176, 257, 46, 'TESTING123', 'Birthday', 'TESTING', 'HELLO', '2023-09-23'),
(174, 255, 87, 'demo', 'Birthday', 'demo test', 'test', '2023-09-05'),
(175, 256, 44, 'My Birthday', 'Birthday', 'Holy day', 'asdasd', '2023-09-06'),
(173, 254, 87, 'demo', 'Birthday', 'demo test', 'test', '2023-09-05'),
(171, 252, 86, 'My Birthday', 'Birthday', 'Holy day', 'sadasd', '2023-09-05'),
(172, 253, 85, 'demo', 'Birthday', 'demo test', 'test', '2023-09-05'),
(159, 240, 44, 'My Birthday', 'Birthday', 'Holy day', 'dfgdfg', '2023-09-06'),
(166, 247, 83, 'My Birthday', 'Birthday', 'Holy day', 'adad', '2023-09-05'),
(167, 248, 83, 'My Birthday', 'Birthday', 'this', 'dasda', '2023-09-05'),
(168, 249, 84, 'My Birthday', 'Birthday', 'Holy day', 'sadasd', '2023-09-05'),
(169, 250, 84, 'My Birthday', 'Birthday', 'Holy day', 'sadasd', '2023-09-05'),
(170, 251, 85, 'demo', 'Birthday', 'demo test1', 'test', '2023-09-05'),
(157, 238, 44, 'Holy day', 'Birthday', 'this', 'asdasd', '2023-09-06'),
(158, 239, 44, 'Holy day', 'Birthday', 'this', 'asdasd', '2023-09-06'),
(156, 237, 42, 'My Birthday', 'Birthday', 'this', 'asdasd', '2023-09-06'),
(155, 236, 46, 'Jawwad With Edit', 'Birthday', 'abcc', 'dasd', '2023-09-14'),
(154, 235, 46, 'Test', 'Holy Day', 'dsads', 'dasdas', '2023-09-06'),
(153, 234, 46, 'Jawwad Without Edit', 'Birthday', 'Jawwad Without Edit', 'test', '2023-09-07'),
(152, 233, 46, 'Jawwad With Edit', 'Holy Day', 'Jawwad With Edit', 'This is my Tesing event', '2023-09-14'),
(165, 246, 83, 'My Birthday', 'Birthday', 'Holy day', 'sdsad', '2023-09-05'),
(164, 245, 64, 'My Birthday', 'Birthday', 'Holy day', 'asdasd', '2023-09-05'),
(163, 244, 64, 'My Birthday', 'Holiday', 'Holy day', 'aadsad', '2023-09-05'),
(162, 243, 83, 'My Birthday', 'Holiday', 'Holy day', 'aadsad', '2023-09-05'),
(160, 241, 46, 'My Birthday', 'Birthday', 'this', 'dfsdf', '2023-09-06'),
(161, 242, 82, 'My Birthday', 'Birthday', 'Holy day', 'adasd', '2023-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `extra_sales_products`
--

CREATE TABLE `extra_sales_products` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `products` text NOT NULL,
  `validity_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `dsc` text NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `assignto` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `sub_dcategory` varchar(255) NOT NULL,
  `expiry` varchar(250) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `dsc`, `file`, `assignto`, `category`, `sub_dcategory`, `expiry`, `publish`, `dateTime`) VALUES
(13, 'What is the time duration allowed for guests to upload their photos and/or videos?', '<div class=\"answer\">\r\n<p>Users are given a 3-month window starting from the event date to upload their photos, messages, and videos (if included in the package). After this period, the gallery will no longer accept any new content. Both you and your host will have 12 months to view and access the gallery from the date of the event.</p>\r\n</div>\r\n', NULL, NULL, '', '', NULL, 1, '2023-08-11 10:10:48'),
(14, 'Is it possible for users to remove photos from the gallery?', '<div class=\"answer\">\r\n<p>Users can only delete photos/videos that they have personally uploaded.</p>\r\n\r\n<p>Users do not have the capability to delete content uploaded by others - only the host retains the ability to remove any and all content if deemed necessary.</p>\r\n</div>\r\n', NULL, NULL, '', '', NULL, 1, '2023-08-11 10:10:30'),
(15, 'Can users download from the gallery?', '<div class=\"answer\">\r\n<p>Absolutely! If your host has enabled this functionality for users, you will have the option to download photos. When guest photo downloads are activated, a download icon will appear in the corner of each photo. Clicking on this icon will allow you to download the full-resolution version of the photo stored in the background, not just the compressed thumbnail view for faster viewing.</p>\r\n\r\n<p>Hosts can activate this feature by accessing their host dashboard and navigating to &quot;Set UP + Settings&quot; where they can toggle this option on.</p>\r\n</div>\r\n', NULL, NULL, '', '', NULL, 1, '2023-08-11 10:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `filesmanager`
--

CREATE TABLE `filesmanager` (
  `id` int(11) NOT NULL,
  `file_link` varchar(250) DEFAULT NULL,
  `file_heading` varchar(255) DEFAULT NULL,
  `file_shrtDesc` text DEFAULT NULL,
  `layer0` text DEFAULT NULL,
  `layer1` text DEFAULT NULL,
  `layer2` text DEFAULT NULL,
  `layer3` text DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) DEFAULT NULL,
  `downloads` int(11) NOT NULL DEFAULT 0,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `filesmanager`
--

INSERT INTO `filesmanager` (`id`, `file_link`, `file_heading`, `file_shrtDesc`, `layer0`, `layer1`, `layer2`, `layer3`, `publish`, `sort`, `downloads`, `dateTime`) VALUES
(27, '', 'a:2:{s:7:\"Swedish\";s:5:\"test2\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:44:\"{{WEB_URL}}/uploads/images/Clinicbullet2.png\";s:7:\"English\";s:44:\"{{WEB_URL}}/uploads/images/Clinicbullet2.png\";}', 'a:2:{s:7:\"Swedish\";s:41:\"{{WEB_URL}}/uploads/files/emailImport.xls\";s:7:\"English\";s:41:\"{{WEB_URL}}/uploads/files/emailImport.xls\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 1, 0, 4, '2015-04-03 15:01:43'),
(28, '', 'a:2:{s:7:\"Swedish\";s:6:\"test 3\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:44:\"{{WEB_URL}}/uploads/images/Clinicbullet1.png\";s:7:\"English\";s:44:\"{{WEB_URL}}/uploads/images/Clinicbullet1.png\";}', 'a:2:{s:7:\"Swedish\";s:41:\"{{WEB_URL}}/uploads/files/emailImport.xls\";s:7:\"English\";s:41:\"{{WEB_URL}}/uploads/files/emailImport.xls\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 1, 2, 2, '2015-04-04 10:23:24'),
(29, '', 'a:2:{s:7:\"Swedish\";s:10:\"file 3 pdf\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:44:\"{{WEB_URL}}/uploads/images/Clinicbullet1.png\";s:7:\"English\";s:44:\"{{WEB_URL}}/uploads/images/Clinicbullet1.png\";}', 'a:2:{s:7:\"Swedish\";s:41:\"{{WEB_URL}}/uploads/files/IBMS_v4.0.1.pdf\";s:7:\"English\";s:41:\"{{WEB_URL}}/uploads/files/IBMS_v4.0.1.pdf\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 'a:2:{s:7:\"Swedish\";s:0:\"\";s:7:\"English\";s:0:\"\";}', 1, 1, 1, '2015-04-03 15:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `final_img`
--

CREATE TABLE `final_img` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `image_names` text DEFAULT '',
  `images_path` text DEFAULT '',
  `editor_images_path` text NOT NULL DEFAULT '',
  `assigned_from` int(11) DEFAULT NULL,
  `project_status` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `typeofpack` int(11) NOT NULL,
  `publish` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `final_img`
--

INSERT INTO `final_img` (`id`, `user_id`, `package_id`, `user_name`, `image_names`, `images_path`, `editor_images_path`, `assigned_from`, `project_status`, `status`, `typeofpack`, `publish`, `date`) VALUES
(233, 44, 226, 'Muhammad Aliz Raza', '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_338_579-logo.png,dropfile/album_new/2023/09/_875_istockphoto-1146517111-612x612.jpg,dropfile/album_new/2023/09/_955_pexels-pixabay-220453.jpg', '', 43, 1, 1, 0, 1, '2023-09-02'),
(240, 46, 233, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc', '', 77, 1, 1, 0, 1, '2023-09-04'),
(241, 46, 234, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-04'),
(242, 46, 235, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com', '', 77, NULL, NULL, 0, 1, '2023-09-04'),
(243, 46, 236, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-04'),
(244, 42, 237, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(245, 44, 238, 'Muhammad Aliz Raza', '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_338_579-logo.png,dropfile/album_new/2023/09/_875_istockphoto-1146517111-612x612.jpg,dropfile/album_new/2023/09/_955_pexels-pixabay-220453.jpg,dropfile/album/2023/09/_108_3682321.png,dropfile/album/2023/09/_834_3682321.png', '', 77, NULL, NULL, 0, 1, '2023-09-05'),
(246, 44, 239, 'Muhammad Aliz Raza', '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_338_579-logo.png,dropfile/album_new/2023/09/_875_istockphoto-1146517111-612x612.jpg,dropfile/album_new/2023/09/_955_pexels-pixabay-220453.jpg,dropfile/album/2023/09/_108_3682321.png,dropfile/album/2023/09/_834_3682321.png,dropfile/album_new/2023/09/_935_istockphoto-1146517111-612x612.jpg,https://www.youtube.com/watch?v=jD_bKzYTkFI,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_247_pexels-reynaldo-brigworkz-brigantty-734428.jpg', '', 43, 1, NULL, 0, 1, '2023-09-05'),
(248, 46, 241, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg', '', 43, 1, NULL, 0, 1, '2023-09-05'),
(249, 82, 242, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(250, 83, 243, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(251, 64, 244, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(252, 64, 245, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(253, 83, 246, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(254, 83, 247, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(255, 83, 248, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(256, 84, 249, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(257, 84, 250, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(258, 85, 251, 'hammad', '', 'dropfile/album/2023/09/_420_wallpaperflare.com_wallpaper (2).jpg,dropfile/album_new/2023/09/_177_Supporting community and creating jobs.jpg,dropfile/album_new/2023/09/_851_Helping SMEs.jpg,dropfile/album_new/2023/09/_644_personal assistent.jpg,dropfile/album_new/2023/09/_503_Finance Consultant.jpg,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', '', 77, 1, NULL, 0, 1, '2023-09-05'),
(259, 86, 252, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(260, 85, 253, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-05'),
(261, 87, 254, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(262, 87, 255, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-05'),
(263, 44, 256, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-06'),
(264, 46, 257, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-23'),
(265, 46, 258, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg', '', 77, 1, 1, 0, 1, '2023-09-23'),
(266, 46, 259, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-23'),
(267, 88, 260, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-24'),
(268, 88, 261, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-24'),
(269, 88, 262, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-24'),
(270, 88, 263, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-24'),
(271, 88, 264, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-24'),
(273, 89, 266, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-24'),
(274, 91, 267, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-25'),
(275, 42, 268, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-25'),
(276, 91, 269, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-25'),
(277, 46, 270, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-25'),
(278, 93, 271, 'shah mashuk', '', 'dropfile/album_new/2023/09/_195_Screenshot 2023-09-23 at 00.26.12.png,dropfile/album/2023/09/_742_IMG_3775.jpeg,dropfile/album/2023/09/_634_IMG_3772.jpeg', '', 90, 1, 1, 0, 1, '2023-09-25'),
(279, 93, 272, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-25'),
(280, 42, 273, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-26'),
(281, 94, 274, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(282, 95, 275, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-27'),
(283, 96, 276, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-27'),
(284, 46, 277, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(285, 46, 278, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(286, 46, 279, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(287, 46, 280, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(288, 46, 281, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(289, 46, 282, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(290, 46, 283, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(291, 46, 284, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-09-27'),
(292, 46, 285, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(293, 46, 286, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(294, 46, 287, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(295, 46, 288, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(296, 46, 289, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(297, 46, 290, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(299, 46, 292, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(300, 46, 293, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(301, 46, 294, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-09-28'),
(302, 94, 295, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-10-02'),
(303, 94, 296, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-10-02'),
(304, 95, 297, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-10-02'),
(305, 46, 298, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-02'),
(306, 46, 299, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-02'),
(308, 46, 301, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-02'),
(309, 2147483647, 302, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-05'),
(310, 46, 303, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-05'),
(311, 46, 304, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-05'),
(312, 46, 305, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-10-05'),
(313, 46, 306, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-10-05'),
(314, 46, 307, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-05'),
(315, 46, 308, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-05'),
(316, 46, 309, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-05'),
(317, 97, 310, '', '', '', '', NULL, NULL, NULL, 1, NULL, '2023-10-05'),
(318, 46, 311, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg,dropfile/album_new/2023/10/_451_chef2.png,https://youtube.com/,dropfile/album/2023/10/_619_dealer3.jpg,dropfile/album/2023/10/_296_managed_360.jpg,dropfile/album/2023/10/_723_warranty_360.jpg,dropfile/album_new/2023/10/_223_basmati_rice2.png,dropfile/album_new/2023/10/_655_chef1.png,dropfile/album_new/2023/10/_726_chef2.png,dropfile/album_new/2023/10/_471_chef3.png,dropfile/album_new/2023/10/_160_gallery_left1.jpg,dropfile/album_new/2023/10/_234_gallery2.jpg,dropfile/album_new/2023/10/_653_gallery3.jpg', '', 0, NULL, NULL, 1, 1, '2023-10-06'),
(319, 46, 312, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg,dropfile/album_new/2023/10/_451_chef2.png,https://youtube.com/,dropfile/album/2023/10/_619_dealer3.jpg,dropfile/album/2023/10/_296_managed_360.jpg,dropfile/album/2023/10/_723_warranty_360.jpg,dropfile/album_new/2023/10/_610_dealer3.jpg,dropfile/album_new/2023/10/_403_managed_360.jpg,dropfile/album_new/2023/10/_223_basmati_rice2.png,dropfile/album_new/2023/10/_655_chef1.png,dropfile/album_new/2023/10/_726_chef2.png,dropfile/album_new/2023/10/_471_chef3.png,dropfile/album_new/2023/10/_160_gallery_left1.jpg,dropfile/album_new/2023/10/_234_gallery2.jpg,dropfile/album_new/2023/10/_653_gallery3.jpg,dropfile/album_new/2023/10/_605_background.jpg,dropfile/album_new/2023/10/_652_basmati_price.jpg,dropfile/album_new/2023/10/_631_gallery_left1.jpg,dropfile/album_new/2023/10/_630_gallery2.jpg,dropfile/album_new/2023/10/_853_gallery3.jpg,dropfile/album_new/2023/10/_841_grid1.JPG,dropfile/album_new/2023/10/_476_grid2.jpg,dropfile/album_new/2023/10/_184_grid3.jpg,dropfile/album_new/2023/10/_427_testi_1.jpg,dropfile/album_new/2023/10/_643_index_banner4.jpg,dropfile/album_new/2023/10/_220_index_banner3.jpg,dropfile/album_new/2023/10/_678_14.png,dropfile/album_new/2023/10/_894_15.png,dropfile/album_new/2023/10/_763_16.png,dropfile/album_new/2023/10/_403_17.png,https://youtube.com/,dropfile/album_new/2023/10/_435_true.jpg', '', NULL, NULL, NULL, 1, 1, '2023-10-06'),
(320, 46, 313, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-06'),
(321, 46, 314, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-09'),
(322, 46, 315, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-09'),
(323, 46, 316, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-09'),
(324, 46, 317, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg,https://youtube.com/,dropfile/album/2023/10/_619_dealer3.jpg,dropfile/album/2023/10/_296_managed_360.jpg,dropfile/album/2023/10/_723_warranty_360.jpg', '', 77, 1, 1, 0, 1, '2023-10-09'),
(325, 46, 318, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg,dropfile/album_new/2023/10/_451_chef2.png,https://youtube.com/,dropfile/album/2023/10/_619_dealer3.jpg,dropfile/album/2023/10/_296_managed_360.jpg,dropfile/album/2023/10/_723_warranty_360.jpg,dropfile/album_new/2023/10/_610_dealer3.jpg,dropfile/album_new/2023/10/_403_managed_360.jpg,dropfile/album_new/2023/10/_223_basmati_rice2.png,dropfile/album_new/2023/10/_655_chef1.png,dropfile/album_new/2023/10/_726_chef2.png,dropfile/album_new/2023/10/_471_chef3.png,dropfile/album_new/2023/10/_160_gallery_left1.jpg,dropfile/album_new/2023/10/_234_gallery2.jpg,dropfile/album_new/2023/10/_653_gallery3.jpg,dropfile/album_new/2023/10/_427_testi_1.jpg', '', NULL, NULL, NULL, 0, 1, '2023-10-09'),
(326, 46, 319, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg,dropfile/album_new/2023/10/_451_chef2.png,https://youtube.com/,dropfile/album/2023/10/_619_dealer3.jpg,dropfile/album/2023/10/_296_managed_360.jpg,dropfile/album/2023/10/_723_warranty_360.jpg,dropfile/album_new/2023/10/_610_dealer3.jpg,dropfile/album_new/2023/10/_403_managed_360.jpg,dropfile/album_new/2023/10/_223_basmati_rice2.png,dropfile/album_new/2023/10/_655_chef1.png,dropfile/album_new/2023/10/_726_chef2.png,dropfile/album_new/2023/10/_471_chef3.png,dropfile/album_new/2023/10/_160_gallery_left1.jpg,dropfile/album_new/2023/10/_234_gallery2.jpg,dropfile/album_new/2023/10/_653_gallery3.jpg,dropfile/album_new/2023/10/_427_testi_1.jpg,dropfile/album_new/2023/10/_894_15.png,dropfile/album_new/2023/10/_763_16.png,dropfile/album_new/2023/10/_403_17.png', '', 77, 1, NULL, 0, 1, '2023-10-12'),
(327, 46, 320, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-13'),
(328, 46, 321, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-10-13'),
(329, 46, 322, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg,dropfile/album_new/2023/10/_451_chef2.png,https://youtube.com/,dropfile/album/2023/10/_619_dealer3.jpg,dropfile/album/2023/10/_296_managed_360.jpg,dropfile/album/2023/10/_723_warranty_360.jpg,dropfile/album_new/2023/10/_610_dealer3.jpg,dropfile/album_new/2023/10/_403_managed_360.jpg,dropfile/album_new/2023/10/_223_basmati_rice2.png,dropfile/album_new/2023/10/_655_chef1.png,dropfile/album_new/2023/10/_726_chef2.png,dropfile/album_new/2023/10/_471_chef3.png,dropfile/album_new/2023/10/_160_gallery_left1.jpg,dropfile/album_new/2023/10/_234_gallery2.jpg,dropfile/album_new/2023/10/_653_gallery3.jpg,dropfile/album_new/2023/10/_605_background.jpg,dropfile/album_new/2023/10/_652_basmati_price.jpg,dropfile/album_new/2023/10/_631_gallery_left1.jpg,dropfile/album_new/2023/10/_630_gallery2.jpg,dropfile/album_new/2023/10/_853_gallery3.jpg,dropfile/album_new/2023/10/_841_grid1.JPG,dropfile/album_new/2023/10/_476_grid2.jpg,dropfile/album_new/2023/10/_184_grid3.jpg,dropfile/album_new/2023/10/_427_testi_1.jpg,dropfile/album_new/2023/10/_643_index_banner4.jpg,dropfile/album_new/2023/10/_220_index_banner3.jpg,dropfile/album_new/2023/10/_678_14.png,dropfile/album_new/2023/10/_894_15.png,dropfile/album_new/2023/10/_763_16.png,dropfile/album_new/2023/10/_403_17.png,https://youtube.com/,dropfile/album_new/2023/10/_435_true.jpg,dropfile/album_new/2023/10/_730_true.jpg,dropfile/album_new/2023/10/_213_true.jpg,dropfile/album_new/2023/10/_338_dealer3.jpg,dropfile/album_new/2023/10/_594_managed_360.jpg', '', 77, 1, 1, 0, 1, '2023-10-13'),
(330, 46, 323, 'hammad', '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ,dsxvc,dropfile/album_new/2023/09/_163_img.jpeg,dropfile/album_new/2023/09/_341_img2.png,dropfile/album_new/2023/09/_248_img.jpeg,dropfile/album_new/2023/09/_176_img2.png,www.youtube.com,dropfile/album_new/2023/09/_495_img.jpeg,dropfile/album_new/2023/09/_395_img2.png,www.youtube.com,www.youtube.com,dsxvc,dropfile/album_new/2023/09/_549_img2.png,https://google.com,https://google.com,https://google.com,https://www.youtube.com/watch?v=jD_bKzYTkFI,dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg,dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg,dropfile/album_new/2023/09/_299_1.jpg,dropfile/album_new/2023/09/_812_2.jpg,dropfile/album_new/2023/09/_822_3.jpg,dropfile/album_new/2023/09/_698_4.jpg,dropfile/album_new/2023/09/_221_13-June.jpg,dropfile/album_new/2023/10/_451_chef2.png,https://youtube.com/,dropfile/album/2023/10/_619_dealer3.jpg,dropfile/album/2023/10/_296_managed_360.jpg,dropfile/album/2023/10/_723_warranty_360.jpg,dropfile/album_new/2023/10/_610_dealer3.jpg,dropfile/album_new/2023/10/_403_managed_360.jpg,dropfile/album_new/2023/10/_223_basmati_rice2.png,dropfile/album_new/2023/10/_655_chef1.png,dropfile/album_new/2023/10/_726_chef2.png,dropfile/album_new/2023/10/_471_chef3.png,dropfile/album_new/2023/10/_160_gallery_left1.jpg,dropfile/album_new/2023/10/_234_gallery2.jpg,dropfile/album_new/2023/10/_653_gallery3.jpg,dropfile/album_new/2023/10/_605_background.jpg,dropfile/album_new/2023/10/_652_basmati_price.jpg,dropfile/album_new/2023/10/_631_gallery_left1.jpg,dropfile/album_new/2023/10/_630_gallery2.jpg,dropfile/album_new/2023/10/_853_gallery3.jpg,dropfile/album_new/2023/10/_841_grid1.JPG,dropfile/album_new/2023/10/_476_grid2.jpg,dropfile/album_new/2023/10/_184_grid3.jpg,dropfile/album_new/2023/10/_427_testi_1.jpg,dropfile/album_new/2023/10/_643_index_banner4.jpg,dropfile/album_new/2023/10/_220_index_banner3.jpg,dropfile/album_new/2023/10/_678_14.png,dropfile/album_new/2023/10/_894_15.png,dropfile/album_new/2023/10/_763_16.png,dropfile/album_new/2023/10/_403_17.png,https://youtube.com/,dropfile/album_new/2023/10/_435_true.jpg,dropfile/album_new/2023/10/_730_true.jpg,dropfile/album_new/2023/10/_213_true.jpg,dropfile/album_new/2023/10/_338_dealer3.jpg,dropfile/album_new/2023/10/_594_managed_360.jpg,dropfile/album_new/2023/10/_497_T1D1.6T-Pretty pictures(7).jpg,dropfile/album_new/2023/10/_496_otsuka nutrition.jpg,dropfile/album_new/2023/10/_881_manno.jpg,dropfile/album_new/2023/10/_329_584-20231010153447-8208-warranty_min900.jpg,https://youtube.com/,dropfile/album_new/2023/10/_174_true.jpg,dropfile/album_new/2023/10/_807_newtiggo4pro_banner.jpg', '', 77, 1, 1, 0, 1, '2023-10-13'),
(331, 44, 324, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-11-02'),
(332, 44, 325, '', '', '', '', NULL, NULL, NULL, 0, NULL, '2023-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `free_gift_inv`
--

CREATE TABLE `free_gift_inv` (
  `id` int(11) NOT NULL,
  `txt_inv_id` text DEFAULT NULL,
  `txt_inv_pro_qty` text DEFAULT NULL,
  `pro_ids` text DEFAULT NULL,
  `new_inv` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `validity_date` date NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `free_gift_inv`
--

INSERT INTO `free_gift_inv` (`id`, `txt_inv_id`, `txt_inv_pro_qty`, `pro_ids`, `new_inv`, `status`, `validity_date`, `dateTime`) VALUES
(1, '75', '1', '8', 0, 0, '2020-03-06', '2020-02-28 04:57:58'),
(2, '79', '1', '', 0, 0, '2020-03-06', '2020-02-28 05:10:39'),
(3, '79', '1', '', 0, 0, '2020-03-06', '2020-02-28 05:10:48'),
(4, '79', '1', '', 0, 0, '2020-03-06', '2020-02-28 05:10:55'),
(5, '79', '1', '', 0, 0, '2020-03-06', '2020-02-28 05:11:03'),
(6, '79', '1', '', 0, 0, '2020-03-06', '2020-02-28 05:11:11'),
(7, '79', '1', '', 0, 0, '2020-03-06', '2020-02-28 05:11:18'),
(8, '79', '1', '8', 0, 0, '2020-03-06', '2020-02-28 05:11:26'),
(9, '79', '1', '8', 0, 0, '2020-03-06', '2020-02-28 05:11:34'),
(10, '79', '1', '8', 0, 0, '2020-03-06', '2020-02-28 05:11:41'),
(11, '79', '1', '8', 0, 0, '2020-03-06', '2020-02-28 05:11:49'),
(12, '79', '1', '8', 0, 0, '2020-03-06', '2020-02-28 05:11:56'),
(13, '79', '5', '8', 0, 0, '2020-03-06', '2020-02-28 05:17:34'),
(14, '79', '5', '8', 0, 0, '2020-03-06', '2020-02-28 05:17:42'),
(15, '79', '5', '8', 0, 0, '2020-03-06', '2020-02-28 05:17:49'),
(16, '79', '5', '8', 0, 0, '2020-03-06', '2020-02-28 05:17:57'),
(17, '79', '5', '8', 0, 0, '2020-03-06', '2020-02-28 05:18:04'),
(18, '79', '5', '8', 0, 0, '2020-03-06', '2020-02-28 05:18:12'),
(19, '79', '5', '8', 80, 1, '2020-03-06', '2020-02-28 05:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_pk` int(11) NOT NULL,
  `album` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_pk`, `album`, `description`, `sort`, `publish`) VALUES
(7, 'Wedding', 'Whether its photos, videos, or guestbook messages, capture it all.\r\n\r\nDownload a zip file with all the content in original resolution to cherish forever.\r\n', 0, 1),
(8, 'Birthday', 'hallow this is birthday event ', 0, 1),
(9, 'Christmas Party', ' a detailed explanation of an image that provides textual access to visual content; most often used for digital graphics online and in digital files; can be used as alt text in coding to provide access to more complete information.', 0, 1),
(10, 'Mhendi Party', ' a detailed explanation of an image that provides textual access to visual content; most often used for digital graphics online and in digital files; can be used as alt text in coding to provide access to more complete information.', 0, 1),
(11, 'Engagement Parties', ' a detailed explanation of an image that provides textual access to visual content; most often used for digital graphics online and in digital files; can be used as alt text in coding to provide access to more complete information.', 0, 1),
(12, 'Baby Shower', ' a detailed explanation of an image that provides textual access to visual content; most often used for digital graphics online and in digital files; can be used as alt text in coding to provide access to more complete information.', 0, 1),
(13, 'Reunion', ' a detailed explanation of an image that provides textual access to visual content; most often used for digital graphics online and in digital files; can be used as alt text in coding to provide access to more complete information.', 0, 1),
(14, 'Award Ceremony', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `img_pk` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `alt` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`img_pk`, `gallery_id`, `image`, `description`, `alt`, `sort`) VALUES
(52, 7, 'Gallery/album/2023/08/7_124_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL),
(54, 8, 'Gallery/album/2023/08/8_152_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL),
(55, 9, 'Gallery/album/2023/08/9_192_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL),
(56, 10, 'Gallery/album/2023/08/10_313_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL),
(57, 11, 'Gallery/album/2023/08/11_969_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL),
(58, 12, 'Gallery/album/2023/08/12_646_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL),
(59, 13, 'Gallery/album/2023/08/13_634_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL),
(60, 14, 'Gallery/album/2023/08/14_398_ezgif.com-webp-to-jpg.jpg', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
--

CREATE TABLE `gift_card` (
  `id` int(11) NOT NULL,
  `giftId` varchar(250) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `name` text DEFAULT NULL,
  `price` float NOT NULL,
  `currency` varchar(50) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT 0,
  `usePrice` float NOT NULL DEFAULT 0,
  `info` text DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_book_chat`
--

CREATE TABLE `guest_book_chat` (
  `chat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `publish` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_user_info`
--

CREATE TABLE `guest_user_info` (
  `guest_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_hashpin` text NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guest_user_info`
--

INSERT INTO `guest_user_info` (`guest_id`, `product_id`, `user_id`, `guest_hashpin`, `guest_name`, `guest_email`, `date_time`) VALUES
(2, 87, 18, '89bb5a8266f33aec25f928afa510cb5f', 'shakeeb', 'shakeeb@gmail.com', '2023-08-18 14:18:21'),
(3, 87, 18, '89bb5a8266f33aec25f928afa510cb5f', 'newfolfr', 'myousufalvi@gmail.com', '2023-08-18 14:35:48'),
(4, 87, 18, '89bb5a8266f33aec25f928afa510cb5f', 'shakeeb', 'man411210@gmail.com', '2023-08-18 14:47:49'),
(5, 87, 18, '89bb5a8266f33aec25f928afa510cb5f', 'shakeeb', 'supermanman@gmail.com', '2023-08-19 07:42:00'),
(6, 87, 18, '89bb5a8266f33aec25f928afa510cb5f', 'Jawwad Rafique', 'jawwad.rafique007@gmail.com', '2023-08-19 07:59:15'),
(7, 87, 18, '89bb5a8266f33aec25f928afa510cb5f', 'admin', 'jawwad@im.com.pk', '2023-08-19 08:01:18'),
(8, 87, 18, '89bb5a8266f33aec25f928afa510cb5f', 'Jawwad Rafique', 'jawwad.rafique007@gmail.com', '2023-08-19 08:02:12'),
(9, 92, 40, '82cb08bcd509a31f0a385e25216c473c', 'shakeeb', 'man411210@gmail.com', '2023-08-19 13:32:36'),
(10, 92, 40, '82cb08bcd509a31f0a385e25216c473c', 'shakeeb', 'man411210@gmail.com', '2023-08-19 13:35:52'),
(11, 92, 40, '82cb08bcd509a31f0a385e25216c473c', 'shakeeb', 'myousufalvi@gmail.com', '2023-08-19 13:49:27'),
(12, 92, 40, '82cb08bcd509a31f0a385e25216c473c', 'shakeeb', 'man411210@gmail.com', '2023-08-19 13:51:12'),
(13, 98, 45, 'dc60149b81a3206a30cf2ac7b8a21892', 'shakeeb', 'man411210@gmail.com', '2023-08-21 09:57:52'),
(14, 98, 45, 'dc60149b81a3206a30cf2ac7b8a21892', 'shakeeb', 'man411210@gmail.com', '2023-08-21 09:59:03'),
(15, 144, 73, '759449ce442833a63b33430474cbfa97', 'shakeeb', 'shakeeb@gmail.com', '2023-08-22 13:12:42'),
(16, 117, 44, '4c295874af1983487aa7fdfbd04d55b3', 'shakeeb', 'man411210@gmail.com', '2023-08-22 15:19:19'),
(17, 114, 44, '82055e395e7a42f0776af8cc0004ffb1', 'hammad', 'hammad@ia.com.pk', '2023-08-23 09:24:46'),
(18, 161, 80, '4317c620054a961db20bd9c651f9b5e8', 'shakeeb', 'shakeeb@gmail.com', '2023-08-24 08:10:08'),
(19, 167, 46, 'd91ac35ae08a5b5802c9cd8188755f34', 'testt', 'test@gmail.com', '2023-08-24 15:13:03'),
(20, 216, 42, '896f60ad96bdb2771e9667e8befdbd58', 'shakeeb', 'man411210@gmail.com', '2023-08-30 09:53:42'),
(21, 260, 88, '375173f7abf9ac9ddbfb2e916963da0d', 'Shah ', 'shahsharia@hotmail.co.uk', '2023-09-24 17:24:53'),
(22, 271, 93, 'a804ce2cf20d902e9df2fac88c868f5e', 'Shah', 'shahsha@gamil.com', '2023-09-26 00:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `hardwords`
--

CREATE TABLE `hardwords` (
  `id` int(11) NOT NULL,
  `en` varchar(250) NOT NULL,
  `lang` text NOT NULL,
  `place` varchar(100) DEFAULT NULL,
  `allowDelete` tinyint(4) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hardwords`
--

INSERT INTO `hardwords` (`id`, `en`, `lang`, `place`, `allowDelete`, `time`) VALUES
(1, 'Product QTY Statistics', 'Product QTY Statistics', 'AdminMenu', 0, '2022-04-05 11:26:45'),
(2, 'Dashboard', 'Dashboard', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(3, 'Products', 'Products', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(4, 'Visiting Customers', 'Visiting Customers', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(5, 'Stock Management', 'Stock Management', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(6, 'Order Management', 'Order Management', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(7, 'Statics', 'Statics', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(8, 'Shipping Management', 'Shipping Management', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(9, 'Menu', 'Menu', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(10, 'Add New Orders', 'Add New Orders', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(11, 'Sort Products Image', 'Sort Products Image', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(12, 'Recommended Products', 'Recommended Products', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(13, 'Logs Management', 'Logs Management', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(14, 'Pages', 'Pages', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(15, 'News & Events', 'News & Events', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(16, 'Banners', 'Banners', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(17, 'Brands', 'Brands', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(18, 'Media', 'Media', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(19, 'SEO Management', 'SEO Management', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(20, 'Setting', 'Setting', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(21, 'Email Management', 'Email Management', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(22, 'Users', 'Users', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(23, 'Blog', 'Blog', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(24, 'Collapse Menu', 'Collapse Menu', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(25, 'Best Seller', 'Best Seller', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(26, 'New Statistics', 'New Statistics', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(27, 'Product View', 'Product View', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(28, 'Product Sort', 'Product Sort', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(29, 'Add New Product', 'Add New Product', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(30, 'Product Discount', 'Product Discount', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(31, 'Product Whole Sale', 'Product Whole Sale', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(32, 'Product Coupon', 'Product Coupon', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(33, 'Manage Currency', 'Manage Currency', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(34, 'Manage Scales', 'Manage Scales', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(35, 'Manage Color', 'Manage Color', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(36, 'Manage Category', 'Manage Category', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(37, 'View Stock Product', 'View Stock Product', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(38, 'Purchase Receipt', 'Purchase Receipt', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(39, 'Store Location', 'Store Location', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(40, 'Import/Export', 'Import/Export', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(41, 'Orders', 'Orders', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(42, 'Shipping By Weight', 'Shipping By Weight', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(43, 'Shipping By Class', 'Shipping By Class', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(44, 'Main Menu', 'Main Menu', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(45, 'Footer Menu', 'Footer Menu', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(46, 'Defect Archive', 'Defect Archive', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(47, 'Defect Register', 'Defect Register', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(48, 'Return Archive', 'Return Archive', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(49, 'Product Return Form', 'Product Return Form', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(50, 'Product Defect Form', 'Product Defect Form', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(51, 'New Page', 'New Page', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(52, 'Home Page', 'Home Page', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(53, 'News', 'News', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(54, 'Add News', 'Add News', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(55, 'Gallery', 'Gallery', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(56, 'Images', 'Images', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(57, 'Files', 'Files', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(58, 'SEO', 'SEO', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(59, 'IBMS Setting', 'IBMS Setting', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(60, 'History', 'History', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(61, 'Account', 'Account', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(62, 'Translate Language', 'Translate Language', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(63, 'Subscribe Emails', 'Subscribe Emails', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(64, 'News Letter', 'News Letter', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(65, 'Products List', 'Products List', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(66, 'Emails Content', 'Emails Content', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(67, 'Admin Users', 'Admin Users', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(68, 'Admin Group', 'Admin Group', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(69, 'Web Users', 'Web Users', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(70, 'Reviews', 'Reviews', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(71, 'Shop Selling', 'Shop Selling', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(72, 'Questions', 'Questions', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(73, 'File Manager', 'File Manager', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(74, 'Testimonial', 'Testimonial', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(75, 'Measurement', 'Measurement', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(76, 'Deal Product', 'Deal Product', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(77, 'Gift Card Management', 'Gift Card Management', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(78, 'Gift Card', 'Gift Card', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(79, 'All In One Product Returns', 'All In One Product Returns', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(80, 'Emails in Waiting', 'Emails in Waiting', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(81, 'View Emails', 'View Emails', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(82, 'Table View', 'Table View', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(83, 'Create Insertions', 'Create Insertions', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(84, 'List View', 'List View', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(85, 'Manage Categories', 'Manage Categories', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(86, 'Product Statistics', 'Product Statistics', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(87, 'Delivery Note', 'Delivery Note', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(88, 'Inventory Adjustment Note', 'Inventory Adjustment Note', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(89, 'Goods Transfer Note in', 'Goods Transfer Note in', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(90, 'Goods Transfer Note', 'Goods Transfer Note', 'AdminMenu', 0, '2022-04-05 11:26:46'),
(91, 'Go To Home', 'Go To Home', 'Admin Header', 0, '2022-04-05 11:26:46'),
(92, 'SignOut', 'SignOut', 'Admin Header', 0, '2022-04-05 11:26:46'),
(93, 'Account Setting', 'Account Setting', 'Admin Header', 0, '2022-04-05 11:26:46'),
(94, 'SignIn', 'SignIn', 'Admin Header', 0, '2022-04-05 11:26:46'),
(95, 'Brands Management', 'Brands Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(96, 'Banners Management', 'Banners Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(97, 'Blog Management', 'Blog Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(99, 'Gallery Management', 'Gallery Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(101, 'Manage Website Menu', 'Manage Website Menu', 'Admin Header', 0, '2022-04-05 11:26:46'),
(102, 'News Management', 'News Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(103, 'Order / Invoice Management', 'Order / Invoice Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(104, 'Pages Management', 'Pages Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(105, 'Product Management', 'Product Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(111, 'WebUsers Management', 'WebUsers Management', 'Admin Header', 0, '2022-04-05 11:26:46'),
(112, 'Inventory Valuation', 'Inventory Valuation', 'Admin Header', 0, '2022-04-05 11:26:46'),
(114, 'This is place where everything started', 'This is place where everything started', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(115, 'Updated Stock Graph', 'Updated Stock Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(116, 'Order Graph', 'Order Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(117, '{{number}} New Defect Product', '{{number}} New Defect Product', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(118, '{{number}} New Return Product', '{{number}} New Return Product', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(119, 'Total Order Status', 'Total Order Status', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(120, 'Top Users Order/Price', 'Top Users Order/Price', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(121, 'Product Stock Report', 'Product Stock Report', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(122, 'Top Payment Method', 'Top Payment Method', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(124, 'Email Running', 'Email Running', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(125, 'No Of Products', 'No Of Products', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(126, 'SNO', 'SNO', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(127, 'SALE', 'SALE', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(128, 'CATEGORY', 'CATEGORY', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(129, 'SALE DATE', 'SALE DATE', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(130, 'Active Whole Sale Offers', 'Active Whole Sale Offers', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(131, 'All Orders', 'All Orders', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(132, 'Daily Order By Store', 'Daily Order By Store', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(133, 'Monthly Order By Store', 'Monthly Order By Store', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(134, 'Daily Order Graph', 'Daily Order Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(135, 'Monthly Order Graph', 'Monthly Order Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(136, 'Yearly Order Graph', 'Yearly Order Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(137, 'Daily Order Value Graph', 'Daily Order Value Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(138, 'Monthly Order Value Graph', 'Monthly Order Value Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:46'),
(139, 'Yearly Order Value Graph', 'Yearly Order Value Graph', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(140, 'Source', 'Source', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(141, 'Stock', 'Stock', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(142, 'Product Inventory', 'Product Inventory', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(143, 'Store', 'Store', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(144, 'Success', 'Success', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(145, 'Denied', 'Denied', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(146, 'Pending', 'Pending', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(147, 'Cancel', 'Cancel', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(148, 'Top Coupon Use', 'Top Coupon Use', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(149, 'No of Orders', 'No of Orders', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(151, 'Top Order Users', 'Top Order Users', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(152, 'No of Orders/Price', 'No of Orders/Price', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(153, 'Sending Email Status', 'Sending Email Status', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(154, 'No Of Emails Active/DeActive', 'No Of Emails Active/DeActive', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(155, 'Active', 'Active', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(156, 'DeActive', 'DeActive', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(157, 'Products Status', 'Products Status', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(159, 'Draft', 'Draft', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(160, 'Price', 'Price', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(161, 'Send', 'Send', 'Admin DashBoard', 0, '2022-04-05 11:26:47'),
(162, 'Display _MENU_ records per page', 'Display _MENU_ records per page', 'Admin Js', 0, '2022-04-05 11:26:47'),
(163, 'Nothing found - sorry', 'Nothing found - sorry', 'Admin Js', 0, '2022-04-05 11:26:47'),
(164, 'Showing page _PAGE_ of _PAGES_', 'Showing page _PAGE_ of _PAGES_', 'Admin Js', 0, '2022-04-05 11:26:47'),
(165, 'No records available', 'No records available', 'Admin Js', 0, '2022-04-05 11:26:47'),
(166, '(filtered from _MAX_ total records)', '(filtered from _MAX_ total records)', 'Admin Js', 0, '2022-04-05 11:26:47'),
(189, 'Sorry you don\'t have permission to access this page', 'Sorry you don\'t have permission to access this page', 'Admin Header', 0, '2022-04-05 11:34:29'),
(190, 'Update Done', 'Update Done', 'Admin Product', 0, '2022-04-05 11:34:49'),
(191, 'Update Fail', 'Update Fail', 'Admin Product', 0, '2022-04-05 11:34:49'),
(192, 'Delete Fail Please Try Again.', 'Delete Fail Please Try Again.', 'Admin Product', 0, '2022-04-05 11:34:49'),
(193, 'Update', 'Update', 'Admin Product', 0, '2022-04-05 11:34:49'),
(194, 'Cash On Delivery', 'Cash On Delivery', 'Admin Product', 0, '2022-04-05 11:34:49'),
(195, 'CreditCard', 'CreditCard', 'Admin Product', 0, '2022-04-05 11:34:49'),
(196, 'Paid', 'Paid', 'Admin Product', 0, '2022-04-05 11:34:49'),
(197, 'Full Refunded', 'Full Refunded', 'Admin Product', 0, '2022-04-05 11:34:49'),
(198, 'Ready For Packaging', 'Ready For Packaging', 'Admin Product', 0, '2022-04-05 11:34:49'),
(199, 'Received', 'Received', 'Admin Product', 0, '2022-04-05 11:34:49'),
(200, 'Measure send to factory', 'Measure send to factory', 'Admin Product', 0, '2022-04-05 11:34:49'),
(201, 'Order send for factory', 'Order send for factory', 'Admin Product', 0, '2022-04-05 11:34:49'),
(202, 'Complete', 'Complete', 'Admin Product', 0, '2022-04-05 11:34:49'),
(203, '2 CheckOut', '2 CheckOut', 'Admin Product', 0, '2022-04-05 11:34:49'),
(204, 'Partial Delivery Done', 'Partial Delivery Done', 'Admin Product', 0, '2022-04-05 11:34:49'),
(205, 'Awaiting Measures From Customer', 'Awaiting Measures From Customer', 'Admin Product', 0, '2022-04-05 11:34:49'),
(206, 'Buy {{buy_qty}} Get 1 free', 'Buy {{buy_qty}} Get 1 free', 'Admin Product', 0, '2022-04-05 11:34:49'),
(207, 'You Get +{{free_qty}} free', 'You Get +{{free_qty}} free', 'Admin Product', 0, '2022-04-05 11:34:49'),
(208, '+{{free_qty}} Free', '+{{free_qty}} Free', 'Admin Product', 0, '2022-04-05 11:34:49'),
(209, 'FREE GIFT', 'FREE GIFT', 'Admin Product', 0, '2022-04-05 11:34:49'),
(210, 'DISCOUNT APPLIED', 'DISCOUNT APPLIED', 'Admin Product', 0, '2022-04-05 11:34:49'),
(211, 'SALE OFFER APPLIED', 'SALE OFFER APPLIED', 'Admin Product', 0, '2022-04-05 11:34:49'),
(212, 'COUPON CODE APPLIED', 'COUPON CODE APPLIED', 'Admin Product', 0, '2022-04-05 11:34:49'),
(213, 'CHECKOUT OFFER APPLIED', 'CHECKOUT OFFER APPLIED', 'Admin Product', 0, '2022-04-05 11:34:49'),
(214, 'Order will be sent from factory by DHL EXPRESS', 'Order will be sent from factory by DHL EXPRESS', 'Admin Product', 0, '2022-04-05 11:34:49'),
(215, 'PRIORITY 1 URGENT DELIVERY', 'PRIORITY 1 URGENT DELIVERY', 'Admin Product', 0, '2022-04-05 11:34:49'),
(216, 'ORDERED TO MAIN STOCK', 'ORDERED TO MAIN STOCK', 'Admin Product', 0, '2022-04-05 11:34:49'),
(217, 'MADE TO MEASURE ORDER', 'MADE TO MEASURE ORDER', 'Admin Product', 0, '2022-04-05 11:34:49'),
(218, 'Update Fail Please Try Again.', 'Update Fail Please Try Again.', 'Admin Product', 0, '2022-04-05 11:34:49'),
(219, 'Color Management', 'Color Management', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(220, 'List', 'List', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(221, 'Add New Color', 'Add New Color', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(222, 'View All Colors', 'View All Colors', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(223, 'Color Name', 'Color Name', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(224, 'Add Slot', 'Add Slot', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(225, 'Add Color', 'Add Color', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(226, 'SUBMIT', 'SUBMIT', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(227, 'New Color Add SuccessFully!', 'New Color Add SuccessFully!', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(228, 'Some required fields are empty!', 'Some required fields are empty!', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(229, 'Color Fields', 'Color Fields', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(230, 'Action', 'Action', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(231, 'There is an issue while inserting data, please try again!', 'There is an issue while inserting data, please try again!', 'Admin Product Color', 0, '2022-04-05 11:34:49'),
(232, 'Scale Name', 'Scale Name', 'Admin Product Scale', 0, '2022-04-05 11:34:49'),
(233, 'Add New Scale', 'Add New Scale', 'Admin Product Scale', 0, '2022-04-05 11:34:49'),
(234, 'Add Scale', 'Add Scale', 'Admin Product Scale', 0, '2022-04-05 11:34:49'),
(235, 'Scale Management', 'Scale Management', 'Admin Product Scale', 0, '2022-04-05 11:34:49'),
(236, 'Scale Fields', 'Scale Fields', 'Admin Product Scale', 0, '2022-04-05 11:34:49'),
(237, 'New Scale Add SuccessFully!', 'New Scale Add SuccessFully!', 'Admin Product Scale', 0, '2022-04-05 11:34:49'),
(238, 'Currency Name', 'Currency Name', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(239, 'Country', 'Country', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(240, 'Currency Symbol', 'Currency Symbol', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(241, 'ADD', 'ADD', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(242, 'Currency', 'Currency', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(243, 'Symbol', 'Symbol', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(244, 'No data available!', 'No data available!', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(245, 'Currency Management', 'Currency Management', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(246, 'Add Currency', 'Add Currency', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(247, 'Edit Currency Information', 'Edit Currency Information', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(248, 'Close', 'Close', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(249, 'Saving...', 'Saving...', 'Admin DashBoard', 0, '2022-04-05 11:34:49'),
(250, 'Sort Products', 'Sort Products', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(251, 'Select Product Category', 'Select Product Category', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(252, 'There is an error, Please Refresh Page and Try Again', 'There is an error, Please Refresh Page and Try Again', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(253, 'Product Update', 'Product Update', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(254, 'Product Add', 'Product Add', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(255, 'Your Product Update Successfully', 'Your Product Update Successfully', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(256, 'Your New Product Add Successfully', 'Your New Product Add Successfully', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(257, 'Your Product Update Fail', 'Your Product Update Fail', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(258, 'Free Gift Product', 'Free Gift Product', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(259, 'When this product exist in cart then which free gift add in cart, please select', 'When this product exist in cart then which free gift add in cart, please select', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(260, 'Mass Update', 'Mass Update', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(261, 'SERIAL NUMBER', 'SERIAL NUMBER', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(262, 'Country (Currency)', 'Country (Currency)', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(263, 'International Shipping', 'International Shipping', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(264, 'Price/Percent', 'Price/Percent', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(265, 'Discount', 'Discount', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(266, 'Size Name', 'Size Name', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(267, 'Weight In KG', 'Weight In KG', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(268, 'Add More Weight', 'Add More Weight', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(269, 'Select Scale Group', 'Select Scale Group', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(270, 'Select Color Group', 'Select Color Group', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(271, 'PRODUCT NAME', 'PRODUCT NAME', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(272, 'SHORT DESC', 'SHORT DESC', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(273, 'CREATE DATE', 'CREATE DATE', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(274, 'Enter Alt', 'Enter Alt', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(275, 'Remove', 'Remove', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(276, 'Additional Saved Charges', 'Additional Saved Charges', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(277, 'Name', 'Name', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(278, 'Active/DeActive Feature item', 'Active/DeActive Feature item', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(279, 'Active/DeActive Feature item2', 'Active/DeActive Feature item2', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(280, 'Are you sure you want to {{state}} Feature Product?', 'Are you sure you want to {{state}} Feature Product?', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(281, 'Are you sure you want to {{state}} Feature Item 2?', 'Are you sure you want to {{state}} Feature Item 2?', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(282, 'Charges On Offers', 'Charges On Offers', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(283, 'VIEWS', 'VIEWS', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(284, 'SALES', 'SALES', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(285, 'By Weight', 'By Weight', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(286, 'Shipping Class', 'Shipping Class', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(287, 'SELECT', 'SELECT', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(288, 'PRODUCT THUMBNAIL', 'PRODUCT THUMBNAIL', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(289, 'Please select categories and products both, It is mandatory', 'Please select categories and products both, It is mandatory', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(290, 'Product Category', 'Product Category', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(291, 'Do not forget', 'Do not forget', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(292, 'Do Not Forget To Buy Products', 'Do Not Forget To Buy Products', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(293, 'Missing Products', 'Missing Products', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(294, 'Missing', 'Missing', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(295, 'Missing Products Copied Successfully.', 'Missing Products Copied Successfully.', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(296, '', '', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(297, 'SKU', 'SKU', 'Admin Product Class', 0, '2022-04-05 11:34:49'),
(298, 'Product List!', 'Product List!', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(299, 'All Products', 'All Products', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(300, 'Drafts', 'Drafts', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(301, 'Delete All Selected Product', 'Delete All Selected Product', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(302, 'Filter', 'Filter', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(303, 'Filter Selected', 'Filter Selected', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(304, 'Add to Category', 'Add to Category', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(305, 'Products Added To Category', 'Products Added To Category', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(306, 'Remove From Category', 'Remove From Category', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(307, 'Products Removed From Category', 'Products Removed From Category', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(308, 'Minimum Stock to Notify', 'Minimum Stock to Notify', 'Admin ProductView', 0, '2022-04-05 11:34:49'),
(309, 'Manage SEO', 'Manage SEO', 'Admin SEO', 0, '2022-04-05 11:34:49'),
(310, 'Add New SEO', 'Add New SEO', 'Admin SEO', 0, '2022-04-05 11:34:49'),
(311, 'Active SEO', 'Active SEO', 'Admin SEO', 0, '2022-04-05 11:34:49'),
(312, 'Mobile Banner', 'Mobile Banner', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(313, 'Desktop Banner', 'Desktop Banner', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(314, 'Old Mobile Banner', 'Old Mobile Banner', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(315, 'Old Desktop Banner', 'Old Desktop Banner', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(316, 'PAGE', 'PAGE', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(317, 'TITLE', 'TITLE', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(318, 'Added', 'Added', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(319, 'SEO Save Successfully', 'SEO Save Successfully', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(320, 'SEO Save Failed,Please Enter Correct Values', 'SEO Save Failed,Please Enter Correct Values', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(321, 'Desktop Banner Link', 'Desktop Banner Link', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(322, 'Mobile Banner Link', 'Mobile Banner Link', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(323, 'NOTE:Blank Fields Will Not Show In Meta Tags', 'NOTE:Blank Fields Will Not Show In Meta Tags', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(324, 'Page link where SEO apply', 'Page link where SEO apply', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(325, 'Canonical', 'Canonical', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(326, 'Meta Keywords', 'Meta Keywords', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(327, 'Meta Description', 'Meta Description', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(328, 'Meta Title', 'Meta Title', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(329, 'Author', 'Author', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(330, 'Revisit After', 'Revisit After', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(331, 'ReWrite Title Tag', 'ReWrite Title Tag', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(332, 'Yes', 'Yes', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(333, 'Index/ No-Index', 'Index/ No-Index', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(334, 'Index', 'Index', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(335, 'Follow/ No-Follow', 'Follow/ No-Follow', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(336, 'Follow', 'Follow', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(337, 'NO', 'NO', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(338, 'Web Page Type', 'Web Page Type', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(339, 'Publish', 'Publish', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(340, 'SAVE', 'SAVE', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(341, 'Special', 'Special', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(342, 'Add Seo', 'Add Seo', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(343, 'Slug', 'Slug', 'Admin SEO', 0, '2022-04-05 11:34:50'),
(344, 'Delete', 'Delete', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(345, 'Store Is Not Empty.\n Please Delete Store`s Product First.', 'Store Is Not Empty.\n Please Delete Store`s Product First.', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(346, 'Store In Use', 'Store In Use', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(347, 'Store Description', 'Store Description', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(348, 'Select Country', 'Select Country', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(349, 'Store Country', 'Store Country', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(350, 'Store City', 'Store City', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(351, 'Store Name', 'Store Name', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(352, 'Store Officer Name', 'Store Officer Name', 'Admin Product ajax', 0, '2022-04-05 11:34:51'),
(353, 'General', 'General', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(354, 'Product', 'Product', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(355, 'Social', 'Social', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(356, 'Which Graph report you want to show on dashboard', 'Which Graph report you want to show on dashboard', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(357, 'Free Shipping Offer', 'Free Shipping Offer', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(358, 'Grid View By Category', 'Grid View By Category', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(359, 'Payment method additional price', 'Payment method additional price', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(360, 'Payment', 'Payment', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(361, 'Run', 'Run', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(362, 'Run Daily Cron File', 'Run Daily Cron File', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(363, 'Send Mail', 'Send Mail', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(364, 'Account Name', 'Account Name', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(365, 'Email', 'Email', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(366, 'Password', 'Password', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(367, 'Leave Blank If not want to update', 'Leave Blank If not want to update', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(368, 'Retype Password', 'Retype Password', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(369, 'WebSite Special Words', 'WebSite Special Words', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(370, 'GO BACK', 'GO BACK', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(371, 'Add New', 'Add New', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(372, 'Free product add when cart reach at price', 'Free product add when cart reach at price', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(373, 'Check out offer show when cart reach at price', 'Check out offer show when cart reach at price', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(374, 'DN', 'DN', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(375, 'GRN', 'GRN', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(376, 'GTN', 'GTN', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(377, 'IAN', 'IAN', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(378, 'How Many Product Show On Page?', 'How Many Product Show On Page?', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(379, 'IBMS Setting Update Failed', 'IBMS Setting Update Failed', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(380, 'IBMS Setting Update Successfully', 'IBMS Setting Update Successfully', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(381, 'Password Not match', 'Password Not match', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(382, 'Account Setting Update Successfully', 'Account Setting Update Successfully', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(383, 'Account Setting Update Fail', 'Account Setting Update Fail', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(384, 'Fail', 'Fail', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(385, 'Error', 'Error', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(386, 'Real Word', 'Real Word', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(387, 'VISIBLE WORD', 'VISIBLE WORD', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(388, 'Translate Word Update Successfully', 'Translate Word Update Successfully', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(389, 'Translate Words', 'Translate Words', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(390, 'Translate Word Update Fail', 'Translate Word Update Fail', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(391, '{{word}} Word Is Update', '{{word}} Word Is Update', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(392, 'Translate Word Add Successfully', 'Translate Word Add Successfully', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(393, '{{word}} Word Is Added', '{{word}} Word Is Added', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(394, 'DEFAULT WORDS', 'DEFAULT WORDS', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(395, 'VISIBLE', 'VISIBLE', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(396, 'LOCATION', 'LOCATION', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(397, 'Site Name', 'Site Name', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(398, 'IBMS History Delete After ? Days', 'IBMS History Delete After ? Days', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(399, 'TimeZone', 'TimeZone', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(400, 'Languages', 'Languages', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(401, 'separate with comma', 'separate with comma', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(402, 'Default Admin Language', 'Default Admin Language', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(403, 'Default Admin Panel Language', 'Default Admin Panel Language', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(404, 'Default Website Language', 'Default Website Language', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(405, 'Invoice Receipt Start With', 'Invoice Receipt Start With', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(406, 'Invoice Able To Delete After ? Days', 'Invoice Able To Delete After ? Days', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(407, '0 Qty\'s Product Remove After ? Days From Inventory Record', '0 Qty\'s Product Remove After ? Days From Inventory Record', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(408, 'Show Image In Sort Product', 'Show Image In Sort Product', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(409, 'If product has no stock show on web page?', 'If product has no stock show on web page?', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(410, 'No (Fast Speed Recommended)', 'No (Fast Speed Recommended)', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(411, 'Default Admin Price Country', 'Default Admin Price Country', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(412, 'Default Website Price Country', 'Default Website Price Country', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(413, 'Search By Date Range', 'Search By Date Range', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(414, 'Date From', 'Date From', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(415, 'Date To', 'Date To', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(416, 'REFERENCE', 'REFERENCE', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(417, 'DATE TIME', 'DATE TIME', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(418, 'USER', 'USER', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(419, 'DESCRIPTION', 'DESCRIPTION', 'Admin Setting', 0, '2022-04-05 11:35:04'),
(420, 'IP', 'IP', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(421, 'BROWSER', 'BROWSER', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(422, 'IBMS History', 'IBMS History', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(423, 'Paypal Email', 'Paypal Email', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(424, 'How Many Top Sale Product Show?', 'How Many Top Sale Product Show?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(425, 'How Many Latest Product Show?', 'How Many Latest Product Show?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(426, 'How Many Feature Product Show?', 'How Many Feature Product Show?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(427, 'How Many Feature2 Product Show?', 'How Many Feature2 Product Show?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(428, 'Contact', 'Contact', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(429, 'Location Map Link', 'Location Map Link', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(430, 'Twitter Name', 'Twitter Name', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(431, 'How Many Best Seller Product Show?', 'How Many Best Seller Product Show?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(432, 'Review Allow?', 'Review Allow?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(433, 'Login Required?', 'Login Required?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(434, 'Yes (Recommended)', 'Yes (Recommended)', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(435, 'Approve By Admin', 'Approve By Admin', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(436, 'New Review Status?', 'New Review Status?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(437, 'How Many Review Show On Page?', 'How Many Review Show On Page?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(438, 'Ascending', 'Ascending', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(439, 'Descending', 'Descending', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(440, 'Show New First', 'Show New First', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(441, 'Show Old First', 'Show Old First', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(442, 'Review Order', 'Review Order', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(443, 'Comment Order', 'Comment Order', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(444, 'Facebook Comment BackGround', 'Facebook Comment BackGround', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(445, 'Facebook Numeric Id', 'Facebook Numeric Id', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(446, 'Show Popular First', 'Show Popular First', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(447, 'Facebook Comment Allow?', 'Facebook Comment Allow?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(448, 'Facebook Comment', 'Facebook Comment', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(449, 'Review Off Msg', 'Review Off Msg', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(450, 'Fb Comment Off Msg', 'Fb Comment Off Msg', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(451, 'Show Coupon Offer On User Visit', 'Show Coupon Offer On User Visit', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(452, 'Check Out Offer', 'Check Out Offer', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(453, 'Show Products on check out offer', 'Show Products on check out offer', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(454, 'Question Allow?', 'Question Allow?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(455, 'Question Off Msg', 'Question Off Msg', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(456, 'How Many Question Show On Page?', 'How Many Question Show On Page?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(457, 'Question Order', 'Question Order', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(458, 'Products Ask Question', 'Products Ask Question', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(459, 'Script in head section', 'Script in head section', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(460, 'Script in footer section', 'Script in footer section', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(461, 'Shipping Price', 'Shipping Price', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(462, 'By Class', 'By Class', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(463, '3 for 2 Category', '3 for 2 Category', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(464, '3 for 2 Category Offer', '3 for 2 Category Offer', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(465, 'SMTP Server For Newsletter', 'SMTP Server For Newsletter', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(466, 'SMTP Host', 'SMTP Host', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(467, 'SMTP Secure Layer', 'SMTP Secure Layer', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(468, 'SMTP Port', 'SMTP Port', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(469, 'SMTP User', 'SMTP User', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(470, 'SMTP Password', 'SMTP Password', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(471, 'SMTP Server', 'SMTP Server', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(472, 'SMTP Server Default', 'SMTP Server Default', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(473, 'Staple Products', 'Staple Products', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(474, 'Staple Product Category', 'Staple Product Category', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(475, 'Select Category', 'Select Category', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(476, 'Staple Product Settings', 'Staple Product Settings', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(477, 'CHF Price Calculation (divided, multiply)', 'CHF Price Calculation (divided, multiply)', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(478, 'Migrate Products to Sharkspeed Swedish', 'Migrate Products to Sharkspeed Swedish', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(479, 'Sales Feature', 'Sales Feature', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(480, 'Sales Feature Settings', 'Sales Feature Settings', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(481, 'Extra Sales Offer Validity ( In Days )', 'Extra Sales Offer Validity ( In Days )', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(482, 'Popup Delay Time (In Minutes)', 'Popup Delay Time (In Minutes)', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(483, 'Show Long Time Popup?', 'Show Long Time Popup?', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(484, 'Price Calculation', 'Price Calculation', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(485, 'Reason', 'Reason', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(486, 'defect Product from client', 'defect Product from client', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(487, 'email sending status', 'email sending status', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(488, 'no of product report', 'no of product report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(489, 'order daily report', 'order daily report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(490, 'order daily value report', 'order daily value report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(491, 'order monthly report', 'order monthly report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(492, 'order monthly value report', 'order monthly value report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(493, 'order yearly report', 'order yearly report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(494, 'order yearly value report', 'order yearly value report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(495, 'product sale by store daily', 'product sale by store daily', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(496, 'product sale by store monthly', 'product sale by store monthly', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(497, 'return Product from client', 'return Product from client', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(498, 'stock big graph', 'stock big graph', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(499, 'subscribe status', 'subscribe status', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(500, 'top order user', 'top order user', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(501, 'whole sale report', 'whole sale report', 'Admin Setting', 0, '2022-04-05 11:35:05'),
(502, 'More', 'More', 'WebMenu', 0, '2022-04-05 11:41:49'),
(503, 'My Account', 'My Account', 'Website', 0, '2022-04-05 11:41:49'),
(504, 'Wishlist', 'Wishlist', 'Website', 0, '2022-04-05 11:41:49'),
(505, 'Compare', 'Compare', 'Website', 0, '2022-04-05 11:41:49'),
(506, 'Items', 'Items', 'Website', 0, '2022-04-05 11:41:49'),
(507, 'LogOut', 'LogOut', 'Website', 0, '2022-04-05 11:41:49'),
(508, 'Search', 'Search', 'Website', 0, '2022-04-05 11:41:49'),
(509, 'WELCOME', 'WELCOME', 'Website', 0, '2022-04-05 11:41:49'),
(510, 'Visitor', 'Visitor', 'Website', 0, '2022-04-05 11:41:49'),
(511, 'All right reserved', 'All right reserved', 'Website', 0, '2022-04-05 11:41:49'),
(512, 'Customer Support', 'Customer Support', 'Website', 0, '2022-04-05 11:41:49'),
(513, 'SUBSCRIBE', 'SUBSCRIBE', 'Website', 0, '2022-04-05 11:41:49'),
(514, 'Enter Email', 'Enter Email', 'Website', 0, '2022-04-05 11:41:49'),
(515, 'Categories', 'Categories', 'Website', 0, '2022-04-05 11:41:49'),
(516, 'Reset Search', 'Reset Search', 'Website', 0, '2022-04-05 11:41:49'),
(517, 'Filter Search', 'Filter Search', 'Website', 0, '2022-04-05 11:41:49'),
(518, 'Cart', 'Cart', 'Website', 0, '2022-04-05 11:41:49'),
(519, 'KUNDTJANST', 'KUNDTJANST', 'Website', 0, '2022-04-05 11:41:49'),
(520, 'Need Help', 'Need Help', 'Website', 0, '2022-04-05 11:41:49'),
(521, 'Link', 'Link', 'Website', 0, '2022-04-05 11:41:49'),
(522, 'CHECKOUT', 'CHECKOUT', 'Website', 0, '2022-04-05 11:41:49'),
(523, 'LOGIN', 'LOGIN', 'Website', 0, '2022-04-05 11:41:49'),
(524, 'REGISTER', 'REGISTER', 'Website', 0, '2022-04-05 11:41:49'),
(525, 'VIEW CART', 'VIEW CART', 'Website', 0, '2022-04-05 11:41:49'),
(526, 'Links', 'Links', 'Website', 0, '2022-04-05 11:41:49'),
(527, 'Return Policy', 'Return Policy', 'Website', 0, '2022-04-05 11:41:49'),
(528, 'Shipping Info', 'Shipping Info', 'Website', 0, '2022-04-05 11:41:49'),
(529, 'About Us', 'About Us', 'Website', 0, '2022-04-05 11:41:49'),
(530, 'Home', 'Home', 'Website', 0, '2022-04-05 11:41:49'),
(531, 'CONTACT US', 'CONTACT US', 'Website', 0, '2022-04-05 11:41:49'),
(532, 'Follow Us', 'Follow Us', 'Website', 0, '2022-04-05 11:41:49'),
(533, 'FAQ', 'FAQ', 'Website', 0, '2022-04-05 11:41:49'),
(534, 'LATEST NEWS', 'LATEST NEWS', 'Website', 0, '2022-04-05 11:41:49'),
(535, 'Subscribe to Our Newsletter', 'Subscribe to Our Newsletter', 'Website', 0, '2022-04-05 11:41:49'),
(536, 'Thank You For Subscribe.', 'Thank You For Subscribe.', 'Website', 0, '2022-04-05 11:41:49'),
(537, 'Subscribe Fail, You Already Subscribe.', 'Subscribe Fail, You Already Subscribe.', 'Website', 0, '2022-04-05 11:41:49'),
(539, 'MY SHOPPING CART', 'MY SHOPPING CART', 'Website', 0, '2022-04-05 11:41:49'),
(540, 'Select Language', 'Select Language', 'Website', 0, '2022-04-05 11:41:49'),
(541, 'Member Login', 'Member Login', 'Website', 0, '2022-04-05 11:41:49'),
(542, 'CONTINUE SHOPPING', 'CONTINUE SHOPPING', 'Website', 0, '2022-04-05 11:41:49'),
(543, 'SELECT YOUR COUNTRY:', 'SELECT YOUR COUNTRY:', 'Website', 0, '2022-04-05 11:41:49'),
(544, 'Your Currency', 'Your Currency', 'Website', 0, '2022-04-05 11:41:49'),
(545, 'Total', 'Total', 'Website', 0, '2022-04-05 11:41:49'),
(546, 'SHOPPING CART', 'SHOPPING CART', 'Website', 0, '2022-04-05 11:41:49'),
(547, 'SUMMARY', 'SUMMARY', 'Website', 0, '2022-04-05 11:41:49'),
(548, 'Quantity', 'Quantity', 'Website', 0, '2022-04-05 11:41:49'),
(549, 'No Of Items', 'No Of Items', 'Website', 0, '2022-04-05 11:41:49'),
(550, 'GO TO CHECKOUT', 'GO TO CHECKOUT', 'Website', 0, '2022-04-05 11:41:49'),
(551, '{{average}} From {{total}} Votes', '{{average}} From {{total}} Votes', 'Web Rating', 0, '2022-04-05 11:41:49'),
(552, 'No Product Found', 'No Product Found', 'Website Products', 0, '2022-04-05 11:41:49'),
(553, 'In Stock', 'In Stock', 'Website Products', 0, '2022-04-05 11:41:49'),
(554, 'Out Stock', 'Out Stock', 'Website Products', 0, '2022-04-05 11:41:49'),
(555, 'Color', 'Color', 'Website Products', 0, '2022-04-05 11:41:49'),
(556, 'Size', 'Size', 'Website Products', 0, '2022-04-05 11:41:49'),
(557, 'Specials', 'Specials', 'Website Products', 0, '2022-04-05 11:41:49'),
(558, 'Collection by Designer', 'Collection by Designer', 'Website Products', 0, '2022-04-05 11:41:49'),
(559, 'Compare Product', 'Compare Product', 'Website Products', 0, '2022-04-05 11:41:49'),
(560, 'Add to WishList', 'Add to WishList', 'Website Products', 0, '2022-04-05 11:41:49'),
(561, 'BUY', 'BUY', 'Website Products', 0, '2022-04-05 11:41:49'),
(562, 'Details', 'Details', 'Website Products', 0, '2022-04-05 11:41:49'),
(563, 'Show Details', 'Show Details', 'Website Products', 0, '2022-04-05 11:41:49'),
(564, 'Product Quick View', 'Product Quick View', 'Website Products', 0, '2022-04-05 11:41:49'),
(565, 'Three For Two Category', 'Three For Two Category', 'Website Products', 0, '2022-04-05 11:41:49'),
(566, 'From', 'From', 'Website Products', 0, '2022-04-05 11:41:49'),
(567, 'Lagg till i varukorgen', 'Lagg till i varukorgen', 'Website Products', 0, '2022-04-05 11:41:49'),
(568, 'Custom', 'Custom', 'Website Products', 0, '2022-04-05 11:41:49'),
(569, 'Subscribe Successfully', 'Subscribe Successfully', 'Website Products', 0, '2022-04-05 11:41:49'),
(570, 'Subscribe Fail', 'Subscribe Fail', 'Website Products', 0, '2022-04-05 11:41:49'),
(571, 'Refer To Friend', 'Refer To Friend', 'Website Products', 0, '2022-04-05 11:41:49'),
(572, 'Refer to a Friend Description', 'Refer to a Friend Description', 'Website Products', 0, '2022-04-05 11:41:49'),
(573, 'Email Send Successfully', 'Email Send Successfully', 'Website Products', 0, '2022-04-05 11:41:49'),
(574, 'Email Send Fail', 'Email Send Fail', 'Website Products', 0, '2022-04-05 11:41:49'),
(575, 'Send Coupon Code', 'Send Coupon Code', 'Website Products', 0, '2022-04-05 11:41:49'),
(576, 'CouponOffer', 'CouponOffer', 'Website Products', 0, '2022-04-05 11:41:49'),
(577, 'Enter your email and get Latest Coupons Code', 'Enter your email and get Latest Coupons Code', 'Website Products', 0, '2022-04-05 11:41:49'),
(578, 'Add To Cart', 'Add To Cart', 'Website Products', 0, '2022-04-05 11:41:49'),
(580, 'Check Out Offer But Now & Get Special Discount', 'Check Out Offer But Now & Get Special Discount', 'Website Products', 0, '2022-04-05 11:41:49'),
(581, 'I Accept', 'I Accept', 'Website Products', 0, '2022-04-05 11:41:49'),
(582, 'Order Code', 'Order Code', 'Website Products', 0, '2022-04-05 11:41:49'),
(583, 'User Info', 'User Info', 'Website Products', 0, '2022-04-05 11:41:49'),
(584, 'User Name', 'User Name', 'Website Products', 0, '2022-04-05 11:41:49'),
(585, 'Sale Trigger Form', 'Sale Trigger Form', 'Website Products', 0, '2022-04-05 11:41:49'),
(586, 'Stock Trigger Form', 'Stock Trigger Form', 'Website Products', 0, '2022-04-05 11:41:49'),
(587, 'Number Which Claims In', 'Number Which Claims In', 'Website Products', 0, '2022-04-05 11:41:49'),
(588, 'Get New Item', 'Get New Item', 'Website Products', 0, '2022-04-05 11:41:49'),
(589, 'Get Money Back', 'Get Money Back', 'Website Products', 0, '2022-04-05 11:41:49'),
(590, 'Want to switch to another product or get your money back?', 'Want to switch to another product or get your money back?', 'Website Products', 0, '2022-04-05 11:41:49'),
(591, 'Buy Back', 'Buy Back', 'Website Products', 0, '2022-04-05 11:41:49'),
(592, 'Name of your bank', 'Name of your bank', 'Website Products', 0, '2022-04-05 11:41:49'),
(593, 'sortCode', 'sortCode', 'Website Products', 0, '2022-04-05 11:41:49'),
(594, 'Account Number', 'Account Number', 'Website Products', 0, '2022-04-05 11:41:49'),
(595, 'When Replacing', 'When Replacing', 'Website Products', 0, '2022-04-05 11:41:49'),
(596, 'I want to change to', 'I want to change to', 'Website Products', 0, '2022-04-05 11:41:49'),
(597, 'Message', 'Message', 'Website Products', 0, '2022-04-05 11:41:49'),
(598, 'Submit DateTime', 'Submit DateTime', 'Website Products', 0, '2022-04-05 11:41:49'),
(599, 'Edit custom size form', 'Edit custom size form', 'Website Products', 0, '2022-04-05 11:41:49'),
(600, 'User not fill final form', 'User not fill final form', 'Website Products', 0, '2022-04-05 11:41:49'),
(601, 'Submit now, But i will fill this form later', 'Submit now, But i will fill this form later', 'Website Products', 0, '2022-04-05 11:41:49'),
(602, 'Defect Image', 'Defect Image', 'Website Products', 0, '2022-04-05 11:41:49');
INSERT INTO `hardwords` (`id`, `en`, `lang`, `place`, `allowDelete`, `time`) VALUES
(603, 'Return Product Save Successfully', 'Return Product Save Successfully', 'Website Products', 0, '2022-04-05 11:41:49'),
(604, 'Product add to cart successfully', 'Product add to cart successfully', 'Website Products', 0, '2022-04-05 11:41:49'),
(605, 'Print PDF', 'Print PDF', 'Website Products', 0, '2022-04-05 11:41:49'),
(606, 'Send To Factory', 'Send To Factory', 'Website Products', 0, '2022-04-05 11:41:49'),
(607, 'Your Gift card Id \"{{giftId}}\"  will be charged {{cartPrice}} from {{giftPrice}}', 'Your Gift card Id \"{{giftId}}\"  will be charged {{cartPrice}} from {{giftPrice}}', 'Website Products', 0, '2022-04-05 11:41:49'),
(608, 'Gift Card Id is Not Valid.', 'Gift Card Id is Not Valid.', 'Website Products', 0, '2022-04-05 11:41:49'),
(609, 'You have low price in you Gift card :{{giftPrice}}', 'You have low price in you Gift card :{{giftPrice}}', 'Website Products', 0, '2022-04-05 11:41:49'),
(610, 'Your Gift card in ( {{giftCurrency}} ) currency, and not valid for ( {{cartCurrency}} ) currency', 'Your Gift card in ( {{giftCurrency}} ) currency, and not valid for ( {{cartCurrency}} ) currency', 'Website Products', 0, '2022-04-05 11:41:49'),
(611, 'Default', 'Default', 'Website Products', 0, '2022-04-05 11:41:49'),
(612, 'Recommends', 'Recommends', 'Website Products', 0, '2022-04-05 11:41:49'),
(613, 'By Low Price', 'By Low Price', 'Website Products', 0, '2022-04-05 11:41:49'),
(614, 'By High Price', 'By High Price', 'Website Products', 0, '2022-04-05 11:41:49'),
(615, 'By Low Rate', 'By Low Rate', 'Website Products', 0, '2022-04-05 11:41:49'),
(616, 'By High Rate', 'By High Rate', 'Website Products', 0, '2022-04-05 11:41:49'),
(617, 'By Low View', 'By Low View', 'Website Products', 0, '2022-04-05 11:41:49'),
(618, 'By Top View', 'By Top View', 'Website Products', 0, '2022-04-05 11:41:49'),
(619, 'By Low Sale', 'By Low Sale', 'Website Products', 0, '2022-04-05 11:41:49'),
(620, 'By Top Sale', 'By Top Sale', 'Website Products', 0, '2022-04-05 11:41:50'),
(621, 'Show', 'Show', 'Website Products', 0, '2022-04-05 11:41:50'),
(622, 'EDIT', 'EDIT', 'Website Products', 0, '2022-04-05 11:41:50'),
(623, 'SUBTOTAL', 'SUBTOTAL', 'Website Products', 0, '2022-04-05 11:41:50'),
(624, 'ESTIMATED DELIVERY & HANDLING', 'ESTIMATED DELIVERY & HANDLING', 'Website Products', 0, '2022-04-05 11:41:50'),
(625, 'YOUR CART', 'YOUR CART', 'Website Products', 0, '2022-04-05 11:41:50'),
(626, 'ITEM(s)', 'ITEM(s)', 'Website Products', 0, '2022-04-05 11:41:50'),
(627, 'COUNT(*)', 'COUNT(*)', 'Website Products', 0, '2022-04-05 11:41:50'),
(628, 'Payment Type', 'Payment Type', 'Website Products', 0, '2022-04-05 11:41:50'),
(629, 'NEXT STEP', 'NEXT STEP', 'Website Products', 0, '2022-04-05 11:41:50'),
(630, 'DELIVERY', 'DELIVERY', 'Website Products', 0, '2022-04-05 11:41:50'),
(631, 'Click to view your previous orders OR', 'Click to view your previous orders OR', 'Website Products', 0, '2022-04-05 11:41:50'),
(632, 'Click to view your invoice OR', 'Click to view your invoice OR', 'Website Products', 0, '2022-04-05 11:41:50'),
(633, 'ORDER PREVIEW', 'ORDER PREVIEW', 'Website Products', 0, '2022-04-05 11:41:50'),
(634, 'Klarna = Faktura, Delbetalning, Kort & Internetbank', 'Klarna = Faktura, Delbetalning, Kort & Internetbank', 'Website Products', 0, '2022-04-05 11:41:50'),
(635, 'CHECK OUT', 'CHECK OUT', 'Website Products', 0, '2022-04-05 11:41:50'),
(636, 'Payment Option', 'Payment Option', 'Website Products', 0, '2022-04-05 11:41:50'),
(637, 'Billing Country', 'Billing Country', 'Website Products', 0, '2022-04-05 11:41:50'),
(638, 'Subscription for stock availability', 'Subscription for stock availability', 'Website Products', 0, '2022-04-05 11:41:50'),
(639, 'Fill The Data', 'Fill The Data', 'Website Products', 0, '2022-04-05 11:41:50'),
(640, 'By Latest Added', 'By Latest Added', 'Website Products', 0, '2022-04-05 11:41:50'),
(641, 'By Best Seller', 'By Best Seller', 'Website Products', 0, '2022-04-05 11:41:50'),
(642, 'You are already subscribed on this sale offer', 'You are already subscribed on this sale offer', 'Website Products', 0, '2022-04-05 11:41:50'),
(643, 'You are already subscribed for this product', 'You are already subscribed for this product', 'Website Products', 0, '2022-04-05 11:41:50'),
(644, 'View', 'View', 'Website Products', 0, '2022-04-05 11:41:50'),
(645, 'Select Color', 'Select Color', 'Website Products', 0, '2022-04-05 11:41:50'),
(646, 'Select Scale', 'Select Scale', 'Website Products', 0, '2022-04-05 11:41:50'),
(647, 'ADD TO BAG', 'ADD TO BAG', 'Website Products', 0, '2022-04-05 11:41:50'),
(648, 'Package Deal', 'Package Deal', 'Website Products', 0, '2022-04-05 11:41:50'),
(649, 'Bundle Category', 'Bundle Category', 'Website Products', 0, '2022-04-05 11:41:50'),
(650, 'Bundle feature applies:', 'Bundle feature applies:', 'Website Products', 0, '2022-04-05 11:41:50'),
(651, 'pcs for', 'pcs for', 'Website Products', 0, '2022-04-05 11:41:50'),
(652, 'BESTSELLER CATEGORY', 'BESTSELLER CATEGORY', 'Website Products', 0, '2022-04-05 11:41:50'),
(653, 'Buy to', 'Buy to', 'Website Products', 0, '2022-04-05 11:41:50'),
(654, 'Do not forget to buy to', 'Do not forget to buy to', 'Website Products', 0, '2022-04-05 11:41:50'),
(655, 'No thanks !', 'No thanks !', 'Website Products', 0, '2022-04-05 11:41:50'),
(656, 'You are already logged in!', 'You are already logged in!', 'Admin Login', 0, '2022-04-05 11:41:50'),
(657, 'Too many login attempts. Please try after some time later!', 'Too many login attempts. Please try after some time later!', 'Admin Login', 0, '2022-04-05 11:41:50'),
(658, 'Forgotten your password? \n Click Here!', 'Forgotten your password? \n Click Here!', 'Admin Login', 0, '2022-04-05 11:41:50'),
(659, 'Woops, Too Slow!', 'Woops, Too Slow!', 'Admin Login', 0, '2022-04-05 11:41:50'),
(660, 'Session expired! Please try again. This is for your own security.', 'Session expired! Please try again. This is for your own security.', 'Admin Login', 0, '2022-04-05 11:41:50'),
(661, 'Your email or password is incorrect, please type again!', 'Your email or password is incorrect, please type again!', 'Admin Login', 0, '2022-04-05 11:41:50'),
(662, 'Stop!', 'Stop!', 'Admin Login', 0, '2022-04-05 11:41:50'),
(663, 'Edit Product', 'Edit Product', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(664, 'Basic Information', 'Basic Information', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(665, 'Sizes', 'Sizes', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(666, 'Colors', 'Colors', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(667, 'Product Basic Information', 'Product Basic Information', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(668, '(SKU)Per pice/per Product', '(SKU)Per pice/per Product', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(669, '(SKU)Per pice (1)/per Product (0)', '(SKU)Per pice (1)/per Product (0)', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(670, 'per pice', 'per pice', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(671, 'hole product', 'hole product', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(672, 'Per product', 'Per product', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(673, '1', '1', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(674, '0', '0', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(675, 'Detail Description', 'Detail Description', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(676, 'SIZES & MEASUREMENTS', 'SIZES & MEASUREMENTS', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(677, 'DELIVERY & RETURN', 'DELIVERY & RETURN', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(678, 'Product Price', 'Product Price', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(679, 'Product Sizes', 'Product Sizes', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(680, 'Product Sizes Weight', 'Product Sizes Weight', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(681, 'Enter Exact name that use in product Size name, IF Size Name not match Product Weight will not work in shipping and It will use product default weight', 'Enter Exact name that use in product Size name, IF Size Name not match Product Weight will not work in shipping and It will use product default weight', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(682, 'Product Color', 'Product Color', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(683, 'Product Images', 'Product Images', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(684, 'Use These name in Alt, main: main image, And Other all image enter there alt', 'Use These name in Alt, main: main image, And Other all image enter there alt', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(685, 'Drop images here to upload.', 'Drop images here to upload.', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(686, 'they will only be visible to you', 'they will only be visible to you', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(687, 'Public Access', 'Public Access', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(688, 'Product Launch Date', 'Product Launch Date', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(689, 'Launch Date : leave blank if you want to Publish Now', 'Launch Date : leave blank if you want to Publish Now', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(690, 'Default Weight In KG', 'Default Weight In KG', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(691, 'Minimum Quantity Allow', 'Minimum Quantity Allow', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(692, 'Use Config Setting', 'Use Config Setting', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(693, 'Maximum Quantity Allow', 'Maximum Quantity Allow', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(694, 'Manage Discount', 'Manage Discount', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(695, 'Image Preview', 'Image Preview', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(696, 'Image Not Delete Please Try Again', 'Image Not Delete Please Try Again', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(697, 'Done', 'Done', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(698, 'Model', 'Model', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(699, 'Model No', 'Model No', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(700, 'Label', 'Label', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(701, 'Short Description', 'Short Description', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(702, 'Policy Icons', 'Policy Icons', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(703, 'Specification', 'Specification', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(704, 'Size Chart', 'Size Chart', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(705, 'Buy 2 get 1 Free', 'Buy 2 get 1 Free', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(706, 'Buy QTY Limit', 'Buy QTY Limit', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(707, 'Review', 'Review', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(708, 'Ask Questions', 'Ask Questions', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(709, 'Video Link', 'Video Link', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(710, 'Product Main Image Size : 230x380, Detail Image Size:475x700', 'Product Main Image Size : 230x380, Detail Image Size:475x700', 'Admin Product Add', 0, '2022-04-05 11:52:22'),
(711, 'Custom Size Type', 'Custom Size Type', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(712, 'Custom Size Price +', 'Custom Size Price +', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(713, 'Feature Points', 'Feature Points', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(714, 'Related Products', 'Related Products', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(715, 'Quick Product Quantity Add Successfully', 'Quick Product Quantity Add Successfully', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(716, 'Selected Products', 'Selected Products', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(717, 'Get A Look', 'Get A Look', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(718, 'Get Look Products', 'Get Look Products', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(719, 'Get This Feature Look Products', 'Get This Feature Look Products', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(720, 'New Category', 'New Category', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(721, 'Combine With Category', 'Combine With Category', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(722, 'SKU *', 'SKU *', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(723, 'Add Minimum Stock to Notify', 'Add Minimum Stock to Notify', 'Admin Product Add', 0, '2022-04-05 11:52:23'),
(724, 'Category 1', 'Category 1', 'admin', 0, '2022-04-05 11:52:23'),
(725, 'Category 2', 'Category 2', 'admin', 0, '2022-04-05 11:52:23'),
(726, 'Category 3', 'Category 3', 'admin', 0, '2022-04-05 11:52:23'),
(727, 'Category 4', 'Category 4', 'admin', 0, '2022-04-05 11:52:23'),
(728, 'Deal Management', 'Deal Management', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(729, 'Manage Deal', 'Manage Deal', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(730, 'Active Deal', 'Active Deal', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(731, 'Sort Deal', 'Sort Deal', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(732, 'Add New Deal', 'Add New Deal', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(733, 'IMAGE', 'IMAGE', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(734, 'Sort', 'Sort', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(735, 'Image File Error', 'Image File Error', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(736, 'Image Not Found', 'Image Not Found', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(737, 'Deal', 'Deal', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(738, 'Deal Add Successfully', 'Deal Add Successfully', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(739, 'Deal Add Failed', 'Deal Add Failed', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(740, 'Deal Update Failed', 'Deal Update Failed', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(741, 'Deal Update Successfully', 'Deal Update Successfully', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(742, 'Deal Title', 'Deal Title', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(743, 'Deal Link', 'Deal Link', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(744, 'Image Recommended Size : {{size}}', 'Image Recommended Size : {{size}}', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(745, 'Layer', 'Layer', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(746, 'Designation', 'Designation', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(747, 'Date', 'Date', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(748, 'Old File Image', 'Old File Image', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(749, 'Fileds', 'Fileds', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(750, 'Edit Form Fields', 'Edit Form Fields', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(751, 'Deal Name', 'Deal Name', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(752, 'Fields Name: separate with comma', 'Fields Name: separate with comma', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(753, 'This is only For admin to manage or sort fields', 'This is only For admin to manage or sort fields', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(754, 'Field Name', 'Field Name', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(755, 'Field Desc', 'Field Desc', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(756, 'Required', 'Required', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(758, 'Deal Products', 'Deal Products', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(759, 'Deal Box Size', 'Deal Box Size', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(760, 'Small', 'Small', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(761, 'Big', 'Big', 'Admin Deal', 0, '2022-04-05 11:52:50'),
(762, 'Manage WebSite Footer Menu', 'Manage WebSite Footer Menu', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(763, 'Add New Footer Menu', 'Add New Footer Menu', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(764, 'Update Footer Menu', 'Update Footer Menu', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(765, 'Manage Product Categories', 'Manage Product Categories', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(766, 'Add New Menu', 'Add New Menu', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(767, 'Website Menu', 'Website Menu', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(768, 'Update Menu', 'Update Menu', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(769, 'Menu Update Fail', 'Menu Update Fail', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(770, 'Menu Update Successfully', 'Menu Update Successfully', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(771, 'Menu Add Successfully', 'Menu Add Successfully', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(772, 'New Menu Add Fail', 'New Menu Add Fail', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(773, 'Menu Name', 'Menu Name', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(774, 'Menu Under', 'Menu Under', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(775, 'Icon Image Link', 'Icon Image Link', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(776, 'Icon', 'Icon', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(777, 'Old Icon', 'Old Icon', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(778, 'Root Menu', 'Root Menu', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(779, 'Add link for this URL', 'Add link for this URL', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(780, 'Show related link for this page', 'Show related link for this page', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(781, 'Image alt text', 'Image alt text', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(782, 'Enter image alt text', 'Enter image alt text', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(783, 'Page Links', 'Page Links', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(784, 'USE', 'USE', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(785, 'All Deals Products', 'All Deals Products', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(786, 'Product Category Links', 'Product Category Links', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(787, 'Product Deals Category Links', 'Product Deals Category Links', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(788, 'Featured', 'Featured', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(789, 'Top Sale', 'Top Sale', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(790, 'Category Add Successfully', 'Category Add Successfully', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(791, 'New Category Add Fail', 'New Category Add Fail', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(792, 'Category Under', 'Category Under', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(793, 'Root Category', 'Root Category', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(794, 'Category Name', 'Category Name', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(795, 'Add New Category', 'Add New Category', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(796, 'Old Banner Image', 'Old Banner Image', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(797, 'Category Update Fail', 'Category Update Fail', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(798, 'Category Update Successfully', 'Category Update Successfully', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(799, 'Update Category', 'Update Category', 'Admin WebSite Menu', 0, '2022-04-05 11:53:00'),
(800, 'Discount Products', 'Discount Products', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(801, 'Discount Status Off', 'Discount Status Off', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(802, 'Expire', 'Expire', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(803, 'DISCOUNT DATE', 'DISCOUNT DATE', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(804, 'Discount Product Setting', 'Discount Product Setting', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(805, 'Discount From', 'Discount From', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(806, 'Discount To', 'Discount To', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(807, 'Discount Start Date : Discount will available from start date,Leave blank To Start Now', 'Discount Start Date : Discount will available from start date,Leave blank To Start Now', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(808, 'Discount End Date: Leave blank for Always', 'Discount End Date: Leave blank for Always', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(809, 'Discount Deduct In', 'Discount Deduct In', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(810, 'In Price', 'In Price', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(811, 'In Percent %', 'In Percent %', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(812, 'New Product Discount Added with Product Id : {{pId}} And Discount Id : {{id}}', 'New Product Discount Added with Product Id : {{pId}} And Discount Id : {{id}}', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(813, 'Product Discount Save Successfully', 'Product Discount Save Successfully', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(814, 'Product Discount Save Failed', 'Product Discount Save Failed', 'Admin Product discount', 0, '2022-04-05 12:04:27'),
(815, 'Active Coupons', 'Active Coupons', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(816, 'Coupon Off', 'Coupon Off', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(817, 'New Coupon', 'New Coupon', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(818, 'New Sale Offer', 'New Sale Offer', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(819, 'Expire Discount Products', 'Expire Discount Products', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(820, 'Pending Discount Products', 'Pending Discount Products', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(821, 'Discount Products Status Off', 'Discount Products Status Off', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(822, 'COUPON', 'COUPON', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(824, 'New Coupon Add Successfully', 'New Coupon Add Successfully', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(825, 'New Coupon Added With Id: {{id}}', 'New Coupon Added With Id: {{id}}', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(826, 'Coupon Add Fail Please Try Again', 'Coupon Add Fail Please Try Again', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(827, 'Only Product Whole Sale Offer', 'Only Product Whole Sale Offer', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(828, 'Only Product Discount Offer', 'Only Product Discount Offer', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(829, 'Only Coupon Offer (Recommended)', 'Only Coupon Offer (Recommended)', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(830, 'If Product Has Individual Discount Then Which situation apply?', 'If Product Has Individual Discount Then Which situation apply?', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(831, 'Free Shipping Allow In Country', 'Free Shipping Allow In Country', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(832, 'Active From', 'Active From', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(833, 'Enter Coupon Offer Name', 'Enter Coupon Offer Name', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(834, 'Coupon Name', 'Coupon Name', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(835, 'Coupon Status', 'Coupon Status', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(836, 'Product Coupon Setting', 'Product Coupon Setting', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(837, 'User Type', 'User Type', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(838, 'Gold', 'Gold', 'Admin Product Coupon', 0, '2022-04-05 12:04:34'),
(839, 'Basic', 'Basic', 'Admin Product Coupon', 0, '2022-04-05 12:04:35'),
(840, 'Platinum', 'Platinum', 'Admin Product Coupon', 0, '2022-04-05 12:04:35'),
(841, 'Best Seller Management', 'Best Seller Management', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(842, 'Manage Bestsellers', 'Manage Bestsellers', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(843, 'Active Bestsellers', 'Active Bestsellers', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(844, 'Sort Bestsellers', 'Sort Bestsellers', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(845, 'Add New Bestseller', 'Add New Bestseller', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(846, 'Bestsellers', 'Bestsellers', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(847, 'Bestseller Add Successfully', 'Bestseller Add Successfully', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(848, 'Bestseller Add Failed', 'Bestseller Add Failed', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(849, 'Bestseller Update Failed', 'Bestseller Update Failed', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(850, 'Bestseller Update Successfully', 'Bestseller Update Successfully', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(851, 'Bestseller Title', 'Bestseller Title', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(852, 'Bestseller Link', 'Bestseller Link', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(853, 'Old Bestseller Image', 'Old Bestseller Image', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(854, 'Choose Product', 'Choose Product', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(855, 'Type Product Name For Suggestion List', 'Type Product Name For Suggestion List', 'Admin Bestsellers', 0, '2022-04-05 12:04:42'),
(856, 'Recommends Management', 'Recommends Management', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(857, 'Manage Recommends', 'Manage Recommends', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(858, 'Active Recommends', 'Active Recommends', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(859, 'Sort Recommends', 'Sort Recommends', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(860, 'Add New Recommends', 'Add New Recommends', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(861, 'Categories Under', 'Categories Under', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(862, 'Categories Menu', 'Categories Menu', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(863, 'Recommendss', 'Recommendss', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(864, 'Recommends Add Successfully', 'Recommends Add Successfully', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(865, 'Recommends Add Failed', 'Recommends Add Failed', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(866, 'Recommends Update Failed', 'Recommends Update Failed', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(867, 'Recommends Update Successfully', 'Recommends Update Successfully', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(868, 'Recommends Title', 'Recommends Title', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(869, 'Recommends Link', 'Recommends Link', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(870, 'Old Recommends Image', 'Old Recommends Image', 'Admin Recommendss', 0, '2022-04-05 12:06:41'),
(871, 'Export Product Price', 'Export Product Price', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(872, 'Import Product Price', 'Import Product Price', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(873, 'Export Product Discount', 'Export Product Discount', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(874, 'Import Product Discount', 'Import Product Discount', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(875, 'Export Price', 'Export Price', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(876, 'Export Discount', 'Export Discount', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(877, 'Note: After Export all stock inventory, Only update data from 2 columns (Discount(currency) and DiscountFormat)', 'Note: After Export all stock inventory, Only update data from 2 columns (Discount(currency) and DiscountFormat)', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(878, 'Product Discount Exported File', 'Product Discount Exported File', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(879, 'Product Price Exported File', 'Product Price Exported File', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(880, 'Note: After Export all product prices, Only update data from 5 columns (Manufacturer Name,Sweden(SEK),Norwegian(NOK),Denmark(DK),Finland(FI))', 'Note: After Export all product prices, Only update data from 5 columns (Manufacturer Name,Sweden(SEK),Norwegian(NOK),Denmark(DK),Finland(FI))', 'Admin Product Portation', 0, '2022-04-05 12:06:45'),
(881, 'Add New Order', 'Add New Order', 'Admin Order', 0, '2022-04-05 12:06:54'),
(882, 'InComplete Orders', 'InComplete Orders', 'Admin Order', 0, '2022-04-05 12:06:54'),
(883, 'Complete Orders', 'Complete Orders', 'Admin Order', 0, '2022-04-05 12:06:54'),
(884, 'Cancel Orders', 'Cancel Orders', 'Admin Order', 0, '2022-04-05 12:06:54'),
(885, 'InProcess Invoices', 'InProcess Invoices', 'Admin Order', 0, '2022-04-05 12:06:54'),
(886, 'Order Create/View', 'Order Create/View', 'Admin Order', 0, '2022-04-05 12:06:54'),
(887, 'Select User', 'Select User', 'Admin Order', 0, '2022-04-05 12:06:54'),
(888, 'No User', 'No User', 'Admin Order', 0, '2022-04-05 12:06:54'),
(889, 'Invoice Status', 'Invoice Status', 'Admin Order', 0, '2022-04-05 12:06:54'),
(890, 'Payment Info', 'Payment Info', 'Admin Order', 0, '2022-04-05 12:06:54'),
(891, 'Enter Vendor Payment Information', 'Enter Vendor Payment Information', 'Admin Order', 0, '2022-04-05 12:06:54'),
(892, 'PRODUCT SCALE', 'PRODUCT SCALE', 'Admin Order', 0, '2022-04-05 12:06:54'),
(893, 'Address', 'Address', 'Admin Order', 0, '2022-04-05 12:06:54'),
(894, 'Phone', 'Phone', 'Admin Order', 0, '2022-04-05 12:06:54'),
(895, 'Select Product Name', 'Select Product Name', 'Admin Order', 0, '2022-04-05 12:06:54'),
(896, 'Select Store', 'Select Store', 'Admin Order', 0, '2022-04-05 12:06:54'),
(897, 'Product QTY', 'Product QTY', 'Admin Order', 0, '2022-04-05 12:06:54'),
(898, 'Single Price', 'Single Price', 'Admin Order', 0, '2022-04-05 12:06:54'),
(899, 'Add Product', 'Add Product', 'Admin Order', 0, '2022-04-05 12:06:54'),
(900, 'Remove Checked Items', 'Remove Checked Items', 'Admin Order', 0, '2022-04-05 12:06:54'),
(901, 'Check/Uncheck All', 'Check/Uncheck All', 'Admin Order', 0, '2022-04-05 12:06:54'),
(902, 'WEIGHT', 'WEIGHT', 'Admin Order', 0, '2022-04-05 12:06:54'),
(903, 'QTY', 'QTY', 'Admin Order', 0, '2022-04-05 12:06:54'),
(904, '(QTY*PRICE) - DISCOUNT = TOTAL PRICE', '(QTY*PRICE) - DISCOUNT = TOTAL PRICE', 'Admin Order', 0, '2022-04-05 12:06:54'),
(905, 'TOTAL WEIGHT', 'TOTAL WEIGHT', 'Admin Order', 0, '2022-04-05 12:06:54'),
(906, 'TOTAL PRICE', 'TOTAL PRICE', 'Admin Order', 0, '2022-04-05 12:06:54'),
(907, 'Sender And Receiver Information', 'Sender And Receiver Information', 'Admin Order', 0, '2022-04-05 12:06:54'),
(908, 'I am sender And Receiver', 'I am sender And Receiver', 'Admin Order', 0, '2022-04-05 12:06:54'),
(909, 'I am Sender And Friend Is receiver', 'I am Sender And Friend Is receiver', 'Admin Order', 0, '2022-04-05 12:06:54'),
(910, 'Sender Information', 'Sender Information', 'Admin Order', 0, '2022-04-05 12:06:54'),
(911, 'Sender Name', 'Sender Name', 'Admin Order', 0, '2022-04-05 12:06:54'),
(912, 'Sender Phone', 'Sender Phone', 'Admin Order', 0, '2022-04-05 12:06:54'),
(913, 'Sender Email', 'Sender Email', 'Admin Order', 0, '2022-04-05 12:06:54'),
(914, 'Sender City', 'Sender City', 'Admin Order', 0, '2022-04-05 12:06:54'),
(915, 'Sender Country', 'Sender Country', 'Admin Order', 0, '2022-04-05 12:06:54'),
(916, 'Sender Post Code', 'Sender Post Code', 'Admin Order', 0, '2022-04-05 12:06:54'),
(917, 'Sender Address', 'Sender Address', 'Admin Order', 0, '2022-04-05 12:06:54'),
(918, 'Receiver Information', 'Receiver Information', 'Admin Order', 0, '2022-04-05 12:06:54'),
(919, 'Receiver Name', 'Receiver Name', 'Admin Order', 0, '2022-04-05 12:06:54'),
(920, 'Receiver Phone', 'Receiver Phone', 'Admin Order', 0, '2022-04-05 12:06:54'),
(921, 'Receiver Email', 'Receiver Email', 'Admin Order', 0, '2022-04-05 12:06:54'),
(922, 'Receiver City', 'Receiver City', 'Admin Order', 0, '2022-04-05 12:06:54'),
(923, 'Receiver Country', 'Receiver Country', 'Admin Order', 0, '2022-04-05 12:06:54'),
(924, 'Receiver Post Code', 'Receiver Post Code', 'Admin Order', 0, '2022-04-05 12:06:54'),
(925, 'Receiver Address', 'Receiver Address', 'Admin Order', 0, '2022-04-05 12:06:54'),
(926, 'Last Order View', 'Last Order View', 'Admin Order', 0, '2022-04-05 12:06:54'),
(927, 'ORDER', 'ORDER', 'Admin Order', 0, '2022-04-05 12:06:54'),
(928, 'Order  Price', 'Order  Price', 'Admin Order', 0, '2022-04-05 12:06:54'),
(929, 'ORDER AND PROCESS', 'ORDER AND PROCESS', 'Admin Order', 0, '2022-04-05 12:06:54'),
(930, 'Order QTY is Greater Than stock Quantity', 'Order QTY is Greater Than stock Quantity', 'Admin Order', 0, '2022-04-05 12:06:54'),
(931, 'Shipping Error', 'Shipping Error', 'Admin Order', 0, '2022-04-05 12:06:54'),
(932, 'Some thing went wrong Please try again', 'Some thing went wrong Please try again', 'Admin Order', 0, '2022-04-05 12:06:54'),
(933, 'Product Submit Fail', 'Product Submit Fail', 'Admin Order', 0, '2022-04-05 12:06:54'),
(934, 'Product Submit', 'Product Submit', 'Admin Order', 0, '2022-04-05 12:06:54'),
(935, 'Product Submit Failed', 'Product Submit Failed', 'Admin Order', 0, '2022-04-05 12:06:54'),
(936, 'New Order Added Successfully', 'New Order Added Successfully', 'Admin Order', 0, '2022-04-05 12:06:54'),
(937, 'New Order', 'New Order', 'Admin Order', 0, '2022-04-05 12:06:54'),
(938, 'Product Successfully Submit', 'Product Successfully Submit', 'Admin Order', 0, '2022-04-05 12:06:54'),
(939, 'Thank you your product is successfully submit', 'Thank you your product is successfully submit', 'Admin Order', 0, '2022-04-05 12:06:54'),
(940, 'INVOICE', 'INVOICE', 'Admin Order', 0, '2022-04-05 12:06:54'),
(941, 'CUSTOMER NAME', 'CUSTOMER NAME', 'Admin Order', 0, '2022-04-05 12:06:54'),
(942, 'INVOICE DATE', 'INVOICE DATE', 'Admin Order', 0, '2022-04-05 12:06:54'),
(943, 'SOLD PRICE', 'SOLD PRICE', 'Admin Order', 0, '2022-04-05 12:06:54'),
(944, 'PAYMENT METHOD', 'PAYMENT METHOD', 'Admin Order', 0, '2022-04-05 12:06:54'),
(945, 'ORDER PROCESS', 'ORDER PROCESS', 'Admin Order', 0, '2022-04-05 12:06:54'),
(946, 'PURCHASE PRICE', 'PURCHASE PRICE', 'Admin Order', 0, '2022-04-05 12:06:54'),
(947, 'VIEW ORDER', 'VIEW ORDER', 'Admin Order', 0, '2022-04-05 12:06:54'),
(948, 'Delete All Old Incomplete Orders', 'Delete All Old Incomplete Orders', 'Admin Order', 0, '2022-04-05 12:06:54'),
(949, 'Selected SubTotal', 'Selected SubTotal', 'Admin Order', 0, '2022-04-05 12:06:54'),
(950, 'ORDER PROCESS - Invoice Status', 'ORDER PROCESS - Invoice Status', 'Admin Order', 0, '2022-04-05 12:06:54'),
(951, 'Update Invoice Status', 'Update Invoice Status', 'Admin Order', 0, '2022-04-05 12:06:54'),
(952, 'Invoice Status Updated', 'Invoice Status Updated', 'Admin Order', 0, '2022-04-05 12:06:54'),
(954, 'CUSTOMER EMAIL', 'CUSTOMER EMAIL', 'Admin Order', 0, '2022-04-05 12:06:54'),
(955, 'Flagged', 'Flagged', 'Admin Order', 0, '2022-04-05 12:06:54'),
(956, 'Store View', 'Store View', 'Admin store', 0, '2022-04-05 12:06:54'),
(957, 'View Stores', 'View Stores', 'Admin store', 0, '2022-04-05 12:06:54'),
(958, 'Add New Store', 'Add New Store', 'Admin store', 0, '2022-04-05 12:06:54'),
(959, 'Prodcut Quantity Add in {{n}} different products', 'Prodcut Quantity Add in {{n}} different products', 'Admin store', 0, '2022-04-05 12:06:54'),
(960, 'New Receipt', 'New Receipt', 'Admin store', 0, '2022-04-05 12:06:54'),
(961, 'Receipt', 'Receipt', 'Admin store', 0, '2022-04-05 12:06:54'),
(962, 'New Receipt Generate Successfully', 'New Receipt Generate Successfully', 'Admin store', 0, '2022-04-05 12:06:54'),
(963, 'New Receipt Generate Failed', 'New Receipt Generate Failed', 'Admin store', 0, '2022-04-05 12:06:54'),
(964, 'Add Store', 'Add Store', 'Admin store', 0, '2022-04-05 12:06:54'),
(965, 'New Store Add Failed!', 'New Store Add Failed!', 'Admin store', 0, '2022-04-05 12:06:54'),
(966, 'New Store Add SuccessFully!', 'New Store Add SuccessFully!', 'Admin store', 0, '2022-04-05 12:06:54'),
(967, 'Store Officer', 'Store Officer', 'Admin store', 0, '2022-04-05 12:06:54'),
(968, 'Store Desc', 'Store Desc', 'Admin store', 0, '2022-04-05 12:06:54'),
(969, 'Profile Add Successfully!', 'Profile Add Successfully!', 'Users Management', 0, '2022-04-05 12:06:54'),
(970, 'Profile Add Failed!', 'Profile Add Failed!', 'Users Management', 0, '2022-04-05 12:06:54'),
(971, 'Employee/User Add fail please try again.!', 'Employee/User Add fail please try again.!', 'Users Management', 0, '2022-04-05 12:06:54'),
(972, 'Duplicate Email, User Already Exist.', 'Duplicate Email, User Already Exist.', 'Users Management', 0, '2022-04-05 12:06:54'),
(973, 'Manage WebUsers', 'Manage WebUsers', 'Users Management', 0, '2022-04-05 12:06:54'),
(974, 'Verify Users', 'Verify Users', 'Users Management', 0, '2022-04-05 12:06:54'),
(975, 'Not Verify', 'Not Verify', 'Users Management', 0, '2022-04-05 12:06:54'),
(976, 'UnVerify Users', 'UnVerify Users', 'Users Management', 0, '2022-04-05 12:06:54'),
(977, 'Account Create', 'Account Create', 'Users Management', 0, '2022-04-05 12:06:54'),
(978, 'Account Status', 'Account Status', 'Users Management', 0, '2022-04-05 12:06:54'),
(979, 'Account Type', 'Account Type', 'Users Management', 0, '2022-04-05 12:06:54'),
(980, 'Active User', 'Active User', 'Users Management', 0, '2022-04-05 12:06:54'),
(981, 'Admin Update with Name : {{name}}', 'Admin Update with Name : {{name}}', 'Users Management', 0, '2022-04-05 12:06:54'),
(982, 'Admin User Group', 'Admin User Group', 'Users Management', 0, '2022-04-05 12:06:54'),
(983, 'adminUser Update fail please try again.!', 'adminUser Update fail please try again.!', 'Users Management', 0, '2022-04-05 12:06:54'),
(984, 'adminUser Update fail please try again.! Or Duplicate Email.', 'adminUser Update fail please try again.! Or Duplicate Email.', 'Users Management', 0, '2022-04-05 12:06:54'),
(985, 'Are You Sure You Want TO Update?', 'Are You Sure You Want TO Update?', 'Users Management', 0, '2022-04-05 12:06:54'),
(986, 'Back To WebUsers', 'Back To WebUsers', 'Users Management', 0, '2022-04-05 12:06:54'),
(987, 'Back To AdminUsers', 'Back To AdminUsers', 'Users Management', 0, '2022-04-05 12:06:54'),
(988, 'Back To AdminGroups', 'Back To AdminGroups', 'Users Management', 0, '2022-04-05 12:06:54'),
(989, 'City', 'City', 'Users Management', 0, '2022-04-05 12:06:54'),
(990, 'Admin Panel', 'Admin Panel', 'Users Management', 0, '2022-04-05 12:06:54'),
(991, 'Date Of Birth', 'Date Of Birth', 'Users Management', 0, '2022-04-05 12:06:54'),
(992, 'DeActive User', 'DeActive User', 'Users Management', 0, '2022-04-05 12:06:54'),
(993, 'DeActive Users', 'DeActive Users', 'Users Management', 0, '2022-04-05 12:06:54'),
(994, 'Delete Email', 'Delete Email', 'Users Management', 0, '2022-04-05 12:06:54'),
(995, 'Delete Group', 'Delete Group', 'Users Management', 0, '2022-04-05 12:06:54'),
(996, 'Delete User', 'Delete User', 'Users Management', 0, '2022-04-05 12:06:54'),
(997, 'Draft Users', 'Draft Users', 'Users Management', 0, '2022-04-05 12:06:54'),
(998, 'Edit User Info', 'Edit User Info', 'Users Management', 0, '2022-04-05 12:06:54'),
(999, 'Edit User Group Permissions', 'Edit User Group Permissions', 'Users Management', 0, '2022-04-05 12:06:54'),
(1000, 'Female', 'Female', 'Users Management', 0, '2022-04-05 12:06:54'),
(1001, 'Gender', 'Gender', 'Users Management', 0, '2022-04-05 12:06:54'),
(1002, 'Groups', 'Groups', 'Users Management', 0, '2022-04-05 12:06:54'),
(1003, 'Group add', 'Group add', 'Users Management', 0, '2022-04-05 12:06:54'),
(1004, 'Group Name', 'Group Name', 'Users Management', 0, '2022-04-05 12:06:54'),
(1006, 'Group Update', 'Group Update', 'Users Management', 0, '2022-04-05 12:06:54'),
(1007, 'Invalid Email Address! Or Some Thing Went Wrong', 'Invalid Email Address! Or Some Thing Went Wrong', 'Users Management', 0, '2022-04-05 12:06:54'),
(1008, 'ITEMS IN CART', 'ITEMS IN CART', 'Users Management', 0, '2022-04-05 12:06:54'),
(1009, 'Last Update', 'Last Update', 'Users Management', 0, '2022-04-05 12:06:54'),
(1010, 'Male', 'Male', 'Users Management', 0, '2022-04-05 12:06:54'),
(1011, 'Manage AdminUsers', 'Manage AdminUsers', 'Users Management', 0, '2022-04-05 12:06:54'),
(1012, 'Manage Admin Groups', 'Manage Admin Groups', 'Users Management', 0, '2022-04-05 12:06:54'),
(1013, 'New Admin Add with Name : {{name}}', 'New Admin Add with Name : {{name}}', 'Users Management', 0, '2022-04-05 12:06:54'),
(1014, 'New Admin User group Add with name : {{name}}', 'New Admin User group Add with name : {{name}}', 'Users Management', 0, '2022-04-05 12:06:54'),
(1015, 'New AdminUser', 'New AdminUser', 'Users Management', 0, '2022-04-05 12:06:55'),
(1016, 'New Group', 'New Group', 'Users Management', 0, '2022-04-05 12:06:55'),
(1017, 'New Group Add Failed', 'New Group Add Failed', 'Users Management', 0, '2022-04-05 12:06:55'),
(1018, 'New Group Add Successfully', 'New Group Add Successfully', 'Users Management', 0, '2022-04-05 12:06:55'),
(1019, 'New Group Update Failed', 'New Group Update Failed', 'Users Management', 0, '2022-04-05 12:06:55'),
(1020, 'New Group Update Successfully', 'New Group Update Successfully', 'Users Management', 0, '2022-04-05 12:06:55'),
(1021, 'Not Access', 'Not Access', 'Users Management', 0, '2022-04-05 12:06:55'),
(1022, 'New Users', 'New Users', 'Users Management', 0, '2022-04-05 12:06:55'),
(1023, 'ORDER CANCEL', 'ORDER CANCEL', 'Users Management', 0, '2022-04-05 12:06:55'),
(1024, 'ORDER DONE', 'ORDER DONE', 'Users Management', 0, '2022-04-05 12:06:55'),
(1025, 'ORDER PENDING', 'ORDER PENDING', 'Users Management', 0, '2022-04-05 12:06:55'),
(1026, 'ORDER STATUS', 'ORDER STATUS', 'Users Management', 0, '2022-04-05 12:06:55'),
(1027, 'ORDER SUBMIT', 'ORDER SUBMIT', 'Users Management', 0, '2022-04-05 12:06:55'),
(1028, 'OTHERS STATUS', 'OTHERS STATUS', 'Users Management', 0, '2022-04-05 12:06:55'),
(1029, 'OWNER', 'OWNER', 'Users Management', 0, '2022-04-05 12:06:55'),
(1030, 'User Orders', 'User Orders', 'Users Management', 0, '2022-04-05 12:06:55'),
(1031, 'Password Not Matched!', 'Password Not Matched!', 'Users Management', 0, '2022-04-05 12:06:55'),
(1032, 'Password Required!', 'Password Required!', 'Users Management', 0, '2022-04-05 12:06:55'),
(1033, 'Permissions', 'Permissions', 'Users Management', 0, '2022-04-05 12:06:55'),
(1034, 'Post Code', 'Post Code', 'Users Management', 0, '2022-04-05 12:06:55'),
(1035, 'Profile Update Failed!', 'Profile Update Failed!', 'Users Management', 0, '2022-04-05 12:06:55'),
(1036, 'Profile Update Successfully!', 'Profile Update Successfully!', 'Users Management', 0, '2022-04-05 12:06:55'),
(1037, 'Read Only', 'Read Only', 'Users Management', 0, '2022-04-05 12:06:55'),
(1038, 'Read, Write and Delete', 'Read, Write and Delete', 'Users Management', 0, '2022-04-05 12:06:55'),
(1039, 'This Is Owner Account Please Go Back:', 'This Is Owner Account Please Go Back:', 'Users Management', 0, '2022-04-05 12:06:55'),
(1040, 'Update AdminUser', 'Update AdminUser', 'Users Management', 0, '2022-04-05 12:06:55'),
(1041, 'USER EMAIL', 'USER EMAIL', 'Users Management', 0, '2022-04-05 12:06:55'),
(1042, 'USER FROM', 'USER FROM', 'Users Management', 0, '2022-04-05 12:06:55'),
(1043, 'User Group', 'User Group', 'Users Management', 0, '2022-04-05 12:06:55'),
(1044, 'WebUsers', 'WebUsers', 'Users Management', 0, '2022-04-05 12:06:55'),
(1045, 'WebUser Update fail please try again.!', 'WebUser Update fail please try again.!', 'Users Management', 0, '2022-04-05 12:06:55'),
(1046, 'Write Only', 'Write Only', 'Users Management', 0, '2022-04-05 12:06:55'),
(1047, 'Page Not Found.', 'Page Not Found.', 'Users Management', 0, '2022-04-05 12:06:55'),
(1048, 'Admin User', 'Admin User', 'Users Management', 0, '2022-04-05 12:06:55'),
(1049, 'Admin User group Update with name : {{name}}', 'Admin User group Update with name : {{name}}', 'Users Management', 0, '2022-04-05 12:06:55'),
(1050, 'Make Sponsor', 'Make Sponsor', 'Users Management', 0, '2022-04-05 12:06:55'),
(1051, 'DeActive Sponsor', 'DeActive Sponsor', 'Users Management', 0, '2022-04-05 12:06:55'),
(1052, 'Are You Sure You Want TO Change Sponsor Status?', 'Are You Sure You Want TO Change Sponsor Status?', 'Users Management', 0, '2022-04-05 12:06:55'),
(1053, 'Employee', 'Employee', 'Users Management', 0, '2022-04-05 12:06:55'),
(1054, 'Interests', 'Interests', 'Users Management', 0, '2022-04-05 12:06:55'),
(1055, 'Sort Position', 'Sort Position', 'Users Management', 0, '2022-04-05 12:06:55'),
(1056, 'User Type 2', 'User Type 2', 'Users Management', 0, '2022-04-05 12:06:55'),
(1057, 'Customer', 'Customer', 'Users Management', 0, '2022-04-05 12:06:55'),
(1058, 'supplier', 'supplier', 'Users Management', 0, '2022-04-05 12:06:55'),
(1059, 'Both', 'Both', 'Users Management', 0, '2022-04-05 12:06:55'),
(1060, 'Its Look Like Shipping Is Not Available In Receiver Country.', 'Its Look Like Shipping Is Not Available In Receiver Country.', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1061, 'Its Look Like Shipping Stop In Receiver Country {{country}}', 'Its Look Like Shipping Stop In Receiver Country {{country}}', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1062, 'Payment Type not select Befor continue please select payment type.', 'Payment Type not select Befor continue please select payment type.', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1063, 'Select product Are not ship in receiver country.', 'Select product Are not ship in receiver country.', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1064, 'Please Enter Sender / Required Fields.', 'Please Enter Sender / Required Fields.', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1065, 'Required Fields', 'Required Fields', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1066, 'Duplicate Entry : Product Item already exist in list!', 'Duplicate Entry : Product Item already exist in list!', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1067, 'Duplicate Entry', 'Duplicate Entry', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1068, 'Required Fields Are Empty', 'Required Fields Are Empty', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1069, 'Please enter proper data in all fields.', 'Please enter proper data in all fields.', 'Admin OrderScript', 0, '2022-04-05 12:06:55'),
(1070, 'Before Continue Please Select Product Or Store.', 'Before Continue Please Select Product Or Store.', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1071, 'Product Error', 'Product Error', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1072, 'Price Error', 'Price Error', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1073, 'Your Total Price Of Product Is Not OK, Please Check.', 'Your Total Price Of Product Is Not OK, Please Check.', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1074, 'Your Selected Quantity is Greater then or less then real quantity Please Check. Use Mouse Scroll or UP/DOWN arrow to select quantity', 'Your Selected Quantity is Greater then or less then real quantity Please Check. Use Mouse Scroll or UP/DOWN arrow to select quantity', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1075, 'Quantity Error', 'Quantity Error', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1076, 'Product Inventory Error', 'Product Inventory Error', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1077, 'Store not found please try other product. OR Product has no stock avaiable.', 'Store not found please try other product. OR Product has no stock avaiable.', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1078, 'Product Color Not Available', 'Product Color Not Available', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1079, 'Product Scale Not Available', 'Product Scale Not Available', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1080, 'NO Product Found In {{option}}', 'NO Product Found In {{option}}', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1081, 'Please Select Story Country Before Select Product', 'Please Select Story Country Before Select Product', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1082, 'You not select any product for order.', 'You not select any product for order.', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1083, 'Order flagged to top successfully!', 'Order flagged to top successfully!', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1084, 'Order failed to be flagged!', 'Order failed to be flagged!', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1085, 'Order flag removed successfully!', 'Order flag removed successfully!', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1086, 'Failed to remove flag!', 'Failed to remove flag!', 'Admin OrderScript', 0, '2022-04-05 12:06:56'),
(1087, 'Partia  Delivery Done', 'Partia  Delivery Done', 'admin', 0, '2022-04-05 12:06:56'),
(1088, 'Sales Report', 'Sales Report', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1089, 'Export', 'Export', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1090, 'New Export Stock', 'New Export Stock', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1091, 'Export Product Data with size color', 'Export Product Data with size color', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1092, 'Export Product Data', 'Export Product Data', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1093, 'Import Stock', 'Import Stock', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1094, 'Stock Inventory Exported File', 'Stock Inventory Exported File', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1095, 'Select Currency', 'Select Currency', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1096, 'Model.No', 'Model.No', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1097, 'Country Code', 'Country Code', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1098, 'Note: After Export all stock inventory, Only update data from 2 columns (QTY and location), or you can delete any inventory row.', 'Note: After Export all stock inventory, Only update data from 2 columns (QTY and location), or you can delete any inventory row.', 'Admin Stock Import', 0, '2022-04-05 12:07:05'),
(1099, 'Statics Reports', 'Statics Reports', 'Admin Statics', 0, '2022-04-05 12:07:11'),
(1100, 'IN PROCESS', 'IN PROCESS', 'Admin Statics', 0, '2022-04-05 12:07:11'),
(1101, 'Daily', 'Daily', 'Admin Statics', 0, '2022-04-05 12:07:11'),
(1102, 'Monthly', 'Monthly', 'Admin Statics', 0, '2022-04-05 12:07:11'),
(1103, 'Yearly', 'Yearly', 'Admin Statics', 0, '2022-04-05 12:07:11'),
(1104, 'Report By', 'Report By', 'Admin Statics', 0, '2022-04-05 12:07:11'),
(1105, 'Generate Statistic', 'Generate Statistic', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1106, 'Statistics Report', 'Statistics Report', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1107, 'Choose category', 'Choose category', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1108, 'All categories', 'All categories', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1109, 'Generate Statistics', 'Generate Statistics', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1110, 'Choose size', 'Choose size', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1111, 'All sizes', 'All sizes', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15');
INSERT INTO `hardwords` (`id`, `en`, `lang`, `place`, `allowDelete`, `time`) VALUES
(1112, 'Choose color', 'Choose color', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1113, 'All colors', 'All colors', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1114, 'Article Number', 'Article Number', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1115, 'Price Original', 'Price Original', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1116, 'Stock Current', 'Stock Current', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1117, 'Received from supplier pcs', 'Received from supplier pcs', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1118, 'Buy in price total', 'Buy in price total', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1119, 'Sold quantity total since created', 'Sold quantity total since created', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1120, 'Sold quantity (last 7 days)', 'Sold quantity (last 7 days)', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1121, 'Sold quantity during chosen period', 'Sold quantity during chosen period', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1122, 'First selling date', 'First selling date', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1123, 'Product created', 'Product created', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1124, 'Availability in stock', 'Availability in stock', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1125, 'Average selling price (SE,NO,DA,FI)', 'Average selling price (SE,NO,DA,FI)', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1126, 'Returns registered', 'Returns registered', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1127, 'Payment methods', 'Payment methods', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1128, 'Total amount sold country', 'Total amount sold country', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1129, 'Total quantity sold by country', 'Total quantity sold by country', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1130, 'Buying price total', 'Buying price total', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1131, 'Discount quantity', 'Discount quantity', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1132, 'Minimum sale price', 'Minimum sale price', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1133, 'Maximum sale price', 'Maximum sale price', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1134, 'Not available since', 'Not available since', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1135, 'Available since', 'Available since', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1136, 'weeks', 'weeks', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1137, 'Color Size Breakdown Below In Date Range', 'Color Size Breakdown Below In Date Range', 'Admin Statistic 2016', 0, '2022-04-05 12:07:15'),
(1138, 'Product Stats', 'Product Stats', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1139, 'Stats', 'Stats', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1140, 'Add New Page', 'Add New Page', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1141, 'UnPublish Pages', 'UnPublish Pages', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1142, 'Invoice #', 'Invoice #', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1143, 'Order Date', 'Order Date', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1144, 'Total Revenue', 'Total Revenue', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1145, 'Sweden', 'Sweden', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1146, 'Norwegian', 'Norwegian', 'Admin Product Statistics', 0, '2022-04-05 12:07:19'),
(1147, 'Finland', 'Finland', 'Admin Product Statistics', 0, '2022-04-05 12:07:20'),
(1148, 'Denmark', 'Denmark', 'Admin Product Statistics', 0, '2022-04-05 12:07:20'),
(1149, 'Manufacturer Name', 'Manufacturer Name', 'Admin Product Statistics', 0, '2022-04-05 12:07:20'),
(1150, 'ids', 'ids', 'Admin Product QTY Statistics', 0, '2022-04-05 12:07:24'),
(1151, 'Status', 'Status', 'Admin Product QTY Statistics', 0, '2022-04-05 12:07:24'),
(1152, 'Shipping', 'Shipping', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1153, 'Shipping View', 'Shipping View', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1154, 'New Shipping', 'New Shipping', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1155, 'Add New Shipping Country', 'Add New Shipping Country', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1156, 'SHIPMENT PRICE', 'SHIPMENT PRICE', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1157, 'SHIPMENT COUNTRY', 'SHIPMENT COUNTRY', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1158, 'Show All Other Countries', 'Show All Other Countries', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1159, 'Shipping By Classes', 'Shipping By Classes', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1160, 'Shipping From', 'Shipping From', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1161, 'Shipping To', 'Shipping To', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1162, 'Price Currency', 'Price Currency', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1163, 'Price per {{weight}}', 'Price per {{weight}}', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1164, 'Shipping Add Successfully', 'Shipping Add Successfully', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1165, 'Shipping Add Failed', 'Shipping Add Failed', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1166, 'Shipping Save Successfully', 'Shipping Save Successfully', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1167, 'Shipping Save Failed', 'Shipping Save Failed', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1168, 'Shipping Add Fail required field are empty', 'Shipping Add Fail required field are empty', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1169, 'Duplicate shipping Found', 'Duplicate shipping Found', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1170, 'SHIPMENT PRICE - WEIGHT', 'SHIPMENT PRICE - WEIGHT', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1171, 'Shipping Class Name', 'Shipping Class Name', 'Admin Shipping', 0, '2022-04-05 12:07:32'),
(1172, 'Multi Language SEO Links', 'Multi Language SEO Links', 'Admin WebSite Menu', 0, '2022-04-05 12:07:37'),
(1173, 'Product Links', 'Product Links', 'Admin WebSite Menu', 0, '2022-04-05 12:07:37'),
(1174, 'Deal Product Links', 'Deal Product Links', 'Admin WebSite Menu', 0, '2022-04-05 12:07:37'),
(1175, 'Blog Links', 'Blog Links', 'Admin WebSite Menu', 0, '2022-04-05 12:07:37'),
(1176, 'Best Sales', 'Best Sales', 'Website Index', 0, '2022-04-05 12:08:02'),
(1177, 'Latest Products', 'Latest Products', 'Website Index', 0, '2022-04-05 12:08:02'),
(1178, 'Feature Products', 'Feature Products', 'Website Index', 0, '2022-04-05 12:08:02'),
(1179, 'You Click...', 'You Click...', 'Website Index', 0, '2022-04-05 12:08:02'),
(1180, 'To View Other Products,', 'To View Other Products,', 'Website Index', 0, '2022-04-05 12:08:02'),
(1181, 'Trending Fashion Winter 2014', 'Trending Fashion Winter 2014', 'Website Index', 0, '2022-04-05 12:08:02'),
(1182, 'From The Blog', 'From The Blog', 'Website Index', 0, '2022-04-05 12:08:02'),
(1183, 'Subscribe to our newsletter massa In Curabitur id risus sit quis justo sed ovanti', 'Subscribe to our newsletter massa In Curabitur id risus sit quis justo sed ovanti', 'Website Index', 0, '2022-04-05 12:08:02'),
(1184, 'Newsletter', 'Newsletter', 'Website Index', 0, '2022-04-05 12:08:02'),
(1185, 'Social Network', 'Social Network', 'Website Index', 0, '2022-04-05 12:08:02'),
(1186, 'News and Events', 'News and Events', 'Website Index', 0, '2022-04-05 12:08:02'),
(1187, 'Hereâ€™s the best part of our impressive serives', 'Hereâ€™s the best part of our impressive serives', 'Website Index', 0, '2022-04-05 12:08:02'),
(1188, 'Why Choose Us?', 'Why Choose Us?', 'Website Index', 0, '2022-04-05 12:08:02'),
(1189, 'Please input a Value', 'Please input a Value', 'Website Index', 0, '2022-04-05 12:08:02'),
(1190, 'Please input a Value.', 'Please input a Value.', 'admin', 0, '2022-04-05 12:08:02'),
(1191, 'Manage Home Page Content', 'Manage Home Page Content', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1192, 'Home Page Boxes', 'Home Page Boxes', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1193, 'Manage', 'Manage', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1194, 'Update Home Page Box', 'Update Home Page Box', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1195, 'Manage Pages', 'Manage Pages', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1196, 'Page Save Successfully', 'Page Save Successfully', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1197, 'Page Add Successfully', 'Page Add Successfully', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1198, 'Page Save Failed,Please Enter Correct Values, And unique slug', 'Page Save Failed,Please Enter Correct Values, And unique slug', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1199, 'Detail', 'Detail', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1200, 'Page Setting', 'Page Setting', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1201, 'Page Detail', 'Page Detail', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1202, 'Page Title', 'Page Title', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1203, 'Sub Title', 'Sub Title', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1204, 'Enter Short Description', 'Enter Short Description', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1205, 'Enter Full Detail', 'Enter Full Detail', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1206, 'use : {{contactForm}} FOR CONTACT FORM', 'use : {{contactForm}} FOR CONTACT FORM', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1207, 'PageLink', 'PageLink', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1208, 'Custom Page Slug', 'Custom Page Slug', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1209, 'You Can write Your Custom Page Link,Leave Blank For Default', 'You Can write Your Custom Page Link,Leave Blank For Default', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1210, 'Redirect Link', 'Redirect Link', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1211, 'Allow Comment', 'Allow Comment', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1212, 'Page Banner Image', 'Page Banner Image', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1213, 'BOX NAME', 'BOX NAME', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1214, 'Page Not Found For Update', 'Page Not Found For Update', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1215, 'Old Image', 'Old Image', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1216, 'Link Text', 'Link Text', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1217, 'Update Detail', 'Update Detail', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1218, 'Update Box', 'Update Box', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1219, 'Home Page Box Save Successfully', 'Home Page Box Save Successfully', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1220, 'Home Page Box Save Failed', 'Home Page Box Save Failed', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1221, 'Home Page Box', 'Home Page Box', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1222, 'Login Required', 'Login Required', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1223, 'use : {{employee}} FOR EMPLOYEE PAGE', 'use : {{employee}} FOR EMPLOYEE PAGE', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1224, 'use : {{files-Manager}} FOR FILES MANAGER PAGE', 'use : {{files-Manager}} FOR FILES MANAGER PAGE', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1225, 'use : {{testimonial}} FOR TESTIMONIAL PAGE', 'use : {{testimonial}} FOR TESTIMONIAL PAGE', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1226, 'use : {{albumSingle(AlbumName)}} FOR SINGLE ALBUM (Enter your album name inside ())', 'use : {{albumSingle(AlbumName)}} FOR SINGLE ALBUM (Enter your album name inside ())', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1227, 'use : {{albumAll}} FOR ALL ALBUMS', 'use : {{albumAll}} FOR ALL ALBUMS', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1228, 'use : {{albumPictures(AlbumName)}} FOR ALBUM\'s ALL IMAGES (Enter your album name inside ())', 'use : {{albumPictures(AlbumName)}} FOR ALBUM\'s ALL IMAGES (Enter your album name inside ())', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1229, 'Use Widget In Your Page', 'Use Widget In Your Page', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1230, 'Use Widgets', 'Use Widgets', 'Admin Page Management', 0, '2022-04-05 12:10:24'),
(1231, 'Manage Brands', 'Manage Brands', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1232, 'Active Brands', 'Active Brands', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1233, 'Sort Brands', 'Sort Brands', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1234, 'Add New Brand', 'Add New Brand', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1235, 'Brand Add Successfully', 'Brand Add Successfully', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1236, 'Brand Add Failed', 'Brand Add Failed', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1237, 'Brand Update Failed', 'Brand Update Failed', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1238, 'Brand Update Successfully', 'Brand Update Successfully', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1239, 'Brand Title', 'Brand Title', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1240, 'Brand Link', 'Brand Link', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1241, 'Old Brand Image', 'Old Brand Image', 'Admin Brands', 0, '2022-04-05 12:10:33'),
(1242, 'Files Management', 'Files Management', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1243, 'Manage Files', 'Manage Files', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1244, 'Active Files', 'Active Files', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1245, 'Sort Files', 'Sort Files', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1246, 'Add New File', 'Add New File', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1247, 'File Add Successfully', 'File Add Successfully', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1248, 'File Add Failed', 'File Add Failed', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1249, 'File Update Failed', 'File Update Failed', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1250, 'File Update Successfully', 'File Update Successfully', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1251, 'File Title', 'File Title', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1252, 'File Link', 'File Link', 'Admin FilesManager', 0, '2022-04-05 12:10:38'),
(1253, 'Testimonial Management', 'Testimonial Management', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1254, 'Manage Testimonial', 'Manage Testimonial', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1255, 'Active Testimonial', 'Active Testimonial', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1256, 'Sort Testimonial', 'Sort Testimonial', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1257, 'Add New Testimonial', 'Add New Testimonial', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1258, 'Testimonial Add Successfully', 'Testimonial Add Successfully', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1259, 'Testimonial Add Failed', 'Testimonial Add Failed', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1260, 'Testimonial Update Failed', 'Testimonial Update Failed', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1261, 'Testimonial Update Successfully', 'Testimonial Update Successfully', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1262, 'Testimonial Title', 'Testimonial Title', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1263, 'Testimonial Link', 'Testimonial Link', 'Admin Testimonial', 0, '2022-04-05 12:10:43'),
(1264, 'Manage News', 'Manage News', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1265, 'Active News', 'Active News', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1266, 'Add New News', 'Add New News', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1267, 'Add New News/Event', 'Add New News/Event', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1268, 'PUBLISH DATE', 'PUBLISH DATE', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1269, 'News Save Successfully', 'News Save Successfully', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1270, 'News Save Failed', 'News Save Failed', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1271, 'News Image', 'News Image', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1272, 'Leave Blank to publish now', 'Leave Blank to publish now', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1273, 'News Date', 'News Date', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1274, 'News Setting', 'News Setting', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1275, 'News Title', 'News Title', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1276, 'News Detail', 'News Detail', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1277, 'Old News Image', 'Old News Image', 'Admin News Management', 0, '2022-04-05 12:10:49'),
(1278, 'Manage Banners', 'Manage Banners', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1279, 'Active Banners', 'Active Banners', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1280, 'Sort Banners', 'Sort Banners', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1281, 'Add New Banner', 'Add New Banner', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1282, 'Banner Add Successfully', 'Banner Add Successfully', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1283, 'Banner Add Failed', 'Banner Add Failed', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1284, 'Banner Update Failed', 'Banner Update Failed', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1285, 'Banner Update Successfully', 'Banner Update Successfully', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1286, 'Banner Title', 'Banner Title', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1287, 'Banner Link', 'Banner Link', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1288, 'Select Left/Right', 'Select Left/Right', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1289, 'Left', 'Left', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1290, 'Right', 'Right', 'Admin Banners', 0, '2022-04-05 12:10:56'),
(1291, 'Email in Waiting Information', 'Email in Waiting Information', 'Admin Waiting Email', 0, '2022-04-05 12:11:03'),
(1292, 'Manage Waiting Email Information', 'Manage Waiting Email Information', 'Admin Waiting Email', 0, '2022-04-05 12:11:03'),
(1293, 'Active Waiting Email Information', 'Active Waiting Email Information', 'Admin Waiting Email', 0, '2022-04-05 12:11:03'),
(1294, 'Sort Waiting Email Information', 'Sort Waiting Email Information', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1295, 'Add New Waiting Email Information', 'Add New Waiting Email Information', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1296, 'Type', 'Type', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1297, 'Email Delete Successfully', 'Email Delete Successfully', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1298, 'Waiting Email Information', 'Waiting Email Information', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1299, 'Waiting Email Add Successfully', 'Waiting Email Add Successfully', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1300, 'Waiting Email Add Failed', 'Waiting Email Add Failed', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1301, 'Waiting Email Update Failed', 'Waiting Email Update Failed', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1302, 'Waiting Email Update Successfully', 'Waiting Email Update Successfully', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1303, 'Waiting Email Title', 'Waiting Email Title', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1304, 'Waiting Email Link', 'Waiting Email Link', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1305, 'Old Waiting Email Image', 'Old Waiting Email Image', 'Admin Waiting Email', 0, '2022-04-05 12:11:04'),
(1306, 'Manage Album', 'Manage Album', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1307, 'Albums', 'Albums', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1308, 'Add New Album', 'Add New Album', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1309, 'Back To Albums', 'Back To Albums', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1310, 'Album', 'Album', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1311, 'Album Added', 'Album Added', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1312, 'Album Add Successfully', 'Album Add Successfully', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1313, 'Album Add Failed', 'Album Add Failed', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1314, 'Album Add Failed,Please Enter Correct Values,: Error: {{msg}}', 'Album Add Failed,Please Enter Correct Values,: Error: {{msg}}', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1315, 'Album Update Failed,Please Enter Correct Values,: Error: {{msg}}', 'Album Update Failed,Please Enter Correct Values,: Error: {{msg}}', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1316, 'Album Update Failed', 'Album Update Failed', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1317, 'Album Update', 'Album Update', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1318, 'Album Update Successfully', 'Album Update Successfully', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1319, 'Enter Album Title', 'Enter Album Title', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1320, 'Mange', 'Mange', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1321, 'Album Images', 'Album Images', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1322, 'Remove Image', 'Remove Image', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1323, 'Update Alt', 'Update Alt', 'Admin Gallery', 0, '2022-04-05 12:11:08'),
(1324, 'Slug Matched!', 'Slug Matched!', 'admin', 0, '2022-04-05 12:11:17'),
(1325, 'Atleat 4 characters!', 'Atleat 4 characters!', 'admin', 0, '2022-04-05 12:11:17'),
(1326, 'Manage Emails', 'Manage Emails', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1327, 'Import Emails', 'Import Emails', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1328, 'Excel File', 'Excel File', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1329, 'Example', 'Example', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1330, 'Verify Emails', 'Verify Emails', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1331, 'UnVerify Emails', 'UnVerify Emails', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1332, 'GROUP', 'GROUP', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1333, 'GROUP CHANGE', 'GROUP CHANGE', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1334, 'News Letter Add Successfully', 'News Letter Add Successfully', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1335, 'News Letter Save Failed', 'News Letter Save Failed', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1336, 'News Letter Save Successfully', 'News Letter Save Successfully', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1337, 'News Letter Save Failed,Please Enter Correct Values,: Error: {{msg}}', 'News Letter Save Failed,Please Enter Correct Values,: Error: {{msg}}', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1338, 'Email Queue', 'Email Queue', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1339, 'Queue Already Created', 'Queue Already Created', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1340, 'Queue Created Successfully', 'Queue Created Successfully', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1341, 'Queue Create Fail', 'Queue Create Fail', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1342, 'News Letter UPDATE Successfully', 'News Letter UPDATE Successfully', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1343, 'News Letter UPDATE Failed', 'News Letter UPDATE Failed', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1344, 'News Letter UPDATE Failed,Please Enter Correct Values,: Error: {{msg}}', 'News Letter UPDATE Failed,Please Enter Correct Values,: Error: {{msg}}', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1345, 'LETTER TITLE', 'LETTER TITLE', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1346, 'EMAIL SUBJECT', 'EMAIL SUBJECT', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1347, 'EMAIL PENDING', 'EMAIL PENDING', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1348, 'TOTAL EMAIL', 'TOTAL EMAIL', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1349, 'Start/Pause Sending Email Queue', 'Start/Pause Sending Email Queue', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1350, 'Delete Email Queue', 'Delete Email Queue', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1351, 'SELECT GROUP', 'SELECT GROUP', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1352, 'Delete Email Letter', 'Delete Email Letter', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1353, 'FOR ADMIN', 'FOR ADMIN', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1354, 'FROM NAME', 'FROM NAME', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1355, 'FROM MAIL', 'FROM MAIL', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1356, 'REPLAY TO', 'REPLAY TO', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1357, 'SUBJECT', 'SUBJECT', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1358, 'USE these Keys to replace user INFO in SUBJECT OR IN Letter', 'USE these Keys to replace user INFO in SUBJECT OR IN Letter', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1359, 'Email News Letter', 'Email News Letter', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1360, 'All Emails Send Successfully', 'All Emails Send Successfully', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1361, 'DeActive Email', 'DeActive Email', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1362, 'Active Email', 'Active Email', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1363, 'Email Content', 'Email Content', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1364, 'Are you sure you want to {{state}} email queue?', 'Are you sure you want to {{state}} email queue?', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1365, 'Please select group before send email letter', 'Please select group before send email letter', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1366, 'Are you sure you want to send email to {{grp}} Group?', 'Are you sure you want to send email to {{grp}} Group?', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1367, 'News Letters', 'News Letters', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1368, 'Email Stats', 'Email Stats', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1369, 'New News Letter', 'New News Letter', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1370, 'Bounce Email', 'Bounce Email', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1371, 'DateTime', 'DateTime', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1372, 'Delete Bounce Emails', 'Delete Bounce Emails', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1373, 'Show On Order Page', 'Show On Order Page', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1374, 'Bounce Email Delete Successfully', 'Bounce Email Delete Successfully', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1375, 'Bounce Email Delete Failed', 'Bounce Email Delete Failed', 'Admin Email', 0, '2022-04-05 12:11:41'),
(1376, 'Delete Email Group', 'Delete Email Group', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1377, 'Email Group Delete Successfully', 'Email Group Delete Successfully', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1378, 'Update Email', 'Update Email', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1379, 'Email Update Successfully', 'Email Update Successfully', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1380, 'Update Email Group', 'Update Email Group', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1381, 'Email Group Update Successfully', 'Email Group Update Successfully', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1382, 'Delete News Letter', 'Delete News Letter', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1383, 'Email News Letter Delete Successfully', 'Email News Letter Delete Successfully', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1384, 'Email Queue Delete Successfully', 'Email Queue Delete Successfully', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1385, 'Email Queue Status Update Successfully', 'Email Queue Status Update Successfully', 'Admin Email', 0, '2022-04-05 12:11:42'),
(1386, 'Select Product Language', 'Select Product Language', 'Admin Product Letter', 0, '2022-04-05 12:11:53'),
(1387, 'Select Products', 'Select Products', 'Admin Product Letter', 0, '2022-04-05 12:11:53'),
(1388, 'GO TO NEWS LETTER', 'GO TO NEWS LETTER', 'Admin Product Letter', 0, '2022-04-05 12:11:53'),
(1389, 'Manage Reviews', 'Manage Reviews', 'Reviews Management', 0, '2022-04-05 12:13:05'),
(1390, 'Verify Reviews', 'Verify Reviews', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1391, 'UnVerify Reviews', 'UnVerify Reviews', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1392, 'Manage Questions', 'Manage Questions', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1393, 'Verify Questions', 'Verify Questions', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1394, 'UnVerify Questions', 'UnVerify Questions', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1395, 'Active Review', 'Active Review', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1396, 'DeActive Review', 'DeActive Review', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1397, 'Delete Review', 'Delete Review', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1398, 'Delete Question', 'Delete Question', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1399, 'Edit Question', 'Edit Question', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1400, 'COMMENT', 'COMMENT', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1401, 'TIME', 'TIME', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1402, 'Review Delete Successfully', 'Review Delete Successfully', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1403, 'Review Status Update Successfully', 'Review Status Update Successfully', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1404, 'Update Review', 'Update Review', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1405, 'PAGE LINK', 'PAGE LINK', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1406, 'Question', 'Question', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1407, 'Reply', 'Reply', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1408, 'Question Update Failed,Please Enter Correct Values', 'Question Update Failed,Please Enter Correct Values', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1409, 'Question Update Successfully', 'Question Update Successfully', 'Reviews Management', 0, '2022-04-05 12:13:06'),
(1410, 'Manage Blog', 'Manage Blog', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1411, 'Active Blog', 'Active Blog', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1412, 'Pending Blog', 'Pending Blog', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1413, 'Draft Blog', 'Draft Blog', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1414, 'Add New Blog', 'Add New Blog', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1415, 'BLOG DATE', 'BLOG DATE', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1416, 'Blog Save Successfully', 'Blog Save Successfully', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1417, 'Blog Save Failed', 'Blog Save Failed', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1418, 'Blog Update Successfully', 'Blog Update Successfully', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1419, 'Blog Title', 'Blog Title', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1420, 'Other', 'Other', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1421, 'Enter Category Name', 'Enter Category Name', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1422, 'Blog Image', 'Blog Image', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1423, 'Old Blog Image', 'Old Blog Image', 'Admin Blog', 0, '2022-04-05 12:13:14'),
(1424, 'Unlimited Items In Stock', 'Unlimited Items In Stock', 'admin', 0, '2022-04-06 05:07:49'),
(1425, '{{no}} Items In Stock - stocklocation: {{location}}', '{{no}} Items In Stock - stocklocation: {{location}}', 'admin', 0, '2022-04-06 05:07:49'),
(1426, 'Your Selected Item Not in stock. Or select Product Size/Color', 'Your Selected Item Not in stock. Or select Product Size/Color', 'admin', 0, '2022-04-06 05:07:49'),
(1427, 'Please select Size and Color first', 'Please select Size and Color first', 'admin', 0, '2022-04-06 05:07:49'),
(1428, 'Please Enter Correct Number.', 'Please Enter Correct Number.', 'admin', 0, '2022-04-06 05:07:49'),
(1429, 'Please select product size/color of all package products.', 'Please select product size/color of all package products.', 'admin', 0, '2022-04-06 05:07:49'),
(1430, '-:BESTÃ„LL - ', '-:BESTÃ„LL - ', 'admin', 0, '2022-04-06 05:07:49'),
(1431, 'Return to Previous Page', 'Return to Previous Page', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1432, 'Product Code', 'Product Code', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1433, 'You save', 'You save', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1434, 'Add To Compare', 'Add To Compare', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1435, 'Additional Information', 'Additional Information', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1436, 'Product Description', 'Product Description', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1437, 'SHIPPING & RETURNS', 'SHIPPING & RETURNS', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1438, 'SIZE GUIDE', 'SIZE GUIDE', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1439, 'Info', 'Info', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1440, 'Return & Defected', 'Return & Defected', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1441, 'BACK TO SUITS AND SPORTSCOASTS', 'BACK TO SUITS AND SPORTSCOASTS', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1442, 'share', 'share', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1443, 'Original Price', 'Original Price', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1444, 'Availability', 'Availability', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1445, 'PRODUCT FEATURE ICONS', 'PRODUCT FEATURE ICONS', 'Web Product Detail', 0, '2022-04-06 05:29:49'),
(1446, 'YOU MIGHT ALSO LIKE', 'YOU MIGHT ALSO LIKE', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1447, 'WHAT DO OUR CUSTOMER SAY?', 'WHAT DO OUR CUSTOMER SAY?', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1448, 'Send email on sale offer', 'Send email on sale offer', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1449, 'Refer to a friend', 'Refer to a friend', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1450, 'Ask Question', 'Ask Question', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1451, 'Asked Questions', 'Asked Questions', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1452, 'DO NOT FORGET TO BUY', 'DO NOT FORGET TO BUY', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1453, 'Custom Size', 'Custom Size', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1454, 'Value', 'Value', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1455, 'Quality', 'Quality', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1456, 'Notify me when product available', 'Notify me when product available', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1457, 'Select a color', 'Select a color', 'Web Product Detail', 0, '2022-04-06 05:29:50'),
(1458, 'Your Review submit Fail Please Try Again', 'Your Review submit Fail Please Try Again', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1459, 'Your Review submit Successfully', 'Your Review submit Successfully', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1460, 'Your Review is in pending to approve by admin', 'Your Review is in pending to approve by admin', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1461, 'Your Question Submit Successfully', 'Your Question Submit Successfully', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1462, 'Your Question submit Fail Please Try Again', 'Your Question submit Fail Please Try Again', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1463, 'Place Review', 'Place Review', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1464, 'Login Required to place Review', 'Login Required to place Review', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1465, 'View {{no}} More Reviews', 'View {{no}} More Reviews', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1466, 'Place Question', 'Place Question', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1467, 'Detail Question', 'Detail Question', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1468, 'Login Required to place Question', 'Login Required to place Question', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1469, 'View {{no}} More Questions', 'View {{no}} More Questions', 'Website Blog', 0, '2022-04-06 05:29:50'),
(1470, 'Fashion', 'Fashion', 'admin', 0, '2022-04-06 05:29:50'),
(1471, 'Food', 'Food', 'admin', 0, '2022-04-06 05:29:50'),
(1472, 'Quantity exceed stock quantity Limit QTY : {{qty}}', 'Quantity exceed stock quantity Limit QTY : {{qty}}', 'Web Product Ajax', 0, '2022-04-06 05:29:54'),
(1473, 'Product out of stock', 'Product out of stock', 'Web Product Ajax', 0, '2022-04-06 05:29:54'),
(1474, 'Product Add In Cart Fail Please Try Again', 'Product Add In Cart Fail Please Try Again', 'Web Product Ajax', 0, '2022-04-06 05:29:54'),
(1475, 'Product Inventory Error,Please Try Again', 'Product Inventory Error,Please Try Again', 'Web Product Ajax', 0, '2022-04-06 05:29:54'),
(1476, 'Add To Cart Fail Please Try Again', 'Add To Cart Fail Please Try Again', 'Web Product Ajax', 0, '2022-04-06 05:29:54'),
(1477, 'Bundle Discount', 'Bundle Discount', 'Web Product Ajax', 0, '2022-04-06 05:29:54'),
(1478, 'sum', 'sum', 'admin', 0, '2022-04-06 05:30:08'),
(1479, 'Total Including Tax', 'Total Including Tax', 'admin', 0, '2022-04-06 05:30:08'),
(1480, 'FREE', 'FREE', 'admin', 0, '2022-04-06 05:30:08'),
(1481, 'Klarna Fast CheckOut', 'Klarna Fast CheckOut', 'admin', 0, '2022-04-06 05:30:08'),
(1482, 'Grand Total', 'Grand Total', 'admin', 0, '2022-04-06 05:30:08'),
(1483, 'Login To Continue', 'Login To Continue', 'admin', 0, '2022-04-06 05:30:08'),
(1484, 'Continue', 'Continue', 'admin', 0, '2022-04-06 05:30:08'),
(1485, 'Checkout as Guest', 'Checkout as Guest', 'admin', 0, '2022-04-06 05:30:08'),
(1486, 'Gift Card Id', 'Gift Card Id', 'admin', 0, '2022-04-06 05:30:08'),
(1487, 'Discount Code', 'Discount Code', 'admin', 0, '2022-04-06 05:30:08'),
(1488, 'Check', 'Check', 'admin', 0, '2022-04-06 05:30:08'),
(1489, 'Apply', 'Apply', 'admin', 0, '2022-04-06 05:30:08'),
(1490, 'Proceed to Checkout', 'Proceed to Checkout', 'admin', 0, '2022-04-06 05:30:08'),
(1491, 'Your Cart Is ready to submit, Please Select Payment Type To place your Order.', 'Your Cart Is ready to submit, Please Select Payment Type To place your Order.', 'admin', 0, '2022-04-06 05:30:16'),
(1492, 'Old', 'Old', 'admin', 0, '2022-04-06 05:30:16'),
(1493, 'Last Name', 'Last Name', 'admin', 0, '2022-04-06 05:30:21'),
(1494, 'E-mail', 'E-mail', 'admin', 0, '2022-04-06 05:30:21'),
(1495, 'Enter Payment Information', 'Enter Payment Information', 'admin', 0, '2022-04-06 05:30:21'),
(1496, 'Sender And Reciever Information', 'Sender And Reciever Information', 'admin', 0, '2022-04-06 05:30:21'),
(1497, 'ORDER FORM', 'ORDER FORM', 'admin', 0, '2022-04-06 05:30:21'),
(1498, 'ZIP CODE', 'ZIP CODE', 'admin', 0, '2022-04-06 05:30:21'),
(1499, 'Standard', 'Standard', 'admin', 0, '2022-04-06 05:30:21'),
(1500, 'Express', 'Express', 'admin', 0, '2022-04-06 05:30:21'),
(1501, 'Receiver - Zip Code', 'Receiver - Zip Code', 'admin', 0, '2022-04-06 05:30:21'),
(1502, 'My delivery address is the same as my billing address.', 'My delivery address is the same as my billing address.', 'admin', 0, '2022-04-06 05:30:21'),
(1503, 'SELECT DELIVERY METHOD', 'SELECT DELIVERY METHOD', 'admin', 0, '2022-04-06 05:30:21'),
(1504, 'It Looks Like Shipping Stop In Receiving Country', 'It Looks Like Shipping Stop In Receiving Country', 'admin', 0, '2022-04-06 05:30:21'),
(1505, 'Payment Type not selected', 'Payment Type not selected', 'admin', 0, '2022-04-06 05:30:21'),
(1506, 'Before continuing, please select payment type.', 'Before continuing, please select payment type.', 'admin', 0, '2022-04-06 05:30:21'),
(1507, 'Highlighted Product Are not shipped in receiver country.', 'Highlighted Product Are not shipped in receiver country.', 'admin', 0, '2022-04-06 05:30:21'),
(1508, 'ORDERING', 'ORDERING', 'admin', 0, '2022-04-06 05:30:25'),
(1509, 'Mail OrderTop', 'Mail OrderTop', 'admin', 0, '2022-04-06 05:30:25'),
(1510, 'order Number', 'order Number', 'admin', 0, '2022-04-06 05:30:25'),
(1511, 'Billing Address', 'Billing Address', 'admin', 0, '2022-04-06 05:30:25'),
(1512, 'Offer', 'Offer', 'admin', 0, '2022-04-06 05:30:25'),
(1513, 'Email orderEnd', 'Email orderEnd', 'admin', 0, '2022-04-06 05:30:25'),
(1514, 'Mail Send Successfully, Kindly check inbox/spam folder', 'Mail Send Successfully, Kindly check inbox/spam folder', 'admin', 0, '2022-04-06 05:30:37'),
(1515, 'Thank you your Order is successfully submitted', 'Thank you your Order is successfully submitted', 'admin', 0, '2022-04-06 05:30:45'),
(1516, 'Order list', 'Order list', 'admin', 0, '2022-04-06 05:31:07'),
(1517, '1282', '1282', 'admin', 0, '2022-04-06 05:51:39'),
(1518, '1281', '1281', 'admin', 0, '2022-04-06 05:54:40'),
(1519, '1289', '1289', 'admin', 0, '2022-04-06 05:57:05'),
(1520, '1287', '1287', 'admin', 0, '2022-04-06 05:57:07'),
(1521, '1286', '1286', 'admin', 0, '2022-04-06 05:57:09'),
(1522, '1285', '1285', 'admin', 0, '2022-04-06 05:57:10'),
(1523, '1284', '1284', 'admin', 0, '2022-04-06 05:57:12'),
(1524, '1283', '1283', 'admin', 0, '2022-04-06 05:57:14'),
(1525, 'View Api Return Info', 'View Api Return Info', 'Admin Invoice', 0, '2022-05-20 11:12:19'),
(1526, 'Invoice Detail View', 'Invoice Detail View', 'Admin Invoice', 0, '2022-05-20 11:12:19'),
(1527, 'ORDER SENDER DETAIL', 'ORDER SENDER DETAIL', 'Admin Invoice', 0, '2022-05-20 11:12:19'),
(1528, 'ORDER RECEIVER DETAIL', 'ORDER RECEIVER DETAIL', 'Admin Invoice', 0, '2022-05-20 11:12:19'),
(1529, 'PROCESS', 'PROCESS', 'Admin Invoice', 0, '2022-05-20 11:12:19'),
(1530, 'SALE QTY', 'SALE QTY', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1531, 'SALE IN PRICE', 'SALE IN PRICE', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1532, 'ORDER PRODUCTS', 'ORDER PRODUCTS', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1533, 'Free Gift Add Products', 'Free Gift Add Products', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1534, 'Total Net Amount', 'Total Net Amount', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1535, 'Print Out', 'Print Out', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1536, 'INTERNAL COMMENT', 'INTERNAL COMMENT', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1537, 'Reservation Number', 'Reservation Number', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1538, 'InComplete', 'InComplete', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1539, 'OK', 'OK', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1540, 'Payment Status', 'Payment Status', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1541, 'Property', 'Property', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1542, 'Payment Information', 'Payment Information', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1543, 'Send Email To Customer', 'Send Email To Customer', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1544, 'Shipping Track Number', 'Shipping Track Number', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1545, 'Total Product Price', 'Total Product Price', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1546, 'Invoice ID', 'Invoice ID', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1547, 'Invoice Detail', 'Invoice Detail', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1548, 'Stock QTY is less then your Order, Please check', 'Stock QTY is less then your Order, Please check', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1549, 'Stock Error stock not found for process OR stock QTY error, Please check', 'Stock Error stock not found for process OR stock QTY error, Please check', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1550, 'Product Update Successfully', 'Product Update Successfully', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1551, 'Product Update Failed', 'Product Update Failed', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1552, 'Creation Time', 'Creation Time', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1553, 'Last Updated Time', 'Last Updated Time', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1554, 'RETURNS INFO', 'RETURNS INFO', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1555, 'Refunded', 'Refunded', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1556, 'Defected', 'Defected', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1557, 'Changed Product', 'Changed Product', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1558, 'Changed Size', 'Changed Size', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1559, 'Status Unknown', 'Status Unknown', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1560, 'Write a Comment for the Order', 'Write a Comment for the Order', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1561, 'Send Free Gift Email To client', 'Send Free Gift Email To client', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1562, 'Free Gift Log List', 'Free Gift Log List', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1563, 'Create Comment', 'Create Comment', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1564, 'Email To Customer', 'Email To Customer', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1565, 'Email Templates', 'Email Templates', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1566, 'LETTER TITLE FOR ADMIN', 'LETTER TITLE FOR ADMIN', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1567, 'EMAIL MESSAGE', 'EMAIL MESSAGE', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1568, 'Send Email', 'Send Email', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1569, 'Log List', 'Log List', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1570, 'Extra Sale', 'Extra Sale', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1571, 'Amount', 'Amount', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1572, 'Email Sent To Customer For Extra Payment', 'Email Sent To Customer For Extra Payment', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1573, 'EXTRA PAYMENTS', 'EXTRA PAYMENTS', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1574, 'EXTRA AMOUNT', 'EXTRA AMOUNT', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1575, 'DESC', 'DESC', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1576, 'RESERVATION NO', 'RESERVATION NO', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1577, 'UPDATE DATE', 'UPDATE DATE', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1579, 'EXTRA PAYMENT FORM', 'EXTRA PAYMENT FORM', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1580, 'PAYMENT LINK', 'PAYMENT LINK', 'Admin Invoice', 0, '2022-05-20 11:12:20'),
(1581, 'Three For Two Categry Price', 'Three For Two Categry Price', 'admin', 0, '2022-05-20 11:12:20'),
(1582, 'Send Made to Measure Email', 'Send Made to Measure Email', 'admin', 0, '2022-05-20 11:12:20'),
(1583, 'Free Gift Mail Send Successfully', 'Free Gift Mail Send Successfully', 'admin', 0, '2022-05-20 11:12:20'),
(1584, 'No Items Found In Your Cart', 'No Items Found In Your Cart', 'admin', 0, '2023-07-18 08:15:47'),
(1585, 'Password Matched!', 'Password Matched!', 'admin', 0, '2023-07-19 06:02:07'),
(1586, 'Remember me', 'Remember me', 'admin', 0, '2023-07-19 06:02:07'),
(1587, 'Sign in', 'Sign in', 'admin', 0, '2023-07-19 06:02:07'),
(1588, 'Having trouble in logging in? Click Here!', 'Having trouble in logging in? Click Here!', 'admin', 0, '2023-07-19 06:02:07'),
(1589, 'Password Trouble Shooting', 'Password Trouble Shooting', 'admin', 0, '2023-07-19 06:06:51'),
(1590, 'Please type you email address in the given field.Your account details will be sent on the given email address!', 'Please type you email address in the given field.Your account details will be sent on the given email address!', 'admin', 0, '2023-07-19 06:06:51'),
(1591, 'Security Captcha', 'Security Captcha', 'admin', 0, '2023-07-19 06:06:51'),
(1592, 'Please Type The Code.', 'Please Type The Code.', 'admin', 0, '2023-07-19 06:06:51'),
(1593, 'Please Type Captcha Code', 'Please Type Captcha Code', 'admin', 0, '2023-07-19 06:06:51'),
(1594, 'Login Page.', 'Login Page.', 'admin', 0, '2023-07-19 06:06:51'),
(1595, 'Account Not Found Or Account Not Verify.', 'Account Not Found Or Account Not Verify.', 'admin', 0, '2023-07-19 06:07:03'),
(1596, 'User Name/Email name already exist', 'User Name/Email name already exist', 'admin', 0, '2023-07-19 06:11:44'),
(1597, 'Try again. Or contact administrator.', 'Try again. Or contact administrator.', 'admin', 0, '2023-07-19 06:11:44'),
(1598, 'Thank you! We have sent verification email. Please check your email.', 'Thank you! We have sent verification email. Please check your email.', 'admin', 0, '2023-07-19 06:11:44'),
(1599, 'Dear', 'Dear', 'admin', 0, '2023-07-19 06:11:44'),
(1600, 'Thank you for registering.', 'Thank you for registering.', 'admin', 0, '2023-07-19 06:11:44'),
(1601, 'Sincerely', 'Sincerely', 'admin', 0, '2023-07-19 06:11:44'),
(1602, 'Customer Profile', 'Customer Profile', 'admin', 0, '2023-07-19 06:12:09'),
(1603, 'Return', 'Return', 'admin', 0, '2023-07-19 06:12:09'),
(1604, 'Defect', 'Defect', 'admin', 0, '2023-07-19 06:12:09'),
(1605, 'Replacement / Return', 'Replacement / Return', 'admin', 0, '2023-07-19 06:30:55'),
(1606, 'Editor', 'Editor', 'Users Management', 0, '2023-07-19 07:07:53'),
(1607, 'Client', 'Client', 'Users Management', 0, '2023-07-19 07:07:53'),
(1608, 'Admin', 'Admin', 'Users Management', 0, '2023-07-20 06:12:53'),
(1609, 'Imgaes Product View', 'Imgaes Product View', 'AdminMenu', 0, '2023-07-20 07:41:25'),
(1610, 'Imgaes Product', 'Imgaes Product', 'AdminMenu', 0, '2023-07-20 07:41:53'),
(1611, 'Manage Imgaes Product', 'Manage Imgaes Product', 'Admin News Management', 0, '2023-07-20 07:55:44'),
(1612, 'Active Imgaes Product', 'Active Imgaes Product', 'Admin News Management', 0, '2023-07-20 08:01:32'),
(1613, 'Add New Imgaes Product', 'Add New Imgaes Product', 'Admin News Management', 0, '2023-07-20 08:01:32'),
(1614, 'Images Detail', 'Images Detail', 'Admin News Management', 0, '2023-07-20 10:07:04'),
(1615, 'Recommened Image Size: 210 X 164 px.', 'Recommened Image Size: 210 X 164 px.', 'Admin News Management', 0, '2023-07-20 10:54:20'),
(1616, 'Assign Management', 'Assign Management', 'Admin News Management', 0, '2023-07-24 11:39:11'),
(1617, 'Assign Save Successfully', 'Assign Save Successfully', 'Admin News Management', 0, '2023-07-24 11:39:11'),
(1618, 'Assign Save Failed', 'Assign Save Failed', 'Admin Assign Management', 0, '2023-07-24 11:43:15'),
(1619, 'Assign Image', 'Assign Image', 'Admin Assign Management', 0, '2023-07-24 11:43:15'),
(1620, 'Assign Date', 'Assign Date', 'Admin Assign Management', 0, '2023-07-24 11:43:15'),
(1621, 'Assign Setting', 'Assign Setting', 'Admin Assign Management', 0, '2023-07-24 11:43:15'),
(1622, 'Assign Title', 'Assign Title', 'Admin Assign Management', 0, '2023-07-24 11:43:15'),
(1623, 'Assign Detail', 'Assign Detail', 'Admin Assign Management', 0, '2023-07-24 11:43:15'),
(1624, 'Old Assign Image', 'Old Assign Image', 'Admin Assign Management', 0, '2023-07-24 11:43:15'),
(1625, 'Assign Product', 'Assign Product', 'AdminMenu', 0, '2023-07-24 11:47:28'),
(1626, 'Assign Product Management', 'Assign Product Management', 'Admin Header', 0, '2023-07-24 11:59:23'),
(1627, 'Manage Product', 'Manage Product', 'Admin Assign Management', 0, '2023-07-24 12:00:05');
INSERT INTO `hardwords` (`id`, `en`, `lang`, `place`, `allowDelete`, `time`) VALUES
(1628, 'News Delete Successfully', 'News Delete Successfully', 'Admin News Management', 0, '2023-08-02 06:28:05'),
(1629, 'Feature Icons', 'Feature Icons', 'Admin Product Add', 0, '2023-08-02 08:00:52'),
(1630, 'Product Main Image Size : 450x300, Detail Image Size:450x300', 'Product Main Image Size : 450x300, Detail Image Size:450x300', 'Admin Product Add', 0, '2023-08-02 08:00:52'),
(1631, 'Validity(In Months)', 'Validity(In Months)', 'Admin Product Add', 0, '2023-08-02 08:00:52'),
(1632, 'Validity', 'Validity', 'Admin Product Add', 0, '2023-08-02 08:00:52'),
(1633, 'Payment Mode', 'Payment Mode', 'Admin Product Add', 0, '2023-08-02 08:00:52'),
(1634, 'Coupon Use', 'Coupon Use', 'Admin Product Coupon', 0, '2023-08-02 08:00:55'),
(1635, 'COUPON ID', 'COUPON ID', 'Admin Product Coupon', 0, '2023-08-02 08:00:55'),
(1636, 'ORDER ID', 'ORDER ID', 'Admin Product Coupon', 0, '2023-08-02 08:00:55'),
(1637, 'User Id', 'User Id', 'Admin Product Coupon', 0, '2023-08-02 08:00:55'),
(1638, 'Coupon Limit', 'Coupon Limit', 'Admin Product Coupon', 0, '2023-08-02 08:00:55'),
(1639, 'Enter Limit', 'Enter Limit', 'Admin Product Coupon', 0, '2023-08-02 08:00:55'),
(1640, 'Invoice List', 'Invoice List', 'AdminMenu', 0, '2023-08-04 06:32:34'),
(1641, 'Due Date', 'Due Date', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1642, 'ORDER EXPIRY', 'ORDER EXPIRY', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1643, 'Cancel Requests', 'Cancel Requests', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1644, 'Orders Cancel Requests', 'Orders Cancel Requests', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1645, 'SCHEDULE DATE', 'SCHEDULE DATE', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1646, 'SCHEDULE SLOT', 'SCHEDULE SLOT', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1647, 'TECHNICAL FORM', 'TECHNICAL FORM', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1648, 'Pending Schedules', 'Pending Schedules', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1649, 'TIME SLOT', 'TIME SLOT', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1650, 'SUBSCRIPTION PLAN', 'SUBSCRIPTION PLAN', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1651, 'NEXT BILLING DATE', 'NEXT BILLING DATE', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1652, 'Order Placed', 'Order Placed', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1653, 'Pending Installation', 'Pending Installation', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1654, 'Live', 'Live', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1655, 'Pending Removal', 'Pending Removal', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1656, 'Your Order Placed Successfully', 'Your Order Placed Successfully', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1657, 'LAST INVOICE STATUS', 'LAST INVOICE STATUS', 'Admin Order', 0, '2023-08-04 06:32:39'),
(1658, 'Please Select Product', 'Please Select Product', 'Admin OrderScript', 0, '2023-08-04 06:32:39'),
(1659, 'reports Management', 'reports Management', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1660, 'Manage reports', 'Manage reports', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1661, 'Active reports', 'Active reports', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1662, 'Add New reports', 'Add New reports', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1663, 'Add New reports/Event', 'Add New reports/Event', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1664, 'reports Save Successfully', 'reports Save Successfully', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1665, 'reports Save Failed', 'reports Save Failed', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1666, 'reports Image (278x278 px)', 'reports Image (278x278 px)', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1667, 'reports Date', 'reports Date', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1668, 'reports Setting', 'reports Setting', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1669, 'reports Title', 'reports Title', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1670, 'reports Detail', 'reports Detail', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1671, 'Old reports Image', 'Old reports Image', 'Admin reports Management', 0, '2023-08-04 06:33:30'),
(1672, 'BILLING MODE', 'BILLING MODE', 'Admin Invoice', 0, '2023-08-04 06:49:30'),
(1673, 'SCHEDULE', 'SCHEDULE', 'Admin Invoice', 0, '2023-08-04 06:49:30'),
(1674, 'Transaction Reference', 'Transaction Reference', 'Admin Invoice', 0, '2023-08-04 06:49:30'),
(1675, 'CUSTOMER DETAILS', 'CUSTOMER DETAILS', 'Admin Invoice', 0, '2023-08-04 06:49:30'),
(1676, 'PRODUCT DETAILS', 'PRODUCT DETAILS', 'Admin Invoice', 0, '2023-08-04 06:49:30'),
(1677, 'INVOICE DETAILS', 'INVOICE DETAILS', 'Admin Invoice', 0, '2023-08-04 06:49:30'),
(1678, 'MONTHLY PRICE', 'MONTHLY PRICE', 'Admin Invoice', 0, '2023-08-04 06:49:30'),
(1679, 'images size', 'images size', 'Admin Product Add', 0, '2023-08-08 08:10:49'),
(1680, 'rder Number', 'rder Number', 'admin', 0, '2023-08-08 11:53:57'),
(1681, 'Video Recommended Size : {{size}}', 'Video Recommended Size : {{size}}', 'Admin Banners', 0, '2023-08-09 06:10:20'),
(1682, 'Banner', 'Banner', 'Admin Banners', 0, '2023-08-09 06:15:57'),
(1683, 'Banner Delete Successfully', 'Banner Delete Successfully', 'Admin Banners', 0, '2023-08-09 06:15:57'),
(1684, 'Video', 'Video', 'Admin Banners', 0, '2023-08-09 06:17:13'),
(1685, 'Captivate Gallery', 'Captivate Gallery', 'AdminMenu', 0, '2023-08-09 09:06:21'),
(1686, 'captivategallery Management', 'captivategallery Management', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1687, 'Manage captivategallery', 'Manage captivategallery', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1688, 'Active captivategallery', 'Active captivategallery', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1689, 'Sort captivategallery', 'Sort captivategallery', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1690, 'Add New captivategallery', 'Add New captivategallery', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1691, 'captivategallery', 'captivategallery', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1692, 'captivategallery Add Successfully', 'captivategallery Add Successfully', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1693, 'captivategallery Add Failed', 'captivategallery Add Failed', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1694, 'captivategallery Update Failed', 'captivategallery Update Failed', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1695, 'captivategallery Update Successfully', 'captivategallery Update Successfully', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1696, 'captivategallery Title', 'captivategallery Title', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1697, 'captivategallery Link', 'captivategallery Link', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1698, 'Old captivategallery Image', 'Old captivategallery Image', 'Admin captivategallery', 0, '2023-08-09 09:21:29'),
(1699, 'Original Image Recommended Size : {{size}}', 'Original Image Recommended Size : {{size}}', 'Admin captivategallery', 0, '2023-08-09 10:22:34'),
(1700, 'Edit Image Recommended Size : {{size}}', 'Edit Image Recommended Size : {{size}}', 'Admin captivategallery', 0, '2023-08-09 10:22:34'),
(1701, 'Enter Album Description', 'Enter Album Description', 'Admin Gallery', 0, '2023-08-11 08:06:30'),
(1702, 'Documents Management', 'Documents Management', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1703, 'Manage Documents', 'Manage Documents', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1704, 'Active Documents', 'Active Documents', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1705, 'Draft Documents', 'Draft Documents', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1706, 'Add New Document', 'Add New Document', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1707, 'Documents Title', 'Documents Title', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1708, 'Image Documents Error', 'Image Documents Error', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1709, 'Documents', 'Documents', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1710, 'Documents Add Successfully', 'Documents Add Successfully', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1711, 'Documents Add Failed', 'Documents Add Failed', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1712, 'Documents Update Failed', 'Documents Update Failed', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1713, 'Documents Update Successfully', 'Documents Update Successfully', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1714, 'File', 'File', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1715, 'Old Documents Image', 'Old Documents Image', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1716, 'mail', 'mail', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1717, 'Mandatory', 'Mandatory', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1718, 'Recommended', 'Recommended', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1719, 'Assign To', 'Assign To', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1720, 'One User', 'One User', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1721, 'All User', 'All User', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1722, 'Approved', 'Approved', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1723, 'Approved Documents', 'Approved Documents', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1724, 'Recurring Duration', 'Recurring Duration', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1725, 'Recurrence', 'Recurrence', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1726, 'Training', 'Training', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1727, 'Sub Category', 'Sub Category', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1728, 'Manage FAQ', 'Manage FAQ', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1729, 'Active FAQ', 'Active FAQ', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1730, 'Add New FAQ', 'Add New FAQ', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1731, 'Draft FAQ', 'Draft FAQ', 'Admin Documents', 0, '2023-08-11 10:03:20'),
(1732, 'Event Management', 'Event Management', 'Admin documents', 0, '2023-08-11 10:16:58'),
(1733, 'Event Delete Successfully', 'Event Delete Successfully', 'Admin documents', 0, '2023-08-11 10:16:58'),
(1734, 'Delete WebUser', 'Delete WebUser', 'Users Management', 0, '2023-08-19 11:16:12'),
(1735, 'Update WebUser', 'Update WebUser', 'Users Management', 0, '2023-08-19 11:16:12'),
(1736, 'WebUser Update Successfully', 'WebUser Update Successfully', 'Users Management', 0, '2023-08-19 11:16:12'),
(1737, 'WebUser Delete Successfully', 'WebUser Delete Successfully', 'Users Management', 0, '2023-08-19 11:16:12'),
(1738, 'WebUser', 'WebUser', 'Users Management', 0, '2023-08-19 11:16:12'),
(1739, 'Delete AdminUser', 'Delete AdminUser', 'Users Management', 0, '2023-08-19 11:16:12'),
(1740, 'Delete UserGroup', 'Delete UserGroup', 'Users Management', 0, '2023-08-19 11:16:12'),
(1741, 'Admin User Group Delete Successfully', 'Admin User Group Delete Successfully', 'Users Management', 0, '2023-08-19 11:16:12'),
(1742, 'AdminUser Update Successfully', 'AdminUser Update Successfully', 'Users Management', 0, '2023-08-19 11:16:12'),
(1743, 'AdminUser', 'AdminUser', 'Users Management', 0, '2023-08-19 11:16:12'),
(1744, 'AdminUser Delete Successfully', 'AdminUser Delete Successfully', 'Users Management', 0, '2023-08-19 11:16:12'),
(1745, 'An email is sent. Please check your emails.', 'An email is sent. Please check your emails.', 'admin', 0, '2023-08-19 14:22:35'),
(1746, 'Enter your email and we send you a password reset link', 'Enter your email and we send you a password reset link', 'admin', 0, '2023-08-21 05:40:09'),
(1747, 'Completed', 'Completed', 'Admin Assign Management', 0, '2023-08-23 19:10:11'),
(1748, 'Without edit', 'Without edit', 'Admin Product Add', 0, '2023-08-29 07:34:23'),
(1749, 'Package Type', 'Package Type', 'Admin Product Add', 0, '2023-08-29 07:36:52'),
(1750, 'Without', 'Without', 'Admin Product Add', 0, '2023-08-29 07:39:02'),
(1751, 'Thanks for your interest. Our representative will get in touch with you.', 'Thanks for your interest. Our representative will get in touch with you.', 'admin', 0, '2023-08-29 13:21:35'),
(1752, 'An Error occured while sending your mail. Please Try Later', 'An Error occured while sending your mail. Please Try Later', 'admin', 0, '2023-08-29 13:21:36'),
(1753, 'The form has not been submitted please refill the form and submit.', 'The form has not been submitted please refill the form and submit.', 'admin', 0, '2023-08-29 13:22:49'),
(1754, 'All Forms Data', 'All Forms Data', 'AdminMenu', 0, '2023-08-29 13:54:21'),
(1755, 'Forms Data', 'Forms Data', 'AdminMenu', 0, '2023-08-29 13:54:21'),
(1756, 'All Form Data', 'All Form Data', 'Admin Email', 0, '2023-08-29 13:54:26'),
(1757, 'CONTACT NO', 'CONTACT NO', 'Admin Email', 0, '2023-08-29 13:54:26'),
(1758, 'Message For Notification', 'Message For Notification', 'Admin Email', 0, '2023-08-29 13:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `ian_image`
--

CREATE TABLE `ian_image` (
  `img_id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ibms_setting`
--

CREATE TABLE `ibms_setting` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_val` text NOT NULL,
  `info` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ibms_setting`
--

INSERT INTO `ibms_setting` (`id`, `setting_name`, `setting_val`, `info`) VALUES
(1, 'Site Name', 'picmee', '2014-08-25 13:33:58'),
(2, 'Email', 'supermanman0300@gmail.com', '2014-08-25 13:33:58'),
(3, 'TimeZone', 'Europe/Stockholm', '2014-08-25 13:35:27'),
(4, 'Languages', 'a:1:{i:0;s:7:\"English\";}', '2014-08-25 13:35:27'),
(5, 'Default Language', 'English', '2014-08-25 13:53:05'),
(6, 'Default Web Language', 'English', '2014-08-29 18:12:42'),
(7, 'Default Admin_Price_Country', 'US', '2014-09-23 17:37:49'),
(8, 'Default Web_Price_Country', 'US', '2014-09-23 17:37:49'),
(9, 'Inventory_0_delete_afterDays', '600', '2014-09-24 15:13:02'),
(10, 'invoice_key_start_with', 'SC', '2014-09-25 12:44:20'),
(11, 'order_invoice_deleteOn_request_after_days', '22', '2014-10-14 13:25:16'),
(12, 'historyDeleteAfterDays', '8', '2014-11-21 16:59:59'),
(13, 'productLimit', '38', '2014-12-05 18:26:46'),
(14, 'Google_Analythics', '<script>\n  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');\n\n  ga(\'create\', \'UA-50416248-17\', \'auto\');\n  ga(\'send\', \'pageview\');\n  ga(\'require\', \'ecommerce\');\n\n</script>', '2014-12-13 13:54:14'),
(15, 'sortProductImage', 'yes', '2014-12-23 16:35:43'),
(16, 'no_inventory_product_show_onWeb', 'yes', '2014-12-24 17:36:00'),
(17, 'Default_Admin_Panel_Language', 'English', '2015-01-10 13:21:06'),
(18, 'latestProductLimit', '20', '2015-02-07 11:24:57'),
(19, 'featuredProductLimit', '10', '2015-02-07 11:25:19'),
(20, 'topSaleProductLimit', '11', '2015-02-07 11:35:44'),
(21, 'latestBlogLimit', '12', '2015-02-07 16:17:33'),
(22, 'Twitter', 'https://twitter.com', '2015-02-09 12:28:04'),
(27, 'Facebook', 'https://facebook.com', '2015-02-09 12:28:04'),
(28, 'Vimeo', 'http://vimeo', '2015-02-09 12:28:04'),
(29, 'Google', 'http://google', '2015-02-09 12:28:04'),
(30, 'PayPal_email', '', '2015-02-11 11:17:11'),
(31, 'contact', '010-4103120', '2015-02-13 11:25:33'),
(32, 'linkedIn', 'https://linkin.com', '2015-02-09 12:28:04'),
(33, 'pinterest', 'javascript:;', '2015-02-09 12:28:04'),
(34, 'youtube', 'javascript:;', '2015-02-09 12:28:04'),
(35, 'loginForComment', '1', '2015-02-21 13:10:10'),
(36, 'commentStatus', '0', '2015-02-21 13:10:10'),
(37, 'reviewLimit', '3', '2015-02-21 16:37:11'),
(38, 'reviewOrderBY', 'ASC', '2015-02-21 16:39:40'),
(39, 'adminFilesMd5', 'a:19:{s:7:\"banners\";a:5:{s:14:\"bannerEdit.php\";s:32:\"670dfc99725e0230015aa6bacd3b69bc\";s:15:\"banner_ajax.php\";s:32:\"b2af8d1ec7f6b2d794691115e8d18af7\";s:11:\"banners.php\";s:32:\"4e9c47a2c8f3f40e6db0b5eabd20458b\";s:9:\"index.php\";s:32:\"0b1c63737c94862038ea8829bbd6bf7b\";s:7:\"classes\";a:2:{s:16:\"banner.class.php\";s:32:\"f230df2a35a5d20b829922d3b68be1a8\";s:21:\"banner_ajax.class.php\";s:32:\"fcfe5e8c3b4adb7406ab7d753f898afd\";}}s:6:\"brands\";a:5:{s:13:\"brandEdit.php\";s:32:\"ec198eb3f93aef3ea882dc4e790a79d2\";s:14:\"brand_ajax.php\";s:32:\"4cebb2d9513e8ece19f95e92211d009d\";s:10:\"brands.php\";s:32:\"137ed70eb5e772f406655f54280b1276\";s:9:\"index.php\";s:32:\"084e19de3c5140bc50a21cfd02b08744\";s:7:\"classes\";a:2:{s:20:\"brand_ajax.class.php\";s:32:\"bc4d030c714e8747f86bc26033452756\";s:16:\"brands.class.php\";s:32:\"51cac1db2a752c8a5516faf0a8aa2402\";}}s:4:\"blog\";a:5:{s:8:\"blog.php\";s:32:\"5da3dc5b23ea36bd21d52b1cc1f94828\";s:12:\"blogEdit.php\";s:32:\"55288f78dcff9d58c638a7c589e3cc7d\";s:13:\"blog_ajax.php\";s:32:\"f52a35f7f98599ad003c041fc48dc0cd\";s:9:\"index.php\";s:32:\"2a1d290a354b3aa16b95ec7c3038737a\";s:7:\"classes\";a:2:{s:14:\"blog.class.php\";s:32:\"f12c7333847d53f72b24103c261f47a1\";s:19:\"blog_ajax.class.php\";s:32:\"0f74bbb971d03094e53481fc568541ec\";}}s:9:\"dashboard\";a:1:{s:19:\"dashboard.class.php\";s:32:\"6954c953ce10aa8a8dda6e4b075d4511\";}s:5:\"email\";a:6:{s:9:\"email.php\";s:32:\"88a6590f77a26648e7825de33de7854c\";s:16:\"emailContent.php\";s:32:\"441414dedf3978a5ec531e658e49fbe1\";s:14:\"email_ajax.php\";s:32:\"0c55adec87b2ee57d67cea48af2c72e1\";s:9:\"index.php\";s:32:\"429ec6ee41395dc1fe1c8557be4003d2\";s:14:\"newsLetter.php\";s:32:\"3520dfe4201525ff140f24a27e9994f0\";s:7:\"classes\";a:2:{s:15:\"email.class.php\";s:32:\"d5466589b27d9447f7eca948c95436a1\";s:20:\"email_ajax.class.php\";s:32:\"f20529ef8d4101834c3090f5d5a984f5\";}}s:7:\"gallery\";a:5:{s:11:\"gallery.php\";s:32:\"6580559ec30ac1c7a4d24cd5c7e0eb4a\";s:15:\"galleryEdit.php\";s:32:\"65e4e7d9e68429502cf945beb13fe50d\";s:16:\"gallery_ajax.php\";s:32:\"ea920c0e1cb5d208a28ca664ed473ee5\";s:9:\"index.php\";s:32:\"46589a17316b2635ece73f58823e4003\";s:7:\"classes\";a:2:{s:17:\"gallery.class.php\";s:32:\"89f2928e0b4416be89dfb4723137ec67\";s:22:\"gallery_ajax.class.php\";s:32:\"5ed868722dcc2340d162053f889d3335\";}}s:4:\"logs\";a:8:{s:17:\"defectArchive.php\";s:32:\"e72790a0f16511e2c5f17c1f37b95460\";s:13:\"defectReg.php\";s:32:\"f60264bb0fd7d89fced475cadfa9b3a3\";s:9:\"index.php\";s:32:\"940e129e71bdc9123576bb9298cc9510\";s:13:\"logs_ajax.php\";s:32:\"563542677307635bd2ab4daa61f89c99\";s:17:\"productDefect.php\";s:32:\"994c7e64f38f7a2246e9d30b7b4c197d\";s:17:\"productReturn.php\";s:32:\"43dbdb75f54e1eccb7ed6973b6e7df82\";s:13:\"returnReg.php\";s:32:\"98413d724a20ff6981813d3d84b1c9ae\";s:7:\"classes\";a:1:{s:14:\"logs.class.php\";s:32:\"630e8e0b6617ec48ce1d91c0644e6e66\";}}s:4:\"menu\";a:7:{s:14:\"footerMenu.php\";s:32:\"503f6f2fe1cd9f817fe4ac9244d23bf1\";s:18:\"footerMenuEdit.php\";s:32:\"f6cba2049c8a9ffb0a9916dd6001d520\";s:9:\"index.php\";s:32:\"92f7ffec3515002e258a1551a07582ea\";s:8:\"menu.php\";s:32:\"640a284cba4a0a3e3ff7efa21d8d49bf\";s:12:\"menuEdit.php\";s:32:\"7ef1c55911045789a471e0619f3ca534\";s:13:\"menu_ajax.php\";s:32:\"834ea63999f20b298ec17a6a2b5ff15e\";s:7:\"classes\";a:2:{s:14:\"menu.class.php\";s:32:\"f5180bbbe3919d744de07ae9c2a19477\";s:19:\"menu_ajax.class.php\";s:32:\"109c5821c4ddedca0b5861871ea0b191\";}}s:4:\"news\";a:6:{s:9:\"index.php\";s:32:\"060c53f18bc5b89e3e548a9af782feac\";s:8:\"news.php\";s:32:\"968c984a66ffc2158acfcfb68ab40fd3\";s:12:\"newsEdit.php\";s:32:\"9729fe50b2520918e8f0b1b2cb42f86b\";s:11:\"newsNew.php\";s:32:\"cf47d5a0eb858dc56e87dc187b5467e8\";s:13:\"news_ajax.php\";s:32:\"6d3116cf445d32728dbfc0f4cb532588\";s:7:\"classes\";a:2:{s:14:\"news.class.php\";s:32:\"7be3830ea1241d856dd0ad982035618f\";s:19:\"news_ajax.class.php\";s:32:\"ec6242306a72c57af93b2b9e25ed2e5b\";}}s:5:\"order\";a:7:{s:9:\"index.php\";s:32:\"c0c7bbda8aef7a4355c98114abd0ea84\";s:46:\"invoice Before Change Cutomer Table Design.php\";s:32:\"a5086f94209660894872a311d35b6fed\";s:11:\"invoice.php\";s:32:\"4ca5331e62dd57e69ca2729f87d7a32e\";s:12:\"newOrder.php\";s:32:\"8e9a865c2a38f761146585873e9433be\";s:14:\"order_ajax.php\";s:32:\"bf6e46fa0b1536e0f450d373fad3a84d\";s:7:\"classes\";a:4:{s:11:\"invoice.php\";s:32:\"2066a7ac143604c4f21b159ff4bd4390\";s:10:\"klarna.php\";s:32:\"1dc984a7a26897d9332b55728a6a1897\";s:9:\"order.php\";s:32:\"c3ffce066256fb4f29bd4c7a2d69328c\";s:14:\"order_ajax.php\";s:32:\"5635ae600ef6b537e1ada1d08efb6fd5\";}s:8:\"function\";a:1:{s:18:\"order_function.php\";s:32:\"250743463647d839bf82cf20eec4d1ea\";}}s:5:\"pages\";a:8:{s:12:\"homePage.php\";s:32:\"b6b9cd2104e81c7024b9d23dfd12440e\";s:16:\"homePageEdit.php\";s:32:\"55bf2a574674acbca282ba6a073a8b64\";s:9:\"index.php\";s:32:\"b830ca6ce72a5e2adeba8cfe34bdfa96\";s:8:\"page.php\";s:32:\"1e9a7febf0a85d41208835bd3ff41285\";s:12:\"pageEdit.php\";s:32:\"2c4f80e5d5377890ce368c747e70470f\";s:11:\"pageNew.php\";s:32:\"fd3bdc6027613844789dcee84a5b577b\";s:13:\"page_ajax.php\";s:32:\"e1f5a1b504fc37a2e83f76c6dd5b48f2\";s:7:\"classes\";a:2:{s:19:\"page_ajax.class.php\";s:32:\"a9153a85529d2abaf3f0e5bdb5edc2a8\";s:15:\"pages.class.php\";s:32:\"487980e559b0ad4df97c4f565d48b0c8\";}}s:7:\"product\";a:16:{s:60:\"add.page - copy other field name change for this project.php\";s:32:\"8a0bc6e508cbb3621a9b0a1dfeab693e\";s:12:\"add.page.php\";s:32:\"37111d7247e2423d3d32dbf6c676f466\";s:19:\"ajax.controller.php\";s:32:\"f754b832368f71d114f573e3a7674e07\";s:19:\"allProductsInfo.php\";s:32:\"7a489f90371cbfae7657037501dc6f97\";s:16:\"default.page.php\";s:32:\"5bbbca129040a974e042e0a60e7a8475\";s:13:\"edit.page.php\";s:32:\"449f969bda17fc8f09b69f65419661d6\";s:9:\"index.php\";s:32:\"42b2aa5e151f6141bf61595449a3adbe\";s:11:\"pCoupon.php\";s:32:\"62f2ccd28584fdb5da7f2f8f103ef8fc\";s:15:\"pCouponForm.php\";s:32:\"960e71c1e3e776f28f82c7a321a04c6d\";s:13:\"pDiscount.php\";s:32:\"dce9321c043c10edcebbb8f2af92da4b\";s:17:\"pDiscountForm.php\";s:32:\"654a8b9e434026ead476f5431cb65fea\";s:13:\"pHoleSale.php\";s:32:\"cd4926768a0cc73dac179fd52d7dcd5e\";s:17:\"pHoleSaleForm.php\";s:32:\"be60beee33b744d3e36d1dc8b7505f21\";s:20:\"productlist.page.php\";s:32:\"7fad61ec9a9a312c88ae84bcbbeaca95\";s:15:\"sortProduct.php\";s:32:\"1bf71d086241c7611d5e4ed1454ba3c0\";s:7:\"classes\";a:4:{s:16:\"coupon.class.php\";s:32:\"eb8121b3af1e0a41b063cd9be0d42b4c\";s:18:\"discount.class.php\";s:32:\"6a3f791743e9fa7e73304e072f8a167b\";s:17:\"product.class.php\";s:32:\"81975d51b33c189ca493d506be2b8034\";s:14:\"sale.class.php\";s:32:\"10e29ac5ada4fbd5cae3d8d972608ffe\";}}s:18:\"product_management\";a:10:{s:12:\"category.php\";s:32:\"9896b87b8af98f45342fc11738b525bd\";s:10:\"colors.php\";s:32:\"adbc73e58ba158d08ea7f9a9491994ac\";s:12:\"currency.php\";s:32:\"4280fb91c6634e794d9dbf4c711a5a2f\";s:9:\"index.php\";s:32:\"337de92a85b116d315b4c8ca0370d632\";s:8:\"main.php\";s:32:\"0bad7dc4f1032c01182ca0e7458fe1f4\";s:16:\"product_ajax.php\";s:32:\"91dbc7e2df2dc9dd599265235b2163ee\";s:10:\"scales.php\";s:32:\"7bc21df36724e218e1ccdb2f6abf2ae8\";s:8:\"category\";a:2:{s:12:\"class.db.php\";s:32:\"8f2092598d3224bd5e1551a591fe3f04\";s:14:\"class.tree.php\";s:32:\"4eb72ae7382cac172948c7d2db7d9572\";}s:7:\"classes\";a:5:{s:8:\"ajax.php\";s:32:\"f3e7a586ff83056f34462bd8db3a8ea8\";s:15:\"color.class.php\";s:32:\"78827a2eff987f939e63dbb4f8a01cbe\";s:18:\"currency.class.php\";s:32:\"ec95c94963a821eb619b4b53c79cddea\";s:15:\"scale.class.php\";s:32:\"8832d076fcadf51ddef40da208ecac34\";s:8:\"temp.php\";s:32:\"e75a213a97329538ba74ccd04c9721ab\";}s:9:\"functions\";a:1:{s:20:\"product_function.php\";s:32:\"ba866d940e04e0a834e126bad18758a4\";}}s:3:\"seo\";a:5:{s:9:\"index.php\";s:32:\"5c17d8da76339804f4e3c4a2d4e188ef\";s:7:\"seo.php\";s:32:\"3664fc18cb791d82ce58642fbf46eeb9\";s:11:\"seoEdit.php\";s:32:\"b39e66c5bc4808b0265fda23b86c8b71\";s:12:\"seo_ajax.php\";s:32:\"9e03cd56e94f74680a41fda7c8928850\";s:7:\"classes\";a:2:{s:13:\"seo.class.php\";s:32:\"08297e94ff6f6002c4d6b1b20febb7cb\";s:18:\"seo_ajax.class.php\";s:32:\"cb0c0a6c201b1423ec805e2a24ff982c\";}}s:7:\"setting\";a:7:{s:15:\"IBMSSetting.php\";s:32:\"1c6409c45d168a948c5dbeda9835fdbe\";s:11:\"account.php\";s:32:\"144d893f6f6e08e786fa0ee4edd4b680\";s:13:\"hardWords.php\";s:32:\"14b509e0ff91f3b8cf122b73ccf52e3e\";s:11:\"history.php\";s:32:\"05135e1b17aec36dab89ca079cffff1e\";s:9:\"index.php\";s:32:\"dc2708da80aa11787571d2a9f8932eea\";s:16:\"setting_ajax.php\";s:32:\"837bf0ca70cb88debca71fe858abceef\";s:7:\"classes\";a:2:{s:17:\"setting.class.php\";s:32:\"ea7b9d399ec22abb602ebcfb5280b635\";s:22:\"setting_ajax.class.php\";s:32:\"3ab5163f63cb77f008e914547de6c81b\";}}s:8:\"shipping\";a:5:{s:9:\"index.php\";s:32:\"2aa9d812c0d98cec39b999019b4e8a31\";s:12:\"shipping.php\";s:32:\"7b18a88cd45dfbe319b3d41d4f39a11a\";s:16:\"shippingEdit.php\";s:32:\"f39dfd7764cf1687cd08a9e7d3080f42\";s:17:\"shipping_ajax.php\";s:32:\"e293c1a9282500da6265a4103c9786cc\";s:7:\"classes\";a:2:{s:12:\"shipping.php\";s:32:\"d45127dcd5372596f3400e7c98e2a2e5\";s:17:\"shipping_ajax.php\";s:32:\"2ebcffafc862bb3c7eaae3972fff83dc\";}}s:5:\"stock\";a:7:{s:12:\"addstore.php\";s:32:\"e39fe289bbea6231a64d3d5966d4bd9f\";s:9:\"index.php\";s:32:\"c455d622c55b3126fcff94f6a722d1b7\";s:13:\"inventory.php\";s:32:\"6fa1e47a4e500d1d412b454addc12c4e\";s:19:\"purchaseReceipt.php\";s:32:\"329c807e68f26a4646f0a0699ac56c92\";s:14:\"stock_ajax.php\";s:32:\"30c9ea2cf6ea5da1e289b51562dd971e\";s:7:\"classes\";a:4:{s:13:\"inventory.php\";s:32:\"97bc795c5834fb07dc9dd97ff908b99f\";s:11:\"receipt.php\";s:32:\"0e73c92e67a7e4eb5ad47a7b57696521\";s:14:\"stock_ajax.php\";s:32:\"f963424e8bd9e363a16ed402e61b9c7b\";s:9:\"store.php\";s:32:\"5aecb1dc11f97c759c6613d96837c6bd\";}s:8:\"function\";a:1:{s:18:\"stock_function.php\";s:32:\"aaec2fc3d1f13a7da5f780f184663167\";}}s:8:\"webUsers\";a:11:{s:12:\"adminGrp.php\";s:32:\"3ed2fe341b158627dab20daeacbc2bf9\";s:16:\"adminGrpEdit.php\";s:32:\"42522497deea03fc3d5f256655a31347\";s:14:\"adminUsers.php\";s:32:\"5e88bd938c0bfcc7dda5644959bedbc4\";s:18:\"adminUsersEdit.php\";s:32:\"7b6191278b42775aa215decc370defed\";s:9:\"index.php\";s:32:\"6c045fc990d64897909507f13fa80c44\";s:11:\"reviews.php\";s:32:\"ac820bed75f88ad9a64a5f0754d1c79a\";s:16:\"reviews_ajax.php\";s:32:\"27fe5b8c04c60f02ae6131592925c7fd\";s:12:\"webUsers.php\";s:32:\"fd15294cfca2b25b64097a8e95b93ec7\";s:16:\"webUsersEdit.php\";s:32:\"819961493080bbcd3110fb0be163ae67\";s:17:\"webUsers_ajax.php\";s:32:\"27d0efbf4c18c38192facb6ef069f3c7\";s:7:\"classes\";a:3:{s:17:\"reviews.class.php\";s:32:\"c1df1c5a4626f8f43f98f30c924e6d79\";s:18:\"webUsers.class.php\";s:32:\"8f6f6fef7969c852dfc37583f7c96dda\";s:23:\"webUsers_ajax.class.php\";s:32:\"6a1f2681caae0dff9bf8eb272a1ffe40\";}}s:0:\"\";a:11:{s:13:\"ajax_call.php\";s:32:\"05253dfe466e297ab3f3f4a527f37674\";s:10:\"footer.php\";s:32:\"c58d78a6a007879159786ddf60e3a128\";s:10:\"global.php\";s:32:\"345de53f50479aed5fd73b7374ce3cbd\";s:13:\"globalVar.php\";s:32:\"b2440f7b91b1b93dad7de131ba6efb07\";s:15:\"global_ajax.php\";s:32:\"34ddff959787e9e2c55eab6cf5e5d2c9\";s:10:\"header.php\";s:32:\"c14e1b51fec5ece37a5a8ad6ecf6a58d\";s:9:\"index.php\";s:32:\"9c4e7731c04fe8341dff19c9ff34ed4a\";s:9:\"login.php\";s:32:\"b5aa6a00d112a4c5533e6883c65ae8d5\";s:14:\"majorCodes.php\";s:32:\"ea0edfddd9579c67013b5ac5c881aa61\";s:13:\"post_file.php\";s:32:\"3bd9e9dd7410835f4f65b9041dc65189\";s:11:\"trouble.php\";s:32:\"5cd27f109f56b047c6b182dfc0c9db9f\";}}', '2015-02-25 10:53:31'),
(40, 'developerSetting', 'ff74ed09779ac7177643e717337cf2a0', '2015-02-25 15:14:02'),
(41, 'featureProduct2Limit', '10', '2015-02-26 13:24:24'),
(42, 'Instagram', 'http://Instagram.com', '2015-03-11 16:21:05'),
(43, 'locationMap', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d904.9707122115619!2d67.08177042703443!3d24.867850464847685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33ea5132b8c9d%3A0x7f6c75c250c00393!2sINTERACTIVE%20MEDIA!5e0!3m2!1sen!2s!4v1584006977236!5m2!1sen!2s', '2015-03-11 16:47:56'),
(44, 'TwitterSite', 'IMediaIntl', '2015-03-13 17:32:13'),
(45, 'showFacebookComment', '0', '2015-03-16 12:12:45'),
(46, 'facebookCommentLimit', '5', '2015-03-16 12:12:45'),
(47, 'facebookColorScheme', 'light', '2015-03-16 12:12:45'),
(48, 'facebookIntId', '123, 142', '2015-03-16 12:15:11'),
(49, 'facebookOrder_by', 'reverse_time', '2015-03-16 12:23:01'),
(50, 'showReview', '1', '2015-03-16 14:20:58'),
(51, 'reviewOffMsg', 'Review Off From Admin Setting', '2015-03-16 14:59:19'),
(52, 'fbOffMsg', '', '2015-03-16 14:59:19'),
(53, 'klarnaTesting', '1', '2015-04-10 18:18:37'),
(54, 'klarnaTestId', '1173', '2015-04-10 18:18:37'),
(55, 'klarnaTestSecret', '5zWdni3xNVcbAUN', '2015-04-10 18:18:37'),
(56, 'klarnaLiveId', '25666', '2015-04-10 18:18:37'),
(57, 'klarnaLiveSecret', 'dXUpLT9V4PGXpOS', '2015-04-10 18:18:37'),
(58, 'couponOfferEmail', '0', '2015-04-10 18:18:37'),
(59, 'check_out_offer', '0', '2015-04-10 18:18:37'),
(60, 'check_out_price_limit', 'a:2:{i:26;s:0:\"\";i:24;s:0:\"\";}', '2015-06-26 16:10:28'),
(61, 'dashboard_graphs', 'a:19:{s:26:\"defect_Product_from_client\";s:1:\"0\";s:20:\"email_sending_status\";s:1:\"0\";s:20:\"no_of_product_report\";s:1:\"0\";s:18:\"order_daily_report\";s:1:\"0\";s:24:\"order_daily_value_report\";s:1:\"0\";s:20:\"order_monthly_report\";s:1:\"0\";s:26:\"order_monthly_value_report\";s:1:\"0\";s:19:\"order_yearly_report\";s:1:\"0\";s:25:\"order_yearly_value_report\";s:1:\"0\";s:27:\"product_sale_by_store_daily\";s:1:\"0\";s:29:\"product_sale_by_store_monthly\";s:1:\"0\";s:26:\"return_Product_from_client\";s:1:\"0\";s:15:\"stock_big_graph\";s:1:\"0\";s:16:\"subscribe_status\";s:1:\"0\";s:14:\"top_coupon_use\";s:1:\"0\";s:14:\"top_order_user\";s:1:\"0\";s:18:\"top_payment_method\";s:1:\"0\";s:18:\"total_order_status\";s:1:\"0\";s:17:\"whole_sale_report\";s:1:\"0\";}', '2015-06-12 17:04:42'),
(62, 'askQuestionOrderBY', 'DESC', '2015-02-21 16:39:40'),
(63, 'askQuestionLimit', '70', '2015-02-21 16:37:11'),
(64, 'showQuestion', '1', '2015-02-21 16:37:11'),
(65, 'questionOffMsg', 'msg', '2015-02-21 16:37:11'),
(66, 'headScript', '', '2015-05-26 15:27:28'),
(67, 'footerScript', '', '2015-05-26 15:36:29'),
(68, 'shippingType', 'weight', '2015-06-16 16:23:57'),
(69, 'payson_email', 'kontor@sharkspeed.com', '2015-06-16 11:55:26'),
(70, 'paysonTesting', '0', '2015-06-16 11:55:26'),
(71, 'paysonTestId', '4', '2015-06-16 11:55:26'),
(72, 'paysonTestMd5', '2acab30d-fe50-426f-90d7-8c60a7eb31d4', '2015-06-16 11:55:26'),
(73, 'paysonId', '29549', '2015-06-16 11:55:26'),
(74, 'paysonMd5', '3966d31c-eaed-41d4-9b63-739349e77212', '2015-06-16 11:55:26'),
(75, 'check_out_shiping_price_limit', 'a:2:{i:26;s:0:\"\";i:24;s:5:\"40000\";}', '2015-06-16 16:35:32'),
(76, 'afterAddToCart_show_goToCart_option', '1', 'after add to card, \"go to cart page\" option show, '),
(77, 'grid_view', 'a:1:{s:7:\"default\";s:4:\"Grid\";}', 'grid view by category, different grid setting show on different category'),
(78, 'payment_method_price', 'a:2:{i:0;a:2:{i:26;s:0:\"\";i:24;s:0:\"\";}i:5;a:2:{i:26;s:0:\"\";i:24;s:1:\"0\";}}', 'Add additional price on selected price'),
(79, 'default_free_gift', '', 'check out free product....'),
(80, 'check_out_gift_price_limit', 'a:2:{i:26;s:0:\"\";i:24;s:5:\"99999\";}', 'check out free product cart price limit'),
(81, 'checkout_two_for_3_category', '1249', 'check out checkout_two_for_3_category buy 3 product from same category and pay for 2 product'),
(82, 'bestSellerProductLimit', '16', '2016-10-31 11:15:00'),
(83, 'statistics_last_date', '2021-08-02', '2016-11-14 13:27:00'),
(84, 'smtp_host_default', 'smtp.gmail.com', 'SMTP host for newsletter'),
(85, 'smtp_secure_layer_default', 'tls', NULL),
(86, 'smtp_port_default', '587', NULL),
(87, 'smtp_user_default', 'noreply@sharkspeed-streetroom.com', NULL),
(88, 'smtp_pswrd_default', 'alihirani', NULL),
(89, 'smtp_pswrd_newsletter', 'WebMaster!@3gLOab{\'/}', NULL),
(90, 'smtp_user_newsletter', 'webmaster@sharkspeedglobal.com', NULL),
(91, 'smtp_port_newsletter', '465', NULL),
(92, 'smtp_secure_layer_newsletter', 'tls', NULL),
(93, 'smtp_host_newsletter', 'mail.sharkspeedglobal.com', 'SMTP host for newsletter'),
(94, 'stapleProduct', '1308', NULL),
(95, 'stapleProductSetting', 'a:2:{s:8:\"quantity\";a:1:{i:0;s:1:\"3\";}s:5:\"price\";a:2:{i:26;a:1:{i:0;s:0:\"\";}i:24;a:1:{i:0;s:4:\"3399\";}}}', NULL),
(96, 'chfPriceFormula', '8.5,1.10', 'divided by, multiply by'),
(97, 'migrate_product_to_ch', '0', '0 or 1'),
(98, 'salesFeature', 'a:3:{s:7:\"country\";a:12:{i:0;s:2:\"24\";i:1;s:2:\"26\";i:2;s:2:\"26\";i:3;s:2:\"26\";i:4;s:2:\"26\";i:5;s:2:\"26\";i:6;s:2:\"26\";i:7;s:2:\"26\";i:8;s:2:\"26\";i:9;s:2:\"26\";i:10;s:2:\"26\";i:11;s:2:\"26\";}s:10:\"cartAmount\";a:12:{i:0;s:2:\"10\";i:1;s:2:\"10\";i:2;s:2:\"10\";i:3;s:2:\"10\";i:4;s:9:\"100000000\";i:5;s:2:\"10\";i:6;s:2:\"10\";i:7;s:2:\"10\";i:8;s:2:\"10\";i:9;s:2:\"10\";i:10;s:2:\"10\";i:11;s:1:\"5\";}s:5:\"price\";a:12:{i:0;s:3:\"499\";i:1;s:3:\"499\";i:2;s:3:\"299\";i:3;s:3:\"299\";i:4;s:3:\"199\";i:5;s:3:\"199\";i:6;s:3:\"199\";i:7;s:2:\"99\";i:8;s:2:\"99\";i:9;s:3:\"399\";i:10;s:3:\"399\";i:11;s:2:\"49\";}}', NULL),
(99, 'saleOfferValidity', '7', 'Days'),
(100, 'doNotForget_offer', '0', '0 or 1'),
(101, 'doNotForget_offer_count', '5', 'Don\'t Forget Offer No of Products To Show'),
(102, 'LongTimePopupDelay', '3', 'In Minutes'),
(103, 'popupAllow', '0', 'Long Time Popup Allow Or Not '),
(104, 'dealBoxSize', 'small', 'product'),
(105, 'priceCalc', 'a:3:{s:7:\"country\";a:11:{i:0;s:2:\"30\";i:1;s:2:\"31\";i:2;s:2:\"32\";i:3;s:2:\"33\";i:4;s:2:\"34\";i:5;s:2:\"35\";i:6;s:2:\"36\";i:7;s:2:\"37\";i:8;s:2:\"38\";i:9;s:2:\"20\";i:10;s:2:\"39\";}s:6:\"divide\";a:11:{i:0;s:3:\"9.5\";i:1;s:3:\"9.5\";i:2;s:3:\"9.5\";i:3;s:1:\"8\";i:4;s:3:\"9.5\";i:5;s:2:\"12\";i:6;s:3:\"9.5\";i:7;s:3:\"9.5\";i:8;s:3:\"9.5\";i:9;s:2:\"11\";i:10;s:2:\"10\";}s:8:\"multiply\";a:11:{i:0;s:3:\"1.0\";i:1;s:3:\"1.0\";i:2;s:3:\"1.0\";i:3;s:4:\"1.15\";i:4;s:3:\"1.0\";i:5;s:1:\"1\";i:6;s:3:\"1.0\";i:7;s:3:\"1.0\";i:8;s:3:\"1.0\";i:9;s:3:\"1.1\";i:10;s:4:\"1.30\";}}', NULL),
(106, 'migrate_product_to_intranet', '0', '0 or 1'),
(107, 'add_and_minus_product_to_intranet', '0', '0 or 1'),
(108, 'SKU', 'SKU-', ''),
(109, 'GRN', 'GRN-', ''),
(110, 'GTN', 'GTN-', ''),
(111, 'DN', 'DN-', ''),
(112, 'IAN', 'IAN-', ''),
(113, 'Reason', 'Broken,Raw', '2014-08-25 13:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `internal_comment_orderinvoice`
--

CREATE TABLE `internal_comment_orderinvoice` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_pk` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `due_date` date NOT NULL,
  `invoice_status` varchar(50) NOT NULL,
  `update_date` date NOT NULL,
  `payment_id` varchar(500) DEFAULT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_pk`, `order_id`, `price`, `due_date`, `invoice_status`, `update_date`, `payment_id`, `date_timestamp`) VALUES
(1404, 323, 150, '2023-10-13', 'pending', '2023-10-13', NULL, '2023-10-13 13:35:10'),
(1403, 322, 150, '2023-10-13', 'pending', '2023-10-13', NULL, '2023-10-13 10:16:57'),
(1402, 319, 150, '2023-10-12', 'pending', '2023-10-12', NULL, '2023-10-12 13:44:51'),
(1401, 318, 249, '2023-10-09', 'pending', '2023-10-09', NULL, '2023-10-09 11:11:41'),
(1400, 317, 249, '2023-10-09', 'pending', '2023-10-09', NULL, '2023-10-09 09:06:46'),
(1399, 312, 99, '2023-10-06', 'pending', '2023-10-06', NULL, '2023-10-06 07:49:00'),
(1398, 311, 399, '2023-10-06', 'pending', '2023-10-06', NULL, '2023-10-06 07:16:33'),
(1397, 310, 249, '2023-10-05', 'pending', '2023-10-05', NULL, '2023-10-05 09:53:14'),
(1396, 306, 149, '2023-10-05', 'pending', '2023-10-05', NULL, '2023-10-05 06:25:08'),
(1395, 305, 149, '2023-10-05', 'pending', '2023-10-05', NULL, '2023-10-05 06:23:23'),
(1394, 297, 150, '2023-10-02', 'pending', '2023-10-02', NULL, '2023-10-02 05:35:25'),
(1393, 296, 150, '2023-10-02', 'pending', '2023-10-02', NULL, '2023-10-02 05:23:41'),
(1392, 295, 39, '2023-10-02', 'pending', '2023-10-02', NULL, '2023-10-02 05:19:56'),
(1391, 284, 78, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 13:39:37'),
(1390, 283, 39, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 13:23:19'),
(1389, 282, 39, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 13:23:18'),
(1388, 281, 150, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 13:16:45'),
(1387, 280, 22, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 13:15:05'),
(1386, 279, 150, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 13:01:06'),
(1385, 278, 39, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 12:50:41'),
(1384, 277, 78, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 12:48:06'),
(1383, 276, 99, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 08:05:21'),
(1382, 275, 99, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 07:45:03'),
(1381, 274, 39, '2023-09-27', 'pending', '2023-09-27', NULL, '2023-09-27 07:41:13'),
(1380, 273, 249, '2023-09-26', 'pending', '2023-09-26', NULL, '2023-09-26 11:14:26'),
(1379, 272, 249, '2023-09-25', 'pending', '2023-09-25', NULL, '2023-09-25 19:53:01'),
(1378, 271, 249, '2023-09-25', 'pending', '2023-09-25', NULL, '2023-09-25 19:53:01'),
(1377, 270, 249, '2023-09-25', 'pending', '2023-09-25', NULL, '2023-09-25 07:01:37'),
(1376, 269, 22, '2023-09-25', 'pending', '2023-09-25', NULL, '2023-09-25 06:32:50'),
(1375, 268, 149, '2023-09-25', 'pending', '2023-09-25', NULL, '2023-09-25 06:25:25'),
(1374, 267, 249, '2023-09-25', 'pending', '2023-09-25', NULL, '2023-09-25 06:18:03'),
(1373, 266, 99, '2023-09-24', 'pending', '2023-09-24', NULL, '2023-09-24 15:44:15'),
(1372, 265, 99, '2023-09-24', 'pending', '2023-09-24', NULL, '2023-09-24 15:44:04'),
(1371, 264, 78, '2023-09-24', 'pending', '2023-09-24', NULL, '2023-09-24 15:40:48'),
(1370, 263, 78, '2023-09-24', 'pending', '2023-09-24', NULL, '2023-09-24 15:39:41'),
(1369, 262, 99, '2023-09-24', 'pending', '2023-09-24', NULL, '2023-09-24 15:32:29'),
(1368, 261, 39, '2023-09-24', 'pending', '2023-09-24', NULL, '2023-09-24 15:16:09'),
(1367, 260, 39, '2023-09-24', 'pending', '2023-09-24', NULL, '2023-09-24 15:16:09'),
(1366, 259, 249, '2023-09-23', 'pending', '2023-09-23', NULL, '2023-09-23 14:01:13'),
(1365, 258, 249, '2023-09-23', 'pending', '2023-09-23', NULL, '2023-09-23 07:01:22'),
(1364, 257, 249, '2023-09-23', 'pending', '2023-09-23', NULL, '2023-09-23 06:54:53'),
(1363, 256, 39, '2023-09-06', 'pending', '2023-09-06', NULL, '2023-09-06 05:33:03'),
(1362, 255, 249, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:52:53'),
(1361, 254, 249, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:51:49'),
(1360, 253, 78, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:48:50'),
(1359, 252, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:46:38'),
(1358, 251, 249, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:46:12'),
(1357, 250, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:45:45'),
(1356, 249, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:45:05'),
(1355, 248, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:42:58'),
(1354, 247, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:39:56'),
(1353, 246, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:38:59'),
(1352, 245, 99, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:28:44'),
(1351, 244, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:23:03'),
(1350, 243, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:22:42'),
(1349, 242, 99, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 12:15:11'),
(1348, 241, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 10:20:41'),
(1347, 240, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 09:17:06'),
(1346, 239, 99, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 09:16:14'),
(1345, 238, 99, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 09:13:37'),
(1344, 237, 149, '2023-09-05', 'pending', '2023-09-05', NULL, '2023-09-05 07:12:34'),
(1343, 236, 99, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 13:15:28'),
(1342, 235, 149, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 12:59:03'),
(1341, 234, 78, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 10:37:00'),
(1340, 233, 249, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 10:35:22'),
(1339, 232, 22, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 08:55:45'),
(1338, 231, 249, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 08:54:44'),
(1337, 230, 99, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 08:53:07'),
(1336, 229, 22, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 08:21:40'),
(1335, 228, 22, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 07:05:33'),
(1334, 227, 39, '2023-09-04', 'pending', '2023-09-04', NULL, '2023-09-04 06:57:45'),
(1333, 226, 99, '2023-09-02', 'pending', '2023-09-02', NULL, '2023-09-02 13:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `long_time_subscribe`
--

CREATE TABLE `long_time_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone_no` varchar(250) NOT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `shortDesc` text DEFAULT NULL,
  `dsc` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` smallint(6) NOT NULL DEFAULT 0,
  `publish` smallint(6) NOT NULL DEFAULT 0,
  `publish_date` varchar(50) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_user` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `price_per_month` double NOT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `validity` int(11) NOT NULL,
  `expire_date` datetime NOT NULL,
  `order_mandate` varchar(500) DEFAULT NULL,
  `order_customer` varchar(500) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `terms_accept_date` varchar(20) NOT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `order_user`, `order_date`, `price_per_month`, `order_status`, `validity`, `expire_date`, `order_mandate`, `order_customer`, `status`, `terms_accept_date`, `date_timestamp`) VALUES
(226, 56, '44', '2023-09-02 15:03:18', 99, 'process', 1, '2023-10-02 15:03:18', NULL, NULL, NULL, '2023-09-02 15:03:18', '2023-09-02 13:03:18'),
(233, 13, '46', '2023-09-04 12:35:22', 249, 'process', 1, '2023-10-04 12:35:22', NULL, NULL, NULL, '2023-09-04 12:35:22', '2023-09-04 10:35:22'),
(234, 88, '46', '2023-09-04 12:37:00', 78, 'process', 1, '2023-10-04 12:37:00', NULL, NULL, NULL, '2023-09-04 12:37:00', '2023-09-04 10:37:00'),
(235, 12, '46', '2023-09-04 14:59:03', 149, 'process', 1, '2023-10-04 14:59:03', NULL, NULL, NULL, '2023-09-04 14:59:03', '2023-09-04 12:59:03'),
(236, 56, '46', '2023-09-04 15:15:28', 99, 'process', 1, '2023-10-04 15:15:28', NULL, NULL, NULL, '2023-09-04 15:15:28', '2023-09-04 13:15:28'),
(237, 12, '42', '2023-09-05 09:12:34', 149, 'process', 1, '2023-10-05 09:12:34', NULL, NULL, NULL, '2023-09-05 09:12:34', '2023-09-05 07:12:34'),
(238, 56, '44', '2023-09-05 11:13:37', 99, 'process', 1, '2023-10-05 11:13:37', NULL, NULL, NULL, '2023-09-05 11:13:37', '2023-09-05 09:13:37'),
(239, 56, '44', '2023-09-05 11:16:14', 99, 'process', 1, '2023-10-05 11:16:14', NULL, NULL, NULL, '2023-09-05 11:16:14', '2023-09-05 09:16:14'),
(240, 12, '44', '2023-09-05 11:17:06', 149, 'process', 1, '2023-10-05 11:17:06', NULL, NULL, NULL, '2023-09-05 11:17:06', '2023-09-05 09:17:06'),
(241, 12, '46', '2023-09-05 12:20:41', 149, 'process', 1, '2023-10-05 12:20:41', NULL, NULL, NULL, '2023-09-05 12:20:41', '2023-09-05 10:20:41'),
(242, 56, '82', '2023-09-05 14:15:09', 99, 'process', 1, '2023-10-05 14:15:09', NULL, NULL, NULL, '2023-09-05 14:15:09', '2023-09-05 12:15:11'),
(243, 12, '83', '2023-09-05 14:22:41', 149, 'process', 1, '2023-10-05 14:22:41', NULL, NULL, NULL, '2023-09-05 14:22:41', '2023-09-05 12:22:42'),
(244, 12, '64f71d3f0b4c5_64f71d3f0b4c7', '2023-09-05 14:23:03', 149, 'process', 1, '2023-10-05 14:23:03', NULL, NULL, NULL, '2023-09-05 14:23:03', '2023-09-05 12:23:03'),
(245, 56, '64f71ede30c05_64f71ede30c06', '2023-09-05 14:28:44', 99, 'process', 1, '2023-10-05 14:28:44', NULL, NULL, NULL, '2023-09-05 14:28:44', '2023-09-05 12:28:44'),
(246, 12, '83', '2023-09-05 14:38:59', 149, 'process', 1, '2023-10-05 14:38:59', NULL, NULL, NULL, '2023-09-05 14:38:59', '2023-09-05 12:38:59'),
(247, 12, '83', '2023-09-05 14:39:56', 149, 'process', 1, '2023-10-05 14:39:56', NULL, NULL, NULL, '2023-09-05 14:39:56', '2023-09-05 12:39:56'),
(248, 12, '83', '2023-09-05 14:42:58', 149, 'process', 1, '2023-10-05 14:42:58', NULL, NULL, NULL, '2023-09-05 14:42:58', '2023-09-05 12:42:58'),
(249, 12, '84', '2023-09-05 14:45:04', 149, 'process', 1, '2023-10-05 14:45:04', NULL, NULL, NULL, '2023-09-05 14:45:04', '2023-09-05 12:45:05'),
(250, 12, '84', '2023-09-05 14:45:45', 149, 'process', 1, '2023-10-05 14:45:45', NULL, NULL, NULL, '2023-09-05 14:45:45', '2023-09-05 12:45:45'),
(251, 13, '85', '2023-09-05 14:46:07', 249, 'process', 1, '2023-10-05 14:46:07', NULL, NULL, NULL, '2023-09-05 14:46:07', '2023-09-05 12:46:12'),
(252, 12, '86', '2023-09-05 14:46:37', 149, 'process', 1, '2023-10-05 14:46:37', NULL, NULL, NULL, '2023-09-05 14:46:37', '2023-09-05 12:46:38'),
(253, 88, '85', '2023-09-05 14:48:50', 78, 'process', 1, '2023-10-05 14:48:50', NULL, NULL, NULL, '2023-09-05 14:48:50', '2023-09-05 12:48:50'),
(254, 13, '87', '2023-09-05 14:51:49', 249, 'process', 1, '2023-10-05 14:51:49', NULL, NULL, NULL, '2023-09-05 14:51:49', '2023-09-05 12:51:49'),
(255, 13, '87', '2023-09-05 14:52:53', 249, 'process', 1, '2023-10-05 14:52:53', NULL, NULL, NULL, '2023-09-05 14:52:53', '2023-09-05 12:52:53'),
(256, 89, '44', '2023-09-06 07:33:03', 39, 'process', 1, '2023-10-06 07:33:03', NULL, NULL, NULL, '2023-09-06 07:33:03', '2023-09-06 05:33:03'),
(257, 13, '46', '2023-09-23 08:54:53', 249, 'process', 1, '2023-10-23 08:54:53', NULL, NULL, NULL, '2023-09-23 08:54:53', '2023-09-23 06:54:53'),
(258, 13, '46', '2023-09-23 09:01:22', 249, 'process', 1, '2023-10-23 09:01:22', NULL, NULL, NULL, '2023-09-23 09:01:22', '2023-09-23 07:01:22'),
(259, 13, '46', '2023-09-23 16:01:13', 249, 'process', 1, '2023-10-23 16:01:13', NULL, NULL, NULL, '2023-09-23 16:01:13', '2023-09-23 14:01:13'),
(260, 89, '88', '2023-09-24 17:16:04', 39, 'process', 1, '2023-10-24 17:16:04', NULL, NULL, NULL, '2023-09-24 17:16:04', '2023-09-24 15:16:09'),
(261, 89, '88', '2023-09-24 17:16:09', 39, 'process', 1, '2023-10-24 17:16:09', NULL, NULL, NULL, '2023-09-24 17:16:09', '2023-09-24 15:16:09'),
(262, 56, '88', '2023-09-24 17:32:29', 99, 'process', 1, '2023-10-24 17:32:29', NULL, NULL, NULL, '2023-09-24 17:32:29', '2023-09-24 15:32:29'),
(263, 88, '88', '2023-09-24 17:39:41', 78, 'process', 1, '2023-10-24 17:39:41', NULL, NULL, NULL, '2023-09-24 17:39:41', '2023-09-24 15:39:41'),
(264, 88, '88', '2023-09-24 17:40:48', 78, 'process', 1, '2023-10-24 17:40:48', NULL, NULL, NULL, '2023-09-24 17:40:48', '2023-09-24 15:40:48'),
(265, 56, '89', '2023-09-24 17:44:03', 99, 'process', 1, '2023-10-24 17:44:03', NULL, NULL, NULL, '2023-09-24 17:44:03', '2023-09-24 15:44:04'),
(266, 56, '89', '2023-09-24 17:44:15', 99, 'process', 1, '2023-10-24 17:44:15', NULL, NULL, NULL, '2023-09-24 17:44:15', '2023-09-24 15:44:15'),
(267, 13, '91', '2023-09-25 08:18:02', 249, 'process', 1, '2023-10-25 08:18:02', NULL, NULL, NULL, '2023-09-25 08:18:02', '2023-09-25 06:18:03'),
(268, 12, '42', '2023-09-25 08:25:25', 149, 'process', 1, '2023-10-25 08:25:25', NULL, NULL, NULL, '2023-09-25 08:25:25', '2023-09-25 06:25:25'),
(269, 82, '91', '2023-09-25 08:32:50', 22, 'process', 1, '2023-10-25 08:32:50', NULL, NULL, NULL, '2023-09-25 08:32:50', '2023-09-25 06:32:50'),
(270, 13, '46', '2023-09-25 09:01:37', 249, 'process', 1, '2023-10-25 09:01:37', NULL, NULL, NULL, '2023-09-25 09:01:37', '2023-09-25 07:01:37'),
(271, 13, '93', '2023-09-25 21:53:00', 249, 'process', 1, '2023-10-25 21:53:00', NULL, NULL, NULL, '2023-09-25 21:53:00', '2023-09-25 19:53:01'),
(272, 13, '93', '2023-09-25 21:53:01', 249, 'process', 1, '2023-10-25 21:53:01', NULL, NULL, NULL, '2023-09-25 21:53:01', '2023-09-25 19:53:01'),
(273, 13, '42', '2023-09-26 13:14:26', 249, 'process', 1, '2023-10-26 13:14:26', NULL, NULL, NULL, '2023-09-26 13:14:26', '2023-09-26 11:14:26'),
(274, 89, '94', '2023-09-27 09:41:12', 39, 'process', 1, '2023-10-27 09:41:12', NULL, NULL, NULL, '2023-09-27 09:41:12', '2023-09-27 07:41:13'),
(275, 56, '95', '2023-09-27 09:45:03', 99, 'process', 1, '2023-10-27 09:45:03', NULL, NULL, NULL, '2023-09-27 09:45:03', '2023-09-27 07:45:03'),
(276, 56, '96', '2023-09-27 10:05:21', 99, 'process', 1, '2023-10-27 10:05:21', NULL, NULL, NULL, '2023-09-27 10:05:21', '2023-09-27 08:05:21'),
(277, 88, '46', '2023-09-27 14:48:06', 78, 'process', 1, '2023-10-27 14:48:06', NULL, NULL, NULL, '2023-09-27 14:48:06', '2023-09-27 12:48:06'),
(278, 89, '46', '2023-09-27 14:50:41', 39, 'process', 1, '2023-10-27 14:50:41', NULL, NULL, NULL, '2023-09-27 14:50:41', '2023-09-27 12:50:41'),
(279, 102, '46', '2023-09-27 15:01:06', 150, 'process', 1, '2023-10-27 15:01:06', NULL, NULL, NULL, '2023-09-27 15:01:06', '2023-09-27 13:01:06'),
(280, 82, '46', '2023-09-27 15:15:05', 22, 'process', 1, '2023-10-27 15:15:05', NULL, NULL, NULL, '2023-09-27 15:15:05', '2023-09-27 13:15:05'),
(281, 102, '46', '2023-09-27 15:16:45', 150, 'process', 1, '2023-10-27 15:16:45', NULL, NULL, NULL, '2023-09-27 15:16:45', '2023-09-27 13:16:45'),
(282, 89, '46', '2023-09-27 15:23:18', 39, 'process', 1, '2023-10-27 15:23:18', NULL, NULL, NULL, '2023-09-27 15:23:18', '2023-09-27 13:23:18'),
(283, 89, '46', '2023-09-27 15:23:19', 39, 'process', 1, '2023-10-27 15:23:19', NULL, NULL, NULL, '2023-09-27 15:23:19', '2023-09-27 13:23:19'),
(284, 88, '46', '2023-09-27 15:39:37', 78, 'process', 1, '2023-10-27 15:39:37', NULL, NULL, NULL, '2023-09-27 15:39:37', '2023-09-27 13:39:37'),
(285, 0, '46', '2023-09-28 11:47:28', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 11:47:28', '2023-09-28 09:47:28'),
(286, 0, '46', '2023-09-28 11:49:48', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 11:49:48', '2023-09-28 09:49:48'),
(287, 0, '46', '2023-09-28 11:50:09', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 11:50:09', '2023-09-28 09:50:09'),
(288, 0, '46', '2023-09-28 11:51:59', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 11:51:59', '2023-09-28 09:51:59'),
(289, 0, '46', '2023-09-28 11:54:02', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 11:54:02', '2023-09-28 09:54:02'),
(290, 0, '46', '2023-09-28 12:08:12', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 12:08:12', '2023-09-28 10:08:12'),
(292, 0, '46', '2023-09-28 12:11:45', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 12:11:45', '2023-09-28 10:11:45'),
(293, 0, '46', '2023-09-28 12:12:26', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 12:12:26', '2023-09-28 10:12:26'),
(294, 0, '46', '2023-09-28 15:26:13', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-09-28 15:26:13', '2023-09-28 13:26:13'),
(295, 89, '94', '2023-10-02 07:19:56', 39, 'process', 1, '2023-11-02 07:19:56', NULL, NULL, NULL, '2023-10-02 07:19:56', '2023-10-02 05:19:56'),
(296, 102, '94', '2023-10-02 07:23:41', 150, 'process', 1, '2023-11-02 07:23:41', NULL, NULL, NULL, '2023-10-02 07:23:41', '2023-10-02 05:23:41'),
(297, 102, '95', '2023-10-02 07:35:25', 150, 'process', 1, '2023-11-02 07:35:25', NULL, NULL, NULL, '2023-10-02 07:35:25', '2023-10-02 05:35:25'),
(298, 0, '46', '2023-10-02 07:44:09', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-02 07:44:09', '2023-10-02 05:44:09'),
(299, 0, '46', '2023-10-02 08:13:15', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-02 08:13:15', '2023-10-02 06:13:15'),
(301, 0, '46', '2023-10-02 10:38:15', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-02 10:38:15', '2023-10-02 08:38:15'),
(302, 0, '651e48f46e84f_651e48f46e850', '2023-10-05 07:27:02', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-05 07:27:02', '2023-10-05 05:27:02'),
(303, 0, '46', '2023-10-05 08:04:13', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-05 08:04:13', '2023-10-05 06:04:13'),
(304, 0, '46', '2023-10-05 08:21:21', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-05 08:21:21', '2023-10-05 06:21:21'),
(305, 12, '46', '2023-10-05 08:23:23', 149, 'process', 1, '2023-11-05 08:23:23', NULL, NULL, NULL, '2023-10-05 08:23:23', '2023-10-05 06:23:23'),
(306, 12, '46', '2023-10-05 08:25:08', 149, 'process', 1, '2023-11-05 08:25:08', NULL, NULL, NULL, '2023-10-05 08:25:08', '2023-10-05 06:25:08'),
(307, 0, '46', '2023-10-05 08:26:02', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-05 08:26:02', '2023-10-05 06:26:02'),
(308, 0, '46', '2023-10-05 08:37:49', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-05 08:37:49', '2023-10-05 06:37:49'),
(309, 0, '46', '2023-10-05 08:39:29', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-05 08:39:29', '2023-10-05 06:39:29'),
(310, 13, '97', '2023-10-05 11:53:14', 249, 'process', 1, '2023-11-05 11:53:14', NULL, NULL, NULL, '2023-10-05 11:53:14', '2023-10-05 09:53:14'),
(311, 104, '46', '2023-10-06 09:16:33', 399, 'process', 1, '2023-11-06 09:16:33', NULL, NULL, NULL, '2023-10-06 09:16:33', '2023-10-06 07:16:33'),
(312, 56, '46', '2023-10-06 09:49:00', 99, 'process', 1, '2023-11-06 09:49:00', NULL, NULL, NULL, '2023-10-06 09:49:00', '2023-10-06 07:49:00'),
(313, 0, '46', '2023-10-06 11:49:11', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-06 11:49:11', '2023-10-06 09:49:11'),
(314, 0, '46', '2023-10-09 08:02:33', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-09 08:02:33', '2023-10-09 06:02:33'),
(315, 0, '46', '2023-10-09 10:56:31', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-09 10:56:31', '2023-10-09 08:56:31'),
(316, 0, '46', '2023-10-09 10:59:05', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-09 10:59:05', '2023-10-09 08:59:05'),
(317, 13, '46', '2023-10-09 11:06:46', 249, 'process', 1, '2023-11-09 11:06:46', NULL, NULL, NULL, '2023-10-09 11:06:46', '2023-10-09 09:06:46'),
(318, 13, '46', '2023-10-09 13:11:41', 249, 'process', 1, '2023-11-09 13:11:41', NULL, NULL, NULL, '2023-10-09 13:11:41', '2023-10-09 11:11:41'),
(319, 102, '46', '2023-10-12 15:44:51', 150, 'process', 1, '2023-11-12 15:44:51', NULL, NULL, NULL, '2023-10-12 15:44:51', '2023-10-12 13:44:51'),
(320, 0, '46', '2023-10-13 07:47:32', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-13 07:47:32', '2023-10-13 05:47:32'),
(321, 0, '46', '2023-10-13 12:10:36', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-10-13 12:10:36', '2023-10-13 10:10:36'),
(322, 102, '46', '2023-10-13 12:16:57', 150, 'process', 1, '2023-11-13 12:16:57', NULL, NULL, NULL, '2023-10-13 12:16:57', '2023-10-13 10:16:57'),
(323, 102, '46', '2023-10-13 15:35:10', 150, 'process', 1, '2023-11-13 15:35:10', NULL, NULL, NULL, '2023-10-13 15:35:10', '2023-10-13 13:35:10'),
(324, 0, '44', '2023-11-02 17:03:49', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-11-02 17:03:49', '2023-11-02 16:03:49'),
(325, 0, '44', '2023-11-02 17:04:47', 0, 'process', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, '2023-11-02 17:04:47', '2023-11-02 16:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_activity_log`
--

CREATE TABLE `order_activity_log` (
  `log_id` int(11) NOT NULL,
  `log_title` varchar(255) DEFAULT NULL,
  `ref_name` varchar(255) DEFAULT NULL,
  `ref_id` varchar(255) DEFAULT NULL,
  `ref_user` varchar(255) DEFAULT NULL,
  `log_desc` text DEFAULT NULL,
  `log_ip` varchar(255) DEFAULT NULL,
  `log_browser` varchar(255) DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_activity_log`
--

INSERT INTO `order_activity_log` (`log_id`, `log_title`, `ref_name`, `ref_id`, `ref_user`, `log_desc`, `log_ip`, `log_browser`, `log_time`) VALUES
(1, 'Invoice Status Updated', 'Invoice', 'USSC1', 'admin', 'Invoice status changed from Pending to Complete', '173.231.200.172', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 <br />name : Google Chrome <br />version : 100.0.4896.60 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|ot', '2022-04-04 08:16:58'),
(2, 'Invoice Status Updated', 'Invoice', 'USSC19', 'admin', 'Invoice status changed from Pending to Received', '173.231.200.172', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 <br />name : Google Chrome <br />version : 100.0.4896.60 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|ot', '2022-04-04 08:18:36'),
(3, 'Invoice Status Updated', 'Invoice', 'USSC19', 'admin', 'Invoice status changed from Received to Pending', '173.231.200.172', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 <br />name : Google Chrome <br />version : 100.0.4896.60 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|ot', '2022-04-04 08:19:20'),
(4, 'Invoice Status Updated', 'Invoice', 'USSC19', 'admin', 'Invoice status changed from Pending to Complete', '173.231.200.172', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 <br />name : Google Chrome <br />version : 100.0.4896.60 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|ot', '2022-04-04 08:19:37'),
(5, 'Invoice Status Updated', 'Invoice', 'USSC18', 'admin', 'Invoice status changed from Pending to Complete', '173.231.200.172', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 <br />name : Google Chrome <br />version : 100.0.4896.60 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|ot', '2022-04-04 08:20:06'),
(6, 'Invoice Status Updated', 'Invoice', 'PKSC13', 'admin', 'Invoice status changed from Pending to Complete', '173.231.200.172', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 <br />name : Google Chrome <br />version : 100.0.4896.60 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|ot', '2022-04-04 08:20:40'),
(7, 'Invoice Status Updated', 'Invoice', 'USSC37', 'admin', 'Invoice status changed from Pending to Complete', '173.231.200.172', 'userAgent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 <br />name : Google Chrome <br />version : 100.0.4896.60 <br />platform : windows <br />pattern : #(?<browser>Version|Chrome|ot', '2022-04-05 05:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_pk` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `has_pin` text NOT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_pk`, `order_id`, `full_name`, `mobile`, `address`, `city`, `email`, `pin`, `has_pin`, `date_timestamp`) VALUES
(212, 226, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'user@gmail.com', 6809, '90abd69ab5d924593ab046395707c0d0', '2023-09-02 13:03:18'),
(213, 227, 'Jawwad Rafique', '0311515411451', 'L-112 Sec 33/C Koran', 'Karachi', 'hammad@im.com.pk', 2262, 'a0b2dae3154a454039df2115377f84d4', '2023-09-04 06:57:45'),
(214, 228, 'dsadas', '32561560', 'DSADSA', 'Karachi', 'hammad@im.com.pk', 7282, '80a944c04c822c00188a800caa7b273d', '2023-09-04 07:05:33'),
(215, 229, 'basit', '15165165121', '213', 'karachi', 'hammad@im.com.pk', 6307, '18697713226c9b832ba5e1250e5bd6e6', '2023-09-04 08:21:40'),
(216, 230, 'basit', '15165165121', 'dgdf', 'karachi', 'hammad@im.com.pk', 5929, 'c9f14349e1dec231c6bb6141f65abdfa', '2023-09-04 08:53:07'),
(217, 231, 'basit', '15165165121', 'fg cgfcg', 'karachi', 'hammad@im.com.pk', 7947, 'de22abb19acb78cb70a4d751e0edd0d4', '2023-09-04 08:54:44'),
(218, 232, 'hammad9', '15165165121', 'sdfff', 'karachi', 'hammad@im.com.pk', 9491, 'f3bdcc9e1246b27fa303674ad6bbbdcd', '2023-09-04 08:55:45'),
(219, 233, 'Jawwad Rafique', '03118451181', 'L-112 Sec 33/C Korangi no 2 ', 'Karachi', 'hammad@im.com.pk', 3727, '1ce210bd51e3c488ae7648bfd41b930c', '2023-09-04 10:35:22'),
(220, 234, 'Jawwad Rafique', '0318451251', 'L-112 Sec 33/C Koran', 'Karachi', 'hammad@im.com.pk', 1378, 'df95c9673b22ce8e37b5b71f6d8bd39b', '2023-09-04 10:37:00'),
(221, 235, 'Jawwad Rafique', '03118457181', 'L-112 Sec 33/C Koran', 'Karachi', 'hammad@im.com.pk', 6761, 'a0cd4172a9f8e763248230e601c87b53', '2023-09-04 12:59:03'),
(222, 236, 'Jawwad Rafique', '212851750', 'L-112 Sec 33/C Koran', 'Karachi', 'hammad@im.com.pk', 6081, '2d3d646acb8c30fc22adbc0fe7e246f2', '2023-09-04 13:15:28'),
(223, 237, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'man411210@gmail.com', 7152, 'fb0d54e1bb5740e3c5cc1c72eb385959', '2023-09-05 07:12:34'),
(224, 238, 'jawad rafique', '45456', 'hno', 'fg', 'user@gmail.com', 4227, '43119a0d1649b5e45283ef76a82afd98', '2023-09-05 09:13:37'),
(225, 239, 'jawad rafique', '45456', 'hno', 'fg', 'user@gmail.com', 6694, '336e5889f4c89e7293786d6fd3ee764f', '2023-09-05 09:16:14'),
(226, 240, 'erwer', '45456', 'hno', 'fg', 'user@gmail.com', 4395, 'df1f61a6fe55885b367394f1de9f2424', '2023-09-05 09:17:06'),
(227, 241, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'hammad@im.com.pk', 4578, '62bd55e402ed8d0387b4a257fb4cdbe6', '2023-09-05 10:20:41'),
(228, 242, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'nelew35339@horsgit.com', 6463, 'f47784ae981f0ab0fc112f568a66c937', '2023-09-05 12:15:11'),
(229, 243, 'shakeeb', '45456', 'hno', 'fg', 'gaxiga8959@chambile.com', 7847, '3aa4927ab2a9a0f6c928451e70db5cf9', '2023-09-05 12:22:42'),
(230, 244, 'shakeeb', '45456', 'hno', 'fg', 'gaxiga8959@chambile.com', 2928, '44e672c66419655ec422c02c68c7c896', '2023-09-05 12:23:03'),
(231, 245, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'gaxiga8959@chambile.com', 8851, 'aaa49fcbaa234378875798a89fb7e9cc', '2023-09-05 12:28:44'),
(232, 246, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'gaxiga8959@chambile.com', 7953, '5f160ef8cbfb35bf60da2dc648c6358c', '2023-09-05 12:38:59'),
(233, 247, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'gaxiga8959@chambile.com', 2102, 'e321d07d6e6f1f5eb8d3399f2391bcfe', '2023-09-05 12:39:56'),
(234, 248, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'gaxiga8959@chambile.com', 3970, 'a77d5e1a0b462ca7df7acf2a0287a6c4', '2023-09-05 12:42:58'),
(235, 249, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'jiyit77092@nickolis.com', 2805, '51c36e58b55c5826faa1f0fc099a74b3', '2023-09-05 12:45:05'),
(236, 250, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'jiyit77092@nickolis.com', 5490, 'c43877fe828ed69f1847c485b0f2d912', '2023-09-05 12:45:45'),
(237, 251, 'hammad', '6161616', 'asd', 'karachi', 'khanhammad540@gmail.com', 3254, 'a2d2fb429786e75a18a0a7818a2ecf4d', '2023-09-05 12:46:12'),
(238, 252, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'yefod66225@picvw.com', 4909, '8ff64528a249fbaf10955070c841afad', '2023-09-05 12:46:38'),
(239, 253, 'hammad', '1516516516', 'sad a', 'karachi12', 'khanhammad540@gmail.com', 9262, 'd6ff3a2cf080a8a5aee843474798adbd', '2023-09-05 12:48:50'),
(240, 254, 'test', '15165165121', 'asd', 'karachi', 'berohij476@gameszox.com', 1438, '655cec9d49a80e5fa70c79c74076de54', '2023-09-05 12:51:49'),
(241, 255, 'basit', '15165165121', 'asdsa', 'karachi2', 'berohij476@gameszox.com', 2396, 'e7c4814e53fcc89d1f309f311bd192b5', '2023-09-05 12:52:53'),
(242, 256, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'user@gmail.com', 2680, 'bcaed1ff4880c5b8149b945f645c3592', '2023-09-06 05:33:03'),
(243, 257, 'TESTING', '15165165121', '123', 'karachi', 'hammad@im.com.pk', 9537, '2b8db35915a3f1616207077b2406a264', '2023-09-23 06:54:53'),
(244, 258, 'TESTING', '15165165121', '12321', 'karachi', 'hammad@im.com.pk', 4189, '04b6825a7c0185a032baefa65a4836d6', '2023-09-23 07:01:22'),
(245, 259, 'burhan', '03412010267', 'tariq road', 'karachi', 'hammad@im.com.pk', 5416, '8ef97aaa96fccb28e6f966add37c9db6', '2023-09-23 14:01:13'),
(246, 260, 'mo', '07514243424', '23 wood greem', 'London', 'subz_123@hotmail.com', 8376, '375173f7abf9ac9ddbfb2e916963da0d', '2023-09-24 15:16:09'),
(247, 261, 'mo', '07514243424', '23 wood greem', 'London', 'subz_123@hotmail.com', 2308, '0b25290ed1884c9736fa2e0838891457', '2023-09-24 15:16:09'),
(248, 262, 'SA', '07514911432', '', 'London', 'subz_123@hotmail.com', 2591, '956562646aedbb701094069d3ce4f10b', '2023-09-24 15:32:29'),
(249, 263, 'SA', '075144324325', '', 'London', 'subz_123@hotmail.com', 7643, '2e35ea9d9838d625645b96bce87283f3', '2023-09-24 15:39:41'),
(250, 264, 'SA', '075144324325', '', 'London', 'subz_123@hotmail.com', 6599, 'e94f1684761c9c01a5e0033e75c29e80', '2023-09-24 15:40:48'),
(251, 265, 'SA', '075217321421', '', 'London', 'subz_123@hotmail.com', 9220, '37e6276fbddafdc3c475edd96afe4340', '2023-09-24 15:44:04'),
(252, 266, 'SA', '075217321421', '', 'London', 'subz_123@hotmail.com', 7205, '1ef1289dc3587a742575482368b6ac0e', '2023-09-24 15:44:15'),
(253, 267, 'burhan', '45456', 'hno', 'fg', 'basitabbas2001@gmail.com', 6342, 'a789105bfd2f790dec659c9dc52f17ef', '2023-09-25 06:18:03'),
(254, 268, 'burhan', '45456', 'hno', 'fg', 'man411210@gmail.com', 9261, 'aef3bf5d2c1d91ac92d8f26424516433', '2023-09-25 06:25:25'),
(255, 269, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'basitabbas2001@gmail.com', 2725, '372f03f194ac4b1c9df338bdc4546352', '2023-09-25 06:32:50'),
(256, 270, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'hammad@im.com.pk', 7172, 'ec2b9806028ab5794c71742fe11ed690', '2023-09-25 07:01:37'),
(257, 271, 'shah mashuk', '07852620807', '124 Curzon Crescent', 'Barking', 'shahsharia@gmail.com', 2601, 'a804ce2cf20d902e9df2fac88c868f5e', '2023-09-25 19:53:01'),
(258, 272, 'shah mashuk', '07852620807', '124 Curzon Crescent', 'Barking', 'shahsharia@gmail.com', 7103, 'ff1bf6d940b929baecbfb0d96eededb1', '2023-09-25 19:53:01'),
(259, 273, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'man411210@gmail.com', 9530, '5f587e40d73d6149087d5e6607829f3f', '2023-09-26 11:14:26'),
(260, 274, '2023-09-23', '45456', '', '', 'birthday', 5702, '96dce5d13b65fecc2d1d8c617cfc5cda', '2023-09-27 07:41:13'),
(261, 275, 'Birthday', 'jawwad', '', '', 'burhan', 2198, '7175f1ab3a0815f4b6d00fa6dedaa11c', '2023-09-27 07:45:03'),
(262, 276, 'Birthday', '45456', '', '', 'mahad', 8819, '82c9f3c25016df6c0825ec004ed32c8d', '2023-09-27 08:05:21'),
(263, 277, '2023-09-14', '03406095589', '', '', 'hammad@im.com.pk', 4666, '6edf2f5420e50bf8d311c327f3d7433c', '2023-09-27 12:48:06'),
(264, 278, '2023-09-09', '45456', '', '', 'hammad@im.com.pk', 1804, 'd8a487bc019755404b366d643a4b43ec', '2023-09-27 12:50:41'),
(265, 279, '2023-09-11', '45456', '', '', 'hammad@im.com.pk', 1949, 'f44f6a1cbe82b109ba395ae6200b35ac', '2023-09-27 13:01:06'),
(266, 280, '2023-08-31', '45456', '', '', 'hammad@im.com.pk', 1944, '2148f15b125880e02ad8620a6968870d', '2023-09-27 13:15:05'),
(267, 281, '2023-09-07', '45456', '', '', 'hammad@im.com.pk', 6368, '0568a8c40ec18e906ce0853993279a1e', '2023-09-27 13:16:45'),
(268, 282, '2023-09-26', '03406095589', '', '', 'hammad@im.com.pk', 3138, 'd4b325c82b9850299c061c727f6eee96', '2023-09-27 13:23:18'),
(269, 283, '2023-09-26', '03406095589', '', '', 'hammad@im.com.pk', 2122, '268ab3292d2e606a348316650e5eb825', '2023-09-27 13:23:19'),
(270, 284, '2023-08-27', '03406095589', '', '', 'hammad@im.com.pk', 5045, 'c133684570fb2a0fb007ef520b92a73f', '2023-09-27 13:39:37'),
(271, 285, 'Birthday', 'birthday', '', '', 'hammad@im.com.pk', 7628, 'de908d859fb516742dbdd0d237f10fb1', '2023-09-28 09:47:28'),
(272, 286, 'Birthday', 'werwer', '', '', 'hammad@im.com.pk', 6399, '353ce703630ef99f2cc1114e0fe8f416', '2023-09-28 09:49:48'),
(273, 287, 'Birthday', 'werwer', '', '', 'hammad@im.com.pk', 3145, '5b91c38b16028fadeddebfec8eea2260', '2023-09-28 09:50:09'),
(274, 288, 'Birthday', 'werwer', '', '', 'hammad@im.com.pk', 2221, '862a57f0aa40f8762475d1aacc5f6947', '2023-09-28 09:51:59'),
(275, 289, 'Birthday', '45456', '', '', 'hammad@im.com.pk', 2345, '35e74b79ee760a3a35a6edd4dbcaa741', '2023-09-28 09:54:02'),
(276, 290, 'Birthday', '45456', '', '', 'hammad@im.com.pk', 2130, 'c7a0dcd0d0789ee955307e72ed1cf354', '2023-09-28 10:08:12'),
(278, 292, 'Birthday', '03406095589', '', '', 'hammad@im.com.pk', 2180, '7634740e032993251cc9001e139ffb40', '2023-09-28 10:11:45'),
(279, 293, 'Birthday', '03406095589', '', '', 'hammad@im.com.pk', 5847, '3b70b7aea8bd658a8ddeb8af7ce117b5', '2023-09-28 10:12:26'),
(280, 294, 'Birthday', '45456', '', '', 'hammad@im.com.pk', 1648, '034672e91cb870e9b0df5af9dedfe5a1', '2023-09-28 13:26:13'),
(281, 295, '2023-10-06', 'werwer', '', '', 'birthday', 5916, '1c44802f2b42df7663363a7a6b8cb037', '2023-10-02 05:19:56'),
(282, 296, '2023-10-06', 'werwer', '', '', 'birthday', 1947, 'a94b0fa02e3188d1dbcc4ed08764050a', '2023-10-02 05:23:41'),
(283, 297, '2023-10-07', 'werwer', '', '', 'burhan', 8951, '686ec448dc9ab4b1676ad3851a98ffab', '2023-10-02 05:35:25'),
(284, 298, 'Holiday', 'werwer', '', '', 'hammad@im.com.pk', 2930, '29e7a36db31b3397620531b3a160c022', '2023-10-02 05:44:09'),
(285, 299, 'Birthday', 'werwer', '', '', 'hammad@im.com.pk', 9868, 'e1bcdfebaab227287fccf9c46a76aa9a', '2023-10-02 06:13:15'),
(287, 301, 'burhan', '03412012070', 'hno', 'fg', 'hammad@im.com.pk', 2712, 'be65926e2bdb49cde76f4ca70d0e9d14', '2023-10-02 08:38:15'),
(288, 302, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'man411210@gmail.com', 2671, 'dc6a3bf659f0f3ff668c0702b76cea40', '2023-10-05 05:27:02'),
(289, 303, 'Holiday', '03406095589', '', '', 'hammad@im.com.pk', 4089, 'b0ba28ac810db9b4efafd40e99accd03', '2023-10-05 06:04:13'),
(290, 304, 'Muhammad Aliz', '03412012070', 'hno', 'karachi', 'hammad@im.com.pk', 8919, '12f04d563b4b82decc06e4a173e4c5cf', '2023-10-05 06:21:21'),
(291, 305, 'Muhammad Aliz', '03412012070', 'pechs', 'karachi', 'hammad@im.com.pk', 1122, 'd7d5222ead158ea76559f972910fe733', '2023-10-05 06:23:23'),
(292, 306, 'Muhammad Aliz', '03412012070', 'q', 'q', 'hammad@im.com.pk', 4817, '9877db342c0205c23afda27cc8cab985', '2023-10-05 06:25:08'),
(293, 307, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'hammad@im.com.pk', 4262, '79f237b19bc8497eae1544f42c418b47', '2023-10-05 06:26:02'),
(294, 308, 'erwer', '45456', 'hno', 'fg', 'hammad@im.com.pk', 2720, 'ea8c610fc8194e75f1808cd108cf79db', '2023-10-05 06:37:49'),
(295, 309, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'hammad@im.com.pk', 7656, 'bb39a0b93b7eb1956304bbc3c333b345', '2023-10-05 06:39:29'),
(296, 310, 'burhan', '03412012070', 'johar', 'karachi', 'smartdentalcompliance@outlook.com', 1606, '6c442a0c43f2fdea4833a0768c453b66', '2023-10-05 09:53:14'),
(297, 311, 'babar', '03412012070', 'jinnah', 'hydrabad', 'hammad@im.com.pk', 7376, 'a1718d105ac5c566eeca9ca427859200', '2023-10-06 07:16:33'),
(298, 312, 'rizwan', '3412012070', 'hno', 'fg', 'hammad@im.com.pk', 9615, 'f464d08d9cc1fc3f619f42d98db55175', '2023-10-06 07:49:00'),
(299, 313, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'hammad@im.com.pk', 7824, '9461ab1653cc91d4e5bccaed70fad39d', '2023-10-06 09:49:11'),
(300, 314, 'Muhammad Shakeeb Raza', '45456', 'hno', 'fg', 'hammad@im.com.pk', 3018, 'f12727325b5e29b8de93dc4894170aa0', '2023-10-09 06:02:33'),
(301, 315, 'new test', '15165165121', 'abc', 'karachi', 'hammad@im.com.pk', 1061, '8ecf4b4d340175c5b95fad1c3a945af1', '2023-10-09 08:56:31'),
(302, 316, 'hammad50', '15165165121', '456', 'karachi', 'hammad@im.com.pk', 4774, '9cde9f9800ecf1711aac0528076dc7e3', '2023-10-09 08:59:05'),
(303, 317, 'TESTING new', '03165132156', 'testing', 'karachi129', 'hammad@im.com.pk', 6437, '7cdf5e098cfaa51644f8a9feff2529ba', '2023-10-09 09:06:46'),
(304, 318, 'TESTING12314', '15165165121', 'address', 'karachi', 'hammad@im.com.pk', 7092, '43107d7a5fdb879cbdb7a7e41fbc962f', '2023-10-09 11:11:41'),
(305, 319, 'burhan', '03412012070', 'malir', 'karachi', 'hammad@im.com.pk', 6487, '742d03d4b29961918b4afd62041436dd', '2023-10-12 13:44:51'),
(306, 320, 'hammad91', '15165165121', 'jk', 'karachi', 'hammad@im.com.pk', 1759, '1e5ac13d614d90913ccf1fad6b9c1809', '2023-10-13 05:47:32'),
(307, 321, 'TESTING55', '15165165121', 'ds fsd sd fsdf sd', 'karachi', 'hammad@im.com.pk', 6040, '7a09f7d31d8a2378be52433c20a9749a', '2023-10-13 10:10:36'),
(308, 322, 'TESTING55', '15165165121', 'a dasd as', 'karachi', 'hammad@im.com.pk', 7786, 'fa9be1c971df954c49200808729271d0', '2023-10-13 10:16:57'),
(309, 323, 'hammad1234', '15165165121', 'asdsa', 'karachi', 'hammad@im.com.pk', 7794, '72f950c09a3d66803d20f61c66e19acb', '2023-10-13 13:35:10'),
(310, 324, 'shakeeb', '0000', 'sss', 'karachi', 'user@gmail.com', 5474, '0a02bece4ce5b43a740684a21bfa4b71', '2023-11-02 16:03:49'),
(311, 325, 'shakeeb', '0000', 'asdasd', 'asdasd', 'user@gmail.com', 1161, '9f8b88e50163861fb61538d1ee13c650', '2023-11-02 16:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_extra_amount`
--

CREATE TABLE `order_extra_amount` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` varchar(100) NOT NULL,
  `paymentType` int(11) NOT NULL,
  `payment_info` text NOT NULL,
  `inTransaction` varchar(255) NOT NULL,
  `extra_amount` double NOT NULL,
  `price_code` varchar(50) NOT NULL,
  `invoice_status` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `shippingCountry` varchar(100) NOT NULL,
  `apiReturn` text NOT NULL,
  `rsvNo` varchar(250) NOT NULL,
  `rsvNo_done` varchar(250) DEFAULT NULL,
  `description` text NOT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_invoice`
--

CREATE TABLE `order_invoice` (
  `order_invoice_pk` int(11) NOT NULL,
  `invoice_id` varchar(250) DEFAULT NULL,
  `orderUser` varchar(200) DEFAULT NULL,
  `orderTempUser` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(100) DEFAULT NULL,
  `paymentType` int(11) DEFAULT NULL,
  `payment_info` text DEFAULT NULL,
  `inTransaction` varchar(200) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `ship_price` varchar(255) DEFAULT NULL,
  `three_for_two_cat` int(11) NOT NULL DEFAULT 0,
  `staple_pro_cat` int(11) NOT NULL DEFAULT 0,
  `bundle_type` text DEFAULT NULL,
  `total_weight` varchar(50) DEFAULT NULL,
  `price_code` varchar(50) DEFAULT NULL,
  `invoice_status` varchar(250) NOT NULL,
  `orderStatus` varchar(200) DEFAULT NULL,
  `shippingCountry` varchar(100) DEFAULT NULL,
  `apiReturn` text DEFAULT NULL,
  `rsvNo` varchar(250) DEFAULT NULL,
  `rsvNo_done` varchar(250) DEFAULT NULL,
  `trackNo` varchar(250) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `flagged` tinyint(1) NOT NULL DEFAULT 0,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_invoice_info`
--

CREATE TABLE `order_invoice_info` (
  `info_pk` int(11) NOT NULL,
  `order_invoice_id` int(11) NOT NULL,
  `sender_Id` int(11) NOT NULL DEFAULT 0,
  `sender_name` varchar(255) NOT NULL,
  `sender_phone` varchar(255) DEFAULT NULL,
  `sender_email` varchar(255) DEFAULT NULL,
  `sender_address` text NOT NULL,
  `sender_city` varchar(255) NOT NULL,
  `sender_country` varchar(255) DEFAULT NULL,
  `sender_post` varchar(100) DEFAULT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_phone` varchar(255) DEFAULT NULL,
  `receiver_email` varchar(255) DEFAULT NULL,
  `receiver_address` text NOT NULL,
  `receiver_city` varchar(255) NOT NULL,
  `receiver_country` varchar(255) DEFAULT NULL,
  `receiver_post` varchar(100) DEFAULT NULL,
  `receiver_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_invoice_product`
--

CREATE TABLE `order_invoice_product` (
  `invoice_product_pk` int(11) NOT NULL,
  `order_invoice_id` int(11) NOT NULL,
  `order_pIds` varchar(250) NOT NULL COMMENT 'pId,ScaleId,ColorId,StoreId,customId',
  `order_pName` varchar(250) NOT NULL,
  `order_pStore` varchar(100) DEFAULT NULL,
  `order_pPrice` varchar(50) NOT NULL,
  `order_salePrice` varchar(50) DEFAULT NULL,
  `order_discount` varchar(50) DEFAULT NULL,
  `order_pQty` int(11) NOT NULL,
  `order_pWeight` varchar(50) DEFAULT NULL,
  `order_process` int(11) NOT NULL DEFAULT 0 COMMENT '''process'' => 1, ''refund'' => 2, ''defect'' => 3, ''change_product'' => 4, ''change_size'' => 5',
  `order_return` int(11) NOT NULL DEFAULT 0,
  `deal` int(11) NOT NULL DEFAULT 0,
  `checkout` int(11) NOT NULL DEFAULT 0,
  `info` text DEFAULT NULL,
  `order_hash` varchar(500) NOT NULL,
  `removeIntra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_invoice_record`
--

CREATE TABLE `order_invoice_record` (
  `rec_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  `setting_name` varchar(250) DEFAULT NULL,
  `setting_val` varchar(250) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `rec_dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product_info`
--

CREATE TABLE `order_product_info` (
  `id` int(11) NOT NULL,
  `order_invoice_id` int(11) NOT NULL,
  `invoice_product_pk` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `custom` int(11) NOT NULL,
  `hash` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `calculated` tinyint(4) NOT NULL COMMENT 'If we have calculated statistics for this row, then set to 1, we use this to ensure we run statistics once for each order product. '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_product_info`
--

INSERT INTO `order_product_info` (`id`, `order_invoice_id`, `invoice_product_pk`, `pid`, `size`, `color`, `store`, `custom`, `hash`, `order_date`, `calculated`) VALUES
(1, 10, 10, 14, 0, 0, 7, 0, 'a0eeb5ef5911a9d4d4002aed4318e38b', '2022-03-10 11:39:35', 1),
(2, 11, 11, 14, 0, 0, 7, 0, 'a0eeb5ef5911a9d4d4002aed4318e38b', '2022-03-10 11:39:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_pk` int(11) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `sub_heading` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `dsc` mediumtext NOT NULL,
  `redirect` varchar(250) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `comment` int(11) NOT NULL DEFAULT 0,
  `page_banner` varchar(255) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_pk`, `slug`, `heading`, `sub_heading`, `short_desc`, `dsc`, `redirect`, `publish`, `comment`, `page_banner`, `dateTime`) VALUES
(19, 'about', 'a:1:{s:7:\"English\";s:8:\"About Us\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6MTM2NjoiPGRpdiBjbGFzcz0iYWJvdXRVcyI+DQo8aDEgc3R5bGU9InRleHQtYWxpZ246IGNlbnRlcjsiPjxpbWcgYWx0PSIiIHNyYz0ic3ciIC8+QUJPVVQgVVM8L2gxPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+V2UgYXJlIGEgdHJpbyBvZiBmb3VuZGVycyBvbiBhIG1pc3Npb24gdG8gdHJhbnNmb3JtIHRoZSBldmVudCBwaG90b2dyYXBoeSBpbmR1c3RyeS48YnIgLz4NCldpdGggdGhlIGNvbnRpbnVvdXMgaW1wcm92ZW1lbnQgb2YgcGhvbmUgY2FtZXJhIGNhcGFiaWxpdGllcyBhbmQgdGhlIHJhcGlkIGFkdmFuY2VtZW50PGJyIC8+DQpvZiBwaG90b2dyYXBoeSB0ZWNobm9sb2d5LCB3ZSBhc3BpcmUgdG8gZW1wb3dlciBldmVyeW9uZSB0byBjYXB0dXJlIHBob3RvcyBhbmQ8YnIgLz4NCnZpZGVvcywgY3JlYXRpbmcgZW5kdXJpbmcgbWVtb3JpZXMuPC9wPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+U2F5IGdvb2RieWUgdG8gZXhvcmJpdGFudCBwaG90b2dyYXBoeSBleHBlbnNlcyBhbmQgdGhlIGxvbmcgd2FpdCBmb3IgbW9udGhzIHRvIGdldDxiciAvPg0KeW91ciBlZGl0aW5nIGRvbmUuIEluc3RlYWQgc2l0IGJhY2sgYW5kIGFsbG93IHlvdXIgZXZlbnQgYXR0ZW5kZWVzIHRvIGJlY29tZSB0aGU8YnIgLz4NCnBob3RvZ3JhcGhlcnMsIHdoaWxlIG91ciBwcm9mZXNzaW9uYWwgZWRpdG9ycyBoYW5kbGUgdGhlIHJlc3QuPGJyIC8+DQo8aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vcGhwOC5pbWRlbW8ueHl6L3BpY2ttZS91cGxvYWRzL2ltYWdlcy9hYm91dF91cy5wbmciIHN0eWxlPSJ3aWR0aDogNDY0cHg7IGhlaWdodDogMjE2cHg7IiAvPjwvcD4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246IGNlbnRlcjsiPk91ciB0ZWFtIFBpY2ttZWUgaXMgYSBzbWFsbCB0ZWFtIHdpdGggaHVnZSBhbWJpdGlvbnMuIFdlJnJzcXVvO3JlIG1hZGUgdXAgb2YgUHJvZmVzc2lvbmFsIEVkaXRvcnMvPGJyIC8+DQpQaG90b2dyYXBoZXJzLCBhbmQgd29ybGQgY2xhc3MgY3VzdG9tZXIgc2VydmljZSBhZ2VudHMgd2hvJnJzcXVvO3ZlIHdvcmtlZCBhdCBVYmVyLCBEZWxsIGFuZDxiciAvPg0KVEFUQS4gV2UmcnNxdW87cmUgZHJpdmVuIHRvIG1ha2UgdGhlIHBob3RvZ3JhcGh5IGluZHVzdHJ5IGJldHRlciBmb3IgZXZlcnlib2R5LCBvbmUgcGljdHVyZSBhdCBhPGJyIC8+DQp0aW1lLiBZb3VyIGZlZWRiYWNrIGlzIGltcG9ydGFudCB0byB1cywgZG9uJnJzcXVvO3QgaGVzaXRhdGUgdG8gZ2V0IGluIHRvdWNoIGlmIHlvdSBoYXZlIHF1ZXN0aW9ucyw8YnIgLz4NCmNvbW1lbnRzIG9yIGlkZWFzIG9uIGhvdyB3ZSBjYW4gbWFrZSBvdXIgc2VydmljZSBldmVuIGJldHRlci48L3A+DQo8L2Rpdj4NCiI7fQ==', '', 1, 1, '', '2023-10-09 06:59:51'),
(20, 'services', 'a:1:{s:7:\"English\";s:8:\"Services\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6MTI6Int7c2VydmljZXN9fSI7fQ==', '', 1, 1, '', '2023-08-11 06:56:35'),
(21, 'packages', 'a:1:{s:7:\"English\";s:8:\"Packages\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6MTI6Int7cGFja2FnZXN9fSI7fQ==', '', 1, 1, '', '2023-08-11 08:26:02'),
(22, 'faq', 'a:1:{s:7:\"English\";s:3:\"FAQ\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6Nzoie3tmYXF9fSI7fQ==', '', 1, 1, '', '2023-08-11 10:14:40'),
(23, 'terms-condition', 'a:1:{s:7:\"English\";s:15:\"Terms Condition\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6MTE5NToiPCEtLSBTZWN0aW9uIDMgLS0+DQo8ZGl2IGNsYXNzPSJtYWluX3NlY3Rpb24gc2VjdGlvbjMgaW5uZXJfbWFpbl9wYWdlIiBzdHlsZT0icGFkZGluZzogNnJlbSAwIj4NCjxkaXYgY2xhc3M9InNlY3Rpb25faGVhZGluZyI+DQo8aDE+VGVybXMgJmFtcDsgQ29uZGl0aW9uczwvaDE+DQoNCjxwPlRlcm1zICZhbXA7IENvbmRpdGlvbnM6IFJldmlldyBhbmQgYWdyZWUgdG8gb3VyIGd1aWRlbGluZXMgZm9yIGEgc2FmZSBhbmQgZW5qb3lhYmxlIGV4cGVyaWVuY2Ugb24gb3VyIHBsYXRmb3JtLjxiciAvPg0KWW91ciBjb29wZXJhdGlvbiBpcyBhcHByZWNpYXRlZC48L3A+DQo8L2Rpdj4NCg0KPGRpdiBjbGFzcz0ic3RhbmRhcmQiPg0KPGRpdiBjbGFzcz0ic2VjM19pbm5lciBmbGV4XyIgc3R5bGU9Imp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbiI+DQo8ZGl2IGNsYXNzPSJsZWZ0RmxleCB3b3cgYm91bmNlSW4iIHN0eWxlPSJ3aWR0aDogNDAlIj48aW1nIGFsdD0iSW1hZ2UgRWRpdCIgc3JjPSJ3ZWJJbWFnZXMvYWJvdXR1cy53ZWJwIiAvPjwvZGl2Pg0KDQo8ZGl2IGNsYXNzPSJyaWdodEZsZXggd293IHNsaWRlSW5SaWdodCI+DQo8ZGl2IGNsYXNzPSJzZWN0aW9uX3N1YmhlYWRpbmciPg0KPGgxPlVuZm9yZ2V0dGFibGUgZXZlbnQgZ2FsbGVyeSBtZW1vcmllcy48L2gxPg0KPC9kaXY+DQoNCjxkaXYgY2xhc3M9InR4dEhvbGRlciI+DQo8cD5Db2xsZWN0IHByZWNpb3VzIG1vbWVudHMgZnJvbSB5b3VyIGd1ZXN0cyBpbiBhIGRpZ2l0YWwgZXZlbnQgZ2FsbGVyeS48L3A+DQoNCjxwPldoZXRoZXIgaXQmIzM5O3MgcGhvdG9zLCB2aWRlb3MsIG9yIGd1ZXN0Ym9vayBtZXNzYWdlcywgY2FwdHVyZSBpdCBhbGwuPC9wPg0KDQo8cD5Eb3dubG9hZCBhIHppcCBmaWxlIHdpdGggYWxsIHRoZSBjb250ZW50IGluIG9yaWdpbmFsIHJlc29sdXRpb24gdG8gY2hlcmlzaCBmb3JldmVyLjwvcD4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KDQo8ZGl2IGNsYXNzPSJiZ19zaGFwZSI+PGltZyBhbHQ9IiIgY2xhc3M9InN0eWxlLXNoYXBlIGZicy0xIiBzcmM9IndlYkltYWdlcy9iZy1zaGFwZS0xLnBuZyIgLz4gPGltZyBhbHQ9IiIgY2xhc3M9InN0eWxlLXNoYXBlIGZicy0yIiBzcmM9IndlYkltYWdlcy9iZy1zaGFwZS0yLnBuZyIgLz48L2Rpdj4NCjwvZGl2Pg0KPCEtLSBTZWN0aW9uIDMgRW5kcy0tPiI7fQ==', '', 1, 1, '', '2023-08-11 12:20:36'),
(24, 'privacy', 'a:1:{s:7:\"English\";s:7:\"privacy\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6MTEzODoiPCEtLSBTZWN0aW9uIDMgLS0+DQo8ZGl2IGNsYXNzPSJtYWluX3NlY3Rpb24gc2VjdGlvbjMgaW5uZXJfbWFpbl9wYWdlIiBzdHlsZT0icGFkZGluZzogNnJlbSAwIj4NCjxkaXYgY2xhc3M9InNlY3Rpb25faGVhZGluZyI+DQo8aDE+UHJpdmFjeSBQb2xpY3k8L2gxPg0KDQo8cD5Zb3VyIGRhdGEsIHlvdXIgdHJ1c3QuIERpc2NvdmVyIGhvdyB3ZSBwcm90ZWN0IGFuZCByZXNwZWN0PGJyIC8+DQp5b3VyIHByaXZhY3kgZm9yIGEgc2VjdXJlIGV4cGVyaWVuY2U8L3A+DQo8L2Rpdj4NCg0KPGRpdiBjbGFzcz0ic3RhbmRhcmQiPg0KPGRpdiBjbGFzcz0ic2VjM19pbm5lciBmbGV4XyIgc3R5bGU9Imp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbiI+DQo8ZGl2IGNsYXNzPSJsZWZ0RmxleCB3b3cgYm91bmNlSW4iIHN0eWxlPSJ3aWR0aDogNDAlIj48aW1nIGFsdD0iSW1hZ2UgRWRpdCIgc3JjPSJ3ZWJJbWFnZXMvYWJvdXR1cy53ZWJwIiAvPjwvZGl2Pg0KDQo8ZGl2IGNsYXNzPSJyaWdodEZsZXggd293IHNsaWRlSW5SaWdodCI+DQo8ZGl2IGNsYXNzPSJzZWN0aW9uX3N1YmhlYWRpbmciPg0KPGgxPlVuZm9yZ2V0dGFibGUgZXZlbnQgZ2FsbGVyeSBtZW1vcmllcy48L2gxPg0KPC9kaXY+DQoNCjxkaXYgY2xhc3M9InR4dEhvbGRlciI+DQo8cD5Db2xsZWN0IHByZWNpb3VzIG1vbWVudHMgZnJvbSB5b3VyIGd1ZXN0cyBpbiBhIGRpZ2l0YWwgZXZlbnQgZ2FsbGVyeS48L3A+DQoNCjxwPldoZXRoZXIgaXQmIzM5O3MgcGhvdG9zLCB2aWRlb3MsIG9yIGd1ZXN0Ym9vayBtZXNzYWdlcywgY2FwdHVyZSBpdCBhbGwuPC9wPg0KDQo8cD5Eb3dubG9hZCBhIHppcCBmaWxlIHdpdGggYWxsIHRoZSBjb250ZW50IGluIG9yaWdpbmFsIHJlc29sdXRpb24gdG8gY2hlcmlzaCBmb3JldmVyLjwvcD4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KDQo8ZGl2IGNsYXNzPSJiZ19zaGFwZSI+PGltZyBhbHQ9IiIgY2xhc3M9InN0eWxlLXNoYXBlIGZicy0xIiBzcmM9IndlYkltYWdlcy9iZy1zaGFwZS0xLnBuZyIgLz4gPGltZyBhbHQ9IiIgY2xhc3M9InN0eWxlLXNoYXBlIGZicy0yIiBzcmM9IndlYkltYWdlcy9iZy1zaGFwZS0yLnBuZyIgLz48L2Rpdj4NCjwvZGl2Pg0KPCEtLSBTZWN0aW9uIDMgRW5kcy0tPiI7fQ==', '', 1, 0, '', '2023-08-11 12:23:57'),
(25, 'complaints', 'a:1:{s:7:\"English\";s:10:\"complaints\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6MTEzOToiPCEtLSBTZWN0aW9uIDMgLS0+DQo8ZGl2IGNsYXNzPSJtYWluX3NlY3Rpb24gc2VjdGlvbjMgaW5uZXJfbWFpbl9wYWdlIiBzdHlsZT0icGFkZGluZzogNnJlbSAwIj4NCjxkaXYgY2xhc3M9InNlY3Rpb25faGVhZGluZyI+DQo8aDE+Q29tcGxhaW50cyBQb2xpY3k8L2gxPg0KDQo8cD5Db21wbGFpbnRzIFBvbGljeTogWW91ciBmZWVkYmFjayBtYXR0ZXJzLiBXZSYjMzk7bGwgYWRkcmVzczxiciAvPg0KeW91ciBjb25jZXJucyBwcm9tcHRseSBhbmQgZmFpcmx5PC9wPg0KPC9kaXY+DQoNCjxkaXYgY2xhc3M9InN0YW5kYXJkIj4NCjxkaXYgY2xhc3M9InNlYzNfaW5uZXIgZmxleF8iIHN0eWxlPSJqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWJldHdlZW4iPg0KPGRpdiBjbGFzcz0ibGVmdEZsZXggd293IGJvdW5jZUluIiBzdHlsZT0id2lkdGg6IDQwJSI+PGltZyBhbHQ9IkltYWdlIEVkaXQiIHNyYz0id2ViSW1hZ2VzL2Fib3V0dXMud2VicCIgLz48L2Rpdj4NCg0KPGRpdiBjbGFzcz0icmlnaHRGbGV4IHdvdyBzbGlkZUluUmlnaHQiPg0KPGRpdiBjbGFzcz0ic2VjdGlvbl9zdWJoZWFkaW5nIj4NCjxoMT5VbmZvcmdldHRhYmxlIGV2ZW50IGdhbGxlcnkgbWVtb3JpZXMuPC9oMT4NCjwvZGl2Pg0KDQo8ZGl2IGNsYXNzPSJ0eHRIb2xkZXIiPg0KPHA+Q29sbGVjdCBwcmVjaW91cyBtb21lbnRzIGZyb20geW91ciBndWVzdHMgaW4gYSBkaWdpdGFsIGV2ZW50IGdhbGxlcnkuPC9wPg0KDQo8cD5XaGV0aGVyIGl0JiMzOTtzIHBob3RvcywgdmlkZW9zLCBvciBndWVzdGJvb2sgbWVzc2FnZXMsIGNhcHR1cmUgaXQgYWxsLjwvcD4NCg0KPHA+RG93bmxvYWQgYSB6aXAgZmlsZSB3aXRoIGFsbCB0aGUgY29udGVudCBpbiBvcmlnaW5hbCByZXNvbHV0aW9uIHRvIGNoZXJpc2ggZm9yZXZlci48L3A+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCg0KPGRpdiBjbGFzcz0iYmdfc2hhcGUiPjxpbWcgYWx0PSIiIGNsYXNzPSJzdHlsZS1zaGFwZSBmYnMtMSIgc3JjPSJ3ZWJJbWFnZXMvYmctc2hhcGUtMS5wbmciIC8+IDxpbWcgYWx0PSIiIGNsYXNzPSJzdHlsZS1zaGFwZSBmYnMtMiIgc3JjPSJ3ZWJJbWFnZXMvYmctc2hhcGUtMi5wbmciIC8+PC9kaXY+DQo8L2Rpdj4NCjwhLS0gU2VjdGlvbiAzIEVuZHMtLT4iO30=', '', 1, 0, '', '2023-08-11 12:25:33'),
(28, 'how-it-works', 'a:1:{s:7:\"English\";s:12:\"How It Works\";}', '', 'a:1:{s:7:\"English\";s:0:\"\";}', 'YToxOntzOjc6IkVuZ2xpc2giO3M6MjMzNzoiPGRpdiBjbGFzcz0iY29udGFpbmVyIGhvd0l0c1dvcmsiPg0KPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOiBjZW50ZXI7Ij5Ib3cgaXQgd29ya3M8L2gxPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+Q3JlYXRpbmcgeW91ciBkaWdpdGFsIGd1ZXN0Ym9vayBpcyBhIGJyZWV6ZSAmbmRhc2g7IGp1c3QgZXN0YWJsaXNoIHlvdXIgd2VsY29tZSBwYWdlLCBzaGFyZSB0aGUgVVJMIHdpdGggeW91ciBndWVzdHMsPGJyIC8+DQpvciBwcmludCB0aGUgUVIgY29kZS4gSXQmIzM5O3MgcXVpY2sgYW5kIGVmZm9ydGxlc3MhPC9wPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+WW91ciBndWVzdHMgd2lsbCB0aG9yb3VnaGx5IGVuam95IGNvbnRyaWJ1dGluZyB0aGVpciBwaG90b3MgYW5kIHZpZGVvcyB0byB5b3VyIGV2ZW50IGdhbGxlcnkuIFRoZSBiZXN0IHBhcnQgaXMsIHlvdSB3b24mIzM5O3Q8YnIgLz4NCmhhdmUgdG8gcmVxdWVzdCB5b3VyIGd1ZXN0cyB0byBkb3dubG9hZCBhIHBob3RvIGFwcC4gQSBkZWZpbml0ZSB3aW4hPC9wPg0KDQo8ZGl2IHN0eWxlPSJ0ZXh0LWFsaWduOiBjZW50ZXI7Ij4NCjxoMT5TVEVQIDE8L2gxPg0KPC9kaXY+DQoNCjxoMiBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+Q3JlYXRlIFlvdXIgRXZlbnQ8L2gyPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+Rm9sbG93aW5nIHlvdXIgcHVyY2hhc2UsIHNpbXBseSBpbnB1dCB5b3VyIGV2ZW50IGRhdGUsIGV2ZW50IHRpdGxlLDxiciAvPg0KYW5kIGEgYnJpZWYgd2VsY29taW5nIG1lc3NhZ2UgZm9yIHlvdXIgZ3Vlc3RzLjwvcD4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246IGNlbnRlcjsiPlRoaXMgd2lsbCBzZXJ2ZSBhcyB0aGUgd2VsY29tZSBwYWdlIHRoYXQgeW91ciBndWVzdHMgZW5jb3VudGVyIHdoZW4gdGhleSBzY2FuIHlvdXIgUVIgY29kZSBvciBjbGljayBvbiB5b3VyIFVSTC48L3A+DQoNCjxkaXYgc3R5bGU9InRleHQtYWxpZ246IGNlbnRlcjsiPg0KPGgxPlNURVAgMjwvaDE+DQo8L2Rpdj4NCg0KPGgyIHN0eWxlPSJ0ZXh0LWFsaWduOiBjZW50ZXI7Ij5EaXNwbGF5IFlvdXIgUVIgQ29kZSAmYW1wOyBTaGFyZSBZb3VyIFVSTDwvaDI+DQoNCjxwIHN0eWxlPSJ0ZXh0LWFsaWduOiBjZW50ZXI7Ij5QcmVzZW50IHlvdXIgUVIgY29kZSBwcm9taW5lbnRseSBhdCB5b3VyIGV2ZW50LiBBZGRpdGlvbmFsbHksIHlvdSBoYXZlIHRoZSBvcHRpb24gdG8gZGlnaXRhbGx5IHNoYXJlIHlvdXIgVVJMIHdpdGg8YnIgLz4NCmd1ZXN0cyBieSBjb3B5aW5nIGFuZCBzZW5kaW5nIGl0IHRvIHRoZW0sIG9yIGluY2x1ZGUgaXQgb24geW91ciBldmVudCB3ZWJzaXRlIGFuZCBpbiB5b3VyIGludml0YXRpb25zLjwvcD4NCg0KPGRpdiBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+DQo8aDE+U1RFUCAzPC9oMT4NCjwvZGl2Pg0KDQo8aDIgc3R5bGU9InRleHQtYWxpZ246IGNlbnRlcjsiPkltbWVkaWF0ZWx5IHNhdm9yIHRoZSBtb3N0IGNoZXJpc2hlZCBtZW1vcmllcyBmcm9tIHlvdXIgZXZlbnQuPC9oMj4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246IGNlbnRlcjsiPkl0IHdpbGwgYmUgYnJpbW1pbmcgd2l0aCB1bmZvcmdldHRhYmxlIHBob3RvcywgYW11c2luZyB2aWRlb3MsIGFuZCBoZWFydHdhcm1pbmcgZ3Vlc3Rib29rIG1lc3NhZ2VzLjwvcD4NCg0KPGRpdiBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+DQo8aDE+U1RFUCA0PC9oMT4NCjwvZGl2Pg0KDQo8aDIgc3R5bGU9InRleHQtYWxpZ246IGNlbnRlcjsiPkhhdmUgeW91ciBmYXZvcml0ZSBwaWN0dXJlcyBhbmQgdmlkZW9zIHByb2Zlc3Npb25hbGx5IGVkaXRlZC48L2gyPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjogY2VudGVyOyI+T3VyIHRlYW0gb2YgcHJvZmVzc2lvbmFsIGVkaXRvcnMgaXMgaGVyZSB0byB0YWlsb3IgeW91ciBwaG90byBhbmQgdmlkZW8gZWRpdHMgdG8geW91ciBleGFjdCBwcmVmZXJlbmNlcy48YnIgLz4NClNpbXBseSBjaG9vc2UgdGhlIHBpY3R1cmVzL3ZpZGVvcyB5b3UmIzM5O2QgbGlrZSB0byBiZSBlZGl0ZWQsIGFuZCBsZWF2ZSBhbGwgdGhlIHdvcmsgdG8gdXMuPGJyIC8+DQpXZSB3aWxsIGNvbXBsZXRlIGFsbCB0aGUgZWRpdGluZyB3aXRoaW4gYSB0aW1lZnJhbWUgb2YgNS03IHdvcmtpbmcgZGF5cy48L3A+DQoNCjxkaXYgY2xhc3M9ImJ0bm4iIHN0eWxlPSJ0ZXh0LWFsaWduOiBjZW50ZXI7Ij4NCjxoMz4mbmJzcDs8L2gzPg0KDQo8aDM+PGEgaHJlZj0iaHR0cHM6Ly9waHA4LmltZGVtby54eXovcGlja21lL3BhZ2UtcGFja2FnZXMiPkdldCBTdGFydGVkPC9hPjwvaDM+DQo8L2Rpdj4NCjwvZGl2Pg0KIjt9', '', 1, 0, '', '2023-10-09 08:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `date_updated`) VALUES
(0, 'cash on delivery', '2016-11-19 10:33:03'),
(1, 'PayPal', '2016-11-19 10:33:06'),
(2, 'Klarna', '2016-11-19 10:34:58'),
(3, 'CreditCard', '2016-11-19 10:34:58'),
(4, 'Paid', '2016-11-19 10:35:17'),
(5, 'Payson', '2016-11-19 10:35:17'),
(6, 'Gift Card', '2016-11-19 10:35:30'),
(7, '2 CheckOut', '2016-11-19 10:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_addcost`
--

CREATE TABLE `product_addcost` (
  `proadc_id` int(11) NOT NULL,
  `proadc_name` varchar(255) DEFAULT NULL,
  `proadc_prodet_id` int(11) DEFAULT NULL,
  `proadc_cur_id` int(11) DEFAULT NULL,
  `proadc_price` float NOT NULL DEFAULT 0,
  `proadc_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_addcost_spb`
--

CREATE TABLE `product_addcost_spb` (
  `proadc_id` int(11) NOT NULL,
  `proadc_name` varchar(255) DEFAULT NULL,
  `proadc_prodet_id` int(11) DEFAULT NULL,
  `proadc_cur_id` int(11) DEFAULT NULL,
  `proadc_price` float NOT NULL DEFAULT 0,
  `proadc_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_cache_image`
--

CREATE TABLE `product_cache_image` (
  `img_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `img_cache` varchar(255) NOT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `procat_id` int(11) NOT NULL,
  `procat_prodet_id` int(11) NOT NULL,
  `procat_cat_id` varchar(255) DEFAULT NULL,
  `procat_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`procat_id`, `procat_prodet_id`, `procat_cat_id`, `procat_timeStamp`) VALUES
(1, 8, '5,6,', '2020-03-30 13:33:11'),
(9, 1, '1,1281,1282,1285,', '2020-03-30 14:39:03'),
(17, 3, '1,1283,', '2020-03-30 16:02:40'),
(28, 35, '1,1281,1282,1283,1284,1285,', '2020-04-03 07:35:27'),
(35, 45, '1,1287,', '2020-05-02 05:49:44'),
(37, 42, '1,1286,', '2020-05-02 06:10:42'),
(38, 40, '1,1286,', '2020-05-02 06:15:21'),
(39, 21, '1,1283,', '2020-05-02 06:15:55'),
(40, 18, '1,1281,1282,1284,', '2020-05-02 06:17:28'),
(41, 15, '1,1283,1285,', '2020-05-02 06:18:13'),
(42, 14, '1,1282,1283,', '2020-05-02 06:19:24'),
(43, 11, '1,1281,1285,', '2020-05-02 06:20:24'),
(51, 55, '1,1281,', '2020-12-30 05:25:40'),
(56, 61, '1,1282,1287,', '2021-08-02 06:31:24'),
(57, 65, '1,1281,', '2021-09-06 12:41:16'),
(58, 10, '1,1282,', '2021-10-26 08:23:05'),
(59, 171, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-06 10:49:06'),
(60, 173, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-06 10:52:49'),
(61, 175, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-06 10:58:09'),
(62, 180, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-06 11:07:22'),
(63, 182, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-06 11:08:47'),
(64, 184, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-06 11:11:11'),
(66, 194, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-07 09:38:53'),
(67, 189, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-07 09:48:59'),
(68, 199, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-15 10:48:59'),
(69, 201, '1,1281,1282,1283,1284,1285,1286,1287,', '2021-12-16 11:16:18'),
(70, 205, '1,1282,', '2021-12-22 07:01:26'),
(72, 207, '1,1282,', '2021-12-22 07:07:09'),
(73, 223, '1,1281,1282,1283,1284,1285,1286,1287,1289,', '2022-04-01 06:56:25'),
(74, 233, '1,1281,1282,1283,1284,1285,1286,1287,1289,', '2022-04-05 06:40:15'),
(75, 48, '1,1281,1283,', '2022-05-20 06:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_spb`
--

CREATE TABLE `product_category_spb` (
  `procat_id` int(11) NOT NULL,
  `procat_prodet_id` int(11) NOT NULL,
  `procat_cat_id` varchar(255) DEFAULT NULL,
  `procat_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `propri_id` int(11) NOT NULL,
  `proclr_name` varchar(255) DEFAULT NULL,
  `color_name` varchar(50) DEFAULT NULL,
  `proclr_prodet_id` int(11) NOT NULL,
  `proclr_cur_id` int(11) NOT NULL,
  `proclr_price` varchar(255) DEFAULT NULL,
  `sizeGroup` varchar(250) DEFAULT NULL,
  `proclr_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_coupon`
--

CREATE TABLE `product_coupon` (
  `pCoupon_pk` int(11) NOT NULL,
  `pCoupon_name` varchar(255) DEFAULT NULL,
  `pCoupon_from` varchar(50) DEFAULT NULL,
  `pCoupon_to` varchar(50) DEFAULT NULL,
  `pCoupon_category` varchar(255) DEFAULT NULL,
  `pCoupon_country` text NOT NULL,
  `pCoupon_format` varchar(250) DEFAULT NULL,
  `pCoupon_status` varchar(10) NOT NULL DEFAULT '0',
  `pCoupon_discount` varchar(20) DEFAULT NULL,
  `pCoupon_type` varchar(250) DEFAULT NULL,
  `pCoupon_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_coupon`
--

INSERT INTO `product_coupon` (`pCoupon_pk`, `pCoupon_name`, `pCoupon_from`, `pCoupon_to`, `pCoupon_category`, `pCoupon_country`, `pCoupon_format`, `pCoupon_status`, `pCoupon_discount`, `pCoupon_type`, `pCoupon_time`) VALUES
(1, 'ahmi123', '2020-04-02', '2020-04-30', '1,1281,1282,1283,1284,1285', '', 'price', '1', '2', 'basic', '2020-04-02 13:57:18'),
(2, 'ahmi', '2020-05-02', '2020-05-03', '1,1281,1282,1283,1284,1285,1286,1287', '', 'price', '1', '0', 'basic', '2020-05-02 08:44:02'),
(3, 'myCoupon', '', '', '1,1281,1282,1283,1284,1285,1286,1287', '', 'percent', '1', '0', 'basic', '2020-11-25 07:39:17'),
(4, 'testing', '', '', '1,1281,1282,1283,1284,1285,1286,1287', '', 'price', '1', '0', 'basic', '2021-01-13 14:37:34'),
(5, 'helloCoupon', '2021-12-22', '2022-01-22', '1,1282', '', 'percent', '1', '1', 'gold', '2021-12-22 07:18:23'),
(6, 'helloCoupon', '2022-05-13', '2022-06-21', '1281,1282,1283,1284,1285,1286,1287,1289', '', 'price', '1', '0', 'basic', '2022-05-09 08:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_coupon_prices`
--

CREATE TABLE `product_coupon_prices` (
  `pSale_price_pk` int(11) NOT NULL,
  `pSale_price_id` int(11) NOT NULL,
  `pSale_price_curr_Id` int(11) NOT NULL,
  `pSale_price_price` varchar(255) DEFAULT NULL,
  `pSale_price_intShipping` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_coupon_prices`
--

INSERT INTO `product_coupon_prices` (`pSale_price_pk`, `pSale_price_id`, `pSale_price_curr_Id`, `pSale_price_price`, `pSale_price_intShipping`) VALUES
(3, 1, 26, '100', 1),
(4, 1, 24, '50', 1),
(5, 2, 26, '10', 1),
(6, 2, 24, '10', 1),
(7, 3, 26, '20', 1),
(8, 3, 24, '20', 1),
(9, 4, 26, '10', 1),
(10, 4, 24, '0', 0),
(11, 5, 29, '0', 0),
(12, 5, 26, '1000', 1),
(13, 5, 24, '0', 0),
(17, 6, 29, '24', 0),
(18, 6, 26, '6000', 1),
(19, 6, 24, '15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_coupon_setting`
--

CREATE TABLE `product_coupon_setting` (
  `pCoupon_setting_pk` int(11) NOT NULL,
  `pCoupon_id` int(11) NOT NULL,
  `pCoupon_setting_name` varchar(50) NOT NULL,
  `pCoupon_setting_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_coupon_setting`
--

INSERT INTO `product_coupon_setting` (`pCoupon_setting_pk`, `pCoupon_id`, `pCoupon_setting_name`, `pCoupon_setting_value`) VALUES
(2, 1, 'discountFormat', 'price'),
(3, 2, 'discountFormat', 'price'),
(4, 3, 'discountFormat', 'percent'),
(5, 4, 'discountFormat', 'price'),
(6, 5, 'discountFormat', 'percent'),
(8, 6, 'discountFormat', 'price');

-- --------------------------------------------------------

--
-- Table structure for table `product_coupon_spb`
--

CREATE TABLE `product_coupon_spb` (
  `pCoupon_pk` int(11) NOT NULL,
  `pCoupon_name` varchar(255) DEFAULT NULL,
  `pCoupon_products` varchar(255) NOT NULL,
  `pCoupon_from` varchar(50) DEFAULT NULL,
  `pCoupon_to` varchar(50) DEFAULT NULL,
  `pCoupon_category` varchar(255) DEFAULT NULL,
  `pCoupon_country` text NOT NULL,
  `pCoupon_format` varchar(250) DEFAULT NULL,
  `pCoupon_status` varchar(10) NOT NULL DEFAULT '0',
  `pCoupon_discount` varchar(20) DEFAULT NULL,
  `pCoupon_type` varchar(250) DEFAULT NULL,
  `pCoupon_limit` varchar(225) NOT NULL,
  `pCoupon_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_coupon_spb`
--

INSERT INTO `product_coupon_spb` (`pCoupon_pk`, `pCoupon_name`, `pCoupon_products`, `pCoupon_from`, `pCoupon_to`, `pCoupon_category`, `pCoupon_country`, `pCoupon_format`, `pCoupon_status`, `pCoupon_discount`, `pCoupon_type`, `pCoupon_limit`, `pCoupon_time`) VALUES
(1, 'coupon_id', 'coupon_id', 'coupon_id', 'coupon_id', 'coupon_id', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '0000-00-00 00:00:00'),
(2, 'Demo', '', '2023-06-15', '2023-07-28', '', '', 'price', '1', '1', '', '10', '2023-05-12 06:54:51'),
(3, 'Testing', '25', '', '', '', '', 'price', '1', '1', '', '20', '2023-05-23 08:48:38'),
(4, 'Demo', '13', '2023-07-11', '2023-08-29', '', '', 'price', '0', '1', '', '10', '2023-07-11 08:24:58'),
(5, 'sdf', '', '2023-07-19', '2023-07-19', '', '', 'percent', '1', '1', '', 'sdfsdf', '2023-07-12 12:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_deal`
--

CREATE TABLE `product_deal` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `price` text DEFAULT NULL,
  `category` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `package` text DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `view_type` varchar(255) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `view` int(11) NOT NULL DEFAULT 0,
  `sale` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_deal`
--

INSERT INTO `product_deal` (`id`, `name`, `slug`, `price`, `category`, `image`, `package`, `publish`, `sort`, `view_type`, `dateTime`, `view`, `sale`) VALUES
(1, 'a:1:{s:7:\"English\";s:0:\"\";}', '1', 'a:2:{i:26;s:0:\"\";i:24;s:0:\"\";}', '1,1281', NULL, NULL, 1, 0, '1', '2020-07-30 12:11:19', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_deal_price`
--

CREATE TABLE `product_deal_price` (
  `id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL DEFAULT 0,
  `currencyId` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_deal_price`
--

INSERT INTO `product_deal_price` (`id`, `deal_id`, `currencyId`, `price`) VALUES
(1, 1, '26', '0'),
(2, 1, '24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_deal_setting`
--

CREATE TABLE `product_deal_setting` (
  `sid` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `setting_name` varchar(250) DEFAULT NULL,
  `setting_val` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_deal_setting`
--

INSERT INTO `product_deal_setting` (`sid`, `deal_id`, `setting_name`, `setting_val`) VALUES
(1, 1, 'sDesc', 'a:1:{s:7:\"English\";s:0:\"\";}');

-- --------------------------------------------------------

--
-- Table structure for table `product_discount`
--

CREATE TABLE `product_discount` (
  `product_discount_pk` int(11) NOT NULL,
  `discount_PId` int(11) NOT NULL,
  `product_dis_status` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_discount`
--

INSERT INTO `product_discount` (`product_discount_pk`, `discount_PId`, `product_dis_status`, `dateTime`) VALUES
(18, 1, 1, '2020-03-28 09:56:53'),
(19, 3, 1, '2020-03-28 10:03:49'),
(20, 11, 1, '2020-04-02 11:49:23'),
(24, 48, 0, '2020-07-30 12:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_discount_prices`
--

CREATE TABLE `product_discount_prices` (
  `product_dis_setting_pk` int(11) NOT NULL,
  `product_dis_id` int(11) NOT NULL,
  `product_dis_curr_Id` int(11) NOT NULL,
  `product_dis_price` varchar(255) DEFAULT NULL,
  `product_dis_intShipping` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_discount_prices`
--

INSERT INTO `product_discount_prices` (`product_dis_setting_pk`, `product_dis_id`, `product_dis_curr_Id`, `product_dis_price`, `product_dis_intShipping`) VALUES
(1, 16, 26, '100', 1),
(2, 16, 24, '50', 1),
(3, 17, 26, '100', 1),
(4, 17, 24, '500', 1),
(5, 18, 26, '100', 1),
(6, 18, 24, '50', 1),
(7, 19, 26, '10', 1),
(8, 19, 24, '20', 1),
(9, 20, 26, '10', 1),
(10, 20, 24, '20', 1),
(11, 21, 26, '45', 1),
(12, 21, 24, '0', 0),
(13, 22, 26, '45', 1),
(14, 22, 24, '0', 0),
(15, 23, 26, '45', 0),
(16, 23, 24, '0', 0),
(17, 24, 26, '45', 0),
(18, 24, 24, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_discount_setting`
--

CREATE TABLE `product_discount_setting` (
  `product_discount_setting_pk` int(11) NOT NULL,
  `product_dis_id` int(11) NOT NULL,
  `product_dis_name` varchar(100) NOT NULL,
  `product_dis_value` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_discount_setting`
--

INSERT INTO `product_discount_setting` (`product_discount_setting_pk`, `product_dis_id`, `product_dis_name`, `product_dis_value`) VALUES
(1, 16, 'dateFrom', '2020-03-25'),
(2, 16, 'dateTo', '2020-03-27'),
(3, 16, 'discountFormat', 'price'),
(4, 17, 'dateFrom', '2020-03-25'),
(5, 17, 'dateTo', '2020-03-27'),
(6, 17, 'discountFormat', 'price'),
(7, 18, 'dateFrom', '2020-03-25'),
(8, 18, 'dateTo', '2020-03-27'),
(9, 18, 'discountFormat', 'price'),
(10, 19, 'dateFrom', '2020-03-28'),
(11, 19, 'dateTo', '2020-03-31'),
(12, 19, 'discountFormat', 'price'),
(13, 20, 'dateFrom', ''),
(14, 20, 'dateTo', ''),
(15, 20, 'discountFormat', 'price'),
(16, 21, 'dateFrom', ''),
(17, 21, 'dateTo', ''),
(18, 21, 'discountFormat', 'price'),
(19, 22, 'dateFrom', ''),
(20, 22, 'dateTo', ''),
(21, 22, 'discountFormat', 'price'),
(22, 23, 'dateFrom', ''),
(23, 23, 'dateTo', ''),
(24, 23, 'discountFormat', 'price'),
(25, 24, 'dateFrom', ''),
(26, 24, 'dateTo', ''),
(27, 24, 'discountFormat', 'price');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_image_spb`
--

CREATE TABLE `product_image_spb` (
  `img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_image_spb`
--

INSERT INTO `product_image_spb` (`img_id`, `product_id`, `image`, `alt`, `sort`) VALUES
(11, 13, 'Gallery/shopproduct/2023/08/13_406_124-1243809_gold-package-silver-gold-platinum-icon.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `qty_pk` int(11) NOT NULL,
  `qty_store_id` int(11) NOT NULL,
  `qty_product_id` int(11) NOT NULL,
  `qty_product_scale` int(11) DEFAULT NULL,
  `qty_product_color` int(11) DEFAULT NULL,
  `qty_item` int(11) NOT NULL,
  `location` varchar(250) DEFAULT NULL,
  `product_store_hash` text DEFAULT NULL COMMENT '"$pid:$pscaleId:$pcolorId:$storeId"',
  `updateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory_detail`
--

CREATE TABLE `product_inventory_detail` (
  `qty_pk` int(11) NOT NULL,
  `qty_store_id` int(11) NOT NULL,
  `qty_product_id` int(11) NOT NULL,
  `qty_product_scale` int(11) DEFAULT NULL,
  `qty_product_color` int(11) DEFAULT NULL,
  `p_code` varchar(250) NOT NULL,
  `location` varchar(250) DEFAULT NULL,
  `product_store_hash` text DEFAULT NULL COMMENT '"$pid:$pscaleId:$pcolorId:$storeId"',
  `updateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_inventory_detail`
--

INSERT INTO `product_inventory_detail` (`qty_pk`, `qty_store_id`, `qty_product_id`, `qty_product_scale`, `qty_product_color`, `p_code`, `location`, `product_store_hash`, `updateTime`) VALUES
(1, 7, 4, 9, 7, 'b1', NULL, '550630c4b80777ff8efd8a465bfd768a', '2020-03-26 01:20:54'),
(2, 7, 4, 9, 7, 'b2', NULL, '550630c4b80777ff8efd8a465bfd768a', '2020-03-26 01:20:54'),
(3, 7, 4, 9, 7, 'b3', NULL, '550630c4b80777ff8efd8a465bfd768a', '2020-03-26 01:20:54'),
(4, 7, 4, 9, 7, 'b4', NULL, '550630c4b80777ff8efd8a465bfd768a', '2020-03-26 01:20:55'),
(5, 7, 4, 9, 7, 'b5', NULL, '550630c4b80777ff8efd8a465bfd768a', '2020-03-26 01:20:55'),
(6, 7, 1, 1, 1, 'p1', NULL, '6890155ae239884ab4181df94cd5589a', '2020-03-27 17:30:41'),
(7, 7, 1, 1, 1, 'p2', NULL, '6890155ae239884ab4181df94cd5589a', '2020-03-27 17:30:41'),
(8, 7, 1, 1, 1, 'p3', NULL, '6890155ae239884ab4181df94cd5589a', '2020-03-27 17:30:41'),
(9, 7, 1, 1, 1, 'p4', NULL, '6890155ae239884ab4181df94cd5589a', '2020-03-27 17:30:41'),
(10, 7, 1, 1, 1, 'p5', NULL, '6890155ae239884ab4181df94cd5589a', '2020-03-27 17:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `propri_id` int(11) NOT NULL,
  `propri_prodet_id` int(11) NOT NULL,
  `propri_cur_id` int(11) NOT NULL,
  `propri_price` double DEFAULT NULL,
  `propri_intShipping` int(11) DEFAULT NULL,
  `propri_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`propri_id`, `propri_prodet_id`, `propri_cur_id`, `propri_price`, `propri_intShipping`, `propri_timeStamp`) VALUES
(34594, 1, 26, 1000, 0, '2020-03-30 14:39:03'),
(34595, 1, 24, 1000, 0, '2020-03-30 14:39:03'),
(34608, 3, 26, 10000, 0, '2020-03-30 16:02:40'),
(34609, 3, 24, 500, 0, '2020-03-30 16:02:40'),
(34630, 35, 26, 11, 0, '2020-04-03 07:35:27'),
(34631, 35, 24, 22, 0, '2020-04-03 07:35:27'),
(34644, 45, 26, 2000, 0, '2020-05-02 05:49:44'),
(34645, 45, 24, 200, 0, '2020-05-02 05:49:44'),
(34648, 42, 26, 5000, 0, '2020-05-02 06:10:42'),
(34649, 42, 24, 500, 0, '2020-05-02 06:10:42'),
(34650, 40, 26, 1000, 0, '2020-05-02 06:15:21'),
(34651, 40, 24, 100, 0, '2020-05-02 06:15:21'),
(34652, 21, 26, 1000, 0, '2020-05-02 06:15:55'),
(34653, 21, 24, 50, 0, '2020-05-02 06:15:55'),
(34654, 18, 26, 1900, 0, '2020-05-02 06:17:28'),
(34655, 18, 24, 600, 0, '2020-05-02 06:17:28'),
(34656, 15, 26, 1500, 0, '2020-05-02 06:18:13'),
(34657, 15, 24, 100, 0, '2020-05-02 06:18:13'),
(34658, 14, 26, 100, 0, '2020-05-02 06:19:24'),
(34659, 14, 24, 50, 0, '2020-05-02 06:19:24'),
(34660, 11, 26, 2000, 0, '2020-05-02 06:20:24'),
(34661, 11, 24, 500, 0, '2020-05-02 06:20:24'),
(34676, 55, 26, 100, 0, '2020-12-30 05:25:40'),
(34682, 61, 26, 500, 0, '2021-08-02 06:31:24'),
(34683, 61, 24, 22, 0, '2021-08-02 06:31:24'),
(34684, 65, 26, 70000, 1, '2021-09-06 12:41:16'),
(34685, 65, 24, 100, 1, '2021-09-06 12:41:16'),
(34686, 10, 26, 1000, 0, '2021-10-26 08:23:05'),
(34687, 10, 24, 200, 0, '2021-10-26 08:23:05'),
(34688, 171, 26, 1500, 1, '2021-12-06 10:49:06'),
(34689, 171, 24, 5, 1, '2021-12-06 10:49:06'),
(34690, 173, 26, 1500, 0, '2021-12-06 10:52:49'),
(34691, 173, 24, 5, 0, '2021-12-06 10:52:49'),
(34692, 175, 26, 1500, 0, '2021-12-06 10:58:09'),
(34693, 175, 24, 5, 0, '2021-12-06 10:58:09'),
(34694, 180, 26, 1500, 0, '2021-12-06 11:07:22'),
(34695, 180, 24, 5, 0, '2021-12-06 11:07:22'),
(34696, 182, 26, 1500, 0, '2021-12-06 11:08:47'),
(34697, 182, 24, 5, 0, '2021-12-06 11:08:47'),
(34698, 184, 26, 1500, 0, '2021-12-06 11:11:11'),
(34699, 184, 24, 2, 0, '2021-12-06 11:11:11'),
(34702, 194, 26, 1500, 1, '2021-12-07 09:38:53'),
(34703, 194, 24, 20, 0, '2021-12-07 09:38:53'),
(34704, 189, 26, 1500, 0, '2021-12-07 09:48:59'),
(34705, 189, 24, 5, 0, '2021-12-07 09:48:59'),
(34706, 199, 26, 2000, 1, '2021-12-15 10:48:59'),
(34707, 199, 24, 8, 1, '2021-12-15 10:48:59'),
(34708, 201, 26, 2000, 1, '2021-12-16 11:16:18'),
(34709, 201, 24, 8, 1, '2021-12-16 11:16:18'),
(34710, 205, 26, 5000, 0, '2021-12-22 07:01:26'),
(34712, 207, 26, 3000, 1, '2021-12-22 07:07:09'),
(34713, 223, 24, 15, 1, '2022-04-01 06:56:25'),
(34714, 233, 24, 42, 1, '2022-04-05 06:40:15'),
(34715, 48, 26, 2000, 1, '2022-05-20 06:26:15'),
(34716, 48, 24, 20033, 0, '2022-05-20 06:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_price_spb`
--

CREATE TABLE `product_price_spb` (
  `propri_id` int(11) NOT NULL,
  `propri_prodet_id` int(11) NOT NULL,
  `propri_cur_id` int(11) NOT NULL,
  `propri_price` double DEFAULT NULL,
  `propri_intShipping` int(11) DEFAULT NULL,
  `propri_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_price_spb`
--

INSERT INTO `product_price_spb` (`propri_id`, `propri_prodet_id`, `propri_cur_id`, `propri_price`, `propri_intShipping`, `propri_timeStamp`) VALUES
(1, 6, 20, 120, 0, '2023-05-08 10:24:02'),
(3, 8, 20, 120, 0, '2023-05-08 13:11:29'),
(8, 15, 20, 199, 0, '2023-05-09 06:01:57'),
(16, 22, 20, 15, 0, '2023-05-12 06:59:07'),
(18, 25, 20, 20, 0, '2023-05-23 12:59:02'),
(23, 31, 20, 120, 0, '2023-07-10 11:27:39'),
(24, 34, 20, 41, 0, '2023-07-10 11:32:25'),
(25, 36, 20, 120, 0, '2023-07-10 11:35:19'),
(26, 38, 20, 120, 0, '2023-07-10 11:42:59'),
(27, 42, 20, 120, 0, '2023-07-10 11:44:00'),
(28, 43, 20, 120, 0, '2023-07-10 11:44:22'),
(35, 45, 26, 156, 0, '2023-08-08 07:19:17'),
(62, 72, 26, 11, 0, '2023-08-15 08:26:26'),
(63, 75, 26, 5, 0, '2023-08-15 08:29:56'),
(64, 77, 26, 69.69, 0, '2023-08-15 08:56:08'),
(123, 56, 26, 99, 0, '2023-10-09 13:33:44'),
(124, 12, 26, 149, 0, '2023-10-09 13:34:50'),
(125, 13, 26, 249, 0, '2023-10-09 13:35:40'),
(126, 104, 26, 399, 0, '2023-10-09 13:37:29'),
(127, 82, 26, 22, 0, '2023-10-09 13:38:40'),
(128, 89, 26, 39, 0, '2023-10-09 13:39:21'),
(129, 88, 26, 78, 0, '2023-10-09 13:42:00'),
(131, 102, 26, 150, 0, '2023-10-09 13:45:13'),
(132, 108, 26, 222, 0, '2023-11-09 07:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_return_form`
--

CREATE TABLE `product_return_form` (
  `id` int(11) NOT NULL,
  `orderId` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `products` text NOT NULL,
  `claimNo` varchar(100) DEFAULT NULL,
  `switchProduct` varchar(100) DEFAULT NULL,
  `bankName` varchar(100) DEFAULT NULL,
  `sortCode` varchar(100) DEFAULT NULL,
  `accountNo` varchar(250) DEFAULT NULL,
  `changeTo` varchar(500) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `readStatus` int(11) NOT NULL DEFAULT 0,
  `type` varchar(50) NOT NULL DEFAULT 'return',
  `status` int(11) NOT NULL DEFAULT 1,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE `product_sale` (
  `pSale_pk` int(11) NOT NULL,
  `pSale_name` varchar(255) DEFAULT NULL,
  `pSale_from` varchar(50) DEFAULT NULL,
  `pSale_to` varchar(50) DEFAULT NULL,
  `pSale_category` varchar(255) DEFAULT NULL,
  `pSale_status` varchar(10) NOT NULL DEFAULT '0',
  `pSale_discount` varchar(20) DEFAULT NULL,
  `pSale_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sale_prices`
--

CREATE TABLE `product_sale_prices` (
  `pSale_price_pk` int(11) NOT NULL,
  `pSale_price_id` int(11) NOT NULL,
  `pSale_price_curr_Id` int(11) NOT NULL,
  `pSale_price_price` varchar(255) DEFAULT NULL,
  `pSale_price_intShipping` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sale_setting`
--

CREATE TABLE `product_sale_setting` (
  `pSale_setting_pk` int(11) NOT NULL,
  `pSale_id` int(11) NOT NULL,
  `pSale_setting_name` varchar(50) NOT NULL,
  `pSale_setting_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_setting`
--

CREATE TABLE `product_setting` (
  `set_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_val` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_setting`
--

INSERT INTO `product_setting` (`set_id`, `p_id`, `setting_name`, `setting_val`) VALUES
(285, 84, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(286, 84, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(287, 84, 'size_chart', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(288, 84, 'publicAccess', '1'),
(289, 84, 'freeGift', '0'),
(290, 84, 'sku_status', '0'),
(291, 84, 'sku_product', ''),
(292, 84, 'Model', ''),
(293, 84, 'label', ''),
(294, 84, 'min_stock', '1000'),
(295, 84, 'video', ''),
(296, 84, 'launchDate', ''),
(297, 84, 'defaultWeight', ''),
(298, 84, 'shippingClass', '14'),
(299, 84, 'review', '0'),
(300, 84, 'reviewOffMsg', ''),
(301, 84, 'askQuestion', '0'),
(302, 84, 'questionOffMsg', ''),
(447, 8, 'sn', 'a:1:{s:7:\"English\";s:11:\"dfdfddfdfdf\";}'),
(448, 8, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(449, 8, 'size_chart', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(450, 8, 'publicAccess', '1'),
(451, 8, 'freeGift', '0'),
(452, 8, 'sku_status', '0'),
(453, 8, 'sku_product', ''),
(454, 8, 'Model', ''),
(455, 8, 'label', ''),
(456, 8, 'min_stock', '3'),
(457, 8, 'video', ''),
(458, 8, 'launchDate', ''),
(459, 8, 'defaultWeight', ''),
(460, 8, 'shippingClass', '8'),
(461, 8, 'review', '0'),
(462, 8, 'reviewOffMsg', ''),
(463, 8, 'askQuestion', '0'),
(464, 8, 'questionOffMsg', ''),
(599, 1, 'sn', 'a:1:{s:7:\"English\";s:1:\"8\";}'),
(600, 1, 'ldesc', 'a:1:{s:7:\"English\";s:526:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}'),
(601, 1, 'size_chart', 'a:1:{s:7:\"English\";s:15:\"Size 1222222222\";}'),
(602, 1, 'related', 'a:3:{i:0;s:2:\"11\";i:1;s:2:\"10\";i:2;s:1:\"3\";}'),
(603, 1, 'getlook', 'a:2:{i:0;s:2:\"11\";i:1;s:2:\"10\";}'),
(604, 1, 'combineWith', 'a:4:{i:0;s:4:\"1281\";i:1;s:4:\"1282\";i:2;s:4:\"1283\";i:3;s:4:\"1285\";}'),
(605, 1, 'publicAccess', '1'),
(606, 1, 'freeGift', '0'),
(607, 1, 'sku_status', '0'),
(608, 1, 'sku_product', ''),
(609, 1, 'Model', ''),
(610, 1, 'label', ''),
(611, 1, 'min_stock', '1000'),
(612, 1, 'video', ''),
(613, 1, 'launchDate', ''),
(614, 1, 'defaultWeight', ''),
(615, 1, 'shippingClass', '12'),
(616, 1, 'review', '0'),
(617, 1, 'reviewOffMsg', ''),
(618, 1, 'askQuestion', '0'),
(619, 1, 'questionOffMsg', ''),
(762, 3, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(763, 3, 'ldesc', 'a:1:{s:7:\"English\";s:440:\"ahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productssahmiiiiiiiiiiiiiiiiiiiiiiiiiii Productss\";}'),
(764, 3, 'size_chart', 'a:1:{s:7:\"English\";s:7:\"size 21\";}'),
(765, 3, 'related', 'a:4:{i:0;s:2:\"18\";i:1;s:2:\"15\";i:2;s:2:\"14\";i:3;s:1:\"1\";}'),
(766, 3, 'publicAccess', '1'),
(767, 3, 'freeGift', '0'),
(768, 3, 'sku_status', '0'),
(769, 3, 'sku_product', ''),
(770, 3, 'Model', ''),
(771, 3, 'label', ''),
(772, 3, 'min_stock', '500'),
(773, 3, 'video', ''),
(774, 3, 'launchDate', ''),
(775, 3, 'defaultWeight', ''),
(776, 3, 'shippingClass', '12'),
(777, 3, 'review', '1'),
(778, 3, 'reviewOffMsg', 'New review 22'),
(779, 3, 'askQuestion', '0'),
(780, 3, 'questionOffMsg', ''),
(980, 35, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(981, 35, 'ldesc', 'a:1:{s:7:\"English\";s:2:\"dd\";}'),
(982, 35, 'related', 'a:1:{i:0;s:2:\"15\";}'),
(983, 35, 'publicAccess', '0'),
(984, 35, 'sku_status', '0'),
(985, 35, 'sku_product', ''),
(986, 35, 'Model', ''),
(987, 35, 'label', ''),
(988, 35, 'min_stock', ''),
(989, 35, 'video', ''),
(990, 35, 'launchDate', ''),
(991, 35, 'defaultWeight', ''),
(992, 35, 'shippingClass', '14'),
(1067, 45, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1068, 45, 'ldesc', 'a:1:{s:7:\"English\";s:353:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}'),
(1069, 45, 'publicAccess', '1'),
(1070, 45, 'sku_status', '0'),
(1071, 45, 'sku_product', ''),
(1072, 45, 'Model', '1114'),
(1073, 45, 'label', 'On Sale'),
(1074, 45, 'min_stock', ''),
(1075, 45, 'video', ''),
(1076, 45, 'launchDate', ''),
(1077, 45, 'defaultWeight', ''),
(1078, 45, 'shippingClass', '15'),
(1091, 42, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1092, 42, 'ldesc', 'a:1:{s:7:\"English\";s:409:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span>\";}'),
(1093, 42, 'related', 'a:3:{i:0;s:2:\"40\";i:1;s:2:\"21\";i:2;s:2:\"18\";}'),
(1094, 42, 'publicAccess', '1'),
(1095, 42, 'sku_status', '0'),
(1096, 42, 'sku_product', ''),
(1097, 42, 'Model', '1114'),
(1098, 42, 'label', 'New Brand 2'),
(1099, 42, 'min_stock', ''),
(1100, 42, 'video', ''),
(1101, 42, 'launchDate', ''),
(1102, 42, 'defaultWeight', ''),
(1103, 42, 'shippingClass', '14'),
(1104, 40, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1105, 40, 'ldesc', 'a:1:{s:7:\"English\";s:409:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span>\";}'),
(1106, 40, 'related', 'a:3:{i:0;s:2:\"21\";i:1;s:2:\"18\";i:2;s:2:\"15\";}'),
(1107, 40, 'publicAccess', '1'),
(1108, 40, 'sku_status', '0'),
(1109, 40, 'sku_product', ''),
(1110, 40, 'Model', '1113'),
(1111, 40, 'label', 'New Brand 1'),
(1112, 40, 'min_stock', ''),
(1113, 40, 'video', ''),
(1114, 40, 'launchDate', ''),
(1115, 40, 'defaultWeight', ''),
(1116, 40, 'shippingClass', '12'),
(1117, 21, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1118, 21, 'ldesc', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}'),
(1119, 21, 'related', 'a:5:{i:0;s:2:\"18\";i:1;s:2:\"15\";i:2;s:2:\"14\";i:3;s:2:\"11\";i:4;s:2:\"10\";}'),
(1120, 21, 'getlook', 'a:1:{i:0;s:2:\"18\";}'),
(1121, 21, 'dontForget', 'a:1:{i:0;s:2:\"15\";}'),
(1122, 21, 'combineWith', 'a:2:{i:0;s:4:\"1281\";i:1;s:4:\"1283\";}'),
(1123, 21, 'publicAccess', '1'),
(1124, 21, 'sku_status', '0'),
(1125, 21, 'sku_product', ''),
(1126, 21, 'Model', ''),
(1127, 21, 'label', ''),
(1128, 21, 'min_stock', '122'),
(1129, 21, 'video', ''),
(1130, 21, 'launchDate', ''),
(1131, 21, 'defaultWeight', ''),
(1132, 21, 'shippingClass', '12'),
(1133, 18, 'sn', 'a:1:{s:7:\"English\";s:2:\"12\";}'),
(1134, 18, 'ldesc', 'a:1:{s:7:\"English\";s:526:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}'),
(1135, 18, 'related', 'a:3:{i:0;s:2:\"15\";i:1;s:2:\"14\";i:2;s:2:\"11\";}'),
(1136, 18, 'getlook', 'a:4:{i:0;s:2:\"15\";i:1;s:2:\"14\";i:2;s:2:\"11\";i:3;s:2:\"10\";}'),
(1137, 18, 'dontForget', 'a:3:{i:0;s:2:\"15\";i:1;s:2:\"11\";i:2;s:2:\"10\";}'),
(1138, 18, 'combineWith', 'a:3:{i:0;s:4:\"1281\";i:1;s:4:\"1285\";i:2;s:4:\"1284\";}'),
(1139, 18, 'publicAccess', '1'),
(1140, 18, 'sku_status', '0'),
(1141, 18, 'sku_product', ''),
(1142, 18, 'Model', ''),
(1143, 18, 'label', ''),
(1144, 18, 'min_stock', '2000'),
(1145, 18, 'video', ''),
(1146, 18, 'launchDate', ''),
(1147, 18, 'defaultWeight', ''),
(1148, 18, 'shippingClass', '12'),
(1149, 15, 'sn', 'a:1:{s:7:\"English\";s:2:\"11\";}'),
(1150, 15, 'ldesc', 'a:1:{s:7:\"English\";s:789:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}'),
(1151, 15, 'related', 'a:1:{i:0;s:2:\"10\";}'),
(1152, 15, 'getlook', 'a:1:{i:0;s:2:\"11\";}'),
(1153, 15, 'combineWith', 'a:2:{i:0;s:4:\"1283\";i:1;s:4:\"1285\";}'),
(1154, 15, 'publicAccess', '1'),
(1155, 15, 'sku_status', '0'),
(1156, 15, 'sku_product', ''),
(1157, 15, 'Model', ''),
(1158, 15, 'label', ''),
(1159, 15, 'min_stock', '500'),
(1160, 15, 'video', ''),
(1161, 15, 'launchDate', ''),
(1162, 15, 'defaultWeight', ''),
(1163, 15, 'shippingClass', '14'),
(1164, 14, 'sn', 'a:1:{s:7:\"English\";s:2:\"13\";}'),
(1165, 14, 'ldesc', 'a:1:{s:7:\"English\";s:526:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}'),
(1166, 14, 'related', 'a:2:{i:0;s:2:\"11\";i:1;s:2:\"10\";}'),
(1167, 14, 'getlook', 'a:4:{i:0;s:2:\"18\";i:1;s:2:\"15\";i:2;s:2:\"11\";i:3;s:2:\"10\";}'),
(1168, 14, 'dontForget', 'a:3:{i:0;s:2:\"18\";i:1;s:2:\"15\";i:2;s:2:\"11\";}'),
(1169, 14, 'combineWith', 'a:3:{i:0;s:4:\"1283\";i:1;s:4:\"1282\";i:2;s:4:\"1283\";}'),
(1170, 14, 'publicAccess', '1'),
(1171, 14, 'sku_status', '0'),
(1172, 14, 'sku_product', ''),
(1173, 14, 'Model', ''),
(1174, 14, 'label', ''),
(1175, 14, 'min_stock', '100'),
(1176, 14, 'video', ''),
(1177, 14, 'launchDate', ''),
(1178, 14, 'defaultWeight', ''),
(1179, 14, 'shippingClass', '8'),
(1180, 11, 'sn', 'a:1:{s:7:\"English\";s:1:\"6\";}'),
(1181, 11, 'ldesc', 'a:1:{s:7:\"English\";s:542:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}'),
(1182, 11, 'related', 'a:1:{i:0;s:2:\"10\";}'),
(1183, 11, 'publicAccess', '1'),
(1184, 11, 'sku_status', '0'),
(1185, 11, 'sku_product', ''),
(1186, 11, 'Model', ''),
(1187, 11, 'label', ''),
(1188, 11, 'min_stock', '3000'),
(1189, 11, 'video', ''),
(1190, 11, 'launchDate', ''),
(1191, 11, 'defaultWeight', ''),
(1192, 11, 'shippingClass', '10'),
(1280, 55, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1281, 55, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1282, 55, 'publicAccess', '1'),
(1283, 55, 'sku_status', '0'),
(1284, 55, 'sku_product', ''),
(1285, 55, 'Model', ''),
(1286, 55, 'label', ''),
(1287, 55, 'min_stock', ''),
(1288, 55, 'video', ''),
(1289, 55, 'launchDate', ''),
(1290, 55, 'defaultWeight', ''),
(1291, 55, 'shippingClass', '9'),
(1340, 61, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1341, 61, 'ldesc', 'a:1:{s:7:\"English\";s:295:\"<span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}'),
(1342, 61, 'publicAccess', '1'),
(1343, 61, 'sku_status', '0'),
(1344, 61, 'sku_product', ''),
(1345, 61, 'Model', ''),
(1346, 61, 'label', ''),
(1347, 61, 'min_stock', ''),
(1348, 61, 'video', ''),
(1349, 61, 'launchDate', ''),
(1350, 61, 'defaultWeight', ''),
(1351, 61, 'shippingClass', '14'),
(1352, 65, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1353, 65, 'ldesc', 'a:1:{s:7:\"English\";s:63:\"A product is an object or sytem made available for consumer use\";}'),
(1354, 65, 'related', 'a:1:{i:0;s:2:\"48\";}'),
(1355, 65, 'publicAccess', '0'),
(1356, 65, 'sku_status', '0'),
(1357, 65, 'sku_product', ''),
(1358, 65, 'Model', ''),
(1359, 65, 'label', ''),
(1360, 65, 'min_stock', ''),
(1361, 65, 'video', ''),
(1362, 65, 'launchDate', ''),
(1363, 65, 'defaultWeight', ''),
(1364, 65, 'shippingClass', '2'),
(1365, 10, 'sn', 'a:1:{s:7:\"English\";s:1:\"5\";}'),
(1366, 10, 'ldesc', 'a:1:{s:7:\"English\";s:542:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}'),
(1367, 10, 'related', 'a:9:{i:0;s:2:\"48\";i:1;s:2:\"45\";i:2;s:2:\"42\";i:3;s:2:\"40\";i:4;s:2:\"21\";i:5;s:2:\"18\";i:6;s:2:\"15\";i:7;s:2:\"14\";i:8;s:2:\"11\";}'),
(1368, 10, 'publicAccess', '1'),
(1369, 10, 'sku_status', '0'),
(1370, 10, 'sku_product', ''),
(1371, 10, 'Model', ''),
(1372, 10, 'label', ''),
(1373, 10, 'min_stock', '1000'),
(1374, 10, 'video', ''),
(1375, 10, 'launchDate', ''),
(1376, 10, 'defaultWeight', ''),
(1377, 10, 'shippingClass', '15'),
(1378, 171, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1379, 171, 'ldesc', 'a:1:{s:7:\"English\";s:11:\"awdawdawdaw\";}'),
(1380, 171, 'publicAccess', '1'),
(1381, 171, 'sku_status', '0'),
(1382, 171, 'sku_product', ''),
(1383, 171, 'Model', ''),
(1384, 171, 'label', ''),
(1385, 171, 'min_stock', ''),
(1386, 171, 'video', ''),
(1387, 171, 'launchDate', ''),
(1388, 171, 'defaultWeight', ''),
(1389, 171, 'shippingClass', '12'),
(1390, 173, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1391, 173, 'ldesc', 'a:1:{s:7:\"English\";s:6:\"awdawd\";}'),
(1392, 173, 'publicAccess', '0'),
(1393, 173, 'sku_status', '0'),
(1394, 173, 'sku_product', ''),
(1395, 173, 'Model', ''),
(1396, 173, 'label', ''),
(1397, 173, 'min_stock', ''),
(1398, 173, 'video', ''),
(1399, 173, 'launchDate', ''),
(1400, 173, 'defaultWeight', ''),
(1401, 173, 'shippingClass', '14'),
(1402, 175, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1403, 175, 'ldesc', 'a:1:{s:7:\"English\";s:4:\"dawd\";}'),
(1404, 175, 'publicAccess', '0'),
(1405, 175, 'sku_status', '0'),
(1406, 175, 'sku_product', ''),
(1407, 175, 'Model', ''),
(1408, 175, 'label', ''),
(1409, 175, 'min_stock', ''),
(1410, 175, 'video', ''),
(1411, 175, 'launchDate', ''),
(1412, 175, 'defaultWeight', ''),
(1413, 175, 'shippingClass', '13'),
(1414, 180, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1415, 180, 'ldesc', 'a:1:{s:7:\"English\";s:6:\"awdawd\";}'),
(1416, 180, 'publicAccess', '1'),
(1417, 180, 'sku_status', '0'),
(1418, 180, 'sku_product', ''),
(1419, 180, 'Model', ''),
(1420, 180, 'label', ''),
(1421, 180, 'min_stock', ''),
(1422, 180, 'video', ''),
(1423, 180, 'launchDate', ''),
(1424, 180, 'defaultWeight', ''),
(1425, 180, 'shippingClass', '13'),
(1426, 182, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1427, 182, 'ldesc', 'a:1:{s:7:\"English\";s:8:\"cvcvccvv\";}'),
(1428, 182, 'publicAccess', '1'),
(1429, 182, 'sku_status', '0'),
(1430, 182, 'sku_product', ''),
(1431, 182, 'Model', ''),
(1432, 182, 'label', ''),
(1433, 182, 'min_stock', ''),
(1434, 182, 'video', ''),
(1435, 182, 'launchDate', ''),
(1436, 182, 'defaultWeight', ''),
(1437, 182, 'shippingClass', '13'),
(1438, 184, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1439, 184, 'ldesc', 'a:1:{s:7:\"English\";s:5:\"test0\";}'),
(1440, 184, 'publicAccess', '1'),
(1441, 184, 'sku_status', '0'),
(1442, 184, 'sku_product', ''),
(1443, 184, 'Model', ''),
(1444, 184, 'label', ''),
(1445, 184, 'min_stock', ''),
(1446, 184, 'video', ''),
(1447, 184, 'launchDate', ''),
(1448, 184, 'defaultWeight', ''),
(1449, 184, 'shippingClass', '12'),
(1462, 194, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1463, 194, 'ldesc', 'a:1:{s:7:\"English\";s:5:\"name1\";}'),
(1464, 194, 'publicAccess', '0'),
(1465, 194, 'sku_status', '0'),
(1466, 194, 'sku_product', ''),
(1467, 194, 'Model', ''),
(1468, 194, 'label', ''),
(1469, 194, 'min_stock', ''),
(1470, 194, 'video', ''),
(1471, 194, 'launchDate', ''),
(1472, 194, 'defaultWeight', ''),
(1473, 194, 'shippingClass', '13'),
(1474, 189, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1475, 189, 'ldesc', 'a:1:{s:7:\"English\";s:8:\"teshting\";}'),
(1476, 189, 'publicAccess', '1'),
(1477, 189, 'sku_status', '0'),
(1478, 189, 'sku_product', ''),
(1479, 189, 'Model', ''),
(1480, 189, 'label', ''),
(1481, 189, 'min_stock', ''),
(1482, 189, 'video', ''),
(1483, 189, 'launchDate', ''),
(1484, 189, 'defaultWeight', ''),
(1485, 189, 'shippingClass', '4'),
(1486, 199, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1487, 199, 'ldesc', 'a:1:{s:7:\"English\";s:5:\"daawd\";}'),
(1488, 199, 'publicAccess', '1'),
(1489, 199, 'sku_status', '0'),
(1490, 199, 'sku_product', ''),
(1491, 199, 'Model', '321'),
(1492, 199, 'label', 'Levis new'),
(1493, 199, 'min_stock', ''),
(1494, 199, 'video', ''),
(1495, 199, 'launchDate', ''),
(1496, 199, 'defaultWeight', ''),
(1497, 199, 'shippingClass', '13'),
(1498, 201, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1499, 201, 'ldesc', 'a:1:{s:7:\"English\";s:5:\"Levis\";}'),
(1500, 201, 'publicAccess', '1'),
(1501, 201, 'sku_status', '0'),
(1502, 201, 'sku_product', ''),
(1503, 201, 'Model', ''),
(1504, 201, 'label', ''),
(1505, 201, 'min_stock', ''),
(1506, 201, 'video', ''),
(1507, 201, 'launchDate', ''),
(1508, 201, 'defaultWeight', ''),
(1509, 201, 'shippingClass', '13'),
(1510, 205, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1511, 205, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1512, 205, 'related', 'a:2:{i:0;s:2:\"40\";i:1;s:2:\"18\";}'),
(1513, 205, 'publicAccess', '0'),
(1514, 205, 'sku_status', '0'),
(1515, 205, 'sku_product', ''),
(1516, 205, 'Model', '1120'),
(1517, 205, 'label', 'abc'),
(1518, 205, 'min_stock', ''),
(1519, 205, 'video', ''),
(1520, 205, 'launchDate', '12/22/2021'),
(1521, 205, 'defaultWeight', ''),
(1522, 205, 'shippingClass', '14'),
(1536, 207, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1537, 207, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1538, 207, 'related', 'a:2:{i:0;s:2:\"40\";i:1;s:2:\"18\";}'),
(1539, 207, 'publicAccess', '1'),
(1540, 207, 'sku_status', '0'),
(1541, 207, 'sku_product', ''),
(1542, 207, 'Model', ''),
(1543, 207, 'label', 'abc'),
(1544, 207, 'min_stock', ''),
(1545, 207, 'video', ''),
(1546, 207, 'launchDate', ''),
(1547, 207, 'defaultWeight', ''),
(1548, 207, 'shippingClass', '14'),
(1549, 223, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1550, 223, 'ldesc', 'a:1:{s:7:\"English\";s:3:\"xyz\";}'),
(1551, 223, 'publicAccess', '1'),
(1552, 223, 'sku_status', '0'),
(1553, 223, 'sku_product', ''),
(1554, 223, 'Model', ''),
(1555, 223, 'label', ''),
(1556, 223, 'min_stock', ''),
(1557, 223, 'video', ''),
(1558, 223, 'launchDate', ''),
(1559, 223, 'defaultWeight', ''),
(1560, 223, 'shippingClass', '14'),
(1561, 233, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1562, 233, 'ldesc', 'a:1:{s:7:\"English\";s:3:\"vvv\";}'),
(1563, 233, 'publicAccess', '1'),
(1564, 233, 'sku_status', '0'),
(1565, 233, 'sku_product', ''),
(1566, 233, 'Model', ''),
(1567, 233, 'label', 'sada'),
(1568, 233, 'min_stock', ''),
(1569, 233, 'video', ''),
(1570, 233, 'launchDate', '04/20/2022'),
(1571, 233, 'defaultWeight', ''),
(1572, 233, 'shippingClass', '12'),
(1573, 48, 'sn', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(1574, 48, 'ldesc', 'a:1:{s:7:\"English\";s:353:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}'),
(1575, 48, 'publicAccess', '1'),
(1576, 48, 'sku_status', '0'),
(1577, 48, 'sku_product', ''),
(1578, 48, 'Model', '1114'),
(1579, 48, 'label', 'On Sale'),
(1580, 48, 'min_stock', ''),
(1581, 48, 'video', ''),
(1582, 48, 'launchDate', ''),
(1583, 48, 'defaultWeight', ''),
(1584, 48, 'shippingClass', '15');

-- --------------------------------------------------------

--
-- Table structure for table `product_setting_spb`
--

CREATE TABLE `product_setting_spb` (
  `set_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_val` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_setting_spb`
--

INSERT INTO `product_setting_spb` (`set_id`, `p_id`, `setting_name`, `setting_val`) VALUES
(1, 1, 'ldesc', '1'),
(2, 1, 'publicAccess', '1'),
(3, 6, 'ldesc', 'a:1:{s:7:\"English\";s:6:\"asdasd\";}'),
(4, 6, 'publicAccess', '1'),
(9, 8, 'ldesc', 'a:1:{s:7:\"English\";s:12:\"One location\";}'),
(10, 8, 'publicAccess', '1'),
(19, 15, 'ldesc', 'a:1:{s:7:\"English\";s:12:\"One location\";}'),
(20, 15, 'publicAccess', '1'),
(35, 22, 'ldesc', 'a:1:{s:7:\"English\";s:12:\"Comming Soon\";}'),
(36, 22, 'publicAccess', '1'),
(39, 25, 'ldesc', 'a:1:{s:7:\"English\";s:12:\"Comming Soon\";}'),
(40, 25, 'publicAccess', '1'),
(49, 31, 'ldesc', 'a:1:{s:7:\"English\";s:3:\"ggg\";}'),
(50, 31, 'publicAccess', '1'),
(51, 34, 'ldesc', 'a:1:{s:7:\"English\";s:16:\"hgfhfghfg h gf h\";}'),
(52, 34, 'publicAccess', '1'),
(53, 36, 'ldesc', 'a:1:{s:7:\"English\";s:2:\"dd\";}'),
(54, 36, 'publicAccess', '1'),
(55, 38, 'ldesc', 'a:1:{s:7:\"English\";s:3:\"ddd\";}'),
(56, 38, 'publicAccess', '1'),
(57, 39, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(58, 39, 'publicAccess', '1'),
(59, 42, 'ldesc', 'a:1:{s:7:\"English\";s:2:\"dd\";}'),
(60, 42, 'publicAccess', '1'),
(61, 43, 'ldesc', 'a:1:{s:7:\"English\";s:5:\"sdasd\";}'),
(62, 43, 'publicAccess', '1'),
(73, 16, 'ldesc', 'a:1:{s:7:\"English\";s:12:\"One location\";}'),
(74, 16, 'publicAccess', '1'),
(75, 19, 'ldesc', 'a:1:{s:7:\"English\";s:12:\"One location\";}'),
(76, 19, 'publicAccess', '1'),
(87, 45, 'ldesc', 'a:1:{s:7:\"English\";s:12:\"asad dsadsda\";}'),
(88, 45, 'publicAccess', '0'),
(143, 72, 'ldesc', 'a:1:{s:7:\"English\";s:153:\"<ul>\r\n	<li>50 Photos &amp; Guestbook</li>\r\n	<li>Photo Slideshow</li>\r\n	<li>Private QR Code &amp; URL (with PIN)</li>\r\n	<li>12 Month Storage</li>\r\n</ul>\r\n\";}'),
(144, 72, 'publicAccess', '1'),
(145, 75, 'ldesc', 'a:1:{s:7:\"English\";s:153:\"<ul>\r\n	<li>50 Photos &amp; Guestbook</li>\r\n	<li>Photo Slideshow</li>\r\n	<li>Private QR Code &amp; URL (with PIN)</li>\r\n	<li>12 Month Storage</li>\r\n</ul>\r\n\";}'),
(146, 75, 'publicAccess', '1'),
(147, 77, 'ldesc', 'a:1:{s:7:\"English\";s:132:\"asdasdsad asdsad sa<br />\r\nd sadsad<br />\r\n&nbsp;sadsa<br />\r\n&nbsp;dasd&nbsp;<br />\r\nasd as<br />\r\ndas<br />\r\nd asd&nbsp;<br />\r\nas\";}'),
(148, 77, 'publicAccess', '1'),
(213, 99, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(214, 99, 'publicAccess', '0'),
(215, 99, 'Packagetype', '0'),
(339, 56, 'ldesc', 'a:1:{s:7:\"English\";s:268:\"<ul>\r\n	<li>Unlimited Photos,<br />\r\n	Guestbook Uploads</li>\r\n	<li>QR code and URL(with pin<br />\r\n	code)</li>\r\n	<li>12 Months Storage &amp;<br />\r\n	Zip Download</li>\r\n	<li><b>50 Photos Edited</b></li>\r\n	<li><b>4 Minutes Worth<br />\r\n	of Video Editing</b></li>\r\n</ul>\r\n\";}'),
(340, 56, 'publicAccess', '1'),
(341, 56, 'Packagetype', '1'),
(342, 12, 'ldesc', 'a:1:{s:7:\"English\";s:254:\"<ul>\r\n	<li>Unlimited Photos, Guestbook Uploads</li>\r\n	<li>QR code and URL(with pin code)</li>\r\n	<li>12 Months Storage &amp;<br />\r\n	Zip Download</li>\r\n	<li><b>100 Photos Edited</b></li>\r\n	<li><b>10 Minutes Worth<br />\r\n	of Video Editing</b></li>\r\n</ul>\r\n\";}'),
(343, 12, 'publicAccess', '1'),
(344, 12, 'Packagetype', '1'),
(345, 13, 'ldesc', 'a:1:{s:7:\"English\";s:251:\"<ul>\r\n	<li>Unlimited , Guestbook<br />\r\n	Uploads</li>\r\n	<li><b>Unlimited , Video<br />\r\n	Uploads</b></li>\r\n	<li>Private QR code And URL with (code<br />\r\n	pin)</li>\r\n	<li>12 Month Zip Download</li>\r\n	<li>40 minutes worth of video editing</li>\r\n</ul>\r\n\";}'),
(346, 13, 'publicAccess', '1'),
(347, 13, 'Packagetype', '1'),
(348, 104, 'ldesc', 'a:1:{s:7:\"English\";s:269:\"<ul>\r\n	<li>Unlimited Photos,<br />\r\n	Guestbook Uploads</li>\r\n	<li>Private QR code and URL(with pin<br />\r\n	code)</li>\r\n	<li>12 Months Storage &amp;<br />\r\n	Zip Download</li>\r\n	<li><b>250 Photos Edited</b></li>\r\n	<li><b>4 Minutes Worth of Video Editing</b></li>\r\n</ul>\r\n\";}'),
(349, 104, 'publicAccess', '1'),
(350, 104, 'Packagetype', '1'),
(351, 82, 'ldesc', 'a:1:{s:7:\"English\";s:186:\"<ul>\r\n	<li>Unlimited Photos,<br />\r\n	Guestbook uploads</li>\r\n	<li>Private QR Code &amp; URL (with<br />\r\n	PIN)</li>\r\n	<li><b>12 Month Storage &amp;<br />\r\n	Zip Download</b></li>\r\n</ul>\r\n\";}'),
(352, 82, 'publicAccess', '1'),
(353, 82, 'Packagetype', '1'),
(354, 89, 'ldesc', 'a:1:{s:7:\"English\";s:177:\"<ul>\r\n	<li><b>Unlimited Videos</b>, Photos,<br />\r\n	Guestbook Uploads</li>\r\n	<li>QR Code &amp; URL (with PIN)</li>\r\n	<li><b>12 Month Storage &amp; Zip Download</b></li>\r\n</ul>\r\n\";}'),
(355, 89, 'publicAccess', '1'),
(356, 89, 'Packagetype', '1'),
(357, 88, 'ldesc', 'a:1:{s:7:\"English\";s:197:\"<ul>\r\n	<li>Unlimited Videos, Photos, Guestbook</li>\r\n	<li><b>Unlimited Vidoes Uploads</b</li>\r\n	<li>Private QR Code &amp; URL (with PIN)</li>\r\n	<li>12 Month Storage &amp; Zip Download</li>\r\n</ul>\r\n\";}'),
(358, 88, 'publicAccess', '1'),
(359, 88, 'Packagetype', '1'),
(363, 102, 'ldesc', 'a:1:{s:7:\"English\";s:166:\"<ul>\r\n	<li>Unlimited Photos,<br />\r\n	Guestbook Uploads</li>\r\n	<li><b>Unlimited Video Uploads</b></li>\r\n	<li>12 Months Storage &amp;<br />\r\n	Zip Download</li>\r\n</ul>\r\n\";}'),
(364, 102, 'publicAccess', '1'),
(365, 102, 'Packagetype', '1'),
(366, 108, 'ldesc', 'a:1:{s:7:\"English\";s:0:\"\";}'),
(367, 108, 'publicAccess', '1'),
(368, 108, 'Packagetype', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `prosiz_id` int(11) NOT NULL,
  `prosiz_name` varchar(255) DEFAULT NULL,
  `prosiz_prodet_id` int(11) DEFAULT NULL,
  `prosiz_cur_id` int(11) DEFAULT NULL,
  `prosiz_price` varchar(255) DEFAULT NULL,
  `sizeGroup` varchar(250) DEFAULT NULL,
  `prosiz_timeStamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`prosiz_id`, `prosiz_name`, `prosiz_prodet_id`, `prosiz_cur_id`, `prosiz_price`, `sizeGroup`, `prosiz_timeStamp`) VALUES
(1, 'S', 1, 26, '100', '2', '2020-03-30 14:39:03'),
(3, 'M', 1, 26, '200', '2', '2020-03-30 14:39:03'),
(5, 'L', 1, 26, '300', '2', '2020-03-30 14:39:03'),
(7, 'XL', 1, 26, '400', '2', '2020-03-30 14:39:03'),
(9, 'S', 4, 26, '100', '1', '2020-03-09 08:45:28'),
(10, 'S', 4, 24, '100', '1', '2020-03-09 08:45:28'),
(11, 'M', 4, 26, '200', '1', '2020-03-09 08:45:28'),
(12, 'M', 4, 24, '200', '1', '2020-03-09 08:45:28'),
(13, 'L', 4, 26, '300', '1', '2020-03-09 08:45:28'),
(14, 'L', 4, 24, '300', '1', '2020-03-09 08:45:28'),
(15, 'XL', 4, 26, '400', '1', '2020-03-09 08:45:28'),
(16, 'XL', 4, 24, '400', '1', '2020-03-09 08:45:28'),
(17, 'XXL', 4, 26, '500', '1', '2020-03-09 08:45:28'),
(18, 'XXL', 4, 24, '500', '1', '2020-03-09 08:45:28'),
(19, 'S', 3, 26, '100', '2', '2020-03-30 16:02:40'),
(21, 'M', 3, 26, '200', '2', '2020-03-30 16:02:40'),
(23, 'L', 3, 26, '300', '2', '2020-03-30 16:02:40'),
(25, 'XL', 3, 26, '400', '2', '2020-03-30 16:02:40'),
(31, 'S', 7, 26, '50', '1', '2020-03-11 08:14:22'),
(32, 'S', 7, 24, '50', '1', '2020-03-11 08:14:22'),
(33, 'M', 7, 26, '50', '1', '2020-03-11 08:14:22'),
(34, 'M', 7, 24, '50', '1', '2020-03-11 08:14:22'),
(35, 'L', 7, 26, '50', '1', '2020-03-11 08:14:22'),
(36, 'L', 7, 24, '50', '1', '2020-03-11 08:14:22'),
(37, 'XL', 7, 26, '50', '1', '2020-03-11 08:14:22'),
(38, 'XL', 7, 24, '50', '1', '2020-03-11 08:14:22'),
(39, 'XXL', 7, 26, '50', '1', '2020-03-11 08:14:22'),
(40, 'XXL', 7, 24, '50', '1', '2020-03-11 08:14:22'),
(114, 'S', 1, 24, '100', '2', '2020-03-30 14:39:03'),
(115, 'M', 1, 24, '200', '2', '2020-03-30 14:39:03'),
(116, 'L', 1, 24, '300', '2', '2020-03-30 14:39:03'),
(117, 'XL', 1, 24, '400', '2', '2020-03-30 14:39:03'),
(122, 'S', 3, 24, '100', '2', '2020-03-30 16:02:40'),
(123, 'M', 3, 24, '200', '2', '2020-03-30 16:02:40'),
(124, 'L', 3, 24, '300', '2', '2020-03-30 16:02:40'),
(125, 'XL', 3, 24, '40', '2', '2020-03-30 16:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_size_custom`
--

CREATE TABLE `product_size_custom` (
  `custom_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `pId` int(11) NOT NULL,
  `currencyId` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_size_weight`
--

CREATE TABLE `product_size_weight` (
  `id` int(11) NOT NULL,
  `pwPId` int(11) NOT NULL,
  `pw_size` varchar(255) NOT NULL,
  `pw_weight` varchar(50) NOT NULL,
  `pw_unique` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_subscribe`
--

CREATE TABLE `product_subscribe` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL DEFAULT 0,
  `scale_id` int(11) NOT NULL DEFAULT 0,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `email` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'sale',
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proudct_detail`
--

CREATE TABLE `proudct_detail` (
  `prodet_id` int(11) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `prodet_name` text DEFAULT NULL,
  `prodet_shortDesc` text DEFAULT NULL,
  `product_discount_20` int(11) NOT NULL,
  `product_discount_23` int(11) NOT NULL,
  `product_discount_24` int(11) NOT NULL,
  `product_discount_25` int(11) NOT NULL,
  `product_update` int(11) NOT NULL DEFAULT 0,
  `prodet_addOn` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `feature` int(11) NOT NULL DEFAULT 0,
  `sale` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `prodet_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `proudct_detail`
--

INSERT INTO `proudct_detail` (`prodet_id`, `slug`, `prodet_name`, `prodet_shortDesc`, `product_discount_20`, `product_discount_23`, `product_discount_24`, `product_discount_25`, `product_update`, `prodet_addOn`, `sort`, `feature`, `sale`, `view`, `prodet_timeStamp`) VALUES
(11, '11', 'a:1:{s:7:\"English\";s:8:\"my Sport\";}', 'a:1:{s:7:\"English\";s:271:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}', 0, 0, 480, 0, 1, '2020-05-02 08:20:24', 6, 0, 0, 45, '2020-03-30 13:56:21'),
(14, '14', 'a:1:{s:7:\"English\";s:19:\"fashion of the year\";}', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', 0, 0, 50, 0, 1, '2020-05-02 08:19:24', 0, 0, 0, 36, '2020-03-30 14:40:22'),
(15, '15', 'a:1:{s:7:\"English\";s:9:\"Sport new\";}', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', 0, 0, 100, 0, 1, '2020-05-02 08:18:13', 1, 0, 0, 28, '2020-03-30 14:40:59'),
(18, '18', 'a:1:{s:7:\"English\";s:21:\"new Furniture Product\";}', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', 0, 0, 600, 0, 1, '2020-05-02 08:17:28', 2, 0, 0, 18, '2020-03-30 14:48:00'),
(21, '21', 'a:1:{s:7:\"English\";s:15:\"Product of Food\";}', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', 0, 0, 50, 0, 1, '2020-05-02 08:15:55', 3, 0, 0, 18, '2020-03-30 16:04:13'),
(40, '40', 'a:1:{s:7:\"English\";s:7:\"brand 1\";}', 'a:1:{s:7:\"English\";s:282:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot;&nbsp;</span>\";}', 0, 0, 100, 0, 1, '2020-05-02 08:15:21', 4, 0, 0, 15, '2020-04-04 09:46:41'),
(42, '42', 'a:1:{s:7:\"English\";s:7:\"brand 2\";}', 'a:1:{s:7:\"English\";s:292:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero&nbsp;</span>\";}', 0, 0, 500, 0, 1, '2020-05-02 08:10:42', 5, 0, 0, 22, '2020-04-04 09:50:58'),
(45, '45', 'a:1:{s:7:\"English\";s:14:\"Sale product 1\";}', 'a:1:{s:7:\"English\";s:353:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}', 0, 0, 200, 0, 1, '2020-05-02 07:49:44', 7, 0, 0, 17, '2020-04-04 10:12:52'),
(48, '45-5', 'a:1:{s:7:\"English\";s:14:\"Sale product 1\";}', 'a:1:{s:7:\"English\";s:353:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}', 0, 0, 20033, 0, 1, '2022-05-20 08:26:15', 8, 0, 0, 11, '2020-04-28 09:32:07'),
(65, '65', 'a:1:{s:7:\"English\";s:10:\"MY PRODUCT\";}', 'a:1:{s:7:\"English\";s:47:\"this&nbsp; product is&nbsp; for testing purpose\";}', 0, 0, 100, 0, 1, '2021-09-06 02:41:16', 11, 0, 0, 0, '2021-09-06 12:36:21'),
(240, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, '2023-07-19 05:59:00'),
(241, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, '2023-07-19 05:59:31'),
(242, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, '2023-07-19 07:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `proudct_detail_spb`
--

CREATE TABLE `proudct_detail_spb` (
  `prodet_id` int(11) NOT NULL,
  `p_code` int(11) DEFAULT NULL,
  `prac_id` int(11) DEFAULT NULL,
  `p_status` int(11) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `prodet_name` text DEFAULT NULL,
  `prodet_shortDesc` text DEFAULT NULL,
  `product_update` int(11) NOT NULL DEFAULT 0,
  `validity` int(11) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `page` varchar(11) NOT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `prodet_addOn` varchar(255) DEFAULT NULL,
  `image_size` varchar(3) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `feature` int(11) NOT NULL DEFAULT 0,
  `sale` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `packagetype` int(11) NOT NULL,
  `prodet_timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `proudct_detail_spb`
--

INSERT INTO `proudct_detail_spb` (`prodet_id`, `p_code`, `prac_id`, `p_status`, `slug`, `prodet_name`, `prodet_shortDesc`, `product_update`, `validity`, `category`, `page`, `payment_mode`, `prodet_addOn`, `image_size`, `sort`, `feature`, `sale`, `view`, `packagetype`, `prodet_timeStamp`) VALUES
(12, NULL, NULL, NULL, '12', 'a:1:{s:7:\"English\";s:8:\"STANDARD\";}', 'a:1:{s:7:\"English\";s:13:\"WITH EDITING \";}', 1, 1, 'Month', 'package', NULL, '2023-10-09 03:34:50', '100', 2, 0, 0, 0, 0, '2023-05-09 05:34:19'),
(13, NULL, NULL, NULL, '13', 'a:1:{s:7:\"English\";s:7:\"POPULAR\";}', 'a:1:{s:7:\"English\";s:13:\"WITH EDITING \";}', 1, 1, 'Month', 'package', NULL, '2023-10-09 03:35:40', '150', 3, 0, 0, 0, 0, '2023-05-09 05:35:08'),
(56, NULL, NULL, NULL, '56', 'a:1:{s:7:\"English\";s:5:\"BASIC\";}', 'a:1:{s:7:\"English\";s:13:\"WITH EDITING \";}', 1, 1, 'Month', 'package', NULL, '2023-10-09 03:33:44', '50', 1, 0, 0, 0, 0, '2023-08-08 07:15:12'),
(82, NULL, NULL, NULL, '82', 'a:1:{s:7:\"English\";s:5:\"BASIC\";}', 'a:1:{s:7:\"English\";s:16:\"WITHOUT EDITING \";}', 1, 1, 'Month', 'main', NULL, '2023-10-09 03:38:40', '50', 5, 0, 0, 0, 0, '2023-08-29 07:22:47'),
(88, NULL, NULL, NULL, '88', 'a:1:{s:7:\"English\";s:7:\"Popular\";}', 'a:1:{s:7:\"English\";s:15:\"WITHOUT EDITING\";}', 1, 1, 'Month', 'main', NULL, '2023-10-09 03:42:00', '500', 7, 0, 0, 0, 0, '2023-08-29 07:39:02'),
(89, NULL, NULL, NULL, '89', 'a:1:{s:7:\"English\";s:8:\"Standard\";}', 'a:1:{s:7:\"English\";s:16:\"WITHOUT EDITING \";}', 1, 1, 'Month', 'main', NULL, '2023-10-09 03:39:21', '500', 6, 0, 0, 0, 0, '2023-08-29 07:52:49'),
(102, NULL, NULL, NULL, '102', 'a:1:{s:7:\"English\";s:7:\"PREMUIM\";}', 'a:1:{s:7:\"English\";s:16:\"WITHOUT EDITING \";}', 1, 1, 'Month', 'main', NULL, '2023-10-09 03:45:13', '250', 8, 0, 0, 0, 0, '2023-09-27 11:14:21'),
(104, NULL, NULL, NULL, '104', 'a:1:{s:7:\"English\";s:7:\"PREMUIM\";}', 'a:1:{s:7:\"English\";s:13:\"WITH EDITING \";}', 1, 1, 'Month', 'package', NULL, '2023-10-09 03:37:29', '250', 4, 0, 0, 0, 0, '2023-09-27 11:26:21'),
(108, NULL, NULL, NULL, '108', 'a:1:{s:7:\"English\";s:3:\"hhh\";}', 'a:1:{s:7:\"English\";s:7:\"asdasda\";}', 1, 0, 'Month', '', NULL, '2023-11-09 08:54:04', '3', NULL, 0, 0, 0, 0, '2023-11-09 07:53:29'),
(109, NULL, NULL, NULL, '109', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2023-11-09 07:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt`
--

CREATE TABLE `purchase_receipt` (
  `receipt_pk` int(11) NOT NULL,
  `receipt_date` date DEFAULT NULL,
  `grn` varchar(250) NOT NULL,
  `prf` varchar(250) NOT NULL,
  `po_number` varchar(250) NOT NULL,
  `receiver` varchar(250) NOT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `store` int(11) NOT NULL,
  `note` varchar(500) NOT NULL,
  `Publish` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `p_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_receipt`
--

INSERT INTO `purchase_receipt` (`receipt_pk`, `receipt_date`, `grn`, `prf`, `po_number`, `receiver`, `vendor`, `store`, `note`, `Publish`, `dateTime`, `p_code`) VALUES
(1, '2020-03-25', 'GRN-1', 'PRF-123', 'PO-12344444', 'Admin', 'saad', 7, 'dsdfdfds', 1, '2020-03-26 01:20:53', 'b1,b2,b3,b4,b5'),
(2, '2020-03-27', 'GRN-2', 'PRF-456', 'PO-12344444', 'Admin', 'saad', 7, 'dfsfdfsddffsf', 1, '2020-03-27 17:30:40', 'p1,p2,p3,p4,p5');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt_dn`
--

CREATE TABLE `purchase_receipt_dn` (
  `receipt_pk` int(11) NOT NULL,
  `receipt_date` date DEFAULT NULL,
  `cp` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `dn` varchar(255) DEFAULT NULL,
  `prf` varchar(250) NOT NULL,
  `customer_po_ref` varchar(250) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `delivery_by` varchar(250) NOT NULL,
  `note` varchar(500) NOT NULL,
  `account_cd` varchar(250) NOT NULL,
  `publish` varchar(50) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt_gtn`
--

CREATE TABLE `purchase_receipt_gtn` (
  `receipt_pk` int(11) NOT NULL,
  `receipt_date` date DEFAULT NULL,
  `gtn` varchar(255) DEFAULT NULL,
  `prf` varchar(250) NOT NULL,
  `delivery` varchar(250) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `receiver` varchar(250) NOT NULL,
  `note` varchar(500) NOT NULL,
  `publish` varchar(250) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_receipt_gtn`
--

INSERT INTO `purchase_receipt_gtn` (`receipt_pk`, `receipt_date`, `gtn`, `prf`, `delivery`, `sender`, `receiver`, `note`, `publish`, `dateTime`) VALUES
(1, '2020-03-09', 'GTN-1', 'PRF-123', 'test', 'RM', 'testtttt', 'nnnnnnnnnnnnnnnn', 'publish', '2020-03-09 09:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt_ian`
--

CREATE TABLE `purchase_receipt_ian` (
  `receipt_pk` int(11) NOT NULL,
  `receipt_date` date DEFAULT NULL,
  `ian` varchar(255) DEFAULT NULL,
  `inspected_by` varchar(250) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `note` varchar(500) NOT NULL,
  `publish` varchar(250) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt_pro`
--

CREATE TABLE `purchase_receipt_pro` (
  `receipt_pro_pk` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `receipt_product_id` int(11) NOT NULL,
  `receipt_product_scale` int(11) NOT NULL,
  `receipt_product_color` int(11) NOT NULL,
  `receipt_price` varchar(255) DEFAULT NULL,
  `receipt_qty` int(11) NOT NULL,
  `receipt_hash` varchar(500) DEFAULT NULL COMMENT '"$pid:$pscaleId:$pcolorId:$storeId"',
  `p_code` varchar(250) NOT NULL,
  `store` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_receipt_pro`
--

INSERT INTO `purchase_receipt_pro` (`receipt_pro_pk`, `receipt_id`, `receipt_product_id`, `receipt_product_scale`, `receipt_product_color`, `receipt_price`, `receipt_qty`, `receipt_hash`, `p_code`, `store`) VALUES
(1, 1, 4, 9, 7, '100', 5, '550630c4b80777ff8efd8a465bfd768a', 'b1,b2,b3,b4,b5', 7),
(2, 2, 1, 1, 1, '100', 5, '6890155ae239884ab4181df94cd5589a', 'p1,p2,p3,p4,p5', 7);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt_pro_dn`
--

CREATE TABLE `purchase_receipt_pro_dn` (
  `receipt_pro_pk` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `receipt_product_id` int(11) NOT NULL,
  `receipt_product_scale` int(11) NOT NULL,
  `receipt_product_color` int(11) NOT NULL,
  `receipt_price` varchar(255) DEFAULT NULL,
  `receipt_qty` int(11) NOT NULL,
  `receipt_hash` varchar(500) DEFAULT NULL COMMENT '"$pid:$pscaleId:$pcolorId:$storeId"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt_pro_gtn`
--

CREATE TABLE `purchase_receipt_pro_gtn` (
  `receipt_pro_pk` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `receipt_product_id` int(11) NOT NULL,
  `receipt_product_scale` int(11) NOT NULL,
  `receipt_product_color` int(11) NOT NULL,
  `receipt_price` varchar(255) DEFAULT NULL,
  `receipt_qty` int(11) NOT NULL,
  `receipt_hash` varchar(500) DEFAULT NULL COMMENT '"$pid:$pscaleId:$pcolorId:$storeId"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_receipt_pro_gtn`
--

INSERT INTO `purchase_receipt_pro_gtn` (`receipt_pro_pk`, `receipt_id`, `receipt_product_id`, `receipt_product_scale`, `receipt_product_color`, `receipt_price`, `receipt_qty`, `receipt_hash`) VALUES
(2, 1, 3, 6, 7, '0', 50, '68519c6d37a3f1ac26243393df2a8aba');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt_pro_ian`
--

CREATE TABLE `purchase_receipt_pro_ian` (
  `receipt_pro_pk` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `receipt_product_id` int(11) NOT NULL,
  `receipt_product_store` int(11) NOT NULL,
  `receipt_product_ec` varchar(250) NOT NULL,
  `receipt_product_nc` varchar(255) DEFAULT NULL,
  `receipt_product_eqty` int(11) NOT NULL,
  `receipt_product_nqty` int(11) NOT NULL,
  `receipt_hash` varchar(500) DEFAULT NULL COMMENT '"$pid:$pscaleId:$pcolorId:$storeId"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_custom`
--

CREATE TABLE `p_custom` (
  `id` int(11) NOT NULL,
  `custom_type` varchar(250) DEFAULT NULL,
  `custom_fields` text DEFAULT NULL,
  `allowSubmitLater` int(11) NOT NULL DEFAULT 1,
  `publish` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_custom_setting`
--

CREATE TABLE `p_custom_setting` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `fieldName` varchar(250) DEFAULT NULL,
  `setting_name` varchar(500) NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_custom_submit`
--

CREATE TABLE `p_custom_submit` (
  `id` int(11) NOT NULL,
  `pInfo` varchar(250) DEFAULT NULL,
  `custom_id` int(11) NOT NULL DEFAULT 0,
  `actualPrice` int(11) NOT NULL DEFAULT 0,
  `submitLater` int(11) NOT NULL DEFAULT 0,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_custom_submit_setting`
--

CREATE TABLE `p_custom_submit_setting` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `setting_name` varchar(250) DEFAULT NULL,
  `setting_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ip` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommended`
--

CREATE TABLE `recommended` (
  `orderUser` varchar(200) DEFAULT NULL,
  `pId` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `removeqty`
--

CREATE TABLE `removeqty` (
  `id` int(11) NOT NULL,
  `qty` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `order` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `removeqty`
--

INSERT INTO `removeqty` (`id`, `qty`, `hash`, `order`) VALUES
(1, '10', '1f6e584d2d95ac2ff912eeeeb517629f', '14'),
(2, '9', '1f6e584d2d95ac2ff912eeeeb517629f', '15'),
(3, '10', '75264e5d68f7ad4a09b5cc7745d982f8', '16'),
(4, '10', '7a551897e7e0529212b7fd9890147cda', '17'),
(5, '10', '08b8a836c9e42ac9207234a2614f2128', '18');

-- --------------------------------------------------------

--
-- Table structure for table `return_product`
--

CREATE TABLE `return_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `invoice` varchar(100) NOT NULL,
  `qtyTotal` varchar(50) NOT NULL DEFAULT '0',
  `return_store` varchar(30) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `addInStock` varchar(50) NOT NULL DEFAULT '0',
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_product_list`
--

CREATE TABLE `return_product_list` (
  `id` int(11) NOT NULL,
  `rId` int(11) NOT NULL,
  `pId` varchar(50) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `user_id` varchar(250) NOT NULL,
  `comment` text DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `text2` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `place` varchar(250) DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `text3` varchar(250) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `r_id`, `type`, `user_id`, `comment`, `subject`, `text2`, `status`, `place`, `reply`, `text3`, `dateTime`) VALUES
(1, 0, '[value-3]', '[value-4]', 'Picture Perfect Edits exceeded my expectations! They\n                      truly unlocked the hidden potential of my photos,\n                      transforming them into breathtaking works of art.', 'Picture Perfect Edits: Unleash Your Photos\' Potential.', '[value-7]', 1, '[value-9]', '[value-10]', '[value-11]', '0000-00-00 00:00:00'),
(2, 0, '[value-3]', '[value-4]', 'Pixel Perfect: Transforming your photos with precision and expertise.\" \"Pixel Perfect: Elevating your images to perfection.\r\n                    ', 'Pixel Perfect: Your photos, perfected!', '[value-7]', 1, '[value-9]', '[value-10]', '[value-11]', '0000-00-00 00:00:00'),
(3, 0, '[value-3]', '[value-4]', 'I can\'t recommend the photo editing services enough! The level of expertise and attention to detail is exceptional. They took my visuals to new heights,enhancing every aspect of the images and leaving me in awe of the final results.       ', 'Exceptional Photo Edits: Elevate Your Visuals to New Heights.', '[value-7]', 1, '[value-9]', '[value-10]', '[value-11]', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `scales`
--

CREATE TABLE `scales` (
  `scale_id` int(11) NOT NULL,
  `scale_name_id` int(11) NOT NULL,
  `scale_name` text NOT NULL,
  `scale_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scales`
--

INSERT INTO `scales` (`scale_id`, `scale_name_id`, `scale_name`, `scale_timestamp`) VALUES
(1, 1, 'S', '2020-03-09 07:13:17'),
(2, 1, 'M', '2020-03-09 07:13:17'),
(3, 1, 'L', '2020-03-09 07:13:17'),
(4, 1, 'XL', '2020-03-09 07:13:17'),
(5, 1, 'XXL', '2020-03-09 07:13:17'),
(6, 2, 'S', '2020-03-09 07:13:56'),
(7, 2, 'M', '2020-03-09 07:13:56'),
(8, 2, 'L', '2020-03-09 07:13:56'),
(9, 2, 'XL', '2020-03-09 07:13:56'),
(10, 3, 'S', '2020-03-13 07:00:39'),
(11, 3, 'M', '2020-03-13 07:00:39'),
(12, 3, 'L', '2020-03-13 07:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `scale_name`
--

CREATE TABLE `scale_name` (
  `scaleName_id` int(11) NOT NULL,
  `scaleName_name` text NOT NULL,
  `scaleName_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scale_name`
--

INSERT INTO `scale_name` (`scaleName_id`, `scaleName_name`, `scaleName_timestamp`) VALUES
(1, 'Black_Jeans_Size', '2020-03-09 07:13:17'),
(2, 'T-shart_Size', '2020-03-09 07:13:56'),
(3, 'Men Denim Bib Pants Size', '2020-03-13 07:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `pageLink` varchar(250) NOT NULL,
  `ref_id` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `dsc` text DEFAULT NULL,
  `special` text DEFAULT NULL,
  `canonical` text DEFAULT NULL,
  `sIndex` int(11) DEFAULT NULL,
  `sFollow` int(11) DEFAULT NULL,
  `rewriteTitle` int(11) DEFAULT NULL,
  `author` text DEFAULT NULL,
  `revisit-after` varchar(50) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `publish` int(11) NOT NULL,
  `b1` text DEFAULT NULL,
  `b2` text DEFAULT NULL,
  `l1` text DEFAULT NULL,
  `l2` text DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `pageLink`, `ref_id`, `slug`, `title`, `keywords`, `dsc`, `special`, `canonical`, `sIndex`, `sFollow`, `rewriteTitle`, `author`, `revisit-after`, `type`, `publish`, `b1`, `b2`, `l1`, `l2`, `dateTime`) VALUES
(7, '/product-10', 'product-10', '10', 'a:1:{s:7:\"English\";s:15:\"fashion Product\";}', 'a:1:{s:7:\"English\";s:297:\"fashion Product, Fashion, <span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:271:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-03-30 13:56:21'),
(8, '/product-11', 'product-11', '11', 'a:1:{s:7:\"English\";s:8:\"my Sport\";}', 'a:1:{s:7:\"English\";s:289:\"my Sport, Sports, <span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:271:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-03-30 13:58:00'),
(9, '/pCategory-1281', 'pCategory-1281', '1281', 'a:1:{s:7:\"English\";s:7:\"Treding\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-03-30 14:24:08'),
(10, '/pCategory-1282', 'pCategory-1282', '1282', 'a:1:{s:7:\"English\";s:7:\"Fashion\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-03-30 14:34:39'),
(11, '/pCategory-1283', 'pCategory-1283', '1283', 'a:1:{s:7:\"English\";s:4:\"Food\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-03-30 14:34:50'),
(12, '/pCategory-1284', 'pCategory-1284', '1284', 'a:1:{s:7:\"English\";s:9:\"Furniture\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-03-30 14:35:10'),
(13, '/pCategory-1285', 'pCategory-1285', '1285', 'a:1:{s:7:\"English\";s:6:\"Sports\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-03-30 14:35:43'),
(14, '/product-14', 'product-14', '14', 'a:1:{s:7:\"English\";s:5:\"hello\";}', 'a:1:{s:7:\"English\";s:62:\"hello, Categories, Treding, Fashion, Food, Furniture, Sports, \";}', 'a:1:{s:7:\"English\";s:0:\"\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-03-30 14:42:00'),
(15, '/product-15', 'product-15', '15', 'a:1:{s:7:\"English\";s:9:\"Sport new\";}', 'a:1:{s:7:\"English\";s:300:\"Sport new, Categories, Food, Sports, <span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-03-30 14:44:20'),
(16, '/product-18', 'product-18', '18', 'a:1:{s:7:\"English\";s:21:\"new Furniture Product\";}', 'a:1:{s:7:\"English\";s:327:\"new Furniture Product, Categories, Treding, Fashion, Furniture, <span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-03-30 14:51:25'),
(17, '/product-21', 'product-21', '21', 'a:1:{s:7:\"English\";s:15:\"Product of Food\";}', 'a:1:{s:7:\"English\";s:298:\"Product of Food, Categories, Food, <span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:263:\"<span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow,&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-03-30 16:07:23'),
(18, '/products', '', NULL, 'a:1:{s:7:\"English\";s:8:\"Products\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 0, 0, 0, 'a:1:{s:7:\"English\";s:0:\"\";}', '', '', 1, 'a:1:{s:7:\"English\";s:62:\"http://php7.imdemo.xyz/LushLeather/uploads/images/banner/4.jpg\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '2020-04-01 11:35:36'),
(19, 'http://php7.imdemo.xyz/stitchingcotton/index.php', '', NULL, 'a:1:{s:7:\"English\";s:4:\"Home\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 1, 1, 1, 'a:1:{s:7:\"English\";s:0:\"\";}', '', 'website', 1, 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '2020-04-24 13:27:58'),
(20, '/product-35', 'product-35', '35', 'a:1:{s:7:\"English\";s:7:\"testing\";}', 'a:1:{s:7:\"English\";s:66:\"testing, Categories, Treding, Fashion, Food, Furniture, Sports, sd\";}', 'a:1:{s:7:\"English\";s:2:\"sd\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-04-03 07:04:10'),
(21, '/pCategory-1286', 'pCategory-1286', '1286', 'a:1:{s:7:\"English\";s:9:\"THE BRAND\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-04-03 07:26:11'),
(22, '/pCategory-1287', 'pCategory-1287', '1287', 'a:1:{s:7:\"English\";s:7:\"ON SALE\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-04-03 07:26:23'),
(23, '/product-40', 'product-40', '40', 'a:1:{s:7:\"English\";s:7:\"brand 1\";}', 'a:1:{s:7:\"English\";s:314:\"brand 1, Categories, THE BRAND, <span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot;&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:282:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot;&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-04-04 09:49:35'),
(24, '/product-42', 'product-42', '42', 'a:1:{s:7:\"English\";s:7:\"brand 2\";}', 'a:1:{s:7:\"English\";s:324:\"brand 2, Categories, THE BRAND, <span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:292:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-04-04 09:52:40'),
(25, '/product-45', 'product-45', '45', 'a:1:{s:7:\"English\";s:14:\"Sale product 1\";}', 'a:1:{s:7:\"English\";s:390:\"Sale product 1, Categories, ON SALE, <span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}', 'a:1:{s:7:\"English\";s:353:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-04-04 10:15:00'),
(26, '/product-45-5', 'product-48', '45-5', 'a:1:{s:7:\"English\";s:14:\"Sale product 1\";}', 'a:1:{s:7:\"English\";s:444:\"Sale product 1, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, <span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}', 'a:1:{s:7:\"English\";s:353:\"<span style=\"color: rgb(0, 0, 0); font-family: latomedium; font-size: 16px; text-align: center;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-04-28 09:33:01'),
(27, '/deal-', 'deal-1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1 week', 'dealProduct', 1, NULL, NULL, NULL, NULL, '2020-07-30 12:11:19'),
(28, '/product-55', 'product-55', '55', 'a:1:{s:7:\"English\";s:7:\"Testing\";}', 'a:1:{s:7:\"English\";s:9:\"Testing, \";}', 'a:1:{s:7:\"English\";s:0:\"\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2020-12-30 05:25:40'),
(29, '/product-61', 'product-61', '61', 'a:1:{s:7:\"English\";s:10:\"Product 09\";}', 'a:1:{s:7:\"English\";s:337:\"Product 09, Categories, Fashion, ON SALE, <span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}', 'a:1:{s:7:\"English\";s:295:\"<span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">It&#39;s hard to put together a meaningful UI prototype without making real requests to an API. By making real requests, you&#39;ll uncover problems with application flow, timing,&nbsp;</span>\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-08-02 06:29:08'),
(30, '/product-65', 'product-65', '65', 'a:1:{s:7:\"English\";s:10:\"MY PRODUCT\";}', 'a:1:{s:7:\"English\";s:80:\"MY PRODUCT, Categories, Treding, this&nbsp; product is&nbsp; for testing purpose\";}', 'a:1:{s:7:\"English\";s:47:\"this&nbsp; product is&nbsp; for testing purpose\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-09-06 12:41:16'),
(31, '/blog-disclaimer', 'blog-35', 'disclaimer', 'a:1:{s:7:\"English\";s:11:\"test title \";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-03 08:15:09'),
(32, '/product-175', 'product-171', '175', 'a:1:{s:7:\"English\";s:27:\"Gym Card-Lite ultra pro max\";}', 'a:1:{s:7:\"English\";s:114:\"Gym Card-Lite ultra pro max, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, adwadawdaw\";}', 'a:1:{s:7:\"English\";s:10:\"adwadawdaw\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-06 10:49:06'),
(33, '/product-173', 'product-173', '173', 'a:1:{s:7:\"English\";s:4:\"test\";}', 'a:1:{s:7:\"English\";s:87:\"test, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, dwadaw\";}', 'a:1:{s:7:\"English\";s:6:\"dwadaw\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-06 10:52:49'),
(34, '/product-175-4', 'product-175', '175-4', 'a:1:{s:7:\"English\";s:5:\"test3\";}', 'a:1:{s:7:\"English\";s:90:\"test3, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, awdwadaw\";}', 'a:1:{s:7:\"English\";s:8:\"awdwadaw\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-06 10:58:09'),
(35, '/product-180', 'product-180', '180', 'a:1:{s:7:\"English\";s:5:\"test3\";}', 'a:1:{s:7:\"English\";s:87:\"test3, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, adawd\";}', 'a:1:{s:7:\"English\";s:5:\"adawd\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-06 11:07:22'),
(36, '/product-182', 'product-182', '182', 'a:1:{s:7:\"English\";s:5:\"test6\";}', 'a:1:{s:7:\"English\";s:89:\"test6, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, dvvcvcv\";}', 'a:1:{s:7:\"English\";s:7:\"dvvcvcv\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-06 11:08:47'),
(37, '/product-184', 'product-184', '184', 'a:1:{s:7:\"English\";s:5:\"test0\";}', 'a:1:{s:7:\"English\";s:87:\"test0, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, test0\";}', 'a:1:{s:7:\"English\";s:5:\"test0\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-06 11:11:11'),
(38, '/product-189', 'product-189', '189', 'a:1:{s:7:\"English\";s:8:\"teshting\";}', 'a:1:{s:7:\"English\";s:93:\"teshting, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, teshting\";}', 'a:1:{s:7:\"English\";s:8:\"teshting\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-06 14:01:32'),
(39, '/product-194', 'product-194', '194', 'a:1:{s:7:\"English\";s:5:\"name1\";}', 'a:1:{s:7:\"English\";s:87:\"name1, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, name1\";}', 'a:1:{s:7:\"English\";s:5:\"name1\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-07 09:38:53'),
(40, '/product-199', 'product-199', '199', 'a:1:{s:7:\"English\";s:5:\"Levis\";}', 'a:1:{s:7:\"English\";s:84:\"Levis, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, ad\";}', 'a:1:{s:7:\"English\";s:2:\"ad\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-15 10:48:59'),
(41, '/product-201', 'product-201', '201', 'a:1:{s:7:\"English\";s:5:\"Levis\";}', 'a:1:{s:7:\"English\";s:87:\"Levis, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, Levis\";}', 'a:1:{s:7:\"English\";s:5:\"Levis\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-16 11:16:18'),
(42, '/product-205', 'product-205', '205', 'a:1:{s:7:\"English\";s:6:\"Wallet\";}', 'a:1:{s:7:\"English\";s:46:\"Wallet, Categories, Fashion, Leather Men Vault\";}', 'a:1:{s:7:\"English\";s:17:\"Leather Men Vault\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-22 07:01:26'),
(43, '/product-207', 'product-207', '207', 'a:1:{s:7:\"English\";s:6:\"Wallet\";}', 'a:1:{s:7:\"English\";s:47:\"Wallet, Categories, Fashion, Leather Man Wallet\";}', 'a:1:{s:7:\"English\";s:18:\"Leather Man Wallet\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2021-12-22 07:06:30'),
(44, '/pCategory-1288', 'pCategory-1288', '1288', 'a:1:{s:7:\"English\";s:11:\"Accessories\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-12-22 07:13:00'),
(45, '/pCategory-1289', 'pCategory-1289', '1289', 'a:1:{s:7:\"English\";s:11:\"Accessories\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-12-22 07:13:57'),
(46, '/blog--4', 'blog-36', '-4', 'a:1:{s:7:\"English\";s:13:\"My First Blog\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-22 07:52:23'),
(47, '/product-223', 'product-223', '223', 'a:1:{s:7:\"English\";s:20:\"Casual Cotton Jacket\";}', 'a:1:{s:7:\"English\";s:113:\"Casual Cotton Jacket, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, Accessories, xyz\";}', 'a:1:{s:7:\"English\";s:3:\"xyz\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2022-04-01 06:56:25'),
(48, '/product-233', 'product-233', '233', 'a:1:{s:7:\"English\";s:6:\"Wallet\";}', 'a:1:{s:7:\"English\";s:99:\"Wallet, Categories, Treding, Fashion, Food, Furniture, Sports, THE BRAND, ON SALE, Accessories, vvv\";}', 'a:1:{s:7:\"English\";s:3:\"vvv\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 1, 1, 1, 'a:1:{s:7:\"English\";s:0:\"\";}', '1 week', 'product', 1, 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:0:\"\";}', '2022-04-05 08:08:14'),
(49, '/product-56', '', NULL, 'a:1:{s:7:\"English\";s:9:\"Testing 1\";}', 'a:1:{s:7:\"English\";s:15:\"Testing 1, test\";}', 'a:1:{s:7:\"English\";s:4:\"test\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-08-08 07:16:30'),
(50, '/product-72', '', NULL, 'a:1:{s:7:\"English\";s:8:\"Testing \";}', 'a:1:{s:7:\"English\";s:54:\"Testing , This is silver package only have 5 images  1\";}', 'a:1:{s:7:\"English\";s:44:\"This is silver package only have 5 images  1\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-08-15 06:53:07'),
(51, '/product-75', '', NULL, 'a:1:{s:7:\"English\";s:12:\"Test Shakeeb\";}', 'a:1:{s:7:\"English\";s:26:\"Test Shakeeb, One location\";}', 'a:1:{s:7:\"English\";s:12:\"One location\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-08-15 08:29:56'),
(52, '/product-77', '', NULL, 'a:1:{s:7:\"English\";s:9:\"Testing 1\";}', 'a:1:{s:7:\"English\";s:55:\"Testing 1, This is silver package only have 5 images  1\";}', 'a:1:{s:7:\"English\";s:44:\"This is silver package only have 5 images  1\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-08-15 08:56:08'),
(53, '/product-82', '', NULL, 'a:1:{s:7:\"English\";s:5:\"BASIC\";}', 'a:1:{s:7:\"English\";s:33:\"BASIC, WITHOUT EDITING (Â£22 GBP)\";}', 'a:1:{s:7:\"English\";s:26:\"WITHOUT EDITING (Â£22 GBP)\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-08-29 07:24:16'),
(54, '/product-88', '', NULL, 'a:1:{s:7:\"English\";s:7:\"Popular\";}', 'a:1:{s:7:\"English\";s:35:\"Popular, WITHOUT EDITING (Â£78 GBP)\";}', 'a:1:{s:7:\"English\";s:26:\"WITHOUT EDITING (Â£78 GBP)\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-08-29 07:52:49'),
(55, '/product-89', '', NULL, 'a:1:{s:7:\"English\";s:8:\"Standard\";}', 'a:1:{s:7:\"English\";s:36:\"Standard, WITHOUT EDITING (Â£39 GBP)\";}', 'a:1:{s:7:\"English\";s:26:\"WITHOUT EDITING (Â£39 GBP)\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-08-29 07:54:23'),
(56, '/product-99', '', NULL, 'a:1:{s:7:\"English\";s:4:\"demo\";}', 'a:1:{s:7:\"English\";s:18:\"demo, One location\";}', 'a:1:{s:7:\"English\";s:12:\"One location\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-09-25 06:43:14'),
(57, '/product-102', '', NULL, 'a:1:{s:7:\"English\";s:7:\"PREMUIM\";}', 'a:1:{s:7:\"English\";s:9:\"PREMUIM, \";}', 'a:1:{s:7:\"English\";s:0:\"\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-09-27 11:18:28'),
(58, '/product-104', '', NULL, 'a:1:{s:7:\"English\";s:7:\"PREMUIM\";}', 'a:1:{s:7:\"English\";s:21:\"PREMUIM, With Editing\";}', 'a:1:{s:7:\"English\";s:12:\"With Editing\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-09-27 11:29:48'),
(59, '/product-108', '', NULL, 'a:1:{s:7:\"English\";s:3:\"hhh\";}', 'a:1:{s:7:\"English\";s:12:\"hhh, asdasda\";}', 'a:1:{s:7:\"English\";s:7:\"asdasda\";}', NULL, NULL, 1, 1, 1, NULL, '1 week', 'product', 1, NULL, NULL, NULL, NULL, '2023-11-09 07:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `seo1`
--

CREATE TABLE `seo1` (
  `id` int(11) NOT NULL,
  `pageLink` varchar(250) NOT NULL,
  `title` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `dsc` text DEFAULT NULL,
  `special` text DEFAULT NULL,
  `canonical` text DEFAULT NULL,
  `sIndex` int(11) DEFAULT NULL,
  `sFollow` int(11) DEFAULT NULL,
  `rewriteTitle` int(11) DEFAULT NULL,
  `author` text DEFAULT NULL,
  `revisit-after` varchar(50) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `publish` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo_slug`
--

CREATE TABLE `seo_slug` (
  `id` int(11) NOT NULL,
  `seo_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seo_slug`
--

INSERT INTO `seo_slug` (`id`, `seo_id`, `slug`, `lang`, `dateTime`) VALUES
(0, 18, '', 'English', '2020-04-01 11:35:36'),
(0, 19, '', 'English', '2020-04-24 13:27:58'),
(0, 48, '', 'English', '2022-04-05 08:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `hash` text DEFAULT NULL,
  `server_date` text DEFAULT NULL,
  `license_key` text DEFAULT NULL,
  `license_nonce` text NOT NULL,
  `expire_date` varchar(255) DEFAULT NULL,
  `expire_session` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `hash2` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `hash`, `server_date`, `license_key`, `license_nonce`, `expire_date`, `expire_session`, `status`, `hash2`) VALUES
(24, '', NULL, '', '', '1970-01-01', '2024-05-02', '0', 'cfcd208495d565ef66e7dff9f98764da');

-- --------------------------------------------------------

--
-- Table structure for table `setting_fields`
--

CREATE TABLE `setting_fields` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `setting_name` varchar(250) NOT NULL,
  `setting_val` text DEFAULT NULL,
  `table_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting_fields`
--

INSERT INTO `setting_fields` (`id`, `p_id`, `setting_name`, `setting_val`, `table_name`) VALUES
(4, 55, 'loginReq', '0', 'pages'),
(7, 52, 'loginReq', '0', 'pages'),
(10, 56, 'loginReq', '0', 'pages'),
(12, 57, 'loginReq', '0', 'pages'),
(15, 58, 'loginReq', '0', 'pages'),
(62, 20, 'loginReq', '0', 'pages'),
(64, 22, 'loginReq', '0', 'pages'),
(66, 23, 'loginReq', '0', 'pages'),
(67, 24, 'loginReq', '0', 'pages'),
(68, 25, 'loginReq', '0', 'pages'),
(75, 21, 'loginReq', '0', 'pages'),
(83, 19, 'loginReq', '0', 'pages');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shp_pk` int(11) NOT NULL,
  `shp_from` varchar(50) NOT NULL,
  `shp_to` varchar(50) NOT NULL,
  `shp_price` varchar(50) NOT NULL,
  `shp_price_code` varchar(50) NOT NULL,
  `shp_weight` varchar(50) DEFAULT '',
  `shp_int` int(11) NOT NULL DEFAULT 0,
  `hash` varchar(500) NOT NULL COMMENT 'from:to'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shp_pk`, `shp_from`, `shp_to`, `shp_price`, `shp_price_code`, `shp_weight`, `shp_int`, `hash`) VALUES
(9, 'PK', 'US', '100', 'PK', '1', 0, 'PK:US'),
(10, 'PK', 'PK', '100', 'PK', '0', 0, 'PK:PK');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_class`
--

CREATE TABLE `shipping_class` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` text DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shipping_class`
--

INSERT INTO `shipping_class` (`id`, `name`, `price`, `publish`) VALUES
(1, 'test', 'a:2:{i:20;s:1:\"1\";i:23;s:1:\"2\";}', 0),
(2, 'FRAKT KLASS-1 2-5 dagar', 'a:4:{i:24;s:3:\"120\";i:25;s:2:\"16\";i:23;s:3:\"115\";i:20;s:2:\"69\";}', 1),
(3, 'FRAKT KLASS 2', 'a:4:{i:24;s:3:\"170\";i:25;s:2:\"20\";i:23;s:3:\"150\";i:20;s:3:\"150\";}', 1),
(4, 'FRAKT KLASS BREV', 'a:4:{i:24;s:2:\"35\";i:25;s:1:\"5\";i:23;s:2:\"45\";i:20;s:2:\"35\";}', 1),
(5, 'GRATIS FRAKT', 'a:4:{i:24;s:1:\"0\";i:25;s:1:\"0\";i:23;s:1:\"0\";i:20;s:1:\"0\";}', 1),
(6, 'VÃ¤ntad i lager 20160710', 'a:4:{i:24;s:3:\"160\";i:25;s:2:\"16\";i:23;s:3:\"120\";i:20;s:3:\"100\";}', 1),
(7, 'Leveranstid 6 arbetsdagar', 'a:4:{i:24;s:3:\"150\";i:25;s:2:\"18\";i:23;s:3:\"135\";i:20;s:3:\"100\";}', 1),
(8, 'Leveranstid 6-12 arbetsdagar', 'a:4:{i:24;s:3:\"135\";i:25;s:2:\"16\";i:23;s:3:\"115\";i:20;s:2:\"69\";}', 1),
(9, 'Leveranstid 6-8 arbetsdagar', 'a:4:{i:24;s:3:\"120\";i:25;s:2:\"18\";i:23;s:3:\"115\";i:20;s:2:\"69\";}', 1),
(10, 'Custom made 12-20 dagar', 'a:4:{i:24;s:1:\"0\";i:25;s:1:\"0\";i:23;s:1:\"0\";i:20;s:1:\"0\";}', 1),
(11, 'Leveranstid 10-16 arbetsdagar', 'a:4:{i:24;s:3:\"150\";i:25;s:2:\"18\";i:23;s:3:\"115\";i:20;s:2:\"69\";}', 1),
(12, '3-12 day', 'a:2:{i:26;s:3:\"100\";i:24;s:3:\"100\";}', 1),
(13, '16 - 25 dagar', 'a:4:{i:24;s:2:\"69\";i:25;s:1:\"8\";i:23;s:2:\"69\";i:20;s:2:\"69\";}', 1),
(14, '2_day', 'a:2:{i:26;s:3:\"100\";i:24;s:3:\"100\";}', 1),
(15, '5-5 day', 'a:2:{i:26;s:3:\"100\";i:24;s:3:\"100\";}', 1),
(16, 'Testing Class', 'a:2:{i:26;s:3:\"550\";i:24;s:1:\"3\";}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE `slug` (
  `id` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `hash` varchar(150) NOT NULL,
  `targetId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp_recommends`
--

CREATE TABLE `sp_recommends` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sp_recommends`
--

INSERT INTO `sp_recommends` (`id`, `product_id`, `cat_id`, `publish`, `date_updated`, `sort`) VALUES
(132, 5218, 1205, 1, '2019-04-05 04:11:12', 0),
(133, 5281, 1201, 1, '2019-04-17 01:43:56', 0),
(134, 5419, 1221, 1, '2019-07-14 11:54:24', 0),
(135, 207, 1282, 1, '2021-12-22 08:21:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `shipping_country` text NOT NULL,
  `payment_type` text NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_to_save` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price_range_type` varchar(255) NOT NULL,
  `hash` text NOT NULL,
  `total_discount` int(11) NOT NULL,
  `min` float NOT NULL,
  `max` float NOT NULL,
  `avg` float NOT NULL,
  `cat` varchar(255) NOT NULL,
  `color` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `count` int(11) NOT NULL COMMENT 'storing discount count',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `shipping_country`, `payment_type`, `total_amount`, `total_quantity`, `user_id`, `name`, `id_to_save`, `type`, `price_range_type`, `hash`, `total_discount`, `min`, `max`, `avg`, `cat`, `color`, `size`, `date`, `comment`, `count`, `date_updated`) VALUES
(1, 'PK', '', 290, 1, 0, '', 3, 'product_row_daily', '', '1f6e584d2d95ac2ff912eeeeb517629f', 10, 290, 290, 290, '', 17, 19, '2021-07-14', '12\r\n', 1, '2021-08-02 07:22:05'),
(2, 'PK', '0', 0, 1, 0, 'Cash On Delivery', 3, 'product_row_payment_daily', '', '1f6e584d2d95ac2ff912eeeeb517629f', 0, 0, 0, 0, '', 0, 0, '2021-07-14', '', 0, '2021-08-02 07:22:05'),
(3, 'PK', '', 20000, 100, 0, '', 12, 'product_row_daily', '', '2fa9d515e525b3785d39e111a5a2221c', 0, 20000, 20000, 200, '', 37, 41, '2021-07-14', '13\r\n', 0, '2021-08-02 07:22:05'),
(4, 'PK', '0', 0, 1, 0, 'Cash On Delivery', 12, 'product_row_payment_daily', '', '2fa9d515e525b3785d39e111a5a2221c', 0, 0, 0, 0, '', 0, 0, '2021-07-14', '', 0, '2021-08-02 07:22:05'),
(5, 'US', '', 200, 1, 0, '', 10, 'product_row_daily', '', 'aff9d92d519bf1edfb277f0d29c2d714', 0, 200, 200, 200, '', 0, 0, '2021-07-15', '107\r\n', 0, '2021-08-02 07:22:05'),
(6, 'US', '0', 0, 1, 0, 'Cash On Delivery', 10, 'product_row_payment_daily', '', 'aff9d92d519bf1edfb277f0d29c2d714', 0, 0, 0, 0, '', 0, 0, '2021-07-15', '', 0, '2021-08-02 07:22:05'),
(7, 'US', '', 200, 1, 0, '', 45, 'product_row_daily', '', '01cea5fdc8ac68735f0ac9307ed24fea', 0, 200, 200, 200, '', 0, 0, '2021-07-26', '108\r\n', 0, '2021-08-02 07:22:05'),
(8, 'US', '0', 0, 1, 0, 'Cash On Delivery', 45, 'product_row_payment_daily', '', '01cea5fdc8ac68735f0ac9307ed24fea', 0, 0, 0, 0, '', 0, 0, '2021-07-26', '', 0, '2021-08-02 07:22:05'),
(9, 'US', '', 500, 5, 0, '', 15, 'product_row_daily', '', '73cadc75d121107990515249cbdfc34d', 0, 100, 300, 500, '', 0, 0, '2021-08-02', '109\r\n', 0, '2021-08-02 07:22:05'),
(10, 'US', '0', 0, 2, 0, 'Cash On Delivery', 15, 'product_row_payment_daily', '', '73cadc75d121107990515249cbdfc34d', 0, 0, 0, 0, '', 0, 0, '2021-08-02', '', 0, '2021-08-02 07:22:05'),
(11, 'US', '', 20033, 1, 0, '', 48, 'product_row_daily', '', '7a8c62a0910ad194d62abf96c567440c', 0, 20033, 20033, 20033, '', 0, 0, '2021-08-02', '112\r\n', 0, '2021-08-02 07:22:05'),
(12, 'US', '0', 0, 1, 0, 'Cash On Delivery', 48, 'product_row_payment_daily', '', '7a8c62a0910ad194d62abf96c567440c', 0, 0, 0, 0, '', 0, 0, '2021-08-02', '', 0, '2021-08-02 07:22:05'),
(13, 'US', '', 480, 1, 0, '', 11, 'product_row_daily', '', '7ef7d4979afb63bc4c2da5d29c9ac718', 20, 480, 480, 480, '', 0, 0, '2021-08-02', '113\r\n', 1, '2021-08-02 07:22:05'),
(14, 'US', '0', 0, 1, 0, 'Cash On Delivery', 11, 'product_row_payment_daily', '', '7ef7d4979afb63bc4c2da5d29c9ac718', 0, 0, 0, 0, '', 0, 0, '2021-08-02', '', 0, '2021-08-02 07:22:05'),
(15, 'US', '', 150, 3, 0, '', 14, 'product_row_daily', '', 'a0eeb5ef5911a9d4d4002aed4318e38b', 0, 50, 100, 150, '', 0, 0, '2022-03-10', '10\r\n', 0, '2022-03-10 11:39:35'),
(16, 'US', '0', 0, 1, 0, 'Cash On Delivery', 14, 'product_row_payment_daily', '', 'a0eeb5ef5911a9d4d4002aed4318e38b', 0, 0, 0, 0, '', 0, 0, '2022-03-10', '', 0, '2022-03-10 11:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `statistics_order_invoice_status`
--

CREATE TABLE `statistics_order_invoice_status` (
  `id` int(11) NOT NULL,
  `order_invoice_pk` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `calculated` tinyint(4) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='used to track if payment_type for an order product has been calculated or not';

-- --------------------------------------------------------

--
-- Table structure for table `store_name`
--

CREATE TABLE `store_name` (
  `store_pk` int(11) NOT NULL,
  `store_owner` varchar(255) DEFAULT NULL,
  `store_location` varchar(255) DEFAULT NULL,
  `store_country` varchar(50) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `store_name`
--

INSERT INTO `store_name` (`store_pk`, `store_owner`, `store_location`, `store_country`, `store_name`, `store_desc`) VALUES
(7, 'saad', 'karachi', 'PK', 'imedia', 'imedia Description '),
(8, 'ali', 'karachi', 'PK', 'imedia_2', 'nnnnnnnnnnnnn'),
(9, 'saad', 'karachi', 'US', 'imedia_dubai', 'abcccc');

-- --------------------------------------------------------

--
-- Table structure for table `surveyformdata`
--

CREATE TABLE `surveyformdata` (
  `id` int(11) NOT NULL,
  `field9` text NOT NULL,
  `field8` int(11) NOT NULL,
  `field7` int(11) NOT NULL,
  `field6` text NOT NULL,
  `field5` text NOT NULL,
  `field4` text NOT NULL,
  `field3` text NOT NULL,
  `field2` text NOT NULL,
  `field1` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `currentdatetimePrint` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surveyformdata`
--

INSERT INTO `surveyformdata` (`id`, `field9`, `field8`, `field7`, `field6`, `field5`, `field4`, `field3`, `field2`, `field1`, `type`, `currentdatetimePrint`, `comment`) VALUES
(17, '', 0, 0, '', '', 'Meg:fsdf', 'Mobile:45456', 'Email:myousufalvi99@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:53:36', ''),
(16, '', 0, 0, '', '', 'Meg:fsdf', 'Mobile:45456', 'Email:myousufalvi99@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:53:14', ''),
(15, '', 0, 0, '', '', 'Meg:fsdf', 'Mobile:45456', 'Email:myousufalvi99@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:51:17', ''),
(14, '', 0, 0, '', '', 'Meg:fsdf', 'Mobile:45456', 'Email:myousufalvi99@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:49:45', ''),
(13, '', 0, 0, '', '', 'Meg:test', 'Mobile:123456789', 'Email:hammad@im.com.pk', 'Name:hammad', 'BUSINESS PACKAGES', '2023-09-05 12:45:40', ''),
(7, '', 0, 0, '', '', 'Meg:sdasd', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-08-29 15:37:34', ''),
(8, '', 0, 0, '', '', 'Meg:sdasd', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-08-29 15:39:32', ''),
(9, '', 0, 0, '', '', 'Meg:sdasd', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-08-29 15:43:51', ''),
(10, '', 0, 0, '', '', 'Meg:sdasd', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-08-29 15:46:29', ''),
(11, '', 0, 0, '', '', 'Meg:sdasd', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-08-29 15:46:40', ''),
(12, '', 0, 0, '', '', 'Meg:sdasd', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-08-29 15:47:19', ''),
(18, '', 0, 0, '', '', 'Meg:fdfds', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:53:56', ''),
(19, '', 0, 0, '', '', 'Meg:fdfds', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:54:59', ''),
(20, '', 0, 0, '', '', 'Meg:fdfds', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:Yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:55:19', ''),
(21, '', 0, 0, '', '', 'Meg:dfsdf', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:57:04', 'ASD'),
(22, '', 0, 0, '', '', 'Meg:dfsdf', 'Mobile:45456', 'Email:man411210@gmail.com', 'Name:yousuf', 'BUSINESS PACKAGES', '2023-09-05 12:58:18', 'shakeeb');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `name`, `value`, `dateTime`) VALUES
(1863, 'Query', 'SELECT `detail`.*, `setting`.`setting_val`\n\nFROM\n`proudct_detail` as detail join `product_setting` as setting\non `detail`.`prodet_id` = `setting`.`p_id`\nWHERE\n`setting`.`setting_name`=\'publicAccess\'\nAND `setting`.`setting_val`=\'1\'\nAND `detail`.`product_update`=\'1\'  ORDER BY sort ASC', '2023-03-16 06:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `temp_accounts_user`
--

CREATE TABLE `temp_accounts_user` (
  `id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `acc_id_str` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `temp_accounts_user`
--

INSERT INTO `temp_accounts_user` (`id`, `acc_id`, `acc_id_str`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '3'),
(7, 4, '4'),
(12, 5, '5'),
(13, 6, '6'),
(14, 7, '7'),
(15, 8, '8'),
(16, 9, '9'),
(17, 10, '10'),
(18, 11, '11'),
(19, 12, '12'),
(20, 13, '13'),
(21, 14, '14'),
(22, 15, '15'),
(23, 16, '16'),
(24, 17, '17'),
(25, 18, '18'),
(26, 19, '19'),
(27, 20, '20'),
(28, 21, '21'),
(29, 22, '22'),
(30, 23, '23'),
(31, 24, '24'),
(32, 25, '25'),
(33, 26, '26'),
(34, 27, '27'),
(35, 28, '28'),
(36, 29, '29'),
(37, 30, '30'),
(38, 31, '31'),
(39, 32, '32'),
(40, 33, '33'),
(41, 34, '34'),
(42, 35, '35'),
(43, 36, '36'),
(44, 37, '37'),
(45, 38, '38'),
(46, 39, '39'),
(47, 40, '40'),
(48, 41, '41'),
(49, 42, '42'),
(50, 43, '43'),
(51, 44, '44'),
(52, 45, '45'),
(53, 46, '46'),
(54, 47, '47'),
(66, 59, '59'),
(70, 63, '63'),
(71, 64, '64'),
(74, 67, '67'),
(75, 68, '68'),
(76, 69, '69'),
(77, 70, '70'),
(78, 71, '71'),
(79, 72, '72'),
(80, 73, '73'),
(81, 74, '74'),
(82, 75, '75'),
(83, 76, '76'),
(84, 77, '77'),
(85, 78, '78'),
(86, 79, '79'),
(87, 80, '80'),
(88, 81, '81'),
(89, 82, '82'),
(90, 83, '83'),
(91, 84, '84'),
(92, 85, '85'),
(93, 86, '86'),
(94, 87, '87'),
(95, 88, '88'),
(96, 89, '89'),
(97, 90, '90'),
(98, 91, '91'),
(99, 92, '92'),
(100, 93, '93'),
(101, 94, '94'),
(102, 95, '95'),
(103, 96, '96'),
(104, 97, '97');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `testimonial_link` text DEFAULT NULL,
  `testimonial_heading` text DEFAULT NULL,
  `testimonial_shrtDesc` text DEFAULT NULL,
  `testimonial_image` text DEFAULT NULL,
  `testimonial_position` text DEFAULT NULL,
  `testimonial_email` text DEFAULT NULL,
  `testimonial_date` text DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `testimonial_link`, `testimonial_heading`, `testimonial_shrtDesc`, `testimonial_image`, `testimonial_position`, `testimonial_email`, `testimonial_date`, `publish`, `sort`) VALUES
(1, '', 'a:1:{s:7:\"English\";s:4:\"test\";}', 'a:1:{s:7:\"English\";s:6:\"adwada\";}', 'a:1:{s:7:\"English\";s:32:\"{{WEB_URL}}/uploads/images/4.jpg\";}', 'a:1:{s:7:\"English\";s:3:\"CEO\";}', 'a:1:{s:7:\"English\";s:19:\"hsaad3396@gmail.com\";}', 'a:1:{s:7:\"English\";s:10:\"2021-12-01\";}', 1, NULL),
(2, '', 'a:1:{s:7:\"English\";s:4:\"test\";}', 'a:1:{s:7:\"English\";s:7:\"adadwdw\";}', 'a:1:{s:7:\"English\";s:32:\"{{WEB_URL}}/uploads/images/2.png\";}', 'a:1:{s:7:\"English\";s:3:\"CEO\";}', 'a:1:{s:7:\"English\";s:19:\"hsaad3396@gmail.com\";}', 'a:1:{s:7:\"English\";s:10:\"2021-12-02\";}', 1, NULL),
(10, '', 'a:1:{s:7:\"English\";s:5:\"test3\";}', 'a:1:{s:7:\"English\";s:9:\"nuukomkim\";}', 'a:1:{s:7:\"English\";s:51:\"https://demo.ubrands.biz/uploads/images/profile.png\";}', 'a:1:{s:7:\"English\";s:3:\"CEO\";}', 'a:1:{s:7:\"English\";s:19:\"hsaad3396@gmail.com\";}', 'a:1:{s:7:\"English\";s:10:\"2021-12-01\";}', 0, NULL),
(12, '', 'a:1:{s:7:\"English\";s:11:\"hello peter\";}', 'a:1:{s:7:\"English\";s:8:\"adwadadd\";}', 'a:1:{s:7:\"English\";s:32:\"{{WEB_URL}}/uploads/images/4.jpg\";}', 'a:1:{s:7:\"English\";s:3:\"CEO\";}', 'a:1:{s:7:\"English\";s:19:\"hsaad3396@gmail.com\";}', 'a:1:{s:7:\"English\";s:10:\"2021-12-01\";}', 1, NULL),
(13, '', 'a:1:{s:7:\"English\";s:5:\"test3\";}', 'a:1:{s:7:\"English\";s:8:\"adasdasd\";}', 'a:1:{s:7:\"English\";s:51:\"https://demo.ubrands.biz/uploads/images/profile.png\";}', 'a:1:{s:7:\"English\";s:3:\"CEO\";}', 'a:1:{s:7:\"English\";s:19:\"hsaad3396@gmail.com\";}', 'a:1:{s:7:\"English\";s:10:\"2021-12-01\";}', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tree_data`
--

CREATE TABLE `tree_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `nm` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tree_struct`
--

CREATE TABLE `tree_struct` (
  `id` int(10) UNSIGNED NOT NULL,
  `lft` int(10) UNSIGNED NOT NULL,
  `rgt` int(10) UNSIGNED NOT NULL,
  `lvl` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `pos` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(111) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `file_path` text NOT NULL,
  `file_type` varchar(120) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `account_id`, `product_id`, `file_name`, `file_path`, `file_type`, `description`, `sort`, `status`) VALUES
(617, 46, 227, '', 'dropfile/album_new/2023/09/_228_img2.png', 'image', '', 0, 0),
(618, 46, 227, '', 'dropfile/album_new/2023/09/_574_img.jpeg', 'image', '', 0, 0),
(621, 46, 227, '', 'dropfile/album_new/2023/09/_109_img.jpeg', 'image', '', 0, 0),
(622, 46, 227, '', 'dropfile/album_new/2023/09/_261_img2.png', 'image', '', 0, 0),
(623, 46, 228, '', 'dropfile/album_new/2023/09/_957_img.jpeg', 'image', '', 0, 0),
(625, 46, 229, '', 'dropfile/album_new/2023/09/_854_Supporting community and creating jobs.jpg', 'image', '', 0, 0),
(626, 46, 229, '', 'dropfile/album_new/2023/09/_703_Helping SMEa€™s.jpg', 'image', '', 0, 0),
(627, 46, 229, '', 'dropfile/album_new/2023/09/_157_personal assistent.jpg', 'image', '', 0, 0),
(628, 46, 229, '', 'dropfile/album_new/2023/09/_664_Finance Consultant.jpg', 'image', '', 0, 0),
(629, 46, 229, '', 'dropfile/album_new/2023/09/_737_Supporting community and creating jobs.jpg', 'image', '', 0, 0),
(630, 46, 229, '', 'dropfile/album_new/2023/09/_672_Helping SMEa€™s.jpg', 'image', '', 0, 0),
(631, 46, 229, '', 'dropfile/album_new/2023/09/_742_personal assistent.jpg', 'image', '', 0, 0),
(632, 46, 229, '', 'dropfile/album_new/2023/09/_249_Finance Consultant.jpg', 'image', '', 0, 0),
(633, 46, 229, '', 'dropfile/album_new/2023/09/_199_arrangement-finances-elements-graph-with-medical-mask.jpg', 'image', '', 0, 0),
(634, 46, 229, '', 'dropfile/album_new/2023/09/_155_arrangement-finances-elements-graph-with-medical-mask.jpg', 'image', '', 0, 0),
(635, 46, 229, '', 'dropfile/album_new/2023/09/_626_beautiful-woman-drinking-cup-coffee.jpg', 'image', '', 0, 0),
(636, 46, 229, '', 'dropfile/album_new/2023/09/_518_Supporting community and creating jobs.jpg', 'image', '', 0, 0),
(637, 46, 229, '', 'dropfile/album_new/2023/09/_923_Supporting community and creating jobs.jpg', 'image', '', 0, 0),
(638, 46, 229, '', 'dropfile/album_new/2023/09/_774_img2.png', 'image', '', 0, 0),
(639, 46, 229, '', 'dropfile/album_new/2023/09/_892_img2.png', 'image', '', 0, 0),
(640, 46, 229, '', 'dropfile/album_new/2023/09/_452_img.jpeg', 'image', '', 0, 0),
(641, 46, 229, '', 'dropfile/album_new/2023/09/_240_img.jpeg', 'image', '', 0, 0),
(642, 46, 229, '', 'dropfile/album_new/2023/09/_363_img2.png', 'image', '', 0, 0),
(643, 46, 227, '', 'dropfile/album_new/2023/09/_611_img.jpeg', 'image', '', 0, 0),
(644, 46, 227, '', 'dropfile/album_new/2023/09/_616_img2.png', 'image', '', 0, 0),
(645, 46, 227, '', 'dropfile/album_new/2023/09/_182_img.jpeg', 'image', '', 0, 0),
(646, 46, 229, '', 'dropfile/album_new/2023/09/_464_img2.png', 'image', '', 0, 0),
(647, 46, 228, '', 'dropfile/album_new/2023/09/_405_img2.png', 'image', '', 0, 0),
(648, 46, 228, '', 'dropfile/album_new/2023/09/_503_img.jpeg', 'image', '', 0, 0),
(649, 46, 229, '', 'dropfile/album_new/2023/09/_951_img2.png', 'image', '', 0, 0),
(650, 46, 229, '', 'dropfile/album_new/2023/09/_168_img2.png', 'image', '', 0, 0),
(651, 46, 229, '', 'dropfile/album_new/2023/09/_526_img2.png', 'image', '', 0, 0),
(652, 46, 229, '', 'dropfile/album_new/2023/09/_863_img.jpeg', 'image', '', 0, 0),
(653, 46, 229, '', 'dropfile/album_new/2023/09/_910_img2.png', 'image', '', 0, 0),
(654, 46, 229, '', 'dropfile/album_new/2023/09/_815_img.jpeg', 'image', '', 0, 0),
(659, 46, 232, '', 'dropfile/album_new/2023/09/_892_Supporting community and creating jobs.jpg', 'image', '', 0, 0),
(660, 46, 232, '', 'dropfile/album_new/2023/09/_979_Helping SMEs.jpg', 'image', '', 0, 0),
(661, 46, 232, '', 'dropfile/album_new/2023/09/_575_personal assistent.jpg', 'image', '', 0, 0),
(662, 46, 232, '', 'dropfile/album_new/2023/09/_238_Finance Consultant.jpg', 'image', '', 0, 0),
(664, 46, 232, '', 'dropfile/album_new/2023/09/_477_handshake.jpg', 'image', '', 0, 0),
(665, 46, 232, '', 'dropfile/album_new/2023/09/_673_market.jpg', 'image', '', 0, 0),
(666, 46, 232, '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', 'link', '', 0, 1),
(667, 46, 232, '', 'dropfile/album_new/2023/09/_513_2023-07-24_15-43-52.jpg', 'image', '', 0, 0),
(668, 46, 232, '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', 'link', '', 0, 1),
(669, 46, 232, '', 'dsxvc', 'link', '', 0, 1),
(670, 46, 232, '', 'dsxvc', 'link', '', 0, 0),
(671, 46, 232, '', 'dsxvc', 'link', '', 0, 0),
(672, 46, 232, '', 'dropfile/album_new/2023/09/_163_img.jpeg', 'image', '', 0, 1),
(673, 46, 232, '', 'dropfile/album_new/2023/09/_341_img2.png', 'image', '', 0, 1),
(674, 46, 231, '', 'dropfile/album_new/2023/09/_248_img.jpeg', 'image', '', 0, 1),
(675, 46, 231, '', 'dropfile/album_new/2023/09/_176_img2.png', 'image', '', 0, 1),
(676, 46, 231, '', 'www.youtube.com', 'link', '', 0, 1),
(678, 46, 230, '', 'dropfile/album_new/2023/09/_439_img.jpeg', 'image', '', 0, 0),
(679, 46, 230, '', 'dropfile/album_new/2023/09/_216_img2.png', 'image', '', 0, 0),
(680, 46, 230, '', 'www.youtube.com', 'link', '', 0, 0),
(681, 46, 234, '', 'dropfile/album_new/2023/09/_196_img.jpeg', 'image', '', 0, 0),
(682, 46, 234, '', 'dropfile/album_new/2023/09/_795_img2.png', 'image', '', 0, 0),
(683, 46, 233, '', 'dropfile/album_new/2023/09/_495_img.jpeg', 'image', '', 0, 1),
(684, 46, 233, '', 'dropfile/album_new/2023/09/_395_img2.png', 'image', '', 0, 1),
(685, 46, 234, '', 'dropfile/album_new/2023/09/_744_img.jpeg', 'image', '', 0, 0),
(686, 46, 234, '', 'dropfile/album_new/2023/09/_679_img2.png', 'image', '', 0, 0),
(688, 46, 234, '', 'www.youtube.com', 'link', '', 0, 0),
(689, 46, 234, '', 'www.youtube.com', 'link', '', 0, 0),
(690, 46, 234, '', 'www.youtube.com', 'link', '', 0, 0),
(691, 46, 233, '', 'www.youtube.com', 'link', '', 0, 1),
(692, 46, 234, '', 'dropfile/album_new/2023/09/_779_img2.png', 'image', '', 0, 0),
(694, 46, 233, '', 'www.youtube.com', 'link', '', 0, 1),
(695, 46, 233, '', 'dsxvc', 'link', '', 0, 1),
(696, 46, 234, '', 'dsxvc', 'link', '', 0, 0),
(697, 46, 234, '', 'www.youtube.com', 'link', '', 0, 0),
(698, 46, 235, '', 'dropfile/album_new/2023/09/_549_img2.png', 'image', '', 0, 1),
(699, 46, 235, '', 'https://google.com', 'link', '', 0, 1),
(701, 46, 235, '', 'https://google.com', 'link', '', 0, 1),
(702, 46, 235, '', 'https://google.com', 'link', '', 0, 1),
(703, 46, 236, '', 'dropfile/album_new/2023/09/_625_img.jpeg', 'image', '', 0, 0),
(713, 46, 236, '', 'dropfile/album_new/2023/09/_119_img2.png', 'image', '', 0, 0),
(716, 46, 236, '', 'https:www.youtube.com', 'link', '', 0, 0),
(717, 46, 236, '', 'www.youtube.com', 'link', '', 0, 0),
(719, 46, 236, '', 'www.youtube.com', 'link', '', 0, 0),
(724, 42, 237, '', 'dropfile/album_new/2023/09/_361_3682321.png', 'image', '', 0, 0),
(725, 42, 237, '', 'dropfile/album_new/2023/09/_671_goBack_icn.png', 'image', '', 0, 0),
(726, 42, 237, '', 'dropfile/album_new/2023/09/_718_send_btn.png', 'image', '', 0, 0),
(766, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(767, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(769, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(770, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(771, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(772, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(773, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(775, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(778, 42, 237, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(779, 44, 226, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(780, 44, 226, '', 'dropfile/album_new/2023/09/_338_579-logo.png', 'image', '', 0, 0),
(781, 44, 226, '', 'dropfile/album_new/2023/09/_875_istockphoto-1146517111-612x612.jpg', 'image', '', 0, 0),
(782, 44, 226, '', 'dropfile/album_new/2023/09/_955_pexels-pixabay-220453.jpg', 'image', '', 0, 0),
(783, 44, 226, '', 'dropfile/album_new/2023/09/_524_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(784, 44, 240, '', 'dropfile/album_new/2023/09/_859_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(785, 44, 240, '', 'dropfile/album_new/2023/09/_227_579-logo.png', 'image', '', 0, 0),
(786, 44, 240, '', 'dropfile/album_new/2023/09/_600_istockphoto-1146517111-612x612.jpg', 'image', '', 0, 0),
(787, 44, 240, '', 'dropfile/album_new/2023/09/_136_pexels-pixabay-220453.jpg', 'image', '', 0, 0),
(788, 44, 240, '', 'dropfile/album_new/2023/09/_110_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(796, 44, 240, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(802, 46, 241, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 1),
(803, 46, 241, '', 'dropfile/album_new/2023/09/_315_pexels-pixabay-220453.jpg', 'image', '', 0, 1),
(804, 46, 241, '', 'dropfile/album_new/2023/09/_370_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 1),
(806, 85, 251, '', 'dropfile/album/2023/09/_420_wallpaperflare.com_wallpaper (2).jpg', 'image', '', 0, 1),
(807, 86, 252, '', 'dropfile/album/2023/09/_842_3682321.png', 'image', '', 0, 0),
(808, 85, 251, '', 'dropfile/album_new/2023/09/_177_Supporting community and creating jobs.jpg', 'image', '', 0, 1),
(809, 85, 251, '', 'dropfile/album_new/2023/09/_851_Helping SMEs.jpg', 'image', '', 0, 1),
(810, 85, 251, '', 'dropfile/album_new/2023/09/_644_personal assistent.jpg', 'image', '', 0, 1),
(811, 85, 251, '', 'dropfile/album_new/2023/09/_503_Finance Consultant.jpg', 'image', '', 0, 1),
(815, 85, 251, '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', 'link', '', 0, 1),
(816, 86, 252, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(817, 86, 252, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(818, 86, 252, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(819, 44, 238, '', 'dropfile/album/2023/09/_108_3682321.png', 'image', '', 0, 0),
(820, 85, 253, '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', 'link', '', 0, 0),
(821, 85, 253, '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', 'link', '', 0, 0),
(823, 85, 253, '', 'dropfile/album/2023/09/_478_wallpaperflare.com_wallpaper (1).jpg', 'image', '', 0, 0),
(824, 85, 253, '', 'dropfile/album_new/2023/09/_224_Supporting community and creating jobs.jpg', 'image', '', 0, 0),
(826, 85, 253, '', 'dropfile/album_new/2023/09/_805_personal assistent.jpg', 'image', '', 0, 0),
(827, 85, 253, '', 'dropfile/album_new/2023/09/_760_Finance Consultant.jpg', 'image', '', 0, 0),
(828, 85, 253, '', 'dropfile/album_new/2023/09/_883_Supporting community and creating jobs.jpg', 'image', '', 0, 0),
(829, 85, 253, '', 'dropfile/album_new/2023/09/_122_Helping SMEs.jpg', 'image', '', 0, 0),
(830, 85, 253, '', 'dropfile/album_new/2023/09/_345_personal assistent.jpg', 'image', '', 0, 0),
(831, 85, 253, '', 'dropfile/album_new/2023/09/_716_Finance Consultant.jpg', 'image', '', 0, 0),
(832, 85, 253, '', 'dropfile/album_new/2023/09/_398_icons8-arrow-100.png', 'image', '', 0, 0),
(833, 85, 253, '', 'dropfile/album_new/2023/09/_616_25557272_7086876.jpg', 'image', '', 0, 0),
(834, 85, 253, '', 'dropfile/album_new/2023/09/_537_arrangement-finances-elements-graph-with-medical-mask.jpg', 'image', '', 0, 0),
(835, 85, 253, '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', 'link', '', 0, 0),
(836, 85, 253, '', 'dropfile/album_new/2023/09/_637_wallpaperflare.com_wallpaper (2).jpg', 'image', '', 0, 0),
(837, 44, 238, '', 'dropfile/album/2023/09/_834_3682321.png', 'image', '', 0, 0),
(838, 46, 234, '', 'dropfile/album_new/2023/09/_365_3682321.png', 'image', '', 0, 0),
(839, 46, 234, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(840, 46, 234, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(841, 46, 234, '', 'dropfile/album_new/2023/09/_978_3682321.png', 'image', '', 0, 0),
(842, 46, 234, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(843, 46, 234, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(844, 46, 234, '', 'dropfile/album_new/2023/09/_541_3682321.png', 'image', '', 0, 0),
(845, 46, 234, '', 'dropfile/album_new/2023/09/_577_3682321.png', 'image', '', 0, 0),
(846, 46, 234, '', 'dropfile/album_new/2023/09/_123_3682321.png', 'image', '', 0, 0),
(847, 1, 234, '', 'dropfile/album_new/2023/09/_719_3682321.png', 'image', '', 0, 0),
(848, 1, 234, '', 'dropfile/album_new/2023/09/_469_3682321.png', 'image', '', 0, 0),
(849, 1, 234, '', 'dropfile/album_new/2023/09/_320_video_link.png', 'image', '', 0, 0),
(850, 1, 234, '', 'dropfile/album_new/2023/09/_380_send_btn.png', 'image', '', 0, 0),
(851, 1, 234, '', 'dropfile/album_new/2023/09/_100_3682321.png', 'image', '', 0, 0),
(852, 1, 234, '', 'dropfile/album_new/2023/09/_285_3682321.png', 'image', '', 0, 0),
(853, 1, 234, '', 'dropfile/album_new/2023/09/_766_3682321.png', 'image', '', 0, 0),
(854, 46, 234, '', 'dropfile/album_new/2023/09/_816_3682321.png', 'image', '', 0, 0),
(855, 46, 234, '', 'dropfile/album_new/2023/09/_954_3682321.png', 'image', '', 0, 0),
(856, 46, 234, '', 'dropfile/album_new/2023/09/_635_3682321.png', 'image', '', 0, 0),
(857, 46, 234, '', 'dropfile/album_new/2023/09/_207_3682321.png', 'image', '', 0, 0),
(858, 46, 234, '', 'dropfile/album_new/2023/09/_762_3682321.png', 'image', '', 0, 0),
(859, 46, 234, '', 'dropfile/album_new/2023/09/_525_goBack_icn.png', 'image', '', 0, 0),
(860, 46, 234, '', 'dropfile/album_new/2023/09/_892_goBack_icn.png', 'image', '', 0, 0),
(861, 46, 234, '', 'dropfile/album_new/2023/09/_339_goBack_icn.png', 'image', '', 0, 0),
(862, 46, 234, '', 'dropfile/album_new/2023/09/_402_3682321.png', 'image', '', 0, 0),
(863, 46, 234, '', 'dropfile/album_new/2023/09/_920_3682321.png', 'image', '', 0, 0),
(864, 46, 234, '', 'dropfile/album_new/2023/09/_680_send_btn.png', 'image', '', 0, 0),
(865, 46, 236, '', 'dropfile/album_new/2023/09/_262_3682321.png', 'image', '', 0, 0),
(866, 44, 239, '', 'dropfile/album_new/2023/09/_935_istockphoto-1146517111-612x612.jpg', 'image', '', 0, 0),
(867, 44, 239, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(868, 44, 239, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(869, 44, 239, '', 'dropfile/album_new/2023/09/_247_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(870, 44, 256, '', 'dropfile/album_new/2023/09/_706_istockphoto-1146517111-612x612.jpg', 'image', '', 0, 0),
(871, 44, 256, '', 'dropfile/album_new/2023/09/_776_pexels-pixabay-220453.jpg', 'image', '', 0, 0),
(872, 44, 256, '', 'dropfile/album_new/2023/09/_709_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(874, 44, 256, '', 'dropfile/album_new/2023/09/_947_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(875, 44, 256, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(876, 44, 256, '', 'dropfile/album_new/2023/09/_883_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(877, 44, 256, '', 'dropfile/album_new/2023/09/_115_124-1243809_gold-package-silver-gold-platinum-icon.png', 'image', '', 0, 0),
(878, 44, 256, '', 'dropfile/album_new/2023/09/_496_579-logo.png', 'image', '', 0, 0),
(879, 44, 256, '', 'dropfile/album_new/2023/09/_524_istockphoto-1146517111-612x612.jpg', 'image', '', 0, 0),
(880, 44, 256, '', 'dropfile/album_new/2023/09/_286_pexels-pixabay-220453.jpg', 'image', '', 0, 0),
(881, 44, 256, '', 'dropfile/album_new/2023/09/_600_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(882, 44, 256, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(883, 44, 256, '', 'dropfile/album_new/2023/09/_721_pexels-reynaldo-brigworkz-brigantty-734428.jpg', 'image', '', 0, 0),
(884, 46, 258, '', 'dropfile/album_new/2023/09/_299_1.jpg', 'image', '', 0, 1),
(885, 46, 258, '', 'dropfile/album_new/2023/09/_812_2.jpg', 'image', '', 0, 1),
(886, 46, 258, '', 'dropfile/album_new/2023/09/_822_3.jpg', 'image', '', 0, 1),
(887, 46, 258, '', 'dropfile/album_new/2023/09/_698_4.jpg', 'image', '', 0, 1),
(888, 46, 258, '', 'dropfile/album_new/2023/09/_221_13-June.jpg', 'image', '', 0, 1),
(889, 46, 258, '', 'https://mega.nz/folder/W150VLga#Ya4S_u4y_BYVuOsecL7jSQ', 'link', '', 0, 0),
(890, 88, 260, '', 'dropfile/album/2023/09/_343_IMG_3775.jpeg', 'image', '', 0, 0),
(891, 88, 260, '', 'dropfile/album/2023/09/_181_7F9FE9E4-6A99-4425-85C4-F79B879DED4F.jpeg', 'image', '', 0, 0),
(892, 88, 260, '', 'dropfile/album/2023/09/_865_IMG_3771.jpeg', 'image', '', 0, 0),
(893, 88, 260, '', 'dropfile/album/2023/09/_475_IMG_3772.jpeg', 'image', '', 0, 0),
(894, 89, 265, '', 'dropfile/album/2023/09/_407_IMG_3775.jpeg', 'image', '', 0, 0),
(895, 89, 265, '', 'dropfile/album/2023/09/_802_IMG_3772.jpeg', 'image', '', 0, 0),
(896, 89, 265, '', 'dropfile/album/2023/09/_842_7F9FE9E4-6A99-4425-85C4-F79B879DED4F.jpeg', 'image', '', 0, 0),
(897, 89, 265, '', 'dropfile/album/2023/09/_433_IMG_3771.jpeg', 'image', '', 0, 0),
(898, 89, 265, '', 'dropfile/album/2023/09/_622_AF8C4C7D-31D9-4B42-AB55-55AB5A2C3FB8.jpeg', 'image', '', 0, 0),
(899, 93, 271, '', 'dropfile/album_new/2023/09/_195_Screenshot 2023-09-23 at 00.26.12.png', 'image', '', 0, 1),
(900, 93, 271, '', 'dropfile/album/2023/09/_742_IMG_3775.jpeg', 'image', '', 0, 1),
(901, 93, 271, '', 'dropfile/album/2023/09/_634_IMG_3772.jpeg', 'image', '', 0, 1),
(903, 46, 234, '', 'dropfile/album_new/2023/10/_828_19.png', 'image', '', 0, 0),
(905, 46, 311, '', 'dropfile/album_new/2023/10/_451_chef2.png', 'image', '', 0, 1),
(906, 46, 317, '', 'https://youtube.com/', 'link', '', 0, 1),
(907, 46, 317, '', 'dropfile/album/2023/10/_619_dealer3.jpg', 'image', '', 0, 1),
(908, 46, 317, '', 'dropfile/album/2023/10/_296_managed_360.jpg', 'image', '', 0, 1),
(909, 46, 317, '', 'dropfile/album/2023/10/_723_warranty_360.jpg', 'image', '', 0, 1),
(910, 46, 318, '', 'dropfile/album_new/2023/10/_610_dealer3.jpg', 'image', '', 0, 1),
(913, 46, 318, '', 'dropfile/album_new/2023/10/_403_managed_360.jpg', 'image', '', 0, 1),
(915, 46, 311, '', 'dropfile/album_new/2023/10/_223_basmati_rice2.png', 'image', '', 0, 1),
(916, 46, 311, '', 'dropfile/album_new/2023/10/_655_chef1.png', 'image', '', 0, 1),
(917, 46, 311, '', 'dropfile/album_new/2023/10/_726_chef2.png', 'image', '', 0, 1),
(918, 46, 311, '', 'dropfile/album_new/2023/10/_471_chef3.png', 'image', '', 0, 1),
(919, 46, 311, '', 'dropfile/album_new/2023/10/_160_gallery_left1.jpg', 'image', '', 0, 1),
(920, 46, 311, '', 'dropfile/album_new/2023/10/_234_gallery2.jpg', 'image', '', 0, 1),
(921, 46, 311, '', 'dropfile/album_new/2023/10/_653_gallery3.jpg', 'image', '', 0, 1),
(923, 46, 312, '', 'dropfile/album_new/2023/10/_605_background.jpg', 'image', 'hello', 0, 1),
(925, 46, 312, '', 'dropfile/album_new/2023/10/_652_basmati_price.jpg', 'image', 'hello', 0, 1),
(927, 46, 312, '', 'dropfile/album_new/2023/10/_631_gallery_left1.jpg', 'image', '', 0, 1),
(928, 46, 312, '', 'dropfile/album_new/2023/10/_630_gallery2.jpg', 'image', '', 0, 1),
(929, 46, 312, '', 'dropfile/album_new/2023/10/_853_gallery3.jpg', 'image', '', 0, 1),
(931, 46, 312, '', 'dropfile/album_new/2023/10/_841_grid1.JPG', 'image', '', 0, 1),
(932, 46, 312, '', 'dropfile/album_new/2023/10/_476_grid2.jpg', 'image', '', 0, 1),
(933, 46, 312, '', 'dropfile/album_new/2023/10/_184_grid3.jpg', 'image', '', 0, 1),
(934, 46, 318, '', 'dropfile/album_new/2023/10/_427_testi_1.jpg', 'image', '', 0, 1),
(935, 46, 281, '', 'dropfile/album_new/2023/10/_315_background.jpg', 'image', '', 0, 0),
(936, 46, 281, '', 'dropfile/album_new/2023/10/_727_background.jpg', 'image', '', 0, 0),
(937, 46, 305, '', 'dropfile/album_new/2023/10/_614_6.png', 'image', '', 0, 0),
(938, 46, 305, '', 'dropfile/album_new/2023/10/_464_background.jpg', 'image', '', 0, 0),
(939, 46, 305, '', 'dropfile/album_new/2023/10/_206_grid1.JPG', 'image', '', 0, 0),
(940, 46, 305, '', 'dropfile/album_new/2023/10/_399_19.png', 'image', '', 0, 0),
(941, 46, 305, '', 'dropfile/album_new/2023/10/_140_19.png', 'image', '', 0, 0),
(942, 46, 305, '', 'dropfile/album_new/2023/10/_771_background.jpg', 'image', '', 0, 0),
(943, 46, 305, '', 'dropfile/album_new/2023/10/_522_7.png', 'image', '', 0, 0),
(944, 46, 305, '', 'dropfile/album_new/2023/10/_404_testi_3.jpg', 'image', '', 0, 0),
(945, 46, 305, '', 'dropfile/album_new/2023/10/_548_2.jpg', 'image', '', 0, 0),
(946, 46, 305, '', 'dropfile/album_new/2023/10/_505_3.jpg', 'image', '', 0, 0),
(947, 46, 305, '', 'dropfile/album_new/2023/10/_434_4.jpg', 'image', '', 0, 0),
(948, 46, 305, '', 'dropfile/album_new/2023/10/_642_index_banner3.jpg', 'image', '', 0, 0),
(949, 46, 312, '', 'dropfile/album_new/2023/10/_643_index_banner4.jpg', 'image', '', 0, 1),
(951, 46, 312, '', 'dropfile/album_new/2023/10/_220_index_banner3.jpg', 'image', '', 0, 1),
(952, 46, 312, '', 'dropfile/album_new/2023/10/_678_14.png', 'image', '', 0, 1),
(953, 46, 319, '', 'dropfile/album_new/2023/10/_894_15.png', 'image', '', 0, 1),
(954, 46, 319, '', 'dropfile/album_new/2023/10/_763_16.png', 'image', '', 0, 1),
(955, 46, 319, '', 'dropfile/album_new/2023/10/_403_17.png', 'image', '', 0, 1),
(956, 46, 283, '', 'dropfile/album_new/2023/10/_886_6.png', 'image', '', 0, 0),
(957, 46, 283, '', 'dropfile/album_new/2023/10/_142_17.png', 'image', '', 0, 0),
(958, 46, 283, '', 'dropfile/album_new/2023/10/_634_19.png', 'image', '', 0, 0),
(959, 46, 306, '', 'dropfile/album_new/2023/10/_271_584-20231010153447-8208-warranty_min900.jpg', 'image', 'car', 0, 0),
(960, 46, 306, '', 'dropfile/album_new/2023/10/_353_warranty_1920.jpg', 'image', 'gh', 0, 0),
(961, 46, 306, '', 'dropfile/album_new/2023/10/_463_managed_min900.jpg', 'image', '818288181818718718181781711114+1111+1/14+171+/7', 0, 0),
(962, 46, 306, '', 'https://youtube.com/', 'link', '', 0, 0),
(963, 46, 312, '', 'https://youtube.com/', 'link', '', 0, 1),
(964, 46, 312, '', 'dropfile/album_new/2023/10/_435_true.jpg', 'image', '164646', 0, 1),
(966, 46, 282, '', 'dropfile/album_new/2023/10/_649_true.jpg', 'image', 'klkl hjhjk kj kjk', 0, 0),
(967, 46, 282, '', 'dropfile/album_new/2023/10/_358_dealer3.jpg', 'image', ' hjk hjk hjk kj k', 0, 0),
(968, 46, 282, '', 'dropfile/album_new/2023/10/_610_managed_min900.jpg', 'image', 'hghj ghj hj ghj jh', 0, 0),
(969, 46, 282, '', 'https://youtube.com/', 'link', '', 0, 0),
(971, 46, 306, '', 'https://www.youtube.com/watch?v=jD_bKzYTkFI', 'link', '', 0, 0),
(972, 46, 322, '', 'dropfile/album_new/2023/10/_730_true.jpg', 'image', 'sdadas', 0, 1),
(973, 46, 322, '', 'dropfile/album_new/2023/10/_213_true.jpg', 'image', 'sadsa sad', 0, 1),
(974, 46, 322, '', 'dropfile/album_new/2023/10/_338_dealer3.jpg', 'image', 'wqeq asda', 0, 1),
(975, 46, 322, '', 'dropfile/album_new/2023/10/_594_managed_360.jpg', 'image', ' qw3xcvcx ', 0, 1),
(976, 46, 306, '', 'dropfile/album_new/2023/10/_820_14.png', 'image', '', 0, 0),
(977, 46, 306, '', 'dropfile/album_new/2023/10/_568_background.jpg', 'image', '', 0, 0),
(978, 46, 306, '', 'dropfile/album_new/2023/10/_966_pink_salt.png', 'image', '', 0, 0),
(979, 46, 306, '', 'dropfile/album_new/2023/10/_350_basmati_rice2.png', 'image', '', 0, 0),
(980, 46, 323, '', 'dropfile/album_new/2023/10/_497_T1D1.6T-Pretty pictures(7).jpg', 'image', '213', 0, 1),
(981, 46, 323, '', 'dropfile/album_new/2023/10/_496_otsuka nutrition.jpg', 'image', '32423', 0, 1),
(982, 46, 323, '', 'dropfile/album_new/2023/10/_881_manno.jpg', 'image', '43534', 0, 1),
(983, 46, 323, '', 'dropfile/album_new/2023/10/_329_584-20231010153447-8208-warranty_min900.jpg', 'image', '65765', 0, 1),
(984, 46, 323, '', 'https://youtube.com/', 'link', '', 0, 1),
(985, 46, 323, '', 'dropfile/album_new/2023/10/_174_true.jpg', 'image', '23432 4', 0, 1),
(986, 46, 323, '', 'dropfile/album_new/2023/10/_807_newtiggo4pro_banner.jpg', 'image', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `webfootermenu`
--

CREATE TABLE `webfootermenu` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `under` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `webfootermenu`
--

INSERT INTO `webfootermenu` (`id`, `name`, `link`, `sort`, `under`) VALUES
(10, 'a:1:{s:7:\"English\";s:4:\"Home\";}', 'a:1:{s:7:\"English\";s:12:\"{{WEB_URL}}/\";}', NULL, 0),
(11, 'a:1:{s:7:\"English\";s:8:\"About us\";}', 'a:1:{s:7:\"English\";s:22:\"{{WEB_URL}}/page-about\";}', NULL, 0),
(12, 'a:1:{s:7:\"English\";s:12:\"How it works\";}', 'a:1:{s:7:\"English\";s:25:\"{{WEB_URL}}/page-services\";}', NULL, 0),
(13, 'a:1:{s:7:\"English\";s:8:\"Packages\";}', 'a:1:{s:7:\"English\";s:25:\"{{WEB_URL}}/page-packages\";}', NULL, 0),
(14, 'a:1:{s:7:\"English\";s:4:\"FAQs\";}', 'a:1:{s:7:\"English\";s:20:\"{{WEB_URL}}/page-faq\";}', NULL, 0),
(15, 'a:1:{s:7:\"English\";s:18:\"Terms & Conditions\";}', 'a:1:{s:7:\"English\";s:32:\"{{WEB_URL}}/page-terms-condition\";}', NULL, 0),
(16, 'a:1:{s:7:\"English\";s:14:\"Privacy Policy\";}', 'a:1:{s:7:\"English\";s:24:\"{{WEB_URL}}/page-privacy\";}', NULL, 0),
(17, 'a:1:{s:7:\"English\";s:17:\"Complaints Policy\";}', 'a:1:{s:7:\"English\";s:27:\"{{WEB_URL}}/page-complaints\";}', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `webmenu`
--

CREATE TABLE `webmenu` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `short_desc` varchar(500) DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'main',
  `sort` int(11) DEFAULT NULL,
  `under` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `webmenu`
--

INSERT INTO `webmenu` (`id`, `name`, `short_desc`, `icon`, `link`, `type`, `sort`, `under`) VALUES
(21, 'a:1:{s:7:\"English\";s:5:\"Login\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:21:\"{{WEB_URL}}/login.php\";}', 'top_menu', 1, 0),
(27, 'a:1:{s:7:\"English\";s:4:\"Home\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:11:\"{{WEB_URL}}\";}', 'main_menu', 0, 0),
(28, 'a:1:{s:7:\"English\";s:8:\"About us\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:22:\"{{WEB_URL}}/page-about\";}', 'main_menu', 1, 0),
(29, 'a:1:{s:7:\"English\";s:12:\"How it works\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:25:\"{{WEB_URL}}/page-services\";}', 'main_menu', 3, 0),
(30, 'a:1:{s:7:\"English\";s:8:\"Packages\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:25:\"{{WEB_URL}}/page-packages\";}', 'main_menu', 2, 0),
(31, 'a:1:{s:7:\"English\";s:4:\"FAQs\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:20:\"{{WEB_URL}}/page-faq\";}', 'main_menu', 5, 0),
(32, 'a:1:{s:7:\"English\";s:11:\"Get Started\";}', 'H4sIAAAAAAAAA0u0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:21:\"{{WEB_URL}}/#section6\";}', 'top_menu', 0, 0),
(44, 'a:1:{s:7:\"English\";s:7:\"shakeeb\";}', 'H4sIAAAAAAAACku0MrSqLrYyt1JyzUvPySzOULIutjKwUlKyrgUAX+qdhhsAAAA=', 'a:1:{s:7:\"English\";s:0:\"\";}', 'a:1:{s:7:\"English\";s:22:\"{{WEB_URL}}/page-about\";}', 'main_menu', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_email` (`acc_email`);

--
-- Indexes for table `accounts_detail`
--
ALTER TABLE `accounts_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `accounts_detail_ibfk_1` (`id_user`);

--
-- Indexes for table `accounts_prm_grp`
--
ALTER TABLE `accounts_prm_grp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_user`
--
ALTER TABLE `accounts_user`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `account_name` (`acc_name`);

--
-- Indexes for table `accounts_user_detail`
--
ALTER TABLE `accounts_user_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`aa_id`);

--
-- Indexes for table `all_in_one_returns`
--
ALTER TABLE `all_in_one_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_seller_products`
--
ALTER TABLE `best_seller_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `boxName` (`box`);

--
-- Indexes for table `box_setting`
--
ALTER TABLE `box_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `boxName` (`box`),
  ADD KEY `box` (`box`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captivategallery`
--
ALTER TABLE `captivategallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `cartwishlist`
--
ALTER TABLE `cartwishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_order_remaining`
--
ALTER TABLE `cart_order_remaining`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_name` (`cat_name`,`cat_status`);

--
-- Indexes for table `chat_comment`
--
ALTER TABLE `chat_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_statistics`
--
ALTER TABLE `check_statistics`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `color_name_id` (`color_name_id`);

--
-- Indexes for table `color_name`
--
ALTER TABLE `color_name`
  ADD PRIMARY KEY (`colorName_id`);

--
-- Indexes for table `coupon_useage_record`
--
ALTER TABLE `coupon_useage_record`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `cronjob`
--
ALTER TABLE `cronjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`cur_id`),
  ADD UNIQUE KEY `cur_country` (`cur_country`),
  ADD KEY `cur_name` (`cur_name`,`cur_symbol`);

--
-- Indexes for table `defected`
--
ALTER TABLE `defected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defectedorder`
--
ALTER TABLE `defectedorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `defectedId` (`defectedId`);

--
-- Indexes for table `defect_image`
--
ALTER TABLE `defect_image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `child` (`defect_id`);

--
-- Indexes for table `developer_setting`
--
ALTER TABLE `developer_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor_upload`
--
ALTER TABLE `editor_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_bounce`
--
ALTER TABLE `email_bounce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_letters`
--
ALTER TABLE `email_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_letter_queue`
--
ALTER TABLE `email_letter_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `letter_id` (`letter_id`);

--
-- Indexes for table `email_subscribe`
--
ALTER TABLE `email_subscribe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_sales_products`
--
ALTER TABLE `extra_sales_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filesmanager`
--
ALTER TABLE `filesmanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_img`
--
ALTER TABLE `final_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_gift_inv`
--
ALTER TABLE `free_gift_inv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_pk`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`img_pk`),
  ADD KEY `galler_id` (`gallery_id`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giftId` (`giftId`);

--
-- Indexes for table `guest_book_chat`
--
ALTER TABLE `guest_book_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `guest_user_info`
--
ALTER TABLE `guest_user_info`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `hardwords`
--
ALTER TABLE `hardwords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en` (`en`);

--
-- Indexes for table `ian_image`
--
ALTER TABLE `ian_image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `child` (`receipt_id`);

--
-- Indexes for table `ibms_setting`
--
ALTER TABLE `ibms_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_name` (`setting_name`);

--
-- Indexes for table `internal_comment_orderinvoice`
--
ALTER TABLE `internal_comment_orderinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_pk`);

--
-- Indexes for table `long_time_subscribe`
--
ALTER TABLE `long_time_subscribe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_activity_log`
--
ALTER TABLE `order_activity_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_pk`);

--
-- Indexes for table `order_extra_amount`
--
ALTER TABLE `order_extra_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_invoice`
--
ALTER TABLE `order_invoice`
  ADD PRIMARY KEY (`order_invoice_pk`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`),
  ADD KEY `orderUser` (`orderUser`),
  ADD KEY `ind_inv_ord_st` (`invoice_status`,`orderStatus`);

--
-- Indexes for table `order_invoice_info`
--
ALTER TABLE `order_invoice_info`
  ADD PRIMARY KEY (`info_pk`),
  ADD KEY `order_invoice_id` (`order_invoice_id`);

--
-- Indexes for table `order_invoice_product`
--
ALTER TABLE `order_invoice_product`
  ADD PRIMARY KEY (`invoice_product_pk`),
  ADD KEY `order_invoice_id` (`order_invoice_id`),
  ADD KEY `ind_pids` (`order_pIds`);

--
-- Indexes for table `order_invoice_record`
--
ALTER TABLE `order_invoice_record`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_product_info`
--
ALTER TABLE `order_product_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_invid` (`order_invoice_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_pk`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product_addcost`
--
ALTER TABLE `product_addcost`
  ADD PRIMARY KEY (`proadc_id`),
  ADD KEY `child_cost` (`proadc_prodet_id`);

--
-- Indexes for table `product_addcost_spb`
--
ALTER TABLE `product_addcost_spb`
  ADD PRIMARY KEY (`proadc_id`);

--
-- Indexes for table `product_cache_image`
--
ALTER TABLE `product_cache_image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`procat_id`),
  ADD UNIQUE KEY `procat_id` (`procat_id`),
  ADD KEY `child` (`procat_prodet_id`);

--
-- Indexes for table `product_category_spb`
--
ALTER TABLE `product_category_spb`
  ADD PRIMARY KEY (`procat_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`propri_id`),
  ADD KEY `product_color_ibfk_1` (`proclr_prodet_id`);

--
-- Indexes for table `product_coupon`
--
ALTER TABLE `product_coupon`
  ADD PRIMARY KEY (`pCoupon_pk`);

--
-- Indexes for table `product_coupon_prices`
--
ALTER TABLE `product_coupon_prices`
  ADD PRIMARY KEY (`pSale_price_pk`),
  ADD KEY `child` (`pSale_price_id`);

--
-- Indexes for table `product_coupon_setting`
--
ALTER TABLE `product_coupon_setting`
  ADD PRIMARY KEY (`pCoupon_setting_pk`),
  ADD KEY `pSale_id` (`pCoupon_id`);

--
-- Indexes for table `product_coupon_spb`
--
ALTER TABLE `product_coupon_spb`
  ADD PRIMARY KEY (`pCoupon_pk`);

--
-- Indexes for table `product_deal`
--
ALTER TABLE `product_deal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product_deal_price`
--
ALTER TABLE `product_deal_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deal_id` (`deal_id`);

--
-- Indexes for table `product_deal_setting`
--
ALTER TABLE `product_deal_setting`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `dId` (`deal_id`);

--
-- Indexes for table `product_discount`
--
ALTER TABLE `product_discount`
  ADD PRIMARY KEY (`product_discount_pk`),
  ADD UNIQUE KEY `discount_PId` (`discount_PId`);

--
-- Indexes for table `product_discount_prices`
--
ALTER TABLE `product_discount_prices`
  ADD PRIMARY KEY (`product_dis_setting_pk`),
  ADD KEY `child` (`product_dis_id`);

--
-- Indexes for table `product_discount_setting`
--
ALTER TABLE `product_discount_setting`
  ADD PRIMARY KEY (`product_discount_setting_pk`),
  ADD KEY `child` (`product_dis_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `child` (`product_id`);

--
-- Indexes for table `product_image_spb`
--
ALTER TABLE `product_image_spb`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`qty_pk`),
  ADD KEY `product` (`qty_product_id`),
  ADD KEY `ind_color` (`qty_product_color`);

--
-- Indexes for table `product_inventory_detail`
--
ALTER TABLE `product_inventory_detail`
  ADD PRIMARY KEY (`qty_pk`),
  ADD KEY `product` (`qty_product_id`),
  ADD KEY `ind_color` (`qty_product_color`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`propri_id`);

--
-- Indexes for table `product_price_spb`
--
ALTER TABLE `product_price_spb`
  ADD PRIMARY KEY (`propri_id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`pSale_pk`);

--
-- Indexes for table `product_sale_prices`
--
ALTER TABLE `product_sale_prices`
  ADD PRIMARY KEY (`pSale_price_pk`);

--
-- Indexes for table `product_sale_setting`
--
ALTER TABLE `product_sale_setting`
  ADD PRIMARY KEY (`pSale_setting_pk`);

--
-- Indexes for table `product_setting`
--
ALTER TABLE `product_setting`
  ADD PRIMARY KEY (`set_id`),
  ADD KEY `child` (`p_id`);

--
-- Indexes for table `product_setting_spb`
--
ALTER TABLE `product_setting_spb`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`prosiz_id`),
  ADD KEY `child` (`prosiz_prodet_id`);

--
-- Indexes for table `product_size_custom`
--
ALTER TABLE `product_size_custom`
  ADD PRIMARY KEY (`custom_id`),
  ADD KEY `pId` (`pId`);

--
-- Indexes for table `product_size_weight`
--
ALTER TABLE `product_size_weight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pw_unique` (`pw_unique`),
  ADD KEY `pweight` (`pwPId`);

--
-- Indexes for table `proudct_detail`
--
ALTER TABLE `proudct_detail`
  ADD PRIMARY KEY (`prodet_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `proudct_detail_spb`
--
ALTER TABLE `proudct_detail_spb`
  ADD PRIMARY KEY (`prodet_id`);

--
-- Indexes for table `purchase_receipt`
--
ALTER TABLE `purchase_receipt`
  ADD PRIMARY KEY (`receipt_pk`),
  ADD KEY `GRN` (`grn`);

--
-- Indexes for table `purchase_receipt_dn`
--
ALTER TABLE `purchase_receipt_dn`
  ADD PRIMARY KEY (`receipt_pk`),
  ADD UNIQUE KEY `dn` (`dn`);

--
-- Indexes for table `purchase_receipt_gtn`
--
ALTER TABLE `purchase_receipt_gtn`
  ADD PRIMARY KEY (`receipt_pk`),
  ADD UNIQUE KEY `gtn` (`gtn`);

--
-- Indexes for table `purchase_receipt_ian`
--
ALTER TABLE `purchase_receipt_ian`
  ADD PRIMARY KEY (`receipt_pk`),
  ADD UNIQUE KEY `ian` (`ian`);

--
-- Indexes for table `purchase_receipt_pro`
--
ALTER TABLE `purchase_receipt_pro`
  ADD PRIMARY KEY (`receipt_pro_pk`),
  ADD KEY `receipt` (`receipt_id`);

--
-- Indexes for table `purchase_receipt_pro_dn`
--
ALTER TABLE `purchase_receipt_pro_dn`
  ADD PRIMARY KEY (`receipt_pro_pk`);

--
-- Indexes for table `purchase_receipt_pro_gtn`
--
ALTER TABLE `purchase_receipt_pro_gtn`
  ADD PRIMARY KEY (`receipt_pro_pk`);

--
-- Indexes for table `purchase_receipt_pro_ian`
--
ALTER TABLE `purchase_receipt_pro_ian`
  ADD PRIMARY KEY (`receipt_pro_pk`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `removeqty`
--
ALTER TABLE `removeqty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_product`
--
ALTER TABLE `return_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_product_list`
--
ALTER TABLE `return_product_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rId` (`rId`),
  ADD KEY `rId_2` (`rId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scales`
--
ALTER TABLE `scales`
  ADD PRIMARY KEY (`scale_id`),
  ADD KEY `scale_name_id` (`scale_name_id`);

--
-- Indexes for table `scale_name`
--
ALTER TABLE `scale_name`
  ADD PRIMARY KEY (`scaleName_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `seo1`
--
ALTER TABLE `seo1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_fields`
--
ALTER TABLE `setting_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shp_pk`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `shipping_class`
--
ALTER TABLE `shipping_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `sp_recommends`
--
ALTER TABLE `sp_recommends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics_order_invoice_status`
--
ALTER TABLE `statistics_order_invoice_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_name`
--
ALTER TABLE `store_name`
  ADD PRIMARY KEY (`store_pk`);

--
-- Indexes for table `surveyformdata`
--
ALTER TABLE `surveyformdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_accounts_user`
--
ALTER TABLE `temp_accounts_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acc_id` (`acc_id`) USING BTREE,
  ADD UNIQUE KEY `acc_id_str` (`acc_id_str`) USING BTREE;

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_data`
--
ALTER TABLE `tree_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_struct`
--
ALTER TABLE `tree_struct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webfootermenu`
--
ALTER TABLE `webfootermenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmenu`
--
ALTER TABLE `webmenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `accounts_detail`
--
ALTER TABLE `accounts_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accounts_prm_grp`
--
ALTER TABLE `accounts_prm_grp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts_user`
--
ALTER TABLE `accounts_user`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `accounts_user_detail`
--
ALTER TABLE `accounts_user_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=930;

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `aa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `all_in_one_returns`
--
ALTER TABLE `all_in_one_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `best_seller_products`
--
ALTER TABLE `best_seller_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `box_setting`
--
ALTER TABLE `box_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `captivategallery`
--
ALTER TABLE `captivategallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cartwishlist`
--
ALTER TABLE `cartwishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1290;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_comment`
--
ALTER TABLE `chat_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `check_statistics`
--
ALTER TABLE `check_statistics`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `color_name`
--
ALTER TABLE `color_name`
  MODIFY `colorName_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coupon_useage_record`
--
ALTER TABLE `coupon_useage_record`
  MODIFY `id_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cronjob`
--
ALTER TABLE `cronjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `defected`
--
ALTER TABLE `defected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `defectedorder`
--
ALTER TABLE `defectedorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `defect_image`
--
ALTER TABLE `defect_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developer_setting`
--
ALTER TABLE `developer_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `editor_upload`
--
ALTER TABLE `editor_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `email_bounce`
--
ALTER TABLE `email_bounce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_letters`
--
ALTER TABLE `email_letters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `email_letter_queue`
--
ALTER TABLE `email_letter_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `email_subscribe`
--
ALTER TABLE `email_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `extra_sales_products`
--
ALTER TABLE `extra_sales_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `filesmanager`
--
ALTER TABLE `filesmanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `final_img`
--
ALTER TABLE `final_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `free_gift_inv`
--
ALTER TABLE `free_gift_inv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `img_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_book_chat`
--
ALTER TABLE `guest_book_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `guest_user_info`
--
ALTER TABLE `guest_user_info`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hardwords`
--
ALTER TABLE `hardwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1759;

--
-- AUTO_INCREMENT for table `ian_image`
--
ALTER TABLE `ian_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ibms_setting`
--
ALTER TABLE `ibms_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `internal_comment_orderinvoice`
--
ALTER TABLE `internal_comment_orderinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1405;

--
-- AUTO_INCREMENT for table `long_time_subscribe`
--
ALTER TABLE `long_time_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `order_activity_log`
--
ALTER TABLE `order_activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `order_extra_amount`
--
ALTER TABLE `order_extra_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_invoice`
--
ALTER TABLE `order_invoice`
  MODIFY `order_invoice_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_invoice_info`
--
ALTER TABLE `order_invoice_info`
  MODIFY `info_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_invoice_product`
--
ALTER TABLE `order_invoice_product`
  MODIFY `invoice_product_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order_invoice_record`
--
ALTER TABLE `order_invoice_record`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product_info`
--
ALTER TABLE `order_product_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_addcost_spb`
--
ALTER TABLE `product_addcost_spb`
  MODIFY `proadc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_cache_image`
--
ALTER TABLE `product_cache_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `procat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_category_spb`
--
ALTER TABLE `product_category_spb`
  MODIFY `procat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `propri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_coupon`
--
ALTER TABLE `product_coupon`
  MODIFY `pCoupon_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_coupon_prices`
--
ALTER TABLE `product_coupon_prices`
  MODIFY `pSale_price_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_coupon_setting`
--
ALTER TABLE `product_coupon_setting`
  MODIFY `pCoupon_setting_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_coupon_spb`
--
ALTER TABLE `product_coupon_spb`
  MODIFY `pCoupon_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_deal`
--
ALTER TABLE `product_deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_deal_price`
--
ALTER TABLE `product_deal_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_deal_setting`
--
ALTER TABLE `product_deal_setting`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_discount`
--
ALTER TABLE `product_discount`
  MODIFY `product_discount_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_discount_prices`
--
ALTER TABLE `product_discount_prices`
  MODIFY `product_dis_setting_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_discount_setting`
--
ALTER TABLE `product_discount_setting`
  MODIFY `product_discount_setting_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `product_image_spb`
--
ALTER TABLE `product_image_spb`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `qty_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_inventory_detail`
--
ALTER TABLE `product_inventory_detail`
  MODIFY `qty_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `propri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34717;

--
-- AUTO_INCREMENT for table `product_price_spb`
--
ALTER TABLE `product_price_spb`
  MODIFY `propri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `pSale_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sale_prices`
--
ALTER TABLE `product_sale_prices`
  MODIFY `pSale_price_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sale_setting`
--
ALTER TABLE `product_sale_setting`
  MODIFY `pSale_setting_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_setting`
--
ALTER TABLE `product_setting`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1585;

--
-- AUTO_INCREMENT for table `product_setting_spb`
--
ALTER TABLE `product_setting_spb`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `prosiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `product_size_custom`
--
ALTER TABLE `product_size_custom`
  MODIFY `custom_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_size_weight`
--
ALTER TABLE `product_size_weight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proudct_detail`
--
ALTER TABLE `proudct_detail`
  MODIFY `prodet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `proudct_detail_spb`
--
ALTER TABLE `proudct_detail_spb`
  MODIFY `prodet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `purchase_receipt`
--
ALTER TABLE `purchase_receipt`
  MODIFY `receipt_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_receipt_dn`
--
ALTER TABLE `purchase_receipt_dn`
  MODIFY `receipt_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_receipt_gtn`
--
ALTER TABLE `purchase_receipt_gtn`
  MODIFY `receipt_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_receipt_ian`
--
ALTER TABLE `purchase_receipt_ian`
  MODIFY `receipt_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_receipt_pro`
--
ALTER TABLE `purchase_receipt_pro`
  MODIFY `receipt_pro_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_receipt_pro_dn`
--
ALTER TABLE `purchase_receipt_pro_dn`
  MODIFY `receipt_pro_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_receipt_pro_gtn`
--
ALTER TABLE `purchase_receipt_pro_gtn`
  MODIFY `receipt_pro_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_receipt_pro_ian`
--
ALTER TABLE `purchase_receipt_pro_ian`
  MODIFY `receipt_pro_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `removeqty`
--
ALTER TABLE `removeqty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `return_product`
--
ALTER TABLE `return_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_product_list`
--
ALTER TABLE `return_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scales`
--
ALTER TABLE `scales`
  MODIFY `scale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scale_name`
--
ALTER TABLE `scale_name`
  MODIFY `scaleName_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `seo1`
--
ALTER TABLE `seo1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `setting_fields`
--
ALTER TABLE `setting_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shp_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipping_class`
--
ALTER TABLE `shipping_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `slug`
--
ALTER TABLE `slug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_recommends`
--
ALTER TABLE `sp_recommends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `statistics_order_invoice_status`
--
ALTER TABLE `statistics_order_invoice_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_name`
--
ALTER TABLE `store_name`
  MODIFY `store_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surveyformdata`
--
ALTER TABLE `surveyformdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1864;

--
-- AUTO_INCREMENT for table `temp_accounts_user`
--
ALTER TABLE `temp_accounts_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tree_struct`
--
ALTER TABLE `tree_struct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987;

--
-- AUTO_INCREMENT for table `webfootermenu`
--
ALTER TABLE `webfootermenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `webmenu`
--
ALTER TABLE `webmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts_detail`
--
ALTER TABLE `accounts_detail`
  ADD CONSTRAINT `accounts_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `accounts` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_ibfk_1` FOREIGN KEY (`color_name_id`) REFERENCES `color_name` (`colorName_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `defectedorder`
--
ALTER TABLE `defectedorder`
  ADD CONSTRAINT `defectedorder_ibfk_1` FOREIGN KEY (`defectedId`) REFERENCES `defected` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `defect_image`
--
ALTER TABLE `defect_image`
  ADD CONSTRAINT `defect_image_ibfk_1` FOREIGN KEY (`defect_id`) REFERENCES `defected` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_invoice_info`
--
ALTER TABLE `order_invoice_info`
  ADD CONSTRAINT `order_invoice_info_ibfk_1` FOREIGN KEY (`order_invoice_id`) REFERENCES `order_invoice` (`order_invoice_pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_invoice_product`
--
ALTER TABLE `order_invoice_product`
  ADD CONSTRAINT `order_invoice_product_ibfk_1` FOREIGN KEY (`order_invoice_id`) REFERENCES `order_invoice` (`order_invoice_pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_invoice_record`
--
ALTER TABLE `order_invoice_record`
  ADD CONSTRAINT `order_invoice_record_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_invoice` (`order_invoice_pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`proclr_prodet_id`) REFERENCES `proudct_detail` (`prodet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `proudct_detail` (`prodet_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
