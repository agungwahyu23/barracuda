-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2023 pada 14.20
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

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
-- Struktur dari tabel `album`
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
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id`, `user_id`, `artist`, `title`, `description`, `cover`, `order_id`, `produser`, `genre_id`, `composser`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(21, 11, NULL, 'Album perdana', 'tes', 'cover_album_11_230415_album_perdana.jpg', NULL, 'Agung', 1, 'Agung', '2023-04-15 06:13:23', '11', NULL, NULL),
(22, 11, NULL, 'Album kedua', 'ini adalah album kedua saya', 'cover_album_11_230415_album_kedua.jpg', 4, 'Agung', 2, 'Agung', '2023-04-15 06:20:11', '11', NULL, NULL),
(23, 1, 'Diana', 'Lagu Suka suka123', 'tes', 'cover_album_1_230502_lagu_suka_suka123.jpg', 7, 'Gunawan', 1, '', '2023-05-02 14:48:11', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Punk'),
(4, 'Indie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `type` int(3) DEFAULT NULL COMMENT '0=report\r\n1=takedown',
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
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id`, `type`, `email`, `album_id`, `single_id`, `month`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'agung@mailinator.com', 21, NULL, '2023-04-21', 1, '2023-04-21 00:00:00', NULL, NULL, NULL),
(2, 1, 'agung@mailinator.com', NULL, 69, '2023-04-21', NULL, '2023-06-21 00:00:00', NULL, NULL, NULL),
(3, 1, 'banisurya0@gmail.com', NULL, 73, '2023-04-21', 0, '2023-04-21 11:44:43', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `single`
--

CREATE TABLE `single` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `artist` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL COMMENT '0=pending\r\n1=sukses',
  `language` varchar(100) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `first_name_composer` varchar(100) DEFAULT NULL,
  `last_name_composer` varchar(100) DEFAULT NULL,
  `arranger` varchar(150) DEFAULT NULL,
  `produser` varchar(100) DEFAULT NULL,
  `year_production` year(4) DEFAULT NULL,
  `is_album` int(3) DEFAULT NULL COMMENT '0/null = no\r\n1 = yes',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `single`
--

INSERT INTO `single` (`id`, `user_id`, `order_id`, `title`, `artist`, `description`, `file`, `cover`, `status`, `language`, `genre_id`, `first_name_composer`, `last_name_composer`, `arranger`, `produser`, `year_production`, `is_album`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(69, NULL, NULL, 'Album perdana', NULL, 'tes', 'single_album_11_230415061323_album_perdana0', NULL, 1, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:13:23', '11', NULL, NULL),
(70, NULL, NULL, 'Album perdana', NULL, 'tes', 'single_album_11_230415061323_album_perdana1', NULL, 1, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:13:23', '11', NULL, NULL),
(71, 11, 4, 'Album kedua', NULL, 'ini adalah album kedua saya', 'single_album_11_230415062011_album_kedua0', NULL, 0, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:20:11', '11', NULL, NULL),
(72, 11, 4, 'Album kedua', NULL, 'ini adalah album kedua saya', 'single_album_11_230415062011_album_kedua1', NULL, 0, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:20:11', '11', NULL, NULL),
(73, NULL, 3, 'Lagu Suka suka', 'Diana', 'Ini single ku', 'upload/single/single_11_230421_lagu_suka_suka.wav', NULL, 1, 'INDONESIA', 2, 'Wahyu', 'Wahyu', '', '', 2023, NULL, '2023-04-26 04:11:56', '1', '2023-04-26 04:14:41', '1'),
(74, NULL, 3, 'Lagu Suka suka', 'Diana', 'Ini single ku', 'upload/single/single_11_230421_lagu_suka_suka.wav', NULL, 0, 'INDONESIA', 2, 'Wahyu', 'Wahyu', '', '', 2023, 0, '2023-04-21 10:59:54', '11', NULL, NULL),
(75, 1, 5, 'Lagu Suka suka123', 'Diana', 'tes', 'single_album_1_230502024650_lagu_suka_suka1230', NULL, 0, NULL, 1, '', '', NULL, 'Gunawan', NULL, 1, '2023-05-02 14:46:50', '1', NULL, NULL),
(76, 1, 6, 'Lagu Suka suka123', 'Diana', 'tes', 'single_album_1_230502024708_lagu_suka_suka1230', NULL, 0, NULL, 1, '', '', NULL, 'Gunawan', NULL, 1, '2023-05-02 14:47:08', '1', NULL, NULL),
(77, 1, 7, 'Lagu Suka suka123', 'Diana', 'tes', 'single_album_1_230502024811_lagu_suka_suka1230', NULL, 0, NULL, 1, '', '', NULL, 'Gunawan', NULL, 1, '2023-05-02 14:48:11', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `single_album`
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
-- Dumping data untuk tabel `single_album`
--

INSERT INTO `single_album` (`id`, `album_id`, `single_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(38, 21, 69, '2023-04-15 06:13:23', '11', NULL, NULL),
(39, 21, 70, '2023-04-15 06:13:23', '11', NULL, NULL),
(40, 22, 71, '2023-04-15 06:20:11', '11', NULL, NULL),
(41, 22, 72, '2023-04-15 06:20:11', '11', NULL, NULL),
(42, 5, 75, '2023-05-02 14:46:50', '1', NULL, NULL),
(43, 6, 76, '2023-05-02 14:47:08', '1', NULL, NULL),
(44, 23, 77, '2023-05-02 14:48:11', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
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
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id`, `user_id`, `attachment`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 11, 'proof_payment_11__230415062011.jpg', 1, '2023-04-15 06:13:23', '11', NULL, NULL),
(4, 11, 'proof_payment_11__230415062011.jpg', 1, '2023-04-15 06:20:11', '11', NULL, NULL),
(5, 1, NULL, 0, '2023-05-02 14:46:50', '1', NULL, NULL),
(6, 1, NULL, 0, '2023-05-02 14:47:08', '1', NULL, NULL),
(7, 1, NULL, 0, '2023-05-02 14:48:11', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `gender`, `phone`, `address`, `verified_at`, `is_active`, `level`, `photo`, `total_income`, `proof_of_payment`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin@demo.com', '62cc2d8b4bf2d8728120d052163a77df', 'admin@demo.com', 'admin demo', 1, '085816908859', 'Surabaya', '2023-04-07', 1, 1, NULL, NULL, NULL, '2023-04-07 21:00:56', 'system', NULL, NULL),
(14, 'agung@mailinator.com', '62cc2d8b4bf2d8728120d052163a77df', 'agung@mailinator.com', 'Agung Wahyu Gunawan', 0, '087754314117', 'Jember', NULL, NULL, 2, 'profile_14_agung_wahyu_gunawan.jpg', NULL, NULL, NULL, NULL, '2023-04-29 14:36:13', '14'),
(19, 'wahyoe@mailinator.com', '0678625dec1d11290caac62e664a6bef', 'wahyoe@mailinator.com', 'Wahyu Wahyu', 0, '085816908859', 'Jember', '2023-04-30', 1, 2, NULL, 0, '', '2023-04-30 09:08:20', NULL, '2023-04-30 11:15:35', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `withdraw`
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
-- Dumping data untuk tabel `withdraw`
--

INSERT INTO `withdraw` (`id`, `user_id`, `amount`, `status`, `attachment`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 14, 100000, 1, 'proof_payment_11__230415062011.jpg', '2023-04-21 15:36:13', 14, NULL, NULL),
(2, 14, 1000, 0, NULL, '2023-05-02 15:14:39', 14, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `single`
--
ALTER TABLE `single`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `single_album`
--
ALTER TABLE `single_album`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `single`
--
ALTER TABLE `single`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `single_album`
--
ALTER TABLE `single_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
