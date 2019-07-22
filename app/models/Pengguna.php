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

  public function fetch_login_data($data)
  {
    return $this->raw_query('SELECT * FROM '.$this->modelName.' WHERE email="'.$data['email'].'"');
  }

  public function insert($userData){
      return $this->raw_query('INSERT INTO '.$this->modelName.'(nama,alamat,gender,tempatLahir, tanggalLahir, email,noTelepon,password,createdAt,updatedAt,fotoProfile,idHakAkses,confirmed) VALUES ("'.$userData['nama'].'","'.$userData['alamat'].'","'.$userData['gender'].'","'.$userData['tempatLahir'].'",DATE("'.$userData['tanggalLahir'].'"), "'.$userData['email'].'","'.$userData['noTelepon'].'","'.$userData['password'].'",NOW(),NOW(),"'.$userData['fotoProfile'].'","'.$userData['idHakAkses'].'",0)');
  }

  public function update($newUserData)
  {
    return $this->raw_query('UPDATE  '.$this->modelName.' SET nama="'.$newUserData['nama'].'", alamat="'.$newUserData['alamat'].'", gender="'.$newUserData['gender'].'", tempatLahir="'.$newUserData['tempatLahir'].'", tanggalLahir=DATE("'.$newUserData['tanggalLahir'].'"), noTelepon="'.$newUserData['noTelepon'].'", password="'.$newUserData['password'].'", fotoProfile="'.$newUserData['fotoProfile'].'",idHakAkses="'.$newUserData['idHakAkses'].'", updatedAt=NOW() WHERE id="'.$newUserData['id'].'"');
  }

  public function update_by_user_no_photo($newUserData){
    return $this->raw_query('UPDATE  '.$this->modelName.' SET nama="'.$newUserData['nama'].'", alamat="'.$newUserData['alamat'].'",noTelepon="'.$newUserData['noTelepon'].'", updatedAt=NOW() WHERE id="'.$newUserData['id'].'"');
  }

  public function update_by_user_with_photo($newUserData){
    return $this->raw_query('UPDATE  '.$this->modelName.' SET nama="'.$newUserData['nama'].'", alamat="'.$newUserData['alamat'].'",noTelepon="'.$newUserData['noTelepon'].'", fotoProfile="'.$newUserData['fotoProfile'].'", updatedAt=NOW() WHERE id="'.$newUserData['id'].'"');
  }

  public function update_password($userData){
    return $this->raw_query('UPDATE  '.$this->modelName.' SET password="'.$userData['password'].'", updatedAt=NOW() WHERE id="'.$userData['id'].'"');
  }
}
