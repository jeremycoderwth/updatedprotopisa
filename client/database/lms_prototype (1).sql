-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 06:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assessment_id` int(11) NOT NULL,
  `assessmentCode` varchar(100) NOT NULL,
  `assessment_name` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `subjectID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 - published\r\n1 - hidden',
  `attach_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessment_id`, `assessmentCode`, `assessment_name`, `comment`, `subjectID`, `teacherID`, `status`, `attach_file`) VALUES
(18, 'Test54273_18', 'Fundamentals of Mathematics III', 'This is a sample assessment for Fundamentals of Mathematics', 1, 17, 0, 'math-1569525694.jpg'),
(19, 'Test69373_19', 'Fundamentals of Science I', 'This is a sample assessment for Fundamentals of Science', 2, 1, 0, 'evolution_of_science.jpg'),
(20, 'Test16897_20', 'Science Education', 'Science Education', 2, 1, 0, '3d-casual-life-searching-for-idea.png');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choice_id` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `choiceText` varchar(500) NOT NULL,
  `IsCorrectChoice` tinyint(1) NOT NULL COMMENT '0 = true\r\n1 = False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `questionID`, `choiceText`, `IsCorrectChoice`) VALUES
(46, 19, 'this is not the first question', 1),
(47, 19, 'this is wrong', 1),
(48, 19, 'Yes, this is the first question', 0),
(49, 19, 'I hope it works', 1),
(62, 23, 'This has an image', 0),
(63, 23, 'No there\'s none', 1),
(64, 23, 'No image', 1),
(65, 23, 'bad attachment', 1),
(70, 25, 'This has an image only', 1),
(71, 25, 'This has a video only', 1),
(72, 25, 'There is no attachment', 1),
(73, 25, 'This has both video and image file', 0),
(74, 26, 'Zoro', 1),
(75, 26, 'Luffy', 0),
(76, 26, 'Nami', 1),
(77, 26, 'Ussop', 1),
(78, 27, 'Yes you did', 0),
(79, 27, 'I don\'t see anything', 1),
(80, 27, 'Well...', 1),
(81, 27, 'Nope I don\'t see one', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `assessmentID` int(11) NOT NULL,
  `questionText` varchar(500) NOT NULL,
  `image_attachment` varchar(500) DEFAULT NULL,
  `video_attachment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `assessmentID`, `questionText`, `image_attachment`, `video_attachment`) VALUES
