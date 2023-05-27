<?php
require '../Modelos/estudiantes.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../controllers/estudiantesController.php';
///Se debe modificar unicamente las notas, y la descripcion
use estudiantes\Estudiantes;
use estudiantesController\EstudiantesController;

$estudiantes = new Estudiantes();
$estudiantes->setId($_POST['id']);
$estudiantes->setName($_POST['name']);
$estudiantes->setUsername($_POST['username']);
$estudiantes->setPassword($_POST['password']);

$estudiantesController = new EstudiantesController();
$resultado = $estudiantesController->update($estudiantes->getId(),$estudiantes);
if ($resultado) {
    echo '<h1>Usuarios modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>