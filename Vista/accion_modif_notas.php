<?php
require '../Modelo/actividades.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../controlador/notasController.php';

///Se debe modificar unicamente las notas, y la descripcion
use actividades\Actividades;
use notasController\NotasController;

$actividad = new Actividades();
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);

$notasController = new NotasController();
$resultado = $notasController->update($actividad->getId(),$actividad);
if ($resultado) {
    echo '<h1>Nota modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la nota</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>