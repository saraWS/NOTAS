<?php
require '../Modelo/actividades.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/notasController.php';

use actividades\Actividades;
use notasController\NotasController;

$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Ingresar Nota';
$urlAction = "accion_reg_notas.php";
$actividad = new Actividades();
if (!empty($id)){
    $titulo ='Modificar Nota';
    $urlAction = "accion_modif_notas.php";
    $notasController = new NotasController();
    $actividad = $notasController->readRow($id);
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
            <span>Id:</span>
            <input type="number" name="id" min="1" value="<?php echo $actividad->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" value="<?php echo $actividad->getNota(); ?>" required>
        </label>
        <label>
            <span>Codigo del estudiante:</span>
            <input type="text" name="codigoEstudiante" value="<?php echo $actividad->getCodigoEstudiante(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>
