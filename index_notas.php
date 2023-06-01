<?php
require 'Modelo/actividades.php';
require 'Controlador/conexionDbController.php';
require 'Controlador/baseController.php';
require 'Controlador/notasController.php';

use actividades\Actividades;
use notasController\NotasController;


$notasController = new NotasController();
$codigo = $_GET['codigo'];
$actividades = $notasController->read($codigo);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Notas</h1>
        <a href="Vista/form_notas.php?codigo=<?php echo $codigo;?>">Ingresar nueva nota</a>
        <table>
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Descripcion </th>
                    <th>Nota </th>
                    <th>Codigo Estudiante </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $promedio = 0;
                $i = 0;
                $notasS = 0;

                foreach ($actividades as $actividad) {
                    $i = $i+1;
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>' . $actividad->getCodigoEstudiante() . '</td>';
                    echo '  <td>';
                    $notasS=$actividad->getNota()+$notasS;
                    $promedio = $notasS/$i;
                    echo '      <a href="Vista/form_notas.php?id=' . $actividad->getId() . '">modificar</a>';
                    echo '      <a href="Vista/accion_delete_notas.php?id=' . $actividad->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <div>
            <tr>
                <br>
                <th>PROMEDIO:</th>
                <?php
                if($promedio !=0){
                    echo "Su promedio es = $promedio";
                }
                if($promedio<3 && $promedio>0){
                    echo '<h3 style = "color:red">Lo sentimos, NO aprobo</h3>';
                }else if($promedio>=3 && $promedio <=5){
                    echo '<h3 style = "color:green">Felicidades, SI aprobo</h3>';

                }else if($promedio==0){
                    echo "Debe ingresar primero una nota";

                }
                ?>
            </tr>
        </div>
    </main>
</body>

</html>