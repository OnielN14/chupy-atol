<?php

namespace App\Models;

use App\Model;

class Order extends Model
{
    protected $modelName = "pemesanan";

    public function insert($item)
    {
        $stmt = $this->connection->getConnected()->prepare('INSERT INTO ' . $this->modelName . '(id,idPengguna, tanggalTransaksi, statusBayar, isTransaksi, alamatPengiriman, hash) VALUES (:id, :idPengguna, NOW(), 0, 0, :alamatPengiriman, :hash)');
        
        $transactionHash = substr(sha1($item['idTransaksi']),10);

        $stmt->bindParam(':id', $item['idTransaksi']);
        $stmt->bindParam(':idPengguna', $item['idPengguna']);
        $stmt->bindParam(':alamatPengiriman', $item['alamatPengiriman']);
        $stmt->bindParam(':hash', $transactionHash);

        $stmt->execute();
        return $stmt->errorInfo();
    }

}
