<?php

namespace Sena\Libs;

class Controller
{
  public function __construct(){}

  /**
   * Método para cargar un modelo desde la carpeta models
   * 
   * Ests método se utiliza para cargar los modelos de forma dinamica solo tiene que mencionar el nombre del modelo
   * 
   * @param string $model Nombre del modelo que se desea cargar
   * @access public
   * @return object Instncia del modelo
   */
  public function model($model = "")
  {
    // Construye el nombre del modelo
    $model = 'Sena\model\\'.$model.'Model';
    return new $model;
  }

  /**
   * Método que nos permite cargar una vista ubicado en la carpeta vistas
   * 
   * Este método se utiliza para cargara una vista desde la carpeta views.
   * permite definir datos y un diseño para li vista
   * 
   * @param string $view El nombre de la vista que se desea mostrar
   * @param array $data Datos que se parasan a la vista
   * @param void este método no retorna ningun valor
   * @access public
   */
  public function view($view = "", $data = [], $layout = "")
  {
    ob_start();
    $view = $view. '.view';
    if (file_exists('../app/views/'. $view. '.php')) {
      // Si el archivo de la vista existe, lo incluimos
      require_once('../app/views/' . $view . '.php');
      $contend = ob_get_clean();
      require_once('../app/views/layout/' . $layout . '.layout.php');
    }else {
      die("La vista $view no existe");
    }
  }
}