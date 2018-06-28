<?php

namespace App;

use App\DBConnection;
use PDO;

abstract class Model{

  protected $modelName;
  protected $connection;
  protected $fillable;
  protected $fetchMode = PDO::FETCH_ASSOC;

  public function __construct(){
    $this->connection = new DBConnection();
  }

  public function getModelName(){
    return $this->modelName;
  }

  public function fetch(){
    $stmt = $this->connection->getConnected()->prepare('SELECT * FROM '.$this->modelName);
    $stmt->execute();

    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
  }

  public function raw_query($query){
    $stmt = $this->connection->getConnected()->prepare($query);
    $stmt->execute();

    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
  }
}
