-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2020 at 06:34 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(3) UNSIGNED NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindasan` int(11) NOT NULL,
  `grup` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `tindasan`, `grup`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Bagian 1', 0, 0, 0, '2020-04-12 15:40:18', 3, NULL, NULL),
(2, 'Bagian Humas', 1, 2, 1, '2020-04-12 19:55:25', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `nama`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Berkas 1', 1, '2020-04-23 06:27:52', 3, '2020-04-23 13:28:36', 3);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int(2) UNSIGNED NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `nama`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'I A', 0, '2020-04-06 04:48:40', 3, '2020-04-22 23:46:46', 3),
(2, 'I B', 1, '2020-04-12 09:37:49', 3, '2020-04-22 23:46:56', 3),
(3, 'I C', 1, '2020-04-12 19:56:08', 3, '2020-04-22 23:47:04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(3) UNSIGNED NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(5) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `nama`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Pejabat', 1, NULL, 3, '2020-04-12 16:32:13', 3),
(2, 'Pejabat 2', 0, NULL, 3, NULL, 0),
(3, 'Pejabat 3', 1, NULL, 3, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_parent` int(3) DEFAULT NULL,
  `keterangan` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `id_parent`, `keterangan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, ' Deputi 1', 1, 'benar', '2020-03-25 14:19:26', 5, '2020-04-23 12:17:19', 3),
(4, 'Deputi 2', 1, 'test', '2020-03-25 14:33:15', 2, '2020-04-23 12:17:44', 3),
(6, 'KaBiro 1A', 1, 'humas', '2020-04-12 09:37:35', 3, '2020-04-23 12:18:03', 3),
(7, 'Kepala Cabang', 6, '...', '2020-04-12 19:55:51', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `deskripsi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Arsip', 'Arsip', '2020-03-25 14:45:52', 2, '2020-04-12 22:49:38', 3),
(2, 'Non Arsip', 'deskripsi non arsip', '2020-03-25 14:46:02', 2, '2020-04-12 22:49:48', 3),
(3, 'Arsip Pendidikan', 'arsip pendidikan', '2020-04-12 19:58:36', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `id_jabatan` int(3) NOT NULL,
  `id_golongan` int(3) NOT NULL,
  `id_pendidikan` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `id_bagian`, `id_jabatan`, `id_golongan`, `id_pendidikan`, `status`, `alamat`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'satria', '2020-04-09', 1, 1, 4, 2, 3, 1, 'jalan diponegoro', '2020-04-12 19:54:57', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_parent` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_retensi` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id`, `nama`, `id_parent`, `id_retensi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('000', 'UMUM', '', 2, '2020-03-26 02:23:14', 5, NULL, NULL),
('001', 'anggaran pemerintahan', '100', 3, '2020-04-12 09:50:14', 3, NULL, NULL),
('005', 'Anggaran Terbuka', '001', 3, '2020-04-12 20:00:52', 3, NULL, NULL),
('100', 'PEMERINTAHAN', '', 3, '2020-03-26 02:31:12', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(5) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0 = menghapus, 1 = menambah, 2 = edit, 4 = konfirmasi, 5 = menolak',
  `deskripsi` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `type`, `deskripsi`, `created_at`, `created_by`) VALUES
(1, 1, 'Ludfi Menambah Pengiriman j& T', '2020-03-26 09:18:19', 1),
(2, 1, 'Eko Menambahkan Pengguna Seli', '2020-03-26 17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(2) UNSIGNED NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Sma', 1, '2020-04-06 04:58:24', 3, NULL, NULL),
(2, 'SMK', 1, '2020-04-06 04:58:33', 3, NULL, NULL),
(3, 'SMP', 1, '2020-04-06 04:58:40', 3, NULL, NULL),
(4, 'S1', 0, '2020-04-06 04:58:47', 3, NULL, NULL),
(5, 'S2', 0, '2020-04-06 04:58:51', 3, NULL, NULL),
(6, 'S3', 0, '2020-04-06 04:58:56', 3, NULL, NULL),
(7, 'D3', 1, '2020-04-12 09:38:06', 3, '2020-04-12 23:05:27', 3),
(8, 'D1', 1, '2020-04-12 19:56:20', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(90) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `level`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Mochamad Ludfi Rahman', 'ludfyr@gmail.com', '$2y$10$lrgNvrlyEnDXffjPfuUjVe0iWdT8D0x4ef0lM8u6fWfHnPOfYXj7W', 1, 1, '2020-03-25 02:26:58', 1, '0000-00-00 00:00:00', 0),
(3, 'Admin', 'admin@gmail.com', '$2y$10$AoBLsKRdineKZUOHjpmrBugPHiDKw5CY9iHnrKB5UhmB5LbRR0Or6', 1, 1, '2020-03-26 12:29:40', 1, '0000-00-00 00:00:00', 0),
(4, 'Sekretaris', 'sekretaris@gmail.com', '$2y$10$HPrkk25U37lbCNZWFp1.uO.bBYI14XHKwCUmRvP9T1Yvwav8rS4QC', 3, 1, '2020-03-26 12:35:02', 1, '0000-00-00 00:00:00', 0),
(5, 'Kepala', 'kepala@mail.com', '$2y$10$FiIPUqfACndcDb/Cons2E.LEX.dZOA96Z87.JC6Ov5nxAZaJDYVBS', 4, 1, '2020-03-26 12:35:42', 1, '0000-00-00 00:00:00', 0),
(6, 'eko@gmail.com', 'eko@gmail.com', '$2y$10$45NpRN6wgZxEmjYQa006ju25pwd9yQTgxrPn0oEs8jcGBlYPyg/fq', 2, 1, '2020-04-12 09:38:30', 1, '0000-00-00 00:00:00', 0),
(7, 'samsul arifin', 'samsul@gmail.com', '$2y$10$6Hrvo59Yefu2.9lqKXIlsupxbbX6DRaLf5sPG.I/gGaxjY0XP9yU2', 2, 1, '2020-04-12 19:57:27', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `id` int(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`id`, `nama`, `deskripsi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'JNE1', 'jne adalah ...\r\n', '2020-03-25 14:42:33', 2, '2020-03-25 21:42:59', 2),
(2, 'J&T', 'J&T', '2020-03-25 14:43:13', 2, '0000-00-00 00:00:00', 0),
(3, 'Pos', 'Pos...', '2020-03-25 14:43:22', 2, '0000-00-00 00:00:00', 0),
(4, 'Sicepat', 'pengirim tercepat', '2020-04-12 15:49:07', 3, '0000-00-00 00:00:00', 0),
(5, 'Kargo', 'kargo description', '2020-04-12 19:57:50', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `retensi`
--

CREATE TABLE `retensi` (
  `id` int(4) NOT NULL,
  `jenis` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_parent` int(4) DEFAULT NULL,
  `aktif` varchar(1) NOT NULL,
  `inaktif` varchar(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `retensi`
--

INSERT INTO `retensi` (`id`, `jenis`, `id_parent`, `aktif`, `inaktif`, `keterangan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Penyusunan Anggaran', NULL, '-', '-', '-', '2020-03-25 14:59:33', 2, '0000-00-00 00:00:00', 0),
(2, 'Anggaran Rutin', 1, '-', '-', '-', '2020-03-25 15:10:06', 2, '0000-00-00 00:00:00', 0),
(3, 'Pra Daftar Usulan Kegiatan (Pra DUK) Pra Daftar Usulan Rencana Kerja (Pra DURK)', 2, '1', '2', 'musnah', '2020-03-25 15:11:49', 2, '0000-00-00 00:00:00', 0),
(4, 'Anggaran Pemerintahan', 2, '2', '3', 'deskripsi', '2020-04-12 09:49:51', 3, '0000-00-00 00:00:00', 0),
(5, 'Anggaran Pendidikan ', 3, '1', '2', 'keterangan', '2020-04-12 19:59:12', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sifat`
--

CREATE TABLE `sifat` (
  `id` int(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sifat`
--

INSERT INTO `sifat` (`id`, `nama`, `deskripsi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Penting', 'penting', '2020-03-25 14:45:17', 2, '0000-00-00 00:00:00', 0),
(3, 'Sangat penting', 'deskripsi ', '2020-04-12 09:49:07', 3, '0000-00-00 00:00:00', 0),
(4, 'Mendesak', 'deskripsi sangat mendesak sekali', '2020-04-12 15:49:27', 3, '0000-00-00 00:00:00', 0),
(5, 'darurat', 'sifat surat darurat', '2020-04-12 19:58:16', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(4) NOT NULL,
  `id_klasifikasi` varchar(15) NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `id_media_pengirim` int(3) NOT NULL,
  `tanggal_dikirim` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_hak_akses` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = aktif, 0 = tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `id_klasifikasi`, `no_surat`, `tujuan`, `perihal`, `id_media_pengirim`, `tanggal_dikirim`, `keterangan`, `file`, `id_hak_akses`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '000', '89898', 'Zainul Anshori', 'Pajak', 2, '2020-03-19', 'jenis', '89898.jpg', 0, '2020-03-26 08:03:10', 2, '0000-00-00 00:00:00', 0, 1),
(3, '000', '001998', 'Deni Eko', 'Perhutanan', 1, '2020-04-23', 'penting', '001998.PNG', 0, '2020-04-12 15:24:25', 3, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar_tembusan`
--

CREATE TABLE `surat_keluar_tembusan` (
  `id` int(4) NOT NULL,
  `id_surat` int(8) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_keluar_tembusan`
--

INSERT INTO `surat_keluar_tembusan` (`id`, `id_surat`, `id_bagian`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2020-04-12 17:52:42', NULL),
(2, 4, 2, '2020-04-12 17:52:42', NULL),
(3, 1, 1, '2020-04-12 19:48:18', NULL),
(4, 1, 2, '2020-04-12 19:48:18', NULL),
(5, 2, 1, '2020-04-12 19:51:18', NULL),
(6, 3, 2, '2020-04-12 19:52:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(8) NOT NULL,
  `id_klasifikasi` varchar(15) NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `id_media_pengirim` int(3) NOT NULL,
  `file` varchar(30) NOT NULL,
  `tanggal_mulai_retensi` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = delete, 1 = aktif, 2 = inaktif',
  `dibaca` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `id_klasifikasi`, `no_surat`, `tanggal_surat`, `pengirim`, `id_jenis`, `id_media_pengirim`, `file`, `tanggal_mulai_retensi`, `created_at`, `created_by`, `status`, `dibaca`) VALUES
(1, '001', '267267', '0000-00-00', 'Dinas Perhutanan', 1, 2, '267267.png', '2020-04-10', '2020-04-12 19:48:18', 4, 1, 0),
(3, '001', '7787187', '0000-00-00', 'dinas pendisikan', 1, 2, '7787187.png', '2020-04-21', '2020-04-12 19:52:42', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk_tembusan`
--

CREATE TABLE `surat_masuk_tembusan` (
  `id` int(4) NOT NULL,
  `id_surat` int(8) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_masuk_tembusan`
--

INSERT INTO `surat_masuk_tembusan` (`id`, `id_surat`, `id_bagian`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2020-04-12 17:52:42', NULL),
(2, 4, 2, '2020-04-12 17:52:42', NULL),
(3, 1, 1, '2020-04-12 19:48:18', NULL),
(4, 1, 2, '2020-04-12 19:48:18', NULL),
(5, 2, 1, '2020-04-12 19:51:18', NULL),
(6, 3, 2, '2020-04-12 19:52:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retensi`
--
ALTER TABLE `retensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sifat`
--
ALTER TABLE `sifat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar_tembusan`
--
ALTER TABLE `surat_keluar_tembusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk_tembusan`
--
ALTER TABLE `surat_masuk_tembusan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengirim`
--
ALTER TABLE `pengirim`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retensi`
--
ALTER TABLE `retensi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sifat`
--
ALTER TABLE `sifat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_keluar_tembusan`
--
ALTER TABLE `surat_keluar_tembusan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_masuk_tembusan`
--
ALTER TABLE `surat_masuk_tembusan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
