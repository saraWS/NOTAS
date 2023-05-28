<?php
require '../Modelo/estudiantes.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../controlador/estudiantesController.php';

use estudiantes\Estudiantes;
use estudiantesController\EstudiantesController;

$estudiantes = new Estudiantes();
$estudiantes->setCodigo($_POST['codigo']);
$estudiantes->setNombres($_POST['name']);
$estudiantes->setApellidos($_POST['apellido']);

$estudiantesController = new EstudiantesController();
$resultado = $estudiantesController->update($estudiantes->getCodigo(),$estudiantes);
if ($resultado) {
    echo '<h1>Usuarios modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>