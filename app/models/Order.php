<?php

namespace App\Models;

use App\Model;

class Order extends Model
{
    protected $modelName = "pemesanan";

    public function insert($item)
    {
        $stmt = $this->connection->getConnected()->prepare('INSERT INTO ' . $this->modelName . '(id,idPengguna, tanggalTransaksi, statusBayar, alamatPengiriman, buktiBayar, hash) VALUES (:id, :idPengguna, NOW(), false, :alamatPengiriman, :buktiBayar)');

        $stmt->bindParam(':id', $item['idTransaksi']);
        $stmt->bindParam(':idPengguna', $item['idPengguna']);
        $stmt->bindParam(':alamatPengiriman', $item['alamatPengiriman']);
        $stmt->bindParam(':buktiBayar', $item['buktiBayar']);
        $stmt->bindParam(':hash', substr(sha1($item['idTransaksi']),10));

        $stmt->execute();
        return $stmt->errorInfo();
    }

}
