<?php

namespace App\Models;

use App\Model;

class Cart extends Model{

    protected $modelName = "Keranjang";

    public function insert($item)
    {
        $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(idPengguna,idProduk, jumlah, createdAt, updatedAt) VALUES (:idPengguna, :idProduk, :jumlah, NOW(), NOW())');

        $stmt->bindParam(':idPengguna',$item['idPengguna']);
        $stmt->bindParam(':idProduk',$item['idProduk']);
        $stmt->bindParam(':jumlah',$item['jumlah']);
    
        $stmt->execute();
        return $stmt->errorInfo();
    }    

    public function fetch_detail_by_user($idPengguna)
    {
        $stmt = $this->connection->getConnected()->prepare('SELECT `produk`.`id`, `produk`.`nama`, `produk`.`harga`, `jumlah`,`fotoproduk`.`gambar` FROM `keranjang` 
        LEFT JOIN `produk` ON `keranjang`.`idProduk` = `produk`.`id` 
        LEFT JOIN `fotoproduk` ON `fotoproduk`.`idProduk` = `produk`.`id` 
        WHERE `keranjang`.`idPengguna` = :idPengguna');
    
        $stmt->bindParam(':idPengguna',$idPengguna);
    
        $stmt->execute();
        $stmt->setFetchMode($this->fetchMode);
        return $stmt->fetchAll();
    }
}
