<?php

namespace App\Models;

use App\Model;

class Pengguna extends Model{

  protected $modelName = "pengguna";

  public function get_user_by_email($userEmail){
    $stmt = $this->connection->getConnected()->prepare('SELECT * FROM '.$this->modelName.' WHERE email=?');

    $stmt->execute(array($userEmail));
    $result = $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }

  public function get_user_by_id($userId){
    $stmt = $this->connection->getConnected()->prepare('SELECT * FROM '.$this->modelName.' WHERE id=?');

    $stmt->execute(array($userId));
    $result = $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }
}
