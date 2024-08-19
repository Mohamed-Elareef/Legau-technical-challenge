-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: legau_public
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `court_decisions_court_decisions`
--

DROP TABLE IF EXISTS `court_decisions_court_decisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_decisions_court_decisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
   `case_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `redactor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `court_id` bigint unsigned NOT NULL,
  `summary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `full_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `court_report` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `argumentation_parties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `argumentation_court` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `decision` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `judgements_court_id_foreign` (`court_id`),
  KEY `date` (`date`),
  KEY `source_url` (`source`),
  KEY `process_number` (`process_number`),
  FULLTEXT KEY `search_text` (`summary`,`full_text`,`court_report`,`facts`,`argumentation_parties`,`argumentation_court`,`decision`),
  FULLTEXT KEY `summary_full_text_index` (`summary`,`full_text`),
  CONSTRAINT `judgements_court_id_foreign` FOREIGN KEY (`court_id`) REFERENCES `court_decisions_courts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `court_decisions_courts`
--

DROP TABLE IF EXISTS `court_decisions_courts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_decisions_courts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('civil','fiscal','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `court_decisions_tags`
--

DROP TABLE IF EXISTS `court_decisions_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_decisions_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `court_decisions_tags_to_court_decisions`
--

DROP TABLE IF EXISTS `court_decisions_tags_to_court_decisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_decisions_tags_to_court_decisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judgement_id` bigint unsigned NOT NULL,
  `judgement_tag_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueness` (`judgement_id`,`judgement_tag_id`),
  KEY `judgement_tags_to_judgements_judgement_tag_id_foreign` (`judgement_tag_id`),
  CONSTRAINT `judgement_tags_to_judgements_judgement_id_foreign` FOREIGN KEY (`judgement_id`) REFERENCES `court_decisions_court_decisions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `judgement_tags_to_judgements_judgement_tag_id_foreign` FOREIGN KEY (`judgement_tag_id`) REFERENCES `court_decisions_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-06 15:49:57
