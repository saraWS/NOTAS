<?php
require '../Modelo/usuario.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/estudiantesController.php';

use estudiantes\Estudiantes;
use estudiantesController\EstudiantesController;

$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Registrar Estudiante'
$urlAction = "accion_registro.php";
$estudiantes = new Estudiantes();
if (!empty($id)){
    $titulo ='Modificar Estudiante';
    $urlAction = "accion_modificar.php";
    $estudiantesController = new EstudiantesController();
    $estudiantes = $estudiantesController->readRow($id);
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Id:</span>
            <input type="number" name="id" min="1" value="<?php echo $usuario->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="name" value="<?php echo $usuario->getName(); ?>" required>
        </label>
        <br>
        <label>
            <span>Usuario:</span>
            <input type="text" name="username" value="<?php echo $usuario->getUsername(); ?>" required>
        </label>
        <br>
        <label>
            <span>Contraseña:</span>
            <input type="password" name="password" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>
