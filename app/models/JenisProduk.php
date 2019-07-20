<?php

namespace App\Models;

use App\Model;

class JenisProduk extends Model{

  protected $modelName = 'jenisproduk';

  public function insert($jenisProdukData){
    return $this->raw_query('INSERT INTO '.$this->modelName.'(nama) VALUES ("'.$jenisProdukData['nama'].'")');
  }

  public function update($jenisProdukData)
  {
    return $this->raw_query('UPDATE  '.$this->modelName.' SET nama="'.$jenisProdukData['nama'].'" WHERE id="'.$jenisProdukData['id'].'"');
  }

}
