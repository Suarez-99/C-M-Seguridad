<?php
require_once 'controllers/ContactoController.php';

$controller = new ContactoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->enviarMensaje();
}

include 'views/home.php';
?>
