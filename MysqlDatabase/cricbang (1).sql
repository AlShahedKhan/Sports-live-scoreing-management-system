-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 07:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricbang`
--

-- --------------------------------------------------------

--
-- Table structure for table `curves`
--

CREATE TABLE `curves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `runs` int(11) NOT NULL,
  `overs` double NOT NULL,
  `wickets` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curves`
--

INSERT INTO `curves` (`id`, `match_id`, `team_id`, `player_id`, `runs`, `overs`, `wickets`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 1, 10, 1, 0, NULL, NULL),
(2, 14, 1, 1, 25, 2, 0, NULL, NULL),
(3, 14, 1, 1, 30, 3, 0, NULL, NULL),
(4, 14, 1, 1, 35, 4, 0, NULL, NULL),
(5, 14, 2, 2, 5, 1, 0, NULL, NULL),
(7, 14, 2, 2, 10, 2, 0, NULL, NULL),
(8, 14, 2, 2, 15, 3, 0, NULL, NULL),
(9, 14, 2, 2, 25, 4, 0, NULL, NULL),
(10, 14, 1, 1, 50, 5, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matchhs`
--

CREATE TABLE `matchhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_datetime` datetime DEFAULT NULL,
  `is_game_over` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matchhs`
--

INSERT INTO `matchhs` (`id`, `match_name`, `match_slug`, `match_datetime`, `is_game_over`, `created_at`, `updated_at`) VALUES
(7, 'bd vs indddddddd', 'bd-vs-indddddddd', '2022-06-10 22:02:00', 1, '2022-06-04 00:56:46', '2022-06-05 13:36:51'),
(8, 'bd vs paks', 'bd-vs-paks', '2022-06-10 13:10:00', 0, '2022-06-04 01:09:26', '2022-06-04 01:09:26'),
(9, 'bn vs n77', 'bn-vs-n77', '2022-06-01 13:17:00', 1, '2022-06-04 01:16:20', '2022-06-04 01:16:20'),
(10, 'bd vs pak5', 'bd-vs-pak5', '2022-06-03 01:16:00', 1, '2022-06-04 01:16:33', '2022-06-04 01:16:33'),
(11, 'bd vs indy', 'bd-vs-indy', '2022-06-18 01:16:00', 0, '2022-06-04 01:16:46', '2022-06-04 01:16:46'),
(12, 'bd vs india', 'bd-vs-india', '2022-06-04 21:18:00', 0, '2022-06-04 01:19:04', '2022-06-05 01:02:59'),
(13, 'bn vs as', 'bn-vs-as', '2022-06-04 22:13:00', 2, '2022-06-04 10:13:17', '2022-06-04 10:13:17'),
(14, 'bn vs afg', 'bn-vs-afg', '2022-06-04 22:30:00', 0, '2022-06-04 10:14:00', '2022-06-04 10:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_30_053938_create_teams_table', 1),
(6, '2022_03_30_054228_create_players_table', 1),
(7, '2022_03_31_030531_create_newss_table', 1),
(8, '2022_04_01_092941_create_matchhs_table', 1),
(9, '2022_04_19_050335_create_scoreupdates_table', 1),
(10, '2022_04_30_065756_create_updatebowlers_table', 1),
(11, '2022_05_11_090228_create_scores_table', 1),
(12, '2022_05_11_102507_create_scorebowlerfirsts_table', 1),
(13, '2022_05_16_081223_create_scorebatterseconds_table', 1),
(14, '2022_05_16_135906_create_scorebowlerseconds_table', 1),
(15, '2022_06_09_050155_create_curves_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newss`
--

CREATE TABLE `newss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_page` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `player_name`, `player_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'sakib', 'sakib', NULL, NULL),
(2, 1, 'rahim', 'rahim', NULL, NULL),
(3, 1, 'mostafiz', 'mostafiz', NULL, NULL),
(4, 2, 'pak 1', 'pak-1', NULL, NULL),
(5, 2, 'pak 2', 'pak-2', NULL, NULL),
(6, 2, 'pak 3', 'pak-3', NULL, NULL),
(7, 3, 'ind 1', 'ind-1', NULL, NULL),
(8, 3, 'ind', 'ind', NULL, NULL),
(9, 3, 'ind 3', 'ind-3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scorebatterseconds`
--

