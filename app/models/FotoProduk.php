<?php

namespace App\Models;

use App\Model;

class FotoProduk extends Model{

  protected $modelName = 'fotoproduk';

  public function insert($fotoData){
    $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(gambar,createdAt,updatedAt, idProduk) VALUES (:gambar,NOW(),NOW(),:idProduk)');

    $stmt->bindParam(':gambar',$fotoData['gambar']);
    $stmt->bindParam(':idProduk',$fotoData['idProduk']);

    $stmt->execute();
    return $stmt->errorInfo();
  }

  public function insertMultiple($multipleFotoData){
    $db = $this->connection->getConnected();

    # Transaction
    $db->beginTransaction();
    $stmt = $db->prepare('INSERT INTO '.$this->modelName.'(gambar,createdAt,updatedAt, idProduk) VALUES (:gambar,NOW(),NOW(),:idProduk)');

    $stmt->bindParam(':gambar',$gambar);
    $stmt->bindParam(':idProduk',$idProduk);

    foreach ($multipleFotoData as $foto) {
        $gambar = $foto['name'];
        $idProduk = $foto['idProduk'];
        $stmt->execute();
    }

    $db->commit();

    return $stmt->errorInfo();
  }

  public function update($jenisProdukData)
  {
    $stmt = $this->connection->getConnected()->prepare('UPDATE  '.$this->modelName.' SET nama=:nama WHERE id=:id');

    $stmt->bindParam(':id',$jenisProdukData['id']);
    $stmt->bindParam(':nama',$jenisProdukData['nama']);

    $stmt->execute();
    return $stmt->errorInfo();
  }

}
