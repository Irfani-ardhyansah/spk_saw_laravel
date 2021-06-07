-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2021 pada 08.13
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
(1, 1, 23, 1, 'Hasil Beasiswa.pdf', '2021-06-01 07:32:05', '2021-06-01 07:41:07');

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
(2, 1, 'C1', 'IPK', 0.3, 'Benefit', 'Melampirkan Scan Transkrip Nilai.', 1, '2021-02-04 09:18:52', '2021-06-01 13:45:23'),
(3, 1, 'C2', 'Gaji Orang Tua', 0.2, 'Cost', 'Melampirkan Scan Keterangan Penghasilan Orang Tua.', 1, '2021-02-09 06:48:11', '2021-05-23 10:29:54'),
(5, 1, 'C3', 'Tanggungan Orang Tua', 0.2, 'Benefit', 'Melampirkan Scan Kartu Keluarga.', 1, '2021-02-18 03:10:53', '2021-05-23 10:30:05'),
(9, 1, 'C5', 'Surat Permohonan', NULL, '-', 'Surat Permohonan Ditujukan Kepada Wadir 3 Berupa Tulis Tangan. File Harus JPEG / PDF.', 0, '2021-02-25 04:21:39', '2021-05-23 10:28:47'),
(13, 1, 'C4', 'Prestasi', 0.25, 'Benefit', 'Melampirkan Scan Sertifikat Prestasi / Organisasi yang diikuti.', 1, '2021-04-14 15:32:01', '2021-05-23 10:30:34'),
(14, 1, 'C6', 'Scan KTM', NULL, '-', 'Scan Kartu Tanda Mahasiswa. File Harus JPEG / PDF.', 0, '2021-05-23 10:22:03', '2021-05-23 10:28:53'),
(15, 1, 'C7', 'Scan Surat Pernyataan', NULL, '-', 'Scan Surat Pernyataan Tidak Menerima Beasiswa. File Harus JPEG / PDF.', 0, '2021-05-23 10:27:04', '2021-05-23 10:29:00'),
(16, 1, 'C8', 'Scan Surat Rekomen Jurusan', NULL, '-', 'Scan Surat Rekomendasi Dari Jurusan', 0, '2021-05-23 10:27:25', '2021-05-23 10:27:25'),
(17, 1, 'C9', 'Scan KTP Orang Tua', NULL, '-', 'Scan KTP Kedua Orang Tua', 0, '2021-05-23 10:27:51', '2021-05-23 10:27:51'),
(18, 1, 'C10', 'Surat Keterangan Tidak Mampu', NULL, '-', 'Scan Surat Keterangan Tidak Mampu', 0, '2021-05-23 10:28:16', '2021-05-23 10:28:16');

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

--
-- Dumping data untuk tabel `dashboards`
--

