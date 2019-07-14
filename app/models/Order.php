<?php

namespace App\Models;

use App\Model;

class Order extends Model
{
    protected $modelName = "pemesanan";

    public function insert($item)
    {
        $stmt = $this->connection->getConnected()->prepare('INSERT INTO ' . $this->modelName . '(id,idPengguna, tanggalTransaksi, statusBayar, isTransaksi, kontak, alamatPengiriman, hash) VALUES (:id, :idPengguna, NOW(), 0, 0, :kontak, :alamatPengiriman, :hash)');
        
        $transactionHash = substr(sha1($item['idTransaksi']),10);

        $stmt->bindParam(':id', $item['idTransaksi']);
        $stmt->bindParam(':idPengguna', $item['idPengguna']);
        $stmt->bindParam(':alamatPengiriman', $item['alamatPengiriman']);
        $stmt->bindParam(':kontak', $item['kontak']);
        $stmt->bindParam(':hash', $transactionHash);

        $stmt->execute();
        return $stmt->errorInfo();
    }

    public function fetch_buyer_info($hash){
        $stmt = $this->connection->getConnected()->prepare('SELECT `pengguna`.`nama` from `pemesanan` 
        LEFT JOIN `pengguna` ON `pengguna`.`id` = `pemesanan`.`idPengguna`
        WHERE `pemesanan`.`hash` = :hash');

        $stmt->bindParam(':hash', $hash);

        $stmt->execute();
        $stmt->setFetchMode($this->fetchMode);
        return $stmt->fetchAll();
    }
}
