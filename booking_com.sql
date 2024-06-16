-- phpMyAdmin SQL Dump
-- version 5.2.1-4.fc40
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2024 at 02:57 PM
-- Server version: 10.11.8-MariaDB
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachmentable`
--

CREATE TABLE `attachmentable` (
  `id` int(10) UNSIGNED NOT NULL,
  `attachmentable_type` varchar(255) NOT NULL,
  `attachmentable_id` int(10) UNSIGNED NOT NULL,
  `attachment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `original_name` text NOT NULL,
  `mime` varchar(255) NOT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `size` bigint(20) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `path` text NOT NULL,
  `description` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `disk` varchar(255) NOT NULL DEFAULT 'public',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `original_name`, `mime`, `extension`, `size`, `sort`, `path`, `description`, `alt`, `hash`, `disk`, `user_id`, `group`, `created_at`, `updated_at`) VALUES
(1, 'a61aba9a84b199afb03ccb45ebbe9b23a3e34579', 'Screenshot from 2024-05-06 09-25-23.png', 'image/png', 'png', 164040, 0, '2024/05/06/', NULL, NULL, '0c48df9ff541afac9a948bf0f65d157c212f7042', 'public', 1, NULL, '2024-05-05 23:02:07', '2024-05-05 23:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `check_in_Date` datetime DEFAULT NULL,
  `check_out_Date` datetime DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `guest_count` varchar(255) DEFAULT NULL,
  `special_requests` varchar(255) DEFAULT NULL,
  `cancellation_reason` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `booking_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('be3a9793-4789-4021-960d-b8dfddd35fca', 22, 21, 'hi rukshan', NULL, 0, '2024-06-04 02:42:23', '2024-06-04 02:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name_en` varchar(45) DEFAULT NULL,
  `name_si` varchar(45) DEFAULT NULL,
  `name_ta` varchar(45) DEFAULT NULL,
  `sub_name_en` varchar(45) DEFAULT NULL,
  `sub_name_si` varchar(45) DEFAULT NULL,
  `sub_name_ta` varchar(45) DEFAULT NULL,
  `postcode` varchar(15) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `district_id`, `name_en`, `name_si`, `name_ta`, `sub_name_en`, `sub_name_si`, `sub_name_ta`, `postcode`, `latitude`, `longitude`) VALUES
