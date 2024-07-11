/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - start_new
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`start_new` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `start_new`;

/*Table structure for table `booking_items` */

DROP TABLE IF EXISTS `booking_items`;

CREATE TABLE `booking_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_items_booking_id_foreign` (`booking_id`),
  KEY `booking_items_item_type_item_id_index` (`item_type`,`item_id`),
  CONSTRAINT `booking_items_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `booking_items` */

insert  into `booking_items`(`id`,`booking_id`,`item_type`,`item_id`,`created_at`,`updated_at`) values 
(11,9,'service_variant',1,'2024-06-27 07:09:34','2024-06-27 07:09:34'),
(12,10,'service_variant',1,'2024-06-27 07:16:59','2024-06-27 07:16:59'),
(13,11,'package',1,'2024-06-27 13:20:11','2024-06-27 13:20:11'),
(15,13,'service_variant',1,'2024-06-27 23:16:49','2024-06-27 23:16:49'),
(16,14,'package',1,'2024-06-28 00:56:16','2024-06-28 00:56:16');

/*Table structure for table `booking_packages` */

DROP TABLE IF EXISTS `booking_packages`;

CREATE TABLE `booking_packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `package_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_packages_booking_id_foreign` (`booking_id`),
  KEY `booking_packages_package_id_foreign` (`package_id`),
  CONSTRAINT `booking_packages_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `booking_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `booking_packages` */

/*Table structure for table `booking_service_variants` */

DROP TABLE IF EXISTS `booking_service_variants`;

CREATE TABLE `booking_service_variants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `service_variant_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_service_variants_booking_id_foreign` (`booking_id`),
  KEY `booking_service_variants_service_variant_id_foreign` (`service_variant_id`),
  CONSTRAINT `booking_service_variants_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `booking_service_variants_service_variant_id_foreign` FOREIGN KEY (`service_variant_id`) REFERENCES `service_variants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `booking_service_variants` */

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bookings` */

insert  into `bookings`(`id`,`user_id`,`booking_date`,`total_price`,`status`,`created_at`,`updated_at`) values 
(9,4,'2024-06-27 15:12:58',1000.00,'approved','2024-06-27 07:09:34','2024-06-27 07:09:34'),
(10,5,'2024-06-27 15:17:31',1000.00,'approved','2024-06-27 07:16:59','2024-06-27 07:16:59'),
(11,4,'2024-06-30 13:00:00',1500.00,'pending','2024-06-27 13:20:11','2024-06-27 13:20:11'),
(13,4,'2024-06-28 09:09:35',1000.00,'approved','2024-06-27 23:16:49','2024-06-27 23:16:49'),
(14,4,'2024-06-28 09:09:31',1500.00,'approved','2024-06-28 00:56:16','2024-06-28 00:56:16');

/*Table structure for table `business_images` */

DROP TABLE IF EXISTS `business_images`;

CREATE TABLE `business_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) unsigned NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `business_images_business_id_foreign` (`business_id`),
  CONSTRAINT `business_images_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `business_images` */

insert  into `business_images`(`id`,`business_id`,`image_path`,`created_at`,`updated_at`) values 
(5,2,'uploads/1718353789_salon_img4.jpg','2024-06-14 08:29:49','2024-06-14 08:29:49'),
(6,2,'uploads/1718353789_salon_img3.jpg','2024-06-14 08:29:49','2024-06-14 08:29:49'),
(7,2,'uploads/1718353789_salon_img2.jpg','2024-06-14 08:29:49','2024-06-14 08:29:49'),
(8,2,'uploads/1718353789_salon_img.jpg','2024-06-14 08:29:49','2024-06-14 08:29:49'),
(9,3,'uploads/1718449407_salon2.jpg','2024-06-15 11:03:27','2024-06-15 11:03:27'),
(10,3,'uploads/1718449407_service1.jpg','2024-06-15 11:03:27','2024-06-15 11:03:27'),
(11,3,'uploads/1718449407_service2.jpg','2024-06-15 11:03:27','2024-06-15 11:03:27'),
(12,3,'uploads/1718449407_service3.jpg','2024-06-15 11:03:27','2024-06-15 11:03:27'),
(13,4,'uploads/1718450931_istockphoto-685914670-2048x2048.jpg','2024-06-15 11:28:51','2024-06-15 11:28:51'),
(14,4,'uploads/1718450931_new3.jpg','2024-06-15 11:28:51','2024-06-15 11:28:51'),
(15,4,'uploads/1718450931_new2.jpg','2024-06-15 11:28:51','2024-06-15 11:28:51'),
(16,4,'uploads/1718450931_new1.jpg','2024-06-15 11:28:51','2024-06-15 11:28:51'),
(17,5,'uploads/1718452684_istockphoto-685914670-2048x2048.jpg','2024-06-15 11:58:04','2024-06-15 11:58:04'),
(18,5,'uploads/1718452684_new4.jpg','2024-06-15 11:58:04','2024-06-15 11:58:04'),
(19,5,'uploads/1718452684_new3.jpg','2024-06-15 11:58:04','2024-06-15 11:58:04'),
(20,5,'uploads/1718452684_new2.jpg','2024-06-15 11:58:04','2024-06-15 11:58:04');

