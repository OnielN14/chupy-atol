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

    $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }

  public function delete_by($data = array())
  {
      $condition = '';
      $i = 0;
      foreach ($data as $key => $value) {
          if ($i != 0) {
              $condition .= ", ";
          }
          $condition .= $key.'=:'.$key;
          $i += 1;
      }
      $query = 'DELETE FROM '.$this->modelName.' WHERE '.$condition;

      $stmt = $this->connection->getConnected()->prepare($query);

      foreach ($data as $key => &$value) {
          $stmt->bindParam(":".$key, $value);
      }

      return $stmt->execute();
  }

  public function fetch_by($data = array())
  {
      $condition = '';
      $i = 0;
      foreach ($data as $key => $value) {
          if ($i != 0) {
              $condition .= ", ";
          }
          $condition .= $key.'=:'.$key;
          $i += 1;
      }
      $query = 'SELECT * FROM '.$this->modelName.' WHERE '.$condition;

      $stmt = $this->connection->getConnected()->prepare($query);

      foreach ($data as $key => &$value) {
          $stmt->bindParam(":".$key, $value);
      }

      $stmt->execute();
      $result = $stmt->setFetchMode($this->fetchMode);
      return $stmt->fetchAll();
  }

  public function raw_query($query){
    $stmt = $this->connection->getConnected()->prepare($query);
    $stmt->execute();

    $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }
}
