<?php
require '../Modelo/actividades.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/notasController.php';

use actividades\Actividades;
use notasController\NotasController;

$actividad = new Actividades();
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoEstudiante($_POST['codigo']);

$notasController = new NotasController();
$resultado = $notasController->create($actividad);
if ($resultado) {
    echo '<h1>Nota registrada</h1>';
} else {
    echo '<h1>No se pudo registrar la nota</h1>';
}
//EL boton de abajo no sirve :D
?>

<a href="../index_notas.php">Volver</a> 
