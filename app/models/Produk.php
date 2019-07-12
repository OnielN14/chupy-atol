<?php

namespace App\Models;

use App\Model;

class Produk extends Model{

  protected $modelName = 'produk';

  public function fetch(){
    $stmt = $this->connection->getConnected()->prepare('SELECT produk.id, produk.nama, deskripsi, stok, harga, kategoriproduk.id AS idKategori, kategoriproduk.nama AS kategori, jenisproduk.id AS idJenis ,jenisproduk.nama AS jenis FROM produk LEFT JOIN kategoriproduk ON kategoriproduk.id = produk.idKategori LEFT JOIN jenisproduk ON jenisproduk.id = produk.idJenis');

    $stmt->execute();
    $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }

  public function insert($produkData){
      $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(nama,deskripsi,stok,harga,createdAt,updatedAt,idKategori,idJenis) VALUES (:nama,:deskripsi,:stok,:harga,NOW(),NOW(),:idKategori,:idJenis)');

      $stmt->bindParam(':nama',$produkData['nama']);
      $stmt->bindParam(':deskripsi',$produkData['deskripsi']);
      $stmt->bindParam(':stok',$produkData['stok']);
      $stmt->bindParam(':harga',$produkData['harga']);
      $stmt->bindParam(':idJenis',$produkData['idJenis']);
      $stmt->bindParam(':idKategori',$produkData['idKategori']);

      $stmt->execute();
      return $stmt->errorInfo();
  }

  public function update($newProdukData)
  {
    $stmt = $this->connection->getConnected()->prepare('UPDATE  '.$this->modelName.' SET nama=:nama, deskripsi=:deskripsi, stok=:stok, harga=:harga, idJenis=:idJenis, idKategori=:idKategori, updatedAt=NOW() WHERE id=:id');

    $stmt->bindParam(':id',$newProdukData['id']);
    $stmt->bindParam(':nama',$newProdukData['nama']);
    $stmt->bindParam(':deskripsi',$newProdukData['deskripsi']);
    $stmt->bindParam(':stok',$newProdukData['stok']);
    $stmt->bindParam(':harga',$newProdukData['harga']);
    $stmt->bindParam(':idJenis',$newProdukData['idJenis']);
    $stmt->bindParam(':idKategori',$newProdukData['idKategori']);

    $stmt->execute();
    return $stmt->errorInfo();
  }

  public function fetch_by_produk($produkData)
  {
    $stmt = $this->connection->getConnected()->prepare('SELECT `produk`.`id`, nama, deskripsi, stok, harga, `fotoproduk`.`gambar` AS gambar FROM `produk`
    LEFT JOIN `fotoproduk` ON `fotoproduk`.`idProduk` = `produk`.`id`
    WHERE `produk`.`id` = :idProduk');

    $stmt->bindParam(':idProduk',$produkData['idProduk']);

    $stmt->execute();
    $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }
}
