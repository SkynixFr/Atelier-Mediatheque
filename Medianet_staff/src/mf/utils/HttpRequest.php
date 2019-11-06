<?php
namespace mf\utils;

class HttpRequest extends AbstractHttpRequest {


  public function __construct(){
    $this->script_name = $_SERVER["SCRIPT_NAME"];
    $this->get = $_GET;
    $this->post = $_POST;
    if(isset($_SERVER["PATH_INFO"])){
      $this->path_info = $_SERVER["PATH_INFO"];
    }
    $this->method = $_SERVER["REQUEST_METHOD"];
    $this->root = dirname($this->script_name);
  }

}