(1, 1, 'Akkaraipattu', 'අක්කරපත්තුව', NULL, NULL, NULL, NULL, '32400', 7.2167, 81.85),
(2, 1, 'Ambagahawatta', 'අඹගහවත්ත', NULL, NULL, NULL, NULL, '90326', 7.4, 81.3),
(3, 1, 'Ampara', 'අම්පාර', NULL, NULL, NULL, NULL, '32000', 7.2833, 81.6667),
(4, 1, 'Bakmitiyawa', 'බක්මිටියාව', NULL, NULL, NULL, NULL, '32024', 7.026268, 81.633832),
(5, 1, 'Deegawapiya', 'දීඝවාපිය', NULL, NULL, NULL, NULL, '32006', 7.2833, 81.6667),
(6, 1, 'Devalahinda', 'දෙවලහිඳ', NULL, NULL, NULL, NULL, '32038', 7.1889, 81.5778),
(7, 1, 'Digamadulla Weeragoda', 'දිගාමඩුල්ල වීරගොඩ', NULL, NULL, NULL, NULL, '32008', 7.2833, 81.6667),
(8, 1, 'Dorakumbura', 'දොරකුඹුර', NULL, NULL, NULL, NULL, '32104', 7.358849, 81.280133),
(9, 1, 'Gonagolla', 'ගොනගොල්ල', NULL, NULL, NULL, NULL, '32064', 7.449853, 81.618014),
(10, 1, 'Hulannuge', 'හුලංනුගේ', NULL, NULL, NULL, NULL, '32514', 7.4, 81.3),
(11, 1, 'Kalmunai', 'කල්මුණේ', NULL, NULL, NULL, NULL, '32300', 7.413897, 81.826718),
(12, 1, 'Kannakipuram', 'කන්නකිපුරම්', NULL, NULL, NULL, NULL, '32405', 7.2167, 81.85),
(13, 1, 'Karativu', 'කරතිව්', NULL, NULL, NULL, NULL, '32250', 7.3833, 81.8333),
(14, 1, 'Kekirihena', 'කැකිරිහේන', NULL, NULL, NULL, NULL, '32074', 7.490724, 81.310836),
(15, 1, 'Koknahara', 'කොක්නහර', NULL, NULL, NULL, NULL, '32035', 7.184832, 81.555806),
(16, 1, 'Kolamanthalawa', 'කෝලමන්තලාව', NULL, NULL, NULL, NULL, '32102', 7.351733, 81.249913),
(17, 1, 'Komari', 'කෝමාරි', NULL, NULL, NULL, NULL, '32418', 6.976958, 81.78883),
(18, 1, 'Lahugala', 'ලාහුගල', NULL, NULL, NULL, NULL, '32512', 7.415566, 81.33954),
(19, 1, 'lmkkamam', 'ල්ම්ක්කමම්', NULL, NULL, NULL, NULL, '32450', 7.1125, 81.8542),
(20, 1, 'Mahaoya', 'මහඔය', NULL, NULL, NULL, NULL, '32070', 7.535248, 81.351145),
(21, 1, 'Marathamune', 'මාරත්මුනේ', NULL, NULL, NULL, NULL, '32314', 7.45, 81.8167),
(22, 1, 'Namaloya', 'නාමල්ඔය', NULL, NULL, NULL, NULL, '32037', 7.1889, 81.5778),
(23, 1, 'Navithanveli', 'නාවිදන්වෙලි', NULL, NULL, NULL, NULL, '32308', 7.4333, 81.7833),
(24, 1, 'Nintavur', 'නින්දවූර්', NULL, NULL, NULL, NULL, '32340', 7.35, 81.85),
(25, 1, 'Oluvil', 'ඔළුවිල', NULL, NULL, NULL, NULL, '32360', 7.2833, 81.85),
(26, 1, 'Padiyatalawa', 'පදියතලාව', NULL, NULL, NULL, NULL, '32100', 7.4, 81.2333),
(27, 1, 'Pahalalanda', 'පහලලන්ද', NULL, NULL, NULL, NULL, '32034', 7.21752, 81.578714),
(28, 1, 'Panama', 'පානම', NULL, NULL, NULL, NULL, '32508', 6.812201, 81.712237),
(29, 1, 'Pannalagama', 'පන්නලගම', NULL, NULL, NULL, NULL, '32022', 7.0667, 81.6167),
(30, 1, 'Paragahakele', 'පරගහකැලේ', NULL, NULL, NULL, NULL, '32031', 7.25669, 81.609526),
(31, 1, 'Periyaneelavanai', 'පෙරියනීලවන්නි', NULL, NULL, NULL, NULL, '32316', 7.434002, 81.814169),
(32, 1, 'Polwaga Janapadaya', 'පොල්වග ජනපදය', NULL, NULL, NULL, NULL, '32032', 7.1889, 81.5778),
(33, 1, 'Pottuvil', 'පොතුවිල්', NULL, NULL, NULL, NULL, '32500', 6.8667, 81.8333),
(34, 1, 'Sainthamaruthu', 'සායින්දමරුදු', NULL, NULL, NULL, NULL, '32280', 7.3833, 81.8333),
(35, 1, 'Samanthurai', 'සමන්තුරේ', NULL, NULL, NULL, NULL, '32200', 7.3833, 81.8333),
(36, 1, 'Serankada', 'සේරන්කද', NULL, NULL, NULL, NULL, '32101', 7.464517, 81.263599),
(37, 1, 'Tempitiya', 'ටැම්පිටිය', NULL, NULL, NULL, NULL, '32072', 7.610374, 81.429907),
(38, 1, 'Thambiluvil', 'ල්තැඹිළුවි', NULL, NULL, NULL, NULL, '32415', 7.132227, 81.819074),
(39, 1, 'Tirukovil', 'තිරුකෝවිල', NULL, NULL, NULL, NULL, '32420', 7.1167, 81.85),
(40, 1, 'Uhana', 'උහන', NULL, NULL, NULL, NULL, '32060', 7.363281, 81.637746),
(41, 1, 'Wadinagala', 'වඩිනාගල', NULL, NULL, NULL, NULL, '32039', 7.127849, 81.56922),
(42, 1, 'Wanagamuwa', 'වනගමුව', NULL, NULL, NULL, NULL, '32454', 7.1125, 81.8542),
(43, 2, 'Angamuwa', 'අංගමුව', NULL, NULL, NULL, NULL, '50248', 8.177645, 80.205048),
(44, 2, 'Anuradhapura', 'අනුරාධපුරය', NULL, NULL, NULL, NULL, '50000', 8.35, 80.3833),
(45, 2, 'Awukana', 'අව්කන', NULL, NULL, NULL, NULL, '50169', 7.9753, 80.5266),
(46, 2, 'Bogahawewa', 'බෝගහවැව', NULL, NULL, NULL, NULL, '50566', 8.328993, 80.251702),
(47, 2, 'Dematawewa', 'දෙමටවැව', NULL, NULL, NULL, NULL, '50356', 8.357373, 80.870087),
(48, 2, 'Dimbulagala', 'දිඹුලාගල', NULL, NULL, NULL, NULL, '51031', 7.9167, 80.55),
(49, 2, 'Dutuwewa', 'දුටුවැව', NULL, NULL, NULL, NULL, '50393', 8.65, 80.5167),
(50, 2, 'Elayapattuwa', 'ඇලයාපත්තුව', NULL, NULL, NULL, NULL, '50014', 8.413522, 80.318148),
(51, 2, 'Ellewewa', 'ඇල්ලේවැව', NULL, NULL, NULL, NULL, '51034', 7.9167, 80.55),
(52, 2, 'Eppawala', 'එප්පාවල', NULL, NULL, NULL, NULL, '50260', 8.1167, 80.7333),
(53, 2, 'Etawatunuwewa', 'ඇතාවැටුනවැව', NULL, NULL, NULL, NULL, '50584', 8.5595, 80.5476),
(54, 2, 'Etaweeragollewa', 'ඇතාවීරගොලෑව', NULL, NULL, NULL, NULL, '50518', 8.613962, 80.539713),
(55, 2, 'Galapitagala', 'ගලපිටගල', NULL, NULL, NULL, NULL, '32066', 8.089843, 80.685528),
(56, 2, 'Galenbindunuwewa', 'ගලෙන්බිඳුනුවැව', NULL, NULL, NULL, NULL, '50390', 8.5833, 80.55),
(57, 2, 'Galkadawala', 'ගල්කඩවල', NULL, NULL, NULL, NULL, '50006', 8.412861, 80.378175),
(58, 2, 'Galkiriyagama', 'ගල්කිරියාගම', NULL, NULL, NULL, NULL, '50120', 7.9414, 80.565),
(59, 2, 'Galkulama', 'ගල්කුලම', NULL, NULL, NULL, NULL, '50064', 8.270414, 80.506526),
(60, 2, 'Galnewa', 'ගල්නෑව', NULL, NULL, NULL, NULL, '50170', 8.2, 80.3667),
(61, 2, 'Gambirigaswewa', 'ගම්බිරිගස්වැව', NULL, NULL, NULL, NULL, '50057', 8.4667, 80.3667),
(62, 2, 'Ganewalpola', 'ගනේවල්පොල', NULL, NULL, NULL, NULL, '50142', 8.090528, 80.628195),
(63, 2, 'Gemunupura', 'ගැමුණුපුර', NULL, NULL, NULL, NULL, '50224', 8.0667, 80.6833),
(64, 2, 'Getalawa', 'ගෙතලාව', NULL, NULL, NULL, NULL, '50392', 8.6167, 80.5333),
(65, 2, 'Gnanikulama', 'ඝාණිකුළම', NULL, NULL, NULL, NULL, '50036', 8.297336, 80.431753),
(66, 2, 'Gonahaddenawa', 'ගෝනහද්දෙනෑව', NULL, NULL, NULL, NULL, '50554', 8.5333, 80.5083),
(67, 2, 'Habarana', 'හබරන', NULL, NULL, NULL, NULL, '50150', 8.047531, 80.748664),
(68, 2, 'Halmillawa Dambulla', 'හල්මිලෑව දඹුල්ල', NULL, NULL, NULL, NULL, '50124', 7.9474, 80.594),
(69, 2, 'Halmillawetiya', 'හල්මිල්ලවැටිය', NULL, NULL, NULL, NULL, '50552', 8.35, 80.2667),
(70, 2, 'Hidogama', 'හිද්දෝගම', NULL, NULL, NULL, NULL, '50044', 8.250421, 80.418663),
(71, 2, 'Horawpatana', 'හොරොව්පතාන', NULL, NULL, NULL, NULL, '50350', 8.4333, 80.8667),
(72, 2, 'Horiwila', 'හොරිවිල', NULL, NULL, NULL, NULL, '50222', 8.0667, 80.6833),
(73, 2, 'Hurigaswewa', 'හුරිගස්වැව', NULL, NULL, NULL, NULL, '50176', 8.1333, 80.3667),
(74, 2, 'Hurulunikawewa', 'හුරුලුනිකවැව', NULL, NULL, NULL, NULL, '50394', 8.6167, 80.5333),
(75, 2, 'Ihala Puliyankulama', 'ඉහල පුලියන්කුලම', NULL, NULL, NULL, NULL, '61316', 8.153213, 80.559989),
(76, 2, 'Kagama', 'කගම', NULL, NULL, NULL, NULL, '50282', 8.061465, 80.478039),
(77, 2, 'Kahatagasdigiliya', 'කහටගස්දිගිලිය', NULL, NULL, NULL, NULL, '50320', 8.4167, 80.6833),
(78, 2, 'Kahatagollewa', 'කහටගොල්ලෑව', NULL, NULL, NULL, NULL, '50562', 8.45, 80.65),
(79, 2, 'Kalakarambewa', 'කලකරඹෑව', NULL, NULL, NULL, NULL, '50288', 8.0833, 80.4667),
(80, 2, 'Kalaoya', 'කලාඔය', NULL, NULL, NULL, NULL, '50226', 8.0667, 80.6833),
(81, 2, 'Kalawedi Ulpotha', 'කලාවැදි උල්පොත', NULL, NULL, NULL, NULL, '50556', 8.5333, 80.5083),
(82, 2, 'Kallanchiya', 'කලංචිය', NULL, NULL, NULL, NULL, '50454', 8.45, 80.55),
(83, 2, 'Kalpitiya', 'කල්පිටිය', NULL, NULL, NULL, NULL, '61360', 8.2333, 79.7667),
(84, 2, 'Kalukele Badanagala', 'කළුකැලේ බදනාගල', NULL, NULL, NULL, NULL, '51037', 7.9167, 80.55),
(85, 2, 'Kapugallawa', 'කපුගල්ලව', NULL, NULL, NULL, NULL, '50370', 8.4233, 80.6783),
(86, 2, 'Karagahawewa', 'කරගහවැව', NULL, NULL, NULL, NULL, '50232', 8.23416, 80.322772),
(87, 2, 'Kashyapapura', 'කාශ්‍යපපුර', NULL, NULL, NULL, NULL, '51032', 7.9167, 80.55),
(88, 2, 'Kebithigollewa', 'කැබිතිගොල්ලෑව', NULL, NULL, NULL, NULL, '50500', 8.5333, 80.4833),
(89, 2, 'Kekirawa', 'කැකිරාව', NULL, NULL, NULL, NULL, '50100', 8.037462, 80.59801),
(90, 2, 'Kendewa', 'කේන්දෑව', NULL, NULL, NULL, NULL, '50452', 8.4833, 80.6),
(91, 2, 'Kiralogama', 'කිරළෝගම', NULL, NULL, NULL, NULL, '50259', 8.19407, 80.37012),
(92, 2, 'Kirigalwewa', 'කිරිගල්වැව', NULL, NULL, NULL, NULL, '50511', 8.537767, 80.556651),
(93, 2, 'Kirimundalama', 'කිරිමුන්ඩලම', NULL, NULL, NULL, NULL, '61362', 8.2333, 79.7667),
(94, 2, 'Kitulhitiyawa', 'කිතුල්හිටියාව', NULL, NULL, NULL, NULL, '50132', 7.916592, 80.63811),
(95, 2, 'Kurundankulama', 'කුරුන්දන්කුලම', NULL, NULL, NULL, NULL, '50062', 8.2, 80.45),
(96, 2, 'Labunoruwa', 'ලබුනෝරුව', NULL, NULL, NULL, NULL, '50088', 8.168026, 80.617001),
(97, 2, 'Ihalagama', 'ඉහලගම', NULL, NULL, NULL, NULL, '50304', 8.35, 80.5),
(98, 2, 'Ipologama', 'ඉපොලොගම', NULL, NULL, NULL, NULL, '50280', 8.0833, 80.4667),
(99, 2, 'Madatugama', 'මාදතුගම', NULL, NULL, NULL, NULL, '50130', 7.940041, 80.638217),
(100, 2, 'Maha Elagamuwa', 'මහ ඇලගමුව', NULL, NULL, NULL, NULL, '50126', 7.991935, 80.61824),
(101, 2, 'Mahabulankulama', 'මහබුලංකුලම', NULL, NULL, NULL, NULL, '50196', 7.9753, 80.5266),
(102, 2, 'Mahailluppallama', 'මහඉලුප්පල්ලම', NULL, NULL, NULL, NULL, '50270', 8.106, 80.3619),
(103, 2, 'Mahakanadarawa', 'මහකනදරාව', NULL, NULL, NULL, NULL, '50306', 8.35, 80.5),
(104, 2, 'Mahapothana', 'මහපොතාන', NULL, NULL, NULL, NULL, '50327', 8.4167, 80.6833),
(105, 2, 'Mahasenpura', 'මහසෙන්පුර', NULL, NULL, NULL, NULL, '50574', 8.5595, 80.5476),
(106, 2, 'Mahawilachchiya', 'මහවිලච්චිය', NULL, NULL, NULL, NULL, '50022', 8.2814, 80.4588),
(107, 2, 'Mailagaswewa', 'මයිලගස්වැව', NULL, NULL, NULL, NULL, '50384', 8.4, 80.6333),
(108, 2, 'Malwanagama', 'මල්වනගම', NULL, NULL, NULL, NULL, '50236', 8.225, 80.3333),
(109, 2, 'Maneruwa', 'මනේරුව', NULL, NULL, NULL, NULL, '50182', 7.895997, 80.475966),
(110, 2, 'Maradankadawala', 'මරදන්කඩවල', NULL, NULL, NULL, NULL, '50080', 8.1333, 80.4833),
(111, 2, 'Maradankalla', 'මරදන්කල්ල', NULL, NULL, NULL, NULL, '50308', 8.317498, 80.537899),
(112, 2, 'Medawachchiya', 'මැදවච්චිය', NULL, NULL, NULL, NULL, '50500', 8.540822, 80.495957),
(113, 2, 'Megodawewa', 'මීගොඩවැව', NULL, NULL, NULL, NULL, '50334', 8.2333, 80.7333),
(114, 2, 'Mihintale', 'මිහින්තලේ', NULL, NULL, NULL, NULL, '50300', 8.35, 80.5),
(115, 2, 'Morakewa', 'මොරකෑව', NULL, NULL, NULL, NULL, '50349', 8.513051, 80.778223),
(116, 2, 'Mulkiriyawa', 'මුල්කිරියාව', NULL, NULL, NULL, NULL, '50324', 8.4167, 80.6833),
(117, 2, 'Muriyakadawala', 'මුරියකඩවල', NULL, NULL, NULL, NULL, '50344', 8.236464, 80.654663),
(118, 5, 'Colombo 15', 'කොළඹ 15', 'கொழும்பு 15', 'Modara', 'මෝදර', 'முகத்துவாரம்', '01500', 6.959444, 79.875278),
(119, 2, 'Nachchaduwa', 'නච්චදූව', NULL, NULL, NULL, NULL, '50046', 8.2667, 80.4667),
(120, 2, 'Namalpura', 'නාමල්පුර', NULL, NULL, NULL, NULL, '50339', 8.2333, 80.7333),
(121, 2, 'Negampaha', 'නෑගම්පහ', NULL, NULL, NULL, NULL, '50180', 7.9872, 80.4597),
(122, 2, 'Nochchiyagama', 'නොච්චියාගම', NULL, NULL, NULL, NULL, '50200', 8.266802, 80.20823),
(123, 2, 'Nuwaragala', 'නුවරගල', NULL, NULL, NULL, NULL, '51039', 7.9167, 80.55),
(124, 2, 'Padavi Maithripura', 'පදවි මෛත්‍රීපුර', NULL, NULL, NULL, NULL, '50572', 8.5595, 80.5476),
(125, 2, 'Padavi Parakramapura', 'පදවි පරාක්‍රමපුර', NULL, NULL, NULL, NULL, '50582', 8.5595, 80.5476),
(126, 2, 'Padavi Sripura', 'පදවි ශ්‍රීපුර', NULL, NULL, NULL, NULL, '50587', 8.5595, 80.5476),
(127, 2, 'Padavi Sritissapura', 'පදවි ශ්‍රීතිස්සපුර', NULL, NULL, NULL, NULL, '50588', 8.5595, 80.5476),
(128, 2, 'Padaviya', 'පදවිය', NULL, NULL, NULL, NULL, '50570', 8.5595, 80.5476),
(129, 2, 'Padikaramaduwa', 'පඩිකරමඩුව', NULL, NULL, NULL, NULL, '50338', 8.2333, 80.7333),
(130, 2, 'Pahala Halmillewa', 'පහල හල්මිල්ලෑව', NULL, NULL, NULL, NULL, '50206', 8.21672, 80.19116),
(131, 2, 'Pahala Maragahawe', 'පහල මරගහවෙ', NULL, NULL, NULL, NULL, '50220', 8.0667, 80.6833),
(132, 2, 'Pahalagama', 'පහලගම', NULL, NULL, NULL, NULL, '50244', 8.186896, 80.283767),
(133, 2, 'Palugaswewa', 'පලුගස්වැව', NULL, NULL, NULL, NULL, '50144', 8.053538, 80.71918),
(134, 2, 'Pandukabayapura', 'පන්ඩුකාබයපුර', NULL, NULL, NULL, NULL, '50448', 8.4467, 80.46731),
(135, 2, 'Pandulagama', 'පන්ඩුලගම', NULL, NULL, NULL, NULL, '50029', 8.2814, 80.4588),
(136, 2, 'Parakumpura', 'පරාක්‍රමපුර', NULL, NULL, NULL, NULL, '50326', 8.4167, 80.6833),
(137, 2, 'Parangiyawadiya', 'පරංගියාවාඩිය', NULL, NULL, NULL, NULL, '50354', 8.491831, 80.910014),
(138, 2, 'Parasangahawewa', 'පරසන්ගහවැව', NULL, NULL, NULL, NULL, '50055', 8.4333, 80.4333),
(139, 2, 'Pelatiyawa', 'පැලටියාව', NULL, NULL, NULL, NULL, '51033', 7.9167, 80.55),
(140, 2, 'Pemaduwa', 'පෙමදූව', NULL, NULL, NULL, NULL, '50020', 8.2814, 80.4588),
(141, 2, 'Perimiyankulama', 'පෙරිමියන්කුලම', NULL, NULL, NULL, NULL, '50004', 8.270584, 80.535827),
(142, 2, 'Pihimbiyagolewa', 'පිහිඹියගොල්ලෑව', NULL, NULL, NULL, NULL, '50512', 8.5595, 80.5476),
(143, 2, 'Pubbogama', 'පුබ්බෝගම', NULL, NULL, NULL, NULL, '50122', 7.9167, 80.6),
(144, 2, 'Punewa', 'පූනෑව', NULL, NULL, NULL, NULL, '50506', 8.6167, 80.4667),
(145, 2, 'Rajanganaya', 'රාජාංගනය', NULL, NULL, NULL, NULL, '50246', 8.1708, 80.2833),
(146, 2, 'Rambewa', 'රම්බෑව්', NULL, NULL, NULL, NULL, '50450', 8.4333, 80.5),
(147, 2, 'Rampathwila', 'රම්පත්විල', NULL, NULL, NULL, NULL, '50386', 8.4, 80.6333),
(148, 2, 'Rathmalgahawewa', 'රත්මල්ගහවැව', NULL, NULL, NULL, NULL, '50514', 8.5595, 80.5476),
(149, 2, 'Saliyapura', 'සාලියපුර', NULL, NULL, NULL, NULL, '50008', 8.3389, 80.4333),
(150, 2, 'Seeppukulama', 'සීප්පුකුලම', NULL, NULL, NULL, NULL, '50380', 8.4, 80.6333),
(151, 2, 'Senapura', 'සේනාපුර', NULL, NULL, NULL, NULL, '50284', 8.0833, 80.4667),
(152, 2, 'Sivalakulama', 'සිවලකුලම', NULL, NULL, NULL, NULL, '50068', 8.25237, 80.641743),
(153, 2, 'Siyambalewa', 'සියඹලෑව', NULL, NULL, NULL, NULL, '50184', 7.95, 80.5167),
(154, 2, 'Sravasthipura', 'ස්‍රාවස්තිපුර', NULL, NULL, NULL, NULL, '50042', 8.2667, 80.4333),
(155, 2, 'Talawa', 'තලාව', NULL, NULL, NULL, NULL, '50230', 8.2167, 80.35),
(156, 2, 'Tambuttegama', 'තඹුත්තේගම', NULL, NULL, NULL, NULL, '50240', 8.15, 80.3),
(157, 2, 'Tammennawa', 'තම්මැන්නාව', NULL, NULL, NULL, NULL, '50104', 8.0333, 80.6),
(158, 2, 'Tantirimale', 'තන්තිරිමලේ', NULL, NULL, NULL, NULL, '50016', 8.4, 80.3),
(159, 2, 'Telhiriyawa', 'තෙල්හිරියාව', NULL, NULL, NULL, NULL, '50242', 8.15, 80.3333),
(160, 2, 'Tirappane', 'තිරප්පනේ', NULL, NULL, NULL, NULL, '50072', 8.2167, 80.3833),
(161, 2, 'Tittagonewa', 'තිත්තගෝනෑව', NULL, NULL, NULL, NULL, '50558', 8.7167, 80.75),
(162, 2, 'Udunuwara Colony', 'උඩුනුවර කොළණිය', NULL, NULL, NULL, NULL, '50207', 8.2417, 80.1917),
(163, 2, 'Upuldeniya', 'උපුල්දෙනිය', NULL, NULL, NULL, NULL, '50382', 8.4, 80.6333),
(164, 2, 'Uttimaduwa', 'උට්ටිමඩුව', NULL, NULL, NULL, NULL, '50067', 8.254989, 80.55487),
(165, 2, 'Vellamanal', 'වෙල්ලමනල්', NULL, NULL, NULL, NULL, '31053', 8.5167, 81.1833),
(166, 2, 'Viharapalugama', 'විහාරපාළුගම', NULL, NULL, NULL, NULL, '50012', 8.4, 80.3),
(167, 2, 'Wahalkada', 'වාහල්කඩ', NULL, NULL, NULL, NULL, '50564', 8.5667, 80.6222),
(168, 2, 'Wahamalgollewa', 'වහමල්ගොල්ලෑව', NULL, NULL, NULL, NULL, '50492', 8.479838, 80.497451),
(169, 2, 'Walagambahuwa', 'වලගම්බාහුව', NULL, NULL, NULL, NULL, '50086', 8.153134, 80.499049),
(170, 2, 'Walahaviddawewa', 'වලහාවිද්දෑව', NULL, NULL, NULL, NULL, '50516', 8.5595, 80.5476),
(171, 2, 'Welimuwapotana', 'වැලිමුවපතාන', NULL, NULL, NULL, NULL, '50358', 8.4333, 80.8667),
(172, 2, 'Welioya Project', 'වැලිඔය ව්‍යාපෘතිය', NULL, NULL, NULL, NULL, '50586', 8.5595, 80.5476),
(173, 3, 'Akkarasiyaya', 'අක්කරසියය', NULL, NULL, NULL, NULL, '90166', 6.7792, 80.9208),
(174, 3, 'Aluketiyawa', 'අලුකෙටියාව', NULL, NULL, NULL, NULL, '90736', 7.317155, 81.127134),
(175, 3, 'Aluttaramma', 'අළුත්තරම', NULL, NULL, NULL, NULL, '90722', 7.2167, 81.0667),
(176, 3, 'Ambadandegama', 'අඹදන්ඩෙගම', NULL, NULL, NULL, NULL, '90108', 6.81591, 81.056492),
(177, 3, 'Ambagasdowa', 'අඹගස්දූව', NULL, NULL, NULL, NULL, '90300', 6.928519, 80.892126),
(178, 3, 'Arawa', 'අරාව', NULL, NULL, NULL, NULL, '90017', 7.162769, 81.07755),
(179, 3, 'Arawakumbura', 'අරාවකුඹුර', NULL, NULL, NULL, NULL, '90532', 7.084925, 81.198802),
(180, 3, 'Arawatta', 'අරාවත්ත', NULL, NULL, NULL, NULL, '90712', 7.328715, 81.036976),
(181, 3, 'Atakiriya', 'අටකිරියාව', NULL, NULL, NULL, NULL, '90542', 7.0667, 81.1056),
(182, 3, 'Badulla', 'බදුල්ල', NULL, NULL, NULL, NULL, '90000', 6.995365, 81.048438),
(183, 3, 'Baduluoya', 'බදුලුඔය', NULL, NULL, NULL, NULL, '90019', 7.151852, 81.023867),
(184, 3, 'Ballaketuwa', 'බල්ලකැටුව', NULL, NULL, NULL, NULL, '90092', 6.862905, 81.097249),
(185, 3, 'Bambarapana', 'බඹරපාන', NULL, NULL, NULL, NULL, '90322', 7.1167, 81.0375),
(186, 3, 'Bandarawela', 'බණ්ඩාරවෙල', NULL, NULL, NULL, NULL, '90100', 6.828867, 80.990898),
(187, 3, 'Beramada', 'බෙරමඩ', NULL, NULL, NULL, NULL, '90066', 7.055713, 80.987238),
(188, 3, 'Bibilegama', 'බිබිලේගම', NULL, NULL, NULL, NULL, '90502', 6.887473, 81.141268),
(189, 3, 'Boragas', 'බොරගස්', NULL, NULL, NULL, NULL, '90362', 6.901625, 80.840162),
(190, 3, 'Boralanda', 'බොරලන්ද', NULL, NULL, NULL, NULL, '90170', 6.828637, 80.881603),
(191, 3, 'Bowela', 'බෝවෙල', NULL, NULL, NULL, NULL, '90302', 6.95, 80.9333),
(192, 3, 'Central Camp', 'මධ්‍යම කඳවුර', NULL, NULL, NULL, NULL, '32050', 7.3589, 81.1759),
(193, 3, 'Damanewela', 'දමනෙවෙල', NULL, NULL, NULL, NULL, '32126', 7.2125, 81.0583),
(194, 3, 'Dambana', 'දඹාන', NULL, NULL, NULL, NULL, '90714', 7.3583, 81.1083),
(195, 3, 'Dehiattakandiya', 'දෙහිඅත්තකන්ඩිය', NULL, NULL, NULL, NULL, '32150', 7.2125, 81.0583),
(196, 3, 'Demodara', 'දෙමෝදර', NULL, NULL, NULL, NULL, '90080', 6.899055, 81.053273),
(197, 3, 'Diganatenna', 'දිගනතැන්න', NULL, NULL, NULL, NULL, '90132', 6.8667, 80.9667),
(198, 3, 'Dikkapitiya', 'දික්කපිටිය', NULL, NULL, NULL, NULL, '90214', 6.7381, 80.9669),
(199, 3, 'Dimbulana', 'දිඹුලාන', NULL, NULL, NULL, NULL, '90324', 7.006897, 80.948431),
(200, 3, 'Divulapelessa', 'දිවුලපැලැස්ස', NULL, NULL, NULL, NULL, '90726', 7.2167, 81.0667),
(201, 3, 'Diyatalawa', 'දියතලාව', NULL, NULL, NULL, NULL, '90150', 6.8, 80.9667),
(202, 3, 'Dulgolla', 'දුල්ගොල්ල', NULL, NULL, NULL, NULL, '90104', 6.819618, 81.012115),
(203, 3, 'Ekiriyankumbura', 'ඇකිරියන්කුඹුර', NULL, NULL, NULL, NULL, '91502', 7.269736, 81.226709),
(204, 3, 'Ella', 'ඇල්ල', NULL, NULL, NULL, NULL, '90090', 6.874485, 81.050937),
(205, 3, 'Ettampitiya', 'ඇට්ටම්පිටිය', NULL, NULL, NULL, NULL, '90140', 6.9342, 80.9853),
(206, 3, 'Galauda', 'ගලඋඩ', NULL, NULL, NULL, NULL, '90065', 7.037347, 80.981759),
(207, 3, 'Galporuyaya', 'ගල්පොරුයාය', NULL, NULL, NULL, NULL, '90752', 7.4, 81.05),
(208, 3, 'Gawarawela', 'ගවරවෙල', NULL, NULL, NULL, NULL, '90082', 6.897394, 81.069668),
(209, 3, 'Girandurukotte', 'ගිරාඳුරුකෝට්ටෙ', NULL, NULL, NULL, NULL, '90750', 7.4, 81.05),
(210, 3, 'Godunna', 'ගොඩුන්න', NULL, NULL, NULL, NULL, '90067', 7.071959, 80.975003),
(211, 3, 'Gurutalawa', 'ගුරුතලාව', NULL, NULL, NULL, NULL, '90208', 6.8431, 80.9228),
(212, 3, 'Haldummulla', 'හල්දුම්මුල්ල', NULL, NULL, NULL, NULL, '90180', 6.77061, 80.884385),
(213, 3, 'Hali Ela', 'හාලි ඇල', NULL, NULL, NULL, NULL, '90060', 6.95, 81.0333),
(214, 3, 'Hangunnawa', 'හඟුන්නෑව', NULL, NULL, NULL, NULL, '90224', 6.948019, 80.871427),
(215, 3, 'Haputale', 'හපුතලේ', NULL, NULL, NULL, NULL, '90160', 6.7667, 80.9667),
(216, 3, 'Hebarawa', 'හබරාව', NULL, NULL, NULL, NULL, '90724', 7.2167, 81.0667),
(217, 3, 'Heeloya', 'හීලොය', NULL, NULL, NULL, NULL, '90112', 6.8212, 80.9407),
(218, 3, 'Helahalpe', 'හෙලහල්පේ', NULL, NULL, NULL, NULL, '90122', 6.8212, 80.9407),
(219, 3, 'Helapupula', 'හෙලපුපුළ', NULL, NULL, NULL, NULL, '90094', 6.8556, 81.0722),
(220, 3, 'Hopton', 'හෝප්ටන්', NULL, NULL, NULL, NULL, '90524', 6.9594, 81.1552),
(221, 3, 'Idalgashinna', 'ඉදල්ගස්ඉන්න', NULL, NULL, NULL, NULL, '96167', 6.7833, 80.9),
(222, 3, 'Kahataruppa', 'කහටරුප්ප', NULL, NULL, NULL, NULL, '90052', 7.023705, 81.105188),
(223, 3, 'Kalugahakandura', 'කළුගහකණ්ඳුර', NULL, NULL, NULL, NULL, '90546', 7.123675, 81.094178),
(224, 3, 'Kalupahana', 'කළුපහණ', NULL, NULL, NULL, NULL, '90186', 6.770298, 80.854521),
(225, 3, 'Kebillawela', 'කොබිල්ලවෙල', NULL, NULL, NULL, NULL, '90102', 6.816937, 80.993072),
(226, 3, 'Kendagolla', 'කන්දෙගොල්ල', NULL, NULL, NULL, NULL, '90048', 6.990765, 81.110073),
(227, 3, 'Keselpotha', 'කෙසෙල්පොත', NULL, NULL, NULL, NULL, '90738', 7.32819, 81.083285),
(228, 3, 'Ketawatta', 'කේතවත්ත', NULL, NULL, NULL, NULL, '90016', 7.103503, 81.080813),
(229, 3, 'Kiriwanagama', 'කිරිවනගම', NULL, NULL, NULL, NULL, '90184', 6.971183, 80.91551),
(230, 3, 'Koslanda', 'කොස්ලන්ද', NULL, NULL, NULL, NULL, '90190', 6.759935, 81.027417),
(231, 3, 'Kuruwitenna', NULL, NULL, NULL, NULL, NULL, '90728', 7.2167, 81.0667),
(232, 3, 'Kuttiyagolla', NULL, NULL, NULL, NULL, NULL, '90046', 7.0167, 81.0833),
(233, 3, 'Landewela', NULL, NULL, NULL, NULL, NULL, '90068', 7.002113, 81.000496),
(234, 3, 'Liyangahawela', NULL, NULL, NULL, NULL, NULL, '90106', 6.817452, 81.032456),
(235, 3, 'Lunugala', NULL, NULL, NULL, NULL, NULL, '90530', 7.041299, 81.199335),
(236, 3, 'Lunuwatta', NULL, NULL, NULL, NULL, NULL, '90310', 6.953933, 80.917059),
(237, 3, 'Madulsima', NULL, NULL, NULL, NULL, NULL, '90535', 7.045064, 81.133375),
(238, 3, 'Mahiyanganaya', NULL, NULL, NULL, NULL, NULL, '90700', 7.2444, 81.1167),
(239, 3, 'Makulella', NULL, NULL, NULL, NULL, NULL, '90114', 6.8212, 80.9407),
(240, 3, 'Malgoda', NULL, NULL, NULL, NULL, NULL, '90754', 7.4, 81.05),
(241, 3, 'Mapakadawewa', NULL, NULL, NULL, NULL, NULL, '90730', 7.3, 81.1167),
(242, 3, 'Maspanna', NULL, NULL, NULL, NULL, NULL, '90328', 7.024427, 80.942159),
(243, 3, 'Maussagolla', NULL, NULL, NULL, NULL, NULL, '90582', 6.898433, 81.147817),
(244, 3, 'Mawanagama', NULL, NULL, NULL, NULL, NULL, '32158', 7.2125, 81.0583),
(245, 3, 'Medawela Udukinda', NULL, NULL, NULL, NULL, NULL, '90218', 6.846, 80.9279),
(246, 3, 'Meegahakiula', NULL, NULL, NULL, NULL, NULL, '90015', 7.0833, 80.9833),
(247, 3, 'Metigahatenna', NULL, NULL, NULL, NULL, NULL, '90540', 6.9667, 81.0833),
(248, 3, 'Mirahawatta', NULL, NULL, NULL, NULL, NULL, '90134', 6.8817, 80.9347),
(249, 3, 'Miriyabedda', NULL, NULL, NULL, NULL, NULL, '90504', 6.9167, 81.15),
(250, 3, 'Nawamedagama', NULL, NULL, NULL, NULL, NULL, '32120', 7.2125, 81.0583),
(251, 3, 'Nelumgama', NULL, NULL, NULL, NULL, NULL, '90042', 7, 81.0917),
(252, 3, 'Nikapotha', NULL, NULL, NULL, NULL, NULL, '90165', 6.740622, 80.97083),
(253, 3, 'Nugatalawa', NULL, NULL, NULL, NULL, NULL, '90216', 6.9, 80.8833),
(254, 3, 'Ohiya', NULL, NULL, NULL, NULL, NULL, '90168', 6.821352, 80.841789),
(255, 3, 'Pahalarathkinda', NULL, NULL, NULL, NULL, NULL, '90756', 7.4, 81.05),
(256, 3, 'Pallekiruwa', NULL, NULL, NULL, NULL, NULL, '90534', 7.007551, 81.227033),
(257, 3, 'Passara', NULL, NULL, NULL, NULL, NULL, '90500', 6.935017, 81.151166),
(258, 3, 'Pattiyagedara', NULL, NULL, NULL, NULL, NULL, '90138', 6.8742, 80.9507),
(259, 3, 'Pelagahatenna', NULL, NULL, NULL, NULL, NULL, '90522', 6.9594, 81.1552),
(260, 3, 'Perawella', NULL, NULL, NULL, NULL, NULL, '90222', 6.943148, 80.84264),
(261, 3, 'Pitamaruwa', NULL, NULL, NULL, NULL, NULL, '90544', 7.106546, 81.135882),
(262, 3, 'Pitapola', NULL, NULL, NULL, NULL, NULL, '90171', 6.803692, 80.884474),
(263, 3, 'Puhulpola', NULL, NULL, NULL, NULL, NULL, '90212', 6.907145, 80.931109),
(264, 3, 'Rajagalatenna', NULL, NULL, NULL, NULL, NULL, '32068', 7.5458, 81.125),
(265, 3, 'Ratkarawwa', NULL, NULL, NULL, NULL, NULL, '90164', 6.8, 80.9167),
(266, 3, 'Ridimaliyadda', NULL, NULL, NULL, NULL, NULL, '90704', 7.2333, 81.1),
(267, 3, 'Silmiyapura', NULL, NULL, NULL, NULL, NULL, '90364', 6.912388, 80.843988),
(268, 3, 'Sirimalgoda', NULL, NULL, NULL, NULL, NULL, '90044', 7.003857, 81.073671),
(269, 3, 'Siripura', NULL, NULL, NULL, NULL, NULL, '32155', 7.2125, 81.0583),
(270, 3, 'Sorabora Colony', NULL, NULL, NULL, NULL, NULL, '90718', 7.3583, 81.1083),
(271, 3, 'Soragune', NULL, NULL, NULL, NULL, NULL, '90183', 6.8333, 80.8778),
(272, 3, 'Soranatota', NULL, NULL, NULL, NULL, NULL, '90008', 7.0167, 81.05),
(273, 3, 'Taldena', NULL, NULL, NULL, NULL, NULL, '90014', 7.0833, 81.05),
(274, 3, 'Timbirigaspitiya', NULL, NULL, NULL, NULL, NULL, '90012', 7.0333, 81.05),
(275, 3, 'Uduhawara', NULL, NULL, NULL, NULL, NULL, '90226', 6.94706, 80.85877),
(276, 3, 'Uraniya', NULL, NULL, NULL, NULL, NULL, '90702', 7.237143, 81.102818),
(277, 3, 'Uva Karandagolla', NULL, NULL, NULL, NULL, NULL, '90091', 6.8333, 81.0667),
(278, 3, 'Uva Mawelagama', NULL, NULL, NULL, NULL, NULL, '90192', 6.7333, 81.0167),
(279, 3, 'Uva Tenna', NULL, NULL, NULL, NULL, NULL, '90188', 6.8333, 80.8778),
(280, 3, 'Uva Tissapura', NULL, NULL, NULL, NULL, NULL, '90734', 7.3, 81.1167),
(281, 3, 'Welimada', NULL, NULL, NULL, NULL, NULL, '90200', 6.906059, 80.913222),
(282, 3, 'Werunketagoda', NULL, NULL, NULL, NULL, NULL, '32062', 7.5458, 81.125),
(283, 3, 'Wewatta', NULL, NULL, NULL, NULL, NULL, '90716', 7.337729, 81.201255),
(284, 3, 'Wineethagama', NULL, NULL, NULL, NULL, NULL, '90034', 7.029, 80.937),
(285, 3, 'Yalagamuwa', NULL, NULL, NULL, NULL, NULL, '90329', 7.047834, 80.950541),
(286, 3, 'Yalwela', NULL, NULL, NULL, NULL, NULL, '90706', 7.2667, 81.15),
(287, 4, 'Addalaichenai', NULL, NULL, NULL, NULL, NULL, '32350', 7.4833, 81.75),
(288, 4, 'Ampilanthurai', 'අම්පිලන්තුරෙයි', NULL, NULL, NULL, NULL, '30162', 7.8597, 81.4411),
(289, 4, 'Araipattai', NULL, NULL, NULL, NULL, NULL, '30150', 7.667705, 81.725335),
(290, 4, 'Ayithiyamalai', NULL, NULL, NULL, NULL, NULL, '30362', 7.670934, 81.574798),
(291, 4, 'Bakiella', NULL, NULL, NULL, NULL, NULL, '30206', 7.5083, 81.7583),
(292, 4, 'Batticaloa', 'මඩකලපුව', NULL, NULL, NULL, NULL, '30000', 7.7167, 81.7),
(293, 4, 'Cheddipalayam', 'චෙඩ්ඩිපලයම්', NULL, NULL, NULL, NULL, '30194', 7.575161, 81.783189),
(294, 4, 'Chenkaladi', 'චෙන්කලඩි', NULL, NULL, NULL, NULL, '30350', 7.7833, 81.6),
(295, 4, 'Eravur', 'එරාවූර්', NULL, NULL, NULL, NULL, '30300', 7.768518, 81.619817),
(296, 4, 'Kaluwanchikudi', NULL, NULL, NULL, NULL, NULL, '30200', 7.5167, 81.7833),
(297, 4, 'Kaluwankemy', NULL, NULL, NULL, NULL, NULL, '30372', 7.8, 81.5667),
(298, 4, 'Kannankudah', NULL, NULL, NULL, NULL, NULL, '30016', 7.675505, 81.674125),
(299, 4, 'Karadiyanaru', NULL, NULL, NULL, NULL, NULL, '30354', 7.689478, 81.531117),
(300, 4, 'Kathiraveli', NULL, NULL, NULL, NULL, NULL, '30456', 8.243933, 81.360298),
(301, 4, 'Kattankudi', NULL, NULL, NULL, NULL, NULL, '30100', 7.675, 81.73),
(302, 4, 'Kiran', NULL, NULL, NULL, NULL, NULL, '30394', 7.866841, 81.529737),
(303, 4, 'Kirankulam', NULL, NULL, NULL, NULL, NULL, '30159', 7.615628, 81.764245),
(304, 4, 'Koddaikallar', NULL, NULL, NULL, NULL, NULL, '30249', 7.6389, 81.6639),
(305, 4, 'Kokkaddichcholai', NULL, NULL, NULL, NULL, NULL, '30160', 7.8597, 81.4411),
(306, 4, 'Kurukkalmadam', NULL, NULL, NULL, NULL, NULL, '30192', 7.594069, 81.77497),
(307, 4, 'Mandur', NULL, NULL, NULL, NULL, NULL, '30220', 7.482114, 81.762407),
(308, 4, 'Miravodai', NULL, NULL, NULL, NULL, NULL, '30426', 7.9, 81.5167),
(309, 4, 'Murakottanchanai', NULL, NULL, NULL, NULL, NULL, '30392', 7.8667, 81.5333),
(310, 4, 'Navagirinagar', NULL, NULL, NULL, NULL, NULL, '30238', 7.525, 81.725),
(311, 4, 'Navatkadu', NULL, NULL, NULL, NULL, NULL, '30018', 7.5833, 81.7167),
(312, 4, 'Oddamavadi', NULL, NULL, NULL, NULL, NULL, '30420', 7.9167, 81.5167),
(313, 4, 'Palamunai', NULL, NULL, NULL, NULL, NULL, '32354', 7.4833, 81.75),
(314, 4, 'Pankudavely', NULL, NULL, NULL, NULL, NULL, '30352', 7.75, 81.5667),
(315, 4, 'Periyaporativu', NULL, NULL, NULL, NULL, NULL, '30230', 7.536243, 81.764557),
(316, 4, 'Periyapullumalai', NULL, NULL, NULL, NULL, NULL, '30358', 7.561255, 81.47434),
(317, 4, 'Pillaiyaradi', NULL, NULL, NULL, NULL, NULL, '30022', 7.75, 81.6333),
(318, 4, 'Punanai', NULL, NULL, NULL, NULL, NULL, '30428', 7.9667, 81.3833),
(319, 4, 'Thannamunai', NULL, NULL, NULL, NULL, NULL, '30024', 7.76355, 81.645852),
(320, 4, 'Thettativu', NULL, NULL, NULL, NULL, NULL, '30196', 7.5833, 81.7833),
(321, 4, 'Thikkodai', NULL, NULL, NULL, NULL, NULL, '30236', 7.525269, 81.684177),
(322, 4, 'Thirupalugamam', NULL, NULL, NULL, NULL, NULL, '30234', 7.525, 81.725),
(323, 4, 'Unnichchai', NULL, NULL, NULL, NULL, NULL, '30364', 7.6167, 81.55),
(324, 4, 'Vakaneri', NULL, NULL, NULL, NULL, NULL, '30424', 7.9167, 81.4333),
(325, 4, 'Vakarai', NULL, NULL, NULL, NULL, NULL, '30450', 8.165968, 81.415623),
(326, 4, 'Valaichenai', NULL, NULL, NULL, NULL, NULL, '30400', 7.7, 81.6),
(327, 4, 'Vantharumoolai', NULL, NULL, NULL, NULL, NULL, '30376', 7.807445, 81.591476),
(328, 4, 'Vellavely', NULL, NULL, NULL, NULL, NULL, '30204', 7.5, 81.7333),
(329, 5, 'Akarawita', 'අකරවිට', NULL, NULL, NULL, NULL, '10732', 6.95, 80.1),
(330, 5, 'Ambalangoda', 'අම්බලන්ගොඩ', NULL, NULL, NULL, NULL, '80300', 6.77533, 79.96413),
(331, 5, 'Athurugiriya', 'අතුරුගිරිය', NULL, NULL, NULL, NULL, '10150', 6.873072, 79.997214),
(332, 5, 'Avissawella', 'අවිස්සාවේල්ල', NULL, NULL, NULL, NULL, '10700', 6.955003, 80.211692),
(333, 5, 'Batawala', 'බටවැල', NULL, NULL, NULL, NULL, '10513', 6.877924, 80.051592),
(334, 5, 'Battaramulla', 'බත්තරමුල්ල', NULL, NULL, NULL, NULL, '10120', 6.900299, 79.922136),
(335, 5, 'Biyagama', 'බියගම', NULL, NULL, NULL, NULL, '11650', 6.9408, 79.9889),
(336, 5, 'Bope', 'බෝපෙ', NULL, NULL, NULL, NULL, '10522', 6.8333, 80.1167),
(337, 5, 'Boralesgamuwa', 'බොරලැස්ගමුව', NULL, NULL, NULL, NULL, '10290', 6.8425, 79.9006),
(338, 5, 'Colombo 8', 'කොළඹ 8', 'கொழும்பு 8', 'Borella', 'බොරැල්ල', 'பொறளை', '00800', 6.914722, 79.877778),
(339, 5, 'Dedigamuwa', 'දැඩිගමුව', NULL, NULL, NULL, NULL, '10656', 6.9115, 80.0622),
(340, 5, 'Dehiwala', 'දෙහිවල', NULL, NULL, NULL, NULL, '10350', 6.856387, 79.865156),
(341, 5, 'Deltara', 'දෙල්තර', NULL, NULL, NULL, NULL, '10302', 6.7833, 79.9167),
(342, 5, 'Habarakada', 'හබරකඩ', NULL, NULL, NULL, NULL, '10204', 6.882518, 80.017704),
(343, 5, 'Hanwella', NULL, NULL, NULL, NULL, NULL, '10650', 6.905988, 80.083333),
(344, 5, 'Hiripitya', NULL, NULL, NULL, NULL, NULL, '10232', 6.85, 79.95),
(345, 5, 'Hokandara', NULL, NULL, NULL, NULL, NULL, '10118', 6.890237, 79.969894),
(346, 5, 'Homagama', NULL, NULL, NULL, NULL, NULL, '10200', 6.85685, 80.005384),
(347, 5, 'Horagala', NULL, NULL, NULL, NULL, NULL, '10502', 6.807635, 80.066995),
(348, 5, 'Kaduwela', NULL, NULL, NULL, NULL, NULL, '10640', 6.930497, 79.984817),
(349, 5, 'Kaluaggala', NULL, NULL, NULL, NULL, NULL, '11224', 6.9167, 80.1),
(350, 5, 'Kapugoda', NULL, NULL, NULL, NULL, NULL, '10662', 6.9486, 80.1),
(351, 5, 'Kehelwatta', NULL, NULL, NULL, NULL, NULL, '12550', 6.75, 79.9167),
(352, 5, 'Kiriwattuduwa', NULL, NULL, NULL, NULL, NULL, '10208', 6.804157, 80.009759),
(353, 5, 'Kolonnawa', NULL, NULL, NULL, NULL, NULL, '10600', 6.933035, 79.888095),
(354, 5, 'Kosgama', NULL, NULL, NULL, NULL, NULL, '10730', 6.9333, 80.1411),
(355, 5, 'Madapatha', NULL, NULL, NULL, NULL, NULL, '10306', 6.766824, 79.930103),
(356, 5, 'Maharagama', NULL, NULL, NULL, NULL, NULL, '10280', 6.843401, 79.932766),
(357, 5, 'Malabe', NULL, NULL, NULL, NULL, NULL, '10115', 6.901241, 79.958072),
(358, 5, 'Moratuwa', NULL, NULL, NULL, NULL, NULL, '10400', 6.7733, 79.8825),
(359, 5, 'Mount Lavinia', NULL, NULL, NULL, NULL, NULL, '10370', 6.838864, 79.863141),
(360, 5, 'Mullegama', NULL, NULL, NULL, NULL, NULL, '10202', 6.887403, 80.012959),
(361, 5, 'Napawela', NULL, NULL, NULL, NULL, NULL, '10704', 6.9531, 80.2183),
(362, 5, 'Nugegoda', NULL, NULL, NULL, NULL, NULL, '10250', 6.877563, 79.886231),
(363, 5, 'Padukka', NULL, NULL, NULL, NULL, NULL, '10500', 6.837834, 80.090301),
(364, 5, 'Pannipitiya', NULL, NULL, NULL, NULL, NULL, '10230', 6.843999, 79.944518),
(365, 5, 'Piliyandala', NULL, NULL, NULL, NULL, NULL, '10300', 6.7981, 79.9264),
(366, 5, 'Pitipana Homagama', NULL, NULL, NULL, NULL, NULL, '10206', 6.8477, 80.016),
(367, 5, 'Polgasowita', NULL, NULL, NULL, NULL, NULL, '10320', 6.7842, 79.9811),
(368, 5, 'Pugoda', NULL, NULL, NULL, NULL, NULL, '10660', 6.9703, 80.1222),
(369, 5, 'Ranala', NULL, NULL, NULL, NULL, NULL, '10654', 6.915253, 80.032962),
(370, 5, 'Siddamulla', NULL, NULL, NULL, NULL, NULL, '10304', 6.815785, 79.955978),
(371, 5, 'Siyambalagoda', NULL, NULL, NULL, NULL, NULL, '81462', 6.800041, 79.966845),
(372, 5, 'Sri Jayawardenepu', NULL, NULL, NULL, NULL, NULL, '10100', 6.8897, 79.9359),
(373, 5, 'Talawatugoda', NULL, NULL, NULL, NULL, NULL, '10116', 6.8692, 79.9411),
(374, 5, 'Tummodara', NULL, NULL, NULL, NULL, NULL, '10682', 6.9061, 80.1353),
(375, 5, 'Waga', NULL, NULL, NULL, NULL, NULL, '10680', 6.9061, 80.1353),
(376, 5, 'Colombo 6', 'කොළඹ 6', 'கொழும்பு 6', 'Wellawatta', 'වැල්ලවත්ත', 'வெள்ளவத்தை', '00600', 6.874657, 79.860483),
(377, 6, 'Agaliya', 'අගලිය', NULL, NULL, NULL, NULL, '80212', 6.1833, 80.2),
(378, 6, 'Ahangama', 'අහංගම', NULL, NULL, NULL, NULL, '80650', 5.970765, 80.370204),
(379, 6, 'Ahungalla', 'අහුන්ගල්ල', NULL, NULL, NULL, NULL, '80562', 6.315216, 80.03029),
(380, 6, 'Akmeemana', 'අක්මීමාන', NULL, NULL, NULL, NULL, '80090', 6.1845, 80.3032),
(381, 6, 'Alawatugoda', 'අලවතුගොඩ', NULL, NULL, NULL, NULL, '20140', 6.4167, 80),
(382, 6, 'Aluthwala', 'අළුත්වල', NULL, NULL, NULL, NULL, '80332', 6.180801, 80.136538),
(383, 6, 'Ampegama', 'අම්පෙගම', NULL, NULL, NULL, NULL, '80204', 6.193907, 80.14453),
(384, 6, 'Amugoda', 'අමුගොඩ', NULL, NULL, NULL, NULL, '80422', 6.314635, 80.22104),
(385, 6, 'Anangoda', 'අනන්ගොඩ', NULL, NULL, NULL, NULL, '80044', 6.0722, 80.2389),
(386, 6, 'Angulugaha', 'අඟුලුගහ', NULL, NULL, NULL, NULL, '80122', 6.036963, 80.322148),
(387, 6, 'Ankokkawala', 'අංකොක්කාවල', NULL, NULL, NULL, NULL, '80048', 6.05329, 80.274014),
(388, 6, 'Aselapura', 'ඇසලපුර', NULL, NULL, NULL, NULL, '51072', 6.3167, 80.0333),
(389, 6, 'Baddegama', 'බද්දේගම', NULL, NULL, NULL, NULL, '80200', 6.165975, 80.201841),
(390, 6, 'Balapitiya', 'බලපිටිය', NULL, NULL, NULL, NULL, '80550', 6.269254, 80.036054),
(391, 6, 'Banagala', 'බනගල', NULL, NULL, NULL, NULL, '80143', 6.2706, 80.42),
(392, 6, 'Batapola', 'බටපොල', NULL, NULL, NULL, NULL, '80320', 6.235697, 80.120034),
(393, 6, 'Bentota', 'බෙන්තොට', NULL, NULL, NULL, NULL, '80500', 6.4211, 79.9989),
(394, 6, 'Boossa', 'බූස්ස', NULL, NULL, NULL, NULL, '80270', 6.2233, 80.2),
(395, 6, 'Dellawa', 'දෙල්ලව', NULL, NULL, NULL, NULL, '81477', 6.335012, 80.452741),
(396, 6, 'Dikkumbura', 'දික්කුඹුර', NULL, NULL, NULL, NULL, '80654', 6.012945, 80.376153),
(397, 6, 'Dodanduwa', 'දොඩන්දූව', NULL, NULL, NULL, NULL, '80250', 6.0967, 80.1456),
(398, 6, 'Ella Tanabaddegama', 'ඇල්ල තනබද්දේගම', NULL, NULL, NULL, NULL, '80402', 6.2922, 80.1988),
(399, 6, 'Elpitiya', 'ඇල්පිටිය', NULL, NULL, NULL, NULL, '80400', 6.300214, 80.171923),
(400, 6, 'Galle', 'ගාල්ල', NULL, NULL, NULL, NULL, '80000', 6.0536, 80.2117),
(401, 6, 'Ginimellagaha', 'ගිනිමෙල්ලගහ', NULL, NULL, NULL, NULL, '80220', 6.2233, 80.2),
(402, 6, 'Gintota', 'ගින්තොට', NULL, NULL, NULL, NULL, '80280', 6.0564, 80.1839),
(403, 6, 'Godahena', 'ගොඩහේන', NULL, NULL, NULL, NULL, '80302', 6.2333, 80.0667),
(404, 6, 'Gonamulla Junction', 'ගෝනමුල්ල හංදිය', NULL, NULL, NULL, NULL, '80054', 6.0667, 80.3),
(405, 6, 'Gonapinuwala', 'ගොනාපිනූවල', NULL, NULL, NULL, NULL, '80230', 6.2233, 80.2),
(406, 6, 'Habaraduwa', 'හබරාදූව', NULL, NULL, NULL, NULL, '80630', 6.0043, 80.326),
(407, 6, 'Haburugala', 'හබුරුගල', NULL, NULL, NULL, NULL, '80506', 6.4052, 80.038306),
(408, 6, 'Hikkaduwa', NULL, NULL, NULL, NULL, NULL, '80240', 6.139535, 80.113201),
(409, 6, 'Hiniduma', NULL, NULL, NULL, NULL, NULL, '80080', 6.316028, 80.328888),
(410, 6, 'Hiyare', NULL, NULL, NULL, NULL, NULL, '80056', 6.079898, 80.317871),
(411, 6, 'Kahaduwa', NULL, NULL, NULL, NULL, NULL, '80460', 6.2244, 80.21),
(412, 6, 'Kahawa', NULL, NULL, NULL, NULL, NULL, '80312', 6.185429, 80.07601),
(413, 6, 'Karagoda', NULL, NULL, NULL, NULL, NULL, '80151', 6.084182, 80.395041),
(414, 6, 'Karandeniya', NULL, NULL, NULL, NULL, NULL, '80360', 6.260467, 80.072462),
(415, 6, 'Kosgoda', NULL, NULL, NULL, NULL, NULL, '80570', 6.332288, 80.028315),
(416, 6, 'Kottawagama', NULL, NULL, NULL, NULL, NULL, '80062', 6.1375, 80.3419),
(417, 6, 'Kottegoda', NULL, NULL, NULL, NULL, NULL, '81180', 6.1667, 80.1),
(418, 6, 'Kuleegoda', NULL, NULL, NULL, NULL, NULL, '80328', 6.2167, 80.1167),
(419, 6, 'Magedara', NULL, NULL, NULL, NULL, NULL, '80152', 6.108129, 80.393927),
(420, 6, 'Mahawela Sinhapura', NULL, NULL, NULL, NULL, NULL, '51076', 6.3167, 80.0333),
(421, 6, 'Mapalagama', NULL, NULL, NULL, NULL, NULL, '80112', 6.234713, 80.27784),
(422, 6, 'Mapalagama Central', NULL, NULL, NULL, NULL, NULL, '80116', 6.2167, 80.3),
(423, 6, 'Mattaka', NULL, NULL, NULL, NULL, NULL, '80424', 6.302366, 80.254218),
(424, 6, 'Meda-Keembiya', NULL, NULL, NULL, NULL, NULL, '80092', 6.1845, 80.3032),
(425, 6, 'Meetiyagoda', NULL, NULL, NULL, NULL, NULL, '80330', 6.189135, 80.093504),
(426, 6, 'Nagoda', NULL, NULL, NULL, NULL, NULL, '80110', 6.201296, 80.277829),
(427, 6, 'Nakiyadeniya', NULL, NULL, NULL, NULL, NULL, '80064', 6.143029, 80.338164),
(428, 6, 'Nawadagala', NULL, NULL, NULL, NULL, NULL, '80416', 6.304655, 80.134175),
(429, 6, 'Neluwa', NULL, NULL, NULL, NULL, NULL, '80082', 6.37393, 80.363267),
(430, 6, 'Nindana', NULL, NULL, NULL, NULL, NULL, '80318', 6.207731, 80.107663),
(431, 6, 'Pahala Millawa', NULL, NULL, NULL, NULL, NULL, '81472', 6.293995, 80.475431),
(432, 6, 'Panangala', NULL, NULL, NULL, NULL, NULL, '80075', 6.274182, 80.334525),
(433, 6, 'Pannimulla Panagoda', NULL, NULL, NULL, NULL, NULL, '80086', 6.36, 80.3653),
(434, 6, 'Parana ThanaYamgoda', NULL, NULL, NULL, NULL, NULL, '80114', 6.2167, 80.3),
(435, 6, 'Patana', NULL, NULL, NULL, NULL, NULL, '22012', 6.1333, 80.1167),
(436, 6, 'Pitigala', NULL, NULL, NULL, NULL, NULL, '80420', 6.348894, 80.217851),
(437, 6, 'Poddala', NULL, NULL, NULL, NULL, NULL, '80170', 6.1167, 80.2167),
(438, 6, 'Polgampola', NULL, NULL, NULL, NULL, NULL, '12136', 6.3244, 80.4383),
(439, 6, 'Porawagama', NULL, NULL, NULL, NULL, NULL, '80408', 6.279568, 80.231811),
(440, 6, 'Rantotuwila', NULL, NULL, NULL, NULL, NULL, '80354', 6.3833, 80.0833),
(441, 6, 'Talagampola', NULL, NULL, NULL, NULL, NULL, '80058', 6.0667, 80.3),
(442, 6, 'Talgaspe', NULL, NULL, NULL, NULL, NULL, '80406', 6.3, 80.2),
(443, 6, 'Talpe', NULL, NULL, NULL, NULL, NULL, '80615', 6.0061, 80.2961),
(444, 6, 'Tawalama', NULL, NULL, NULL, NULL, NULL, '80148', 6.3333, 80.3333),
(445, 6, 'Tiranagama', NULL, NULL, NULL, NULL, NULL, '80244', 6.1333, 80.1167),
(446, 6, 'Udalamatta', NULL, NULL, NULL, NULL, NULL, '80108', 6.18924, 80.306106),
(447, 6, 'Udugama', NULL, NULL, NULL, NULL, NULL, '80070', 6.188469, 80.338951),
(448, 6, 'Uluvitike', NULL, NULL, NULL, NULL, NULL, '80168', 6.3056, 80.309),
(449, 6, 'Unawatuna', NULL, NULL, NULL, NULL, NULL, '80600', 6.0169, 80.249901),
(450, 6, 'Unenwitiya', NULL, NULL, NULL, NULL, NULL, '80214', 6.2417, 80.225),
(451, 6, 'Uragaha', NULL, NULL, NULL, NULL, NULL, '80352', 6.35, 80.1167),
(452, 6, 'Uragasmanhandiya', NULL, NULL, NULL, NULL, NULL, '80350', 6.358461, 80.082277),
(453, 6, 'Wakwella', NULL, NULL, NULL, NULL, NULL, '80042', 6.1, 80.1833),
(454, 6, 'Walahanduwa', NULL, NULL, NULL, NULL, NULL, '80046', 6.05443, 80.251763),
(455, 6, 'Wanchawela', NULL, NULL, NULL, NULL, NULL, '80120', 6.0333, 80.3167),
(456, 6, 'Wanduramba', NULL, NULL, NULL, NULL, NULL, '80100', 6.136388, 80.252794),
(457, 6, 'Warukandeniya', NULL, NULL, NULL, NULL, NULL, '80084', 6.381574, 80.43131),
(458, 6, 'Watugedara', NULL, NULL, NULL, NULL, NULL, '80340', 6.25, 80.05),
(459, 6, 'Weihena', NULL, NULL, NULL, NULL, NULL, '80216', 6.310127, 80.23392),
(460, 6, 'Welikanda', NULL, NULL, NULL, NULL, NULL, '51070', 6.3167, 80.0333),
(461, 6, 'Wilanagama', NULL, NULL, NULL, NULL, NULL, '20142', 6.4167, 80),
(462, 6, 'Yakkalamulla', NULL, NULL, NULL, NULL, NULL, '80150', 6.109027, 80.349195),
(463, 6, 'Yatalamatta', NULL, NULL, NULL, NULL, NULL, '80107', 6.172247, 80.293052),
(464, 7, 'Akaragama', 'අකරගම', NULL, NULL, NULL, NULL, '11536', 7.262603, 79.958057),
(465, 7, 'Ambagaspitiya', 'අඹගස්පිටිය', NULL, NULL, NULL, NULL, '11052', 7.0833, 80.0667),
(466, 7, 'Ambepussa', 'අඹේපුස්ස', NULL, NULL, NULL, NULL, '11212', 7.25, 80.1667),
(467, 7, 'Andiambalama', 'ආඬිඅම්බලම', NULL, NULL, NULL, NULL, '11558', 7.188346, 79.902344),
(468, 7, 'Attanagalla', 'අත්තනගල්ල', NULL, NULL, NULL, NULL, '11120', 7.1119, 80.1328),
(469, 7, 'Badalgama', 'බඩල්ගම', NULL, NULL, NULL, NULL, '11538', 7.291218, 79.978003),
(470, 7, 'Banduragoda', 'බඳුරගොඩ', NULL, NULL, NULL, NULL, '11244', 7.2319, 80.0678),
(471, 7, 'Batuwatta', 'බටුවත්ත', NULL, NULL, NULL, NULL, '11011', 7.058399, 79.932048),
(472, 7, 'Bemmulla', 'බෙම්මුල්ල', NULL, NULL, NULL, NULL, '11040', 7.120933, 80.028191),
(473, 7, 'Biyagama IPZ', 'බියගම IPZ', NULL, NULL, NULL, NULL, '11672', 6.9492, 80.0153),
(474, 7, 'Bokalagama', 'බොකලගම', NULL, NULL, NULL, NULL, '11216', 7.2333, 80.15),
(475, 7, 'Bollete (WP)', 'බොල්ලතේ', NULL, NULL, NULL, NULL, '11024', 7.0667, 79.95),
(476, 7, 'Bopagama', 'බෝපගම', NULL, NULL, NULL, NULL, '11134', 7.079641, 80.15868),
(477, 7, 'Buthpitiya', 'බුත්පිටිය', NULL, NULL, NULL, NULL, '11720', 7.042846, 80.051854),
(478, 7, 'Dagonna', 'දාගොන්න', NULL, NULL, NULL, NULL, '11524', 7.221568, 79.927455),
(479, 7, 'Danowita', 'දංඕවිට', NULL, NULL, NULL, NULL, '11896', 7.2028, 80.1758),
(480, 7, 'Debahera', 'දෙබහැර', NULL, NULL, NULL, NULL, '11889', 7.1389, 80.0981),
(481, 7, 'Dekatana', 'දෙකටන', NULL, NULL, NULL, NULL, '11690', 6.968317, 80.035385),
(482, 7, 'Delgoda', 'දෙල්ගොඩ', NULL, NULL, NULL, NULL, '11700', 6.986583, 80.01576),
(483, 7, 'Delwagura', 'දෙල්වගුර', NULL, NULL, NULL, NULL, '11228', 7.265367, 80.003272),
(484, 7, 'Demalagama', 'දෙමළගම', NULL, NULL, NULL, NULL, '11692', 6.988934, 80.046886),
(485, 7, 'Demanhandiya', 'දෙමන්හන්දිය', NULL, NULL, NULL, NULL, '11270', 7.2333, 79.9),
(486, 7, 'Dewalapola', 'දේවාලපොල', NULL, NULL, NULL, NULL, '11102', 7.162553, 79.997446),
(487, 7, 'Divulapitiya', 'දිවුලපිටිය', NULL, NULL, NULL, NULL, '11250', 7.2167, 80.0156),
(488, 7, 'Divuldeniya', 'දිවුල්දෙණිය', NULL, NULL, NULL, NULL, '11208', 7.3, 80.1),
(489, 7, 'Dompe', 'දොම්පෙ', NULL, NULL, NULL, NULL, '11680', 6.949806, 80.055083),
(490, 7, 'Dunagaha', 'දුනගහ', NULL, NULL, NULL, NULL, '11264', 7.2342, 79.9756),
(491, 7, 'Ekala', 'ඒකල', NULL, NULL, NULL, NULL, '11380', 7.105558, 79.91532),
(492, 7, 'Ellakkala', 'ඇල්ලක්කල', NULL, NULL, NULL, NULL, '11116', 7.135968, 80.132524),
(493, 7, 'Essella', NULL, NULL, NULL, NULL, NULL, '11108', 7.178736, 80.021603),
(494, 7, 'Galedanda', 'ගලේදණ්ඩ', NULL, NULL, NULL, NULL, '90206', 6.964202, 79.930611),
(495, 7, 'Gampaha', 'ගම්පහ', NULL, NULL, NULL, NULL, '11000', 7.0917, 79.9942),
(496, 7, 'Ganemulla', 'ගණේමුල්ල', NULL, NULL, NULL, NULL, '11020', 7.064183, 79.963294),
(497, 7, 'Giriulla', 'ගිරිවුල්ල', NULL, NULL, NULL, NULL, '60140', 7.3275, 80.1267),
(498, 7, 'Gonawala', 'ගෝනවල', NULL, NULL, NULL, NULL, '11630', 6.9612, 79.9992),
(499, 7, 'Halpe', 'හල්පෙ', NULL, NULL, NULL, NULL, '70145', 7.261935, 80.10821),
(500, 7, 'Hapugastenna', NULL, NULL, NULL, NULL, NULL, '70164', 7.1, 80.1667),
(501, 7, 'Heiyanthuduwa', NULL, NULL, NULL, NULL, NULL, '11618', 6.96283, 79.963309),
(502, 7, 'Hinatiyana Madawala', NULL, NULL, NULL, NULL, NULL, '11568', 7.1667, 79.95),
(503, 7, 'Hiswella', NULL, NULL, NULL, NULL, NULL, '11734', 7.021559, 80.160869),
(504, 7, 'Horampella', NULL, NULL, NULL, NULL, NULL, '11564', 7.185188, 79.976771),
(505, 7, 'Hunumulla', NULL, NULL, NULL, NULL, NULL, '11262', 7.244925, 79.996921),
(506, 7, 'Hunupola', NULL, NULL, NULL, NULL, NULL, '60582', 7.111463, 80.130625),
(507, 7, 'Ihala Madampella', NULL, NULL, NULL, NULL, NULL, '11265', 7.250345, 79.960941),
(508, 7, 'Imbulgoda', NULL, NULL, NULL, NULL, NULL, '11856', 7.035, 79.9931),
(509, 7, 'Ja-Ela', NULL, NULL, NULL, NULL, NULL, '11350', 7.076147, 79.894932),
(510, 7, 'Kadawatha', NULL, NULL, NULL, NULL, NULL, '11850', 7.0258, 79.9882),
(511, 7, 'Kahatowita', NULL, NULL, NULL, NULL, NULL, '11144', 7.0667, 80.1167),
(512, 7, 'Kalagedihena', NULL, NULL, NULL, NULL, NULL, '11875', 7.118004, 80.058001),
(513, 7, 'Kaleliya', NULL, NULL, NULL, NULL, NULL, '11160', 7.195, 80.1136),
(514, 7, 'Kandana', NULL, NULL, NULL, NULL, NULL, '11320', 7.05056, 79.895123),
(515, 7, 'Katana', NULL, NULL, NULL, NULL, NULL, '11534', 7.2517, 79.9078),
(516, 7, 'Katudeniya', NULL, NULL, NULL, NULL, NULL, '21016', 7.3, 80.0833),
(517, 7, 'Katunayake', NULL, NULL, NULL, NULL, NULL, '11450', 7.1647, 79.8731),
(518, 7, 'Katunayake Air Force Camp', NULL, NULL, NULL, NULL, NULL, '11440', 7.1407, 79.8782),
(519, 7, 'Katunayake(FTZ)', NULL, NULL, NULL, NULL, NULL, '11420', 7.1407, 79.8782),
(520, 7, 'Katuwellegama', NULL, NULL, NULL, NULL, NULL, '11526', 7.208557, 79.94572),
(521, 7, 'Kelaniya', NULL, NULL, NULL, NULL, NULL, '11600', 6.956357, 79.921431),
(522, 7, 'Kimbulapitiya', NULL, NULL, NULL, NULL, NULL, '11522', 7.202265, 79.908937),
(523, 7, 'Kirindiwela', NULL, NULL, NULL, NULL, NULL, '11730', 7.044223, 80.126707),
(524, 7, 'Kitalawalana', NULL, NULL, NULL, NULL, NULL, '11206', 7.3, 80.1),
(525, 7, 'Kochchikade', NULL, NULL, NULL, NULL, NULL, '11540', 7.2581, 79.8542),
(526, 7, 'Kotadeniyawa', NULL, NULL, NULL, NULL, NULL, '11232', 7.279861, 80.05581),
(527, 7, 'Kotugoda', NULL, NULL, NULL, NULL, NULL, '11390', 7.1217, 79.9297),
(528, 7, 'Kumbaloluwa', NULL, NULL, NULL, NULL, NULL, '11105', 7.179375, 80.082233),
(529, 7, 'Loluwagoda', NULL, NULL, NULL, NULL, NULL, '11204', 7.294586, 80.126624),
(530, 7, 'Mabodale', NULL, NULL, NULL, NULL, NULL, '11114', 7.2, 80.0167),
(531, 7, 'Madelgamuwa', NULL, NULL, NULL, NULL, NULL, '11033', 7.110062, 79.948175),
(532, 7, 'Makewita', NULL, NULL, NULL, NULL, NULL, '11358', 7.1, 79.9333),
(533, 7, 'Makola', NULL, NULL, NULL, NULL, NULL, '11640', 6.983178, 79.9525),
(534, 7, 'Malwana', NULL, NULL, NULL, NULL, NULL, '11670', 6.951988, 80.012561),
(535, 7, 'Mandawala', NULL, NULL, NULL, NULL, NULL, '11061', 7.003066, 80.097082),
(536, 7, 'Marandagahamula', NULL, NULL, NULL, NULL, NULL, '11260', 7.2447, 79.9696),
(537, 7, 'Mellawagedara', NULL, NULL, NULL, NULL, NULL, '11234', 7.285808, 80.023977),
(538, 7, 'Minuwangoda', NULL, NULL, NULL, NULL, NULL, '11550', 7.176455, 79.954904),
(539, 7, 'Mirigama', NULL, NULL, NULL, NULL, NULL, '11200', 7.2414, 80.1325),
(540, 7, 'Miriswatta', NULL, NULL, NULL, NULL, NULL, '80508', 7.0711, 80.0183),
(541, 7, 'Mithirigala', NULL, NULL, NULL, NULL, NULL, '11742', 6.9648, 80.0648),
(542, 7, 'Muddaragama', NULL, NULL, NULL, NULL, NULL, '11112', 7.2167, 80.05),
(543, 7, 'Mudungoda', NULL, NULL, NULL, NULL, NULL, '11056', 7.064698, 79.999092),
(544, 7, 'Mulleriyawa New Town', NULL, NULL, NULL, NULL, NULL, '10620', 6.9301, 80.0549),
(545, 7, 'Naranwala', NULL, NULL, NULL, NULL, NULL, '11063', 7.001631, 80.027404),
(546, 7, 'Nawana', NULL, NULL, NULL, NULL, NULL, '11222', 7.270062, 80.092618),
(547, 7, 'Nedungamuwa', NULL, NULL, NULL, NULL, NULL, '11066', 7.05, 80.0333),
(548, 7, 'Negombo', NULL, NULL, NULL, NULL, NULL, '11500', 7.2086, 79.8358),
(549, 7, 'Nikadalupotha', NULL, NULL, NULL, NULL, NULL, '60580', 7.1167, 80.1333),
(550, 7, 'Nikahetikanda', NULL, NULL, NULL, NULL, NULL, '11128', 7.099089, 80.179551),
(551, 7, 'Nittambuwa', NULL, NULL, NULL, NULL, NULL, '11880', 7.144243, 80.096178),
(552, 7, 'Niwandama', NULL, NULL, NULL, NULL, NULL, '11354', 7.078762, 79.928331),
(553, 7, 'Opatha', NULL, NULL, NULL, NULL, NULL, '80142', 7.132037, 79.921419),
(554, 7, 'Pamunugama', NULL, NULL, NULL, NULL, NULL, '11370', 7.094359, 79.844569),
(555, 7, 'Pamunuwatta', NULL, NULL, NULL, NULL, NULL, '11214', 7.214678, 80.139696),
(556, 7, 'Panawala', NULL, NULL, NULL, NULL, NULL, '70612', 6.9833, 80.0333),
(557, 7, 'Pasyala', NULL, NULL, NULL, NULL, NULL, '11890', 7.172926, 80.115911),
(558, 7, 'Peliyagoda', NULL, NULL, NULL, NULL, NULL, '11830', 6.960977, 79.878852),
(559, 7, 'Pepiliyawala', NULL, NULL, NULL, NULL, NULL, '11741', 7.002342, 80.128886),
(560, 7, 'Pethiyagoda', NULL, NULL, NULL, NULL, NULL, '11043', 7.1167, 80.0167),
(561, 7, 'Polpithimukulana', NULL, NULL, NULL, NULL, NULL, '11324', 7.0444, 79.8782),
(562, 7, 'Puwakpitiya', NULL, NULL, NULL, NULL, NULL, '10712', 7.040498, 80.064451),
(563, 7, 'Radawadunna', NULL, NULL, NULL, NULL, NULL, '11892', 7.177279, 80.141344),
(564, 7, 'Radawana', NULL, NULL, NULL, NULL, NULL, '11725', 7.029871, 80.100915),
(565, 7, 'Raddolugama', NULL, NULL, NULL, NULL, NULL, '11400', 7.140656, 79.898198),
(566, 7, 'Ragama', NULL, NULL, NULL, NULL, NULL, '11010', 7.025281, 79.917386),
(567, 7, 'Ruggahawila', NULL, NULL, NULL, NULL, NULL, '11142', 7.0667, 80.1167),
(568, 7, 'Seeduwa', NULL, NULL, NULL, NULL, NULL, '11410', 7.132059, 79.885024),
(569, 7, 'Siyambalape', NULL, NULL, NULL, NULL, NULL, '11607', 6.964545, 79.986406),
(570, 7, 'Talahena', NULL, NULL, NULL, NULL, NULL, '11504', 7.1667, 79.8167),
(571, 7, 'Thambagalla', NULL, NULL, NULL, NULL, NULL, '60584', 7.1167, 80.1333),
(572, 7, 'Thimbirigaskatuwa', NULL, NULL, NULL, NULL, NULL, '11532', 7.2669, 79.9495),
(573, 7, 'Tittapattara', NULL, NULL, NULL, NULL, NULL, '10664', 6.9297, 80.0889),
(574, 7, 'Udathuthiripitiya', NULL, NULL, NULL, NULL, NULL, '11054', 7.075, 80.0333),
(575, 7, 'Udugampola', NULL, NULL, NULL, NULL, NULL, '11030', 7.1167, 79.9833),
(576, 7, 'Uggalboda', NULL, NULL, NULL, NULL, NULL, '11034', 7.135549, 79.948259),
(577, 7, 'Urapola', NULL, NULL, NULL, NULL, NULL, '11126', 7.104792, 80.136935),
(578, 7, 'Uswetakeiyawa', NULL, NULL, NULL, NULL, NULL, '11328', 7.031046, 79.860339),
(579, 7, 'Veyangoda', NULL, NULL, NULL, NULL, NULL, '11100', 7.156981, 80.095842),
(580, 7, 'Walgammulla', NULL, NULL, NULL, NULL, NULL, '11146', 7.071902, 80.116511),
(581, 7, 'Walpita', NULL, NULL, NULL, NULL, NULL, '11226', 7.258131, 80.034704),
(582, 7, 'Walpola (WP)', NULL, NULL, NULL, NULL, NULL, '11012', 7.0418, 79.9257),
(583, 7, 'Wathurugama', NULL, NULL, NULL, NULL, NULL, '11724', 7.0421, 80.0701),
(584, 7, 'Watinapaha', NULL, NULL, NULL, NULL, NULL, '11104', 7.2, 79.9833),
(585, 7, 'Wattala', NULL, NULL, NULL, NULL, NULL, '11104', 6.990037, 79.892207),
(586, 7, 'Weboda', NULL, NULL, NULL, NULL, NULL, '11858', 7.0167, 79.9833),
(587, 7, 'Wegowwa', NULL, NULL, NULL, NULL, NULL, '11562', 7.178443, 79.962063),
(588, 7, 'Weweldeniya', NULL, NULL, NULL, NULL, NULL, '11894', 7.1834, 80.1446),
(589, 7, 'Yakkala', NULL, NULL, NULL, NULL, NULL, '11870', 7.1167, 80.05),
(590, 7, 'Yatiyana', NULL, NULL, NULL, NULL, NULL, '11566', 7.184998, 79.931858),
(591, 8, 'Ambalantota', 'අම්බලන්තොට', NULL, NULL, NULL, NULL, '82100', 6.114494, 81.025983),
(592, 8, 'Angunakolapelessa', 'අඟුණකොළපැලැස්ස', NULL, NULL, NULL, NULL, '82220', 6.162261, 80.899471),
(593, 8, 'Angunakolawewa', 'අඟුණකොලවැව', NULL, NULL, NULL, NULL, '91302', 6.389127, 81.093226),
(594, 8, 'Bandagiriya Colony', 'බන්ඩගිරිය කොලොනි', NULL, NULL, NULL, NULL, '82005', 6.1833, 81.1389),
(595, 8, 'Barawakumbuka', 'බරවකුඹුර', NULL, NULL, NULL, NULL, '82110', 6.1667, 80.8167),
(596, 8, 'Beliatta', 'බෙලිඅත්ත', NULL, NULL, NULL, NULL, '82400', 6.048637, 80.734343),
(597, 8, 'Beragama', 'බෙරගම', NULL, NULL, NULL, NULL, '82102', 6.15, 81.0667),
(598, 8, 'Beralihela', 'බෙරලිහෙල', NULL, NULL, NULL, NULL, '82618', 6.2556, 81.2944),
(599, 8, 'Bundala', 'බූන්දල', NULL, NULL, NULL, NULL, '82002', 6.195164, 81.250493),
(600, 8, 'Ellagala', 'ඇල්ලගල', NULL, NULL, NULL, NULL, '82619', 6.26867, 81.359512);
INSERT INTO `cities` (`id`, `district_id`, `name_en`, `name_si`, `name_ta`, `sub_name_en`, `sub_name_si`, `sub_name_ta`, `postcode`, `latitude`, `longitude`) VALUES
(601, 8, 'Gangulandeniya', 'ගඟුලදෙණිය', NULL, NULL, NULL, NULL, '82586', 6.2833, 80.7167),
(602, 8, 'Getamanna', 'ගැටමාන්න', NULL, NULL, NULL, NULL, '82420', 6.036244, 80.669146),
(603, 8, 'Goda Koggalla', 'ගොඩ කොග්ගල්ල', NULL, NULL, NULL, NULL, '82401', 6.0333, 80.75),
(604, 8, 'Gonagamuwa Uduwila', 'ගොනාගමුව උඩුවිල', NULL, NULL, NULL, NULL, '82602', 6.25, 81.2917),
(605, 8, 'Gonnoruwa', 'ගොන්නොරුව', NULL, NULL, NULL, NULL, '82006', 6.230443, 81.112465),
(606, 8, 'Hakuruwela', 'හකුරුවෙල', NULL, NULL, NULL, NULL, '82248', 6.146456, 80.83047),
(607, 8, 'Hambantota', 'හම්බන්තොට', NULL, NULL, NULL, NULL, '82000', 6.127563, 81.111287),
(608, 8, 'Handugala', 'හඳගුල', NULL, NULL, NULL, NULL, '81326', 6.188877, 80.62414),
(609, 8, 'Hungama', NULL, NULL, NULL, NULL, NULL, '82120', 6.108006, 80.927144),
(610, 8, 'Ihala Beligalla', NULL, NULL, NULL, NULL, NULL, '82412', 6.092378, 80.747311),
(611, 8, 'Ittademaliya', NULL, NULL, NULL, NULL, NULL, '82462', 6.167432, 80.735179),
(612, 8, 'Julampitiya', NULL, NULL, NULL, NULL, NULL, '82252', 6.2261, 80.7403),
(613, 8, 'Kahandamodara', NULL, NULL, NULL, NULL, NULL, '82126', 6.078654, 80.902917),
(614, 8, 'Kariyamaditta', NULL, NULL, NULL, NULL, NULL, '82274', 6.257359, 80.809448),
(615, 8, 'Katuwana', NULL, NULL, NULL, NULL, NULL, '82500', 6.2667, 80.6972),
(616, 8, 'Kawantissapura', NULL, NULL, NULL, NULL, NULL, '82622', 6.2786, 81.2524),
(617, 8, 'Kirama', NULL, NULL, NULL, NULL, NULL, '82550', 6.2117, 80.6653),
(618, 8, 'Kirinda', NULL, NULL, NULL, NULL, NULL, '82614', 6.268985, 81.290653),
(619, 8, 'Lunama', NULL, NULL, NULL, NULL, NULL, '82108', 6.098517, 80.971511),
(620, 8, 'Lunugamwehera', NULL, NULL, NULL, NULL, NULL, '82634', 6.3417, 81.15),
(621, 8, 'Magama', NULL, NULL, NULL, NULL, NULL, '82608', 6.280108, 81.270354),
(622, 8, 'Mahagalwewa', NULL, NULL, NULL, NULL, NULL, '82016', 6.1833, 81.1389),
(623, 8, 'Mamadala', NULL, NULL, NULL, NULL, NULL, '82109', 6.158126, 80.96681),
(624, 8, 'Medamulana', NULL, NULL, NULL, NULL, NULL, '82254', 6.175878, 80.770016),
(625, 8, 'Middeniya', NULL, NULL, NULL, NULL, NULL, '82270', 6.2494, 80.7672),
(626, 8, 'Migahajandur', NULL, NULL, NULL, NULL, NULL, '82014', 6.1833, 81.1389),
(627, 8, 'Modarawana', NULL, NULL, NULL, NULL, NULL, '82416', 6.117576, 80.720781),
(628, 8, 'Mulkirigala', NULL, NULL, NULL, NULL, NULL, '82242', 6.12, 80.7397),
(629, 8, 'Nakulugamuwa', NULL, NULL, NULL, NULL, NULL, '82300', 6.1842, 80.9063),
(630, 8, 'Netolpitiya', NULL, NULL, NULL, NULL, NULL, '82135', 6.066848, 80.850703),
(631, 8, 'Nihiluwa', NULL, NULL, NULL, NULL, NULL, '82414', 6.077147, 80.696499),
(632, 8, 'Padawkema', NULL, NULL, NULL, NULL, NULL, '82636', 6.35, 81.1667),
(633, 8, 'Pahala Andarawewa', NULL, NULL, NULL, NULL, NULL, '82008', 6.1833, 81.1389),
(634, 8, 'Rammalawarapitiya', NULL, NULL, NULL, NULL, NULL, '82554', 6.2117, 80.6653),
(635, 8, 'Ranakeliya', NULL, NULL, NULL, NULL, NULL, '82612', 6.2167, 81.3),
(636, 8, 'Ranmuduwewa', NULL, NULL, NULL, NULL, NULL, '82018', 6.1833, 81.1389),
(637, 8, 'Ranna', NULL, NULL, NULL, NULL, NULL, '82125', 6.103377, 80.890168),
(638, 8, 'Ratmalwala', NULL, NULL, NULL, NULL, NULL, '82276', 6.2667, 80.85),
(639, 8, 'RU/Ridiyagama', NULL, NULL, NULL, NULL, NULL, '82106', 6.1375, 81.0042),
(640, 8, 'Sooriyawewa Town', NULL, NULL, NULL, NULL, NULL, '82010', 6.1833, 81.1389),
(641, 8, 'Tangalla', NULL, NULL, NULL, NULL, NULL, '82200', 6.0231, 80.7889),
(642, 8, 'Tissamaharama', NULL, NULL, NULL, NULL, NULL, '82600', 6.370333, 81.328087),
(643, 8, 'Uda Gomadiya', NULL, NULL, NULL, NULL, NULL, '82504', 6.2667, 80.6972),
(644, 8, 'Udamattala', NULL, NULL, NULL, NULL, NULL, '82638', 6.3333, 81.1333),
(645, 8, 'Uswewa', NULL, NULL, NULL, NULL, NULL, '82278', 6.246247, 80.862175),
(646, 8, 'Vitharandeniya', NULL, NULL, NULL, NULL, NULL, '82232', 6.1824, 80.806),
(647, 8, 'Walasmulla', NULL, NULL, NULL, NULL, NULL, '82450', 6.15, 80.7),
(648, 8, 'Weeraketiya', NULL, NULL, NULL, NULL, NULL, '82240', 6.135, 80.7865),
(649, 8, 'Weerawila', NULL, NULL, NULL, NULL, NULL, '82632', 6.3417, 81.15),
(650, 8, 'Weerawila NewTown', NULL, NULL, NULL, NULL, NULL, '82615', 6.2556, 81.2944),
(651, 8, 'Wekandawela', NULL, NULL, NULL, NULL, NULL, '82246', 6.135, 80.7865),
(652, 8, 'Weligatta', NULL, NULL, NULL, NULL, NULL, '82004', 6.205897, 81.196032),
(653, 8, 'Yatigala', NULL, NULL, NULL, NULL, NULL, '82418', 6.1, 80.6833),
(654, 9, 'Jaffna', NULL, NULL, NULL, NULL, NULL, '40000', 9.660668, 80.022706),
(655, 10, 'Agalawatta', 'අගලවත්ත', NULL, NULL, NULL, NULL, '12200', 6.541499, 80.155785),
(656, 10, 'Alubomulla', 'අලුබෝමුල්ල', NULL, NULL, NULL, NULL, '12524', 6.711977, 79.965857),
(657, 10, 'Anguruwatota', 'අංගුරුවතොට', NULL, NULL, NULL, NULL, '12320', 6.6383, 80.0861),
(658, 10, 'Atale', 'අටලේ', NULL, NULL, NULL, NULL, '71363', 6.45, 80.2667),
(659, 10, 'Baduraliya', 'බදුරලීය', NULL, NULL, NULL, NULL, '12230', 6.523102, 80.232371),
(660, 10, 'Bandaragama', 'බණ්ඩාරගම', NULL, NULL, NULL, NULL, '12530', 6.710264, 79.986087),
(661, 10, 'Batugampola', 'බටුගම්පොල', NULL, NULL, NULL, NULL, '10526', 6.769068, 80.142775),
(662, 10, 'Bellana', 'බෙල්ලන', NULL, NULL, NULL, NULL, '12224', 6.518936, 80.183117),
(663, 10, 'Beruwala', 'බේරුවල', NULL, NULL, NULL, NULL, '12070', 6.4739, 79.9842),
(664, 10, 'Bolossagama', 'බොලොස්සගම', NULL, NULL, NULL, NULL, '12008', 6.62099, 80.015288),
(665, 10, 'Bombuwala', 'බොඹුවල', NULL, NULL, NULL, NULL, '12024', 6.5833, 80.0167),
(666, 10, 'Boralugoda', 'බොරළුගොඩ', NULL, NULL, NULL, NULL, '12142', 6.438709, 80.278799),
(667, 10, 'Bulathsinhala', 'බුලත්සිංහල', NULL, NULL, NULL, NULL, '12300', 6.666199, 80.164896),
(668, 10, 'Danawala Thiniyawala', 'දනවල තිනියවල', NULL, NULL, NULL, NULL, '12148', 6.4333, 80.2667),
(669, 10, 'Delmella', 'දෙල්මෙල්ල', NULL, NULL, NULL, NULL, '12304', 6.67833, 80.210488),
(670, 10, 'Dharga Town', 'දර්ගා නගරය', NULL, NULL, NULL, NULL, '12090', 6.648, 80.0089),
(671, 10, 'Diwalakada', 'දිවාලකද', NULL, NULL, NULL, NULL, '12308', 6.696767, 80.146983),
(672, 10, 'Dodangoda', 'දොඩන්ගොඩ', NULL, NULL, NULL, NULL, '12020', 6.555952, 80.006847),
(673, 10, 'Dombagoda', 'දොඹගොඩ', NULL, NULL, NULL, NULL, '12416', 6.661797, 80.053343),
(674, 10, 'Ethkandura', 'ඇත්කඳුර', NULL, NULL, NULL, NULL, '80458', 6.4415, 80.1807),
(675, 10, 'Galpatha', 'ගල්පාත', NULL, NULL, NULL, NULL, '12005', 6.5983, 80.0015),
(676, 10, 'Gamagoda', 'ගමගොඩ', NULL, NULL, NULL, NULL, '12016', 6.597103, 80.005539),
(677, 10, 'Gonagalpura', 'ගොනාගල්පුර', NULL, NULL, NULL, NULL, '80502', 6.6307, 80.0169),
(678, 10, 'Gonapola Junction', 'ගෝනපොල හංදිය', NULL, NULL, NULL, NULL, '12410', 6.6944, 80.0333),
(679, 10, 'Govinna', 'ගෝවින්න', NULL, NULL, NULL, NULL, '12310', 6.663337, 80.116274),
(680, 10, 'Gurulubadda', 'ගුරුලුබැද්ද', NULL, NULL, NULL, NULL, '12236', 6.5333, 80.2667),
(681, 10, 'Halkandawila', 'හල්කන්දවිල', NULL, NULL, NULL, NULL, '12055', 6.5167, 80.0167),
(682, 10, 'Haltota', 'හල්තොට', NULL, NULL, NULL, NULL, '12538', 6.69554, 80.02127),
(683, 10, 'Halvitigala Colony', 'හල්විටගල ජනපදය', NULL, NULL, NULL, NULL, '80146', 6.5791, 80.2233),
(684, 10, 'Halwala', 'හල්වල', NULL, NULL, NULL, NULL, '12118', 6.416524, 80.106562),
(685, 10, 'Halwatura', 'හල්වතුර', NULL, NULL, NULL, NULL, '12306', 6.7, 80.2),
(686, 10, 'Handapangoda', 'හඳපාන්ගොඩ', NULL, NULL, NULL, NULL, '10524', 6.789746, 80.140774),
(687, 10, 'Hedigalla Colony', NULL, NULL, NULL, NULL, NULL, '12234', 6.5333, 80.2667),
(688, 10, 'Henegama', NULL, NULL, NULL, NULL, NULL, '11715', 6.7167, 80.0333),
(689, 10, 'Hettimulla', NULL, NULL, NULL, NULL, NULL, '71210', 6.461362, 79.992643),
(690, 10, 'Horana', NULL, NULL, NULL, NULL, NULL, '12400', 6.719389, 80.061557),
(691, 10, 'Ittapana', NULL, NULL, NULL, NULL, NULL, '12116', 6.42254, 80.079501),
(692, 10, 'Kahawala', NULL, NULL, NULL, NULL, NULL, '10508', 6.7833, 80.1),
(693, 10, 'Kalawila Kiranthidiya', NULL, NULL, NULL, NULL, NULL, '12078', 6.4619, 80.0004),
(694, 10, 'Kalutara', NULL, NULL, NULL, NULL, NULL, '12000', 6.581333, 79.958546),
(695, 10, 'Kananwila', NULL, NULL, NULL, NULL, NULL, '12418', 6.7667, 80.05),
(696, 10, 'Kandanagama', NULL, NULL, NULL, NULL, NULL, '12428', 6.7667, 80.0778),
(697, 10, 'Kelinkanda', NULL, NULL, NULL, NULL, NULL, '12218', 6.587128, 80.29322),
(698, 10, 'Kitulgoda', NULL, NULL, NULL, NULL, NULL, '12222', 6.5167, 80.1833),
(699, 10, 'Koholana', NULL, NULL, NULL, NULL, NULL, '12007', 6.618149, 79.989353),
(700, 10, 'Kuda Uduwa', NULL, NULL, NULL, NULL, NULL, '12426', 6.747871, 80.078499),
(701, 10, 'Labbala', NULL, NULL, NULL, NULL, NULL, '60162', 6.4833, 80),
(702, 10, 'lhalahewessa', NULL, NULL, NULL, NULL, NULL, '80432', 6.4415, 80.1807),
(703, 10, 'lnduruwa', NULL, NULL, NULL, NULL, NULL, '80510', 6.4681, 80.0257),
(704, 10, 'lngiriya', NULL, NULL, NULL, NULL, NULL, '12440', 6.7296, 80.0604),
(705, 10, 'Maggona', NULL, NULL, NULL, NULL, NULL, '12060', 6.503158, 79.977597),
(706, 10, 'Mahagama', NULL, NULL, NULL, NULL, NULL, '12210', 6.620177, 80.154204),
(707, 10, 'Mahakalupahana', NULL, NULL, NULL, NULL, NULL, '12126', 6.3917, 80.1417),
(708, 10, 'Maharangalla', NULL, NULL, NULL, NULL, NULL, '71211', 6.4667, 80),
(709, 10, 'Malgalla Talangalla', NULL, NULL, NULL, NULL, NULL, '80144', 6.5791, 80.2233),
(710, 10, 'Matugama', NULL, NULL, NULL, NULL, NULL, '12100', 6.5222, 80.1144),
(711, 10, 'Meegahatenna', NULL, NULL, NULL, NULL, NULL, '12130', 6.3637, 80.285),
(712, 10, 'Meegama', NULL, NULL, NULL, NULL, NULL, '12094', 6.648, 80.0089),
(713, 10, 'Meegoda', NULL, NULL, NULL, NULL, NULL, '10504', 6.8053, 80.0829),
(714, 10, 'Millaniya', NULL, NULL, NULL, NULL, NULL, '12412', 6.686206, 80.017227),
(715, 10, 'Millewa', NULL, NULL, NULL, NULL, NULL, '12422', 6.7833, 80.0667),
(716, 10, 'Miwanapalana', NULL, NULL, NULL, NULL, NULL, '12424', 6.75, 80.1),
(717, 10, 'Molkawa', NULL, NULL, NULL, NULL, NULL, '12216', 6.607725, 80.238612),
(718, 10, 'Morapitiya', NULL, NULL, NULL, NULL, NULL, '12232', 6.527127, 80.263667),
(719, 10, 'Morontuduwa', NULL, NULL, NULL, NULL, NULL, '12564', 6.65, 79.9667),
(720, 10, 'Nawattuduwa', NULL, NULL, NULL, NULL, NULL, '12106', 6.5019, 80.0937),
(721, 10, 'Neboda', NULL, NULL, NULL, NULL, NULL, '12030', 6.5906, 80.0842),
(722, 10, 'Padagoda', NULL, NULL, NULL, NULL, NULL, '12074', 6.456979, 80.009049),
(723, 10, 'Pahalahewessa', NULL, NULL, NULL, NULL, NULL, '12144', 6.4333, 80.2667),
(724, 10, 'Paiyagala', NULL, NULL, NULL, NULL, NULL, '12050', 6.5167, 80.0167),
(725, 10, 'Panadura', NULL, NULL, NULL, NULL, NULL, '12500', 6.7133, 79.9042),
(726, 10, 'Pannala', NULL, NULL, NULL, NULL, NULL, '60160', 6.4833, 80),
(727, 10, 'Paragastota', NULL, NULL, NULL, NULL, NULL, '12414', 6.6667, 80),
(728, 10, 'Paragoda', NULL, NULL, NULL, NULL, NULL, '12302', 6.627108, 80.24112),
(729, 10, 'Paraigama', NULL, NULL, NULL, NULL, NULL, '12122', 6.4167, 80.1167),
(730, 10, 'Pelanda', NULL, NULL, NULL, NULL, NULL, '12214', 6.6056, 80.2333),
(731, 10, 'Pelawatta', NULL, NULL, NULL, NULL, NULL, '12138', 6.385227, 80.207989),
(732, 10, 'Pimbura', NULL, NULL, NULL, NULL, NULL, '70472', 6.570997, 80.161311),
(733, 10, 'Pitagaldeniya', NULL, NULL, NULL, NULL, NULL, '71360', 6.45, 80.2667),
(734, 10, 'Pokunuwita', NULL, NULL, NULL, NULL, NULL, '12404', 6.7333, 80.0333),
(735, 10, 'Poruwedanda', NULL, NULL, NULL, NULL, NULL, '12432', 6.7333, 80.1167),
(736, 10, 'Ratmale', NULL, NULL, NULL, NULL, NULL, '81030', 6.45, 80.2),
(737, 10, 'Remunagoda', NULL, NULL, NULL, NULL, NULL, '12009', 6.594994, 80.031349),
(738, 10, 'Talgaswela', NULL, NULL, NULL, NULL, NULL, '80470', 6.4415, 80.1807),
(739, 10, 'Tebuwana', NULL, NULL, NULL, NULL, NULL, '12025', 6.5944, 80.0611),
(740, 10, 'Uduwara', NULL, NULL, NULL, NULL, NULL, '12322', 6.6167, 80.0667),
(741, 10, 'Utumgama', NULL, NULL, NULL, NULL, NULL, '12127', 6.3917, 80.1417),
(742, 10, 'Veyangalla', NULL, NULL, NULL, NULL, NULL, '12204', 6.5422, 80.1583),
(743, 10, 'Wadduwa', NULL, NULL, NULL, NULL, NULL, '12560', 6.667121, 79.924051),
(744, 10, 'Walagedara', NULL, NULL, NULL, NULL, NULL, '12112', 6.437775, 80.071449),
(745, 10, 'Walallawita', NULL, NULL, NULL, NULL, NULL, '12134', 6.3667, 80.2),
(746, 10, 'Waskaduwa', NULL, NULL, NULL, NULL, NULL, '12580', 6.6317, 79.9442),
(747, 10, 'Welipenna', NULL, NULL, NULL, NULL, NULL, '12108', 6.466448, 80.101763),
(748, 10, 'Weliveriya', NULL, NULL, NULL, NULL, NULL, '11710', 6.7167, 80.0333),
(749, 10, 'Welmilla Junction', NULL, NULL, NULL, NULL, NULL, '12534', 6.7072, 80.01),
(750, 10, 'Weragala', NULL, NULL, NULL, NULL, NULL, '71622', 6.527062, 80.004097),
(751, 10, 'Yagirala', NULL, NULL, NULL, NULL, NULL, '12124', 6.378714, 80.161812),
(752, 10, 'Yatadolawatta', NULL, NULL, NULL, NULL, NULL, '12104', 6.52309, 80.064428),
(753, 10, 'Yatawara Junction', NULL, NULL, NULL, NULL, NULL, '12006', 6.5983, 80.0015),
(754, 11, 'Aludeniya', 'අලුදෙණිය', NULL, NULL, NULL, NULL, '20062', 7.370491, 80.46648),
(755, 11, 'Ambagahapelessa', 'අඹගහපැලැස්ස', NULL, NULL, NULL, NULL, '20986', 7.243803, 81.00264),
(756, 11, 'Ambagamuwa Udabulathgama', 'අඹගමුව උඩබුලත්ගම', NULL, NULL, NULL, NULL, '20678', 7.0333, 80.5),
(757, 11, 'Ambatenna', 'අඹතැන්න', NULL, NULL, NULL, NULL, '20136', 7.3472, 80.6192),
(758, 11, 'Ampitiya', 'අම්පිටිය', NULL, NULL, NULL, NULL, '20160', 7.2667, 80.65),
(759, 11, 'Ankumbura', 'අංකුඹුර', NULL, NULL, NULL, NULL, '20150', 7.434149, 80.568704),
(760, 11, 'Atabage', 'අටබාගෙ', NULL, NULL, NULL, NULL, '20574', 7.1333, 80.6),
(761, 11, 'Balana', 'බලන', NULL, NULL, NULL, NULL, '20308', 7.269032, 80.485503),
(762, 11, 'Bambaragahaela', 'බඹරගහඇල', NULL, NULL, NULL, NULL, '20644', 7.0523, 80.5023),
(763, 11, 'Batagolladeniya', 'බටගොල්ලදෙණිය', NULL, NULL, NULL, NULL, '20154', 7.41596, 80.576688),
(764, 11, 'Batugoda', 'බටුගොඩ', NULL, NULL, NULL, NULL, '20132', 7.366275, 80.59604),
(765, 11, 'Batumulla', 'බටුමුල්ල', NULL, NULL, NULL, NULL, '20966', 7.256086, 80.978905),
(766, 11, 'Bawlana', 'බව්ලන', NULL, NULL, NULL, NULL, '20218', 7.211388, 80.718828),
(767, 11, 'Bopana', 'බෝපන', NULL, NULL, NULL, NULL, '20932', 7.3, 80.9),
(768, 11, 'Danture', 'දංතුරේ', NULL, NULL, NULL, NULL, '20465', 7.2833, 80.5333),
(769, 11, 'Dedunupitiya', 'දේදුනුපිටිය', NULL, NULL, NULL, NULL, '20068', 7.3333, 80.4333),
(770, 11, 'Dekinda', 'දෙකිඳ', NULL, NULL, NULL, NULL, '20658', 7.014688, 80.509932),
(771, 11, 'Deltota', 'දෙල්තොට', NULL, NULL, NULL, NULL, '20430', 7.2, 80.6667),
(772, 11, 'Divulankadawala', 'දිවුලන්කදවල', NULL, NULL, NULL, NULL, '51428', 7.175, 80.55),
(773, 11, 'Dolapihilla', 'දොලපිහිල්ල', NULL, NULL, NULL, NULL, '20126', 7.393576, 80.584659),
(774, 11, 'Dolosbage', 'දොලොස්බාගෙ', NULL, NULL, NULL, NULL, '20510', 7.0806, 80.4731),
(775, 11, 'Dunuwila', 'දුනුවිල', NULL, NULL, NULL, NULL, '20824', 7.3833, 80.6333),
(776, 11, 'Etulgama', 'ඇතුල්ගම', NULL, NULL, NULL, NULL, '20202', 7.2333, 80.65),
(777, 11, 'Galaboda', 'ගලබොඩ', NULL, NULL, NULL, NULL, '20664', 6.9875, 80.5319),
(778, 11, 'Galagedara', 'ගලගෙදර', NULL, NULL, NULL, NULL, '20100', 7.369716, 80.520308),
(779, 11, 'Galaha', 'ගලහ', NULL, NULL, NULL, NULL, '20420', 7.195764, 80.668659),
(780, 11, 'Galhinna', 'ගල්හින්න', NULL, NULL, NULL, NULL, '20152', 7.418361, 80.560015),
(781, 11, 'Gampola', 'ගම්පොල', NULL, NULL, NULL, NULL, '20500', 7.1647, 80.5767),
(782, 11, 'Gelioya', 'ගෙලිඔය', NULL, NULL, NULL, NULL, '20620', 7.2136, 80.6017),
(783, 11, 'Godamunna', 'ගොඩමුන්න', NULL, NULL, NULL, NULL, '20214', 7.227313, 80.697447),
(784, 11, 'Gomagoda', 'ගොමගොඩ', NULL, NULL, NULL, NULL, '20184', 7.3167, 80.7333),
(785, 11, 'Gonagantenna', 'ගොනාගන්තැන්න', NULL, NULL, NULL, NULL, '20712', 7.1517, 80.7118),
(786, 11, 'Gonawalapatana', 'ගෝනවලපතන', NULL, NULL, NULL, NULL, '20656', 7.0358, 80.5262),
(787, 11, 'Gunnepana', 'ගුන්නෙපන', NULL, NULL, NULL, NULL, '20270', 7.2696, 80.6537),
(788, 11, 'Gurudeniya', 'ගුරුදෙණිය', NULL, NULL, NULL, NULL, '20189', 7.265953, 80.702921),
(789, 11, 'Hakmana', 'හක්මන', NULL, NULL, NULL, NULL, '81300', 7.334701, 80.82402),
(790, 11, 'Handaganawa', 'හඳගනාව', NULL, NULL, NULL, NULL, '20984', 7.277451, 80.989485),
(791, 11, 'Handawalapitiya', 'හඳවලපිටිය', NULL, NULL, NULL, NULL, '20438', 7.2, 80.6667),
(792, 11, 'Handessa', 'හඳැස්ස', NULL, NULL, NULL, NULL, '20480', 7.230048, 80.580831),
(793, 11, 'Hanguranketha', NULL, NULL, NULL, NULL, NULL, '20710', 7.1517, 80.7118),
(794, 11, 'Harangalagama', NULL, NULL, NULL, NULL, NULL, '20669', 7.0271, 80.5493),
(795, 11, 'Hataraliyadda', NULL, NULL, NULL, NULL, NULL, '20060', 7.3333, 80.4667),
(796, 11, 'Hindagala', NULL, NULL, NULL, NULL, NULL, '20414', 7.231512, 80.600815),
(797, 11, 'Hondiyadeniya', NULL, NULL, NULL, NULL, NULL, '20524', 7.1364, 80.5766),
(798, 11, 'Hunnasgiriya', NULL, NULL, NULL, NULL, NULL, '20948', 7.298756, 80.849834),
(799, 11, 'Inguruwatta', NULL, NULL, NULL, NULL, NULL, '60064', 7.175038, 80.599767),
(800, 11, 'Jambugahapitiya', NULL, NULL, NULL, NULL, NULL, '20822', 7.3833, 80.6333),
(801, 11, 'Kadugannawa', NULL, NULL, NULL, NULL, NULL, '20300', 7.2536, 80.5275),
(802, 11, 'Kahataliyadda', NULL, NULL, NULL, NULL, NULL, '20924', 7.376, 80.8213),
(803, 11, 'Kalugala', NULL, NULL, NULL, NULL, NULL, '20926', 7.390136, 80.883008),
(804, 11, 'Kandy', NULL, NULL, NULL, NULL, NULL, '20000', 7.2964, 80.635),
(805, 11, 'Kapuliyadde', NULL, NULL, NULL, NULL, NULL, '20206', 7.2401, 80.6808),
(806, 11, 'Katugastota', NULL, NULL, NULL, NULL, NULL, '20800', 7.3161, 80.6211),
(807, 11, 'Katukitula', NULL, NULL, NULL, NULL, NULL, '20588', 7.1089, 80.6339),
(808, 11, 'Kelanigama', NULL, NULL, NULL, NULL, NULL, '20688', 7.0049, 80.5182),
(809, 11, 'Kengalla', NULL, NULL, NULL, NULL, NULL, '20186', 7.296461, 80.711767),
(810, 11, 'Ketaboola', NULL, NULL, NULL, NULL, NULL, '20660', 7.0271, 80.5493),
(811, 11, 'Ketakumbura', NULL, NULL, NULL, NULL, NULL, '20306', 7.210532, 80.571678),
(812, 11, 'Kobonila', NULL, NULL, NULL, NULL, NULL, '20928', 7.376, 80.8213),
(813, 11, 'Kolabissa', NULL, NULL, NULL, NULL, NULL, '20212', 7.225, 80.7167),
(814, 11, 'Kolongoda', NULL, NULL, NULL, NULL, NULL, '20971', 7.3552, 80.8375),
(815, 11, 'Kulugammana', NULL, NULL, NULL, NULL, NULL, '20048', 7.315193, 80.590268),
(816, 11, 'Kumbukkandura', NULL, NULL, NULL, NULL, NULL, '20902', 7.2969, 80.7686),
(817, 11, 'Kumburegama', NULL, NULL, NULL, NULL, NULL, '20086', 7.357279, 80.551316),
(818, 11, 'Kundasale', NULL, NULL, NULL, NULL, NULL, '20168', 7.2667, 80.6833),
(819, 11, 'Leemagahakotuwa', NULL, NULL, NULL, NULL, NULL, '20482', 7.2333, 80.5833),
(820, 11, 'lhala Kobbekaduwa', NULL, NULL, NULL, NULL, NULL, '20042', 7.3167, 80.5833),
(821, 11, 'Lunugama', NULL, NULL, NULL, NULL, NULL, '11062', 7.198402, 80.578244),
(822, 11, 'Lunuketiya Maditta', NULL, NULL, NULL, NULL, NULL, '20172', 7.3292, 80.716),
(823, 11, 'Madawala Bazaar', NULL, NULL, NULL, NULL, NULL, '20260', 7.2696, 80.6537),
(824, 11, 'Madawalalanda', NULL, NULL, NULL, NULL, NULL, '32016', 7.3792, 80.4982),
(825, 11, 'Madugalla', NULL, NULL, NULL, NULL, NULL, '20938', 7.265802, 80.882139),
(826, 11, 'Madulkele', NULL, NULL, NULL, NULL, NULL, '20840', 7.400281, 80.728874),
(827, 11, 'Mahadoraliyadda', NULL, NULL, NULL, NULL, NULL, '20945', 7.3, 80.85),
(828, 11, 'Mahamedagama', NULL, NULL, NULL, NULL, NULL, '20216', 7.225, 80.7167),
(829, 11, 'Mahanagapura', NULL, NULL, NULL, NULL, NULL, '32018', 7.3792, 80.4982),
(830, 11, 'Mailapitiya', NULL, NULL, NULL, NULL, NULL, '20702', 7.1517, 80.7118),
(831, 11, 'Makkanigama', NULL, NULL, NULL, NULL, NULL, '20828', 7.3833, 80.6333),
(832, 11, 'Makuldeniya', NULL, NULL, NULL, NULL, NULL, '20921', 7.341706, 80.777466),
(833, 11, 'Mangalagama', NULL, NULL, NULL, NULL, NULL, '32069', 7.285856, 80.563656),
(834, 11, 'Mapakanda', NULL, NULL, NULL, NULL, NULL, '20662', 7.007889, 80.531101),
(835, 11, 'Marassana', NULL, NULL, NULL, NULL, NULL, '20210', 7.221663, 80.732336),
(836, 11, 'Marymount Colony', NULL, NULL, NULL, NULL, NULL, '20714', 7.1517, 80.7118),
(837, 11, 'Mawatura', NULL, NULL, NULL, NULL, NULL, '20564', 7.1, 80.5667),
(838, 11, 'Medamahanuwara', NULL, NULL, NULL, NULL, NULL, '20940', 7.3, 80.85),
(839, 11, 'Medawala Harispattuwa', NULL, NULL, NULL, NULL, NULL, '20120', 7.3417, 80.6833),
(840, 11, 'Meetalawa', NULL, NULL, NULL, NULL, NULL, '20512', 7.0986, 80.4699),
(841, 11, 'Megoda Kalugamuwa', NULL, NULL, NULL, NULL, NULL, '20409', 7.2631, 80.6028),
(842, 11, 'Menikdiwela', NULL, NULL, NULL, NULL, NULL, '20470', 7.288455, 80.501662),
(843, 11, 'Menikhinna', NULL, NULL, NULL, NULL, NULL, '20170', 7.3167, 80.7),
(844, 11, 'Mimure', NULL, NULL, NULL, NULL, NULL, '20923', 7.4333, 80.8333),
(845, 11, 'Minigamuwa', NULL, NULL, NULL, NULL, NULL, '20109', 7.3333, 80.5167),
(846, 11, 'Minipe', NULL, NULL, NULL, NULL, NULL, '20983', 7.223556, 80.990971),
(847, 11, 'Moragahapallama', NULL, NULL, NULL, NULL, NULL, '32012', 7.3792, 80.4982),
(848, 11, 'Murutalawa', NULL, NULL, NULL, NULL, NULL, '20232', 7.3, 80.5667),
(849, 11, 'Muruthagahamulla', NULL, NULL, NULL, NULL, NULL, '20526', 7.1364, 80.5766),
(850, 11, 'Nanuoya', NULL, NULL, NULL, NULL, NULL, '22150', 7.1171, 80.6387),
(851, 11, 'Naranpanawa', NULL, NULL, NULL, NULL, NULL, '20176', 7.339733, 80.729831),
(852, 11, 'Narawelpita', NULL, NULL, NULL, NULL, NULL, '81302', 7.3167, 80.8),
(853, 11, 'Nawalapitiya', NULL, NULL, NULL, NULL, NULL, '20650', 7.05048, 80.530631),
(854, 11, 'Nawathispane', NULL, NULL, NULL, NULL, NULL, '20670', 7.0333, 80.5),
(855, 11, 'Nillambe', NULL, NULL, NULL, NULL, NULL, '20418', 7.15, 80.6333),
(856, 11, 'Nugaliyadda', NULL, NULL, NULL, NULL, NULL, '20204', 7.2333, 80.7),
(857, 11, 'Ovilikanda', NULL, NULL, NULL, NULL, NULL, '21020', 7.45, 80.5667),
(858, 11, 'Pallekotuwa', NULL, NULL, NULL, NULL, NULL, '20084', 7.3333, 80.5667),
(859, 11, 'Panwilatenna', NULL, NULL, NULL, NULL, NULL, '20544', 7.1556, 80.6314),
(860, 11, 'Paradeka', NULL, NULL, NULL, NULL, NULL, '20578', 7.12293, 80.618959),
(861, 11, 'Pasbage', NULL, NULL, NULL, NULL, NULL, '20654', 7.0358, 80.5262),
(862, 11, 'Pattitalawa', NULL, NULL, NULL, NULL, NULL, '20511', 7.1167, 80.4667),
(863, 11, 'Peradeniya', NULL, NULL, NULL, NULL, NULL, '20400', 7.2631, 80.6028),
(864, 11, 'Pilimatalawa', NULL, NULL, NULL, NULL, NULL, '20450', 7.2333, 80.5333),
(865, 11, 'Poholiyadda', NULL, NULL, NULL, NULL, NULL, '20106', 7.343274, 80.520186),
(866, 11, 'Pubbiliya', NULL, NULL, NULL, NULL, NULL, '21502', 7.385927, 80.481336),
(867, 11, 'Pupuressa', NULL, NULL, NULL, NULL, NULL, '20546', 7.115632, 80.677455),
(868, 11, 'Pussellawa', NULL, NULL, NULL, NULL, NULL, '20580', 7.112565, 80.644101),
(869, 11, 'Putuhapuwa', NULL, NULL, NULL, NULL, NULL, '20906', 7.334198, 80.759353),
(870, 11, 'Rajawella', NULL, NULL, NULL, NULL, NULL, '20180', 7.280519, 80.748217),
(871, 11, 'Rambukpitiya', NULL, NULL, NULL, NULL, NULL, '20676', 7.0333, 80.5),
(872, 11, 'Rambukwella', NULL, NULL, NULL, NULL, NULL, '20128', 7.294759, 80.777664),
(873, 11, 'Rangala', NULL, NULL, NULL, NULL, NULL, '20922', 7.344486, 80.795047),
(874, 11, 'Rantembe', NULL, NULL, NULL, NULL, NULL, '20990', 7.3552, 80.8375),
(875, 11, 'Sangarajapura', NULL, NULL, NULL, NULL, NULL, '20044', 7.3167, 80.5833),
(876, 11, 'Senarathwela', NULL, NULL, NULL, NULL, NULL, '20904', 7.280125, 80.761602),
(877, 11, 'Talatuoya', NULL, NULL, NULL, NULL, NULL, '20200', 7.2536, 80.6925),
(878, 11, 'Teldeniya', NULL, NULL, NULL, NULL, NULL, '20900', 7.2969, 80.7686),
(879, 11, 'Tennekumbura', NULL, NULL, NULL, NULL, NULL, '20166', 7.2833, 80.6667),
(880, 11, 'Uda Peradeniya', NULL, NULL, NULL, NULL, NULL, '20404', 7.249001, 80.614072),
(881, 11, 'Udahentenna', NULL, NULL, NULL, NULL, NULL, '20506', 7.0889, 80.5189),
(882, 11, 'Udatalawinna', NULL, NULL, NULL, NULL, NULL, '20802', 7.3161, 80.6211),
(883, 11, 'Udispattuwa', NULL, NULL, NULL, NULL, NULL, '20916', 7.3552, 80.8375),
(884, 11, 'Ududumbara', NULL, NULL, NULL, NULL, NULL, '20950', 7.3552, 80.8375),
(885, 11, 'Uduwahinna', NULL, NULL, NULL, NULL, NULL, '20934', 7.2833, 80.8917),
(886, 11, 'Uduwela', NULL, NULL, NULL, NULL, NULL, '20164', 7.2722, 80.6667),
(887, 11, 'Ulapane', NULL, NULL, NULL, NULL, NULL, '20562', 7.114072, 80.552445),
(888, 11, 'Unuwinna', NULL, NULL, NULL, NULL, NULL, '20708', 7.1517, 80.7118),
(889, 11, 'Velamboda', NULL, NULL, NULL, NULL, NULL, '20640', 7.0523, 80.5023),
(890, 11, 'Watagoda', NULL, NULL, NULL, NULL, NULL, '22110', 7.39731, 80.588304),
(891, 11, 'Watagoda Harispattuwa', NULL, NULL, NULL, NULL, NULL, '20134', 7.3569, 80.6012),
(892, 11, 'Wattappola', NULL, NULL, NULL, NULL, NULL, '20454', 7.234802, 80.543661),
(893, 11, 'Weligampola', NULL, NULL, NULL, NULL, NULL, '20666', 7.0271, 80.5493),
(894, 11, 'Wendaruwa', NULL, NULL, NULL, NULL, NULL, '20914', 7.3552, 80.8375),
(895, 11, 'Weragantota', NULL, NULL, NULL, NULL, NULL, '20982', 7.3167, 80.9833),
(896, 11, 'Werapitya', NULL, NULL, NULL, NULL, NULL, '20908', 7.2969, 80.7686),
(897, 11, 'Werellagama', NULL, NULL, NULL, NULL, NULL, '20080', 7.3167, 80.5833),
(898, 11, 'Wettawa', NULL, NULL, NULL, NULL, NULL, '20108', 7.3508, 80.5221),
(899, 11, 'Yahalatenna', NULL, NULL, NULL, NULL, NULL, '20234', 7.3, 80.5667),
(900, 11, 'Yatihalagala', NULL, NULL, NULL, NULL, NULL, '20034', 7.3, 80.6),
(901, 12, 'Alawala', 'අලවල', NULL, NULL, NULL, NULL, '11122', 7.197379, 80.282779),
(902, 12, 'Alawatura', 'අලවතුර', NULL, NULL, NULL, NULL, '71204', 7.1333, 80.3333),
(903, 12, 'Alawwa', 'අලව්ව', NULL, NULL, NULL, NULL, '60280', 7.2875, 80.2536),
(904, 12, 'Algama', 'අල්ගම', NULL, NULL, NULL, NULL, '71607', 7.158338, 80.162939),
(905, 12, 'Alutnuwara', 'අළුත්නුවර', NULL, NULL, NULL, NULL, '71508', 7.2333, 80.4667),
(906, 12, 'Ambalakanda', 'අම්බලකන්ද', NULL, NULL, NULL, NULL, '71546', 7.134049, 80.446804),
(907, 12, 'Ambulugala', 'අම්බුළුගල', NULL, NULL, NULL, NULL, '71503', 7.239127, 80.409623),
(908, 12, 'Amitirigala', 'අමිතිරිගල', NULL, NULL, NULL, NULL, '71320', 7.0306, 80.1839),
(909, 12, 'Ampagala', 'අම්පාගල', NULL, NULL, NULL, NULL, '71232', 7.080239, 80.289037),
(910, 12, 'Anhandiya', 'අංහන්දිය', NULL, NULL, NULL, NULL, '60074', 7.2667, 80.2667),
(911, 12, 'Anhettigama', 'අංහෙට්ටිගම', NULL, NULL, NULL, NULL, '71403', 6.922121, 80.371876),
(912, 12, 'Aranayaka', 'අරනායක', NULL, NULL, NULL, NULL, '71540', 7.144705, 80.461358),
(913, 12, 'Aruggammana', 'අරුග්ගම්මන', NULL, NULL, NULL, NULL, '71041', 7.117733, 80.306712),
(914, 12, 'Batuwita', 'බටුවිට', NULL, NULL, NULL, NULL, '71321', 7.044339, 80.179129),
(915, 12, 'Beligala(Sab)', 'බෙලිගල', NULL, NULL, NULL, NULL, '71044', 7.2167, 80.2917),
(916, 12, 'Belihuloya', 'බෙලිහුල්ඔය', NULL, NULL, NULL, NULL, '70140', 7.2667, 80.2167),
(917, 12, 'Berannawa', 'බෙරන්නව', NULL, NULL, NULL, NULL, '71706', 7.064482, 80.405526),
(918, 12, 'Bopitiya', 'බෝපිටිය', NULL, NULL, NULL, NULL, '60155', 7.179761, 80.205221),
(919, 12, 'Bopitiya (SAB)', 'බෝපිටිය (සබර)', NULL, NULL, NULL, NULL, '71612', 7.2583, 80.2167),
(920, 12, 'Boralankada', 'බොරලන්කද', NULL, NULL, NULL, NULL, '71418', 6.979656, 80.330338),
(921, 12, 'Bossella', 'බොස්සැල්ල', NULL, NULL, NULL, NULL, '71208', 7.1333, 80.4),
(922, 12, 'Bulathkohupitiya', 'බුලත්කොහුපිටිය', NULL, NULL, NULL, NULL, '71230', 7.105994, 80.338761),
(923, 12, 'Damunupola', 'දමුනුපොල', NULL, NULL, NULL, NULL, '71034', 7.187968, 80.334456),
(924, 12, 'Debathgama', 'දෙබත්ගම', NULL, NULL, NULL, NULL, '71037', 7.1833, 80.3583),
(925, 12, 'Dedugala', 'දේදුගල', NULL, NULL, NULL, NULL, '71237', 7.093849, 80.418959),
(926, 12, 'Deewala Pallegama', 'දීවල පල්ලෙගම', NULL, NULL, NULL, NULL, '71022', 7.2333, 80.2667),
(927, 12, 'Dehiowita', 'දෙහිඕවිට', NULL, NULL, NULL, NULL, '71400', 6.9706, 80.2675),
(928, 12, 'Deldeniya', 'දෙල්දෙණිය', NULL, NULL, NULL, NULL, '71009', 7.280914, 80.35876),
(929, 12, 'Deloluwa', 'දෙලෝලුව', NULL, NULL, NULL, NULL, '71401', 6.9653, 80.3181),
(930, 12, 'Deraniyagala', 'දැරණියගල', NULL, NULL, NULL, NULL, '71430', 6.932387, 80.335039),
(931, 12, 'Dewalegama', 'දේවාලේගම', NULL, NULL, NULL, NULL, '71050', 7.278928, 80.319135),
(932, 12, 'Dewanagala', 'දෙවනගල', NULL, NULL, NULL, NULL, '71527', 7.2167, 80.4667),
(933, 12, 'Dombemada', 'දොඹේමද', NULL, NULL, NULL, NULL, '71115', 7.37974, 80.348761),
(934, 12, 'Dorawaka', 'දොරවක', NULL, NULL, NULL, NULL, '71601', 7.1833, 80.2167),
(935, 12, 'Dunumala', 'දුනුමල', NULL, NULL, NULL, NULL, '71605', 7.1738, 80.2074),
(936, 12, 'Galapitamada', 'ගලපිටමඩ', NULL, NULL, NULL, NULL, '71603', 7.14, 80.2364),
(937, 12, 'Galatara', 'ගලතර', NULL, NULL, NULL, NULL, '71505', 7.2167, 80.4167),
(938, 12, 'Galigamuwa Town', 'ගලිගමුව නගරය', NULL, NULL, NULL, NULL, '71350', 7.2, 80.3),
(939, 12, 'Gallella', 'ගල්ලෑල්ල', NULL, NULL, NULL, NULL, '70062', 6.85, 80.35),
(940, 12, 'Galpatha(Sab)', 'ගල්පාත (සබරගමුව)', NULL, NULL, NULL, NULL, '71312', 7.05, 80.2333),
(941, 12, 'Gantuna', 'ගන්තුන', NULL, NULL, NULL, NULL, '71222', 7.1667, 80.3667),
(942, 12, 'Getahetta', 'ගැටහැත්ත', NULL, NULL, NULL, NULL, '70620', 6.9128, 80.2358),
(943, 12, 'Godagampola', 'ගොඩගම්පොල', NULL, NULL, NULL, NULL, '70556', 6.885959, 80.313855),
(944, 12, 'Gonagala', 'ගෝනාගල', NULL, NULL, NULL, NULL, '71318', 7.035326, 80.207373),
(945, 12, 'Hakahinna', 'හකහින්න', NULL, NULL, NULL, NULL, '71352', 7.2, 80.3),
(946, 12, 'Hakbellawaka', 'හක්බෙල්ලවක', NULL, NULL, NULL, NULL, '71715', 7.003952, 80.328796),
(947, 12, 'Halloluwa', 'හල්ලෝලුව', NULL, NULL, NULL, NULL, '20032', 7.2, 80.35),
(948, 12, 'Hedunuwewa', NULL, NULL, NULL, NULL, NULL, '22024', 6.9306, 80.2747),
(949, 12, 'Hemmatagama', NULL, NULL, NULL, NULL, NULL, '71530', 7.1667, 80.5),
(950, 12, 'Hewadiwela', NULL, NULL, NULL, NULL, NULL, '71108', 7.372493, 80.377574),
(951, 12, 'Hingula', NULL, NULL, NULL, NULL, NULL, '71520', 7.247803, 80.469032),
(952, 12, 'Hinguralakanda', NULL, NULL, NULL, NULL, NULL, '71417', 6.91506, 80.304394),
(953, 12, 'Hingurana', NULL, NULL, NULL, NULL, NULL, '32010', 6.9167, 80.4167),
(954, 12, 'Hiriwadunna', NULL, NULL, NULL, NULL, NULL, '71014', 7.2833, 80.3833),
(955, 12, 'Ihala Walpola', NULL, NULL, NULL, NULL, NULL, '80134', 7.350958, 80.397324),
(956, 12, 'Ihalagama', NULL, NULL, NULL, NULL, NULL, '70144', 7.2667, 80.3333),
(957, 12, 'Imbulana', NULL, NULL, NULL, NULL, NULL, '71313', 7.08264, 80.245565),
(958, 12, 'Imbulgasdeniya', NULL, NULL, NULL, NULL, NULL, '71055', 7.2853, 80.3186),
(959, 12, 'Kabagamuwa', NULL, NULL, NULL, NULL, NULL, '71202', 7.136698, 80.341558),
(960, 12, 'Kahapathwala', NULL, NULL, NULL, NULL, NULL, '60062', 7.3, 80.4583),
(961, 12, 'Kandaketya', NULL, NULL, NULL, NULL, NULL, '90020', 7.2333, 80.4667),
(962, 12, 'Kannattota', NULL, NULL, NULL, NULL, NULL, '71372', 7.081348, 80.275311),
(963, 12, 'Karagahinna', NULL, NULL, NULL, NULL, NULL, '21014', 7.3604, 80.3832),
(964, 12, 'Kegalle', NULL, NULL, NULL, NULL, NULL, '71000', 7.249349, 80.351662),
(965, 12, 'Kehelpannala', NULL, NULL, NULL, NULL, NULL, '71533', 7.161131, 80.519539),
(966, 12, 'Ketawala Leula', NULL, NULL, NULL, NULL, NULL, '20198', 7.1167, 80.35),
(967, 12, 'Kitulgala', NULL, NULL, NULL, NULL, NULL, '71720', 6.9944, 80.4114),
(968, 12, 'Kondeniya', NULL, NULL, NULL, NULL, NULL, '71501', 7.2667, 80.4333),
(969, 12, 'Kotiyakumbura', NULL, NULL, NULL, NULL, NULL, '71370', 7.0833, 80.2667),
(970, 12, 'Lewangama', NULL, NULL, NULL, NULL, NULL, '71315', 7.112902, 80.239),
(971, 12, 'Mahabage', NULL, NULL, NULL, NULL, NULL, '71722', 7.019803, 80.450227),
(972, 12, 'Makehelwala', NULL, NULL, NULL, NULL, NULL, '71507', 7.282441, 80.47528),
(973, 12, 'Malalpola', NULL, NULL, NULL, NULL, NULL, '71704', 7.053091, 80.351009),
(974, 12, 'Maldeniya', NULL, NULL, NULL, NULL, NULL, '22021', 6.9306, 80.2747),
(975, 12, 'Maliboda', NULL, NULL, NULL, NULL, NULL, '71411', 6.887528, 80.464212),
(976, 12, 'Maliyadda', NULL, NULL, NULL, NULL, NULL, '90022', 7.2333, 80.4667),
(977, 12, 'Malmaduwa', NULL, NULL, NULL, NULL, NULL, '71325', 7.15, 80.2833),
(978, 12, 'Marapana', NULL, NULL, NULL, NULL, NULL, '70041', 7.2333, 80.35),
(979, 12, 'Mawanella', NULL, NULL, NULL, NULL, NULL, '71500', 7.244446, 80.439045),
(980, 12, 'Meetanwala', NULL, NULL, NULL, NULL, NULL, '60066', 7.3, 80.4583),
(981, 12, 'Migastenna Sabara', NULL, NULL, NULL, NULL, NULL, '71716', 7.0333, 80.3333),
(982, 12, 'Miyanawita', NULL, NULL, NULL, NULL, NULL, '71432', 6.900423, 80.351075),
(983, 12, 'Molagoda', NULL, NULL, NULL, NULL, NULL, '71016', 7.25, 80.3833),
(984, 12, 'Morontota', NULL, NULL, NULL, NULL, NULL, '71220', 7.1667, 80.3667),
(985, 12, 'Narangala', NULL, NULL, NULL, NULL, NULL, '90064', 7.07922, 80.360764),
(986, 12, 'Narangoda', NULL, NULL, NULL, NULL, NULL, '60152', 7.198165, 80.294552),
(987, 12, 'Nattarampotha', NULL, NULL, NULL, NULL, NULL, '20194', 7.1167, 80.35),
(988, 12, 'Nelundeniya', NULL, NULL, NULL, NULL, NULL, '71060', 7.2319, 80.2669),
(989, 12, 'Niyadurupola', NULL, NULL, NULL, NULL, NULL, '71602', 7.1667, 80.2167),
(990, 12, 'Noori', NULL, NULL, NULL, NULL, NULL, '71407', 6.9508, 80.3174),
(991, 12, 'Pannila', NULL, NULL, NULL, NULL, NULL, '12114', 6.866357, 80.320996),
(992, 12, 'Pattampitiya', NULL, NULL, NULL, NULL, NULL, '71130', 7.315516, 80.434412),
(993, 12, 'Pilawala', NULL, NULL, NULL, NULL, NULL, '20196', 7.1167, 80.35),
(994, 12, 'Pothukoladeniya', NULL, NULL, NULL, NULL, NULL, '71039', 7.1833, 80.3583),
(995, 12, 'Puswelitenna', NULL, NULL, NULL, NULL, NULL, '60072', 7.3667, 80.3667),
(996, 12, 'Rambukkana', NULL, NULL, NULL, NULL, NULL, '71100', 7.323016, 80.391856),
(997, 12, 'Rilpola', NULL, NULL, NULL, NULL, NULL, '90026', 7.2333, 80.4667),
(998, 12, 'Rukmale', NULL, NULL, NULL, NULL, NULL, '11129', 7.2, 80.4833),
(999, 12, 'Ruwanwella', NULL, NULL, NULL, NULL, NULL, '71300', 7.048852, 80.2561),
(1000, 12, 'Samanalawewa', NULL, NULL, NULL, NULL, NULL, '70142', 7.2667, 80.2167),
(1001, 12, 'Seaforth Colony', NULL, NULL, NULL, NULL, NULL, '71708', 7.0469, 80.3502),
(1002, 5, 'Colombo 2', 'කොළඹ 2', 'கொழும்பு 2', 'Slave Island', 'කොම්පඤ්ඤ වීදිය', 'கொம்பனித்தெரு', '200', 6.926944, 79.848611),
(1003, 12, 'Spring Valley', NULL, NULL, NULL, NULL, NULL, '90028', 7.2333, 80.4667),
(1004, 12, 'Talgaspitiya', NULL, NULL, NULL, NULL, NULL, '71541', 7.1667, 80.4833),
(1005, 12, 'Teligama', NULL, NULL, NULL, NULL, NULL, '71724', 7.0033, 80.3647),
(1006, 12, 'Tholangamuwa', NULL, NULL, NULL, NULL, NULL, '71619', 7.233983, 80.225956),
(1007, 12, 'Thotawella', NULL, NULL, NULL, NULL, NULL, '71106', 7.3555, 80.3969),
(1008, 12, 'Udaha Hawupe', NULL, NULL, NULL, NULL, NULL, '70154', 7.05, 80.2833),
(1009, 12, 'Udapotha', NULL, NULL, NULL, NULL, NULL, '71236', 7.09414, 80.377416),
(1010, 12, 'Uduwa', NULL, NULL, NULL, NULL, NULL, '20052', 7.110957, 80.387557),
(1011, 12, 'Undugoda', NULL, NULL, NULL, NULL, NULL, '71200', 7.141866, 80.365332),
(1012, 12, 'Ussapitiya', NULL, NULL, NULL, NULL, NULL, '71510', 7.216957, 80.444573),
(1013, 12, 'Wahakula', NULL, NULL, NULL, NULL, NULL, '71303', 7.058236, 80.207402),
(1014, 12, 'Waharaka', NULL, NULL, NULL, NULL, NULL, '71304', 7.088513, 80.198619),
(1015, 12, 'Wanaluwewa', NULL, NULL, NULL, NULL, NULL, '11068', 7.0667, 80.175),
(1016, 12, 'Warakapola', NULL, NULL, NULL, NULL, NULL, '71600', 7.230053, 80.196768),
(1017, 12, 'Watura', NULL, NULL, NULL, NULL, NULL, '71035', 7.1833, 80.3833),
(1018, 12, 'Weeoya', NULL, NULL, NULL, NULL, NULL, '71702', 7.0469, 80.3502),
(1019, 12, 'Wegalla', NULL, NULL, NULL, NULL, NULL, '71234', 7.099631, 80.30654),
(1020, 12, 'Weligalla', NULL, NULL, NULL, NULL, NULL, '20610', 7.1833, 80.2),
(1021, 12, 'Welihelatenna', NULL, NULL, NULL, NULL, NULL, '71712', 7.0333, 80.3333),
(1022, 12, 'Wewelwatta', NULL, NULL, NULL, NULL, NULL, '70066', 6.85, 80.35),
(1023, 12, 'Yatagama', NULL, NULL, NULL, NULL, NULL, '71116', 7.32512, 80.356415),
(1024, 12, 'Yatapana', NULL, NULL, NULL, NULL, NULL, '71326', 7.1333, 80.3),
(1025, 12, 'Yatiyantota', NULL, NULL, NULL, NULL, NULL, '71700', 7.0242, 80.3006),
(1026, 12, 'Yattogoda', NULL, NULL, NULL, NULL, NULL, '71029', 7.2333, 80.2667),
(1027, 13, 'Kandavalai', NULL, NULL, NULL, NULL, NULL, '', 9.4515585, 80.5008173),
(1028, 13, 'Karachchi', NULL, NULL, NULL, NULL, NULL, '', 9.3769363, 80.3766044),
(1029, 13, 'Kilinochchi', NULL, NULL, NULL, NULL, NULL, '', 9.416667, 80.416667),
(1030, 13, 'Pachchilaipalli', NULL, NULL, NULL, NULL, NULL, '', 9.6115808, 80.3273106),
(1031, 13, 'Poonakary', NULL, NULL, NULL, NULL, NULL, '', 9.5035013, 80.2111173),
(1032, 14, 'Akurana', 'අකුරණ', NULL, NULL, NULL, NULL, '20850', 7.637034, 80.023362),
(1033, 14, 'Alahengama', 'අලහෙන්ගම', NULL, NULL, NULL, NULL, '60416', 7.6779, 80.1151),
(1034, 14, 'Alahitiyawa', 'අලහිටියාව', NULL, NULL, NULL, NULL, '60182', 7.473913, 80.171211),
(1035, 14, 'Ambakote', 'අඹකොටේ', NULL, NULL, NULL, NULL, '60036', 7.492063, 80.452844),
(1036, 14, 'Ambanpola', 'අඹන්පොල', NULL, NULL, NULL, NULL, '60650', 7.915973, 80.237512),
(1037, 14, 'Andiyagala', 'ආඬියාගල', NULL, NULL, NULL, NULL, '50112', 7.4667, 80.1333),
(1038, 14, 'Anukkane', 'අනුක්කනේ', NULL, NULL, NULL, NULL, '60214', 7.501814, 80.120028),
(1039, 14, 'Aragoda', 'අරංගොඩ', NULL, NULL, NULL, NULL, '60308', 7.366116, 80.344207),
(1040, 14, 'Ataragalla', 'අටරගල්ල', NULL, NULL, NULL, NULL, '60706', 7.9696, 80.2768),
(1041, 14, 'Awulegama', 'අවුලේගම', NULL, NULL, NULL, NULL, '60462', 7.6569, 80.2203),
(1042, 14, 'Balalla', 'බලල්ල', NULL, NULL, NULL, NULL, '60604', 7.791025, 80.250762),
(1043, 14, 'Bamunukotuwa', 'බමුණකොටුව', NULL, NULL, NULL, NULL, '60347', 7.8667, 80.2167),
(1044, 14, 'Bandara Koswatta', 'බන්ඩාර කොස්වත්ත', NULL, NULL, NULL, NULL, '60424', 7.603296, 80.17257),
(1045, 14, 'Bingiriya', 'බින්ගිරිය', NULL, NULL, NULL, NULL, '60450', 7.605177, 79.921996),
(1046, 14, 'Bogamulla', 'බෝගමුල්ල', NULL, NULL, NULL, NULL, '60107', 7.4589, 80.2107),
(1047, 14, 'Boraluwewa', 'බොරළුවැව', NULL, NULL, NULL, NULL, '60437', 7.682578, 80.034757),
(1048, 14, 'Boyagane', 'බෝයගානෙ', NULL, NULL, NULL, NULL, '60027', 7.452272, 80.341672),
(1049, 14, 'Bujjomuwa', 'බුජ්ජෝමුව', NULL, NULL, NULL, NULL, '60291', 7.4581, 80.0603),
(1050, 14, 'Buluwala', 'බුලුවල', NULL, NULL, NULL, NULL, '60076', 7.484201, 80.473535),
(1051, 14, 'Dadayamtalawa', 'දඩයම්තලාව', NULL, NULL, NULL, NULL, '32046', 7.65, 79.9667),
(1052, 14, 'Dambadeniya', 'දඹදෙණිය', NULL, NULL, NULL, NULL, '60130', 7.370527, 80.146193),
(1053, 14, 'Daraluwa', 'දරලුව', NULL, NULL, NULL, NULL, '60174', 7.359407, 79.978233),
(1054, 14, 'Deegalla', 'දීගල්ල', NULL, NULL, NULL, NULL, '60228', 7.510205, 80.029797),
(1055, 14, 'Demataluwa', 'දෙමටලුව', NULL, NULL, NULL, NULL, '60024', 7.513976, 80.258741),
(1056, 14, 'Demuwatha', 'දෙමුවත', NULL, NULL, NULL, NULL, '70332', 7.35, 80.1667),
(1057, 14, 'Diddeniya', 'දෙණියාය', NULL, NULL, NULL, NULL, '60544', 7.685279, 80.47286),
(1058, 14, 'Digannewa', 'දිගන්නෑව', NULL, NULL, NULL, NULL, '60485', 7.897218, 80.101328),
(1059, 14, 'Divullegoda', 'දිවුලේගොඩ', NULL, NULL, NULL, NULL, '60472', 7.75, 80.2),
(1060, 14, 'Diyasenpura', 'දියසෙන්පුර', NULL, NULL, NULL, NULL, '51504', 7.8167, 80.1833),
(1061, 14, 'Dodangaslanda', 'දොඩන්ගස්ලන්ද', NULL, NULL, NULL, NULL, '60530', 7.5667, 80.5333),
(1062, 14, 'Doluwa', 'දොළුව', NULL, NULL, NULL, NULL, '20532', 7.621516, 80.418833),
(1063, 14, 'Doragamuwa', 'දොරගමුව', NULL, NULL, NULL, NULL, '20816', 7.5833, 79.9333),
(1064, 14, 'Doratiyawa', 'දොරටියාව', NULL, NULL, NULL, NULL, '60013', 7.450628, 80.380562),
(1065, 14, 'Dunumadalawa', 'දුනුමඩවල', NULL, NULL, NULL, NULL, '50214', 7.8, 80.0833),
(1066, 14, 'Dunuwilapitiya', 'දුනුවිලපිටිය', NULL, NULL, NULL, NULL, '21538', 7.3667, 80.2),
(1067, 14, 'Ehetuwewa', 'ඇහැටුවැව', NULL, NULL, NULL, NULL, '60716', 7.927568, 80.332035),
(1068, 14, 'Elibichchiya', 'ඇලිබිච්චිය', NULL, NULL, NULL, NULL, '60156', 7.313179, 80.056935),
(1069, 14, 'Embogama', NULL, NULL, NULL, NULL, NULL, '60718', 7.9214, 80.3608),
(1070, 14, 'Etungahakotuwa', 'ඇතුන්ගහකොටුව', NULL, NULL, NULL, NULL, '60266', 7.5167, 79.9667),
(1071, 14, 'Galadivulwewa', 'ගලදිවුල්වැව', NULL, NULL, NULL, NULL, '50210', 7.8, 80.0833),
(1072, 14, 'Galgamuwa', 'ගල්ගමුව', NULL, NULL, NULL, NULL, '60700', 7.995468, 80.267527),
(1073, 14, 'Gallellagama', 'ගල්ලෑල්ලගම', NULL, NULL, NULL, NULL, '20095', 7.3, 80.15),
(1074, 14, 'Gallewa', NULL, NULL, NULL, NULL, NULL, '60712', 7.9667, 80.3333),
(1075, 14, 'Ganegoda', 'ගණේගොඩ', NULL, NULL, NULL, NULL, '80440', 7.5833, 80),
(1076, 14, 'Girathalana', 'ගිරාතලන', NULL, NULL, NULL, NULL, '60752', 7.9833, 80.3833),
(1077, 14, 'Gokaralla', 'ගොකරුල්ල', NULL, NULL, NULL, NULL, '60522', 7.6301, 80.3775),
(1078, 14, 'Gonawila', 'ගොනාවිල', NULL, NULL, NULL, NULL, '60170', 7.3167, 80),
(1079, 14, 'Halmillawewa', 'හල්මිල්ලවැව', NULL, NULL, NULL, NULL, '60441', 7.5953, 79.9972),
(1080, 14, 'Handungamuwa', NULL, NULL, NULL, NULL, NULL, '21536', 7.3667, 80.2),
(1081, 14, 'Harankahawa', NULL, NULL, NULL, NULL, NULL, '20092', 7.3, 80.15),
(1082, 14, 'Helamada', NULL, NULL, NULL, NULL, NULL, '71046', 7.3167, 80.2833),
(1083, 14, 'Hengamuwa', NULL, NULL, NULL, NULL, NULL, '60414', 7.703282, 80.111254),
(1084, 14, 'Hettipola', NULL, NULL, NULL, NULL, NULL, '60430', 7.605372, 80.083137),
(1085, 14, 'Hewainna', NULL, NULL, NULL, NULL, NULL, '10714', 7.3333, 80.2167),
(1086, 14, 'Hilogama', NULL, NULL, NULL, NULL, NULL, '60486', 7.75, 80.0833),
(1087, 14, 'Hindagolla', NULL, NULL, NULL, NULL, NULL, '60034', 7.4833, 80.4167),
(1088, 14, 'Hiriyala Lenawa', NULL, NULL, NULL, NULL, NULL, '60546', 7.6709, 80.4751),
(1089, 14, 'Hiruwalpola', NULL, NULL, NULL, NULL, NULL, '60458', 7.553915, 79.924699),
(1090, 14, 'Horambawa', NULL, NULL, NULL, NULL, NULL, '60181', 7.45, 80.1833),
(1091, 14, 'Hulogedara', NULL, NULL, NULL, NULL, NULL, '60474', 7.7833, 80.1833),
(1092, 14, 'Hulugalla', NULL, NULL, NULL, NULL, NULL, '60477', 7.79059, 80.140007),
(1093, 14, 'Ihala Gomugomuwa', NULL, NULL, NULL, NULL, NULL, '60211', 7.5167, 80.0833),
(1094, 14, 'Ihala Katugampala', NULL, NULL, NULL, NULL, NULL, '60135', 7.3672, 80.1467),
(1095, 14, 'Indulgodakanda', NULL, NULL, NULL, NULL, NULL, '60016', 7.422625, 80.402808),
(1096, 14, 'Ithanawatta', NULL, NULL, NULL, NULL, NULL, '60025', 7.4458, 80.3458),
(1097, 14, 'Kadigawa', NULL, NULL, NULL, NULL, NULL, '60492', 7.7167, 80),
(1098, 14, 'Kalankuttiya', NULL, NULL, NULL, NULL, NULL, '50174', 8.05, 80.3833),
(1099, 14, 'Kalatuwawa', NULL, NULL, NULL, NULL, NULL, '10718', 7.6333, 80.3667),
(1100, 14, 'Kalugamuwa', NULL, NULL, NULL, NULL, NULL, '60096', 7.449717, 80.256696),
(1101, 14, 'Kanadeniyawala', NULL, NULL, NULL, NULL, NULL, '60054', 7.43824, 80.535658),
(1102, 14, 'Kanattewewa', NULL, NULL, NULL, NULL, NULL, '60422', 7.6167, 80.2),
(1103, 14, 'Kandegedara', NULL, NULL, NULL, NULL, NULL, '90070', 7.424611, 80.071498),
(1104, 14, 'Karagahagedara', NULL, NULL, NULL, NULL, NULL, '60106', 7.475787, 80.209967),
(1105, 14, 'Karambe', NULL, NULL, NULL, NULL, NULL, '60602', 7.805937, 80.339167),
(1106, 14, 'Katiyawa', NULL, NULL, NULL, NULL, NULL, '50261', 7.624637, 80.553944),
(1107, 14, 'Katupota', NULL, NULL, NULL, NULL, NULL, '60350', 7.5331, 80.1897),
(1108, 14, 'Kawudulla', NULL, NULL, NULL, NULL, NULL, '51414', 7.75, 80.3833),
(1109, 14, 'Kawuduluwewa Stagell', NULL, NULL, NULL, NULL, NULL, '51514', 7.8167, 80.1833),
(1110, 14, 'Kekunagolla', NULL, NULL, NULL, NULL, NULL, '60183', 7.49608, 80.170446),
(1111, 14, 'Keppitiwalana', NULL, NULL, NULL, NULL, NULL, '60288', 7.323203, 80.190441),
(1112, 14, 'Kimbulwanaoya', NULL, NULL, NULL, NULL, NULL, '60548', 7.6709, 80.4751),
(1113, 14, 'Kirimetiyawa', NULL, NULL, NULL, NULL, NULL, '60184', 7.5247, 80.1408),
(1114, 14, 'Kirindawa', NULL, NULL, NULL, NULL, NULL, '60212', 7.502078, 80.096123),
(1115, 14, 'Kirindigalla', NULL, NULL, NULL, NULL, NULL, '60502', 7.554314, 80.475005),
(1116, 14, 'Kithalawa', NULL, NULL, NULL, NULL, NULL, '60188', 7.4816, 80.1615),
(1117, 14, 'Kitulwala', NULL, NULL, NULL, NULL, NULL, '11242', 7.5, 80.5333),
(1118, 14, 'Kobeigane', NULL, NULL, NULL, NULL, NULL, '60410', 7.656731, 80.120999),
(1119, 14, 'Kohilagedara', NULL, NULL, NULL, NULL, NULL, '60028', 7.4167, 80.3667),
(1120, 14, 'Konwewa', NULL, NULL, NULL, NULL, NULL, '60630', 7.8, 80.0667),
(1121, 14, 'Kosdeniya', NULL, NULL, NULL, NULL, NULL, '60356', 7.574081, 80.138826),
(1122, 14, 'Kosgolla', NULL, NULL, NULL, NULL, NULL, '60029', 7.4, 80.3833),
(1123, 14, 'Kotagala', NULL, NULL, NULL, NULL, NULL, '22080', 7.45, 80.2333),
(1124, 5, 'Colombo 13', 'කොළඹ 13', 'கொழும்பு 13', 'Kotahena', 'කොටහේන', 'கொட்டாஞ்சேனை', '01300', 6.942778, 79.858611),
(1125, 14, 'Kotawehera', NULL, NULL, NULL, NULL, NULL, '60483', 7.7911, 80.1023),
(1126, 14, 'Kudagalgamuwa', NULL, NULL, NULL, NULL, NULL, '60003', 7.558498, 80.340333),
(1127, 14, 'Kudakatnoruwa', NULL, NULL, NULL, NULL, NULL, '60754', 7.9833, 80.3833),
(1128, 14, 'Kuliyapitiya', NULL, NULL, NULL, NULL, NULL, '60200', 7.469551, 80.04873),
(1129, 14, 'Kumaragama', NULL, NULL, NULL, NULL, NULL, '51412', 7.75, 80.3833),
(1130, 14, 'Kumbukgeta', NULL, NULL, NULL, NULL, NULL, '60508', 7.675, 80.3667),
(1131, 14, 'Kumbukwewa', NULL, NULL, NULL, NULL, NULL, '60506', 7.797468, 80.217857),
(1132, 14, 'Kuratihena', NULL, NULL, NULL, NULL, NULL, '60438', 7.6, 80.1333),
(1133, 14, 'Kurunegala', NULL, NULL, NULL, NULL, NULL, '60000', 7.4867, 80.3647),
(1134, 14, 'lbbagamuwa', NULL, NULL, NULL, NULL, NULL, '60500', 7.675, 80.3667),
(1135, 14, 'lhala Kadigamuwa', NULL, NULL, NULL, NULL, NULL, '60238', 7.5436, 79.9819),
(1136, 14, 'Lihiriyagama', NULL, NULL, NULL, NULL, NULL, '61138', 7.3447, 79.9425),
(1137, 14, 'lllagolla', NULL, NULL, NULL, NULL, NULL, '20724', 7.4333, 80.1333),
(1138, 14, 'llukhena', NULL, NULL, NULL, NULL, NULL, '60232', 7.5436, 79.9819),
(1139, 14, 'Lonahettiya', NULL, NULL, NULL, NULL, NULL, '60108', 7.4589, 80.2107),
(1140, 14, 'Madahapola', NULL, NULL, NULL, NULL, NULL, '60552', 7.711952, 80.499003),
(1141, 14, 'Madakumburumulla', NULL, NULL, NULL, NULL, NULL, '60209', 7.44599, 79.994062),
(1142, 14, 'Madalagama', NULL, NULL, NULL, NULL, NULL, '70158', 7.353398, 80.314033),
(1143, 14, 'Madawala Ulpotha', NULL, NULL, NULL, NULL, NULL, '21074', 7.703, 80.5051),
(1144, 14, 'Maduragoda', NULL, NULL, NULL, NULL, NULL, '60532', 7.5667, 80.5333),
(1145, 14, 'Maeliya', NULL, NULL, NULL, NULL, NULL, '60512', 7.734847, 80.4079),
(1146, 14, 'Magulagama', NULL, NULL, NULL, NULL, NULL, '60221', 7.542895, 80.090321),
(1147, 14, 'Maha Ambagaswewa', NULL, NULL, NULL, NULL, NULL, '51518', 7.8167, 80.1833),
(1148, 14, 'Mahagalkadawala', NULL, NULL, NULL, NULL, NULL, '60731', 8.062861, 80.28052),
(1149, 14, 'Mahagirilla', NULL, NULL, NULL, NULL, NULL, '60479', 7.8333, 80.1333),
(1150, 14, 'Mahamukalanyaya', NULL, NULL, NULL, NULL, NULL, '60516', 7.7417, 80.4318),
(1151, 14, 'Mahananneriya', NULL, NULL, NULL, NULL, NULL, '60724', 8.013545, 80.183367),
(1152, 14, 'Mahapallegama', NULL, NULL, NULL, NULL, NULL, '71063', 7.366, 80.0918),
(1153, 14, 'Maharachchimulla', NULL, NULL, NULL, NULL, NULL, '60286', 7.335989, 80.212673),
(1154, 14, 'Mahatalakolawewa', NULL, NULL, NULL, NULL, NULL, '51506', 7.8167, 80.1833),
(1155, 14, 'Mahawewa', NULL, NULL, NULL, NULL, NULL, '61220', 7.5167, 79.9167),
(1156, 14, 'Maho', NULL, NULL, NULL, NULL, NULL, '60600', 7.8228, 80.2778),
(1157, 14, 'Makulewa', NULL, NULL, NULL, NULL, NULL, '60714', 7.998315, 80.345072),
(1158, 14, 'Makulpotha', NULL, NULL, NULL, NULL, NULL, '60514', 7.751748, 80.43986),
(1159, 14, 'Makulwewa', NULL, NULL, NULL, NULL, NULL, '60578', 7.6333, 80.05),
(1160, 14, 'Malagane', NULL, NULL, NULL, NULL, NULL, '60404', 7.65, 80.2667),
(1161, 14, 'Mandapola', NULL, NULL, NULL, NULL, NULL, '60434', 7.63521, 80.108641),
(1162, 14, 'Maspotha', NULL, NULL, NULL, NULL, NULL, '60344', 7.8667, 80.2167),
(1163, 14, 'Mawathagama', NULL, NULL, NULL, NULL, NULL, '60060', 7.409691, 80.315775),
(1164, 14, 'Medirigiriya', NULL, NULL, NULL, NULL, NULL, '51500', 7.8167, 80.1833),
(1165, 14, 'Medivawa', NULL, NULL, NULL, NULL, NULL, '60612', 7.7678, 80.2858),
(1166, 14, 'Meegalawa', NULL, NULL, NULL, NULL, NULL, '60750', 7.9833, 80.3833),
(1167, 14, 'Meegaswewa', NULL, NULL, NULL, NULL, NULL, '51508', 7.8167, 80.1833),
(1168, 14, 'Meewellawa', NULL, NULL, NULL, NULL, NULL, '60484', 7.85, 80.15),
(1169, 14, 'Melsiripura', NULL, NULL, NULL, NULL, NULL, '60540', 7.65, 80.5),
(1170, 14, 'Metikumbura', NULL, NULL, NULL, NULL, NULL, '60304', 7.3615, 80.3177),
(1171, 14, 'Metiyagane', NULL, NULL, NULL, NULL, NULL, '60121', 7.390854, 80.180612),
(1172, 14, 'Minhettiya', NULL, NULL, NULL, NULL, NULL, '60004', 7.581261, 80.307757),
(1173, 14, 'Minuwangete', NULL, NULL, NULL, NULL, NULL, '60406', 7.7167, 80.25),
(1174, 14, 'Mirihanagama', NULL, NULL, NULL, NULL, NULL, '60408', 7.6542, 80.2583),
(1175, 14, 'Monnekulama', NULL, NULL, NULL, NULL, NULL, '60495', 7.824042, 80.060587),
(1176, 14, 'Moragane', NULL, NULL, NULL, NULL, NULL, '60354', 7.547791, 80.130329),
(1177, 14, 'Moragollagama', NULL, NULL, NULL, NULL, NULL, '60640', 7.6333, 80.2167),
(1178, 14, 'Morathiha', NULL, NULL, NULL, NULL, NULL, '60038', 7.510701, 80.488428),
(1179, 14, 'Munamaldeniya', NULL, NULL, NULL, NULL, NULL, '60218', 7.55, 80.0667),
(1180, 14, 'Muruthenge', NULL, NULL, NULL, NULL, NULL, '60122', 7.3942, 80.1861),
(1181, 14, 'Mutugala', NULL, NULL, NULL, NULL, NULL, '51064', 7.3667, 80.1667),
(1182, 14, 'Nabadewa', NULL, NULL, NULL, NULL, NULL, '60482', 7.6833, 80.0667),
(1183, 14, 'Nagollagama', NULL, NULL, NULL, NULL, NULL, '60590', 7.752013, 80.309254),
(1184, 14, 'Nagollagoda', NULL, NULL, NULL, NULL, NULL, '60226', 7.563335, 80.037807),
(1185, 14, 'Nakkawatta', NULL, NULL, NULL, NULL, NULL, '60186', 7.448259, 80.141879),
(1186, 14, 'Narammala', NULL, NULL, NULL, NULL, NULL, '60100', 7.431387, 80.206159),
(1187, 14, 'Nawasenapura', NULL, NULL, NULL, NULL, NULL, '51066', 7.3667, 80.1667),
(1188, 14, 'Nawatalwatta', NULL, NULL, NULL, NULL, NULL, '60292', 7.4581, 80.0603),
(1189, 14, 'Nelliya', NULL, NULL, NULL, NULL, NULL, '60549', 7.690523, 80.457947),
(1190, 14, 'Nikaweratiya', NULL, NULL, NULL, NULL, NULL, '60470', 7.747585, 80.115201),
(1191, 14, 'Nugagolla', NULL, NULL, NULL, NULL, NULL, '21534', 7.3667, 80.2),
(1192, 14, 'Nugawela', NULL, NULL, NULL, NULL, NULL, '20072', 7.329999, 80.220383),
(1193, 14, 'Padeniya', NULL, NULL, NULL, NULL, NULL, '60461', 7.648348, 80.222132),
(1194, 14, 'Padiwela', NULL, NULL, NULL, NULL, NULL, '60236', 7.545547, 79.9905),
(1195, 14, 'Pahalagiribawa', NULL, NULL, NULL, NULL, NULL, '60735', 8.0833, 80.2111),
(1196, 14, 'Pahamune', NULL, NULL, NULL, NULL, NULL, '60112', 7.4833, 80.2),
(1197, 14, 'Palagala', NULL, NULL, NULL, NULL, NULL, '50111', 7.4667, 80.1333),
(1198, 14, 'Palapathwela', NULL, NULL, NULL, NULL, NULL, '21070', 7.9, 80.2),
(1199, 14, 'Palaviya', NULL, NULL, NULL, NULL, NULL, '61280', 7.5785, 79.9098),
(1200, 14, 'Pallewela', NULL, NULL, NULL, NULL, NULL, '11150', 7.4667, 79.9833),
(1201, 14, 'Palukadawala', NULL, NULL, NULL, NULL, NULL, '60704', 7.947895, 80.279058),
(1202, 14, 'Panadaragama', NULL, NULL, NULL, NULL, NULL, '60348', 7.8667, 80.2167),
(1203, 14, 'Panagamuwa', NULL, NULL, NULL, NULL, NULL, '60052', 7.55, 80.4667),
(1204, 14, 'Panaliya', NULL, NULL, NULL, NULL, NULL, '60312', 7.328059, 80.331852),
(1205, 14, 'Panapitiya', NULL, NULL, NULL, NULL, NULL, '70152', 7.4167, 80.1833);
INSERT INTO `cities` (`id`, `district_id`, `name_en`, `name_si`, `name_ta`, `sub_name_en`, `sub_name_si`, `sub_name_ta`, `postcode`, `latitude`, `longitude`) VALUES
(1206, 14, 'Panliyadda', NULL, NULL, NULL, NULL, NULL, '60558', 7.7061, 80.4964),
(1207, 14, 'Pansiyagama', NULL, NULL, NULL, NULL, NULL, '60554', 7.7061, 80.4964),
(1208, 14, 'Parape', NULL, NULL, NULL, NULL, NULL, '71105', 7.3667, 80.4167),
(1209, 14, 'Pathanewatta', NULL, NULL, NULL, NULL, NULL, '90071', 7.4167, 80.0833),
(1210, 14, 'Pattiya Watta', NULL, NULL, NULL, NULL, NULL, '20118', 7.3833, 80.3167),
(1211, 14, 'Perakanatta', NULL, NULL, NULL, NULL, NULL, '21532', 7.3667, 80.2),
(1212, 14, 'Periyakadneluwa', NULL, NULL, NULL, NULL, NULL, '60518', 7.7417, 80.4318),
(1213, 14, 'Pihimbiya Ratmale', NULL, NULL, NULL, NULL, NULL, '60439', 7.6299, 80.0953),
(1214, 14, 'Pihimbuwa', NULL, NULL, NULL, NULL, NULL, '60053', 7.460742, 80.512294),
(1215, 14, 'Pilessa', NULL, NULL, NULL, NULL, NULL, '60058', 7.45, 80.4167),
(1216, 14, 'Polgahawela', NULL, NULL, NULL, NULL, NULL, '60300', 7.332765, 80.295285),
(1217, 14, 'Polgolla', NULL, NULL, NULL, NULL, NULL, '20250', 7.4167, 80.5333),
(1218, 14, 'Polpitigama', NULL, NULL, NULL, NULL, NULL, '60620', 7.8142, 80.4042),
(1219, 14, 'Pothuhera', NULL, NULL, NULL, NULL, NULL, '60330', 7.4181, 80.3317),
(1220, 14, 'Pothupitiya', NULL, NULL, NULL, NULL, NULL, '70338', 7.35542, 80.17166),
(1221, 14, 'Pujapitiya', NULL, NULL, NULL, NULL, NULL, '20112', 7.3833, 80.3167),
(1222, 14, 'Rakwana', NULL, NULL, NULL, NULL, NULL, '70300', 7.9, 80.4),
(1223, 14, 'Ranorawa', NULL, NULL, NULL, NULL, NULL, '50212', 7.8, 80.0833),
(1224, 14, 'Rathukohodigala', NULL, NULL, NULL, NULL, NULL, '20818', 7.5833, 79.9333),
(1225, 14, 'Ridibendiella', NULL, NULL, NULL, NULL, NULL, '60606', 7.802, 80.287),
(1226, 14, 'Ridigama', NULL, NULL, NULL, NULL, NULL, '60040', 7.55, 80.4833),
(1227, 14, 'Saliya Asokapura', NULL, NULL, NULL, NULL, NULL, '60736', 8.0833, 80.2111),
(1228, 14, 'Sandalankawa', NULL, NULL, NULL, NULL, NULL, '60176', 7.304619, 79.944358),
(1229, 14, 'Sevanapitiya', NULL, NULL, NULL, NULL, NULL, '51062', 7.3667, 80.1667),
(1230, 14, 'Sirambiadiya', NULL, NULL, NULL, NULL, NULL, '61312', 8.1, 80.2667),
(1231, 14, 'Sirisetagama', NULL, NULL, NULL, NULL, NULL, '60478', 7.7772, 80.1506),
(1232, 14, 'Siyambalangamuwa', NULL, NULL, NULL, NULL, NULL, '60646', 7.529179, 80.340311),
(1233, 14, 'Siyambalawewa', NULL, NULL, NULL, NULL, NULL, '32048', 7.65, 79.9667),
(1234, 14, 'Solepura', NULL, NULL, NULL, NULL, NULL, '60737', 8.153657, 80.153384),
(1235, 14, 'Solewewa', NULL, NULL, NULL, NULL, NULL, '60738', 8.145855, 80.132596),
(1236, 14, 'Sunandapura', NULL, NULL, NULL, NULL, NULL, '60436', 7.6299, 80.0953),
(1237, 14, 'Talawattegedara', NULL, NULL, NULL, NULL, NULL, '60306', 7.3833, 80.3),
(1238, 14, 'Tambutta', NULL, NULL, NULL, NULL, NULL, '60734', 8.0833, 80.2167),
(1239, 14, 'Tennepanguwa', NULL, NULL, NULL, NULL, NULL, '90072', 7.4167, 80.0833),
(1240, 14, 'Thalahitimulla', NULL, NULL, NULL, NULL, NULL, '60208', 7.432473, 80.001954),
(1241, 14, 'Thalakolawewa', NULL, NULL, NULL, NULL, NULL, '60624', 7.796943, 80.433851),
(1242, 14, 'Thalwita', NULL, NULL, NULL, NULL, NULL, '60572', 7.5943, 80.2108),
(1243, 14, 'Tharana Udawela', NULL, NULL, NULL, NULL, NULL, '60227', 7.5333, 80.0667),
(1244, 14, 'Thimbiriyawa', NULL, NULL, NULL, NULL, NULL, '60476', 7.750904, 80.140975),
(1245, 14, 'Tisogama', NULL, NULL, NULL, NULL, NULL, '60453', 7.6065, 79.9406),
(1246, 14, 'Torayaya', NULL, NULL, NULL, NULL, NULL, '60499', 7.5167, 80.4),
(1247, 14, 'Tulhiriya', NULL, NULL, NULL, NULL, NULL, '71610', 7.2833, 80.2167),
(1248, 14, 'Tuntota', NULL, NULL, NULL, NULL, NULL, '71062', 7.5, 79.9167),
(1249, 14, 'Tuttiripitigama', NULL, NULL, NULL, NULL, NULL, '60426', 7.6, 80.1333),
(1250, 14, 'Udagaldeniya', NULL, NULL, NULL, NULL, NULL, '71113', 7.3583, 80.35),
(1251, 14, 'Udahingulwala', NULL, NULL, NULL, NULL, NULL, '20094', 7.3, 80.15),
(1252, 14, 'Udawatta', NULL, NULL, NULL, NULL, NULL, '20722', 7.4333, 80.1333),
(1253, 14, 'Udubaddawa', NULL, NULL, NULL, NULL, NULL, '60250', 7.4828, 79.9753),
(1254, 14, 'Udumulla', NULL, NULL, NULL, NULL, NULL, '71521', 7.45, 80.4),
(1255, 14, 'Uhumiya', NULL, NULL, NULL, NULL, NULL, '60094', 7.4667, 80.2833),
(1256, 14, 'Ulpotha Pallekele', NULL, NULL, NULL, NULL, NULL, '60622', 7.8071, 80.4188),
(1257, 14, 'Ulpothagama', NULL, NULL, NULL, NULL, NULL, '20965', 7.7167, 80.3167),
(1258, 14, 'Usgala Siyabmalangamuwa', NULL, NULL, NULL, NULL, NULL, '60732', 8.0833, 80.2111),
(1259, 14, 'Vijithapura', NULL, NULL, NULL, NULL, NULL, '50110', 7.4667, 80.1333),
(1260, 14, 'Wadakada', NULL, NULL, NULL, NULL, NULL, '60318', 7.39697, 80.267596),
(1261, 14, 'Wadumunnegedara', NULL, NULL, NULL, NULL, NULL, '60204', 7.4167, 79.9667),
(1262, 14, 'Walakumburumulla', NULL, NULL, NULL, NULL, NULL, '60198', 7.4167, 80.0167),
(1263, 14, 'Wannigama', NULL, NULL, NULL, NULL, NULL, '60465', 7.6569, 80.2203),
(1264, 14, 'Wannikudawewa', NULL, NULL, NULL, NULL, NULL, '60721', 7.9977, 80.2964),
(1265, 14, 'Wannilhalagama', NULL, NULL, NULL, NULL, NULL, '60722', 7.9977, 80.2964),
(1266, 14, 'Wannirasnayakapura', NULL, NULL, NULL, NULL, NULL, '60490', 7.6889, 80.1556),
(1267, 14, 'Warawewa', NULL, NULL, NULL, NULL, NULL, '60739', 8.121572, 80.14855),
(1268, 14, 'Wariyapola', NULL, NULL, NULL, NULL, NULL, '60400', 7.628694, 80.235989),
(1269, 14, 'Watareka', NULL, NULL, NULL, NULL, NULL, '10511', 7.397142, 80.432878),
(1270, 14, 'Wattegama', NULL, NULL, NULL, NULL, NULL, '20810', 7.5833, 79.9333),
(1271, 14, 'Watuwatta', NULL, NULL, NULL, NULL, NULL, '60262', 7.5167, 79.9167),
(1272, 14, 'Weerapokuna', NULL, NULL, NULL, NULL, NULL, '60454', 7.649426, 79.981893),
(1273, 14, 'Welawa Juncton', NULL, NULL, NULL, NULL, NULL, '60464', 7.6569, 80.2203),
(1274, 14, 'Welipennagahamulla', NULL, NULL, NULL, NULL, NULL, '60240', 7.4581, 80.0603),
(1275, 14, 'Wellagala', NULL, NULL, NULL, NULL, NULL, '60402', 7.6167, 80.2833),
(1276, 14, 'Wellarawa', NULL, NULL, NULL, NULL, NULL, '60456', 7.5729, 79.913974),
(1277, 14, 'Wellawa', NULL, NULL, NULL, NULL, NULL, '60570', 7.566524, 80.369189),
(1278, 14, 'Welpalla', NULL, NULL, NULL, NULL, NULL, '60206', 7.4333, 80.05),
(1279, 14, 'Wennoruwa', NULL, NULL, NULL, NULL, NULL, '60284', 7.369467, 80.219573),
(1280, 14, 'Weuda', NULL, NULL, NULL, NULL, NULL, '60080', 7.4, 80.1667),
(1281, 14, 'Wewagama', NULL, NULL, NULL, NULL, NULL, '60195', 7.42031, 80.099835),
(1282, 14, 'Wilgamuwa', NULL, NULL, NULL, NULL, NULL, '21530', 7.3667, 80.2),
(1283, 14, 'Yakwila', NULL, NULL, NULL, NULL, NULL, '60202', 7.3833, 80.0333),
(1284, 14, 'Yatigaloluwa', NULL, NULL, NULL, NULL, NULL, '60314', 7.328729, 80.264509),
(1285, 15, 'Mannar', NULL, NULL, NULL, NULL, NULL, '41000', 8.9833, 79.9),
(1286, 15, 'Puthukudiyiruppu', NULL, NULL, NULL, NULL, NULL, '30158', 9.046951, 79.853286),
(1287, 16, 'Akuramboda', 'අකුරම්බොඩ', NULL, NULL, NULL, NULL, '21142', 7.646383, 80.600048),
(1288, 16, 'Alawatuwala', 'අලවතුවල', NULL, NULL, NULL, NULL, '60047', 7.55, 80.5583),
(1289, 16, 'Alwatta', 'අල්වත්ත', NULL, NULL, NULL, NULL, '21004', 7.449444, 80.663358),
(1290, 16, 'Ambana', 'අම්බාන', NULL, NULL, NULL, NULL, '21504', 7.651007, 80.693816),
(1291, 16, 'Aralaganwila', 'අරලගන්විල', NULL, NULL, NULL, NULL, '51100', 7.696, 80.5842),
(1292, 16, 'Ataragallewa', 'අටරගල්ලෑව', NULL, NULL, NULL, NULL, '21512', 7.5333, 80.6067),
(1293, 16, 'Bambaragaswewa', 'බඹරගස්වැව', NULL, NULL, NULL, NULL, '21212', 7.784315, 80.540511),
(1294, 16, 'Barawardhana Oya', 'බරවර්ධන ඔය', NULL, NULL, NULL, NULL, '20967', 7.5667, 80.625),
(1295, 16, 'Beligamuwa', 'බෙලිගමුව', NULL, NULL, NULL, NULL, '21214', 7.725882, 80.552789),
(1296, 16, 'Damana', 'දමන', NULL, NULL, NULL, NULL, '32014', 7.8417, 80.5797),
(1297, 16, 'Dambulla', 'දඹුල්ල', NULL, NULL, NULL, NULL, '21100', 7.868039, 80.646464),
(1298, 16, 'Damminna', 'දම්මින්න', NULL, NULL, NULL, NULL, '51106', 7.696, 80.5842),
(1299, 16, 'Dankanda', 'දංකන්ද', NULL, NULL, NULL, NULL, '21032', 7.519616, 80.694168),
(1300, 16, 'Delwite', 'දෙල්විටේ', NULL, NULL, NULL, NULL, '60044', 7.55, 80.5583),
(1301, 16, 'Devagiriya', 'දේවගිරිය', NULL, NULL, NULL, NULL, '21552', 7.5833, 80.9667),
(1302, 16, 'Dewahuwa', 'දේවහුව', NULL, NULL, NULL, NULL, '21206', 7.7589, 80.5683),
(1303, 16, 'Divuldamana', 'දිවුල්දමන', NULL, NULL, NULL, NULL, '51104', 7.696, 80.5842),
(1304, 16, 'Dullewa', 'දුල්වල', NULL, NULL, NULL, NULL, '21054', 7.511012, 80.59862),
(1305, 16, 'Dunkolawatta', 'දුන්කොලවත්ත', NULL, NULL, NULL, NULL, '21046', 7.4917, 80.625),
(1306, 16, 'Elkaduwa', 'ඇල්කඩුව', NULL, NULL, NULL, NULL, '21012', 7.410706, 80.693258),
(1307, 16, 'Erawula Junction', 'එරවුල හන්දිය', NULL, NULL, NULL, NULL, '21108', 7.8633, 80.6842),
(1308, 16, 'Etanawala', 'එතනවල', NULL, NULL, NULL, NULL, '21402', 7.5217, 80.6847),
(1309, 16, 'Galewela', 'ගලේවෙල', NULL, NULL, NULL, NULL, '21200', 7.759807, 80.56744),
(1310, 16, 'Galoya Junction', 'ගල්ඔය හන්දිය', NULL, NULL, NULL, NULL, '51375', 7.696, 80.5842),
(1311, 16, 'Gammaduwa', 'ගම්මඩුව', NULL, NULL, NULL, NULL, '21068', 7.581654, 80.698521),
(1312, 16, 'Gangala Puwakpitiya', 'ගන්ගල පුවක්පිටිය', NULL, NULL, NULL, NULL, '21404', 7.5217, 80.6847),
(1313, 16, 'Hasalaka', NULL, NULL, NULL, NULL, NULL, '20960', 7.5667, 80.625),
(1314, 16, 'Hattota Amuna', NULL, NULL, NULL, NULL, NULL, '21514', 7.5333, 80.6067),
(1315, 16, 'Imbulgolla', NULL, NULL, NULL, NULL, NULL, '21064', 7.575027, 80.663159),
(1316, 16, 'Inamaluwa', NULL, NULL, NULL, NULL, NULL, '21124', 7.951344, 80.690187),
(1317, 16, 'Iriyagolla', NULL, NULL, NULL, NULL, NULL, '60045', 7.55, 80.6333),
(1318, 16, 'Kaikawala', NULL, NULL, NULL, NULL, NULL, '21066', 7.507177, 80.659444),
(1319, 16, 'Kalundawa', NULL, NULL, NULL, NULL, NULL, '21112', 7.8, 80.7167),
(1320, 16, 'Kandalama', NULL, NULL, NULL, NULL, NULL, '21106', 7.887403, 80.703507),
(1321, 16, 'Kavudupelella', NULL, NULL, NULL, NULL, NULL, '21072', 7.5914, 80.6258),
(1322, 16, 'Kibissa', NULL, NULL, NULL, NULL, NULL, '21122', 7.9397, 80.7278),
(1323, 16, 'Kiwula', NULL, NULL, NULL, NULL, NULL, '21042', 7.4917, 80.625),
(1324, 16, 'Kongahawela', NULL, NULL, NULL, NULL, NULL, '21500', 7.679932, 80.706607),
(1325, 16, 'Laggala Pallegama', NULL, NULL, NULL, NULL, NULL, '21520', 7.5333, 80.6067),
(1326, 16, 'Leliambe', NULL, NULL, NULL, NULL, NULL, '21008', 7.4346, 80.6519),
(1327, 16, 'Lenadora', NULL, NULL, NULL, NULL, NULL, '21094', 7.753507, 80.660161),
(1328, 16, 'lhala Halmillewa', NULL, NULL, NULL, NULL, NULL, '50262', 7.8667, 80.6417),
(1329, 16, 'lllukkumbura', NULL, NULL, NULL, NULL, NULL, '21406', 7.5217, 80.6847),
(1330, 16, 'Madipola', NULL, NULL, NULL, NULL, NULL, '21156', 7.6833, 80.5833),
(1331, 16, 'Maduruoya', NULL, NULL, NULL, NULL, NULL, '51108', 7.696, 80.5842),
(1332, 16, 'Mahawela', NULL, NULL, NULL, NULL, NULL, '21140', 7.581804, 80.607485),
(1333, 16, 'Mananwatta', NULL, NULL, NULL, NULL, NULL, '21144', 7.685106, 80.601107),
(1334, 16, 'Maraka', NULL, NULL, NULL, NULL, NULL, '21554', 7.586801, 80.962009),
(1335, 16, 'Matale', NULL, NULL, NULL, NULL, NULL, '21000', 7.4717, 80.6244),
(1336, 16, 'Melipitiya', NULL, NULL, NULL, NULL, NULL, '21055', 7.5458, 80.5833),
(1337, 16, 'Metihakka', NULL, NULL, NULL, NULL, NULL, '21062', 7.536495, 80.654081),
(1338, 16, 'Millawana', NULL, NULL, NULL, NULL, NULL, '21154', 7.6503, 80.5772),
(1339, 16, 'Muwandeniya', NULL, NULL, NULL, NULL, NULL, '21044', 7.461452, 80.660098),
(1340, 16, 'Nalanda', NULL, NULL, NULL, NULL, NULL, '21082', 7.662487, 80.635004),
(1341, 16, 'Naula', NULL, NULL, NULL, NULL, NULL, '21090', 7.708132, 80.652321),
(1342, 16, 'Opalgala', NULL, NULL, NULL, NULL, NULL, '21076', 7.619927, 80.698338),
(1343, 16, 'Pallepola', NULL, NULL, NULL, NULL, NULL, '21152', 7.620686, 80.600466),
(1344, 16, 'Pimburattewa', NULL, NULL, NULL, NULL, NULL, '51102', 7.696, 80.5842),
(1345, 16, 'Pulastigama', NULL, NULL, NULL, NULL, NULL, '51050', 7.67, 80.565),
(1346, 16, 'Ranamuregama', NULL, NULL, NULL, NULL, NULL, '21524', 7.5333, 80.6067),
(1347, 16, 'Rattota', NULL, NULL, NULL, NULL, NULL, '21400', 7.5217, 80.6847),
(1348, 16, 'Selagama', NULL, NULL, NULL, NULL, NULL, '21058', 7.594457, 80.58381),
(1349, 16, 'Sigiriya', NULL, NULL, NULL, NULL, NULL, '21120', 7.954968, 80.755205),
(1350, 16, 'Sinhagama', NULL, NULL, NULL, NULL, NULL, '51378', 7.696, 80.5842),
(1351, 16, 'Sungavila', NULL, NULL, NULL, NULL, NULL, '51052', 7.67, 80.565),
(1352, 16, 'Talagoda Junction', NULL, NULL, NULL, NULL, NULL, '21506', 7.5722, 80.6222),
(1353, 16, 'Talakiriyagama', NULL, NULL, NULL, NULL, NULL, '21116', 7.8206, 80.6172),
(1354, 16, 'Tamankaduwa', NULL, NULL, NULL, NULL, NULL, '51089', 7.67, 80.565),
(1355, 16, 'Udasgiriya', NULL, NULL, NULL, NULL, NULL, '21051', 7.535254, 80.570342),
(1356, 16, 'Udatenna', NULL, NULL, NULL, NULL, NULL, '21006', 7.4167, 80.65),
(1357, 16, 'Ukuwela', NULL, NULL, NULL, NULL, NULL, '21300', 7.423917, 80.62996),
(1358, 16, 'Wahacotte', NULL, NULL, NULL, NULL, NULL, '21160', 7.7142, 80.5972),
(1359, 16, 'Walawela', NULL, NULL, NULL, NULL, NULL, '21048', 7.520365, 80.597403),
(1360, 16, 'Wehigala', NULL, NULL, NULL, NULL, NULL, '21009', 7.409019, 80.669112),
(1361, 16, 'Welangahawatte', NULL, NULL, NULL, NULL, NULL, '21408', 7.5217, 80.6847),
(1362, 16, 'Wewalawewa', NULL, NULL, NULL, NULL, NULL, '21114', 7.8103, 80.6669),
(1363, 16, 'Yatawatta', NULL, NULL, NULL, NULL, NULL, '21056', 7.562698, 80.578361),
(1364, 17, 'Akuressa', 'අකුරැස්ස', NULL, NULL, NULL, NULL, '81400', 6.0964, 80.4808),
(1365, 17, 'Alapaladeniya', 'අලපලදෙණිය', NULL, NULL, NULL, NULL, '81475', 6.2833, 80.45),
(1366, 17, 'Aparekka', 'අපරැක්ක', NULL, NULL, NULL, NULL, '81032', 6.008083, 80.621556),
(1367, 17, 'Athuraliya', 'අතුරලීය', NULL, NULL, NULL, NULL, '81402', 6.069724, 80.497879),
(1368, 17, 'Bengamuwa', 'බෙන්ගමුව', NULL, NULL, NULL, NULL, '81614', 6.253417, 80.59808),
(1369, 17, 'Bopagoda', 'බෝපගොඩ', NULL, NULL, NULL, NULL, '81412', 6.1561, 80.4903),
(1370, 17, 'Dampahala', 'දම්පහල', NULL, NULL, NULL, NULL, '81612', 6.259631, 80.633081),
(1371, 17, 'Deegala Lenama', 'දීගල ලෙනම', NULL, NULL, NULL, NULL, '81452', 6.2333, 80.45),
(1372, 17, 'Deiyandara', 'දෙයියන්දර', NULL, NULL, NULL, NULL, '81320', 6.152388, 80.604696),
(1373, 17, 'Denagama', 'දෙනගම', NULL, NULL, NULL, NULL, '81314', 6.11481, 80.642749),
(1374, 17, 'Denipitiya', 'දෙණිපිටිය', NULL, NULL, NULL, NULL, '81730', 5.9667, 80.45),
(1375, 17, 'Deniyaya', 'දෙණියාය', NULL, NULL, NULL, NULL, '81500', 6.339732, 80.548055),
(1376, 17, 'Derangala', 'දෙරණගල', NULL, NULL, NULL, NULL, '81454', 6.229572, 80.445492),
(1377, 17, 'Devinuwara (Dondra)', 'දෙවිනුවර (දෙවුන්දර)', NULL, NULL, NULL, NULL, '81160', 5.9319, 80.6069),
(1378, 17, 'Dikwella', 'දික්වැල්ල', NULL, NULL, NULL, NULL, '81200', 5.9667, 80.6833),
(1379, 17, 'Diyagaha', 'දියගහ', NULL, NULL, NULL, NULL, '81038', 5.9833, 80.5667),
(1380, 17, 'Diyalape', 'දියලපේ', NULL, NULL, NULL, NULL, '81422', 6.121802, 80.447911),
(1381, 17, 'Gandara', 'ගන්දර', NULL, NULL, NULL, NULL, '81170', 5.933629, 80.61575),
(1382, 17, 'Godapitiya', 'ගොඩපිටිය', NULL, NULL, NULL, NULL, '81408', 6.121801, 80.480996),
(1383, 17, 'Gomilamawarala', 'ගොමිලමවරල', NULL, NULL, NULL, NULL, '81072', 6.1833, 80.5667),
(1384, 17, 'Hawpe', NULL, NULL, NULL, NULL, NULL, '80132', 6.129973, 80.489743),
(1385, 17, 'Horapawita', NULL, NULL, NULL, NULL, NULL, '81108', 6.1167, 80.5833),
(1386, 17, 'Kalubowitiyana', NULL, NULL, NULL, NULL, NULL, '81478', 6.3167, 80.4),
(1387, 17, 'Kamburugamuwa', NULL, NULL, NULL, NULL, NULL, '81750', 5.940612, 80.496449),
(1388, 17, 'Kamburupitiya', NULL, NULL, NULL, NULL, NULL, '81100', 6.069847, 80.56473),
(1389, 17, 'Karagoda Uyangoda', NULL, NULL, NULL, NULL, NULL, '81082', 6.0715, 80.5193),
(1390, 17, 'Karaputugala', NULL, NULL, NULL, NULL, NULL, '81106', 6.07377, 80.603484),
(1391, 17, 'Karatota', NULL, NULL, NULL, NULL, NULL, '81318', 6.0667, 80.6667),
(1392, 17, 'Kekanadurra', NULL, NULL, NULL, NULL, NULL, '81020', 6.0715, 80.5193),
(1393, 17, 'Kiriweldola', NULL, NULL, NULL, NULL, NULL, '81514', 6.372272, 80.533507),
(1394, 17, 'Kiriwelkele', NULL, NULL, NULL, NULL, NULL, '81456', 6.249957, 80.451047),
(1395, 17, 'Kolawenigama', NULL, NULL, NULL, NULL, NULL, '81522', 6.321671, 80.500227),
(1396, 17, 'Kotapola', NULL, NULL, NULL, NULL, NULL, '81480', 6.292393, 80.533957),
(1397, 17, 'Lankagama', NULL, NULL, NULL, NULL, NULL, '81526', 6.35, 80.4667),
(1398, 17, 'Makandura', NULL, NULL, NULL, NULL, NULL, '81070', 6.137036, 80.571982),
(1399, 17, 'Maliduwa', NULL, NULL, NULL, NULL, NULL, '81424', 6.1333, 80.4167),
(1400, 17, 'Maramba', NULL, NULL, NULL, NULL, NULL, '81416', 6.1614, 80.5035),
(1401, 17, 'Matara', NULL, NULL, NULL, NULL, NULL, '81000', 5.9486, 80.5428),
(1402, 17, 'Mediripitiya', NULL, NULL, NULL, NULL, NULL, '81524', 6.35, 80.4667),
(1403, 17, 'Miella', NULL, NULL, NULL, NULL, NULL, '81312', 6.1167, 80.6833),
(1404, 17, 'Mirissa', NULL, NULL, NULL, NULL, NULL, '81740', 5.94679, 80.452288),
(1405, 17, 'Morawaka', NULL, NULL, NULL, NULL, NULL, '81470', 6.25, 80.4833),
(1406, 17, 'Mulatiyana Junction', NULL, NULL, NULL, NULL, NULL, '81071', 6.1833, 80.5667),
(1407, 17, 'Nadugala', NULL, NULL, NULL, NULL, NULL, '81092', 5.975464, 80.548935),
(1408, 17, 'Naimana', NULL, NULL, NULL, NULL, NULL, '81017', 6.0715, 80.5193),
(1409, 17, 'Palatuwa', NULL, NULL, NULL, NULL, NULL, '81050', 5.984516, 80.518656),
(1410, 17, 'Parapamulla', NULL, NULL, NULL, NULL, NULL, '81322', 6.150219, 80.61675),
(1411, 17, 'Pasgoda', NULL, NULL, NULL, NULL, NULL, '81615', 6.242998, 80.616175),
(1412, 17, 'Penetiyana', NULL, NULL, NULL, NULL, NULL, '81722', 6.034813, 80.450626),
(1413, 17, 'Pitabeddara', NULL, NULL, NULL, NULL, NULL, '81450', 6.2167, 80.45),
(1414, 17, 'Puhulwella', NULL, NULL, NULL, NULL, NULL, '81290', 6.045752, 80.619203),
(1415, 17, 'Radawela', NULL, NULL, NULL, NULL, NULL, '81316', 6.124672, 80.60726),
(1416, 17, 'Ransegoda', NULL, NULL, NULL, NULL, NULL, '81064', 6.0715, 80.5193),
(1417, 17, 'Rotumba', NULL, NULL, NULL, NULL, NULL, '81074', 6.229142, 80.571151),
(1418, 17, 'Sultanagoda', NULL, NULL, NULL, NULL, NULL, '81051', 5.9667, 80.5),
(1419, 17, 'Telijjawila', NULL, NULL, NULL, NULL, NULL, '81060', 6.0715, 80.5193),
(1420, 17, 'Thihagoda', NULL, NULL, NULL, NULL, NULL, '81280', 6.011602, 80.561851),
(1421, 17, 'Urubokka', NULL, NULL, NULL, NULL, NULL, '81600', 6.302863, 80.631175),
(1422, 17, 'Urugamuwa', NULL, NULL, NULL, NULL, NULL, '81230', 6.0116, 80.6437),
(1423, 17, 'Urumutta', NULL, NULL, NULL, NULL, NULL, '81414', 6.150181, 80.519582),
(1424, 17, 'Viharahena', NULL, NULL, NULL, NULL, NULL, '81508', 6.379073, 80.598006),
(1425, 17, 'Walakanda', NULL, NULL, NULL, NULL, NULL, '81294', 6.01655, 80.649889),
(1426, 17, 'Walasgala', NULL, NULL, NULL, NULL, NULL, '81220', 5.981913, 80.693678),
(1427, 17, 'Waralla', NULL, NULL, NULL, NULL, NULL, '81479', 6.277439, 80.522519),
(1428, 17, 'Weligama', NULL, NULL, NULL, NULL, NULL, '81700', 5.9667, 80.4167),
(1429, 17, 'Wilpita', NULL, NULL, NULL, NULL, NULL, '81404', 6.1, 80.5167),
(1430, 17, 'Yatiyana', NULL, NULL, NULL, NULL, NULL, '81034', 6.028888, 80.603158),
(1431, 18, 'Ayiwela', NULL, NULL, NULL, NULL, NULL, '91516', 7.1, 81.2333),
(1432, 18, 'Badalkumbura', 'බඩල්කුඹුර', NULL, NULL, NULL, NULL, '91070', 6.893287, 81.234346),
(1433, 18, 'Baduluwela', 'බදුලුවෙල', NULL, NULL, NULL, NULL, '91058', 7.11307, 81.435299),
(1434, 18, 'Bakinigahawela', 'බකිණිගහවෙල', NULL, NULL, NULL, NULL, '91554', 6.9333, 81.2833),
(1435, 18, 'Balaharuwa', 'බලහරුව', NULL, NULL, NULL, NULL, '91295', 6.520177, 81.058519),
(1436, 18, 'Bibile', 'බිබිලේ', NULL, NULL, NULL, NULL, '91500', 7.1667, 81.2167),
(1437, 18, 'Buddama', 'බුද්ධගම', NULL, NULL, NULL, NULL, '91038', 7.046413, 81.486844),
(1438, 18, 'Buttala', 'බුත්තල', NULL, NULL, NULL, NULL, '91100', 6.75, 81.2333),
(1439, 18, 'Dambagalla', 'දඹගල්ල', NULL, NULL, NULL, NULL, '91050', 6.955743, 81.375946),
(1440, 18, 'Diyakobala', 'දියකොබල', NULL, NULL, NULL, NULL, '91514', 7.1056, 81.2222),
(1441, 18, 'Dombagahawela', 'දොඹගහවෙල', NULL, NULL, NULL, NULL, '91010', 6.898197, 81.441375),
(1442, 18, 'Ethimalewewa', 'ඇතිමලේවැව', NULL, NULL, NULL, NULL, '91020', 6.9216, 81.3833),
(1443, 18, 'Ettiliwewa', 'ඇත්තිලිවැව', NULL, NULL, NULL, NULL, '91250', 6.73, 81.12),
(1444, 18, 'Galabedda', 'ගලබැද්ද', NULL, NULL, NULL, NULL, '91008', 6.9167, 81.3833),
(1445, 18, 'Gamewela', 'ගමේවැල', NULL, NULL, NULL, NULL, '90512', 6.9167, 81.2),
(1446, 18, 'Hambegamuwa', 'හම්බෙගමුව', NULL, NULL, NULL, NULL, '91308', 6.503718, 80.874695),
(1447, 18, 'Hingurukaduwa', NULL, NULL, NULL, NULL, NULL, '90508', 6.817257, 81.153429),
(1448, 18, 'Hulandawa', NULL, NULL, NULL, NULL, NULL, '91004', 6.868479, 81.333215),
(1449, 18, 'Inginiyagala', NULL, NULL, NULL, NULL, NULL, '91040', 7.198617, 81.494496),
(1450, 18, 'Kandaudapanguwa', NULL, NULL, NULL, NULL, NULL, '91032', 6.9667, 81.5167),
(1451, 18, 'Kandawinna', NULL, NULL, NULL, NULL, NULL, '91552', 6.9333, 81.2833),
(1452, 18, 'Kataragama', NULL, NULL, NULL, NULL, NULL, '91400', 6.4167, 81.3333),
(1453, 18, 'Kotagama', NULL, NULL, NULL, NULL, NULL, '91512', 7.116448, 81.17788),
(1454, 18, 'Kotamuduna', NULL, NULL, NULL, NULL, NULL, '90506', 6.892542, 81.177651),
(1455, 18, 'Kotawehera Mankada', NULL, NULL, NULL, NULL, NULL, '91312', 6.4636, 81.053),
(1456, 18, 'Kudawewa', NULL, NULL, NULL, NULL, NULL, '61226', 6.4167, 81.0333),
(1457, 18, 'Kumbukkana', NULL, NULL, NULL, NULL, NULL, '91098', 6.814795, 81.274913),
(1458, 18, 'Marawa', NULL, NULL, NULL, NULL, NULL, '91006', 6.805944, 81.381458),
(1459, 18, 'Mariarawa', NULL, NULL, NULL, NULL, NULL, '91052', 6.975969, 81.481047),
(1460, 18, 'Medagana', NULL, NULL, NULL, NULL, NULL, '91550', 6.9333, 81.2833),
(1461, 18, 'Medawelagama', NULL, NULL, NULL, NULL, NULL, '90518', 6.9167, 81.2),
(1462, 18, 'Miyanakandura', NULL, NULL, NULL, NULL, NULL, '90584', 6.869169, 81.152967),
(1463, 18, 'Monaragala', NULL, NULL, NULL, NULL, NULL, '91000', 6.8667, 81.35),
(1464, 18, 'Moretuwegama', NULL, NULL, NULL, NULL, NULL, '91108', 6.75, 81.2333),
(1465, 18, 'Nakkala', NULL, NULL, NULL, NULL, NULL, '91003', 6.887816, 81.306082),
(1466, 18, 'Namunukula', NULL, NULL, NULL, NULL, NULL, '90580', 6.8667, 81.1167),
(1467, 18, 'Nannapurawa', NULL, NULL, NULL, NULL, NULL, '91519', 7.0833, 81.25),
(1468, 18, 'Nelliyadda', NULL, NULL, NULL, NULL, NULL, '91042', 7.389929, 81.408141),
(1469, 18, 'Nilgala', NULL, NULL, NULL, NULL, NULL, '91508', 7.215945, 81.312806),
(1470, 18, 'Obbegoda', NULL, NULL, NULL, NULL, NULL, '91007', 6.8786, 81.3476),
(1471, 18, 'Okkampitiya', NULL, NULL, NULL, NULL, NULL, '91060', 6.753201, 81.29752),
(1472, 18, 'Pangura', NULL, NULL, NULL, NULL, NULL, '91002', 6.9833, 81.3167),
(1473, 18, 'Pitakumbura', NULL, NULL, NULL, NULL, NULL, '91505', 7.191575, 81.27524),
(1474, 18, 'Randeniya', NULL, NULL, NULL, NULL, NULL, '91204', 6.803474, 81.1119),
(1475, 18, 'Ruwalwela', NULL, NULL, NULL, NULL, NULL, '91056', 7.017476, 81.386203),
(1476, 18, 'Sella Kataragama', NULL, NULL, NULL, NULL, NULL, '91405', 6.4167, 81.3333),
(1477, 18, 'Siyambalagune', NULL, NULL, NULL, NULL, NULL, '91202', 6.8, 81.1333),
(1478, 18, 'Siyambalanduwa', NULL, NULL, NULL, NULL, NULL, '91030', 6.910581, 81.552112),
(1479, 18, 'Suriara', NULL, NULL, NULL, NULL, NULL, '91306', 6.4636, 81.053),
(1480, 18, 'Tanamalwila', NULL, NULL, NULL, NULL, NULL, '91300', 6.4333, 81.1333),
(1481, 18, 'Uva Gangodagama', NULL, NULL, NULL, NULL, NULL, '91054', 7.0056, 81.4222),
(1482, 18, 'Uva Kudaoya', NULL, NULL, NULL, NULL, NULL, '91298', 6.75, 81.2),
(1483, 18, 'Uva Pelwatta', NULL, NULL, NULL, NULL, NULL, '91112', 6.75, 81.2333),
(1484, 18, 'Warunagama', NULL, NULL, NULL, NULL, NULL, '91198', 6.75, 81.2333),
(1485, 18, 'Wedikumbura', NULL, NULL, NULL, NULL, NULL, '91005', 6.8333, 81.3833),
(1486, 18, 'Weherayaya Handapanagala', NULL, NULL, NULL, NULL, NULL, '91206', 6.7778, 81.1167),
(1487, 18, 'Wellawaya', NULL, NULL, NULL, NULL, NULL, '91200', 6.719458, 81.106295),
(1488, 18, 'Wilaoya', NULL, NULL, NULL, NULL, NULL, '91022', 6.9216, 81.3833),
(1489, 18, 'Yudaganawa', NULL, NULL, NULL, NULL, NULL, '51424', 6.776882, 81.229725),
(1490, 19, 'Mullativu', NULL, NULL, NULL, NULL, NULL, '42000', 9.266667, 80.816667),
(1491, 20, 'Agarapathana', 'ආගරපතන', NULL, NULL, NULL, NULL, '22094', 6.824224, 80.709671),
(1492, 20, 'Ambatalawa', 'අඹතලාව', NULL, NULL, NULL, NULL, '20686', 7.05, 80.6667),
(1493, 20, 'Ambewela', 'අඹේවෙල', NULL, NULL, NULL, NULL, '22216', 6.899935, 80.783603),
(1494, 20, 'Bogawantalawa', 'බොගවන්තලාව', NULL, NULL, NULL, NULL, '22060', 6.8, 80.6833),
(1495, 20, 'Bopattalawa', 'බෝපත්තලාව', NULL, NULL, NULL, NULL, '22095', 6.9011, 80.6694),
(1496, 20, 'Dagampitiya', 'දාගම්පිටිය', NULL, NULL, NULL, NULL, '20684', 6.977604, 80.466144),
(1497, 20, 'Dayagama Bazaar', 'දයගම බසාර්', NULL, NULL, NULL, NULL, '22096', 6.9011, 80.6694),
(1498, 20, 'Dikoya', 'දික්ඔය', NULL, NULL, NULL, NULL, '22050', 6.8786, 80.6272),
(1499, 20, 'Doragala', 'දොරගල', NULL, NULL, NULL, NULL, '20567', 7.0731, 80.5892),
(1500, 20, 'Dunukedeniya', 'දුනුකෙදෙණිය', NULL, NULL, NULL, NULL, '22002', 6.982643, 80.632911),
(1501, 20, 'Egodawela', 'එගොඩවෙල', NULL, NULL, NULL, NULL, '90013', 7.024081, 80.662636),
(1502, 20, 'Ekiriya', 'ඇකිරිය', NULL, NULL, NULL, NULL, '20732', 7.148834, 80.757167),
(1503, 20, 'Elamulla', 'ඇලමුල්ල', NULL, NULL, NULL, NULL, '20742', 7.0833, 80.8),
(1504, 20, 'Ginigathena', 'ගිනිගතැන', NULL, NULL, NULL, NULL, '20680', 6.9864, 80.4894),
(1505, 20, 'Gonakele', 'ගොනාකැලේ', NULL, NULL, NULL, NULL, '22226', 6.9917, 80.8194),
(1506, 20, 'Haggala', 'හග්ගල', NULL, NULL, NULL, NULL, '22208', 6.9697, 80.77),
(1507, 20, 'Halgranoya', 'හාල්ගරනඔය', NULL, NULL, NULL, NULL, '22240', 7.0417, 80.8917),
(1508, 20, 'Hangarapitiya', NULL, NULL, NULL, NULL, NULL, '22044', 6.932637, 80.464959),
(1509, 20, 'Hapugastalawa', NULL, NULL, NULL, NULL, NULL, '20668', 7.0667, 80.5667),
(1510, 20, 'Harasbedda', NULL, NULL, NULL, NULL, NULL, '22262', 7.04738, 80.876477),
(1511, 20, 'Hatton', NULL, NULL, NULL, NULL, NULL, '22000', 6.899356, 80.599855),
(1512, 20, 'Hewaheta', NULL, NULL, NULL, NULL, NULL, '20440', 7.1108, 80.7547),
(1513, 20, 'Hitigegama', NULL, NULL, NULL, NULL, NULL, '22046', 6.947521, 80.457154),
(1514, 20, 'Jangulla', NULL, NULL, NULL, NULL, NULL, '90063', 7.0333, 80.8917),
(1515, 20, 'Kalaganwatta', NULL, NULL, NULL, NULL, NULL, '22282', 7.104232, 80.902715),
(1516, 20, 'Kandapola', NULL, NULL, NULL, NULL, NULL, '22220', 6.981495, 80.802798),
(1517, 20, 'Karandagolla', NULL, NULL, NULL, NULL, NULL, '20738', 7.057024, 80.899844),
(1518, 20, 'Keerthi Bandarapura', NULL, NULL, NULL, NULL, NULL, '22274', 7.1108, 80.8581),
(1519, 20, 'Kiribathkumbura', NULL, NULL, NULL, NULL, NULL, '20442', 7.1108, 80.7547),
(1520, 20, 'Kotiyagala', NULL, NULL, NULL, NULL, NULL, '91024', 6.784171, 80.68557),
(1521, 20, 'Kotmale', NULL, NULL, NULL, NULL, NULL, '20560', 7.0214, 80.5942),
(1522, 20, 'Kottellena', NULL, NULL, NULL, NULL, NULL, '22040', 6.893287, 80.50215),
(1523, 20, 'Kumbalgamuwa', NULL, NULL, NULL, NULL, NULL, '22272', 7.109883, 80.853852),
(1524, 20, 'Kumbukwela', NULL, NULL, NULL, NULL, NULL, '22246', 7.055729, 80.887479),
(1525, 20, 'Kurupanawela', NULL, NULL, NULL, NULL, NULL, '22252', 7.01894, 80.920981),
(1526, 20, 'Labukele', NULL, NULL, NULL, NULL, NULL, '20592', 7.0442, 80.6919),
(1527, 20, 'Laxapana', NULL, NULL, NULL, NULL, NULL, '22034', 6.8952, 80.5088),
(1528, 20, 'Lindula', NULL, NULL, NULL, NULL, NULL, '22090', 6.920326, 80.684129),
(1529, 20, 'Madulla', NULL, NULL, NULL, NULL, NULL, '22256', 7.047667, 80.918204),
(1530, 20, 'Mandaram Nuwara', NULL, NULL, NULL, NULL, NULL, '20744', 7.0833, 80.8),
(1531, 20, 'Maskeliya', NULL, NULL, NULL, NULL, NULL, '22070', 6.831379, 80.568585),
(1532, 20, 'Maswela', NULL, NULL, NULL, NULL, NULL, '20566', 7.072503, 80.6439),
(1533, 20, 'Maturata', NULL, NULL, NULL, NULL, NULL, '20748', 7.0833, 80.8),
(1534, 20, 'Mipanawa', NULL, NULL, NULL, NULL, NULL, '22254', 7.0333, 80.9167),
(1535, 20, 'Mipilimana', NULL, NULL, NULL, NULL, NULL, '22214', 6.8667, 80.8167),
(1536, 20, 'Morahenagama', NULL, NULL, NULL, NULL, NULL, '22036', 6.942625, 80.478482),
(1537, 20, 'Munwatta', NULL, NULL, NULL, NULL, NULL, '20752', 7.11534, 80.809403),
(1538, 20, 'Nayapana Janapadaya', NULL, NULL, NULL, NULL, NULL, '20568', 7.0731, 80.5892),
(1539, 20, 'Nildandahinna', NULL, NULL, NULL, NULL, NULL, '22280', 7.0833, 80.8833),
(1540, 20, 'Nissanka Uyana', NULL, NULL, NULL, NULL, NULL, '22075', 6.8358, 80.5703),
(1541, 20, 'Norwood', NULL, NULL, NULL, NULL, NULL, '22058', 6.835736, 80.602181),
(1542, 20, 'Nuwara Eliya', NULL, NULL, NULL, NULL, NULL, '22200', 6.9697, 80.77),
(1543, 20, 'Padiyapelella', NULL, NULL, NULL, NULL, NULL, '20750', 7.092506, 80.798544),
(1544, 20, 'Pallebowala', NULL, NULL, NULL, NULL, NULL, '20734', 7.1151, 80.8108),
(1545, 20, 'Panvila', NULL, NULL, NULL, NULL, NULL, '20830', 7.0667, 80.6833),
(1546, 20, 'Pitawala', NULL, NULL, NULL, NULL, NULL, '20682', 6.998608, 80.452257),
(1547, 20, 'Pundaluoya', NULL, NULL, NULL, NULL, NULL, '22120', 7.018255, 80.676081),
(1548, 20, 'Ramboda', NULL, NULL, NULL, NULL, NULL, '20590', 7.060427, 80.69534),
(1549, 20, 'Rikillagaskada', NULL, NULL, NULL, NULL, NULL, '20730', 7.145849, 80.78095),
(1550, 20, 'Rozella', NULL, NULL, NULL, NULL, NULL, '22008', 6.9306, 80.5531),
(1551, 20, 'Rupaha', NULL, NULL, NULL, NULL, NULL, '22245', 7.0333, 80.9),
(1552, 20, 'Ruwaneliya', NULL, NULL, NULL, NULL, NULL, '22212', 6.93721, 80.772258),
(1553, 20, 'Santhipura', NULL, NULL, NULL, NULL, NULL, '22202', 6.9697, 80.77),
(1554, 20, 'Talawakele', NULL, NULL, NULL, NULL, NULL, '22100', 6.9367, 80.6611),
(1555, 20, 'Tawalantenna', NULL, NULL, NULL, NULL, NULL, '20838', 7.0667, 80.6833),
(1556, 20, 'Teripeha', NULL, NULL, NULL, NULL, NULL, '22287', 7.1189, 80.9244),
(1557, 20, 'Udamadura', NULL, NULL, NULL, NULL, NULL, '22285', 7.094106, 80.914817),
(1558, 20, 'Udapussallawa', NULL, NULL, NULL, NULL, NULL, '22250', 7.0333, 80.9111),
(1559, 20, 'Uva Deegalla', NULL, NULL, NULL, NULL, NULL, '90062', 7.0333, 80.8917),
(1560, 20, 'Uva Uduwara', NULL, NULL, NULL, NULL, NULL, '90061', 7.0333, 80.8917),
(1561, 20, 'Uvaparanagama', NULL, NULL, NULL, NULL, NULL, '90230', 6.8832, 80.7912),
(1562, 20, 'Walapane', NULL, NULL, NULL, NULL, NULL, '22270', 7.091924, 80.860522),
(1563, 20, 'Watawala', NULL, NULL, NULL, NULL, NULL, '22010', 6.951339, 80.533199),
(1564, 20, 'Widulipura', NULL, NULL, NULL, NULL, NULL, '22032', 6.8952, 80.5088),
(1565, 20, 'Wijebahukanda', NULL, NULL, NULL, NULL, NULL, '22018', 7.0167, 80.6167),
(1566, 21, 'Attanakadawala', 'අත්තනගඩවල', NULL, NULL, NULL, NULL, '51235', 7.903734, 80.828104),
(1567, 21, 'Bakamuna', 'බකමූණ', NULL, NULL, NULL, NULL, '51250', 7.7833, 80.8167),
(1568, 21, 'Diyabeduma', 'දියබෙදුම', NULL, NULL, NULL, NULL, '51225', 7.89851, 80.898332),
(1569, 21, 'Elahera', 'ඇලහැර', NULL, NULL, NULL, NULL, '51258', 7.7244, 80.7883),
(1570, 21, 'Giritale', 'ගිරිතලේ', NULL, NULL, NULL, NULL, '51026', 7.9833, 80.9333),
(1571, 21, 'Hingurakdamana', NULL, NULL, NULL, NULL, NULL, '51408', 8.055896, 81.011875),
(1572, 21, 'Hingurakgoda', NULL, NULL, NULL, NULL, NULL, '51400', 8.036505, 80.948686),
(1573, 21, 'Jayanthipura', NULL, NULL, NULL, NULL, NULL, '51024', 8, 81),
(1574, 21, 'Kalingaela', NULL, NULL, NULL, NULL, NULL, '51002', 7.9583, 81.0417),
(1575, 21, 'Lakshauyana', NULL, NULL, NULL, NULL, NULL, '51006', 7.9583, 81.0417),
(1576, 21, 'Mankemi', NULL, NULL, NULL, NULL, NULL, '30442', 7.9833, 81.25),
(1577, 21, 'Minneriya', NULL, NULL, NULL, NULL, NULL, '51410', 8.036343, 80.903215),
(1578, 21, 'Onegama', NULL, NULL, NULL, NULL, NULL, '51004', 7.992203, 81.090758),
(1579, 21, 'Orubendi Siyambalawa', NULL, NULL, NULL, NULL, NULL, '51256', 7.751972, 80.812093),
(1580, 21, 'Palugasdamana', NULL, NULL, NULL, NULL, NULL, '51046', 8.0167, 81.0833),
(1581, 21, 'Panichankemi', NULL, NULL, NULL, NULL, NULL, '30444', 7.9833, 81.25),
(1582, 21, 'Polonnaruwa', NULL, NULL, NULL, NULL, NULL, '51000', 7.940295, 81.007138),
(1583, 21, 'Talpotha', NULL, NULL, NULL, NULL, NULL, '51044', 8.0167, 81.0833),
(1584, 21, 'Tambala', NULL, NULL, NULL, NULL, NULL, '51049', 8.0167, 81.0833),
(1585, 21, 'Unagalavehera', NULL, NULL, NULL, NULL, NULL, '51008', 8.001006, 80.995549),
(1586, 21, 'Wijayabapura', NULL, NULL, NULL, NULL, NULL, '51042', 8.0167, 81.0833),
(1587, 22, 'Adippala', NULL, NULL, NULL, NULL, NULL, '61012', 7.5833, 79.8417),
(1588, 22, 'Alutgama', 'අළුත්ගම', NULL, NULL, NULL, NULL, '12080', 7.7667, 79.9333),
(1589, 22, 'Alutwewa', 'අළුත්වැව', NULL, NULL, NULL, NULL, '51014', 7.8667, 79.95),
(1590, 22, 'Ambakandawila', 'අඹකඳවිල', NULL, NULL, NULL, NULL, '61024', 7.5333, 79.8),
(1591, 22, 'Anamaduwa', 'ආනමඩුව', NULL, NULL, NULL, NULL, '61500', 7.881625, 80.00353),
(1592, 22, 'Andigama', 'අඬිගම', NULL, NULL, NULL, NULL, '61508', 7.7775, 79.9528),
(1593, 22, 'Angunawila', 'අඟුණවිල', NULL, NULL, NULL, NULL, '61264', 7.7667, 79.85),
(1594, 22, 'Attawilluwa', 'අත්තවිල්ලුව', NULL, NULL, NULL, NULL, '61328', 7.4167, 79.8833),
(1595, 22, 'Bangadeniya', 'බංගදෙණිය', NULL, NULL, NULL, NULL, '61238', 7.619471, 79.809055),
(1596, 22, 'Baranankattuwa', 'බරණන්කට්ටුව', NULL, NULL, NULL, NULL, '61262', 7.803253, 79.872624),
(1597, 22, 'Battuluoya', 'බත්තුලුඔය', NULL, NULL, NULL, NULL, '61246', 7.734655, 79.817455),
(1598, 22, 'Bujjampola', 'බුජ්ජම්පොල', NULL, NULL, NULL, NULL, '61136', 7.3333, 79.9),
(1599, 22, 'Chilaw', 'හලාවත', NULL, NULL, NULL, NULL, '61000', 7.5758, 79.7953),
(1600, 22, 'Dalukana', 'දලුකන', NULL, NULL, NULL, NULL, '51092', 7.3167, 79.85),
(1601, 22, 'Dankotuwa', 'දංකොටුව', NULL, NULL, NULL, NULL, '61130', 7.300443, 79.88505),
(1602, 22, 'Dewagala', 'දේවගල', NULL, NULL, NULL, NULL, '51094', 7.3167, 79.85),
(1603, 22, 'Dummalasuriya', 'දුම්මලසූරිය', NULL, NULL, NULL, NULL, '60260', 7.4833, 79.9),
(1604, 22, 'Dunkannawa', 'දුන්කන්නාව', NULL, NULL, NULL, NULL, '61192', 7.4167, 79.9),
(1605, 22, 'Eluwankulama', 'එළුවන්කුලම', NULL, NULL, NULL, NULL, '61308', 8.332832, 79.859928),
(1606, 22, 'Ettale', 'ඇත්තලේ', NULL, NULL, NULL, NULL, '61343', 8.097416, 79.717306),
(1607, 22, 'Galamuna', 'ගලමුන', NULL, NULL, NULL, NULL, '51416', 7.464661, 79.872371),
(1608, 22, 'Galmuruwa', 'ගල්මුරුව', NULL, NULL, NULL, NULL, '61233', 7.501718, 79.895774),
(1609, 22, 'Hansayapalama', NULL, NULL, NULL, NULL, NULL, '51098', 7.3167, 79.85),
(1610, 22, 'Ihala Kottaramulla', NULL, NULL, NULL, NULL, NULL, '61154', 7.383069, 79.871755),
(1611, 22, 'Ilippadeniya', NULL, NULL, NULL, NULL, NULL, '61018', 7.567036, 79.826233),
(1612, 22, 'Inginimitiya', NULL, NULL, NULL, NULL, NULL, '61514', 7.964099, 80.112055),
(1613, 22, 'Ismailpuram', NULL, NULL, NULL, NULL, NULL, '61302', 8.0333, 79.8167),
(1614, 22, 'Jayasiripura', NULL, NULL, NULL, NULL, NULL, '51246', 7.6333, 79.8167),
(1615, 22, 'Kakkapalliya', NULL, NULL, NULL, NULL, NULL, '61236', 7.5333, 79.8267),
(1616, 22, 'Kalkudah', NULL, NULL, NULL, NULL, NULL, '30410', 8.1167, 79.7167),
(1617, 22, 'Kalladiya', NULL, NULL, NULL, NULL, NULL, '61534', 7.95, 79.9333),
(1618, 22, 'Kandakuliya', NULL, NULL, NULL, NULL, NULL, '61358', 7.98, 79.9569),
(1619, 22, 'Karathivu', NULL, NULL, NULL, NULL, NULL, '61307', 8.192511, 79.832662),
(1620, 22, 'Karawitagara', NULL, NULL, NULL, NULL, NULL, '61022', 7.572417, 79.86173),
(1621, 22, 'Karuwalagaswewa', NULL, NULL, NULL, NULL, NULL, '61314', 8.037625, 79.94267),
(1622, 22, 'Katuneriya', NULL, NULL, NULL, NULL, NULL, '61180', 7.3667, 79.8333),
(1623, 22, 'Koswatta', NULL, NULL, NULL, NULL, NULL, '61158', 7.3667, 79.9),
(1624, 22, 'Kottantivu', NULL, NULL, NULL, NULL, NULL, '61252', 7.85, 79.7833),
(1625, 22, 'Kottapitiya', NULL, NULL, NULL, NULL, NULL, '51244', 7.63568, 79.815394),
(1626, 22, 'Kottukachchiya', NULL, NULL, NULL, NULL, NULL, '61532', 7.938617, 79.954577),
(1627, 22, 'Kumarakattuwa', NULL, NULL, NULL, NULL, NULL, '61032', 7.661964, 79.886873),
(1628, 22, 'Kurinjanpitiya', NULL, NULL, NULL, NULL, NULL, '61356', 7.98, 79.9569),
(1629, 22, 'Kuruketiyawa', NULL, NULL, NULL, NULL, NULL, '61516', 8.0167, 80.05),
(1630, 22, 'Lunuwila', NULL, NULL, NULL, NULL, NULL, '61150', 7.350819, 79.85725),
(1631, 22, 'Madampe', NULL, NULL, NULL, NULL, NULL, '61230', 7.5, 79.8333),
(1632, 22, 'Madurankuliya', NULL, NULL, NULL, NULL, NULL, '61270', 7.896391, 79.836449),
(1633, 22, 'Mahakumbukkadawala', NULL, NULL, NULL, NULL, NULL, '61272', 7.85, 79.9),
(1634, 22, 'Mahauswewa', NULL, NULL, NULL, NULL, NULL, '61512', 7.9575, 80.0683),
(1635, 22, 'Mampitiya', NULL, NULL, NULL, NULL, NULL, '51090', 7.3167, 79.85),
(1636, 22, 'Mampuri', NULL, NULL, NULL, NULL, NULL, '61341', 7.9964, 79.7411),
(1637, 22, 'Mangalaeliya', NULL, NULL, NULL, NULL, NULL, '61266', 7.775, 79.85),
(1638, 22, 'Marawila', NULL, NULL, NULL, NULL, NULL, '61210', 7.4094, 79.8322),
(1639, 22, 'Mudalakkuliya', NULL, NULL, NULL, NULL, NULL, '61506', 7.799533, 79.977428),
(1640, 22, 'Mugunuwatawana', NULL, NULL, NULL, NULL, NULL, '61014', 7.58487, 79.854684),
(1641, 22, 'Mukkutoduwawa', NULL, NULL, NULL, NULL, NULL, '61274', 7.928236, 79.75648),
(1642, 22, 'Mundel', NULL, NULL, NULL, NULL, NULL, '61250', 7.7958, 79.8283),
(1643, 22, 'Muttibendiwila', NULL, NULL, NULL, NULL, NULL, '61195', 7.45, 79.8833),
(1644, 22, 'Nainamadama', NULL, NULL, NULL, NULL, NULL, '61120', 7.3714, 79.8837),
(1645, 22, 'Nalladarankattuwa', NULL, NULL, NULL, NULL, NULL, '61244', 7.689152, 79.844243),
(1646, 22, 'Nattandiya', NULL, NULL, NULL, NULL, NULL, '61190', 7.4086, 79.8683),
(1647, 22, 'Nawagattegama', NULL, NULL, NULL, NULL, NULL, '61520', 8, 80.1167),
(1648, 22, 'Nelumwewa', NULL, NULL, NULL, NULL, NULL, '51096', 7.3167, 79.85),
(1649, 22, 'Norachcholai', NULL, NULL, NULL, NULL, NULL, '61342', 7.9964, 79.7411),
(1650, 22, 'Pallama', NULL, NULL, NULL, NULL, NULL, '61040', 7.681225, 79.918239),
(1651, 22, 'Palliwasalturai', NULL, NULL, NULL, NULL, NULL, '61354', 7.98, 79.9569),
(1652, 22, 'Panirendawa', NULL, NULL, NULL, NULL, NULL, '61234', 7.542426, 79.886377),
(1653, 22, 'Parakramasamudraya', NULL, NULL, NULL, NULL, NULL, '51016', 7.8667, 79.95),
(1654, 22, 'Pothuwatawana', NULL, NULL, NULL, NULL, NULL, '61162', 7.4833, 79.9),
(1655, 22, 'Puttalam', NULL, NULL, NULL, NULL, NULL, '61300', 8.043613, 79.841209),
(1656, 22, 'Puttalam Cement Factory', NULL, NULL, NULL, NULL, NULL, '61326', 7.4167, 79.8833),
(1657, 22, 'Rajakadaluwa', NULL, NULL, NULL, NULL, NULL, '61242', 7.650515, 79.828283),
(1658, 22, 'Saliyawewa Junction', NULL, NULL, NULL, NULL, NULL, '61324', 7.4167, 79.8833),
(1659, 22, 'Serukele', NULL, NULL, NULL, NULL, NULL, '61042', 7.7333, 79.9167),
(1660, 22, 'Siyambalagashene', NULL, NULL, NULL, NULL, NULL, '61504', 7.8239, 79.978),
(1661, 22, 'Tabbowa', NULL, NULL, NULL, NULL, NULL, '61322', 7.4167, 79.8833),
(1662, 22, 'Talawila Church', NULL, NULL, NULL, NULL, NULL, '61344', 7.9964, 79.7411),
(1663, 22, 'Toduwawa', NULL, NULL, NULL, NULL, NULL, '61224', 7.4861, 79.8022),
(1664, 22, 'Udappuwa', NULL, NULL, NULL, NULL, NULL, '61004', 7.5758, 79.7953),
(1665, 22, 'Uridyawa', NULL, NULL, NULL, NULL, NULL, '61502', 7.8239, 79.978),
(1666, 22, 'Vanathawilluwa', NULL, NULL, NULL, NULL, NULL, '61306', 8.17001, 79.8461),
(1667, 22, 'Waikkal', NULL, NULL, NULL, NULL, NULL, '61110', 7.2833, 79.85),
(1668, 22, 'Watugahamulla', NULL, NULL, NULL, NULL, NULL, '61198', 7.4667, 79.9),
(1669, 22, 'Wennappuwa', NULL, NULL, NULL, NULL, NULL, '61170', 7.35048, 79.850112),
(1670, 22, 'Wijeyakatupotha', NULL, NULL, NULL, NULL, NULL, '61006', 7.5758, 79.7953),
(1671, 22, 'Wilpotha', NULL, NULL, NULL, NULL, NULL, '61008', 7.5758, 79.7953),
(1672, 22, 'Yodaela', NULL, NULL, NULL, NULL, NULL, '51422', 7.5833, 79.8667),
(1673, 22, 'Yogiyana', NULL, NULL, NULL, NULL, NULL, '61144', 7.286035, 79.924213),
(1674, 23, 'Akarella', 'අකරැල්ල', NULL, NULL, NULL, NULL, '70082', 6.59053, 80.644197),
(1675, 23, 'Amunumulla', 'අමුනුමුල්ල', NULL, NULL, NULL, NULL, '90204', 6.7333, 80.75),
(1676, 23, 'Atakalanpanna', 'අටකලන්පන්න', NULL, NULL, NULL, NULL, '70294', 6.5333, 80.6),
(1677, 23, 'Ayagama', 'අයගම', NULL, NULL, NULL, NULL, '70024', 6.63662, 80.317329),
(1678, 23, 'Balangoda', 'බලන්ගොඩ', NULL, NULL, NULL, NULL, '70100', 6.661743, 80.69371),
(1679, 23, 'Batatota', 'බටතොට', NULL, NULL, NULL, NULL, '70504', 6.8333, 80.3667),
(1680, 23, 'Beralapanathara', 'බෙරලපනතර', NULL, NULL, NULL, NULL, '81541', 6.4521, 80.4894),
(1681, 23, 'Bogahakumbura', 'බෝගහකුඹුර', NULL, NULL, NULL, NULL, '90354', 6.6833, 80.7667),
(1682, 23, 'Bolthumbe', 'බොල්තුඹෙ', NULL, NULL, NULL, NULL, '70131', 6.739114, 80.664956),
(1683, 23, 'Bomluwageaina', NULL, NULL, NULL, NULL, NULL, '70344', 6.4, 80.6333),
(1684, 23, 'Bowalagama', 'බෝවලගම', NULL, NULL, NULL, NULL, '82458', 6.3917, 80.6833),
(1685, 23, 'Bulutota', 'බුලුතොට', NULL, NULL, NULL, NULL, '70346', 6.4333, 80.65),
(1686, 23, 'Dambuluwana', 'දඹුලුවාන', NULL, NULL, NULL, NULL, '70019', 6.7167, 80.3333),
(1687, 23, 'Daugala', 'දවුගල', NULL, NULL, NULL, NULL, '70455', 6.4901, 80.4248),
(1688, 23, 'Dela', 'දෙල', NULL, NULL, NULL, NULL, '70042', 6.6258, 80.4486),
(1689, 23, 'Delwala', 'දෙල්වල', NULL, NULL, NULL, NULL, '70046', 6.513055, 80.473993),
(1690, 23, 'Dodampe', 'දොඩම්පෙ', NULL, NULL, NULL, NULL, '70017', 6.73603, 80.301105),
(1691, 23, 'Doloswalakanda', 'දොලොස්වලකන්ද', NULL, NULL, NULL, NULL, '70404', 6.55133, 80.470258),
(1692, 23, 'Dumbara Manana', 'දුම්බර මනන', NULL, NULL, NULL, NULL, '70495', 6.680322, 80.247485),
(1693, 23, 'Eheliyagoda', 'ඇහැළියගොඩ', NULL, NULL, NULL, NULL, '70600', 6.85, 80.2667),
(1694, 23, 'Ekamutugama', 'එකමුතුගම', NULL, NULL, NULL, NULL, '70254', 6.3406, 80.7804),
(1695, 23, 'Elapatha', 'ඇලපාත', NULL, NULL, NULL, NULL, '70032', 6.66081, 80.366828),
(1696, 23, 'Ellagawa', 'ඇල්ලගාව', NULL, NULL, NULL, NULL, '70492', 6.5687, 80.363),
(1697, 23, 'Ellaulla', '', NULL, NULL, NULL, NULL, '70552', 6.8583, 80.3083),
(1698, 23, 'Ellawala', 'ඇල්ලවල', NULL, NULL, NULL, NULL, '70606', 6.809945, 80.259547),
(1699, 23, 'Embilipitiya', 'ඇඹිලිපිටිය', NULL, NULL, NULL, NULL, '70200', 6.3439, 80.8489),
(1700, 23, 'Eratna', 'එරත්න', NULL, NULL, NULL, NULL, '70506', 6.7986, 80.3784),
(1701, 23, 'Erepola', 'එරෙපොල', NULL, NULL, NULL, NULL, '70602', 6.804277, 80.242773),
(1702, 23, 'Gabbela', 'ගබ්බෙල', NULL, NULL, NULL, NULL, '70156', 6.7167, 80.35),
(1703, 23, 'Gangeyaya', 'ගන්ගෙයාය', NULL, NULL, NULL, NULL, '70195', 6.7516, 80.5927),
(1704, 23, 'Gawaragiriya', 'ගවරගිරිය', NULL, NULL, NULL, NULL, '70026', 6.6422, 80.2667),
(1705, 23, 'Gillimale', 'ගිලීමලේ', NULL, NULL, NULL, NULL, '70002', 6.729, 80.4415),
(1706, 23, 'Godakawela', 'ගොඩකවැල', NULL, NULL, NULL, NULL, '70160', 6.505599, 80.647268),
(1707, 23, 'Gurubewilagama', 'ගුරුබෙවිලගම', NULL, NULL, NULL, NULL, '70136', 6.7, 80.5667),
(1708, 23, 'Halwinna', 'හල්වින්න', NULL, NULL, NULL, NULL, '70171', 6.6833, 80.7167),
(1709, 23, 'Handagiriya', 'හඳගිරිය', NULL, NULL, NULL, NULL, '70106', 6.562839, 80.780347),
(1710, 23, 'Hatangala', NULL, NULL, NULL, NULL, NULL, '70105', 6.532527, 80.739407),
(1711, 23, 'Hatarabage', NULL, NULL, NULL, NULL, NULL, '70108', 6.65, 80.75),
(1712, 23, 'Hewanakumbura', NULL, NULL, NULL, NULL, NULL, '90358', 6.6833, 80.7667),
(1713, 23, 'Hidellana', NULL, NULL, NULL, NULL, NULL, '70012', 6.7192, 80.3842),
(1714, 23, 'Hiramadagama', NULL, NULL, NULL, NULL, NULL, '70296', 6.533544, 80.60045),
(1715, 23, 'Horewelagoda', NULL, NULL, NULL, NULL, NULL, '82456', 6.3917, 80.6833),
(1716, 23, 'Ittakanda', NULL, NULL, NULL, NULL, NULL, '70342', 6.403532, 80.636458),
(1717, 23, 'Kahangama', NULL, NULL, NULL, NULL, NULL, '70016', 6.704217, 80.362927),
(1718, 23, 'Kahawatta', NULL, NULL, NULL, NULL, NULL, '70150', 6.708145, 80.303805),
(1719, 23, 'Kalawana', NULL, NULL, NULL, NULL, NULL, '70450', 6.531595, 80.407285),
(1720, 23, 'Kaltota', NULL, NULL, NULL, NULL, NULL, '70122', 6.6833, 80.6833),
(1721, 23, 'Kalubululanda', NULL, NULL, NULL, NULL, NULL, '90352', 6.6833, 80.7667),
(1722, 23, 'Kananke Bazaar', NULL, NULL, NULL, NULL, NULL, '80136', 6.7361, 80.4354),
(1723, 23, 'Kandepuhulpola', NULL, NULL, NULL, NULL, NULL, '90356', 6.6833, 80.7667),
(1724, 23, 'Karandana', NULL, NULL, NULL, NULL, NULL, '70488', 6.77254, 80.206883),
(1725, 23, 'Karangoda', NULL, NULL, NULL, NULL, NULL, '70018', 6.677224, 80.368723),
(1726, 23, 'Kella Junction', NULL, NULL, NULL, NULL, NULL, '70352', 6.4, 80.6833),
(1727, 23, 'Keppetipola', NULL, NULL, NULL, NULL, NULL, '90350', 6.6833, 80.7667),
(1728, 23, 'Kiriella', NULL, NULL, NULL, NULL, NULL, '70480', 6.753583, 80.265838),
(1729, 23, 'Kiriibbanwewa', NULL, NULL, NULL, NULL, NULL, '70252', 6.3406, 80.7804),
(1730, 23, 'Kolambageara', NULL, NULL, NULL, NULL, NULL, '70180', 6.7516, 80.5927),
(1731, 23, 'Kolombugama', NULL, NULL, NULL, NULL, NULL, '70403', 6.5667, 80.4833),
(1732, 23, 'Kolonna', NULL, NULL, NULL, NULL, NULL, '70350', 6.404095, 80.681552),
(1733, 23, 'Kudawa', NULL, NULL, NULL, NULL, NULL, '70005', 6.757336, 80.504485),
(1734, 23, 'Kuruwita', NULL, NULL, NULL, NULL, NULL, '70500', 6.7792, 80.3686),
(1735, 23, 'Lellopitiya', NULL, NULL, NULL, NULL, NULL, '70056', 6.655172, 80.471348),
(1736, 23, 'lmaduwa', NULL, NULL, NULL, NULL, NULL, '80130', 6.7361, 80.4354),
(1737, 23, 'lmbulpe', NULL, NULL, NULL, NULL, NULL, '70134', 6.7159, 80.6375),
(1738, 23, 'Mahagama Colony', NULL, NULL, NULL, NULL, NULL, '70256', 6.3406, 80.7804),
(1739, 23, 'Mahawalatenna', NULL, NULL, NULL, NULL, NULL, '70112', 6.5833, 80.75),
(1740, 23, 'Makandura Sabara', NULL, NULL, NULL, NULL, NULL, '70298', 6.5333, 80.6),
(1741, 23, 'Malwala Junction', NULL, NULL, NULL, NULL, NULL, '70001', 6.7, 80.4333),
(1742, 23, 'Malwatta', NULL, NULL, NULL, NULL, NULL, '32198', 6.65, 80.4167),
(1743, 23, 'Matuwagalagama', NULL, NULL, NULL, NULL, NULL, '70482', 6.7667, 80.2333),
(1744, 23, 'Medagalatur', NULL, NULL, NULL, NULL, NULL, '70021', 6.6414, 80.2882),
(1745, 23, 'Meddekanda', NULL, NULL, NULL, NULL, NULL, '70127', 6.6833, 80.6833),
(1746, 23, 'Minipura Dumbara', NULL, NULL, NULL, NULL, NULL, '70494', 6.5687, 80.363),
(1747, 23, 'Mitipola', NULL, NULL, NULL, NULL, NULL, '70604', 6.836923, 80.221949),
(1748, 23, 'Moragala Kirillapone', NULL, NULL, NULL, NULL, NULL, '81532', 6.8333, 80.3),
(1749, 23, 'Morahela', NULL, NULL, NULL, NULL, NULL, '70129', 6.679967, 80.691531),
(1750, 23, 'Mulendiyawala', NULL, NULL, NULL, NULL, NULL, '70212', 6.291657, 80.760239),
(1751, 23, 'Mulgama', NULL, NULL, NULL, NULL, NULL, '70117', 6.645942, 80.817832),
(1752, 23, 'Nawalakanda', NULL, NULL, NULL, NULL, NULL, '70469', 6.5167, 80.3333),
(1753, 23, 'NawinnaPinnakanda', NULL, NULL, NULL, NULL, NULL, '70165', 6.7168, 80.4999),
(1754, 23, 'Niralagama', NULL, NULL, NULL, NULL, NULL, '70038', 6.65, 80.3667),
(1755, 23, 'Nivitigala', NULL, NULL, NULL, NULL, NULL, '70400', 6.6, 80.4553),
(1756, 23, 'Omalpe', NULL, NULL, NULL, NULL, NULL, '70215', 6.327391, 80.694691),
(1757, 23, 'Opanayaka', NULL, NULL, NULL, NULL, NULL, '70080', 6.608359, 80.625134),
(1758, 23, 'Padalangala', NULL, NULL, NULL, NULL, NULL, '70230', 6.244961, 80.916029),
(1759, 23, 'Pallebedda', NULL, NULL, NULL, NULL, NULL, '70170', 6.45, 80.7333),
(1760, 23, 'Pallekanda', NULL, NULL, NULL, NULL, NULL, '82454', 6.6333, 80.6667),
(1761, 23, 'Pambagolla', NULL, NULL, NULL, NULL, NULL, '70133', 6.7333, 80.6833),
(1762, 23, 'Panamura', NULL, NULL, NULL, NULL, NULL, '70218', 6.351417, 80.776404),
(1763, 23, 'Panapola', NULL, NULL, NULL, NULL, NULL, '70461', 6.425337, 80.445421),
(1764, 23, 'Paragala', NULL, NULL, NULL, NULL, NULL, '81474', 6.601317, 80.343575),
(1765, 23, 'Parakaduwa', NULL, NULL, NULL, NULL, NULL, '70550', 6.825482, 80.299049),
(1766, 23, 'Pebotuwa', NULL, NULL, NULL, NULL, NULL, '70045', 6.540192, 80.452191),
(1767, 23, 'Pelmadulla', NULL, NULL, NULL, NULL, NULL, '70070', 6.620071, 80.542243),
(1768, 23, 'Pinnawala', NULL, NULL, NULL, NULL, NULL, '70130', 6.731251, 80.672146),
(1769, 23, 'Pothdeniya', NULL, NULL, NULL, NULL, NULL, '81538', 6.8333, 80.3),
(1770, 23, 'Rajawaka', NULL, NULL, NULL, NULL, NULL, '70116', 6.609347, 80.797987),
(1771, 23, 'Ranwala', NULL, NULL, NULL, NULL, NULL, '70162', 6.553121, 80.665495),
(1772, 23, 'Rassagala', NULL, NULL, NULL, NULL, NULL, '70135', 6.695227, 80.617304),
(1773, 23, 'Ratgama', NULL, NULL, NULL, NULL, NULL, '80260', 6.7333, 80.4833),
(1774, 23, 'Ratna Hangamuwa', NULL, NULL, NULL, NULL, NULL, '70036', 6.65, 80.3667),
(1775, 23, 'Ratnapura', NULL, NULL, NULL, NULL, NULL, '70000', 6.677603, 80.405592),
(1776, 23, 'Sewanagala', NULL, NULL, NULL, NULL, NULL, '70250', 6.3406, 80.7804),
(1777, 23, 'Sri Palabaddala', NULL, NULL, NULL, NULL, NULL, '70004', 6.800198, 80.476202),
(1778, 23, 'Sudagala', NULL, NULL, NULL, NULL, NULL, '70502', 6.7833, 80.4),
(1779, 23, 'Talakolahinna', NULL, NULL, NULL, NULL, NULL, '70101', 6.5844, 80.7332),
(1780, 23, 'Tanjantenna', NULL, NULL, NULL, NULL, NULL, '70118', 6.6361, 80.8536),
(1781, 23, 'Teppanawa', NULL, NULL, NULL, NULL, NULL, '70512', 6.75, 80.3167),
(1782, 23, 'Tunkama', NULL, NULL, NULL, NULL, NULL, '70205', 6.2833, 80.8833),
(1783, 23, 'Udakarawita', NULL, NULL, NULL, NULL, NULL, '70044', 6.7317, 80.4287),
(1784, 23, 'Udaniriella', NULL, NULL, NULL, NULL, NULL, '70034', 6.65, 80.3667),
(1785, 23, 'Udawalawe', NULL, NULL, NULL, NULL, NULL, '70190', 6.7516, 80.5927),
(1786, 23, 'Ullinduwawa', NULL, NULL, NULL, NULL, NULL, '70345', 6.367322, 80.631196),
(1787, 23, 'Veddagala', NULL, NULL, NULL, NULL, NULL, '70459', 6.45, 80.4333),
(1788, 23, 'Vijeriya', NULL, NULL, NULL, NULL, NULL, '70348', 6.4, 80.6333),
(1789, 23, 'Waleboda', NULL, NULL, NULL, NULL, NULL, '70138', 6.726367, 80.64106),
(1790, 23, 'Watapotha', NULL, NULL, NULL, NULL, NULL, '70408', 6.577958, 80.510709),
(1791, 23, 'Waturawa', NULL, NULL, NULL, NULL, NULL, '70456', 6.4833, 80.4333),
(1792, 23, 'Weligepola', NULL, NULL, NULL, NULL, NULL, '70104', 6.567212, 80.707078),
(1793, 23, 'Welipathayaya', NULL, NULL, NULL, NULL, NULL, '70124', 6.6833, 80.6833),
(1794, 23, 'Wikiliya', NULL, NULL, NULL, NULL, NULL, '70114', 6.6203, 80.7467),
(1795, 24, 'Agbopura', 'අග්බෝපුර', NULL, NULL, NULL, NULL, '31304', 8.330575, 80.97191),
(1796, 24, 'Buckmigama', 'බක්මීගම', NULL, NULL, NULL, NULL, '31028', 8.6667, 80.95),
(1797, 24, 'China Bay', 'චීන වරාය', NULL, NULL, NULL, NULL, '31050', 8.561664, 81.187386),
(1798, 24, 'Dehiwatte', 'දෙහිවත්ත', NULL, NULL, NULL, NULL, '31226', 8.4458, 81.2875),
(1799, 24, 'Echchilampattai', 'එච්චිලම්පට්ටෙයි', NULL, NULL, NULL, NULL, '31236', 8.4458, 81.2875),
(1800, 24, 'Galmetiyawa', 'ගල්මැටියාව', NULL, NULL, NULL, NULL, '31318', 8.3683, 81.0281),
(1801, 24, 'Gomarankadawala', 'ගෝමරන්කඩවල', NULL, NULL, NULL, NULL, '31026', 8.677731, 80.960417),
(1802, 24, 'Kaddaiparichchan', NULL, NULL, NULL, NULL, NULL, '31212', 8.459198, 81.278164),
(1803, 24, 'Kallar', NULL, NULL, NULL, NULL, NULL, '30250', 8.2833, 81.2667),
(1804, 24, 'Kanniya', NULL, NULL, NULL, NULL, NULL, '31032', 8.6333, 81.0167),
(1805, 24, 'Kantalai', NULL, NULL, NULL, NULL, NULL, '31300', 8.365483, 80.966897),
(1806, 24, 'Kantalai Sugar Factory', NULL, NULL, NULL, NULL, NULL, '31306', 8.3683, 81.0281),
(1807, 24, 'Kiliveddy', NULL, NULL, NULL, NULL, NULL, '31220', 8.354092, 81.275605);
INSERT INTO `cities` (`id`, `district_id`, `name_en`, `name_si`, `name_ta`, `sub_name_en`, `sub_name_si`, `sub_name_ta`, `postcode`, `latitude`, `longitude`) VALUES
(1808, 24, 'Kinniya', NULL, NULL, NULL, NULL, NULL, '31100', 8.497717, 81.179214),
(1809, 24, 'Kuchchaveli', NULL, NULL, NULL, NULL, NULL, '31014', 8.792709, 81.036113),
(1810, 24, 'Kumburupiddy', NULL, NULL, NULL, NULL, NULL, '31012', 8.7333, 81.15),
(1811, 24, 'Kurinchakemy', NULL, NULL, NULL, NULL, NULL, '31112', 8.4989, 81.1897),
(1812, 24, 'Lankapatuna', NULL, NULL, NULL, NULL, NULL, '31234', 8.4458, 81.2875),
(1813, 24, 'Mahadivulwewa', NULL, NULL, NULL, NULL, NULL, '31036', 8.613863, 80.9518),
(1814, 24, 'Maharugiramam', NULL, NULL, NULL, NULL, NULL, '31106', 8.4989, 81.1897),
(1815, 24, 'Mallikativu', NULL, NULL, NULL, NULL, NULL, '31224', 8.4458, 81.2875),
(1816, 24, 'Mawadichenai', NULL, NULL, NULL, NULL, NULL, '31238', 8.4458, 81.2875),
(1817, 24, 'Mullipothana', NULL, NULL, NULL, NULL, NULL, '31312', 8.3683, 81.0281),
(1818, 24, 'Mutur', NULL, NULL, NULL, NULL, NULL, '31200', 8.45, 81.2667),
(1819, 24, 'Neelapola', NULL, NULL, NULL, NULL, NULL, '31228', 8.4458, 81.2875),
(1820, 24, 'Nilaveli', 'නිලාවැලි', NULL, NULL, NULL, NULL, '31010', 8.658756, 81.148516),
(1821, 24, 'Pankulam', NULL, NULL, NULL, NULL, NULL, '31034', 8.6333, 81.0167),
(1822, 24, 'Pulmoddai', 'පුල්මුඩේ', NULL, NULL, NULL, NULL, '50567', 8.9333, 80.9833),
(1823, 24, 'Rottawewa', NULL, NULL, NULL, NULL, NULL, '31038', 8.6333, 81.0167),
(1824, 24, 'Sampaltivu', NULL, NULL, NULL, NULL, NULL, '31006', 8.6167, 81.2),
(1825, 24, 'Sampoor', 'සාම්පූර්', NULL, NULL, NULL, NULL, '31216', 8.493354, 81.284828),
(1826, 24, 'Serunuwara', 'සේනුවර', NULL, NULL, NULL, NULL, '31232', 8.4458, 81.2875),
(1827, 24, 'Seruwila', 'සේරුවිල', NULL, NULL, NULL, NULL, '31260', 8.4458, 81.2875),
(1828, 24, 'Sirajnagar', NULL, NULL, NULL, NULL, NULL, '31314', 8.3683, 81.0281),
(1829, 24, 'Somapura', 'සෝමපුර', NULL, NULL, NULL, NULL, '31222', 8.4458, 81.2875),
(1830, 24, 'Tampalakamam', NULL, NULL, NULL, NULL, NULL, '31046', 8.4925, 81.0964),
(1831, 24, 'Thuraineelavanai', NULL, NULL, NULL, NULL, NULL, '30254', 8.2833, 81.2667),
(1832, 24, 'Tiriyayi', NULL, NULL, NULL, NULL, NULL, '31016', 8.7444, 81.15),
(1833, 24, 'Toppur', NULL, NULL, NULL, NULL, NULL, '31250', 8.4, 81.3167),
(1834, 24, 'Trincomalee', 'තිරිකුණාමලය', NULL, NULL, NULL, NULL, '31000', 8.5667, 81.2333),
(1835, 24, 'Wanela', NULL, NULL, NULL, NULL, NULL, '31308', 8.3683, 81.0281),
(1836, 25, 'Vavuniya', 'වව්නියාව', NULL, NULL, NULL, NULL, '43000', 8.758818, 80.493461),
(1837, 5, 'Colombo 1', 'කොළඹ 1', 'கொழும்பு 1', 'Fort', 'කොටුව', 'கோட்டை', '100', 6.925833, 79.841667),
(1838, 5, 'Colombo 3', 'කොළඹ 3', 'கொழும்பு 3', 'Colpetty', 'කොල්ලුපිටිය', 'கொள்ளுபிட்டி', '300', 6.900556, 79.853333),
(1839, 5, 'Colombo 4', 'කොළඹ 4', 'கொழும்பு 4', 'Bambalapitiya', 'බම්බලපිටිය', 'பம்பலப்பிட்டி', '400', 6.888889, 79.856667),
(1840, 5, 'Colombo 5', 'කොළඹ 5', 'கொழும்பு 5', 'Havelock Town', 'තිඹිරිගස්යාය', 'ஹெவ்லொக் நகரம்', '500', 6.879444, 79.865278),
(1841, 5, 'Colombo 7', 'කොළඹ 7', 'கொழும்பு 7', 'Cinnamon Gardens', 'කුරුඳු වත්ත', 'கறுவாத் தோட்டம்', '700', 6.906667, 79.863333),
(1842, 5, 'Colombo 9', 'කොළඹ 9', 'கொழும்பு 9', 'Dematagoda', 'දෙමටගොඩ', 'தெமட்டகொடை', '900', 6.93, 79.877778),
(1843, 5, 'Colombo 10', 'කොළඹ 10', 'கொழும்பு 10', 'Maradana', 'මරදාන', 'மருதானை', '1000', 6.928333, 79.864167),
(1844, 5, 'Colombo 11', 'කොළඹ 11', 'கொழும்பு 11', 'Pettah', 'පිට කොටුව', 'புறக் கோட்டை', '1100', 6.936667, 79.849722),
(1845, 5, 'Colombo 12', 'කොළඹ 12', 'கொழும்பு 12', 'Hulftsdorp', 'අලුත් කඩේ', 'புதுக்கடை', '1200', 6.9425, 79.858333),
(1846, 5, 'Colombo 14', 'කොළඹ 14', 'கொழும்பு 14', 'Grandpass', 'ග්‍රන්ඩ්පාස්', 'பாலத்துறை', '1400', 6.9475, 79.874722);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `province_id` int(2) NOT NULL,
  `name_en` varchar(45) DEFAULT NULL,
  `name_si` varchar(45) DEFAULT NULL,
  `name_ta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `url`, `province_id`, `name_en`, `name_si`, `name_ta`) VALUES
(1, 'ampara', 6, 'Ampara', 'අම්පාර', 'அம்பாறை'),
(2, 'anuradhapura', 8, 'Anuradhapura', 'අනුරාධපුරය', 'அனுராதபுரம்'),
(3, 'badulla', 7, 'Badulla', 'බදුල්ල', 'பதுளை'),
(4, 'batticaloa', 6, 'Batticaloa', 'මඩකලපුව', 'மட்டக்களப்பு'),
(5, 'colombo', 1, 'Colombo', 'කොළඹ', 'கொழும்பு'),
(6, 'galle', 3, 'Galle', 'ගාල්ල', 'காலி'),
(7, 'gampaha', 1, 'Gampaha', 'ගම්පහ', 'கம்பஹா'),
(8, 'hambantota', 3, 'Hambantota', 'හම්බන්තොට', 'அம்பாந்தோட்டை'),
(9, 'jaffna', 9, 'Jaffna', 'යාපනය', 'யாழ்ப்பாணம்'),
(10, 'kalutara', 1, 'Kalutara', 'කළුතර', 'களுத்துறை'),
(11, 'kandy', 2, 'Kandy', 'මහනුවර', 'கண்டி'),
(12, 'kegalle', 5, 'Kegalle', 'කෑගල්ල', 'கேகாலை'),
(13, 'kilinochchi', 9, 'Kilinochchi', 'කිලිනොච්චිය', 'கிளிநொச்சி'),
(14, 'kurunegala', 4, 'Kurunegala', 'කුරුණෑගල', 'குருணாகல்'),
(15, 'mannar', 9, 'Mannar', 'මන්නාරම', 'மன்னார்'),
(16, 'matale', 2, 'Matale', 'මාතලේ', 'மாத்தளை'),
(17, 'matara', 3, 'Matara', 'මාතර', 'மாத்தறை'),
(18, 'monaragala', 7, 'Monaragala', 'මොණරාගල', 'மொணராகலை'),
(19, 'mullaitivu', 9, 'Mullaitivu', 'මුලතිව්', 'முல்லைத்தீவு'),
(20, 'nuwara-eliya', 2, 'Nuwara Eliya', 'නුවර එළිය', 'நுவரேலியா'),
(21, 'polonnaruwa', 8, 'Polonnaruwa', 'පොළොන්නරුව', 'பொலன்னறுவை'),
(22, 'puttalam', 4, 'Puttalam', 'පුත්තලම', 'புத்தளம்'),
(23, 'ratnapura', 5, 'Ratnapura', 'රත්නපුර', 'இரத்தினபுரி'),
(24, 'trincomalee', 6, 'Trincomalee', 'ත්‍රිකුණාමලය', 'திருகோணமலை'),
(25, 'vavuniya', 9, 'Vavuniya', 'වව්නියාව', 'வவுனியா');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2015_04_12_000000_create_orchid_users_table', 1),
(4, '2015_10_19_214424_create_orchid_roles_table', 1),
(5, '2015_10_19_214425_create_orchid_role_users_table', 1),
(6, '2016_08_07_125128_create_orchid_attachmentstable_table', 1),
(7, '2017_09_17_125801_create_notifications_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2024_05_02_095934_create_properties', 1),
(15, '2024_05_03_070653_create_property_type', 1),
(16, '2024_05_03_084028_create_payments_table', 1),
(17, '2024_05_03_084530_create_bookings_table', 1),
(18, '2024_05_02_102718_create_point_transactions', 2),
(19, '2024_05_14_130809_create_point_prices_table', 2),
(21, '2018_08_08_100000_create_telescope_entries_table', 3),
(22, '2024_05_14_130915_create_point_storts_table', 4),
(24, '2024_05_02_083639_create_reviews', 5),
(25, '2024_05_28_999999_add_active_status_to_users', 6),
(26, '2024_05_28_999999_add_avatar_to_users', 6),
(27, '2024_05_28_999999_add_dark_mode_to_users', 6),
(28, '2024_05_28_999999_add_messenger_color_to_users', 6),
(31, '2024_05_29_999999_add_active_status_to_users', 7),
(32, '2024_05_29_999999_add_avatar_to_users', 7),
(33, '2024_05_29_999999_add_dark_mode_to_users', 7),
(34, '2024_05_29_999999_add_messenger_color_to_users', 7),
(35, '2024_06_04_999999_add_active_status_to_users', 8),
(36, '2024_06_04_999999_add_avatar_to_users', 8),
(37, '2024_06_04_999999_add_dark_mode_to_users', 8),
(38, '2024_06_04_999999_add_messenger_color_to_users', 8),
(39, '2024_06_04_999999_create_chatify_favorites_table', 9),
(40, '2024_06_04_999999_create_chatify_messages_table', 10),
(44, '2024_06_06_092914_create_room_types_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PointPrice`
--

