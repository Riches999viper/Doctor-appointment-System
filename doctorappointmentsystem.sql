-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2023 at 06:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorappointmentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `image_one` varchar(255) DEFAULT NULL,
  `image_two` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `image_one`, `image_two`, `description`, `title`) VALUES
(1, '1.jpg', '2.jpg', 'A doctor appointment system is a valuable tool used in healthcare facilities to streamline and manage the scheduling of patient appointments with doctors or healthcare providers. It offers convenient online booking options, allowing patients to schedule appointments from anywhere at any time. The system enables patients to select preferred dates and times based on the availability of doctors, reducing scheduling conflicts. It also helps healthcare providers maintain accurate patient records by capturing relevant personal and medical information during the registration process. Automated reminders minimize no-show rates, and the system allows for easy cancellations and rescheduling. Integration with electronic health records ensures that doctors have access to updated patient information during appointments. Reporting and analytics features provide valuable insights to optimize operations. Overall, a doctor appointment system improves efficiency, enhances patient satisfaction, and streamlines the appointment booking process in healthcare settings.                                            The Online Doctor Appointment System aims to provide an innovation solution that can make the process of booking and managing appointment more streamlined and hasslefree for both patients and doctor.                                              The Online Doctor Appointment System aims to provide an innovation solution that can make the process of booking and managing appointment more streamlined and hasslefree for both patients and doctor.                                                              ', 'Doctor Appointment System');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `otp` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `is_admin`, `email`, `password`, `status`, `otp`) VALUES
(1, 0, 'nabinthapa@gmail.com', '30d523b9e145b2cb3b061ac33254b4f4', 1, 91329);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doc_sche_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doc_sche_id`, `name`, `email`, `phone`, `message`, `patient_id`, `doctor_id`, `status`) VALUES
(27, 328, 'nabinthapa', 'nabinthapa@gmail.com', 9818266466, 'hello doctor nabin', 5, 10, 1),
(28, 327, 'sabin thapa', 'sabin@gmail.com', 9817266455, 'Im sabin thapa please emergency doctor', 29, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `commented_at` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `doctor_id`, `name`, `email`, `comment`, `commented_at`, `status`) VALUES
(10, 7, 'sirish', 'sirish@gmail.com', 'sirish le gareko cmt ho hai yo chai', '2023-06-21 06:10:01', 1),
(18, 9, 'resma', 'resma@gmail.com', 'resma le gareko cmt', '2023-06-23 07:25:52', 1),
(19, 9, 'rejina', 'rejin@gmail.com', 'rejina le gareko cmt', '2023-06-23 07:26:25', 1),
(20, 11, 'dinesh', 'dinesh@gmail.com', 'dinesh gareko cmt ho hai yo ', '2023-06-23 07:32:36', 1),
(25, 10, 'manish', 'manish@gmail.com', 'he is very experienced doctor', '2023-07-15 14:31:51', 1),
(27, 10, 'Leandra Mcmahon', 'vybep@mailinator.com', 'Voluptate facere occ', '2023-07-25 13:16:35', 1),
(28, 11, 'dineshdona', 'dineshdona@gmail.com', 'dinesh123', '2023-09-16 07:56:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `doctor_image` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `otp` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `years_of_experience`, `specialization`, `doctor_image`, `phone`, `created_at`, `status`, `otp`) VALUES
(4, 'RajuDon', 'rajudon@gmail.com', 'e0f7a45ed3f85582394bff70ad4a3795', 4, 'Gastroenterologists', 'm14.avif', 9817266345, '2023-05-31 20:35:30', 1, 56082),
(7, 'sirish', 'sirish@gmail.com', '4265bc12c1f65e6ea1eabebac24a825c', 12, 'Osteopaths', 'm3.avif', 9991212122, '2023-05-31 22:57:50', 1, NULL),
(9, 'RajeshGamal', 'resmagamal@gmail.com', '4e25c9071362a1154e1519522d34f49e', 2, 'Hematologists', 'r2.avif', 9828283232, '2023-05-31 23:57:32', 1, 42902),
(10, 'nabin', 'nabinthapa@gmail.com', '30d523b9e145b2cb3b061ac33254b4f4', 9, 'Oncologists', 'm1.avif', 9818266466, '2023-06-01 23:59:20', 1, 61285),
(11, 'dinesh', 'dinesh@gmail.com', '72ea9b10ad081b41a57c4982649ee7fd', 11, 'Internists', 'smiling-doctor-with-strethoscope-isolated-grey_651396-974.avif', 9817266366, '2023-06-02 14:45:45', 1, NULL),
(12, 'riches', 'riches@gmail.com', '87e755c03bad26f69594e54912560994', 4, 'Nephrologists', 'm8.avif', 9876672733, '2023-06-02 14:57:20', 1, NULL),
(14, 'sabin', 'sabin@gmail.com', '0d4033027211bf6090af71730a8803d5', 1, 'Oncologists', '2.jpg', 9843788884, '2023-06-04 21:27:03', 1, 16378),
(17, 'mangal', 'mangal@gmail.com', '6831957f188a94cde0ec53e8aa312361', 11, 'Neurologists', 'attractive-young-male-nutriologist-lab-coat-smiling-against-white-background_662251-2960.avif', 98761525262, '2023-06-13 12:06:41', 0, NULL),
(18, 'ramesh', 'ramesh@gmail.com', '8070599bd6ea0a3798bd05cca6aece69', 3, 'Internists', 'm14.avif', 9878667545, '2023-06-23 09:03:22', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doc_schedule_day`
--

