-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2025 pada 07.47
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
-- Database: `db_malikasdrink`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `alamat_admin` varchar(128) NOT NULL,
  `no_telp_admin` varchar(16) NOT NULL,
  `foto_admin` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `nama_admin`, `alamat_admin`, `no_telp_admin`, `foto_admin`, `created_at`, `updated_at`) VALUES
(1, 'annietan8', '0acf03f408f90ea0dcba786d300620db', 'Annisa Intan', 'Jalan Kalibader No. 12 Taman Sidoarjo', '081214407301', '../image/admin_1.jpeg', '2025-02-06 11:10:35', '2025-02-08 06:42:27'),
(2, 'anniintanss', 'd0970714757783e6cf17b26fb8e2298f', 'Annisa Intan Suwardana', 'Jalan Manggis Desa Sumput Driyorejo Gresik', '081214407301', '../image/admin_2.jpeg', '2025-02-06 11:10:35', '2025-02-08 05:10:57'),
(3, 'Wardah', 'c8837b23ff8aaa8a2dde915473ce0991', 'ANN', 'Siwalankerto', '08123456789', '../image/admin_3.jpeg', '2025-02-06 15:57:55', '2025-02-08 05:11:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `judul_berita` varchar(128) NOT NULL,
  `tgl_berita` date NOT NULL,
  `foto_berita` text NOT NULL,
  `detail_berita` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `id_admin`, `user_name`, `judul_berita`, `tgl_berita`, `foto_berita`, `detail_berita`, `created_at`, `updated_at`) VALUES
(2, 3, 'Wardah', 'Want to Know More About Game Malika\'s Drink? Check This Out!', '2001-01-01', '../image/BG_PERTEMUAN_14SEPT24.jpg', 'YA 1', '2025-02-07 05:21:02', '2025-02-07 05:30:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `judul_galeri` text NOT NULL,
  `tgl_galeri` date NOT NULL,
  `foto_galeri` text NOT NULL,
  `detail_galeri` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_admin`, `user_name`, `judul_galeri`, `tgl_galeri`, `foto_galeri`, `detail_galeri`, `created_at`, `updated_at`) VALUES
(1, 3, 'Wardah', 'Malika (Character)', '2025-02-11', '../image/malika.png', 'Ini adalah karakter utama dalam permainan Malika\'s Drink. Karakter ini berperan dalam menangani semua minuman yang diminta pelanggan Malika\'s Drink.', '2025-02-07 06:35:28', '2025-02-07 06:37:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `judul_game` text NOT NULL,
  `foto_game` text NOT NULL,
  `detail_game` text NOT NULL,
  `versi` varchar(16) NOT NULL,
  `spesifikasi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `game`
--

INSERT INTO `game` (`id_game`, `id_admin`, `user_name`, `judul_game`, `foto_game`, `detail_game`, `versi`, `spesifikasi`, `created_at`, `updated_at`) VALUES
(1, 3, 'Wardah', 'Malika\'s Drink', '../image/logo.png', 'Ini Game 2D ya', '1.0', 'Windows 10+\r\nRam 2GB+\r\n', '2025-02-07 06:51:05', '2025-02-07 06:51:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama_tamu` varchar(128) NOT NULL,
  `tgl_komentar` date NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama_tamu`, `tgl_komentar`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 'Anne', '2025-02-11', 'Wah Keren! Game Seru', '2025-02-07 06:59:18', '2025-02-07 06:59:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchandise`
--

CREATE TABLE `merchandise` (
  `id_merchan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `nama_merchan` varchar(128) NOT NULL,
  `foto_merchan` text NOT NULL,
  `harga_merchan` decimal(10,0) NOT NULL,
  `detail_merchan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merchandise`
--

INSERT INTO `merchandise` (`id_merchan`, `id_admin`, `user_name`, `nama_merchan`, `foto_merchan`, `harga_merchan`, `detail_merchan`, `created_at`, `updated_at`) VALUES
(1, 3, 'Wardah', 'Bantal Malika', '../image/mediamodifier_image.jpeg', 150000, 'Bantal Empuk', '2025-02-07 07:10:15', '2025-02-07 07:10:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembuat`
--

CREATE TABLE `pembuat` (
  `id_pembuat` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `nama_pembuat` varchar(128) NOT NULL,
  `pendidikan_pembuat` text NOT NULL,
  `detail_pembuat` text NOT NULL,
  `foto_pembuat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembuat`
--

INSERT INTO `pembuat` (`id_pembuat`, `id_admin`, `user_name`, `nama_pembuat`, `pendidikan_pembuat`, `detail_pembuat`, `foto_pembuat`, `created_at`, `updated_at`) VALUES
(1, 3, 'Wardah', 'Annie', 'SMK/Sederajat', 'Anak YGY', '../image/pasfoto__1_.jpg', '2025-02-07 07:16:22', '2025-02-08 05:24:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id_merchan`);

--
-- Indeks untuk tabel `pembuat`
--
ALTER TABLE `pembuat`
  ADD PRIMARY KEY (`id_pembuat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id_merchan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembuat`
--
ALTER TABLE `pembuat`
  MODIFY `id_pembuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
