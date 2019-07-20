/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.36-MariaDB : Database - db_chuppy_atol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_chuppy_atol` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `db_chuppy_atol`;

/*Table structure for table `apikey` */

DROP TABLE IF EXISTS `apikey`;

CREATE TABLE `apikey` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apikey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `daftarkeinginan` */

DROP TABLE IF EXISTS `daftarkeinginan`;

CREATE TABLE `daftarkeinginan` (
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL,
  KEY `fk_dk_id_barang_dan_hewan` (`idProduk`),
  KEY `fk_dk_id_pengguna` (`idPengguna`),
  CONSTRAINT `fk_dk_id_barang_dan_hewan` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  CONSTRAINT `fk_dk_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `detail_pemesanan` */

DROP TABLE IF EXISTS `detail_pemesanan`;

CREATE TABLE `detail_pemesanan` (
  `idTransaksi` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProduk` int(3) NOT NULL,
  `jumlah` int(11) NOT NULL,
  KEY `fk_order_id_produk` (`idProduk`),
  KEY `fk_order_id_transaksi` (`idTransaksi`),
  CONSTRAINT `fk_order_id_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  CONSTRAINT `fk_order_id_transaksi` FOREIGN KEY (`idTransaksi`) REFERENCES `pemesanan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `fotoproduk` */

DROP TABLE IF EXISTS `fotoproduk`;

CREATE TABLE `fotoproduk` (
  `id` int(3) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `idProduk` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produk` (`idProduk`),
  CONSTRAINT `fk_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `hakakses` */

DROP TABLE IF EXISTS `hakakses`;

CREATE TABLE `hakakses` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `levelAkses` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `jenisproduk` */

DROP TABLE IF EXISTS `jenisproduk`;

CREATE TABLE `jenisproduk` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `kategoriproduk` */

DROP TABLE IF EXISTS `kategoriproduk`;

CREATE TABLE `kategoriproduk` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idJenis` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jenis` (`idJenis`),
  CONSTRAINT `fk_jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenisproduk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  KEY `fk_cart_id_produk` (`idProduk`),
  KEY `fk_cart_id_pengguna` (`idPengguna`),
  CONSTRAINT `fk_cart_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`),
  CONSTRAINT `fk_cart_id_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `kotaksarandankeluhan` */

DROP TABLE IF EXISTS `kotaksarandankeluhan`;

CREATE TABLE `kotaksarandankeluhan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalTransaksi` datetime NOT NULL,
  `idPengguna` int(3) NOT NULL,
  `statusBayar` bit(1) NOT NULL,
  `isTransaksi` bit(1) NOT NULL,
  `alamatPengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buktiBayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_hash` (`hash`),
  KEY `fk_order_id_pengguna` (`idPengguna`),
  CONSTRAINT `fk_order_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pria',
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelepon` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `fotoProfile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `idHakAkses` int(3) NOT NULL,
  `confirmed` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `fk_hak_akses` (`idHakAkses`),
  CONSTRAINT `fk_hak_akses` FOREIGN KEY (`idHakAkses`) REFERENCES `hakakses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(7) NOT NULL,
  `harga` int(9) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `idKategori` int(3) NOT NULL,
  `idJenis` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produk_jenis` (`idJenis`),
  KEY `fk_kategori` (`idKategori`),
  CONSTRAINT `fk_kategori` FOREIGN KEY (`idKategori`) REFERENCES `kategoriproduk` (`id`),
  CONSTRAINT `fk_produk_jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenisproduk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
