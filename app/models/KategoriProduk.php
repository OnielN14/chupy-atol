<?php

namespace App\Models;

use App\Model;

class KategoriProduk extends Model{

  protected $modelName = "kategoriproduk";

  public function fetch(){
    $stmt = $this->connection->getConnected()->prepare('SELECT kategoriproduk.id, kategoriproduk.nama, jenisproduk.id AS idJenis, jenisproduk.nama AS namaJenis FROM kategoriproduk LEFT JOIN jenisproduk ON jenisproduk.id = kategoriproduk.idJenis');

    $stmt->execute();
    $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }

  public function insert($kategoriProdukData){
    $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(nama,idJenis) VALUES (:nama,:idJenis)');

    $stmt->bindParam(':nama',$kategoriProdukData['nama']);
    $stmt->bindParam(':idJenis',$kategoriProdukData['idJenis']);

    $stmt->execute();
    return $stmt->errorInfo();
  }

  public function update($kategoriProdukData)
  {
    $stmt = $this->connection->getConnected()->prepare('UPDATE  '.$this->modelName.' SET nama=:nama,idJenis=:idJenis WHERE id=:id');

    $stmt->bindParam(':id',$kategoriProdukData['id']);
    $stmt->bindParam(':nama',$kategoriProdukData['nama']);
    $stmt->bindParam(':idJenis',$kategoriProdukData['idJenis']);

    $stmt->execute();
    return $stmt->errorInfo();
  }
}
