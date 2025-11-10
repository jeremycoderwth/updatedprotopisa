-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: u741634386_pisaproto
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assessment` (
  `assessment_id` int NOT NULL AUTO_INCREMENT,
  `assessmentCode` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `assessment_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `subjectID` int NOT NULL,
  `teacherID` int NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - published\r\n1 - hidden',
  `attach_file` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`assessment_id`),
  KEY `assessment_subject_id_fr` (`subjectID`),
  KEY `assessment_teacher_id_fr` (`teacherID`),
  CONSTRAINT `assessment_subject_id_fr` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `assessment_teacher_id_fr` FOREIGN KEY (`teacherID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment`
--

LOCK TABLES `assessment` WRITE;
/*!40000 ALTER TABLE `assessment` DISABLE KEYS */;
INSERT INTO `assessment` VALUES (25,'Test77066_25','Literary Analysis Challenge','This assessment is designed to evaluate 15-year-old students\' skills in literary analysis and comprehension. Students will read a short passage from a classic novel and answer multiple-choice questions to demonstrate their understanding of the text and its literary elements.',3,22,0,'../assessment-files/it_was_one_of_those_march_days_when_the_sun_shines_hot.gif'),(27,'Test16379_27','Addition','to test the adding skills',1,19,0,'../assessment-files/addition.jpg'),(28,'Test5442_28','VOLCANOES','1. To evaluate learner&#39;s knowledge about Earth and Space\r\n2. To address deficiencies on the subject',2,19,0,'asda.jpg'),(29,'Test23985_29','CLIMATE','1. To point out how climate changes from the past up to present.\r\n2. To evaluate greenhouse gas emissions that contributes to climate change\r\n3. To obtain the trend on how climate changes ',2,19,0,'DIGITALIZED EXAM.png'),(30,'Test23147_30','Subtraction','',1,19,1,'../assessment-files/AY 25-26, 1ST SEM (2).png');
/*!40000 ALTER TABLE `assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `choices` (
  `choice_id` int NOT NULL AUTO_INCREMENT,
  `questionID` int NOT NULL,
  `choiceText` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `IsCorrectChoice` tinyint(1) NOT NULL COMMENT '0 = true\r\n1 = False',
  PRIMARY KEY (`choice_id`),
  KEY `choices_question_id_fr` (`questionID`),
  CONSTRAINT `choices_question_id_fr` FOREIGN KEY (`questionID`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choices`
--

LOCK TABLES `choices` WRITE;
/*!40000 ALTER TABLE `choices` DISABLE KEYS */;
INSERT INTO `choices` VALUES (90,30,'To Create a sense of unease',1),(91,30,'To emphasize the beauty of March',1),(92,30,'To Convey the unpredictability of the weather',0),(93,30,'To highlight the protagonist\'s emotions',1),(114,36,'Mayon volcano',1),(115,36,'Taal volcano',1),(116,36,'Bulusan volcano',0),(117,36,'Smith volcano',1),(118,37,'Lava flow',0),(119,37,'Ashfall',0),(120,37,'Incandescence at the base of the plume',0),(121,37,'Rumbling sounds',1),(126,39,'Disaster preparedness was needed when eruption starts',1),(127,39,'Disaster preparedness was only a requirement submitted by the barangay',1),(128,39,'Disaster preparedness was not applied in inactive volcanoes',1),(129,39,'Disaster preparedness came from past patterns that indicate possible eruption',1),(130,40,'Lava plateau',1),(131,40,'Submarine vents',1),(132,40,'Craters on the Southeast flank',0),(133,40,'Caldera lava domes',0),(134,41,'This activities was used as the primary cause lava to flow from the volcano',1),(135,41,'The data was used to confirm that the volcano was extinct',1),(136,41,'The data showed that these earthquakes can cause massive infrastructure destruction',1),(137,41,'The data can be used to monitor potential eruptions',0),(138,42,'Flourinated gas',1),(139,42,'Carbon Dioxide',1),(140,42,'Methane',1),(141,42,'Nitrous oxide',0),(142,43,'Climate\'s condition over the century',1),(143,43,'Changes in climate cause sea levels to rise',1),(144,43,'Humans added greenhouse gases emissions',1),(145,43,'Climate\'s conditions over the past century up to 2019',0),(150,45,'High percentage of carbon dioxide in the greenhouse gases were placed in ozone layer',1),(151,45,'Changes in climate cause sea levels to rise',1),(152,45,'Increase in temperature will be the major effect of huge greenhouse gases emissions',0),(153,45,'This will cause changes of weather',1),(154,46,'A minimal increase was recorded',1),(155,46,'A huge increase was recorded as compared to other gases',0),(156,46,'It decreased drastically',1),(157,46,'No changes were noted',1),(158,47,'All gasses increased in both volume and proportion.',1),(159,47,'Although CO₂ FFI had the highest overall rise, F-gases had the highest relative percentage increase.',0),(160,47,'CH₄ and CO₂ LULUCF saw the most significant increase in emissions and percentage.',1),(161,47,'Although nitrous oxide levels remained constant, total emissions climbed.',1),(162,48,'1',1),(163,48,'3',1),(164,48,'2',1),(165,48,'4',0);
/*!40000 ALTER TABLE `choices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `assessmentID` int NOT NULL,
  `questionText` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `image_attachment` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `video_attachment` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rationale` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`question_id`),
  KEY `question_assessment_id_fr` (`assessmentID`),
  CONSTRAINT `question_assessment_id_fr` FOREIGN KEY (`assessmentID`) REFERENCES `assessment` (`assessment_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (30,25,'What is the Author\'s purpose in using contrasting imagery in this passage?','','',NULL),(36,28,'Which among the volcanoes was referred in the passage?','','',NULL),(37,28,'Which of the following was considered the impact during the eruption? Choose all that applies.','','',NULL),(39,28,'How can a disaster preparedness plan essential on nearby communities living near a volcano even if it was categorized as an inactive?','','',NULL),(40,28,'Which of the following was considered as the geographic features of the volcano?','','',NULL),(41,28,'It was noted that seismic activities were recorded before the eruption. How can this data can be of use by the concerned agencies?','','',NULL),(42,29,'Which greenhouse gas in the global net anthropogenic GHG emissions in 2019 was considered as the predominant contributor?','','',NULL),(43,29,'Based on the given graph, what does the report imply?','','',NULL),(45,29,'How can it can be concluded that carbon dioxide from fossil fuels and industries mostly contribute in greenhouse gas emissions?','','',NULL),(46,29,'How can flourinated gas emissions in the table be compared with other GHGs?','','',NULL),(47,29,'How can the correlation between the change in overall GHG emissions and the individual gases from 1990 to 2019 be described?','','',NULL),(48,29,'BIG BIG BIG TESTING','','','TESTING RATIONALE');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentresponse`
--

DROP TABLE IF EXISTS `studentresponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studentresponse` (
  `response_id` int NOT NULL AUTO_INCREMENT,
  `studentID` int NOT NULL,
  `assessmentID` int NOT NULL,
  `score` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date_answered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`response_id`),
  KEY `studentresponse_student_id_fr` (`studentID`),
  KEY `studentresponse_assessment_id_fr` (`assessmentID`),
  CONSTRAINT `studentresponse_assessment_id_fr` FOREIGN KEY (`assessmentID`) REFERENCES `assessment` (`assessment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `studentresponse_student_id_fr` FOREIGN KEY (`studentID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentresponse`
--

LOCK TABLES `studentresponse` WRITE;
/*!40000 ALTER TABLE `studentresponse` DISABLE KEYS */;
INSERT INTO `studentresponse` VALUES (82,24,27,'1','2024-12-23 01:08:51'),(83,24,27,'1','2024-12-23 01:09:40'),(84,19,28,'0','2025-05-26 02:58:40'),(85,19,28,'0','2025-05-26 03:43:42'),(86,29,28,'1','2025-07-30 07:30:05'),(87,29,29,'0','2025-07-30 07:31:47'),(88,29,25,'0','2025-07-30 07:34:05'),(89,30,28,'0','2025-07-30 07:35:08'),(90,30,29,'0','2025-07-30 07:36:29'),(91,30,25,'0','2025-07-30 07:37:06'),(92,29,28,'3','2025-07-30 07:37:56'),(93,29,28,'2','2025-07-30 07:40:57'),(94,31,29,'0','2025-08-01 01:26:49'),(95,21,25,'0','2025-08-14 12:25:36');
/*!40000 ALTER TABLE `studentresponse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `subject_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `subject_comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'Sub3212_1','Math','The assessments are a series of short interviews that go beyond “getting the right answers” to reveal students\' true understanding. ','2023-09-23 07:50:51'),(2,'Sub70077_2','Science','A \"science subject\" refers to any field of study that explores and explains the natural world through systematic observation, experimentation, and evidence-based reasoning, such as biology, chemistry, physics, or astronomy.','2023-09-23 07:53:21'),(3,'Sub61543_3','English','This is an English Subject','2023-10-15 17:57:17'),(5,'Sub98674_5','Filipino','','2025-07-22 04:56:35');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachersubjects`
--

DROP TABLE IF EXISTS `teachersubjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachersubjects` (
  `TeacherSubjectID` int NOT NULL AUTO_INCREMENT,
  `TeacherID` int NOT NULL,
  `SubjectID` int NOT NULL,
  PRIMARY KEY (`TeacherSubjectID`),
  KEY `teachersubjects_user_id_fr` (`TeacherID`),
  KEY `teachersubjects_subject_id_fr` (`SubjectID`),
  CONSTRAINT `teachersubjects_subject_id_fr` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teachersubjects_user_id_fr` FOREIGN KEY (`TeacherID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachersubjects`
--

LOCK TABLES `teachersubjects` WRITE;
/*!40000 ALTER TABLE `teachersubjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachersubjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `userCode` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `suffix` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0' COMMENT '0 =  admin\r\n1 = teachers\r\n2 = students',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1 = Active\r\n2 = Inactive',
  `profile_img` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (19,'admin001','lmsPrototype','Admin',NULL,'protopisa2023@gmail.com','lmsprototype','lmsprototypePassword',0,1,'','2023-10-15 14:19:34'),(20,'S79925_20','Test','Students','','TestStudent@gmail.com','teststudent','password123',2,1,'','2023-10-15 15:14:13'),(21,'S57867_21','Test','Student','','teststudent23@gmail.com','teststudent23','password123',2,3,'','2023-10-15 15:16:07'),(22,'T28720_22','Test','Teacher','','testteacher23@gmail.com','testteacher23','password123',1,3,'','2023-10-15 15:20:03'),(23,'S68962_23','Test','Student','','teststudent23@gmail.com','teststudent23','password123',2,1,'','2023-10-15 15:22:12'),(24,'S45509_24','Jhan Mar','Mergal','','jhanmars07@gmail.com','jmdm18','haveFAITH27',2,3,'','2024-12-15 07:17:59'),(25,'S93750_25','Kristine','Nacional','','kjnacional11@gmail.com','kristhayne','kristhayne',2,3,'','2024-12-15 13:21:47'),(26,'T26892_26','Faye Joy','Delos Reyes','','delosreyes1902690@ceu.edu.ph','SciTeach1','SciTeach1',1,1,'','2025-05-26 02:57:45'),(27,'T67141_27','Faye Joy','Delos Reyes','','delosreyes1902690@ceu.edu.ph','SciTeach1','SciTeach1',1,1,'','2025-05-26 02:57:45'),(28,'S61624_28','Faye','Delos Reyes','','fayedr29@gmail.com','fayedr29@gmail.com','Delosreyes29',2,1,'','2025-07-15 14:12:49'),(29,'S12598_29','Ronnel','Febra','','ronnelfebra19@gmail.com','ronnelfebra19@gmail.com','Babyrj@01',2,1,'','2025-07-30 07:28:35'),(30,'S45710_30','Romnick','Oliva','','romnickfuncion@gmail.com','Nick','nickaabb123',2,1,'','2025-07-30 07:31:50'),(31,'S78661_31','Alma','Jocson','','alma.jocson@yahoo.com','almajocson','12345678',2,1,'','2025-08-01 01:24:27'),(32,'S88713_32','Romeo','Tan','','romeo102611@gmail.com','Rome0417','Arian#26',2,1,'','2025-08-06 04:29:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-14 21:43:08