(19, 18, 'This is the first question', NULL, NULL),
(23, 18, 'This is a question with an image attachment', '119550117_4723238171027658_7119559229916635353_n.jpg', ''),
(25, 18, 'This question has video and image attachments', '377442083_712290830940178_6891067075224567977_n.jpg', 'RCRSystem - Google Chrome 2023-05-01 14-56-05.mp4'),
(26, 18, 'Who is the captain of the Strawhats Pirates?', '', ''),
(27, 19, 'I have added a question', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentresponse`
--

CREATE TABLE `studentresponse` (
  `response_id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `assessmentID` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `date_answered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentresponse`
--

INSERT INTO `studentresponse` (`response_id`, `studentID`, `assessmentID`, `score`, `date_answered`) VALUES
(43, 1, 19, '1', '2023-09-29 05:55:43'),
(44, 8, 18, '2', '2023-09-29 05:57:35'),
(48, 1, 19, '1', '2023-09-29 06:01:05'),
(49, 1, 18, '1', '2023-09-29 10:35:00'),
(50, 1, 18, '2', '2023-09-29 14:00:59'),
(51, 1, 19, '0', '2023-09-29 14:05:20'),
(52, 1, 18, '2', '2023-09-29 14:05:53'),
(53, 1, 18, '2', '2023-09-29 14:26:13'),
(54, 1, 18, '1', '2023-09-29 15:59:51'),
(55, 17, 18, '1', '2023-09-29 17:29:06'),
(56, 17, 19, '0', '2023-09-29 17:59:06'),
(57, 17, 18, '1', '2023-09-30 02:51:34'),
(58, 17, 19, '1', '2023-09-30 02:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subjectCode` varchar(100) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `subject_comment` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subjectCode`, `subject_name`, `subject_comment`, `date_created`) VALUES
(1, 'Sub3212_1', 'Math', 'The assessments are a series of short interviews that go beyond “getting the right answers” to reveal students\' true understanding. ', '2023-09-23 07:50:51'),
(2, 'Sub70077_2', 'Science', 'A \"science subject\" refers to any field of study that explores and explains the natural world through systematic observation, experimentation, and evidence-based reasoning, such as biology, chemistry, physics, or astronomy.', '2023-09-23 07:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `teachersubjects`
--

CREATE TABLE `teachersubjects` (
  `TeacherSubjectID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `userCode` varchar(100) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 =  admin\r\n1 = teachers\r\n2 = students',
  `status` tinyint(11) NOT NULL DEFAULT 1 COMMENT '1 = Active\r\n2 = Inactive',
  `profile_img` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userCode`, `fname`, `lname`, `suffix`, `email`, `username`, `password`, `role_as`, `status`, `profile_img`, `created_at`) VALUES
(1, 'admin001', 'Kristine Joy', 'Nacional', NULL, 'kjnacional11@gmail.com', 'kris', '', 0, 1, '1_8acd78e757708f871cb8cd8976c733b0.jpg', '2023-09-16 21:14:12'),
(3, 'T19002_3', 'Anthony', 'Marcus', 'III', 'AnthonyMarcus1@gmail.com', 'anthonyM', 'ZhThwPTndD', 1, 1, '', '2023-09-18 15:22:57'),
(4, 'T47646_4', 'Allaine ', 'De La Fuente', '', 'allain_D@gmail.com', 'allain_D', 'RdQA2nH3qd', 1, 1, '', '2023-09-18 18:58:24'),
(5, 'T40313_5', 'Anna Mae', 'Reyes', '', 'annaMae@gmail.com', 'anna_mae', 'lrMweSisFD', 1, 1, '', '2023-09-18 18:59:10'),
(6, 'T98765_6', 'Raymond', 'Santos', 'Jr.', 'santos_ray@gmail.com', 'santosRay', 'nAaiuKzTJA', 1, 1, '', '2023-09-18 18:59:53'),
(7, 'T52813_7', 'Crisanto', 'Sero', 'III', 'sero_cris@gmail.com', 'Crisanto_S', '7JPUJTfih7', 1, 1, '', '2023-09-18 19:00:36'),
(8, 'T53165_8', 'Susana Marie', 'Reyes', '', 'susana_marie@gmail.com', 'susana', '30ssnucgO4', 1, 2, '', '2023-09-18 19:02:44'),
(9, 'T16922_9', 'Melivic', 'Garcia', 'III', 'melivic_garcia@gmail.com', 'melciaa', 'password', 1, 1, '8acd78e757708f871cb8cd8976c733b0.jpg', '2023-09-18 19:03:17'),
(10, 'T4571_10', 'Erica Marie', 'Manalo', '', 'erica_manalo@gmail.com', 'erica_marie', 'pwo2VzPMbk', 1, 1, '', '2023-09-18 19:05:06'),
(11, 'T62633_11', 'Samantha', 'Aguilar', '', 'samantha_aguilar@gmail.com', 'sammy_A', 'RQcGiM9f2k', 1, 1, '', '2023-09-18 19:10:59'),
(12, 'T15310_12', 'Alexander', 'Cepe', '', 'cepe_alexander@gmail.com', 'alexcepe', 'X0jRa7JlVt', 1, 2, '', '2023-09-18 19:25:32'),
(13, 'T23090_13', 'Angel May', 'Garcia', '', 'angel_garcia@gmail.com', 'angel_cia', 'WY9FBg80N9', 1, 2, '', '2023-09-18 19:26:01'),
(14, 'T59484_14', 'Samuel', 'Checa', 'Jr.', 'Samuel_Checa@gmail.com', 'samychec', 'Pinw71M7Do', 1, 1, '', '2023-09-18 20:25:50'),
(15, 'T57891_15', 'Antoinette', 'Dela Cruz', '', 'AntoinetteDelaCruz@gmail.com', 'tonett', 'kCeBetEiC6', 1, 1, '', '2023-09-18 20:32:45'),
(16, 'T3821_16', 'Alexa', 'Anton', '', 'alexa_anton@gmail.com', 'alexa', 'K1Wi2g4mgW', 1, 1, '', '2023-09-18 23:50:32'),
(17, 'S92633_17', 'Kristine Joy', 'Nacional', '', 'nacional.kristinejoy.s.5479@gmail.com', 'kristhayne', 'password', 2, 1, '', '2023-09-20 00:04:48'),
(18, 'T91732_18', 'Kimberly', 'Santos', '', 'KimberlySantos@gmail.com', 'kimSantos', 'v1q6wNuBTp', 1, 1, '', '2023-09-23 04:23:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `assessment_subject_id_fr` (`subjectID`),
  ADD KEY `assessment_teacher_id_fr` (`teacherID`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `choices_question_id_fr` (`questionID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_assessment_id_fr` (`assessmentID`);

--
-- Indexes for table `studentresponse`
--
ALTER TABLE `studentresponse`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `studentresponse_student_id_fr` (`studentID`),
  ADD KEY `studentresponse_assessment_id_fr` (`assessmentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachersubjects`
--
ALTER TABLE `teachersubjects`
  ADD PRIMARY KEY (`TeacherSubjectID`),
  ADD KEY `teachersubjects_user_id_fr` (`TeacherID`),
  ADD KEY `teachersubjects_subject_id_fr` (`SubjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `studentresponse`
--
ALTER TABLE `studentresponse`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachersubjects`
--
ALTER TABLE `teachersubjects`
  MODIFY `TeacherSubjectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