INSERT INTO `dashboards` (`id`, `admin_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(4, 1, 'Beasiswa PPA', '<div style=\"font-family: Arial, Tahoma, Helvetica, FreeSans, sans-serif; text-align: justify;\"><span style=\"font-weight: bolder;\">Beasiswa PPA&nbsp;</span>adalah bantuan kuliah dari Kementerian Ristek Dikti yang diperuntukkan bagi mahasiswa aktif jenjang S1/DIV atau D3 yang saat ini berada minimal semester II. Beasiswa PPA dan BPP PPA menyasar mahasiswa-mahasiswa di berbagai daerah, terutama yang tengah kuliah dan berprestasi, baik jenjang sarjana (S1) maupun diploma (DIV/D3). Untuk teknis beasiswa PPA 2021 - 2022 kemungkinan tidak jauh berbeda dengan periode sebelumnya, di mana pendaftaran ditetapkan oleh masing-masing perguruan tinggi.</div><div style=\"font-family: Arial, Tahoma, Helvetica, FreeSans, sans-serif; text-align: justify;\">&nbsp;</div><div style=\"font-family: Arial, Tahoma, Helvetica, FreeSans, sans-serif; text-align: justify;\">Penerima beasiswa dan bantuan biaya pendidikan PPA akan memperoleh dana sebesar Rp 400 ribu/bulan. Beasiswa tersebut diberikan untuk pertamakalinya di periode tahun angggaran berjalan sekurangnya selama 6 bulan. Pengajuan beasiswa PPA dan BPP-PPA cukup mudah karena mahasiswa bisa langsung mendaftar di kampus masing-masing.&nbsp;</div>', '2021-05-18 05:24:00', '2021-05-18 05:24:00');

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
(4, 10, 13, 'Mochamad irfani Ardhyansah', '3', 'profile.jpg', 'Madiun', 'Laki - laki', '081332695709', 'Islam', '2021-02-04 06:07:33', '2021-05-15 03:29:44'),
(5, 2, 14, 'James John', '3', NULL, 'Tawangrejo', 'Laki - laki', '0812347912', 'Protestan', '2021-02-20 09:14:24', '2021-02-20 09:14:24'),
(6, 10, 15, 'Chelia', '5', NULL, 'Kwangsen', 'Perempuan', '0812374', 'Islam', '2021-04-05 05:08:32', '2021-04-22 03:14:06'),
(7, 10, 16, 'Jamest', '5', 'profile.jpg', 'Magetan', 'Laki - laki', '081237641', 'Islam', '2021-04-11 11:26:54', '2021-05-18 15:37:45'),
(8, 3, 17, 'John', '3', 'profile.jpeg', 'Madiun', 'Laki - laki', '08123412', 'Islam', '2021-04-14 13:14:33', '2021-04-14 13:31:17'),
(9, 2, 18, 'Gunn', '3', NULL, 'Maospati', 'Laki - laki', '0812347', 'Islam', '2021-04-20 08:10:02', '2021-04-27 13:42:22'),
(10, 3, 19, 'Christoper', '3', 'profile.jpg', 'Nganjuk', 'Laki - laki', '081237412', 'Protestan', '2021-04-24 05:16:02', '2021-04-27 13:42:55'),
(11, 2, 20, 'Cole', '3', NULL, 'Magetan', 'Laki - laki', '081237412', 'Buddha', '2021-04-27 13:40:00', '2021-04-27 13:40:30'),
(12, 3, 21, 'Young', '5', NULL, 'Ngawi', 'Laki - laki', '081236412', 'Islam', '2021-04-27 13:43:34', '2021-04-27 13:43:34'),
(13, 8, 22, 'Gadiator', '3', 'profile.jpeg', 'Nganjuk', 'Laki - laki', '0812381427', 'Khonghucu', '2021-04-28 14:28:53', '2021-05-11 04:09:39'),
(14, 9, 23, 'Paro', '3', NULL, 'Mantingan', 'Laki - laki', '071238124', 'Katolik', '2021-05-06 06:22:23', '2021-05-06 06:22:23'),
(15, 4, 24, 'Dzul', '5', NULL, 'Mantingan', 'Laki - laki', '081237124', 'Katolik', '2021-05-06 06:24:17', '2021-05-18 03:20:10');

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
(23, 1, '2021-05-23', '2021-05-31', 97, 'Pengumuman Pendaftaran PPA 2021.pdf', 1, '2021-05-23 10:10:43', '2021-06-01 07:09:59');

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
(2, 'Mesin Otomotif', 150, '2021-04-24 04:52:04', '2021-04-24 04:52:04'),
(3, 'Teknik Komputer Kontrol', 150, '2021-04-24 04:53:15', '2021-04-24 04:53:15'),
(4, 'Teknik Listrik', 150, '2021-04-24 04:53:33', '2021-04-24 04:53:33'),
(5, 'Teknik Perkeretaapian', 150, '2021-04-24 04:53:46', '2021-04-24 04:53:46'),
(6, 'Komputer Akuntansi', 150, '2021-04-24 04:54:06', '2021-04-24 04:54:06'),
(7, 'Akuntansi', 150, '2021-04-24 04:54:18', '2021-04-24 05:00:59'),
(8, 'Administrasi Bisnis', 150, '2021-04-24 04:54:43', '2021-04-25 09:23:02'),
(9, 'Bahasa Inggris', 150, '2021-04-24 04:54:52', '2021-04-24 04:54:52'),
(10, 'Teknologi Informasi', 150, '2021-04-24 05:04:43', '2021-04-24 05:04:43');

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
(13, '183307009', 'user@ymail.com', '$2y$10$WcxqXJIL/dd79WSLjpevTepiBcgUopwHdTtB26U1Pt/nyJhpCZzUu', 'RikKJ9Tyjz6DtuuO5PChXSPsD65qLz89hDhN6FnTTj2f8979OTrB0tLzd23N', '2021-02-04 06:07:33', '2021-02-16 08:31:13'),
(14, '183307008', 'user2@ymail.com', '$2y$10$uj7iE2qW4YHIZzCMDvZM0u3e.y1KxYx4sAq9Urt8XmzIJZ1RaBfI6', 'wTDuF29xRqJseuXGnABZ1GYVqUG2np3nWiVcSmUDoSO7IwA1VK4PKRvFIpNR', '2021-02-20 09:14:24', '2021-02-20 09:14:24'),
(15, '183307004', 'user@gmail.com', '$2y$10$54VfbmcnoMW4QhO.ssQI1ud.ZXvDrFE3gCUPj8rJD4O9ml9q39hq6', 'nIIVQbzQtkRtnRoDazk0TC6NEwoq5bDyOeCUtxSYy0C5q23cUk0hhVY0e6S2', '2021-04-05 05:08:31', '2021-04-22 03:14:06'),
(16, '183307001', 'James@gmail.com', '$2y$10$jk9R3NR3KyORfz.fYbSKYOh/rzynLYW0fX8ZZuVIFQHXqVhlvFZ/2', 'XfMtLyxgmW6x1I3rq6Mbw0FDNqS9dtd1p0ZmxQ4D8EhVVRg1LUa0KQ15T0uj', '2021-04-11 11:26:54', '2021-04-11 11:26:54'),
(17, '183307002', 'coba@gmail.com', '$2y$10$3P0aRYH8uNw.LgtYIeSMduMBVJVCr7tJb9I9O61t9hm4chOpOopnS', 'shOVYCL24OVIgWAX4nr68RMpiO8PTVWHimZ82LUUNwUwryVT4Np11d5RM2QH', '2021-04-14 13:14:33', '2021-04-14 13:14:33'),
(18, '183307003', 'user3@gmail.com', '$2y$10$4kk4JV5W0V0OHvUr7sIRZOMBeTAVcPFvPDQwNnaLlpsuKYgQrgqD6', 'MM6Xhp1yFdEfVaVU6bynsH9nUVtdFmoiNFzLG5rb7EFSwwlMo7kYL3By8LbR', '2021-04-20 08:10:01', '2021-04-20 08:10:01'),
(19, '183307005', 'user5@spk.com', '$2y$10$rarvDJAkmr1Wwr.zeMsbeOTKDwbaTpPw.e4QB4RBTxdVN83EbM2lq', 'ZwEMsUyCtmdHxxjgxnKFlonOddfwBiLWPaI5mBw2tU7KGfR9LSZ8ztRrn7zs', '2021-04-24 05:16:01', '2021-04-24 05:16:01'),
(20, '183307006', 'user6@gmail.com', '$2y$10$xrPjVz.mOy3XdJTNw7QdbO8fHadeoCMGQQClW4TOf3QKu98qaoLUq', 'fQeutDRk0zCDAwvYfqNkAMFFoakJlPi4PYoDQIJ6sDMnCWTw01McGfrcNwmS', '2021-04-27 13:40:00', '2021-04-27 13:40:00'),
(21, '183307007', 'user7@gmail.com', '$2y$10$OrwK6BDb9z1i4xhmxxQdj.bD9pueKL03/hM.uGHSmJV.7.V5OXPAW', 'X6j3krEQamn5DqBX04N6spz1n84bcKaZdhdNEQ8nOSCP4ZV4Eomrr25sLO4y', '2021-04-27 13:43:34', '2021-04-27 13:43:34'),
(22, '183307010', 'user10@gmail.com', '$2y$10$SRrqXhdySK1gdF0lvNZRE.0rZ/eQ9YYc7pZovYlgSzPJDmGePH0/.', 'gzN51VkX6Z15zAE7GzTRprZovFurJcK9Omgxzgq1D336uJxA9eOcrpeNE28h', '2021-04-28 14:28:53', '2021-04-28 14:28:53'),
(23, '183307012', 'user11@gmail.com', '$2y$10$rL.3dFtwLPrhgQQTGq/UIeLEcb8E1MY1AaTK2zwMVZIOeEj0AU0E.', NULL, '2021-05-06 06:22:22', '2021-05-06 06:22:22'),
(24, '183307011', 'user12@gmail.com', '$2y$10$Uji9LDwyLyWkN/ou9DJjKuadIL7WwV4DFVSD0xg5XXj47ldbd.7iy', 'wo8ZopNJvBJsSKaKTQaCawU401nCcrZNv4ObCGuooTb7fxp0RpIGrZ2LHAyL', '2021-05-06 06:24:17', '2021-05-06 06:24:17');

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
(1, 16, 23, '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(2, 17, 23, '2021-05-24 03:00:26', '2021-05-24 03:00:26'),
(3, 18, 23, '2021-05-24 03:01:38', '2021-05-24 03:01:38'),
(4, 15, 23, '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(5, 19, 23, '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(6, 20, 23, '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(7, 21, 23, '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(9, 13, 23, '2021-05-26 04:02:22', '2021-05-26 04:02:22');

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
(1, 23, 2, 7, '1', '183307001_IPK.pdf', '2021-05-24 02:57:04', '2021-05-24 02:57:04'),
(2, 23, 18, 7, '-', '183307001_Surat Keterangan Tidak Mampu.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(3, 23, 3, 7, '0.25', '183307001_Gaji Orang Tua.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(4, 23, 5, 7, '0.5', '183307001_Tanggungan Orang Tua.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(5, 23, 13, 7, '1', '183307001_Prestasi.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(6, 23, 9, 7, '-', '183307001_Surat Permohonan.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(7, 23, 14, 7, '-', '183307001_Scan KTM.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(8, 23, 15, 7, '-', '183307001_Scan Surat Pernyataan.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(9, 23, 16, 7, '-', '183307001_Scan Surat Rekomen Jurusan.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(10, 23, 17, 7, '-', '183307001_Scan KTP Orang Tua.pdf', '2021-05-24 02:57:05', '2021-05-24 02:57:05'),
(11, 23, 2, 8, '0.25', '183307002_IPK.pdf', '2021-05-24 03:00:25', '2021-05-24 03:00:25'),
(12, 23, 18, 8, '-', '183307002_Surat Keterangan Tidak Mampu.pdf', '2021-05-24 03:00:25', '2021-05-24 03:00:25'),
(13, 23, 3, 8, '0.5', '183307002_Gaji Orang Tua.pdf', '2021-05-24 03:00:25', '2021-05-24 03:00:25'),
(14, 23, 5, 8, '0.5', '183307002_Tanggungan Orang Tua.pdf', '2021-05-24 03:00:25', '2021-05-24 03:00:25'),
(15, 23, 13, 8, '1', '183307002_Prestasi.pdf', '2021-05-24 03:00:26', '2021-05-24 03:00:26'),
(16, 23, 9, 8, '-', '183307002_Surat Permohonan.pdf', '2021-05-24 03:00:26', '2021-05-24 03:00:26'),
(17, 23, 14, 8, '-', '183307002_Scan KTM.pdf', '2021-05-24 03:00:26', '2021-05-24 03:00:26'),
(18, 23, 15, 8, '-', '183307002_Scan Surat Pernyataan.pdf', '2021-05-24 03:00:26', '2021-05-24 03:00:26'),
(19, 23, 16, 8, '-', '183307002_Scan Surat Rekomen Jurusan.pdf', '2021-05-24 03:00:26', '2021-05-24 03:00:26'),
(20, 23, 17, 8, '-', '183307002_Scan KTP Orang Tua.pdf', '2021-05-24 03:00:26', '2021-05-24 03:00:26'),
(21, 23, 2, 9, '0.25', '183307003_IPK.pdf', '2021-05-24 03:01:37', '2021-05-24 03:01:37'),
(22, 23, 18, 9, '-', '183307003_Surat Keterangan Tidak Mampu.pdf', '2021-05-24 03:01:37', '2021-05-24 03:01:37'),
(23, 23, 3, 9, '0.5', '183307003_Gaji Orang Tua.pdf', '2021-05-24 03:01:37', '2021-05-24 03:01:37'),
(24, 23, 5, 9, '0.5', '183307003_Tanggungan Orang Tua.pdf', '2021-05-24 03:01:37', '2021-05-24 03:01:37'),
(25, 23, 13, 9, '0.5', '183307003_Prestasi.pdf', '2021-05-24 03:01:37', '2021-05-24 03:01:37'),
(26, 23, 9, 9, '-', '183307003_Surat Permohonan.pdf', '2021-05-24 03:01:38', '2021-05-24 03:01:38'),
(27, 23, 14, 9, '-', '183307003_Scan KTM.pdf', '2021-05-24 03:01:38', '2021-05-24 03:01:38'),
(28, 23, 15, 9, '-', '183307003_Scan Surat Pernyataan.pdf', '2021-05-24 03:01:38', '2021-05-24 03:01:38'),
(29, 23, 16, 9, '-', '183307003_Scan Surat Rekomen Jurusan.pdf', '2021-05-24 03:01:38', '2021-05-24 03:01:38'),
(30, 23, 17, 9, '-', '183307003_Scan KTP Orang Tua.pdf', '2021-05-24 03:01:38', '2021-05-24 03:01:38'),
(31, 23, 2, 6, '0.25', '183307004_IPK.pdf', '2021-05-24 03:05:58', '2021-05-24 03:05:58'),
(32, 23, 18, 6, '-', '183307004_Surat Keterangan Tidak Mampu.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(33, 23, 3, 6, '0.75', '183307004_Gaji Orang Tua.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(34, 23, 5, 6, '0.75', '183307004_Tanggungan Orang Tua.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(35, 23, 13, 6, '0.5', '183307004_Prestasi.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(36, 23, 9, 6, '-', '183307004_Surat Permohonan.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(37, 23, 14, 6, '-', '183307004_Scan KTM.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(38, 23, 15, 6, '-', '183307004_Scan Surat Pernyataan.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(39, 23, 16, 6, '-', '183307004_Scan Surat Rekomen Jurusan.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(40, 23, 17, 6, '-', '183307004_Scan KTP Orang Tua.pdf', '2021-05-24 03:05:59', '2021-05-24 03:05:59'),
(41, 23, 2, 10, '0.5', '183307005_IPK.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(42, 23, 18, 10, '-', '183307005_Surat Keterangan Tidak Mampu.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(43, 23, 3, 10, '0.5', '183307005_Gaji Orang Tua.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(44, 23, 5, 10, '0.5', '183307005_Tanggungan Orang Tua.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(45, 23, 13, 10, '1', '183307005_Prestasi.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(46, 23, 9, 10, '-', '183307005_Surat Permohonan.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(47, 23, 14, 10, '-', '183307005_Scan KTM.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(48, 23, 15, 10, '-', '183307005_Scan Surat Pernyataan.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(49, 23, 16, 10, '-', '183307005_Scan Surat Rekomen Jurusan.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(50, 23, 17, 10, '-', '183307005_Scan KTP Orang Tua.pdf', '2021-05-24 03:07:10', '2021-05-24 03:07:10'),
(51, 23, 2, 11, '1', '183307006_IPK.pdf', '2021-05-24 03:08:25', '2021-05-24 03:08:25'),
(52, 23, 18, 11, '-', '183307006_Surat Keterangan Tidak Mampu.pdf', '2021-05-24 03:08:25', '2021-05-24 03:08:25'),
(53, 23, 3, 11, '0.5', '183307006_Gaji Orang Tua.pdf', '2021-05-24 03:08:25', '2021-05-24 03:08:25'),
(54, 23, 5, 11, '0.5', '183307006_Tanggungan Orang Tua.pdf', '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(55, 23, 13, 11, '1', '183307006_Prestasi.pdf', '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(56, 23, 9, 11, '-', '183307006_Surat Permohonan.pdf', '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(57, 23, 14, 11, '-', '183307006_Scan KTM.pdf', '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(58, 23, 15, 11, '-', '183307006_Scan Surat Pernyataan.pdf', '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(59, 23, 16, 11, '-', '183307006_Scan Surat Rekomen Jurusan.pdf', '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(60, 23, 17, 11, '-', '183307006_Scan KTP Orang Tua.pdf', '2021-05-24 03:08:26', '2021-05-24 03:08:26'),
(61, 23, 2, 12, '1', '183307007_IPK.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(62, 23, 18, 12, '-', '183307007_Surat Keterangan Tidak Mampu.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(63, 23, 3, 12, '0.5', '183307007_Gaji Orang Tua.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(64, 23, 5, 12, '1', '183307007_Tanggungan Orang Tua.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(65, 23, 13, 12, '1', '183307007_Prestasi.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(66, 23, 9, 12, '-', '183307007_Surat Permohonan.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(67, 23, 14, 12, '-', '183307007_Scan KTM.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(68, 23, 15, 12, '-', '183307007_Scan Surat Pernyataan.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(69, 23, 16, 12, '-', '183307007_Scan Surat Rekomen Jurusan.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(70, 23, 17, 12, '-', '183307007_Scan KTP Orang Tua.pdf', '2021-05-24 03:09:37', '2021-05-24 03:09:37'),
(81, 23, 2, 4, '1', '183307009_IPK.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(82, 23, 18, 4, '-', '183307009_Surat Keterangan Tidak Mampu.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(83, 23, 3, 4, '0.75', '183307009_Gaji Orang Tua.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(84, 23, 5, 4, '0.75', '183307009_Tanggungan Orang Tua.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(85, 23, 13, 4, '0.5', '183307009_Prestasi.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(86, 23, 9, 4, '-', '183307009_Surat Permohonan.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(87, 23, 14, 4, '-', '183307009_Scan KTM.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(88, 23, 15, 4, '-', '183307009_Scan Surat Pernyataan.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(89, 23, 16, 4, '-', '183307009_Scan Surat Rekomen Jurusan.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21'),
(90, 23, 17, 4, '-', '183307009_Scan KTP Orang Tua.pdf', '2021-05-26 04:02:21', '2021-05-26 04:02:21');

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
(2, 2, '3.00 S/D 3.30', 0.25, '2021-02-05 12:18:19', '2021-04-30 03:32:20'),
(3, 2, '3.30 S/D 3,60', 0.5, '2021-02-05 12:18:41', '2021-04-30 03:32:47'),
(4, 2, '3,60 S/D 4.00', 0.75, '2021-02-05 12:19:03', '2021-04-30 03:37:34'),
(8, 2, '< 2.75', 0, '2021-02-09 11:52:30', '2021-02-09 11:52:30'),
(9, 3, 'Gaji < 500.000', 1, '2021-02-09 12:06:02', '2021-05-23 10:12:39'),
(10, 3, '500.000 < Gaji <= 2.000.000', 0.75, '2021-02-09 12:06:33', '2021-05-23 10:13:05'),
(16, 3, '2.000.000 < Gaji <= 4.000.000', 0.5, '2021-02-09 12:52:48', '2021-05-23 10:13:51'),
(17, 3, '4.000.000 < Gaji <= 6.000.000', 0.25, '2021-02-09 12:56:10', '2021-05-23 10:14:23'),
(18, 3, 'Gaji > 6.000.000', 0, '2021-02-09 12:56:54', '2021-05-23 10:14:40'),
(27, 5, '1 anak', 0, '2021-02-18 03:11:22', '2021-05-23 10:17:49'),
(28, 5, '2 anak', 0.25, '2021-02-18 03:11:36', '2021-05-23 10:17:58'),
(29, 5, '3 anak', 0.5, '2021-02-24 03:29:30', '2021-05-23 10:18:08'),
(30, 5, '4 anak', 0.75, '2021-02-24 03:29:46', '2021-05-23 10:18:20'),
(31, 5, '>= 5 anak', 1, '2021-02-24 03:30:06', '2021-05-23 10:18:35'),
(36, 13, 'Tidak Ada', 0.5, '2021-04-14 15:32:19', '2021-04-14 16:36:41'),
(37, 13, 'Ada', 1, '2021-04-14 15:32:27', '2021-04-14 15:32:27');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `anouncements`
--
ALTER TABLE `anouncements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_periods`
--
ALTER TABLE `user_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `values`
--
ALTER TABLE `values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
