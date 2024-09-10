<?php

namespace Sena\Libs;

class Core
{
  protected $controller = 'MainController';
  protected $method = 'index';
  protected $parameters = [];

  public function __construct()
  {
    $url = $this->getUrl();
    if ($url != '' && file_exists('../app/controllers'.ucwords($url[0])) . 'Controller.php' )
    {
      $this->controller = ucwords($url[0].'Controller');
      // Eliminamos la primera clave del arreglo
      unset($url[0]);
    }

    $obj = 'Sena\\controllers\\'.$this->controller;
    $this->controller = new $obj;

    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }else {
        die("El método solicitado no fue programado...");
      }
    }

    $this->parameters = $url ? array_values($url) : [];
    call_user_func_array([$this->controller, $this->method], $this->parameters);
  }

  public function getUrl()
  {
    $url = '';
    if (isset($_GET['url']))
    {
      // Eliminamos el ultimo caracter de la URL
      $url = rtrim($_GET['url'], '/');
      $url = rtrim($_GET['url'], '\\');
      // Stanitizamos la URL
      $url = filter_var($url, FILTER_SANITIZE_URL);
      // Definimos la URl Como si fuera un arreglo
      $url = explode('/', $url);
    }
    // Retornamos la URL
    return $url;
  }
}