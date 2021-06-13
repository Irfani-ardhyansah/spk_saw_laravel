-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 20.45
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
-- Database: `db_ta`
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
(1, 'super_admin', 'super_admin@admin.com', '$2y$10$.lZS4nLg.vdTKLuLFbfPXugD3MjbQHTSjsGMTGw4bj0.Ekett.5Tq', '0', NULL, '2021-06-07 02:25:45', '2021-06-07 02:25:45'),
(2, 'admin', 'admin@gmail.com', '$2y$10$/dstBwrXEc2c9L2hgECZBeXd7djvhfqfUFHz43sT9Z3aw31P5X31K', '1', NULL, '2021-06-07 02:26:13', '2021-06-07 02:26:13'),
(3, 'Pimpinan', 'pimpinan@gmail.com', '$2y$10$vHLkJQ./TZmAYVooMoaSiOAEdmbh05PPqqA59ibIMNXa7NDxHJqA.', '2', NULL, '2021-06-07 02:26:28', '2021-06-07 02:26:28');

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
(1, NULL, 'C1', 'IPK', 0.3, 'Benefit', 'Melampirkan Scan Trankrip Nilai!', 1, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(2, NULL, 'C2', 'Total Penghasilan Orang Tua', 0.23, 'Cost', 'Melampirkan Scan Keterangan Penghasilan Orang Tua!', 1, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(3, NULL, 'C3', 'Tanggungan Orang Tua', 0.22, 'Benefit', 'Melampirkan Scan Kartu Keluarga!', 1, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(4, NULL, 'C4', 'Prestasi / Organisasi', 0.25, 'Benefit', 'Melampirkan Scan Sertifikat Prestasi atau Keanggotaan Organisasi!', 1, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(5, NULL, 'C5', 'Surat Permohonan', NULL, '-', 'Surat Permohonan Ditujukan Kepada Wadir 3 Berupa Tulis Tangan. File Harus JPEG / PDF!', 0, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(6, NULL, 'C6', 'Scan KTM', NULL, '-', 'Scan Kartu Tanda Mahasiswa. File Harus JPEG / PDF!', 0, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(7, NULL, 'C7', 'Scan Surat Pernyataan', NULL, '-', 'Scan Surat Pernyataan Tidak Menerima Beasiswa. File Harus JPEG / PDF!', 0, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(8, NULL, 'C8', 'Scan Surat Rekomendasi Jurusan', NULL, '-', 'Scan Surat Rekomendasi Dari Jurusan. File Harus JPEG / PDF!', 0, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(9, NULL, 'C9', 'Scan KTP Orang Tua', NULL, '-', 'Scan KTP Kedua Orang Tua. File Harus JPEG / PDF!', 0, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(10, NULL, 'C10', 'Scan Surat Keterangan Tidak Mampu', NULL, '-', 'Scan Surat Keterangan Tidak Mampu. File Harus JPEG / PDF!', 0, '2021-06-07 02:25:46', '2021-06-07 02:25:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboards`
--

CREATE TABLE `dashboards` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodi_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `prodi_id`, `user_id`, `name`, `semester`, `photo`, `address`, `gender`, `phone`, `religion`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'Ayu Risqi', '3', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:06', '2021-06-07 14:06:27'),
(2, 9, 2, 'Aldi Aulia', '3', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:06', '2021-06-07 14:13:05'),
(3, 9, 3, 'Anggun Yuli', '3', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:06', '2021-06-07 14:16:27'),
(4, 9, 4, 'Andri Atna', '5', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:06', '2021-06-07 14:21:41'),
(5, 9, 5, 'Diyah Nisa', '5', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:06', '2021-06-07 14:23:52'),
(6, 9, 6, 'Evita Sabila', '5', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:06', '2021-06-07 14:25:38'),
(7, 9, 7, 'Feby Fidiyanti', '5', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:07', '2021-06-07 14:28:10'),
(8, 1, 8, 'Agung Yuli', '3', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:07', '2021-06-08 01:04:38'),
(9, 1, 9, 'Faqih Izzud', '3', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:07', '2021-06-08 01:06:26'),
(10, 1, 10, 'Enggar Dwi', '3', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:07', '2021-06-08 01:09:08'),
(11, 1, 11, 'Nurdiana', '5', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:08', '2021-06-08 01:11:44'),
(12, 1, 12, 'Rika', '5', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:08', '2021-06-08 01:14:47'),
(13, 1, 13, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:08', '2021-06-07 11:06:08'),
(14, 2, 14, 'Aji Bayu', '3', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:08', '2021-06-08 01:17:08'),
(15, 2, 15, 'Kevin Fernanda', '3', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:08', '2021-06-08 01:19:04'),
(16, 2, 16, 'Dimas Setiyawan', '3', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:08', '2021-06-08 01:20:43'),
(17, 2, 17, 'Nimas', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:09', '2021-06-08 01:25:29'),
(18, 2, 18, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:09', '2021-06-07 11:06:09'),
(19, 2, 19, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:09', '2021-06-07 11:06:09'),
(20, 3, 20, 'Alda', '3', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:09', '2021-06-08 01:30:00'),
(21, 3, 21, 'Putri Wulan', '3', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:09', '2021-06-08 01:37:51'),
(22, 3, 22, 'Septi Hening', '3', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:10', '2021-06-08 01:39:20'),
(23, 3, 23, 'Kenny', '5', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:10', '2021-06-08 01:41:04'),
(24, 3, 24, 'Ade', '5', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:10', '2021-06-08 01:42:54'),
(25, 3, 25, 'Ridho Agung', '5', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:10', '2021-06-08 01:44:40'),
(26, 3, 26, 'Mahasiswa', '3', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:10', '2021-06-07 11:06:10'),
(27, 3, 27, 'Mahasiswa', '5', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:10', '2021-06-07 11:06:10'),
(28, 3, 28, 'Mahasiswa', '5', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:10', '2021-06-07 11:06:10'),
(29, 4, 29, 'Ilham Fakhri', '3', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:11', '2021-06-08 01:49:30'),
(30, 4, 30, 'Saka Widjaya', '3', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:11', '2021-06-09 09:03:25'),
(31, 4, 31, 'Devi Herdasari', '3', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:11', '2021-06-09 09:05:02'),
(32, 4, 32, 'Revita D', '5', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:11', '2021-06-09 09:06:27'),
(33, 4, 33, 'Mahasiswa', '5', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:11', '2021-06-07 11:06:11'),
(34, 4, 34, 'Mahasiswa', '5', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:11', '2021-06-07 11:06:11'),
(35, 4, 35, 'Mahasiswa', '3', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:11', '2021-06-07 11:06:11'),
(36, 4, 36, 'Mahasiswa', '5', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:12', '2021-06-07 11:06:12'),
(37, 5, 37, 'Desy D', '3', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:12', '2021-06-09 09:11:38'),
(38, 5, 38, 'Erlina R', '3', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:12', '2021-06-09 09:12:54'),
(39, 5, 39, 'Bella R', '3', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:12', '2021-06-09 09:14:35'),
(40, 5, 40, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(41, 5, 41, 'Bagus F', '5', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:13', '2021-06-09 09:25:17'),
(42, 5, 42, 'Mahasiswa', '5', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(43, 5, 43, 'Mahasiswa', '3', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(44, 5, 44, 'Mahasiswa', '5', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(45, 5, 45, 'Mahasiswa', '3', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(46, 5, 46, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(47, 6, 47, 'Rina V', '3', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:14', '2021-06-09 09:15:55'),
(48, 6, 48, 'Elon M', '3', NULL, 'Madiun', 'Laki - laki', '08712361121', 'Islam', '2021-06-07 11:06:14', '2021-06-09 09:18:15'),
(49, 6, 49, 'Cathrien V', '3', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:14', '2021-06-09 09:27:06'),
(50, 6, 50, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:14', '2021-06-07 11:06:14'),
(51, 6, 51, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:14', '2021-06-07 11:06:14'),
(52, 6, 52, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361121', 'Islam', '2021-06-07 11:06:14', '2021-06-07 11:06:14'),
(53, 7, 53, 'Edwin Kesuma', '3', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:15', '2021-06-07 14:32:36'),
(54, 7, 54, 'Indaka Barody', '3', NULL, 'Madiun', 'Laki - laki', '08712361122', 'Islam', '2021-06-07 11:06:15', '2021-06-07 14:34:24'),
(55, 7, 55, 'Ivandy Panca', '3', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:15', '2021-06-07 14:36:41'),
(56, 7, 56, 'Kristina Mey', '5', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:15', '2021-06-07 14:38:41'),
(57, 7, 57, 'Mey Wul', '5', NULL, 'Madiun', 'Perempuan', '08712361122', 'Islam', '2021-06-07 11:06:15', '2021-06-07 14:40:48'),
(58, 8, 58, 'Irfani Ardhyansah', '3', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:15', '2021-06-07 14:43:52'),
(59, 8, 59, 'Novendra Ilham', '3', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:15', '2021-06-07 14:45:39'),
(60, 8, 60, 'Rendy Kharisma', '3', NULL, 'Madiun', 'Laki - laki', '08712361123', 'Islam', '2021-06-07 11:06:16', '2021-06-07 14:47:28'),
(61, 8, 61, 'Nadia Haya', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:16', '2021-06-07 14:50:26'),
(62, 8, 62, 'Nadya Putri', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:16', '2021-06-07 14:55:53'),
(63, 8, 63, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:16', '2021-06-07 11:06:16'),
(64, 8, 64, 'Mahasiswa', '5', NULL, 'Madiun', 'Perempuan', '08712361123', 'Islam', '2021-06-07 11:06:16', '2021-06-07 11:06:16');

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
(23, '2021_03_01_132700_add_role_to_admins_table', 12),
(24, '2021_04_24_111744_create_prodis_table', 13),
(25, '2021_04_24_111910_add_fields_prodi_id_to_mahasiswas_table', 14),
(26, '2021_04_24_142744_add_column_quota_to_periods_table', 15),
(27, '2021_04_26_122121_create_dashboards_table', 16);

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
  `quota` int(11) DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periods`
--

INSERT INTO `periods` (`id`, `admin_id`, `start`, `end`, `quota`, `file`, `status`, `created_at`, `updated_at`) VALUES
(24, 2, '2021-06-14', '2021-06-30', 22, 'Pengumuman Pendaftaran PPA 2021.pdf', 1, '2021-06-07 11:14:21', '2021-06-09 09:30:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `name`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Mesin Otomotif', 45, '2021-06-07 02:25:45', '2021-06-09 09:29:22'),
(2, 'Teknik Komputer Kontrol', 45, '2021-06-07 02:25:45', '2021-06-09 09:28:50'),
(3, 'Teknik Listrik', 50, '2021-06-07 02:25:45', '2021-06-09 09:21:15'),
(4, 'Teknik Perkeretaapian', 48, '2021-06-07 02:25:45', '2021-06-09 09:23:50'),
(5, 'Komputer Akuntansi', 40, '2021-06-07 02:25:45', '2021-06-09 09:29:37'),
(6, 'Akuntansi', 40, '2021-06-07 02:25:45', '2021-06-09 09:29:30'),
(7, 'Administrasi Bisnis', 40, '2021-06-07 02:25:45', '2021-06-09 09:29:27'),
(8, 'Bahasa Inggris', 40, '2021-06-07 02:25:45', '2021-06-09 09:29:34'),
(9, 'Teknologi Informasi', 48, '2021-06-07 02:25:45', '2021-06-09 09:23:54');

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
(1, '183307001', 'user1@user.com', '$2y$10$InzqDiIOwcMWVA0UJ/1XseA4BOZy4BcPDgPkL0M2sp2GTpv0JJkFq', 'COZZH2uZ43PkYyI4X5UACvgV9MNEcRbakg5BxfAXwrVOY8s3hYaHNx78HgZM', '2021-06-07 11:06:05', '2021-06-07 11:06:05'),
(2, '183307002', 'user2@user.com', '$2y$10$WViHDYgG9KuXL2O6wch3N.iA9ndKwGWQ89PgJyegHElTaSsB9f.mq', '7WuUfhaIUYz01qzaMbh1pD4RdKEHxmcsw3VCwTFI7mmmXiWPapP1evQOS8hz', '2021-06-07 11:06:06', '2021-06-07 11:06:06'),
(3, '183307003', 'user3@user.com', '$2y$10$EK2kjtqnkZlVLV008QeHdejlZ11dXUvA6.aYjwU6jjPw0IIbEkYd2', 'iUTJWvlLRVL4UvFClRbGU2AXaqIvym9B12Om15vbXoG5atVjShJdJSmlIBEN', '2021-06-07 11:06:06', '2021-06-07 11:06:06'),
(4, '183307004', 'ti4@user.com', '$2y$10$PhMWzFoGSFuUcXM9hqqmC.LCns2njcBkQ8PXqO5s8zg8DAWuMqYQu', 'uCOdKEVQRijfszHvDUmyc9NrEBfSbm4yPXkPcWsmJMa0VStAlDHtr1DWuzdN', '2021-06-07 11:06:06', '2021-06-07 14:21:29'),
(5, '183307005', 'ti5@user.com', '$2y$10$66Q8Asa.Ra/NjjcpcK3x8Ogg2jO4P9t9PwAvUZePHLmM9/ZXGMy5S', 'GhKey4Owx7qVvhc77OxkJkNUcdEiG16SwN4fWq7zu0QMYmWBVRFKrcyiHE9J', '2021-06-07 11:06:06', '2021-06-07 14:23:34'),
(6, '183307006', 'ti6@user.com', '$2y$10$Z3YJ.D/WYd40MYjhJuOyauSSwlvQX4pbtNOzAHoELyKS3ZMPtc8CW', '80BRcoDa3NnFhIf2yUdQdiPs5SUSFRFZhbOKSYUZzopdW2qhaJbmF39jqeoJ', '2021-06-07 11:06:06', '2021-06-07 14:25:38'),
(7, '183307007', 'ti7@user.com', '$2y$10$t637IXIwBqIa9bebsfT4.ubSBDSJ.jUPyjau29pxVt.6CZclZ0cAK', 'F6VKPiRFRa4RPx8XdNjcsWqwtgXD0tJqo3uvmY9UReEpoOeVQFxzJ5PoTeup', '2021-06-07 11:06:07', '2021-06-07 14:28:10'),
(8, '183303001', 'meto1@user.com', '$2y$10$JM3PLjmwmNbNak.5IbL4K.Gzlv2Ga49BbgtBcFl6MVWa1cYaw31ei', 'ynhdYJaZtWOX5uoPmBdvRidpU97T2yMvGVoHu40RaC1ZMAYQQnj7W5bqgUrP', '2021-06-07 11:06:07', '2021-06-08 01:04:38'),
(9, '183303002', 'meto2@user.com', '$2y$10$XGz8C7QrpgRk5wCr3L/JN.iv7wLhVncTftt71Wiqi0l0KrIEVYRFS', 'IJX3MAg4PBpGY2eRNhnsSmJKW4jFWsUwulehHXmbEgGR1XpYc0t2Dq2RecKZ', '2021-06-07 11:06:07', '2021-06-08 01:06:26'),
(10, '183303003', 'meto3@user.com', '$2y$10$rTD52KtSRhzukoNGpLZTZuvYtYQE9tcai2rjbUOOjhnDoPe5/nFhG', 'C1n9t8sYhqNRVLz9M4B0gFdmH4tbUkz3Dt2HQynXYKTujpv5WNR1EYjyp6nS', '2021-06-07 11:06:07', '2021-06-08 01:09:08'),
(11, '183303004', 'meto4@user.com', '$2y$10$pW4fWBX1FQfchz7AlJqCj.u4HDJ74L3Y3Nhpc5In4gNtu6tFBt7v6', 'TgUuL0X7pK0vazgSW8X4HxnoKspJdBEH6Jf6bASnLZ5mMtErp8EQupzwZVAC', '2021-06-07 11:06:08', '2021-06-08 01:11:44'),
(12, '183303005', 'meto5@user.com', '$2y$10$BH3EAb6EvRxTDrB6aQjZ.eY30Azc/CabJGOHRQrw/bHGzviblMGOi', 'hCdSlkNiUu0AUAhlMIbbaH6wLKrDNAUkvmn00IvnlbWqdSDqJbZXFYIlArPZ', '2021-06-07 11:06:08', '2021-06-08 01:14:47'),
(13, '183303006', 'user@user.com', '$2y$10$O9n3En/jX1Jcb3SKkG.ADew0Fz2UN0olspOxk/icFkT9GfXI8ujdi', NULL, '2021-06-07 11:06:08', '2021-06-07 11:06:08'),
(14, '183304001', 'tkk1@user.com', '$2y$10$KyHoSE.7myjb17/tSlyMH.5Bci1OMkXZbcURioOya0BJaiYGJYCdi', 'Oja54udpFg8KwwTPJd2jAiuF8TO0FGhtOxIDOZkqXocumHW9kaRSPvxenwQq', '2021-06-07 11:06:08', '2021-06-08 01:17:08'),
(15, '183304002', 'tkk2@user.com', '$2y$10$Skh4bnJv2gKiwKStmwdix.pWnIL5sfFqJKHXB.SxoRssONFccvjY2', 'ckQqS0DDH1deyiEOgijXwCCUbhCENLtboUBppQIgN5mIUbsvbIbifjGQUJA2', '2021-06-07 11:06:08', '2021-06-08 01:19:04'),
(16, '183304003', 'tkk3@user.com', '$2y$10$JJE2ZExGB1wvRoZaU6dDlO7UsZX2VL1nqbIB4MJg9UDmjzS2Ibyk6', 'Agw1tIJ32CaeDgDNZ39ZiAJXWwMaQjgG1AcF232jqNaQrq2h0bwdzwP7aGv5', '2021-06-07 11:06:08', '2021-06-08 01:20:43'),
(17, '183304004', 'tkk4@user.com', '$2y$10$wggQUsKm2i97DyeKpW5.1es4ndKD0uq/4CcI0blP/LEoFPtL5Gupq', 'Y5BQYoFG5N8bLztvnyqiUbl9RGCSfehabZUG7CIBnS7dhKDAGXwHhF0wF8FD', '2021-06-07 11:06:09', '2021-06-08 01:25:29'),
(18, '183304005', 'user@user.com', '$2y$10$OwOYsDuNzikbu1etrEGVf.UCRq8TpSnRv/fUE4zU/gT547wkTq6z.', NULL, '2021-06-07 11:06:09', '2021-06-07 11:06:09'),
(19, '183304006', 'user@user.com', '$2y$10$NHD6qvIVr1C6IETP19z2qub8onMdB5ZWwZwYtipMaV2eEh8QBjqkW', NULL, '2021-06-07 11:06:09', '2021-06-07 11:06:09'),
(20, '183305001', 'teklis1@user.com', '$2y$10$kezxlk87/xeY0j2XE1rzLedqmENBwjbwmhGv6WFFfQKidRXVDDyDy', 'Dm1bgycAAXPce7Hug2nyJ0jVbEaaBlLO2mMqGPXyijlH1fmWmjwyN3VhKxhj', '2021-06-07 11:06:09', '2021-06-08 01:30:00'),
(21, '183305002', 'teklis2@user.com', '$2y$10$koOIMyJFUpupKve8bP8f7.Xq.TeHtWKF2aqMYjKIryfq1Gtu3ELaa', '9EzMkbYgFh7NCOATdcFgzEnKnPDUi9hgV24twWWNrpk8YEoCDPwYHJhsO5vd', '2021-06-07 11:06:09', '2021-06-08 01:37:51'),
(22, '183305003', 'teklis3@user.com', '$2y$10$gZW2RmFs5k8s5nxtf9hS9OOZdhtNnVnIeaD3fmwy3Q3Uzl534vqk2', 'a5uOKHlbJ4iMDnCxxJPaGBX8pai3TMnlAHBlIvCh74XtS3ajyKXEChkAOYYR', '2021-06-07 11:06:09', '2021-06-08 01:39:20'),
(23, '183305004', 'teklis4@user.com', '$2y$10$kkKQeZFv6FRV2FDFmZ/BReERb5JF9MyuGrQn.3nDrkderHRWvx4Ca', '3qQmwZ8y3LemH6XT7TWrPV2LgU9KkHR0rBfYUV70Rc1spAJXQY48euSSTKHg', '2021-06-07 11:06:10', '2021-06-08 01:41:04'),
(24, '183305005', 'teklis5@user.com', '$2y$10$0SvTcOWBcMTBNeURhiZmoOXrZEYHD8cK7Wj1ZfXNxWw39k3G0vQ7q', 'sdjbyzpvJCXFH9OnRRjhgE6WgmcdLbpui8DvfWgOvxETl9RgnUd0cYLLNDYS', '2021-06-07 11:06:10', '2021-06-08 01:42:54'),
(25, '183305006', 'teklis6@user.com', '$2y$10$IldRDFtn/GrjCUga0u5MWurL6dZ4ZpZzYFhr0a0TCPJjNf.PLgHKG', 'z2lRGNozS1k1j23Cy2uhzeUjGnR5V5suw8ShqIQUrUQPjnFtojhl4yDnFDdY', '2021-06-07 11:06:10', '2021-06-08 01:44:40'),
(26, '183305007', 'user@user.com', '$2y$10$8Jko2B/N9HAX9GeKwUKo5u5H3N/BxV2quP7oSeDRq0KytTseDNfOa', NULL, '2021-06-07 11:06:10', '2021-06-07 11:06:10'),
(27, '183305008', 'user@user.com', '$2y$10$9Fg6fJCyXaM1u/wAcaH2aeHqCV40S2cYXA5Aue7K9UHi1lyhdqU4m', NULL, '2021-06-07 11:06:10', '2021-06-07 11:06:10'),
(28, '183305009', 'user@user.com', '$2y$10$YP/hmYimKw0WBIN1eK/lfOOoyC.oQk5rDP8OC0/6ecVIgBd160.4G', NULL, '2021-06-07 11:06:10', '2021-06-07 11:06:10'),
(29, '183308001', 'tka1@user.com', '$2y$10$UUTp.bVc6rC29iBvP5JNye98VK/ZedEH5bloJxmQi6ABtQe/P4QQy', 'lSLTX7qLRqB0FxXUQPyc0vmFySg8Dt6Wai4z9YWHuqSSsVELbclsJwhwVUWb', '2021-06-07 11:06:11', '2021-06-08 01:49:30'),
(30, '183308002', 'tka2@user.com', '$2y$10$YadveZ6jYBG97/9nFHZlW.RKOBUmkkGFhkqSTlTrkYkpjVqguKDx2', 'I2dkpJ7fwQsrKtE6SNvxfk7IdgOWOOYsi4oIxfk9ZKz3EN2ox7xKYd41y2Jp', '2021-06-07 11:06:11', '2021-06-09 09:03:25'),
(31, '183308003', 'tka3@user.com', '$2y$10$9bltx5YZJ9LPsEAwtc6PquWaeVAHLB0o5kp3q.87Wq1gnXoZ63QdW', 'ESgDqZ777c2U4PmmJjli58Hmyn7gkkl7pvjNGXaIWNNJpRhXFFsXHu6A2CDJ', '2021-06-07 11:06:11', '2021-06-09 09:04:47'),
(32, '183308004', 'tka4@user.com', '$2y$10$m/iQU19Z0wV8LFTHIev2j.A.3KH5uIsxjHq5a2n99ZGHUXT9nuw6q', 'pYf3wfVkwNHq0SsSu4ouYHeOo50FhH9DVAs65ZtNNSbWefw2ig5psCmmGWfV', '2021-06-07 11:06:11', '2021-06-09 09:06:27'),
(33, '183308005', 'user@user.com', '$2y$10$pCn0ZZBjl6Iv4jNMrLTAge2zefrzZzZI5ZflrFUL..dg8PBz5UeHO', NULL, '2021-06-07 11:06:11', '2021-06-07 11:06:11'),
(34, '183308006', 'user@user.com', '$2y$10$Z/2y22kA.ctdJlGYhht97.lGFTd1cZp824TMziTPEi.BndLxvlQ0.', NULL, '2021-06-07 11:06:11', '2021-06-07 11:06:11'),
(35, '183308007', 'user@user.com', '$2y$10$mmtSKQigf7/eEapnPcnPsugicEPuxUDQFWmUNlXOB8q7lc2avtk2O', NULL, '2021-06-07 11:06:11', '2021-06-07 11:06:11'),
(36, '183308008', 'user@user.com', '$2y$10$zAFTu520KP1FEi/.JfcAOuh8CACmpIzlC97qoPU.7XtMKkxcAtBaO', NULL, '2021-06-07 11:06:12', '2021-06-07 11:06:12'),
(37, '183202001', 'ka1@user.com', '$2y$10$DXXXSJ.u7JbrRDK1bkXwh.Vd6cWw.fYGpz2qFjVUmsR5OgSbQy8Jm', 'mIxQAi10SX65yYhOB6Ucg1OSx7raVko1SqCWcdGBU6w1bxhH1orVgnK1FRQc', '2021-06-07 11:06:12', '2021-06-09 09:11:39'),
(38, '183202002', 'ka2@user.com', '$2y$10$wdS3CqLwos21jXCg3g1gkuwI./zqIvGByRIXWQ1XAz/wq9DC5nLvW', 'jUyYIDZF1zk5zwb0ICUFg1q0gYagiAR6l1RGfZK9xkT648O7YticLsauai12', '2021-06-07 11:06:12', '2021-06-09 09:12:54'),
(39, '183202003', 'ka3@user.com', '$2y$10$ehnMTNWb7rFz63LJLsWKiuEpIqumpLrwZFcukx7v0xrS8v7w8bgsK', 'NpQYXfAqmqJNMtJrLJVcRxSTTKK1G6inf0pBJGNcNCwywRu1BSufcHX4SLNR', '2021-06-07 11:06:12', '2021-06-09 09:14:35'),
(40, '183202004', 'user@user.com', '$2y$10$s5FE7K7OHt7OAJWsEvsZPefNLpEY9FCv6vFYTfck75USN8l/6IQba', NULL, '2021-06-07 11:06:12', '2021-06-07 11:06:12'),
(41, '183202005', 'ka5@user.com', '$2y$10$riL1Ue7/xA47UPNj10gEZOT./hG039eQ70eLLIrN6ydyeXtf2EzvO', 'PLolpKaQU13nRZipOQeTqkmA6slOy96E6g9dEXypu0MYFzEuAj2KIKTNi4Ol', '2021-06-07 11:06:13', '2021-06-09 09:25:17'),
(42, '183202006', 'user@user.com', '$2y$10$0FoKgddHxnlYYn2xxJY9r.iGsxp6dwdg0Pq2rcdYGX2tJYm8w/bDe', NULL, '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(43, '183202007', 'user@user.com', '$2y$10$37tOPZhGcXh2rWkYFlJgiefjRBirbGZC8qke2ghhMOjPzPoORTJqO', NULL, '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(44, '183202008', 'user@user.com', '$2y$10$InzL60psA.4EF4k9ZtJf3.8CLkIkVlBm.8P9rhtDgDvtl8iT4xUvS', NULL, '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(45, '183202009', 'user@user.com', '$2y$10$7cdmwamLZJd5mOn3fgk3BOhjiG8pOFrN2Rq7kYYeq7vtJ4A4q2R9K', NULL, '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(46, '183202010', 'user@user.com', '$2y$10$R7NTBfP3QqSUH530d6kJ9e1gwZVDRNpIEykJLPwM.Y1uuPfCQP8m2', NULL, '2021-06-07 11:06:13', '2021-06-07 11:06:13'),
(47, '183209001', 'akuntan1@user.com', '$2y$10$uPYOLbSuUj09ULgKMNEYDuGW4kUXewNuwEFYCV7Tb8vTYLuBSF/Qa', 'zieAtkvfKM2LaCrE30HMdzD9NvpR0K9gL2gozhHw1EE9CabKh5ywd1RNVpLV', '2021-06-07 11:06:14', '2021-06-09 09:15:55'),
(48, '183209002', 'akuntan2@user.com', '$2y$10$0HKCgK2lc/qNAQSNXrO.XOMvpYQNGNKyCxh8v/m4rIf22Z66Kt0zi', 'zEZQtAtOeL3OUKxLsLJ4bOjT9UQhKzIgnEEYLC17c48OKApgRSPATcQCZUF1', '2021-06-07 11:06:14', '2021-06-09 09:18:15'),
(49, '183209003', 'akuntan3@user.com', '$2y$10$aF6ByFBoukRGCFyHhQUD2u3KLLcjsWYioR2D2CKYuX1./06gWn296', '95buDyNKqx9DhVJOY01bfwA8ormVDZV6stE8xiBnbwBOi2AlZu2hMtnhgIgv', '2021-06-07 11:06:14', '2021-06-09 09:27:06'),
(50, '183209004', 'user@user.com', '$2y$10$qtsHnb/4gFqr4TLlTKOL8eA6zeMKnl1fm72oCFinhAn9eUPHw.oEu', NULL, '2021-06-07 11:06:14', '2021-06-07 11:06:14'),
(51, '183209005', 'user@user.com', '$2y$10$4t6fJQIhIt/BZAflWn3/mOV1LJhzxUpFre0L6KzUvwGAxSDiqvHFm', NULL, '2021-06-07 11:06:14', '2021-06-07 11:06:14'),
(52, '183209006', 'user@user.com', '$2y$10$mI4ocvbdIuDPVEgA0HCQmuvDcqvHvjpligEj0DziAeSoUVorIdnCy', NULL, '2021-06-07 11:06:14', '2021-06-07 11:06:14'),
(53, '183101001', 'adbis1@user.com', '$2y$10$iGuf.1qfvK9aJh4n5gyMhelAUXEPBg6aUclL93zqNDRWRTY5MTna.', 'xrl8Voe2XXdZuNkezZ9VePnJm8JxcUhl97EXdUE3SlSX4PPTl4HPS8AK0zzA', '2021-06-07 11:06:14', '2021-06-07 14:32:36'),
(54, '183101002', 'adbis2@user.com', '$2y$10$4eJk4pE5QNjBOFM2LVHjTO/U8TREgeVNJjwfEB7Y8hYVdLrR.hgL6', 'EMlpTgttCKA0VFjV8kROYUcZw6noRvyjfdXroUwYMO9c898lx6sNhPDlvH5d', '2021-06-07 11:06:15', '2021-06-07 14:34:24'),
(55, '183101003', 'adbis3@user.com', '$2y$10$xrjGdcBJkOHLskllshaGcOIV9lbK3bYmxtNF498UNAJuhQqOuK.r6', 'hwz7HGv2OoqKosBp55ZpPMjr5GRz8l7M1gCLqPXXHBSjSYhPfeiRJ5Pa4Ppw', '2021-06-07 11:06:15', '2021-06-07 14:36:41'),
(56, '183101004', 'adbi4@user.com', '$2y$10$1kT./VZwqXDBGEkpB6rgUuKHBlz.YVexV5KUsUrkf8E3bj6OO.S.u', 'WMtmHlebEI5WKu6bYBl4RfkI99FNNmCBlf6soZQ5dTJ8j6CkHopcFdB22lP4', '2021-06-07 11:06:15', '2021-06-07 14:38:41'),
(57, '183101005', 'adbis5@user.com', '$2y$10$n9U1q1kHSiIpb0DZC2nXzOjtIOmHG5Yom2kwouTTDjGvaOlmkjiqa', 'QL4uajw7zQTPmc7qSiixaglyP8kkSJsX8qnUhSeuntjHgGP3AhFlx9KafkJo', '2021-06-07 11:06:15', '2021-06-07 14:40:48'),
(58, '183106001', 'inggris1@user.com', '$2y$10$iYcUHysIbl9SWyr0UOs2w.x3MK/zc4qMO2.BFDTArBFfg.arVSJ4K', 'xbTkNrbpxOMkf082YldlPgyEgSKIfQyPFhU4bDl2mwFGsdkc5kSB8WGHbK3P', '2021-06-07 11:06:15', '2021-06-07 14:43:52'),
(59, '183106002', 'inggris2@user.com', '$2y$10$HlIOl/Ba951I6PcCCMFYtuBi/X64j5/QpkIswHswj1t6N3jtPEuE2', 'mrFF1YaUktzDispvZgthdzHwjpYDW2RzFKwYw8IM81NwIwzIRFOt0ylT4RY0', '2021-06-07 11:06:15', '2021-06-07 14:45:39'),
(60, '183106003', 'inggris3@user.com', '$2y$10$vNBHb.lx2YLDK61EFjQyr.Hb1hRZT0aWM4yOdKPN0hy093PBflBlO', 'CyasdlCV8OY2AAejjqJa5ik9nVWhzddSGvkmZ9QsQTGagbPE2Py8tU8XfGXS', '2021-06-07 11:06:16', '2021-06-07 14:47:28'),
(61, '183106004', 'inggris4@user.com', '$2y$10$rHifF0z5QUnk/mKzLcltuu2xIRuREg4mJ/bqCcmSVdyrMR7XbrsWC', 'vx1Og5lyeyxLJt4Bp8tzq5orHDm4ZfiCoHPE1vqM8kmNcG7jFENPYywCYlHo', '2021-06-07 11:06:16', '2021-06-07 14:50:26'),
(62, '183106005', 'inggris5@user.com', '$2y$10$uKdAnrmQA.NUViNl0QfZ.eVzFF.4I.FDFWuiNwFLkY5vjhIIOVwTC', 'Z6yeqYmgt6k1YbkZYayOp6nzqG0hT3eAocEhJ5l4xKCPfVdxI1w5fxUtutqp', '2021-06-07 11:06:16', '2021-06-07 14:55:53'),
(63, '183106006', 'user@user.com', '$2y$10$.WwcFzfshs0pu.w5IcOcS.JRv.pXnWkHqLu1kVhzvRbYES0aKL2X6', NULL, '2021-06-07 11:06:16', '2021-06-07 11:06:16'),
(64, '183106007', 'user@user.com', '$2y$10$1efeYHnFG4gkx1SOejWB.eu50wm92rmD/4K67qfmhvQBEJ4CnZVXS', NULL, '2021-06-07 11:06:16', '2021-06-07 11:06:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_periods`
--

CREATE TABLE `user_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `period_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_periods`
--

INSERT INTO `user_periods` (`id`, `user_id`, `period_id`, `created_at`, `updated_at`) VALUES
(1, 1, 24, '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(2, 2, 24, '2021-06-07 14:15:59', '2021-06-07 14:15:59'),
(3, 3, 24, '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(4, 4, 24, '2021-06-07 14:22:51', '2021-06-07 14:22:51'),
(5, 5, 24, '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(6, 6, 24, '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(7, 7, 24, '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(8, 53, 24, '2021-06-07 14:33:43', '2021-06-07 14:33:43'),
(9, 54, 24, '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(10, 55, 24, '2021-06-07 14:37:45', '2021-06-07 14:37:45'),
(11, 56, 24, '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(12, 57, 24, '2021-06-07 14:42:40', '2021-06-07 14:42:40'),
(19, 58, 24, '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(20, 59, 24, '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(21, 60, 24, '2021-06-08 00:42:34', '2021-06-08 00:42:34'),
(22, 61, 24, '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(23, 62, 24, '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(24, 8, 24, '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(25, 9, 24, '2021-06-08 01:08:10', '2021-06-08 01:08:10'),
(26, 10, 24, '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(27, 11, 24, '2021-06-08 01:12:33', '2021-06-08 01:12:33'),
(28, 12, 24, '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(29, 14, 24, '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(30, 15, 24, '2021-06-08 01:20:12', '2021-06-08 01:20:12'),
(31, 16, 24, '2021-06-08 01:23:13', '2021-06-08 01:23:13'),
(32, 17, 24, '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(33, 20, 24, '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(34, 21, 24, '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(35, 22, 24, '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(36, 23, 24, '2021-06-08 01:41:45', '2021-06-08 01:41:45'),
(37, 24, 24, '2021-06-08 01:43:48', '2021-06-08 01:43:48'),
(38, 25, 24, '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(39, 29, 24, '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(40, 30, 24, '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(41, 31, 24, '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(42, 32, 24, '2021-06-09 09:07:12', '2021-06-09 09:07:12'),
(43, 37, 24, '2021-06-09 09:12:23', '2021-06-09 09:12:23'),
(44, 38, 24, '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(45, 39, 24, '2021-06-09 09:15:17', '2021-06-09 09:15:17'),
(46, 47, 24, '2021-06-09 09:16:38', '2021-06-09 09:16:38'),
(47, 48, 24, '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(48, 41, 24, '2021-06-09 09:25:58', '2021-06-09 09:25:58'),
(49, 49, 24, '2021-06-09 09:28:10', '2021-06-09 09:28:10');

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
(1, 24, 1, 1, '1', '183307001_IPK.pdf', '2021-06-07 14:12:19', '2021-06-07 14:12:19'),
(2, 24, 10, 1, '-', '183307001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:12:19', '2021-06-07 14:12:19'),
(3, 24, 2, 1, '0.25', '183307001_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(4, 24, 3, 1, '0.25', '183307001_Tanggungan Orang Tua.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(5, 24, 4, 1, '1', '183307001_Prestasi / Organisasi.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(6, 24, 5, 1, '-', '183307001_Surat Permohonan.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(7, 24, 6, 1, '-', '183307001_Scan KTM.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(8, 24, 7, 1, '-', '183307001_Scan Surat Pernyataan.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(9, 24, 8, 1, '-', '183307001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(10, 24, 9, 1, '-', '183307001_Scan KTP Orang Tua.pdf', '2021-06-07 14:12:20', '2021-06-07 14:12:20'),
(11, 24, 1, 2, '0.5', '183307002_IPK.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(12, 24, 10, 2, '-', '183307002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(13, 24, 2, 2, '0.75', '183307002_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(14, 24, 3, 2, '0.25', '183307002_Tanggungan Orang Tua.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(15, 24, 4, 2, '1', '183307002_Prestasi / Organisasi.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(16, 24, 5, 2, '-', '183307002_Surat Permohonan.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(17, 24, 6, 2, '-', '183307002_Scan KTM.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(18, 24, 7, 2, '-', '183307002_Scan Surat Pernyataan.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(19, 24, 8, 2, '-', '183307002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(20, 24, 9, 2, '-', '183307002_Scan KTP Orang Tua.pdf', '2021-06-07 14:15:58', '2021-06-07 14:15:58'),
(21, 24, 1, 3, '0.75', '183307003_IPK.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(22, 24, 10, 3, '-', '183307003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(23, 24, 2, 3, '0.5', '183307003_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(24, 24, 3, 3, '0.25', '183307003_Tanggungan Orang Tua.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(25, 24, 4, 3, '0.5', '183307003_Prestasi / Organisasi.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(26, 24, 5, 3, '-', '183307003_Surat Permohonan.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(27, 24, 6, 3, '-', '183307003_Scan KTM.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(28, 24, 7, 3, '-', '183307003_Scan Surat Pernyataan.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(29, 24, 8, 3, '-', '183307003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(30, 24, 9, 3, '-', '183307003_Scan KTP Orang Tua.pdf', '2021-06-07 14:19:35', '2021-06-07 14:19:35'),
(31, 24, 1, 4, '0.25', '183307004_IPK.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(32, 24, 10, 4, '-', '183307004_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(33, 24, 2, 4, '0.75', '183307004_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(34, 24, 3, 4, '0.5', '183307004_Tanggungan Orang Tua.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(35, 24, 4, 4, '0.5', '183307004_Prestasi / Organisasi.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(36, 24, 5, 4, '-', '183307004_Surat Permohonan.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(37, 24, 6, 4, '-', '183307004_Scan KTM.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(38, 24, 7, 4, '-', '183307004_Scan Surat Pernyataan.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(39, 24, 8, 4, '-', '183307004_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:22:50', '2021-06-07 14:22:50'),
(40, 24, 9, 4, '-', '183307004_Scan KTP Orang Tua.pdf', '2021-06-07 14:22:51', '2021-06-07 14:22:51'),
(41, 24, 1, 5, '1', '183307005_IPK.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(42, 24, 10, 5, '-', '183307005_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(43, 24, 2, 5, '0.5', '183307005_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(44, 24, 3, 5, '0.5', '183307005_Tanggungan Orang Tua.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(45, 24, 4, 5, '1', '183307005_Prestasi / Organisasi.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(46, 24, 5, 5, '-', '183307005_Surat Permohonan.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(47, 24, 6, 5, '-', '183307005_Scan KTM.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(48, 24, 7, 5, '-', '183307005_Scan Surat Pernyataan.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(49, 24, 8, 5, '-', '183307005_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(50, 24, 9, 5, '-', '183307005_Scan KTP Orang Tua.pdf', '2021-06-07 14:25:02', '2021-06-07 14:25:02'),
(51, 24, 1, 6, '0.75', '183307006_IPK.pdf', '2021-06-07 14:27:24', '2021-06-07 14:27:24'),
(52, 24, 10, 6, '-', '183307006_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:27:24', '2021-06-07 14:27:24'),
(53, 24, 2, 6, '1', '183307006_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(54, 24, 3, 6, '0.75', '183307006_Tanggungan Orang Tua.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(55, 24, 4, 6, '0.5', '183307006_Prestasi / Organisasi.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(56, 24, 5, 6, '-', '183307006_Surat Permohonan.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(57, 24, 6, 6, '-', '183307006_Scan KTM.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(58, 24, 7, 6, '-', '183307006_Scan Surat Pernyataan.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(59, 24, 8, 6, '-', '183307006_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(60, 24, 9, 6, '-', '183307006_Scan KTP Orang Tua.pdf', '2021-06-07 14:27:25', '2021-06-07 14:27:25'),
(61, 24, 1, 7, '0.75', '183307007_IPK.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(62, 24, 10, 7, '-', '183307007_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(63, 24, 2, 7, '0.75', '183307007_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(64, 24, 3, 7, '0.75', '183307007_Tanggungan Orang Tua.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(65, 24, 4, 7, '0.5', '183307007_Prestasi / Organisasi.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(66, 24, 5, 7, '-', '183307007_Surat Permohonan.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(67, 24, 6, 7, '-', '183307007_Scan KTM.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(68, 24, 7, 7, '-', '183307007_Scan Surat Pernyataan.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(69, 24, 8, 7, '-', '183307007_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(70, 24, 9, 7, '-', '183307007_Scan KTP Orang Tua.pdf', '2021-06-07 14:29:05', '2021-06-07 14:29:05'),
(71, 24, 1, 53, '0.5', '183101001_IPK.pdf', '2021-06-07 14:33:42', '2021-06-07 14:33:42'),
(72, 24, 10, 53, '-', '183101001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:33:42', '2021-06-07 14:33:42'),
(73, 24, 2, 53, '1', '183101001_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:33:42', '2021-06-07 14:33:42'),
(74, 24, 3, 53, '0.75', '183101001_Tanggungan Orang Tua.pdf', '2021-06-07 14:33:42', '2021-06-07 14:33:42'),
(75, 24, 4, 53, '0.5', '183101001_Prestasi / Organisasi.pdf', '2021-06-07 14:33:42', '2021-06-07 14:33:42'),
(76, 24, 5, 53, '-', '183101001_Surat Permohonan.pdf', '2021-06-07 14:33:43', '2021-06-07 14:33:43'),
(77, 24, 6, 53, '-', '183101001_Scan KTM.pdf', '2021-06-07 14:33:43', '2021-06-07 14:33:43'),
(78, 24, 7, 53, '-', '183101001_Scan Surat Pernyataan.pdf', '2021-06-07 14:33:43', '2021-06-07 14:33:43'),
(79, 24, 8, 53, '-', '183101001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:33:43', '2021-06-07 14:33:43'),
(80, 24, 9, 53, '-', '183101001_Scan KTP Orang Tua.pdf', '2021-06-07 14:33:43', '2021-06-07 14:33:43'),
(81, 24, 1, 54, '1', '183101002_IPK.pdf', '2021-06-07 14:35:19', '2021-06-07 14:35:19'),
(82, 24, 10, 54, '-', '183101002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(83, 24, 2, 54, '0.75', '183101002_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(84, 24, 3, 54, '0.5', '183101002_Tanggungan Orang Tua.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(85, 24, 4, 54, '1', '183101002_Prestasi / Organisasi.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(86, 24, 5, 54, '-', '183101002_Surat Permohonan.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(87, 24, 6, 54, '-', '183101002_Scan KTM.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(88, 24, 7, 54, '-', '183101002_Scan Surat Pernyataan.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(89, 24, 8, 54, '-', '183101002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(90, 24, 9, 54, '-', '183101002_Scan KTP Orang Tua.pdf', '2021-06-07 14:35:20', '2021-06-07 14:35:20'),
(91, 24, 1, 55, '0.75', '183101003_IPK.pdf', '2021-06-07 14:37:44', '2021-06-07 14:37:44'),
(92, 24, 10, 55, '-', '183101003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:37:44', '2021-06-07 14:37:44'),
(93, 24, 2, 55, '0.75', '183101003_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:37:44', '2021-06-07 14:37:44'),
(94, 24, 3, 55, '0.75', '183101003_Tanggungan Orang Tua.pdf', '2021-06-07 14:37:44', '2021-06-07 14:37:44'),
(95, 24, 4, 55, '0.5', '183101003_Prestasi / Organisasi.pdf', '2021-06-07 14:37:44', '2021-06-07 14:37:44'),
(96, 24, 5, 55, '-', '183101003_Surat Permohonan.pdf', '2021-06-07 14:37:44', '2021-06-07 14:37:44'),
(97, 24, 6, 55, '-', '183101003_Scan KTM.pdf', '2021-06-07 14:37:45', '2021-06-07 14:37:45'),
(98, 24, 7, 55, '-', '183101003_Scan Surat Pernyataan.pdf', '2021-06-07 14:37:45', '2021-06-07 14:37:45'),
(99, 24, 8, 55, '-', '183101003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:37:45', '2021-06-07 14:37:45'),
(100, 24, 9, 55, '-', '183101003_Scan KTP Orang Tua.pdf', '2021-06-07 14:37:45', '2021-06-07 14:37:45'),
(101, 24, 1, 56, '0.5', '183101004_IPK.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(102, 24, 10, 56, '-', '183101004_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(103, 24, 2, 56, '0.25', '183101004_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(104, 24, 3, 56, '0.75', '183101004_Tanggungan Orang Tua.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(105, 24, 4, 56, '0.5', '183101004_Prestasi / Organisasi.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(106, 24, 5, 56, '-', '183101004_Surat Permohonan.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(107, 24, 6, 56, '-', '183101004_Scan KTM.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(108, 24, 7, 56, '-', '183101004_Scan Surat Pernyataan.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(109, 24, 8, 56, '-', '183101004_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(110, 24, 9, 56, '-', '183101004_Scan KTP Orang Tua.pdf', '2021-06-07 14:40:00', '2021-06-07 14:40:00'),
(111, 24, 1, 57, '0.75', '183101005_IPK.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(112, 24, 10, 57, '-', '183101005_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(113, 24, 2, 57, '0.75', '183101005_Total Penghasilan Orang Tua.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(114, 24, 3, 57, '0.75', '183101005_Tanggungan Orang Tua.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(115, 24, 4, 57, '0.5', '183101005_Prestasi / Organisasi.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(116, 24, 5, 57, '-', '183101005_Surat Permohonan.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(117, 24, 6, 57, '-', '183101005_Scan KTM.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(118, 24, 7, 57, '-', '183101005_Scan Surat Pernyataan.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(119, 24, 8, 57, '-', '183101005_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(120, 24, 9, 57, '-', '183101005_Scan KTP Orang Tua.pdf', '2021-06-07 14:42:39', '2021-06-07 14:42:39'),
(181, 24, 1, 58, '0.75', '183106001_IPK.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(182, 24, 10, 58, '-', '183106001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(183, 24, 2, 58, '0.5', '183106001_Total Penghasilan Orang Tua.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(184, 24, 3, 58, '0.5', '183106001_Tanggungan Orang Tua.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(185, 24, 4, 58, '1', '183106001_Prestasi / Organisasi.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(186, 24, 5, 58, '-', '183106001_Surat Permohonan.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(187, 24, 6, 58, '-', '183106001_Scan KTM.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(188, 24, 7, 58, '-', '183106001_Scan Surat Pernyataan.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(189, 24, 8, 58, '-', '183106001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(190, 24, 9, 58, '-', '183106001_Scan KTP Orang Tua.pdf', '2021-06-08 00:39:42', '2021-06-08 00:39:42'),
(191, 24, 1, 59, '0.5', '183106002_IPK.pdf', '2021-06-08 00:40:31', '2021-06-08 00:40:31'),
(192, 24, 10, 59, '-', '183106002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(193, 24, 2, 59, '0.5', '183106002_Total Penghasilan Orang Tua.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(194, 24, 3, 59, '0.5', '183106002_Tanggungan Orang Tua.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(195, 24, 4, 59, '0.5', '183106002_Prestasi / Organisasi.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(196, 24, 5, 59, '-', '183106002_Surat Permohonan.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(197, 24, 6, 59, '-', '183106002_Scan KTM.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(198, 24, 7, 59, '-', '183106002_Scan Surat Pernyataan.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(199, 24, 8, 59, '-', '183106002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(200, 24, 9, 59, '-', '183106002_Scan KTP Orang Tua.pdf', '2021-06-08 00:40:32', '2021-06-08 00:40:32'),
(201, 24, 1, 60, '0.75', '183106003_IPK.pdf', '2021-06-08 00:42:33', '2021-06-08 00:42:33'),
(202, 24, 10, 60, '-', '183106003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 00:42:33', '2021-06-08 00:42:33'),
(203, 24, 2, 60, '0.75', '183106003_Total Penghasilan Orang Tua.pdf', '2021-06-08 00:42:33', '2021-06-08 00:42:33'),
(204, 24, 3, 60, '0.75', '183106003_Tanggungan Orang Tua.pdf', '2021-06-08 00:42:33', '2021-06-08 00:42:33'),
(205, 24, 4, 60, '0.5', '183106003_Prestasi / Organisasi.pdf', '2021-06-08 00:42:34', '2021-06-08 00:42:34'),
(206, 24, 5, 60, '-', '183106003_Surat Permohonan.pdf', '2021-06-08 00:42:34', '2021-06-08 00:42:34'),
(207, 24, 6, 60, '-', '183106003_Scan KTM.pdf', '2021-06-08 00:42:34', '2021-06-08 00:42:34'),
(208, 24, 7, 60, '-', '183106003_Scan Surat Pernyataan.pdf', '2021-06-08 00:42:34', '2021-06-08 00:42:34'),
(209, 24, 8, 60, '-', '183106003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 00:42:34', '2021-06-08 00:42:34'),
(210, 24, 9, 60, '-', '183106003_Scan KTP Orang Tua.pdf', '2021-06-08 00:42:34', '2021-06-08 00:42:34'),
(211, 24, 1, 61, '0.5', '183106004_IPK.pdf', '2021-06-08 00:43:55', '2021-06-08 00:43:55'),
(212, 24, 10, 61, '-', '183106004_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(213, 24, 2, 61, '0.25', '183106004_Total Penghasilan Orang Tua.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(214, 24, 3, 61, '0.5', '183106004_Tanggungan Orang Tua.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(215, 24, 4, 61, '0.5', '183106004_Prestasi / Organisasi.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(216, 24, 5, 61, '-', '183106004_Surat Permohonan.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(217, 24, 6, 61, '-', '183106004_Scan KTM.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(218, 24, 7, 61, '-', '183106004_Scan Surat Pernyataan.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(219, 24, 8, 61, '-', '183106004_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(220, 24, 9, 61, '-', '183106004_Scan KTP Orang Tua.pdf', '2021-06-08 00:43:56', '2021-06-08 00:43:56'),
(221, 24, 1, 62, '0.25', '183106005_IPK.pdf', '2021-06-08 00:44:57', '2021-06-08 00:44:57'),
(222, 24, 10, 62, '-', '183106005_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 00:44:57', '2021-06-08 00:44:57'),
(223, 24, 2, 62, '0.5', '183106005_Total Penghasilan Orang Tua.pdf', '2021-06-08 00:44:57', '2021-06-08 00:44:57'),
(224, 24, 3, 62, '0.5', '183106005_Tanggungan Orang Tua.pdf', '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(225, 24, 4, 62, '1', '183106005_Prestasi / Organisasi.pdf', '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(226, 24, 5, 62, '-', '183106005_Surat Permohonan.pdf', '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(227, 24, 6, 62, '-', '183106005_Scan KTM.pdf', '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(228, 24, 7, 62, '-', '183106005_Scan Surat Pernyataan.pdf', '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(229, 24, 8, 62, '-', '183106005_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(230, 24, 9, 62, '-', '183106005_Scan KTP Orang Tua.pdf', '2021-06-08 00:44:58', '2021-06-08 00:44:58'),
(231, 24, 1, 8, '0.25', '183303001_IPK.pdf', '2021-06-08 01:06:01', '2021-06-08 01:06:01'),
(232, 24, 10, 8, '-', '183303001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:06:01', '2021-06-08 01:06:01'),
(233, 24, 2, 8, '0.5', '183303001_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(234, 24, 3, 8, '0.25', '183303001_Tanggungan Orang Tua.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(235, 24, 4, 8, '0.5', '183303001_Prestasi / Organisasi.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(236, 24, 5, 8, '-', '183303001_Surat Permohonan.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(237, 24, 6, 8, '-', '183303001_Scan KTM.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(238, 24, 7, 8, '-', '183303001_Scan Surat Pernyataan.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(239, 24, 8, 8, '-', '183303001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(240, 24, 9, 8, '-', '183303001_Scan KTP Orang Tua.pdf', '2021-06-08 01:06:02', '2021-06-08 01:06:02'),
(241, 24, 1, 9, '0.75', '183303002_IPK.pdf', '2021-06-08 01:08:09', '2021-06-08 01:08:09'),
(242, 24, 10, 9, '-', '183303002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:08:09', '2021-06-08 01:08:09'),
(243, 24, 2, 9, '0.25', '183303002_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:08:09', '2021-06-08 01:08:09'),
(244, 24, 3, 9, '0.5', '183303002_Tanggungan Orang Tua.pdf', '2021-06-08 01:08:09', '2021-06-08 01:08:09'),
(245, 24, 4, 9, '0.5', '183303002_Prestasi / Organisasi.pdf', '2021-06-08 01:08:09', '2021-06-08 01:08:09'),
(246, 24, 5, 9, '-', '183303002_Surat Permohonan.pdf', '2021-06-08 01:08:09', '2021-06-08 01:08:09'),
(247, 24, 6, 9, '-', '183303002_Scan KTM.pdf', '2021-06-08 01:08:10', '2021-06-08 01:08:10'),
(248, 24, 7, 9, '-', '183303002_Scan Surat Pernyataan.pdf', '2021-06-08 01:08:10', '2021-06-08 01:08:10'),
(249, 24, 8, 9, '-', '183303002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:08:10', '2021-06-08 01:08:10'),
(250, 24, 9, 9, '-', '183303002_Scan KTP Orang Tua.pdf', '2021-06-08 01:08:10', '2021-06-08 01:08:10'),
(251, 24, 1, 10, '0.75', '183303003_IPK.pdf', '2021-06-08 01:10:16', '2021-06-08 01:10:16'),
(252, 24, 10, 10, '-', '183303003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:10:16', '2021-06-08 01:10:16'),
(253, 24, 2, 10, '0.75', '183303003_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:10:16', '2021-06-08 01:10:16'),
(254, 24, 3, 10, '0.25', '183303003_Tanggungan Orang Tua.pdf', '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(255, 24, 4, 10, '0.5', '183303003_Prestasi / Organisasi.pdf', '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(256, 24, 5, 10, '-', '183303003_Surat Permohonan.pdf', '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(257, 24, 6, 10, '-', '183303003_Scan KTM.pdf', '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(258, 24, 7, 10, '-', '183303003_Scan Surat Pernyataan.pdf', '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(259, 24, 8, 10, '-', '183303003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(260, 24, 9, 10, '-', '183303003_Scan KTP Orang Tua.pdf', '2021-06-08 01:10:17', '2021-06-08 01:10:17'),
(261, 24, 1, 11, '0.5', '183303004_IPK.pdf', '2021-06-08 01:12:32', '2021-06-08 01:12:32'),
(262, 24, 10, 11, '-', '183303004_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:12:32', '2021-06-08 01:12:32'),
(263, 24, 2, 11, '1', '183303004_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:12:32', '2021-06-08 01:12:32'),
(264, 24, 3, 11, '0.5', '183303004_Tanggungan Orang Tua.pdf', '2021-06-08 01:12:32', '2021-06-08 01:12:32'),
(265, 24, 4, 11, '1', '183303004_Prestasi / Organisasi.pdf', '2021-06-08 01:12:33', '2021-06-08 01:12:33'),
(266, 24, 5, 11, '-', '183303004_Surat Permohonan.pdf', '2021-06-08 01:12:33', '2021-06-08 01:12:33'),
(267, 24, 6, 11, '-', '183303004_Scan KTM.pdf', '2021-06-08 01:12:33', '2021-06-08 01:12:33'),
(268, 24, 7, 11, '-', '183303004_Scan Surat Pernyataan.pdf', '2021-06-08 01:12:33', '2021-06-08 01:12:33'),
(269, 24, 8, 11, '-', '183303004_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:12:33', '2021-06-08 01:12:33'),
(270, 24, 9, 11, '-', '183303004_Scan KTP Orang Tua.pdf', '2021-06-08 01:12:33', '2021-06-08 01:12:33'),
(271, 24, 1, 12, '0.75', '183303005_IPK.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(272, 24, 10, 12, '-', '183303005_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(273, 24, 2, 12, '0.75', '183303005_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(274, 24, 3, 12, '0.75', '183303005_Tanggungan Orang Tua.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(275, 24, 4, 12, '1', '183303005_Prestasi / Organisasi.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(276, 24, 5, 12, '-', '183303005_Surat Permohonan.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(277, 24, 6, 12, '-', '183303005_Scan KTM.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(278, 24, 7, 12, '-', '183303005_Scan Surat Pernyataan.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(279, 24, 8, 12, '-', '183303005_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(280, 24, 9, 12, '-', '183303005_Scan KTP Orang Tua.pdf', '2021-06-08 01:15:32', '2021-06-08 01:15:32'),
(281, 24, 1, 14, '0.5', '183304001_IPK.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(282, 24, 10, 14, '-', '183304001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(283, 24, 2, 14, '0.5', '183304001_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(284, 24, 3, 14, '0.25', '183304001_Tanggungan Orang Tua.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(285, 24, 4, 14, '1', '183304001_Prestasi / Organisasi.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(286, 24, 5, 14, '-', '183304001_Surat Permohonan.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(287, 24, 6, 14, '-', '183304001_Scan KTM.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(288, 24, 7, 14, '-', '183304001_Scan Surat Pernyataan.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(289, 24, 8, 14, '-', '183304001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(290, 24, 9, 14, '-', '183304001_Scan KTP Orang Tua.pdf', '2021-06-08 01:18:05', '2021-06-08 01:18:05'),
(291, 24, 1, 15, '1', '183304002_IPK.pdf', '2021-06-08 01:20:11', '2021-06-08 01:20:11'),
(292, 24, 10, 15, '-', '183304002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:20:11', '2021-06-08 01:20:11'),
(293, 24, 2, 15, '1', '183304002_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:20:11', '2021-06-08 01:20:11'),
(294, 24, 3, 15, '0.5', '183304002_Tanggungan Orang Tua.pdf', '2021-06-08 01:20:11', '2021-06-08 01:20:11'),
(295, 24, 4, 15, '1', '183304002_Prestasi / Organisasi.pdf', '2021-06-08 01:20:11', '2021-06-08 01:20:11'),
(296, 24, 5, 15, '-', '183304002_Surat Permohonan.pdf', '2021-06-08 01:20:12', '2021-06-08 01:20:12'),
(297, 24, 6, 15, '-', '183304002_Scan KTM.pdf', '2021-06-08 01:20:12', '2021-06-08 01:20:12'),
(298, 24, 7, 15, '-', '183304002_Scan Surat Pernyataan.pdf', '2021-06-08 01:20:12', '2021-06-08 01:20:12'),
(299, 24, 8, 15, '-', '183304002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:20:12', '2021-06-08 01:20:12'),
(300, 24, 9, 15, '-', '183304002_Scan KTP Orang Tua.pdf', '2021-06-08 01:20:12', '2021-06-08 01:20:12'),
(301, 24, 1, 16, '0.5', '183304003_IPK.pdf', '2021-06-08 01:23:12', '2021-06-08 01:23:12'),
(302, 24, 10, 16, '-', '183304003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:23:12', '2021-06-08 01:23:12'),
(303, 24, 2, 16, '0.75', '183304003_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:23:12', '2021-06-08 01:23:12'),
(304, 24, 3, 16, '0.75', '183304003_Tanggungan Orang Tua.pdf', '2021-06-08 01:23:12', '2021-06-08 01:23:12'),
(305, 24, 4, 16, '0.5', '183304003_Prestasi / Organisasi.pdf', '2021-06-08 01:23:12', '2021-06-08 01:23:12'),
(306, 24, 5, 16, '-', '183304003_Surat Permohonan.pdf', '2021-06-08 01:23:12', '2021-06-08 01:23:12'),
(307, 24, 6, 16, '-', '183304003_Scan KTM.pdf', '2021-06-08 01:23:13', '2021-06-08 01:23:13'),
(308, 24, 7, 16, '-', '183304003_Scan Surat Pernyataan.pdf', '2021-06-08 01:23:13', '2021-06-08 01:23:13'),
(309, 24, 8, 16, '-', '183304003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:23:13', '2021-06-08 01:23:13'),
(310, 24, 9, 16, '-', '183304003_Scan KTP Orang Tua.pdf', '2021-06-08 01:23:13', '2021-06-08 01:23:13'),
(311, 24, 1, 17, '1', '183304004_IPK.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(312, 24, 10, 17, '-', '183304004_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(313, 24, 2, 17, '0.75', '183304004_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(314, 24, 3, 17, '0.25', '183304004_Tanggungan Orang Tua.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(315, 24, 4, 17, '1', '183304004_Prestasi / Organisasi.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(316, 24, 5, 17, '-', '183304004_Surat Permohonan.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(317, 24, 6, 17, '-', '183304004_Scan KTM.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(318, 24, 7, 17, '-', '183304004_Scan Surat Pernyataan.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(319, 24, 8, 17, '-', '183304004_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(320, 24, 9, 17, '-', '183304004_Scan KTP Orang Tua.pdf', '2021-06-08 01:26:58', '2021-06-08 01:26:58'),
(321, 24, 1, 20, '0.75', '183305001_IPK.pdf', '2021-06-08 01:32:43', '2021-06-08 01:32:43'),
(322, 24, 10, 20, '-', '183305001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:32:43', '2021-06-08 01:32:43'),
(323, 24, 2, 20, '0.75', '183305001_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:32:43', '2021-06-08 01:32:43'),
(324, 24, 3, 20, '0.5', '183305001_Tanggungan Orang Tua.pdf', '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(325, 24, 4, 20, '0.5', '183305001_Prestasi / Organisasi.pdf', '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(326, 24, 5, 20, '-', '183305001_Surat Permohonan.pdf', '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(327, 24, 6, 20, '-', '183305001_Scan KTM.pdf', '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(328, 24, 7, 20, '-', '183305001_Scan Surat Pernyataan.pdf', '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(329, 24, 8, 20, '-', '183305001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(330, 24, 9, 20, '-', '183305001_Scan KTP Orang Tua.pdf', '2021-06-08 01:32:44', '2021-06-08 01:32:44'),
(331, 24, 1, 21, '0.5', '183305002_IPK.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(332, 24, 10, 21, '-', '183305002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(333, 24, 2, 21, '0.75', '183305002_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(334, 24, 3, 21, '0.25', '183305002_Tanggungan Orang Tua.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(335, 24, 4, 21, '0.5', '183305002_Prestasi / Organisasi.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(336, 24, 5, 21, '-', '183305002_Surat Permohonan.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(337, 24, 6, 21, '-', '183305002_Scan KTM.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(338, 24, 7, 21, '-', '183305002_Scan Surat Pernyataan.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(339, 24, 8, 21, '-', '183305002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(340, 24, 9, 21, '-', '183305002_Scan KTP Orang Tua.pdf', '2021-06-08 01:38:51', '2021-06-08 01:38:51'),
(341, 24, 1, 22, '0.75', '183305003_IPK.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(342, 24, 10, 22, '-', '183305003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(343, 24, 2, 22, '1', '183305003_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(344, 24, 3, 22, '0.25', '183305003_Tanggungan Orang Tua.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(345, 24, 4, 22, '1', '183305003_Prestasi / Organisasi.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(346, 24, 5, 22, '-', '183305003_Surat Permohonan.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(347, 24, 6, 22, '-', '183305003_Scan KTM.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(348, 24, 7, 22, '-', '183305003_Scan Surat Pernyataan.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(349, 24, 8, 22, '-', '183305003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(350, 24, 9, 22, '-', '183305003_Scan KTP Orang Tua.pdf', '2021-06-08 01:40:07', '2021-06-08 01:40:07'),
(351, 24, 1, 23, '0.5', '183305004_IPK.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(352, 24, 10, 23, '-', '183305004_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(353, 24, 2, 23, '0.5', '183305004_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(354, 24, 3, 23, '0.5', '183305004_Tanggungan Orang Tua.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(355, 24, 4, 23, '0.5', '183305004_Prestasi / Organisasi.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(356, 24, 5, 23, '-', '183305004_Surat Permohonan.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(357, 24, 6, 23, '-', '183305004_Scan KTM.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(358, 24, 7, 23, '-', '183305004_Scan Surat Pernyataan.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(359, 24, 8, 23, '-', '183305004_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(360, 24, 9, 23, '-', '183305004_Scan KTP Orang Tua.pdf', '2021-06-08 01:41:44', '2021-06-08 01:41:44'),
(361, 24, 1, 24, '0.5', '183305005_IPK.pdf', '2021-06-08 01:43:47', '2021-06-08 01:43:47'),
(362, 24, 10, 24, '-', '183305005_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:43:47', '2021-06-08 01:43:47'),
(363, 24, 2, 24, '0.5', '183305005_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:43:47', '2021-06-08 01:43:47'),
(364, 24, 3, 24, '0.25', '183305005_Tanggungan Orang Tua.pdf', '2021-06-08 01:43:47', '2021-06-08 01:43:47'),
(365, 24, 4, 24, '1', '183305005_Prestasi / Organisasi.pdf', '2021-06-08 01:43:47', '2021-06-08 01:43:47'),
(366, 24, 5, 24, '-', '183305005_Surat Permohonan.pdf', '2021-06-08 01:43:47', '2021-06-08 01:43:47'),
(367, 24, 6, 24, '-', '183305005_Scan KTM.pdf', '2021-06-08 01:43:48', '2021-06-08 01:43:48'),
(368, 24, 7, 24, '-', '183305005_Scan Surat Pernyataan.pdf', '2021-06-08 01:43:48', '2021-06-08 01:43:48'),
(369, 24, 8, 24, '-', '183305005_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:43:48', '2021-06-08 01:43:48'),
(370, 24, 9, 24, '-', '183305005_Scan KTP Orang Tua.pdf', '2021-06-08 01:43:48', '2021-06-08 01:43:48'),
(371, 24, 1, 25, '0.5', '183305006_IPK.pdf', '2021-06-08 01:46:22', '2021-06-08 01:46:22'),
(372, 24, 10, 25, '-', '183305006_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(373, 24, 2, 25, '0.75', '183305006_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(374, 24, 3, 25, '0.5', '183305006_Tanggungan Orang Tua.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(375, 24, 4, 25, '0.5', '183305006_Prestasi / Organisasi.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(376, 24, 5, 25, '-', '183305006_Surat Permohonan.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(377, 24, 6, 25, '-', '183305006_Scan KTM.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(378, 24, 7, 25, '-', '183305006_Scan Surat Pernyataan.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(379, 24, 8, 25, '-', '183305006_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(380, 24, 9, 25, '-', '183305006_Scan KTP Orang Tua.pdf', '2021-06-08 01:46:23', '2021-06-08 01:46:23'),
(381, 24, 1, 29, '0.75', '183308001_IPK.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(382, 24, 10, 29, '-', '183308001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(383, 24, 2, 29, '0.75', '183308001_Total Penghasilan Orang Tua.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(384, 24, 3, 29, '0.25', '183308001_Tanggungan Orang Tua.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(385, 24, 4, 29, '0.5', '183308001_Prestasi / Organisasi.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(386, 24, 5, 29, '-', '183308001_Surat Permohonan.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(387, 24, 6, 29, '-', '183308001_Scan KTM.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(388, 24, 7, 29, '-', '183308001_Scan Surat Pernyataan.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(389, 24, 8, 29, '-', '183308001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(390, 24, 9, 29, '-', '183308001_Scan KTP Orang Tua.pdf', '2021-06-08 01:50:11', '2021-06-08 01:50:11'),
(391, 24, 1, 30, '0.25', '183308002_IPK.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(392, 24, 10, 30, '-', '183308002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(393, 24, 2, 30, '0.5', '183308002_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(394, 24, 3, 30, '0.75', '183308002_Tanggungan Orang Tua.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(395, 24, 4, 30, '0.5', '183308002_Prestasi / Organisasi.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(396, 24, 5, 30, '-', '183308002_Surat Permohonan.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(397, 24, 6, 30, '-', '183308002_Scan KTM.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(398, 24, 7, 30, '-', '183308002_Scan Surat Pernyataan.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(399, 24, 8, 30, '-', '183308002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(400, 24, 9, 30, '-', '183308002_Scan KTP Orang Tua.pdf', '2021-06-09 09:04:20', '2021-06-09 09:04:20'),
(401, 24, 1, 31, '0.5', '183308003_IPK.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(402, 24, 10, 31, '-', '183308003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(403, 24, 2, 31, '0.5', '183308003_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(404, 24, 3, 31, '0.75', '183308003_Tanggungan Orang Tua.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(405, 24, 4, 31, '1', '183308003_Prestasi / Organisasi.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(406, 24, 5, 31, '-', '183308003_Surat Permohonan.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(407, 24, 6, 31, '-', '183308003_Scan KTM.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(408, 24, 7, 31, '-', '183308003_Scan Surat Pernyataan.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(409, 24, 8, 31, '-', '183308003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(410, 24, 9, 31, '-', '183308003_Scan KTP Orang Tua.pdf', '2021-06-09 09:05:44', '2021-06-09 09:05:44'),
(411, 24, 1, 32, '0.75', '183308004_IPK.pdf', '2021-06-09 09:07:11', '2021-06-09 09:07:11'),
(412, 24, 10, 32, '-', '183308004_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:07:11', '2021-06-09 09:07:11'),
(413, 24, 2, 32, '0.25', '183308004_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:07:11', '2021-06-09 09:07:11'),
(414, 24, 3, 32, '0.5', '183308004_Tanggungan Orang Tua.pdf', '2021-06-09 09:07:11', '2021-06-09 09:07:11'),
(415, 24, 4, 32, '0.5', '183308004_Prestasi / Organisasi.pdf', '2021-06-09 09:07:12', '2021-06-09 09:07:12'),
(416, 24, 5, 32, '-', '183308004_Surat Permohonan.pdf', '2021-06-09 09:07:12', '2021-06-09 09:07:12'),
(417, 24, 6, 32, '-', '183308004_Scan KTM.pdf', '2021-06-09 09:07:12', '2021-06-09 09:07:12'),
(418, 24, 7, 32, '-', '183308004_Scan Surat Pernyataan.pdf', '2021-06-09 09:07:12', '2021-06-09 09:07:12'),
(419, 24, 8, 32, '-', '183308004_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:07:12', '2021-06-09 09:07:12'),
(420, 24, 9, 32, '-', '183308004_Scan KTP Orang Tua.pdf', '2021-06-09 09:07:12', '2021-06-09 09:07:12'),
(421, 24, 1, 37, '0.5', '183202001_IPK.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(422, 24, 10, 37, '-', '183202001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(423, 24, 2, 37, '0.75', '183202001_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(424, 24, 3, 37, '0.25', '183202001_Tanggungan Orang Tua.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(425, 24, 4, 37, '0.5', '183202001_Prestasi / Organisasi.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(426, 24, 5, 37, '-', '183202001_Surat Permohonan.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(427, 24, 6, 37, '-', '183202001_Scan KTM.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(428, 24, 7, 37, '-', '183202001_Scan Surat Pernyataan.pdf', '2021-06-09 09:12:22', '2021-06-09 09:12:22'),
(429, 24, 8, 37, '-', '183202001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:12:23', '2021-06-09 09:12:23'),
(430, 24, 9, 37, '-', '183202001_Scan KTP Orang Tua.pdf', '2021-06-09 09:12:23', '2021-06-09 09:12:23'),
(431, 24, 1, 38, '1', '183202002_IPK.pdf', '2021-06-09 09:13:46', '2021-06-09 09:13:46'),
(432, 24, 10, 38, '-', '183202002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(433, 24, 2, 38, '0.75', '183202002_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(434, 24, 3, 38, '0.75', '183202002_Tanggungan Orang Tua.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(435, 24, 4, 38, '0.5', '183202002_Prestasi / Organisasi.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(436, 24, 5, 38, '-', '183202002_Surat Permohonan.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(437, 24, 6, 38, '-', '183202002_Scan KTM.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(438, 24, 7, 38, '-', '183202002_Scan Surat Pernyataan.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(439, 24, 8, 38, '-', '183202002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(440, 24, 9, 38, '-', '183202002_Scan KTP Orang Tua.pdf', '2021-06-09 09:13:47', '2021-06-09 09:13:47'),
(441, 24, 1, 39, '0.75', '183202003_IPK.pdf', '2021-06-09 09:15:16', '2021-06-09 09:15:16'),
(442, 24, 10, 39, '-', '183202003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:15:16', '2021-06-09 09:15:16'),
(443, 24, 2, 39, '0.5', '183202003_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:15:16', '2021-06-09 09:15:16'),
(444, 24, 3, 39, '0.25', '183202003_Tanggungan Orang Tua.pdf', '2021-06-09 09:15:16', '2021-06-09 09:15:16'),
(445, 24, 4, 39, '0.5', '183202003_Prestasi / Organisasi.pdf', '2021-06-09 09:15:16', '2021-06-09 09:15:16'),
(446, 24, 5, 39, '-', '183202003_Surat Permohonan.pdf', '2021-06-09 09:15:16', '2021-06-09 09:15:16'),
(447, 24, 6, 39, '-', '183202003_Scan KTM.pdf', '2021-06-09 09:15:17', '2021-06-09 09:15:17'),
(448, 24, 7, 39, '-', '183202003_Scan Surat Pernyataan.pdf', '2021-06-09 09:15:17', '2021-06-09 09:15:17'),
(449, 24, 8, 39, '-', '183202003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:15:17', '2021-06-09 09:15:17'),
(450, 24, 9, 39, '-', '183202003_Scan KTP Orang Tua.pdf', '2021-06-09 09:15:17', '2021-06-09 09:15:17'),
(451, 24, 1, 47, '0.5', '183209001_IPK.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(452, 24, 10, 47, '-', '183209001_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(453, 24, 2, 47, '0.25', '183209001_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(454, 24, 3, 47, '0.25', '183209001_Tanggungan Orang Tua.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(455, 24, 4, 47, '1', '183209001_Prestasi / Organisasi.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(456, 24, 5, 47, '-', '183209001_Surat Permohonan.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(457, 24, 6, 47, '-', '183209001_Scan KTM.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(458, 24, 7, 47, '-', '183209001_Scan Surat Pernyataan.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(459, 24, 8, 47, '-', '183209001_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:16:37', '2021-06-09 09:16:37'),
(460, 24, 9, 47, '-', '183209001_Scan KTP Orang Tua.pdf', '2021-06-09 09:16:38', '2021-06-09 09:16:38'),
(461, 24, 1, 48, '0.5', '183209002_IPK.pdf', '2021-06-09 09:19:00', '2021-06-09 09:19:00'),
(462, 24, 10, 48, '-', '183209002_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:19:00', '2021-06-09 09:19:00'),
(463, 24, 2, 48, '0.25', '183209002_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:19:00', '2021-06-09 09:19:00'),
(464, 24, 3, 48, '0.5', '183209002_Tanggungan Orang Tua.pdf', '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(465, 24, 4, 48, '0.5', '183209002_Prestasi / Organisasi.pdf', '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(466, 24, 5, 48, '-', '183209002_Surat Permohonan.pdf', '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(467, 24, 6, 48, '-', '183209002_Scan KTM.pdf', '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(468, 24, 7, 48, '-', '183209002_Scan Surat Pernyataan.pdf', '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(469, 24, 8, 48, '-', '183209002_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(470, 24, 9, 48, '-', '183209002_Scan KTP Orang Tua.pdf', '2021-06-09 09:19:01', '2021-06-09 09:19:01'),
(471, 24, 1, 41, '0.75', '183202005_IPK.pdf', '2021-06-09 09:25:57', '2021-06-09 09:25:57'),
(472, 24, 10, 41, '-', '183202005_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:25:57', '2021-06-09 09:25:57'),
(473, 24, 2, 41, '0.5', '183202005_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:25:57', '2021-06-09 09:25:57'),
(474, 24, 3, 41, '0.5', '183202005_Tanggungan Orang Tua.pdf', '2021-06-09 09:25:57', '2021-06-09 09:25:57'),
(475, 24, 4, 41, '1', '183202005_Prestasi / Organisasi.pdf', '2021-06-09 09:25:57', '2021-06-09 09:25:57'),
(476, 24, 5, 41, '-', '183202005_Surat Permohonan.pdf', '2021-06-09 09:25:58', '2021-06-09 09:25:58'),
(477, 24, 6, 41, '-', '183202005_Scan KTM.pdf', '2021-06-09 09:25:58', '2021-06-09 09:25:58'),
(478, 24, 7, 41, '-', '183202005_Scan Surat Pernyataan.pdf', '2021-06-09 09:25:58', '2021-06-09 09:25:58'),
(479, 24, 8, 41, '-', '183202005_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:25:58', '2021-06-09 09:25:58'),
(480, 24, 9, 41, '-', '183202005_Scan KTP Orang Tua.pdf', '2021-06-09 09:25:58', '2021-06-09 09:25:58'),
(481, 24, 1, 49, '1', '183209003_IPK.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(482, 24, 10, 49, '-', '183209003_Scan Surat Keterangan Tidak Mampu.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(483, 24, 2, 49, '0.75', '183209003_Total Penghasilan Orang Tua.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(484, 24, 3, 49, '0.5', '183209003_Tanggungan Orang Tua.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(485, 24, 4, 49, '0.5', '183209003_Prestasi / Organisasi.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(486, 24, 5, 49, '-', '183209003_Surat Permohonan.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(487, 24, 6, 49, '-', '183209003_Scan KTM.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(488, 24, 7, 49, '-', '183209003_Scan Surat Pernyataan.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(489, 24, 8, 49, '-', '183209003_Scan Surat Rekomendasi Jurusan.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10'),
(490, 24, 9, 49, '-', '183209003_Scan KTP Orang Tua.pdf', '2021-06-09 09:28:10', '2021-06-09 09:28:10');

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
(1, 1, 'IPK < 2.75', 0, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(2, 1, '3.00 S/D 3.30', 0.25, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(3, 1, '3.30 S/D 3.60', 0.5, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(4, 1, '3.60 S/D 4.00', 0.75, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(5, 2, 'Gaji < 500.000', 1, '2021-06-07 02:25:46', '2021-06-07 02:25:46'),
(6, 2, '500.000 < Gaji <= 2.000.000', 0.75, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(7, 2, '2.000.000 < Gaji <= 4.000.000', 0.5, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(8, 2, '4.000.000 < Gaji <= 6.000.000', 0.25, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(9, 2, 'Gaji > 6.000.000', 0, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(10, 3, '1 anak', 0, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(11, 3, '2 anak', 0.25, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(12, 3, '3 anak', 0.5, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(13, 3, '4 anak', 0.75, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(14, 3, '>= 5 anak', 1, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(15, 4, 'Ada', 1, '2021-06-07 02:25:47', '2021-06-07 02:25:47'),
(16, 4, 'Tidak Ada', 0.5, '2021-06-07 02:25:47', '2021-06-07 02:25:47');

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
-- Indeks untuk tabel `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dashboards_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`),
  ADD KEY `mahasiswas_prodi_id_foreign` (`prodi_id`);

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
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `anouncements`
--
ALTER TABLE `anouncements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `user_periods`
--
ALTER TABLE `user_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `values`
--
ALTER TABLE `values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT untuk tabel `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Ketidakleluasaan untuk tabel `dashboards`
--
ALTER TABLE `dashboards`
  ADD CONSTRAINT `dashboards_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
