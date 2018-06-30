<?php

namespace App;

abstract class Controller{
  protected $message;

  public function render_page($filePath, $variables = [], $print = true){
    $filePath = ROOTPATH.'/view/'.$filePath.'.php';

    if (file_exists($filePath)) {
      $output = NULL;

      extract($variables);

      ob_start();

      include($filePath);

      $output = ob_get_clean();
    }

    if ($print) {
      echo $output;
    }

    return $output;
  }
}
