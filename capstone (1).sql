-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 01:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_ID` int(255) NOT NULL,
  `Doctor_schedule_ID` int(255) DEFAULT NULL,
  `Patient_ID` int(13) DEFAULT NULL,
  `Doctor_ID` int(255) DEFAULT NULL,
  `Appointment_Time` time DEFAULT NULL,
  `Appointment_status` int(11) DEFAULT NULL,
  `Appointment_createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_ID`, `Doctor_schedule_ID`, `Patient_ID`, `Doctor_ID`, `Appointment_Time`, `Appointment_status`, `Appointment_createdAt`) VALUES
(123, 50, 28, 1, '09:30:00', 4, '2023-05-30 13:16:27'),
(124, 50, 28, NULL, '03:00:00', 0, '2023-05-30 14:40:20'),
(125, 51, 28, NULL, '03:00:00', 2, '2023-05-31 11:17:25'),
(126, 51, 28, NULL, '01:00:00', 1, '2023-05-31 11:22:32'),
(127, 52, NULL, NULL, '02:00:00', 0, '2023-06-02 11:19:11'),
(128, 52, NULL, NULL, '02:00:00', 0, '2023-06-02 11:19:12'),
(129, 52, NULL, NULL, '02:00:00', 0, '2023-06-02 11:19:14'),
(130, 52, NULL, NULL, '02:00:00', 0, '2023-06-02 11:19:15'),
(131, 52, NULL, NULL, '02:00:00', 0, '2023-06-02 11:19:17'),
(132, 52, NULL, NULL, '02:00:00', 0, '2023-06-02 11:19:20'),
(133, 52, NULL, NULL, '02:00:00', 0, '2023-06-02 11:19:25'),
(134, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:33'),
(135, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:35'),
(136, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:37'),
(137, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:37'),
(138, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:37'),
(139, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:37'),
(140, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:37'),
(141, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:38'),
(142, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:38'),
(143, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:38'),
(144, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:38'),
(145, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:38'),
(146, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:38'),
(147, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:39'),
(148, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:39'),
(149, 52, NULL, NULL, '01:00:00', 0, '2023-06-02 11:19:40'),
(150, 52, NULL, NULL, '10:30:00', 0, '2023-06-02 11:20:10'),
(151, 52, 28, NULL, '03:00:00', 0, '2023-06-02 11:20:54'),
(152, 53, 40, NULL, '01:00:00', 0, '2023-06-10 11:31:15'),
(153, 54, 41, NULL, '09:30:00', 2, '2023-06-12 10:25:36'),
(154, 54, 41, 1, '02:00:00', 4, '2023-06-12 10:28:22'),
(155, 55, 41, NULL, '03:00:00', 2, '2023-06-12 10:28:59'),
(156, 55, 41, 1, '03:00:00', 4, '2023-06-13 14:19:55'),
(157, 55, 40, NULL, '04:00:00', 1, '2023-06-13 14:21:29'),
(158, 56, 41, 1, '03:00:00', 4, '2023-07-03 18:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `appointmentresult`
--

CREATE TABLE `appointmentresult` (
  `AppointmentResult_ID` int(255) NOT NULL,
  `Appointment_ID` int(255) DEFAULT NULL,
  `Treatment` varchar(255) DEFAULT NULL,
  `Certificate_Issued` varchar(20) NOT NULL,
  `Appointment_Result_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmentresult`
--

INSERT INTO `appointmentresult` (`AppointmentResult_ID`, `Appointment_ID`, `Treatment`, `Certificate_Issued`, `Appointment_Result_Date`) VALUES
(51, 108, 'patients tooth has been filled', 'Certificate', '2023-05-29 10:56:16'),
(55, 123, 'haha', 'No Certificate', '2023-05-30 13:17:07'),
(56, 154, 'replaced', 'Certificate', '2023-06-12 10:30:37'),
(57, 156, 'gfgf', 'No Certificate', '2023-06-13 14:38:17'),
(58, 158, 'tooth no. 3\'6 has been filled', 'Certificate', '2023-07-03 19:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttoothresult`
--

