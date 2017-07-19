# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.19-1~exp1ubuntu2)
# Database: homestead
# Generation Time: 2015-06-01 20:08:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table albums
# ------------------------------------------------------------

DROP TABLE IF EXISTS `albums`;

CREATE TABLE `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `thumb` int(11) NOT NULL,
  `sender_role` int(11) NOT NULL,
  `sender_team` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;

INSERT INTO `albums` (`id`, `name`, `thumb`, `sender_role`, `sender_team`, `created_at`, `updated_at`)
VALUES
	(1,'test',1,0,0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(2,'Be Album',2,0,1,'2015-06-01 15:29:25','2015-06-01 15:30:43');

/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `tournament` tinyint(1) NOT NULL,
  `sender_role` int(11) NOT NULL,
  `sender_team` int(11) NOT NULL,
  `team_a` int(11) NOT NULL,
  `team_b` int(11) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `events_location_id_foreign` (`location_id`),
  CONSTRAINT `events_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `subject`, `body`, `location_id`, `tournament`, `sender_role`, `sender_team`, `team_a`, `team_b`, `date_start`, `date_end`, `created_at`, `updated_at`)
VALUES
	(1,'World event','',1,1,1,0,1,12,'2015-06-20 12:34:00','2015-06-20 12:34:00','2015-06-01 15:27:18','2015-06-01 15:37:12'),
	(2,'Private event Belgium by Admin','',1,0,1,0,1,1,'2015-06-01 12:00:00','2015-06-03 12:00:00','2015-06-01 15:37:48','2015-06-01 15:37:48'),
	(3,'Event voor belgie','Hallo jongens!',6,0,2,1,0,0,'2015-06-02 12:00:00','2015-06-04 12:00:00','2015-06-01 15:38:27','2015-06-01 15:41:12');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events_team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events_team`;

CREATE TABLE `events_team` (
  `events_id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `events_team_events_id_index` (`events_id`),
  KEY `events_team_team_id_index` (`team_id`),
  CONSTRAINT `events_team_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `events_team_events_id_foreign` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `events_team` WRITE;
/*!40000 ALTER TABLE `events_team` DISABLE KEYS */;

INSERT INTO `events_team` (`events_id`, `team_id`, `created_at`, `updated_at`)
VALUES
	(1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `events_team` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table highscores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `highscores`;

CREATE TABLE `highscores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long` double NOT NULL,
  `lat` double NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `sender_team` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `name`, `long`, `lat`, `number`, `street`, `city`, `url_image`, `public`, `sender_team`, `created_at`, `updated_at`)
VALUES
	(1,'Sports Hall Bourgoyen',3.680685,51.066929,'30','Driepikkelstraat','9030 Mariakerke','/img/sample.jpg',1,0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(2,'Sports Hall Bourgoyen',3.680685,51.066929,'30','Driepikkelstraat','9030 Mariakerke','/img/sample.jpg',1,0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(3,'Sports Hall Bourgoyen',3.680685,51.066929,'30','Driepikkelstraat','9030 Mariakerke','/img/sample.jpg',1,0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(4,'Sports Hall Bourgoyen',3.680685,51.066929,'30','Driepikkelstraat','9030 Mariakerke','/img/sample.jpg',1,0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(5,'Sports Hall Bourgoyen',3.680685,51.066929,'30','Driepikkelstraat','9030 Mariakerke','/img/sample.jpg',1,0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(6,'Be locatie',4.389883999999938,51.203091,'KDG','KDG','KDG','/img/sample.jpg',0,1,'2015-06-01 15:40:56','2015-06-01 15:40:56');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url_image` text COLLATE utf8_unicode_ci NOT NULL,
  `url_youtube` text COLLATE utf8_unicode_ci NOT NULL,
  `sender_team` int(11) NOT NULL,
  `sender_role` int(11) NOT NULL,
  `url_youtube_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `album_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `media_album_id_foreign` (`album_id`),
  CONSTRAINT `media_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `description`, `url_image`, `url_youtube`, `sender_team`, `sender_role`, `url_youtube_full`, `album_id`, `created_at`, `updated_at`)
VALUES
	(1,'sample','/img/sample.jpg','',0,0,'',0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(2,'Be Picture','/images/media/01-06-2015-03-29-43.png','',1,0,'',2,'2015-06-01 15:29:43','2015-06-01 15:29:43'),
	(3,'Be youtube','','NAR_WSDaV9w',1,0,'https://www.youtube.com/watch?v=NAR_WSDaV9w',2,'2015-06-01 15:30:07','2015-06-01 15:30:07'),
	(4,'Admin foto','/images/media/01-06-2015-03-31-09.jpg','',0,0,'',1,'2015-06-01 15:31:09','2015-06-01 15:31:09');

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_tag`;

