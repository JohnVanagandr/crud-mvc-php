<?php

namespace Sena\controllers;

use Sena\Libs\Controller;

class UsersController extends Controller
{
  protected $model = "";

  public function __construct()
  {
    $this->model = $this->model('User');
  }


  public function index()
  {
    $users = $this->model->getUsers();

    $data = [
      "title" => "Usuarios",
      "Subtitle" => "Listando usuarios",
      'users' => $users
    ];

    $this->view('users/index', $data, 'app');
  }

  public function create()
  {
    $data= [
      'title'=> "Usuario",
      "subtitle" => "Crear un usuario"
    ];

    $this->view('users/create', '', 'app');
  }

  public function store()
  {
    $data = [
      'first_name' => $_REQUEST['first_name'],
      'last_name'  => $_REQUEST['last_name'],
      'email'      => $_REQUEST['email'],
      'phone'   => $_REQUEST['phone'],
      'dni'     => $_REQUEST['dni'],
    ] ;

    $this->model->storeUser($data);

    header("location:".URL."/users");
  }

  public function edit($id)
  {
    $user = $this->model->getUser($id);

    $data = [
      "title" => "Usuarios",
      "Subtitle" => "Editando usuario",
      'user' => $user
    ];

    $this->view('users/edit', $data, 'app');    
  }

  public function update()
  {
    $data = [
      'first_name' => $_REQUEST['first_name'],
      'last_name'  => $_REQUEST['last_name'],
      'email'      => $_REQUEST['email'],
      'phone'      => $_REQUEST['phone'],
      'dni'        => $_REQUEST['dni'],
    ];

    $id = $_REQUEST['id'];

    $this->model->updateUser($data, $id);

    header("location:" . URL . "/users");
  }

  public function destroy()
  {
    $id = $_REQUEST['id'];
    $this->model->deleteUser($id);
    
    header("location:" . URL . "/users");
  }

}