CREATE TABLE `appointmenttoothresult` (
  `AppointmentToothResult_ID` int(255) NOT NULL,
  `Appointment_ID` int(13) DEFAULT NULL,
  `Tooth_ID` int(255) DEFAULT NULL,
  `Appointment_Tooth_Status` int(2) DEFAULT NULL,
  `Recent_change` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmenttoothresult`
--

INSERT INTO `appointmenttoothresult` (`AppointmentToothResult_ID`, `Appointment_ID`, `Tooth_ID`, `Appointment_Tooth_Status`, `Recent_change`) VALUES
(2021, 123, 1266, 0, 0),
(2022, 123, 1267, 0, 0),
(2023, 123, 1268, 1, 1),
(2024, 123, 1269, 0, 0),
(2025, 123, 1270, 0, 0),
(2026, 123, 1271, 0, 0),
(2027, 123, 1272, 0, 0),
(2028, 123, 1273, 0, 0),
(2029, 123, 1274, 0, 0),
(2030, 123, 1275, 0, 0),
(2031, 123, 1276, 0, 0),
(2032, 123, 1277, 0, 0),
(2033, 123, 1278, 0, 0),
(2034, 123, 1279, 0, 0),
(2035, 123, 1280, 0, 0),
(2036, 123, 1281, 0, 0),
(2037, 123, 1282, 0, 0),
(2038, 123, 1283, 0, 0),
(2039, 123, 1284, 0, 0),
(2040, 123, 1285, 0, 0),
(2041, 123, 1286, 0, 0),
(2042, 123, 1287, 0, 0),
(2043, 123, 1288, 0, 0),
(2044, 123, 1289, 0, 0),
(2045, 123, 1290, 0, 0),
(2046, 123, 1291, 0, 0),
(2047, 123, 1292, 0, 0),
(2048, 123, 1293, 0, 0),
(2049, 123, 1294, 0, 0),
(2050, 123, 1295, 0, 0),
(2051, 123, 1296, 0, 0),
(2052, 123, 1297, 0, 0),
(2053, 123, 1298, 0, 0),
(2054, 123, 1299, 0, 0),
(2055, 123, 1300, 0, 0),
(2056, 123, 1301, 0, 0),
(2057, 123, 1302, 0, 0),
(2058, 123, 1303, 0, 0),
(2059, 123, 1304, 0, 0),
(2060, 123, 1305, 0, 0),
(2061, 123, 1306, 0, 0),
(2062, 123, 1307, 0, 0),
(2063, 123, 1308, 0, 0),
(2064, 123, 1309, 0, 0),
(2065, 123, 1310, 0, 0),
(2066, 123, 1311, 0, 0),
(2067, 123, 1312, 0, 0),
(2068, 123, 1313, 0, 0),
(2069, 123, 1314, 0, 0),
(2070, 123, 1315, 0, 0),
(2071, 123, 1316, 0, 0),
(2072, 123, 1317, 0, 0),
(2073, 154, 1318, 0, 0),
(2074, 154, 1319, 4, 1),
(2075, 154, 1320, 0, 0),
(2076, 154, 1321, 0, 0),
(2077, 154, 1322, 0, 0),
(2078, 154, 1323, 0, 0),
(2079, 154, 1324, 0, 0),
(2080, 154, 1325, 0, 0),
(2081, 154, 1326, 0, 0),
(2082, 154, 1327, 0, 0),
(2083, 154, 1328, 0, 0),
(2084, 154, 1329, 0, 0),
(2085, 154, 1330, 0, 0),
(2086, 154, 1331, 0, 0),
(2087, 154, 1332, 0, 0),
(2088, 154, 1333, 0, 0),
(2089, 154, 1334, 0, 0),
(2090, 154, 1335, 0, 0),
(2091, 154, 1336, 0, 0),
(2092, 154, 1337, 0, 0),
(2093, 154, 1338, 0, 0),
(2094, 154, 1339, 0, 0),
(2095, 154, 1340, 0, 0),
(2096, 154, 1341, 0, 0),
(2097, 154, 1342, 0, 0),
(2098, 154, 1343, 0, 0),
(2099, 154, 1344, 0, 0),
(2100, 154, 1345, 0, 0),
(2101, 154, 1346, 0, 0),
(2102, 154, 1347, 0, 0),
(2103, 154, 1348, 0, 0),
(2104, 154, 1349, 0, 0),
(2105, 154, 1350, 0, 0),
(2106, 154, 1351, 0, 0),
(2107, 154, 1352, 0, 0),
(2108, 154, 1353, 0, 0),
(2109, 154, 1354, 0, 0),
(2110, 154, 1355, 0, 0),
(2111, 154, 1356, 0, 0),
(2112, 154, 1357, 0, 0),
(2113, 154, 1358, 0, 0),
(2114, 154, 1359, 0, 0),
(2115, 154, 1360, 0, 0),
(2116, 154, 1361, 0, 0),
(2117, 154, 1362, 0, 0),
(2118, 154, 1363, 0, 0),
(2119, 154, 1364, 0, 0),
(2120, 154, 1365, 0, 0),
(2121, 154, 1366, 0, 0),
(2122, 154, 1367, 0, 0),
(2123, 154, 1368, 0, 0),
(2124, 154, 1369, 0, 0),
(2125, 156, 1318, 0, 0),
(2126, 156, 1319, 4, 2),
(2127, 156, 1320, 0, 0),
(2128, 156, 1321, 0, 0),
(2129, 156, 1322, 0, 0),
(2130, 156, 1323, 0, 0),
(2131, 156, 1324, 0, 0),
(2132, 156, 1325, 0, 0),
(2133, 156, 1326, 0, 0),
(2134, 156, 1327, 0, 0),
(2135, 156, 1328, 0, 0),
(2136, 156, 1329, 0, 0),
(2137, 156, 1330, 0, 0),
(2138, 156, 1331, 0, 0),
(2139, 156, 1332, 0, 0),
(2140, 156, 1333, 0, 0),
(2141, 156, 1334, 3, 1),
(2142, 156, 1335, 0, 0),
(2143, 156, 1336, 0, 0),
(2144, 156, 1337, 0, 0),
(2145, 156, 1338, 0, 0),
(2146, 156, 1339, 0, 0),
(2147, 156, 1340, 0, 0),
(2148, 156, 1341, 0, 0),
(2149, 156, 1342, 0, 0),
(2150, 156, 1343, 0, 0),
(2151, 156, 1344, 0, 0),
(2152, 156, 1345, 0, 0),
(2153, 156, 1346, 0, 0),
(2154, 156, 1347, 0, 0),
(2155, 156, 1348, 0, 0),
(2156, 156, 1349, 1, 1),
(2157, 156, 1350, 0, 0),
(2158, 156, 1351, 0, 0),
(2159, 156, 1352, 0, 0),
(2160, 156, 1353, 0, 0),
(2161, 156, 1354, 0, 0),
(2162, 156, 1355, 0, 0),
(2163, 156, 1356, 0, 0),
(2164, 156, 1357, 0, 0),
(2165, 156, 1358, 0, 0),
(2166, 156, 1359, 0, 0),
(2167, 156, 1360, 0, 0),
(2168, 156, 1361, 0, 0),
(2169, 156, 1362, 0, 0),
(2170, 156, 1363, 0, 0),
(2171, 156, 1364, 0, 0),
(2172, 156, 1365, 0, 0),
(2173, 156, 1366, 0, 0),
(2174, 156, 1367, 0, 0),
(2175, 156, 1368, 0, 0),
(2176, 156, 1369, 0, 0),
(2177, 158, 1318, 0, 0),
(2178, 158, 1319, 4, 0),
(2179, 158, 1320, 0, 0),
(2180, 158, 1321, 0, 0),
(2181, 158, 1322, 0, 0),
(2182, 158, 1323, 0, 0),
(2183, 158, 1324, 0, 0),
(2184, 158, 1325, 0, 0),
(2185, 158, 1326, 0, 0),
(2186, 158, 1327, 0, 0),
(2187, 158, 1328, 0, 0),
(2188, 158, 1329, 0, 0),
(2189, 158, 1330, 0, 0),
(2190, 158, 1331, 0, 0),
(2191, 158, 1332, 0, 0),
(2192, 158, 1333, 0, 0),
(2193, 158, 1334, 3, 2),
(2194, 158, 1335, 0, 0),
(2195, 158, 1336, 1, 1),
(2196, 158, 1337, 0, 0),
(2197, 158, 1338, 0, 0),
(2198, 158, 1339, 0, 0),
(2199, 158, 1340, 0, 0),
(2200, 158, 1341, 0, 0),
(2201, 158, 1342, 0, 0),
(2202, 158, 1343, 0, 0),
(2203, 158, 1344, 0, 0),
(2204, 158, 1345, 0, 0),
(2205, 158, 1346, 0, 0),
(2206, 158, 1347, 0, 0),
(2207, 158, 1348, 0, 0),
(2208, 158, 1349, 1, 2),
(2209, 158, 1350, 0, 0),
(2210, 158, 1351, 0, 0),
(2211, 158, 1352, 0, 0),
(2212, 158, 1353, 0, 0),
(2213, 158, 1354, 0, 0),
(2214, 158, 1355, 0, 0),
(2215, 158, 1356, 0, 0),
(2216, 158, 1357, 0, 0),
(2217, 158, 1358, 0, 0),
(2218, 158, 1359, 0, 0),
(2219, 158, 1360, 0, 0),
(2220, 158, 1361, 0, 0),
(2221, 158, 1362, 0, 0),
(2222, 158, 1363, 0, 0),
(2223, 158, 1364, 0, 0),
(2224, 158, 1365, 0, 0),
(2225, 158, 1366, 0, 0),
(2226, 158, 1367, 0, 0),
(2227, 158, 1368, 0, 0),
(2228, 158, 1369, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_services`
--

CREATE TABLE `appointment_services` (
  `appointment_services_ID` int(255) NOT NULL,
  `Services_ID` int(255) DEFAULT NULL,
  `Appointment_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_services`
--

INSERT INTO `appointment_services` (`appointment_services_ID`, `Services_ID`, `Appointment_ID`) VALUES
(53, 18, 123),
(54, 18, 124),
(55, 17, 125),
(56, 17, 126),
(57, 17, 127),
(58, 17, 128),
(59, 17, 129),
(60, 17, 130),
(61, 17, 131),
(62, 17, 132),
(63, 18, 132),
(64, 17, 133),
(65, 18, 133),
(66, 18, 135),
(67, 18, 136),
(68, 18, 137),
(69, 18, 138),
(70, 18, 139),
(71, 18, 140),
(72, 18, 141),
(73, 18, 142),
(74, 18, 143),
(75, 18, 144),
(76, 18, 145),
(77, 18, 146),
(78, 18, 147),
(79, 18, 148),
(80, 18, 149),
(81, 18, 150),
(82, 18, 151),
(83, 18, 152),
(84, 18, 153),
(85, 18, 154),
(86, 17, 155),
(87, 18, 156),
(88, 18, 157),
(89, 18, 158);

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `Assistant_ID` int(13) NOT NULL,
  `assistantFname` varchar(30) DEFAULT NULL,
  `assistantLname` varchar(30) DEFAULT NULL,
  `assistantAddress` varchar(255) DEFAULT NULL,
  `assistantContact` varchar(30) DEFAULT NULL,
  `assistantPassword` varchar(255) DEFAULT NULL,
  `assistantEmail` varchar(60) DEFAULT NULL,
  `assistantProfilepicture` varchar(255) DEFAULT NULL,
  `assistantStatus` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`Assistant_ID`, `assistantFname`, `assistantLname`, `assistantAddress`, `assistantContact`, `assistantPassword`, `assistantEmail`, `assistantProfilepicture`, `assistantStatus`) VALUES
(1, 'Ulla', 'Emerald', 'Zeus', '09150218089', '$2y$10$z5pifu.nQNPDfDx78RZNqegOJztwoZwSjNxzv1kIlPFrltUI3YS7C', 'Phyllis@gmail.com', NULL, 1),
(3, 'Mary Jane', 'Reyes', 'La Paz, Iloilo City', '09723717231', '$2y$10$BCOfXwFnCALzuUM4csYM1.eVss1gEobyM1ud4UymQOVfIKkgrktZm', 'maryjanereyes@gmail.com', '../public/Profilepictures/bbebb43a5e9b6d2b3918afb79fca9ef9.png', 1),
(6, 'Nash', 'Carl', 'Katelyn', 'Michelle', '$2y$10$aIMk5t7xKjS6Ay3AoqZ8a.e055WvCNe2HCSpAvvi/kJU5yYGq9kQW', 'Libby@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `CollegeID` int(255) NOT NULL,
  `CollegeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`CollegeID`, `CollegeName`) VALUES
(2, 'CAS'),
(3, 'COE'),
(7, 'CEA');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(255) NOT NULL,
  `CollegeID` int(255) NOT NULL,
  `CourseName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CollegeID`, `CourseName`) VALUES
(2, 2, 'BSIT'),
(3, 3, 'BEED'),
(5, 7, 'BSME');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_ID` int(255) NOT NULL,
  `Doctor_name` varchar(100) NOT NULL,
  `Doctor_title` varchar(200) NOT NULL,
  `Doctor_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doctor_ID`, `Doctor_name`, `Doctor_title`, `Doctor_status`) VALUES
(1, 'Sigfred Villallobos', 'Dentist Cleaning', 1),
(2, 'Estribo', 'Higher', 1),
(3, 'Hey', 'Higher', 1),
(4, 'Hatdogs', 'Grillers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `Doctor_schedule_ID` int(255) NOT NULL,
  `Assistant_ID` int(13) DEFAULT NULL,
  `Doctor_schedule_avail` datetime DEFAULT NULL,
  `Doctor_Schedule_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`Doctor_schedule_ID`, `Assistant_ID`, `Doctor_schedule_avail`, `Doctor_Schedule_type`) VALUES
(46, 1, '2023-05-29 00:00:00', 1),
(50, 1, '2023-05-30 00:00:00', 1),
(51, 1, '2023-05-31 00:00:00', 1),
(52, 1, '2023-06-02 00:00:00', 1),
(53, 1, '2023-06-10 00:00:00', 1),
(54, 1, '2023-06-12 00:00:00', 1),
(55, 1, '2023-06-17 00:00:00', 1),
(56, 1, '2023-07-03 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_ID` int(13) NOT NULL,
  `Assistant_ID` int(13) DEFAULT NULL,
  `patientFname` varchar(30) DEFAULT NULL,
  `patientLname` varchar(30) DEFAULT NULL,
  `patientPassword` varchar(255) DEFAULT NULL,
  `patientContact` varchar(30) DEFAULT NULL,
  `patientEmail` varchar(60) DEFAULT NULL,
  `patientRole` varchar(10) DEFAULT NULL,
  `patientAddress` varchar(255) DEFAULT NULL,
  `patientBirthdate` date NOT NULL,
  `patientIDpicture` varchar(255) DEFAULT NULL,
  `patientProfilepicture` varchar(255) DEFAULT NULL,
  `patientStatus` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_ID`, `Assistant_ID`, `patientFname`, `patientLname`, `patientPassword`, `patientContact`, `patientEmail`, `patientRole`, `patientAddress`, `patientBirthdate`, `patientIDpicture`, `patientProfilepicture`, `patientStatus`) VALUES
(24, NULL, 'John Christian ', 'Hismana', '$2y$10$l16k2OIZ6T2IJwep/TbjS.VQp3WtacsUtShh5fBAMW45Kbk/aQqPK', '09561986292', 'jchismana@gmail.com', 'student', 'Pavia, Iloilo City', '2000-03-21', '../public/IDs/9c3ccd3f4d080b1bcde2316762264183.JPG', NULL, 1),
(25, NULL, 'Jayron', 'Calicaran', '$2y$10$qX3kF3UsFUR4RQYOokgUlOwlQZ6mXac3v2zWQ93Q.LE2.Q50bRiqa', '09196942101', 'jron@gmail.com', 'outsider', 'Bucari, Leon, Iloilo City', '1998-11-19', '../public/IDs/f7c29157cda152731d4e03aee4d720cc.JPG', NULL, 1),
(31, NULL, 'jc', 'estribo', '$2y$10$l1HH2IsNqfmbVYdQ/.hSg.6diskP0Py6PvDyKZAVEknkcf4J4X9q2', '+639150030866', 'estribojohnchristian35@gmail.com', 'outsider', 'Leon, Iloilo', '1999-06-30', '../public/IDs/227dc9bf7c885bc9f4928b1853e0b9fe.JPG', NULL, 1),
(40, NULL, 'allen', 'condesa', '$2y$10$jrtVmb.ELX6y0d.mfs6l3udraI.WJ9YzZA08hSTRXcdxcQDGt3Gru', '+639811556066', 'allen@gmail.com', 'outsider', 'Modi mollitia quod a', '2000-10-19', '../public/IDs/4105d5b79e2f61a4a93a3ee2feadde08.JPG', NULL, 1),
(41, NULL, 'Mariann', 'Cantomayor', '$2y$10$37ESbo2PZmiLrKpWH50f/.AeHAkx8HndgBfCZeCAsKazOmeNJkTiK', '+639956684537', 'mariann.cantomayor@students.isatu.edu.ph', 'student', 'Leon, Iloilo', '2000-03-25', '../public/IDs/074a6300ac714ad3938e31ad167fb23d.png', NULL, 1),
(42, NULL, 'jc', 'estribo', '$2y$10$3nFvXAZDiUa8YVVq6GtP2.Lezns3hdevIhp1CM1Ifq7JhBjVMtk56', '+639150030866', 'estribojohnchristian35@gmail.com', 'outsider', 'Leon, Iloilo', '1999-06-01', '../public/IDs/956924688deaf500c820af65c733f0e8.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_student`
--

CREATE TABLE `patient_student` (
  `PatientStudentID` int(255) NOT NULL,
  `Patient_ID` int(13) NOT NULL,
  `CollegeID` int(255) NOT NULL,
  `CourseID` int(255) NOT NULL,
  `Year` int(2) NOT NULL,
  `Section` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_student`
--

INSERT INTO `patient_student` (`PatientStudentID`, `Patient_ID`, `CollegeID`, `CourseID`, `Year`, `Section`) VALUES
(4, 24, 2, 2, 1, 'A'),
(5, 26, 2, 2, 4, 'A'),
(6, 28, 3, 3, 4, 'A'),
(7, 35, 7, 5, 4, 'C'),
(8, 41, 3, 3, 4, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Prescription_ID` int(255) NOT NULL,
  `Appointment_ID` int(255) NOT NULL,
  `Prescription_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`Prescription_ID`, `Appointment_ID`, `Prescription_Description`) VALUES
(19, 154, 'loperamide');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Services_ID` int(255) NOT NULL,
  `Services_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Services_ID`, `Services_name`) VALUES
(17, 'Oral Examination'),
(18, 'Tooth Extraction');

-- --------------------------------------------------------

--
-- Table structure for table `tooth`
--

CREATE TABLE `tooth` (
  `Tooth_ID` int(255) NOT NULL,
  `Patient_ID` int(13) DEFAULT NULL,
  `Tooth_Number` int(100) DEFAULT NULL,
  `Tooth_Status` int(2) DEFAULT NULL,
  `Recent_change` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tooth`
--

INSERT INTO `tooth` (`Tooth_ID`, `Patient_ID`, `Tooth_Number`, `Tooth_Status`, `Recent_change`) VALUES
(1266, 28, 1, 0, 0),
(1267, 28, 2, 0, 0),
(1268, 28, 3, 1, 2),
(1269, 28, 4, 0, 0),
(1270, 28, 5, 0, 0),
(1271, 28, 6, 0, 0),
(1272, 28, 7, 0, 0),
(1273, 28, 8, 0, 0),
(1274, 28, 9, 0, 0),
(1275, 28, 10, 0, 0),
(1276, 28, 11, 0, 0),
(1277, 28, 12, 0, 0),
(1278, 28, 13, 0, 0),
(1279, 28, 14, 0, 0),
(1280, 28, 15, 0, 0),
(1281, 28, 16, 0, 0),
(1282, 28, 17, 0, 0),
(1283, 28, 18, 0, 0),
(1284, 28, 19, 0, 0),
(1285, 28, 20, 0, 0),
(1286, 28, 21, 0, 0),
(1287, 28, 22, 0, 0),
(1288, 28, 23, 0, 0),
(1289, 28, 24, 0, 0),
(1290, 28, 25, 0, 0),
(1291, 28, 26, 0, 0),
(1292, 28, 27, 0, 0),
(1293, 28, 28, 0, 0),
(1294, 28, 29, 0, 0),
(1295, 28, 30, 0, 0),
(1296, 28, 31, 0, 0),
(1297, 28, 32, 0, 0),
(1298, 28, 33, 0, 0),
(1299, 28, 34, 0, 0),
(1300, 28, 35, 0, 0),
(1301, 28, 36, 0, 0),
(1302, 28, 37, 0, 0),
(1303, 28, 38, 0, 0),
(1304, 28, 39, 0, 0),
(1305, 28, 40, 0, 0),
(1306, 28, 41, 0, 0),
(1307, 28, 42, 0, 0),
(1308, 28, 43, 0, 0),
(1309, 28, 44, 0, 0),
(1310, 28, 45, 0, 0),
(1311, 28, 46, 0, 0),
(1312, 28, 47, 0, 0),
(1313, 28, 48, 0, 0),
(1314, 28, 49, 0, 0),
(1315, 28, 50, 0, 0),
(1316, 28, 51, 0, 0),
(1317, 28, 52, 0, 0),
(1318, 41, 1, 0, 0),
(1319, 41, 2, 4, 0),
(1320, 41, 3, 0, 0),
(1321, 41, 4, 3, 1),
(1322, 41, 5, 0, 0),
(1323, 41, 6, 0, 0),
(1324, 41, 7, 0, 0),
(1325, 41, 8, 0, 0),
(1326, 41, 9, 0, 0),
(1327, 41, 10, 0, 0),
(1328, 41, 11, 0, 0),
(1329, 41, 12, 0, 0),
(1330, 41, 13, 0, 0),
(1331, 41, 14, 4, 1),
(1332, 41, 15, 0, 0),
(1333, 41, 16, 4, 1),
(1334, 41, 17, 3, 0),
(1335, 41, 18, 0, 0),
(1336, 41, 19, 1, 2),
(1337, 41, 20, 0, 0),
(1338, 41, 21, 0, 0),
(1339, 41, 22, 0, 0),
(1340, 41, 23, 0, 0),
(1341, 41, 24, 0, 0),
(1342, 41, 25, 0, 0),
(1343, 41, 26, 0, 0),
(1344, 41, 27, 0, 0),
(1345, 41, 28, 0, 0),
(1346, 41, 29, 3, 1),
(1347, 41, 30, 0, 0),
(1348, 41, 31, 3, 1),
(1349, 41, 32, 1, 0),
(1350, 41, 33, 0, 0),
(1351, 41, 34, 0, 0),
(1352, 41, 35, 0, 0),
(1353, 41, 36, 0, 0),
(1354, 41, 37, 0, 0),
(1355, 41, 38, 0, 0),
(1356, 41, 39, 0, 0),
(1357, 41, 40, 0, 0),
(1358, 41, 41, 0, 0),
(1359, 41, 42, 0, 0),
(1360, 41, 43, 0, 0),
(1361, 41, 44, 0, 0),
(1362, 41, 45, 0, 0),
(1363, 41, 46, 0, 0),
(1364, 41, 47, 0, 0),
(1365, 41, 48, 0, 0),
(1366, 41, 49, 0, 0),
(1367, 41, 50, 0, 0),
(1368, 41, 51, 0, 0),
(1369, 41, 52, 0, 0),
(1370, 24, 1, 0, 0),
(1371, 24, 2, 1, 1),
(1372, 24, 3, 0, 0),
(1373, 24, 4, 0, 0),
(1374, 24, 5, 0, 0),
(1375, 24, 6, 0, 0),
(1376, 24, 7, 0, 0),
(1377, 24, 8, 0, 0),
(1378, 24, 9, 0, 0),
(1379, 24, 10, 0, 0),
(1380, 24, 11, 0, 0),
(1381, 24, 12, 0, 0),
(1382, 24, 13, 0, 0),
(1383, 24, 14, 0, 0),
(1384, 24, 15, 0, 0),
(1385, 24, 16, 0, 0),
(1386, 24, 17, 0, 0),
(1387, 24, 18, 0, 0),
(1388, 24, 19, 0, 0),
(1389, 24, 20, 0, 0),
(1390, 24, 21, 0, 0),
(1391, 24, 22, 0, 0),
(1392, 24, 23, 0, 0),
(1393, 24, 24, 0, 0),
(1394, 24, 25, 0, 0),
(1395, 24, 26, 0, 0),
(1396, 24, 27, 0, 0),
(1397, 24, 28, 0, 0),
(1398, 24, 29, 0, 0),
(1399, 24, 30, 0, 0),
(1400, 24, 31, 0, 0),
(1401, 24, 32, 0, 0),
(1402, 24, 33, 0, 0),
(1403, 24, 34, 0, 0),
(1404, 24, 35, 0, 0),
(1405, 24, 36, 0, 0),
(1406, 24, 37, 0, 0),
(1407, 24, 38, 0, 0),
(1408, 24, 39, 0, 0),
(1409, 24, 40, 0, 0),
(1410, 24, 41, 0, 0),
(1411, 24, 42, 0, 0),
(1412, 24, 43, 0, 0),
(1413, 24, 44, 0, 0),
(1414, 24, 45, 0, 0),
(1415, 24, 46, 0, 0),
(1416, 24, 47, 0, 0),
(1417, 24, 48, 0, 0),
(1418, 24, 49, 0, 0),
(1419, 24, 50, 0, 0),
(1420, 24, 51, 0, 0),
(1421, 24, 52, 0, 0),
(1422, 40, 1, 0, 0),
(1423, 40, 2, 0, 0),
(1424, 40, 3, 0, 0),
(1425, 40, 4, 0, 0),
(1426, 40, 5, 0, 0),
(1427, 40, 6, 0, 0),
(1428, 40, 7, 0, 0),
(1429, 40, 8, 0, 0),
(1430, 40, 9, 0, 0),
(1431, 40, 10, 0, 0),
(1432, 40, 11, 0, 0),
(1433, 40, 12, 0, 0),
(1434, 40, 13, 0, 0),
(1435, 40, 14, 0, 0),
(1436, 40, 15, 0, 0),
(1437, 40, 16, 0, 0),
(1438, 40, 17, 0, 0),
(1439, 40, 18, 0, 0),
(1440, 40, 19, 0, 0),
(1441, 40, 20, 0, 0),
(1442, 40, 21, 0, 0),
(1443, 40, 22, 0, 0),
(1444, 40, 23, 0, 0),
(1445, 40, 24, 0, 0),
(1446, 40, 25, 0, 0),
(1447, 40, 26, 0, 0),
(1448, 40, 27, 0, 0),
(1449, 40, 28, 0, 0),
(1450, 40, 29, 0, 0),
(1451, 40, 30, 0, 0),
(1452, 40, 31, 0, 0),
(1453, 40, 32, 0, 0),
(1454, 40, 33, 0, 0),
(1455, 40, 34, 0, 0),
(1456, 40, 35, 0, 0),
(1457, 40, 36, 0, 0),
(1458, 40, 37, 0, 0),
(1459, 40, 38, 0, 0),
(1460, 40, 39, 0, 0),
(1461, 40, 40, 0, 0),
(1462, 40, 41, 0, 0),
(1463, 40, 42, 0, 0),
(1464, 40, 43, 0, 0),
(1465, 40, 44, 0, 0),
(1466, 40, 45, 0, 0),
(1467, 40, 46, 0, 0),
(1468, 40, 47, 0, 0),
(1469, 40, 48, 0, 0),
(1470, 40, 49, 0, 0),
(1471, 40, 50, 0, 0),
(1472, 40, 51, 0, 0),
(1473, 40, 52, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `Doctor_schedule_ID` (`Doctor_schedule_ID`),
  ADD KEY `Patient_ID` (`Patient_ID`),
  ADD KEY `Doctor_ID` (`Doctor_ID`);

--
-- Indexes for table `appointmentresult`
--
ALTER TABLE `appointmentresult`
  ADD PRIMARY KEY (`AppointmentResult_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`);

--
-- Indexes for table `appointmenttoothresult`
--
ALTER TABLE `appointmenttoothresult`
  ADD PRIMARY KEY (`AppointmentToothResult_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`),
  ADD KEY `Tooth_ID` (`Tooth_ID`);

--
-- Indexes for table `appointment_services`
--
ALTER TABLE `appointment_services`
  ADD PRIMARY KEY (`appointment_services_ID`),
  ADD KEY `Services_ID` (`Services_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`);

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`Assistant_ID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`CollegeID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `CollegeID` (`CollegeID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doctor_ID`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`Doctor_schedule_ID`),
  ADD KEY `Assistant_ID` (`Assistant_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_ID`),
  ADD KEY `Admin_ID` (`Assistant_ID`),
  ADD KEY `Assistant_ID` (`Assistant_ID`);

--
-- Indexes for table `patient_student`
--
ALTER TABLE `patient_student`
  ADD PRIMARY KEY (`PatientStudentID`),
  ADD KEY `Patient_ID` (`Patient_ID`),
  ADD KEY `CollegeID` (`CollegeID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`Prescription_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Services_ID`);

--
-- Indexes for table `tooth`
--
ALTER TABLE `tooth`
  ADD PRIMARY KEY (`Tooth_ID`),
  ADD KEY `Patient_ID` (`Patient_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `appointmentresult`
--
ALTER TABLE `appointmentresult`
  MODIFY `AppointmentResult_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `appointmenttoothresult`
--
ALTER TABLE `appointmenttoothresult`
  MODIFY `AppointmentToothResult_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2229;

--
-- AUTO_INCREMENT for table `appointment_services`
--
ALTER TABLE `appointment_services`
  MODIFY `appointment_services_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `assistant`
--
ALTER TABLE `assistant`
  MODIFY `Assistant_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `CollegeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Doctor_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `Doctor_schedule_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `patient_student`
--
ALTER TABLE `patient_student`
  MODIFY `PatientStudentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `Prescription_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Services_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tooth`
--
ALTER TABLE `tooth`
  MODIFY `Tooth_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1474;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Doctor_schedule_ID`) REFERENCES `doctor_schedule` (`Doctor_schedule_ID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`Patient_ID`) REFERENCES `patient` (`Patient_ID`),
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`Doctor_ID`) REFERENCES `doctor` (`Doctor_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointmentresult`
--
ALTER TABLE `appointmentresult`
  ADD CONSTRAINT `appointmentresult_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`);

--
-- Constraints for table `appointmenttoothresult`
--
ALTER TABLE `appointmenttoothresult`
  ADD CONSTRAINT `appointmenttoothresult_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`),
  ADD CONSTRAINT `appointmenttoothresult_ibfk_2` FOREIGN KEY (`Tooth_ID`) REFERENCES `tooth` (`Tooth_ID`);

--
-- Constraints for table `appointment_services`
--
ALTER TABLE `appointment_services`
  ADD CONSTRAINT `appointment_services_ibfk_1` FOREIGN KEY (`Services_ID`) REFERENCES `services` (`Services_ID`),
  ADD CONSTRAINT `appointment_services_ibfk_2` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`CollegeID`) REFERENCES `college` (`CollegeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD CONSTRAINT `doctor_schedule_ibfk_1` FOREIGN KEY (`Assistant_ID`) REFERENCES `assistant` (`Assistant_ID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Assistant_ID`) REFERENCES `assistant` (`Assistant_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient_student`
--
ALTER TABLE `patient_student`
  ADD CONSTRAINT `patient_student_ibfk_1` FOREIGN KEY (`Patient_ID`) REFERENCES `patient` (`Patient_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `patient_student_ibfk_2` FOREIGN KEY (`CollegeID`) REFERENCES `college` (`CollegeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `patient_student_ibfk_3` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tooth`
--
ALTER TABLE `tooth`
  ADD CONSTRAINT `tooth_ibfk_1` FOREIGN KEY (`Patient_ID`) REFERENCES `patient` (`Patient_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
