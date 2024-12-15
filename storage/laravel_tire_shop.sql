-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 nov. 2020 à 13:54
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel_tire_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `addresse_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `addresses`
--

INSERT INTO `addresses` (`id`, `addresse_name`, `area_id`, `street`, `block`, `building`, `extra_info`, `user_id`, `is_default`, `created_at`, `updated_at`, `deleted_at`, `lat`, `lng`) VALUES
(1, 'addresse 1', 2, '106', '1', '4', '20205485', 1, 1, '2020-10-25 09:14:34', '2020-10-25 09:14:34', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'fa-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, NULL),
(8, 0, 8, 'Areas', 'fa-map-marker', 'areas', NULL, '2020-10-25 02:37:01', '2020-10-25 02:37:12'),
(9, 0, 9, 'Cars', 'fa-automobile', 'car-makes', NULL, '2020-10-25 02:37:50', '2020-10-25 02:37:55'),
(10, 0, 15, 'Users', 'fa-users', 'users', NULL, '2020-10-25 02:38:56', '2020-11-02 04:03:16'),
(11, 0, 16, 'Contacts', 'fa-wpforms', 'contacts', NULL, '2020-10-25 02:44:10', '2020-11-02 04:03:16'),
(12, 0, 17, 'FAQ', 'fa-list-alt', 'faqs', NULL, '2020-10-25 02:45:12', '2020-11-02 04:03:16'),
(13, 0, 18, 'Pages', 'fa-files-o', 'pages', NULL, '2020-10-25 02:46:02', '2020-11-02 04:03:16'),
(14, 0, 19, 'Settings', 'fa-cogs', 'settings/1/edit', NULL, '2020-10-25 02:46:36', '2020-11-02 04:03:16'),
(15, 0, 11, 'Srvices', 'fa-wrench', 'services', NULL, '2020-10-27 08:56:43', '2020-11-02 04:03:16'),
(16, 0, 14, 'Categories', 'fa-bars', 'categories', NULL, '2020-10-27 10:13:42', '2020-11-02 04:03:16'),
(17, 0, 12, 'Payments', 'fa-credit-card', 'payments', NULL, '2020-10-28 02:55:55', '2020-11-02 04:03:16'),
(18, 0, 13, 'Requests', 'fa-registered', 'requests', NULL, '2020-10-28 03:30:21', '2020-11-02 04:03:16'),
(19, 0, 10, 'Days', 'fa-calendar', 'days', NULL, '2020-11-02 04:03:03', '2020-11-02 04:03:16');

-- --------------------------------------------------------

--
-- Structure de la table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin/auth/users/1/edit', 'GET', '127.0.0.1', '[]', '2020-10-25 02:31:12', '2020-10-25 02:31:12'),
(2, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:32:23', '2020-10-25 02:32:23'),
(3, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:34:55', '2020-10-25 02:34:55'),
(4, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Areas\",\"icon\":\"fa-map-marker\",\"uri\":\"areas\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:37:00', '2020-10-25 02:37:00'),
(5, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:37:01', '2020-10-25 02:37:01'),
(6, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8}]\"}', '2020-10-25 02:37:12', '2020-10-25 02:37:12'),
(7, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:37:12', '2020-10-25 02:37:12'),
(8, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Cars\",\"icon\":\"fa-automobile\",\"uri\":\"car-makes\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:37:50', '2020-10-25 02:37:50'),
(9, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:37:50', '2020-10-25 02:37:50'),
(10, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9}]\"}', '2020-10-25 02:37:55', '2020-10-25 02:37:55'),
(11, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:37:55', '2020-10-25 02:37:55'),
(12, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Users\",\"icon\":\"fa-users\",\"uri\":\"users\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:38:56', '2020-10-25 02:38:56'),
(13, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:38:56', '2020-10-25 02:38:56'),
(14, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":10}]\"}', '2020-10-25 02:39:00', '2020-10-25 02:39:00'),
(15, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:39:01', '2020-10-25 02:39:01'),
(16, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Contacts\",\"icon\":\"fa-wpforms\",\"uri\":\"contacts\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:44:10', '2020-10-25 02:44:10'),
(17, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:44:10', '2020-10-25 02:44:10'),
(18, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":10},{\\\"id\\\":11}]\"}', '2020-10-25 02:44:19', '2020-10-25 02:44:19'),
(19, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:44:19', '2020-10-25 02:44:19'),
(20, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"FAQ\",\"icon\":\"fa-list-alt\",\"uri\":\"faqs\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:45:12', '2020-10-25 02:45:12'),
(21, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:45:13', '2020-10-25 02:45:13'),
(22, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12}]\"}', '2020-10-25 02:45:28', '2020-10-25 02:45:28'),
(23, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:45:28', '2020-10-25 02:45:28'),
(24, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Pages\",\"icon\":\"fa-files-o\",\"uri\":\"pages\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:46:01', '2020-10-25 02:46:01'),
(25, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:46:02', '2020-10-25 02:46:02'),
(26, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13}]\"}', '2020-10-25 02:46:08', '2020-10-25 02:46:08'),
(27, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:46:08', '2020-10-25 02:46:08'),
(28, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Settings\",\"icon\":\"fa-cogs\",\"uri\":\"settings\\/1\\/edit\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:46:36', '2020-10-25 02:46:36'),
(29, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:46:37', '2020-10-25 02:46:37'),
(30, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14}]\"}', '2020-10-25 02:46:44', '2020-10-25 02:46:44'),
(31, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:46:45', '2020-10-25 02:46:45'),
(32, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-25 02:47:05', '2020-10-25 02:47:05'),
(33, 1, 'admin/settings/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:47:09', '2020-10-25 02:47:09'),
(34, 1, 'admin/settings/1', 'PUT', '127.0.0.1', '{\"facebook\":null,\"instagram\":null,\"twitter\":null,\"email_req_submission\":null,\"email_req_rescheduling\":null,\"email_contact_us\":null,\"system_email\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_method\":\"PUT\"}', '2020-10-25 02:47:12', '2020-10-25 02:47:12'),
(35, 1, 'admin/settings/1/edit', 'GET', '127.0.0.1', '[]', '2020-10-25 02:47:12', '2020-10-25 02:47:12'),
(36, 1, 'admin/areas', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:47:18', '2020-10-25 02:47:18'),
(37, 1, 'admin/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:50:44', '2020-10-25 02:50:44'),
(38, 1, 'admin/users/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:50:47', '2020-10-25 02:50:47'),
(39, 1, 'admin/areas', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:51:24', '2020-10-25 02:51:24'),
(40, 1, 'admin/areas/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:51:30', '2020-10-25 02:51:30'),
(41, 1, 'admin/areas', 'POST', '127.0.0.1', '{\"name_en\":\"Sharq\",\"name_ar\":\"Sharq\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/areas\"}', '2020-10-25 02:53:25', '2020-10-25 02:53:25'),
(42, 1, 'admin/areas/create', 'GET', '127.0.0.1', '[]', '2020-10-25 02:53:25', '2020-10-25 02:53:25'),
(43, 1, 'admin/areas', 'POST', '127.0.0.1', '{\"name_en\":\"Adiliya\",\"name_ar\":\"Adiliya\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\"}', '2020-10-25 02:53:36', '2020-10-25 02:53:36'),
(44, 1, 'admin/areas/create', 'GET', '127.0.0.1', '[]', '2020-10-25 02:53:36', '2020-10-25 02:53:36'),
(45, 1, 'admin/areas', 'POST', '127.0.0.1', '{\"name_en\":\"Salwa\",\"name_ar\":\"Salwa\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\"}', '2020-10-25 02:53:49', '2020-10-25 02:53:49'),
(46, 1, 'admin/areas/create', 'GET', '127.0.0.1', '[]', '2020-10-25 02:53:49', '2020-10-25 02:53:49'),
(47, 1, 'admin/areas', 'POST', '127.0.0.1', '{\"name_en\":\"Ardhiya\",\"name_ar\":\"Ardhiya\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-25 02:54:01', '2020-10-25 02:54:01'),
(48, 1, 'admin/areas', 'GET', '127.0.0.1', '[]', '2020-10-25 02:54:02', '2020-10-25 02:54:02'),
(49, 1, 'admin/car-makes', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:54:05', '2020-10-25 02:54:05'),
(50, 1, 'admin/car-makes/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:54:07', '2020-10-25 02:54:07'),
(51, 1, 'admin/car-makes', 'POST', '127.0.0.1', '{\"name_en\":\"make1 en\",\"name_ar\":\"make1 ar\",\"models\":{\"new_1\":{\"name_en\":\"make 1 model 1 en\",\"name_ar\":\"make 1 model 1 ar\",\"id\":null,\"_remove_\":\"0\"},\"new_2\":{\"name_en\":\"make 1 model 2 en\",\"name_ar\":\"make 1 model 2 ar\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/car-makes\"}', '2020-10-25 02:55:07', '2020-10-25 02:55:07'),
(52, 1, 'admin/car-makes', 'GET', '127.0.0.1', '[]', '2020-10-25 02:55:08', '2020-10-25 02:55:08'),
(53, 1, 'admin/car-makes/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:55:14', '2020-10-25 02:55:14'),
(54, 1, 'admin/car-makes', 'POST', '127.0.0.1', '{\"name_en\":\"make2 en\",\"name_ar\":\"make2 ar\",\"models\":{\"new_1\":{\"name_en\":\"make 2 model 1 en\",\"name_ar\":\"make 2 model 1 ar\",\"id\":null,\"_remove_\":\"0\"},\"new_2\":{\"name_en\":\"make 2 model 2 en\",\"name_ar\":\"make 2 model 2 ar\",\"id\":null,\"_remove_\":\"0\"},\"new_3\":{\"name_en\":\"make 2 model 3 en\",\"name_ar\":\"make 2 model 3 ar\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/car-makes\"}', '2020-10-25 02:56:18', '2020-10-25 02:56:18'),
(55, 1, 'admin/car-makes', 'GET', '127.0.0.1', '[]', '2020-10-25 02:56:19', '2020-10-25 02:56:19'),
(56, 1, 'admin/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:56:24', '2020-10-25 02:56:24'),
(57, 1, 'admin/users/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 02:56:26', '2020-10-25 02:56:26'),
(58, 1, 'admin/settings/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-25 09:55:36', '2020-10-25 09:55:36'),
(59, 1, 'admin/settings/1/edit', 'GET', '127.0.0.1', '[]', '2020-10-26 05:03:40', '2020-10-26 05:03:40'),
(60, 1, 'admin/pages', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-26 05:03:45', '2020-10-26 05:03:45'),
(61, 1, 'admin/pages/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-26 05:03:58', '2020-10-26 05:03:58'),
(62, 1, 'admin/pages', 'POST', '127.0.0.1', '{\"slug\":\"privacy\",\"title_en\":\"Privacy Policy\",\"title_ar\":\"Privacy Policy ar\",\"body_en\":\"body of privacy policy en\",\"body_ar\":\"body of privacy policy ar\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pages\"}', '2020-10-26 05:04:36', '2020-10-26 05:04:36'),
(63, 1, 'admin/pages', 'GET', '127.0.0.1', '[]', '2020-10-26 05:04:36', '2020-10-26 05:04:36'),
(64, 1, 'admin/contacts', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-26 05:11:44', '2020-10-26 05:11:44'),
(65, 1, 'admin/contacts', 'GET', '127.0.0.1', '[]', '2020-10-27 03:39:21', '2020-10-27 03:39:21'),
(66, 1, 'admin/settings/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 08:41:40', '2020-10-27 08:41:40'),
(67, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 08:52:57', '2020-10-27 08:52:57'),
(68, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Srvices\",\"icon\":\"fa-wrench\",\"uri\":\"services\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-27 08:56:43', '2020-10-27 08:56:43'),
(69, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-27 08:56:44', '2020-10-27 08:56:44'),
(70, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":15},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14}]\"}', '2020-10-27 08:56:52', '2020-10-27 08:56:52'),
(71, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 08:56:52', '2020-10-27 08:56:52'),
(72, 1, 'admin/services', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 08:56:57', '2020-10-27 08:56:57'),
(73, 1, 'admin/services', 'GET', '127.0.0.1', '[]', '2020-10-27 09:36:59', '2020-10-27 09:36:59'),
(74, 1, 'admin/services/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 09:37:10', '2020-10-27 09:37:10'),
(75, 1, 'admin/services', 'POST', '127.0.0.1', '{\"name_en\":\"service 1 en\",\"name_ar\":\"service 1 ar\",\"price\":\"15\",\"discount\":\"off\",\"discount_from\":null,\"discount_to\":null,\"number_request\":\"9\",\"show_service_type\":\"on\",\"service_type\":{\"new_2\":{\"name_en\":\"service type 1 en\",\"name_ar\":\"service type 1 ar\",\"_remove_\":\"0\"},\"new_3\":{\"name_en\":\"service type 2 en\",\"name_ar\":\"service type 2 ar\",\"_remove_\":\"0\"}},\"show_tire_size\":\"on\",\"show_tire_type\":\"on\",\"tire_type\":{\"new_4\":{\"name_en\":\"tire type 1 en\",\"name_ar\":\"tire type 1 ar\",\"_remove_\":\"0\"},\"new_5\":{\"name_en\":\"tire type 2 en\",\"name_ar\":\"tire type 2 ar\",\"_remove_\":\"0\"},\"new_6\":{\"name_en\":\"tire type 3 en\",\"name_ar\":\"tire type 3 ar\",\"_remove_\":\"0\"}},\"show_chassis_numb\":\"off\",\"show_numb_cylind\":\"off\",\"show_rim_size\":\"off\",\"show_numb_tire\":\"on\",\"show_request_details\":\"on\",\"show_upload_photo\":\"off\",\"is_active\":\"on\",\"order\":\"1\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/services\"}', '2020-10-27 09:41:32', '2020-10-27 09:41:32'),
(76, 1, 'admin/services', 'GET', '127.0.0.1', '[]', '2020-10-27 09:41:33', '2020-10-27 09:41:33'),
(77, 1, 'admin/services/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 09:41:38', '2020-10-27 09:41:38'),
(78, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:13:09', '2020-10-27 10:13:09'),
(79, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Categories\",\"icon\":\"fa-bars\",\"uri\":\"categories\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-27 10:13:42', '2020-10-27 10:13:42'),
(80, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-27 10:13:42', '2020-10-27 10:13:42'),
(81, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":15},{\\\"id\\\":16},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14}]\"}', '2020-10-27 10:13:50', '2020-10-27 10:13:50'),
(82, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:13:51', '2020-10-27 10:13:51'),
(83, 1, 'admin/categories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:13:56', '2020-10-27 10:13:56'),
(84, 1, 'admin/categories', 'GET', '127.0.0.1', '[]', '2020-10-27 10:18:24', '2020-10-27 10:18:24'),
(85, 1, 'admin/categories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:18:26', '2020-10-27 10:18:26'),
(86, 1, 'admin/categories', 'POST', '127.0.0.1', '{\"name\":\"cat1\",\"users\":[\"1\",null],\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/categories\"}', '2020-10-27 10:18:33', '2020-10-27 10:18:33'),
(87, 1, 'admin/categories/create', 'GET', '127.0.0.1', '[]', '2020-10-27 10:18:33', '2020-10-27 10:18:33'),
(88, 1, 'admin/categories/create', 'GET', '127.0.0.1', '[]', '2020-10-27 10:18:56', '2020-10-27 10:18:56'),
(89, 1, 'admin/categories', 'POST', '127.0.0.1', '{\"name\":\"cat1\",\"users\":[\"1\",null],\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-27 10:19:04', '2020-10-27 10:19:04'),
(90, 1, 'admin/categories/create', 'GET', '127.0.0.1', '[]', '2020-10-27 10:19:05', '2020-10-27 10:19:05'),
(91, 1, 'admin/categories/create', 'GET', '127.0.0.1', '[]', '2020-10-27 10:28:02', '2020-10-27 10:28:02'),
(92, 1, 'admin/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:28:05', '2020-10-27 10:28:05'),
(93, 1, 'admin/users/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:28:09', '2020-10-27 10:28:09'),
(94, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2020-10-27 10:28:10', '2020-10-27 10:28:10'),
(95, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2020-10-27 10:28:40', '2020-10-27 10:28:40'),
(96, 1, 'admin/users/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:28:44', '2020-10-27 10:28:44'),
(97, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2020-10-27 10:28:44', '2020-10-27 10:28:44'),
(98, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2020-10-27 10:29:25', '2020-10-27 10:29:25'),
(99, 1, 'admin/users/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-27 10:29:29', '2020-10-27 10:29:29'),
(100, 1, 'admin/users/1/edit', 'GET', '127.0.0.1', '[]', '2020-10-28 02:22:03', '2020-10-28 02:22:03'),
(101, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 02:48:23', '2020-10-28 02:48:23'),
(102, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Payments\",\"icon\":\"fa-credit-card\",\"uri\":\"payments\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-28 02:55:55', '2020-10-28 02:55:55'),
(103, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-28 02:55:56', '2020-10-28 02:55:56'),
(104, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":15},{\\\"id\\\":17},{\\\"id\\\":16},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14}]\"}', '2020-10-28 02:56:18', '2020-10-28 02:56:18'),
(105, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 02:56:18', '2020-10-28 02:56:18'),
(106, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-28 02:58:04', '2020-10-28 02:58:04'),
(107, 1, 'admin/payments', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 02:58:08', '2020-10-28 02:58:08'),
(108, 1, 'admin/payments', 'GET', '127.0.0.1', '[]', '2020-10-28 03:02:42', '2020-10-28 03:02:42'),
(109, 1, 'admin/payments/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 03:02:47', '2020-10-28 03:02:47'),
(110, 1, 'admin/payments', 'POST', '127.0.0.1', '{\"name_en\":\"Cash\",\"name_ar\":\"\\u0646\\u0642\\u062f\\u064a\",\"is_active\":\"on\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/payments\"}', '2020-10-28 03:03:17', '2020-10-28 03:03:17'),
(111, 1, 'admin/payments', 'GET', '127.0.0.1', '[]', '2020-10-28 03:03:18', '2020-10-28 03:03:18'),
(112, 1, 'admin/payments/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 03:08:26', '2020-10-28 03:08:26'),
(113, 1, 'admin/payments', 'POST', '127.0.0.1', '{\"name_en\":\"Knet\",\"name_ar\":\"\\u0643\\u0646\\u062a\",\"is_active\":\"on\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/payments\"}', '2020-10-28 03:08:48', '2020-10-28 03:08:48'),
(114, 1, 'admin/payments', 'GET', '127.0.0.1', '[]', '2020-10-28 03:08:48', '2020-10-28 03:08:48'),
(115, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 03:25:59', '2020-10-28 03:25:59'),
(116, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Requests\",\"icon\":\"fa-registered\",\"uri\":\"requests\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-10-28 03:30:21', '2020-10-28 03:30:21'),
(117, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-28 03:30:21', '2020-10-28 03:30:21'),
(118, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":15},{\\\"id\\\":17},{\\\"id\\\":18},{\\\"id\\\":16},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14}]\"}', '2020-10-28 03:30:34', '2020-10-28 03:30:34'),
(119, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 03:30:35', '2020-10-28 03:30:35'),
(120, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-10-28 04:08:55', '2020-10-28 04:08:55'),
(121, 1, 'admin/requests', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 04:08:58', '2020-10-28 04:08:58'),
(122, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-10-28 04:12:48', '2020-10-28 04:12:48'),
(123, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-10-28 04:13:46', '2020-10-28 04:13:46'),
(124, 1, 'admin/requests', 'GET', '127.0.0.1', '{\"status_id\":null,\"payment_id\":null,\"req_date\":{\"start\":\"2020-10-20 12:00:00\",\"end\":\"2020-10-28 10:00:00\"},\"_pjax\":\"#pjax-container\"}', '2020-10-28 04:14:31', '2020-10-28 04:14:31'),
(125, 1, 'admin/requests', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 04:14:37', '2020-10-28 04:14:37'),
(126, 1, 'admin/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 04:17:05', '2020-10-28 04:17:05'),
(127, 1, 'admin/requests', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 04:43:46', '2020-10-28 04:43:46'),
(128, 1, 'admin/requests/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 04:43:52', '2020-10-28 04:43:52'),
(129, 1, 'admin/requests', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-10-28 04:44:00', '2020-10-28 04:44:00'),
(130, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-10-28 05:50:12', '2020-10-28 05:50:12'),
(131, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-10-28 08:15:34', '2020-10-28 08:15:34'),
(132, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-10-28 08:34:18', '2020-10-28 08:34:18'),
(133, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-11-01 04:24:07', '2020-11-01 04:24:07'),
(134, 1, 'admin/services', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-01 09:40:16', '2020-11-01 09:40:16'),
(135, 1, 'admin/services', 'GET', '127.0.0.1', '[]', '2020-11-01 09:40:28', '2020-11-01 09:40:28'),
(136, 1, 'admin/services', 'GET', '127.0.0.1', '[]', '2020-11-02 02:25:52', '2020-11-02 02:25:52'),
(137, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:02:29', '2020-11-02 04:02:29'),
(138, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Days\",\"icon\":\"fa-calendar\",\"uri\":\"days\",\"roles\":[null],\"permission\":null,\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-11-02 04:03:02', '2020-11-02 04:03:02'),
(139, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-11-02 04:03:03', '2020-11-02 04:03:03'),
(140, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":19},{\\\"id\\\":15},{\\\"id\\\":17},{\\\"id\\\":18},{\\\"id\\\":16},{\\\"id\\\":10},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14}]\"}', '2020-11-02 04:03:16', '2020-11-02 04:03:16'),
(141, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:03:19', '2020-11-02 04:03:19'),
(142, 1, 'admin/days', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:03:23', '2020-11-02 04:03:23'),
(143, 1, 'admin/days/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:03:28', '2020-11-02 04:03:28'),
(144, 1, 'admin/days', 'POST', '127.0.0.1', '{\"name\":\"Sunday\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/days\"}', '2020-11-02 04:04:46', '2020-11-02 04:04:46'),
(145, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 04:04:46', '2020-11-02 04:04:46'),
(146, 1, 'admin/days/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:05:06', '2020-11-02 04:05:06'),
(147, 1, 'admin/days', 'POST', '127.0.0.1', '{\"name\":\"Monday\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/days\"}', '2020-11-02 04:05:11', '2020-11-02 04:05:11'),
(148, 1, 'admin/days/create', 'GET', '127.0.0.1', '[]', '2020-11-02 04:05:12', '2020-11-02 04:05:12'),
(149, 1, 'admin/days', 'POST', '127.0.0.1', '{\"name\":\"Tuesday\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\"}', '2020-11-02 04:05:27', '2020-11-02 04:05:27'),
(150, 1, 'admin/days/create', 'GET', '127.0.0.1', '[]', '2020-11-02 04:05:28', '2020-11-02 04:05:28'),
(151, 1, 'admin/days', 'POST', '127.0.0.1', '{\"name\":\"Wednesday\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\"}', '2020-11-02 04:05:50', '2020-11-02 04:05:50'),
(152, 1, 'admin/days/create', 'GET', '127.0.0.1', '[]', '2020-11-02 04:05:50', '2020-11-02 04:05:50'),
(153, 1, 'admin/days', 'POST', '127.0.0.1', '{\"name\":\"Thursday\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\"}', '2020-11-02 04:06:07', '2020-11-02 04:06:07'),
(154, 1, 'admin/days/create', 'GET', '127.0.0.1', '[]', '2020-11-02 04:06:08', '2020-11-02 04:06:08'),
(155, 1, 'admin/days', 'POST', '127.0.0.1', '{\"name\":\"Friday\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"after-save\":\"2\"}', '2020-11-02 04:06:27', '2020-11-02 04:06:27'),
(156, 1, 'admin/days/create', 'GET', '127.0.0.1', '[]', '2020-11-02 04:06:27', '2020-11-02 04:06:27'),
(157, 1, 'admin/days', 'POST', '127.0.0.1', '{\"name\":\"Saturday\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\"}', '2020-11-02 04:06:41', '2020-11-02 04:06:41'),
(158, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 04:06:41', '2020-11-02 04:06:41'),
(159, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 04:10:39', '2020-11-02 04:10:39'),
(160, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 04:11:01', '2020-11-02 04:11:01'),
(161, 1, 'admin/days/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:11:09', '2020-11-02 04:11:09'),
(162, 1, 'admin/days/1/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 04:16:41', '2020-11-02 04:16:41'),
(163, 1, 'admin/days/1/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 04:19:35', '2020-11-02 04:19:35'),
(164, 1, 'admin/days/1/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 04:20:13', '2020-11-02 04:20:13'),
(165, 1, 'admin/days', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:21:47', '2020-11-02 04:21:47'),
(166, 1, 'admin/days/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:21:51', '2020-11-02 04:21:51'),
(167, 1, 'admin/days/1', 'PUT', '127.0.0.1', '{\"name\":\"Sunday\",\"time_slots\":{\"new_1\":{\"time\":\"00:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_2\":{\"time\":\"01:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_3\":{\"time\":\"02:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_4\":{\"time\":\"03:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_5\":{\"time\":\"04:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_6\":{\"time\":\"05:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_7\":{\"time\":\"06:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_8\":{\"time\":\"07:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_9\":{\"time\":\"08:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_10\":{\"time\":\"09:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_11\":{\"time\":\"10:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_12\":{\"time\":\"11:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_13\":{\"time\":\"12:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_14\":{\"time\":\"13:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_15\":{\"time\":\"14:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_16\":{\"time\":\"15:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_17\":{\"time\":\"16:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_18\":{\"time\":\"17:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_19\":{\"time\":\"18:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_20\":{\"time\":\"19:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_21\":{\"time\":\"20:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_22\":{\"time\":\"21:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_23\":{\"time\":\"22:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"},\"new_24\":{\"time\":\"23:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":null,\"_remove_\":\"0\"}},\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/days\"}', '2020-11-02 04:34:36', '2020-11-02 04:34:36'),
(168, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 04:34:36', '2020-11-02 04:34:36'),
(169, 1, 'admin/days/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 04:34:42', '2020-11-02 04:34:42'),
(170, 1, 'admin/days/1', 'PUT', '127.0.0.1', '{\"name\":\"Sunday\",\"time_slots\":{\"1\":{\"time\":\"00:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"1\",\"_remove_\":\"0\"},\"2\":{\"time\":\"01:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"2\",\"_remove_\":\"0\"},\"3\":{\"time\":\"02:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"3\",\"_remove_\":\"0\"},\"4\":{\"time\":\"03:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"4\",\"_remove_\":\"0\"},\"5\":{\"time\":\"04:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"5\",\"_remove_\":\"0\"},\"6\":{\"time\":\"05:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"6\",\"_remove_\":\"0\"},\"7\":{\"time\":\"06:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"7\",\"_remove_\":\"0\"},\"8\":{\"time\":\"07:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"8\",\"_remove_\":\"0\"},\"9\":{\"time\":\"08:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"9\",\"_remove_\":\"0\"},\"10\":{\"time\":\"09:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"10\",\"_remove_\":\"0\"},\"11\":{\"time\":\"10:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"11\",\"_remove_\":\"0\"},\"12\":{\"time\":\"11:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"12\",\"_remove_\":\"0\"},\"13\":{\"time\":\"12:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"13\",\"_remove_\":\"0\"},\"14\":{\"time\":\"13:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"14\",\"_remove_\":\"0\"},\"15\":{\"time\":\"14:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"15\",\"_remove_\":\"0\"},\"16\":{\"time\":\"15:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"16\",\"_remove_\":\"0\"},\"17\":{\"time\":\"16:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"17\",\"_remove_\":\"0\"},\"18\":{\"time\":\"17:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"18\",\"_remove_\":\"0\"},\"19\":{\"time\":\"18:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"19\",\"_remove_\":\"0\"},\"20\":{\"time\":\"19:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"20\",\"_remove_\":\"0\"},\"21\":{\"time\":\"20:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"21\",\"_remove_\":\"0\"},\"22\":{\"time\":\"21:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"22\",\"_remove_\":\"0\"},\"23\":{\"time\":\"22:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"23\",\"_remove_\":\"0\"},\"24\":{\"time\":\"23:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"24\",\"_remove_\":\"0\"}},\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/days\"}', '2020-11-02 04:34:52', '2020-11-02 04:34:52'),
(171, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 04:34:53', '2020-11-02 04:34:53'),
(172, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 05:00:37', '2020-11-02 05:00:37'),
(173, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 05:07:30', '2020-11-02 05:07:30'),
(174, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 05:13:38', '2020-11-02 05:13:38'),
(175, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 05:13:59', '2020-11-02 05:13:59'),
(176, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 05:14:52', '2020-11-02 05:14:52'),
(177, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 05:15:07', '2020-11-02 05:15:07'),
(178, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 05:19:25', '2020-11-02 05:19:25'),
(179, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '[]', '2020-11-02 05:20:16', '2020-11-02 05:20:16'),
(180, 1, 'admin/services', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 05:23:01', '2020-11-02 05:23:01'),
(181, 1, 'admin/services/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 05:23:06', '2020-11-02 05:23:06'),
(182, 1, 'admin/services/1', 'PUT', '127.0.0.1', '{\"name_en\":\"service 1 en\",\"name_ar\":\"service 1 ar\",\"price\":\"15\",\"discount\":\"off\",\"discount_from\":null,\"discount_to\":null,\"days\":[\"2\",\"4\",null],\"show_service_type\":\"on\",\"service_type\":[{\"name_en\":\"service type 1 en\",\"name_ar\":\"service type 1 ar\",\"_remove_\":\"0\"},{\"name_en\":\"service type 2 en\",\"name_ar\":\"service type 2 ar\",\"_remove_\":\"0\"}],\"show_tire_size\":\"on\",\"show_tire_type\":\"on\",\"tire_type\":[{\"name_en\":\"tire type 1 en\",\"name_ar\":\"tire type 1 ar\",\"_remove_\":\"0\"},{\"name_en\":\"tire type 2 en\",\"name_ar\":\"tire type 2 ar\",\"_remove_\":\"0\"},{\"name_en\":\"tire type 3 en\",\"name_ar\":\"tire type 3 ar\",\"_remove_\":\"0\"}],\"show_chassis_numb\":\"off\",\"show_numb_cylind\":\"off\",\"show_rim_size\":\"off\",\"show_numb_tire\":\"on\",\"show_request_details\":\"on\",\"show_upload_photo\":\"off\",\"is_active\":\"on\",\"order\":\"1\",\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/services\"}', '2020-11-02 05:24:05', '2020-11-02 05:24:05'),
(183, 1, 'admin/services', 'GET', '127.0.0.1', '[]', '2020-11-02 05:24:06', '2020-11-02 05:24:06'),
(184, 1, 'admin/services/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 05:24:23', '2020-11-02 05:24:23'),
(185, 1, 'admin/days', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 05:24:42', '2020-11-02 05:24:42'),
(186, 1, 'admin/days/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 05:24:49', '2020-11-02 05:24:49'),
(187, 1, 'admin/days/2', 'PUT', '127.0.0.1', '{\"name\":\"Monday\",\"time_slots\":{\"25\":{\"time\":\"00:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"25\",\"_remove_\":\"0\"},\"26\":{\"time\":\"01:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"26\",\"_remove_\":\"0\"},\"27\":{\"time\":\"02:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"27\",\"_remove_\":\"0\"},\"28\":{\"time\":\"03:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"28\",\"_remove_\":\"0\"},\"29\":{\"time\":\"04:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"29\",\"_remove_\":\"0\"},\"30\":{\"time\":\"05:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"30\",\"_remove_\":\"0\"},\"31\":{\"time\":\"06:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"31\",\"_remove_\":\"0\"},\"32\":{\"time\":\"07:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"32\",\"_remove_\":\"0\"},\"33\":{\"time\":\"08:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"33\",\"_remove_\":\"0\"},\"34\":{\"time\":\"09:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"34\",\"_remove_\":\"0\"},\"35\":{\"time\":\"10:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"35\",\"_remove_\":\"0\"},\"36\":{\"time\":\"11:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"36\",\"_remove_\":\"0\"},\"37\":{\"time\":\"12:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"37\",\"_remove_\":\"0\"},\"38\":{\"time\":\"13:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"38\",\"_remove_\":\"0\"},\"39\":{\"time\":\"14:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"39\",\"_remove_\":\"0\"},\"40\":{\"time\":\"15:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"40\",\"_remove_\":\"0\"},\"41\":{\"time\":\"16:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"41\",\"_remove_\":\"0\"},\"42\":{\"time\":\"17:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"42\",\"_remove_\":\"0\"},\"43\":{\"time\":\"18:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"43\",\"_remove_\":\"0\"},\"44\":{\"time\":\"19:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"44\",\"_remove_\":\"0\"},\"45\":{\"time\":\"20:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"45\",\"_remove_\":\"0\"},\"46\":{\"time\":\"21:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"46\",\"_remove_\":\"0\"},\"47\":{\"time\":\"22:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"47\",\"_remove_\":\"0\"},\"48\":{\"time\":\"23:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"48\",\"_remove_\":\"0\"}},\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/days\"}', '2020-11-02 05:25:17', '2020-11-02 05:25:17'),
(188, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 05:25:17', '2020-11-02 05:25:17'),
(189, 1, 'admin/days/4/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 05:25:30', '2020-11-02 05:25:30'),
(190, 1, 'admin/days/4', 'PUT', '127.0.0.1', '{\"name\":\"Wednesday\",\"time_slots\":{\"73\":{\"time\":\"00:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"73\",\"_remove_\":\"0\"},\"74\":{\"time\":\"01:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"74\",\"_remove_\":\"0\"},\"75\":{\"time\":\"02:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"75\",\"_remove_\":\"0\"},\"76\":{\"time\":\"03:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"76\",\"_remove_\":\"0\"},\"77\":{\"time\":\"04:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"77\",\"_remove_\":\"0\"},\"78\":{\"time\":\"05:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"78\",\"_remove_\":\"0\"},\"79\":{\"time\":\"06:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"79\",\"_remove_\":\"0\"},\"80\":{\"time\":\"07:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"80\",\"_remove_\":\"0\"},\"81\":{\"time\":\"08:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"81\",\"_remove_\":\"0\"},\"82\":{\"time\":\"09:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"82\",\"_remove_\":\"0\"},\"83\":{\"time\":\"10:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"83\",\"_remove_\":\"0\"},\"84\":{\"time\":\"11:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"84\",\"_remove_\":\"0\"},\"85\":{\"time\":\"12:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"85\",\"_remove_\":\"0\"},\"86\":{\"time\":\"13:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"86\",\"_remove_\":\"0\"},\"87\":{\"time\":\"14:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"87\",\"_remove_\":\"0\"},\"88\":{\"time\":\"15:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"88\",\"_remove_\":\"0\"},\"89\":{\"time\":\"16:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"89\",\"_remove_\":\"0\"},\"90\":{\"time\":\"17:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"90\",\"_remove_\":\"0\"},\"91\":{\"time\":\"18:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"91\",\"_remove_\":\"0\"},\"92\":{\"time\":\"19:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"92\",\"_remove_\":\"0\"},\"93\":{\"time\":\"20:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"93\",\"_remove_\":\"0\"},\"94\":{\"time\":\"21:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"94\",\"_remove_\":\"0\"},\"95\":{\"time\":\"22:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"95\",\"_remove_\":\"0\"},\"96\":{\"time\":\"23:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"96\",\"_remove_\":\"0\"}},\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/days\"}', '2020-11-02 05:25:52', '2020-11-02 05:25:52'),
(191, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 05:25:52', '2020-11-02 05:25:52'),
(192, 1, 'admin/days/4/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 06:24:42', '2020-11-02 06:24:42'),
(193, 1, 'admin/days/4', 'PUT', '127.0.0.1', '{\"name\":\"Wednesday\",\"time_slots\":{\"73\":{\"time\":\"00:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"73\",\"_remove_\":\"0\"},\"74\":{\"time\":\"01:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"74\",\"_remove_\":\"0\"},\"75\":{\"time\":\"02:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"75\",\"_remove_\":\"0\"},\"76\":{\"time\":\"03:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"76\",\"_remove_\":\"0\"},\"77\":{\"time\":\"04:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"77\",\"_remove_\":\"0\"},\"78\":{\"time\":\"05:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"78\",\"_remove_\":\"0\"},\"79\":{\"time\":\"06:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"79\",\"_remove_\":\"0\"},\"80\":{\"time\":\"07:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"80\",\"_remove_\":\"0\"},\"81\":{\"time\":\"08:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"81\",\"_remove_\":\"0\"},\"82\":{\"time\":\"09:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"82\",\"_remove_\":\"0\"},\"83\":{\"time\":\"10:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"83\",\"_remove_\":\"0\"},\"84\":{\"time\":\"11:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"84\",\"_remove_\":\"0\"},\"85\":{\"time\":\"12:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"85\",\"_remove_\":\"0\"},\"86\":{\"time\":\"13:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"86\",\"_remove_\":\"0\"},\"87\":{\"time\":\"14:00:00\",\"number_request\":\"0\",\"is_active\":\"on\",\"id\":\"87\",\"_remove_\":\"0\"},\"88\":{\"time\":\"15:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"88\",\"_remove_\":\"0\"},\"89\":{\"time\":\"16:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"89\",\"_remove_\":\"0\"},\"90\":{\"time\":\"17:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"90\",\"_remove_\":\"0\"},\"91\":{\"time\":\"18:00:00\",\"number_request\":\"4\",\"is_active\":\"on\",\"id\":\"91\",\"_remove_\":\"0\"},\"92\":{\"time\":\"19:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"92\",\"_remove_\":\"0\"},\"93\":{\"time\":\"20:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"93\",\"_remove_\":\"0\"},\"94\":{\"time\":\"21:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"94\",\"_remove_\":\"0\"},\"95\":{\"time\":\"22:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"95\",\"_remove_\":\"0\"},\"96\":{\"time\":\"23:00:00\",\"number_request\":\"4\",\"is_active\":\"off\",\"id\":\"96\",\"_remove_\":\"0\"}},\"_token\":\"0uFIwWZssHSyjkCb2S9AEX4Oand466lswaDS7Njt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/days\"}', '2020-11-02 06:24:58', '2020-11-02 06:24:58'),
(194, 1, 'admin/days', 'GET', '127.0.0.1', '[]', '2020-11-02 06:24:59', '2020-11-02 06:24:59'),
(195, 1, 'admin/days/4/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:29:19', '2020-11-02 08:29:19'),
(196, 1, 'admin/services', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:29:55', '2020-11-02 08:29:55'),
(197, 1, 'admin/services/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:30:01', '2020-11-02 08:30:01'),
(198, 1, 'admin/areas', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:32:54', '2020-11-02 08:32:54'),
(199, 1, 'admin/car-makes', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:35:36', '2020-11-02 08:35:36'),
(200, 1, 'admin/car-makes/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:35:45', '2020-11-02 08:35:45'),
(201, 1, 'admin/requests', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:43:06', '2020-11-02 08:43:06'),
(202, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-11-02 08:44:14', '2020-11-02 08:44:14'),
(203, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-11-02 08:44:45', '2020-11-02 08:44:45'),
(204, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-11-02 08:47:01', '2020-11-02 08:47:01'),
(205, 1, 'admin/requests/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:47:06', '2020-11-02 08:47:06'),
(206, 1, 'admin/requests', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-11-02 08:51:56', '2020-11-02 08:51:56'),
(207, 1, 'admin/requests', 'GET', '127.0.0.1', '[]', '2020-11-02 08:59:08', '2020-11-02 08:59:08');

-- --------------------------------------------------------

--
-- Structure de la table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2020-10-25 02:25:03', '2020-10-25 02:25:03');

-- --------------------------------------------------------

--
-- Structure de la table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$PWRVehL4xX8zrVAEVMsCmuvJxXeIV9tUMJMukYpc4VQEXXkchWXOq', 'Administrator', NULL, NULL, '2020-10-25 02:25:03', '2020-10-25 02:25:03');

-- --------------------------------------------------------

--
-- Structure de la table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `areas`
--

INSERT INTO `areas` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sharq', 'Sharq', '2020-10-25 02:53:25', '2020-10-25 02:53:25', NULL),
(2, 'Adiliya', 'Adiliya', '2020-10-25 02:53:36', '2020-10-25 02:53:36', NULL),
(3, 'Salwa', 'Salwa', '2020-10-25 02:53:49', '2020-10-25 02:53:49', NULL),
(4, 'Ardhiya', 'Ardhiya', '2020-10-25 02:54:01', '2020-10-25 02:54:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make_id` int(10) UNSIGNED DEFAULT NULL,
  `model_id` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_plate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `name`, `make_id`, `model_id`, `year`, `license_plate`, `user_id`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'car 1', 2, 3, '2012', NULL, 1, 1, '2020-10-25 08:45:40', '2020-10-25 08:45:40', NULL),
