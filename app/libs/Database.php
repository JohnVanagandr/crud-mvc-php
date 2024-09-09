<?php
namespace Sena\Libs;

use PDO;

class Database
{
  private $connection;

  public function __construct()
  {
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $this->connection = "mysql:host=" . constant('HOST') . "; dbname=" . constant('DB') . "; charset=" . constant('CHARSET');
    $this->connection = new PDO($this->connection, constant('USER'), constant('PASSWORD'), $options);
    $this->connection->exec("SET CHARACTER SET UTF8");
  }

  /**
   * Obtiene la instancia de la conexión a la base de datos.
   *
   * 
   * @return PDO La instancia de la conexión a la base de datos.
   * 
   */
  function getConnection()
  {
    return $this->connection;
  }

  /**
   * Cierra la conexión a la base de datos.
   * 
   * @return void
   */
  function closConnection()
  {
    $this->connection = null;
  }  
}