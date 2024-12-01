-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2024 pada 18.41
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
  `region` varchar(50) NOT NULL,
  `profile` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_witcher`
--

INSERT INTO `login_witcher` (`id`, `name`, `username`, `password`, `region`, `profile`) VALUES
(2, 'John Doe', 'johndoe', 'john123', 'Vizima', 'vizima.jpg'),
(3, 'Defit Bagus Saputra', 'defitsaputra', 'defit123', 'Velen', 'Velen.jpg'),
(4, 'Tsaqif Hasbi Aghna Syarief', 'tsaqifsyarief', 'tsaqif123', 'Novigrad', 'Novigrad.jpg'),
(5, 'Daiva Paundra Gevano', 'daivagevano', 'daiva123', 'Skellige', 'Skellige.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
