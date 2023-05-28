<?php
require '../Modelo/estudiantes.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/estudiantesController.php';

use estudiantes\Estudiantes;
use estudiantesController\EstudiantesController;

$codigo= empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo= 'Registrar Estudiante';
$urlAction = "accion_registro.php";
$estudiantes = new Estudiantes();
if (!empty($codigo)){
    $titulo ='Modificar Estudiante';
    $urlAction = "accion_modificar.php";
    $estudiantesController = new EstudiantesController();
    $estudiantes = $estudiantesController->readRow($codigo);
}
?>

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
            <span>Codigo:</span>
            <input type="number" name="codigo" min="1" value="<?php echo $estudiantes->getCodigo(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="name" value="<?php echo $estudiantes->getNombres(); ?>" required>
        </label>
        <br>
        <label>
            <span>Apellido:</span>
            <input type="text" name="apellido" value="<?php echo $estudiantes->getApellidos(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>
