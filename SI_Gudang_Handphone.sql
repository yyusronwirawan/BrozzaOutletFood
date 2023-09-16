-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 05, 2023 at 10:49 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SI_Gudang_Handphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `gudang_id` bigint(20) UNSIGNED NOT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_masuk` int(11) DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  `stok_akhir` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `harga`, `satuan`, `kategori_id`, `gudang_id`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`, `created_at`, `updated_at`) VALUES
(1, 'OPPO A78 5G', 30670000, 'pcs', 11, 1, 90, 5, 8, 87, '2023-06-03 09:27:57', '2023-06-04 13:57:45'),
(2, 'OPPO A77s', 2500000, 'pcs', 11, 1, 80, 45, 6, 119, '2023-06-03 09:28:36', '2023-06-04 14:19:20'),
(3, 'OPPO A57', 2109000, 'pcs', 11, 1, 100, 90, 2, 188, '2023-06-03 09:29:13', '2023-06-04 13:10:09'),
(4, 'OPPO A96', 3999000, 'pcs', 11, 1, 50, 0, 3, 47, '2023-06-03 09:29:51', '2023-06-04 13:10:02'),
(5, 'OPPO A55', 1999000, 'pcs', 11, 1, 90, 40, 1, 129, '2023-06-03 09:30:20', '2023-06-03 10:16:10'),
(6, 'iPhone 14 Pro Max', 20999000, 'pcs', 12, 2, 30, 30, 1, 59, '2023-06-03 09:31:53', '2023-06-03 10:16:18'),
(7, 'iPhone 14 Pro', 18999000, 'pcs', 12, 2, 50, 0, 1, 49, '2023-06-03 09:32:24', '2023-06-04 13:17:27'),
(8, 'iPhone 14 Plus', 16999000, 'pcs', 12, 2, 50, 60, 3, 107, '2023-06-03 09:33:05', '2023-06-04 13:17:48'),
(9, 'iPhone 14', 14999000, 'pcs', 11, 2, 60, 0, 4, 56, '2023-06-03 09:33:39', '2023-06-03 10:15:32'),
(10, 'iPhone 13 Pro Max', 19499000, 'pcs', 12, 2, 50, 0, 4, 46, '2023-06-03 09:34:12', '2023-06-03 10:15:46'),
(11, 'iPhone 13 Pro', 17999000, 'pcs', 12, 2, 20, 0, 0, 20, '2023-06-03 09:34:36', '2023-06-03 09:34:36'),
(12, 'iPhone 13', 12999000, 'pcs', 12, 2, 45, 80, 0, 125, '2023-06-03 09:35:04', '2023-06-03 09:45:54'),
(13, 'iPhone 13 mini', 12499000, 'pcs', 12, 2, 40, 50, 0, 90, '2023-06-03 09:35:39', '2023-06-03 09:44:51'),
(14, 'iPhone SE 3rd Gen', 7999000, 'pcs', 12, 2, 80, 0, 0, 80, '2023-06-03 09:36:14', '2023-06-03 09:36:14'),
(15, 'OPPO A76', 2487000, 'pcs', 11, 3, 200, 0, 0, 200, '2023-06-03 09:36:46', '2023-06-03 09:36:46'),
(16, 'OPPO A17k', 1519000, 'pcs', 11, 3, 218, 0, 1, 217, '2023-06-03 09:37:59', '2023-06-03 10:15:26'),
(17, 'OPPO A17', 1600000, 'pcs', 11, 3, 100, 0, 2, 98, '2023-06-03 09:38:30', '2023-06-04 13:10:17'),
(18, 'OPPO A95', 2350000, 'pcs', 11, 3, 75, 0, 2, 73, '2023-06-03 09:39:03', '2023-06-04 13:10:23'),
(19, 'Samsung Galaxy A03', 1339000, 'pcs', 14, 4, 40, 0, 5, 35, '2023-06-03 09:40:53', '2023-06-04 14:19:32'),
(20, 'Samsung Galaxy A04', 1499000, 'pcs', 14, 4, 79, 50, 4, 125, '2023-06-03 09:41:21', '2023-06-04 14:19:38'),
(21, 'Samsung Galaxy A13', 2199000, 'pcs', 14, 5, 100, 90, 0, 190, '2023-06-03 09:41:56', '2023-06-03 09:45:38'),
(22, 'Samsung Galaxy A23 5G', 5399000, 'pcs', 14, 4, 50, 50, 0, 100, '2023-06-03 09:42:30', '2023-06-03 09:45:10'),
(23, 'Xiaomi 13', 10000000, 'pcs', 15, 2, 30, 100, 1, 129, '2023-06-03 09:43:24', '2023-06-04 13:17:55'),
(24, 'Huawei', 2000000, 'pcs', 16, 3, 20, 20, 3, 37, '2023-06-04 15:12:37', '2023-06-04 15:17:00'),
(25, 'oppo a9', 1500000, 'pcs', 11, 1, 20, 20, 5, 35, '2023-06-04 16:14:42', '2023-06-04 16:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `gudangs`
--

CREATE TABLE `gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gudangs`
--

INSERT INTO `gudangs` (`id`, `nama_gudang`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Gudang A', 'Jln. Bahagia  No. 262, Pasuruan 23617, Kalbar, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(2, 'Gudang B', 'Dk. Dewi Sartika No. 888, Kupang 87351, Kepri, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(3, 'Gudang C', 'Jln. Yosodipuro No. 751, Binjai 45607, Pabar, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(4, 'Gudang D', 'Jr. Bappenas No. 482, Kendari 67496, Sulut, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(5, 'Gudang E', 'Psr. Salam No. 819, Gorontalo 87567, Kalsel, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(6, 'Gudang F', 'Ki. Tambun No. 913, Banda Aceh 25442, Bali, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(7, 'Gudang G', 'Jr. Sutoyo No. 384, Bukittinggi 61493, Sultra, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(8, 'Gudang H', 'Kpg. Kebangkitan Nasional No. 557, Bontang 38106, Sulbar, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(9, 'Gudang I', 'Psr. Jagakarsa No. 459, Sabang 88132, Banten, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(10, 'Gudang J', 'Dk. Kali No. 435, Samarinda 29005, Aceh, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(11, 'Gudang K', 'Psr. Barat No. 648, Pagar Alam 65403, DIY, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(12, 'Gudang L', 'Ki. Pasteur No. 741, Padangsidempuan 72547, Sultra, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(13, 'Gudang M', 'Jr. Zamrud No. 417, Batu 54173, Babel, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(14, 'Gudang N', 'Ki. Astana Anyar No. 44, Administrasi Jakarta Pusat 19665, Kalteng, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(15, 'Gudang O', 'Gg. Dago No. 789, Bogor 47360, Babel, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(16, 'Gudang P', 'Gg. R.M. Said No. 872, Metro 86226, Jatim, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(17, 'Gudang Q', 'Ki. Dipatiukur No. 985, Palopo 76798, Malut, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(18, 'Gudang R', 'Jr. Radio No. 457, Padang 39431, Kalbar, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(19, 'Gudang S', 'Jln. Perintis Kemerdekaan No. 972, Prabumulih 66830, Kalsel, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(20, 'Gudang T', 'Ki. Gremet No. 491, Bukittinggi 99229, Aceh, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(21, 'Gudang U', 'Ki. W.R. Supratman No. 748, Bontang 95197, Banten, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(22, 'Gudang V', 'Dk. Hasanuddin No. 266, Sabang 13020, Jatim, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(23, 'Gudang W', 'Ki. Yos Sudarso No. 792, Tangerang Selatan 10849, Sumsel, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(24, 'Gudang X', 'Gg. Baabur Royan No. 244, Bandung 43282, Jateng, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(25, 'Gudang Y', 'Ki. Imam Bonjol No. 220, Cirebon 76542, Sumsel, Jawa Timur', '2023-06-03 09:06:35', '2023-06-03 09:06:35'),
(26, 'Gudang Z', 'Gg. Sutarto No. 106, Yogyakarta 98134, Sumsel, Jawa Timur', '2023-06-03 09:06:35', '2023-06-04 07:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pengirimen`
--

CREATE TABLE `jadwal_pengirimen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_pengirimen`
--

INSERT INTO `jadwal_pengirimen` (`id`, `Tujuan`, `Tanggal`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', '2023-06-05', '2023-06-03 10:01:52', '2023-06-03 10:01:52'),
(2, 'surabaya', '2023-06-04', '2023-06-03 10:09:09', '2023-06-03 10:09:09'),
(3, 'bandung', '2023-06-05', '2023-06-03 10:09:21', '2023-06-03 10:09:21'),
(4, 'madura', '2023-06-08', '2023-06-03 10:09:32', '2023-06-03 10:09:32'),
(5, 'sumenep', '2023-06-05', '2023-06-04 16:33:35', '2023-06-04 16:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(11, 'OPPO', '2023-06-03 09:22:38', '2023-06-03 09:22:38'),
(12, 'APPLE', '2023-06-03 09:22:43', '2023-06-03 09:22:43'),
(13, 'NOKIA', '2023-06-03 09:22:48', '2023-06-03 09:22:48'),
(14, 'SAMSUNG', '2023-06-03 09:22:57', '2023-06-03 09:22:57'),
(15, 'XIOMI', '2023-06-03 09:23:21', '2023-06-03 09:23:21'),
(16, 'HUAWEI', '2023-06-03 09:24:00', '2023-06-03 09:24:00'),
(17, 'EVERCOSS', '2023-06-03 09:24:32', '2023-06-03 09:24:32'),
(18, 'LG', '2023-06-03 09:25:12', '2023-06-03 09:25:12'),
(19, 'SONY', '2023-06-03 09:25:15', '2023-06-03 09:25:15'),
(20, 'VIVO', '2023-06-03 09:25:23', '2023-06-03 09:25:23'),
(21, 'LENOVO', '2023-06-03 09:25:30', '2023-06-03 09:25:30'),
(22, 'ASUS', '2023-06-03 09:25:43', '2023-06-03 09:25:43'),
(23, 'ONE PLUZ', '2023-06-03 09:25:52', '2023-06-03 09:25:52'),
(24, 'ZTE', '2023-06-03 09:25:57', '2023-06-03 09:25:57'),
(25, 'ADVAN', '2023-06-03 09:26:11', '2023-06-03 09:26:11'),
(26, 'POLYTRON', '2023-06-03 09:26:18', '2023-06-03 09:26:18');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_04_12_034019_create_pegawais_table', 1),
(5, '2023_04_13_000000_create_users_table', 1),
(6, '2023_04_14_034150_create_supirs_table', 1),
(7, '2023_04_14_034502_create_outlets_table', 1),
(8, '2023_04_14_034513_create_gudangs_table', 1),
(9, '2023_04_14_034548_create_kategoris_table', 1),
(10, '2023_04_14_034722_create_barangs_table', 1),
(11, '2023_04_14_034733_create_sirkulasi_barangs_table', 1),
(12, '2023_04_14_034745_create_truks_table', 1),
(13, '2023_04_14_034814_create_jadwal_pengirimen_table', 1),
(14, '2023_04_14_034835_create_pemesanans_table', 1),
(15, '2023_04_14_034844_create_pengirimen_table', 1),
(16, '2023_04_14_034859_create_rutes_table', 1),
(17, '2023_04_14_034912_create_penerima_barangs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_outlet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `nama_outlet`, `alamat`, `tlp`, `id_pengguna`, `created_at`, `updated_at`) VALUES
(1, 'Cagak Rajata', NULL, NULL, 1, '2023-06-03 09:08:05', '2023-06-03 09:08:05'),
(2, 'Ratih Yuniar', NULL, NULL, 2, '2023-06-03 09:08:09', '2023-06-03 09:08:09'),
(3, 'Violet Melani', NULL, NULL, 3, '2023-06-03 09:08:12', '2023-06-03 09:08:12'),
(4, 'Cager Narpati', NULL, NULL, 4, '2023-06-03 09:08:15', '2023-06-03 09:08:15'),
(5, 'Calista Yuliarti', NULL, NULL, 5, '2023-06-03 09:08:21', '2023-06-03 09:08:21'),
(6, 'Luwar Sitorus', NULL, NULL, 6, '2023-06-03 09:08:24', '2023-06-03 09:08:24'),
(7, 'Chandra Pradipta', NULL, NULL, 7, '2023-06-03 09:08:27', '2023-06-03 09:08:27'),
(8, 'Daniswara Bagya Budiman', NULL, NULL, 8, '2023-06-03 09:08:31', '2023-06-03 09:08:31'),
(9, 'Naradi Sihotang', NULL, NULL, 9, '2023-06-03 09:08:34', '2023-06-03 09:08:34'),
(11, 'Tirtayasa Sinaga', NULL, NULL, 11, '2023-06-03 09:08:43', '2023-06-03 09:08:43'),
(12, 'Danu Siregar', NULL, NULL, 12, '2023-06-03 09:08:50', '2023-06-03 09:08:50'),
(13, 'Kuncara Siregar', NULL, NULL, 13, '2023-06-03 09:08:53', '2023-06-03 09:08:53'),
(14, 'Emong Kurniawan S.Farm', NULL, NULL, 10, '2023-06-04 11:49:11', '2023-06-04 11:49:11'),
(15, 'Bahuwirya Narpati S.Psi', NULL, NULL, 14, '2023-06-04 12:27:47', '2023-06-04 12:27:47'),
(18, 'Safina Purwanti', NULL, NULL, 57, '2023-06-04 13:05:40', '2023-06-04 13:05:40'),
(19, 'sitti aisyah', NULL, NULL, 68, '2023-06-04 15:05:01', '2023-06-04 15:05:01'),
(20, 'ikbal', NULL, NULL, 69, '2023-06-04 16:11:42', '2023-06-04 16:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hakakses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `hakakses`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-06-03 09:04:39', '2023-06-03 09:04:39'),
(2, 'Pegawai', '2023-06-03 09:04:39', '2023-06-03 09:04:39'),
(3, 'Outlet', '2023-06-03 09:04:39', '2023-06-03 09:04:39'),
(4, 'Supir', '2023-06-03 09:04:39', '2023-06-03 09:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `id_outlet` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `kode_pesanan`, `id_barang`, `total_harga`, `jumlah_barang`, `id_outlet`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PM-20230603-1-001', 1, 92010000, 3, 1, 'Sedang Diproses', '2023-06-03 10:10:39', '2023-06-04 08:01:59'),
(2, 'PM-20230603-1-001', 2, 5000000, 2, 1, 'Sedang Diproses', '2023-06-03 10:10:39', '2023-06-04 08:01:59'),
(3, 'PM-20230603-1-001', 1, 30670000, 1, 1, 'Sedang Diproses', '2023-06-03 10:10:39', '2023-06-04 08:01:59'),
(4, 'PM-20230603-1-002', 2, 2500000, 1, 1, 'Sedang Diproses', '2023-06-03 10:10:49', '2023-06-03 10:15:06'),
(5, 'PM-20230603-1-002', 20, 1499000, 1, 1, 'Sedang Diproses', '2023-06-03 10:10:49', '2023-06-03 10:15:13'),
(6, 'PM-20230603-1-002', 19, 1339000, 1, 1, 'Sedang Diproses', '2023-06-03 10:10:49', '2023-06-03 10:15:19'),
(7, 'PM-20230603-1-002', 16, 1519000, 1, 1, 'Sedang Diproses', '2023-06-03 10:10:49', '2023-06-03 10:15:26'),
(8, 'PM-20230603-1-003', 9, 59996000, 4, 1, 'Sedang Diproses', '2023-06-03 10:10:57', '2023-06-03 10:17:02'),
(9, 'PM-20230603-1-003', 10, 58497000, 3, 1, 'Sampai di tujuan', '2023-06-03 10:10:57', '2023-06-04 08:30:14'),
(10, 'PM-20230603-1-003', 10, 19499000, 1, 1, 'Sampai di tujuan', '2023-06-03 10:10:57', '2023-06-04 08:30:14'),
(11, 'PM-20230603-1-004', 4, 11997000, 3, 1, 'Sedang Diproses', '2023-06-03 10:11:13', '2023-06-04 13:10:02'),
(12, 'PM-20230603-1-004', 3, 4218000, 2, 1, 'Sedang Diproses', '2023-06-03 10:11:13', '2023-06-04 13:10:09'),
(13, 'PM-20230603-1-004', 17, 1600000, 1, 1, 'Sedang Diproses', '2023-06-03 10:11:13', '2023-06-04 13:10:17'),
(14, 'PM-20230603-1-004', 18, 2350000, 1, 1, 'Sedang Diproses', '2023-06-03 10:11:13', '2023-06-04 13:10:23'),
(15, 'PM-20230603-2-005', 1, 30670000, 1, 2, 'Sedang Diproses', '2023-06-03 10:12:30', '2023-06-04 13:11:27'),
(16, 'PM-20230603-2-005', 2, 2500000, 1, 2, 'Sedang Diproses', '2023-06-03 10:12:30', '2023-06-04 14:19:04'),
(17, 'PM-20230603-2-005', 2, 2500000, 1, 2, 'Sedang Diproses', '2023-06-03 10:12:30', '2023-06-04 14:19:12'),
(18, 'PM-20230603-2-005', 2, 2500000, 1, 2, 'Sedang Diproses', '2023-06-03 10:12:30', '2023-06-04 14:19:20'),
(19, 'PM-20230603-2-006', 18, 2350000, 1, 2, 'Dalam Pengiriman', '2023-06-03 10:12:34', '2023-06-03 13:14:20'),
(20, 'PM-20230603-2-006', 17, 1600000, 1, 2, 'Dalam Pengiriman', '2023-06-03 10:12:34', '2023-06-03 13:14:20'),
(21, 'PM-20230603-2-007', 7, 18999000, 1, 2, 'Sampai di tujuan', '2023-06-03 10:12:40', '2023-06-04 13:20:46'),
(22, 'PM-20230603-2-007', 8, 16999000, 1, 2, 'Sampai di tujuan', '2023-06-03 10:12:40', '2023-06-04 13:20:46'),
(23, 'PM-20230603-2-007', 8, 16999000, 1, 2, 'Sampai di tujuan', '2023-06-03 10:12:40', '2023-06-04 13:20:46'),
(24, 'PM-20230603-2-007', 8, 16999000, 1, 2, 'Sampai di tujuan', '2023-06-03 10:12:40', '2023-06-04 13:20:46'),
(25, 'PM-20230603-2-007', 23, 10000000, 1, 2, 'Sampai di tujuan', '2023-06-03 10:12:40', '2023-06-04 13:20:46'),
(26, 'PM-20230603-2-008', 19, 1339000, 1, 2, 'Sedang Diproses', '2023-06-03 10:12:53', '2023-06-04 14:19:32'),
(27, 'PM-20230603-2-008', 20, 1499000, 1, 2, 'Sedang Diproses', '2023-06-03 10:12:53', '2023-06-04 14:19:38'),
(28, 'PM-20230603-2-008', 11, 17999000, 1, 2, 'Belum Diproses', '2023-06-03 10:12:53', '2023-06-03 10:12:53'),
(29, 'PM-20230603-2-008', 12, 12999000, 1, 2, 'Belum Diproses', '2023-06-03 10:12:53', '2023-06-03 10:12:53'),
(30, 'PM-20230603-2-008', 5, 1999000, 1, 2, 'Belum Diproses', '2023-06-03 10:12:53', '2023-06-03 10:12:53'),
(31, 'PM-20230603-2-008', 6, 20999000, 1, 2, 'Belum Diproses', '2023-06-03 10:12:53', '2023-06-03 10:12:53'),
(32, 'PM-20230603-2-009', 20, 1499000, 1, 2, 'Belum Diproses', '2023-06-03 10:12:58', '2023-06-03 10:12:58'),
(33, 'PM-20230603-2-009', 19, 1339000, 1, 2, 'Belum Diproses', '2023-06-03 10:12:58', '2023-06-03 10:12:58'),
(34, 'PM-20230603-2-010', 9, 14999000, 1, 2, 'Belum Diproses', '2023-06-03 10:13:01', '2023-06-03 10:13:01'),
(35, 'PM-20230603-2-010', 10, 19499000, 1, 2, 'Belum Diproses', '2023-06-03 10:13:01', '2023-06-03 10:13:01'),
(36, 'PM-20230603-2-011', 23, 10000000, 1, 2, 'Belum Diproses', '2023-06-03 10:13:05', '2023-06-03 10:13:05'),
(37, 'PM-20230603-3-012', 1, 30670000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(38, 'PM-20230603-3-012', 2, 2500000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(39, 'PM-20230603-3-012', 17, 1600000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(40, 'PM-20230603-3-012', 18, 2350000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(41, 'PM-20230603-3-012', 7, 18999000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(42, 'PM-20230603-3-012', 8, 16999000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(43, 'PM-20230603-3-012', 21, 2199000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(44, 'PM-20230603-3-012', 22, 5399000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:34', '2023-06-03 10:13:34'),
(45, 'PM-20230603-3-013', 3, 2109000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:41', '2023-06-03 10:13:41'),
(46, 'PM-20230603-3-013', 4, 3999000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:41', '2023-06-03 10:13:41'),
(47, 'PM-20230603-3-013', 5, 1999000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:41', '2023-06-03 10:13:41'),
(48, 'PM-20230603-3-013', 6, 20999000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:41', '2023-06-03 10:13:41'),
(49, 'PM-20230603-3-014', 17, 4800000, 3, 3, 'Belum Diproses', '2023-06-03 10:13:54', '2023-06-03 10:13:54'),
(50, 'PM-20230603-3-014', 18, 7050000, 3, 3, 'Belum Diproses', '2023-06-03 10:13:54', '2023-06-03 10:13:54'),
(51, 'PM-20230603-3-014', 21, 6597000, 3, 3, 'Belum Diproses', '2023-06-03 10:13:54', '2023-06-03 10:13:54'),
(52, 'PM-20230603-3-014', 21, 2199000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:54', '2023-06-03 10:13:54'),
(53, 'PM-20230603-3-014', 21, 2199000, 1, 3, 'Belum Diproses', '2023-06-03 10:13:54', '2023-06-03 10:13:54'),
(54, 'PM-20230603-3-015', 7, 18999000, 1, 3, 'Belum Diproses', '2023-06-03 10:14:03', '2023-06-03 10:14:03'),
(55, 'PM-20230603-3-015', 8, 16999000, 1, 3, 'Belum Diproses', '2023-06-03 10:14:03', '2023-06-03 10:14:03'),
(56, 'PM-20230603-3-015', 21, 2199000, 1, 3, 'Belum Diproses', '2023-06-03 10:14:03', '2023-06-03 10:14:03'),
(57, 'PM-20230603-3-015', 22, 5399000, 1, 3, 'Belum Diproses', '2023-06-03 10:14:03', '2023-06-03 10:14:03'),
(58, 'PM-20230603-3-016', 5, 1999000, 1, 3, 'Sedang Diproses', '2023-06-03 10:14:08', '2023-06-03 10:16:10'),
(59, 'PM-20230603-3-016', 6, 20999000, 1, 3, 'Sedang Diproses', '2023-06-03 10:14:08', '2023-06-03 10:16:18'),
(60, 'PM-20230604-1-017', 19, 4017000, 3, 1, 'Sampai di tujuan', '2023-06-04 13:32:02', '2023-06-04 13:38:00'),
(61, 'PM-20230604-1-017', 20, 2998000, 2, 1, 'Sampai di tujuan', '2023-06-04 13:32:02', '2023-06-04 13:38:00'),
(62, 'PM-20230604-1-018', 1, 30670000, 1, 1, 'Sampai di tujuan', '2023-06-04 13:43:25', '2023-06-04 13:46:34'),
(63, 'PM-20230604-1-019', 1, 30670000, 1, 1, 'Sampai di tujuan', '2023-06-04 13:52:57', '2023-06-04 13:53:32'),
(64, 'PM-20230604-1-020', 1, 30670000, 1, 1, 'Sampai di tujuan', '2023-06-04 13:57:00', '2023-06-04 13:58:06'),
(65, 'PM-20230604-68-021', 24, 6000000, 3, 19, 'Dalam Pengiriman', '2023-06-04 15:16:08', '2023-06-04 15:18:28'),
(66, 'PM-20230604-69-022', 25, 7500000, 5, 20, 'Sampai di tujuan', '2023-06-04 16:19:30', '2023-06-04 16:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_barangs`
--

CREATE TABLE `penerima_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `id_outlet` bigint(20) UNSIGNED NOT NULL,
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerima_barangs`
--

INSERT INTO `penerima_barangs` (`id`, `Tanggal`, `id_outlet`, `id_pengiriman`, `status`, `created_at`, `updated_at`) VALUES
(4, '2023-06-03', 1, 4, 'Sudah Diterima', '2023-06-03 10:16:49', '2023-06-03 12:26:46'),
(5, '2023-06-03', 1, 5, 'Sudah Diterima', '2023-06-03 10:16:49', '2023-06-03 12:25:58'),
(6, '2023-06-03', 1, 6, 'Sudah Diterima', '2023-06-03 10:16:49', '2023-06-03 12:54:49'),
(10, '2023-06-03', 2, 10, 'Sudah Diterima', '2023-06-03 13:14:20', '2023-06-03 13:14:44'),
(11, '2023-06-03', 2, 11, 'Sudah Diterima', '2023-06-03 13:14:20', '2023-06-03 13:14:59'),
(12, '2023-06-04', 2, 12, 'Belum Diterima', '2023-06-04 13:18:42', '2023-06-04 13:18:42'),
(13, '2023-06-04', 2, 13, 'Belum Diterima', '2023-06-04 13:18:42', '2023-06-04 13:18:42'),
(14, '2023-06-04', 2, 14, 'Belum Diterima', '2023-06-04 13:18:42', '2023-06-04 13:18:42'),
(15, '2023-06-04', 2, 15, 'Belum Diterima', '2023-06-04 13:18:42', '2023-06-04 13:18:42'),
(16, '2023-06-04', 2, 16, 'Belum Diterima', '2023-06-04 13:18:42', '2023-06-04 13:18:42'),
(17, '2023-06-04', 1, 17, 'Sudah Diterima', '2023-06-04 13:36:05', '2023-06-04 13:38:33'),
(18, '2023-06-04', 1, 18, 'Sudah Diterima', '2023-06-04 13:36:05', '2023-06-04 13:38:44'),
(19, '2023-06-04', 1, 19, 'Sudah Diterima', '2023-06-04 13:46:23', '2023-06-04 13:52:43'),
(20, '2023-06-04', 1, 20, 'Sudah Diterima', '2023-06-04 13:53:24', '2023-06-04 13:54:24'),
(21, '2023-06-04', 1, 21, 'Sudah Diterima', '2023-06-04 13:58:00', '2023-06-04 13:58:12'),
(22, '2023-06-04', 19, 22, 'Belum Diterima', '2023-06-04 15:18:28', '2023-06-04 15:18:28'),
(23, '2023-06-04', 20, 23, 'Sudah Diterima', '2023-06-04 16:23:43', '2023-06-04 16:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `pengirimen`
--

CREATE TABLE `pengirimen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_truk` bigint(20) UNSIGNED NOT NULL,
  `id_supir` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal_pengiriman` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` bigint(20) UNSIGNED NOT NULL,
  `status_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirimen`
--

INSERT INTO `pengirimen` (`id`, `id_truk`, `id_supir`, `id_jadwal_pengiriman`, `id_pemesanan`, `status_pengiriman`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 2, 8, 'Dalam Pengiriman', '2023-06-03 10:16:49', '2023-06-03 10:16:49'),
(5, 1, 2, 2, 9, 'Sampai di tujuan', '2023-06-03 10:16:49', '2023-06-04 08:30:14'),
(6, 1, 2, 2, 10, 'Sampai di tujuan', '2023-06-03 10:16:49', '2023-06-04 08:30:14'),
(10, 1, 2, 1, 19, 'Dalam Pengiriman', '2023-06-03 13:14:20', '2023-06-03 13:14:20'),
(11, 1, 2, 1, 20, 'Dalam Pengiriman', '2023-06-03 13:14:20', '2023-06-03 13:14:20'),
(12, 1, 6, 2, 21, 'Sampai di tujuan', '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(13, 1, 6, 2, 22, 'Sampai di tujuan', '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(14, 1, 6, 2, 23, 'Sampai di tujuan', '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(15, 1, 6, 2, 24, 'Sampai di tujuan', '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(16, 1, 6, 2, 25, 'Sampai di tujuan', '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(17, 2, 3, 1, 60, 'Sampai di tujuan', '2023-06-04 13:36:05', '2023-06-04 13:38:00'),
(18, 2, 3, 1, 61, 'Sampai di tujuan', '2023-06-04 13:36:05', '2023-06-04 13:38:00'),
(19, 2, 3, 1, 62, 'Sampai di tujuan', '2023-06-04 13:46:23', '2023-06-04 13:46:34'),
(20, 2, 3, 2, 63, 'Sampai di tujuan', '2023-06-04 13:53:24', '2023-06-04 13:53:32'),
(21, 3, 3, 1, 64, 'Sampai di tujuan', '2023-06-04 13:58:00', '2023-06-04 13:58:06'),
(22, 1, 3, 1, 65, 'Dalam Pengiriman', '2023-06-04 15:18:28', '2023-06-04 15:18:28'),
(23, 1, 3, 1, 66, 'Sampai di tujuan', '2023-06-04 16:23:43', '2023-06-04 16:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `rutes`
--

CREATE TABLE `rutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rutes`
--

INSERT INTO `rutes` (`id`, `status`, `id_pengiriman`, `created_at`, `updated_at`) VALUES
(5, 'Sampai di tujuan', 5, '2023-06-03 10:16:49', '2023-06-04 08:30:14'),
(6, 'Sampai di tujuan', 6, '2023-06-03 10:16:49', '2023-06-04 08:30:14'),
(10, 'Dalam Pengiriman', 10, '2023-06-03 13:14:20', '2023-06-03 13:14:20'),
(11, 'Dalam Pengiriman', 11, '2023-06-03 13:14:20', '2023-06-03 13:14:20'),
(12, 'Sampai di tujuan', 12, '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(13, 'Sampai di tujuan', 13, '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(14, 'Sampai di tujuan', 14, '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(15, 'Sampai di tujuan', 15, '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(16, 'Sampai di tujuan', 16, '2023-06-04 13:18:42', '2023-06-04 13:20:46'),
(17, 'Sampai di tujuan', 17, '2023-06-04 13:36:05', '2023-06-04 13:38:00'),
(18, 'Sampai di tujuan', 18, '2023-06-04 13:36:05', '2023-06-04 13:38:00'),
(19, 'Sampai di tujuan', 19, '2023-06-04 13:46:23', '2023-06-04 13:46:34'),
(20, 'Sampai di tujuan', 20, '2023-06-04 13:53:24', '2023-06-04 13:53:32'),
(21, 'Sampai di tujuan', 21, '2023-06-04 13:58:00', '2023-06-04 13:58:06'),
(22, 'Dalam Pengiriman', 22, '2023-06-04 15:18:28', '2023-06-04 15:18:28'),
(23, 'Sampai di tujuan', 23, '2023-06-04 16:23:43', '2023-06-04 16:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `sirkulasi_barangs`
--

CREATE TABLE `sirkulasi_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `status_masuk_keluar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sirkulasi_barangs`
--

INSERT INTO `sirkulasi_barangs` (`id`, `id_barang`, `tanggal`, `jumlah`, `id_pengguna`, `status_masuk_keluar`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-06-03', 15, 61, 'barangMasuk', '2023-06-03 09:43:45', '2023-06-03 09:43:45'),
(2, 2, '2023-06-03', 30, 61, 'barangMasuk', '2023-06-03 09:43:53', '2023-06-03 09:43:53'),
(3, 3, '2023-06-03', 50, 61, 'barangMasuk', '2023-06-03 09:44:05', '2023-06-03 09:44:05'),
(4, 5, '2023-06-03', 40, 61, 'barangMasuk', '2023-06-03 09:44:16', '2023-06-03 09:44:16'),
(5, 6, '2023-06-03', 30, 61, 'barangMasuk', '2023-06-03 09:44:26', '2023-06-03 09:44:26'),
(6, 8, '2023-06-03', 60, 61, 'barangMasuk', '2023-06-03 09:44:35', '2023-06-03 09:44:35'),
(7, 12, '2023-06-03', 20, 61, 'barangMasuk', '2023-06-03 09:44:43', '2023-06-03 09:44:43'),
(8, 13, '2023-06-03', 50, 61, 'barangMasuk', '2023-06-03 09:44:51', '2023-06-03 09:44:51'),
(9, 21, '2023-06-03', 40, 61, 'barangMasuk', '2023-06-03 09:44:59', '2023-06-03 09:44:59'),
(10, 22, '2023-06-03', 50, 61, 'barangMasuk', '2023-06-03 09:45:10', '2023-06-03 09:45:10'),
(11, 23, '2023-06-03', 100, 61, 'barangMasuk', '2023-06-03 09:45:20', '2023-06-03 09:45:20'),
(12, 3, '2023-06-03', 40, 61, 'barangMasuk', '2023-06-03 09:45:29', '2023-06-03 09:45:29'),
(13, 21, '2023-06-03', 50, 61, 'barangMasuk', '2023-06-03 09:45:38', '2023-06-03 09:45:38'),
(14, 20, '2023-06-03', 50, 61, 'barangMasuk', '2023-06-03 09:45:46', '2023-06-03 09:45:46'),
(15, 12, '2023-06-03', 60, 61, 'barangMasuk', '2023-06-03 09:45:54', '2023-06-03 09:45:54'),
(16, 1, '2023-06-04', 3, 21, 'barangKeluar', '2023-06-03 10:14:43', '2023-06-03 10:14:43'),
(17, 2, '2023-06-04', 2, 21, 'barangKeluar', '2023-06-03 10:14:49', '2023-06-03 10:14:49'),
(18, 1, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:14:55', '2023-06-03 10:14:55'),
(19, 2, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:15:06', '2023-06-03 10:15:06'),
(20, 20, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:15:13', '2023-06-03 10:15:13'),
(21, 19, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:15:19', '2023-06-03 10:15:19'),
(22, 16, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:15:26', '2023-06-03 10:15:26'),
(24, 10, '2023-06-04', 3, 21, 'barangKeluar', '2023-06-03 10:15:38', '2023-06-03 10:15:38'),
(25, 10, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:15:46', '2023-06-03 10:15:46'),
(26, 18, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:15:55', '2023-06-03 10:15:55'),
(27, 17, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:16:02', '2023-06-03 10:16:02'),
(28, 5, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:16:10', '2023-06-03 10:16:10'),
(29, 6, '2023-06-04', 1, 21, 'barangKeluar', '2023-06-03 10:16:18', '2023-06-03 10:16:18'),
(30, 4, '2023-06-05', 3, 61, 'barangKeluar', '2023-06-04 13:10:02', '2023-06-04 13:10:02'),
(31, 3, '2023-06-05', 2, 61, 'barangKeluar', '2023-06-04 13:10:09', '2023-06-04 13:10:09'),
(32, 17, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:10:17', '2023-06-04 13:10:17'),
(33, 18, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:10:23', '2023-06-04 13:10:23'),
(34, 1, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:11:27', '2023-06-04 13:11:27'),
(35, 1, '2023-06-05', 5, 61, 'barangMasuk', '2023-06-04 13:12:18', '2023-06-04 13:12:18'),
(36, 7, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:17:27', '2023-06-04 13:17:27'),
(37, 8, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:17:34', '2023-06-04 13:17:34'),
(38, 8, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:17:41', '2023-06-04 13:17:41'),
(39, 8, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:17:48', '2023-06-04 13:17:48'),
(40, 23, '2023-06-05', 1, 61, 'barangKeluar', '2023-06-04 13:17:55', '2023-06-04 13:17:55'),
(41, 19, '2023-06-05', 3, 22, 'barangKeluar', '2023-06-04 13:33:27', '2023-06-04 13:33:27'),
(42, 20, '2023-06-05', 2, 22, 'barangKeluar', '2023-06-04 13:33:36', '2023-06-04 13:33:36'),
(43, 1, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 13:46:08', '2023-06-04 13:46:08'),
(44, 1, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 13:53:12', '2023-06-04 13:53:12'),
(45, 1, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 13:57:45', '2023-06-04 13:57:45'),
(46, 2, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 14:19:04', '2023-06-04 14:19:04'),
(47, 2, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 14:19:12', '2023-06-04 14:19:12'),
(48, 2, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 14:19:20', '2023-06-04 14:19:20'),
(49, 19, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 14:19:32', '2023-06-04 14:19:32'),
(50, 20, '2023-06-05', 1, 21, 'barangKeluar', '2023-06-04 14:19:38', '2023-06-04 14:19:38'),
(51, 24, '2023-06-05', 20, 61, 'barangMasuk', '2023-06-04 15:13:20', '2023-06-04 15:13:20'),
(52, 24, '2023-06-05', 3, 61, 'barangKeluar', '2023-06-04 15:17:00', '2023-06-04 15:17:00'),
(53, 25, '2023-06-05', 20, 61, 'barangMasuk', '2023-06-04 16:15:35', '2023-06-04 16:15:35'),
(54, 25, '2023-06-05', 5, 61, 'barangKeluar', '2023-06-04 16:22:28', '2023-06-04 16:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `supirs`
--

CREATE TABLE `supirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supirs`
--

INSERT INTO `supirs` (`id`, `id_pengguna`, `status`, `created_at`, `updated_at`) VALUES
(2, 42, 'supir', '2023-06-03 09:09:49', '2023-06-03 09:09:49'),
(3, 43, 'supir', '2023-06-03 09:09:52', '2023-06-03 09:09:52'),
(4, 44, 'supir', '2023-06-03 09:09:56', '2023-06-03 09:09:56'),
(5, 45, 'supir', '2023-06-03 09:09:59', '2023-06-03 09:09:59'),
(6, 46, 'supir', '2023-06-03 09:10:01', '2023-06-03 09:10:01'),
(7, 47, 'supir', '2023-06-03 09:10:08', '2023-06-03 09:10:08'),
(8, 48, 'supir', '2023-06-03 09:10:11', '2023-06-03 09:10:11'),
(9, 49, 'supir', '2023-06-03 09:10:14', '2023-06-03 09:10:14'),
(10, 50, 'supir', '2023-06-03 09:10:18', '2023-06-03 09:10:18'),
(11, 51, 'supir', '2023-06-03 09:10:23', '2023-06-03 09:10:23'),
(13, 53, 'supir', '2023-06-03 09:10:29', '2023-06-03 09:10:29'),
(14, 54, 'supir', '2023-06-03 09:10:33', '2023-06-03 09:10:33'),
(15, 55, 'supir', '2023-06-03 09:10:37', '2023-06-03 09:10:37'),
(16, 56, 'supir', '2023-06-04 12:00:07', '2023-06-04 12:00:07'),
(17, 70, 'supir', '2023-06-04 16:31:00', '2023-06-04 16:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `truks`
--

CREATE TABLE `truks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_truk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truks`
--

INSERT INTO `truks` (`id`, `jenis_truk`, `plat_nomor`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 'Tronton Wingbox', 'B 1234 XYZ', '18.000 kg', NULL, NULL),
(2, 'Tronton', 'B 5678 XYZ', '15.000 kg', NULL, NULL),
(3, 'Fuso Box', 'B 9101 XYZ', '8.000 kg', NULL, NULL),
(4, 'CDD Long', 'B 1122 XYZ', '5.000 kg', NULL, NULL),
(5, 'Double Engkel', 'B 3344 XYZ', '4.000 kg', NULL, NULL),
(6, 'Engkel Box', 'B 5566 XYZ', '2.200 kg', NULL, NULL),
(7, 'Small Box', 'B 7788 XYZ', '800 kg', NULL, NULL),
(8, 'Pickup', 'B 9900 XYZ', '800 kg', NULL, NULL),
(9, 'Van', 'B 1122 ABC', '720 kg', NULL, NULL),
(10, 'Ekonomi', 'B 3344 ABC', '150 kg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_pengguna`, `username`, `password`, `alamat`, `tlp`, `email`, `status`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(1, 'Cagak Rajata', 'outlet1', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. B.Agam Dlm No. 962, Banjarbaru 94924, Gorontalo', '081234567890', 'outlet1@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:05'),
(2, 'Ratih Yuniar', 'outlet2', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Samanhudi No. 397, Batu 11087, Banten', '081234567890', 'outlet2@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:09'),
(3, 'Violet Melani', 'outlet3', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ds. Tambak No. 882, Sungai Penuh 95921, Babel', '081234567890', 'outlet3@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:12'),
(4, 'Cager Narpati', 'outlet4', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Psr. Ters. Pasir Koja No. 627, Tual 74954, Jatim', '081234567890', 'outlet4@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:15'),
(5, 'Calista Yuliarti', 'outlet5', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Muwardi No. 762, Depok 39030, Riau', '081234567890', 'outlet5@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:21'),
(6, 'Luwar Sitorus', 'outlet6', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ki. Abdul No. 691, Palu 13574, DIY', '081234567890', 'outlet6@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:24'),
(7, 'Chandra Pradipta', 'outlet7', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jln. Padang No. 840, Solok 46278, Bali', '081234567890', 'outlet7@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:27'),
(8, 'Daniswara Bagya Budiman', 'outlet8', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Tambak No. 982, Surabaya 65844, NTB', '081234567890', 'outlet8@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:31'),
(9, 'Naradi Sihotang', 'outlet9', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ki. Haji No. 438, Administrasi Jakarta Utara 45721, Banten', '081234567890', 'outlet9@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:34'),
(10, 'Samsul Kurniawan S.Farm', 'outlet14', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ds. Qrisdoren No. 374, Singkawang 85203, Kalsel', '081234567890', 'outlet10@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-04 11:49:51'),
(11, 'Tirtayasa Sinaga', 'outlet11', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Kpg. Thamrin No. 458, Pangkal Pinang 21871, Kalsel', '081234567890', 'outlet11@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:43'),
(12, 'Danu Siregar', 'outlet12', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ds. Bacang No. 539, Subulussalam 37612, Jambi', '081234567890', 'outlet12@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:50'),
(13, 'Kuncara Siregar', 'outlet13', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Bappenas No. 647, Tanjungbalai 55673, Sumut', '081234567890', 'outlet13@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-03 09:08:53'),
(14, 'Bahuwirya Narpati S.Psi', 'outlet14yu9', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. W.R. Supratman No. 37, Administrasi Jakarta Pusat 33478, Riau', '081234567890', 'outlet14@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-04 12:27:47'),
(15, 'Yunita Laras Mayasari', 'outlet15', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Banal No. 352, Dumai 58040, Jambi', '081234567890', 'outlet15@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-04 13:03:26'),
(16, 'Karimah Kusmawati', 'outlet16', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Kebangkitan Nasional No. 604, Dumai 45563, Kaltara', '081234567890', 'outlet16@gmail.com', 'Belum Terkonfirmasi', 3, NULL, NULL),
(17, 'Putri Mulyani M.Ak', 'outlet17', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Villa No. 180, Bekasi 78189, Sumut', '081234567890', 'outlet17@gmail.com', 'Belum Terkonfirmasi', 3, NULL, NULL),
(18, 'Eka Galak Narpati', 'outlet18', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Kpg. Gardujati No. 411, Tomohon 62726, Jambi', '081234567890', 'outlet18@gmail.com', 'Belum Terkonfirmasi', 3, NULL, NULL),
(19, 'Sabri Rajata', 'outlet19', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Psr. Sadang Serang No. 861, Administrasi Jakarta Pusat 69519, Sumbar', '081234567890', 'outlet19@gmail.com', 'Belum Terkonfirmasi', 3, NULL, NULL),
(20, 'Sarah Andriani', 'outlet20', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Psr. Achmad No. 110, Tebing Tinggi 36114, Riau', '081234567890', 'outlet20@gmail.com', 'Belum Terkonfirmasi', 3, NULL, NULL),
(21, 'Eka Pradipta S.H.', 'pegawai1', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jr. Cut Nyak Dien No. 43, Kendari 68637, Jateng', '081234567890', 'pegawai1@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:03'),
(22, 'Taufik Prabu Prasetyo S.H.', 'pegawai2', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Kpg. Wora Wari No. 300, Samarinda 10797, Jambi', '081234567890', 'pegawai2@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:07'),
(23, 'Endah Hasanah', 'pegawai3', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Baabur Royan No. 178, Bau-Bau 55824, Jambi', '081234567890', 'pegawai3@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:11'),
(24, 'Ibun Sitorus S.E.', 'pegawai4', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jr. Moch. Yamin No. 58, Bogor 58910, Kaltim', '081234567890', 'pegawai4@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:15'),
(25, 'Icha Anggraini', 'pegawai5', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Baja Raya No. 748, Yogyakarta 48549, Babel', '081234567890', 'pegawai5@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:19'),
(26, 'Ifa Uyainah', 'pegawai6', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Cokroaminoto No. 864, Tangerang Selatan 95810, Sulsel', '081234567890', 'pegawai6@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:22'),
(27, 'Mursinin Wibowo', 'pegawai7', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jr. Samanhudi No. 904, Padangsidempuan 34607, Riau', '081234567890', 'pegawai7@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:27'),
(28, 'Tari Nurdiyanti', 'pegawai8', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Bakit  No. 227, Tarakan 26433, NTB', '081234567890', 'pegawai8@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:30'),
(29, 'Nabila Aryani', 'pegawai9', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Kpg. Wahid Hasyim No. 628, Malang 45170, Kalsel', '081234567890', 'pegawai9@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:33'),
(30, 'Edi Budiyanto', 'pegawai', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'sumenep', '081234567890', 'pegawai10@gmail.com', 'Belum Terkonfirmasi', 2, NULL, '2023-06-04 12:57:19'),
(31, 'Citra Mardhiyah', 'pegawai11', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Psr. Achmad No. 689, Jambi 45911, Sumsel', '081234567890', 'pegawai11@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:39'),
(32, 'Danuja Labuh Zulkarnain S.H.', 'pegawai12', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Psr. Madrasah No. 774, Gorontalo 76846, Lampung', '081234567890', 'pegawai12@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-03 09:07:43'),
(33, 'Lulut Tasnim Maryadi S.T.', 'pegawai13', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. W.R. Supratman No. 558, Serang 11637, Bali', '081234567890', 'pegawai13@gmail.com', 'Belum Terkonfirmasi', 2, NULL, '2023-06-04 07:07:40'),
(34, 'Genta Rika Maryati', 'pegawai14', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jln. Bacang No. 616, Bontang 53491, DKI', '081234567890', 'pegawai14@gmail.com', 'Belum Terkonfirmasi', 2, NULL, '2023-06-04 07:06:39'),
(35, 'Arta Hakim', 'pegawai15', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Kpg. Rajawali Timur No. 679, Denpasar 59574, Kaltara', '081234567890', 'pegawai15@gmail.com', 'Belum Terkonfirmasi', 2, NULL, '2023-06-04 07:06:33'),
(36, 'Hana Purnawati', 'pegawai16', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jr. Honggowongso No. 903, Denpasar 26963, DKI', '081234567890', 'pegawai16@gmail.com', 'Belum Terkonfirmasi', 2, NULL, NULL),
(37, 'Luluh Saputra', 'pegawai17', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jr. Setia Budi No. 717, Surabaya 22685, Sumut', '081234567890', 'pegawai17@gmail.com', 'Belum Terkonfirmasi', 2, NULL, NULL),
(38, 'Amelia Palastri M.TI.', 'pegawai18', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Bakau No. 461, Bitung 52643, DKI', '081234567890', 'pegawai18@gmail.com', 'Belum Terkonfirmasi', 2, NULL, NULL),
(39, 'Karimah Prastuti', 'pegawai19', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ki. Sutoyo No. 304, Blitar 42726, Papua', '081234567890', 'pegawai19@gmail.com', 'Belum Terkonfirmasi', 2, NULL, NULL),
(40, 'Zulaikha Lailasari S.IP', 'pegawai20', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Nangka No. 579, Pematangsiantar 26951, NTB', '081234567890', 'pegawai20@gmail.com', 'Belum Terkonfirmasi', 2, NULL, NULL),
(41, 'Umar Jailani S.E.', 'supir1', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. R.E. Martadinata No. 715, Sorong 69950, Aceh', '081234567890', 'supir1@gmail.com', 'Terkonfirmasi', 2, NULL, '2023-06-04 12:31:23'),
(42, 'Damar Anom Rajata M.M.', 'supir2', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Ketandan No. 641, Samarinda 61483, Maluku', '081234567890', 'supir2@gmail.com', 'Belum Terkonfirmasi', 4, NULL, '2023-06-04 12:32:32'),
(43, 'Ina Suryatmi S.IP', 'supir3', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Babakan No. 485, Probolinggo 43232, Pabar', '081234567890', 'supir3@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:09:52'),
(44, 'Betania Laksita', 'supir4', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Kpg. Dewi Sartika No. 463, Bitung 73598, Aceh', '081234567890', 'supir4@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:09:56'),
(45, 'Dartono Waluyo S.H.', 'supir5', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ki. Adisucipto No. 482, Surakarta 50900, Kalbar', '081234567890', 'supir5@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:09:59'),
(46, 'Gara Siregar', 'supir6', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Soekarno Hatta No. 344, Parepare 97921, Sultra', '081234567890', 'supir6@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:01'),
(47, 'Halima Kusmawati', 'supir7', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ds. Urip Sumoharjo No. 851, Mojokerto 61232, Aceh', '081234567890', 'supir7@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:08'),
(48, 'Safina Hafshah Widiastuti S.Sos', 'supir8', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ds. Rajiman No. 81, Pagar Alam 66099, DKI', '081234567890', 'supir8@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:11'),
(49, 'Wawan Samosir S.Gz', 'supir9', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Kusmanto No. 720, Sawahlunto 85175, Jateng', '081234567890', 'supir9@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:14'),
(50, 'Rafi Kamal Salahudin S.E.I', 'supir10', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Sudiarto No. 442, Tanjungbalai 84907, Jambi', '081234567890', 'supir10@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:18'),
(51, 'Cici Utami M.TI.', 'supir11', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jln. Abdul Rahmat No. 750, Pangkal Pinang 67636, Sultra', '081234567890', 'supir11@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:23'),
(52, 'Ibun Maulana', 'supir12', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ki. Teuku Umar No. 337, Kediri 98331, Kepri', '081234567890', 'supir12@gmail.com', 'Belum Terkonfirmasi', 2, NULL, '2023-06-04 12:47:49'),
(53, 'Farah Oni Wastuti M.TI.', 'supir13', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Salam No. 301, Batu 56217, Jabar', '081234567890', 'supir13@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:29'),
(54, 'Nurul Rahmawati M.M.', 'supir14', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ki. Sutoyo No. 758, Tangerang 59394, Babel', '081234567890', 'supir14@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:33'),
(55, 'Raisa Namaga', 'supir15', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Dk. Muwardi No. 689, Kupang 94850, Maluku', '081234567890', 'supir15@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-03 09:10:37'),
(56, 'Bala Pratama', 'supir1655dewweqweqwe', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Sutoyo No. 872, Bandar Lampung 60102, Babel', '081234567890', 'supir16@gmail.com', 'Terkonfirmasi', 4, NULL, '2023-06-04 12:00:07'),
(57, 'Safina Purwanti', 'supir17', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ds. Zamrud No. 297, Tomohon 45242, Jatim', '081234567890', 'supir17@gmail.com', 'Terkonfirmasi', 3, NULL, '2023-06-04 13:05:40'),
(58, 'Ophelia Purwanti S.T.', 'supir18', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Ki. Kyai Mojo No. 510, Lubuklinggau 76471, Kaltim', '081234567890', 'supir18@gmail.com', 'Belum Terkonfirmasi', 4, NULL, '2023-06-04 12:29:13'),
(59, 'Laswi Mahdi Habibi', 'supir19', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Gg. Dr. Junjunan No. 698, Jambi 68123, Sumsel', '081234567890', 'supir19@gmail.com', 'Belum Terkonfirmasi', 4, NULL, NULL),
(60, 'Harsaya Salman Simbolon', 'supir20', '$2y$10$4l8GmA7nTIinPCOBh3nKA.kL9suHaiCozrZyqCP4eKvV9ph1c0AdS', 'Jr. Bakit  No. 31, Palangka Raya 52484, NTB', '081234567890', 'supir20@gmail.com', 'Belum Terkonfirmasi', 4, NULL, NULL),
(61, 'Administrator', 'admin', '$2y$10$yFb2TlENCXTUo5YBcWLTL.HE/QvtnaYQ1rUpJ0IndcptedfPpzYNm', 'Jl. Raya Cibaduyut', '081234567890', 'admin@gmail.com', 'Terkonfirmasi', 1, NULL, NULL),
(68, 'sitti aisyah', 'aisyah', '$2y$10$TOORBwcPfNy2aFa8m4sfR.NGhvHuAqhwWamgpxNO7JdXR4r05ihF2', 'sumep', '089231773567', 'sitti@gmail.com', 'Terkonfirmasi', 3, '2023-06-04 15:03:21', '2023-06-04 15:05:01'),
(69, 'ikbal', 'ikbal', '$2y$10$X2l5KauJWoF5rqDX/Zoa7OJXUxNX6QTmpN9Rf70LpAEJ7UxcnUW7K', 'sumenep', '08923345568', 'ikbal@gmail.com', 'Terkonfirmasi', 3, '2023-06-04 16:08:42', '2023-06-04 16:11:42'),
(70, 'arifinkgn', 'arifin', '$2y$10$hEPaD3KL5Qw63kPI1ZlLt.f/IDWLQD.Fc1NkZc8iHXAN6iKgOR6F2', 'sumenep', '085325823852835', 'arifin@gmail.com', 'Terkonfirmasi', 4, '2023-06-04 16:29:22', '2023-06-04 16:31:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`),
  ADD KEY `barangs_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pengirimen`
--
ALTER TABLE `jadwal_pengirimen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlets_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_id_barang_foreign` (`id_barang`),
  ADD KEY `pemesanans_id_outlet_foreign` (`id_outlet`);

--
-- Indexes for table `penerima_barangs`
--
ALTER TABLE `penerima_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penerima_barangs_id_outlet_foreign` (`id_outlet`),
  ADD KEY `penerima_barangs_id_pengiriman_foreign` (`id_pengiriman`);

--
-- Indexes for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengirimen_id_truk_foreign` (`id_truk`),
  ADD KEY `pengirimen_id_supir_foreign` (`id_supir`),
  ADD KEY `pengirimen_id_jadwal_pengiriman_foreign` (`id_jadwal_pengiriman`),
  ADD KEY `pengirimen_id_pemesanan_foreign` (`id_pemesanan`);

--
-- Indexes for table `rutes`
--
ALTER TABLE `rutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutes_id_pengiriman_foreign` (`id_pengiriman`);

--
-- Indexes for table `sirkulasi_barangs`
--
ALTER TABLE `sirkulasi_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sirkulasi_barangs_id_barang_foreign` (`id_barang`),
  ADD KEY `sirkulasi_barangs_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `supirs`
--
ALTER TABLE `supirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supirs_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `truks`
--
ALTER TABLE `truks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_pegawai_id_foreign` (`pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `gudangs`
--
ALTER TABLE `gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jadwal_pengirimen`
--
ALTER TABLE `jadwal_pengirimen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `penerima_barangs`
--
ALTER TABLE `penerima_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengirimen`
--
ALTER TABLE `pengirimen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sirkulasi_barangs`
--
ALTER TABLE `sirkulasi_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `supirs`
--
ALTER TABLE `supirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `truks`
--
ALTER TABLE `truks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`),
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

--
-- Constraints for table `outlets`
--
ALTER TABLE `outlets`
  ADD CONSTRAINT `outlets_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`);

--
-- Constraints for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD CONSTRAINT `pemesanans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `pemesanans_id_outlet_foreign` FOREIGN KEY (`id_outlet`) REFERENCES `outlets` (`id`);

--
-- Constraints for table `penerima_barangs`
--
ALTER TABLE `penerima_barangs`
  ADD CONSTRAINT `penerima_barangs_id_outlet_foreign` FOREIGN KEY (`id_outlet`) REFERENCES `outlets` (`id`),
  ADD CONSTRAINT `penerima_barangs_id_pengiriman_foreign` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengirimen` (`id`);

--
-- Constraints for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD CONSTRAINT `pengirimen_id_jadwal_pengiriman_foreign` FOREIGN KEY (`id_jadwal_pengiriman`) REFERENCES `jadwal_pengirimen` (`id`),
  ADD CONSTRAINT `pengirimen_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanans` (`id`),
  ADD CONSTRAINT `pengirimen_id_supir_foreign` FOREIGN KEY (`id_supir`) REFERENCES `supirs` (`id`),
  ADD CONSTRAINT `pengirimen_id_truk_foreign` FOREIGN KEY (`id_truk`) REFERENCES `truks` (`id`);

--
-- Constraints for table `rutes`
--
ALTER TABLE `rutes`
  ADD CONSTRAINT `rutes_id_pengiriman_foreign` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengirimen` (`id`);

--
-- Constraints for table `sirkulasi_barangs`
--
ALTER TABLE `sirkulasi_barangs`
  ADD CONSTRAINT `sirkulasi_barangs_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `sirkulasi_barangs_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`);

--
-- Constraints for table `supirs`
--
ALTER TABLE `supirs`
  ADD CONSTRAINT `supirs_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
