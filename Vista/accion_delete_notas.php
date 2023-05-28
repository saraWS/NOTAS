<?php
require '../Modelo/actividades.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/notasController.php';

use notasController\NotasController;

$notasController = new NotasController();
$resultado = $notasController->delete($_GET['id']);
if ($resultado) {
    echo '<h1>La nota se ha eliminado</h1>';
} else {
    echo '<h1>No se pudo eliminar la nota</h1>';
}
