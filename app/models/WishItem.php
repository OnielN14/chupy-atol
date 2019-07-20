<?php

namespace App\Models;

use App\Model;

class WishItem extends Model{
    protected $modelName = 'daftarkeinginan';

    public function insert($wishItem)
    {
        return $this->raw_query('INSERT INTO '.$this->modelName.'(idPengguna,idProduk) VALUES ("'.$wishItem['idPengguna'].'", "'.$wishItem['idProduk'].'")');
    }

    public function fetch_detail_by_user($idPengguna)
    {
        return $this->raw_query('SELECT `produk`.`id`, `produk`.`nama`, `produk`.`harga`, `fotoproduk`.`gambar` FROM `daftarkeinginan` 
        LEFT JOIN `produk` ON `daftarkeinginan`.`idProduk` = `produk`.`id` 
        LEFT JOIN `fotoproduk` ON `fotoproduk`.`idProduk` = `produk`.`id` 
        WHERE `daftarkeinginan`.`idPengguna` = "'.$idPengguna.'"');
    }
}
