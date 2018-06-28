<?php

namespace App;

class Validation{

  private static $phoneRegexID = '/\(?(?:\+62|62|0)(?:\d{2,3})?\)?[ .-]?\d{2,4}[ .-]?\d{2,4}[ .-]?\d{2,4}/';


  /*
    Email Validation Method
  */
  public static function emailValidation($stringTarget='')
  {

      if(filter_var(self::clearInput($stringTarget), FILTER_VALIDATE_EMAIL)){
        return true;
      }
      else{
        return false;
      }

  }

  /*
    Phone Validation Method
  */
  public static function phoneValidation($stringTarget='')
  {

      if(preg_match(self::$phoneRegexID, self::clearInput($stringTarget))){
        return true;
      }
      else{
        return false;
      }

  }

  /*
    Clear Input Method
    Clear input from html or javascript syntax, remove uneeded white-space, and remove escape "\" character
  */
  public static function clearInput($stringTarget){
    return stripslashes(trim(htmlspecialchars($stringTarget)));
  }
}


 ?>
