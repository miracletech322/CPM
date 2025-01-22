-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 12:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `folex`
--

-- --------------------------------------------------------

--
-- Table structure for table `coinbase_payments`
--

CREATE TABLE `coinbase_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `coinbase_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coinbase_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_deposit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashing_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin_data_id` bigint(20) DEFAULT NULL,
  `energy_bought` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_resolved` tinyint(1) NOT NULL DEFAULT 0,
  `timeline` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coinbase_payments`
--

INSERT INTO `coinbase_payments` (`id`, `public_id`, `user_id`, `coinbase_id`, `coinbase_code`, `amount_deposit`, `hashing_id`, `coin_data_id`, `energy_bought`, `is_resolved`, `timeline`, `created_at`, `updated_at`) VALUES
(1, 'ded70026-a28b-4d10-94d9-00e9b88e8e70', 3, '5b77fdcc-534f-47a6-9780-00c9ff4abda7', '8VCRP85T', '295.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-17T23:09:29Z\"}]', '2022-01-17 12:09:30', '2022-01-17 12:09:30'),
(2, 'b0f9ef1e-7ea2-4457-9a95-59dc03f1baa6', 3, '2fa317e3-29c5-4281-b2f1-1f51dcf2f4a3', 'RARBMZRN', '6982.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-17T23:18:19Z\"}]', '2022-01-17 12:18:20', '2022-01-17 12:18:20'),
(3, 'c236cbcf-9028-424b-85ab-a5797f9228d4', 3, 'e3e9b6dd-312e-4714-8c88-cba0c8f09703', '5EM8C34X', '6982.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-17T23:29:13Z\"}]', '2022-01-17 12:29:14', '2022-01-17 12:29:14'),
(4, 'fb1e9194-4da2-4c9f-854f-368ee20e5889', 3, 'b193907e-4744-404a-9322-5bfa288c6db6', 'RG3A4Y43', '6982.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-17T23:33:42Z\"}]', '2022-01-17 12:33:43', '2022-01-17 12:33:43'),
(5, '73bdfcae-98a3-4137-bb60-69b0e8f6d006', 3, 'c157175f-68c9-4ca0-a0c7-d1c78ed393c0', 'A8PDDC6W', '6982.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-17T23:42:54Z\"}]', '2022-01-17 12:42:55', '2022-01-17 12:42:55'),
(6, '2d7f26c0-e868-468b-b44f-daf05ca4569b', 3, '05aebe71-e970-493c-a730-b5c34b7ec3ca', 'K8QH5ZGY', '6982.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-17T23:57:24Z\"}]', '2022-01-17 12:57:25', '2022-01-17 12:57:25'),
(7, '44806b7f-eea3-424e-bb38-1207656b4af7', 3, 'c7775ef3-412b-42bc-a88b-a38035a42624', 'MJQGRKMQ', '6982.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-18T00:18:37Z\"}]', '2022-01-17 13:18:37', '2022-01-17 13:18:37'),
(8, '52138fd3-2180-42dd-bf5a-0c76f6fc4a9a', 3, '8c77d205-f26d-42e6-aede-cb65df9403b7', 'R53R88NH', '1404.00', NULL, NULL, NULL, 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-18T00:23:58Z\"}]', '2022-01-17 13:23:58', '2022-01-17 13:23:58'),
(9, '77499fce-ff2e-4869-a7b3-c7d9748225f9', 3, '6839dda8-6691-41d1-b9d0-81fa948e4a97', 'ZKCNQP4N', '2900.00', '2', 2, '580', 1, '[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"COMPLETED\"}]', '2022-01-18 06:21:48', '2022-01-18 07:07:37'),
(10, '4b6c54a4-ac17-4884-b9e6-5767fdc269a0', 3, 'f610f7f5-491f-4eae-93c3-5beefb705624', '5CCXH3EY', '500.00', '2', 2, '100', 1, '[{\"time\":\"2022-01-18T18:21:35Z\",\"status\":\"COMPLETED\"}]', '2022-01-18 07:21:35', '2022-01-18 07:22:19'),
(11, 'e1752a9d-559c-4419-9c3f-6b09ffff5b1c', 3, '3b1ef82d-d386-415f-89f5-038900e6fa3e', '4WF3F69G', '500.00', '1', 1, '100', 1, '[{\"time\":\"2022-01-19T18:11:19Z\",\"status\":\"CONFIRMED\"},{\"time\":\"2022-01-19T18:19:23Z\",\"status\":\"CANCELED\"}]', '2022-01-19 07:11:18', '2022-01-19 07:22:12'),
(12, 'ab7c6c31-f095-4183-88d6-a2cf8340d27c', 3, '1d77a72a-5b77-4fc4-aab5-375651ca65a7', 'D6RB98RL', '250.00', '1', 1, '50', 1, '[{\"time\":\"2022-01-25T14:01:18Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-25T14:02:10Z\",\"status\":\"CONFIRMED\"}]', '2022-01-25 03:01:18', '2022-01-25 03:04:56'),
(13, 'e4115cde-5a3c-4886-955f-86514a28693e', 3, 'dcf112a2-a65c-4818-937b-90d88fa32df5', 'PRT2YAG5', '250.00', '1', 1, '50', 0, '[{\"status\":\"NEW\",\"time\":\"2022-01-25T14:07:33Z\"}]', '2022-01-25 03:07:34', '2022-01-25 03:07:34'),
(14, '0b4d5890-057f-47a0-989e-894b0f8106df', 6, '69b77b9b-9970-4e97-9191-17effc50114f', 'Y5YW8KG2', '250.00', '1', 1, '50', 0, '[{\"status\":\"NEW\",\"time\":\"2022-02-16T11:09:10Z\"}]', '2022-02-16 00:09:10', '2022-02-16 00:09:10'),
(15, '2a695c8f-8109-4e0d-b403-e10159c441d0', 6, '120c0332-1c72-4caf-a8b0-6586de2db78d', '8LJ75Y3W', '250.00', '1', 1, '50', 0, '[{\"status\":\"NEW\",\"time\":\"2022-02-16T11:12:00Z\"}]', '2022-02-16 00:12:00', '2022-02-16 00:12:00'),
(16, 'de7129bb-a6dd-4693-a11a-8df9df17d412', 3, 'a1f159f3-336c-423e-bfc2-dc9605b48fc3', 'Q6PZGKJB', '1411.00', '1', 1, '282.2', 0, '[{\"status\":\"NEW\",\"time\":\"2022-02-27T20:08:23Z\"}]', '2022-02-27 09:08:24', '2022-02-27 09:08:24'),
(17, 'bd968a4f-7efd-4b0e-97f2-b4817566cbff', 3, '1ab07308-2003-45e4-896d-e385323c0f83', 'GPJEV3MK', '250.00', '1', 1, '50', 0, '[{\"status\":\"NEW\",\"time\":\"2024-01-11T21:06:59Z\"}]', '2024-01-11 10:04:05', '2024-01-11 10:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `coinbase_webhooks`
--

CREATE TABLE `coinbase_webhooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coinbase_webhooks`
--

INSERT INTO `coinbase_webhooks` (`id`, `data`, `created_at`, `updated_at`) VALUES
(1, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:21:48Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"6e534891-cc33-4230-b121-cee1ebf1811e\",\"resource\":\"event\",\"type\":\"charge:created\"},\"id\":\"82b24744-8911-42c6-ac29-9fe4e29a5d54\",\"scheduled_for\":\"2022-01-18T17:21:48Z\"}', '2022-01-18 06:41:54', '2022-01-18 06:41:54'),
(2, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"CANCELED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:failed\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 06:43:42', '2022-01-18 06:43:42'),
(3, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"CANCELED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:delayed\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 06:48:43', '2022-01-18 06:48:43'),
(4, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"DELAYED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:delayed\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 06:49:02', '2022-01-18 06:49:02'),
(5, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"RESOLVED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:resolved\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 06:55:39', '2022-01-18 06:55:39'),
(6, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"RESOLVED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:resolved\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 06:55:39', '2022-01-18 06:55:39'),
(7, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"RESOLVED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:resolved\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 06:59:14', '2022-01-18 06:59:14'),
(8, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"RESOLVED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:resolved\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 06:59:14', '2022-01-18 06:59:14'),
(9, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"RESOLVED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:resolved\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 07:01:23', '2022-01-18 07:01:23'),
(10, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"RESOLVED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:resolved\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 07:01:23', '2022-01-18 07:01:23'),
(11, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"RESOLVED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:resolved\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 07:06:46', '2022-01-18 07:06:46'),
(12, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"COMPLETED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 07:07:37', '2022-01-18 07:07:37'),
(13, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T17:42:54Z\",\"data\":{\"id\":\"6839dda8-6691-41d1-b9d0-81fa948e4a97\",\"code\":\"ZKCNQP4N\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"2900.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.06948693\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T17:21:48Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-18T17:42:54Z\",\"status\":\"COMPLETED\"}],\"addresses\":{\"bitcoin\":\"3QG5bvCq5YmYHwxPECvrmkdQnFmhXobJ3J\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=2900\",\"created_at\":\"2022-01-18T17:21:48Z\",\"expires_at\":\"2022-01-18T18:21:48Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/ZKCNQP4N\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41734.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41734.465\"}},\"id\":\"a3149051-34dc-4f7a-8178-d76c8c6a1315\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"d87fd77a-a313-49b3-bdd1-8d573d3aa8f0\",\"scheduled_for\":\"2022-01-18T17:42:54Z\"}', '2022-01-18 07:07:49', '2022-01-18 07:07:49'),
(14, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T18:21:35Z\",\"data\":{\"id\":\"f610f7f5-491f-4eae-93c3-5beefb705624\",\"code\":\"5CCXH3EY\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"500.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.01204770\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T18:21:35Z\",\"status\":\"COMPLETED\"}],\"addresses\":{\"bitcoin\":\"3PAUv1fYkgLNZfHq2LE67aYC2xsZ8Wmib5\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=500\",\"created_at\":\"2022-01-18T18:21:35Z\",\"expires_at\":\"2022-01-18T19:21:35Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/5CCXH3EY\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41501.685\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41501.685\"}},\"id\":\"678af427-9d04-4c32-a069-5ac0c24f1245\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"4fcc2744-0a65-408f-9fdc-062054cfe00a\",\"scheduled_for\":\"2022-01-18T18:21:35Z\"}', '2022-01-18 07:22:19', '2022-01-18 07:22:19'),
(15, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-18T18:21:35Z\",\"data\":{\"id\":\"f610f7f5-491f-4eae-93c3-5beefb705624\",\"code\":\"5CCXH3EY\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"500.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.01204770\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-18T18:21:35Z\",\"status\":\"COMPLETED\"}],\"addresses\":{\"bitcoin\":\"3PAUv1fYkgLNZfHq2LE67aYC2xsZ8Wmib5\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=2&cash=500\",\"created_at\":\"2022-01-18T18:21:35Z\",\"expires_at\":\"2022-01-18T19:21:35Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/5CCXH3EY\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"41501.685\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"41501.685\"}},\"id\":\"678af427-9d04-4c32-a069-5ac0c24f1245\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"4fcc2744-0a65-408f-9fdc-062054cfe00a\",\"scheduled_for\":\"2022-01-18T18:21:35Z\"}', '2022-01-18 07:22:19', '2022-01-18 07:22:19'),
(16, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-19T18:19:23Z\",\"data\":{\"id\":\"3b1ef82d-d386-415f-89f5-038900e6fa3e\",\"code\":\"4WF3F69G\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"500.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.01186677\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-19T18:11:19Z\",\"status\":\"CONFIRMED\"},{\"time\":\"2022-01-19T18:19:23Z\",\"status\":\"CANCELED\"}],\"addresses\":{\"bitcoin\":\"31us46jk9c1begEkpgwntu5hpCkHDdfuUr\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=1&cash=500\",\"created_at\":\"2022-01-19T18:11:19Z\",\"expires_at\":\"2022-01-19T19:11:19Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/4WF3F69G\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"42134.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"42134.465\"}},\"id\":\"f61964d4-0411-4cd3-b66e-27f6f6c4186c\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"3d6f828c-9c4a-4800-aef3-ac4ab4766cba\",\"scheduled_for\":\"2022-01-19T18:19:23Z\"}', '2022-01-19 07:23:18', '2022-01-19 07:23:18'),
(17, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-19T18:19:23Z\",\"data\":{\"id\":\"3b1ef82d-d386-415f-89f5-038900e6fa3e\",\"code\":\"4WF3F69G\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"500.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.01186677\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-19T18:11:19Z\",\"status\":\"CONFIRMED\"},{\"time\":\"2022-01-19T18:19:23Z\",\"status\":\"CANCELED\"}],\"addresses\":{\"bitcoin\":\"31us46jk9c1begEkpgwntu5hpCkHDdfuUr\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=1&cash=500\",\"created_at\":\"2022-01-19T18:11:19Z\",\"expires_at\":\"2022-01-19T19:11:19Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/4WF3F69G\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"42134.465\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"42134.465\"}},\"id\":\"f61964d4-0411-4cd3-b66e-27f6f6c4186c\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"3d6f828c-9c4a-4800-aef3-ac4ab4766cba\",\"scheduled_for\":\"2022-01-19T18:19:23Z\"}', '2022-01-19 07:23:18', '2022-01-19 07:23:18'),
(18, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-25T14:02:10Z\",\"data\":{\"id\":\"1d77a72a-5b77-4fc4-aab5-375651ca65a7\",\"code\":\"D6RB98RL\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"250.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.00684829\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-25T14:01:18Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-25T14:02:10Z\",\"status\":\"CONFIRMED\"}],\"addresses\":{\"bitcoin\":\"3BWrXrzJkuTLr6WmZK2zTSbD5BjoFmZPrc\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=1&cash=250\",\"created_at\":\"2022-01-25T14:01:18Z\",\"expires_at\":\"2022-01-25T15:01:18Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/D6RB98RL\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"36505.47\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"36505.47\"}},\"id\":\"e85dcd5a-6164-456a-8863-974bd0e3ddc9\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"0be2c4d1-4c4e-4188-a763-304da4a5308d\",\"scheduled_for\":\"2022-01-25T14:02:10Z\"}', '2022-01-25 03:04:56', '2022-01-25 03:04:56'),
(19, '{\"attempt_number\":1,\"event\":{\"api_version\":\"2018-03-22\",\"created_at\":\"2022-01-25T14:02:10Z\",\"data\":{\"id\":\"1d77a72a-5b77-4fc4-aab5-375651ca65a7\",\"code\":\"D6RB98RL\",\"name\":\"Folex Mining\",\"utxo\":false,\"pricing\":{\"local\":{\"amount\":\"250.00\",\"currency\":\"USD\"},\"bitcoin\":{\"amount\":\"0.00684829\",\"currency\":\"BTC\"}},\"metadata\":{\"customer_id\":\"fd698b52-4a51-453d-939c-90289f2528d2\",\"customer_name\":\"user@folex.com\"},\"payments\":[],\"resource\":\"charge\",\"timeline\":[{\"time\":\"2022-01-25T14:01:18Z\",\"status\":\"NEW\"},{\"time\":\"2022-01-25T14:02:10Z\",\"status\":\"CONFIRMED\"}],\"addresses\":{\"bitcoin\":\"3BWrXrzJkuTLr6WmZK2zTSbD5BjoFmZPrc\"},\"pwcb_only\":false,\"cancel_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/pay\\/miners?hashing=1&cash=250\",\"created_at\":\"2022-01-25T14:01:18Z\",\"expires_at\":\"2022-01-25T15:01:18Z\",\"hosted_url\":\"https:\\/\\/commerce.coinbase.com\\/charges\\/D6RB98RL\",\"description\":\"Buying power from folex mining via bitcoin payment\",\"fees_settled\":true,\"pricing_type\":\"fixed_price\",\"redirect_url\":\"http:\\/\\/localhost:88\\/folex\\/public\\/coinbase-success\",\"support_email\":\"im.ali7@outlook.com\",\"exchange_rates\":{\"BTC-USD\":\"36505.47\"},\"organization_name\":\"Folex Mining\",\"payment_threshold\":{\"overpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"overpayment_relative_threshold\":\"0.005\",\"underpayment_absolute_threshold\":{\"amount\":\"5.00\",\"currency\":\"USD\"},\"underpayment_relative_threshold\":\"0.005\"},\"local_exchange_rates\":{\"BTC-USD\":\"36505.47\"}},\"id\":\"e85dcd5a-6164-456a-8863-974bd0e3ddc9\",\"resource\":\"event\",\"type\":\"charge:confirmed\"},\"id\":\"0be2c4d1-4c4e-4188-a763-304da4a5308d\",\"scheduled_for\":\"2022-01-25T14:02:10Z\"}', '2022-01-25 03:04:56', '2022-01-25 03:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `coin_data`
--

CREATE TABLE `coin_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hashing_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `formula` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin_display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `network_hashrate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficulty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reward_block` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coin_data`
--

INSERT INTO `coin_data` (`id`, `hashing_id`, `is_active`, `formula`, `unit`, `coin`, `data`, `coin_display_name`, `network_hashrate`, `difficulty`, `reward`, `reward_block`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '<price> / ( ( 1 / ( ( ( (<network_hashrate> * 1000) * <reward_block> ) / ( <difficulty> * 3600 ) ) * 86400 ) ) )', 'TH/s', 'BTC', '{\"id\":\"a195fd59ce0ebc3f9b2d99b3c396ff198bcb4a5e\",\"coin\":\"BTC\",\"name\":\"Bitcoin\",\"type\":\"coin\",\"algorithm\":\"SHA-256\",\"network_hashrate\":5.8925758269319e+20,\"difficulty\":75502165623893,\"reward\":6.9384625446482e-20,\"reward_unit\":\"BTC\",\"reward_block\":6.25,\"price\":43067.397782535,\"volume\":8045989891.3145,\"updated\":1707051252}', 'BTC', '5.8925758269319E+20', '75502165623893', '6.9384625446482E-20', '6.25', '43067.397782535', '2024-01-10 10:07:11', '2024-02-05 06:30:19'),
(2, '2', 1, '( <reward_block> * (<total_hash>) * 86400 ) / (<difficulty> *  4294967296)', 'MH/s', 'BINANCE ETHW', '{\"id\":\"a4ffb5b5b721c91643ae5e038d87d0e9ab1665dd\",\"coin\":\"BINANCE ETHW\",\"name\":\"Binance\",\"type\":\"pool\",\"algorithm\":\"Ethash\",\"network_hashrate\":-1,\"difficulty\":-1,\"reward\":4.253625e-11,\"reward_unit\":\"ETHW\",\"reward_block\":-1,\"price\":2.6047336538388,\"volume\":-1,\"updated\":1707051602}', 'ETHW', '-1', '-1', '4.253625E-11', '-1', '2.6047336538388', '2024-01-10 10:07:11', '2024-02-04 02:06:25'),
(3, '3', 1, '( <reward_block> * (<total_hash>) * 86400 ) / (<difficulty> *  4294967296)', 'KH/s', 'KAS', '{\"id\":\"7ae4e0240e6cd4690300f55430f54ef5137062de\",\"coin\":\"KAS\",\"name\":\"Kaspa\",\"type\":\"coin\",\"algorithm\":\"KHeavyHash\",\"network_hashrate\":1.645079241157e+17,\"difficulty\":38302485.858019,\"reward\":3.0328553380147e-12,\"reward_unit\":\"KAS\",\"reward_block\":138.5913155,\"price\":0.10108425439837,\"volume\":9681240.8331884,\"updated\":1707051263}', 'KAS', '1.645079241157E+17', '38302485.858019', '3.0328553380147E-12', '138.5913155', '0.10108425439837', '2024-01-10 10:07:12', '2024-02-04 02:06:26'),
(6, '5', 1, '( <reward_block> * (<total_hash>) * 86400 ) / (<difficulty> *  4294967296)', 'MH/s', '2MINERS ZEC', '{\"id\":\"0bfeb7251ef0b2e58abca9755796f2a9258a3721\",\"coin\":\"2MINERS ZEC\",\"name\":\"2Miners\",\"type\":\"pool\",\"algorithm\":\"Equihash\",\"network_hashrate\":-1,\"difficulty\":-1,\"reward\":1.4826737185987e-8,\"reward_unit\":\"ZEC\",\"reward_block\":-1,\"price\":21.837037991166,\"volume\":-1,\"updated\":1707051602}', 'ZEC', '-1', '-1', '1.4826737185987E-8', '-1', '21.837037991166', '2024-02-02 10:22:44', '2024-02-04 02:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `crypto_options`
--

CREATE TABLE `crypto_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crypto_options`
--

INSERT INTO `crypto_options` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bitcoin', NULL, NULL),
(2, 'Ethereum', NULL, NULL),
(3, 'Litecoin', NULL, NULL),
(4, 'Bitcoin Cash', NULL, NULL),
(5, 'USD Coin', NULL, NULL),
(6, 'Tether', NULL, NULL),
(7, 'Binance Coin', NULL, NULL),
(8, 'Bitcoin Cash', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposit_requests`
--