CREATE TABLE `doc_schedule_day` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `slots` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_schedule_day`
--

INSERT INTO `doc_schedule_day` (`id`, `doctor_id`, `day`, `slots`, `status`) VALUES
(326, 10, 'Sunday', '10:35:00', 0),
(327, 10, 'Sunday', '10:45:00', 2),
(328, 10, 'Sunday', '10:55:00', 2),
(329, 10, 'Sunday', '11:05:00', 2),
(330, 10, 'Sunday', '11:15:00', 0),
(331, 10, 'Sunday', '11:25:00', 0),
(332, 10, 'Sunday', '11:35:00', 0),
(333, 10, 'Sunday', '11:45:00', 0),
(334, 14, 'Sunday', '20:24:00', 0),
(335, 14, 'Sunday', '20:34:00', 0),
(336, 14, 'Sunday', '20:44:00', 0),
(337, 14, 'Sunday', '20:54:00', 0),
(338, 14, 'Sunday', '21:04:00', 0),
(339, 14, 'Sunday', '21:14:00', 0),
(340, 14, 'Tuesday', '11:30:00', 1),
(341, 14, 'Tuesday', '11:40:00', 0),
(342, 14, 'Tuesday', '11:50:00', 0),
(343, 14, 'Tuesday', '12:00:00', 0),
(344, 14, 'Tuesday', '12:10:00', 0),
(345, 14, 'Tuesday', '12:20:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `phone`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(2, 'resma', 'resma@gmail.com', '5b394dccdfd33d159fde1fd49fda24bb', 9876233455, 1, 1, '2023-06-17 20:10:23', NULL),
(3, 'sarita', 'sarita@gmail.com', '60f1dfbef36ae87491ee992ca80645e4', 9876877655, 1, 1, '2023-06-17 20:10:58', NULL),
(5, 'nabinthapa', 'nabinthapa@gmail.com', '30d523b9e145b2cb3b061ac33254b4f4', 9818266466, 0, 1, '2023-06-18 18:24:13', NULL),
(6, 'ram thapa', 'ramthapa@gmail.com', 'ed218e06b885297d0750b65be5e4041e', 9876544566, 0, 1, '2023-06-19 04:43:42', NULL),
(7, 'rajudon', 'rajudaka@gmail.com', 'fe783d3587fb00d99a0045324acb861c', 9827366455, 2, 1, '2023-06-19 09:49:43', NULL),
(28, 'basanta sir', 'basantasir@gmail.com', '4757861587066b0302bd281eac9a7196', 9876544344, 0, 1, '2023-06-22 09:04:46', NULL),
(29, 'sabin thapa', 'sabin@gmail.com', '0d4033027211bf6090af71730a8803d5', 9817266455, 0, 1, '2023-06-25 17:04:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `logo` varchar(100) NOT NULL,
  `logo_footer` varchar(100) DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `view_count` decimal(10,0) NOT NULL DEFAULT 0,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slogan`, `logo`, `logo_footer`, `phone`, `mobile`, `email`, `site_url`, `address`, `view_count`, `meta_keyword`, `meta_description`) VALUES
(5, 'Online Doctor Appointment System', 'Appoint Your Doctor And Get Free From Diseases', 'doctor-2008480_1280.png', NULL, 9847503434, NULL, 'nabinthapa@gmail.com', 'http://www.facebook.com', 'Satdobato', '0', 'Nepals #1 doctor,hamro doctor pyaro doctor,fast appointment with the doctors,emergency appointment with the doctors', 'Nepals #1 doctor,hamro doctor pyaro doctor,fast appointment with the doctors,emergency appointment with the doctors,skillfull doctor appointment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_id` (`doctor_id`),
  ADD KEY `doc_sch_id` (`doc_sche_id`),
  ADD KEY `p_id` (`patient_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmt_doc_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_schedule_day`
--
ALTER TABLE `doc_schedule_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doctor_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doc_schedule_day`
--
ALTER TABLE `doc_schedule_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `d_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_sch_id` FOREIGN KEY (`doc_sche_id`) REFERENCES `doc_schedule_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_id` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `cmt_doc_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doc_schedule_day`
--
ALTER TABLE `doc_schedule_day`
  ADD CONSTRAINT `doc_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
