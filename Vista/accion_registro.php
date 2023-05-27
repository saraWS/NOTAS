<?php
require '../Modelo/estudiantes.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/usuariosController.php';

use estudiantes\Estudiantes;
use usuarioController\UsuarioController;

$usuario = new Usuario();//Se le asigna el valor a los datos, el valor de las variables se esta guardadndo en un objeto
$usuario->setId($_POST['id']);
$usuario->setName($_POST['name']);
$usuario->setUsername($_POST['username']);
$usuario->setPassword($_POST['password']);

$usuarioController = new UsuarioController();//Para enviar datos a la funcion(en susuariosController)
$resultado = $usuarioController->create($usuario);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el usuario</h1>';
}
