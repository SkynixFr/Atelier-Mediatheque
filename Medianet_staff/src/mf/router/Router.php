<?php

namespace mf\router;

class Router extends AbstractRouter{

  public function __construct(){
    parent::__construct();
  }

  public function addRoute($name, $url, $ctrl, $mth){
    self::$routes[$url] =  array(
      $ctrl,
      $mth
    );
    self::$aliases[$name] = $url;
  }

  public function setDefaultRoute($url){
    self::$aliases['default'] = $url;
  }
  public function run(){
    $default = self::$aliases["default"];
    $ctrl = self::$routes[$default][0];
    $mth = self::$routes[$default][1];
      if(isset(self::$routes[$this->http_req->path_info])){
        $ctrl = self::$routes[$this->http_req->path_info][0];
        $mth = self::$routes[$this->http_req->path_info][1];
      }
    $route = new $ctrl();
    $route->$mth();
  }

  public function urlFor($route_name, $param_list = []){
    $route = $this->http_req->script_name.self::$aliases[$route_name];

    foreach ($param_list as $key => $value) {
      $route .= "?$key=$value";
    }

    return $route;
  }

  public function executeRoute($alias){
    $ctrl = self::$routes[self::$aliases[$alias]][0];
    $mth = self::$routes[self::$aliases[$alias]][1];
    $route = new $ctrl();    
    $route->$mth();
  } 
}
