-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 03:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_atol_chupy`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangdanhewan`
--

CREATE TABLE `barangdanhewan` (
  `id` int(3) NOT NULL,
  `nama` int(255) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(7) NOT NULL,
  `harga` int(9) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `idGambar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftarkeinginan`
--

CREATE TABLE `daftarkeinginan` (
  `idPengguna` int(3) NOT NULL,
  `idBarangDanHewan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fotobarangdanhewan`
--

CREATE TABLE `fotobarangdanhewan` (
  `id` int(3) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id` int(3) NOT NULL,
  `levelAkses` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idPengguna` int(3) NOT NULL,
  `idBarangDanHewan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kotaksarandankeluhan`
--

CREATE TABLE `kotaksarandankeluhan` (
  `id` int(3) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalPemesanan` date NOT NULL,
  `idPengguna` int(3) NOT NULL,
  `idBarangDanHewan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(3) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelepon` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updateAt` date NOT NULL,
  `idHakAkses` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangdanhewan`
--
ALTER TABLE `barangdanhewan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gambar` (`idGambar`);

--
-- Indexes for table `daftarkeinginan`
--
ALTER TABLE `daftarkeinginan`
  ADD KEY `fk_dk_id_pengguna` (`idPengguna`),
  ADD KEY `fk_dk_id_barang_dan_hewan` (`idBarangDanHewan`);

--
-- Indexes for table `fotobarangdanhewan`
--
ALTER TABLE `fotobarangdanhewan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `fk_id_pengguna` (`idPengguna`),
  ADD KEY `fk_id_barang_dan_hewan` (`idBarangDanHewan`);

--
-- Indexes for table `kotaksarandankeluhan`
--
ALTER TABLE `kotaksarandankeluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id_pengguna` (`idPengguna`),
  ADD KEY `fk_order_id_barang_dan_hewan` (`idBarangDanHewan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hak_akses` (`idHakAkses`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangdanhewan`
--
ALTER TABLE `barangdanhewan`
  ADD CONSTRAINT `fk_gambar` FOREIGN KEY (`idGambar`) REFERENCES `fotobarangdanhewan` (`id`);

--
-- Constraints for table `daftarkeinginan`
--
ALTER TABLE `daftarkeinginan`
  ADD CONSTRAINT `fk_dk_id_barang_dan_hewan` FOREIGN KEY (`idBarangDanHewan`) REFERENCES `barangdanhewan` (`id`),
  ADD CONSTRAINT `fk_dk_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_id_barang_dan_hewan` FOREIGN KEY (`idBarangDanHewan`) REFERENCES `barangdanhewan` (`id`),
  ADD CONSTRAINT `fk_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_order_id_barang_dan_hewan` FOREIGN KEY (`idBarangDanHewan`) REFERENCES `barangdanhewan` (`id`),
  ADD CONSTRAINT `fk_order_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_hak_akses` FOREIGN KEY (`idHakAkses`) REFERENCES `hakakses` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
