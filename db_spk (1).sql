-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2021 pada 09.31
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$vrsf3NRWcvVAxlVpboQ4QOmlcf4wmo0jFqnNIeCIEBPoDAE4I671.', '1', NULL, '2021-01-20 06:15:48', '2021-03-29 02:50:10'),
(2, 'super_admin', 'super_admin@admin.com', '$2y$10$HZHLxDbKpVs8/J4P4J/I8uEaV9VUD82eVMn4lmeM6gM.JDMBsKl.y', '0', NULL, '2021-03-01 06:29:56', '2021-03-01 06:29:56'),
(5, 'pimpinan', 'pimpinan@admin.com', '$2y$10$ciyLeyJme1hXen7GEtGjCOKW/Negb3LpGkRlMaZxQVrkFop1veCsu', '2', NULL, '2021-03-12 09:28:25', '2021-03-12 09:28:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anouncements`
--

CREATE TABLE `anouncements` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `period_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anouncements`
--

INSERT INTO `anouncements` (`id`, `admin_id`, `period_id`, `status`, `file`, `created_at`, `updated_at`) VALUES
(2, 1, 19, 1, '2021-03-27_2021-03-31_PengumumanBeasiswa.pdf', '2021-04-04 10:12:47', '2021-04-04 10:13:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `criterias`
--

CREATE TABLE `criterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double DEFAULT NULL,
  `character` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criterias`
--

INSERT INTO `criterias` (`id`, `admin_id`, `code`, `name`, `weight`, `character`, `information`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'C1', 'IPK', 0.3, 'Benefit', 'Kriteria ini tergantung dari nilai IPK mahasiswa yang mendaftar pada beasiswa PPA, mahasiswa dengan IPK lebih bagus lebih mendapat prioritas.', 1, '2021-02-04 09:18:52', '2021-02-05 00:40:43'),
(3, 1, 'C2', 'Gaji Orang Tua', 0.25, 'Cost', 'Kriteria ini tergantung dari Gaji orang tua mahasiswa yang mendaftar pada beasiswa PPA, orang tua dengan gaji lebih sedikit lebih mendapat prioritas.', 1, '2021-02-09 06:48:11', '2021-02-25 03:55:57'),
(5, 1, 'C3', 'Tanggungan Orang Tua', 0.25, 'Benefit', 'Tanggungan Orang Tua Dalam Mengeluarkan Biaya.', 1, '2021-02-18 03:10:53', '2021-02-25 03:56:09'),
(8, 1, 'C4', 'Prestasi', 0.2, 'Benefit', 'Prestasi Yang Pernah Diraih Mahasiswa', 1, '2021-02-25 03:56:48', '2021-02-25 04:26:01'),
(9, 1, 'C5', 'Surat Keternangan', NULL, '-', 'Surat Keterangan aktif kuliah dari kampus', 0, '2021-02-25 04:21:39', '2021-02-25 04:21:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `name`, `prodi`, `semester`, `photo`, `address`, `gender`, `phone`, `religion`, `created_at`, `updated_at`, `user_id`) VALUES
(4, 'Mochamad irfani ardhyansah', 'TI', '4', '371_2021-02-24__profile.jpeg', 'Madiun', 'Laki - laki', '081332695709', 'Islam', '2021-02-04 06:07:33', '2021-02-24 08:57:53', 13),
(5, 'James John', 'Meto', '2', NULL, 'Tawangrejo', 'Laki - laki', '0812347912', 'Protestan', '2021-02-20 09:14:24', '2021-02-20 09:14:24', 14),
(6, 'Ayu Risqi', 'TI', '4', NULL, 'Kwangsen', 'Perempuan', '0812374', 'Islam', '2021-04-05 05:08:32', '2021-04-05 05:08:32', 15);

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
(3, '2020_12_28_154349_create_mahasiswas_table', 1),
(4, '2020_12_28_154359_create_values_table', 1),
(5, '2020_12_28_154411_create_periods_table', 1),
(6, '2020_12_28_154419_create_criterias_table', 1),
(7, '2020_12_28_154504_create_anouncements_table', 1),
(8, '2020_12_28_154513_create_admins_table', 1),
(9, '2020_12_28_154752_create_user_periods_table', 1),
(10, '2020_12_29_102937_create_criteria_weights_table', 1),
(11, '2021_01_23_034140_add_field_status_to_user_periods_table', 2),
(12, '2021_02_02_091350_add_field_user_id_to_mahasiswas_table', 2),
(13, '2021_02_04_135611_add_relationships_to_criterias_table', 3),
(14, '2021_02_04_140637_add_relationships_to_criteriass_table', 4),
(15, '2021_02_04_140757_add_relationships_to_weights_table', 5),
(16, '2021_02_06_093524_add_relationships_to_periods_table', 6),
(17, '2021_02_09_191922_add_fields_information_to_criterias_table', 7),
(18, '2021_02_11_152831_add_relationships_on_values_table', 8),
(19, '2021_02_11_153917_add_relationships_on_user_periods_table', 8),
(20, '2021_02_25_110542_add_status_to_criterias_table', 9),
(21, '2021_02_25_121036_add_reationships_to_announcements_to_periods_tabe', 10),
(22, '2021_02_25_125127_add_field_status_to_anouncements_table', 11),
(23, '2021_03_01_132700_add_role_to_admins_table', 12);

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
-- Struktur dari tabel `periods`
--

CREATE TABLE `periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periods`
--

INSERT INTO `periods` (`id`, `admin_id`, `start`, `end`, `file`, `status`, `created_at`, `updated_at`) VALUES
(19, 1, '2021-03-27', '2021-03-31', '2021-03-28_2021-03-31_pengumumanPeriodeBeasiswa.pdf', 0, '2021-03-28 13:19:00', '2021-03-29 02:51:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `npm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `npm`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, '183307009', 'user@ymail.com', '$2y$10$WcxqXJIL/dd79WSLjpevTepiBcgUopwHdTtB26U1Pt/nyJhpCZzUu', '7kuYHt2OJ9vxNp8TVESu16Y3kTlrdWMTHl82s5Mdjx8pfIfq18aoijChvXqf', '2021-02-04 06:07:33', '2021-02-16 08:31:13'),
(14, '183307008', 'user2@ymail.com', '$2y$10$uj7iE2qW4YHIZzCMDvZM0u3e.y1KxYx4sAq9Urt8XmzIJZ1RaBfI6', 'jTbiTPSB9Dvgp7j7whyT25AnCVoPXgN9ByvG88SzTqHFHoELRCmUETeW90Ah', '2021-02-20 09:14:24', '2021-02-20 09:14:24'),
(15, '183307037', 'user@gmail.com', '$2y$10$54VfbmcnoMW4QhO.ssQI1ud.ZXvDrFE3gCUPj8rJD4O9ml9q39hq6', 'dcbUpGAfQM1xbIug7BFs9OV30VKTFbBuHxR406CzoN6fJLOe8txA9lw5EPoe', '2021-04-05 05:08:31', '2021-04-05 05:08:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_periods`
--

CREATE TABLE `user_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `period_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_periods`
--

INSERT INTO `user_periods` (`id`, `user_id`, `period_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 19, 0, '2021-04-05 05:06:43', '2021-04-05 05:06:43'),
(2, 13, 19, 0, '2021-04-05 05:07:34', '2021-04-05 05:07:34'),
(3, 15, 19, 0, '2021-04-05 05:09:20', '2021-04-05 05:09:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `values`
--

CREATE TABLE `values` (
  `id` int(10) UNSIGNED NOT NULL,
  `period_id` int(10) UNSIGNED DEFAULT NULL,
  `criteria_id` int(10) UNSIGNED DEFAULT NULL,
  `mahasiswa_id` int(10) UNSIGNED DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `values`
--

INSERT INTO `values` (`id`, `period_id`, `criteria_id`, `mahasiswa_id`, `value`, `file`, `created_at`, `updated_at`) VALUES
(1, 19, 2, 5, '0.25', '183307008_IPK.pdf', '2021-04-05 05:06:42', '2021-04-05 05:06:42'),
(2, 19, 3, 5, '0.5', '183307008_Gaji Orang Tua.pdf', '2021-04-05 05:06:42', '2021-04-05 05:06:42'),
(3, 19, 5, 5, '0.5', '183307008_Tanggungan Orang Tua.pdf', '2021-04-05 05:06:42', '2021-04-05 05:06:42'),
(4, 19, 8, 5, '1', '183307008_Prestasi.pdf', '2021-04-05 05:06:42', '2021-04-05 05:06:42'),
(5, 19, 9, 5, '-', '183307008_Surat Keternangan.pdf', '2021-04-05 05:06:42', '2021-04-05 05:06:42'),
(6, 19, 2, 4, '0.75', '183307009_IPK.pdf', '2021-04-05 05:07:34', '2021-04-05 05:07:34'),
(7, 19, 3, 4, '0.5', '183307009_Gaji Orang Tua.pdf', '2021-04-05 05:07:34', '2021-04-05 05:07:34'),
(8, 19, 5, 4, '0.5', '183307009_Tanggungan Orang Tua.pdf', '2021-04-05 05:07:34', '2021-04-05 05:07:34'),
(9, 19, 8, 4, '1', '183307009_Prestasi.pdf', '2021-04-05 05:07:34', '2021-04-05 05:07:34'),
(10, 19, 9, 4, '-', '183307009_Surat Keternangan.pdf', '2021-04-05 05:07:34', '2021-04-05 05:07:34'),
(11, 19, 2, 6, '1', '183307037_IPK.pdf', '2021-04-05 05:09:20', '2021-04-05 05:09:20'),
(12, 19, 3, 6, '1', '183307037_Gaji Orang Tua.pdf', '2021-04-05 05:09:20', '2021-04-05 05:09:20'),
(13, 19, 5, 6, '1', '183307037_Tanggungan Orang Tua.pdf', '2021-04-05 05:09:20', '2021-04-05 05:09:20'),
(14, 19, 8, 6, '1', '183307037_Prestasi.pdf', '2021-04-05 05:09:20', '2021-04-05 05:09:20'),
(15, 19, 9, 6, '-', '183307037_Surat Keternangan.pdf', '2021-04-05 05:09:20', '2021-04-05 05:09:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `weights`
--

CREATE TABLE `weights` (
  `id` int(10) UNSIGNED NOT NULL,
  `criteria_id` int(10) UNSIGNED DEFAULT NULL,
  `information` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `weights`
--

INSERT INTO `weights` (`id`, `criteria_id`, `information`, `value`, `created_at`, `updated_at`) VALUES
(2, 2, '2.75 S/D 3.00', 0.25, '2021-02-05 12:18:19', '2021-02-05 12:18:19'),
(3, 2, '3.00 S/D 3,25', 0.5, '2021-02-05 12:18:41', '2021-02-05 12:18:41'),
(4, 2, '3,25 S/D 3,50', 0.75, '2021-02-05 12:19:03', '2021-02-05 12:19:03'),
(6, 2, '>= 3.50', 1, '2021-02-05 12:33:29', '2021-02-05 12:42:01'),
(8, 2, '< 2.75', 0, '2021-02-09 11:52:30', '2021-02-09 11:52:30'),
(9, 3, '0 < 1.000.000', 1, '2021-02-09 12:06:02', '2021-02-09 12:06:02'),
(10, 3, '1.000.000 < 2.500.000', 0.75, '2021-02-09 12:06:33', '2021-02-09 12:55:40'),
(16, 3, '2.500.000 < 3.500.000', 0.5, '2021-02-09 12:52:48', '2021-02-09 12:52:48'),
(17, 3, '3.500.000 < 4.500.000', 0.25, '2021-02-09 12:56:10', '2021-02-09 12:56:10'),
(18, 3, '4.500.000 <', 0, '2021-02-09 12:56:54', '2021-02-09 12:58:31'),
(27, 5, '0 =< 1', 0, '2021-02-18 03:11:22', '2021-02-18 03:11:22'),
(28, 5, '1 =< 2', 0.25, '2021-02-18 03:11:36', '2021-02-18 03:11:36'),
(29, 5, '2 =< 3', 0.5, '2021-02-24 03:29:30', '2021-02-24 03:29:30'),
(30, 5, '3 =< 4', 0.75, '2021-02-24 03:29:46', '2021-02-24 03:29:46'),
(31, 5, '4 =<8', 1, '2021-02-24 03:30:06', '2021-02-24 03:30:06'),
(34, 8, 'Ada', 1, '2021-02-25 03:57:04', '2021-03-01 09:34:12'),
(35, 8, 'Tidak Ada', 0.5, '2021-02-25 04:02:07', '2021-02-25 04:02:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `anouncements`
--
ALTER TABLE `anouncements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anouncements_period_id_foreign` (`period_id`);

--
-- Indeks untuk tabel `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criterias_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indeks untuk tabel `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periods_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm_users_unique` (`npm`);

--
-- Indeks untuk tabel `user_periods`
--
ALTER TABLE `user_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_periods_user_id_foreign` (`user_id`),
  ADD KEY `user_periods_period_id_foreign` (`period_id`);

--
-- Indeks untuk tabel `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `values_period_id_foreign` (`period_id`),
  ADD KEY `values_criteria_id_foreign` (`criteria_id`),
  ADD KEY `values_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weights_criteria_id_foreign` (`criteria_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `anouncements`
--
ALTER TABLE `anouncements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_periods`
--
ALTER TABLE `user_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `values`
--
ALTER TABLE `values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anouncements`
--
ALTER TABLE `anouncements`
  ADD CONSTRAINT `anouncements_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `criterias`
--
ALTER TABLE `criterias`
  ADD CONSTRAINT `criterias_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `periods`
--
ALTER TABLE `periods`
  ADD CONSTRAINT `periods_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_periods`
--
ALTER TABLE `user_periods`
  ADD CONSTRAINT `user_periods_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_periods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `values`
--
ALTER TABLE `values`
  ADD CONSTRAINT `values_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `values_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `values_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `weights`
--
ALTER TABLE `weights`
  ADD CONSTRAINT `weights_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
