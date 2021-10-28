-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql307.epizy.com
-- Generation Time: Oct 27, 2021 at 09:17 PM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30037861_sistem_informasi_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_operator`
--

CREATE TABLE `data_operator` (
  `nomor_pegawai` int(15) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `email_pegawai` varchar(50) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_operator`
--

INSERT INTO `data_operator` (`nomor_pegawai`, `nama_pegawai`, `username`, `password`, `nomor_telepon`, `email_pegawai`, `alamat_pegawai`, `foto`, `status`) VALUES
(132, 'JOKO', 'admin5', '26a91342190d515231d7238b0c5438e1', '98907', 'j@ymail.com', 'asasasa', '', 0),
(2312, 'Suratno', 'adminsuratno', 'c33cea3bc8530ca0b213c5fcf30f684c', '0908102', 'suratno@gmail.com', 'Jalan Suratno No. 39', '', 0),
(23121, 'HELMI SENO', 'admin', '21232f297a57a5a743894a0e4a801fc3', '098665544', 'hst@gmail.com', 'Jalan Merpato', 'operator1634100082.jpeg', 1),
(2871319, 'Ahmad Muhammad', 'adminahmad', '42e54f735356af15067de9894c7ff592', '088824567890', 'muhamm@gmail.com', 'Jalan Merpati Beasar', 'operator1634097413.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_subjek`
--

CREATE TABLE `data_subjek` (
  `nomor_subjek` int(11) NOT NULL,
  `nama_subjek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_subjek`
--

INSERT INTO `data_subjek` (`nomor_subjek`, `nama_subjek`) VALUES
(200, 'Agama'),
(400, 'Bahasa'),
(100, 'Filsafat'),
(600, 'Ilmu Terapan'),
(300, 'Sains'),
(800, 'Sastra'),
(0, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `nomor_panggil_koleksi` int(11) NOT NULL,
  `nomor_subjek` int(12) NOT NULL,
  `judul_koleksi` varchar(100) NOT NULL,
  `penanggungjawab_koleksi` varchar(100) NOT NULL,
  `tempat_terbit_koleksi` varchar(30) NOT NULL,
  `penerbit_koleksi` varchar(50) NOT NULL,
  `isbn` char(17) NOT NULL,
  `jumlah_koleksi` int(11) NOT NULL,
  `gambar_koleksi` varchar(100) NOT NULL,
  `status_koleksi` tinyint(1) NOT NULL,
  `tanggal_tambah` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`nomor_panggil_koleksi`, `nomor_subjek`, `judul_koleksi`, `penanggungjawab_koleksi`, `tempat_terbit_koleksi`, `penerbit_koleksi`, `isbn`, `jumlah_koleksi`, `gambar_koleksi`, `status_koleksi`, `tanggal_tambah`) VALUES
(20, 0, 'Manajemen Perpustakaan', 'Abdul Rahman Saleh', 'Tangerang Selatan', 'Penerbit Universitas Terbuka', '978', 1, 'koleksi1633428369.jpg', 1, NULL),
(400, 300, 'IPA SMP', 'Suatrno', 'Jakarta', 'Graha Persada', '2147483647', 2, 'koleksi1633930898.jpg', 1, NULL),
(450, 400, 'Bahasa Indonesia untuk SD/MI', 'Pak Kumis', 'Jakarta', 'Persada Graha Utama', '978-979-729-193-7', 3, 'koleksi1634345939.jpg', 1, NULL),
(800, 800, 'Hujan', 'Tere Liye', 'Jakarta', 'Gramedia', '8798696', 1, 'koleksi1633428479.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_koleksi`
--

CREATE TABLE `ulasan_koleksi` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nomor_panggil_koleksi` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan_koleksi`
--

INSERT INTO `ulasan_koleksi` (`id`, `username`, `nomor_panggil_koleksi`, `komentar`) VALUES
(1, '0', 0, 'bagus banget'),
(2, 'budisantoso', 400, 'hka'),
(3, 'budisantoso', 400, 'bagus'),
(4, 'budisantoso', 400, 'bagus'),
(5, 'budisantoso', 400, 'hka'),
(6, 'budisantoso', 400, 'apik'),
(7, 'budisantoso', 400, 'Mantap'),
(8, 'budisantoso', 400, 'jelek'),
(9, 'budisantoso', 400, 'jelek'),
(10, 'budisantoso', 400, 'jelek'),
(11, 'budisantoso', 450, 'Mantap'),
(12, 'budisantoso', 800, 'bagus'),
(13, 'budijaya', 450, 'Isinya bagus'),
(14, 'budisantoso', 450, 'keren'),
(15, 'Budi K', 400, 'jelk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nomor_user` int(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nomor_hp` char(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nomor_user`, `nama_user`, `username`, `password`, `nomor_hp`, `email`, `alamat`) VALUES
(1, 'Budi Santoso', 'budisantoso', 'd54626f93a54aa886d09', '08221234567', 'budi123@gmail.com', 'Jalan Mawar 1A No. 23'),
(2, 'Budi Jaya', 'budijaya', 'ef38fc6063cc8e5b77c7fbcb91d78cd6', '082134567890', 'budi345@gmail.com', 'Jalan Mawar 1A No. 24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_operator`
--
ALTER TABLE `data_operator`
  ADD PRIMARY KEY (`nomor_pegawai`);

--
-- Indexes for table `data_subjek`
--
ALTER TABLE `data_subjek`
  ADD PRIMARY KEY (`nomor_subjek`),
  ADD KEY `nama_subjek` (`nama_subjek`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`nomor_panggil_koleksi`),
  ADD KEY `nomor_induk_standar` (`isbn`),
  ADD KEY `nomor_panggil_koleksi` (`nomor_panggil_koleksi`),
  ADD KEY `nomor_subjek` (`nomor_subjek`);

--
-- Indexes for table `ulasan_koleksi`
--
ALTER TABLE `ulasan_koleksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomor_panggil_koleksi` (`nomor_panggil_koleksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nomor_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ulasan_koleksi`
--
ALTER TABLE `ulasan_koleksi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `nomor_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
