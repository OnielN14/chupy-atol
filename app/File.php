<?php

namespace App;

class File{
  private static $uploadDir = 'extension/upload/';

  public static function convertToReadable($files){
    if (is_array($files['name'])) {
      foreach( $files as $key => $all ){
          foreach( $all as $i => $val ){
              $new[$i][$key] = $val;
          }
      }
      return $new;
    }
    else{
      return $files;
    }
  }

  public static function upload($file){
    move_uploaded_file($file['tmp_name'],self::$uploadDir.basename($file['name']));
  }

  public static function uploadMultiFile($dataFile){
    foreach($dataFile as $foto){
      move_uploaded_file($foto['tmp_name'], self::$uploadDir.basename($foto['name']));
    }
  }

  public static function deleteFile($fileName){
    if ($fileName != 'none' || $fileName != NULL) {
      if (file_exists(self::$uploadDir.$fileName)) {
        unlink(self::$uploadDir.$fileName);
      }
      else{
        echo 'nggk ah, kosong, '.$fileName;
      }
    }
    else{
      echo 'nggk ada fotonya';
    }
  }
}
