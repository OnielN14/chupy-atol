<?php

namespace App\Models;

use App\Model;

class OrderDetail extends Model
{
    protected $modelName = "detail_pemesanan";

    public function insert($item)
    {
        return $this->raw_query('INSERT INTO ' . $this->modelName . '(idTransaksi, idProduk, jumlah) VALUES ("'.$item['idTransaksi'].'", "'.$item['idProduk'].'", "'.$item['jumlah'].'")');
    }

    public function insertMultiple($multipleData){
        $db = $this->connection->getConnected();
    
        # Transaction
        $db->beginTransaction();
        $stmt = $db->prepare('INSERT INTO '.$this->modelName.'(idTransaksi, idProduk, jumlah) VALUES (:idTransaksi, :idProduk, :jumlah)');
    
        $stmt->bindParam(':idTransaksi',$idTransaksi);
        $stmt->bindParam(':idProduk',$idProduk);
        $stmt->bindParam(':jumlah',$jumlah);
    
        foreach ($multipleData as $item) {
            $idTransaksi = $item['idTransaksi'];
            $idProduk = $item['idProduk'];
            $jumlah = $item['jumlah'];
            $stmt->execute();
        }
    
        $db->commit();
    
        return $stmt->errorInfo();
      }

    public function fetch_produk_detail_by_transaction($idTransaksi)
    {
        return $this->raw_query('SELECT `produk`.`nama`, `produk`.`harga`, `detail_pemesanan`.`jumlah` FROM `detail_pemesanan` 
        LEFT JOIN `produk` ON `produk`.`id` = `detail_pemesanan`.`idProduk`
        WHERE `detail_pemesanan`.`idTransaksi` = "'.$idTransaksi.'"');
    }
}