CREATE TABLE `deposit_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `is_resolved` tinyint(1) NOT NULL DEFAULT 0,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `action_performed_by` bigint(20) DEFAULT NULL,
  `action_performed_at` datetime DEFAULT NULL,
  `amount_deposited` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashing_id` int(11) DEFAULT NULL,
  `coin_data_id` bigint(20) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=card,2=bank,3=coin',
  `coinbase_payment_id` bigint(20) DEFAULT NULL,
  `stripe_payment_id` bigint(20) DEFAULT NULL,
  `energy_bought` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposit_requests`
--

INSERT INTO `deposit_requests` (`id`, `public_id`, `user_id`, `is_resolved`, `is_accepted`, `action_performed_by`, `action_performed_at`, `amount_deposited`, `hashing_id`, `coin_data_id`, `payment_method`, `coinbase_payment_id`, `stripe_payment_id`, `energy_bought`, `additional_details`, `created_at`, `updated_at`) VALUES
(1, '5bf04f41-667a-4f80-863c-30baa188f939', 3, 1, 1, 1, '2022-01-12 15:57:39', '5005', 1, 1, '2', NULL, NULL, '1001', 'sdsdsd', '2022-01-12 10:57:21', '2022-01-18 04:37:39'),
(2, 'f9a99a19-cd33-4f89-8a44-677e355a4255', 3, 1, 1, 1, '2022-01-12 16:04:01', '6180', 1, 1, '2', NULL, NULL, '1236', 'fdg fdgfdg fddfg  f fd fdgd fg dfg gfd fdg dfg dfg gfd gfd', '2022-01-12 11:00:41', '2022-01-18 04:37:39'),
(3, 'ad25a151-bcac-4c76-8612-e10c438e2207', 3, 1, 1, 1, '2022-01-12 17:14:17', '1770.4', 1, 1, '2', NULL, NULL, '354.08', 'dfdf dddf', '2022-01-12 11:03:48', '2022-01-18 04:37:39'),
(4, '79cb1204-3e06-4524-ad62-bbefbc5e0300', 3, 1, 1, 1, '2022-01-12 17:19:41', '2000', 1, 1, '2', NULL, NULL, '400', 'dfs sfdsfsd fds dsfsd', '2022-01-12 12:15:01', '2022-01-18 04:37:39'),
(5, 'ea1306f5-196c-4499-8201-146fdea0ec5f', 3, 1, 0, 1, '2022-01-12 17:19:32', '4000', 1, 1, '2', NULL, NULL, '800', 'dsf d ggggggggggggg fg fgffgf', '2022-01-12 12:18:10', '2022-01-18 04:37:39'),
(6, '2e51d017-e339-4a34-bc28-140ae90257ef', 3, 1, 1, 1, '2022-01-12 18:11:20', '1600', 1, 1, '2', NULL, NULL, '320', 'fsdfdsf', '2022-01-12 13:10:52', '2022-01-18 04:37:39'),
(7, 'e694ae6b-d37a-458c-b9fb-c46c3248bc0f', 3, 1, 1, 1, '2022-01-12 18:16:23', '250', 1, 1, '2', NULL, NULL, '50', 'sdsdsdsdsddf', '2022-01-12 13:16:04', '2022-01-18 04:37:39'),
(8, '6b50ddbc-27d9-4066-b378-3c02398d7c2b', 3, 1, 1, 1, '2022-01-13 10:39:56', '1100', 2, 2, '2', NULL, NULL, '220', 'bvchg hg jhj jh jh jg jg', '2022-01-13 05:35:14', '2022-01-18 04:37:39'),
(9, 'd6ef4612-7254-4414-bbf4-0660d52ad0e3', 3, 1, 1, 1, '2022-01-14 12:23:45', '2000', 2, 2, '2', NULL, NULL, '400', 'Some additional info for david', '2022-01-14 07:22:31', '2022-01-18 04:37:39'),
(12, '3ec21a37-8395-4dbb-bf58-4688b0dcfb0e', 3, 1, 1, 1, '2022-01-18 12:05:48', '2900.00', 2, 2, '3', 9, NULL, '580', '', '2022-01-18 07:01:23', '2022-01-18 07:05:48'),
(13, 'b73fcf40-c8ba-43b5-9793-fe0c82ceea38', 3, 1, 1, 1, '2022-01-18 12:23:37', '500.00', 2, 2, '3', 10, NULL, '100', '', '2022-01-18 07:22:19', '2022-01-18 07:23:37'),
(14, '80b51277-4224-41f7-8c41-516db18e6e59', 3, 1, 1, 1, '2022-01-19 09:09:34', '3616.00', 1, 1, '1', NULL, 2, '723.2', '', '2022-01-19 03:51:25', '2022-01-19 04:09:34'),
(15, 'f1568c1a-6df8-42f3-a1f9-1231bb1ccbb8', 3, 0, NULL, NULL, NULL, '4342.00', 1, 1, '1', NULL, 6, '868.4', '', '2022-01-19 04:03:07', '2022-01-19 04:03:07'),
(16, 'ad94f57b-4195-401a-8cb8-a4aff85b3e08', 3, 0, NULL, NULL, NULL, '4930.00', 1, 1, '1', NULL, 7, '986', '', '2022-01-19 04:31:28', '2022-01-19 04:31:28'),
(17, 'aefcb596-e525-4cbf-9ba8-03e957486225', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 8, '50', '', '2022-01-19 04:33:07', '2022-01-19 04:33:07'),
(18, 'efee8bda-abea-4a49-908a-d7ba43445dc6', 3, 1, 1, 1, '2022-01-19 14:48:21', '500.00', 1, 1, '3', 11, NULL, '100', '', '2022-01-19 07:23:18', '2022-01-19 09:48:21'),
(19, '3ab971ea-ed52-416e-bef4-14a5dea26363', 4, 1, 1, 1, '2022-01-19 16:14:03', '500.00', 1, 1, '1', NULL, 10, '100', '', '2022-01-19 10:58:22', '2022-01-19 11:14:03'),
(20, '04e9c466-ff9c-42a0-b2b1-aa488637c124', 4, 1, 1, 1, '2022-01-19 16:26:39', '500', 1, 1, '2', NULL, NULL, '100', 'sdsdsdd', '2022-01-19 10:58:45', '2022-01-19 11:26:39'),
(21, '07d9f368-206f-41bd-98d1-93527cbf3ee7', 3, 1, 1, 1, '2022-01-25 07:57:44', '250.00', 1, 1, '1', NULL, 12, '50', '', '2022-01-25 02:53:53', '2022-01-25 02:57:44'),
(22, 'e5f552e3-eb6a-4242-9a1c-482d348efba2', 3, 1, 1, 1, '2022-01-25 08:09:17', '250.00', 1, 1, '3', 12, NULL, '50', '', '2022-01-25 03:04:56', '2022-01-25 03:09:17'),
(23, 'fb3cb474-8550-4001-8f9f-404c32a0535b', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 13, '50', '', '2022-01-26 04:24:15', '2022-01-26 04:24:15'),
(24, '6e3a1cbf-af68-471d-b9fb-e1105a0fcd1f', 3, 0, NULL, NULL, NULL, '1212.00', 1, 1, '1', NULL, 14, '242.4', '', '2022-01-26 05:03:09', '2022-01-26 05:03:09'),
(25, '8892ba30-ae5c-40cf-bf8b-78658edb9a4a', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 15, '50', '', '2022-01-26 05:04:54', '2022-01-26 05:04:54'),
(26, '2b6049b4-06d6-4c15-bc45-286b46d7c565', 3, 0, NULL, NULL, NULL, '571.00', 1, 1, '1', NULL, 16, '114.2', '', '2022-01-26 05:20:03', '2022-01-26 05:20:03'),
(27, '390c6778-a2ee-4e4b-ae12-82f6e8e7ff09', 3, 0, NULL, NULL, NULL, '2494.00', 1, 1, '1', NULL, 17, '498.8', '', '2022-01-26 05:21:14', '2022-01-26 05:21:14'),
(28, '11b59512-b5b5-45f9-b021-b9224b4464a2', 5, 1, 1, 1, '2022-01-28 04:07:37', '2000', 1, 1, '2', NULL, NULL, '400', 'bla bla bla', '2022-01-27 23:07:07', '2022-01-27 23:07:37'),
(29, 'ca061a87-8da1-415e-9814-d2f027cb0a62', 3, 0, NULL, NULL, NULL, '1411', 1, 1, '2', NULL, NULL, '282.2', 'd,,df jgfdgfdfdg', '2022-02-27 09:17:38', '2022-02-27 09:17:38'),
(30, '193022a4-8d67-4414-888c-77d28d83d2dd', 11, 0, NULL, NULL, NULL, '5077.00', 1, 1, '1', NULL, 19, '1015.4', '', '2022-03-22 04:45:35', '2022-03-22 04:45:35'),
(31, '9e6a6400-9451-4caf-99f3-93a34a765335', 12, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 20, '50', '', '2022-03-22 04:47:38', '2022-03-22 04:47:38'),
(32, '6189e901-c1cf-4ee8-99c6-f24e298b17f9', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 21, '50', '', '2024-01-10 10:32:56', '2024-01-10 10:32:56'),
(33, '5ebd3b6b-559b-4ad1-89c1-b9fdf01b9327', 3, 0, NULL, NULL, NULL, '250', 1, 1, '2', NULL, NULL, '50', 'dsdsds', '2024-01-11 09:37:05', '2024-01-11 09:37:05'),
(34, 'f52b6446-659b-4dc1-9a46-0f81a4b0252d', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 22, '50', '', '2024-01-11 09:50:20', '2024-01-11 09:50:20'),
(35, '24fa51f5-a4d0-46f4-bf66-004e066066d4', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 23, '50', '', '2024-01-11 09:52:54', '2024-01-11 09:52:54'),
(36, '852aa6d7-531f-49c8-99fc-90664f9f8b02', 3, 0, NULL, NULL, NULL, '250.00', 2, 2, '1', NULL, 24, '50', '', '2024-01-11 09:55:01', '2024-01-11 09:55:01'),
(37, '07f3e342-c596-45ce-964e-2e8c72b056fc', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 25, '50', '', '2024-01-11 09:57:59', '2024-01-11 09:57:59'),
(38, '62d15854-fd0a-4bc0-9c7a-fb41a23786d9', 3, 0, NULL, NULL, NULL, '250.00', 1, 1, '1', NULL, 26, '50', '', '2024-01-11 10:03:38', '2024-01-11 10:03:38'),
(39, '9a27ad7a-df23-47c1-8c1e-0449e50f3f0b', 3, 0, NULL, NULL, NULL, '250', 1, 1, '2', NULL, NULL, '50', NULL, '2024-01-11 10:03:54', '2024-01-11 10:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `email_histories`
--

CREATE TABLE `email_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` bigint(20) DEFAULT NULL,
  `to` bigint(20) DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_html` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `hashings`
