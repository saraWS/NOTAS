<?php
require '../Modelo/estudiantes.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/estudiantesController.php';

use estudiantes\Estudiantes;
use estudiantesController\EstudiantesController;

$estudiantes = new Estudiantes();//Se le asigna el valor a los datos, el valor de las variables se esta guardadndo en un objeto
$estudiantes->setId($_POST['id']);
$estudiantes->setName($_POST['name']);
$estudiantes->setUsername($_POST['username']);
$estudiantes->setPassword($_POST['password']);

$estudiantesController = new EstudiantesController(); //Para enviar datos a la funcion(en susuariosController)
$resultado = $estudiantesController->create($estudiantes);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el usuario</h1>';
}
