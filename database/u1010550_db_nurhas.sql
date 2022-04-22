-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2022 at 03:30 PM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1010550_db_nurhas`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `judul`, `uraian`, `tanggal`, `created_at`, `updated_at`) VALUES
(3, 'Kegiatan Anak-anak Setiap Harinya', '- Sholat Maghrib dan Isya Berjama\'ah<br />\r\n- Mengaji Al-Qur\'an dan Tilawati<br />\r\n- Kajian Kitab<br />\r\n- Muroja\'ah Surat-surat Pendek Juz 30<br />\r\n- Membacakan Do\'a untuk para donatur Setelah Sholat Isya<br />\r\n- Membacakan Pembiasaan Surat-surat tertentu', '2022-03-30', '2022-04-16 07:51:11', '2022-04-16 07:51:11'),
(5, 'Acara Santunan dan Buka Bersama', 'Acara Santunan dan Buka Bersama para donatur Harris Hotel dengan Anak-anak Panti Asuhan Nurul Hasanah Surabaya', '2022-04-04', '2022-04-16 08:12:02', '2022-04-16 08:12:02'),
(7, 'Kegiatan Pondok Ramadhan 1443H (Hari Ke-1)', 'Memperingati Pondok Ramadhan 1443H bersama anak-anak panti asuhan Nurul Hasanah Surabaya yang dilaksanakan selama 2 Hari yakni pada tanggal 09 April 2022 s/d 10 April 2022 yang dilaksanakan di Panti Asuhan (Asrama)', '2022-04-09', '2022-04-16 08:38:15', '2022-04-16 08:38:15'),
(8, 'Kegiatan Pondok Ramadhan 1443H (Hari Ke-2)', 'Kegiatan Pondok Ramadhan Hari Kedua', '2022-04-10', '2022-04-16 08:48:08', '2022-04-16 08:48:08'),
(9, 'Donatur Hotel Fair Field', 'Acara Do\'a Bersama dan Santunan dari Hotel Fair Field by Marriot Surabaya', '2022-04-13', '2022-04-16 09:13:27', '2022-04-16 09:13:27'),
(10, 'Donatur PGN (Perusahaan Gas Negara)', 'Acara Santunan Simbolis dan Buka Bersama donatur dari PGN (Perusahaan Gas Negara) di Hotel Shangri-La Surabaya', '2022-04-13', '2022-04-16 09:25:59', '2022-04-16 09:25:59'),
(11, 'Donatur PT. Sentra Support Servis', 'Acara Santunan bersama PT. Sentra Support Servis', '2022-04-14', '2022-04-16 09:37:03', '2022-04-16 09:37:03'),
(12, 'Donatur Buka Bersama di fiftysixcoffee_eatery', 'Acara Santunan dan Buka Bersama dengan para donatur di tempat Fiftysix Coffe', '2022-04-14', '2022-04-16 09:49:17', '2022-04-16 09:49:17'),
(13, 'Donatur dari Bapak Yogi Ardhana', 'Santunan dan Nasi untuk Buka Puasa dari Bapak Yogi Ardhana untuk Janda/Dhu\'afa yang di amanahkan ke Panti Asuhan', '2022-04-11', '2022-04-16 10:00:00', '2022-04-16 10:00:00'),
(14, 'Donatur dari Keluarga Bpk. Bambang Abrianto', 'Acara santunan dan buka bersama donatur dari keluarga bapak Bambang Abrianto dan Ibu Yuli', '2022-04-08', '2022-04-16 10:09:18', '2022-04-16 10:09:18'),
(15, 'Donatur Jum\'at Berkah', 'Terimakasih untuk para donatur Sedekah Jum’at Berkah untuk Anak-anak', '2022-04-15', '2022-04-16 10:15:36', '2022-04-16 10:15:36'),
(16, 'Donatur Keluarga Bpk. Widi', 'Acara Santunan dari Keluarga Bapak Widi adik dari Ibu Imam yakni donatur tetap Panti Asuhan Nurul Hasanah Saurabaya', '2022-04-02', '2022-04-16 10:21:48', '2022-04-16 10:21:48'),
(17, 'Donatur Keluarga Bapak Sigit Dany Setiyono', 'Acara Santunan dan Do’a Bersama dari Keluarga Bapak Sigit Dany Setiyono dan Ibu Lia', '2022-04-15', '2022-04-17 06:21:05', '2022-04-17 06:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `activity_photos`
--

CREATE TABLE `activity_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL,
  `nama_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_photos`
--

