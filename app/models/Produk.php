<?php

namespace App\Models;

use App\Model;

class Produk extends Model{

  public function fetch(){
    $stmt = $this->connection->getConnected()->prepare('SELECT produk.id, produk.nama, deskripsi, stok, harga, kategoriproduk.nama AS kategori, jenisproduk.nama AS jenis FROM produk LEFT JOIN kategoriproduk ON kategoriproduk.id = produk.idKategori LEFT JOIN jenisproduk ON jenisproduk.id = produk.idJenis');

    $stmt->execute();
    $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }
}
