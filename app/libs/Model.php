<?php

namespace Sena\Libs;

use PDO;

class Model
{
  protected $db;
  protected $connection;

 public function __construct()
 {
  // Creamos una nueva instancia de la conneción
  $this->db = new Database();
  $this->connection = $this->db->getConnection();
 }

  /**
   * Método para insertar registros en la base de datos.
   *
   * @param string $tabla El nombre de la tabla en la que se insertarán los datos.
   * @param array $columnas Un array asociativo de columnas y valores a insertar.
   *
   * @return mixed Retorna el ID del registro insertado si es exitoso, o un mensaje de error en caso contrario.
   **/
  public function insert($tabla = "", $columnas = [])
  {
    // Crear cadenas vacías para las columnas y los parámetros
    $columns = "";
    $params = "";

    // Recorrer el array asociativo de columnas y valores
    foreach ($columnas as $key => $value) {
      // Agregar el nombre de la columna a la cadena de columnas
      $columns .= $key . ",";

      // Agregar el marcador de parámetro a la cadena de parámetros
      $params .= ":" . $key . ",";
    }

    // Eliminar la última coma de las cadenas de columnas y parámetros
    $columns = rtrim($columns, ',');
    $params = rtrim($params, ',');

    // Construir la consulta SQL de inserción utilizando las cadenas formadas
    $sql = "INSERT INTO $tabla ($columns) VALUES ($params)";

    // Preparar la consulta SQL
    $stm = $this->connection->prepare($sql);

    // Asignar valores a los parámetros utilizando enlaces de parámetros
    foreach ($columnas as $key => $value) {
      $stm->bindValue(":" . $key, $value);
    }

    // Ejecutar la consulta preparada
    if ($stm->execute()) {
      return $this->connection->lastInsertId();
    } else {
      return $this->connection->errorInfo();
    }
  } 

  /**
   * Método para seleccionar todos los registros de una tabla en la base de datos.
   *
   * @param string $tabla El nombre de la tabla a seleccionar.
   *
   * @return array Retorna un array de todos los registros seleccionados.
   **/
  public function select($tabla = "")
  {
    $stm = $this->connection->prepare("SELECT * FROM $tabla");
    $stm->execute();
    return $stm->fetchAll();
  }

  /**
   * Método para obtener un registro por ID en una tabla de la base de datos.
   *
   * @param string $tabla El nombre de la tabla a consultar.
   * @param int $id el identificador de la tabla
   *
   * @return array|null Retorna el registro si se encuentra, o null si no se encuentra ningún registro.
   **/
  public function getDataById($tabla = "", $id)
  {
    $stm = $this->connection->prepare("SELECT * FROM $tabla WHERE id = :id");
    $stm->bindValue(":id", $id);
    $stm->execute();
    return $stm->fetch();
  }


  /**
   * Método para actualizar registros en la base de datos.
   *
   * @param string $tabla El nombre de la tabla en la que se actualizarán los datos.
   * @param array $columnas Un array asociativo de columnas y valores a actualizar.
   *
   * @return mixed Retorna el ID del registro actualizado si es exitoso, o un mensaje de error en caso contrario.
   **/
  public function update($tabla = "", $data = [], $id)
  {
    $set = "";

    foreach ($data as $key => $value) {
      $set .= $key . " = :" . $key . ",";
    }
    $set = substr($set, 0, -1);

    // Construir la consulta SQL de actualización utilizando las cadenas formadas
    $sql = "UPDATE $tabla SET $set WHERE id = :id";

    // die($sql);

    // Preparar la consulta SQL
    $stm = $this->connection->prepare($sql);

    // Asignar valores a los parámetros utilizando enlaces de parámetros
    foreach ($data as $key => $value) {
      $stm->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
    }

    $stm->bindParam(":id", $id, PDO::PARAM_STR);

    // Ejecutar la consulta preparada
    if (!$stm->execute()) {
      return $this->connection->errorInfo();
    } else {
      return true;
    }
  }


  /**
   * Método para eliminar registros de la base de datos.
   *
   * @param string $tabla El nombre de la tabla de la que se eliminarán los registros.
   * @param array $columnas Un array asociativo que especifica la columna y el valor para identificar el registro a eliminar.
   *
   * @return mixed Retorna un mensaje de éxito si la eliminación es exitosa, o un mensaje de error en caso contrario.
   */
  function delete($tabla = "", $id)
  {
    $stm = $this->connection->prepare("DELETE FROM $tabla WHERE id = :id");
    $stm->bindValue(":id", $id);
    $stm->execute();

    return $stm->fetch();
  }  
}