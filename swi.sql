-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 10:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `id` int(11) NOT NULL,
  `partnumber` varchar(40) NOT NULL,
  `partname` text NOT NULL,
  `model` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `level0` int(11) NOT NULL,
  `level1` int(11) NOT NULL,
  `level2` int(11) NOT NULL,
  `level3` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` int(11) NOT NULL,
  `edit_at` datetime NOT NULL DEFAULT current_timestamp(),
  `edit_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_customer`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_customer`
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
-- Table structure for table `master_event`
--

CREATE TABLE `master_event` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `code` varchar(30) NOT NULL,
  `customer` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(30) NOT NULL,
  `edit_at` datetime NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_event`
--

INSERT INTO `master_event` (`id`, `nama`, `code`, `customer`, `create_at`, `author`, `edit_at`, `edit_by`) VALUES
(2, 'HINKAKU', 'HKK', 1, '2023-01-13 10:48:45', 'Admin', '0000-00-00 00:00:00', ''),
(3, 'A-TRY', 'A-TRY', 1, '2023-01-13 11:21:15', 'Admin', '2023-01-13 11:21:36', 'Admin'),
(4, 'MASSPRO', 'MP', 1, '2023-01-13 11:22:12', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_grupline`
--

CREATE TABLE `master_grupline` (
  `idgruline` int(11) NOT NULL,
  `nama_gru` varchar(30) NOT NULL,
  `grup_code` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_grupline`
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
(13, 'GUIDE DRUM ASSY', 'GDA', 'Guide Drum Assy', '2023-01-08 17:47:22', 'Lailatul'),
(15, 'FRAME ASSY', 'FRM', 'Frame Assy', '2023-01-10 10:40:42', 'Lailatul');

-- --------------------------------------------------------

--
-- Table structure for table `master_line`
--

CREATE TABLE `master_line` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `grupline` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_line`
--

INSERT INTO `master_line` (`id`, `nama`, `grupline`, `create_at`, `author`) VALUES
(1, 'RC0 # 2', 'ELR RC0', '2023-01-10 08:08:25', 'Lailatul'),
(3, 'RC0 # 3', 'ELR RC0', '2023-01-10 08:40:46', 'Lailatul'),
(4, 'RC0 # 4', 'ELR RC0', '2023-01-10 08:41:13', 'Lailatul'),
(5, 'RC0 # 1', 'ELR RC0', '2023-01-10 08:41:26', 'Lailatul'),
(6, 'RC0 # 5', 'ELR RC0', '2023-01-10 08:41:34', 'Lailatul'),
(7, 'RC0 # 6', 'ELR RC0', '2023-01-10 08:41:38', 'Lailatul'),
(8, 'RC0 # 7', 'ELR RC0', '2023-01-10 08:41:44', 'Lailatul'),
(9, 'RC0 # 8', 'ELR RC0', '2023-01-10 08:41:52', 'Lailatul'),
(10, 'STC 3PT', 'STC 3PT', '2023-01-10 09:32:42', 'Lailatul'),
(11, 'STC 3PT # 1', 'STC 3PT', '2023-01-10 09:32:56', 'Lailatul'),
(12, 'STC 2PT', 'STC 3PT', '2023-01-10 09:33:11', 'Lailatul'),
(13, 'STC 2PT # 1', 'STC 3PT', '2023-01-10 09:33:14', 'Lailatul'),
(14, 'STC 2PT # 2', 'STC 3PT', '2023-01-10 09:33:18', 'Lailatul'),
(15, 'WEB BKL # 1', 'WEB BKL', '2023-01-10 10:42:26', 'Lailatul'),
(16, 'WEB BKL # 2', 'WEB BKL', '2023-01-10 10:44:03', 'Lailatul'),
(17, 'WEB BKL # 3', 'WEB BKL', '2023-01-10 10:44:06', 'Lailatul'),
(18, 'WEB BKL # 4', 'WEB BKL', '2023-01-10 10:44:09', 'Lailatul'),
(19, 'WEB BKL # 5', 'WEB BKL', '2023-01-10 10:44:12', 'Lailatul'),
(20, 'WEB BKL # 6', 'WEB BKL', '2023-01-10 10:44:15', 'Lailatul'),
(21, 'WEB BKL # 7', 'WEB BKL', '2023-01-10 10:44:19', 'Lailatul'),
(22, 'WEB BKL # 8', 'WEB BKL', '2023-01-10 10:44:23', 'Lailatul'),
(23, 'WEB BKL # 9', 'WEB BKL', '2023-01-10 10:44:26', 'Lailatul'),
(24, 'WEB BKL # 10', 'WEB BKL', '2023-01-10 10:44:36', 'Lailatul'),
(25, 'WEB BKL # 11', 'WEB BKL', '2023-01-10 10:44:41', 'Lailatul'),
(26, 'WEB BKL # 12', 'WEB BKL', '2023-01-10 10:45:06', 'Lailatul'),
(27, 'SGA ASSY #1', 'SASH GUIDE ASSY', '2023-01-10 10:46:02', 'Lailatul'),
(28, 'SGA ASSY #2', 'SASH GUIDE ASSY', '2023-01-10 10:48:20', 'Lailatul'),
(29, 'SGA ASSY #3', 'SASH GUIDE ASSY', '2023-01-10 10:48:49', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_lineprd`
--

CREATE TABLE `master_lineprd` (
  `idline` int(11) NOT NULL,
  `namaline` varchar(30) NOT NULL,
  `grupline` varchar(20) NOT NULL,
  `ket` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `authorid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_lineprd`
--

INSERT INTO `master_lineprd` (`idline`, `namaline`, `grupline`, `ket`, `create_at`, `authorid`) VALUES
(0, 'RC0 # 1', 'ELR RC0', 'ELR RC0#1', '2023-01-09 02:09:25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `master_model`
--

CREATE TABLE `master_model` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `ket` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(30) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_model`
--

INSERT INTO `master_model` (`id`, `nama`, `ket`, `create_at`, `author`, `edit_at`, `edit_by`) VALUES
(1, 'D14N', 'D14N ADM', '2023-01-11 12:01:36', 'Admin', '0000-00-00 00:00:00', ''),
(2, 'D30D', 'D30D ADM', '2023-01-11 12:01:48', 'Admin', '2023-01-11 05:02:05', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_satuan`
--

CREATE TABLE `master_satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `code` varchar(20) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(30) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_satuan`
--

INSERT INTO `master_satuan` (`id`, `nama`, `code`, `create_at`, `author`, `edit_at`, `edit_by`) VALUES
(1, 'METER', 'm', '2023-01-13 14:30:45', 'Admin', '0000-00-00 00:00:00', ''),
(2, 'KILOGRAM', 'kg', '2023-01-13 14:31:07', 'Admin', '0000-00-00 00:00:00', ''),
(3, 'PIECES', 'pcs', '2023-01-13 14:31:26', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `supcode` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(30) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`id`, `nama`, `supcode`, `alamat`, `kota`, `telp`, `create_at`, `author`, `edit_at`, `edit_by`) VALUES
(2, 'ASHIMORI KOREA CO., LTD', 'AKC', 'KOREA', '(SINPYEONG-RI) 134, DOWON-RO, ', '82-33-742-6623', '2023-01-10 16:13:43', 'Admin', '0000-00-00 00:00:00', ''),
(3, 'YUNIKO PLASTIC INDONESIA, PT', 'YK', 'Sidoarjo', 'JL. TROPODO I/125, SIDOARJO', '031-8689442-3', '2023-01-10 16:16:26', 'Admin', '0000-00-00 00:00:00', ''),
(4, 'INTERGLOBAL ELECTRIC PARTS, PT', 'IEP', 'GRESIK', 'JL. MAYJEN SUNGKONO NO.8, GRES', '', '2023-01-10 16:19:39', 'Admin', '0000-00-00 00:00:00', ''),
(5, 'ANDIKA JANA BHUMI SEJAHTERA', 'AJBS', 'SURABAYA', 'JL. SEMARANG 116 D-E RT.004 RW', '', '2023-01-10 16:20:46', 'Admin', '0000-00-00 00:00:00', ''),
(6, 'FURNIWEB-VOA SAFETY WEBBING', 'FUR', 'SELANGOR', 'LOT 1883, JALAN KPB 9,KG. BHAR', '', '2023-01-10 16:27:38', 'Admin', '0000-00-00 00:00:00', ''),
(7, 'SINAN BENANG JAHIT, PT', 'SB', 'MOJOKERTO', 'NGORO INDUSTRI PERSADA BLOK J-', '', '2023-01-10 16:28:51', 'Admin', '0000-00-00 00:00:00', ''),
(8, 'INDONESIA POWER SPRING', 'IPS', 'CIKARANG TIMUR, BEKASI', 'KAWASAN INDUSTRI JABABEKA 6 BL', '', '2023-01-10 16:29:53', 'Admin', '0000-00-00 00:00:00', ''),
(9, 'ANEKA RUPA TERA, PT', 'ART', 'SIDOARJO', 'BERBEK INDUSTRI III/1, BERBEK,', '', '2023-01-10 16:31:33', 'Admin', '0000-00-00 00:00:00', ''),
(10, 'LOKAL', 'LKL', 'LOKAL', 'LOKAL', '', '2023-01-10 16:33:15', 'Admin', '0000-00-00 00:00:00', ''),
(11, 'KOMPINDO WIRATAMA, PT', 'KW', 'GRESIK', 'JL. MAYJEN SUNGKONO GG XVI/8A ', '', '2023-01-10 16:34:53', 'Admin', '0000-00-00 00:00:00', ''),
(12, 'ASIANET SPRING INDONESIA, PT', 'ASI', 'BEKASI', 'JL. INDUSTRI UTAMA I BLOK RR 3', '', '2023-01-10 16:35:44', 'Admin', '0000-00-00 00:00:00', ''),
(13, 'YUNINDO PLASTIC ENGINEERING, PT', 'YUN', 'SIDOARJO', 'JL. TROPODO II NO. 90  TROPODO', '', '2023-01-10 16:36:29', 'Admin', '0000-00-00 00:00:00', ''),
(14, 'KIKUCHI NARROW FABRIC CO.LTD,', 'KKC', 'THAILAND', '60 MOO 9 ROJANA ROAD, THANU, U', '', '2023-01-10 16:37:31', 'Admin', '0000-00-00 00:00:00', ''),
(15, 'KATSUYAMA FINETECH INDONESIA, PT', 'KFI', 'BEKASI', 'KAW.GIIC BLOK AD NO. 01, KOTA ', '', '2023-01-10 16:38:52', 'Admin', '0000-00-00 00:00:00', ''),
(16, 'SATRIA GRAHA SEMPURNA, PT', 'SGS', 'SIDOARJO', 'DESA KEBOHARAN KM.27, KEBOHARA', '', '2023-01-10 16:39:26', 'Admin', '0000-00-00 00:00:00', ''),
(17, 'SURYA MAS', 'SMAS', 'SURABAYA', 'LEBAK INDAH NO. 43', '', '2023-01-10 16:40:21', 'Admin', '0000-00-00 00:00:00', ''),
(18, 'SUPRACOR SEJAHTERA, PT', 'SPS', 'MOJOKERTO ', 'JL. RAYA PUNGGING , DS. SUNGGI', '', '2023-01-10 16:41:56', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `raw_data_reject`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw_data_reject`
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
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `name`, `position`, `username`, `password`) VALUES
(1, 'Bilqist Imeilia Az Zahra', 'QCS', 'qcs', 123),
(2, 'Admin', 'Admin', 'admin', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model` (`model`),
  ADD KEY `kategori` (`kategori`,`supplier`,`jenis`,`customer`,`event`,`line`,`satuan`,`author`,`edit_by`);

--
-- Indexes for table `master_customer`
--
ALTER TABLE `master_customer`
  ADD PRIMARY KEY (`idcust`),
  ADD KEY `authorid` (`author`);

--
-- Indexes for table `master_event`
--
ALTER TABLE `master_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorid` (`author`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `master_grupline`
--
ALTER TABLE `master_grupline`
  ADD PRIMARY KEY (`idgruline`),
  ADD UNIQUE KEY `nama_gru` (`nama_gru`),
  ADD UNIQUE KEY `grup_code` (`grup_code`),
  ADD KEY `iduser` (`author`);

--
-- Indexes for table `master_line`
--
ALTER TABLE `master_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `master_lineprd`
--
ALTER TABLE `master_lineprd`
  ADD PRIMARY KEY (`idline`),
  ADD KEY `authorid` (`authorid`),
  ADD KEY `idgruline` (`grupline`);

--
-- Indexes for table `master_model`
--
ALTER TABLE `master_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorid` (`author`);

--
-- Indexes for table `master_satuan`
--
ALTER TABLE `master_satuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorid` (`author`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorid` (`author`);

--
-- Indexes for table `raw_data_reject`
--
ALTER TABLE `raw_data_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_customer`
--
ALTER TABLE `master_customer`
  MODIFY `idcust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_event`
--
ALTER TABLE `master_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_grupline`
--
ALTER TABLE `master_grupline`
  MODIFY `idgruline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `master_line`
--
ALTER TABLE `master_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `master_model`
--
ALTER TABLE `master_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_satuan`
--
ALTER TABLE `master_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `raw_data_reject`
--
ALTER TABLE `raw_data_reject`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_event`
--
ALTER TABLE `master_event`
  ADD CONSTRAINT `master_event_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `master_customer` (`idcust`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
