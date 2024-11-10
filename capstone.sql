-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 04:51 AM
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
(159, 59, 43, 1, '11:35:30', 4, '2024-11-10 11:35:30'),
(160, 57, 43, NULL, '09:30:00', 1, '2024-11-10 11:37:17'),
(161, 57, 43, NULL, '09:30:00', 2, '2024-11-10 11:37:17'),
(162, 57, 43, NULL, '09:30:00', 2, '2024-11-10 11:37:17');

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
(59, 159, 'Loperamide', 'Certificate', '2024-11-10 11:35:30');

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
(2229, 159, 1474, 0, 0),
(2230, 159, 1475, 0, 0),
(2231, 159, 1476, 2, 1),
(2232, 159, 1477, 0, 0),
(2233, 159, 1478, 0, 0),
(2234, 159, 1479, 0, 0),
(2235, 159, 1480, 0, 0),
(2236, 159, 1481, 0, 0),
(2237, 159, 1482, 0, 0),
(2238, 159, 1483, 0, 0),
(2239, 159, 1484, 0, 0),
(2240, 159, 1485, 0, 0),
(2241, 159, 1486, 0, 0),
(2242, 159, 1487, 0, 0),
(2243, 159, 1488, 0, 0),
(2244, 159, 1489, 0, 0),
(2245, 159, 1490, 0, 0),
(2246, 159, 1491, 0, 0),
(2247, 159, 1492, 0, 0),
(2248, 159, 1493, 0, 0),
(2249, 159, 1494, 0, 0),
(2250, 159, 1495, 0, 0),
(2251, 159, 1496, 0, 0),
(2252, 159, 1497, 0, 0),
(2253, 159, 1498, 0, 0),
(2254, 159, 1499, 0, 0),
(2255, 159, 1500, 0, 0),
(2256, 159, 1501, 0, 0),
(2257, 159, 1502, 0, 0),
(2258, 159, 1503, 0, 0),
(2259, 159, 1504, 0, 0),
(2260, 159, 1505, 0, 0),
(2261, 159, 1506, 0, 0),
(2262, 159, 1507, 0, 0),
(2263, 159, 1508, 0, 0),
(2264, 159, 1509, 0, 0),
(2265, 159, 1510, 0, 0),
(2266, 159, 1511, 0, 0),
(2267, 159, 1512, 0, 0),
(2268, 159, 1513, 0, 0),
(2269, 159, 1514, 0, 0),
(2270, 159, 1515, 0, 0),
(2271, 159, 1516, 0, 0),
(2272, 159, 1517, 0, 0),
(2273, 159, 1518, 0, 0),
(2274, 159, 1519, 0, 0),
(2275, 159, 1520, 0, 0),
(2276, 159, 1521, 0, 0),
(2277, 159, 1522, 0, 0),
(2278, 159, 1523, 0, 0),
(2279, 159, 1524, 0, 0),
(2280, 159, 1525, 0, 0);

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
(90, 18, 160),
(91, 18, 161),
(92, 18, 162);

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
(57, 1, '2024-11-11 00:00:00', 1),
(58, 1, '2024-11-12 00:00:00', 1),
(59, 1, '2024-11-10 00:00:00', 2);

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
(43, 1, 'Karleigh', 'Sade', '$2y$10$CF4eAZyKGK/a5/.LLCdg7ezFsRoTdJlbRYkLFy61iuQ0UmGk4j3Sy', '+639934578843', 'patient@gmail.com', 'student', 'Petra', '0000-00-00', '../public/IDs/4c29443b89f9926a5b63d36c56345c8b.png', NULL, 1);

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
(20, 159, 'Paracetamol');

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
(1474, 43, 1, 0, 0),
(1475, 43, 2, 0, 0),
(1476, 43, 3, 2, 0),
(1477, 43, 4, 0, 0),
(1478, 43, 5, 0, 0),
(1479, 43, 6, 0, 0),
(1480, 43, 7, 0, 0),
(1481, 43, 8, 0, 0),
(1482, 43, 9, 0, 0),
(1483, 43, 10, 0, 0),
(1484, 43, 11, 0, 0),
(1485, 43, 12, 0, 0),
(1486, 43, 13, 0, 0),
(1487, 43, 14, 0, 0),
(1488, 43, 15, 0, 0),
(1489, 43, 16, 0, 0),
(1490, 43, 17, 0, 0),
(1491, 43, 18, 0, 0),
(1492, 43, 19, 0, 0),
(1493, 43, 20, 0, 0),
(1494, 43, 21, 0, 0),
(1495, 43, 22, 0, 0),
(1496, 43, 23, 0, 0),
(1497, 43, 24, 0, 0),
(1498, 43, 25, 0, 0),
(1499, 43, 26, 0, 0),
(1500, 43, 27, 0, 0),
(1501, 43, 28, 0, 0),
(1502, 43, 29, 0, 0),
(1503, 43, 30, 0, 0),
(1504, 43, 31, 0, 0),
(1505, 43, 32, 0, 0),
(1506, 43, 33, 0, 0),
(1507, 43, 34, 0, 0),
(1508, 43, 35, 0, 0),
(1509, 43, 36, 0, 0),
(1510, 43, 37, 0, 0),
(1511, 43, 38, 0, 0),
(1512, 43, 39, 0, 0),
(1513, 43, 40, 0, 0),
(1514, 43, 41, 0, 0),
(1515, 43, 42, 0, 0),
(1516, 43, 43, 0, 0),
(1517, 43, 44, 0, 0),
(1518, 43, 45, 0, 0),
(1519, 43, 46, 0, 0),
(1520, 43, 47, 0, 0),
(1521, 43, 48, 0, 0),
(1522, 43, 49, 0, 0),
(1523, 43, 50, 0, 0),
(1524, 43, 51, 0, 0),
(1525, 43, 52, 0, 0);

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
  MODIFY `Appointment_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `appointmentresult`
--
ALTER TABLE `appointmentresult`
  MODIFY `AppointmentResult_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `appointmenttoothresult`
--
ALTER TABLE `appointmenttoothresult`
  MODIFY `AppointmentToothResult_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2281;

--
-- AUTO_INCREMENT for table `appointment_services`
--
ALTER TABLE `appointment_services`
  MODIFY `appointment_services_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
  MODIFY `Doctor_schedule_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `patient_student`
--
ALTER TABLE `patient_student`
  MODIFY `PatientStudentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `Prescription_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Services_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tooth`
--
ALTER TABLE `tooth`
  MODIFY `Tooth_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1526;

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
