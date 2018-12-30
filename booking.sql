-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2018 pada 11.47
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Pesawat', '2018-12-26 08:44:54', '2018-12-26 20:49:35'),
(2, 'Kereta Api', '2018-12-26 08:44:45', '2018-12-26 20:49:23'),
(3, 'Hotel', '2018-12-26 20:15:49', '2018-12-26 20:15:49'),
(4, 'Bus', '2018-12-26 20:25:37', '2018-12-26 20:25:37'),
(201, 'nama kategori 1', '2018-12-30 03:43:40', '2018-12-30 03:43:40'),
(202, 'nama kategori 2', '2018-12-30 03:43:40', '2018-12-30 03:43:40'),
(203, 'nama kategori 3', '2018-12-30 03:43:40', '2018-12-30 03:43:40'),
(204, 'nama kategori 4', '2018-12-30 03:43:41', '2018-12-30 03:43:41'),
(205, 'nama kategori 5', '2018-12-30 03:43:41', '2018-12-30 03:43:41'),
(206, 'nama kategori 6', '2018-12-30 03:43:41', '2018-12-30 03:43:41'),
(207, 'nama kategori 7', '2018-12-30 03:43:41', '2018-12-30 03:43:41'),
(208, 'nama kategori 8', '2018-12-30 03:43:41', '2018-12-30 03:43:41'),
(209, 'nama kategori 9', '2018-12-30 03:43:41', '2018-12-30 03:43:41'),
(210, 'nama kategori 10', '2018-12-30 03:43:41', '2018-12-30 03:43:41'),
(211, 'nama kategori 11', '2018-12-30 03:43:41', '2018-12-30 03:43:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_26_080538_create_kategoris_table', 2),
(4, '2018_12_27_040919_create_tickets_table', 3),
(5, '2018_12_27_052558_create_transactions_table', 4),
(9, '2018_12_30_061104_create_trigger', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `total_ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `name_ticket`, `type_ticket`, `id_kategori`, `total_ticket`, `price_ticket`, `created_at`, `updated_at`) VALUES
(1, 'Sriwijaya Air', 'Ekonomi', 1, '78', '100000', '2018-12-27 04:47:40', '2018-12-27 06:42:29'),
(5, 'Batavia Air', 'Economy', 1, '39', '500000', '2018-12-26 23:14:25', '2018-12-27 06:42:45'),
(6, 'Lion Air', 'Economy', 3, '90', '500000', '2018-12-26 23:15:16', '2018-12-27 06:42:57'),
(7, 'PROGO', 'bussiness', 2, '400', '400000', '2018-12-26 23:15:54', '2018-12-27 06:42:13'),
(8, 'Sumber Alam', 'VIP', 4, '57', '120000', '2018-12-26 23:16:44', '2018-12-27 06:41:31'),
(9, 'Garuda Indonesia', 'VIP', 1, '79', '2000000', '2018-12-27 06:04:45', '2018-12-27 06:04:45'),
(10, 'Air Asia', 'Bussiness', 1, '48', '550.000', '2018-12-30 01:35:43', '2018-12-30 01:40:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ticket` int(10) UNSIGNED NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ticket` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `id_ticket`, `qty`, `status_ticket`, `created_at`, `updated_at`) VALUES
(2, 6, '2', 1, '2018-12-27 07:41:17', '2018-12-27 08:06:48'),
(5, 1, '12', 1, '2018-12-27 07:57:42', '2018-12-27 08:06:48'),
(9, 10, '2', 1, '2018-12-28 19:35:19', '2018-12-28 19:37:53'),
(12, 5, '1', 1, '2018-12-29 23:38:15', '2018-12-29 23:38:19'),
(14, 7, '4', 1, '2018-12-30 00:06:26', '2018-12-30 00:06:28'),
(16, 9, '1', 1, '2018-12-30 00:30:23', '2018-12-30 00:30:26'),
(17, 8, '1', 1, '2018-12-30 00:31:16', '2018-12-30 00:31:22');

--
-- Trigger `transactions`
--
DELIMITER $$
CREATE TRIGGER `sales_ticket` AFTER UPDATE ON `transactions` FOR EACH ROW BEGIN
	IF NEW.status_ticket > 0 THEN
		UPDATE tickets SET total_ticket=total_ticket - NEW.qty WHERE id=NEW.id_ticket;
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Riventus', 'ventus@mail.com', NULL, '$2y$10$NCD9FGHrIInUBVXFlI3H0uyS9QGzghtWvuetOOeOypnRBWWgaoiy.', 'yl5Xd2tclH2nQwnMd0221DkgMfR6dcShkQ0wm8QnRNd9uZx3hVMdDbvFVHlf', '2018-12-25 22:46:47', '2018-12-25 22:46:47'),
(2, 'testemail', 'test@mail.com', '2018-12-26 00:51:34', '$2y$10$gsZfatetLk58G1o3hhjHAuOybc7oV2k9Je18xmBsw5avX/lVWUGKe', 'kZbAjxbWSmHAKxVwpdiQEscIhsMPgml2Ej417jVS2UdgPgWhlzeZ1DdnnoZ4', '2018-12-26 00:50:59', '2018-12-26 00:55:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_id_ticket_foreign` (`id_ticket`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_id_ticket_foreign` FOREIGN KEY (`id_ticket`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
