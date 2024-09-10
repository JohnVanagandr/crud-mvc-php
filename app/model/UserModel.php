<?php

namespace Sena\model;

use Sena\Libs\Model;

class UserModel extends Model
{
  protected $table = "users";

  function __construct()
  {
    parent::__construct();
  }

  public function getUsers()
  {
    return $this->select($this->table);
  }

  public function storeUser($data)
  {
    return $this->insert("users", $data);
  }

  public function getUser($id)
  {
    return $this->getDataById($this->table, $id);
  }

  public function updateUser($data, $id)
  {
    return $this->update("users", $data, $id);
  }

  public  function deleteUser($id)
  {
    return $this->delete($this->table, $id);
  }
}