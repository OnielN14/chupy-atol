<?php

namespace App\Models;

use App\Model;

class FotoProduk extends Model{

  protected $modelName = 'fotoproduk';

  public function fetch_by_produk($produkData)
  {
    return $this->raw_query('SELECT fotoproduk.id AS id, gambar, produk.id AS idProduk FROM fotoproduk LEFT JOIN produk ON fotoproduk.idProduk = produk.id WHERE fotoproduk.idProduk = "'.$produkData['idProduk'].'"');
  }

  public function insert($fotoData){
    return $this->raw_query('INSERT INTO '.$this->modelName.'(gambar,createdAt,updatedAt, idProduk) VALUES ("'.$fotoData['gambar'].'",NOW(),NOW(),"'.$fotoData['idProduk'].'")');
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

    return $this->raw_query('UPDATE  '.$this->modelName.' SET nama="'.$jenisProdukData['nama'].'" WHERE id="'.$jenisProdukData['id'].'"');
  }

}
