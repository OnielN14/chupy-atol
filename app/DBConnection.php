<?php

namespace App;

use PDO;

class DBConnection{

  private $host = "localhost";
  private $user = "root";
  private $pass = "1234";
  private $dbname = "chupy";
  private $error;
  private $koneksi;

  public function getConnected(){
    return $this->koneksi;
  }

  public function rawQuery($query){
    $stmt = $this->koneksi->prepare($query);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
  }

  public function __construct(){
    try{
        $this->koneksi = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
        $this->error = [
          'isError' => false,
          'message' => 'Connection Success'
        ];
    }catch(PDOException $e){
      $this->error = [
        'isError' => true,
        'message' => $e->getMessage()
      ];
    }
  }

  public function __destruct(){
    $this->koneksi = null;
  }
}