(2, 'car 1', 2, 3, '2012', NULL, 1, 1, '2020-10-25 08:46:10', '2020-10-25 08:54:29', '2020-10-25 08:54:29'),
(3, 'car 2', 2, 4, '2020', NULL, 1, 0, '2020-10-25 08:47:37', '2020-10-25 08:55:37', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `car_makes`
--

CREATE TABLE `car_makes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `car_makes`
--

INSERT INTO `car_makes` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'make1 en', 'make1 ar', '2020-10-25 02:55:07', '2020-10-25 02:55:07', NULL),
(2, 'make2 en', 'make2 ar', '2020-10-25 02:56:18', '2020-10-25 02:56:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `car_models`
--

INSERT INTO `car_models` (`id`, `name_en`, `name_ar`, `make_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'make 1 model 1 en', 'make 1 model 1 ar', 1, '2020-10-25 02:55:07', '2020-10-25 02:55:07', NULL),
(2, 'make 1 model 2 en', 'make 1 model 2 ar', 1, '2020-10-25 02:55:07', '2020-10-25 02:55:07', NULL),
(3, 'make 2 model 1 en', 'make 2 model 1 ar', 2, '2020-10-25 02:56:18', '2020-10-25 02:56:18', NULL),
(4, 'make 2 model 2 en', 'make 2 model 2 ar', 2, '2020-10-25 02:56:18', '2020-10-25 02:56:18', NULL),
(5, 'make 2 model 3 en', 'make 2 model 3 ar', 2, '2020-10-25 02:56:18', '2020-10-25 02:56:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'shenawy', 'shenawymawaqaa@gmail.com', 'test contact us', '2020-10-26 05:11:32', '2020-10-26 05:11:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sunday', '2020-11-02 04:04:46', '2020-11-02 04:04:46', NULL),
(2, 'Monday', '2020-11-02 04:05:11', '2020-11-02 04:05:11', NULL),
(3, 'Tuesday', '2020-11-02 04:05:27', '2020-11-02 04:05:27', NULL),
(4, 'Wednesday', '2020-11-02 04:05:50', '2020-11-02 04:05:50', NULL),
(5, 'Thursday', '2020-11-02 04:06:07', '2020-11-02 04:06:07', NULL),
(6, 'Friday', '2020-11-02 04:06:27', '2020-11-02 04:06:27', NULL),
(7, 'Saturday', '2020-11-02 04:06:41', '2020-11-02 04:06:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fees`)),
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expared` int(11) NOT NULL DEFAULT 0,
  `request_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_status_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_04_173148_create_admin_tables', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2020_10_20_092120_create_car_makes_table', 1),
(10, '2020_10_20_092147_create_car_models_table', 1),
(11, '2020_10_20_092205_create_cars_table', 1),
(12, '2020_10_20_092215_create_areas_table', 1),
(13, '2020_10_20_092231_create_addresses_table', 1),
(14, '2020_10_20_110611_create_contacts_table', 1),
(15, '2020_10_20_110633_create_faqs_table', 1),
(16, '2020_10_20_110653_create_pages_table', 1),
(17, '2020_10_20_110727_create_settings_table', 1),
(18, '2020_10_22_061614_add_attributes_to_addresses_table', 2),
(19, '2020_10_25_125015_add_attributes_to_settings_table', 3),
(20, '2020_10_26_111221_create_services_table', 4),
(21, '2020_10_26_111702_create_banners_table', 4),
(22, '2020_10_26_113156_create_status_table', 4),
(23, '2020_10_26_113419_create_payment_status_table', 4),
(24, '2020_10_26_113706_create_payments_table', 4),
(26, '2020_10_26_121846_create_request_status_table', 4),
(27, '2020_10_26_122531_create_invoices_table', 4),
(29, '2020_10_27_104818_create_categories_table', 4),
(30, '2020_10_27_104905_add_attributes_to_users_table', 4),
(31, '2020_10_27_093313_add_chassis_information_to_settings_table', 5),
(34, '2020_10_26_120704_create_requests_table', 6),
(35, '2020_11_02_060609_create_days_table', 7),
(36, '2020_11_02_060813_create_service_days_table', 7),
(37, '2020_11_02_060843_create_time_slots_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('dc1412312d57c9b2517ff78ca9a0976788e5d1550db829e6bd6a1c18312ec1b7144b2b1fe4363dd2', 1, 1, 'token', '[]', 0, '2020-10-25 05:57:22', '2020-10-25 05:57:22', '2021-10-25 08:57:22'),
('e292f8bb29117e67ba8aabf900a587e700fd4a9056520b7758f606ab77f2536e6e13960bf03afe0d', 1, 1, 'token', '[]', 0, '2020-10-25 06:07:12', '2020-10-25 06:07:12', '2021-10-25 09:07:12'),
('e4986a07ec4aafa02dbb75c2ca264ab26cc7ef6e5f7ebb701e4e1cb68c42054217b0e13001f39e68', 1, 1, 'token', '[]', 0, '2020-10-25 05:11:55', '2020-10-25 05:11:55', '2021-10-25 08:11:55'),
('ed3b38294981a0939ed6c514466148d931e8d93684c435b7a3ab2516347bf1bcf70e0ac5fa03ee04', 1, 1, 'token', '[]', 0, '2020-10-25 03:56:49', '2020-10-25 03:56:49', '2021-10-25 06:56:49');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Tire_Shop Personal Access Client', 'UJr3wJEu6CnkurVjwJ2aoPvrhUNju0Xr9SANNCZX', 'http://localhost', 1, 0, 0, '2020-10-25 02:58:36', '2020-10-25 02:58:36'),
(2, NULL, 'Tire_Shop Password Grant Client', 'OcAdjDtsl13iermMSHKvbADpbcAgQHwkdvTsZdAn', 'http://localhost', 0, 1, 0, '2020-10-25 02:58:36', '2020-10-25 02:58:36');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-25 02:58:36', '2020-10-25 02:58:36');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title_en`, `title_ar`, `body_en`, `body_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'privacy', 'Privacy Policy', 'Privacy Policy ar', 'body of privacy policy en', 'body of privacy policy ar', '2020-10-26 05:04:36', '2020-10-26 05:04:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`id`, `name_en`, `name_ar`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash', 'نقدي', 1, '2020-10-28 03:03:17', '2020-10-28 03:03:17', NULL),
(2, 'Knet', 'كنت', 1, '2020-10-28 03:08:48', '2020-10-28 03:08:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Paid', 'دفع', NULL, NULL, NULL),
(2, 'Unpaid', 'غير مدفوعة', NULL, NULL, NULL),
(3, 'Failed', 'فشل', NULL, NULL, NULL),
(4, 'Expired', 'منتهية الصلاحية', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_request` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `service_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addresse_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_make` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_years` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_license_plate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` int(11) NOT NULL DEFAULT 0,
  `req_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_deleted` int(11) NOT NULL DEFAULT 0,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_status_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`id`, `number_request`, `service_id`, `service_info`, `user_id`, `user_name`, `user_email`, `user_phone`, `addresse_info`, `car_make`, `car_model`, `car_years`, `car_license_plate`, `amount`, `discount`, `req_date`, `req_time`, `job_date`, `user_deleted`, `status_id`, `reason`, `payment_id`, `payment_status_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '119965', 1, '{\"service_name\":\"service 1 en\",\"service_type\":\"service type 1 en\",\"front_tire_size\":106,\"back_tire_size\":106,\"tire_type\":\"tire type 3 en\",\"chassis_numb\":null,\"numb_cylind\":null,\"front_rim_size\":null,\"back_rim_size\":null,\"numb_tire\":null,\"request_details\":\"test request details\",\"photo1\":null,\"photo2\":null}', NULL, 'mariem', 'smariem.mawaqaa@gmail.com', '+95622659489', '{\"addresse_area\":\"Sharq\",\"addresse_block\":10,\"addresse_street\":106,\"addresse_building\":75,\"addresse_extra_info\":null}', 'make1 en', 'make 1 model 2 en', '2012', NULL, 0.00, 0, '2020-11-25', '10:00:00', NULL, 1, 1, NULL, NULL, NULL, '2020-11-02 08:39:26', '2020-11-02 08:58:59', NULL),
(2, '556225', 1, '{\"service_name\":\"service 1 en\",\"service_type\":\"service type 1 en\",\"front_tire_size\":106,\"back_tire_size\":106,\"tire_type\":\"tire type 3 en\",\"chassis_numb\":null,\"numb_cylind\":null,\"front_rim_size\":null,\"back_rim_size\":null,\"numb_tire\":null,\"request_details\":\"test request details\",\"photo1\":null,\"photo2\":null}', NULL, 'mariem', 'smariem.mawaqaa@gmail.com', '+95622659489', '{\"addresse_area\":\"Sharq\",\"addresse_block\":10,\"addresse_street\":106,\"addresse_building\":75,\"addresse_extra_info\":null}', 'make1 en', 'make 1 model 2 en', '2012', NULL, 0.00, 0, '2020-11-25', '18:00:00', NULL, 0, 1, NULL, NULL, NULL, '2020-11-02 08:41:16', '2020-11-02 09:10:02', NULL),
(3, '707408', 1, '{\"service_name\":\"service 1 en\",\"service_type\":\"service type 1 en\",\"front_tire_size\":106,\"back_tire_size\":106,\"tire_type\":\"tire type 3 en\",\"chassis_numb\":null,\"numb_cylind\":null,\"front_rim_size\":null,\"back_rim_size\":null,\"numb_tire\":null,\"request_details\":\"test request details\",\"photo1\":null,\"photo2\":null}', NULL, 'mariem', 'smariem.mawaqaa@gmail.com', '+95622659489', '{\"addresse_area\":\"Sharq\",\"addresse_block\":10,\"addresse_street\":106,\"addresse_building\":75,\"addresse_extra_info\":null}', 'make1 en', 'make 1 model 2 en', '2012', NULL, 0.00, 0, '2020-11-25', '10:00:00', NULL, 0, 1, NULL, NULL, NULL, '2020-11-02 08:42:42', '2020-11-02 08:42:42', NULL),
(4, '477957', 1, '{\"service_name\":\"service 1 en\",\"service_type\":\"service type 1 en\",\"front_tire_size\":\"106\",\"back_tire_size\":\"106\",\"tire_type\":\"tire type 3 en\",\"chassis_numb\":null,\"numb_cylind\":null,\"front_rim_size\":null,\"back_rim_size\":null,\"numb_tire\":null,\"request_details\":null,\"photo1\":null,\"photo2\":null}', NULL, 'mariem', 'smariem.mawaqaa@gmail.com', '+95622659489', '{\"addresse_area\":\"Sharq\",\"addresse_block\":\"10\",\"addresse_street\":\"106\",\"addresse_building\":\"75\",\"addresse_extra_info\":null}', 'make1 en', 'make 1 model 2 en', '2012', NULL, 0.00, 0, '2020-11-25', '10:00:00', NULL, 0, 1, NULL, NULL, NULL, '2020-11-02 09:36:05', '2020-11-02 09:36:05', NULL),
(5, '881889', 1, '{\"service_name\":\"service 1 en\",\"service_type\":\"service type 1 en\",\"front_tire_size\":\"106\",\"back_tire_size\":\"106\",\"tire_type\":\"tire type 3 en\",\"chassis_numb\":null,\"numb_cylind\":null,\"front_rim_size\":null,\"back_rim_size\":null,\"numb_tire\":null,\"request_details\":null,\"photo1\":\"uploads\\/requests\\/client8.jpg\",\"photo2\":null}', NULL, 'mariem', 'smariem.mawaqaa@gmail.com', '+95622659489', '{\"addresse_area\":\"Sharq\",\"addresse_block\":\"10\",\"addresse_street\":\"106\",\"addresse_building\":\"75\",\"addresse_extra_info\":null}', 'make1 en', 'make 1 model 2 en', '2012', NULL, 0.00, 0, '2020-11-25', '10:00:00', NULL, 0, 1, NULL, NULL, NULL, '2020-11-02 09:55:01', '2020-11-02 09:55:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `request_status`
--

CREATE TABLE `request_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` int(11) NOT NULL DEFAULT 0,
  `discount_from` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`service_type`)),
  `tire_type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tire_type`)),
  `show_service_type` int(11) NOT NULL DEFAULT 1,
  `show_tire_size` int(11) NOT NULL DEFAULT 1,
  `show_tire_type` int(11) NOT NULL DEFAULT 1,
  `show_chassis_numb` int(11) NOT NULL DEFAULT 1,
  `show_numb_cylind` int(11) NOT NULL DEFAULT 1,
  `show_rim_size` int(11) NOT NULL DEFAULT 1,
  `show_numb_tire` int(11) NOT NULL DEFAULT 1,
  `show_request_details` int(11) NOT NULL DEFAULT 1,
  `show_upload_photo` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name_en`, `name_ar`, `logo`, `price`, `discount`, `discount_from`, `discount_to`, `service_type`, `tire_type`, `show_service_type`, `show_tire_size`, `show_tire_type`, `show_chassis_numb`, `show_numb_cylind`, `show_rim_size`, `show_numb_tire`, `show_request_details`, `show_upload_photo`, `is_active`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'service 1 en', 'service 1 ar', 'uploads/services/0eb663cea0e98a455a648ecf5bb89f36.jpg', 15.00, 0, NULL, NULL, '[{\"name_en\":\"service type 1 en\",\"name_ar\":\"service type 1 ar\"},{\"name_en\":\"service type 2 en\",\"name_ar\":\"service type 2 ar\"}]', '[{\"name_en\":\"tire type 1 en\",\"name_ar\":\"tire type 1 ar\"},{\"name_en\":\"tire type 2 en\",\"name_ar\":\"tire type 2 ar\"},{\"name_en\":\"tire type 3 en\",\"name_ar\":\"tire type 3 ar\"}]', 1, 1, 1, 0, 0, 0, 1, 1, 0, 1, 1, '2020-10-27 09:41:33', '2020-10-27 09:41:33', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `service_days`
--

CREATE TABLE `service_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `days_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service_days`
--