CREATE TABLE `PointPrice` (
  `id` int(11) NOT NULL,
  `point_count` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `currency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `PointPrice`
--

INSERT INTO `PointPrice` (`id`, `point_count`, `price`, `currency`) VALUES
(1, '1', '1', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `pointStorts`
--

CREATE TABLE `pointStorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `point_count` varchar(255) DEFAULT NULL,
  `locked_points` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pointStorts`
--

INSERT INTO `pointStorts` (`id`, `user_id`, `point_count`, `locked_points`, `created_at`, `updated_at`) VALUES
(1, 22, '100', NULL, '2024-05-31 04:05:56', '2024-06-04 01:56:31'),
(4, 21, '2', NULL, '2024-06-04 01:54:35', '2024-06-04 01:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `point_prices`
--

CREATE TABLE `point_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point_count` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_transactions`
--

CREATE TABLE `point_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED DEFAULT NULL,
  `to` bigint(20) UNSIGNED DEFAULT NULL,
  `point_count` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `discount_percentage` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `donations` int(1) NOT NULL DEFAULT 0,
  `selling_status` int(1) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_transactions`
--

INSERT INTO `point_transactions` (`id`, `from`, `to`, `point_count`, `discount_amount`, `discount_percentage`, `amount`, `donations`, `selling_status`, `description`, `transaction_date`, `status`, `created_at`, `updated_at`) VALUES
(15, 22, 21, '1', '0', '0', '0', 1, 0, NULL, '2024-06-03 10:15:14', 1, '2024-06-03 04:45:14', '2024-06-03 04:45:14'),
(16, 22, 21, '1', '0', '0', '0', 1, 0, NULL, '2024-06-04 07:24:35', 1, '2024-06-04 01:54:35', '2024-06-04 01:54:35'),
(17, 22, 21, '1', '0', '0', '0', 1, 0, NULL, '2024-06-04 07:26:31', 1, '2024-06-04 01:56:31', '2024-06-04 01:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `review_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `facilities` varchar(255) DEFAULT NULL,
  `open_for_booking` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `whatsapp_numner` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `tiktok_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `added_user` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `main_location` int(11) DEFAULT NULL,
  `sub_location` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `name`, `type`, `email`, `review_id`, `description`, `facilities`, `open_for_booking`, `image`, `contact_number`, `whatsapp_numner`, `facebook_link`, `tiktok_link`, `linkedin_link`, `instagram_link`, `twitter_link`, `status`, `added_user`, `created_at`, `updated_at`, `main_location`, `sub_location`, `address`) VALUES
(5, 22, 'The Kingsbury Colombo', 1, 'kingsbury@gmail.com', 0, NULL, NULL, 0, '', '0815680880', NULL, 'https://orchid.software/en/docs/modals/', NULL, NULL, NULL, NULL, 1, '19', '2024-05-08 05:11:10', '2024-06-06 03:30:32', 2, 4, '319C2 munwathugoda danthure'),
(15, 22, 'asasf', 2, 'pascasfxvxcvindud@gmail.com', 0, NULL, '', 1, '', '0815680880', NULL, NULL, NULL, NULL, NULL, NULL, 2, '19', '2024-06-06 02:04:02', '2024-06-06 03:34:20', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', 1, NULL, NULL),
(2, 'Villa', 1, NULL, NULL),
(3, 'Guest House\n', 1, NULL, NULL),
(4, 'Holiday Bungalow\n', 1, NULL, NULL),
(5, 'Home Stay\n', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_si` varchar(255) NOT NULL,
  `name_ta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `sub_property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `review_date` datetime DEFAULT NULL,
  `text` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `property_id`, `user_id`, `guest_id`, `booking_id`, `sub_property_id`, `review_date`, `text`, `status`, `created_at`, `updated_at`, `publish_date`) VALUES
(1, 5, '21', NULL, NULL, 3, '2024-05-29 10:51:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2024-05-16 05:21:07', '2024-06-03 23:39:24', '2024-06-04 05:09:24'),
(15, 5, '22', 21, NULL, 3, '2024-06-04 05:09:24', 'egrgerg', 1, '2024-06-03 23:39:24', '2024-06-03 23:39:24', '2024-06-04 05:09:24'),
(16, 5, '22', 21, NULL, 3, '2024-06-04 12:18:29', 'test test', 1, '2024-06-04 06:48:29', '2024-06-04 01:31:07', '2024-06-04 07:01:07'),
(17, 5, '21', NULL, NULL, 3, '2024-06-04 07:01:07', 'jbabsdabsd rukshan', 1, '2024-06-04 01:31:07', '2024-06-04 01:31:07', '2024-06-04 07:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Root', '{\"role.permissions\":\"1\",\"user.create.permissions\":\"1\",\"user.delete.permissions\":\"1\",\"user.edite.permissions\":\"1\",\"user.update_password.permissions\":\"1\",\"user.verification.permissions\":\"1\",\"user.view.permissions\":\"1\",\"point.donations.permissions\":\"1\",\"point.Sell.permissions\":\"1\",\"point.permissions\":\"1\",\"review.reply.permissions\":\"0\",\"review.show.hidden.permissions\":\"1\",\"review.permissions\":\"1\",\"property.admin_create.permissions\":\"1\",\"property.approve.permissions\":\"1\",\"property.create.permissions\":\"1\",\"property.delete.permissions\":\"1\",\"property.edite.permissions\":\"1\",\"property.suspend.permissions\":\"1\",\"property.view.permissions\":\"1\",\"property.status.permissions\":\"1\",\"platform.index\":\"1\",\"platform.systems.attachment\":\"1\"}', '2024-05-08 04:49:52', '2024-06-03 01:44:09'),
(2, 'superadmin', 'Super Admin', '{\"role.permissions\":\"0\",\"user.create.permissions\":\"1\",\"user.delete.permissions\":\"1\",\"user.edite.permissions\":\"1\",\"user.update_password.permissions\":\"0\",\"user.verification.permissions\":\"1\",\"user.view.permissions\":\"1\",\"point.donations.permissions\":\"1\",\"point.Sell.permissions\":\"1\",\"point.permissions\":\"1\",\"review.reply.permissions\":\"0\",\"review.show.hidden.permissions\":\"1\",\"review.permissions\":\"1\",\"property.admin_create.permissions\":\"1\",\"property.approve.permissions\":\"1\",\"property.create.permissions\":\"0\",\"property.delete.permissions\":\"0\",\"property.edite.permissions\":\"1\",\"property.suspend.permissions\":\"1\",\"property.view.permissions\":\"1\",\"property.status.permissions\":\"0\",\"platform.index\":\"1\",\"platform.systems.attachment\":\"1\"}', '2024-05-08 04:50:21', '2024-05-28 02:34:13'),
(9, 'admin', 'Admin', '{\"role.permissions\":\"0\",\"user.create.permissions\":\"0\",\"user.delete.permissions\":\"0\",\"user.edite.permissions\":\"0\",\"user.update_password.permissions\":\"0\",\"user.verification.permissions\":\"0\",\"user.view.permissions\":\"1\",\"point.donations.permissions\":\"1\",\"point.Sell.permissions\":\"1\",\"point.permissions\":\"1\",\"review.reply.permissions\":\"0\",\"review.show.hidden.permissions\":\"1\",\"review.permissions\":\"1\",\"property.admin_create.permissions\":\"1\",\"property.approve.permissions\":\"0\",\"property.create.permissions\":\"0\",\"property.delete.permissions\":\"0\",\"property.edite.permissions\":\"0\",\"property.suspend.permissions\":\"0\",\"property.view.permissions\":\"1\",\"property.status.permissions\":\"0\",\"platform.index\":\"1\",\"platform.systems.attachment\":\"1\"}', '2024-05-08 05:04:31', '2024-05-28 02:34:06'),
(10, 'property-owner', 'Property Owner', '{\"role.permissions\":\"0\",\"user.create.permissions\":\"0\",\"user.delete.permissions\":\"0\",\"user.edite.permissions\":\"0\",\"user.update_password.permissions\":\"0\",\"user.verification.permissions\":\"0\",\"user.view.permissions\":\"0\",\"point.donations.permissions\":\"1\",\"point.Sell.permissions\":\"1\",\"point.permissions\":\"1\",\"review.reply.permissions\":\"1\",\"review.show.hidden.permissions\":\"0\",\"review.permissions\":\"1\",\"property.admin_create.permissions\":\"0\",\"property.approve.permissions\":\"0\",\"property.create.permissions\":\"1\",\"property.delete.permissions\":\"1\",\"property.edite.permissions\":\"1\",\"property.suspend.permissions\":\"0\",\"property.view.permissions\":\"1\",\"property.status.permissions\":\"1\",\"platform.index\":\"1\",\"platform.systems.attachment\":\"0\"}', '2024-05-08 05:05:10', '2024-05-28 02:34:21'),
(11, 'user', 'User', '{\"role.permissions\":\"0\",\"user.create.permissions\":\"0\",\"user.delete.permissions\":\"0\",\"user.edite.permissions\":\"0\",\"user.update_password.permissions\":\"0\",\"user.verification.permissions\":\"0\",\"user.view.permissions\":\"0\",\"point.donations.permissions\":\"1\",\"point.Sell.permissions\":\"1\",\"point.permissions\":\"1\",\"review.reply.permissions\":\"1\",\"review.show.hidden.permissions\":\"0\",\"review.permissions\":\"1\",\"property.admin_create.permissions\":\"0\",\"property.approve.permissions\":\"0\",\"property.create.permissions\":\"0\",\"property.delete.permissions\":\"0\",\"property.edite.permissions\":\"0\",\"property.suspend.permissions\":\"0\",\"property.view.permissions\":\"0\",\"property.status.permissions\":\"0\",\"platform.index\":\"1\",\"platform.systems.attachment\":\"0\"}', '2024-05-08 05:05:19', '2024-06-03 01:45:34'),
(12, 'worker', 'Worker', '{\"role.permissions\":\"0\",\"user.create.permissions\":\"0\",\"user.delete.permissions\":\"0\",\"user.edite.permissions\":\"0\",\"user.update_password.permissions\":\"0\",\"user.verification.permissions\":\"0\",\"user.view.permissions\":\"0\",\"property.admin_create.permissions\":\"0\",\"property.approve.permissions\":\"0\",\"property.create.permissions\":\"0\",\"property.delete.permissions\":\"0\",\"property.edite.permissions\":\"0\",\"property.suspend.permissions\":\"0\",\"property.view.permissions\":\"0\",\"property.status.permissions\":\"0\",\"platform.index\":\"1\",\"platform.systems.attachment\":\"1\"}', '2024-05-17 01:16:47', '2024-05-17 01:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`) VALUES
(19, 1),
(20, 2),
(21, 11),
(22, 10),
(23, 10),
(24, 12);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `room_size` varchar(255) DEFAULT NULL,
  `bathroom_facilities` varchar(255) DEFAULT NULL,
  `bathroom_count` varchar(255) DEFAULT NULL,
  `washroom_count` varchar(255) DEFAULT NULL,
  `kitchen_count` varchar(255) DEFAULT NULL,
  `kitchen_facilities` varchar(255) DEFAULT NULL,
  `disription` text DEFAULT NULL,
  `property_type` int(11) DEFAULT NULL,
  `room_facilities` varchar(255) DEFAULT NULL,
  `view_facilities` varchar(255) DEFAULT NULL,
  `smoking` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `images`, `room_size`, `bathroom_facilities`, `bathroom_count`, `washroom_count`, `kitchen_count`, `kitchen_facilities`, `disription`, `property_type`, `room_facilities`, `view_facilities`, `smoking`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Deluxe Room with Bath tub', '\"17183493553.png,171834935530.png,\"', '22', '', '0', '0', '0', '', 'Fitted with marble flooring, this room comes with a wardrobe, flat-screen cable TV and a minibar. Includes a private bathroom with a separate shower area.', 5, '', '', 0, 1, '2024-06-14 01:45:55', '2024-06-14 01:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `batch_id` char(36) NOT NULL,
  `family_hash` varchar(255) DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `br_image` varchar(500) DEFAULT NULL,
  `nic_or_passport_front_image` varchar(500) DEFAULT NULL,
  `nic_or_passport_back_image` varchar(500) DEFAULT NULL,
  `profile_verified` int(11) NOT NULL DEFAULT 0,
  `nic_or_passport_number` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `main_location` int(11) DEFAULT NULL,
  `sub_location` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `service` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `url`, `role`, `email`, `password`, `mobile_number`, `br_image`, `nic_or_passport_front_image`, `nic_or_passport_back_image`, `profile_verified`, `nic_or_passport_number`, `profile_image`, `main_location`, `sub_location`, `address`, `service`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `permissions`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(19, 'root', 'root', 'root', 'root@root.com', '$2y$12$WOG7pcjUrpiMJfLiAsDUo.kLlLsN/cn.sUCKnl/KsBuWBnSx30V/S', NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'CbQeimkfU1mW1SeKaQtWmLRubxzSImq9qA14L8sgMVxZHiKL4yrQXcG3uxbO', '2024-05-08 04:48:42', '2024-05-29 00:16:04', '{\"role.permissions\":true,\"user.create.permissions\":true,\"user.edite.permissions\":true,\"user.view.permissions\":true,\"user.delete.permissions\":true,\"property.create.permissions\":true,\"property.edite.permissions\":true,\"property.status.permissions\":true,\"property.admin_create.permissions\":true,\"property.view.permissions\":true,\"property.delete.permissions\":true,\"platform.index\":true,\"platform.systems.attachment\":true}', 1, '993393a7-d7c4-4f5f-9c10-35b1490ba398.jpg', 1, '#2180f3'),
(20, 'Super Admin', 'super-admin', 'super-admin', 'superadmin@gmail.com', '$2y$12$TUPVz2m/f10aH0XmJLsBieSwI5mh4VRSnwa0dWIoCHMROyNHaBTra', NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'oufUd3wTGVvL7fTXbbGTEYxTHkzXIXN43onrjQZSqQMvUEmambHYINjMj50R', '2024-05-08 04:58:38', '2024-05-10 01:15:14', '{\"role.permissions\":\"0\",\"user.create.permissions\":\"1\",\"user.delete.permissions\":\"1\",\"user.edite.permissions\":\"1\",\"user.update_password.permissions\":\"0\",\"user.view.permissions\":\"1\",\"property.admin_create.permissions\":\"0\",\"property.approve.permissions\":\"0\",\"property.create.permissions\":\"0\",\"property.delete.permissions\":\"0\",\"property.edite.permissions\":\"0\",\"property.suspend.permissions\":\"0\",\"property.view.permissions\":\"0\",\"property.status.permissions\":\"0\",\"platform.index\":\"1\",\"platform.systems.attachment\":\"1\"}', 0, 'avatar.png', 0, NULL),
(21, 'Rukshan Thilakarathna', 'rukshan-thilakarathna', 'user', 'thilakarathnarukshan9@gmail.com', '$2y$12$o1hoc7qM/mrIzdGD/jOPceJhGLM6B7RVnyWXQAACCQtxSDj6Ye.QW', NULL, '0', '171714815570.png', '171714815561.png', 1, NULL, '1717148155100.png', NULL, NULL, NULL, NULL, 1, NULL, 'dO6EAoK5g8T9ZGSsH9g26xDsr24hvEceNhq5f6UYrm1KCfJzICrwQQ0txSYG', '2024-05-08 05:08:10', '2024-05-31 04:39:14', NULL, 0, 'avatar.png', 0, NULL),
(22, 'Maddhuma Bandara', 'maddhuma-bandara', 'property-owner', 'madduma@gmail.com', '$2y$12$9NKPZaUwbm9kDd9wC2j4NuCEtm9MXZ5/td6yvPZi8OGf2qp9xrlHy', '0762005399', '171574959446.png', '171574959421.png', '171574959450.png', 1, NULL, '171574959482.png', 2, 6, '319/c@ Munwathugoda, Danthure', NULL, 1, NULL, 'YsAD3QQERaZkNkdx7kivn6izVc0BngGkjGLdCenCvueF079GX34NG9dNp9lN', '2024-05-08 05:09:04', '2024-06-04 02:44:53', NULL, 0, 'avatar.png', 1, NULL),
(23, 'maduka dilshan', 'maduka-dilshan', 'property-owner', 'maduka@gmail.com', '$2y$12$ve4Teh3nm6Mvn6FTdsFwjOoN2FVEyniihBR8er4bgFvIFPJgGrEQO', NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '7T6wRQ5KEdYhDHSmjGyLCwr92aLfaJ5ORPdlYMlDip643am7Td8KPsVNTZxl', '2024-05-09 03:07:59', '2024-05-09 03:07:59', NULL, 0, 'avatar.png', 0, NULL),
(24, 'Piumi Hansamali', 'piumi-hansamali', 'worker', 'piumi@gmail.com', '$2y$12$5hEVsYu9LGPW8s5VlJ2YF.Lwh.jXAexPBbVV/CxO1NUzG34L1NpwG', '0762005399', NULL, NULL, NULL, 0, NULL, NULL, 2, 3, 'munwathugoda danthure', 'room boy', 1, NULL, 'KuDhKOdqeBXT68DkyyQpiuGIeJddMjYg11Mxo9lLQJ1FhdZ6eLJv6IDU2jwL', '2024-05-17 01:35:31', '2024-05-17 01:58:03', NULL, 0, 'avatar.png', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachmentable_attachmentable_type_attachmentable_id_index` (`attachmentable_type`,`attachmentable_id`),
  ADD KEY `attachmentable_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cities_districts1_idx` (`district_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_id` (`province_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `PointPrice`
--
ALTER TABLE `PointPrice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pointStorts`
--
ALTER TABLE `pointStorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_prices`
--
ALTER TABLE `point_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_transactions`
--
ALTER TABLE `point_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD PRIMARY KEY (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `telescope_monitoring`
--
ALTER TABLE `telescope_monitoring`
  ADD PRIMARY KEY (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachmentable`
--
ALTER TABLE `attachmentable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1847;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PointPrice`
--
ALTER TABLE `PointPrice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pointStorts`
--
ALTER TABLE `pointStorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `point_prices`
--
ALTER TABLE `point_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_transactions`
--
ALTER TABLE `point_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374202;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD CONSTRAINT `attachmentable_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
