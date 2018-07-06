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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(7) NOT NULL,
  `harga` int(9) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `idKategori` int(3) NOT NULL,
  `idJenis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftarkeinginan`
--

CREATE TABLE `daftarkeinginan` (
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenisproduk`
--

CREATE TABLE `jenisproduk` (
  `id` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE `apikey` (
  `id` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `apikey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriproduk`
--

CREATE TABLE `kategoriproduk` (
  `id` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idJenis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fotoproduk`
--

CREATE TABLE `fotoproduk` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `idProduk` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `levelAkses` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kotaksarandankeluhan`
--

CREATE TABLE `kotaksarandankeluhan` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` varchar(101) COLLATE utf8mb4_unicode_ci PRIMARY KEY,
  `tanggalPemesanan` date NOT NULL,
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelepon` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `fotoProfile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `idHakAkses` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD KEY `fk_produk_jenis` (`idJenis`),
  ADD KEY `fk_kategori` (`idKategori`);

--
-- Indexes for table `kategoriproduk`
--
ALTER TABLE `kategoriproduk`
  ADD KEY `fk_jenis` (`idJenis`);

--
-- Indexes for table `fotoproduk`
--
ALTER TABLE `fotoproduk`
  ADD KEY `fk_produk` (`idProduk`);

--
-- Indexes for table `daftarkeinginan`
--
ALTER TABLE `daftarkeinginan`
  ADD KEY `fk_dk_id_pengguna` (`idPengguna`),
  ADD KEY `fk_dk_id_produk` (`idProduk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `fk_cart_id_pengguna` (`idPengguna`),
  ADD KEY `fk_cart_id_produk` (`idProduk`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD KEY `fk_order_id_pengguna` (`idPengguna`),
  ADD KEY `fk_order_id_produk` (`idProduk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD KEY `fk_hak_akses` (`idHakAkses`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangdanhewan`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenisproduk` (`id`),
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`idKategori`) REFERENCES `kategoriproduk` (`id`);

--
-- Constraints for table `fotoproduk`
--
ALTER TABLE `fotoproduk`
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `kategoriproduk`
--
ALTER TABLE `kategoriproduk`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenisproduk` (`id`);

--
-- Constraints for table `daftarkeinginan`
--
ALTER TABLE `daftarkeinginan`
  ADD CONSTRAINT `fk_dk_id_barang_dan_hewan` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `fk_dk_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_cart_id_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `fk_cart_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_order_id_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `fk_order_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_hak_akses` FOREIGN KEY (`idHakAkses`) REFERENCES `hakakses` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
