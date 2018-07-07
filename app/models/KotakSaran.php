<?php

namespace App\Models;

use App\Model;

class KotakSaran extends Model{

  protected $modelName = "kotaksarandankeluhan";

  public function insert($data){
    $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(email,isiPesan,createdAt) VALUES (:email,:isiPesan,NOW())');

    $stmt->bindParam(':email',$data['email']);
    $stmt->bindParam(':isiPesan',$data['isiPesan']);

    $stmt->execute();
    return $stmt->errorInfo();
  }
}