/*Table structure for table `businesses` */

DROP TABLE IF EXISTS `businesses`;

CREATE TABLE `businesses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `status` enum('approved','pending','declined') NOT NULL DEFAULT 'pending',
  `business_profile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `businesses_user_id_foreign` (`user_id`),
  CONSTRAINT `businesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `businesses` */

insert  into `businesses`(`id`,`user_id`,`business_name`,`address`,`contact_info`,`status`,`business_profile`,`created_at`,`updated_at`) values 
(2,2,'Besties Salon','Purok 7, Isidro D. Tan','091231231232','approved','uploads/1718353789_salon_prof.jpg','2024-06-14 08:29:49','2024-06-14 09:38:40'),
(3,3,'James Salon','Barangay 1, Tangub City','0933123','approved','uploads/1718449407_salon.jpg','2024-06-15 11:03:27','2024-06-15 11:04:25'),
(4,3,'Jane Salon','Polao, Tangub City','0933123','approved','uploads/1718450931_new4.jpg','2024-06-15 11:28:51','2024-06-26 08:14:51'),
(5,2,'Bakla\'s Salon','Brgy. 2, Tangub City','09231421','approved','uploads/1718452684_prof2.jpg','2024-06-15 11:58:04','2024-06-15 11:58:31');

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `cart_items` */

DROP TABLE IF EXISTS `cart_items`;

CREATE TABLE `cart_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` bigint(20) unsigned NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_cart_id_foreign` (`cart_id`),
  KEY `cart_items_item_type_item_id_index` (`item_type`,`item_id`),
  CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cart_items` */

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`created_at`,`updated_at`) values 
(5,4,'2024-06-20 07:35:14','2024-06-20 07:35:14'),
(6,5,'2024-06-27 07:16:42','2024-06-27 07:16:42');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

insert  into `failed_jobs`(`id`,`uuid`,`connection`,`queue`,`payload`,`exception`,`failed_at`) values 
(1,'f4e25362-0161-4da4-9f77-1ceccc73e17e','database','default','{\"uuid\":\"f4e25362-0161-4da4-9f77-1ceccc73e17e\",\"displayName\":\"App\\\\Mail\\\\NotificationMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:25:\\\"App\\\\Mail\\\\NotificationMail\\\":3:{s:7:\\\"details\\\";a:2:{s:5:\\\"title\\\";s:15:\\\"Mail from Salon\\\";s:4:\\\"body\\\";s:31:\\\"Your booking has been approved.\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"botscavandish@gmail.com\\r\\n\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}','Symfony\\Component\\Mime\\Exception\\RfcComplianceException: Email \"Online Beauty Salon\" does not comply with addr-spec of RFC 2822. in C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\mime\\Address.php:54\nStack trace:\n#0 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Message.php(58): Symfony\\Component\\Mime\\Address->__construct(\'Online Beauty S...\', \'\')\n#1 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(417): Illuminate\\Mail\\Message->from(\'Online Beauty S...\', NULL)\n#2 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(206): Illuminate\\Mail\\Mailable->buildFrom(Object(Illuminate\\Mail\\Message))\n#3 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(317): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}(Object(Illuminate\\Mail\\Message))\n#4 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(205): Illuminate\\Mail\\Mailer->send(Object(Closure), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#6 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(198): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#7 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(83): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#8 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#9 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#11 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#12 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#13 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#14 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#15 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#17 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#18 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#19 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(71): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#22 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#30 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#31 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#34 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1187): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\xampp\\htdocs\\start_new\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#42 {main}','2024-06-26 09:13:23'),
(2,'ef5d440b-ea9d-4654-ace6-b751f29a5005','database','default','{\"uuid\":\"ef5d440b-ea9d-4654-ace6-b751f29a5005\",\"displayName\":\"App\\\\Mail\\\\NotificationMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:25:\\\"App\\\\Mail\\\\NotificationMail\\\":3:{s:7:\\\"details\\\";a:2:{s:5:\\\"title\\\";s:15:\\\"Mail from Salon\\\";s:4:\\\"body\\\";s:31:\\\"Your booking has been approved.\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"botscavandish@gmail.com\\r\\n\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}','Symfony\\Component\\Mime\\Exception\\RfcComplianceException: Email \"Online Beauty Salon\" does not comply with addr-spec of RFC 2822. in C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\mime\\Address.php:54\nStack trace:\n#0 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Message.php(58): Symfony\\Component\\Mime\\Address->__construct(\'Online Beauty S...\', \'\')\n#1 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(417): Illuminate\\Mail\\Message->from(\'Online Beauty S...\', NULL)\n#2 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(206): Illuminate\\Mail\\Mailable->buildFrom(Object(Illuminate\\Mail\\Message))\n#3 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(317): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}(Object(Illuminate\\Mail\\Message))\n#4 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(205): Illuminate\\Mail\\Mailer->send(Object(Closure), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#6 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(198): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#7 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(83): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#8 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#9 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#11 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#12 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#13 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#14 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#15 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#17 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#18 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#19 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(71): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#22 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#30 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#31 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#34 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1187): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 C:\\xampp\\htdocs\\start_new\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#42 {main}','2024-06-26 09:14:29'),
(3,'0b7efe30-4494-434c-bdb9-be5eeea9e4f2','database','default','{\"uuid\":\"0b7efe30-4494-434c-bdb9-be5eeea9e4f2\",\"displayName\":\"App\\\\Mail\\\\NotificationMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:25:\\\"App\\\\Mail\\\\NotificationMail\\\":3:{s:7:\\\"details\\\";a:2:{s:5:\\\"title\\\";s:15:\\\"Mail from Salon\\\";s:4:\\\"body\\\";s:31:\\\"Your booking has been approved.\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"botscavandish@gmail.com\\r\\n\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}','Error: Class \"Illuminate\\Mail\\Address\" not found in C:\\xampp\\htdocs\\start_new\\app\\Mail\\NotificationMail.php:34\nStack trace:\n#0 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(1677): App\\Mail\\NotificationMail->envelope()\n#1 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(1633): Illuminate\\Mail\\Mailable->ensureEnvelopeIsHydrated()\n#2 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(199): Illuminate\\Mail\\Mailable->prepareMailableForDelivery()\n#3 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#4 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(198): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#5 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(83): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#6 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#7 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#12 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#13 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#14 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#16 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#18 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#19 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(71): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#21 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#22 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#23 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#24 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#25 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#26 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#27 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#28 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#29 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#30 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#31 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#32 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#33 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#34 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\xampp\\htdocs\\start_new\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 C:\\xampp\\htdocs\\start_new\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1187): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 C:\\xampp\\htdocs\\start_new\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#40 {main}','2024-06-26 09:21:47');

/*Table structure for table `image_services` */

DROP TABLE IF EXISTS `image_services`;

CREATE TABLE `image_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_services_service_id_foreign` (`service_id`),
  CONSTRAINT `image_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `image_services` */

