<?php

namespace App\Models;

use App\Model;

class Order extends Model
{
    protected $modelName = "pemesanan";

    public function insert($item)
    {
        $transactionHash = substr(sha1($item['idTransaksi']),10);

        return $this->raw_query('INSERT INTO ' . $this->modelName . '(id,idPengguna, tanggalTransaksi, statusBayar, isTransaksi, kontak, alamatPengiriman, hash) VALUES ("'.$item['idTransaksi'].'", "'.$item['idPengguna'].'", NOW(), 0, 0, "'.$item['kontak'].'", "'.$item['alamatPengiriman'].'", "'.$transactionHash.'")');
    }

    public function fetch_buyer_info($hash){
        return $this->raw_query('SELECT `pengguna`.`nama` from `pemesanan` 
        LEFT JOIN `pengguna` ON `pengguna`.`id` = `pemesanan`.`idPengguna`
        WHERE `pemesanan`.`hash` = "'.$hash.'"');
    }
}