CREATE TABLE `media_tag` (
  `tag_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `media_tag_tag_id_index` (`tag_id`),
  KEY `media_tag_media_id_index` (`media_id`),
  CONSTRAINT `media_tag_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `media_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `media_tag` WRITE;
/*!40000 ALTER TABLE `media_tag` DISABLE KEYS */;

INSERT INTO `media_tag` (`tag_id`, `media_id`, `created_at`, `updated_at`)
VALUES
	(1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(1,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,4,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `media_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table message_team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message_team`;

CREATE TABLE `message_team` (
  `message_id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `message_team_message_id_index` (`message_id`),
  KEY `message_team_team_id_index` (`team_id`),
  CONSTRAINT `message_team_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `message_team_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `message_team` WRITE;
/*!40000 ALTER TABLE `message_team` DISABLE KEYS */;

INSERT INTO `message_team` (`message_id`, `team_id`, `created_at`, `updated_at`)
VALUES
	(1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,12,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,13,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,14,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,15,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `message_team` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `important` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `sender_role` int(11) NOT NULL,
  `sender_team` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `url_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`id`, `subject`, `body`, `important`, `visible`, `sender_role`, `sender_team`, `published_at`, `delete_at`, `url_image`, `created_at`, `updated_at`)
VALUES
	(1,'Admin bericht aan Belgie','Hallo Belgie',1,0,1,'0','2015-06-01 17:27:50','2025-06-01 17:27:50','','2015-06-01 15:27:50','2015-06-01 15:27:50'),
	(2,'Admin bericht aan iedereen (hidden)','Hallo iedereen',0,1,1,'0','2015-06-01 17:28:22','2025-06-01 17:28:22','/images/messages/201-06-2015-03-28-22.jpg','2015-06-01 15:28:22','2015-06-01 15:28:22'),
	(3,'Guide bericht','Hallo team!',0,0,2,'1','2015-06-01 17:28:58','2025-06-01 17:28:58','','2015-06-01 15:28:58','2015-06-01 15:28:58');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2015_03_12_145411_create_news_table',1),
	('2015_04_20_124325_create_messages_table',1),
	('2015_04_21_111056_create_events_table',1),
	('2015_05_09_181120_create_teams_table',1),
	('2015_05_10_154056_create_players_table',1),
	('2015_05_16_120343_create_tags_table',1),
	('2015_05_24_144350_create_media_table',1),
	('2015_05_24_144727_create_albums_table',1),
	('2015_05_24_220200_create_highscores_table',1),
	('2015_05_28_213914_create_locations_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body_nl` text COLLATE utf8_unicode_ci NOT NULL,
  `body_eng` text COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `highlight` tinyint(1) NOT NULL,
  `sender_role` int(11) NOT NULL,
  `sender_team` int(11) NOT NULL,
  `url_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_youtube_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `title`, `body_nl`, `body_eng`, `visible`, `highlight`, `sender_role`, `sender_team`, `url_image`, `url_youtube`, `url_youtube_full`, `publish_at`, `created_at`, `updated_at`)
VALUES
	(1,'Integer a ultrices','','Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',1,0,0,1,'','a81yu8nDPr0','','0000-00-00 00:00:00','2015-06-01 15:27:18','2015-06-01 15:34:24'),
	(2,'Integer a ultrices','','Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',0,0,0,1,'/images/catalog/5.jpg','','','0000-00-00 00:00:00','2015-06-01 15:27:18','2015-06-01 15:32:48'),
	(3,'Integer a ultrices','','Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',0,0,0,1,'','_OBlgSz8sSM','','0000-00-00 00:00:00','2015-06-01 15:27:18','2015-06-01 15:32:37'),
	(4,'Integer a ultrices','','Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',0,0,0,1,'','4yu8r_wC0JQ','','0000-00-00 00:00:00','2015-06-01 15:27:18','2015-06-01 15:33:05'),
	(5,'Admin niews','Nederlands','Engels',1,0,1,0,'/images/news/01-06-2015-03-34-58.jpg','','','2015-06-01 17:34:58','2015-06-01 15:34:58','2015-06-01 15:34:58');

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news_tag`;

CREATE TABLE `news_tag` (
  `news_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `news_tag_news_id_index` (`news_id`),
  KEY `news_tag_tag_id_index` (`tag_id`),
  CONSTRAINT `news_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  CONSTRAINT `news_tag_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `news_tag` WRITE;
/*!40000 ALTER TABLE `news_tag` DISABLE KEYS */;

INSERT INTO `news_tag` (`news_id`, `tag_id`, `created_at`, `updated_at`)
VALUES
	(1,17,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,17,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,17,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,17,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,17,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `news_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `url_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `players_team_id_foreign` (`team_id`),
  CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;

INSERT INTO `players` (`id`, `first_name`, `last_name`, `number`, `gender`, `team_id`, `url_image`, `created_at`, `updated_at`)
VALUES
	(1,'player 0','Lastname',0,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(2,'player 1','Lastname',1,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(3,'player 2','Lastname',2,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(4,'player 3','Lastname',3,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(5,'player 4','Lastname',4,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(6,'player 5','Lastname',5,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(7,'player 6','Lastname',6,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(8,'player 7','Lastname',7,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(9,'player 8','Lastname',8,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(10,'player 9','Lastname',9,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(11,'player 10','Lastname',10,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(12,'player 11','Lastname',11,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(13,'player 12','Lastname',12,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(14,'player 13','Lastname',13,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(15,'player 14','Lastname',14,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(16,'player 15','Lastname',15,1,1,'','2015-06-01 15:27:18','2015-06-01 15:27:18');

/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `name`, `team`, `created_at`, `updated_at`)
VALUES
	(1,'Belgium',1,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(2,'Australia',2,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(3,'Russia',3,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(4,'Brasil',4,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(5,'Netherlands',5,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(6,'Czech Republic',6,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(7,'Germany',7,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(8,'Hungary',8,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(9,'Chinese Tapei',9,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(10,'Catalonia',10,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(11,'Hong Kong',11,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(12,'Poland',12,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(13,'Portugal',13,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(14,'England',14,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(15,'China',15,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(16,'South Afrika',16,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(17,'frontpage',0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(18,'game',0,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(19,'competition',0,'2015-06-01 15:27:18','2015-06-01 15:27:18');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `url_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_flag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hashtag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `name`, `about`, `url_website`, `url_facebook`, `url_twitter`, `url_flag`, `url_cover`, `hashtag`, `tag_id`, `created_at`, `updated_at`)
VALUES
	(1,'Belgium','The Belgium national korfball team is managed by the Koninklijke Belgische Korfbalbond (KBKB), representing Belgium in korfball international competitions. The Koninklijke Belgische Korfbalbond was one of the founders of the International Korfball Federation, with the Dutch Federation, on 11 June 1933.','','','','/images/team/1.png','/img/sample.jpg','',1,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(2,'Australia','','','','','/images/team/2.png','/img/sample.jpg','',2,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(3,'Russia','','','','','/images/team/3.png','/img/sample.jpg','',3,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(4,'Brasil','','','','','/images/team/4.png','/img/sample.jpg','',4,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(5,'Netherlands','','','','','/images/team/5.png','/img/sample.jpg','',5,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(6,'Czech Republic','','','','','/images/team/6.png','/img/sample.jpg','',6,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(7,'Germany','','','','','/images/team/7.png','/img/sample.jpg','',7,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(8,'Hungary','','','','','/images/team/8.png','/img/sample.jpg','',8,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(9,'Chinese Tapei','','','','','/images/team/9.png','/img/sample.jpg','',9,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(10,'Catalonia','','','','','/images/team/10.png','/img/sample.jpg','',10,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(11,'Hong Kong','','','','','/images/team/11.png','/img/sample.jpg','',11,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(12,'Poland','','','','','/images/team/12.png','/img/sample.jpg','',12,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(13,'Portugal','','','','','/images/team/13.png','/img/sample.jpg','',13,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(14,'England','','','','','/images/team/14.png','/img/sample.jpg','',14,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(15,'China','','','','','/images/team/15.png','/img/sample.jpg','',15,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(16,'South Afrika','','','','','/images/team/16.png','/img/sample.jpg','',16,'2015-06-01 15:27:18','2015-06-01 15:27:18');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `team` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_team_foreign` (`team`),
  CONSTRAINT `users_team_foreign` FOREIGN KEY (`team`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `team`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin@test.be','$2y$10$bYMkIq2OkeZQb0PMAXJ85OU2Ryqktni235pIDxDGxJHavrbev.zuy',1,0,'E0tH7DFM3xXcLIDXXzJlhybuP74DrBlixzq1PAPkPlH160PfY8SGCRTitA3t','2015-06-01 15:27:18','2015-06-01 15:37:52'),
	(2,'belgium-teamleader','guide@test.be','$2y$10$uKhNmTwX2XpqWaSJp7zPFeQmS6zEF/S8wXK0GNFwA/O1rN8XDdeLS',2,1,'Tab8xxHaYQH5VRDK4r56X9krztNtPkvXAWljlBEzYDHgWkJvGzXUx8uN64XI','2015-06-01 15:27:18','2015-06-01 15:45:32'),
	(3,'brasil','player-brasil@team.com','$2y$10$8FjiSydbausVD7945EdRF.2cf7B7pi68HY86BQJRbOALMQTRAigMe',3,4,NULL,'2015-06-01 15:27:18','2015-06-01 15:27:18'),
	(4,'belgium','player@test.be','$2y$10$wyTx7jH5/uqebeI/.r.L3.syzhU6u9BtO0GyHln9diQJK.UAFEQO.',3,1,'OFqQGJHDHuXnwz9w24URWpfoHgyVbyIklLZdsyC4JMa7KTSC8cydImYtnD1z','2015-06-01 15:27:18','2015-06-01 18:33:26');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
