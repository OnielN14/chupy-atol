<?php

namespace App\Models;

use App\Model;

class KategoriProduk extends Model{

  protected $modelName = "kategoriproduk";

  public function fetch(){
    return $this->raw_query('SELECT kategoriproduk.id, kategoriproduk.nama, jenisproduk.id AS idJenis, jenisproduk.nama AS namaJenis FROM kategoriproduk LEFT JOIN jenisproduk ON jenisproduk.id = kategoriproduk.idJenis');
  }

  public function insert($kategoriProdukData){
    return $this->raw_query('INSERT INTO '.$this->modelName.'(nama,idJenis) VALUES ("'.$kategoriProdukData['nama'].'","'.$kategoriProdukData['nama'].'")');
  }

  public function update($kategoriProdukData)
  {
    return $this->raw_query('UPDATE  '.$this->modelName.' SET nama="'.$kategoriProdukData['nama'].'",idJenis="'.$kategoriProdukData['nama'].'" WHERE id="'.$kategoriProdukData['id'].'"');
  }
}