insert  into `image_services`(`id`,`service_id`,`path`,`created_at`,`updated_at`) values 
(1,1,'storage/uploads/1718454163_foot1.jpg','2024-06-15 12:22:43','2024-06-15 12:22:43'),
(2,1,'storage/uploads/1718454163_foot5.jpg','2024-06-15 12:22:43','2024-06-15 12:22:43'),
(3,1,'storage/uploads/1718454163_foot4.jpg','2024-06-15 12:22:43','2024-06-15 12:22:43'),
(4,1,'storage/uploads/1718454163_foot3.jpg','2024-06-15 12:22:43','2024-06-15 12:22:43'),
(5,1,'storage/uploads/1718454163_foot2.jpg','2024-06-15 12:22:43','2024-06-15 12:22:43'),
(6,2,'storage/uploads/1718507085_145047981_4049738131712141_6577185974017704780_n.jpg','2024-06-16 03:04:45','2024-06-16 03:04:45'),
(7,2,'storage/uploads/1718507085_salon.jpg','2024-06-16 03:04:45','2024-06-16 03:04:45'),
(8,2,'storage/uploads/1718507085_nmsc.jpg','2024-06-16 03:04:45','2024-06-16 03:04:45'),
(9,2,'storage/uploads/1718507085_gadtc1.jpg','2024-06-16 03:04:45','2024-06-16 03:04:45'),
(10,3,'storage/uploads/1718870532_salon.jpg','2024-06-20 08:02:12','2024-06-20 08:02:12'),
(11,3,'storage/uploads/1718870532_nmsc.jpg','2024-06-20 08:02:12','2024-06-20 08:02:12'),
(12,3,'storage/uploads/1718870532_gadtc3.jpg','2024-06-20 08:02:12','2024-06-20 08:02:12'),
(13,3,'storage/uploads/1718870532_gadtc2.jpg','2024-06-20 08:02:12','2024-06-20 08:02:12'),
(14,3,'storage/uploads/1718870532_gadtc1.jpg','2024-06-20 08:02:12','2024-06-20 08:02:12'),
(15,4,'storage/uploads/1718870572_gadtc3.jpg','2024-06-20 08:02:52','2024-06-20 08:02:52'),
(16,4,'storage/uploads/1718870572_gadtc2.jpg','2024-06-20 08:02:52','2024-06-20 08:02:52'),
(17,4,'storage/uploads/1718870572_gadtc1.jpg','2024-06-20 08:02:52','2024-06-20 08:02:52'),
(18,4,'storage/uploads/1718870572_kobe.jpg','2024-06-20 08:02:52','2024-06-20 08:02:52'),
(19,4,'storage/uploads/1718870572_432728634_25396519373297354_6213036801938853823_n.png','2024-06-20 08:02:52','2024-06-20 08:02:52');

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2024_05_27_064259_create_businesses_table',1),
(5,'2024_05_27_064347_create_requirements_table',1),
(6,'2024_05_27_064420_create_requirement_submissions_table',1),
(7,'2024_05_27_064519_create_services_table',1),
(8,'2024_05_27_064538_create_bookings_table',1),
(9,'2024_05_27_065512_create_payments_table',1),
(10,'2024_06_11_235818_create_image_services_table',1),
(11,'2024_06_12_034756_create_service_variants_table',1),
(12,'2024_06_12_045314_create_packages_table',1),
(13,'2024_06_12_061746_create_booking_service_variants',1),
(14,'2024_06_12_061803_create_booking_packages',1),
(15,'2024_06_12_063338_create_package_service_variants',1),
(16,'2024_06_14_063146_create_business_images_table',1),
(17,'2024_06_17_012535_create_carts_table',2),
(18,'2024_06_17_012624_create_cart_items_table',2),
(19,'2024_06_18_050632_create_booking_items_table',3);