INSERT INTO `activity_photos` (`id`, `activity_id`, `nama_foto`, `thumbnail`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, 3, 'Kegiatan Anak-anak Setiap Harinya-1-1650095471.jpg', 'Kegiatan Anak-anak Setiap Harinya-1-1650095471.jpg', 'Do\'a Bersama', NULL, NULL),
(8, 3, 'Kegiatan Anak-anak Setiap Harinya-2-1650095472.jpg', 'Kegiatan Anak-anak Setiap Harinya-2-1650095472.jpg', 'Mengaji Tilawati', NULL, NULL),
(9, 3, 'Kegiatan Anak-anak Setiap Harinya-3-1650095472.jpg', 'Kegiatan Anak-anak Setiap Harinya-3-1650095472.jpg', 'Kajian Kitab', NULL, NULL),
(10, 3, 'Kegiatan Anak-anak Setiap Harinya-4-1650095472.jpg', 'Kegiatan Anak-anak Setiap Harinya-4-1650095472.jpg', 'Sholat Berjama\'ah', NULL, NULL),
(12, 5, 'Acara Santunan dan Buka Bersama-1-1650096722.jpg', 'Acara Santunan dan Buka Bersama-1-1650096722.jpg', 'Anak-anak PA Nurul Hasanah', NULL, NULL),
(13, 5, 'Acara Santunan dan Buka Bersama-2-1650096723.jpg', 'Acara Santunan dan Buka Bersama-2-1650096723.jpg', 'Tausiyah dari Ustd. Ahmad Syafi\'i', NULL, NULL),
(14, 5, 'Acara Santunan dan Buka Bersama-3-1650096723.jpg', 'Acara Santunan dan Buka Bersama-3-1650096723.jpg', 'Simbolis kepada Ibu Pembina Untuk Panti Asuhan', NULL, NULL),
(15, 5, 'Acara Santunan dan Buka Bersama-4-1650096723.jpg', 'Acara Santunan dan Buka Bersama-4-1650096723.jpg', 'Santunan Kepada Anak-anak', NULL, NULL),
(16, 5, 'Acara Santunan dan Buka Bersama-5-1650096724.jpg', 'Acara Santunan dan Buka Bersama-5-1650096724.jpg', 'Foto Bersama Pembimbing dan para donatur', NULL, NULL),
(17, 5, 'Acara Santunan dan Buka Bersama-6-1650096724.jpg', 'Acara Santunan dan Buka Bersama-6-1650096724.jpg', 'Foto Bersama Anak-anak', NULL, NULL),
(18, 5, 'Acara Santunan dan Buka Bersama-7-1650096724.jpg', 'Acara Santunan dan Buka Bersama-7-1650096724.jpg', 'Buka Puasa', NULL, NULL),
(20, 7, 'Kegiatan Pondok Ramadhan 1443H-1-1650098295.jpg', 'Kegiatan Pondok Ramadhan 1443H-1-1650098295.jpg', 'Penulisan Materi 1 Akhlakul Banain (tantang Akhlak kepada Guru)', NULL, NULL),
(21, 7, 'Kegiatan Pondok Ramadhan 1443H-2-1650098295.jpg', 'Kegiatan Pondok Ramadhan 1443H-2-1650098295.jpg', 'Penjelasan Materi 1', NULL, NULL),
(22, 7, 'Kegiatan Pondok Ramadhan 1443H-3-1650098296.jpg', 'Kegiatan Pondok Ramadhan 1443H-3-1650098296.jpg', 'Pembacaan Materi 1', NULL, NULL),
(23, 7, 'Kegiatan Pondok Ramadhan 1443H-4-1650098296.jpg', 'Kegiatan Pondok Ramadhan 1443H-4-1650098296.jpg', 'Penjelasan Materi 2 (tentang Bab Puasa)', NULL, NULL),
(24, 7, 'Kegiatan Pondok Ramadhan 1443H-5-1650098296.jpg', 'Kegiatan Pondok Ramadhan 1443H-5-1650098296.jpg', 'Sholat Tahajud dan Shubuh Berjama\'ah', NULL, NULL),
(25, 7, 'Kegiatan Pondok Ramadhan 1443H-6-1650098296.jpg', 'Kegiatan Pondok Ramadhan 1443H-6-1650098296.jpg', 'Menu Sahur', NULL, NULL),
(26, 7, 'Kegiatan Pondok Ramadhan 1443H-7-1650098297.jpg', 'Kegiatan Pondok Ramadhan 1443H-7-1650098297.jpg', 'Pengambilan Makan Sahur Santri Putri', NULL, NULL),
(27, 7, 'Kegiatan Pondok Ramadhan 1443H-8-1650098297.jpg', 'Kegiatan Pondok Ramadhan 1443H-8-1650098297.jpg', 'Pengambilan Makan Sahur Santri Putra', NULL, NULL),
(28, 7, 'Kegiatan Pondok Ramadhan 1443H-9-1650098297.jpg', 'Kegiatan Pondok Ramadhan 1443H-9-1650098297.jpg', 'Sahur Bersama', NULL, NULL),
(29, 7, 'Kegiatan Pondok Ramadhan 1443H-10-1650098298.jpg', 'Kegiatan Pondok Ramadhan 1443H-10-1650098298.jpg', 'Sahu Bersama', NULL, NULL),
(30, 8, 'Kegiatan Pondok Ramadhan 1443H-1-1650098888.jpg', 'Kegiatan Pondok Ramadhan 1443H-1-1650098888.jpg', 'Sholat Dhuha Berjama\'ah', NULL, NULL),
(31, 8, 'Kegiatan Pondok Ramadhan 1443H-2-1650098888.jpg', 'Kegiatan Pondok Ramadhan 1443H-2-1650098888.jpg', 'Membaca Q.S Al-Waqiah', NULL, NULL),
(32, 8, 'Kegiatan Pondok Ramadhan 1443H-3-1650098888.jpg', 'Kegiatan Pondok Ramadhan 1443H-3-1650098888.jpg', 'Materi 3 tentang Bab Puasa, sholat dan Menghafal Surat-surat Pendek Juz 30', NULL, NULL),
(33, 8, 'Kegiatan Pondok Ramadhan 1443H-4-1650098889.jpg', 'Kegiatan Pondok Ramadhan 1443H-4-1650098889.jpg', 'Materi 3 tentang Bab Puasa, sholat dan Menghafal Surat-surat Pendek Juz 30', NULL, NULL),
(34, 8, 'Kegiatan Pondok Ramadhan 1443H-5-1650098890.jpg', 'Kegiatan Pondok Ramadhan 1443H-5-1650098890.jpg', 'Penutupan dan Do\'a', NULL, NULL),
(35, 9, 'Donatur Hotel Fair Field-1-1650100407.jpg', 'Donatur Hotel Fair Field-1-1650100407.jpg', 'Penulisan Do\'a', NULL, NULL),
(36, 9, 'Donatur Hotel Fair Field-2-1650100407.jpg', 'Donatur Hotel Fair Field-2-1650100407.jpg', 'Perwakilan Sambutan', NULL, NULL),
(37, 9, 'Donatur Hotel Fair Field-3-1650100407.jpg', 'Donatur Hotel Fair Field-3-1650100407.jpg', 'Foto Bersama', NULL, NULL),
(38, 10, 'Donatur PGN (Perusahaan Gas Negara)-1-1650101159.jpg', 'Donatur PGN (Perusahaan Gas Negara)-1-1650101159.jpg', 'gambar 1', NULL, NULL),
(39, 10, 'Donatur PGN (Perusahaan Gas Negara)-2-1650101159.jpg', 'Donatur PGN (Perusahaan Gas Negara)-2-1650101159.jpg', 'Foto bersama donatur', NULL, NULL),
(40, 10, 'Donatur PGN (Perusahaan Gas Negara)-3-1650101159.jpg', 'Donatur PGN (Perusahaan Gas Negara)-3-1650101159.jpg', 'Foto Penyerahan Santunan simbolis', NULL, NULL),
(41, 11, 'Donatur PT. Sentra Support Servis-1-1650101823.jpg', 'Donatur PT. Sentra Support Servis-1-1650101823.jpg', 'Pembukaan', NULL, NULL),
(42, 11, 'Donatur PT. Sentra Support Servis-2-1650101824.jpg', 'Donatur PT. Sentra Support Servis-2-1650101824.jpg', 'sambutan', NULL, NULL),
(43, 11, 'Donatur PT. Sentra Support Servis-3-1650101824.jpg', 'Donatur PT. Sentra Support Servis-3-1650101824.jpg', 'tausiyah', NULL, NULL),
(44, 11, 'Donatur PT. Sentra Support Servis-4-1650101824.jpg', 'Donatur PT. Sentra Support Servis-4-1650101824.jpg', 'foto bersama', NULL, NULL),
(45, 11, 'Donatur PT. Sentra Support Servis-5-1650101824.jpg', 'Donatur PT. Sentra Support Servis-5-1650101824.jpg', 'santunan', NULL, NULL),
(46, 12, 'Donatur Buka Bersama di fiftysixcoffee_eatery-1-1650102557.jpg', 'Donatur Buka Bersama di fiftysixcoffee_eatery-1-1650102557.jpg', 'tampilan Badut', NULL, NULL),
(47, 12, 'Donatur Buka Bersama di fiftysixcoffee_eatery-2-1650102558.jpg', 'Donatur Buka Bersama di fiftysixcoffee_eatery-2-1650102558.jpg', 'gambar 2', NULL, NULL),
(48, 13, 'Donatur dari Bapak Yogi Ardhana-1-1650103200.jpg', 'Donatur dari Bapak Yogi Ardhana-1-1650103200.jpg', 'Penyerahan', NULL, NULL),
(49, 13, 'Donatur dari Bapak Yogi Ardhana-2-1650103200.jpg', 'Donatur dari Bapak Yogi Ardhana-2-1650103200.jpg', 'Penyerahan', NULL, NULL),
(50, 13, 'Donatur dari Bapak Yogi Ardhana-3-1650103201.jpg', 'Donatur dari Bapak Yogi Ardhana-3-1650103201.jpg', 'Peyerahan', NULL, NULL),
(51, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-1-1650103759.jpg', 'Donatur dari Keluarga Bpk. Bambang Abrianto-1-1650103759.jpg', 'Pembacaan Doa', NULL, NULL),
(52, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-2-1650103759.jpg', 'Donatur dari Keluarga Bpk. Bambang Abrianto-2-1650103759.jpg', 'Para Donatur', NULL, NULL),
(53, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-3-1650103759.jpg', 'Donatur dari Keluarga Bpk. Bambang Abrianto-3-1650103759.jpg', 'Santunan 1', NULL, NULL),
(54, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-4-1650103759.jpg', 'Donatur dari Keluarga Bpk. Bambang Abrianto-4-1650103759.jpg', 'Santunan 2', NULL, NULL),
(55, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-5-1650103760.jpg', 'Donatur dari Keluarga Bpk. Bambang Abrianto-5-1650103760.jpg', 'Buka Bersama', NULL, NULL),
(56, 15, 'Donatur Jum\'at Berkah-1-1650104136.jpg', 'Donatur Jum\'at Berkah-1-1650104136.jpg', 'Pembagian Nasi Jum\'at Berkah', NULL, NULL),
(57, 16, 'Donatur Keluarga Bpk. Widi-1-1650104508.jpg', 'Donatur Keluarga Bpk. Widi-1-1650104508.jpg', 'Do\'a Bersama', NULL, NULL),
(58, 16, 'Donatur Keluarga Bpk. Widi-2-1650104508.jpg', 'Donatur Keluarga Bpk. Widi-2-1650104508.jpg', 'Para Donatur', NULL, NULL),
(59, 16, 'Donatur Keluarga Bpk. Widi-3-1650104508.jpg', 'Donatur Keluarga Bpk. Widi-3-1650104508.jpg', 'Santunan', NULL, NULL),
(60, 17, 'Donatur Keluarga Bapak Sigit Dany Setiyono-1-1650176466.jpg', 'Donatur Keluarga Bapak Sigit Dany Setiyono-1-1650176466.jpg', 'Do\'a yang dipimpin oleh Ustd. Ari Aditya', NULL, NULL),
(61, 17, 'Donatur Keluarga Bapak Sigit Dany Setiyono-2-1650176467.jpg', 'Donatur Keluarga Bapak Sigit Dany Setiyono-2-1650176467.jpg', 'Santunan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_videos`
--

CREATE TABLE `activity_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL,
  `nama_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_videos`
--

INSERT INTO `activity_videos` (`id`, `activity_id`, `nama_video`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 8, 'Kegiatan Pondok Ramadhan 1443H-1-1650098888.mp4', 'Vidio Pembacaan Q.S Al-Waqiah', NULL, NULL),
(4, 8, 'Kegiatan Pondok Ramadhan 1443H-2-1650098889.mp4', 'Vidio Materi 3', NULL, NULL),
(5, 8, 'Kegiatan Pondok Ramadhan 1443H-3-1650098889.mp4', 'Vidio Materi tentang Sholat', NULL, NULL),
(6, 8, 'Kegiatan Pondok Ramadhan 1443H-4-1650098890.mp4', 'Vidio Do\'a dan Penutupan', NULL, NULL),
(7, 9, 'Donatur Hotel Fair Field-1-1650100407.mp4', 'Sambutan', NULL, NULL),
(8, 11, 'Donatur PT. Sentra Support Servis-1-1650101824.mp4', 'sambutan dari Bapak Daniel (direktur PT. Triple S)', NULL, NULL),
(9, 11, 'Donatur PT. Sentra Support Servis-2-1650101824.mp4', 'santunan', NULL, NULL),
(10, 12, 'Donatur Buka Bersama di fiftysixcoffee_eatery-1-1650102558.mp4', 'games dari badut', NULL, NULL),
(11, 12, 'Donatur Buka Bersama di fiftysixcoffee_eatery-2-1650102558.mp4', 'Tausiyah dari ustad. Ahmad Syafi\'i', NULL, NULL),
(12, 13, 'Donatur dari Bapak Yogi Ardhana-1-1650103201.mp4', 'Penyerahan', NULL, NULL),
(13, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-1-1650103758.mp4', 'Pembukaan', NULL, NULL),
(14, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-2-1650103758.mp4', 'Do\'a Bersama', NULL, NULL),
(15, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-3-1650103759.mp4', 'Santunan', NULL, NULL),
(16, 14, 'Donatur dari Keluarga Bpk. Bambang Abrianto-4-1650103760.mp4', 'Buka Bersama', NULL, NULL),
(17, 15, 'Donatur Jum\'at Berkah-1-1650104136.mp4', 'Pembagian Nasi Jum\'at Berkah', NULL, NULL),
(18, 16, 'Donatur Keluarga Bpk. Widi-1-1650104508.mp4', 'Do\'a Bersama', NULL, NULL),
(19, 17, 'Donatur Keluarga Bapak Sigit Dany Setiyono-1-1650176466.mp4', 'Do\'a Bersama (Asmaul Husna)', NULL, NULL),
(20, 17, 'Donatur Keluarga Bapak Sigit Dany Setiyono-2-1650176466.mp4', 'Santunan', NULL, NULL);

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
-- Table structure for table `foster_children`
--

CREATE TABLE `foster_children` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_anak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_asuh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foster_children`
--

INSERT INTO `foster_children` (`id`, `nama_anak`, `tanggal_lahir`, `jenis_kelamin`, `tingkat_pendidikan`, `nama_sekolah`, `status_asuh`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'AYUNISHA NOVARELA', '2006-11-29', 'Perempuan', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMPN 56 SURABAYA', 'Yatim Piatu', 'AYUNISHA NOVARELA - 20220417135401.jpg', '2022-04-15 03:19:23', '2022-04-17 06:54:01'),
(4, 'BAGUS DWI SETYONO', '2007-06-16', 'Laki-laki', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMPN 56 SURABAYA', 'Yatim Piatu', 'BAGUS DWI SETYONO - 20220417135447.jpg', '2022-04-15 03:22:44', '2022-04-17 06:54:47'),
(5, 'DONI AGUS SETYAWAN', '2007-01-01', 'Laki-laki', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMPN 56 SURABAYA', 'Yatim', 'DONI AGUS SETYAWAN - 20220417135536.jpg', '2022-04-15 03:25:40', '2022-04-17 06:55:36'),
(6, 'PUNGKI KARUNIA AGUSTIN', '2006-08-04', 'Perempuan', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMPN 56 SURABAYA', 'Piatu', 'PUNGKI KARUNIA AGUSTIN - 20220417135647.jpg', '2022-04-15 03:28:41', '2022-04-17 06:56:47'),
(7, 'MOCHAMMAD FAWWAS RIZKY', '2010-04-17', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 2/489 SURABAYA', 'Dhuafa', 'MOCHAMMAD FAWWAS RIZKY - 20220417135608.jpg', '2022-04-15 03:38:26', '2022-04-17 06:56:09'),
(14, 'AHMAD AINURROFIQI', '2009-09-22', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 1/488 SURABAYA', 'Yatim', '20220417135304 - AHMAD AINURROFIQI.jpg', '2022-04-17 06:53:04', '2022-04-17 06:53:04'),
(15, 'ELDWYN ERDI RIANDRA', '2014-02-08', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Yatim', '20220417135844 - ELDWYN ERDI RIANDRA.jpg', '2022-04-17 06:58:44', '2022-04-17 06:58:44'),
(16, 'AZZAHRA BULAN SISWANTORO', '2015-12-15', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Yatim', '20220417140124 - AZZAHRA BULAN SISWANTORO.jpg', '2022-04-17 07:01:24', '2022-04-17 07:01:24'),
(17, 'ACHMAD GALANG SISWANTORO', '2013-12-20', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Yatim', '20220417140231 - ACHMAD GALANG SISWANTORO.jpg', '2022-04-17 07:02:32', '2022-04-17 07:02:32'),
(18, 'NINGRUM PUTRI AYU', '2013-06-02', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Piatu', '20220417140347 - NINGRUM PUTRI AYU.jpg', '2022-04-17 07:03:47', '2022-04-17 07:03:47'),
(19, 'NISRINA NUR HANIFAH', '2011-11-07', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Yatim', '20220417140459 - NISRINA NUR HANIFAH.jpg', '2022-04-17 07:04:59', '2022-04-17 07:04:59'),
(20, 'RISTANTIA SEPTIANA HERAWATI', '2011-09-11', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Piatu', '20220417140635 - RISTANTIA SEPTIANA HERAWATI.jpg', '2022-04-17 07:06:35', '2022-04-17 07:06:35'),
(21, 'PUTRI ZAHRA AULIA', '2010-09-06', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Yatim', '20220417140738 - PUTRI ZAHRA AULIA.jpg', '2022-04-17 07:07:38', '2022-04-17 07:07:38'),
(22, 'JULIAN BAGUS SAPUTRA', '2011-07-08', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN PAKIS 3/370 SURABAYA', 'Yatim', '20220417140927 - JULIAN BAGUS SAPUTRA.jpg', '2022-04-17 07:09:27', '2022-04-17 07:09:27'),
(23, 'ALVIAN DEVANSYAH', '2009-04-01', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN PAKIS 3/370 SURABAYA', 'Yatim', '20220417141055 - ALVIAN DEVANSYAH.jpg', '2022-04-17 07:10:55', '2022-04-17 07:10:55'),
(24, 'WENDY SEBASTIAN A', '2011-08-08', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN BANYU URIP 3/364 SURABAYA', 'Piatu', '20220417141248 - WENDY SEBASTIAN A.jpg', '2022-04-17 07:12:48', '2022-04-17 07:12:48'),
(25, 'SHAFA ALMAIRA R', '2010-03-07', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 2/489 SURABAYA', 'Yatim', '20220417141427 - SHAFA ALMAIRA R.jpg', '2022-04-17 07:14:27', '2022-04-17 07:14:27'),
(26, 'ASHKA PUTRA MASFUKHIN', '2011-05-09', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN PUTAT JAYA 1/377 SURABAYA', 'Yatim', '20220417141547 - ASHKA PUTRA MASFUKHIN.jpg', '2022-04-17 07:15:47', '2022-04-17 07:15:47'),
(27, 'AQILLA TYAS IRAWATI', '2012-12-21', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Piatu', '20220417141648 - AQILLA TYAS IRAWATI.jpg', '2022-04-17 07:16:48', '2022-04-17 07:16:48'),
(28, 'ALIF NUR ALAMIN', '2008-09-16', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Piatu', '20220417141744 - ALIF NUR ALAMIN.jpg', '2022-04-17 07:17:44', '2022-04-17 07:17:44'),
(29, 'NADIN RIVKANA SHIVA', '2009-04-19', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 1/488 SURABAYA', 'Dhuafa', '20220417141854 - NADIN RIVKANA SHIVA.jpg', '2022-04-17 07:18:54', '2022-04-17 07:18:54'),
(30, 'SALMA ANNISA\' L.Q', '2012-11-13', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 1/488 SURABAYA', 'Dhuafa', '20220417142012 - SALMA ANNISA\' L.Q.jpg', '2022-04-17 07:20:12', '2022-04-17 07:20:12'),
(31, 'PUSPITA SARI DEWI', '2007-07-12', 'Perempuan', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMP BAHRUL ULUM SURABAYA', 'Yatim', '20220417142135 - PUSPITA SARI DEWI.jpg', '2022-04-17 07:21:35', '2022-04-17 07:21:35'),
(32, 'JASON AURELLIUS ANG WIJAYA', '2005-06-11', 'Laki-laki', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMP-K INDRIYASANA 7 SURABAYA', 'Yatim', '20220417142314 - JASON AURELLIUS ANG WIJAYA.jpg', '2022-04-17 07:23:15', '2022-04-17 07:23:15'),
(33, 'FELICIA AURELLIA ANG WIJAYA', '2008-07-03', 'Perempuan', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMPN 46 SURABAYA', 'Yatim', '20220417142442 - FELICIA AURELLIA ANG WIJAYA.jpg', '2022-04-17 07:24:43', '2022-04-17 07:24:43'),
(34, 'ADE WULAN DWI KRISCAHYANI', '2004-11-14', 'Perempuan', 'Sekolah Menengah Atas / Madrasah Aliyah', 'SMK KEPERAWATAN NURMEDIKA', 'Yatim', '20220417142600 - ADE WULAN DWI KRISCAHYANI.jpg', '2022-04-17 07:26:00', '2022-04-17 07:26:00'),
(35, 'MOCHAMMAD SAHRUL GUNAWAN', '2004-04-06', 'Laki-laki', 'Sekolah Menengah Atas / Madrasah Aliyah', 'SMK GEMA 45 SURABAYA', 'Piatu', '20220417142718 - MOCHAMMAD SAHRUL GUNAWAN.jpg', '2022-04-17 07:27:18', '2022-04-17 07:27:18'),
(36, 'FRADITA ISTIANAH NINGSIH', '2005-07-03', 'Perempuan', 'Sekolah Menengah Atas / Madrasah Aliyah', 'SMK BAHRUL ULUM SURABAYA', 'Dhuafa', '20220417142841 - FRADITA ISTIANAH NINGSIH.jpg', '2022-04-17 07:28:41', '2022-04-17 07:28:41'),
(37, 'DIKI ADI SAPUTRA', '2004-03-05', 'Laki-laki', 'Sekolah Menengah Atas / Madrasah Aliyah', 'SMK BAHRUL ULUM SURABAYA', 'Yatim Piatu', '20220417142935 - DIKI ADI SAPUTRA.jpg', '2022-04-17 07:29:35', '2022-04-17 07:29:35'),
(38, 'HANIYAH NAILAH', '2006-06-13', 'Perempuan', 'Sekolah Menengah Atas / Madrasah Aliyah', 'SMK GEMA 45 SURABAYA', 'Yatim', '20220417143842 - HANIYAH NAILAH.jpg', '2022-04-17 07:38:42', '2022-04-17 07:38:42'),
(39, 'TIRTA NUR CAHYA', '2003-12-12', 'Perempuan', 'Sekolah Menengah Atas / Madrasah Aliyah', 'SMKN 2 SURABAYA', 'Piatu', '20220417144018 - TIRTA NUR CAHYA.jpg', '2022-04-17 07:40:18', '2022-04-17 07:40:18'),
(40, 'ATHA ALISA IRAWAN', '2012-09-05', 'Perempuan', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 5/534 SURABAYA', 'Dhuafa', '20220417144126 - ATHA ALISA IRAWAN.jpg', '2022-04-17 07:41:26', '2022-04-17 07:41:26'),
(41, 'SHIFA ALMAIRA SALSABILA', '2007-12-13', 'Perempuan', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMPN 56 SURABAYA', 'Yatim', 'SHIFA ALMAIRA SALSABILA - 20220417144322.jpg', '2022-04-17 07:42:36', '2022-04-17 07:43:22'),
(42, 'ABIL PUTRA JUNIOR', '2013-12-13', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN DUKUH KUPANG 1/488 SURABYA', 'Piatu', 'ABIL PUTRA JUNIOR - 20220417150032.jpg', '2022-04-17 07:44:54', '2022-04-17 08:00:33'),
(43, 'DEVINA ANANDITA SYA\'BANI', '2008-08-28', 'Perempuan', 'Sekolah Menengah Pertama / Madrasah Tsanawiyah', 'SMPN 46 SURABAYA', 'Yatim', '20220417145104 - DEVINA ANANDITA SYA\'BANI.jpg', '2022-04-17 07:51:04', '2022-04-17 07:51:04'),
(44, 'DIVO ANANDA MAULANA', '2011-03-13', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SDN BANYU URIP 6/367 SURABAYA', 'Yatim', '20220417145305 - DIVO ANANDA MAULANA.jpg', '2022-04-17 07:53:05', '2022-04-17 07:53:05'),
(47, 'RICIE RACHMANA', '2007-12-15', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SD MI AL-KARIMAH SURABAYA', 'Piatu', '20220417145639 - RICIE RACHMANA.jpg', '2022-04-17 07:56:39', '2022-04-17 07:56:39'),
(48, 'RINO RINTONA', '2010-03-27', 'Laki-laki', 'Sekolah Dasar / Madrasah Ibtidaiah', 'SD MI AL-KARIMAH SURABAYA', 'Piatu', '20220417145829 - RINO RINTONA.jpg', '2022-04-17 07:58:29', '2022-04-17 07:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `foundation_photo_profiles`
--

CREATE TABLE `foundation_photo_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `nama_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foundation_photo_profiles`
--

INSERT INTO `foundation_photo_profiles` (`id`, `profile_id`, `nama_foto`, `created_at`, `updated_at`) VALUES
(1, 2, 'Profil Yayasan Nurul Hasanah Surabaya-1-1650098368.jpg', NULL, NULL),
(2, 2, 'Profil Yayasan Nurul Hasanah Surabaya-2-1650098368.jpg', NULL, NULL),
(3, 2, 'Profil Yayasan Nurul Hasanah Surabaya-3-1650098369.jpg', NULL, NULL),
(4, 2, 'Profil Yayasan Nurul Hasanah Surabaya-4-1650098369.jpg', NULL, NULL),
(5, 2, 'Profil Yayasan Nurul Hasanah Surabaya-5-1650098370.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foundation_profiles`
--

CREATE TABLE `foundation_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foundation_profiles`
--

INSERT INTO `foundation_profiles` (`id`, `judul`, `uraian`, `created_at`, `updated_at`) VALUES
(2, 'Profil Yayasan Nurul Hasanah Surabaya', 'Salah satu dimensi penting dalam Pembangunan Nasional adalah sumber daya manusia, anak sebagai generasi penerus bangsa tentunya akan menjadi perhatian yang cukup serius bagi setiap bangsa yang ada di dunia ini, salah satu fenomena yang dapat kita lihat adalah adanya pembinaan anak-anak yatim piatu yang belum maksimal.<br />\r\nYayasan Nurul Hasanah Surabaya adalah lembaga sosial islam yang tumbuh dan berkembang di lingkup masyrakat Kel. Dukuh Kupang, Kec. Dukuh Pakis, Kota Surabaya. Lembaga ini terbentuk bermula dari keprihatinan dan kepedulian kami serta rasa solidaritas dan kesadaran yang tinggi warga setempat akan tumbuh kembang dan masa depan anak-anak yatim/piatu sekitar yang kurang beruntung, lembaga ini bisa tumbuh subur atas partisipasi dan kerjasama warga setempat juga pihak-pihak yang terkait di dalamnya.<br />\r\nKegiatan sosial Yayasan Nurul Hasanah Surabaya awalnya dimulai pada tahun 1996 dengan kegiatan penyantunan kepada para anak yatim piatu, yatim, piatu, maupun dhuafa di kawasan Dukuh Kupang dan sekitarnya. Kegiatan tersebut umumnya dilaksanakan pada hari-hari besar Islam seperti Muharram, Rajab, Ramadhan dan Dzulhijjah.<br />\r\nSaat ini Yayasan Nurul Hasanah memiliki 55 Anak asuh (Yatim / Piatu / Yatim Piatu / Dhu\'afa) yang tersebar di berbagai jenjang pendidikan, mulai dari TK hingga SMA / SMK.<br />\r\nPara pengurus panti senantiasa berusaha agar anak-anak yang menjadi binaan Yayasan Nurul Hasanah Surabaya, menunjukkan rasa terima kasih kepada para donatur, baik langsung ataupun tidak langsung yaitu dengan berusaha rajin mengikuti program-program pendidikan dan pembinaan yang telah ditetapkan, baik oleh sekolah maupun oleh Yayasan sesuai dengan bakat dan kemampuannya. Alhamdulillah beberapa diantara mereka ada yang memiliki prestasi membanggakan, baik dibidang pendidikan umum maupun keagamaan.', '2022-04-16 08:39:28', '2022-04-16 08:39:28');

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
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_resets_table', 1),
(47, '2019_08_19_000000_create_failed_jobs_table', 1),
(48, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(49, '2022_03_05_074548_create_foster_children_table', 1),
(50, '2022_03_05_074846_create_activity_photos_table', 1),
(51, '2022_03_05_074902_create_activity_videos_table', 1),
(52, '2022_03_05_074903_create_activities_table', 1),
(53, '2022_03_05_074923_create_posters_table', 1),
(54, '2022_03_05_075117_create_foundation_photo_profiles_table', 1),
(55, '2022_03_05_075118_create_foundation_profiles_table', 1);

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
-- Table structure for table `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tampil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posters`
--

INSERT INTO `posters` (`id`, `nama_poster`, `status_tampil`, `created_at`, `updated_at`) VALUES
(1, '20220416130412 - Poster Acara.jpg', 1, '2022-04-16 06:04:13', '2022-04-16 06:57:51');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Seto Kuncoro', 'setokuncorogo@gmail.com', NULL, '$2y$10$0WDrdrKaTbH9w68ZfidTSuJI2Cm01aQhWv2H9i4jXBullVbGD7MbC', NULL, '2022-04-14 03:27:50', '2022-04-14 03:27:50'),
(2, 'Serlin', 'serlinserlin74@gmail.com', NULL, '$2y$10$7c7gAXH8.TzxCL/.PScoqeXkn0lotuQc7LrwxJvlYh.c212iALtta', NULL, '2022-04-14 03:34:12', '2022-04-14 03:34:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_photos`
--
ALTER TABLE `activity_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_photos_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `activity_videos`
--
ALTER TABLE `activity_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_videos_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foster_children`
--
ALTER TABLE `foster_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foundation_photo_profiles`
--
ALTER TABLE `foundation_photo_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foundation_photo_profiles_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `foundation_profiles`
--
ALTER TABLE `foundation_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `posters`
--
ALTER TABLE `posters`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `activity_photos`
--
ALTER TABLE `activity_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `activity_videos`
--
ALTER TABLE `activity_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foster_children`
--
ALTER TABLE `foster_children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `foundation_photo_profiles`
--
ALTER TABLE `foundation_photo_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foundation_profiles`
--
ALTER TABLE `foundation_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_photos`
--
ALTER TABLE `activity_photos`
  ADD CONSTRAINT `activity_photos_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activity_videos`
--
ALTER TABLE `activity_videos`
  ADD CONSTRAINT `activity_videos_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foundation_photo_profiles`
--
ALTER TABLE `foundation_photo_profiles`
  ADD CONSTRAINT `foundation_photo_profiles_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `foundation_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