INSERT INTO `service_days` (`id`, `service_id`, `days_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, NULL, NULL, NULL),
(2, 1, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_req_submission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_req_rescheduling` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contact_us` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `support_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chassis_information_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chassis_information_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `facebook`, `instagram`, `twitter`, `email_req_submission`, `email_req_rescheduling`, `email_contact_us`, `created_at`, `updated_at`, `deleted_at`, `support_email`, `call_phone`, `whatsapp`, `lat`, `lng`, `chassis_information_en`, `chassis_information_ar`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Requested', 'طلب جديد', NULL, NULL, NULL),
(2, 'Booked', 'حجز', NULL, NULL, NULL),
(3, 'Invoiced', 'مفوترة', NULL, NULL, NULL),
(4, 'Job Rescheduled', 'تمت إعادة جدولة الوظيفة', NULL, NULL, NULL),
(5, 'On the way', 'فى الطريق', NULL, NULL, NULL),
(6, 'Job started', 'بدأ العمل', NULL, NULL, NULL),
(7, 'Job completed', 'أنجزت', NULL, NULL, NULL),
(8, 'Canceled', 'ألغيت', NULL, NULL, NULL),
(9, 'Didn\'t answer', 'لم تجب', NULL, NULL, NULL),
(10, 'Refused to pay', 'رفض الدفع', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_request` int(11) NOT NULL DEFAULT 4,
  `days_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `time_slots`
--

INSERT INTO `time_slots` (`id`, `time`, `number_request`, `days_id`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '00:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(2, '01:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(3, '02:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(4, '03:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(5, '04:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(6, '05:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(7, '06:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(8, '07:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(9, '08:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(10, '09:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(11, '10:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(12, '11:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(13, '12:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(14, '13:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(15, '14:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(16, '15:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(17, '16:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(18, '17:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(19, '18:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(20, '19:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(21, '20:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(22, '21:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(23, '22:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(24, '23:00:00', 4, 1, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(25, '00:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(26, '01:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(27, '02:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(28, '03:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(29, '04:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(30, '05:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(31, '06:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(32, '07:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(33, '08:00:00', 4, 2, 1, NULL, '2020-11-02 05:25:17', NULL),
(34, '09:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(35, '10:00:00', 4, 2, 1, NULL, '2020-11-02 05:25:17', NULL),
(36, '11:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(37, '12:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(38, '13:00:00', 4, 2, 1, NULL, '2020-11-02 05:25:17', NULL),
(39, '14:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(40, '15:00:00', 4, 2, 1, NULL, '2020-11-02 05:25:17', NULL),
(41, '16:00:00', 4, 2, 0, NULL, '2020-11-02 04:34:36', NULL),
(42, '17:00:00', 4, 2, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(43, '18:00:00', 4, 2, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(44, '19:00:00', 4, 2, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(45, '20:00:00', 4, 2, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(46, '21:00:00', 4, 2, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(47, '22:00:00', 4, 2, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(48, '23:00:00', 4, 2, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(49, '00:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(50, '01:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(51, '02:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(52, '03:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(53, '04:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(54, '05:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(55, '06:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(56, '07:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(57, '08:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(58, '09:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(59, '10:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(60, '11:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(61, '12:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(62, '13:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(63, '14:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(64, '15:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(65, '16:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(66, '17:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(67, '18:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(68, '19:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(69, '20:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(70, '21:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(71, '22:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(72, '23:00:00', 4, 3, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(73, '00:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(74, '01:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(75, '02:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(76, '03:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(77, '04:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(78, '05:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(79, '06:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(80, '07:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(81, '08:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(82, '09:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(83, '10:00:00', 4, 4, 1, '2020-11-02 04:34:36', '2020-11-02 05:25:52', NULL),
(84, '11:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(85, '12:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(86, '13:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(87, '14:00:00', 0, 4, 1, '2020-11-02 04:34:36', '2020-11-02 06:24:59', NULL),
(88, '15:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(89, '16:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(90, '17:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(91, '18:00:00', 4, 4, 1, '2020-11-02 04:34:36', '2020-11-02 05:25:52', NULL),
(92, '19:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(93, '20:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(94, '21:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(95, '22:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(96, '23:00:00', 4, 4, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(97, '00:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(98, '01:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(99, '02:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(100, '03:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(101, '04:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(102, '05:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(103, '06:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(104, '07:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(105, '08:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(106, '09:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(107, '10:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(108, '11:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(109, '12:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(110, '13:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(111, '14:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(112, '15:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(113, '16:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(114, '17:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(115, '18:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(116, '19:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(117, '20:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(118, '21:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(119, '22:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(120, '23:00:00', 4, 5, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(121, '00:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(122, '01:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(123, '02:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(124, '03:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(125, '04:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(126, '05:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(127, '06:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(128, '07:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(129, '08:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(130, '09:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(131, '10:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(132, '11:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(133, '12:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(134, '13:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(135, '14:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(136, '15:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(137, '16:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(138, '17:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(139, '18:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(140, '19:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(141, '20:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(142, '21:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(143, '22:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(144, '23:00:00', 4, 6, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(145, '00:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(146, '01:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(147, '02:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(148, '03:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(149, '04:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(150, '05:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(151, '06:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(152, '07:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(153, '08:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(154, '09:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(155, '10:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(156, '11:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(157, '12:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(158, '13:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(159, '14:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(160, '15:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(161, '16:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(162, '17:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(163, '18:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(164, '19:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(165, '20:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(166, '21:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(167, '22:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL),
(168, '23:00:00', 4, 7, 0, '2020-11-02 04:34:36', '2020-11-02 04:34:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_notified` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_blocked` int(11) NOT NULL DEFAULT 0,
  `otp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_prefix`, `phone`, `is_notified`, `is_active`, `is_blocked`, `otp`, `code`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `device_id`, `device_token`, `category_id`) VALUES
(1, 'maye', 'smariem.mawaqaa@gmail.com', NULL, '$2y$10$I9KEjGii6qy/hSZ4FP4TCu7/UItf5tTrWuOVercbuE.8haWwAy7u.', '+965', '2211211', 1, 1, 0, '', '', NULL, '2020-10-25 03:56:43', '2020-10-25 06:51:29', NULL, '', '', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Index pour la table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Index pour la table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Index pour la table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Index pour la table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Index pour la table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Index pour la table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Index pour la table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Index pour la table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car_makes`
--
ALTER TABLE `car_makes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Index pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `request_status`
--
ALTER TABLE `request_status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_days`
--
ALTER TABLE `service_days`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT pour la table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `car_makes`
--
ALTER TABLE `car_makes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `request_status`
--
ALTER TABLE `request_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `service_days`
--
ALTER TABLE `service_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
