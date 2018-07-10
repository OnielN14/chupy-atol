<?php

namespace App\Models;

use App\Model;

class Pengguna extends Model{

  protected $modelName = "pengguna";

  public function fetch(){
    $stmt = $this->connection->getConnected()->prepare('SELECT id,nama,alamat,gender,tempatLahir, tanggalLahir,email,noTelepon, idHakAkses, fotoProfile, confirmed FROM '.$this->modelName);

    $stmt->execute();
    $result = $stmt->setFetchMode($this->fetchMode);
    return $stmt->fetchAll();
  }

  public function insert($userData){
      $stmt = $this->connection->getConnected()->prepare('INSERT INTO '.$this->modelName.'(nama,alamat,gender,tempatLahir, tanggalLahir, email,noTelepon,password,createdAt,updatedAt,fotoProfile,idHakAkses,confirmed) VALUES (:nama,:alamat,:gender,:tempatLahir,DATE(:tanggalLahir), :email,:noTelepon,:password,NOW(),NOW(),:fotoProfile,:hakAkses,0)');

      $stmt->bindParam(':nama',$userData['nama']);
      $stmt->bindParam(':alamat',$userData['alamat']);
      $stmt->bindParam(':gender',$userData['gender']);
      $stmt->bindParam(':tempatLahir',$userData['tempatLahir']);
      $stmt->bindParam(':tanggalLahir',$userData['tanggalLahir']);
      $stmt->bindParam(':email',$userData['email']);
      $stmt->bindParam(':noTelepon',$userData['noTelepon']);
      $stmt->bindParam(':password',$userData['password']);
      $stmt->bindParam(':hakAkses',$userData['idHakAkses']);
      $stmt->bindParam(':fotoProfile',$userData['fotoProfile']);

      return $stmt->execute();
  }

  public function update($newUserData)
  {
    $stmt = $this->connection->getConnected()->prepare('UPDATE  '.$this->modelName.' SET nama=:nama, alamat=:alamat, gender=:gender, tempatLahir=:tempatLahir, tanggalLahir=DATE(:tanggalLahir), noTelepon=:noTelepon, password=:password, fotoProfile=:fotoProfile,idHakAkses=:idHakAkses, updatedAt=NOW() WHERE id=:id');

    $stmt->bindParam(':id',$newUserData['id']);
    $stmt->bindParam(':nama',$newUserData['nama']);
    $stmt->bindParam(':alamat',$newUserData['alamat']);
    $stmt->bindParam(':gender',$newUserData['gender']);
    $stmt->bindParam(':tempatLahir',$newUserData['tempatLahir']);
    $stmt->bindParam(':tanggalLahir',$newUserData['tanggalLahir']);
    $stmt->bindParam(':noTelepon',$newUserData['noTelepon']);
    $stmt->bindParam(':password',$newUserData['password']);
    $stmt->bindParam(':idHakAkses',$newUserData['idHakAkses']);
    $stmt->bindParam(':fotoProfile',$newUserData['fotoProfile']);

    return $stmt->execute();
  }
}
