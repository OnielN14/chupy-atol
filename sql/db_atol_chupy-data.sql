INSERT
  INTO `hakakses` (`levelAkses`)
  VALUES
    ('germo'),
    ('pelanggan');

INSERT
  INTO `pengguna` (`nama`,`alamat`,`tempatLahir`,`tanggalLahir`,`email`,`noTelepon`,`password`,`createdAt`,`updatedAt`,`idHakAkses`)
  VALUES
    ('Admin Chupy', 'Bandung', 'Bandung', DATE('2018-06-27'), 'admin@chupy.com', '085724268541', SHA1('admin'), NOW(), NOW(), 1),
    ('Daniyal Ahmad Rizaldhi', 'kp. Pasanggrahan RT/RW 003/004 desa Pasawahan kec. Takokak kab. Cianjur', 'Cianjur', DATE('199-01-3'), 'onieln14@gmail.com', '085724268541', SHA1('1234'), NOW(), NOW(), 2)
