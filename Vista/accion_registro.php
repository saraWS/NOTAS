<?php
require '../Modelo/estudiantes.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/estudiantesController.php';

use estudiantes\Estudiantes;
use estudiantesController\EstudiantesController;

$estudiantes = new Estudiantes();//Se le asigna el valor a los datos, el valor de las variables se esta guardadndo en un objeto
$estudiantes->setCodigo($_POST['codigo']);
$estudiantes->setNombres($_POST['name']);
$estudiantes->setApellidos($_POST['apellido']);

$estudiantesController = new EstudiantesController(); //Para enviar datos a la funcion(en susuariosController)
$resultado = $estudiantesController->create($estudiantes);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el usuario</h1>';
}
?>
<a href="../index.php">Volver a inicio</a>