CREATE TABLE `scorebatterseconds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `scoreupdate_id` bigint(20) UNSIGNED NOT NULL,
  `outby_id` bigint(20) UNSIGNED NOT NULL,
  `one_id` bigint(20) UNSIGNED NOT NULL,
  `two_id` bigint(20) UNSIGNED NOT NULL,
  `three_id` bigint(20) UNSIGNED NOT NULL,
  `four_id` bigint(20) UNSIGNED NOT NULL,
  `six_id` bigint(20) UNSIGNED NOT NULL,
  `balls_played_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scorebatterseconds`
--

INSERT INTO `scorebatterseconds` (`id`, `match_id`, `team_id`, `player_id`, `scoreupdate_id`, `outby_id`, `one_id`, `two_id`, `three_id`, `four_id`, `six_id`, `balls_played_id`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 7, 2, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(2, 7, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(3, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scorebowlerfirsts`
--

CREATE TABLE `scorebowlerfirsts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `overs_id` bigint(20) UNSIGNED NOT NULL,
  `maidens_id` bigint(20) UNSIGNED NOT NULL,
  `runs_id` bigint(20) UNSIGNED NOT NULL,
  `wickets_id` bigint(20) UNSIGNED NOT NULL,
  `no_balls_id` bigint(20) UNSIGNED NOT NULL,
  `wides_id` bigint(20) UNSIGNED NOT NULL,
  `panalty_runs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scorebowlerfirsts`
--

INSERT INTO `scorebowlerfirsts` (`id`, `match_id`, `team_id`, `player_id`, `overs_id`, `maidens_id`, `runs_id`, `wickets_id`, `no_balls_id`, `wides_id`, `panalty_runs_id`, `created_at`, `updated_at`) VALUES
(3, 14, 1, 2, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(4, 14, 1, 3, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(5, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(6, 7, 1, 2, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(7, 7, 3, 7, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(8, 7, 1, 3, 2, 2, 3, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scorebowlerseconds`
--

CREATE TABLE `scorebowlerseconds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `overs_id` bigint(20) UNSIGNED NOT NULL,
  `maidens_id` bigint(20) UNSIGNED NOT NULL,
  `runs_id` bigint(20) UNSIGNED NOT NULL,
  `wickets_id` bigint(20) UNSIGNED NOT NULL,
  `no_balls_id` bigint(20) UNSIGNED NOT NULL,
  `wides_id` bigint(20) UNSIGNED NOT NULL,
  `panalty_runs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scorebowlerseconds`
--

INSERT INTO `scorebowlerseconds` (`id`, `match_id`, `team_id`, `player_id`, `overs_id`, `maidens_id`, `runs_id`, `wickets_id`, `no_balls_id`, `wides_id`, `panalty_runs_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `scoreupdate_id` bigint(20) UNSIGNED NOT NULL,
  `outby_id` bigint(20) UNSIGNED NOT NULL,
  `one_id` bigint(20) UNSIGNED NOT NULL,
  `two_id` bigint(20) UNSIGNED NOT NULL,
  `three_id` bigint(20) UNSIGNED NOT NULL,
  `four_id` bigint(20) UNSIGNED NOT NULL,
  `six_id` bigint(20) UNSIGNED NOT NULL,
  `balls_played_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `match_id`, `team_id`, `player_id`, `scoreupdate_id`, `outby_id`, `one_id`, `two_id`, `three_id`, `four_id`, `six_id`, `balls_played_id`, `created_at`, `updated_at`) VALUES
(3, 7, 1, 1, 2, 2, 2, 1, 1, 1, 1, 1, NULL, NULL),
(5, 7, 1, 3, 1, 2, 1, 1, 1, 2, 2, 1, NULL, NULL),
(6, 14, 1, 1, 1, 1, 2, 2, 2, 1, 1, 1, NULL, NULL),
(7, 14, 1, 2, 1, 1, 1, 1, 1, 1, 2, 2, NULL, NULL),
(8, 7, 3, 7, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scoreupdates`
--

CREATE TABLE `scoreupdates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `out_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_by_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one` int(11) DEFAULT NULL,
  `two` int(11) DEFAULT NULL,
  `three` int(11) DEFAULT NULL,
  `four` int(11) DEFAULT NULL,
  `six` int(11) DEFAULT NULL,
  `balls_played` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scoreupdates`
--

