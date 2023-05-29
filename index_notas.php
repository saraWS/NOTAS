<?php
require 'Modelo/actividades.php';
require 'Controlador/conexionDbController.php';
require 'Controlador/baseController.php';
require 'Controlador/notasController.php';

use notasController\NotasController;

$notasController = new NotasController();

$actividades = $notasController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista Notas</h1>
        <a href="Vista/form_notas.php">Ingresar nueva nota</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>nota</th>
                    <th>codigoEstudiante</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>' . $actividad->getCodigoEstudiante() . '</td>';
                    echo '  <td>';
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
            </tr>
        </div>
    </main>
</body>

</html>