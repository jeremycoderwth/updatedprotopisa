-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2025 at 03:12 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u235085615_pisaproto`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
CREATE TABLE IF NOT EXISTS `assessment` (
  `assessment_id` int NOT NULL AUTO_INCREMENT,
  `assessmentCode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `assessment_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subjectID` int NOT NULL,
  `teacherID` int NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - published\r\n1 - hidden',
  `attach_file` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`assessment_id`),
  KEY `assessment_subject_id_fr` (`subjectID`),
  KEY `assessment_teacher_id_fr` (`teacherID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessment_id`, `assessmentCode`, `assessment_name`, `comment`, `subjectID`, `teacherID`, `status`, `attach_file`) VALUES
(25, 'Test77066_25', 'Literary Analysis Challenge', 'This assessment is designed to evaluate 15-year-old students\' skills in literary analysis and comprehension. Students will read a short passage from a classic novel and answer multiple-choice questions to demonstrate their understanding of the text and its literary elements.', 3, 22, 0, '../assessment-files/it_was_one_of_those_march_days_when_the_sun_shines_hot.gif'),
(28, 'Test5442_28', 'VOLCANOES', '1. To evaluate learner&#39;s knowledge about Earth and Space\r\n2. To address deficiencies on the subject', 2, 19, 0, 'asda.jpg'),
(29, 'Test23985_29', 'CLIMATE', '1. To point out how climate changes from the past up to present.\r\n2. To evaluate greenhouse gas emissions that contributes to climate change\r\n3. To obtain the trend on how climate changes ', 2, 19, 0, 'DIGITALIZED EXAM.png'),
(30, 'Test23147_30', 'Subtraction', '', 1, 19, 1, '../assessment-files/AY 25-26, 1ST SEM (2).png'),
(34, 'Test45370_34', 'Dealing with Data Types', 'DSA with python', 6, 19, 0, '../assessment-files/RobloxScreenShot20220908_221327443.png'),
(35, 'Test58853_35', 'Kinds of Loops', 'Be familiar with loops like for loop and whie loop for controlling the flow of programs in Python', 6, 19, 0, '../assessment-files/roblos.png'),
(38, 'Test65969_38', 'Python OOP', 'Explore about objects and concepts about object-oriented programming approach in DSA using python', 6, 19, 0, 'http://localhost/clonepisa-main/client/back-office/assessment-files/assessment_img6910ef21101495.47941623.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
CREATE TABLE IF NOT EXISTS `choices` (
  `choice_id` int NOT NULL AUTO_INCREMENT,
  `questionID` int NOT NULL,
  `choiceText` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `IsCorrectChoice` tinyint(1) NOT NULL COMMENT '0 = true\r\n1 = False',
  PRIMARY KEY (`choice_id`),
  KEY `choices_question_id_fr` (`questionID`)
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `questionID`, `choiceText`, `IsCorrectChoice`) VALUES
(90, 30, 'To Create a sense of unease', 1),
(91, 30, 'To emphasize the beauty of March', 1),
(92, 30, 'To Convey the unpredictability of the weather', 0),
(93, 30, 'To highlight the protagonist\'s emotions', 1),
(114, 36, 'Mayon volcano', 1),
(115, 36, 'Taal volcano', 1),
(116, 36, 'Bulusan volcano', 0),
(117, 36, 'Smith volcano', 1),
(118, 37, 'Lava flow', 0),
(119, 37, 'Ashfall', 0),
(120, 37, 'Incandescence at the base of the plume', 0),
(121, 37, 'Rumbling sounds', 1),
(126, 39, 'Disaster preparedness was needed when eruption starts', 1),
(127, 39, 'Disaster preparedness was only a requirement submitted by the barangay', 1),
(128, 39, 'Disaster preparedness was not applied in inactive volcanoes', 1),
(129, 39, 'Disaster preparedness came from past patterns that indicate possible eruption', 1),
(130, 40, 'Lava plateau', 1),
(131, 40, 'Submarine vents', 1),
(132, 40, 'Craters on the Southeast flank', 0),
(133, 40, 'Caldera lava domes', 0),
(134, 41, 'This activities was used as the primary cause lava to flow from the volcano', 1),
(135, 41, 'The data was used to confirm that the volcano was extinct', 1),
(136, 41, 'The data showed that these earthquakes can cause massive infrastructure destruction', 1),
(137, 41, 'The data can be used to monitor potential eruptions', 0),
(138, 42, 'Flourinated gas', 1),
(139, 42, 'Carbon Dioxide', 1),
(140, 42, 'Methane', 1),
(141, 42, 'Nitrous oxide', 0),
(142, 43, 'Climate\'s condition over the century', 1),
(143, 43, 'Changes in climate cause sea levels to rise', 1),
(144, 43, 'Humans added greenhouse gases emissions', 1),
(145, 43, 'Climate\'s conditions over the past century up to 2019', 0),
(150, 45, 'High percentage of carbon dioxide in the greenhouse gases were placed in ozone layer', 1),
(151, 45, 'Changes in climate cause sea levels to rise', 1),
(152, 45, 'Increase in temperature will be the major effect of huge greenhouse gases emissions', 0),
(153, 45, 'This will cause changes of weather', 1),
(154, 46, 'A minimal increase was recorded', 1),
(155, 46, 'A huge increase was recorded as compared to other gases', 0),
(156, 46, 'It decreased drastically', 1),
(157, 46, 'No changes were noted', 1),
(158, 47, 'All gasses increased in both volume and proportion.', 1),
(159, 47, 'Although CO₂ FFI had the highest overall rise, F-gases had the highest relative percentage increase.', 0),
(160, 47, 'CH₄ and CO₂ LULUCF saw the most significant increase in emissions and percentage.', 1),
(161, 47, 'Although nitrous oxide levels remained constant, total emissions climbed.', 1),
(162, 48, '1', 1),
(163, 48, '3', 1),
(164, 48, '2', 1),
(165, 48, '4', 0),
(278, 77, 'String', 0),
(279, 77, 'Mcfloat', 1),
(280, 77, 'Integer', 1),
(281, 77, 'Numbers', 1),
(286, 79, 'To define a class variable', 1),
(287, 79, 'To define a method', 1),
(288, 79, 'To initialize an object', 0),
(289, 79, 'To inherit from a class', 1),
(290, 80, 'A way to create class based on existing one', 0),
(291, 80, 'A way to create a new object', 1),
(292, 80, 'A way to define a new method', 1),
(293, 80, 'A way to import a module', 1),
(294, 81, 'self refers to the class, cls refers to the instance', 1),
(295, 81, 'self is used for methods, cls is used for variables', 1),
(296, 81, 'self refers to the instance, cls refers to the class', 0),
(297, 81, 'self is used for variables, cls is used for methods', 1),
(298, 82, 'The ability of an object to take on multiple forms', 0),
(299, 82, 'The ability of a method to be overridden', 1),
(300, 82, 'The ability of a class to inherit from multiple parents', 1),
(301, 82, 'The ability of a variable to hold multiple values', 1),
(302, 83, 'The practice of hiding internal implementation details on an object', 0),
(303, 83, 'The practice of inheriting from a parent class', 1),
(304, 83, 'The practice of exposing internal implementation details of an object', 1),
(305, 83, 'The process of overriding a method', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `assessmentID` int NOT NULL,
  `questionText` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_attachment` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `video_attachment` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rationale` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`question_id`),
  KEY `question_assessment_id_fr` (`assessmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `assessmentID`, `questionText`, `image_attachment`, `video_attachment`, `rationale`) VALUES
(30, 25, 'What is the Author\'s purpose in using contrasting imagery in this passage?', '', '', NULL),
(36, 28, 'Which among the volcanoes was referred in the passage?', '', '', NULL),
(37, 28, 'Which of the following was considered the impact during the eruption? Choose all that applies.', '', '', NULL),
(39, 28, 'How can a disaster preparedness plan essential on nearby communities living near a volcano even if it was categorized as an inactive?', '', '', NULL),
(40, 28, 'Which of the following was considered as the geographic features of the volcano?', '', '', NULL),
(41, 28, 'It was noted that seismic activities were recorded before the eruption. How can this data can be of use by the concerned agencies?', '', '', NULL),
(42, 29, 'Which greenhouse gas in the global net anthropogenic GHG emissions in 2019 was considered as the predominant contributor?', '', '', NULL),
(43, 29, 'Based on the given graph, what does the report imply?', '', '', NULL),
(45, 29, 'How can it can be concluded that carbon dioxide from fossil fuels and industries mostly contribute in greenhouse gas emissions?', '', '', NULL),
(46, 29, 'How can flourinated gas emissions in the table be compared with other GHGs?', '', '', NULL),
(47, 29, 'How can the correlation between the change in overall GHG emissions and the individual gases from 1990 to 2019 be described?', '', '', NULL),
(48, 29, 'BIG BIG BIG TESTING', '', '', 'TESTING RATIONALE'),
(77, 34, 'awdawd awdawdad', 'http://localhost/clonepisa-main/client/back-office/assessment-files/image-attachments/1762656418_1659260340469.jpg', '', 'Integewadawdawedawd'),
(79, 38, 'What is the purpose of the __init__ method in a Python class?', 'http://localhost/clonepisa-main/client/back-office/assessment-files/image-attachments/question_img_6910f4adf3c672.60235942.jpg', '', '__init__ is used for iniatilizing an object before using it or its methods'),
(80, 38, 'What is inheritance in Python OOP?', 'http://localhost/clonepisa-main/client/back-office/assessment-files/image-attachments/question_img_6910f55c5af959.50565737.jpg', '', ''),
(81, 38, 'What is the difference between self and cls in Python OOP?', 'http://localhost/clonepisa-main/client/back-office/assessment-files/image-attachments/question_img_6910f5ec027774.23914376.jpg', '', ''),
(82, 38, 'What is Polymorphism in Python OOP?', 'http://localhost/clonepisa-main/client/back-office/assessment-files/image-attachments/question_img_6910f6b2625857.32122183.jpg', '', 'Polymorphism is key part in Python\'s OOP that deals with object\'s behavior and interactivity in the program based on events or user\'s decisions'),
(83, 38, 'What is Encapsulation in Python OOP?', '', '', 'Encapsulation is a fundamental concept in OOP and in important in Python OOP.');

-- --------------------------------------------------------

--
-- Table structure for table `studentresponse`
--

DROP TABLE IF EXISTS `studentresponse`;
CREATE TABLE IF NOT EXISTS `studentresponse` (
  `response_id` int NOT NULL AUTO_INCREMENT,
  `studentID` int NOT NULL,
  `assessmentID` int NOT NULL,
  `score` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_answered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`response_id`),
  KEY `studentresponse_student_id_fr` (`studentID`),
  KEY `studentresponse_assessment_id_fr` (`assessmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentresponse`
--

INSERT INTO `studentresponse` (`response_id`, `studentID`, `assessmentID`, `score`, `date_answered`) VALUES
(84, 19, 28, '0', '2025-05-26 02:58:40'),
(85, 19, 28, '0', '2025-05-26 03:43:42'),
(89, 30, 28, '0', '2025-07-30 07:35:08'),
(90, 30, 29, '0', '2025-07-30 07:36:29'),
(91, 30, 25, '0', '2025-07-30 07:37:06'),
(95, 21, 25, '0', '2025-08-14 12:25:36'),
(96, 21, 28, '0', '2025-11-06 10:51:27'),
(97, 21, 28, '2', '2025-11-07 14:37:03'),
(98, 21, 28, '1', '2025-11-07 15:17:24'),
(99, 21, 28, '1', '2025-11-07 15:22:15'),
(100, 21, 28, '0', '2025-11-07 15:59:15'),
(101, 21, 28, '0', '2025-11-07 16:02:35'),
(102, 21, 28, '0', '2025-11-07 16:04:05'),
(103, 21, 28, '0', '2025-11-07 16:10:25'),
(105, 21, 28, '0', '2025-11-07 16:28:27'),
(106, 21, 28, '0', '2025-11-07 16:29:59'),
(107, 21, 28, '0', '2025-11-07 16:34:06'),
(108, 21, 28, '0', '2025-11-07 16:38:54'),
(109, 21, 28, '0', '2025-11-07 16:40:07'),
(110, 21, 28, '0', '2025-11-07 16:40:33'),
(111, 21, 28, '0', '2025-11-07 16:41:23'),
(112, 21, 28, '0', '2025-11-07 16:43:42'),
(113, 21, 28, '0', '2025-11-07 16:50:13'),
(114, 21, 28, '0', '2025-11-07 16:50:55'),
(115, 21, 28, '0', '2025-11-07 16:59:22'),
(116, 21, 28, '0', '2025-11-07 17:54:12'),
(117, 21, 28, '0', '2025-11-07 17:54:57'),
(118, 21, 28, '0', '2025-11-07 17:55:30'),
(119, 21, 28, '0', '2025-11-07 17:56:02'),
(120, 21, 28, '0', '2025-11-07 17:58:27'),
(121, 21, 28, '0', '2025-11-07 18:01:03'),
(122, 21, 28, '0', '2025-11-07 18:01:29'),
(123, 21, 28, '0', '2025-11-07 18:02:52'),
(124, 21, 28, '0', '2025-11-07 18:07:22'),
(125, 21, 28, '0', '2025-11-07 18:08:03'),
(126, 21, 28, '0', '2025-11-07 18:08:46'),
(127, 21, 28, '0', '2025-11-07 18:09:16'),
(128, 21, 28, '0', '2025-11-07 18:09:35'),
(129, 21, 28, '0', '2025-11-07 18:10:04'),
(130, 21, 28, '0', '2025-11-07 18:10:23'),
(131, 21, 28, '0', '2025-11-07 18:11:12'),
(132, 21, 28, '0', '2025-11-07 18:12:59'),
(133, 21, 28, '0', '2025-11-07 18:14:16'),
(134, 21, 28, '0', '2025-11-07 18:22:41'),
(135, 21, 28, '0', '2025-11-07 18:24:19'),
(136, 21, 28, '0', '2025-11-07 18:28:29'),
(137, 21, 28, '0', '2025-11-07 18:41:31'),
(138, 21, 28, '0', '2025-11-07 18:50:26'),
(139, 21, 28, '0', '2025-11-07 18:56:11'),
(140, 21, 28, '0', '2025-11-07 19:16:06'),
(141, 21, 28, '0', '2025-11-07 19:16:39'),
(142, 21, 28, '0', '2025-11-07 19:17:21'),
(143, 21, 28, '0', '2025-11-08 03:16:39'),
(144, 21, 28, '0', '2025-11-08 03:27:03'),
(145, 21, 28, '0', '2025-11-08 03:29:43'),
(146, 21, 28, '0', '2025-11-08 03:31:37'),
(147, 21, 28, '0', '2025-11-08 03:35:35'),
(148, 21, 28, '0', '2025-11-08 03:39:24'),
(149, 21, 28, '0', '2025-11-08 03:39:28'),
(150, 21, 28, '0', '2025-11-08 03:39:58'),
(151, 21, 28, '0', '2025-11-08 03:43:16'),
(152, 21, 28, '0', '2025-11-08 03:44:55'),
(153, 21, 28, '0', '2025-11-08 03:50:51'),
(154, 21, 28, '0', '2025-11-08 03:52:52'),
(155, 21, 28, '0', '2025-11-08 03:54:31'),
(156, 21, 28, '1', '2025-11-08 03:54:58'),
(157, 21, 28, '1', '2025-11-08 03:56:45'),
(158, 21, 28, '2', '2025-11-08 03:57:57'),
(159, 21, 28, '2', '2025-11-08 03:59:52'),
(160, 21, 28, '0', '2025-11-09 06:39:34'),
(162, 21, 34, '0', '2025-11-09 07:34:02'),
(163, 21, 34, '0', '2025-11-09 07:37:36'),
(164, 21, 34, '0', '2025-11-09 07:37:41'),
(165, 21, 34, '0', '2025-11-09 07:45:19'),
(166, 21, 34, '0', '2025-11-09 08:17:02'),
(167, 21, 34, '1', '2025-11-09 08:23:38'),
(168, 21, 34, '0', '2025-11-09 08:25:47'),
(169, 21, 34, '1', '2025-11-09 08:31:38'),
(170, 21, 28, '0', '2025-11-09 19:49:50'),
(171, 21, 28, '3', '2025-11-09 19:51:08'),
(172, 21, 38, '0', '2025-11-09 19:59:50'),
(173, 21, 38, '3', '2025-11-09 20:21:42'),
(174, 21, 38, '0', '2025-11-09 20:48:51'),
(175, 21, 38, '0', '2025-11-09 20:59:09'),
(176, 21, 38, '0', '2025-11-09 21:10:37'),
(177, 21, 38, '0', '2025-11-09 21:18:39'),
(178, 21, 38, '0', '2025-11-09 21:19:08'),
(179, 21, 38, '0', '2025-11-09 21:24:55'),
(180, 21, 38, '0', '2025-11-09 21:27:37'),
(181, 21, 38, '0', '2025-11-09 21:35:42'),
(182, 21, 38, '0', '2025-11-09 21:35:59'),
(183, 21, 38, '0', '2025-11-09 21:36:22'),
(184, 21, 38, '0', '2025-11-09 21:41:02'),
(185, 21, 38, '0', '2025-11-09 21:41:36'),
(186, 21, 38, '0', '2025-11-09 21:44:11'),
(187, 21, 38, '0', '2025-11-09 21:46:15'),
(188, 21, 38, '2', '2025-11-10 10:10:12'),
(189, 21, 38, '0', '2025-11-10 10:14:35'),
(190, 21, 38, '0', '2025-11-10 10:15:40'),
(191, 21, 38, '0', '2025-11-10 10:17:05'),
(192, 21, 38, '0', '2025-11-10 10:19:56'),
(193, 21, 38, '0', '2025-11-10 10:22:14'),
(194, 21, 38, '0', '2025-11-10 10:24:23'),
(195, 21, 38, '0', '2025-11-10 10:24:57'),
(196, 21, 38, '0', '2025-11-10 10:27:48'),
(197, 21, 38, '0', '2025-11-10 10:35:45'),
(198, 21, 38, '0', '2025-11-10 10:36:46'),
(199, 21, 38, '1', '2025-11-10 10:39:25'),
(200, 21, 38, '0', '2025-11-10 10:43:24'),
(201, 21, 38, '0', '2025-11-10 11:44:02'),
(202, 21, 38, '0', '2025-11-10 11:45:22'),
(203, 21, 38, '0', '2025-11-10 11:48:12'),
(204, 21, 38, '0', '2025-11-10 11:50:15'),
(205, 21, 38, '0', '2025-11-10 11:53:48'),
(206, 21, 38, '0', '2025-11-10 12:01:40'),
(207, 21, 38, '0', '2025-11-10 12:02:41'),
(208, 21, 38, '0', '2025-11-10 12:04:04'),
(209, 21, 38, '0', '2025-11-10 12:10:46'),
(210, 21, 38, '0', '2025-11-10 12:11:07'),
(211, 21, 38, '0', '2025-11-10 12:11:25'),
(212, 21, 38, '0', '2025-11-10 12:19:26'),
(213, 21, 38, '0', '2025-11-10 12:20:13'),
(214, 21, 38, '0', '2025-11-10 12:22:37'),
(215, 21, 38, '0', '2025-11-10 12:23:59'),
(216, 21, 38, '0', '2025-11-10 12:24:26'),
(217, 21, 38, '0', '2025-11-10 12:24:38'),
(218, 21, 38, '0', '2025-11-10 12:24:56'),
(219, 21, 38, '0', '2025-11-10 12:25:15'),
(220, 21, 38, '0', '2025-11-10 12:25:35'),
(221, 21, 38, '0', '2025-11-10 12:28:24'),
(222, 21, 38, '0', '2025-11-10 12:28:50'),
(223, 21, 38, '0', '2025-11-10 12:41:05'),
(224, 21, 38, '1', '2025-11-10 12:45:06'),
(225, 21, 28, '0', '2025-11-10 12:45:57'),
(226, 21, 28, '1', '2025-11-10 12:50:36'),
(227, 21, 28, '0', '2025-11-10 13:07:48'),
(228, 21, 28, '1', '2025-11-10 13:10:08'),
(229, 21, 38, '0', '2025-11-10 13:11:57'),
(230, 21, 38, '0', '2025-11-10 13:14:12'),
(231, 21, 38, '4', '2025-11-10 13:14:41'),
(232, 21, 38, '1', '2025-11-10 13:16:06'),
(233, 21, 38, '0', '2025-11-10 13:19:58'),
(234, 21, 38, '0', '2025-11-10 13:24:47'),
(235, 21, 38, '1', '2025-11-10 13:29:16'),
(236, 21, 38, '0', '2025-11-10 13:44:23'),
(237, 21, 38, '0', '2025-11-10 13:47:31'),
(238, 21, 38, '0', '2025-11-10 13:48:46'),
(239, 21, 38, '0', '2025-11-10 13:49:17'),
(240, 21, 38, '1', '2025-11-10 13:50:04'),
(241, 21, 38, '0', '2025-11-10 13:51:59'),
(242, 21, 38, '0', '2025-11-10 13:52:33'),
(243, 21, 38, '1', '2025-11-10 13:53:27'),
(244, 21, 38, '0', '2025-11-10 13:55:32'),
(245, 21, 38, '0', '2025-11-10 13:57:39'),
(246, 21, 38, '0', '2025-11-10 14:20:01'),
(247, 21, 38, '0', '2025-11-10 14:23:59'),
(248, 21, 38, '2', '2025-11-10 14:25:52'),
(249, 21, 38, '0', '2025-11-10 14:27:11'),
(250, 21, 38, '0', '2025-11-10 14:28:40'),
(251, 21, 38, '0', '2025-11-10 14:31:57'),
(252, 21, 38, '0', '2025-11-10 14:35:33'),
(253, 21, 38, '0', '2025-11-10 14:40:58'),
(254, 21, 38, '0', '2025-11-10 14:43:01'),
(255, 21, 38, '0', '2025-11-10 14:45:36'),
(256, 21, 38, '4', '2025-11-10 14:57:59'),
(257, 21, 28, '2', '2025-11-10 15:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

DROP TABLE IF EXISTS `student_answers`;
CREATE TABLE IF NOT EXISTS `student_answers` (
  `answer_id` int NOT NULL AUTO_INCREMENT,
  `response_id` int NOT NULL,
  `studentID` int NOT NULL,
  `assessmentID` int NOT NULL,
  `questionID` int NOT NULL,
  `choiceID` int NOT NULL,
  `isCorrect` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`answer_id`),
  KEY `response_id` (`response_id`),
  KEY `assessmentID` (`assessmentID`),
  KEY `questionID` (`questionID`),
  KEY `choiceID` (`choiceID`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`answer_id`, `response_id`, `studentID`, `assessmentID`, `questionID`, `choiceID`, `isCorrect`, `created_at`) VALUES
(54, 154, 21, 28, 36, 114, 0, '2025-11-10 16:02:53'),
(53, 154, 21, 28, 41, 137, 1, '2025-11-10 16:02:53'),
(52, 154, 21, 28, 37, 118, 0, '2025-11-10 16:02:53'),
(51, 153, 21, 28, 40, 131, 0, '2025-11-10 16:02:53'),
(50, 153, 21, 28, 37, 120, 1, '2025-11-10 16:02:53'),
(49, 153, 21, 28, 36, 115, 0, '2025-11-10 16:02:53'),
(48, 153, 21, 28, 41, 135, 0, '2025-11-10 16:02:53'),
(47, 152, 21, 28, 37, 121, 0, '2025-11-10 16:02:53'),
(46, 152, 21, 28, 41, 137, 1, '2025-11-10 16:02:53'),
(45, 152, 21, 28, 36, 116, 1, '2025-11-10 16:02:53'),
(44, 152, 21, 28, 40, 130, 0, '2025-11-10 16:02:53'),
(43, 151, 21, 28, 41, 137, 1, '2025-11-10 16:02:53'),
(42, 151, 21, 28, 37, 121, 0, '2025-11-10 16:02:53'),
(41, 151, 21, 28, 36, 116, 1, '2025-11-10 16:02:53'),
(40, 151, 21, 28, 40, 130, 0, '2025-11-10 16:02:53'),
(39, 150, 21, 28, 37, 120, 1, '2025-11-10 16:02:53'),
(38, 150, 21, 28, 40, 131, 0, '2025-11-10 16:02:53'),
(37, 150, 21, 28, 41, 136, 0, '2025-11-10 16:02:53'),
(36, 150, 21, 28, 36, 116, 1, '2025-11-10 16:02:53'),
(35, 142, 21, 28, 41, 134, 0, '2025-11-10 16:02:53'),
(34, 142, 21, 28, 40, 130, 0, '2025-11-10 16:02:53'),
(33, 142, 21, 28, 37, 121, 0, '2025-11-10 16:02:53'),
(32, 142, 21, 28, 36, 114, 0, '2025-11-10 16:02:53'),
(31, 139, 21, 28, 40, 131, 0, '2025-11-10 16:02:53'),
(30, 139, 21, 28, 41, 136, 0, '2025-11-10 16:02:53'),
(29, 139, 21, 28, 37, 119, 0, '2025-11-10 16:02:53'),
(28, 139, 21, 28, 36, 115, 0, '2025-11-10 16:02:53'),
(55, 154, 21, 28, 40, 132, 0, '2025-11-10 16:02:53'),
(56, 155, 21, 28, 37, 119, 0, '2025-11-10 16:02:53'),
(57, 155, 21, 28, 36, 115, 0, '2025-11-10 16:02:53'),
(58, 155, 21, 28, 40, 130, 0, '2025-11-10 16:02:53'),
(59, 155, 21, 28, 41, 136, 0, '2025-11-10 16:02:53'),
(60, 156, 21, 28, 40, 133, 1, '2025-11-10 16:02:53'),
(61, 156, 21, 28, 36, 117, 0, '2025-11-10 16:02:53'),
(62, 156, 21, 28, 41, 135, 0, '2025-11-10 16:02:53'),
(63, 156, 21, 28, 37, 118, 0, '2025-11-10 16:02:53'),
(64, 157, 21, 28, 37, 120, 1, '2025-11-10 16:02:53'),
(65, 157, 21, 28, 36, 114, 0, '2025-11-10 16:02:53'),
(66, 157, 21, 28, 41, 134, 0, '2025-11-10 16:02:53'),
(67, 157, 21, 28, 40, 133, 1, '2025-11-10 16:02:53'),
(68, 158, 21, 28, 36, 116, 1, '2025-11-10 16:02:53'),
(69, 158, 21, 28, 40, 133, 1, '2025-11-10 16:02:53'),
(70, 158, 21, 28, 41, 136, 0, '2025-11-10 16:02:53'),
(71, 158, 21, 28, 37, 120, 1, '2025-11-10 16:02:53'),
(72, 159, 21, 28, 36, 116, 1, '2025-11-10 16:02:53'),
(73, 159, 21, 28, 40, 133, 1, '2025-11-10 16:02:53'),
(74, 159, 21, 28, 37, 121, 0, '2025-11-10 16:02:53'),
(75, 159, 21, 28, 41, 135, 0, '2025-11-10 16:02:53'),
(76, 165, 21, 34, 77, 278, 1, '2025-11-10 16:02:53'),
(77, 167, 21, 34, 77, 278, 1, '2025-11-10 16:02:53'),
(78, 169, 21, 34, 77, 278, 1, '2025-11-10 16:02:53'),
(79, 171, 21, 28, 37, 120, 1, '2025-11-10 16:02:53'),
(80, 171, 21, 28, 36, 116, 1, '2025-11-10 16:02:53'),
(81, 171, 21, 28, 41, 136, 0, '2025-11-10 16:02:53'),
(82, 171, 21, 28, 40, 133, 1, '2025-11-10 16:02:53'),
(83, 173, 21, 38, 82, 298, 1, '2025-11-10 16:02:53'),
(84, 173, 21, 38, 81, 296, 1, '2025-11-10 16:02:53'),
(85, 173, 21, 38, 79, 288, 1, '2025-11-10 16:02:53'),
(86, 173, 21, 38, 83, 303, 0, '2025-11-10 16:02:53'),
(87, 173, 21, 38, 80, 292, 0, '2025-11-10 16:02:53'),
(88, 178, 21, 38, 80, 293, 0, '2025-11-10 16:02:53'),
(89, 178, 21, 38, 82, 301, 0, '2025-11-10 16:02:53'),
(90, 180, 21, 38, 81, 296, 1, '2025-11-10 16:02:53'),
(91, 184, 21, 38, 81, 297, 0, '2025-11-10 16:02:53'),
(92, 185, 21, 38, 79, 289, 0, '2025-11-10 16:02:53'),
(93, 188, 21, 38, 82, 299, 0, '2025-11-10 18:10:26'),
(94, 188, 21, 38, 79, 288, 1, '2025-11-10 18:11:20'),
(95, 188, 21, 38, 80, 290, 1, '2025-11-10 18:11:32'),
(96, 188, 21, 38, 83, 305, 0, '2025-11-10 18:11:42'),
(97, 188, 21, 38, 81, 295, 0, '2025-11-10 18:12:00'),
(98, 199, 21, 38, 80, 291, 0, '2025-11-10 18:40:34'),
(99, 199, 21, 38, 79, 289, 0, '2025-11-10 18:40:40'),
(100, 199, 21, 38, 82, 300, 0, '2025-11-10 18:40:46'),
(101, 199, 21, 38, 83, 302, 1, '2025-11-10 18:40:50'),
(102, 199, 21, 38, 81, 295, 0, '2025-11-10 18:40:53'),
(103, 224, 21, 38, 82, 298, 1, '2025-11-10 20:45:37'),
(104, 226, 21, 28, 37, 120, 1, '2025-11-10 20:50:50'),
(105, 227, 21, 28, 40, 131, 0, '2025-11-10 21:07:50'),
(106, 228, 21, 28, 41, 137, 1, '2025-11-10 21:10:10'),
(107, 228, 21, 28, 40, 130, 0, '2025-11-10 21:10:19'),
(108, 228, 21, 28, 36, 117, 0, '2025-11-10 21:11:39'),
(109, 228, 21, 28, 37, 119, 0, '2025-11-10 21:11:41'),
(110, 229, 21, 38, 83, 304, 0, '2025-11-10 21:13:57'),
(111, 230, 21, 38, 79, 287, 0, '2025-11-10 21:14:14'),
(112, 230, 21, 38, 82, 300, 0, '2025-11-10 21:14:18'),
(113, 230, 21, 38, 81, 294, 0, '2025-11-10 21:14:20'),
(114, 230, 21, 38, 80, 292, 0, '2025-11-10 21:14:23'),
(115, 230, 21, 38, 83, 304, 0, '2025-11-10 21:14:25'),
(116, 231, 21, 38, 81, 297, 0, '2025-11-10 21:14:46'),
(117, 231, 21, 38, 82, 298, 1, '2025-11-10 21:14:50'),
(118, 231, 21, 38, 83, 302, 1, '2025-11-10 21:14:54'),
(119, 231, 21, 38, 79, 288, 1, '2025-11-10 21:14:58'),
(120, 231, 21, 38, 80, 290, 1, '2025-11-10 21:15:03'),
(121, 232, 21, 38, 82, 298, 1, '2025-11-10 21:16:09'),
(122, 233, 21, 38, 80, 293, 0, '2025-11-10 21:20:40'),
(123, 235, 21, 38, 83, 302, 1, '2025-11-10 21:29:20'),
(124, 237, 21, 38, 82, 301, 0, '2025-11-10 21:47:33'),
(125, 240, 21, 38, 80, 290, 1, '2025-11-10 21:50:15'),
(126, 240, 21, 38, 79, 289, 0, '2025-11-10 21:50:18'),
(127, 240, 21, 38, 81, 297, 0, '2025-11-10 21:50:21'),
(128, 240, 21, 38, 82, 299, 0, '2025-11-10 21:50:23'),
(129, 240, 21, 38, 83, 305, 0, '2025-11-10 21:50:25'),
(130, 243, 21, 38, 79, 288, 1, '2025-11-10 21:53:44'),
(131, 243, 21, 38, 80, 292, 0, '2025-11-10 21:54:21'),
(132, 243, 21, 38, 82, 301, 0, '2025-11-10 21:54:53'),
(133, 244, 21, 38, 82, 301, 0, '2025-11-10 21:55:42'),
(134, 248, 21, 38, 80, 290, 1, '2025-11-10 22:25:59'),
(135, 248, 21, 38, 83, 302, 1, '2025-11-10 22:26:50'),
(136, 249, 21, 38, 81, 297, 0, '2025-11-10 22:27:45'),
(137, 251, 21, 38, 81, 295, 0, '2025-11-10 22:32:02'),
(138, 254, 21, 38, 82, 299, 0, '2025-11-10 22:43:05'),
(139, 256, 21, 38, 83, 302, 1, '2025-11-10 22:58:04'),
(140, 256, 21, 38, 82, 298, 1, '2025-11-10 22:58:15'),
(141, 256, 21, 38, 80, 290, 1, '2025-11-10 22:58:23'),
(142, 256, 21, 38, 81, 297, 0, '2025-11-10 22:58:30'),
(143, 256, 21, 38, 79, 288, 1, '2025-11-10 22:58:39'),
(144, 257, 21, 28, 40, 131, 0, '2025-11-10 23:01:35'),
(145, 257, 21, 28, 41, 137, 1, '2025-11-10 23:01:41'),
(146, 257, 21, 28, 36, 114, 0, '2025-11-10 23:01:44'),
(147, 257, 21, 28, 37, 120, 1, '2025-11-10 23:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subjectCode`, `subject_name`, `subject_comment`, `date_created`) VALUES
(1, 'Sub3212_1', 'Math', 'The assessments are a series of short interviews that go beyond “getting the right answers” to reveal students\' true understanding. ', '2023-09-23 07:50:51'),
(2, 'Sub70077_2', 'Science', 'A \"science subject\" refers to any field of study that explores and explains the natural world through systematic observation, experimentation, and evidence-based reasoning, such as biology, chemistry, physics, or astronomy.', '2023-09-23 07:53:21'),
(3, 'Sub61543_3', 'English', 'This is an English Subject', '2023-10-15 17:57:17'),
(5, 'Sub98674_5', 'Filipino', '', '2025-07-22 04:56:35'),
(6, 'Sub12085_6', 'Data Structures And Algorithm', 'Good for practicing DSA with the use of Python programming langauge', '2025-11-05 05:55:17'),
(7, 'Sub38175_7', 'Data Structures And Algorithm', 'DSA wiht python', '2025-11-05 05:56:51'),
(8, 'Sub80421_8', 'Readings In Philippine Historu', 'Delve dive into the past and remarkable history of our homeland, its significant events and notable person. ', '2025-11-09 19:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `teachersubjects`
--

DROP TABLE IF EXISTS `teachersubjects`;
CREATE TABLE IF NOT EXISTS `teachersubjects` (
  `TeacherSubjectID` int NOT NULL AUTO_INCREMENT,
  `TeacherID` int NOT NULL,
  `SubjectID` int NOT NULL,
  PRIMARY KEY (`TeacherSubjectID`),
  KEY `teachersubjects_user_id_fr` (`TeacherID`),
  KEY `teachersubjects_subject_id_fr` (`SubjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `userCode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `suffix` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0' COMMENT '0 =  admin\r\n1 = teachers\r\n2 = students',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1 = Active\r\n2 = Inactive',
  `profile_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userCode`, `fname`, `lname`, `suffix`, `email`, `username`, `password`, `role_as`, `status`, `profile_img`, `created_at`) VALUES
(19, 'admin001', 'lmsPrototype', 'Admin', NULL, 'protopisa2023@gmail.com', 'lmsprototype', 'protopisaadmin', 0, 1, '', '2023-10-15 14:19:34'),
(21, 'S57867_21', 'Test', 'Student', '', 'teststudent23@gmail.com', 'teststudent23', 'password123', 2, 3, '', '2023-10-15 15:16:07'),
(22, 'T28720_22', 'Test', 'Teacher', '', 'testteacher23@gmail.com', 'testteacher23', 'password123', 1, 3, '', '2023-10-15 15:20:03'),
(25, 'S93750_25', 'Kristine', 'Nacional', '', 'kjnacional11@gmail.com', 'kristhayne', 'kristhayne', 2, 3, '', '2024-12-15 13:21:47'),
(26, 'T26892_26', 'Faye Joy', 'Delos Reyes', '', 'delosreyes1902690@ceu.edu.ph', 'SciTeach1', 'SciTeach1', 1, 1, '', '2025-05-26 02:57:45'),
(30, 'S45710_30', 'Romnick', 'Oliva', '', 'romnickfuncion@gmail.com', 'Nick', 'nickaabb123', 2, 1, '', '2025-07-30 07:31:50');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_subject_id_fr` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assessment_teacher_id_fr` FOREIGN KEY (`teacherID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_question_id_fr` FOREIGN KEY (`questionID`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `question_assessment_id_fr` FOREIGN KEY (`assessmentID`) REFERENCES `assessment` (`assessment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentresponse`
--
ALTER TABLE `studentresponse`
  ADD CONSTRAINT `studentresponse_assessment_id_fr` FOREIGN KEY (`assessmentID`) REFERENCES `assessment` (`assessment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentresponse_student_id_fr` FOREIGN KEY (`studentID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachersubjects`
--
ALTER TABLE `teachersubjects`
  ADD CONSTRAINT `teachersubjects_subject_id_fr` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachersubjects_user_id_fr` FOREIGN KEY (`TeacherID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
