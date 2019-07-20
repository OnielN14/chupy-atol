<?php

namespace App\Models;

use App\Model;

class Cart extends Model{

    protected $modelName = "keranjang";

    public function insert($item)
    {   
        return $this->raw_query('INSERT INTO '.$this->modelName.'(idPengguna,idProduk, jumlah, createdAt, updatedAt) VALUES ("'.$item['idPengguna'].'","'.$item['idProduk'].'","'.$item['jumlah'].'", NOW(), NOW())');
    }    

    public function fetch_detail_by_user($idPengguna)
    {   
        return $this->raw_query('SELECT `produk`.`id`, `produk`.`nama`, `produk`.`harga`, `jumlah`,`fotoproduk`.`gambar` FROM `keranjang` 
        LEFT JOIN `produk` ON `keranjang`.`idProduk` = `produk`.`id` 
        LEFT JOIN `fotoproduk` ON `fotoproduk`.`idProduk` = `produk`.`id` 
        WHERE `keranjang`.`idPengguna` = "'.$idPengguna.'"');
    }
}
