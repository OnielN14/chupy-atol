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
      return $this->raw_query('INSERT INTO '.$this->modelName.'(nama,deskripsi,stok,harga,createdAt,updatedAt,idKategori,idJenis) VALUES ("'.$produkData['nama'].'","'.$produkData['deskripsi'].'","'.$produkData['stok'].'","'.$produkData['harga'].'",NOW(),NOW(),"'.$produkData['idKategori'].'","'.$produkData['idJenis'].'")');
  }

  public function update($newProdukData)
  {
    return $this->raw_query('UPDATE  '.$this->modelName.' SET nama="'.$newProdukData['nama'].'", deskripsi="'.$newProdukData['deskripsi'].'", stok="'.$newProdukData['stok'].'", harga="'.$newProdukData['harga'].'", idJenis="'.$newProdukData['idJenis'].'", idKategori="'.$newProdukData['idKategori'].'", updatedAt=NOW() WHERE id="'.$newProdukData['id'].'"');
  }

  public function fetch_by_produk($produkData)
  {
    return $this->raw_query('SELECT `produk`.`id`, nama, deskripsi, stok, harga, `fotoproduk`.`gambar` AS gambar FROM `produk`
    LEFT JOIN `fotoproduk` ON `fotoproduk`.`idProduk` = `produk`.`id`
    WHERE `produk`.`id` = "'.$produkData['idProduk'].'"');
  }
}
