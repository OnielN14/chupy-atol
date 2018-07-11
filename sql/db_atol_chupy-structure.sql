--
-- Database: `db_atol_chupy`


-- tabel `apikey`
CREATE TABLE `apikey` (
  `id` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `apikey` varchar(255) NOT NULL
) ENGINE=InnoDB;

-- tabel `kotaksarandankeluhan`
CREATE TABLE `kotaksarandankeluhan` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `isiPesan` text NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB;

-- tabel `jenisproduk`
CREATE TABLE `jenisproduk` (
  `id` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB;

-- tabel `kategoriproduk`
CREATE TABLE `kategoriproduk` (
  `id` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `idJenis` int(3) NOT NULL,

  CONSTRAINT `fk_jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenisproduk` (`id`)
) ENGINE=InnoDB;

-- tabel `hakakses`
CREATE TABLE `hakakses` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `levelAkses` varchar(15) NOT NULL
) ENGINE=InnoDB;


-- tabel `pengguna`
CREATE TABLE `pengguna` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255)NOT NULL,
  `gender` ENUM('pria','wanita') NOT NULL DEFAULT 'pria',
  `alamat` text NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `noTelepon` varchar(65) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `fotoProfile` varchar(255) DEFAULT 'none',
  `idHakAkses` int(3) NOT NULL,
  `confirmed` bit NOT NULL DEFAULT 0,
  CONSTRAINT `fk_hak_akses` FOREIGN KEY (`idHakAkses`) REFERENCES `hakakses` (`id`)
) ENGINE=InnoDB;

-- tabel `produk`
CREATE TABLE `produk` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(255)  NOT NULL,
  `deskripsi` text  NOT NULL,
  `stok` int(7) NOT NULL,
  `harga` int(9) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `idKategori` int(3) NOT NULL,
  `idJenis` int(3) NOT NULL,
  CONSTRAINT `fk_produk_jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenisproduk` (`id`),
  CONSTRAINT `fk_kategori` FOREIGN KEY (`idKategori`) REFERENCES `kategoriproduk` (`id`)
) ENGINE=InnoDB;

-- tabel `daftarkeinginan`
CREATE TABLE `daftarkeinginan` (
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL,
  CONSTRAINT `fk_dk_id_barang_dan_hewan` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  CONSTRAINT `fk_dk_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`)
) ENGINE=InnoDB;

-- tabel `fotproduk`
CREATE TABLE `fotoproduk` (
  `id` int(3) PRIMARY KEY AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `idProduk` int(3) NOT NULL,

  CONSTRAINT `fk_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB;

-- tabel `keranjang`
CREATE TABLE `keranjang` (
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,

  CONSTRAINT `fk_cart_id_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  CONSTRAINT `fk_cart_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`)
) ENGINE=InnoDB;

-- tabel `pemesanan`
CREATE TABLE `pemesanan` (
  `id` varchar(101) PRIMARY KEY,
  `tanggalPemesanan` date NOT NULL,
  `idPengguna` int(3) NOT NULL,
  `idProduk` int(3) NOT NULL,

  CONSTRAINT `fk_order_id_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`),
  CONSTRAINT `fk_order_id_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`)
) ENGINE=InnoDB;
