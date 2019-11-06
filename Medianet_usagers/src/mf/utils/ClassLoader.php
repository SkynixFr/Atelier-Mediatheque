<?php

namespace mf\utils;

class ClassLoader{
  private $prefix;

  public function __construct($prefix){
    $this->prefix=$prefix;
  }

  private function loadClass($class){
    $file = $this->prefix.DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $class).".php";
    if(file_exists($file) ){
      require $file;
    }
  }

  public function register(){
    spl_autoload_register(array($this, 'loadClass'));
  }
}
