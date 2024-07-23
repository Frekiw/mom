-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `meetings`;
CREATE TABLE `meetings` (
  `id_meeting` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_mt` int unsigned DEFAULT NULL,
  `stmeeting_id` int unsigned DEFAULT NULL,
  `forward_id` int unsigned DEFAULT NULL,
  `owner_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `pm_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `client_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `narasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_meeting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `meetings` (`id_meeting`, `id_mt`, `stmeeting_id`, `forward_id`, `owner_id`, `title`, `date`, `notes`, `pm_sign`, `sign_date`, `client_sign`, `narasi`, `password`, `created_at`, `updated_at`) VALUES
(38,	770818,	17,	9,	1,	'1',	'2024-07-15',	'<ol><li>Lorem ipsum dolor sit amet</li></ol>',	'Approve',	'2024-07-15',	'Approve',	'Virgus mengundang anda untuk menandatangani dokumen Minutes of Meeting\n\nTopik : Meeting Pilog ke-1\nWaktu : 2024-07-15\n\nLihat Dokumen : http://minutes-meeting.test/sign/ubah/38\n\nID Meeting : 38\nKode Meeting : 770818\nPassword : MaxMeeting',	'MaxMeeting',	'2024-07-15 00:48:51',	'2024-07-15 00:52:11'),
(39,	354749,	17,	11,	1,	'2',	'2024-07-16',	'Lorem ipsum dolor sit amet',	'Approve',	NULL,	NULL,	'Virgus mengundang anda untuk menandatangani dokumen Minutes of Meeting\n\nTopik : Meeting Pilog ke-2\nWaktu : 2024-07-16\n\nLihat Dokumen : http://minutes-meeting.test/sign/ubah/39\n\nID Meeting : 39\nKode Meeting : 354749\nPassword : MaxMeeting',	'MaxMeeting',	'2024-07-15 21:10:28',	'2024-07-15 21:10:28');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2020_05_21_100000_create_teams_table',	1),
(7,	'2020_05_21_200000_create_team_user_table',	1),
(8,	'2020_05_21_300000_create_team_invitations_table',	1),
(9,	'2024_06_27_081739_create_sessions_table',	1),
(10,	'2024_06_27_082158_create_meetings_table',	2);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1,	'App\\Models\\User',	1,	'authToken',	'3ab5eb506284eaa0fafb1d908f72cd50b75e14cb637aff23dc68f10d59d8f488',	'[\"*\"]',	NULL,	NULL,	'2024-07-08 02:20:12',	'2024-07-08 02:20:12'),
(3,	'App\\Models\\User',	1,	'authToken',	'1b505ccc24a337e58fb306c37cb8994f227ab2153a767ad2160d236005bd0bed',	'[\"*\"]',	NULL,	NULL,	'2024-07-08 02:47:53',	'2024-07-08 02:47:53'),
(4,	'App\\Models\\User',	1,	'authToken',	'869159cd22d06824895b0b963a4cbeeca06026ccab898813d71be053371d4956',	'[\"*\"]',	'2024-07-08 02:53:36',	NULL,	'2024-07-08 02:48:09',	'2024-07-08 02:53:36'),
(5,	'App\\Models\\User',	1,	'authToken',	'6188ca693371bb952b9fa605313e6cd3084e0a0cb4a0bf5880725bc29737846f',	'[\"*\"]',	'2024-07-15 20:56:08',	NULL,	'2024-07-08 21:09:00',	'2024-07-15 20:56:08'),
(6,	'App\\Models\\User',	1,	'authToken',	'5aecc6d81880106938e73b995dc2f9c41c80c52543391c5222bd0c8eafd3dceb',	'[\"*\"]',	'2024-07-09 21:05:45',	NULL,	'2024-07-09 20:36:36',	'2024-07-09 21:05:45'),
(7,	'App\\Models\\User',	1,	'authToken',	'e7c5ccc48fbca4899720cad09a456f24165fc02ac9861127e2bc8033190fdca2',	'[\"*\"]',	'2024-07-15 21:10:28',	NULL,	'2024-07-15 21:05:44',	'2024-07-15 21:10:28');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5B8fkOV3nzKvDlQ7or3R4KVNHDyuz2mok7CNKLD3',	1,	'127.0.0.1',	'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibUxBU2U0OVNqNWxkMG1pSlVnQXlpWTVmWlI4Y1FSNUlPMEZNNWd4WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9taW51dGVzLW1lZXRpbmcudGVzdC9zaWduL3BvcnRhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTM6ImF1dGhlbnRpY2F0ZWQiO2I6MTtzOjI0OiJhdXRoZW50aWNhdGVkX2lkX21lZXRpbmciO3M6MjoiMzgiO30=',	1721113933),
('bu7krOKfYBXy4IRyd7Wy9VMM8kuBen16vC0Zfpxu',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMU1wclFiTVRKZklsRlkxcTYyYUxmMFFmaU9GU1VKMFI0RHI2b0ZrbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9taW51dGVzLW1lZXRpbmcudGVzdC9zaWduL3BvcnRhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1721111654),
('Px2KKes2j2wHuRBSOzz3PdrwS0DMvuOz8ByMkuLM',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0RRSXJYVjdDTElGUVZwakZEZjBENmtKVG9jcjdKeHJiQUVkQ0FCYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9taW51dGVzLW1lZXRpbmcudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1721187252),
('R54XblS1O1AU1SItCLV3h0coNjPHKJQrPkQYgK1G',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibXNNU1ZXOU5Yb0RVdWZrRUJaSXpiTGxyeHRJallkQm5sU0VSUUxONSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9taW51dGVzLW1lZXRpbmcudGVzdC9zaWduL3ViYWgvMzgiO31zOjEzOiJhdXRoZW50aWNhdGVkIjtiOjE7czoyNDoiYXV0aGVudGljYXRlZF9pZF9tZWV0aW5nIjtzOjI6IjM4Ijt9',	1721208252),
('YUsNlFfL43xq5R8uWLef8M8OKIabQEZSV1Hu52qa',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVERnVERtMFVFMmVSMjRpZGwzejRsV0luZkU5WXUwSUJzSXV5ZDhzYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9taW51dGVzLW1lZXRpbmcudGVzdC9zaWduL3ViYWgvMzgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjEzOiJhdXRoZW50aWNhdGVkIjtiOjE7czoyNDoiYXV0aGVudGljYXRlZF9pZF9tZWV0aW5nIjtzOjI6IjM4Ijt9',	1721187340),
('Z2wVYjGFffiTszuIh4RFWy9dALyOliZa0cNarrIt',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTEdwc3RzUDhlUHVMdHgzT0dwMllrcGNxVHZkM1VUNHE1TmJ3REZDRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9taW51dGVzLW1lZXRpbmcudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1721187252),
('ZNNsCHTxCmk2kLivk3g408wE6mL9DyYCfGyU3Dw0',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNjBwWmc0bVFLbGlHMDExOVF2NUU2anZmRldDVnRyN3BnRGhkd0J0WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9taW51dGVzLW1lZXRpbmcudGVzdC9zaWduL3ViYWgvMzgiO31zOjEzOiJhdXRoZW50aWNhdGVkIjtiOjE7czoyNDoiYXV0aGVudGljYXRlZF9pZF9tZWV0aW5nIjtzOjI6IjM4Ijt9',	1721123393);

DROP TABLE IF EXISTS `stmeetings`;
CREATE TABLE `stmeetings` (
  `id_stmeeting` bigint NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_stmeeting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `stmeetings` (`id_stmeeting`, `name`, `created_at`, `updated_at`) VALUES
(17,	'Pilog',	'2024-07-10 20:01:44',	'2024-07-10 20:01:44'),
(18,	'Pusri',	'2024-07-10 20:02:48',	'2024-07-10 20:02:48'),
(19,	'Surya Zig Zag',	'2024-07-10 20:03:13',	'2024-07-10 20:03:13'),
(20,	'Mandiri Sekuritas',	'2024-07-10 20:04:24',	'2024-07-10 20:04:24');

DROP TABLE IF EXISTS `team_invitations`;
CREATE TABLE `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `team_user`;
CREATE TABLE `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1,	1,	'virgus\'s Team',	1,	'2024-06-27 01:45:21',	'2024-06-27 01:45:21');

DROP TABLE IF EXISTS `tncs`;
CREATE TABLE `tncs` (
  `id_tnc` bigint NOT NULL,
  `narasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tncs` (`id_tnc`, `narasi`, `created_at`, `updated_at`) VALUES
(1,	'<ol><li>Lorem ipsum</li></ol>',	'2024-07-11 04:38:06',	'2024-07-10 21:38:06');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nomor` bigint DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT '1',
  `profile_photo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `nomor`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `roles`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'Virgus',	'pixcommio@gmail.com',	NULL,	112233,	'$2y$12$zyQr77Sq/M/UbQcyIfPPP.nEdDZ4V/G6LJFnAlqbmqh8ZuxTetP8m',	NULL,	NULL,	NULL,	'',	'ADMIN',	1,	'assets/user/uGjo7Nk7J7kT653AFXiGwQblcrDIZ7vws3y9E89J.png',	'2024-06-27 01:45:21',	'2024-07-12 01:16:45'),
(2,	'jodiiii',	'jodi@gmail.com',	NULL,	NULL,	'',	'',	'',	NULL,	'',	'USER',	1,	'assets/user/fP0Zh3yGPmW6EXbILmH8N7NpcPqWHU1RxqStP5Qf.jpg',	'2024-07-04 23:24:34',	'2024-07-04 23:27:38'),
(3,	'Rangga',	'ragga@gmail.com',	NULL,	NULL,	'',	'',	'',	NULL,	'',	'USER',	1,	'assets/user/YOqrCM0BFAsYHoddkwc2U7NOvmXlzUadxzDMrobu.jpg',	'2024-07-04 23:28:56',	'2024-07-04 23:28:56'),
(4,	'Ozy12',	'ozy12@gmail.com',	NULL,	NULL,	'$2y$12$mAahHF8bLtxVVwvVvOCGwustjVuE2QuR06/9q/GbTqGTdSbKTBM72',	'',	'',	NULL,	'',	'USER',	1,	'assets/user/2YfXpLqmAuffU9vhte60Qyx9Gluedxrhpf6bem3m.jpg',	'2024-07-05 00:40:24',	'2024-07-05 01:02:42'),
(5,	'musialaaa',	'musialaa@gmail.com',	NULL,	NULL,	'$2y$12$cPF2ryFfS/f6H5UM1dnPGuDYrJPgSOu3Yo.c96zzQm/d7J6U.0ryq',	NULL,	NULL,	NULL,	NULL,	'USER',	1,	'assets/user/moUmbnaLHsccsDSLY6a0TaGwxUqQDFyDLYsGmjtP.jpg',	'2024-07-05 01:51:21',	'2024-07-05 01:51:21'),
(9,	'Sopoaewes',	'sopoaewes@gmail.com',	NULL,	NULL,	'$2y$12$pi4Z0BxHiPodA8U60pxta.s9xLTdw3RygrMXP/E3JUAKtHrQaDbrK',	NULL,	NULL,	NULL,	NULL,	'DESIGNER',	1,	'assets/user/TtBypTWWQAtd4LobpPsrkzuC3h9cmhIpuTwXPd3q.jpg',	'2024-07-05 02:12:20',	'2024-07-05 02:12:20'),
(10,	'Ronaldoooo12',	'ronaldo@gmail.com121',	NULL,	NULL,	'$2y$12$5IC8CWSvHFsSx5GpeDaqSum/TdFiyy741ptd6VwVUawQoCG/pczTq',	NULL,	NULL,	NULL,	NULL,	'DESIGNER',	1,	'assets/user/XNNZiDgk2lL6tvzBacZavlIZ4nSc9oBWVpBMQAdL.jpg',	'2024-07-05 02:27:08',	'2024-07-05 02:57:22'),
(11,	'ariii',	'okoko@gmail.com',	NULL,	NULL,	'$2y$12$qmjfxHwzo0fnJYjrvbDeT.o4Q4R.RbaWrl0rXEIa5asfCw/5IjRz.',	NULL,	NULL,	NULL,	NULL,	'PROJECT_MANAGER',	1,	'assets/user/5UsFo0XCOJWS3cFaqZfPFs4tNKt4aY3dpVoirAK2.jpg',	'2024-07-07 21:32:16',	'2024-07-07 21:32:16'),
(13,	'SupriKikiw',	'Superkikiiw@gmail.com',	NULL,	87767896896,	'$2y$12$Bw.VZq6/ZnWHuCYNxyeKVObxZlq2gBab4bdu23hS1R44dwC/5F3Yq',	NULL,	NULL,	NULL,	NULL,	'DESIGNER',	1,	'assets/user/vBpWDkWtka6tlQ1MuodSOzMXzI3sWNHhXYUT3yqO.jpg',	'2024-07-11 21:28:39',	'2024-07-11 21:28:39'),
(16,	'Lukakuu',	'ojojojooj@gmail.com',	NULL,	90342034,	'$2y$12$CD4rMg4eG56JVCiC91Gd/uOMaPMHv6fhXF1gWF6JFgDmvx9I/1rLy',	NULL,	NULL,	NULL,	NULL,	'MARKETING',	1,	'assets/user/qwMHJMc1BLlAH7HGE5plhbdPlH8G2r9XFd8iJ4Dq.jpg',	'2024-07-11 23:26:59',	'2024-07-11 23:26:59'),
(17,	'pkpkpkp',	'klklkl@gmail.com',	NULL,	9089898,	'$2y$12$15LX2UVbm8V.f.YGQzln1uDFkw.BRc/CDNa298ywb8bCWQDjnDNGy',	NULL,	NULL,	NULL,	NULL,	'PROGRAMMER',	1,	'assets/user/wJommhENCudRP3f7A9NA7ThUO7QdZ6U3Cv8qs7Al.jpg',	'2024-07-11 23:34:16',	'2024-07-11 23:34:16');

-- 2024-07-23 03:48:45
