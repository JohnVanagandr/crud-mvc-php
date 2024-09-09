<?php

namespace Sena\controllers;

use Sena\Libs\Controller;

class MainController extends Controller
{
  public function index()
  {
    $data = [
      "title" => "Inicio",
      "Subtitle" => "Saludo del sistema",
    ];
    $this->view('home', $data, 'app');
  }
}