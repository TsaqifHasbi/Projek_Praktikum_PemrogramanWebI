-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2024 pada 03.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thewitcher3_wildhunt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_witcher`
--

CREATE TABLE `login_witcher` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_witcher`
--

INSERT INTO `login_witcher` (`id`, `name`, `username`, `password`, `region`) VALUES
(2, 'John Doe', 'johndoe', 'john123', 'Vizima'),
(3, 'Defit Raja Kegelapan', 'DefitSaputra', 'defit123', 'Novigrad'),
(4, 'Tsaqif Hasbi Aghna Syarief', 'tsaqifsyarief', 'tsaqif123', 'Novigrad'),
(5, 'Daiva Paundra Gevano', 'daivagevano', 'daiva123', 'Skellige'),
(9, 'Cirilla Fiona Elen Riannon', 'CirillaFiona', 'ciri123', 'Novigrad'),
(10, 'Yennefer of Vengerberg', 'Yennefer', 'yennefer123', 'Skellige'),
(11, 'Geralt Of Rivia', 'Geralt Ora Sepelee', 'geralt321', 'Kaer Morhen'),
(12, 'Zoltan Chivay', 'ZoltanChivay', 'zoltan123', 'Novigrad'),
(13, 'Hjalmar an Craite', 'Craite', 'craite123', 'Kaer Morhen'),
(14, 'Bayu Santoso', 'BayuSantoso', 'bayu123', 'Vizima'),
(15, 'David Martinez', 'DavidMartin', 'martin123', 'Novigrad'),
(17, 'Kanna Hashimoto', 'KannaHashimoto', 'kanna123', 'Velen'),
(18, 'Admin Deef', 'AdminDeef', 'admindeef123', 'Vizima'),
(19, 'AdminPaun', 'AdminPaun', 'adminpaun123', 'Novigrad'),
(20, 'Admin Qif', 'AdminQif', 'adminqif123', 'Skellige');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login_witcher`
--
ALTER TABLE `login_witcher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login_witcher`
--
ALTER TABLE `login_witcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
