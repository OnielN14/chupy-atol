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

/*Data for the table `apikey` */

insert  into `apikey`(`id`,`user`,`apikey`) values (1,'front_end','1bf5f3f04129718befad4b27a1e32a7852460cad');

/*Data for the table `daftarkeinginan` */

insert  into `daftarkeinginan`(`idPengguna`,`idProduk`) values (1,1),(1,2);

/*Data for the table `fotoproduk` */

insert  into `fotoproduk`(`id`,`gambar`,`createdAt`,`updatedAt`,`idProduk`) values (1,'20190712-1950897156-5.jpeg','2019-07-12','2019-07-12',5),(2,'20190712-1037102187-4.jpeg','2019-07-12','2019-07-12',4),(3,'20190712-1022682525-1.png','2019-07-12','2019-07-12',1),(4,'20190712-1121459769-2.jpeg','2019-07-12','2019-07-12',2),(6,'20190712-836264349-3.jpeg','2019-07-12','2019-07-12',3);

/*Data for the table `hakakses` */

insert  into `hakakses`(`id`,`levelAkses`) values (1,'germo'),(2,'pelanggan');

/*Data for the table `jenisproduk` */

insert  into `jenisproduk`(`id`,`nama`) values (1,'hewan'),(2,'kebutuhan');

/*Data for the table `kategoriproduk` */

insert  into `kategoriproduk`(`id`,`nama`,`idJenis`) values (1,'Mamalia',1),(2,'Reptil',1),(3,'Burung',1),(4,'Aksesoris',2),(5,'Makanan Hewan',2);

/*Data for the table `keranjang` */

insert  into `keranjang`(`idPengguna`,`idProduk`,`jumlah`,`createdAt`,`updatedAt`) values (1,5,2,'2019-07-12','2019-07-12'),(1,1,1,'2019-07-12','2019-07-12');

/*Data for the table `kotaksarandankeluhan` */

/*Data for the table `pengguna` */

insert  into `pengguna`(`id`,`nama`,`gender`,`alamat`,`tempatLahir`,`tanggalLahir`,`email`,`noTelepon`,`password`,`createdAt`,`updatedAt`,`fotoProfile`,`idHakAkses`,`confirmed`) values (1,'Admin Chupy','pria','Bandung','Bandung','2018-06-27','admin@chupy.com','085724268541','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','2019-07-12','2019-07-12','none',1,''),(2,'Daniyal Ahmad Rizaldhi','pria','kp. Pasanggrahan RT/RW 003/004 desa Pasawahan kec. Takokak kab. Cianjur','Cianjur','1997-01-03','onieln14@gmail.com','085724268541','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','2019-07-12','2019-07-12','none',2,'');

/*Data for the table `produk` */

insert  into `produk`(`id`,`nama`,`deskripsi`,`stok`,`harga`,`createdAt`,`updatedAt`,`idKategori`,`idJenis`) values (1,'Cepcep, Kucing Anggora','Cepcep, kucing anggora imut yang baru berumur 6 bulan siap menemanimu di setiap saat, buraaoonngg...',1,500000,'2019-07-12','2019-07-12',1,1),(2,'Pudi, Anjing Poodle','Woof... Woof... Pudi hadir buat harimu menyenangkan',1,550000,'2019-07-12','2019-07-12',1,1),(3,'Kurkur, Kura-kura','Kurkur akan buat harimu \"adem\".. pikiranmu juga',1,450000,'2019-07-12','2019-07-12',2,1),(4,'Whiskas','Whiskas... Makanan sehat \'nan penuh nutrisi cocok untuk kucing mu tercinta',100,50000,'2019-07-12','2019-07-12',5,2),(5,'Bando Telinga Kucing','Bando stylish dengan telinga kucing... nyan~~',100,25000,'2019-07-12','2019-07-12',4,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
