-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 02:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aksara_barracuda`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `produser` varchar(150) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `composser` varchar(150) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `yt_link` varchar(255) DEFAULT NULL,
  `spotify_link` varchar(255) DEFAULT NULL,
  `itunes_link` varchar(255) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `year_production` year(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `user_id`, `artist`, `title`, `description`, `cover`, `order_id`, `produser`, `genre_id`, `composser`, `release_date`, `yt_link`, `spotify_link`, `itunes_link`, `contact_person`, `year_production`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(21, 11, NULL, 'Album perdana', 'tes', 'cover_album_11_230415_album_perdana.jpg', NULL, 'Agung', 1, 'Agung', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-15 06:13:23', '11', NULL, NULL),
(22, 11, NULL, 'Album kedua', 'ini adalah album kedua saya', 'cover_album_11_230415_album_kedua.jpg', 4, 'Agung', 2, 'Agung', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-15 06:20:11', '11', NULL, NULL),
(23, 1, 'Diana', 'Lagu Suka suka123', 'tes', 'cover_album_1_230502_lagu_suka_suka123.jpg', 7, 'Gunawan', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02 14:48:11', '1', NULL, NULL),
(24, 14, 'Salsa', 'Cinta Gila', 'Nothing', 'cover_album_14_230506_cinta_gila.png', 10, 'Salsa', 4, 'Bila', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-06 13:56:36', '14', NULL, NULL),
(25, 14, 'Salsa', 'Cinta Gila', 'Nothing', 'cover_album_14_230506_cinta_gila.png', 11, 'Salsa', 4, 'Bila', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-06 13:57:14', '14', NULL, NULL),
(26, 14, 'Salsa', 'Cinta Gila', 'Nothing', 'cover_album_14_230506_cinta_gila.png', 12, 'Salsa', 4, 'Bila', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-06 13:57:46', '14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=pending\r\n1=success\r\n2=reject',
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `user_id`, `amount`, `status`, `attachment`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, 14, 100000, 0, 'donation_14_230507.png', '2023-05-07 11:07:05', 14, NULL, NULL),
(6, 22, 100000, 0, 'donation_22_230507.png', '2023-05-07 14:34:31', 22, NULL, NULL),
(7, 22, 100000, 0, 'donation_22_230507.png', '2023-05-07 19:35:48', 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Punk'),
(4, 'Indie');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `type` int(3) DEFAULT NULL COMMENT '0=report\r\n1=takedown\r\n2=unclaim',
  `email` varchar(100) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `single_id` int(11) DEFAULT NULL,
  `month` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=pending\r\n1=success',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `type`, `email`, `album_id`, `single_id`, `month`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'agung@mailinator.com', 21, NULL, '2023-04-21', 1, '2023-04-21 00:00:00', NULL, NULL, NULL),
(2, 1, 'agung@mailinator.com', NULL, 69, '2023-04-21', NULL, '2023-06-21 00:00:00', NULL, NULL, NULL),
(3, 1, 'banisurya0@gmail.com', NULL, 73, '2023-04-21', 0, '2023-04-21 11:44:43', 11, NULL, NULL),
(4, 1, 'agungwahyu23@mailinator.com', NULL, 80, '2023-05-07', 0, '2023-05-07 08:01:13', 14, NULL, NULL),
(5, 1, 'agungwahyu23@mailinator.com', 24, NULL, '2023-05-07', 0, '2023-05-07 08:02:23', 14, NULL, NULL),
(6, 1, 'agungwahyu23@mailinator.com', NULL, 78, '2023-05-07', 0, '2023-05-07 08:46:46', 14, NULL, NULL),
(7, 2, 'agungwahyu23@mailinator.com', 24, NULL, '2023-05-07', 0, '2023-05-07 08:47:30', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `single`
--

CREATE TABLE `single` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `artist` varchar(200) DEFAULT NULL,
  `featuring_artist` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL COMMENT '0=pending\r\n1=sukses',
  `language` varchar(100) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `sub_genre` varchar(200) DEFAULT NULL,
  `first_name_composer` varchar(100) DEFAULT NULL,
  `last_name_composer` varchar(100) DEFAULT NULL,
  `arranger` varchar(150) DEFAULT NULL,
  `produser` varchar(100) DEFAULT NULL,
  `year_production` year(4) DEFAULT NULL,
  `is_album` int(3) DEFAULT NULL COMMENT '0/null = no\r\n1 = yes',
  `release_date` date DEFAULT NULL,
  `lyrics` text DEFAULT NULL,
  `spotify_link` varchar(255) DEFAULT NULL,
  `itunes_link` varchar(255) DEFAULT NULL,
  `yt_link` varchar(255) DEFAULT NULL,
  `start_preview_tiktok` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `single`
--

INSERT INTO `single` (`id`, `user_id`, `order_id`, `title`, `artist`, `featuring_artist`, `description`, `file`, `cover`, `status`, `language`, `genre_id`, `sub_genre`, `first_name_composer`, `last_name_composer`, `arranger`, `produser`, `year_production`, `is_album`, `release_date`, `lyrics`, `spotify_link`, `itunes_link`, `yt_link`, `start_preview_tiktok`, `contact_person`, `ig`, `ktp`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(86, 22, 28, 'Cinta sejati', 'Dikta', '-', NULL, 'single_22_230507_cinta_sejati.wav', 'cover_album_22_agung_wahyu_gunawan1.png', 0, 'indonesia', 2, '', 'Dikta', 'D', 'Dikta', 'Anu', 2023, 0, '2023-05-07', 'lorem ipsum', '-', '-', '-', '-', '085816908859', '-', 'ktp_22_agung_wahyu_gunawan.png', '2023-05-07 23:15:23', '22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `single_album`
--

CREATE TABLE `single_album` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `single_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `single_album`
--