/*Table structure for table `package_service_variants` */

DROP TABLE IF EXISTS `package_service_variants`;

CREATE TABLE `package_service_variants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` bigint(20) unsigned NOT NULL,
  `service_variant_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_service_variants_package_id_foreign` (`package_id`),
  KEY `package_service_variants_service_variant_id_foreign` (`service_variant_id`),
  CONSTRAINT `package_service_variants_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `package_service_variants_service_variant_id_foreign` FOREIGN KEY (`service_variant_id`) REFERENCES `service_variants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `package_service_variants` */

insert  into `package_service_variants`(`id`,`package_id`,`service_variant_id`,`created_at`,`updated_at`) values 
(1,1,3,'2024-06-16 03:06:37','2024-06-16 03:06:37'),
(2,1,1,'2024-06-16 03:06:37','2024-06-16 03:06:37'),
(3,2,5,'2024-06-20 08:05:17','2024-06-20 08:05:17'),
(4,2,8,'2024-06-20 08:05:17','2024-06-20 08:05:17');

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`package_name`,`description`,`status`,`price`,`created_at`,`updated_at`) values 
(1,'Special Package','This is special Package','active',1500.00,'2024-06-16 03:06:37','2024-06-16 03:06:37'),
(2,'Special Bakla Package','This is package','active',700.00,'2024-06-20 08:05:17','2024-06-20 08:05:17');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` enum('pending','approved','declined') NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_booking_id_foreign` (`booking_id`),
  CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payments` */

insert  into `payments`(`id`,`booking_id`,`amount`,`status`,`payment_date`,`created_at`,`updated_at`) values 
(7,9,1000.00,'pending','2024-07-02 15:12:44',NULL,NULL),
(8,10,1000.00,'pending','2024-07-05 15:17:22',NULL,NULL),
(9,14,1500.00,'pending','2024-06-28 14:02:15',NULL,NULL),
(10,13,1000.00,'pending','2024-06-26 09:06:07',NULL,NULL);

/*Table structure for table `requirement_submissions` */

DROP TABLE IF EXISTS `requirement_submissions`;

CREATE TABLE `requirement_submissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) unsigned NOT NULL,
  `requirement_id` bigint(20) unsigned NOT NULL,
  `submission_details` text NOT NULL,
  `status` enum('pending','approved','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requirement_submissions_business_id_foreign` (`business_id`),
  KEY `requirement_submissions_requirement_id_foreign` (`requirement_id`),
  CONSTRAINT `requirement_submissions_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `requirement_submissions_requirement_id_foreign` FOREIGN KEY (`requirement_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `requirement_submissions` */

insert  into `requirement_submissions`(`id`,`business_id`,`requirement_id`,`submission_details`,`status`,`created_at`,`updated_at`) values 
(1,2,1,'uploads/WspDoQbg6DNFQgxalrfaTH7UGNajCHKRkJrg5gCF.jpg','approved','2024-06-14 08:29:49','2024-06-14 09:38:37'),
(2,2,2,'uploads/AoYaaa1cbH3iPqmWAdu4UsRn30vR6mTn0b8JoWI0.jpg','approved','2024-06-14 08:29:49','2024-06-14 09:38:40'),
(3,3,1,'uploads/c2cWGlAOFD0bORztSRAg4qow3Ox2IXdUZNnq0TtH.jpg','approved','2024-06-15 11:03:27','2024-06-15 11:04:24'),
(4,3,2,'uploads/VwssC3q8h2zOYjwg5R4wsrcXbJZXSK9dPnBVKV3a.jpg','approved','2024-06-15 11:03:27','2024-06-15 11:04:25'),
(5,4,1,'uploads/nxnDamd4GzDXFHZB9EAiEdAVlLA7VsXJONeCO5jp.jpg','approved','2024-06-15 11:28:51','2024-06-15 11:29:50'),
(6,4,2,'uploads/w3N0YAKXcO4GeQRVkwu9dynNaJjFlHxbKyOuAH4Z.jpg','approved','2024-06-15 11:28:51','2024-06-15 11:29:53'),
(7,5,1,'uploads/FFfpgNNapUoKK8xd5CvmRuWejDVdl9Uxhs1Oz7sD.jpg','approved','2024-06-15 11:58:04','2024-06-15 11:58:30'),
(8,5,2,'uploads/RPpG6Fn61aCWIb3tvwjTPbpkeiH3ujX40hyfTXni.jpg','approved','2024-06-15 11:58:04','2024-06-15 11:58:31');

/*Table structure for table `requirements` */

DROP TABLE IF EXISTS `requirements`;

CREATE TABLE `requirements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `requirement_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `requirements` */

insert  into `requirements`(`id`,`requirement_name`,`description`,`status`,`created_at`,`updated_at`) values 
(1,'Barangay Clearance','This is barangay clearance','active','2024-06-14 08:10:03','2024-06-14 08:10:03'),
(2,'Business Permit','This is business permit','active','2024-06-14 08:10:17','2024-06-14 08:10:17');

/*Table structure for table `service_variants` */

DROP TABLE IF EXISTS `service_variants`;

CREATE TABLE `service_variants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_variants_service_id_foreign` (`service_id`),
  CONSTRAINT `service_variants_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `service_variants` */

insert  into `service_variants`(`id`,`service_id`,`name`,`description`,`price`,`status`,`created_at`,`updated_at`) values 
(1,2,'Special Hair Rebond','This is special hair rebond',1000.00,'active','2024-06-16 03:05:11','2024-06-16 03:05:11'),
(2,2,'Regular Hair Rebond','This is regular hair rebond',500.00,'active','2024-06-16 03:05:29','2024-06-16 03:05:29'),
(3,1,'Special Foot Massage','This is special',750.00,'active','2024-06-16 03:05:53','2024-06-16 03:05:53'),
(4,1,'Regular Foot Massage','REgular ni sya',450.00,'active','2024-06-16 03:06:06','2024-06-16 03:06:06'),
(5,3,'Special Facial','This is special facial',200.00,'active','2024-06-20 08:03:23','2024-06-20 08:03:23'),
(6,3,'Regular Facial','This is regular facial',100.00,'active','2024-06-20 08:03:41','2024-06-20 08:03:41'),
(7,4,'Regular Full Body Massage','This is test',300.00,'active','2024-06-20 08:04:11','2024-06-20 08:04:11'),
(8,4,'Special Full Body Massage','This is special test',500.00,'active','2024-06-20 08:04:32','2024-06-20 08:04:32');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) unsigned NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_business_id_foreign` (`business_id`),
  CONSTRAINT `services_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`business_id`,`service_name`,`description`,`created_at`,`updated_at`) values 
(1,4,'Foot Massage','This is foot massage','2024-06-15 12:22:43','2024-06-15 12:22:43'),
(2,4,'Hair Rebond','This is hair rebond','2024-06-16 03:04:45','2024-06-16 03:04:45'),
(3,5,'Facial','This is facial','2024-06-20 08:02:12','2024-06-20 08:02:12'),
(4,5,'Full Body Massage','This is full body massage','2024-06-20 08:02:52','2024-06-20 08:02:52');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('A3hcM0ll0W0aJzhVpy2s6LEpT1lSrwLMIpfN4WwO',NULL,'::1','PostmanRuntime/7.40.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNXhuZUNTNUQ5bkRIaEd0ZFBaU0U1d2RCdUY0T2FaWG9JZDd5UlEzdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cDovL2xvY2FsaG9zdC9zdGFydF9uZXcvcHVibGljL3JlcXVpcmVtZW50X2xpc3QiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovL2xvY2FsaG9zdC9zdGFydF9uZXcvcHVibGljL3Rlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1720668498),
('GbcuXAuSS041za504FZR1K0TYdoE19ooWYi1UsDx',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZGg3OG9RenFocUN0ZlFjVmpud0Vhdm5OUXBTMmJYUGw5UFFMRllVQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Qvc3RhcnRfbmV3L3B1YmxpYy92aWV3X3NhbG9uLzQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0L3N0YXJ0X25ldy9wdWJsaWMvdXNlcl9jYXJ0Ijt9fQ==',1720668962),
('O4eGmfyP1qj9aqHomlD2gyHac6xtrirDEb4punWW',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiRHJqMmJGa21Bb29pS3E5TFRDeklVSkc2elp5UjZYdHA1UTVLSnF3UiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1720662841),
('QySQItdQIdQPtXaI9xx4ZlWf26R1Mr8ULBokEzvR',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiUDBpUkQ2NTJqUlo1bFV6cWs4RWNnbWZjR3h0dnZSZHo4SWxPWHRSZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1720662829),
('w4qVdh2KzgDj6aLsGXnbxMuiW41M8xdktUBl3z5Q',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHdLOHBzOHU4WnZ0VDIydGNHSnNKVzhMS3BsZm9kZEQyQnJzdkVJbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Qvc3RhcnRfbmV3L3B1YmxpYy92aWV3X3NhbG9uLzQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1720669051);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`email`,`user_type`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Default','Admin','admin@example.com','admin','$2y$12$7tk9acMXjzcYAfhrcV7SGObPN31ltVRQk4JCWKZNc2ko2F1zpwaaO','k8ifo6QB0FaAkPBRUt5rRT2DlIOUB1KOO5emYMapwK2DXv7aJ3pPuo4YdQj1','2024-06-14 08:09:24','2024-06-14 08:09:24'),
(2,'Kristian','Tare','tare.kristian@gmail.com','business_admin','$2y$12$oKCGyKZTR7lD0EixAgMrnOQ.1zGEtdJSu1Ga84RUTSgCUKE1k8mu.',NULL,'2024-06-14 08:10:54','2024-06-14 08:10:54'),
(3,'James','Probitso','james@gmail.com','business_admin','$2y$12$brH4IOblhmZ2vVzBaISQ4.ss90AF971w5lEeGoNsd3jOr2JGn/Q0K',NULL,'2024-06-15 11:02:14','2024-06-15 11:02:14'),
(4,'Bizel','Recto','bizel@gmail.com','user','$2y$12$ya47dD/UQiMi.VDvxualkOfaUhcSmnoBWq7yXGXVhULReZocJD1Li',NULL,'2024-06-17 05:44:29','2024-06-20 02:53:30'),
(5,'Al Cedric','Dario','dario@gmail.com','user','$2y$12$t0xRLtDYFRpqVWp8NGtBJOa9B3xRkFcDd58PEP6iO3mmiDMOtaFBK',NULL,'2024-06-17 12:45:21','2024-06-17 12:45:21'),
(6,'Sheena','Araniego','sheena@gmail.com','user','$2y$12$NMyRggQglUBMPomzubkBtOC/M5K2R9Q4bFzbBHuU9ERKu.AQHcM3a',NULL,'2024-07-11 02:00:42','2024-07-11 02:00:42');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
