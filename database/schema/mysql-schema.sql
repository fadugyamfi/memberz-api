/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `account_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`),
  KEY `activity_log_organisation_id_foreign` (`organisation_id`),
  CONSTRAINT `activity_log_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `activity_log_chk_1` CHECK (json_valid(`properties`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `auth_apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_apps` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `app_key` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_id` int unsigned DEFAULT NULL,
  `all_access` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`),
  KEY `organisation_id` (`organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banks` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `short_code` varchar(5) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `swift_code` varchar(15) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone_numbers` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modifid` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `banks_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `capital` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `active` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `active` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `expense_request_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expense_request_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL,
  `expense_request_id` int unsigned NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` int unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `unit_price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expense_request_items_organisation_id_index` (`organisation_id`),
  KEY `expense_request_items_expense_request_id_index` (`expense_request_id`),
  KEY `expense_request_items_currency_id_index` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `expense_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expense_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL,
  `request_dt` date NOT NULL,
  `voucher_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` int unsigned NOT NULL,
  `amount` double(10,2) NOT NULL,
  `requested_by_id` int unsigned DEFAULT NULL COMMENT 'organisation_member_id making request',
  `approved_by_id` int unsigned DEFAULT NULL COMMENT 'organisation_member_id approving request',
  `approved_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expense_requests_voucher_no_index` (`voucher_no`),
  KEY `expense_requests_currency_id_index` (`currency_id`),
  KEY `expense_requests_requested_by_id_index` (`requested_by_id`),
  KEY `expense_requests_approved_by_id_index` (`approved_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `joyrides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `joyrides` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `joyride_name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `joyride_url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `org_session_required` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_account_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_account_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_account_id` bigint unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_account_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_account_devices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_account_id` int unsigned DEFAULT NULL,
  `device_id` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `device_user_agent` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `member_account_id` (`member_account_id`,`device_id`),
  CONSTRAINT `member_account_devices_ibfk_1` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_account_joyrides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_account_joyrides` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_account_id` int unsigned DEFAULT NULL,
  `joyride_id` smallint unsigned DEFAULT NULL,
  `completed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_account_notification_params`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_account_notification_params` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_account_notification_id` int unsigned DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_account_notification_id` (`member_account_notification_id`),
  CONSTRAINT `member_account_notification_params_ibfk_1` FOREIGN KEY (`member_account_notification_id`) REFERENCES `member_account_notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_account_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_account_notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_account_id` int unsigned DEFAULT NULL,
  `notification_type_id` int unsigned DEFAULT NULL,
  `organisation_id` int unsigned DEFAULT NULL,
  `source_id` int unsigned DEFAULT NULL,
  `target_id` int unsigned DEFAULT NULL,
  `read` tinyint(1) DEFAULT '0',
  `sent` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `notification_type_id` (`notification_type_id`),
  KEY `member_account_id` (`member_account_id`),
  CONSTRAINT `member_account_notifications_ibfk_2` FOREIGN KEY (`notification_type_id`) REFERENCES `notification_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `member_account_notifications_ibfk_3` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_account_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_account_sessions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_account_id` int unsigned DEFAULT NULL,
  `session_start_dt` datetime DEFAULT NULL,
  `session_expiry_dt` datetime DEFAULT NULL,
  `session_device_id` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `session_last_ip` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `session_user_agent` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_account_id` (`member_account_id`),
  CONSTRAINT `member_account_sessions_ibfk_1` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email_verification_token` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pass_salt` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `timezone` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `account_type` enum('primary','alias') COLLATE utf8mb3_unicode_ci DEFAULT 'primary',
  `reset_requested` tinyint(1) DEFAULT '0',
  `organisation_count` smallint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  `email_2fa` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_idx` (`username`),
  KEY `member_id` (`member_id`),
  KEY `member_accounts_mobile_number_index` (`mobile_number`),
  CONSTRAINT `member_accounts_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_biodatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_biodatas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `image` mediumblob,
  `fingerprint` mediumblob,
  `fingerprint_template` mediumblob,
  `signature` mediumblob,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `member_biodatas_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_category_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_category_settings` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` enum('flag','number','text','date') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `default` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `position` tinyint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_children` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_alive` tinyint(1) DEFAULT NULL,
  `child_member_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `member_children_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_emails` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `email` (`email`),
  CONSTRAINT `member_emails_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `file_path` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `thumb_path` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `icon_path` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `member_images_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_invitations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `invite_type` enum('join_org','join_memberz') COLLATE utf8mb3_unicode_ci DEFAULT 'join_memberz',
  `member_id` int unsigned DEFAULT NULL,
  `member_account_id` int unsigned DEFAULT NULL COMMENT 'member_account_id of inviter',
  `organisation_id` int unsigned DEFAULT NULL COMMENT 'organisation_id of inviter',
  `send_email` tinyint(1) DEFAULT '0',
  `send_sms` tinyint(1) DEFAULT '0',
  `email_sent` tinyint(1) DEFAULT '0',
  `sms_sent` tinyint(1) DEFAULT '0',
  `accepted` tinyint(1) DEFAULT '0',
  `declined` tinyint(1) DEFAULT '0',
  `responded` datetime DEFAULT NULL COMMENT 'When member responded to invitation',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `member_account_id` (`member_account_id`),
  KEY `organisation_id` (`organisation_id`),
  CONSTRAINT `member_invitations_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `member_invitations_ibfk_2` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `member_invitations_ibfk_3` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_parents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_parents` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `is_alive` tinyint(1) DEFAULT '1',
  `parent_member_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `member_parents_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_phone_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_phone_numbers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `number` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `member_id_2` (`member_id`,`type`,`number`),
  KEY `member_id` (`member_id`),
  KEY `number` (`number`),
  CONSTRAINT `member_phone_numbers_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_relation_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_relation_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_relations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `is_alive` tinyint(1) DEFAULT '1',
  `relation_member_id` int unsigned DEFAULT NULL,
  `member_relation_type_id` bigint unsigned NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `member_spouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_spouses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `is_alive` tinyint(1) DEFAULT '1',
  `spouse_member_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `member_spouses_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `middle_name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `maiden_name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `place_of_birth` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nationality` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `marital_status` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `home_number` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `office_number` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `social_security_no` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `employment_status` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `position` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `profession` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `field_of_study` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `educational_bg` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `home_town` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tribe` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `residential_address` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `residential_city` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `residential_region` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `residential_district` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `residential_zip_code` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `business_name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `business_address` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `business_city` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `business_region` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `business_district` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `business_zip_code` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bank` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bank_acc_no` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bank_location` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_orphan` tinyint(1) DEFAULT '0',
  `status` enum('active','dormant','past','deceased','visitor') COLLATE utf8mb3_unicode_ci DEFAULT 'active',
  `source_organisation_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_dob` (`dob`),
  KEY `member_names` (`last_name`,`first_name`,`middle_name`),
  KEY `id` (`id`),
  KEY `source_organisation_id` (`source_organisation_id`),
  KEY `mobile_number` (`mobile_number`),
  KEY `email` (`email`,`active`),
  KEY `search_group` (`first_name`,`middle_name`,`last_name`,`mobile_number`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_account_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_account_balances` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `module_contribution_account_id` int unsigned DEFAULT NULL,
  `balance` double(10,2) DEFAULT NULL,
  `balance_dt` datetime DEFAULT NULL,
  `member_account_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `module_contribution_account_id` (`module_contribution_account_id`),
  KEY `member_account_id` (`member_account_id`),
  CONSTRAINT `module_contribution_account_balances_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_account_balances_ibfk_2` FOREIGN KEY (`module_contribution_account_id`) REFERENCES `module_contribution_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_account_balances_ibfk_3` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `account_type` enum('Current','Savings','Investment','Cash') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bank_id` smallint unsigned DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `currency_id` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `currency_id` (`currency_id`),
  KEY `bank_id` (`bank_id`),
  CONSTRAINT `module_contribution_accounts_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_accounts_ibfk_2` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_accounts_ibfk_3` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_expense_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_expense_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `member_required` enum('Required','Not Required') COLLATE utf8mb3_unicode_ci DEFAULT 'Required',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `id` (`id`),
  CONSTRAINT `module_contribution_expense_types_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_expenses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `expense_type_id` int unsigned DEFAULT NULL,
  `expense_request_id` bigint unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT 'Description of the payment if not member specific',
  `account_id` int unsigned DEFAULT '1',
  `cheque_number` varchar(11) COLLATE utf8mb3_unicode_ci DEFAULT '',
  `amount` double(10,2) DEFAULT NULL,
  `currency_id` int DEFAULT NULL,
  `organisation_file_import_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `member_id` (`organisation_member_id`),
  KEY `organisation_contribution_type_id` (`expense_type_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `year` (`organisation_id`),
  KEY `organisation_id_2` (`organisation_id`,`description`),
  KEY `organisation_id_3` (`organisation_id`,`created`,`expense_type_id`),
  KEY `organisation_file_import_id` (`organisation_file_import_id`),
  KEY `cheque_number` (`organisation_id`,`cheque_number`),
  KEY `currency_id` (`currency_id`),
  KEY `module_contribution_expenses_expense_request_id_index` (`expense_request_id`),
  CONSTRAINT `module_contribution_expenses_ibfk_5` FOREIGN KEY (`organisation_file_import_id`) REFERENCES `organisation_file_imports` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_expenses_ibfk_6` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_expenses_ibfk_7` FOREIGN KEY (`expense_type_id`) REFERENCES `module_contribution_expense_types` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_expenses_ibfk_9` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_member_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_member_payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_member_invoice_id` int unsigned DEFAULT NULL,
  `module_member_contribution_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_invoice_id` (`organisation_member_invoice_id`),
  KEY `module_member_contribution_id` (`module_member_contribution_id`),
  CONSTRAINT `module_contribution_member_payments_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_member_payments_ibfk_2` FOREIGN KEY (`organisation_member_invoice_id`) REFERENCES `organisation_member_invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_member_payments_ibfk_3` FOREIGN KEY (`module_member_contribution_id`) REFERENCES `module_member_contributions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_payment_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `payment_platform_id` int DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_receipt_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_receipt_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `receipt_mode` enum('manual','auto') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `receipt_prefix` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `receipt_postfix` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `receipt_counter` int DEFAULT NULL,
  `default_currency` int DEFAULT '80',
  `sms_notify` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `default_currency` (`default_currency`),
  CONSTRAINT `module_contribution_receipt_settings_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_receipt_settings_ibfk_2` FOREIGN KEY (`default_currency`) REFERENCES `currencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_receipts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `receipt_no` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `receipt_dt` date DEFAULT NULL,
  `organisation_account_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_account_id` (`organisation_account_id`),
  KEY `organisation_id_2` (`organisation_id`,`receipt_no`),
  KEY `organisation_id_3` (`organisation_id`,`receipt_dt`),
  CONSTRAINT `module_contribution_receipts_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_receipts_ibfk_2` FOREIGN KEY (`organisation_account_id`) REFERENCES `organisation_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_report_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_report_filters` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module_contribution_report_id` int unsigned DEFAULT NULL,
  `field` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `condition` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `optional` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_report_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_report_parameters` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module_contribution_report_id` int unsigned DEFAULT NULL,
  `parameter` enum('start_date','end_date','ndate','year','month','week','currency') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_sms_broadcast_list_id` (`module_contribution_report_id`),
  CONSTRAINT `module_contribution_report_parameters_ibfk_1` FOREIGN KEY (`module_contribution_report_id`) REFERENCES `module_contribution_reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_reports` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `type` enum('predefined','custom') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `query_file` varchar(250) COLLATE utf8mb3_unicode_ci DEFAULT '0',
  `view_file` varchar(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_contribution_repot_org_id` (`organisation_id`),
  CONSTRAINT `module_contribution_reports_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_summaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_summaries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `receipt_dt` date DEFAULT NULL,
  `module_contribution_type_id` int unsigned DEFAULT NULL,
  `week` tinyint DEFAULT '1',
  `month` tinyint DEFAULT '1',
  `year` smallint DEFAULT '2015',
  `currency_id` int DEFAULT NULL,
  `amount` double(10,2) DEFAULT '0.00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `module_contribution_type_id` (`module_contribution_type_id`),
  KEY `currency_id` (`currency_id`),
  KEY `summary` (`organisation_id`,`year`,`module_contribution_type_id`,`month`,`week`,`currency_id`),
  CONSTRAINT `module_contribution_summaries_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_summaries_ibfk_2` FOREIGN KEY (`module_contribution_type_id`) REFERENCES `module_contribution_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_contribution_summaries_ibfk_3` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_contribution_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_contribution_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `member_required` enum('Required','Not Required') COLLATE utf8mb3_unicode_ci DEFAULT 'Required',
  `fix_amount_per_period` tinyint(1) DEFAULT '0',
  `currency_id` int DEFAULT NULL,
  `fixed_amount` double(10,2) DEFAULT NULL,
  `system_generated` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `id` (`id`),
  CONSTRAINT `module_contribution_types_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_member_contributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_member_contributions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `organisation_member_id` int unsigned DEFAULT NULL,
  `module_contribution_type_id` int unsigned DEFAULT NULL,
  `module_contribution_receipt_id` int unsigned DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT 'Description of the payment if not member specific',
  `week` int DEFAULT NULL,
  `month` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `module_contribution_payment_type_id` int DEFAULT '1',
  `cheque_status` enum('Not Cleared','Cleared') COLLATE utf8mb3_unicode_ci DEFAULT 'Not Cleared',
  `cheque_number` varchar(11) COLLATE utf8mb3_unicode_ci DEFAULT '',
  `bank_id` smallint unsigned DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `currency_id` int unsigned DEFAULT NULL,
  `organisation_file_import_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `member_id` (`organisation_member_id`),
  KEY `organisation_contribution_type_id` (`module_contribution_type_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `year` (`organisation_id`,`year`,`month`,`week`),
  KEY `organisation_id_2` (`organisation_id`,`description`),
  KEY `organisation_id_3` (`organisation_id`,`created`,`module_contribution_type_id`),
  KEY `module_member_contributions_ibfk_3` (`module_contribution_receipt_id`),
  KEY `bank_id` (`bank_id`),
  KEY `cheque_number` (`organisation_id`,`cheque_number`,`bank_id`),
  KEY `organisation_file_import_id` (`organisation_file_import_id`),
  CONSTRAINT `module_member_contributions_ibfk_1` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_member_contributions_ibfk_2` FOREIGN KEY (`module_contribution_type_id`) REFERENCES `module_contribution_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_member_contributions_ibfk_3` FOREIGN KEY (`module_contribution_receipt_id`) REFERENCES `module_contribution_receipts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_member_contributions_ibfk_4` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_member_contributions_ibfk_5` FOREIGN KEY (`organisation_file_import_id`) REFERENCES `organisation_file_imports` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module_id` smallint unsigned DEFAULT NULL,
  `display_name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `controller` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `action` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `arguments` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `position` smallint DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`),
  CONSTRAINT `module_menus_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_pledge_redemptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_pledge_redemptions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `module_pledge_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `receipt_no` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `receipt_dt` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_pledge_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_pledge_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `currency_id` smallint unsigned DEFAULT NULL,
  `min_amount` decimal(10,2) DEFAULT '0.00',
  `target_amount` decimal(10,2) DEFAULT NULL,
  `target_dt` date DEFAULT NULL,
  `reminder_message` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `reminder_start_dt` datetime DEFAULT NULL,
  `reminder_end_dt` datetime DEFAULT NULL,
  `next_reminder_dt` datetime DEFAULT NULL,
  `send_reminder_sms` tinyint(1) DEFAULT '0',
  `reminder_frequency` enum('daily','weekly','bi-monthly','monthly','quarterly') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `total_pledged` decimal(10,2) DEFAULT '0.00',
  `total_redeemed` decimal(10,2) DEFAULT '0.00',
  `total_remaining` decimal(10,2) DEFAULT '0.00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  CONSTRAINT `module_pledge_types_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_pledges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_pledges` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `module_pledge_type_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `amount_pledged` double(10,2) DEFAULT NULL,
  `amount_redeemed` double(10,2) DEFAULT NULL,
  `pledge_dt` date DEFAULT NULL,
  `redeemed` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  KEY `module_pledge_type_id` (`module_pledge_type_id`),
  CONSTRAINT `module_pledges_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_pledges_ibfk_3` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_pledges_ibfk_4` FOREIGN KEY (`module_pledge_type_id`) REFERENCES `module_pledge_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_account_broadcasts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_account_broadcasts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module_sms_account_id` int unsigned DEFAULT NULL,
  `module_sms_broadcast_list_id` int unsigned DEFAULT NULL,
  `organisation_member_category_id` int DEFAULT NULL,
  `include_sub_categories` tinyint unsigned DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `send_at` datetime DEFAULT NULL,
  `sent_offset` int DEFAULT NULL,
  `sent_count` int DEFAULT NULL,
  `sent_pages` int DEFAULT '0',
  `sent` tinyint(1) DEFAULT '0',
  `scheduled_by` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_sms_account_id` (`module_sms_account_id`),
  KEY `module_sms_broadcast_list_id` (`module_sms_broadcast_list_id`),
  CONSTRAINT `module_sms_account_broadcasts_ibfk_1` FOREIGN KEY (`module_sms_account_id`) REFERENCES `module_sms_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_sms_account_broadcasts_ibfk_2` FOREIGN KEY (`module_sms_broadcast_list_id`) REFERENCES `module_sms_broadcast_lists` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_account_instant_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_account_instant_messages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module_sms_account_id` int unsigned DEFAULT NULL,
  `member_id` int unsigned DEFAULT NULL,
  `to` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sender_id` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `module_sms_account_broadcast_id` int unsigned DEFAULT NULL,
  `bday_msg` tinyint(1) DEFAULT '0',
  `sent_at` datetime DEFAULT NULL,
  `sent` tinyint DEFAULT '0',
  `sent_by` int unsigned DEFAULT NULL,
  `sent_status` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_sms_account_id` (`module_sms_account_id`),
  KEY `sender_id_idx` (`sender_id`),
  KEY `broadcast_id_idx` (`module_sms_account_broadcast_id`),
  CONSTRAINT `module_sms_account_instant_messages_ibfk_1` FOREIGN KEY (`module_sms_account_id`) REFERENCES `module_sms_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_account_topups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_account_topups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module_sms_account_id` int unsigned DEFAULT NULL,
  `organisation_invoice_id` int unsigned DEFAULT NULL,
  `module_sms_credit_id` smallint unsigned DEFAULT NULL,
  `credit_amount` int DEFAULT NULL,
  `credited` tinyint(1) DEFAULT '0' COMMENT 'Set to 1 if the value has been assigned to the sms_account',
  `is_bonus` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_transaction_id` (`organisation_invoice_id`),
  KEY `module_sms_account_id` (`module_sms_account_id`),
  KEY `module_sms_account_topups_3` (`module_sms_credit_id`),
  CONSTRAINT `module_sms_account_topups_1` FOREIGN KEY (`module_sms_account_id`) REFERENCES `module_sms_accounts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_sms_account_topups_2` FOREIGN KEY (`organisation_invoice_id`) REFERENCES `organisation_invoices` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_sms_account_topups_3` FOREIGN KEY (`module_sms_credit_id`) REFERENCES `module_sms_credits` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `module_sms_account_topups_ibfk_2` FOREIGN KEY (`module_sms_account_id`) REFERENCES `module_sms_accounts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_sms_account_topups_ibfk_3` FOREIGN KEY (`organisation_invoice_id`) REFERENCES `organisation_invoices` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `module_sms_account_topups_ibfk_4` FOREIGN KEY (`module_sms_credit_id`) REFERENCES `module_sms_credits` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `sender_id` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `account_balance` int DEFAULT '0',
  `bonus_balance` int DEFAULT '0',
  `sender_id_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  CONSTRAINT `module_sms_accounts_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_broadcast_list_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_broadcast_list_contacts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module_sms_broadcast_list_id` int unsigned DEFAULT NULL,
  `member_id` int unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `number` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_sms_broadcast_list_id` (`module_sms_broadcast_list_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `module_sms_broadcast_list_contacts_ibfk_1` FOREIGN KEY (`module_sms_broadcast_list_id`) REFERENCES `module_sms_broadcast_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_sms_broadcast_list_contacts_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_broadcast_list_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_broadcast_list_filters` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `module_sms_broadcast_list_id` int unsigned DEFAULT NULL,
  `field` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `condition` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `optional` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_sms_broadcast_list_id` (`module_sms_broadcast_list_id`),
  KEY `module_sms_broadcast_list_filters_organisation_id_index` (`organisation_id`),
  CONSTRAINT `module_sms_broadcast_list_filters_ibfk_1` FOREIGN KEY (`module_sms_broadcast_list_id`) REFERENCES `module_sms_broadcast_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_broadcast_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_broadcast_lists` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `module_sms_account_id` int unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` enum('predefined','custom') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sender_id` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `size` int DEFAULT '0',
  `filters` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_sms_account_id` (`module_sms_account_id`),
  KEY `module_sms_broadcast_lists_organisation_id_index` (`organisation_id`),
  CONSTRAINT `module_sms_broadcast_lists_ibfk_1` FOREIGN KEY (`module_sms_account_id`) REFERENCES `module_sms_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_sms_broadcast_lists_chk_1` CHECK (json_valid(`filters`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `module_sms_credits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_sms_credits` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `credit_amount` int DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `unit_price` double(10,4) DEFAULT NULL,
  `currency_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `controller` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `action` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `arguments` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `default_active` tinyint(1) DEFAULT '1',
  `add_to_menu` tinyint(1) DEFAULT '1',
  `menu_position` tinyint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `notification_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `template` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `groupable` tinyint(1) DEFAULT '0',
  `source_type` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `target_type` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `org_admin_only` tinyint(1) DEFAULT '0',
  `send_email` tinyint(1) DEFAULT '0',
  `email_subject` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT '',
  `send_push_notification` tinyint(1) DEFAULT '0',
  `icon` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `org_login_required` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notificaiton_type_id` bigint unsigned DEFAULT NULL,
  `organisation_id` bigint unsigned DEFAULT NULL,
  `member_account_id` bigint unsigned DEFAULT NULL,
  `source_id` int unsigned DEFAULT NULL,
  `target_id` int unsigned DEFAULT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `sent` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `member_account_id` int unsigned DEFAULT NULL,
  `organisation_role_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `notifications` tinyint DEFAULT '1',
  `weekly_updates` tinyint(1) DEFAULT '1',
  `active` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `id` (`id`),
  KEY `organisation_role_id` (`organisation_role_id`),
  KEY `member_account_id` (`member_account_id`),
  CONSTRAINT `organisation_accounts_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_accounts_ibfk_2` FOREIGN KEY (`organisation_role_id`) REFERENCES `organisation_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_accounts_ibfk_3` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_anniversaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_anniversaries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_member_anniversary_count` int DEFAULT '0',
  `show_on_reg_forms` tinyint(1) DEFAULT '0',
  `send_anniversary_message` tinyint(1) DEFAULT '0',
  `message` text COLLATE utf8mb3_unicode_ci,
  `notify_on_anniversary` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '0',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `id` (`id`),
  CONSTRAINT `organisation_anniversaries_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_branch_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_branch_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL,
  `organisation_branch_id` bigint unsigned NOT NULL,
  `member_id` int unsigned NOT NULL,
  `primary` tinyint(1) DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_branch_contacts_organisation_id_index` (`organisation_id`),
  KEY `organisation_branch_contacts_organisation_branch_id_index` (`organisation_branch_id`),
  KEY `organisation_branch_contacts_member_id_index` (`member_id`),
  CONSTRAINT `organisation_branch_contacts_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_branch_contacts_ibfk_2` FOREIGN KEY (`organisation_branch_id`) REFERENCES `organisation_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_branch_contacts_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_branches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `lft` int unsigned DEFAULT NULL,
  `rght` int unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_branches_organisation_id_index` (`organisation_id`),
  CONSTRAINT `organisation_braches_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_calendars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_calendars` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_event_count` smallint DEFAULT '0',
  `is_default` tinyint(1) DEFAULT '0',
  `fetch_events_on_load` tinyint(1) DEFAULT '1',
  `show_publicly` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  CONSTRAINT `organisation_calendars_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_attendances` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_event_id` int unsigned DEFAULT NULL,
  `total_attended` smallint unsigned DEFAULT NULL,
  `total_absent` smallint DEFAULT NULL,
  `attended` text COLLATE utf8mb3_unicode_ci,
  `absent` text COLLATE utf8mb3_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_event_id` (`organisation_event_id`),
  CONSTRAINT `organisation_event_attendances_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_attendances_ibfk_2` FOREIGN KEY (`organisation_event_id`) REFERENCES `organisation_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_attendees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_attendees` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_event_id` int unsigned DEFAULT NULL,
  `organisation_event_session_id` int unsigned DEFAULT NULL,
  `member_id` int unsigned DEFAULT NULL,
  `interested` tinyint(1) DEFAULT '0',
  `attended` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mark_once` (`organisation_id`,`organisation_event_id`,`member_id`,`organisation_event_session_id`),
  KEY `organisation_event_id` (`organisation_event_id`),
  KEY `member_id` (`member_id`),
  KEY `organisation_event_session_id` (`organisation_event_session_id`),
  CONSTRAINT `organisation_event_attendees_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_attendees_ibfk_2` FOREIGN KEY (`organisation_event_id`) REFERENCES `organisation_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_attendees_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_attendees_ibfk_4` FOREIGN KEY (`organisation_event_session_id`) REFERENCES `organisation_event_sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_registrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_event_id` int unsigned DEFAULT NULL,
  `member_id` int unsigned DEFAULT NULL,
  `paid` tinyint DEFAULT '0',
  `fee_amount_paid` double(10,2) DEFAULT '0.00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_event_id` (`organisation_event_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `organisation_event_registrations_ibfk_1` FOREIGN KEY (`organisation_event_id`) REFERENCES `organisation_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_registrations_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_reminder_broadcasts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_reminder_broadcasts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_event_reminder_id` int unsigned DEFAULT NULL,
  `module_sms_account_broadcast_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_event_reminder_id` (`organisation_event_reminder_id`),
  KEY `module_sms_account_broadcast_id` (`module_sms_account_broadcast_id`),
  CONSTRAINT `organisation_event_reminder_broadcasts_ibfk_1` FOREIGN KEY (`organisation_event_reminder_id`) REFERENCES `organisation_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_reminder_broadcasts_ibfk_2` FOREIGN KEY (`module_sms_account_broadcast_id`) REFERENCES `module_sms_account_broadcasts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_reminders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_event_id` int unsigned DEFAULT NULL,
  `minutes_before` int DEFAULT NULL,
  `reminder_dt` datetime DEFAULT NULL,
  `organisation_member_category_id` int DEFAULT NULL,
  `module_sms_broadcast_list_id` int DEFAULT NULL,
  `sms_message` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_event_id` (`organisation_event_id`),
  CONSTRAINT `organisation_event_reminders_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_reminders_ibfk_2` FOREIGN KEY (`organisation_event_id`) REFERENCES `organisation_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_sessions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_event_id` int unsigned DEFAULT NULL,
  `session_name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `session_dt` datetime DEFAULT NULL,
  `organisation_event_attendee_count` int DEFAULT '0',
  `organisation_event_interested_count` int DEFAULT '0',
  `registration_code` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_code` (`registration_code`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_event_id` (`organisation_event_id`),
  CONSTRAINT `organisation_event_sessions_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_sessions_ibfk_2` FOREIGN KEY (`organisation_event_id`) REFERENCES `organisation_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_ticket_holders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_ticket_holders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_event_ticket_id` int unsigned NOT NULL,
  `member_account_id` int unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_event_ticket_id` (`organisation_event_ticket_id`),
  KEY `member_account_id` (`member_account_id`),
  CONSTRAINT `organisation_event_ticket_holders_ibfk_1` FOREIGN KEY (`organisation_event_ticket_id`) REFERENCES `organisation_event_tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_ticket_holders_ibfk_2` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_event_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_event_tickets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_event_id` int unsigned DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `currency_id` int DEFAULT NULL,
  `amount` double(10,2) DEFAULT '0.00',
  `quantity` int DEFAULT NULL,
  `rank` tinyint DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_event_id` (`organisation_event_id`),
  KEY `currency_id` (`currency_id`),
  CONSTRAINT `organisation_event_tickets_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_tickets_ibfk_2` FOREIGN KEY (`organisation_event_id`) REFERENCES `organisation_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_event_tickets_ibfk_3` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_events` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_calendar_id` int unsigned DEFAULT NULL,
  `event_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb3_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `photo_thumb` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `start_dt` datetime DEFAULT NULL,
  `end_dt` datetime DEFAULT NULL,
  `all_day` tinyint(1) DEFAULT '0',
  `venue` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gps_location` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT '0.00',
  `currency_id` int DEFAULT NULL,
  `registration_enabled` tinyint(1) DEFAULT '0',
  `capacity` int DEFAULT '0',
  `attendee_self_reporting` tinyint(1) DEFAULT '0',
  `require_session_code` tinyint(1) DEFAULT '0',
  `organisation_event_attendee_count` int DEFAULT '0',
  `organisation_event_interested_count` int DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_calendar_id` (`organisation_calendar_id`),
  KEY `currency_id` (`currency_id`),
  CONSTRAINT `organisation_events_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_events_ibfk_2` FOREIGN KEY (`organisation_calendar_id`) REFERENCES `organisation_calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_events_ibfk_3` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_file_imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_file_imports` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `member_account_id` int DEFAULT NULL,
  `import_type` enum('members','contributions') COLLATE utf8mb3_unicode_ci DEFAULT 'members',
  `import_to_id` int unsigned DEFAULT NULL COMMENT 'Organisation Member Category to import to',
  `file_path` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `file_name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `import_status` enum('pending','processing','completed','failed') COLLATE utf8mb3_unicode_ci DEFAULT 'pending',
  `records_imported` int DEFAULT '0',
  `records_linked` int DEFAULT NULL,
  `records_existing` int DEFAULT NULL,
  `imported_ids` text COLLATE utf8mb3_unicode_ci,
  `linked_ids` text COLLATE utf8mb3_unicode_ci,
  `existing_ids` text COLLATE utf8mb3_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `import_to_id` (`import_to_id`),
  CONSTRAINT `organisation_file_imports_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_group_leaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_group_leaders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_group_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `role` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_group_id` (`organisation_group_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  CONSTRAINT `organisation_group_leaders_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_group_leaders_ibfk_2` FOREIGN KEY (`organisation_group_id`) REFERENCES `organisation_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_group_leaders_ibfk_5` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_group_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_group_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `show_on_reg_forms` tinyint(1) DEFAULT '1',
  `allow_multi_select` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_id` (`organisation_id`),
  CONSTRAINT `organisation_group_types_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `organisation_group_type_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_member_group_count` int DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_group_type_id` (`organisation_group_type_id`),
  KEY `id` (`id`),
  CONSTRAINT `organisation_groups_ibfk_1` FOREIGN KEY (`organisation_group_type_id`) REFERENCES `organisation_group_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_invoice_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_invoice_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_invoice_id` int unsigned DEFAULT NULL,
  `qty` smallint DEFAULT NULL,
  `product_type` enum('subscription','sms_credit') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `unit_price` double(10,2) DEFAULT NULL,
  `tax_amount` double(10,2) DEFAULT NULL,
  `gross_total` double(10,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_invoice_id` (`organisation_invoice_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `organisation_invoice_items_ibfk_1` FOREIGN KEY (`organisation_invoice_id`) REFERENCES `organisation_invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_invoice_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_invoice_payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_invoice_id` int unsigned DEFAULT NULL,
  `payment_type_id` smallint unsigned DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `notes` text COLLATE utf8mb3_unicode_ci,
  `payment_date` date DEFAULT NULL,
  `payee_name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `member_account_id` int unsigned DEFAULT NULL,
  `transaction_id` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_invoice_id` (`organisation_invoice_id`),
  KEY `payment_type_id` (`payment_type_id`),
  KEY `member_account_id` (`member_account_id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `organisation_invoice_payments_ibfk_1` FOREIGN KEY (`organisation_invoice_id`) REFERENCES `organisation_invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_invoice_payments_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `organisation_invoice_payments_ibfk_3` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_invoices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `transaction_type_id` int unsigned DEFAULT NULL,
  `member_account_id` int unsigned DEFAULT NULL,
  `invoice_no` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) DEFAULT '0',
  `currency_id` int DEFAULT NULL,
  `total_due` double(10,2) DEFAULT '0.00',
  `due_date` datetime DEFAULT NULL,
  `notes` text COLLATE utf8mb3_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_by` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_no` (`invoice_no`),
  KEY `organisation_id` (`organisation_id`),
  KEY `transaction_type_id` (`transaction_type_id`),
  KEY `member_account_id` (`member_account_id`),
  CONSTRAINT `organisation_invoices_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_invoices_ibfk_2` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `organisation_invoices_ibfk_3` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_anniversaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_anniversaries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `organisation_member_id` int unsigned DEFAULT NULL,
  `organisation_anniversary_id` int unsigned DEFAULT NULL,
  `value` date DEFAULT NULL,
  `note` text COLLATE utf8mb3_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_date_id` (`organisation_anniversary_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  CONSTRAINT `organisation_member_anniversaries_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_anniversaries_ibfk_2` FOREIGN KEY (`organisation_anniversary_id`) REFERENCES `organisation_anniversaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_anniversaries_ibfk_3` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `parent_id` int unsigned DEFAULT NULL,
  `lft` int unsigned DEFAULT NULL,
  `rght` int unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auto_gen_ids` tinyint(1) DEFAULT '1',
  `id_prefix` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_suffix` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_next_increment` int DEFAULT '1',
  `default` tinyint DEFAULT '0',
  `organisation_member_count` int DEFAULT '0',
  `rank` tinyint NOT NULL DEFAULT '1',
  `paid_membership` tinyint(1) DEFAULT NULL,
  `payment_required` tinyint(1) DEFAULT NULL COMMENT 'Payment required before creating this membership',
  `price` double(10,2) DEFAULT NULL,
  `registration_fee` double(10,2) DEFAULT NULL,
  `renewal_frequency` enum('Never','Monthly','Quarterly','Biannually','Annually') COLLATE utf8mb3_unicode_ci DEFAULT 'Never',
  `publicly_joinable` tinyint(1) DEFAULT '1' COMMENT 'Members can choose to join this category from public interface',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  UNIQUE KEY `slug` (`organisation_id`,`slug`),
  KEY `id` (`id`),
  CONSTRAINT `organisation_member_categories_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_category_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_category_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `organisation_member_category_id` int unsigned DEFAULT NULL,
  `member_category_setting_id` smallint unsigned DEFAULT NULL,
  `value` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_category_id` (`organisation_member_category_id`),
  KEY `member_category_setting_id` (`member_category_setting_id`),
  CONSTRAINT `organisation_member_category_settings_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_category_settings_ibfk_2` FOREIGN KEY (`organisation_member_category_id`) REFERENCES `organisation_member_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_category_settings_ibfk_3` FOREIGN KEY (`member_category_setting_id`) REFERENCES `member_category_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `organisation_group_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `member_id` (`organisation_member_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_groups_ibfk_4` (`organisation_group_id`,`organisation_id`),
  CONSTRAINT `organisation_member_groups_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_groups_ibfk_2` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_groups_ibfk_3` FOREIGN KEY (`organisation_group_id`, `organisation_id`) REFERENCES `organisation_groups` (`id`, `organisation_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `organisation_member_id` int unsigned DEFAULT NULL,
  `member_image_id` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `member_id` (`member_image_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  CONSTRAINT `organisation_member_images_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_images_ibfk_3` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_images_ibfk_4` FOREIGN KEY (`member_image_id`) REFERENCES `member_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_imports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL,
  `organisation_file_import_id` int unsigned NOT NULL,
  `organisation_member_id` int unsigned NOT NULL,
  `import_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'linked, imported, existing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_member_imports_organisation_id_index` (`organisation_id`),
  KEY `organisation_member_imports_organisation_file_import_id_index` (`organisation_file_import_id`),
  KEY `organisation_member_imports_organisation_member_id_index` (`organisation_member_id`),
  KEY `organisation_member_imports_import_type_index` (`import_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_invoice_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_invoice_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_member_invoice_id` int unsigned DEFAULT NULL,
  `qty` smallint DEFAULT NULL,
  `product_type` enum('contribution_payment','event_registration','member_registration') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `unit_price` double(10,2) DEFAULT NULL,
  `tax_amount` double(10,2) DEFAULT NULL,
  `gross_total` double(10,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_invoice_id` (`organisation_member_invoice_id`),
  KEY `product_id` (`product_id`),
  KEY `product_type` (`product_type`),
  CONSTRAINT `organisation_member_invoice_items_ibfk_1` FOREIGN KEY (`organisation_member_invoice_id`) REFERENCES `organisation_member_invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_invoice_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_invoice_payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_member_invoice_id` int unsigned DEFAULT NULL,
  `organisation_payment_platform_id` int unsigned DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `notes` text COLLATE utf8mb3_unicode_ci,
  `payment_date` date DEFAULT NULL,
  `payee_name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `member_account_id` int unsigned DEFAULT NULL,
  `transaction_id` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_invoice_id` (`organisation_member_invoice_id`),
  KEY `member_account_id` (`member_account_id`),
  KEY `payment_type_id` (`organisation_payment_platform_id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `organisation_member_invoice_payments_ibfk_3` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_invoice_payments_ibfk_4` FOREIGN KEY (`organisation_member_invoice_id`) REFERENCES `organisation_member_invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_invoice_payments_ibfk_5` FOREIGN KEY (`organisation_payment_platform_id`) REFERENCES `organisation_payment_platforms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_invoices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `transaction_type_id` int unsigned DEFAULT NULL,
  `invoice_no` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) DEFAULT '0',
  `currency_id` int DEFAULT NULL,
  `total_due` double(10,2) DEFAULT '0.00',
  `due_date` datetime DEFAULT NULL,
  `notes` text COLLATE utf8mb3_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_by` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_no` (`invoice_no`),
  KEY `organisation_id` (`organisation_id`),
  KEY `member_account_id` (`organisation_member_id`),
  KEY `transaction_type_id` (`transaction_type_id`),
  CONSTRAINT `organisation_member_invoices_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_invoices_ibfk_3` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_invoices_ibfk_4` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_medicals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_medicals` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL,
  `member_id` int unsigned NOT NULL,
  `blood_group` varchar(5) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `weight` double(10,2) NOT NULL,
  `weight_unit` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL,
  `height` double(10,2) DEFAULT NULL,
  `height_unit` varchar(5) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `blood_pressure` enum('High','Medium','Low') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `blood_pressure_value` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `feels_dizzy` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `feels_faint` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `has_heart_condition` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `has_chest_pain` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `has_asthma` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `has_diabetes` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `has_short_breath` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `has_epilepsy` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `has_joint_issues` enum('Y','N') COLLATE utf8mb3_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_meta_columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_meta_columns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `organisation_meta_column_id` int unsigned DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  KEY `organisation_meta_column_id` (`organisation_meta_column_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_notes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb3_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  CONSTRAINT `organisation_member_notes_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_notes_ibfk_2` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_receipts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_transaction_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_transaction_types` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type_desc` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_member_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_member_transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `organisation_member_receipt_id` int unsigned DEFAULT NULL,
  `organisation_member_transaction_type_id` smallint unsigned DEFAULT NULL,
  `payment_type_id` smallint unsigned DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  KEY `organisation_member_receipt_id` (`organisation_member_receipt_id`),
  KEY `organisation_member_transaction_type_id` (`organisation_member_transaction_type_id`),
  KEY `payment_type_id` (`payment_type_id`),
  CONSTRAINT `organisation_member_transactions_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_transactions_ibfk_2` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_transactions_ibfk_3` FOREIGN KEY (`organisation_member_receipt_id`) REFERENCES `organisation_member_receipts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_transactions_ibfk_4` FOREIGN KEY (`organisation_member_transaction_type_id`) REFERENCES `organisation_member_transaction_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_member_transactions_ibfk_5` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_members` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `member_id` int unsigned DEFAULT NULL,
  `organisation_no` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_member_category_id` int unsigned DEFAULT NULL,
  `organisation_registration_form_id` bigint unsigned DEFAULT NULL,
  `status` enum('member','visitor','deceased') COLLATE utf8mb3_unicode_ci DEFAULT 'member',
  `source` enum('public','admin','registration') COLLATE utf8mb3_unicode_ci DEFAULT 'admin',
  `membership_start_dt` datetime DEFAULT NULL,
  `membership_end_dt` datetime DEFAULT NULL,
  `last_renewal_dt` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `approved` tinyint DEFAULT '1',
  `approved_by` int unsigned DEFAULT NULL,
  `custom_attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  UNIQUE KEY `organisation_members_uuid_unique` (`uuid`),
  KEY `organisation_id` (`organisation_id`),
  KEY `member_id` (`member_id`),
  KEY `organisation_members_ibfk_7` (`approved_by`),
  KEY `organisation_members_ibfk_8` (`organisation_member_category_id`),
  KEY `organisation_no` (`organisation_no`,`organisation_id`,`organisation_member_category_id`),
  KEY `id` (`id`),
  CONSTRAINT `organisation_members_ibfk_2` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_members_ibfk_3` FOREIGN KEY (`approved_by`) REFERENCES `organisation_accounts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `organisation_members_ibfk_4` FOREIGN KEY (`organisation_member_category_id`) REFERENCES `organisation_member_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_members_ibfk_5` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_members_chk_1` CHECK (json_valid(`custom_attributes`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_membership_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_membership_histories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `organisation_member_category_id` int DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `discount_offered` double(10,2) DEFAULT NULL,
  `amt_paid` double(10,2) DEFAULT NULL,
  `renewal_frequency` enum('Never','Monthly','Quarterly','Biannually','Annually') COLLATE utf8mb3_unicode_ci DEFAULT 'Never',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_memberships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_memberships` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `organisation_member_id` int unsigned DEFAULT NULL,
  `organisation_member_category_id` int unsigned DEFAULT NULL,
  `organisation_member_invoice_id` int unsigned DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `discount_offered` double(10,2) DEFAULT NULL,
  `total_due` double(10,2) DEFAULT NULL,
  `membership_start_dt` datetime DEFAULT NULL,
  `membership_end_dt` datetime DEFAULT NULL,
  `current` tinyint(1) DEFAULT '0',
  `paid` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_member_id` (`organisation_member_id`),
  KEY `organisation_member_category_id` (`organisation_member_category_id`),
  KEY `organisation_member_invoice_id` (`organisation_member_invoice_id`),
  CONSTRAINT `organisation_memberships_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_memberships_ibfk_2` FOREIGN KEY (`organisation_member_id`) REFERENCES `organisation_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_memberships_ibfk_3` FOREIGN KEY (`organisation_member_category_id`) REFERENCES `organisation_member_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_memberships_ibfk_4` FOREIGN KEY (`organisation_member_invoice_id`) REFERENCES `organisation_member_invoices` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_meta_columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_meta_columns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('text','number','date','options') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options_list` text COLLATE utf8mb4_unicode_ci,
  `show_on_reg_forms` tinyint(1) DEFAULT '0',
  `required` tinyint(1) DEFAULT '0',
  `sort_order` smallint unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  CONSTRAINT `organisation_meta_columns_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_modules` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `module_id` smallint unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `module_id` (`module_id`),
  CONSTRAINT `organisation_modules_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_modules_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_notification_params`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_notification_params` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_notification_id` int unsigned DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_notification_id` (`organisation_notification_id`),
  CONSTRAINT `organisation_notification_params_ibfk_1` FOREIGN KEY (`organisation_notification_id`) REFERENCES `organisation_notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `notification_type_id` int unsigned DEFAULT NULL,
  `source_id` int unsigned DEFAULT NULL,
  `target_id` int unsigned DEFAULT NULL,
  `read` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `notification_type_id` (`notification_type_id`),
  CONSTRAINT `organisation_notifications_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_notifications_ibfk_2` FOREIGN KEY (`notification_type_id`) REFERENCES `notification_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_payment_platforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_payment_platforms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `payment_platform_id` tinyint unsigned DEFAULT NULL,
  `currency_id` int DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `config` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `platform_mode` enum('live','sandbox') COLLATE utf8mb3_unicode_ci DEFAULT 'sandbox',
  `member_registration_instruction` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `event_registration_instruction` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `general_instructions` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `system_generated` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `payment_platform_id` (`payment_platform_id`),
  KEY `currency_id` (`currency_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `organisation_payment_platforms_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_payment_platforms_ibfk_2` FOREIGN KEY (`payment_platform_id`) REFERENCES `payment_platforms` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `organisation_payment_platforms_ibfk_3` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `organisation_payment_platforms_ibfk_4` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_receipts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned DEFAULT NULL,
  `payment_type_id` smallint unsigned DEFAULT NULL,
  `paid` tinyint DEFAULT '0' COMMENT '-1 (cancelled), 0 (pending), 1 (paid)',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `payment_type_id` (`payment_type_id`),
  CONSTRAINT `organisation_receipts_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_receipts_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_registration_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_registration_forms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_dt` datetime DEFAULT NULL,
  `excluded_standard_fields` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `custom_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `organisation_id` bigint unsigned NOT NULL,
  `organisation_member_category_id` int unsigned NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation_registration_forms_uuid_index` (`uuid`),
  KEY `organisation_registration_forms_slug_index` (`slug`),
  KEY `membership_category_idx` (`organisation_member_category_id`),
  CONSTRAINT `organisation_registration_forms_chk_1` CHECK (json_valid(`custom_fields`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_role_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_role_modules` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_role_id` int unsigned DEFAULT NULL,
  `module_id` smallint unsigned DEFAULT NULL,
  `module_menu_ids` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT '' COMMENT 'Comma separated list of module_menu_id values',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `organisation_role_id` (`organisation_role_id`),
  CONSTRAINT `organisation_role_modules_ibfk_1` FOREIGN KEY (`organisation_role_id`) REFERENCES `organisation_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `guard_name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT 'api',
  `description` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `admin_access` tinyint(1) DEFAULT '0',
  `weekly_activity_update` tinyint(1) DEFAULT '1',
  `birthday_updates` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `id` (`id`),
  KEY `organisation_id` (`organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_setting_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_setting_types` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` enum('flag','number','date','text','datetime','email','select','url') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `default` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `organisation_setting_type_id` smallint DEFAULT NULL,
  `value` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_setting_type_id` (`organisation_setting_type_id`),
  CONSTRAINT `organisation_settings_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_settings_ibfk_2` FOREIGN KEY (`organisation_setting_type_id`) REFERENCES `organisation_setting_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_subscriptions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int unsigned NOT NULL DEFAULT '0',
  `subscription_type_id` tinyint unsigned DEFAULT NULL,
  `organisation_invoice_id` int unsigned DEFAULT NULL,
  `start_dt` datetime DEFAULT NULL,
  `end_dt` datetime DEFAULT NULL,
  `length` tinyint DEFAULT '1',
  `current` tinyint(1) DEFAULT '1',
  `last_renewal_notice_dt` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`organisation_id`),
  KEY `subscription_type_id` (`subscription_type_id`),
  KEY `organisation_id` (`organisation_id`),
  KEY `organisation_subscriptions_ibfk_3` (`organisation_invoice_id`),
  CONSTRAINT `organisation_subscriptions_ibfk_1` FOREIGN KEY (`subscription_type_id`) REFERENCES `subscription_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `organisation_subscriptions_ibfk_2` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organisation_subscriptions_ibfk_3` FOREIGN KEY (`organisation_invoice_id`) REFERENCES `organisation_invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_receipt_id` int unsigned DEFAULT NULL,
  `organisation_invoice_id` int unsigned DEFAULT NULL,
  `transaction_type_id` int unsigned DEFAULT NULL,
  `cash_amount` double(10,2) DEFAULT NULL,
  `member_account_id` int unsigned DEFAULT NULL COMMENT 'User who triggered the transaction',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `transaction_type_id` (`transaction_type_id`),
  KEY `organisation_id` (`organisation_receipt_id`),
  KEY `member_account_id` (`member_account_id`),
  KEY `organisation_invoice_id` (`organisation_invoice_id`),
  CONSTRAINT `organisation_transactions_ibfk_2` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_types` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `organisation_transactions_ibfk_3` FOREIGN KEY (`organisation_receipt_id`) REFERENCES `organisation_receipts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `organisation_transactions_ibfk_4` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `organisation_transactions_ibfk_5` FOREIGN KEY (`organisation_invoice_id`) REFERENCES `organisation_invoices` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisation_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisation_types` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_count` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `organisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `organisation_type_id` tinyint unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `state` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `post_code` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `country_id` smallint DEFAULT NULL,
  `currency_id` smallint DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `website` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb3_unicode_ci,
  `long_description` mediumtext COLLATE utf8mb3_unicode_ci,
  `mission` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `member_account_id` int unsigned DEFAULT NULL,
  `organisation_member_count` int DEFAULT '0',
  `organisation_account_count` tinyint DEFAULT '0',
  `discoverable` tinyint(1) DEFAULT '1' COMMENT 'Allow organization to found in public search',
  `allow_public_join` tinyint(1) DEFAULT '0' COMMENT 'Allow people to join this organization through the public interface',
  `default_public_join_category` int unsigned DEFAULT NULL COMMENT 'Category members will be pushed into when they join via the public interface',
  `public_directory_enabled` tinyint unsigned DEFAULT '1',
  `locked` tinyint(1) DEFAULT '0',
  `verified` tinyint(1) DEFAULT '0',
  `verified_by` int unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint DEFAULT '0',
  `trashed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`),
  KEY `organisation_type_id` (`organisation_type_id`),
  KEY `member_account_id` (`member_account_id`),
  KEY `organisation_name` (`name`,`slug`),
  KEY `organisations_uuid_index` (`uuid`),
  CONSTRAINT `organisations_ibfk_1` FOREIGN KEY (`organisation_type_id`) REFERENCES `organisation_types` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `organisations_ibfk_2` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `payment_platforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_platforms` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `method_name` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `config_keys` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Comma seperated list of keys for configuring the platform connection',
  `logo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `instructions` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_types` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `queue_monitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `queue_monitor` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `job_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `started_at_exact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `finished_at_exact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_elapsed` double(12,6) DEFAULT NULL,
  `failed` tinyint(1) NOT NULL DEFAULT '0',
  `attempt` int NOT NULL DEFAULT '0',
  `progress` int DEFAULT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci,
  `exception_message` text COLLATE utf8mb4_unicode_ci,
  `exception_class` text COLLATE utf8mb4_unicode_ci,
  `data` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `queue_monitor_job_id_index` (`job_id`),
  KEY `queue_monitor_started_at_index` (`started_at`),
  KEY `queue_monitor_time_elapsed_index` (`time_elapsed`),
  KEY `queue_monitor_failed_index` (`failed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `referral_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `referral_codes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_account_id` int unsigned DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `member_account_id` (`member_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `report_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `report_column_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_column_options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `field_name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `display_name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` enum('text','date','datetime','boolean','number') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `report_columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_columns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int unsigned DEFAULT NULL,
  `report_column_option_id` int unsigned DEFAULT NULL,
  `position` tinyint DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `report_id` (`report_id`),
  CONSTRAINT `report_columns_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `report_parameter_list_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_parameter_list_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `report_parameter_id` int DEFAULT NULL,
  `label` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `report_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_parameters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `report_id` int unsigned DEFAULT NULL,
  `label` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` enum('number','text','date','datetime','list','hidden') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `report_category_id` int unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `query_file` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `report_category_id` (`report_category_id`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`report_category_id`) REFERENCES `report_categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `setting_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting_types` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` enum('flag','number','date','text','datetime','email','select','url') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `default` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `short_urls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `short_urls` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `long_url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `short_code` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `long_url` (`long_url`),
  KEY `short_url` (`short_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `subscription_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_types` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `capacity` int DEFAULT NULL,
  `validity` enum('monthly','quarterly','half_yearly','yearly','forever') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `currency_id` int unsigned DEFAULT NULL,
  `initial_price` double(10,2) DEFAULT NULL,
  `renewal_price` double(10,2) DEFAULT NULL,
  `billing_required` enum('no','yes') COLLATE utf8mb3_unicode_ci DEFAULT 'yes',
  `initial_sms_credit` int DEFAULT '0',
  `monthly_sms_bonus` int DEFAULT NULL,
  `accounts` smallint DEFAULT NULL,
  `reporting` enum('basic','advanced') COLLATE utf8mb3_unicode_ci DEFAULT 'basic',
  `revenue_tracking` tinyint(1) DEFAULT '1',
  `expenditure_tracking` tinyint(1) DEFAULT '0',
  `events` tinyint(1) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `promotional` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `support_account_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_account_actions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `support_account_id` int unsigned DEFAULT NULL,
  `model_name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `model_id` int unsigned DEFAULT NULL,
  `action_desc` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `support_account_id` (`support_account_id`),
  CONSTRAINT `support_account_actions_ibfk_1` FOREIGN KEY (`support_account_id`) REFERENCES `support_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `support_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_account_id` int unsigned DEFAULT NULL,
  `support_role_id` tinyint unsigned DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int unsigned DEFAULT NULL,
  `modified_by` int unsigned DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `trashed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `member_account_id` (`member_account_id`),
  KEY `support_role_id` (`support_role_id`),
  CONSTRAINT `support_accounts_ibfk_1` FOREIGN KEY (`member_account_id`) REFERENCES `member_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `support_accounts_ibfk_2` FOREIGN KEY (`support_role_id`) REFERENCES `support_roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `support_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_roles` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `manage_members` tinyint(1) DEFAULT '0',
  `manage_organisations` tinyint(1) DEFAULT '0',
  `manage_support_users` tinyint(1) DEFAULT '0',
  `manage_reports` tinyint(1) DEFAULT '0',
  `access_reports` tinyint(1) DEFAULT '0',
  `manage_images` tinyint(1) DEFAULT '0',
  `manage_system_settings` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `system_setting_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_setting_categories` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `system_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `setting_type_category_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` enum('text','number','date','flag') COLLATE utf8mb3_unicode_ci DEFAULT 'text',
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `transaction_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `group` enum('member','organisation') COLLATE utf8mb3_unicode_ci DEFAULT 'organisation',
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `member_can_cancel` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `user_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_actions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `action_id` int DEFAULT NULL COMMENT 'The ID of the item being worked on, e.g. jobsheet_id',
  `action_desc` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'A Desc of the Action Carried Out, e.g. "created jobsheet"',
  `action_dt` datetime DEFAULT NULL COMMENT 'Date and Time of action',
  PRIMARY KEY (`id`),
  KEY `act_user_fk` (`user_id`),
  CONSTRAINT `user_actions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `user_role_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role_menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_role_id` int DEFAULT NULL,
  `menu_id` int DEFAULT NULL COMMENT 'References the Manager Categories item',
  PRIMARY KEY (`id`),
  KEY `usr_menu_id` (`menu_id`),
  KEY `user_role_fk` (`user_role_id`),
  CONSTRAINT `user_role_menus_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_role_menus_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL,
  `role_tag` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `role_description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pass_salt` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `department_id` smallint DEFAULT NULL,
  `team` enum('Alpha Team','Bravo Team','Charlie Team','Delta Team') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_role_id` int DEFAULT NULL,
  `security_question` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `security_answer` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `last_access_dt` datetime DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usr_role_fk` (`user_role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2020_01_11_193443_create_account_roles_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2,'2020_01_11_193443_create_auth_apps_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'2020_01_11_193443_create_banks_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4,'2020_01_11_193443_create_countries_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5,'2020_01_11_193443_create_currencies_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6,'2020_01_11_193443_create_joyrides_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7,'2020_01_11_193443_create_member_account_devices_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2020_01_11_193443_create_member_account_joyrides_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9,'2020_01_11_193443_create_member_account_notification_params_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10,'2020_01_11_193443_create_member_account_notifications_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11,'2020_01_11_193443_create_member_account_sessions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12,'2020_01_11_193443_create_member_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13,'2020_01_11_193443_create_member_biodatas_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14,'2020_01_11_193443_create_member_category_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15,'2020_01_11_193443_create_member_children_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16,'2020_01_11_193443_create_member_emails_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2020_01_11_193443_create_member_images_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18,'2020_01_11_193443_create_member_invitations_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19,'2020_01_11_193443_create_member_parents_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20,'2020_01_11_193443_create_member_phone_numbers_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21,'2020_01_11_193443_create_member_spouses_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22,'2020_01_11_193443_create_members_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (23,'2020_01_11_193443_create_module_contribution_account_balances_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (24,'2020_01_11_193443_create_module_contribution_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (25,'2020_01_11_193443_create_module_contribution_expense_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (26,'2020_01_11_193443_create_module_contribution_expenses_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (27,'2020_01_11_193443_create_module_contribution_member_payments_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (28,'2020_01_11_193443_create_module_contribution_payment_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (29,'2020_01_11_193443_create_module_contribution_payment_vouchers_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (30,'2020_01_11_193443_create_module_contribution_receipt_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (31,'2020_01_11_193443_create_module_contribution_receipts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (32,'2020_01_11_193443_create_module_contribution_report_filters_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (33,'2020_01_11_193443_create_module_contribution_report_parameters_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (34,'2020_01_11_193443_create_module_contribution_reports_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (35,'2020_01_11_193443_create_module_contribution_summaries_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (36,'2020_01_11_193443_create_module_contribution_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (37,'2020_01_11_193443_create_module_member_contributions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (38,'2020_01_11_193443_create_module_menus_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (39,'2020_01_11_193443_create_module_pledge_redemptions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (40,'2020_01_11_193443_create_module_pledge_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (41,'2020_01_11_193443_create_module_pledges_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (42,'2020_01_11_193443_create_module_sms_account_broadcasts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (43,'2020_01_11_193443_create_module_sms_account_instant_messages_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (44,'2020_01_11_193443_create_module_sms_account_topups_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (45,'2020_01_11_193443_create_module_sms_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (46,'2020_01_11_193443_create_module_sms_broadcast_list_contacts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (47,'2020_01_11_193443_create_module_sms_broadcast_list_filters_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (48,'2020_01_11_193443_create_module_sms_broadcast_lists_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (49,'2020_01_11_193443_create_module_sms_credits_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (50,'2020_01_11_193443_create_modules_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (51,'2020_01_11_193443_create_notification_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (52,'2020_01_11_193443_create_organisation_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (53,'2020_01_11_193443_create_organisation_anniversaries_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (54,'2020_01_11_193443_create_organisation_calendars_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (55,'2020_01_11_193443_create_organisation_event_attendances_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (56,'2020_01_11_193443_create_organisation_event_attendees_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (57,'2020_01_11_193443_create_organisation_event_registrations_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (58,'2020_01_11_193443_create_organisation_event_reminder_broadcasts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (59,'2020_01_11_193443_create_organisation_event_reminders_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (60,'2020_01_11_193443_create_organisation_event_sessions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (61,'2020_01_11_193443_create_organisation_event_ticket_holders_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (62,'2020_01_11_193443_create_organisation_event_tickets_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (63,'2020_01_11_193443_create_organisation_events_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (64,'2020_01_11_193443_create_organisation_file_imports_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (65,'2020_01_11_193443_create_organisation_group_leaders_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (66,'2020_01_11_193443_create_organisation_group_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (67,'2020_01_11_193443_create_organisation_groups_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (68,'2020_01_11_193443_create_organisation_invoice_items_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (69,'2020_01_11_193443_create_organisation_invoice_payments_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (70,'2020_01_11_193443_create_organisation_invoices_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (71,'2020_01_11_193443_create_organisation_member_anniversaries_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (72,'2020_01_11_193443_create_organisation_member_categories_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (73,'2020_01_11_193443_create_organisation_member_category_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (74,'2020_01_11_193443_create_organisation_member_groups_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (75,'2020_01_11_193443_create_organisation_member_images_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (76,'2020_01_11_193443_create_organisation_member_invoice_items_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (77,'2020_01_11_193443_create_organisation_member_invoice_payments_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (78,'2020_01_11_193443_create_organisation_member_invoices_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (79,'2020_01_11_193443_create_organisation_member_medicals_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (80,'2020_01_11_193443_create_organisation_member_meta_columns_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (81,'2020_01_11_193443_create_organisation_member_notes_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (82,'2020_01_11_193443_create_organisation_member_receipts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (83,'2020_01_11_193443_create_organisation_member_transaction_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (84,'2020_01_11_193443_create_organisation_member_transactions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (85,'2020_01_11_193443_create_organisation_members_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (86,'2020_01_11_193443_create_organisation_memberships_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (87,'2020_01_11_193443_create_organisation_meta_columns_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (88,'2020_01_11_193443_create_organisation_modules_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (89,'2020_01_11_193443_create_organisation_notification_params_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (90,'2020_01_11_193443_create_organisation_notifications_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (91,'2020_01_11_193443_create_organisation_payment_platforms_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (92,'2020_01_11_193443_create_organisation_receipts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (93,'2020_01_11_193443_create_organisation_role_modules_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (94,'2020_01_11_193443_create_organisation_roles_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (95,'2020_01_11_193443_create_organisation_setting_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (96,'2020_01_11_193443_create_organisation_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (97,'2020_01_11_193443_create_organisation_subscriptions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (98,'2020_01_11_193443_create_organisation_transactions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (99,'2020_01_11_193443_create_organisation_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (100,'2020_01_11_193443_create_organisations_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (101,'2020_01_11_193443_create_payment_platforms_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (102,'2020_01_11_193443_create_payment_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (103,'2020_01_11_193443_create_permissions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (104,'2020_01_11_193443_create_report_categories_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (105,'2020_01_11_193443_create_report_column_options_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (106,'2020_01_11_193443_create_report_columns_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (107,'2020_01_11_193443_create_report_parameter_list_items_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (108,'2020_01_11_193443_create_report_parameters_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (109,'2020_01_11_193443_create_reports_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (110,'2020_01_11_193443_create_setting_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (111,'2020_01_11_193443_create_short_urls_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (112,'2020_01_11_193443_create_subscription_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (113,'2020_01_11_193443_create_support_account_actions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (114,'2020_01_11_193443_create_support_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (115,'2020_01_11_193443_create_support_roles_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (116,'2020_01_11_193443_create_system_setting_categories_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (117,'2020_01_11_193443_create_system_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (118,'2020_01_11_193443_create_transaction_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (119,'2020_01_11_193443_create_user_actions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (120,'2020_01_11_193443_create_user_role_menus_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (121,'2020_01_11_193443_create_user_roles_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (122,'2020_01_11_193443_create_users_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (123,'2020_01_11_193447_add_foreign_keys_to_banks_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (124,'2020_01_11_193447_add_foreign_keys_to_member_account_devices_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (125,'2020_01_11_193447_add_foreign_keys_to_member_account_notification_params_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (126,'2020_01_11_193447_add_foreign_keys_to_member_account_notifications_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (127,'2020_01_11_193447_add_foreign_keys_to_member_account_sessions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (128,'2020_01_11_193447_add_foreign_keys_to_member_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (129,'2020_01_11_193447_add_foreign_keys_to_member_biodatas_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (130,'2020_01_11_193447_add_foreign_keys_to_member_children_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (131,'2020_01_11_193447_add_foreign_keys_to_member_emails_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (132,'2020_01_11_193447_add_foreign_keys_to_member_images_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (133,'2020_01_11_193447_add_foreign_keys_to_member_invitations_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (134,'2020_01_11_193447_add_foreign_keys_to_member_parents_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (135,'2020_01_11_193447_add_foreign_keys_to_member_phone_numbers_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (136,'2020_01_11_193447_add_foreign_keys_to_member_spouses_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (137,'2020_01_11_193447_add_foreign_keys_to_module_contribution_account_balances_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (138,'2020_01_11_193447_add_foreign_keys_to_module_contribution_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (139,'2020_01_11_193447_add_foreign_keys_to_module_contribution_expense_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (140,'2020_01_11_193447_add_foreign_keys_to_module_contribution_expenses_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (141,'2020_01_11_193447_add_foreign_keys_to_module_contribution_member_payments_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (142,'2020_01_11_193447_add_foreign_keys_to_module_contribution_payment_vouchers_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (143,'2020_01_11_193447_add_foreign_keys_to_module_contribution_receipt_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (144,'2020_01_11_193447_add_foreign_keys_to_module_contribution_receipts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (145,'2020_01_11_193447_add_foreign_keys_to_module_contribution_report_parameters_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (146,'2020_01_11_193447_add_foreign_keys_to_module_contribution_reports_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (147,'2020_01_11_193447_add_foreign_keys_to_module_contribution_summaries_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (148,'2020_01_11_193447_add_foreign_keys_to_module_contribution_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (149,'2020_01_11_193447_add_foreign_keys_to_module_member_contributions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (150,'2020_01_11_193447_add_foreign_keys_to_module_menus_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (151,'2020_01_11_193447_add_foreign_keys_to_module_pledge_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (152,'2020_01_11_193447_add_foreign_keys_to_module_pledges_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (153,'2020_01_11_193447_add_foreign_keys_to_module_sms_account_broadcasts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (154,'2020_01_11_193447_add_foreign_keys_to_module_sms_account_instant_messages_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (155,'2020_01_11_193447_add_foreign_keys_to_module_sms_account_topups_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (156,'2020_01_11_193447_add_foreign_keys_to_module_sms_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (157,'2020_01_11_193447_add_foreign_keys_to_module_sms_broadcast_list_contacts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (158,'2020_01_11_193447_add_foreign_keys_to_module_sms_broadcast_list_filters_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (159,'2020_01_11_193447_add_foreign_keys_to_module_sms_broadcast_lists_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (160,'2020_01_11_193447_add_foreign_keys_to_organisation_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (161,'2020_01_11_193447_add_foreign_keys_to_organisation_anniversaries_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (162,'2020_01_11_193447_add_foreign_keys_to_organisation_calendars_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (163,'2020_01_11_193447_add_foreign_keys_to_organisation_event_attendances_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (164,'2020_01_11_193447_add_foreign_keys_to_organisation_event_attendees_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (165,'2020_01_11_193447_add_foreign_keys_to_organisation_event_registrations_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (166,'2020_01_11_193447_add_foreign_keys_to_organisation_event_reminder_broadcasts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (167,'2020_01_11_193447_add_foreign_keys_to_organisation_event_reminders_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (168,'2020_01_11_193447_add_foreign_keys_to_organisation_event_sessions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (169,'2020_01_11_193447_add_foreign_keys_to_organisation_event_ticket_holders_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (170,'2020_01_11_193447_add_foreign_keys_to_organisation_event_tickets_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (171,'2020_01_11_193447_add_foreign_keys_to_organisation_events_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (172,'2020_01_11_193447_add_foreign_keys_to_organisation_file_imports_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (173,'2020_01_11_193447_add_foreign_keys_to_organisation_group_leaders_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (174,'2020_01_11_193447_add_foreign_keys_to_organisation_group_types_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (175,'2020_01_11_193447_add_foreign_keys_to_organisation_groups_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (176,'2020_01_11_193447_add_foreign_keys_to_organisation_invoice_items_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (177,'2020_01_11_193447_add_foreign_keys_to_organisation_invoice_payments_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (178,'2020_01_11_193447_add_foreign_keys_to_organisation_invoices_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (179,'2020_01_11_193447_add_foreign_keys_to_organisation_member_anniversaries_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (180,'2020_01_11_193447_add_foreign_keys_to_organisation_member_categories_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (181,'2020_01_11_193447_add_foreign_keys_to_organisation_member_category_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (182,'2020_01_11_193447_add_foreign_keys_to_organisation_member_groups_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (183,'2020_01_11_193447_add_foreign_keys_to_organisation_member_images_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (184,'2020_01_11_193447_add_foreign_keys_to_organisation_member_invoice_items_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (185,'2020_01_11_193447_add_foreign_keys_to_organisation_member_invoice_payments_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (186,'2020_01_11_193447_add_foreign_keys_to_organisation_member_invoices_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (187,'2020_01_11_193447_add_foreign_keys_to_organisation_member_notes_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (188,'2020_01_11_193447_add_foreign_keys_to_organisation_member_transactions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (189,'2020_01_11_193447_add_foreign_keys_to_organisation_members_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (190,'2020_01_11_193447_add_foreign_keys_to_organisation_memberships_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (191,'2020_01_11_193447_add_foreign_keys_to_organisation_meta_columns_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (192,'2020_01_11_193447_add_foreign_keys_to_organisation_modules_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (193,'2020_01_11_193447_add_foreign_keys_to_organisation_notification_params_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (194,'2020_01_11_193447_add_foreign_keys_to_organisation_notifications_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (195,'2020_01_11_193447_add_foreign_keys_to_organisation_payment_platforms_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (196,'2020_01_11_193447_add_foreign_keys_to_organisation_receipts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (197,'2020_01_11_193447_add_foreign_keys_to_organisation_role_modules_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (198,'2020_01_11_193447_add_foreign_keys_to_organisation_settings_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (199,'2020_01_11_193447_add_foreign_keys_to_organisation_subscriptions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (200,'2020_01_11_193447_add_foreign_keys_to_organisation_transactions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (201,'2020_01_11_193447_add_foreign_keys_to_organisations_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (202,'2020_01_11_193447_add_foreign_keys_to_report_columns_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (203,'2020_01_11_193447_add_foreign_keys_to_reports_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (204,'2020_01_11_193447_add_foreign_keys_to_support_account_actions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (205,'2020_01_11_193447_add_foreign_keys_to_support_accounts_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (206,'2020_01_11_193447_add_foreign_keys_to_user_actions_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (207,'2020_01_11_193447_add_foreign_keys_to_user_role_menus_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (208,'2020_01_11_193447_add_foreign_keys_to_users_table',0);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (211,'2020_01_25_144733_create_permission_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (212,'2020_01_25_150417_add_guard_name_to_organisation_roles',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (213,'2020_04_03_223947_create_jobs_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (214,'2020_04_07_192000_alter_member_category_settings_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (215,'2020_04_09_174700_create_organisation_branches_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (216,'2020_04_09_175353_add_foreign_keys_to_organisation_branches_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (217,'2020_04_09_175531_create_organisation_branch_contacts_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (218,'2020_04_09_180159_add_foreign_keys_to_organisation_branch_contacts_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (219,'2020_04_09_183949_seed_module_menus_for_branches',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (220,'2020_04_23_131050_alter_organisation_member_categories_table',3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (221,'2020_04_24_214149_seed_module_menus_for_new_categories_feature',3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (222,'2020_05_01_162013_alter_module_sms_account_broadcasts_table',3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (223,'2014_10_12_100000_create_password_resets_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (224,'2018_02_05_000000_create_queue_monitor_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (225,'2019_08_19_000000_create_failed_jobs_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (226,'2021_08_05_184900_create_organisation_member_imports_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (227,'2021_08_05_220451_add_uuid_to_organisations_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (228,'2021_08_10_195753_add_email_verification_token_to_member_accounts_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (229,'2021_08_12_105739_create_member_relation_types',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (230,'2021_08_13_101344_create_member_relations_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (231,'2021_08_19_002355_populate_member_relations_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (232,'2021_09_03_111857_create_notifications_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (233,'2021_09_13_085240_add_timestamps_to_member_accounts',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (234,'2021_09_23_070146_create_activity_log_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (235,'2021_09_23_070147_add_event_column_to_activity_log_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (236,'2021_09_23_070148_add_batch_uuid_column_to_activity_log_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (237,'2021_09_24_175554_add_extra_columns_to_activity_log_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (238,'2021_10_18_201401_add_timestamps_to_module_contribution_types_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (239,'2021_11_10_005018_create_organisation_registration_forms_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (240,'2021_11_10_075811_add_organisation_registration_form_id_to_organisation_members_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (241,'2021_11_10_080220_custom_attributes_to_organisation_members_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (242,'2021_11_30_134611_add_filters_to_module_sms_broadcast_lists_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (243,'2021_12_02_110104_add_organisation_id_to_module_sms_broadcast_lists_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (244,'2021_12_02_110610_update_broadcast_lists_with_organisation_id',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (245,'2021_12_02_112915_update_sms_broadcast_list_with_filters',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (246,'2022_01_08_060214_create_member_account_codes',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (247,'2022_01_11_040026_add_email_2fa_to_member_accounts_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (248,'2022_01_13_100454_add_sender_id_broadcast_id_to_account_messages_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (249,'2022_02_09_140510_add_uuid_to_registration_forms_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (250,'2022_03_12_162318_add_mobile_number_to_member_accounts_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (251,'2022_03_14_161401_update_member_accounts_mobile_number_with_member_mobile_number',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (252,'2022_03_18_212717_update_logo_paths_in_organisations_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (253,'2022_04_21_134124_add_uuid_to_organisation_members_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (254,'2022_06_23_130757_add_note_to_organisation_member_anniversaries',5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (255,'2022_11_08_095335_update_slug_on_organisations',6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (256,'2022_10_21_161553_create_expense_requests_table',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (257,'2022_10_21_162124_create_expense_request_items_table',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (258,'2022_10_21_162833_modify_module_contribution_expenses_table',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (259,'2022_10_21_191221_drop_payment_vouchers_table',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (260,'2023_10_16_220048_add_sender_id_approved_to_sms_accounts_table',7);
