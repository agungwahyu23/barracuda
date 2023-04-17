-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2023 pada 11.13
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

INSERT INTO `album` (`id`, `user_id`, `title`, `description`, `cover`, `order_id`, `produser`, `genre_id`, `composser`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(21, 11, 'Album perdana', 'tes', 'cover_album_11_230415_album_perdana.jpg', NULL, 'Agung', 1, 'Agung', '2023-04-15 06:13:23', '11', NULL, NULL),
(22, 11, 'Album kedua', 'ini adalah album kedua saya', 'cover_album_11_230415_album_kedua.jpg', 4, 'Agung', 2, 'Agung', '2023-04-15 06:20:11', '11', NULL, NULL);

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
  `month` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(69, NULL, NULL, 'Album perdana', NULL, 'tes', 'single_album_11_230415061323_album_perdana0', NULL, 0, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:13:23', '11', NULL, NULL),
(70, NULL, NULL, 'Album perdana', NULL, 'tes', 'single_album_11_230415061323_album_perdana1', NULL, 0, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:13:23', '11', NULL, NULL),
(71, 11, 4, 'Album kedua', NULL, 'ini adalah album kedua saya', 'single_album_11_230415062011_album_kedua0', NULL, 0, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:20:11', '11', NULL, NULL),
(72, 11, 4, 'Album kedua', NULL, 'ini adalah album kedua saya', 'single_album_11_230415062011_album_kedua1', NULL, 0, NULL, 0, 'Agung', 'Agung', NULL, 'Agung', NULL, 1, '2023-04-15 06:20:11', '11', NULL, NULL);

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
(41, 22, 72, '2023-04-15 06:20:11', '11', NULL, NULL);

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
(3, 11, NULL, 0, '2023-04-15 06:13:23', '11', NULL, NULL),
(4, 11, 'proof_payment_11__230415062011.jpg', 0, '2023-04-15 06:20:11', '11', NULL, NULL);

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
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `gender`, `phone`, `address`, `verified_at`, `is_active`, `level`, `photo`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin@demo.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin@mailinator.com', 'admin demo', 1, '085816908859', 'Surabaya', '2023-04-07', 1, 1, NULL, '2023-04-07 21:00:56', 'system', NULL, NULL),
(11, NULL, '62cc2d8b4bf2d8728120d052163a77df', 'agung@mailinator.com', 'Agung Wahyu', 1, '08777191', 'Jember', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL),
(14, 'agung@mailinator.com', 'dee53e0058daa4ce75cdc022a01881f4', 'agung@mailinator.com', 'Agung Wahyu Gunawan', 1, '08777191', 'Jember', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `single`
--
ALTER TABLE `single`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `single_album`
--
ALTER TABLE `single_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