--

CREATE TABLE `hashings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_khs` double DEFAULT NULL COMMENT '1KH/s in $',
  `cost_per_kwh` double DEFAULT NULL COMMENT 'KWh',
  `power_consumption` double DEFAULT NULL COMMENT 'w / 1KH-s',
  `maintenance_fee` double DEFAULT NULL COMMENT 'Percentage',
  `min_buyable` double DEFAULT NULL COMMENT 'KH-s',
  `max_buyable` double DEFAULT NULL COMMENT 'KH-s',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashings`
--

INSERT INTO `hashings` (`id`, `name`, `price_khs`, `cost_per_kwh`, `power_consumption`, `maintenance_fee`, `min_buyable`, `max_buyable`, `created_at`, `updated_at`) VALUES
(1, 'SHA-256', 19.5, 0.67, 17.5, 15, 150, 50000, NULL, '2024-02-04 02:11:04'),
(2, 'Ethash', 1, 0.12, 0.12, 14, 2000, 15000, NULL, '2024-02-03 14:16:04'),
(3, 'KHeavyHash', 2323, 23, 233, 23, 25, 4000, NULL, '2024-01-21 11:56:39'),
(5, 'Equihash', 0.283, 0.67, 0.345, 15, 25000, 500000, '2024-02-02 10:21:00', '2024-02-02 10:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `current_wallet_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Wallet balance after action',
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashing_id` int(11) DEFAULT NULL,
  `coin_data_id` bigint(20) DEFAULT NULL,
  `coin_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=withdraw, 2=deposit, 3=referral, 4=daily_income_cron',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=card, 2=bank, 3=coin, 4=referral',
  `coinbase_payment_id` bigint(20) DEFAULT NULL,
  `stripe_payment_id` bigint(20) DEFAULT NULL,
  `reference_ledger_id` bigint(20) DEFAULT NULL,
  `withdraw_request_id` bigint(20) DEFAULT NULL COMMENT 'Only for withdrawl',
  `status_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_performmed_by` bigint(20) DEFAULT NULL COMMENT 'For requests only',
  `action_performmed_at` datetime DEFAULT NULL COMMENT 'For requests only',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `public_id`, `user_id`, `payment_id`, `current_wallet_balance`, `amount`, `hashing_id`, `coin_data_id`, `coin_value`, `type`, `payment_method`, `coinbase_payment_id`, `stripe_payment_id`, `reference_ledger_id`, `withdraw_request_id`, `status_text`, `action_performmed_by`, `action_performmed_at`, `created_at`, `updated_at`) VALUES
