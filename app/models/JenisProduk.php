<?php

namespace App\Models;

use App\Model;

class JenisProduk extends Model{

  protected $modelName = 'jenisproduk';

  public function insert($jenisProdukData){
    $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(nama) VALUES (:nama)');

    $stmt->bindParam(':nama',$jenisProdukData['nama']);

    $stmt->execute();
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
