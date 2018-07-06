<?php

namespace App\Models;

use App\Model;

class Pengguna extends Model{

  protected $modelName = "pengguna";

  public function fetch(){
    $stmt = $this->connection->getConnected()->prepare('SELECT id,nama,alamat,email,noTelepon,confirmed FROM '.$this->modelName);

    $stmt->execute();
    $result = $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }

  public function insert($userData){

    try{
      $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(nama,alamat,gender,tempatLahir, tanggalLahir, email,noTelepon,password,createdAt,updatedAt,fotoProfile,idHakAkses,confirmed) VALUES (:nama,:alamat,:gender,:tempatLahir,DATE(:tanggalLahir), :email,:noTelepon,:password,NOW(),NOW(),"none",:hakAkses,0)');

      // echo json_encode($userData);
      $stmt->bindParam(':nama',$userData['nama']);
      $stmt->bindParam(':alamat',$userData['alamat']);
      $stmt->bindParam(':gender',$userData['gender']);
      $stmt->bindParam(':tempatLahir',$userData['tempatLahir']);
      $stmt->bindParam(':tanggalLahir',$userData['tanggalLahir']);
      $stmt->bindParam(':email',$userData['email']);
      $stmt->bindParam(':noTelepon',$userData['noTelepon']);
      $stmt->bindParam(':password',$userData['password']);
      $stmt->bindParam(':hakAkses',$userData['idHakAkses']);

      $stmt->execute();
    }
    catch(PDOException $e){
      print_r($e);
    }

  }

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
