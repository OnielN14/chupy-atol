<?php

namespace App\Models;

use App\Model;

class User extends Model{

  protected $modelName = "user";

  public function check_user_by_email($userEmail){
    $stmt = $this->connection->getConnected()->prepare('SELECT * FROM '.$this->modelName.' WHERE userEmail=?');

    $stmt->execute(array($userEmail));
    $result = $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }
}
