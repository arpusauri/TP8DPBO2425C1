<?php

require_once __DIR__ . "/controllers/LecturerController.php";

$controller = new LecturerController();

$action = $_GET['action'] ?? 'index';

switch ($action) {

  case 'create':
    $controller->create();
    break;

  case 'store':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $controller->store();
    }
    break;

  case 'edit':
    if (isset($_GET['id'])) {
      $controller->edit($_GET['id']);
    }
    break;

  case 'update':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $controller->update();
    }
    break;

  case 'delete':
    if (isset($_GET['id'])) {
      $controller->delete($_GET['id']);
    }
    break;

  default:
    $controller->index();
    break;
}