INSERT INTO `scoreupdates` (`id`, `out_type`, `out_by_type`, `one`, `two`, `three`, `four`, `six`, `balls_played`, `created_at`, `updated_at`) VALUES
(1, 'bold', 'mushfic', 1, 2, 3, 5, 2, 55, NULL, NULL),
(2, 'catch', 'not out', 3, 2, 3, 0, 0, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `team_slug`, `created_at`, `updated_at`) VALUES
(1, 'bangladesh', 'bangladesh', NULL, NULL),
(2, 'pakistan', 'pakistan', NULL, NULL),
(3, 'india', 'india', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `updatebowlers`
--

CREATE TABLE `updatebowlers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `overs` double NOT NULL,
  `maidens` int(11) NOT NULL,
  `runs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `no_balls` int(11) NOT NULL,
  `wides` int(11) NOT NULL,
  `panalty_runs` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `updatebowlers`
--

INSERT INTO `updatebowlers` (`id`, `overs`, `maidens`, `runs`, `wickets`, `no_balls`, `wides`, `panalty_runs`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 55, 2, 1, 2, 5, NULL, NULL),
(2, 2, 3, 55, 2, 1, 3, 3, NULL, NULL),
(3, 3, 2, 5, 1, 3, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'admin@gmail.com', NULL, '$2a$12$E3A5DI4uwVNohFL8C26jjORGMowxorB..nQoY/7f3U.NaLUP7mUeG', NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curves`
--
ALTER TABLE `curves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curves_match_id_foreign` (`match_id`),
  ADD KEY `curves_team_id_foreign` (`team_id`),
  ADD KEY `curves_player_id_foreign` (`player_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `matchhs`
--
ALTER TABLE `matchhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newss`
--
ALTER TABLE `newss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_team_id_foreign` (`team_id`);

--
-- Indexes for table `scorebatterseconds`
--
ALTER TABLE `scorebatterseconds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scorebatterseconds_match_id_foreign` (`match_id`),
  ADD KEY `scorebatterseconds_team_id_foreign` (`team_id`),
  ADD KEY `scorebatterseconds_player_id_foreign` (`player_id`),
  ADD KEY `scorebatterseconds_scoreupdate_id_foreign` (`scoreupdate_id`),
  ADD KEY `scorebatterseconds_outby_id_foreign` (`outby_id`),
  ADD KEY `scorebatterseconds_one_id_foreign` (`one_id`),
  ADD KEY `scorebatterseconds_two_id_foreign` (`two_id`),
  ADD KEY `scorebatterseconds_three_id_foreign` (`three_id`),
  ADD KEY `scorebatterseconds_four_id_foreign` (`four_id`),
  ADD KEY `scorebatterseconds_six_id_foreign` (`six_id`),
  ADD KEY `scorebatterseconds_balls_played_id_foreign` (`balls_played_id`);

--
-- Indexes for table `scorebowlerfirsts`
--
ALTER TABLE `scorebowlerfirsts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scorebowlerfirsts_match_id_foreign` (`match_id`),
  ADD KEY `scorebowlerfirsts_team_id_foreign` (`team_id`),
  ADD KEY `scorebowlerfirsts_player_id_foreign` (`player_id`),
  ADD KEY `scorebowlerfirsts_overs_id_foreign` (`overs_id`),
  ADD KEY `scorebowlerfirsts_maidens_id_foreign` (`maidens_id`),
  ADD KEY `scorebowlerfirsts_runs_id_foreign` (`runs_id`),
  ADD KEY `scorebowlerfirsts_wickets_id_foreign` (`wickets_id`),
  ADD KEY `scorebowlerfirsts_no_balls_id_foreign` (`no_balls_id`),
  ADD KEY `scorebowlerfirsts_wides_id_foreign` (`wides_id`),
  ADD KEY `scorebowlerfirsts_panalty_runs_id_foreign` (`panalty_runs_id`);

--
-- Indexes for table `scorebowlerseconds`
--
ALTER TABLE `scorebowlerseconds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scorebowlerseconds_match_id_foreign` (`match_id`),
  ADD KEY `scorebowlerseconds_team_id_foreign` (`team_id`),
  ADD KEY `scorebowlerseconds_player_id_foreign` (`player_id`),
  ADD KEY `scorebowlerseconds_overs_id_foreign` (`overs_id`),
  ADD KEY `scorebowlerseconds_maidens_id_foreign` (`maidens_id`),
  ADD KEY `scorebowlerseconds_runs_id_foreign` (`runs_id`),
  ADD KEY `scorebowlerseconds_wickets_id_foreign` (`wickets_id`),
  ADD KEY `scorebowlerseconds_no_balls_id_foreign` (`no_balls_id`),
  ADD KEY `scorebowlerseconds_wides_id_foreign` (`wides_id`),
  ADD KEY `scorebowlerseconds_panalty_runs_id_foreign` (`panalty_runs_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_match_id_foreign` (`match_id`),
  ADD KEY `scores_team_id_foreign` (`team_id`),
  ADD KEY `scores_player_id_foreign` (`player_id`),
  ADD KEY `scores_scoreupdate_id_foreign` (`scoreupdate_id`),
  ADD KEY `scores_outby_id_foreign` (`outby_id`),
  ADD KEY `scores_one_id_foreign` (`one_id`),
  ADD KEY `scores_two_id_foreign` (`two_id`),
  ADD KEY `scores_three_id_foreign` (`three_id`),
  ADD KEY `scores_four_id_foreign` (`four_id`),
  ADD KEY `scores_six_id_foreign` (`six_id`),
  ADD KEY `scores_balls_played_id_foreign` (`balls_played_id`);

--
-- Indexes for table `scoreupdates`
--
ALTER TABLE `scoreupdates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updatebowlers`
--
ALTER TABLE `updatebowlers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curves`
--
ALTER TABLE `curves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matchhs`
--
ALTER TABLE `matchhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `newss`
--
ALTER TABLE `newss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scorebatterseconds`
--
ALTER TABLE `scorebatterseconds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scorebowlerfirsts`
--
ALTER TABLE `scorebowlerfirsts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scorebowlerseconds`
--
ALTER TABLE `scorebowlerseconds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scoreupdates`
--
ALTER TABLE `scoreupdates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `updatebowlers`
--
ALTER TABLE `updatebowlers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `curves`
--
ALTER TABLE `curves`
  ADD CONSTRAINT `curves_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matchhs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `curves_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `curves_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scorebatterseconds`
--
ALTER TABLE `scorebatterseconds`
  ADD CONSTRAINT `scorebatterseconds_balls_played_id_foreign` FOREIGN KEY (`balls_played_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_four_id_foreign` FOREIGN KEY (`four_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matchhs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_one_id_foreign` FOREIGN KEY (`one_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_outby_id_foreign` FOREIGN KEY (`outby_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_scoreupdate_id_foreign` FOREIGN KEY (`scoreupdate_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_six_id_foreign` FOREIGN KEY (`six_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_three_id_foreign` FOREIGN KEY (`three_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebatterseconds_two_id_foreign` FOREIGN KEY (`two_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scorebowlerfirsts`
--
ALTER TABLE `scorebowlerfirsts`
  ADD CONSTRAINT `scorebowlerfirsts_maidens_id_foreign` FOREIGN KEY (`maidens_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matchhs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_no_balls_id_foreign` FOREIGN KEY (`no_balls_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_overs_id_foreign` FOREIGN KEY (`overs_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_panalty_runs_id_foreign` FOREIGN KEY (`panalty_runs_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_runs_id_foreign` FOREIGN KEY (`runs_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_wickets_id_foreign` FOREIGN KEY (`wickets_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerfirsts_wides_id_foreign` FOREIGN KEY (`wides_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scorebowlerseconds`
--
ALTER TABLE `scorebowlerseconds`
  ADD CONSTRAINT `scorebowlerseconds_maidens_id_foreign` FOREIGN KEY (`maidens_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matchhs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_no_balls_id_foreign` FOREIGN KEY (`no_balls_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_overs_id_foreign` FOREIGN KEY (`overs_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_panalty_runs_id_foreign` FOREIGN KEY (`panalty_runs_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_runs_id_foreign` FOREIGN KEY (`runs_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_wickets_id_foreign` FOREIGN KEY (`wickets_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scorebowlerseconds_wides_id_foreign` FOREIGN KEY (`wides_id`) REFERENCES `updatebowlers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_balls_played_id_foreign` FOREIGN KEY (`balls_played_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_four_id_foreign` FOREIGN KEY (`four_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matchhs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_one_id_foreign` FOREIGN KEY (`one_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_outby_id_foreign` FOREIGN KEY (`outby_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_scoreupdate_id_foreign` FOREIGN KEY (`scoreupdate_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_six_id_foreign` FOREIGN KEY (`six_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_three_id_foreign` FOREIGN KEY (`three_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_two_id_foreign` FOREIGN KEY (`two_id`) REFERENCES `scoreupdates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
