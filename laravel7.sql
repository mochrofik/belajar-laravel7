-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2023 pada 09.50
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `biodatas`
--

INSERT INTO `biodatas` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Masfufah Edit', 'Kwanyar , Madura, Jawa Timur, Indonesia', '2023-01-26 20:56:59', '2023-01-27 00:24:35'),
(2, 'Markonah', 'Jrengik', '2023-01-26 20:57:25', '2023-01-26 20:57:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `to_nik` varchar(255) NOT NULL,
  `dilihat` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `nik`, `message`, `to_nik`, `dilihat`, `created_at`, `updated_at`) VALUES
(1, '99999', 'Halo, ini adalah pesan baru dari Super Admin untuk mencoba', '1200040', 1, '2023-02-01 04:34:13', '2023-02-01 04:34:13'),
(2, '1200030', 'Mas, aku mau konfirmasi tentang hal yang kemarin kita diskusikan kelanjutannya bagaimana ya', '1200040', 1, '2023-02-01 04:02:06', '2023-02-01 04:02:06'),
(3, '1200040', 'Ohya mas keperluan yang mana ya saya lupa', '1200030', 0, '2023-02-01 05:02:10', NULL),
(4, '1200040', 'Hai Oke Silahkan', '99999', 1, '2023-02-01 07:05:49', '2023-02-01 07:05:49'),
(5, '1200040', 'Tapi itu untuk apa ya mas ?', '99999', 1, '2023-02-01 07:06:56', '2023-02-01 07:06:56'),
(6, '1200040', 'OKE', '99999', 1, '2023-02-01 07:05:45', '2023-02-01 07:05:45'),
(7, '1200040', 'tes', '99999', 1, '2023-02-01 07:05:21', '2023-02-01 07:05:21'),
(8, '99999', 'Iya mas ini untuk fitur message', '1200040', 1, '2023-02-01 08:11:32', '2023-02-01 08:11:32'),
(9, '1200030', 'Aku mencoba message baru', '99999', 1, '2023-02-01 07:25:07', '2023-02-01 07:25:07'),
(10, '1200040', 'oalah', '99999', 1, '2023-02-01 08:37:45', '2023-02-01 08:37:45'),
(11, '99999', 'Mencoba untuk apa mas', '1200030', 0, '2023-02-01 08:38:17', '2023-02-01 08:38:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_01_27_023503_user', 1),
(5, '2023_01_27_033608_create_biodata_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) NOT NULL,
  `body` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_referensi` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `dilihat` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `body`, `title`, `nik`, `id_referensi`, `type`, `dilihat`, `created_at`, `approved_at`) VALUES
(1, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Alfin Khoirullah', '99999', 11, 10001, 1, '2023-01-30 09:38:02', '2023-01-30 02:38:02'),
(2, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Iman Faruq', '99999', 12, 10001, 1, '2023-01-30 09:53:55', '2023-01-30 02:53:55'),
(3, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Alfin Khoirullah', '99999', 13, 10001, 1, '2023-01-30 09:43:42', '2023-01-30 02:43:42'),
(4, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Dwi Nugraha', '99999', 14, 10001, 1, '2023-01-30 09:57:31', '2023-01-30 02:57:31'),
(5, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Alfin Khoirullah', '99999', 15, 10001, 1, '2023-01-30 09:58:40', '2023-01-30 02:58:40'),
(6, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Iman Faruq', '99999', 16, 10001, 1, '2023-01-30 09:59:33', '2023-01-30 02:59:33'),
(7, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Alfin Khoirullah', '99999', 17, 10001, 1, '2023-01-31 02:43:25', '2023-01-30 19:43:25'),
(13, 'Terdapat pengajuan pelatihan dari 99999', 'Judul Pelatihan Jurnalistik Tingkat Dasar', '1200020', 6, 20001, 1, '2023-01-31 07:24:42', '2023-01-31 00:24:42'),
(14, 'Terdapat pengajuan pelatihan dari Dwi Nugraha', 'Judul Pelatihan XCamp Himasi', '1200020', 7, 20001, 1, '2023-01-31 07:25:46', '2023-01-31 00:25:46'),
(15, 'Terdapat pengajuan approval registrasi akun baru ', 'Pengajuan registrasi dari Muh Wafi', '99999', 18, 10001, 1, '2023-01-31 08:02:08', '2023-01-31 01:02:08'),
(16, 'Terdapat pengajuan pelatihan dari Muh Wafi', 'Judul Pelatihan Jago Bermain PES 2023', '1200020', 8, 20001, 1, '2023-01-31 09:29:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id` bigint(20) NOT NULL,
  `judul_pelatihan` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `brosur` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelatihans`
--

INSERT INTO `pelatihans` (`id`, `judul_pelatihan`, `nik`, `deskripsi`, `tanggal_pelaksanaan`, `tanggal_selesai`, `brosur`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Jurnalistik Tingkat Dasar', '99999', 'Apa itu pelatihan jurnalistik tingkat dasar?\r\nPelatihan Jurnalistik Tingkat Dasar (PJTD) 2021 adalah kegiatan yang diselenggarakan dalam rangka penerimaan anggota baru Lembaga Pers Mahasiswa Universitas Tanjungpura atau LPM Untan. Kegiatan ini merupakan bagian dari program kerja divisi Pemberdayaan Sumber Daya Manusia (PSDM).', '2023-02-15', '2023-02-16', '1675138877081-brosur_pelatihan.jpg', 1, '2023-01-31 07:24:42', '2023-01-31 00:24:42'),
(7, 'XCamp Himasi', '1200010', 'Kemping atau camping ialah satu aktivitas yang sudah dilakukan di alam terbuka, pegunungan atau rimba dengan tenda sebagai rumah sebentar. Aktivitas kemping mempunyai keterikatan yang kuat dengan kepramukaan, kepencinta alaman dan buat pemenuhan akan ruangan tinggal sementara untuk beberapa atau barisan orang yang lakukan perjalanan kewilayah tertentu yang tidak ditempati oleh komune manusia dan dengan arah khusus seperti riset di pedalaman rimba, ekspedisi pucuk-puncak gunung, dan lain sebagainya', '2023-02-27', '2023-03-01', '1675148135362-brosur_pelatihan.jpg', 2, '2023-01-31 07:25:46', '2023-01-31 00:25:46'),
(8, 'Jago Bermain PES 2023', '1200040', 'eFootball (sebelumnya diberi nama Pro Evolution Soccer (PES) di luar Jepang dan Winning Eleven di Jepang) adalah permainan video sepak bola yang dikembangkan dan diterbitkan Konami sejak 1995. eFootball terdiri atas delapan belas rilisan utama dan judul-judul sempalan yang dirilis di berbagai platform. Seri ini meraih kesuksesan baik secara kritis maupun komersial.\r\n\r\neFootball banyak dipakai dalam olahraga elektronik. eFootball.Open (sebelumnya PES World Finals atau PES League) adalah gelaran olahraga elektronik yang diselenggarakan oleh Konami tiap tahun sejak 2010.', '2023-03-01', '2023-03-02', '1675157326062-brosur_pelatihan.png', 0, '2023-01-31 02:28:46', '2023-01-31 02:28:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_karyawan`
--

CREATE TABLE `posisi_karyawan` (
  `id` bigint(20) NOT NULL,
  `nama_posisi` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posisi_karyawan`
--

INSERT INTO `posisi_karyawan` (`id`, `nama_posisi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KARYAWAN', 1, '2023-01-29 21:13:28', '2023-01-29 21:52:16'),
(2, 'ADMIN', 1, '2023-01-29 21:14:53', '2023-01-29 23:00:23'),
(3, 'SUPER_ADMIN', 1, '2023-01-29 23:01:11', '2023-01-30 02:38:53'),
(4, 'STAFF_PELATIHAN', 1, '2023-01-30 19:43:13', '2023-01-30 19:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `username`, `first_name`, `last_name`, `profil`, `id_posisi`, `posisi`, `active`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '99999', 'rofik', 'Moch', 'Rofi', '', 3, 'SUPER_ADMIN', 1, 'rofik@gmail.com', NULL, '$2y$10$KZjcwuwCmDY9y9/8c9ii9eCH2e.I3JebirTFttAifKbbAmodwiOMS', NULL, NULL, NULL),
(3, '1200059', 'aula', 'Ahmad', 'Aula', NULL, 2, 'ADMIN', 1, 'aula@gmail.com', NULL, '$2y$10$05o/p3jt33FrzUwp3KBwBO3LVr3l7H.8KDYJ2kxZ07XdhhkNQHDdy', NULL, '2023-01-27 02:40:18', '2023-01-27 02:40:18'),
(14, '1200010', 'dwinugraha', 'Dwi', 'Nugraha', '', 1, '', 1, 'dwi@gmail.com', NULL, '$2y$10$.cXdUt3phAhUpxn0wXkDVOVvcKXjpZkkmc98eMMbDRLgRyet.1IT2', NULL, '2023-01-30 02:57:12', '2023-01-30 02:57:31'),
(16, '1200030', 'iman', 'Iman', 'Faruq', '', 1, '', 1, 'iman@gmail.com', NULL, '$2y$10$IDqfublPfHv.0oYcJaK8kuNeL9s93iv3X0JHvdIOkr1d.La56TtRu', NULL, '2023-01-30 02:59:10', '2023-01-30 02:59:33'),
(17, '1200020', 'alfin', 'Alfin', 'Khoirullah', '', 4, 'STAFF_PELATIHAN', 1, 'alfin@gmail.com', NULL, '$2y$10$Der9f7R/gXN.848Fl/4vJepaI2F3bo21SjZq0zuYvcWSl8ip0eo9W', NULL, '2023-01-30 18:37:54', '2023-01-30 19:43:25'),
(18, '1200040', 'wafi', 'Muh', 'Wafi', '', 1, 'KARYAWAN', 1, 'wafi@gmail.com', NULL, '$2y$10$qckKn0lkmOoqpteVSBszBeNEX0891fRuNGt4o//hTwGc/U333z5l2', NULL, '2023-01-31 01:01:41', '2023-01-31 01:02:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posisi_karyawan`
--
ALTER TABLE `posisi_karyawan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `posisi_karyawan`
--
ALTER TABLE `posisi_karyawan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
