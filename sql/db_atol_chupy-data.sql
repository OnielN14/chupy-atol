INSERT
  INTO `hakakses`
  VALUES
    (1 ,'germo'),
    (2, 'pelanggan');

INSERT
  INTO `pengguna` (`nama`,`alamat`,`tempatLahir`,`tanggalLahir`,`email`,`noTelepon`,`password`,`createdAt`,`updatedAt`,`idHakAkses`)
  VALUES
    ('Admin Chupy', 'Bandung', 'Bandung', DATE('2018-06-27'), 'admin@chupy.com', '085724268541', SHA1('admin'), NOW(), NOW(), 1),
    ('Daniyal Ahmad Rizaldhi', 'kp. Pasanggrahan RT/RW 003/004 desa Pasawahan kec. Takokak kab. Cianjur', 'Cianjur', DATE('1997-01-3'), 'onieln14@gmail.com', '085724268541', SHA1('1234'), NOW(), NOW(), 2);

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