(1, 'c3ae05e2-37ce-48f1-9751-fa1c1d5c7479', 3, 1, '0', '5005', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 04:47:44', '2022-01-11 23:47:44', '2022-01-12 10:57:39'),
(2, 'e40e9239-d334-495f-a8a8-613628fd9ab4', 3, NULL, '1930', '70', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 15:59:42', '2022-01-12 10:59:42', '2022-01-12 10:59:42'),
(3, '322f4fcf-19c5-4502-8b27-809d03cfbd17', 3, 2, '1930', '6180', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 15:59:42', '2022-01-12 10:59:42', '2022-01-12 11:04:01'),
(4, 'eb76ac1c-5883-4ef7-b798-eca4b980aee7', 3, NULL, '1840', '90', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 15:59:42', '2022-01-12 10:59:42', '2022-01-12 11:04:31'),
(5, 'ce325ad9-e53e-453d-889f-1cd3b64b5a0b', 3, 3, '1840', '1770.4', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 17:14:16', '2022-01-12 12:14:16', '2022-01-12 12:14:16'),
(6, 'cbebc232-142d-46bf-b578-75ce7de71fd5', 3, 4, '1840', '2000', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 17:19:41', '2022-01-12 12:19:41', '2022-01-12 12:19:41'),
(7, 'eb42501e-ef14-419f-803e-42d4b9c06ce2', 3, 5, '1840', '1600', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 18:11:20', '2022-01-12 13:11:20', '2022-01-12 13:11:20'),
(8, 'ca521913-09ec-45f1-99e9-90df7a29276d', 3, 6, '1840', '250', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 18:16:23', '2022-01-12 13:16:23', '2022-01-12 13:16:23'),
(9, 'feacbd9e-3d37-4ded-ab39-ca12c34f90c5', 3, NULL, '1807', '33', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-13 10:34:14', '2022-01-13 05:34:14', '2022-01-13 05:34:14'),
(10, 'f74b6214-c963-4858-a2ee-43a7729e8935', 3, 7, '1807', '1100', 2, 2, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-13 10:39:56', '2022-01-13 05:39:56', '2022-01-13 05:39:56'),
(18, '5c01cc7a-7060-4be9-bcce-98660deb28cc', 3, 1, '2743.1685484028', '172.71101429528', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-14 15:57:39', '2022-01-13 06:42:20', '2022-01-13 06:42:20'),
(19, '6abc7735-6222-4fad-ab59-8e4cf8fb4836', 3, 2, '2956.4261045157', '213.25755611285', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-14 16:04:01', '2022-01-13 06:42:20', '2022-01-13 06:42:20'),
(20, '644ed288-ca14-464f-8f46-056e3127d263', 3, 3, '3017.5185280339', '61.092423518155', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-14 17:14:17', '2022-01-13 06:42:20', '2022-01-13 06:42:20'),
(21, '429451e1-9e7a-4c16-a05b-f85c768cab5a', 3, 4, '3086.5339183617', '69.015390327784', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-14 17:19:41', '2022-01-13 06:42:20', '2022-01-13 06:42:20'),
(22, '39089efb-bc0c-48fb-9674-ccaa7b083d3a', 3, 5, '3141.7462306239', '55.212312262228', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-14 18:11:20', '2022-01-13 06:42:20', '2022-01-13 06:42:20'),
(23, '72119de3-98a9-44ad-95ea-4eb303a1af3d', 3, 6, '3150.3731544149', '8.6269237909731', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-14 18:16:23', '2022-01-13 06:42:20', '2022-01-13 06:42:20'),
(24, '9d08f2dd-5aa1-42e8-96ba-03d428ecb15b', 3, 7, '3161.160973822', '10.787819407054', 2, 2, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 10:39:56', '2022-01-13 06:42:20', '2022-01-13 06:42:20'),
(25, '9f307564-ecd9-407c-92fe-627361664966', 3, 7, '3171.9918733268', '10.830899504811', 2, 2, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-13 11:56:51', '2022-01-13 06:57:44', '2022-01-13 06:57:44'),
(26, 'c5172e86-3e59-4757-88fd-69fb1cd468a9', 3, 8, '3171.9918733268', '2000', 2, 2, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-14 12:23:45', '2022-01-14 07:23:45', '2022-01-14 07:23:45'),
(27, '0f66e304-71ab-4151-a3fe-0307963a8ea3', 3, NULL, '3100.9918733268', '71', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-14 12:32:11', '2022-01-14 07:32:11', '2022-01-14 07:32:11'),
(28, '25207b0b-ff36-423e-955d-c6ecdfe5ccaa', 3, NULL, '3100.99', '295.00', 1, 1, NULL, '2', '3', 1, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 17:09:30', '2022-01-17 12:09:30', '2022-01-17 12:09:30'),
(29, '877875ad-2481-413c-9b21-49bf3a68c4da', 3, NULL, '3100.99', '6982.00', 1, 1, NULL, '2', '3', 2, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 17:18:20', '2022-01-17 12:18:20', '2022-01-17 12:18:20'),
(30, '26171aee-522a-4cd0-b027-061fa2f727eb', 3, NULL, '3100.99', '6982.00', 1, 1, NULL, '2', '3', 3, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 17:29:14', '2022-01-17 12:29:14', '2022-01-17 12:29:14'),
(31, '50a5a8bf-28d7-44e1-806a-0fa7c3c25080', 3, NULL, '3100.99', '6982.00', 1, 1, NULL, '2', '3', 4, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 17:33:43', '2022-01-17 12:33:43', '2022-01-17 12:33:43'),
(32, '097667b5-4216-4db7-9d7f-9d0f6d0bddc1', 3, NULL, '3100.99', '6982.00', 1, 1, NULL, '2', '3', 5, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 17:42:55', '2022-01-17 12:42:55', '2022-01-17 12:42:55'),
(33, '4e1df122-c5c7-4a2e-8003-3901437168e2', 3, NULL, '3100.99', '6982.00', 1, 1, NULL, '2', '3', 6, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 17:57:25', '2022-01-17 12:57:25', '2022-01-17 12:57:25'),
(34, '0532811d-8674-4084-9763-9c093303d124', 3, NULL, '3100.99', '6982.00', 1, 1, NULL, '2', '3', 7, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 18:18:37', '2022-01-17 13:18:37', '2022-01-17 13:18:37'),
(35, '8f20c15c-5791-4f7b-891d-7e359dc6a8f0', 3, NULL, '3100.99', '1404.00', 1, 1, NULL, '2', '3', 8, NULL, NULL, NULL, 'NEW', NULL, '2022-01-17 18:23:58', '2022-01-17 13:23:58', '2022-01-17 13:23:58'),
(36, '85beb865-0bbc-488b-aa1e-319870dc8db4', 3, NULL, '3100.99', '2900.00', 2, 2, NULL, '2', '3', 9, NULL, NULL, NULL, 'NEW', NULL, '2022-01-18 11:21:48', '2022-01-18 06:21:48', '2022-01-18 06:21:48'),
(37, '46ba5ce7-ceb2-4f95-bee4-fcd52161441b', 3, NULL, '3100.99', '2900.00', 2, 2, NULL, '2', '3', 9, NULL, NULL, NULL, 'CANCELED', NULL, '2022-01-18 11:43:42', '2022-01-18 06:43:42', '2022-01-18 06:43:42'),
(38, '391393c5-195b-46a9-bd1b-ce16aaab974c', 3, NULL, '3100.99', '2900.00', 2, 2, NULL, '2', '3', 9, NULL, NULL, NULL, 'CANCELED', NULL, '2022-01-18 11:48:42', '2022-01-18 06:48:42', '2022-01-18 06:48:42'),
(39, 'd77f8211-1027-46b7-bf2a-6a710cf6c912', 3, NULL, '3100.99', '2900.00', 2, 2, NULL, '2', '3', 9, NULL, NULL, NULL, 'DELAYED', NULL, '2022-01-18 11:49:02', '2022-01-18 06:49:02', '2022-01-18 06:49:02'),
(42, 'beac9dcd-06d2-4370-823c-efe6bae1b04d', 3, NULL, '3100.99', '2900.00', 2, 2, NULL, '2', '3', 9, NULL, NULL, NULL, 'RESOLVED', NULL, '2022-01-18 12:01:23', '2022-01-18 07:01:23', '2022-01-18 07:01:23'),
(43, '0f8a852d-940c-4cea-b60d-709c5f486163', 3, 9, '3100.9918733268', '2900.00', 2, 2, NULL, '2', '3', NULL, NULL, NULL, NULL, 'Accepted', 1, '2022-01-18 12:05:48', '2022-01-18 07:05:48', '2022-01-18 07:05:48'),
(44, '304a6391-6552-45ab-91d6-cf011cd50d43', 3, NULL, '3100.99', '500.00', 2, 2, NULL, '2', '3', 10, NULL, NULL, NULL, 'NEW', NULL, '2022-01-18 12:21:35', '2022-01-18 07:21:35', '2022-01-18 07:21:35'),
(45, '0a491f87-d9e8-4e00-bf47-13c364f1bf69', 3, NULL, '3100.99', '500.00', 2, 2, NULL, '2', '3', 10, NULL, NULL, NULL, 'COMPLETED', NULL, '2022-01-18 12:22:19', '2022-01-18 07:22:19', '2022-01-18 07:22:19'),
(46, 'a35ac2f5-8986-404a-9ac3-488e59fa2489', 3, 10, '3100.9918733268', '500.00', 2, 2, NULL, '2', '3', 10, NULL, NULL, NULL, 'ACCEPTED', 1, '2022-01-18 12:23:36', '2022-01-18 07:23:36', '2022-01-18 07:23:37'),
(47, '713ce6cb-47b9-4538-9ae4-34e9e2c4e5ba', 3, NULL, '3100.99', '3616.00', 1, 1, NULL, '2', '1', NULL, NULL, NULL, NULL, 'FAILED', NULL, '2022-01-19 08:49:30', '2022-01-19 03:49:30', '2022-01-19 03:49:30'),
(48, '10daa95c-1688-4af4-89e6-ec6f61b5486e', 3, NULL, '3100.99', '3616.00', 1, 1, NULL, '2', '1', NULL, 2, NULL, NULL, 'PASSED', NULL, '2022-01-19 08:51:25', '2022-01-19 03:51:25', '2022-01-19 03:51:25'),
(49, '0ea5f587-e3b5-441a-a33f-47ca97ad8cd1', 3, NULL, '3100.99', '4342.00', 1, 1, NULL, '2', '1', NULL, NULL, NULL, NULL, 'FAILED', NULL, '2022-01-19 08:59:40', '2022-01-19 03:59:40', '2022-01-19 03:59:40'),
(50, '7a01d75f-d1ea-4327-895b-d6343fd05966', 3, NULL, '3100.99', '4342.00', 1, 1, NULL, '2', '1', NULL, NULL, NULL, NULL, 'FAILED', NULL, '2022-01-19 08:59:48', '2022-01-19 03:59:48', '2022-01-19 03:59:48'),
(51, '002a6098-17c6-4816-a6cd-fb446659d90e', 3, NULL, '3100.99', '4342.00', 1, 1, NULL, '2', '1', NULL, NULL, NULL, NULL, 'FAILED', NULL, '2022-01-19 09:02:54', '2022-01-19 04:02:54', '2022-01-19 04:02:54'),
(52, 'c7cad841-47a6-42a4-b5c6-6e27fe0a9c27', 3, NULL, '3100.99', '4342.00', 1, 1, NULL, '2', '1', NULL, 6, NULL, NULL, 'PASSED', NULL, '2022-01-19 09:03:07', '2022-01-19 04:03:07', '2022-01-19 04:03:07'),
(53, '6822f69a-bac1-4a1e-aca5-e1896758e0c9', 3, 11, '3100.9918733268', '3616.00', 1, 1, NULL, '2', '1', NULL, 2, NULL, NULL, 'ACCEPTED', 1, '2022-01-19 09:09:34', '2022-01-19 04:09:34', '2022-01-19 04:09:34'),
(54, '89f278df-ac75-48b3-9d28-ca1649a02adc', 3, NULL, '3100.99', '4930.00', 1, 1, NULL, '2', '1', NULL, 7, NULL, NULL, 'PASSED', NULL, '2022-01-19 09:31:28', '2022-01-19 04:31:28', '2022-01-19 04:31:28'),
(55, '920478f2-48b9-4900-b148-22e0a49a1463', 3, NULL, '3100.99', '250.00', 1, 1, NULL, '2', '1', NULL, 8, NULL, NULL, 'PASSED', NULL, '2022-01-19 09:33:07', '2022-01-19 04:33:07', '2022-01-19 04:33:07'),
(56, '959f407b-f02f-424e-8798-06fdc20fa39d', 3, NULL, '3100.99', '500.00', 1, 1, NULL, '2', '3', 11, NULL, NULL, NULL, 'NEW', NULL, '2022-01-19 12:11:18', '2022-01-19 07:11:18', '2022-01-19 07:11:18'),
(57, 'f7c53fee-46d4-4416-8c45-fcf9b53e7709', 3, NULL, '3100.99', '500.00', 1, 1, NULL, '2', '3', 11, NULL, NULL, NULL, 'CANCELED', NULL, '2022-01-19 12:23:18', '2022-01-19 07:23:18', '2022-01-19 07:23:18'),
(58, 'ae9541c0-3071-4aa3-a8ff-97887f2aaf70', 3, 12, '3100.9918733268', '500.00', 1, 1, NULL, '2', '3', 11, NULL, NULL, NULL, 'ACCEPTED', 1, '2022-01-19 14:48:21', '2022-01-19 09:48:21', '2022-01-19 09:48:21'),
(59, '75d7d284-85cd-4c51-b1bf-995a13e11841', 4, NULL, '0.00', '500.00', 1, 1, NULL, '2', '1', NULL, NULL, NULL, NULL, 'FAILED', NULL, '2022-01-19 15:58:12', '2022-01-19 10:58:12', '2022-01-19 10:58:12'),
(60, '07becd71-9e67-4181-bb0a-cf589504dc27', 4, NULL, '0.00', '500.00', 1, 1, NULL, '2', '1', NULL, 10, NULL, NULL, 'PASSED', NULL, '2022-01-19 15:58:22', '2022-01-19 10:58:22', '2022-01-19 10:58:22'),
(61, 'e5600289-f4a7-48c0-a2be-4b410849202f', 4, 13, '0', '500.00', 1, 1, NULL, '2', '1', NULL, 10, NULL, NULL, 'ACCEPTED', 1, '2022-01-19 16:14:03', '2022-01-19 11:14:03', '2022-01-19 11:14:03'),
(62, 'c78628c1-df11-4c11-809b-ed083d0b4641', 3, NULL, '20', '20', NULL, NULL, NULL, '3', '4', NULL, NULL, 61, NULL, NULL, NULL, '2022-01-19 16:14:03', '2022-01-19 11:14:03', '2022-01-19 11:14:03'),
(63, '7726aa39-e627-4d5a-8221-a6ca375f9d19', 4, 14, '0', '500', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-19 16:26:39', '2022-01-19 11:26:39', '2022-01-19 11:26:39'),
(64, '540c90d4-35be-477c-9c67-9a97ca95d595', 3, NULL, '20', '20', NULL, NULL, NULL, '3', '4', NULL, NULL, 63, NULL, NULL, NULL, '2022-01-19 16:26:39', '2022-01-19 11:26:39', '2022-01-19 11:26:39'),
(65, 'e84bcb0d-ab21-4d46-9879-5ccd97ed68ee', 3, NULL, '3100.99', '250.00', 1, 1, NULL, '2', '1', NULL, NULL, NULL, NULL, 'FAILED', NULL, '2022-01-25 07:53:43', '2022-01-25 02:53:43', '2022-01-25 02:53:43'),
(66, '4699d75a-4314-4748-bba9-93123a74d324', 3, NULL, '3100.99', '250.00', 1, 1, NULL, '2', '1', NULL, 12, NULL, NULL, 'PASSED', NULL, '2022-01-25 07:53:52', '2022-01-25 02:53:52', '2022-01-25 02:53:52'),
(67, 'd12461c8-0dbe-4ee8-a456-874a62e98b60', 3, 15, '3100.9918733268', '250.00', 1, 1, NULL, '2', '1', NULL, 12, NULL, NULL, 'ACCEPTED', 1, '2022-01-25 07:57:44', '2022-01-25 02:57:44', '2022-01-25 02:57:44'),
(68, 'da04bdf1-f405-4731-9477-874fe85bd45f', 3, NULL, '3100.99', '250.00', 1, 1, NULL, '2', '3', 12, NULL, NULL, NULL, 'NEW', NULL, '2022-01-25 08:01:18', '2022-01-25 03:01:18', '2022-01-25 03:01:18'),
(69, '5d3ae7ca-b0a7-4f07-9a46-f78da72aea5d', 3, NULL, '3100.99', '250.00', 1, 1, NULL, '2', '3', 12, NULL, NULL, NULL, 'CONFIRMED', NULL, '2022-01-25 08:04:56', '2022-01-25 03:04:56', '2022-01-25 03:04:56'),
(70, '5419d4fc-9566-4671-a015-13b1e7074496', 3, NULL, '3100.99', '250.00', 1, 1, NULL, '2', '3', 13, NULL, NULL, NULL, 'NEW', NULL, '2022-01-25 08:07:34', '2022-01-25 03:07:34', '2022-01-25 03:07:34'),
(71, 'a1c255e4-83f6-4294-81e4-3e546c4b2df6', 3, 16, '3100.9918733268', '250.00', 1, 1, NULL, '2', '3', 12, NULL, NULL, NULL, 'ACCEPTED', 1, '2022-01-25 08:09:17', '2022-01-25 03:09:17', '2022-01-25 03:09:17'),
(72, 'be7247f8-5c47-43d1-a51e-af58d9f3dfce', 3, 1, '3224.5610180344', '123.56914470762', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 15:57:39', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(73, '18616e6e-4eeb-44c1-93a4-745ce134c104', 3, 2, '3377.139902009', '152.57888397465', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 16:04:01', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(74, 'ad74e625-f255-4cf4-bc4a-5016056cc623', 3, 3, '3420.849555114', '43.70965310497', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 17:14:17', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(75, '28941518-b9d4-42f3-9d53-9faeec680ca9', 3, 4, '3470.2278347174', '49.378279603446', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 17:19:41', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(76, '9b49fb8c-6807-4261-9621-7b2a562900c0', 3, 5, '3509.7304584002', '39.502623682757', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 18:11:20', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(77, 'ea9cf69a-0ec5-483f-a9ae-2e7153171848', 3, 6, '3515.9027433506', '6.1722849504307', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 18:16:23', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(78, 'af8d7cce-2766-4b5c-982c-469bc4901f6c', 3, 7, '3523.6242747705', '7.7215314199005', 2, 2, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-14 11:56:51', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(79, '2d71adda-9ee2-45e3-be44-f38365286f82', 3, 8, '3537.6634228067', '14.039148036183', 2, 2, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 12:23:45', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(80, '605b920e-f1f2-44b6-b794-9e514c2d3ed5', 3, 9, '3558.0201874592', '20.356764652465', 2, 2, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-19 12:05:48', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(81, '9045d0dd-9ca0-4a38-b6ce-308fb616ccf7', 3, 10, '3561.5299744682', '3.5097870090457', 2, 2, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-19 12:23:36', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(82, '3b3667e0-2a89-4b33-90aa-3f46c1723fbd', 3, 11, '3650.8059039912', '89.27592952303', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-20 09:09:34', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(83, '64a2b89b-6e84-4e88-b603-5c107bf425c2', 3, 12, '3663.1504738921', '12.344569900861', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-20 14:48:21', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(84, '6beed0b5-0a22-4321-a15e-95805fe4b63c', 4, 13, '12.344569900861', '12.344569900861', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-20 16:14:03', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(85, '729862b3-95f2-43af-abd1-93b96495e33b', 4, 14, '24.689139801722', '12.344569900861', 1, 1, NULL, '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-20 16:26:39', '2022-01-25 03:19:25', '2022-01-25 03:19:25'),
(86, '41a27725-00ce-40e3-becf-9f7e64cb6281', 3, NULL, '3663.15', '250.00', 1, 1, NULL, '2', '1', NULL, 13, NULL, NULL, 'PASSED', NULL, '2022-01-26 09:24:15', '2022-01-26 04:24:15', '2022-01-26 04:24:15'),
(87, 'bda8115c-f201-465b-815e-f6734bea7bbf', 3, NULL, '3663.15', '1212.00', 1, 1, NULL, '2', '1', NULL, 14, NULL, NULL, 'PASSED', NULL, '2022-01-26 10:03:09', '2022-01-26 05:03:09', '2022-01-26 05:03:09'),
(88, '287331ba-8b97-47e7-a53e-c51d26d9420e', 3, NULL, '3663.15', '250.00', 1, 1, NULL, '2', '1', NULL, 15, NULL, NULL, 'PASSED', NULL, '2022-01-26 10:04:54', '2022-01-26 05:04:54', '2022-01-26 05:04:54'),
(89, '796c5861-3202-4b5c-b0c8-da7c17c689df', 3, NULL, '3663.15', '571.00', 1, 1, NULL, '2', '1', NULL, 16, NULL, NULL, 'PASSED', NULL, '2022-01-26 10:20:03', '2022-01-26 05:20:03', '2022-01-26 05:20:03'),
(90, 'c14b0bc0-856e-4690-84b5-7fe56e628c2f', 3, NULL, '3663.15', '2494.00', 1, 1, NULL, '2', '1', NULL, 17, NULL, NULL, 'PASSED', NULL, '2022-01-26 10:21:14', '2022-01-26 05:21:14', '2022-01-26 05:21:14'),
(91, 'f0e07971-263b-4f1f-8c48-7b42f780b8ee', 3, 1, '3794.5890352461', '131.43856135399', 1, 1, '0.00342997', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 15:57:39', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(92, 'cda1350a-2184-4ce0-b83d-aad8e09b41aa', 3, 2, '3956.8848013136', '162.29576606746', 1, 1, '0.00423521', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 16:04:01', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(93, '9a2afc39-ceb3-4364-ad7b-09bc4aaf0007', 3, 3, '4003.3780738453', '46.493272531688', 1, 1, '0.00121327', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:14:17', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(94, 'bde630b7-a607-46ec-b69c-18ea1a833720', 3, 4, '4055.9009754853', '52.522901639955', 1, 1, '0.00137062', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:19:41', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(95, 'ebd98b2c-c5d5-40b4-a395-19274f362482', 3, 5, '4097.9192967973', '42.018321311964', 1, 1, '0.00109649', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 18:11:20', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(96, '63773a83-25d3-4231-a553-3c245b7bd1e6', 3, 6, '4104.4846595023', '6.5653627049943', 1, 1, '0.00017133', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 18:16:23', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(97, '588f9c7a-e930-407c-b627-06ca2a7ba072', 3, 7, '4112.3684563095', '7.8837968071523', 2, 2, '0.00298186', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 11:56:51', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(98, 'a3a1ccd4-a900-4d3a-a1e0-3c39a2da4676', 3, 8, '4126.7026323225', '14.334176013004', 2, 2, '0.00542156', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 12:23:45', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(99, '42718d3f-abc2-4e91-bb56-7886fa67673b', 3, 9, '4147.4871875414', '20.784555218856', 2, 2, '0.00786126', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-20 12:05:48', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(100, 'dd6eed66-6fe7-4f6f-a293-ce69b44dcf79', 3, 10, '4151.0707315447', '3.5835440032511', 2, 2, '0.00135539', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-20 12:23:36', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(101, 'e37bd64c-d893-4b03-ae57-a745ef7cbd8f', 3, 11, '4246.0321377097', '94.961406165038', 1, 1, '0.00247808', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-21 09:09:34', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(102, 'eee892ef-f4b0-4cb8-9720-09359042004f', 3, 12, '4259.1628631197', '13.130725409989', 1, 1, '0.00034265', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-21 14:48:21', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(103, 'e7b8664d-1d95-4907-bd92-b937af4287a3', 4, 13, '37.819865211711', '13.130725409989', 1, 1, '0.00034265', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-21 16:14:03', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(104, 'b12d86ab-70d5-4b55-a291-c6d1770891ea', 4, 14, '50.9505906217', '13.130725409989', 1, 1, '0.00034265', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-21 16:26:39', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(105, 'cbc51928-21f3-486e-bd76-2439b2c8b14d', 3, 15, '4265.7282258247', '6.5653627049943', 1, 1, '0.00017133', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:57:44', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(106, 'c29e3764-1601-4f7d-8913-e96e4dca474d', 3, 16, '4272.2935885297', '6.5653627049943', 1, 1, '0.00017133', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 08:09:17', '2022-01-26 06:16:10', '2022-01-26 06:16:10'),
(107, '063b3ad5-baf9-4dc2-90f2-a5b6f45287cc', 3, NULL, '4237.2935885297', '35', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, 7, NULL, 1, '2022-01-27 18:59:06', '2022-01-27 13:59:06', '2022-01-27 13:59:06'),
(108, '919dfa53-a82d-4e64-9189-7ad8775b53e5', 3, NULL, '4092.2935885297', '145', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, 10, NULL, 1, '2022-01-28 03:58:17', '2022-01-27 22:58:17', '2022-01-27 22:58:17'),
(109, 'aeade223-e633-4213-a8d3-f2b6b3251117', 3, NULL, '3892.2935885297', '200', NULL, NULL, NULL, '1', '3', NULL, NULL, NULL, 11, NULL, 1, '2022-01-28 03:58:27', '2022-01-27 22:58:27', '2022-01-27 22:58:27'),
(110, 'ca236843-65b1-4e3d-aa49-a0c45cda62a6', 3, NULL, '3848.2935885297', '44', NULL, NULL, NULL, '1', '3', NULL, NULL, NULL, 8, NULL, 1, '2022-01-28 03:58:38', '2022-01-27 22:58:38', '2022-01-27 22:58:38'),
(111, '85416daa-5eb4-4cd2-8720-1e6bb68b3b77', 5, 17, '0', '2000', 1, 1, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-28 04:07:37', '2022-01-27 23:07:37', '2022-01-27 23:07:37'),
(112, '051e9ea0-3879-44fd-9f50-9c840bf65bff', 3, NULL, '80', '80', NULL, NULL, NULL, '3', '4', NULL, NULL, 111, NULL, NULL, NULL, '2022-01-28 04:07:38', '2022-01-27 23:07:38', '2022-01-27 23:07:38'),
(113, '60985517-5d00-46fd-b275-3970ce5f5a28', 3, NULL, '3648.2935885297', '200', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, 14, NULL, 1, '2022-01-31 17:20:54', '2022-01-31 12:20:54', '2022-01-31 12:20:54'),
(114, 'e6c9a4cc-0902-425f-9746-826315869b89', 3, NULL, '3448.2935885297', '200', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, 14, NULL, 1, '2022-01-31 17:21:45', '2022-01-31 12:21:45', '2022-01-31 12:21:45'),
(115, '3186a807-f6ff-454c-94c8-39077032e1be', 3, NULL, '3418.2935885297', '30', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, 13, NULL, 1, '2022-01-31 17:21:53', '2022-01-31 12:21:53', '2022-01-31 12:21:53'),
(116, 'db623b83-2716-4de7-86a6-1f7826ae95bd', 6, NULL, '0.00', '250.00', 1, 1, NULL, '2', '3', 14, NULL, NULL, NULL, 'NEW', NULL, '2022-02-16 05:09:10', '2022-02-16 00:09:10', '2022-02-16 00:09:10'),
(117, '42e3694c-9547-466d-b46d-a3d772d5e542', 6, NULL, '0.00', '250.00', 1, 1, NULL, '2', '3', 15, NULL, NULL, NULL, 'NEW', NULL, '2022-02-16 05:12:00', '2022-02-16 00:12:00', '2022-02-16 00:12:00'),
(118, 'e8796eac-b872-434e-8d21-bfce45009dbd', 3, NULL, '3418.29', '1411.00', 1, 1, NULL, '2', '3', 16, NULL, NULL, NULL, 'NEW', NULL, '2022-02-27 14:08:24', '2022-02-27 09:08:24', '2022-02-27 09:08:24'),
(119, 'daf2154a-fbf6-486c-b505-b702a28b2d48', 11, NULL, '0.00', '5077.00', 1, 1, NULL, '2', '1', NULL, NULL, NULL, NULL, 'FAILED', NULL, '2022-03-22 09:41:21', '2022-03-22 04:41:21', '2022-03-22 04:41:21'),
(120, '1843609d-9aaf-4ee2-8ada-930076635ce9', 11, NULL, '0.00', '5077.00', 1, 1, NULL, '2', '1', NULL, 19, NULL, NULL, 'PASSED', NULL, '2022-03-22 09:45:35', '2022-03-22 04:45:35', '2022-03-22 04:45:35'),
(121, '638e00a6-64e7-4b8f-8b4b-19a17542d3da', 12, NULL, '0.00', '250.00', 1, 1, NULL, '2', '1', NULL, 20, NULL, NULL, 'PASSED', NULL, '2022-03-22 09:47:38', '2022-03-22 04:47:38', '2022-03-22 04:47:38'),
(122, 'dc830736-61c6-40fb-9a95-d8ce974ffd68', 3, NULL, '3395.2935885297', '23', NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, 15, NULL, 1, '2024-01-10 14:29:57', '2024-01-10 09:29:57', '2024-01-10 09:29:57'),
(123, '4b5b7b10-0031-4f9e-b5a2-de8f8965248f', 3, NULL, '3195.2935885297', '200', NULL, NULL, NULL, '1', '3', NULL, NULL, NULL, 12, NULL, 1, '2024-01-10 14:30:02', '2024-01-10 09:30:02', '2024-01-10 09:30:02'),
(124, 'fce2bbc9-0ae9-47f5-b7cc-f7aacfd4bcad', 3, NULL, '3195.29', '250.00', 1, 1, NULL, '2', '1', NULL, 21, NULL, NULL, 'PASSED', NULL, '2024-01-10 15:32:56', '2024-01-10 10:32:56', '2024-01-10 10:32:56'),
(125, 'f0d7b75e-97c1-4198-8d12-82726a749350', 3, NULL, '3195.29', '250.00', 1, 1, NULL, '2', '1', NULL, 22, NULL, NULL, 'PASSED', NULL, '2024-01-11 14:50:20', '2024-01-11 09:50:20', '2024-01-11 09:50:20'),
(126, 'a4e2f348-82e5-4bd7-877f-4884f3e0b39c', 3, NULL, '3195.29', '250.00', 1, 1, NULL, '2', '1', NULL, 23, NULL, NULL, 'PASSED', NULL, '2024-01-11 14:52:54', '2024-01-11 09:52:54', '2024-01-11 09:52:54'),
(127, '5378af27-8a36-4f6c-9d74-d04d5e58671e', 3, NULL, '3195.29', '250.00', 2, 2, NULL, '2', '1', NULL, 24, NULL, NULL, 'PASSED', NULL, '2024-01-11 14:55:01', '2024-01-11 09:55:01', '2024-01-11 09:55:01'),
(128, '5c361494-b4ff-496f-b1f5-b9cf0d96b52f', 3, NULL, '3195.29', '250.00', 1, 1, NULL, '2', '1', NULL, 25, NULL, NULL, 'PASSED', NULL, '2024-01-11 14:57:59', '2024-01-11 09:57:59', '2024-01-11 09:57:59'),
(129, '9ea208ce-58e6-460f-9dd4-ec577482e179', 3, NULL, '3195.29', '250.00', 1, 1, NULL, '2', '1', NULL, 26, NULL, NULL, 'PASSED', NULL, '2024-01-11 15:03:38', '2024-01-11 10:03:38', '2024-01-11 10:03:38'),
(130, '79391aa8-76fe-489d-91e4-4f970ef5627e', 3, NULL, '3195.29', '250.00', 1, 1, NULL, '2', '3', 17, NULL, NULL, NULL, 'NEW', NULL, '2024-01-11 15:04:05', '2024-01-11 10:04:05', '2024-01-11 10:04:05');

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
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(30, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(31, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(32, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(33, '2016_06_01_000004_create_oauth_clients_table', 1),
(34, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2020_11_25_123649_create_sessions_table', 1),
(38, '2021_12_28_210154_create_roles_table', 1),
(39, '2021_12_28_210953_create_email_histories_table', 1),
(40, '2021_12_28_211838_create_settings_table', 1),
(41, '2021_12_28_231347_create_jobs_table', 1),
(42, '2022_01_04_083236_add_power_fields_in_settings', 1),
(43, '2022_01_06_141504_add_settings_for_hashings', 1),
(44, '2022_01_11_161346_add_min_max_energy_in_settings', 1),
(45, '2022_01_11_210037_create_payments_table', 1),
(46, '2022_01_11_210048_create_wallets_table', 1),
(47, '2022_01_11_210112_create_ledgers_table', 1),
(48, '2022_01_11_210156_create_hashings_table', 1),
(49, '2022_01_11_210227_add_referred_by_column_in_users', 1),
(50, '2022_01_11_211231_create_deposit_requests_table', 1),
(51, '2022_01_11_211252_create_withdraw_requests_table', 1),
(52, '2022_01_12_134821_addd_bank_columns', 1),
(53, '2022_01_12_165442_add_energy_bought_column_in_tables', 2),
(54, '2022_01_12_181247_add_last_wallet_updated_in_payments', 3),
(55, '2022_01_17_162114_add_coinbase_columns_in_payment', 4),
(56, '2022_01_17_162220_create_coinbase_payments_table', 4),
(57, '2022_01_17_162716_add_coinbase_status_in_ledgers', 5),
(58, '2022_01_17_163614_add_user_id_in_coinbase_payments', 6),
(59, '2022_01_18_084711_create_coinbase_webhooks_table', 7),
(60, '2022_01_18_084810_add_payment_type_in_deposit_requests', 7),
(61, '2022_01_18_093613_add_payment_method_for_old_deposit_requests', 8),
(63, '2022_01_18_094559_change_payment_method_in_ledgers', 9),
(65, '2022_01_18_095300_add_energy_bought_in_coinbase_payments', 10),
(66, '2022_01_18_115432_add_coinbase_payment_id_in_deposit_requests', 11),
(67, '2022_01_19_064636_change_coinbase_timeline_status_in_ledgers', 12),
(68, '2022_01_19_065241_create_stripe_payments_table', 13),
(69, '2022_01_19_065614_add_stripe_payment_id_in_ledgers', 13),
(70, '2022_01_19_070103_drop_extra_columns_from_payments', 14),
(71, '2022_01_19_072429_add_stripe_customer_id_in_users', 15),
(72, '2022_01_19_073924_add_is_failed_in_stripe_payments', 16),
(73, '2022_01_19_161241_add_reference_ledger_id_in_ledgers', 17),
(74, '2022_01_26_080935_create_coin_data_table', 18),
(75, '2022_01_26_084450_fill_coin_data', 19),
(76, '2022_01_26_091125_add_stipe_full_name_in_users', 20),
(77, '2022_01_26_110528_add_coin_value_in_ledger', 21),
(78, '2022_01_27_041455_create_user_banks_table', 22),
(79, '2022_01_27_041525_create_user_cryptos_table', 22),
(80, '2022_01_27_041557_create_crypto_accounts_table', 22),
(81, '2022_01_27_044610_create_crypto_options_table', 23),
(82, '2022_01_27_132104_add_table_columns_in_withdraw_requests', 24),
(83, '2022_01_27_185723_add_withdraw_requests_in_ledgers', 25),
(84, '2022_01_31_162440_add_vat_in_settings', 26),
(85, '2022_01_31_171847_add_vat_in_withdraw_requests_after_amount_withdraw_in_withdraw_requests', 27),
(86, '2022_02_02_125759_create_user_codes_table', 28),
(87, '2022_02_02_131117_add_2fa_code_in_users', 29),
(88, '2022_02_23_092519_addd_mail_chimp_columns_in_users', 30),
(89, '2024_01_10_150633_truncate_coin_data', 31),
(90, '2024_01_11_130202_add_locale_in_users', 32),
(91, '2024_01_20_132738_merge_hasings_and_coins_in_hashings', 33),
(92, '2024_01_20_151428_drop_settin_columns_extras', 34),
(93, '2024_01_20_151739_add_coin_data_in_in_table', 35),
(94, '2024_01_20_163447_add_api_columns_in_coin_data', 36),
(95, '2024_01_20_164539_add_coin_display_name_in_coin_data', 37);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@folex.com', '$2y$10$sP/nV7suDVLY4L3DKlvsPuFodusvVLh926awWY8gLeoe1EAvqMCMy', '2022-02-28 05:04:15'),
('super@folex.com', '$2y$10$z16QUbm3TgKP21kFuZnqP.Pf2vUzo4Oty94hw50L0THXL406zU.le', '2022-03-14 03:02:41'),
('user@folex.com', '$2y$10$2VgfwgvjQjbod6oyqYPiouqaW3uFmFpXpSy78OG81BPkGCYGw22mq', '2024-01-10 10:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `request_id` bigint(20) DEFAULT NULL COMMENT 'if deposit request',
  `hashing_id` int(11) DEFAULT NULL,
  `coin_data_id` bigint(20) DEFAULT NULL,
  `last_wallet_updated` datetime DEFAULT NULL,
  `energy_bought` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=card,2=bank,3=coin',
  `coinbase_payment_id` bigint(20) DEFAULT NULL,
  `stripe_payment_id` bigint(20) DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_deposit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_payment` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `public_id`, `user_id`, `request_id`, `hashing_id`, `coin_data_id`, `last_wallet_updated`, `energy_bought`, `payment_method`, `coinbase_payment_id`, `stripe_payment_id`, `payment_type`, `amount_deposit`, `payment_notes`, `auto_payment`, `created_at`, `updated_at`) VALUES
(1, 'a10b9c72-853b-48aa-914e-0b29d6d721ff', 3, 1, 1, 1, '2022-01-16 15:57:39', '1001', '2', NULL, NULL, 'Deposit', '5005', 'sdsdsd', 0, '2022-01-12 10:57:39', '2022-01-26 06:16:10'),
(2, 'b09f95ec-4e76-4b4f-83f6-21facec85f13', 3, 2, 1, 1, '2022-01-16 16:04:01', '1236', '2', NULL, NULL, 'Deposit', '6180', 'fdg fdgfdg fddfg  f fd fdgd fg dfg gfd fdg dfg dfg gfd gfd', 0, '2022-01-12 11:04:01', '2022-01-26 06:16:10'),
(3, '1fbe7261-7da7-4cd0-8c57-ea247ca806fc', 3, 3, 1, 1, '2022-01-16 17:14:17', '354.08', '2', NULL, NULL, 'Deposit', '1770.4', 'dfdf dddf', 0, '2022-01-12 12:14:17', '2022-01-26 06:16:10'),
(4, '4c02941b-2c07-4705-8bc4-5becaad46d1f', 3, 4, 1, 1, '2022-01-16 17:19:41', '400', '2', NULL, NULL, 'Deposit', '2000', 'dfs sfdsfsd fds dsfsd', 0, '2022-01-12 12:19:41', '2022-01-26 06:16:10'),
(5, '5c85e086-2315-4b29-a5e9-10d37e6f0308', 3, 6, 1, 1, '2022-01-16 18:11:20', '320', '2', NULL, NULL, 'Deposit', '1600', 'fsdfdsf', 0, '2022-01-12 13:11:20', '2022-01-26 06:16:10'),
(6, 'd20892e1-2d17-440f-9f6a-9e525320e7e9', 3, 7, 1, 1, '2022-01-16 18:16:23', '50', '2', NULL, NULL, 'Deposit', '250', 'sdsdsdsdsddf', 0, '2022-01-12 13:16:23', '2022-01-26 06:16:10'),
(7, '42ace235-4fdf-4ff1-bb34-90db2fd69a25', 3, 8, 2, 2, '2022-01-15 11:56:51', '220', '2', NULL, NULL, 'Deposit', '1100', 'bvchg hg jhj jh jh jg jg', 0, '2022-01-13 05:39:56', '2022-01-26 06:16:10'),
(8, 'efce8c8f-ad3c-40c1-8044-8e07cec8ca94', 3, 9, 2, 2, '2022-01-16 12:23:45', '400', '2', NULL, NULL, 'Deposit', '2000', 'Some additional info for david', 0, '2022-01-14 07:23:45', '2022-01-26 06:16:10'),
(9, 'd5b03f88-9b3c-498d-aece-209d234ab95e', 3, 12, 2, 2, '2022-01-20 12:05:48', '580', '3', NULL, NULL, 'Deposit', '2900.00', '', 0, '2022-01-18 07:05:48', '2022-01-26 06:16:10'),
(10, 'ca10316a-6508-4438-b5e1-f5f2f02e9306', 3, 13, 2, 2, '2022-01-20 12:23:36', '100', '3', NULL, NULL, 'Deposit', '500.00', '', 0, '2022-01-18 07:23:36', '2022-01-26 06:16:10'),
(11, 'edc3d8c5-670a-4334-bbab-d60e88f75528', 3, 14, 1, 1, '2022-01-21 09:09:34', '723.2', '1', NULL, 2, 'Deposit', '3616.00', '', 0, '2022-01-19 04:09:34', '2022-01-26 06:16:10'),
(12, '92389049-a147-4113-a69a-140b8aa2e547', 3, 18, 1, 1, '2022-01-21 14:48:21', '100', '3', 11, NULL, 'Deposit', '500.00', '', 0, '2022-01-19 09:48:21', '2022-01-26 06:16:10'),
(13, '8962232c-7895-40f4-80f7-4fb5dbefe800', 4, 19, 1, 1, '2022-01-21 16:14:03', '100', '1', NULL, 10, 'Deposit', '500.00', '', 0, '2022-01-19 11:14:03', '2022-01-26 06:16:10'),
(14, 'a9a91f97-0632-4d7f-963a-160f1141d779', 4, 20, 1, 1, '2022-01-21 16:26:39', '100', '2', NULL, NULL, 'Deposit', '500', 'sdsdsdd', 0, '2022-01-19 11:26:39', '2022-01-26 06:16:10'),
(15, 'f7cc89ae-bb72-4280-b272-39ac65fee3a3', 3, 21, 1, 1, '2022-01-26 07:57:44', '50', '1', NULL, 12, 'Deposit', '250.00', '', 0, '2022-01-25 02:57:44', '2022-01-26 06:16:10'),
(16, '9e9072b1-5154-4075-96c8-e794d7da401d', 3, 22, 1, 1, '2022-01-26 08:09:17', '50', '3', 12, NULL, 'Deposit', '250.00', '', 0, '2022-01-25 03:09:17', '2022-01-26 06:16:10'),
(17, 'd2fe86d6-76c0-46bc-ab23-f60a169f15e8', 5, 28, 1, 1, '2022-01-28 04:07:37', '400', '2', NULL, NULL, 'Deposit', '2000', 'bla bla bla', 0, '2022-01-27 23:07:37', '2022-01-27 23:07:37');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', NULL, NULL),
(2, 'admin', NULL, NULL),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2uvCnKXwY0heIHI6NDEDrEDqWR4dbZ5P1kGJQTyu', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiS2ptOUZRNmZuVG8waVBtYXNGN0p6bFAydFA0b29SNTM3RWtqQWhGUiI7czo2OiJsb2NhbGUiO3M6MjoiZW4iO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vbG9jYWxob3N0Ojg4L2ZvbGV4L3B1YmxpYy9oYXNoaW5nLXNldHRpbmdzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHZzR3ZOOGFDMkRma25XRWh0elZ0NC5MNUVZaGg4Y0xCdDFsVDVNVS5VNjNwcFhXeVVBWFVxIjt9', 1707300371),
('VgTfSiOqjm93dCU5hD2DzWCRJNmaBl07sIruluxP', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTGJuUWpQQ1Z3UjA1TTRIVFFiQnBvMTd0Ym9iVDd3Y0luMncxV2s3OSI7czo2OiJsb2NhbGUiO3M6MjoiZW4iO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0Ojg4L2ZvbGV4L3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR2c0d2TjhhQzJEZmtuV0VodHpWdDQuTDVFWWhoOGNMQnQxbFQ1TVUuVTYzcHBYV3lVQVhVcSI7fQ==', 1707154240);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '21',
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_bic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_logo`, `vat`, `site_name`, `account_number`, `swift_bic`, `created_at`, `updated_at`) VALUES
(1, '', '21', 'Folex Mining', '1212121212', 'fdsfdsfdsfds', NULL, '2022-01-31 11:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_payments`
--

CREATE TABLE `stripe_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `is_failed` tinyint(1) NOT NULL DEFAULT 0,
  `hashing_id` int(11) DEFAULT NULL,
  `coin_data_id` bigint(20) DEFAULT NULL,
  `energy_bought` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_tranfered_to` bigint(20) DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_deposit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_payments`
--

INSERT INTO `stripe_payments` (`id`, `public_id`, `user_id`, `is_failed`, `hashing_id`, `coin_data_id`, `energy_bought`, `card_data`, `payment_tranfered_to`, `temp_id`, `customer_profile_id`, `payment_profile_id`, `transaction_id`, `last4`, `amount_deposit`, `payment_notes`, `created_at`, `updated_at`) VALUES
(1, '28dd5a87-8521-44c9-9ad5-3255a2705916', 3, 1, 1, 1, '723.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3616.00', NULL, '2022-01-19 03:49:30', '2022-01-19 03:49:30'),
(2, 'b1f6845d-75bf-498f-91e4-6f26406e2772', 3, 0, 1, 1, '723.2', 'card_1KJfVNDwtJGDsyYFN27LUqJ4', NULL, NULL, 'cus_KzenCLjW4uSchk', NULL, 'ch_3KJfVQDwtJGDsyYF0ocgoO2f', '1111', '3616.00', NULL, '2022-01-19 03:51:25', '2022-01-19 03:51:25'),
(3, '0b7372f4-11fe-4067-a46d-72a22928d506', 3, 1, 1, 1, '868.4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4342.00', NULL, '2022-01-19 03:59:40', '2022-01-19 03:59:40'),
(4, '68c19b78-ed85-41a7-b974-acd08e7691ad', 3, 1, 1, 1, '868.4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4342.00', NULL, '2022-01-19 03:59:48', '2022-01-19 03:59:48'),
(5, '0a237009-d029-4206-a136-67755641cf3a', 3, 1, 1, 1, '868.4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4342.00', NULL, '2022-01-19 04:02:54', '2022-01-19 04:02:54'),
(6, '23373c45-a8a3-4533-ae38-239ee33cf704', 3, 0, 1, 1, '868.4', 'card_1KJfghIXT7Bu6buNGjzAcKDw', NULL, NULL, 'cus_Kzf0D8uC43Rvuy', NULL, 'ch_3KJfgkIXT7Bu6buN2mAwNLLM', '1111', '4342.00', NULL, '2022-01-19 04:03:07', '2022-01-19 04:03:07'),
(7, '14d6ea7e-7d21-430d-b1bb-02094eab54a1', 3, 0, 1, 1, '986', 'card_1KJfghIXT7Bu6buNGjzAcKDw', NULL, NULL, 'cus_Kzf0D8uC43Rvuy', NULL, 'ch_3KJg8BIXT7Bu6buN2pKVZVU2', '1111', '4930.00', NULL, '2022-01-19 04:31:28', '2022-01-19 04:31:28'),
(8, 'efd872dc-21f3-4a72-8c5b-3d61c4732b16', 3, 0, 1, 1, '50', 'card_1KJg9MIXT7Bu6buNsyjKLH1U', NULL, NULL, 'cus_Kzf0D8uC43Rvuy', NULL, 'ch_3KJg9lIXT7Bu6buN1uHJkSeU', '4444', '250.00', NULL, '2022-01-19 04:33:07', '2022-01-19 04:33:07'),
(9, 'ed7132c1-874b-4f90-83c9-a410563cd5c6', 4, 1, 1, 1, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500.00', NULL, '2022-01-19 10:58:12', '2022-01-19 10:58:12'),
(10, 'c31dc45a-89df-4b14-ae76-7dc2a70202ee', 4, 0, 1, 1, '100', 'card_1KJmAXIXT7Bu6buN8kMuDqrM', NULL, NULL, 'cus_Kzlhk6sXvGMU8L', NULL, 'ch_3KJmAaIXT7Bu6buN24soz7dE', '1111', '500.00', NULL, '2022-01-19 10:58:22', '2022-01-19 10:58:22'),
(11, '80d635c3-e83a-4226-bed3-d16befb49f57', 3, 1, 1, 1, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250.00', NULL, '2022-01-25 02:53:43', '2022-01-25 02:53:43'),
(12, '195f9891-f311-4217-b2aa-3041c1e6f66c', 3, 0, 1, 1, '50', 'card_1KLpSzIXT7Bu6buNMtT8tfsa', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'ch_3KLpT2IXT7Bu6buN16TGBUGE', '1111', '250.00', NULL, '2022-01-25 02:53:52', '2022-01-25 02:53:52'),
(13, 'f42290ad-a5c0-4934-823a-c69f1cf8cef5', 3, 0, 1, 1, '50', 'card_1KMDLzIXT7Bu6buNZOKkQ3Au', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'ch_3KMDM2IXT7Bu6buN0gOJkKNW', '1111', '250.00', NULL, '2022-01-26 04:24:15', '2022-01-26 04:24:15'),
(14, '27877490-4337-453e-ad35-4ec7a42fe268', 3, 0, 1, 1, '242.4', 'card_1KMDxdIXT7Bu6buNu9jEgvIm', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'ch_3KMDxgIXT7Bu6buN2R3jX03F', '1111', '1212.00', NULL, '2022-01-26 05:03:09', '2022-01-26 05:03:09'),
(15, 'd11399f8-5cc3-4ad4-87dd-1ddc6a9e7e2e', 3, 0, 1, 1, '50', 'card_1KMDzKIXT7Bu6buNaRnCEFuO', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'ch_3KMDzNIXT7Bu6buN2zFZAQ0N', '1111', '250.00', NULL, '2022-01-26 05:04:54', '2022-01-26 05:04:54'),
(16, 'cc75dc8d-3929-468a-84b8-7164b0aaf133', 3, 0, 1, 1, '114.2', 'card_1KMEDyIXT7Bu6buNVAkQDVuQ', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'ch_3KMEE1IXT7Bu6buN19sSPGSc', '1111', '571.00', NULL, '2022-01-26 05:20:03', '2022-01-26 05:20:03'),
(17, '67290e90-4bc4-4525-ad53-23f8aeed5ca9', 3, 0, 1, 1, '498.8', 'card_1KMEDyIXT7Bu6buNVAkQDVuQ', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'ch_3KMEFAIXT7Bu6buN2buFVHwH', '1111', '2494.00', NULL, '2022-01-26 05:21:14', '2022-01-26 05:21:14'),
(18, '50a70b42-abc9-400b-b4af-a5730bdda7a3', 11, 1, 1, 1, '1015.4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5077.00', NULL, '2022-03-22 04:41:21', '2022-03-22 04:41:21'),
(19, '81710fa0-2267-4cc8-bce6-84a49572fd5a', 11, 0, 1, 1, '1015.4', 'card_1Kg8xjIXT7Bu6buNJ5Lqynod', NULL, NULL, 'cus_LMsfAbdtrxHZZY', NULL, 'ch_3Kg8xmIXT7Bu6buN2m82Lm1N', '1111', '5077.00', NULL, '2022-03-22 04:45:35', '2022-03-22 04:45:35'),
(20, 'b7dd9374-cb64-427c-9ea8-47bdd0d2f00f', 12, 0, 1, 1, '50', 'card_1Kg8zjIXT7Bu6buNpdwE3F67', NULL, NULL, 'cus_LMslGn7Z2fF1Mk', NULL, 'ch_3Kg8zlIXT7Bu6buN1rQ4NRQL', '1111', '250.00', NULL, '2022-03-22 04:47:38', '2022-03-22 04:47:38'),
(21, '76dd2661-467e-4d52-bb77-ecd8eb77f5cf', 3, 0, 1, 1, '50', 'card_1OX9R9IXT7Bu6buN2EzSke5P', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'ch_3OX9RBIXT7Bu6buN085b5f7b', '1111', '250.00', NULL, '2024-01-10 10:32:56', '2024-01-10 10:32:56'),
(22, '74a5790c-0678-4f2c-9a01-80f2c0507151', 3, 0, 1, 1, '50', 'pi_3OXVFVIXT7Bu6buN1Oq4YwCL', NULL, NULL, 'cus_L1tFOutChvGpa2', NULL, 'pi_3OXVFVIXT7Bu6buN1Oq4YwCL', '', '250.00', NULL, '2024-01-11 09:50:20', '2024-01-11 09:50:20'),
(23, '9eb026c0-0235-4ae3-badd-b70488b15ae5', 3, 0, 1, 1, '50', 'pi_3OXVHzDwtJGDsyYF2gSFSbDK', NULL, NULL, 'cus_PMDj1TtiUF6mQ4', NULL, 'pi_3OXVHzDwtJGDsyYF2gSFSbDK', '', '250.00', NULL, '2024-01-11 09:52:54', '2024-01-11 09:52:54'),
(24, 'f3a6934f-7a40-4960-967a-d82c44448c5e', 3, 0, 2, 2, '50', 'pi_3OXVK2IXT7Bu6buN230DPlK5', NULL, NULL, 'cus_PMDl5seQLZAETJ', NULL, 'pi_3OXVK2IXT7Bu6buN230DPlK5', '', '250.00', NULL, '2024-01-11 09:55:01', '2024-01-11 09:55:01'),
(25, '0b4b051c-cf63-4310-9097-8c1433ae8a83', 3, 0, 1, 1, '50', 'pi_3OXVMuIXT7Bu6buN2qIrSAR9', NULL, NULL, 'cus_PMDl5seQLZAETJ', NULL, 'pi_3OXVMuIXT7Bu6buN2qIrSAR9', '', '250.00', NULL, '2024-01-11 09:57:59', '2024-01-11 09:57:59'),
(26, 'b739725d-2ef9-4418-b17f-2309f8c98045', 3, 0, 1, 1, '50', 'pi_3OXVSNIXT7Bu6buN15HPuST5', NULL, NULL, 'cus_PMDl5seQLZAETJ', NULL, 'pi_3OXVSNIXT7Bu6buN15HPuST5', '', '250.00', NULL, '2024-01-11 10:03:38', '2024-01-11 10:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailchimp_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_mailchimp_synced` tinyint(1) NOT NULL DEFAULT 0,
  `stripe_customer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_full_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twofa_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` bigint(20) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `public_id`, `first_name`, `last_name`, `email`, `password`, `mailchimp_id`, `is_mailchimp_synced`, `stripe_customer_id`, `stripe_full_name`, `two_factor_secret`, `two_factor_recovery_codes`, `avatar`, `twofa_code`, `role_id`, `referred_by`, `phone`, `address`, `country`, `city`, `state`, `zip`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `locale`) VALUES
(1, 'e851ac33-3402-4a82-90be-2933a9f1bf7b', 'Super', 'Admin', 'super@folex.com', '$2y$10$vsGvN8aC2DfknWEhtzVt4.L5EYhh8cLBt1lT5MU.U63ppXWyUAXUq', NULL, 0, NULL, NULL, 'eyJpdiI6ImJrNVFkYllEWHFIVXh2dDdYVUVzaXc9PSIsInZhbHVlIjoiOU80K2NBc2NFQllUS0hFT2VYSkQwQT09IiwibWFjIjoiNjQ4NzExZDJkYzI3NDNhNjkxN2RiOGQwNzgxMjY1NGQ1YmFiZDNmMDkzZjliOWJmZTc4MDQ2Yzk4YWZlYmNjMSJ9', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-06 23:05:22', NULL, NULL, 'en'),
(2, '4b883c4d-65a4-4148-9a14-55c5337ea614', 'Admins', 'Admin', 'admin@folex.com', '$2y$10$akpAoPurQ7pKVCUU4QOpZ.dT8pDmyF7K.nZQm4YBEsUd3Nl7eBkY2', NULL, 0, NULL, NULL, 'eyJpdiI6ImlEeTRKTkY1SFoyNFFhOHBudGdpSmc9PSIsInZhbHVlIjoiKzFMbmJoSkI0SDcwbDdQS2lqVllndz09IiwibWFjIjoiZWUzMWE2NDZhZDliY2FjODJlYTY0YzYyZjlkZmI0YmU4NjIxZTY2YTg2OWM2OGViYjM4YjBmMjdkYjA5MDc5YyJ9', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 10:41:32', NULL, 'V4Ib0TsWryIrhTf4JlyR9GY4D44mIvrlcjPpw6HS49xJXSKETB5D82lX3TAP', 'en'),
(3, 'fd698b52-4a51-453d-939c-90289f2528d2', 'Users', 'Users', 'user@folex.com', '$2y$10$mwcwLxt/BUFdw5ytay9Vaea5kLwx5aw3SGIAB.t4ApQ/VxN2treKi', NULL, 0, 'cus_PMDl5seQLZAETJ', 'dgsfdsf', 'eyJpdiI6ImRhUWpDejFncUdMMHVLSEdHYzJDWWc9PSIsInZhbHVlIjoiaW1rdm51M1hBelJHVU9CNDdpNTF3Zz09IiwibWFjIjoiZTlmZDBkNGMxZDhkMWU0OWEzMmE5NTE0OWFkM2ZhNDIyOTk4MmJlYTIyZTRhZjBhMGM1ZTIwZWMwNGU5NDcxNyJ9', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-04 10:09:11', NULL, NULL, 'de'),
(4, 'd6ad3814-54d1-4ebe-a4d8-98be609b2a85', 'Ali', 'Referered', 'ali@user.com', '$2y$10$eSjXcl5fZHnPEJN/P5ED..0tAzyBJKULt3YCuXL2TuGy704xNsNa.', NULL, 0, 'cus_Kzlhk6sXvGMU8L', NULL, 'eyJpdiI6InhPa2xKNE1CdUk0TmwwTkZ1amxBV0E9PSIsInZhbHVlIjoiTmpRcGhvRFdiajZ3Y1FzbWtkTlV2Zz09IiwibWFjIjoiZTlmNGJkMzJmMDJhYjkxZWYzNmY1NDQ1NjQ2Yjg2ODMyZWNhZjQ3NTNmYmExYzU0ZmM2NTRlODBjNjM4M2FhYyJ9', NULL, NULL, NULL, '3', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-19 10:54:49', '2023-11-24 02:34:57', NULL, NULL, NULL),
(5, 'cacd66f3-b445-4732-a696-e878096032be', 'David', 'david', 'david@gmail.com', '$2y$10$Shq1DoSzrM.fOOoOHNLYauu9SqyKjnJ6U.KNi37n4m9yzz3JR/mAa', 'f3c52e5ef3d2b471d0ef51c66c21d10c', 1, NULL, NULL, NULL, NULL, NULL, NULL, '3', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-27 23:05:28', '2022-02-23 04:59:05', NULL, NULL, NULL),
(6, 'c33bf799-e2e6-46d7-b35a-18ed1e594c34', 'Ali', 'Sherazi', 'im.ali7@outlook.comm', '$2y$10$0Lymet2KlHgmxQ6nPvjBMuTdyJRm6RFZbM5uaHocOW3cHLAOMmGAm', '294505e2512123a2c8f3478b95022de8', 1, NULL, NULL, 'eyJpdiI6InpQbWRETDl3MVQ2ZWhpK21PZC90cUE9PSIsInZhbHVlIjoiZERqK1VJbi84aWVqVCtkQVQ2VVNsUT09IiwibWFjIjoiZjQxZTczZjExMTk0ZDYxNWExNDY4MTNiM2I5M2E0Njg3YmE1ZmQ1NjM0OGM5MDJkYTViM2I1NDA0ZmY0MTliOCJ9', NULL, NULL, NULL, '3', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-15 23:31:26', '2022-02-23 05:02:46', NULL, NULL, NULL),
(7, 'd0575676-06a4-45dc-b553-d174579cdccf', 'Al', 'asasas', 'asdsf@sdsdsd.com', '$2y$10$XmfXyJAypzeGEUwI2I66KO2f8GEkg5cV.f.OEzbFEJUSPvUSniCga', 'd22ceafe4988a79179acfc2d3a9e5382', 1, NULL, NULL, 'eyJpdiI6IlVoSXlDZ1A2Q3pYc1lVTmZDMWN5alE9PSIsInZhbHVlIjoiVGpraEJHc3VUR2RZbmdGMmJobWQ3Zz09IiwibWFjIjoiYTRlNmJhMzQ5ZGU0M2Q4ZGMyMDAyMDY2ZWFiMGM3NmJlOTEzMDU3NzE1NzdhMjY1MWYxOWM0ZTk5Y2QzYjc0OSJ9', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-17 08:45:09', '2022-02-23 04:59:06', NULL, NULL, NULL),
(8, '0341e14f-da9c-42d3-8618-98faac375225', 'fdfdfdf', 'dfdfdf', 'dfddf@asddsd.com', '$2y$10$JZrdihvHu/T.7W8j0Yv.FO2x9Xpj3WDWfHbTHhRfvRjxPfGsEVhUe', NULL, 0, NULL, NULL, 'eyJpdiI6IlJONUV6MVZESE9Wc1hxVm9BOTBoS0E9PSIsInZhbHVlIjoicy9QeTRwLy8xVmpmM0szZ0RiRjBGdz09IiwibWFjIjoiN2UwZDNlNTQ0M2UxYjMwY2VmOTkyOWMyMDVlOWJkZDE0YmIzZmQwYjg5MTA2Nzc4ODUzOTAyY2QwOWI2MjI0MSJ9', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 04:32:08', '2022-02-28 04:32:08', NULL, NULL, NULL),
(10, '62292097-91ad-4954-86b9-0d2fe8685d02', 'Ali', 'hassn', 'sdssdsd@ssdd.cm', '$2y$10$8RApjGzDzHT974VFoYAxv.mc3Gw1dTQOf2stOZA1anaMRLdZi8t/K', NULL, 0, NULL, NULL, 'eyJpdiI6ImJHUXNDbkZEeXloSGUzeWNvUW8rNVE9PSIsInZhbHVlIjoiWEdoWVhMNWJlRWxDay9nQmxEUGxxQT09IiwibWFjIjoiMzc3YjViODhiZmRlNzZhMTQ5ZTViYzZhOWU0Y2MzMWVkZmNlZWUzNjIzMjkyNGEyNTEyYzA3OWMzNGQ3ZDU2OSJ9', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 04:33:33', '2022-02-28 04:33:33', NULL, NULL, NULL),
(11, '14f5e06d-da12-40e0-89ef-89850f0f5910', 'Ali', 'Sherazi', 'imali@dsds.ocm', '$2y$10$S5wvtLSQIT7HOmih/MvcNe87i.P3EGG85yjANH/Ejt4D8t/pR3PSW', NULL, 0, 'cus_LMsfAbdtrxHZZY', 'Syed ali hassan', 'eyJpdiI6IjNoQ0V4LzF2Tnp6c2wzVDhQNW9QS1E9PSIsInZhbHVlIjoiV0wzSGJXN2ZtRXB4UEtUOFFseEdmZz09IiwibWFjIjoiZWIzYTBiNjQ4Mzg4YmJkZmYyMDEyNGY2NzYyYTMzOTBmYjY2NDQyYzc4NmFiOTM4NTI2NWQ4MjAyYjdiOWM0YiJ9', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-22 04:38:42', '2022-03-22 04:45:31', NULL, NULL, NULL),
(12, 'a894f013-27d3-4afd-97b2-07b67080e5dd', 'sds', 'dsdsdsd', 'sdsds@sd.dsdcom', '$2y$10$/ib0lTcm/Wy7Rq0nECHu2O430RMFmXl804RUGFh5fbuvOVU1o5YLG', NULL, 0, 'cus_LMslGn7Z2fF1Mk', 'sdsd dfdf', 'eyJpdiI6IkRNdVlFVHUrYlI3VE1VUnNGN3RjQ1E9PSIsInZhbHVlIjoiRHU5YnpaemZqd203NnkvTXk3d1NVUT09IiwibWFjIjoiODAxZGIzZmEyNTdhM2M2NWVmZmE4YWQxMjU1NzliYWJiMTU3Yjc3YTZhNDUwNWRkODZkMjJjODAwOWU4ZTE5NyJ9', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-22 04:46:12', '2022-03-22 04:47:36', NULL, NULL, NULL),
(13, '843d1d27-5b6f-475d-aa66-2c7f9a601dec', 'Lacy', 'Rush', 'cusuxu@mailinator.com', '$2y$10$K1wbv2QqunA55mwDq4Zi.ecI4GXpr1x85Z7.ezUE4QVxaY6cCblqy', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '+1 (662) 791-3518', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 09:28:45', '2024-01-10 09:28:45', NULL, NULL, NULL),
(14, '7b4b10a0-bea4-424c-90d3-accfcf23d284', 'Cheyenne', 'Glover', 'sonohi@mailinator.com', '$2y$10$VSHkrkxLDk2d0MEJ85dSoe4dwv/7ECPShmRfLzW/.DZEAEj9Cm9v6', NULL, 0, NULL, NULL, 'eyJpdiI6Imd3TVQ1U2FsUmxrMVFrTVp6VU95TGc9PSIsInZhbHVlIjoiUzVLbDMzTklWNXY2M2laazVyZi9qUT09IiwibWFjIjoiOWZjMjhkMTY0YTkzNmY0M2ZiYTAwNDU0MTA5YjNhNDM5ZTk1NDVkZDliNTE1MDdhYTdlMGRkMDQwNWExZDU1MCJ9', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 07:06:03', '2024-01-23 07:06:03', NULL, NULL, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `user_banks`
--

CREATE TABLE `user_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `account_holder_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_bic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Recent Selected = active when multiple',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_banks`
--

INSERT INTO `user_banks` (`id`, `public_id`, `user_id`, `account_holder_name`, `account_number`, `country`, `bank_currency`, `bank_name`, `branch_name`, `swift_bic`, `iban_number`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '551120c1-e13d-4406-8edd-996210f7a85c', 3, 'Syed Ali Hassan', '12727901', 'Pakistan', 'USD', 'Mezan', 'Univerisy Road', 'SWIFT123', 'MEZN123', 0, '2022-01-27 07:18:49', '2022-01-27 22:59:12', NULL),
(2, 'db40e1a5-6664-42de-a4d8-1c225589adcf', 3, 'Ali HAssan', '199012121212', 'Pakistan', 'PKR', 'Habib Bank', 'University', 'SWIFTHBB', 'HBB12334', 0, '2022-01-27 07:23:32', '2022-01-27 22:59:31', NULL),
(3, '23ee0931-672d-431d-bf81-97d358724677', 3, 'sdfdfds', 'fdsfdsf', 'Comoros', 'KHR', 'dsfdfsdf', 'dsfdsfdsfds', 'fdsfdsfd', 'sfsdfdfdsf', 0, '2022-01-27 07:26:26', '2022-01-27 07:26:38', NULL),
(4, 'bbb576d4-1270-4705-b82b-2996ff9fbb56', 3, 'David', '1234567', 'Germany', 'EUR', 'GermanBank', 'MunichBranch', 'BUIC123', 'IBAN123', 0, '2022-01-27 22:52:21', '2022-01-27 22:59:21', NULL),
(5, '6a625714-fa64-4ab4-88fa-196a38fce7d6', 3, 'sdfdsf', 'sdfsdfdsf', 'Azerbaijan', 'BOB', 'sdfsdf', 'sdfdsf', 'sdfdsfsdf', 'sdfdsfdsfdsfdsfdsffsd', 0, '2022-02-27 02:58:29', '2022-02-27 02:58:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_codes`
--

CREATE TABLE `user_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_cryptos`
--

CREATE TABLE `user_cryptos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `crypto_option_id` int(11) DEFAULT NULL,
  `wallet_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Recent Selected = active when multiple',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_cryptos`
--

INSERT INTO `user_cryptos` (`id`, `public_id`, `user_id`, `crypto_option_id`, `wallet_address`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '48af216f-eb6b-490c-aec6-3269800487b6', 3, 1, 'werewrwerwerr', 0, '2022-01-27 08:07:04', '2022-01-27 08:10:01', NULL),
(2, 'f110de2a-71c4-4bac-b926-2f88558b5be8', 3, 4, 'bitcoin121212121212', 0, '2022-01-27 08:09:49', '2022-01-27 08:37:29', NULL),
(3, 'dda8ad25-3bcf-4741-b089-075f2b2ec5f3', 3, 2, 'abcdef121212121212122', 0, '2022-01-27 22:54:28', '2022-01-27 22:54:28', NULL),
(4, '66248d31-e457-4628-b028-d08a6ca36f38', 3, 1, 'sdkjhjdkshkjsd kjdksdhjkfdhskjfsdlf', 0, '2022-02-27 03:08:19', '2022-02-27 03:08:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `public_id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, '5b9f804e-6b0d-4999-b9ab-fee606591c64', 3, '3195.2935885297', '2022-01-12 10:57:39', '2024-01-10 09:30:02'),
(2, '7421517f-97f2-4d33-a215-c77f4e6de97c', 4, '50.9505906217', '2022-01-19 11:14:03', '2022-01-26 06:16:10'),
(3, '53ac3cb6-ea38-49f4-b745-a83bbbd5f6ba', 4, '20', '2022-01-19 11:14:03', '2022-01-19 11:14:03'),
(4, 'b5db05fd-47c8-44b1-a29a-f73393a90039', 3, '20', '2022-01-19 11:26:39', '2022-01-19 11:26:39'),
(5, '4601ccc6-7f30-4af7-be72-4700c1c41948', 5, '0', '2022-01-27 23:07:37', '2022-01-27 23:07:37'),
(6, '2627ec84-92b0-42bd-9337-ba050d155f9f', 3, '80', '2022-01-27 23:07:37', '2022-01-27 23:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `is_resolved` tinyint(1) NOT NULL DEFAULT 0,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `action_performed_by` bigint(20) DEFAULT NULL,
  `action_performed_at` datetime DEFAULT NULL,
  `amount_withdraw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `hashing_id` int(11) DEFAULT NULL,
  `coin_data_id` bigint(20) DEFAULT NULL,
  `payment_via_id` bigint(20) DEFAULT NULL COMMENT 'if 2 then user banks else user crypto',
  `payment_method` int(11) DEFAULT NULL COMMENT '1=card,2=bank,3=coin',
  `additional_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_requests`
--

INSERT INTO `withdraw_requests` (`id`, `public_id`, `user_id`, `is_resolved`, `is_accepted`, `action_performed_by`, `action_performed_at`, `amount_withdraw`, `vat`, `hashing_id`, `coin_data_id`, `payment_via_id`, `payment_method`, `additional_details`, `created_at`, `updated_at`) VALUES
(7, '00538ef1-af35-45ef-b3fd-eda7597dbc4a', 3, 1, 1, 1, '2022-01-27 18:59:06', '35', '0', NULL, NULL, 1, 2, NULL, '2022-01-27 13:05:50', '2022-01-27 13:59:06'),
(8, '9662d7fe-ef99-4632-a07a-110daebb50fd', 3, 1, 1, 1, '2022-01-28 03:58:38', '44', '0', NULL, NULL, 1, 3, NULL, '2022-01-27 13:06:00', '2022-01-27 22:58:38'),
(9, '4a622d0f-df70-43ca-99dc-2a509e869b68', 3, 1, 0, 1, '2022-01-28 03:58:49', '100', '0', NULL, NULL, 2, 2, NULL, '2022-01-27 13:07:32', '2022-01-27 22:58:49'),
(10, '8a070be7-6429-4090-9014-1fda0f86b39c', 3, 1, 1, 1, '2022-01-28 03:58:17', '145', '0', NULL, NULL, 4, 2, NULL, '2022-01-27 22:56:15', '2022-01-27 22:58:17'),
(11, '27464ded-2c57-41bf-8ad7-93bcb2fd79d8', 3, 1, 1, 1, '2022-01-28 03:58:27', '200', '0', NULL, NULL, 1, 3, NULL, '2022-01-27 22:56:36', '2022-01-27 22:58:27'),
(12, 'cfd05985-e56e-4b7d-8677-e9e144f903ab', 3, 1, 1, 1, '2024-01-10 14:30:02', '200', '21', NULL, NULL, 1, 3, NULL, '2022-01-27 23:11:20', '2024-01-10 09:30:02'),
(13, '98db9fde-dd1e-46e1-852d-62ae9f84c137', 3, 1, 1, 1, '2022-01-31 17:21:53', '30', '21', NULL, NULL, 1, 2, NULL, '2022-01-31 12:11:23', '2022-01-31 12:21:53'),
(14, '7c6d4ed7-d2d7-46cd-bd14-e32a6a9a0214', 3, 0, NULL, 1, '2022-01-31 17:21:45', '200', '21', NULL, NULL, 2, 2, NULL, '2022-01-31 12:16:03', '2022-01-31 12:21:45'),
(15, '2aac34f7-ae98-43de-b962-d4cfa159b6c9', 3, 0, NULL, 1, '2024-01-10 14:29:57', '23', '21', NULL, NULL, 1, 2, NULL, '2022-03-16 21:03:32', '2024-01-10 09:29:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coinbase_payments`
--
ALTER TABLE `coinbase_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinbase_webhooks`
--
ALTER TABLE `coinbase_webhooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coin_data`
--
ALTER TABLE `coin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypto_options`
--
ALTER TABLE `crypto_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_requests`
--
ALTER TABLE `deposit_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_histories`
--
ALTER TABLE `email_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hashings`
--
ALTER TABLE `hashings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_payments`
--
ALTER TABLE `stripe_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_banks`
--
ALTER TABLE `user_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_codes`
--
ALTER TABLE `user_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cryptos`
--
ALTER TABLE `user_cryptos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coinbase_payments`
--
ALTER TABLE `coinbase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coinbase_webhooks`
--
ALTER TABLE `coinbase_webhooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coin_data`
--
ALTER TABLE `coin_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `crypto_options`
--
ALTER TABLE `crypto_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deposit_requests`
--
ALTER TABLE `deposit_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `email_histories`
--
ALTER TABLE `email_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hashings`
--
ALTER TABLE `hashings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stripe_payments`
--
ALTER TABLE `stripe_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_banks`
--
ALTER TABLE `user_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_codes`
--
ALTER TABLE `user_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_cryptos`
--
ALTER TABLE `user_cryptos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
