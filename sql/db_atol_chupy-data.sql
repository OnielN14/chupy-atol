INSERT
	INTO apikey (`user`,`apikey`)
    VALUES
    	('front_end',SHA1('public_access'));

INSERT
  INTO `hakakses`
  VALUES
    (1 ,'germo'),
    (2, 'pelanggan');

INSERT
  INTO `pengguna` (`nama`,`gender`,`alamat`,`tempatLahir`,`tanggalLahir`,`email`,`noTelepon`,`password`,`createdAt`,`updatedAt`,`idHakAkses`, `confirmed`)
  VALUES
    ('Admin Chupy','pria', 'Bandung', 'Bandung', DATE('2018-06-27'), 'admin@chupy.com', '085724268541', SHA1('admin'), NOW(), NOW(), 1,1),
    ('Daniyal Ahmad Rizaldhi','pria', 'kp. Pasanggrahan RT/RW 003/004 desa Pasawahan kec. Takokak kab. Cianjur', 'Cianjur', DATE('1997-01-3'), 'onieln14@gmail.com', '085724268541', SHA1('1234'), NOW(), NOW(), 2,1);

INSERT
  INTO `jenisproduk`
  VALUES
    (1, 'hewan'),
    (2, 'kebutuhan');

INSERT
  INTO `kategoriproduk`
  VALUES
    (1,'Mamalia',1),
    (2,'Reptil',1),
    (3,'Burung',1),
    (4,'Aksesoris',2),
    (5,'Makanan Hewan',2);

INSERT
  INTO `produk` (nama,deskripsi,harga,stok,createdAt,updatedAt,idJenis,idKategori)
  VALUES
    ('Cepcep, Kucing Anggora', 'Cepcep, kucing anggora imut yang baru berumur 6 bulan siap menemanimu di setiap saat, buraaoonngg...', 500000,1, NOW(), NOW(), 1, 1),
    ('Pudi, Anjing Puddle', 'Woof... Woof... Pudi hadir buat harimu menyenangkan', 550000,1, NOW(), NOW(), 1, 1),
    ('Kurkur, Kura-kura', 'Kurkur akan buat harimu "adem".. pikiranmu juga', 450000,1, NOW(), NOW(), 2, 1),
    ('Whiskas', 'Whiskas... Makanan sehat \'nan penuh nutrisi cocok untuk kucing mu tercinta', 50000 ,100, NOW(), NOW(), 2, 5),
    ('Bando Telinga Kucing', 'Bando stylish dengan telinga kucing... nyan~~', 25000 ,100, NOW(), NOW(), 2, 4);
