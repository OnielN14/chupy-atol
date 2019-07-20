<?php

namespace App\Models;

use App\Model;

class KotakSaran extends Model{

  protected $modelName = "kotaksarandankeluhan";

  public function insert($data){
    return $this->raw_query('INSERT INTO '.$this->modelName.'(email,isiPesan,createdAt) VALUES ("'.$data['email'].'","'.$data['email'].'",NOW())');
  }
}