INSERT INTO `single_album` (`id`, `album_id`, `single_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(38, 21, 69, '2023-04-15 06:13:23', '11', NULL, NULL),
(39, 21, 70, '2023-04-15 06:13:23', '11', NULL, NULL),
(40, 22, 71, '2023-04-15 06:20:11', '11', NULL, NULL),
(41, 22, 72, '2023-04-15 06:20:11', '11', NULL, NULL),
(42, 5, 75, '2023-05-02 14:46:50', '1', NULL, NULL),
(43, 6, 76, '2023-05-02 14:47:08', '1', NULL, NULL),
(44, 23, 77, '2023-05-02 14:48:11', '1', NULL, NULL),
(45, 24, 82, '2023-05-06 13:56:36', '14', NULL, NULL),
(46, 25, 83, '2023-05-06 13:57:14', '14', NULL, NULL),
(47, 26, 84, '2023-05-06 13:57:47', '14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL COMMENT '0=pending\r\n1=diterima',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `user_id`, `attachment`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 11, 'proof_payment_11__230415062011.jpg', 1, '2023-04-15 06:13:23', '11', NULL, NULL),
(4, 11, 'proof_payment_11__230415062011.jpg', 1, '2023-04-15 06:20:11', '11', NULL, NULL),
(5, 1, NULL, 0, '2023-05-02 14:46:50', '1', NULL, NULL),
(6, 1, NULL, 0, '2023-05-02 14:47:08', '1', NULL, NULL),
(7, 1, NULL, 0, '2023-05-02 14:48:11', '1', NULL, NULL),
(8, 14, NULL, 0, '2023-05-05 18:45:24', '14', NULL, NULL),
(9, 14, 'proof_payment_album_14_230506015841.png', 0, '2023-05-06 04:14:51', '14', '2023-05-06 13:58:41', '14'),
(10, 14, NULL, 0, '2023-05-06 13:56:32', '14', NULL, NULL),
(11, 14, NULL, 0, '2023-05-06 13:57:09', '14', NULL, NULL),
(12, 14, 'proof_payment_album_14_230506020642.png', 0, '2023-05-06 13:57:41', '14', '2023-05-06 14:06:42', '14'),
(13, 22, NULL, 0, '2023-05-07 23:03:14', '22', NULL, NULL),
(14, 22, NULL, 0, '2023-05-07 23:05:10', '22', NULL, NULL),
(15, 22, NULL, 0, '2023-05-07 23:06:12', '22', NULL, NULL),
(16, 22, NULL, 0, '2023-05-07 23:06:52', '22', NULL, NULL),
(17, 22, NULL, 0, '2023-05-07 23:07:09', '22', NULL, NULL),
(18, 22, NULL, 0, '2023-05-07 23:07:34', '22', NULL, NULL),
(19, 22, NULL, 0, '2023-05-07 23:09:14', '22', NULL, NULL),
(20, 22, NULL, 0, '2023-05-07 23:10:14', '22', NULL, NULL),
(21, 22, NULL, 0, '2023-05-07 23:10:23', '22', NULL, NULL),
(22, 22, NULL, 0, '2023-05-07 23:10:33', '22', NULL, NULL),
(23, 22, NULL, 0, '2023-05-07 23:10:55', '22', NULL, NULL),
(24, 22, NULL, 0, '2023-05-07 23:11:02', '22', NULL, NULL),
(25, 22, NULL, 0, '2023-05-07 23:11:19', '22', NULL, NULL),
(26, 22, NULL, 0, '2023-05-07 23:11:50', '22', NULL, NULL),
(27, 22, NULL, 0, '2023-05-07 23:12:08', '22', NULL, NULL),
(28, 22, NULL, 0, '2023-05-07 23:15:22', '22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` int(3) DEFAULT NULL COMMENT '0=perempuan\r\n1=laki',
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `verified_at` date DEFAULT NULL,
  `is_active` int(3) DEFAULT NULL COMMENT '0=nonactive\r\n1=active',
  `level` int(3) DEFAULT NULL COMMENT '1=admin\r\n2=user',
  `photo` varchar(255) DEFAULT NULL,
  `total_income` float DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `gender`, `phone`, `address`, `verified_at`, `is_active`, `level`, `photo`, `total_income`, `proof_of_payment`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin@demo.com', '62cc2d8b4bf2d8728120d052163a77df', 'admin@demo.com', 'admin demo', 1, '085816908859', 'Surabaya', '2023-04-07', 1, 1, NULL, NULL, NULL, '2023-04-07 21:00:56', 'system', NULL, NULL),
(14, 'agung@mailinator.com', '62cc2d8b4bf2d8728120d052163a77df', 'agung@mailinator.com', 'Agung Wahyu Gunawan', 0, '087754314117', 'Jember', NULL, NULL, 2, 'profile_14_agung_wahyu_gunawan.jpg', 1997000, NULL, NULL, NULL, '2023-04-29 14:36:13', '14'),
(19, 'wahyoe@mailinator.com', '0678625dec1d11290caac62e664a6bef', 'wahyoe@mailinator.com', 'Wahyu Wahyu', 0, '085816908859', 'Jember', '2023-04-30', 1, 2, NULL, 0, '', '2023-04-30 09:08:20', NULL, '2023-04-30 11:15:35', '1'),
(22, 'agungtest@gmail.com', '3996d00db4e272d8c9ce29102ceda603', 'agungtest@gmail.com', 'Agung Wahyu Gunawan', 1, '085816908859', 'jember', NULL, 1, 2, NULL, 0, NULL, '2023-05-07 13:40:55', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=pending\r\n1=success\r\n2=reject',
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `user_id`, `amount`, `status`, `attachment`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 19, 100000, 1, 'proof_payment_11__230415062011.jpg', '2023-04-21 15:36:13', 14, NULL, NULL),
(2, 14, 1000, 1, 'withdraw_14_230504.png', '2023-05-02 15:14:39', 14, NULL, NULL),
(3, 14, 500000, 0, NULL, '2023-05-07 08:09:37', 14, NULL, NULL),
(4, 14, 400000, 0, NULL, '2023-05-07 08:11:18', 14, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `single`
--
ALTER TABLE `single`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `single_album`
--
ALTER TABLE `single_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `single`
--
ALTER TABLE `single`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `single_album`
--
ALTER TABLE `single_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
