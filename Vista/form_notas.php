<?php
require '../Modelo/actividades.php';
require '../Modelo/estudiantes.php';
require '../Controlador/conexionDbController.php';
require '../Controlador/baseController.php';
require '../Controlador/notasController.php';

use actividades\Actividades;
use notasController\NotasController;

$actividad = new Actividades();
$id = empty($_GET['id']) ? '' : $_GET['id'];
$titulo = 'Ingresar Nota';
$urlAction = "accion_reg_notas.php?codigoEstudiante=".$actividad->getCodigoEstudiante();

if (!empty($id)){
    $titulo ='Modificar Nota';
    $urlAction = "accion_modif_notas.php";
    $notasController = new NotasController();
    $actividad = $notasController->readRow($id);
}else{
    $codigo = $_GET['codigo'];
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
    <form action="<?php echo $urlAction; ?>" method="post">
        <?php
        if (!empty($actividad->getId())) {
            echo '<label>';
            echo '<span>Id:  ' . $actividad->getId() . '</span>';
            echo '<input type="hidden" name="id" value="' . $actividad->getId() . '" required >';
            echo '</label>';
            echo '<br>';
        }else{
            echo'<label>';
            echo '<span>Id:</span>';
            echo '<input type="number" name="id" value="' . $actividad->getId() . '" required >';
            echo '</label>';
            echo '<br>';
        }
        ?>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" value="<?php echo $actividad->getNota(); ?>" required min="0" max="5">
        </label>
        <br>
        <label>
            <input type="hidden" name="codigo" value="<?php echo $codigo;?>" required>
        </label>
        <br> <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>