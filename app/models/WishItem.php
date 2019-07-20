<?php

namespace App\Models;

use App\Model;

class WishItem extends Model{
    protected $modelName = 'daftarkeinginan';

    public function insert($wishItem)
    {
        $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(idPengguna,idProduk) VALUES (:idPengguna, :idProduk)');

        $stmt->bindParam(':idPengguna',$wishItem['idPengguna']);
        $stmt->bindParam(':idProduk',$wishItem['idProduk']);
    
        $stmt->execute();
        return $stmt->errorInfo();
    }

    public function fetch_detail_by_user($idPengguna)
    {
        $stmt = $this->connection->getConnected()->prepare('SELECT `produk`.`id`, `produk`.`nama`, `produk`.`harga`, `fotoproduk`.`gambar` FROM `daftarkeinginan` 
        LEFT JOIN `produk` ON `daftarkeinginan`.`idProduk` = `produk`.`id` 
        LEFT JOIN `fotoproduk` ON `fotoproduk`.`idProduk` = `produk`.`id` 
        WHERE `daftarkeinginan`.`idPengguna` = :idPengguna');
    
        $stmt->bindParam(':idPengguna',$idPengguna);
    
        $stmt->execute();
        $stmt->setFetchMode($this->fetchMode);
        return $stmt->fetchAll();
    }
}
