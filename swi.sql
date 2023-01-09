-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2023 pada 00.04
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_customer`
--

CREATE TABLE `master_customer` (
  `idcust` int(11) NOT NULL,
  `namacust` text NOT NULL,
  `custcode` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(30) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_customer`
--

INSERT INTO `master_customer` (`idcust`, `namacust`, `custcode`, `alamat`, `create_at`, `author`, `edit_at`, `edit_by`) VALUES
(1, 'PT. ASTRA DAIHATSU MOTOR', 'ADM', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(2, 'PT. ISUZU ASTRA MOTOR INDONESIA', 'IAMI', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(3, 'PT. FUJISEAT TBINA', 'FUJISEAT', 'JAKARTA', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(4, 'PT. TOYOTA TSUSHO INDONESIA', 'TTI', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(5, 'PT. TOYOTA MOTOR MANUFACTURING INDONESIA', 'TMMIN', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(6, 'PT. HINO MOTORS MANUFACTURING INDONESIA', 'HINO', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(7, 'PT. DAIMLER CVMI', 'DAIMLER', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 06:03:47', 'Lailatul'),
(8, 'PT. KRAMA YUDHA TIGA BERLIAN MOTORS', 'KTB', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(9, 'PT. MITSUBISHI KRAMA YUDHA  SALES INDONESIA', 'MMKI', 'Jakarta', '0000-00-00 00:00:00', 'Lailatul', '2023-01-08 05:57:04', ''),
(14, 'PT. RESTU IBU', 'BUS', 'JAKARTA', '2023-01-08 12:55:07', 'Lailatul', '2023-01-08 07:34:04', 'Lailatul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_grupline`
--

CREATE TABLE `master_grupline` (
  `idgruline` int(11) NOT NULL,
  `nama_gru` varchar(30) NOT NULL,
  `grup_code` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_grupline`
--

INSERT INTO `master_grupline` (`idgruline`, `nama_gru`, `grup_code`, `ket`, `create_at`, `author`) VALUES
(1, 'WEB BKL', 'WEB', 'Webbing Buckle', '2023-01-08 15:45:45', 'Lailatul'),
(2, 'ELR RC0', 'RC0', 'ELECTRICAL LINE RETRACTOR', '2023-01-08 15:47:39', 'Lailatul'),
(3, 'PLT BKL', 'PLT', 'Plate Buckle', '2023-01-08 16:06:12', 'Lailatul'),
(4, 'STC 2PT', '2PT', 'Static 2 point', '2023-01-08 16:10:40', 'Lailatul'),
(5, 'STC 3PT', '3PT', 'Static 3 point', '2023-01-08 16:10:53', 'Lailatul'),
(6, 'CBL BKL', 'CBL', 'Cable Buckle', '2023-01-08 16:12:54', 'Lailatul'),
(7, 'CBL SWT', 'SWT', 'Cable Switch', '2023-01-08 16:15:23', 'Lailatul'),
(8, 'HOUSING ASSY', 'HOS', 'Housing Sub Assy', '2023-01-08 17:40:09', 'Lailatul'),
(9, 'SASH GUIDE ASSY', 'SGA', 'Sash/Slip Guide Sub Assy', '2023-01-08 17:41:13', 'Lailatul'),
(10, 'LOOP SEWING', 'LOP', 'Webbing Loop Sewing', '2023-01-08 17:43:34', 'Lailatul'),
(11, 'M/C SENSOR ASSY', 'MCS', 'Mechanism Cover Sensor Assy', '2023-01-08 17:45:20', 'Lailatul'),
(12, 'LOCKING CLUTCH ASSY', 'CLU', 'Locking Clutch Assy', '2023-01-08 17:46:44', 'Lailatul'),
(13, 'GUIDE DRUM ASSY', 'GDA', 'Guide Drum Assy', '2023-01-08 17:47:22', 'Lailatul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_line`
--

CREATE TABLE `master_line` (
  `idline` int(11) NOT NULL,
  `namaline` varchar(30) NOT NULL,
  `idgruline` int(11) NOT NULL,
  `ket` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `authorid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_data_reject`
--

CREATE TABLE `raw_data_reject` (
  `id` int(155) NOT NULL,
  `date` date NOT NULL,
  `no_lpb` varchar(100) NOT NULL,
  `part_number` varchar(100) NOT NULL,
  `part_name` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `date_to_whs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `raw_data_reject`
--

INSERT INTO `raw_data_reject` (`id`, `date`, `no_lpb`, `part_number`, `part_name`, `supplier`, `category`, `problem`, `note`, `location`, `qty`, `date_to_whs`) VALUES
(1, '0000-00-00', '', '', 'sdasad', '', '', 'sadsa', 'sd', 'ad', 0, '0000-00-00'),
(2, '0000-00-00', '', '', 'sdasad', '', '', 'sadsa', 'sd', 'ad', 0, '0000-00-00'),
(3, '0000-00-00', '', '', 'sd', '', '', 'asd', 'asd', 'sda', 0, '0000-00-00'),
(4, '0000-00-00', '', '', 'sd', '', '', 'asd', 'asd', 'sda', 0, '0000-00-00'),
(5, '0000-00-00', '', '', 'sd', '', '', 'asd', 'asd', 'sda', 0, '0000-00-00'),
(6, '0000-00-00', '', '', 'asdasd', '', '', 'asd', 'asd', 'asd', 0, '0000-00-00'),
(7, '0000-00-00', '', '', 'asdasd', '', '', 'asd', 'asd', 'asd', 0, '0000-00-00'),
(8, '2012-02-22', '', '', '1', '', '', '23', '12', '122', 21, '0000-00-00'),
(9, '0000-00-00', '', '', 'sdsd', '', '', 'sd', 'asd', 'sad', 0, '0000-00-00'),
(10, '0000-00-00', '', '', 'asd', '', '', 'sd', 'sad', 's', 0, '0000-00-00'),
(13, '2023-01-02', '', '', 'sda', '', '', 'sd', 'sa', '1212', 2, '0000-00-00'),
(14, '0000-00-00', '', '', 'sad', '', '', 'sd', '', 'ads', 0, '2023-01-02'),
(16, '2023-01-12', '', '', 'gy', '', '', 'asdasdasdasdasdasdas', 'asdasdasdasd', 'sadasdasd', 78, '2023-02-08'),
(17, '2023-01-03', '', '', 'bilsadnas', '', '', 'dsa', 'asd', 'd', 0, '2023-01-01'),
(18, '2023-01-03', '', '', 's', '', '', 's', 's', 's', 0, '2023-01-03'),
(19, '2023-01-03', '', '', 's', '', '', 's', 's', 's', 0, '2023-01-03'),
(20, '2023-01-03', '', '', 'bh', '', '', 's', 's', 's', 1, '2023-01-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `name`, `position`, `username`, `password`) VALUES
(1, 'Bilqist Imeilia Az Zahra', 'QCS', 'qcs', 123),
(2, 'Lailatul', 'Admin', 'admin', 123);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_customer`
--
ALTER TABLE `master_customer`
  ADD PRIMARY KEY (`idcust`),
  ADD KEY `authorid` (`author`);

--
-- Indeks untuk tabel `master_grupline`
--
ALTER TABLE `master_grupline`
  ADD PRIMARY KEY (`idgruline`),
  ADD UNIQUE KEY `nama_gru` (`nama_gru`),
  ADD UNIQUE KEY `grup_code` (`grup_code`),
  ADD KEY `iduser` (`author`);

--
-- Indeks untuk tabel `master_line`
--
ALTER TABLE `master_line`
  ADD PRIMARY KEY (`idline`),
  ADD KEY `authorid` (`authorid`),
  ADD KEY `idgruline` (`idgruline`);

--
-- Indeks untuk tabel `raw_data_reject`
--
ALTER TABLE `raw_data_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_customer`
--
ALTER TABLE `master_customer`
  MODIFY `idcust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `master_grupline`
--
ALTER TABLE `master_grupline`
  MODIFY `idgruline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `raw_data_reject`
--
ALTER TABLE `raw_data_reject`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `master_line`
--
ALTER TABLE `master_line`
  ADD CONSTRAINT `master_line_ibfk_1` FOREIGN KEY (`idgruline`) REFERENCES `master_grupline` (`idgruline`),
  ADD CONSTRAINT `master_line_ibfk_2` FOREIGN KEY (`authorid`) REFERENCES `user_accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
